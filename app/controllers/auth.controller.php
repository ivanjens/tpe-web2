<?php

// models
include_once ('app/models/user.model.php');
include_once ('app/models/book.model.php');

// views
include_once ('app/views/auth.view.php');
include_once ('app/views/book.view.php');
include_once ('app/views/genre.view.php');

// helpers

include_once ('app/helpers/auth.helper.php');

class AuthController{

    // models
    private $authModel;
    private $bookModel;
    private $genreModel;

    // views
    private $authView;
    private $bookView;
    private $genreView;

    // helpers

    private $authHelper;

    function __construct(){
        // models
        $this->authModel = new UserModel();
        $this->bookModel = new BookModel();
        $this->genreModel = new GenreModel();

        //views
        $this->authView = new AuthView();
        $this->bookView = new BookView();
        $this->genreView = new GenreView();

        //helpers
        $this->authHelper = new AuthHelper;
    }

    function showFormLogin(){
        $this->authView->showFormLogin();
    }

    // hace toda la verificación de los datos introducidos en el formulario de login
    function verifyLogin(){
        // se asigna respectivamente lo que llega del form 
        $email = $_POST['email'];
        $password = $_POST['password'];
        // comprueba que los campos no esten vacios
        if(empty($email) || empty($password)){
            $this->authView->showFormLogin('Debes completar todos los campos');
            die();
        } else{
            // si no están vacios hace la consulta a la base de datos y comprueba si coinciden con los introducidos
            $userData =$this->authModel->getUserData($email);
            
            if($userData && password_verify($password, $userData->password)){
                // las credenciales son correctas, crea una sesión y redirecciona al home
                $this->authHelper->login($userData);
                header("Location: " . BASE_URL); 
            } else{
                // si las credenciales son incorrectas
                $this->authView->showFormLogin('El email y/o la contraseña no son correctos');
                die();
            }
        }
    }

    // cierra la sesión del usuario
    function logout(){
        $this->authHelper->logout();
    }

    function showPanelElection(){
        $this->authView->showPanelElection();
    }

    // le solicita al view que muestre el panel junto a los libros
    function showSpecificPanel($panel, $filter = null){
        // consulta a la ddbb los generos que tiene
        $genres=$this->genreModel->getAll();
        // Comprueba si le llegó un filtro, en este caso planeado para la filtración de libros por género desde el panel libro
        if($filter != null){
            $books = $this->bookModel->getByGenre($filter);
            $this->bookView->showPanelBooks($books, $genres);    
        } else if($filter == null){ // si no hay filtro, carga el panel de libros, el de genero o un error
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
            
    }

}