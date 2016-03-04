<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Categories
 *
 * @author Prog1
 */
class Categories {
    //put your code here
    
    function GetAllCategories() {
                
        $db = new SQL_Conect_PDO();        
        $sql = "SELECT * FROM `categories` ORDER BY `Name` ASC;";
        
        $db->SetQuery($sql);                        
        $res = $db->GetQueryAll_Class("Categori");
        
        return $res;
    }
    
}
