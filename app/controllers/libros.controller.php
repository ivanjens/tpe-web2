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

    function showPanelAdmin(){
        $this->view->showPanelAdmin();
    }

    function addLibro(){
        // Todos los valores que vengan del formulario se guardan en el array asociativo
        $libro = array('titulo'=>$_POST['titulo'], 'autor'=>$_POST['autor'], 'editorial'=>$_POST['editorial'], 'sinopsis'=>$_POST['sinopsis'], 'precio'=>$_POST['precio'], 'stock'=>$_POST['stock'], 'id_genero'=>$_POST['id_genero']);

        // Comprueba que ningún campo este vacio
        if(!empty($libro['titulo']) && !empty($libro['autor']) && !empty($libro['editorial']) && !empty($libro['sinopsis']) && !empty($libro['precio']) && !empty($libro['stock']) && !empty($libro['id_genero'])){
            $this->model->insertLibro($libro); // campos completos, envia la solicitud al model
            header("Location: " . BASE_URL); 
        } else{
            $this->view->showError('Error: Campos del formulario vacios'); // campos incompletos, solicita al view que muestre el error
        }
    }
}