<?php

include_once ('app/models/usuario.model.php');
include_once ('app/views/auth.view.php');
include_once ('app/views/libros.view.php');
include_once ('app/views/genero.view.php');
include_once ('app/models/libros.model.php');

class AuthController{

    private $model;
    private $view;

    function __construct(){
        $this->model = new UsuarioModel();
        $this->view = new AuthView();
        $this->modelLibros = new LibrosModel();
        $this->modelGeneros = new GeneroModel();
        $this->viewLibros = new LibrosView();
        $this->viewGeneros = new GeneroView();
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
                header("Location: " . BASE_URL . 'admin'); 
            } else{
                $this->view->showFormLogin('El email y/o la contraseña no son correctos');
            }
        }
    }
    // le solicita al view que muestre el panel junto a los libros
    function showPanelAdmin($panel = null){
        if (!empty($panel)){
            switch($panel){
                case 'libros':
                    $libros = $this->modelLibros->getAll();
                    $genero=$this->modelGeneros->getAll();
                    $this->viewLibros->showPanelLibros($libros, $genero);
                    break;
                case 'generos':
                    $genero=$this->modelGeneros->getAll();
                    $this->viewGeneros->showPanelGeneros($genero);
                    break;
                default:
                    $this->viewLibros->showError('Panel inexistente');
                    break;
            }
        }
        else{
            $this->view->showPanel();
        }

    }

}