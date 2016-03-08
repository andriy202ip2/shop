<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Products
 *
 * @author Prog1
 */
class Products {
    //put your code here
    
    
    function getProductsBySubCategori($id) {
        
        $db = new SQL_Conect_PDO();        
        $sql = "SELECT * FROM `products` WHERE `Id_sub_categories` = :Id "
                . "ORDER BY `Name` ASC ";
        
        $ArrPars['Id'] = $id;        

        $db->SetQuery($sql, $ArrPars);                        
        $res = $db->GetQueryAll_Class("Product");
                        
        return $res;
    }
    
    function getProductsBySubCategoriJOIN($id, $Page, $MaxRes) {
        
        $db = new SQL_Conect_PDO();    
        
        $ArrPars['Id'] = $id;
        
        $sql = "SELECT COUNT(`Id`) FROM `products` WHERE `Id_sub_categories` = :Id";
        $db->SetQuery($sql, $ArrPars);                        
        $res['Count'] = $db->GetQueryCount();
        
        if (!$res['Count']) {            
            return false;
        }
        
        //$Page, $MaxPages, $AllRes
        $arr = $db->SqlLimit($Page, $MaxRes, $res['Count']);
        $res['Page'] = $arr['Page'];
        $res['Pages'] = $arr['Pages'];
        
        $sql = "SELECT p.*, c.`Name` as CategoriName, s.`Name` as SubCategoriName FROM `categories` as c, "
                . "`products` as p, "
                . "`sub_categories` as s "
                . "WHERE "
                    . "c.`Id` = p.`Id_categories` "
                    . "AND p.`Id_sub_categories` = s.`Id` "
                    . "AND `Id_sub_categories` = :Id "
                . "ORDER BY `p`.`Name` ASC  "
                . $arr["SQL"];
        
                

        $db->SetQuery($sql, $ArrPars);                        
        $res['Products'] = $db->GetQueryAll_Class("Product");
                        
        return $res;
    }
    
    function getProductsByCategoriJOIN($id, $Page, $MaxRes) {
        
        $db = new SQL_Conect_PDO();    
        
        $ArrPars['Id'] = $id;
        
        $sql = "SELECT COUNT(`Id`) FROM `products` WHERE `Id_categories` = :Id";
        $db->SetQuery($sql, $ArrPars);                        
        $res['Count'] = $db->GetQueryCount();
        
        if (!$res['Count']) {            
            return false;
        }
        
        //$Page, $MaxPages, $AllRes
        $arr = $db->SqlLimit($Page, $MaxRes, $res['Count']);
        $res['Page'] = $arr['Page'];
        $res['Pages'] = $arr['Pages'];
        
        $sql = "SELECT p.*, c.`Name` as CategoriName, s.`Name` as SubCategoriName FROM `categories` as c, "
                . "`products` as p, "
                . "`sub_categories` as s "
                . "WHERE "
                    . "c.`Id` = p.`Id_categories` "
                    . "AND p.`Id_sub_categories` = s.`Id` "
                    . "AND `Id_categories` = :Id "
                . "ORDER BY `p`.`Name` ASC  "
                . $arr["SQL"];
        
                

        $db->SetQuery($sql, $ArrPars);                        
        $res['Products'] = $db->GetQueryAll_Class("Product");
                        
        return $res;
    }
    
    function getAllProductsJOIN($Page, $MaxRes, $SqlSearchrArr = null) {
        
        $db = new SQL_Conect_PDO();    
         
        $ArrPars = null;
        $SqlSearchr = '';
        if ($SqlSearchrArr) {
            $SqlSearchr = $SqlSearchrArr["s"];
            $ArrPars = $SqlSearchrArr["d"];
        }
        
        $sql = "SELECT COUNT(`Id`) "
                . "FROM `products` "
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
        
        $sql = "SELECT p.*, c.`Name` as CategoriName, s.`Name` as SubCategoriName FROM `categories` as c, "
                . "`products` as p, "
                . "`sub_categories` as s "
                . "WHERE "
                    . "c.`Id` = p.`Id_categories` "
                    . "AND p.`Id_sub_categories` = s.`Id` "
                .($SqlSearchr ? "AND p.$SqlSearchr" : '')
                . "ORDER BY `p`.`Name` ASC  "
                . $arr["SQL"];

        $db->SetQuery($sql, $ArrPars);                        
        $res['Products'] = $db->GetQueryAll_Class("Product");
                        
        return $res;
    }
}
