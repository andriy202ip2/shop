<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of OrdersController
 *
 * @author Prog1
 */
class OrdersController extends ControllerBase {

    //put your code here

    public $MaxRes = 1;
    
    function MyOrders_Action() {

        if (!isset($_SESSION['Id']) || $this->Id_int < 0) {

            header('Location: /');
            exit();
        }
                
        if (User::$User == null) {
            $user = new User();
            $user->setUserBySession();
        }

        $Orders  = new Orders();
        $res = $Orders->GetUserAllOrdersInfo($_SESSION['Id'], $this->Id_int, $this->MaxRes);
        
        $res['url'] = '/Orders/MyOrders/';
        
        $this->View($res);
    }

    function BayOrder_Action() {

        settype($_POST['Id'], "int");

        if (!isset($_SESSION['Id']) || $_POST['Id'] <= 0) {

            header('Location: /');
            exit();
        }

        $order = new Order();
        $obj = $order->GetPproductById($_POST['Id']);

        if (F_Help::$E == null) {
            if ($obj->Count == 0) {
                F_Help::$E['message'] = 'Product is not available !';
            }
        }

        if (F_Help::$E == null) {
            if (User::$User == null) {
                $user = new User();
                $user->setUserBySession();
            }

            if ($obj->Prise > User::$User->Money) {
                F_Help::$E['message'] = 'You do not have enough money !';
            } else {
                $order->BayPproductById($_POST['Id'], $obj->Prise);
            }
        }

        $res['e'] = F_Help::$E;
        $res = json_encode($res);

        echo $res;
        //var_dump($_POST);
    }

}
