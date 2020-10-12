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

    function showFormGenre($id = NULL){
        if($this->authHelper->checkAdmin()){
            $genre = $this->model->get($id);
            $this->genreView->showFormGenre($genre);
        } else{
            header("Location: " . BASE_URL); 
        }
    }

    function addGenre(){
        $name = $_POST['nombre'];
        if($this->authHelper->checkAdmin()){
            if(isset($name)){
                $this->model->insert($name);
                header("Location: " . BASE_URL . 'admin/generos'); 
            } else{
                $this->bookView->showError('Campo vacio');
            }
        } else{
            header("Location: " . BASE_URL); 
        }
    }

    function removeGenre($id){
        if($this->authHelper->checkAdmin()){
            $this->model->delete($id);
            header("Location: " . BASE_URL . 'admin/generos'); 
        } else{
            header("Location: " . BASE_URL); 
        }

    }

    function updateGenre($id){
        $name = $_POST['nombre'];
        if($this->authHelper->checkAdmin()){
            if(isset($name)){
                $this->model->update($id, $name);
                header("Location: " . BASE_URL . 'admin/generos'); 
            } else{
                $this->bookView->showError('Campo vacio');
            }
        } else{
            header("Location: " . BASE_URL); 
        }
    }
}