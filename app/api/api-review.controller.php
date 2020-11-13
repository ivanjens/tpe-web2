<?php

include_once 'app/models/review.model.php';
include_once 'app/api/api.view.php';

class APIReviewController{

    private $model;
    private $view;

    function __construct(){
        $this->model = new ReviewModel();
        $this->view = new APIView();
        $this->data = file_get_contents("php://input");
    }

    // lee la variable asociada a la entrada estandar y la convierte en JSON
    function getData(){ 
        return json_decode($this->data); 
    } 

    // solicita al modelo todas las reseñas que existan
    function getAll($params = null){
        $reviews = $this->model->getAll();
        $this->view->response($reviews, 200);
    }

    // solicita al modelo todas las reseñas de un libro específico
    function getByBook($params = null){
        $id_book = $params[':ID'];
        $reviews = $this->model->getByBook($id_book);
        if($reviews){ // comprueba si hay reseñas
            $this->view->response($reviews, 200);
        } else{
            $this->show404();
        }
    }

    // solicita una reseña en específico
    function get($params = null){
        $idReview = $params[':ID'];
        $review = $this->model->get($idReview);
        if($review){ // comprueba que exista la reseña
            $this->view->response($review, 200);
        } else{
            $this->show404();
        }
    }

    // muestra un 404 al no encontrar lo que se pidió
    public function show404($params = null) {
        $this->view->response("El recurso solicitado no existe", 404);
    }

}