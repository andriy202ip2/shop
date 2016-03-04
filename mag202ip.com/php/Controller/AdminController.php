<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of AdminController
 *
 * @author Prog1
 */
class AdminController extends ControllerBase {

    //put your code here

    public $MaxRes = 3;

    //echo SetControllers::$Id;

    function Index_Action() {

        $this->IsAdmin();
        $this->View();
    }

    // <editor-fold defaultstate="collapsed" desc="Users">

    function Users_Action() {
        $this->IsAdmin();

        if ($this->Id_int < 0) {
            header('Location: /');
            exit();
        }

        $Admin = new Admin();
        $res = $Admin->getAllUsers($this->Id_int, $this->MaxRes);

        $res['url'] = '/Admin/Users/';

        $this->View($res);
    }

    function UserDell_Action() {
        $this->IsAdmin();

        $F = new F_Help();

        $arr[] = 'Id';
        if (!$F->IsOllPostSet($arr)) {
            return;
        }

        if ($_POST['Id'] == $_SESSION['Id']) {

            F_Help::$E['message'] = 'You can not remove themselves !';
        } else {
            $Admin = new Admin();
            $Admin->UserDell($_POST['Id']);
        }

        $res['e'] = F_Help::$E;
        $res = json_encode($res);

        echo $res;
    }

    function UserInfo_Action() {

        $this->IsAdmin();

        if ($this->Id_int < 0) {
            header('Location: /');
            exit();
        }

        $user = new User();
        $res = $user->getUserInfoById($this->Id_int);

        $this->View($res);
    }

    function UserEdit_Action() {

        $this->IsAdmin();

        $arr[] = 'Id';
        $arr[] = 'Email';
        $arr[] = 'Pass';
        $arr[] = 'Pass2';
        $arr[] = 'FirstName';
        $arr[] = 'LastName';
        $arr[] = 'Money';
        $arr[] = 'RightsAccess';

        $F = new F_Help();

        if (!$F->IsOllPostSet($arr)) {
            return;
        }

        settype($_POST['Id'], 'int');
        if ($_POST['Id'] <= 0) {
            return;
        }

        $F->IsValidEmail($_POST['Email'], 'Email');

        if (mb_strlen($_POST['Pass']) != 0 ||
                mb_strlen($_POST['Pass2']) != 0) {

            $F->IsValidPass($_POST['Pass'], 'Pass');
            $F->IsCompare($_POST['Pass'], $_POST['Pass2'], 'Pass2');
        }

        $F->IsStrMinNax($_POST['FirstName'], 3, 30, 'FirstName');
        $F->IsCtypeAlpha($_POST['FirstName'], 'FirstName');

        $F->IsStrMinNax($_POST['LastName'], 3, 30, 'LastName');
        $F->IsCtypeAlpha($_POST['LastName'], 'LastName');

        $F->IsNumeric($_POST['Money'], 'Money');
        $F->IsNumericMin($_POST['Money'], 0, 'Money');

        $F->IsNumeric($_POST['RightsAccess'], 'RightsAccess');
        $F->IsNumericMinNax($_POST['RightsAccess'], 0, 255, 'RightsAccess');

        if (F_Help::$E == null) {

            $user = new User();
            $user = $user->getUserInfoById($_POST['Id']);
            if ($_POST['Email'] != $user->Email) {

                $IsUnique = $user->IsUniqueUserEmail($_POST['Email']);

                if (!$IsUnique) {

                    F_Help::$E['Email'] = "This login already exists !";
                }
            }

            if (F_Help::$E == null) {
                $user->Edit($_POST, $_POST['Id'], true);
            }
        }

        $res['e'] = F_Help::$E;
        $res = json_encode($res);

        echo $res;
    }

    // </editor-fold>
    // <editor-fold defaultstate="collapsed" desc="Categories">

    function Categories_Action() {
        $this->IsAdmin();

        if ($this->Id_int < 0) {
            header('Location: /');
            exit();
        }

        $Admin = new Admin();
        $res = $Admin->getAllCategories($this->Id_int, $this->MaxRes);

        $res['url'] = '/Admin/Categories/';

        $this->View($res);
    }

    function CategoriDell_Action() {
        $this->IsAdmin();

        $F = new F_Help();

        $arr[] = 'Id';
        if (!$F->IsOllPostSet($arr)) {
            return;
        }

        $Admin = new Admin();
        $Admin->CategoriDell($_POST['Id']);

        $res['e'] = F_Help::$E;
        $res = json_encode($res);

        echo $res;
    }

