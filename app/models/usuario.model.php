<?php

class UsuarioModel{

    private $db;

    function __construct(){
        $this->db = $this->connect();
    }

    private function connect() {
        $db = new PDO('mysql:host=localhost;'.'dbname=bd_libreria;charset=utf8', 'root', '');
        return $db;
    }

}