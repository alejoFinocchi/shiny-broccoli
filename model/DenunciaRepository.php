<?php

require_once('model/PDORepository.php');
class DenunciaRepository extends PDORepository {

    private static $instance;

    public static function getInstance() {

        if (!isset(self::$instance)) {
            self::$instance = new self();
        }

        return self::$instance;
    }

    private function __construct() {
        
    }

    public function getDenunciasNoAsignadas(){
        $resultados=$this->queryList("SELECT * FROM denuncia WHERE asignada=?",[0]);
        return $resultados;
    }

    public function asignarDenuncia($id){
        $connection = self::getInstance()->getConnection();
        $query=$connection->prepare("UPDATE denuncia SET asignada=:asignada WHERE id=:id");
        $asd=(int)$id;
        $a=1;
        $query->bindParam(':asignada',$a);
        $query->bindParam(':id',$asd);
        if($query->execute()){
            return true;
        }
        else{
            return false;
        }
    }
    public function addDenuncia($datosPost){
        $connection = self::getInstance()->getConnection();
        $query=$connection->prepare("INSERT INTO denuncia (direccion, cant_menores, descripcion) VALUES (:direccion,:cant_menores,:descripcion)");
        $query->bindParam(':direccion',$datosPost['direccion']);
        $query->bindParam(':cant_menores',$datosPost['cant_menores']);
        $query->bindParam(':descripcion',$datosPost['descripcion']);
        if($query->execute()){
            return true;
        }
        else{
            return false;
        }
    }
}
