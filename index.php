<?php
session_start();
require_once('controller/ResourceController.php');
require_once('controller/LoginController.php');
require_once('controller/DenunciaController.php');
require_once('model/PDORepository.php');
require_once('model/ResourceRepository.php');
require_once('model/UserRepository.php');
require_once('model/DenunciaRepository.php');
require_once('view/TwigView.php');
require_once('view/Home.php');
require_once('view/Login.php');
require_once('view/Denuncia.php');
require_once('view/Error.php');

if(isset($_GET['action'])){
    $action=$_GET['action'];
    switch($action){
        case 'login_index':
            LoginController::getInstance()->showLogin();
        break;
        case 'login':
            LoginController::getInstance()->login($_POST);
        break;
        case 'logout':
            LoginController::getInstance()->logout();
        break;
        case 'denuncia_form':
            DenunciaController::getInstance()->show();
        break;
        case 'denuncia_new':
            DenunciaController::getInstance()->addDenuncia($_POST);
        break;
        case 'denuncia_list':
            if(isset($_SESSION['id'])){
                DenunciaController::getInstance()->showDenuncias();
            }
            else{
                $view = new Error();
                $error=array('error'=> "Debe iniciar sesion para realizar esta accion");
                $view->show($error);
            }
        break;
        case 'asignar':
            if(isset($_SESSION['id'])){
                DenunciaController::getInstance()->asignar($_GET['id']);
            }
            else{
                $view = new Error();
                $error=array('error'=> "Debe iniciar sesion para realizar esta accion");
                $view->show($error);
            }
        break;
        default:
            ResourceController::getInstance()->home();
        break;
    }
}else{
    ResourceController::getInstance()->home();
}

