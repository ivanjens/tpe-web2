<?php

require_once 'libs/Router.php';
include_once 'app/api/api-review.controller.php';

$router = new Router();

$router->addRoute('reseñas', 'GET', 'APIReviewController', 'getAll');
$router->addRoute('reseñas/:ID', 'GET', 'APIReviewController', 'getByBook');
//$router->addRoute('reseñas/:ID', 'GET', 'APIReviewController', 'getReview');



$router->setDefaultRoute('APIReviewController','show404');

// rutea
$router->route($_REQUEST['resource'],  $_SERVER['REQUEST_METHOD']);