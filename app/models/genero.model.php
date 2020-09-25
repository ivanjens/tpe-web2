<?php

class GeneroModel{

    private $db;

    function __construct(){
        $this->db = $this->connect();
    }

    private function connect() {
        $db = new PDO('mysql:host=localhost;'.'dbname=bd_libreria;charset=utf8', 'root', '');
        return $db;
    }

    function getAll(){
        $query = $this->db->prepare('SELECT * FROM genero');
        $query->execute();
        $generos = $query->fetchAll(PDO::FETCH_OBJ);

        return $generos;
    }

    function delete($id){
        $query = $this->db->prepare('DELETE FROM genero WHERE id = ?');
        $query->execute([$id]);
    }

    function insert($nombre){
        $query = $this->db->prepare('INSERT INTO genero (nombre) VALUES ?');
        $query->execute([$nombre]);
    }

    function update($id, $nombre){
        $query = $this->db->prepare('UPDATE genero SET nombre = ? WHERE id = ?');
        $query->execute([$id, $nombre]);
    }
}