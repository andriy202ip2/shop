<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of ProductsController
 *
 * @author Prog1
 */
class ProductsController extends ControllerBase {
    //put your code here
    
    public $MaxRes = 5;


    //echo SetControllers::$Id;
    
    function Index_Action() {
            
        if ($this->Id_int < 0) {
            header('Location: /404.html');  
            exit();
        }
        
        $Products = new Products();
        $res = $Products->getAllProductsJOIN($this->Id_int, $this->MaxRes);
        
        if (!$res['Products']) {
            header('Location: /404.html');  
            exit();
        }

        $res['url'] = '/Products/Index/';
        
        $this->View($res);
        
    }

    function ProductsByCategori_Action() {
        
        if ($this->Id_int < 0 || $this->Id2_int < 0) {
            header('Location: /');  
            exit();
        }
        
        $Products = new Products();
        $res = $Products->getProductsByCategoriJOIN($this->Id_int, $this->Id2_int, $this->MaxRes);
        
        if (!$res['Products']) {
            header('Location: /');  
            exit();
        }

        $res['url'] = '/Products/ProductsByCategori/'.$this->Id_int.'/';
        
        $this->View($res);
    }
    
    function ProductsBySubCategori_Action() {
        
        if ($this->Id_int < 0 || $this->Id2_int < 0) {
            header('Location: /');  
            exit();
        }
        
        $Products = new Products();
        $res = $Products->getProductsBySubCategoriJOIN($this->Id_int, $this->Id2_int, $this->MaxRes);
        
        if (!$res['Products']) {
            header('Location: /');  
            exit();
        }

        $res['url'] = '/Products/ProductsBySubCategori/'.$this->Id_int.'/';
        
        $this->View($res);
    }
    
    function SubCategories_Action() {
        
        if ($this->Id_int < 0) {
            header('Location: /');  
            exit();
        }
        
        $Categori = new Categori();
        $Categori = $Categori->getCategoriById($this->Id_int);
        
        if (!$Categori) {
            header('Location: /');
            exit();
        }
        
        $SubCategories = new SubCategories();
        $SubCategories = $SubCategories->getSubCategoriesById($Categori->Id);
        
        if (!$SubCategories) {
            header('Location: /');
            exit();
        }
        
        $Arr['Categori'] = $Categori;
        $Arr['SubCategories'] = $SubCategories;
        
        $this->View($Arr);
    }
    
    function Categories_Action(){
        
        $Categories = new Categories();
        $res['Categories'] = $Categories->GetAllCategories();
           
        $this->View($res);
       
    }
            

    
}
