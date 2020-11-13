<?php

include_once 'app/helpers/db.helper.php';

class UserModel{

    private $db;
    private $dbHelper;

    function __construct(){
        $this->dbHelper = new DatabaseHelper();
        $this->db = $this->dbHelper->connect();
    }

    function getAll(){
        $query = $this->db->prepare('SELECT * FROM usuario');
        $query->execute();

        $users = $query->fetchAll(PDO::FETCH_OBJ);
        return $users;
    }

    // obtiene los datos del usuario
    function getUserData($email){
        $query = $this->db->prepare('SELECT * FROM usuario WHERE email = ?');
        $query->execute([$email]);

        $user = $query->fetch(PDO::FETCH_OBJ);
        return $user;
    }

    function insertUser($usuario){
            $query = $this->db->prepare('INSERT INTO usuario (nombre, email, password, permisos) VALUES (?, ?, ?, ?)');
            // se completan los campos en el execute con el array asociativo pasado por parametro
            $query->execute([$usuario['nombre'], $usuario['email'], $usuario['password'], $usuario['permisos']]);
    }

    function update($id, $permisos){
        $query = $this->db->prepare('UPDATE usuario SET permisos = ? WHERE id = ?');
        $query->execute([$permisos, $id]);
    }

    function delete($id){
        $query = $this->db->prepare('DELETE FROM usuario WHERE id = ?');
        $query->execute([$id]);
    }
}