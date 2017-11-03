<?php

    class User{

        private $id;
        private $direccion;
        private $cant_menores;
        private $descripcion;
        private $asignada;

        public function __construct($id,$direccion,$cant_menores,$descripcion,$asignada){
            $this->id=$id;
            $this->direccion=$direccion;
            $this->cant_menores=$cant_menores;
            $this->descripcion=$descripcion;
            $this->asignada=$asignada;
        }


    }
?>