<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of ControllerBase
 *
 * @author Prog1
 */
class ControllerBase {
    //put your code here
    
    public $TPL_Base = 'index';
    public $TPL_Action = null;        
    
    private $Controler;
    private $Action;
    
    public $Id;
    public $Id_int;
    
    public $Id2;
    public $Id2_int;
    
    function ControllerBase($arrParam = null){
                
        if ($arrParam != null) {
                 
            for ($i = 0; $i < 4; $i++) {
                settype($arrParam[$i], 'string');
            }
            
            $this->Controler = $arrParam[0];
            $this->Action = $arrParam[1];
            $this->Id = $arrParam[2];   
            $this->Id2 = $arrParam[3];
            
            $this->TPL_Base = null;
            //----------------------
            
        } else {
            
            $this->Controler = SetControllers::$Controler;
            $this->Action = SetControllers::$Action;
            $this->Id = SetControllers::$Id;          
            $this->Id2 = SetControllers::$Id2;
        }
        
        $this->Id_int = $this->Id;
        settype($this->Id_int, "int");
        
        $this->Id2_int = $this->Id2;
        settype($this->Id2_int, "int");
        
        $var = ucfirst($this->Action).'_Action';
        if (method_exists ( $this , $var )) {
            
            $this -> $var();          
            
        } else {
            
            $this -> Index_Action();            
        }
        
    }
    
    
    function View($Args = null){
        
        
        if ($this->TPL_Action != null) {
            $Action = $this->TPL_Action;
        } else {
            $Action = $this->Action;
        }       
        
        $controller = str_replace("Controller", "", $this->Controler);
        $url = View_DIR.$controller.'/'.$Action.'.php';
        if (file_exists($url)) {
            
            ob_start();                
            require $url;
            $ob_TPL_Sub = ob_get_contents();
            ob_end_clean();
            
        }
        
        if ($this->TPL_Base != null) {
            
            ob_start();                
            require_once View_DIR.'Base/'.$this->TPL_Base.'.php';
            $ob_TPL_Base = ob_get_contents();
            ob_end_clean();
            
            echo $ob_TPL_Base;
            
        } elseif (isset ($ob_TPL_Sub)) {
            
            echo $ob_TPL_Sub;
        }
        
    }
            
    
    
    function Index_Action() {
        exit();
        //echo 'Index_Action base';
    }
    
}
