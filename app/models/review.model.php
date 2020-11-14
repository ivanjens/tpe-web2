<?php

include_once 'app/helpers/db.helper.php';

class ReviewModel{

    private $db;
    private $dbHelper;

    function __construct(){
        $this->dbHelper = new DatabaseHelper();
        $this->db = $this->dbHelper->connect();
    }

    // obtiene todas las reseñas que existan
    function getAll(){
        $query = $this->db->prepare('SELECT * FROM reseña');
        $query->execute();
        $reviews = $query->fetchAll(PDO::FETCH_OBJ);
        return $reviews;
    }

    // obtiene todas las reseñas de un libro
    function getByBook($id_book){
        $query = $this->db->prepare('SELECT * FROM reseña WHERE id_libro = ?');
        $query->execute([$id_book]);
        $reviews = $query->fetchAll(PDO::FETCH_OBJ);
        return $reviews;
    }

    // obtiene una reseña en especifico
    function get($id){
        $query = $this->db->prepare('SELECT * FROM reseña WHERE id = ?');
        $query->execute([$id]);
        $review = $query->fetch(PDO::FETCH_OBJ);
        return $review;
    }
}