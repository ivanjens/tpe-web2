<?php

include_once 'app/views/libros.view.php';
include_once 'app/models/libros.model.php';

class LibrosController{

    private $modelLibros;
    private $modelGeneros;
    private $view;

    function __construct(){
        $this->modelLibros = new LibrosModel();
        $this->modelGeneros = new GeneroModel();
        $this->view = new LibrosView();
    }
    //Verificamos si el about llega con un nombre seleccionado
    function getDev($name){
        $result = '';
        if (isset($name)) {
            switch ($name) {
                case 'micaela':
                    $result =  "<h3>Micaela Cisneros</h3><p>Lorem bla bla</p>";
                    break;
                case 'ivan':
                    $result =  "<h3>Ivan Jensen</h3><p>Lorem bla</p>";
                    break;
            }
        }
        return $result;
    }

    // solicita al model todos los libros y se los muestra al usuario
    function showLibros(){
        $libros = $this->modelLibros->getAll();
        $this->view->showLibros($libros);
    }

    // le solicita al view que muestre el panel junto a los libros
    function showPanelAdmin(){
        $libros = $this->modelLibros->getAll();
        $generos = $this->modelGeneros->getAll();
        $this->view->showPanelAdmin($libros, $generos);
    }

    // manda la petición al model para que añada un nuevo libro
    function addLibro(){
        // Todos los valores que vengan del formulario se guardan en el array asociativo
        $libro = array('titulo'=>$_POST['titulo'], 'autor'=>$_POST['autor'], 'editorial'=>$_POST['editorial'], 'sinopsis'=>$_POST['sinopsis'], 'precio'=>$_POST['precio'], 'stock'=>$_POST['stock'], 'id_genero'=>$_POST['id_genero']);

        // Comprueba que ningún campo este vacio
        if(!empty($libro['titulo']) && !empty($libro['autor']) && !empty($libro['editorial']) && !empty($libro['sinopsis']) && !empty($libro['precio']) && !empty($libro['stock']) && !empty($libro['id_genero'])){
            $this->modelLibros->insert($libro); // campos completos, envia la solicitud al model
            header("Location: " . BASE_URL); 
        } else{
            $this->view->showError('Campo(s) del formulario vacio(s)'); // campos incompletos, solicita al view que muestre el error
        }
    }

    function updateLibro($id){
        // Todos los valores que vengan del formulario se guardan en el array asociativo
        $libro = array('titulo'=>$_POST['titulo'], 'autor'=>$_POST['autor'], 'editorial'=>$_POST['editorial'], 'sinopsis'=>$_POST['sinopsis'], 'precio'=>$_POST['precio'], 'stock'=>$_POST['stock'], 'id_genero'=>$_POST['id_genero']);

        // Comprueba que ningún campo este vacio
        if(!empty($libro['titulo']) && !empty($libro['autor']) && !empty($libro['editorial']) && !empty($libro['sinopsis']) && !empty($libro['precio']) && !empty($libro['stock']) && !empty($libro['id_genero'])){
            $this->modelLibros->update($id, $libro); // campos completos, envia la solicitud al model
            header("Location: " . BASE_URL); 
        } else{
            $this->view->showError('Campo(s) del formulario vacio(s)'); // campos incompletos, solicita al view que muestre el error
        }
    }

    // manda la petición al model para borrar un libro
    function removeLibro($id){
        $this->modelLibros->delete($id);
    }
}