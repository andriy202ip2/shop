<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of SubCategories
 *
 * @author Prog1
 */
class SubCategories {
    //put your code here
    
    function getSubCategoriesById($id) {
        
        $db = new SQL_Conect_PDO();        
        $sql = "SELECT * FROM `sub_categories` WHERE `Id_categori` = :Id "
                . "ORDER BY `Name` ASC ";
        
        $ArrPars['Id'] = $id;        

        $db->SetQuery($sql, $ArrPars);                        
        $res = $db->GetQueryAll_Class("SubCategori");
                        
        return $res;
    }
    
    
}
