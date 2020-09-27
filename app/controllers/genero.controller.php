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
        $datosActuales = $this->model->get($id);
        $this->view->showEditarGenero($datosActuales);

        $nombre = $_POST['nombre'];
        if(isset($nombre)){
            $this->model->update($id, $nombre);
            header("Location: " . BASE_URL . 'admin/generos'); 
        } else{
            $this->viewLibro->showError('Campo vacio');
        }
    }
}