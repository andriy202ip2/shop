<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of c_SQL_Fame
 *
 * @author Admin
 */
class SQL_Conect {
    
    private $db_encode;
    public $db_con;
            
    function SQL_Conect($DbConf){

        $this->db_encode = $DbConf['db_encode'];
      
        try {
            
            $this->db_con = new mysqli($DbConf['host'], $DbConf['db_user'], $DbConf['db_password'], $DbConf['db_name']);
            $this->db_con->set_charset($this->db_encode);
            
            if ($this->db_con->errno != 0) {                
                throw new Exception($this->db_con->errno);
            }
            
        } catch (Exception $exc) {
            
            if (IsDebag) {
                echo $exc->getTraceAsString();
            }                        
            exit();
        }
    }
    
    public function CloseConection() {
        $this->db_con->close();
    }

    
}

?>