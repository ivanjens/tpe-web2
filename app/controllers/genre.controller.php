<?php

// include models
include_once ('app/models/genre.model.php');

// include views
include_once ('app/views/genre.view.php');
include_once ('app/views/book.view.php');

// include helpers
include_once ('app/helpers/auth.helper.php');

class GenreController{

    // models var
    private $model;

    // views var
    private $genreView;
    private $bookView;

    // helpers var
    private $authHelper;

    function __construct(){
        // models instantiation 
        $this->model = new GenreModel();

        // views instantiation 
        $this->genreView = new GenreView();
        $this->bookView = new BookView();

        // helpers instantiation 
        $this->authHelper = new AuthHelper();
    }


    // muestra el formulario para agregar / modificar un genero dependiendo si recibe la id del genero o no
    function showFormGenre($id = NULL){
        if($this->authHelper->checkAdmin()){
            $genre = $this->model->get($id);
            $this->genreView->showFormGenre($genre);
        } else{
            header("Location: " . BASE_URL); 
        }
    }

    // solicita al model que añada un nuevo genero
    function addGenre(){
        $name = $_POST['nombre'];
        if($this->authHelper->checkAdmin()){ 
            if(isset($name)){
                $this->model->insert($name);
                header("Location: " . BASE_URL . 'panel/generos/'); 
            } else{
                $this->bookView->showError('Campo vacio');
            }
        } else{
            header("Location: " . BASE_URL); 
        }
    }


    // solicita al model que borre un genero
    function removeGenre($id){
        $countBooks = $this->model->checkGenreItems($id);
        $genres = $this->model->getAll();
        if($countBooks->cantidad > 0 && $this->authHelper->checkAdmin()){
            $this->genreView->showPanelGenres($genres, 'Hay libros asignados a este genero, debes eliminarlos antes.');die;
        } else if($countBooks->cantidad <= 0 && $this->authHelper->checkAdmin()){
            $this->model->delete($id);
            header("Location: " . BASE_URL . 'panel/generos/'); 
        } else{
            header("Location: " . BASE_URL); 
        }
        

    }

    // solicita al model que actualice un genero existente
    function updateGenre($id){
        $name = $_POST['nombre'];
        if($this->authHelper->checkAdmin()){
            if(isset($name)){
                $this->model->update($id, $name);
                header("Location: " . BASE_URL . 'panel/generos/'); 
            } else{
                $this->bookView->showError('Campo vacio');
            }
        } else{
            header("Location: " . BASE_URL); 
        }
    }
}