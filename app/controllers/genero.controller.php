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
        $action = 'crear-genero';
        $this->viewLibro->showFormGenero($action);
        if(isset($_REQUEST['$nombre'])){
            $nombre = $_POST['nombre'];
            $this->model->insert($nombre);
        } else{
            $this->viewLibro->showError('Campo vacio');
        }
    }

    function deleteGenero($id){
        $this->model->delete($id);
    }

    function updateGenero($id){
        $action = 'editar-genero';
        $datosActuales = $this->model->get($id);
        $this->view->showFormGenero($action, $datosActuales);

        $nombre = $_POST['nombre'];
        if(isset($nombre)){
            $this->model->update($id, $nombre);
        } else{
            $this->viewLibro->showError('Campo vacio');
        }
    }
}