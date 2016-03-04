<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Orders
 *
 * @author Prog1
 */
class Orders {

    //put your code here

    function GetUserAllOrdersInfo($IdUser, $Page, $MaxRes) {

        $db = new SQL_Conect_PDO();

        $sql = "SELECT COUNT(`Id`) FROM `orders` WHERE `Id_user` = :IdUser";
        $db->SetQuery($sql, array('IdUser' => $IdUser));
        $res['Count'] = $db->GetQueryCount();

        if (!$res['Count']) {
            return false;
        }

        //$Page, $MaxPages, $AllRes
        $arr = $db->SqlLimit($Page, $MaxRes, $res['Count']);
        $res['Page'] = $arr['Page'];
        $res['Pages'] = $arr['Pages'];

        $sql = "SELECT o.`Id`, o.`Count`, "
                . "p.`Name`, p.`Description`, p.`Prise`, "
                . "c.`Name` as CategoriName,sc.`Name` as SubCategoriName,"
                . "o.`Count` * p.`Prise` as PriseAll "
                . "FROM `orders` as o ,"
                . "`products` as p,"
                . "`categories` as c ,"
                . "`sub_categories` as sc "
                . "WHERE "
                . "p.`Id` = o.`Id_product` "
                . "AND c.`Id` = p.Id_categories "
                . "AND sc.`Id` = p.`Id_sub_categories` "
                . "AND o.`Id_user` = :IdUser "
                . "ORDER BY `p`.`Name` ASC"
                . $arr["SQL"];

        $db->SetQuery($sql, array('IdUser' => $IdUser));
        $res['Orders'] = $db->GetQueryAll_Class("Order");

        //var_dump($res);

        return $res;
    }

    function GetAllOrdersInfo($Page, $MaxRes) {
        
        $db = new SQL_Conect_PDO();

        $sql = "SELECT COUNT(`Id`) FROM `orders`";
        $db->SetQuery($sql);
        $res['Count'] = $db->GetQueryCount();

        if (!$res['Count']) {
            return false;
        }

        //$Page, $MaxPages, $AllRes
        $arr = $db->SqlLimit($Page, $MaxRes, $res['Count']);
        $res['Page'] = $arr['Page'];
        $res['Pages'] = $arr['Pages'];

        $sql = "SELECT o.`Id`, o.`Count`, o.`Id_product`, o.`Id_user`, "
                . "p.`Name`, p.`Description`, p.`Prise`, "
                . "c.`Name` as CategoriName,sc.`Name` as SubCategoriName,"
                . "o.`Count` * p.`Prise` as PriseAll "
                . "FROM `orders` as o ,"
                . "`products` as p,"
                . "`categories` as c ,"
                . "`sub_categories` as sc "
                . "WHERE "
                . "p.`Id` = o.`Id_product` "
                . "AND c.`Id` = p.Id_categories "
                . "AND sc.`Id` = p.`Id_sub_categories` "
                . "ORDER BY `p`.`Name` ASC"
                . $arr["SQL"];

        $db->SetQuery($sql);
        $res['Orders'] = $db->GetQueryAll_Class("Order");

        //var_dump($res);

        return $res;
    }

}
