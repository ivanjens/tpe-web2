<?php

include_once 'app/helpers/db.helper.php';

class ReviewModel{

    private $db;
    private $dbHelper;

    function __construct(){
        $this->dbHelper = new DatabaseHelper();
        $this->db = $this->dbHelper->connect();
    }

    // obtiene todas las reseñas de un libro
    function getByBook($id_book){
        $query = $this->db->prepare('SELECT reseña.*, usuario.nombre AS nombre_usuario FROM reseña INNER JOIN usuario ON reseña.id_usuario = usuario.id WHERE id_libro = ? ORDER BY fecha DESC');
        $query->execute([$id_book]);
        $reviews = $query->fetchAll(PDO::FETCH_OBJ);

        return $reviews;
    }

    function searchReviewByUser($id_book, $id_user){
        $query = $this->db->prepare('SELECT * FROM reseña WHERE id_usuario = ? AND id_libro = ?');
        $query->execute([$id_user, $id_book]);
        $review = $query->fetch(PDO::FETCH_OBJ);

        return $review;
    }

    // obtiene las valoraciones de un libro
    function getPunctuation($id_book){
        $query = $this->db->prepare('SELECT valoracion FROM reseña WHERE id_libro = ?');
        $query->execute([$id_book]);
        $books_quantity = $query->rowCount();
        $punctuations = $query->fetchAll(PDO::FETCH_OBJ);
        $items_array = array('books'=>$books_quantity, 'punctuations'=>$punctuations);
        
        return $items_array; 
    }

    // obtiene una reseña en especifico
    function get($id){
        $query = $this->db->prepare('SELECT * FROM reseña WHERE id = ?');
        $query->execute([$id]);
        $review = $query->fetch(PDO::FETCH_OBJ);

        return $review;
    }

    // inserta una nueva reseña en la base de datos
    function insert($comentario, $valoracion, $id_usuario, $id_libro) {
        $query = $this->db->prepare('INSERT INTO reseña (comentario, valoracion, id_usuario, id_libro) VALUES (?,?,?,?)');
        $query->execute([$comentario, $valoracion, $id_usuario, $id_libro]);

        return $this->db->lastInsertId();
    }

    //elimina una reseña de la base de datos
    function remove($id) {  
        $query = $this->db->prepare('DELETE FROM reseña WHERE id = ?');
        $query->execute([$id]);
        
        return $query->rowCount();
  }
}