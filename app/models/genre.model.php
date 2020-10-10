<?php

class GenreModel{

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
        $genres = $query->fetchAll(PDO::FETCH_OBJ);

        return $genres;
    }

    function get($id){
        $query = $this->db->prepare('SELECT * FROM genero WHERE id = ?');
        $query->execute([$id]);
        
        $genre = $query->fetch(PDO::FETCH_OBJ);
        return $genre;
    }

    function delete($id){
        $query = $this->db->prepare('DELETE FROM genero WHERE id = ?');
        $query->execute([$id]);
    }

    function insert($name){
        $query = $this->db->prepare('INSERT INTO genero (id, nombre) VALUES (NULL, ?)');
        $query->execute([$name]);
    }

    function update($id, $name){
        $query = $this->db->prepare('UPDATE genero SET nombre = ? WHERE id = ?');
        $query->execute([$name, $id]);
    }
}