<?php

include_once ('app/models/user.model.php');
include_once ('app/models/book.model.php');
include_once ('app/views/auth.view.php');
include_once ('app/views/book.view.php');
include_once ('app/views/genre.view.php');

class AuthController{

    private $authModel;
    private $bookModel;
    private $genreModel;
    private $authView;
    private $bookView;
    private $genreView;

    function __construct(){
        $this->authModel = new UserModel();
        $this->bookModel = new BookModel();
        $this->genreModel = new GenreModel();
        $this->authView = new AuthView();
        $this->bookView = new BookView();
        $this->genreView = new GenreView();
    }

    function showFormLogin(){
        $this->authView->showFormLogin();
    }

    function verifyLogin(){
        $email = $_POST['email'];
        $password = $_POST['password'];
        $userData =$this->authModel->getUserData($email);
        if(empty($email) || empty($password)){
            $this->authView->showFormLogin('Debes completar todos los campos');
        } else{
            if($userData && password_verify($password, $userData->password)){
                session_start();
                $_SESSION['ID_USER'] = $userData->id;
                $_SESSION['EMAIL_USER'] = $userData->email;
                header("Location: " . BASE_URL . 'admin'); 
            } else{
                $this->authView->showFormLogin('El email y/o la contraseña no son correctos');
            }
        }
    }
    // le solicita al view que muestre el panel junto a los libros
    function showPanelAdmin($panel = null){
        if (!empty($panel)){
            $genres=$this->genreModel->getAll();
            switch($panel){
                case 'libros':
                    $books = $this->bookModel->getAll();
                    $this->bookView->showPanelBooks($books, $genres);
                    break;
                case 'generos':
                    $this->genreView->showPanelGenres($genres);
                    break;
                default:
                    $this->bookView->showError('Panel inexistente');
                    break;
            }
        }
        else{
            $this->authView->showPanelElection();
        }

    }

}