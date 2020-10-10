<?php

include_once 'app/views/book.view.php';
include_once 'app/views/genre.view.php';
include_once 'app/models/book.model.php';

class BookController{

    private $bookModel;
    private $genreModel;
    private $view;

    function __construct(){
        $this->bookModel = new BookModel();
        $this->genreModel = new GenreModel();
        $this->view = new BookView();
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
        $this->view->showAbout($name, $descripcion);
    }
    /*
        FUNCTIONS DE LIBROS
    */

    // solicita al model todos los libros y se los muestra al usuario
    function showBooks(){
        $books = $this->bookModel->getAll();
        $genres = $this->genreModel->getAll();
        $this->view->showBooks($books, $genres);
    }

    function showDetail($id) {
        $book = $this->bookModel->get($id);
        $this->view->showBook($book);
    }
    
    function showFormBook($id = NULL){
        $bookData = $this->bookModel->get($id);
        $genres = $this->genreModel->getAll();
        $this->view->showFormBook($bookData, $genres);
    }


    // manda la petición al model para que añada un nuevo libro
    function addBook(){
        $book = array('titulo'=>$_POST['titulo'], 'autor'=>$_POST['autor'], 'editorial'=>$_POST['editorial'], 'sinopsis'=>$_POST['sinopsis'], 'precio'=>$_POST['precio'], 'stock'=>$_POST['stock'], 'id_genero'=>$_POST['id_genero']);
        // Comprueba que ningún campo este vacio
        if( (isset($book['titulo']) && ($book['titulo'] != null)) && 
            (isset($book['autor']) && ($book['autor'] != null))  &&
            (isset($book['editorial']) && ($book['editorial'] != null)) && 
            (isset($book['sinopsis']) && ($book['sinopsis'] != null)) &&
            (isset($book['precio']) && ($book['precio'] != null)) && 
            (isset($book['stock']) && ($book['stock'] != null)) && 
            (isset($book['id_genero']) && ($book['id_genero'] != null)) ){
            // Todos los valores que vengan del formulario se guardan en el array asociativo
            $this->bookModel->insert($book); // campos completos, envia la solicitud al model
            header("Location: " . BASE_URL . 'admin/libros'); 
        } else{
            $this->view->showError('Campo(s) del formulario vacio(s)'); // campos incompletos, solicita al view que muestre el error
        }
    }
    
    function updateBook($id){
        $book = array('titulo'=>$_POST['titulo'], 'autor'=>$_POST['autor'], 'editorial'=>$_POST['editorial'], 'sinopsis'=>$_POST['sinopsis'], 'precio'=>$_POST['precio'], 'stock'=>$_POST['stock'], 'id_genero'=>$_POST['id_genero']);
        if( isset($_REQUEST['titulo']) && isset($_REQUEST['autor']) && isset($_REQUEST['editorial']) && isset($_REQUEST['sinopsis']) && isset($_REQUEST['precio']) && isset($_REQUEST['stock']) && isset($_REQUEST['id_genero'])){
            // Todos los valores que vengan del formulario se guardan en el array asociativo
            $this->bookModel->update($id, $book); // campos completos, envia la solicitud al model
            header("Location: " . BASE_URL . 'admin/libros'); 
        } else{
            $this->view->showError('Campo(s) del formulario vacio(s)'); // campos incompletos, solicita al view que muestre el error
        }
    }    
        // Comprueba que ningún campo este vacio

    // manda la petición al model para borrar un libro
    function removeBook($id){
        $this->bookModel->delete($id);
        header("Location: " . BASE_URL . 'admin/libros'); 
    }

    function showByGenre($genre){
        $books = $this->bookModel->getByGenre($genre);
        $genres = $this->genreModel->getAll();
        if($books != NULL){
            $this->view->showBooks($books, $genres);
        } else {
            $this->view->showError('No se han encontrado libros con ese género');
        }
    }
}