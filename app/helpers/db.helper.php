<?php

class DatabaseHelper{

    function __construct(){}

    public function connect() { // abre la conexión a la base de datos
        $db = new PDO('mysql:host=localhost;'.'dbname=db_libreria;charset=utf8', 'root', '');
        return $db;
    }

}