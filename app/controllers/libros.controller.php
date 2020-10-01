<?php

include_once 'app/views/libros.view.php';
include_once 'app/views/genero.view.php';
include_once 'app/models/libros.model.php';

class LibrosController{

    private $modelLibros;
    private $modelGeneros;
    private $viewLibros;

    function __construct(){
        $this->modelLibros = new LibrosModel();
        $this->modelGeneros = new GeneroModel();
        $this->viewLibros = new LibrosView();
        $this->viewGeneros = new GeneroView();
    }

    //Verificamos si el about llega con un nombre seleccionado
    function getDev($name = null){
        $descripcion = '';
        if (!empty($name)) {
            switch ($name) {
                case 'micaela':
                    $descripcion =  "Lorem bla bla";
                    break;
                case 'ivan':
                    $descripcion =  "Lorem bla";
                    break;
            }
        }
        $this->viewLibros->showAbout($name, $descripcion);
    }
    /*
        FUNCTIONS DE LIBROS
    */

    // solicita al model todos los libros y se los muestra al usuario
    function showLibros(){
        $libros = $this->modelLibros->getAll();
        $generos = $this->modelGeneros->getAll();
        $this->viewLibros->showLibros($libros, $generos);
    }

    function showDetail($id) {
        $libro = $this->modelLibros->get($id);
        $this->viewLibros->showLibro($libro);
    }

    // le solicita al view que muestre el panel junto a los libros
    function showPanelAdmin($panel){
        $generos = $this->modelGeneros->getAll();
        switch($panel){
            case 'libros':
                $libros = $this->modelLibros->getAll();
                $this->viewLibros->showPanelLibros($libros, $generos);
                break;
            case 'generos':
                $this->viewGeneros->showPanelGeneros($generos);
                break;
            default:
                $this->viewLibros->showError('Panel inexistente');
                break;
        }
    }

    function showFormLibro($id = NULL){
        $datosLibro = $this->modelLibros->get($id);
        $generos = $this->modelGeneros->getAll();
        $this->viewLibros->showFormLibro($datosLibro, $generos);
    }


    // manda la petición al model para que añada un nuevo libro
    function addLibro(){
        $libro = array('titulo'=>$_POST['titulo'], 'autor'=>$_POST['autor'], 'editorial'=>$_POST['editorial'], 'sinopsis'=>$_POST['sinopsis'], 'precio'=>$_POST['precio'], 'stock'=>$_POST['stock'], 'id_genero'=>$_POST['id_genero']);
        // Comprueba que ningún campo este vacio
        if( (isset($libro['titulo']) && ($libro['titulo'] != null)) && 
            (isset($libro['autor']) && ($libro['autor'] != null))  &&
            (isset($libro['editorial']) && ($libro['editorial'] != null)) && 
            (isset($libro['sinopsis']) && ($libro['sinopsis'] != null)) &&
            (isset($libro['precio']) && ($libro['precio'] != null)) && 
            (isset($libro['stock']) && ($libro['stock'] != null)) && 
            (isset($libro['id_genero']) && ($libro['id_genero'] != null)) ){
            // Todos los valores que vengan del formulario se guardan en el array asociativo
            $this->modelLibros->insert($libro); // campos completos, envia la solicitud al model
            header("Location: " . BASE_URL . 'admin/libros'); 
        } else{
            $this->viewLibros->showError('Campo(s) del formulario vacio(s)'); // campos incompletos, solicita al view que muestre el error
        }
    }
    
    function updateLibro($id){
        $libro = array('titulo'=>$_POST['titulo'], 'autor'=>$_POST['autor'], 'editorial'=>$_POST['editorial'], 'sinopsis'=>$_POST['sinopsis'], 'precio'=>$_POST['precio'], 'stock'=>$_POST['stock'], 'id_genero'=>$_POST['id_genero']);
        if( isset($_REQUEST['titulo']) && isset($_REQUEST['autor']) && isset($_REQUEST['editorial']) && isset($_REQUEST['sinopsis']) && isset($_REQUEST['precio']) && isset($_REQUEST['stock']) && isset($_REQUEST['id_genero'])){
            // Todos los valores que vengan del formulario se guardan en el array asociativo
            $this->modelLibros->update($id, $libro); // campos completos, envia la solicitud al model
            header("Location: " . BASE_URL . 'admin/libros'); 
        } else{
            $this->viewLibros->showError('Campo(s) del formulario vacio(s)'); // campos incompletos, solicita al view que muestre el error
        }
    }    
        // Comprueba que ningún campo este vacio

    // manda la petición al model para borrar un libro
    function removeLibro($id){
        $this->modelLibros->delete($id);
        header("Location: " . BASE_URL . 'admin/libros'); 
    }

    function showByGenre($genero){
        $libros = $this->modelLibros->getByGenre($genero);
        if($libros != NULL){
            $this->viewLibros->showLibros($libros, $generos = null);
        } else {
            $this->viewLibros->showError('No se han encontrado libros con ese género');
        }
    }
}