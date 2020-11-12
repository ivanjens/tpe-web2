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

    // Lee la variable asociada a la entrada estandar y la convierte en JSON
    function getData(){ 
        return json_decode($this->data); 
    } 

    function getReviews($params = null){
        $reviews = $this->model->getAll();
        $this->view->response($reviews, 200);
    }

    function get($params = null){
        $idReview = $params[':ID'];
        $review = $this->model->get($idReview);
        if($review){
            $this->view->response($review, 200);
        } else{
            $this->show404();
        }
    }

    public function show404($params = null) {
        $this->view->response("El recurso solicitado no existe", 404);
    }

}