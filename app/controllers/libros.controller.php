<?php

class LibrosController(){

    private $model;
    private $view;

    function __constructor(){
        $this->model = new GeneroModel();
        this->view = new GeneroView();
    }

    function showLibros(){
        $libros = $this->model->getAll();

        $this->view->showLibros($libros);
    }
}