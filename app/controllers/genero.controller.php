<?php
include_once ('app/models/genero.model.php');
include_once ('app/views/genero.view.php');
class GeneroController{

    private $model;
    private $view;

    function __construct(){
        $this->model = new GeneroModel();
        $this->view = new GeneroView();
    }

    function showLibroAll(){
        $libros = $this->model->getAll();

        $this->view->showLibros($libros);
    }
}