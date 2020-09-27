<?php

include_once 'app/controllers/libros.controller.php';
include_once 'app/controllers/genero.controller.php';

define('BASE_URL', '//'.$_SERVER['SERVER_NAME'] . ':' . $_SERVER['SERVER_PORT'] . dirname($_SERVER['PHP_SELF']).'/');

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
        $controller = new LibrosController();
        $controller->showLibros();
        break;
    case 'admin':
        $controller = new LibrosController();
        $controller->showPanelAdmin($params[1]);
        break;
    case 'crear-libro': 
        $controller = new LibrosController();
        $controller->addLibro();
        break;
    case 'crear-genero':
        $controller = new GeneroController();
        $controller->addGenero();
        break;
    case 'eliminar-libro':
        $controller = new LibrosController();
        $controller->removeLibro($params[1]);
        break;
    case 'editar-libro':
        $controller = new LibrosController();
        $controller->editarLibro($params[1]);
        break;
    case 'update-libro':
        $controller = new LibrosController();
        $controller->updateLibro($params[1]);
        break;
     case 'about':
        if (isset($params[1]))
            showAbout($params[1]);
        else
            showAbout();
        break;
    /* case 'categoria': // filtra libros por genero
        $controller = new GeneroController();
        $controller->showTasks();
        $categoria = $params[1];
        break;
    case 'detalles': // ver individualmente un libro
        $controller = new TaskController();
        $controller->showTasks();
        break; */
    default:
        header("HTTP/1.0 404 Not Found");
        echo('404 Page not found');
        break;
}