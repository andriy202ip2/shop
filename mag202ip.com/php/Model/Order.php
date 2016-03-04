<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Order
 *
 * @author Prog1
 */
class Order {
    //put your code here
    
    public $Id, $Count, $Name, $Description, $Prise, $CategoriName, $SubCategoriName, $PriseAll, $Id_user, $Id_product;
    public $UserFirstName, $UserLastName;
    
    function GetPproductById($Id) {
        
        $db = new SQL_Conect_PDO();        
        $sql = "SELECT `Id`, `Prise`, `Count` FROM `products` WHERE `Id` = :Id LIMIT 1;";
        
        $ArrPars['Id'] = $Id;
        
        $db->SetQuery($sql, $ArrPars);                        
        $res = $db->GetQueryOne_Class();
        
        if (!$res){            
            F_Help::$E['message'] = 'Now this product !';            
            return false;
        }
        
        return $res;
    }
    
    function BayPproductById($Id, $Prise) {
        
        $db = new SQL_Conect_PDO();        
        $sql = "UPDATE `products` SET `Count` = `Count`-1 WHERE `Id` = :Id LIMIT 1;";
        
        $db->SetQuery($sql, array('Id' => $Id)); 
        
        $sql = "SELECT `Count` FROM `orders` WHERE `Id_product` = :Id LIMIT 1;";
        $db->SetQuery($sql, array('Id' => $Id));
        $res = $db->GetQueryOne_Class();
        
        if ($res) {
            
            $sql = "UPDATE `orders` "
                    . "SET `Count` = `Count`+1 WHERE `Id_product` = :Id LIMIT 1;";
            $db->SetQuery($sql, array('Id' => $Id));
            
        } else {
            $sql = "INSERT INTO `orders` (`Id`, `Id_product`, `Id_user`, `Count`) "
                    . "VALUES (NULL, :Id, :IdUser, '1');";
            $db->SetQuery($sql, array('Id' => $Id, 'IdUser' => User::$User->Id));
        }
        
        $sql = "UPDATE `users` SET `Money` = `Money` - :Prise WHERE `Id` = :IdUser LIMIT 1;";
        $db->SetQuery($sql, array('Prise' => $Prise, 'IdUser' => User::$User->Id));

        //var_dump('$expression');
    }
    
    
}
