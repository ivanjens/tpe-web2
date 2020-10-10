<?php
include_once ('app/models/genre.model.php');
include_once ('app/views/genre.view.php');
include_once ('app/views/book.view.php');

class GenreController{

    private $model;
    private $genreView;
    private $bookView;

    function __construct(){
        $this->model = new GenreModel();
        $this->genreView = new GenreView();
        $this->bookView = new BookView();
    }

    function showFormGenre($id = NULL){
        $genre = $this->model->get($id);
        $this->genreView->showFormGenre($genre);
    }

    function addGenre(){
        $name = $_POST['nombre'];
        if(isset($name)){
            $this->model->insert($name);
            header("Location: " . BASE_URL . 'admin/generos'); 
        } else{
            $this->bookView->showError('Campo vacio');
        }
    }

    function removeGenre($id){
        $this->model->delete($id);
        header("Location: " . BASE_URL . 'admin/generos'); 
    }

    function updateGenre($id){
        $name = $_POST['nombre'];
        if(isset($name)){
            $this->model->update($id, $name);
            header("Location: " . BASE_URL . 'admin/generos'); 
        } else{
            $this->bookView->showError('Campo vacio');
        }
    }
}