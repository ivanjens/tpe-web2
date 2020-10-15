<?php

include_once 'app/helpers/db.helper.php';

class GenreModel{

    private $db;
    private $dbHelper;

    function __construct(){
        $this->dbHelper = new DatabaseHelper();
        $this->db = $this->dbHelper->connect();
    }


    // obtiene todos los generos
    function getAll(){
        $query = $this->db->prepare('SELECT * FROM genero');
        $query->execute();
        $genres = $query->fetchAll(PDO::FETCH_OBJ);

        return $genres;
    }

    // obtiene los datos de un genero en particular
    function get($id){
        $query = $this->db->prepare('SELECT * FROM genero WHERE id = ?');
        $query->execute([$id]);
        
        $genre = $query->fetch(PDO::FETCH_OBJ);
        return $genre;
    }

    // elimina un genero
    function delete($id){
        $query = $this->db->prepare('DELETE FROM genero WHERE id = ?');
        $query->execute([$id]);
    }

    // chequea cuantos libros están asignados a un genero
    function checkGenreItems($id){
        $query = $this->db->prepare('SELECT COUNT(*) as cantidad FROM `genero` INNER JOIN libro ON genero.id = libro.id_genero WHERE libro.id_genero = ?;');
        $query->execute([$id]);

        $result = $query->fetch(PDO::FETCH_OBJ);
        return $result;
    }

    // inserta un nuevo genero en la ddbb
    function insert($name){
        $query = $this->db->prepare('INSERT INTO genero (id, nombre) VALUES (NULL, ?)');
        $query->execute([$name]);
    }

    // actualiza un genero en especifico
    function update($id, $name){
        $query = $this->db->prepare('UPDATE genero SET nombre = ? WHERE id = ?');
        $query->execute([$name, $id]);
    }
}