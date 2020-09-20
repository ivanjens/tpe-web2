<?php

include_once 'app/views/libros.view.php';
include_once 'app/models/libros.model.php';

class LibrosController{

    private $model;
    private $view;

    function __construct(){
        $this->model = new LibrosModel();
        $this->view = new LibrosView();
    }

    function showLibros(){
        $libros = $this->model->getAll();

        $this->view->showLibros($libros);
    }
}