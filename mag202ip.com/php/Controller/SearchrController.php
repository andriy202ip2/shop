<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of SearchrController
 *
 * @author Prog1
 */
class SearchrController extends ControllerBase {

    //put your code here

    public $MaxRes = 5;

    function Products_Action() {

        $this->TPL_Base = null;

        $arr['css'] = "products-searchr";

        $this->View($arr);
    }

    function ProductsAdmin_Action() {

        $this->TPL_Base = null;
        $this->TPL_Action = 'Products';
        $arr['css'] = "products-admin-searchr";

        $this->View($arr);
    }

    function Orders_Action() {
        $this->TPL_Base = null;

        $arr['css'] = "orders-searchr";
        $this->View($arr);
    }
    
    function OrdersAdmin_Action() {
        
        $this->TPL_Base = null;

        $arr['css'] = "orders-admin-searchr";
        $this->View($arr);
    }
    
    function UsersAdmin_Action() {
        
        $this->TPL_Base = null;

        $arr['css'] = "users-admin-searchr";
        $this->View($arr);
    }
    
    function ProductsGet_Action() {

        $Searchr = new Searchr();

        $so = array('Id', 'Name', 'Description', 'Prise', 'Count');

        if (!$Searchr->isProductsSearchrGetOk($so)) {
            header('Location: /');
            exit();
        }

        if ($this->Id_int < 0) {
            header('Location: /');
            exit();
        }

        $db = new SQL_Conect_PDO();
        $SqlSearchrArr = $db->getValidSqlSearchr($_GET['s'], $_GET['so'], $so, array('Id' => '=', 'Prise' => '<=', 'Count' => '>='));

        if (!$SqlSearchrArr) {
            header('Location: /');
            exit();
        }

        $Products = new Products();
        $arr = $Products->getAllProductsJOIN($this->Id_int, $this->MaxRes, $SqlSearchrArr);

        $arr['url'] = '/Searchr/ProductsGet/';

        $arr['GETurl'] = $this->GETurl;
        $arr['css'] = "products-searchr";

        $this->View($arr);
    }

}
