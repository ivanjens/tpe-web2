<?php

include_once ('app/controllers/genero.controller.php');
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
        $controller = new GeneroController();
        $controller->showLibros();
        break;
    case 'categoria': // filtra libros por genero
        $controller = new GeneroController();
        $controller->showLibro();
        $categoria = $params[1];
        break;
    case 'detalles': // ver individualmente un libro
        $controller = new GeneroController();
        $controller->showLibro();
        break;
    default:
        header("HTTP/1.0 404 Not Found");
        echo('404 Page not found');
        break;
}