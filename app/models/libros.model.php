<?php

class LibrosModel{

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

        // Se guardan los objetos en $libros para retornarla al controller y enviarlas al view
        $libros = $query->fetchAll(PDO::FETCH_OBJ);
        return $libros;
    }

    function get($id){
        $query = $this->db->prepare('SELECT * FROM libro WHERE id = ?');
        $query->execute([$id]);

        $libro = $query->fetchAll(PDO::FETCH_OBJ);
        return $libro;
    }

    // Inserta un nuevo libro en la tabla
    function insert($libro){
        $query = $this->db->prepare('INSERT INTO libro (titulo, autor, editorial, sinopsis, precio, stock, id_genero) VALUES (?, ?, ?, ?, ?, ?, ?)');
        // se completan los campos en el execute con el array asociativo pasado por parametro
        $query->execute([$libro['titulo'], $libro['autor'], $libro['editorial'], $libro['sinopsis'], $libro['precio'], $libro['stock'], $libro['id_genero']]);
    }

    // borra un libro especifico de la tabla
    function delete($id){
        $query = $this->db->prepare('DELETE FROM libro WHERE id = ?');
        $query->execute([$id]);
    }

    function update($id, $libro){
        $query = $this->db->prepare('UPDATE libro SET titulo = ?, autor = ?, editorial = ?, sinopsis = ?, precio = ?, stock = ?, id_genero = ? WHERE id = ?');
        $query->execute([$libro['titulo'], $libro['autor'], $libro['editorial'], $libro['sinopsis'], $libro['precio'], $libro['stock'], $libro['id_genero'], $id]);
    }
}