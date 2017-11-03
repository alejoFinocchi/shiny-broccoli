<?php

    class User{

        private $id;
        private $nombre;
        private $apellido;
        private $mail;
        private $rol;

        public function __construct($id,$nombre,$apellido,$mail,$rol){
            $this->id=$id;
            $this->nombre=$nombre;
            $this->apellido=$apellido;
            $this->mail=$mail;
            $this->rol=$rol;
        }


    }
?>