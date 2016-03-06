<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Product
 *
 * @author Prog1
 */
class Product {
    //put your code here
    
    public $Id, $Id_categories, $Id_sub_categories, $Name, $Count, $Description, $Prise;
    
    public $CategoriName, $SubCategoriName;
 
    public function getProductInfoById($Id) {
        
        $db = new SQL_Conect_PDO();

        $sql = "SELECT * FROM `products` WHERE `Id` = :id LIMIT 1;";

        $ArrPars['id'] = $Id;

        $db->SetQuery($sql, $ArrPars);
        $res = $db->GetQueryOne_Class("Product");
        
        return $res;
    }
    
    
}
