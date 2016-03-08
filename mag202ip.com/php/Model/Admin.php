<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Admin
 *
 * @author Prog1
 */
class Admin {

    //put your code here
    // <editor-fold defaultstate="collapsed" desc="Users">  
    function getAllUsers($Page, $MaxRes, $SqlSearchrArr = null) {

        $db = new SQL_Conect_PDO();

        $ArrPars = array();
        $SqlSearchr = '';
        if ($SqlSearchrArr) {
            $SqlSearchr = $SqlSearchrArr["s"];
            $ArrPars = array_merge($SqlSearchrArr["d"], $ArrPars);
        }
        
        $sql = "SELECT COUNT(`Id`) "
                . "FROM `users` "
                .($SqlSearchr ? "WHERE $SqlSearchr" : '');
        $db->SetQuery($sql, $ArrPars);
        $res['Count'] = $db->GetQueryCount();

        if (!$res['Count']) {
            return false;
        }

        //$Page, $MaxPages, $AllRes
        $arr = $db->SqlLimit($Page, $MaxRes, $res['Count']);
        $res['Page'] = $arr['Page'];
        $res['Pages'] = $arr['Pages'];

        $sql = "SELECT * FROM `users` "
                .($SqlSearchr ? "WHERE $SqlSearchr" : '')
                . "ORDER BY `FirstName` ASC "
                . $arr["SQL"];

        $db->SetQuery($sql, $ArrPars);
        $res['Users'] = $db->GetQueryAll_Class("User");

        return $res;
    }

    function UserDell($Id) {

        $db = new SQL_Conect_PDO();

        $sql = "DELETE FROM `users` WHERE `Id` = :Id LIMIT 1;";
        $db->SetQuery($sql, array('Id' => $Id));

        $sql = "DELETE FROM `orders` WHERE `Id_user` = :Id ";
        $db->SetQuery($sql, array('Id' => $Id));
    }

    // </editor-fold>
    // 
    // 
    // 
    // <editor-fold defaultstate="collapsed" desc="Categories">

    function getAllCategories($Page, $MaxRes) {

        $db = new SQL_Conect_PDO();

        $sql = "SELECT COUNT(`Id`) FROM `categories`;";
        $db->SetQuery($sql);
        $res['Count'] = $db->GetQueryCount();

        if (!$res['Count']) {
            return false;
        }

        //$Page, $MaxPages, $AllRes
        $arr = $db->SqlLimit($Page, $MaxRes, $res['Count']);
        $res['Page'] = $arr['Page'];
        $res['Pages'] = $arr['Pages'];

        $sql = "SELECT * FROM `categories` "
                . "ORDER BY `Name` ASC "
                . $arr["SQL"];

        $db->SetQuery($sql);
        $res['Categories'] = $db->GetQueryAll_Class("Categori");

        return $res;
    }

    function CategoriDell($Id) {

        $db = new SQL_Conect_PDO();

        $sql = "DELETE FROM `categories` WHERE `Id` = :Id LIMIT 1;";
        $db->SetQuery($sql, array('Id' => $Id));

        $sql = "DELETE FROM `sub_categories` WHERE `Id_categori` = :Id ";
        $db->SetQuery($sql, array('Id' => $Id));

        //Delete orders
        $sql = "SELECT `Id` FROM `products` WHERE `Id_categories` = :Id ";
        $db->SetQuery($sql, array('Id' => $Id));

        $res = $db->GetQueryAllAssoc();
        $sql = $db->SqlGetInAndSetLimit($res);

        $sql = "DELETE FROM `orders` WHERE `Id_product` " . $sql;
        $db->SetQuery($sql);
        //Delete orders end

        $sql = "DELETE FROM `products` WHERE `Id_categories` = :Id ";
        $db->SetQuery($sql, array('Id' => $Id));
    }

    function CategoriEditOreAdd($arr, $Id) {

        $db = new SQL_Conect_PDO();

        $F = new F_Help();

        if ($Id > 0) {

            $sql = "UPDATE `categories` SET "
                    . "`Name` = :Name "
                    . "WHERE `Id` = :Id; "
                    . "LIMIT 1;";

            $db->SetQuery($sql, array('Id' => $Id, 'Name' => $F->strUpFirst($arr['Name'])));
        } else {

            $sql = "INSERT INTO `categories` (`Id`, `Name`) VALUES (NULL, :Name);";
            $db->SetQuery($sql, array('Name' => $F->strUpFirst($arr['Name'])));
        }
    }

    // </editor-fold>
    // 
    // 
    // 
    // <editor-fold defaultstate="collapsed" desc="SubCategories">   
    function getAllSubCategories($Page, $MaxRes) {

        $db = new SQL_Conect_PDO();

        $sql = "SELECT COUNT(`Id`) FROM `sub_categories`";
        $db->SetQuery($sql);
        $res['Count'] = $db->GetQueryCount();

        if (!$res['Count']) {
            return false;
        }

        //$Page, $MaxPages, $AllRes
        $arr = $db->SqlLimit($Page, $MaxRes, $res['Count']);
        $res['Page'] = $arr['Page'];
        $res['Pages'] = $arr['Pages'];

        $sql = "SELECT s.*, c.`Name` as CategoriName FROM `sub_categories` as s, "
                . "`categories` as c "
                . "WHERE "
                . "c.`Id` = s.`Id_categori` "
                . "ORDER BY s.`Name` ASC "
                . $arr["SQL"];

        $db->SetQuery($sql);
        $res['SubCategories'] = $db->GetQueryAll_Class("SubCategori");

        return $res;
    }

