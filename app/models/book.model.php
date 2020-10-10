<?php

class BookModel{

    private $db;

    function __construct(){
        $this->db = $this->connect();
    }

    // Abre la conexión a la base de datos
    private function connect() {
        $db = new PDO('mysql:host=localhost;'.'dbname=bd_libreria;charset=utf8', 'root', '');
        return $db;
    }

    // Obtiene todos los libros que están en la tabla
    function getAll(){
        $query = $this->db->prepare('SELECT * FROM libro'); // prepara la consulta
        $query->execute();

        // Se guardan los objetos en $books para retornarla al controller y enviarlas al view
        $books = $query->fetchAll(PDO::FETCH_OBJ);
        return $books;
    }

    function get($id){
        $query = $this->db->prepare('SELECT libro.*, genero.nombre AS genero FROM libro INNER JOIN genero ON libro.id_genero = genero.id WHERE libro.id = ?');
        $query->execute([$id]);

        $book = $query->fetch(PDO::FETCH_OBJ);
        return $book;
    }

    function getByGenre($genre){
        $query = $this->db->prepare('SELECT libro.id AS id_libro, libro.*, genero.nombre FROM `libro` INNER JOIN genero ON libro.id_genero = genero.id WHERE genero.nombre = ?');
        $query->execute([$genre]);
        $books = $query->fetchAll(PDO::FETCH_OBJ);
        return $books;
    }

    // Inserta un nuevo libro en la tabla
    function insert($book){
        $query = $this->db->prepare('INSERT INTO libro (titulo, autor, editorial, sinopsis, precio, stock, id_genero) VALUES (?, ?, ?, ?, ?, ?, ?)');
        // se completan los campos en el execute con el array asociativo pasado por parametro
        $query->execute([$book['titulo'], $book['autor'], $book['editorial'], $book['sinopsis'], $book['precio'], $book['stock'], $book['id_genero']]);
    }

    // borra un libro especifico de la tabla
    function delete($id){
        $query = $this->db->prepare('DELETE FROM libro WHERE id = ?');
        $query->execute([$id]);
    }

    function update($id, $book){
        $query = $this->db->prepare('UPDATE libro SET titulo = ?, autor = ?, editorial = ?, sinopsis = ?, precio = ?, stock = ?, id_genero = ? WHERE id = ?');
        $query->execute([$book['titulo'], $book['autor'], $book['editorial'], $book['sinopsis'], $book['precio'], $book['stock'], $book['id_genero'], $id]);
    }

}