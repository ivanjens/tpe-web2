<?php

require_once 'libs/Router.php';
include_once 'app/api/api-review.controller.php';

$router = new Router();


$router->addRoute('reseñas/:ID', 'GET', 'APIReviewController', 'getByBook');
//$router->addRoute('reseñas/:ID', 'GET', 'APIReviewController', 'getReview');
$router->addRoute('reseñas/:ID', 'POST', 'APIReviewController', 'add');

$router->addRoute('reseñas/:ID', 'DELETE', 'APIReviewController', 'delete');




$router->setDefaultRoute('APIReviewController','show404');

// rutea
$router->route($_REQUEST['resource'],  $_SERVER['REQUEST_METHOD']);