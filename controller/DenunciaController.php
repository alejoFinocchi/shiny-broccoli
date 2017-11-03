<?php
require_once('model/DenunciaRepository.php');
require_once('controller/ResourceController.php');
class DenunciaController {
    
    private static $instance;

    public static function getInstance() {

        if (!isset(self::$instance)) {
            self::$instance = new self();
        }

        return self::$instance;
    }
    
    private function __construct() {
        
    }

    public function show(){
        $view = new Denuncias();
        $view->show();
    }

    public function showDenuncias(){
        $denuncias=DenunciaRepository::getInstance()->getDenunciasNoAsignadas();
        $view = new Denuncias();
        $view->showDenuncias($denuncias);
    }

    public function addDenuncia($dataPost){
        $bool=DenunciaRepository::getInstance()->addDenuncia($dataPost);
        if($bool){
        self::getInstance()->showDenuncias();
        }else{
            $view = new Denuncias();
            $view->show(array('error' => "Error en la actualizacion del sistema"));
        }
    }

    public function asignar($dataGet){
        $bool=DenunciaRepository::getInstance()->asignarDenuncia($dataGet);
        if($bool){
            self::getInstance()->showDenuncias();
        }else{
            $view = new Denuncias();
            $view->show(array('error' => "Error en la actualizacion del sistema"));
        }

    }

    
}