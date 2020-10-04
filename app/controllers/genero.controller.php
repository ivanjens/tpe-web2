<?php
include_once ('app/models/genero.model.php');
include_once ('app/views/genero.view.php');
include_once ('app/views/libros.view.php');
class GeneroController{

    private $model;
    private $viewGenero;
    private $viewLibro;

    function __construct(){
        $this->model = new GeneroModel();
        $this->viewGenero = new GeneroView();
        $this->viewLibro = new LibrosView();
    }

    function showFormGenero($id = NULL){
        $genero = $this->model->get($id);
        $this->viewGenero->showFormGenero($genero);
    }

    function addGenero(){
        $nombre = $_POST['nombre'];
        var_dump($nombre);
        if(isset($nombre)){
            $this->model->insert($nombre);
            header("Location: " . BASE_URL . 'admin/generos'); 
        } else{
            $this->viewLibro->showError('Campo vacio');
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
            $this->viewLibro->showError('Campo vacio');
        }
    }
}