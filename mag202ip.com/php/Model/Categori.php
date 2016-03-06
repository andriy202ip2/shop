<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Categori
 *
 * @author Prog1
 */
class Categori {

    //put your code here

    public $Id, $Name;

    public function getCategoriById($id) {

        $db = new SQL_Conect_PDO();
        $sql = "SELECT * FROM `categories` WHERE `Id` = :Id LIMIT 1;";

        $ArrPars['Id'] = $id;

        $db->SetQuery($sql, $ArrPars);
        $res = $db->GetQueryOne_Class("Categori");

        return $res;
    }

    public function getFirstCategoriId() {

        $db = new SQL_Conect_PDO();
        $sql = "SELECT `Id` FROM `categories` ORDER BY `Id` ASC LIMIT 1;";

        $db->SetQuery($sql);
        $res = $db->GetQueryOneAssoc();

        return $res[0];

    }

    public function IsCategori($Id) {
        
        if ($Id <= 0) {
            return false;
        }
        
        $db = new SQL_Conect_PDO();
        $sql = "SELECT `Id` FROM `categories` WHERE `Id` = :Id LIMIT 1;";

        $ArrPars['Id'] = $Id;
        $db->SetQuery($sql, $ArrPars);
        $res = $db->GetQueryOne_Class();

        if ($res) {
            return true;
        }
        
        return false;
    }
    //
}
