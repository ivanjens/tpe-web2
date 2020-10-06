<?php
include_once ('app/models/genero.model.php');
include_once ('app/views/genero.view.php');
include_once ('app/views/libros.view.php');
class GeneroController{

    private $model;
    private $generosView;
    private $librosView;

    function __construct(){
        $this->model = new GeneroModel();
        $this->generosView = new GeneroView();
        $this->librosView = new LibrosView();
    }

    function showFormGenero($id = NULL){
        $genero = $this->model->get($id);
        $this->generosView->showFormGenero($genero);
    }

    function addGenero(){
        $nombre = $_POST['nombre'];
        var_dump($nombre);
        if(isset($nombre)){
            $this->model->insert($nombre);
            header("Location: " . BASE_URL . 'admin/generos'); 
        } else{
            $this->librosView->showError('Campo vacio');
        }
    }

    function removeGenero($id){
        $this->model->delete($id);
        header("Location: " . BASE_URL . 'admin/generos'); 
    }

    function updateGenero($id){
        $nombre = $_POST['nombre'];
        if(isset($nombre)){
            $this->model->update($id, $nombre);
            header("Location: " . BASE_URL . 'admin/generos'); 
        } else{
            $this->librosView->showError('Campo vacio');
        }
    }
}