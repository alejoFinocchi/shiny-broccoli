<?php

class UserController {
    
    private static $instance;

    public static function getInstance() {

        if (!isset(self::$instance)) {
            self::$instance = new self();
        }

        return self::$instance;
    }
    
    private function __construct() {
        
    }


    public function usuarioLogueado(){
        if(isset($_SESSION['id'])){
            return true;
        }else{
            return false;
        }
    }
    
}