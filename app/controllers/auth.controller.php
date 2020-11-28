<?php

// include models
include_once ('app/models/user.model.php');
include_once ('app/models/book.model.php');

// include views
include_once ('app/views/auth.view.php');
include_once ('app/views/book.view.php');
include_once ('app/views/genre.view.php');

// include helpers
include_once ('app/helpers/auth.helper.php');

class AuthController{

    // models var
    private $userModel;
    private $bookModel;
    private $genreModel;

    // views var
    private $authView;
    private $bookView;
    private $genreView;

    // helpers var

    private $authHelper;

    function __construct(){
        // models instantiation 
        $this->userModel = new UserModel();
        $this->bookModel = new BookModel();
        $this->genreModel = new GenreModel();

        // views instantiation 
        $this->authView = new AuthView();
        $this->bookView = new BookView();
        $this->genreView = new GenreView();

        // helpers instantiation 
        $this->authHelper = new AuthHelper;
    }

    function showFormLogin(){
        $this->authView->showFormLogin();
    }

    // hace toda la verificación de los datos introducidos en el formulario de login
    function verifyLogin(){
        $email = $_POST['email'];
        $password = $_POST['password'];

        if(empty($email) || empty($password)){
            $this->authView->showFormLogin('Debes completar todos los campos');
            die();
        } else{
            $userData =$this->userModel->getUserData($email);

            if($userData && password_verify($password, $userData->password)){
                $this->authHelper->login($userData);
                header("Location: " . BASE_URL); 
            } else{
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
        $genres=$this->genreModel->getAll();
    
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
                case 'usuarios':
                    $users = $this->userModel->getAll();
                    $this->authView->showPanelUsers($users);
                    break;
                default:
                    $this->bookView->showError('Panel inexistente');
                    break;
            }
        }
            
    }


    function showFormRegister(){
        $this->authView->showFormRegister();
    }

    // inserta un usuario en la base de datos
    function registerUser(){
        $_POST['permisos'] = '0';
        $usuario = array('email'=>$_POST['email'], 'nombre'=>$_POST['nombre'], 'permisos'=>$_POST['permisos'], 'password'=>$_POST['password'], 'confirm_password'=>$_POST['confirm-password']);        

        if( (isset($usuario['email']) && ($usuario['email'] != null)) && 
            (isset($usuario['password']) && ($usuario['password'] != null)) &&
            (isset($usuario['confirm_password']) && ($usuario['confirm_password'] != null)) && 
            (isset($usuario['permisos']) && ($usuario['permisos'] != null))&& 
            (isset($usuario['nombre']) && ($usuario['nombre'] != null)) ){

            $valid_password = $this->verifyRegisterPassword($usuario['password'], $usuario['confirm_password']);

            if($valid_password){
                $usuario['password'] = password_hash($usuario['password'] , PASSWORD_DEFAULT );
                $userData = $this->userModel->getUserData($usuario['email']);
                if($userData==false){
                    $this->userModel->insertUser($usuario); 
                    $userData = $this->userModel->getUserData($usuario['email']);
                    $this->authHelper->login($userData);
                    header("Location: " . BASE_URL . "home/");
                }
                else{
                    $this->bookView->showError('Ese email ya esta registrado');
                }
            }
            
        } else{
            $this->bookView->showError('Campo(s) del registro vacio(s)'); 
        }
    }

    // verifica la contraseña de registro 
    function verifyRegisterPassword($password, $confirm_password){
        if(strlen($password) >= 8){
            if($confirm_password == $password){
                return true;
            } else{
                $this->bookView->showError('Las contraseñas no coinciden');
                die();
            }
        } else{
            $this->bookView->showError('La contraseña debe tener al menos 8 caracteres');
            die();
        }
    }

    // le da permisos a un usuario
    function setAdmin($id){
        $_POST['permisos'] = '1';
        $permisos = $_POST['permisos'];
        if($this->authHelper->checkAdmin()){
                $this->userModel->setAdmin($id, $permisos);
                header("Location: " . BASE_URL . 'panel/usuarios/'); 
        } else{ 
            header("Location: " . BASE_URL); 
        }
    }

    // elimina un usuario
    function removeUser($id){
        if($this->authHelper->checkAdmin()){ 
             $this->userModel->delete($id);
             header("Location: " . BASE_URL . 'panel/usuarios/'); 
        } else{ 
             header("Location: " . BASE_URL); 
         }
    }
}