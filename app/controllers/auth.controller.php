<?php

include_once ('app/models/usuario.model.php');
include_once ('app/views/auth.view.php');

class AuthController{

    private $model;
    private $view;

    function __construct(){
        $this->model = new UsuarioModel();
        $this->view = new AuthView();
    }

    function showFormLogin(){
        $this->view->showFormLogin();
        die();
    }
    //Verificamos que sea email y contraseña validos
    function loginUser(){
        $email = $_POST['email'];
        $password = $_POST['password'];

        var_dump($email, $password)
    }
}