    function SubCategoriDell($Id) {
        //var_dump($Id);
        $db = new SQL_Conect_PDO();

        $sql = "DELETE FROM `sub_categories` WHERE `Id` = :Id ";
        $db->SetQuery($sql, array('Id' => $Id));

        //Delete orders
        $sql = "SELECT `Id` FROM `products` WHERE `Id_sub_categories` = :Id ";
        $db->SetQuery($sql, array('Id' => $Id));

        $res = $db->GetQueryAllAssoc();
        $sql = $db->SqlGetInAndSetLimit($res);

        $sql = "DELETE FROM `orders` WHERE `Id_product` " . $sql;
        $db->SetQuery($sql);
        //Delete orders end

        $sql = "DELETE FROM `products` WHERE `Id_sub_categories` = :Id ";
        $db->SetQuery($sql, array('Id' => $Id));
    }

    function SubCategoriEditOreAdd($arr, $Id) {

        $db = new SQL_Conect_PDO();

        $F = new F_Help();

        if ($Id > 0) {

            $res = $SubCategori = new SubCategori();
            $res = $SubCategori->getSubCategoriById($Id);

            if ($res->Id_categori != $arr['CategoriId']) {

                $sql = "UPDATE `products` "
                        . "SET `Id_categories` = :CategoriId "
                        . "WHERE `Id_sub_categories` = :Id;";
                $db->SetQuery($sql, array('Id' => $Id, 'CategoriId' => $arr['CategoriId']));
            }

            $sql = "UPDATE `sub_categories` SET "
                    . "`Id_categori` = :CategoriId, "
                    . "`Name` = :Name "
                    . "WHERE `Id` = :Id; "
                    . "LIMIT 1;";

            $db->SetQuery($sql, array('Id' => $Id, 'CategoriId' => $arr['CategoriId'], 'Name' => $F->strUpFirst($arr['Name'])));
            
        } else {

            $sql = "INSERT INTO `sub_categories` (`Id`, `Id_categori`, `Name`) VALUES (NULL, :CategoriId, :Name);";
            $db->SetQuery($sql, array('CategoriId' => $arr['CategoriId'], 'Name' => $F->strUpFirst($arr['Name'])));
        }
    }

    // </editor-fold>
    // 
    // 
    // 
    // <editor-fold defaultstate="collapsed" desc="Orders"> 

    function OrderDell($Id) {
        
        $db = new SQL_Conect_PDO();
        
        $sql = "DELETE FROM `orders` WHERE `Id` = :Id LIMIT 1;";
        $db->SetQuery($sql, array('Id' => $Id));
    }
    
    // </editor-fold>
    // 
    // 
    // 
    // <editor-fold defaultstate="collapsed" desc="Products">

    function ProductDell($Id) {
        //var_dump($Id);
        $db = new SQL_Conect_PDO();

        $sql = "DELETE FROM `orders` WHERE `Id_product` = :Id LIMIT 1;" ;
        $db->SetQuery($sql, array('Id' => $Id));
        //Delete orders end

        $sql = "DELETE FROM `products` WHERE `Id` = :Id LIMIT 1;";
        $db->SetQuery($sql, array('Id' => $Id));
    }
    
    function ProductEditOreAdd($arr, $Id) {
        
        $db = new SQL_Conect_PDO();

        $F = new F_Help();

        if ($Id > 0) {

            $sql = "UPDATE `products` "
                    . "SET `Id_categories` = :Id_categories, "
                    . "`Id_sub_categories` = :Id_sub_categories, "
                    . "`Name` = :Name, "
                    . "`Count` = :Count, "
                    . "`Description` = :Description, "
                    . "`Prise` = :Prise "
                    . "WHERE `Id` = :Id "
                    . "LIMIT 1;";

                
            $db->SetQuery($sql, array('Id' => $Id, 
                                      'Name' => $F->strUpFirst($arr['Name']), 
                                      'Count' => $arr['Count'],
                                      'Prise' => $arr['Prise'],
                                      'Description' => $F->SafeTegs($arr['Description']),
                                      'Id_categories' => $arr['Id_categories'],
                                      'Id_sub_categories' => $arr['Id_sub_categories']));
            
        } else {

            $sql = "INSERT INTO `products` (`Id`, `Id_categories`, `Id_sub_categories`, `Name`, `Count`, `Description`, `Prise`) "
                                 . "VALUES (NULL, :Id_categories, :Id_sub_categories, :Name, :Count, :Description, :Prise);";
            
            $db->SetQuery($sql, array('Name' => $F->strUpFirst($arr['Name']), 
                                      'Count' => $arr['Count'],
                                      'Prise' => $arr['Prise'],
                                      'Description' => $F->SafeTegs($arr['Description']),
                                      'Id_categories' => $arr['Id_categories'],
                                      'Id_sub_categories' => $arr['Id_sub_categories']));
        } 
        
    }
    // </editor-fold> 
    
    
}
