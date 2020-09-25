<?php
include_once ('app/models/genero.model.php');
include_once ('app/views/libros.view.php');
class GeneroController{

    private $model;
    private $viewLibro;

    function __construct(){
        $this->model = new GeneroModel();
        $this->viewLibro = new LibrosView();
    }

    function addGenero(){
        $nombre = $_POST['nombre'];
        if(isset($nombre)){
            $this->model->insert($nombre);
        } else{
            $this->viewLibro->showError('Campo vacio');
        }
    }

    function updateGenero($id){
        $nombre = $_POST['nombre'];
        if(isset($nombre)){
            $this->model->update($id, $nombre);
        } else{
            $this->viewLibro->showError('Campo vacio');
        }
    }
}