<?php

include_once 'app/controllers/book.controller.php';
include_once 'app/controllers/genre.controller.php';
include_once 'app/controllers/auth.controller.php';


define('BASE_URL', '//'.$_SERVER['SERVER_NAME'] . ':' . $_SERVER['SERVER_PORT'] . dirname($_SERVER['PHP_SELF']).'/');
define('LOGIN', '//'.$_SERVER['SERVER_NAME'] . ':' . $_SERVER['SERVER_PORT'] . dirname($_SERVER['PHP_SELF']).'/login' );

// lee la acción
if (!empty($_GET['action'])) {
    $action = $_GET['action'];
} else {
    $action = 'home'; // acción por defecto si no envían
}

// parsea la accion Ej: suma/1/2 --> ['suma', 1, 2]
$params = explode('/', $action);

// determina que camino seguir según la acción
switch ($params[0]) {
    case 'home':
        $controller = new BookController();
        $controller->showBooks();
        break;
    case 'login':
        $controller = new AuthController();
        $controller->showFormLogin();
        break;
    case 'verify':
        $controller = new AuthController();
        $controller->verifyLogin();
        break;
    case 'admin':
        $controller = new AuthController();
        if (isset($params[1]))
        $controller->showPanelAdmin($params[1]);
        else
        $controller->showPanelAdmin();
        break;// el parametro determina que panel mostrar (libro, genero, etc)
    case 'formulario-libro':
        $controller = new BookController();
        $controller->showFormBook($params[1]); // si recibe parametro != null hace consulta al model y setea los datos en los inputs
        break;
    case 'formulario-genero':
        $controller = new GenreController();
        $controller->showFormGenre($params[1]); // si recibe parametro != null hace consulta al model y setea los datos en los inputs
        break;
    case 'crear-libro': 
        $controller = new BookController();
        $controller->addBook();
        break;
    case 'eliminar-libro':
        $controller = new BookController();
        $controller->removeBook($params[1]);
        break;
    case 'editar-libro':
        $controller = new BookController();
        $controller->updateBook($params[1]);
    break;
    case 'libros':
        $controller = new BookController();
        $controller->showByGenre($params[1]);
        break;
    case 'crear-genero':
        $controller = new GenreController();
        $controller->addGenre();
        break;
    case 'eliminar-genero':
        $controller = new GenreController();
        $controller->removeGenre($params[1]);
        break;
    case 'editar-genero':
        $controller = new GenreController();
        $controller->updateGenre($params[1]);
    break;
        
    case 'about':
        $controller = new BookController();
        if (isset($params[1]))
        $controller->getDev($params[1]);
        else
        $controller->getDev();
        break;
    case 'detalle': // ver individualmente un libro
        $controller = new BookController();
        $id = $params[1];
        $controller->showDetail($id);
        break;
    case 'comprar':
        $view = new BookView();
        $view->showError('¡Lo sentimos, las compras no están disponibles en este momento!');
        break;
    default:
        header("HTTP/1.0 404 Not Found");
        $view = new BookView();
        $view->showError('No se ha podido encontrar la página');
        break;
}