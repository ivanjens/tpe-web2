<?php

include_once 'app/views/book.view.php';
include_once 'app/views/genre.view.php';
include_once 'app/models/book.model.php';
include_once 'app/models/review.model.php';
include_once 'app/models/genre.model.php';
include_once 'app/helpers/auth.helper.php';

class BookController{

    private $bookModel;
    private $reviewModel;
    private $genreModel;
    private $view;
    private $authHelper;

    function __construct(){
        $this->bookModel = new BookModel();
        $this->reviewModel = new ReviewModel();
        $this->genreModel = new GenreModel();
        $this->view = new BookView();
        $this->authHelper = new AuthHelper();
        $this->authHelper->checkLogged();
    }


    // solicita al model todos los libros y se los muestra al usuario
    function showBooks(){
        $books = $this->bookModel->getAll();
        $genres = $this->genreModel->getAll();
        $this->view->showBooks($books, $genres);
    }

    // solicita al model un libro en particular y muestra sus detalles
    function showDetail($id) {
        $book = $this->bookModel->get($id);
        $promedio = number_format($this->getPromedio($id), 1, ',', '.'); // transforma el promedio en un float de un solo número después de la coma
        $this->view->showBook($book, $promedio);
    }

    // obtiene el promedio de las puntuaciones de un libro
    function getPromedio($id_book){
        $query = $this->reviewModel->getPunctuation($id_book);
        $books_quantity = $query['books'];
        $punctuations = $query['punctuations']; 
        $total = 0;
        if($books_quantity > 0){
            foreach($punctuations as $punctuation){
                $total += $punctuation->valoracion;
            }
            return ($total/$books_quantity);
        } else {
            return 0;
        }
    }


    function showError($msg){
        $this->view->showError($msg);
    }
    
    // muestra el formulario para agregar / modificar libro dependiendo si recibe la id del libro
    function showFormBook($id = NULL){ 
        if($this->authHelper->checkAdmin()){ // verifica que es admin
            $bookData = $this->bookModel->get($id);
            $genres = $this->genreModel->getAll();
            $this->view->showFormBook($bookData, $genres);
        } else{ // al no ser admin, lo redirecciona al home
            header('Location:' . BASE_URL);
        }
    }

    // manda la petición al model para que añada un nuevo libro
    function addBook(){
        $book = array('titulo'=>$_POST['titulo'], 'autor'=>$_POST['autor'], 'editorial'=>$_POST['editorial'], 'sinopsis'=>$_POST['sinopsis'], 'precio'=>$_POST['precio'], 'stock'=>$_POST['stock'], 'id_genero'=>$_POST['id_genero']);
        if($this->authHelper->checkAdmin()){ // chequea si es admin
            // Comprueba que ningún campo este vacio
            if( (isset($book['titulo']) && ($book['titulo'] != null)) && 
                (isset($book['autor']) && ($book['autor'] != null))  &&
                (isset($book['editorial']) && ($book['editorial'] != null)) && 
                (isset($book['sinopsis']) && ($book['sinopsis'] != null)) &&
                (isset($book['precio']) && ($book['precio'] != null)) && 
                (isset($book['stock']) && ($book['stock'] != null)) && 
                (isset($book['id_genero']) && ($book['id_genero'] != null)) ){
                    if(($_FILES['portada']['type'] == "image/jpg" || $_FILES['portada']['type'] == "image/jpeg" || $_FILES['portada']['type'] == "image/png" || empty($_FILES['portada']['tmp_name']))){
                        $image_name = $this->uniqueImageName($_FILES['portada']['name'], $_FILES['portada']['tmp_name']);
                        var_dump($image_name);
                        $this->bookModel->insert($book, $image_name); // campos completos, envia la solicitud al model
                    }
                    header("Location: " . BASE_URL . 'panel/libros/'); 
                } else{
                    $this->view->showError('Campo(s) del formulario vacio(s)'); // campos incompletos, solicita al view que muestre el error
                }
            } else{ // al no ser admin, lo redirecciona al home
                header('Location:' . BASE_URL);
            }
        }
        
        
        function updateBook($id){
            $book = array('titulo'=>$_POST['titulo'], 'autor'=>$_POST['autor'], 'editorial'=>$_POST['editorial'], 'sinopsis'=>$_POST['sinopsis'], 'precio'=>$_POST['precio'], 'stock'=>$_POST['stock'], 'id_genero'=>$_POST['id_genero']);
            if($this->authHelper->checkAdmin()){
                if( isset($_REQUEST['titulo']) && isset($_REQUEST['autor']) && isset($_REQUEST['editorial']) && isset($_REQUEST['sinopsis']) && isset($_REQUEST['precio']) && isset($_REQUEST['stock']) && isset($_REQUEST['id_genero'])){
                    if(($_FILES['portada']['type'] == "image/jpg" || $_FILES['portada']['type'] == "image/jpeg" || $_FILES['portada']['type'] == "image/png" || empty($_FILES['portada']['tmp_name']))){
                        $image_name = $this->uniqueImageName($_FILES['portada']['name'], $_FILES['portada']['tmp_name']);
                        $this->bookModel->update($id, $book, $image_name); // campos completos, envia la solicitud al model
                    }
                    header("Location: " . BASE_URL . 'panel/libros/'); 
                } else{
                    $this->view->showError('Campo(s) del formulario vacio(s)'); // campos incompletos, solicita al view que muestre el error
                }
            } else{ // al no ser admin, lo redirecciona al home
                header('Location:' . BASE_URL);
            }
        }    

        //genera un nombre único para cada imagen que se suba y lo mueve a la carpeta del proyecto 'images/'
        function uniqueImageName($original_name, $tmp_name){
            $path = "images/" . uniqid("", true) . "." . strtolower(pathinfo($original_name, PATHINFO_EXTENSION));
            move_uploaded_file($tmp_name, $path);
            return $path;
        }
                

    // manda la petición al model para borrar un libro
    function removeBook($id){
        if($this->authHelper->checkAdmin()){ // comprueba que es admin
            $this->bookModel->delete($id);
            header("Location: " . BASE_URL . 'panel/libros/'); 
        } else{ // al no ser admin, lo redirecciona al home
            header("Location: " . BASE_URL); 
        }
    }

    // muestra todos los libros pertenecientes al genero pasado por parametro
    function showByGenre($genre){
        // hace la consultas a las tablas de libros y generos
        $books = $this->bookModel->getByGenre($genre);
        $genres = $this->genreModel->getAll();
        if($books != NULL){ // si se encontraron libros con ese genero
            $this->view->showBooks($books, $genres);
        } else { 
            $this->view->showError('No se han encontrado libros con ese género');
        }
    }

    //Verificamos si el about llega con un nombre seleccionado
    function getDev($name = null){
        $descripcion = '';
        if (!empty($name)) {
            switch ($name) {
                case 'micaela':
                    $descripcion =  "Lorem bla bla";
                    $this->view->showAbout($name, $descripcion);
                    break;
                case 'ivan':
                    $descripcion =  "Lorem bla";
                    $this->view->showAbout($name, $descripcion);
                    break;
                default:
                    $this->view->showError('Esa persona no existe');
                    break;
            }
        } else {
            $this->view->showAbout($name, $descripcion);
        }
    }
}