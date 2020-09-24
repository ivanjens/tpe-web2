<?php

class GeneroModel{

    private $db;

    function __construct(){
        $this->$db = $this->connect();
    }

    private function connect() {
        $db = new PDO('mysql:host=localhost;'.'dbname=db_todolist;charset=utf8', 'root', '');
        return $db;
    }

    function getAll(){

        $query = $this->db->prepare('SELECT * FROM libro');
        $query->execute();

        $libros = $query->fetchAll(PDO::FETCH_OBJ);

        return $libros;
    }
}