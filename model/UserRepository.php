<?php

require_once('model/PDORepository.php');
class UserRepository extends PDORepository {

    private static $instance;

    public static function getInstance() {

        if (!isset(self::$instance)) {
            self::$instance = new self();
        }

        return self::$instance;
    }

    private function __construct() {
        
    }

    public function getUserByMailAndPass($datos){
        $resultados=$this->queryList("SELECT * FROM user WHERE mail=? AND pass=?",[$datos['mail'], $datos['pass']]);
        return $resultados;
    }

}
