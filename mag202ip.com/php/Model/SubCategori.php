<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of SubCategori
 *
 * @author Prog1
 */
class SubCategori {

    public $Id, $Id_categori, $Name;
    public $CategoriName;

    public function getSubCategoriById($id) {
        
        $db = new SQL_Conect_PDO();        
        $sql = "SELECT * FROM `sub_categories` WHERE `Id` = :Id LIMIT 1;";
        
        $ArrPars['Id'] = $id;        

        $db->SetQuery($sql, $ArrPars);                        
        $res = $db->GetQueryOne_Class("SubCategori");
                        
        return $res;
        
    }
    
    public function IsSubCategoriStrukt($CategoriId, $SubCategoriId) {
        
        if ($CategoriId <= 0 || $SubCategoriId <= 0) {
            return false;
        }
        
        $db = new SQL_Conect_PDO();
        $sql = "SELECT `Id` FROM `sub_categories` WHERE "
                . "`Id` = :SubCategoriId "
                . "AND `Id_categori` = :CategoriId "
                . "LIMIT 1;";

        $db->SetQuery($sql, array('CategoriId' => $CategoriId, 'SubCategoriId' => $SubCategoriId));
        $res = $db->GetQueryOne_Class();

        if ($res) {
            return true;
        }
        
        return false;
        
    }
    
//, $NameCategori
    //put your code here
}
