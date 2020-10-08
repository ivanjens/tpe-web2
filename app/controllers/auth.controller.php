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
    }

    function verifyLogin(){
        $email = $_POST['email'];
        $password = $_POST['password'];
        $userData =$this->model->getUserData($email);
        if(empty($email) || empty($password)){
            $this->view->showFormLogin('Debes completar todos los campos');
        } else{
            if($userData && password_verify($password, $userData->password)){
                session_start();
                $_SESSION['ID_USER'] = $userData->id;
                $_SESSION['EMAIL_USER'] = $userData->email;
                header("Location: " . BASE_URL); 
            } else{
                $this->view->showFormLogin('El email y/o la contraseña no son correctos');
            }
        }
        
    }
    //Verificamos que sea email y contraseña validos
    function loginUser(){
        $email = $_POST['email'];
        $password = $_POST['password'];

        var_dump($email,$password);
    }
}