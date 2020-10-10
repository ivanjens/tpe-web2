<?php

include_once 'app/helpers/db.helper.php';

class UserModel{

    private $db;
    private $dbHelper;

    function __construct(){
        $this->dbHelper = new DatabaseHelper();
        $this->db = $this->dbHelper->connect();
    }

    function getUserData($email){
        $query = $this->db->prepare('SELECT * FROM usuario WHERE email = ?');
        $query->execute([$email]);

        $user = $query->fetch(PDO::FETCH_OBJ);
        return $user;
    }

}