<?php
require_once('model/UserRepository.php');
require_once('model/ResourceRepository.php');
class LoginController {
    
    private static $instance;

    public static function getInstance() {

        if (!isset(self::$instance)) {
            self::$instance = new self();
        }

        return self::$instance;
    }
    
    private function __construct() {
        
    }

    public function showLogin(){
        $view = new Login();
        $view->loginShow();
    }

    public function login($datosPost){
        $resultados=UserRepository::getInstance()->GetUserByMailAndPass($datosPost);
        if($resultados!=NULL){
            $user=$resultados[0];
            $_SESSION['id']=$user['id'];
            $_SESSION['rol']=$user['rol'];
            $_SESSION['nombre']=$user['nombre'];
            ResourceController::getInstance()->home();
        }else{
            $view = new Error();
            $error=array('error'=> "Usuario o contraseña incorrectos");
            $view->show($error);
        }
    }

    public function logout(){
        session_unset();
        ResourceController::getInstance()->home();
    }
    
}