    function CategoriInfo_Action() {
        $this->IsAdmin();

        if ($this->Id_int < 0) {
            header('Location: /');
            exit();
        }

        $res = $Categori = new Categori();
        if ($this->Id_int > 0) {
            $res = $Categori->getCategoriById($this->Id_int);
        }

        $this->View($res);
    }

    function CategoriEdit_Action() {
        $this->IsAdmin();

        $arr[] = 'Id';
        $arr[] = 'Name';

        $F = new F_Help();

        if (!$F->IsOllPostSet($arr)) {
            return;
        }

        settype($_POST['Id'], 'int');

        $F->IsStrMinNax($_POST['Name'], 3, 30, 'Name');
        $F->IsCtypeAlpha($_POST['Name'], 'Name');

        if (F_Help::$E == null) {

            $Admin = new Admin();
            $Admin->CategoriEditOreAdd($_POST, $_POST['Id']);
        }

        $res['e'] = F_Help::$E;
        $res = json_encode($res);

        echo $res;
    }

    // </editor-fold>
    // <editor-fold defaultstate="collapsed" desc="SubCategories">
    function SubCategories_Action() {
        $this->IsAdmin();

        if ($this->Id_int < 0) {
            header('Location: /');
            exit();
        }

        $Admin = new Admin();
        $res = $Admin->getAllSubCategories($this->Id_int, $this->MaxRes);

        $res['url'] = '/Admin/SubCategories/';

        $this->View($res);
    }

    function SubCategoriDell_Action() {
        $this->IsAdmin();

        $F = new F_Help();

        $arr[] = 'Id';
        if (!$F->IsOllPostSet($arr)) {
            return;
        }

        $Admin = new Admin();
        $Admin->SubCategoriDell($_POST['Id']);

        $res['e'] = F_Help::$E;
        $res = json_encode($res);

        echo $res;
    }

    function SubCategoriInfo_Action() {

        $this->IsAdmin();

        if ($this->Id_int < 0) {
            header('Location: /');
            exit();
        }

        $res = $SubCategori = new SubCategori();
        if ($this->Id_int > 0) {
            $res = $SubCategori->getSubCategoriById($this->Id_int);
        }

        $arr['SubCategori'] = $res;

        $Categories = new Categories();
        $arr['AllCategories'] = $Categories->GetAllCategories();

        $this->View($arr);
    }

    function SubCategoriEdit_Action() {
        $this->IsAdmin();

        $arr[] = 'Id';
        $arr[] = 'Name';
        $arr[] = 'CategoriId';

        $F = new F_Help();

        if (!$F->IsOllPostSet($arr)) {
            return;
        }

        settype($_POST['Id'], 'int');

        $F->IsStrMinNax($_POST['Name'], 3, 30, 'Name');
        $F->IsCtypeAlpha($_POST['Name'], 'Name');

        if (F_Help::$E == null) {

            $Admin = new Admin();
            $Admin->SubCategoriEditOreAdd($_POST, $_POST['Id']);
        }

        $res['e'] = F_Help::$E;
        $res = json_encode($res);

        echo $res;
    }

    // </editor-fold>   
    // <editor-fold defaultstate="collapsed" desc="Orders">
    function Orders_Action() {
        $this->IsAdmin();

        if ($this->Id_int < 0) {
            header('Location: /');
            exit();
        }

        $Orders = new Orders();
        $res = $Orders->GetAllOrdersInfo($this->Id_int, $this->MaxRes);

        $res['url'] = '/Admin/Orders/';

        //var_dump($res);

        $this->View($res);
    }

    function OrderDell_Action() {
        
        $this->IsAdmin();

        $F = new F_Help();

        $arr[] = 'Id';
        if (!$F->IsOllPostSet($arr)) {
            return;
        }

        $Admin = new Admin();
        $Admin->OrderDell($_POST['Id']);

        $res['e'] = F_Help::$E;
        $res = json_encode($res);

        echo $res;
    }

    // </editor-fold>     

    function Products_Action() {
        $this->IsAdmin();

        echo 'Products_Action';
    }

    protected function IsAdmin() {

        if (!isset($_SESSION['RightsAccess']) || $_SESSION['RightsAccess'] <= 0) {

            header('Location: /');
            exit();
        }
    }

}