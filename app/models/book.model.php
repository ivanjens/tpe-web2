<?php

include_once 'app/helpers/db.helper.php';

class BookModel{

    private $db;
    private $dbHelper;

    function __construct(){
        $this->dbHelper = new DatabaseHelper();
        $this->db = $this->dbHelper->connect();
    }

    // Obtiene todos los libros que están en la tabla
    function getAll(){
        $query = $this->db->prepare('SELECT * FROM libro');
        $query->execute();
        $books = $query->fetchAll(PDO::FETCH_OBJ);

        return $books;
    }

    // obtiene los datos de un libro en especifico
    function get($id){
        $query = $this->db->prepare('SELECT libro.*, genero.nombre AS genero FROM libro INNER JOIN genero ON libro.id_genero = genero.id WHERE libro.id = ?');
        $query->execute([$id]);
        $book = $query->fetch(PDO::FETCH_OBJ);

        return $book;
    }

    // obtiene los libros que pertenecen a un genero en especifico
    function getByGenre($genre){
        $query = $this->db->prepare('SELECT libro.id AS id_libro, libro.*, genero.nombre FROM `libro` INNER JOIN genero ON libro.id_genero = genero.id WHERE genero.nombre = ?');
        $query->execute([$genre]);
        $books = $query->fetchAll(PDO::FETCH_OBJ);

        return $books;
    }

    // Inserta un nuevo libro en la tabla
    function insert($book, $image = null){
        $query = $this->db->prepare('INSERT INTO libro (titulo, autor, editorial, sinopsis, precio, stock, imagen, id_genero) VALUES (?, ?, ?, ?, ?, ?, ?, ?)');
        $query->execute([$book['titulo'], $book['autor'], $book['editorial'], $book['sinopsis'], $book['precio'], $book['stock'], $image, $book['id_genero']]);
    }

    // borra un libro especifico de la tabla
    function delete($id){
        $query = $this->db->prepare('DELETE FROM libro WHERE id = ?');
        $query->execute([$id]);
    }

    // elimina la portada de un libro
    function removeCover($id){
        $query = $this->db->prepare('UPDATE libro SET imagen = "images/default-book.jpg" WHERE id = ?');
        $query->execute([$id]);
    }

    // actualiza la información de un libro
    function update($id, $book, $image){
        $query = $this->db->prepare('UPDATE libro SET titulo = ?, autor = ?, editorial = ?, sinopsis = ?, precio = ?, stock = ?, imagen = ?, id_genero = ? WHERE id = ?');
        $query->execute([$book['titulo'], $book['autor'], $book['editorial'], $book['sinopsis'], $book['precio'], $book['stock'], $image, $book['id_genero'], $id]);
    }

}