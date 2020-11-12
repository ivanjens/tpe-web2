<?php

require_once 'libs/Router.php';
include_once 'app/api/api-review.controller.php';

$router = new Router();

$router->addRoute('reseñas', 'GET', 'APIReviewController', 'getReviews');
$router->addRoute('reseñas/:ID', 'GET', 'APIReviewController', 'get');



$router->setDefaultRoute('APIReviewController','show404');

// rutea
$router->route($_REQUEST['resource'],  $_SERVER['REQUEST_METHOD']);