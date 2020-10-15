<?php
include_once ('app/models/genre.model.php');
include_once ('app/views/genre.view.php');
include_once ('app/views/book.view.php');
include_once ('app/helpers/auth.helper.php');

class GenreController{

    private $model;
    private $genreView;
    private $bookView;
    private $authHelper;

    function __construct(){
        $this->model = new GenreModel();
        $this->genreView = new GenreView();
        $this->bookView = new BookView();
        $this->authHelper = new AuthHelper();
    }


    // muestra el formulario para agregar / modificar un genero dependiendo si recibe la id del genero o no
    function showFormGenre($id = NULL){
        if($this->authHelper->checkAdmin()){ // comprueba que sea admin
            $genre = $this->model->get($id);
            $this->genreView->showFormGenre($genre);
        } else{ // al no ser admin lo redirecciona al home
            header("Location: " . BASE_URL); 
        }
    }

    // solicita al model que añada un nuevo genero
    function addGenre(){
        // guarda el nombre del genero recibido en el form
        $name = $_POST['nombre'];
        if($this->authHelper->checkAdmin()){ // comprueba que sea admin
            if(isset($name)){ // comprueba que el nombre este seteado
                $this->model->insert($name);
                header("Location: " . BASE_URL . 'panel/generos/'); 
            } else{
                $this->bookView->showError('Campo vacio');
            }
        } else{ // al no ser admin lo redirecciona al home
            header("Location: " . BASE_URL); 
        }
    }


    // solicita al model que borre un genero
    function removeGenre($id){
        $countBooks = $this->model->checkGenreItems($id);
        $genres = $this->model->getAll();
        if($countBooks->cantidad > 0 && $this->authHelper->checkAdmin()){
            $this->genreView->showPanelGenres($genres, 'Hay libros asignados a este genero, debes eliminarlos antes.');die;
        } else if($countBooks->cantidad <= 0 && $this->authHelper->checkAdmin()){ // comprueba que sea admin
            $this->model->delete($id);
            header("Location: " . BASE_URL . 'panel/generos/'); 
        } else{ // al no ser admin lo redirecciona al home
            header("Location: " . BASE_URL); 
        }
        

    }

    // solicita al model que actualice un genero existente
    function updateGenre($id){
        // guarda el nuevo nombre del genero recibido del form
        $name = $_POST['nombre'];
        if($this->authHelper->checkAdmin()){ // comprueba que sea admin
            if(isset($name)){
                $this->model->update($id, $name);
                header("Location: " . BASE_URL . 'panel/generos/'); 
            } else{
                $this->bookView->showError('Campo vacio');
            }
        } else{ // al no ser admin lo redirecciona al home
            header("Location: " . BASE_URL); 
        }
    }
}