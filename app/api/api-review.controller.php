<?php

include_once 'app/models/review.model.php';
include_once 'app/api/api.view.php';
include_once 'app/helpers/auth.helper.php';

class APIReviewController{

    private $model;
    private $viewBook;
    private $authHelper;
    private $data;

    function __construct(){
        $this->model = new ReviewModel();
        $this->view = new APIView();
        $this->authHelper = new AuthHelper();
        $this->data = file_get_contents("php://input");

        $this->authHelper->checkLogged();
    }

    // lee la variable asociada a la entrada estandar y la convierte en JSON
    function getData(){ 
        return json_decode($this->data); 
    } 


    // solicita al modelo todas las reseñas de un libro específico
    function getByBook($params = null){
        $id_book = $params[':ID'];
        $reviews = $this->model->getByBook($id_book);

        $this->view->response($reviews, 200);

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
    // Agrega una reseña
    public function add($params = null) {
        if($this->authHelper->checkUser()){ // Verifica que sea usuario
            $body = $this->getData();
            $comentario  = $body->comentario;
            $valoracion  = $body->valoracion;
            $id_usuario  = $_SESSION['ID_USER'];
            $id_libro    = $body->id_libro;
            if(!$this->model->searchReviewByUser($id_libro, $id_usuario)){ // Verifica que no haya una reseña del mismo usuario
                    $id = $this->model->insert($comentario, $valoracion, $id_usuario, $id_libro);
                     if ($id > 0) {
                         $review = $this->model->get($id);
                         $this->view->response($review, 200);
                    }else { 
                          $this->view->response("No se pudo insertar", 500);
                     }
            } else{
                $this->view->response('El usuario ya tiene publicada una reseña en este libro', 500);
            }
        }
        else{
            $this->view->response("No tiene permisos", 500);
        }
    }
    // Elimina una reseña en especifico
    public function delete($params = null) {
        if($this->authHelper->checkAdmin()){ // Verifica que sea admin
            $idReview = $params[':ID'];
            $success = $this->model->remove($idReview);
            if ($success) {
                $this->view->response("La reseña con el id=$idReview se borró exitosamente", 200);
            }
            else { 
                $this->view->response("La reseña con el id=$idReview no existe", 404);
            }
        }
        else{
            $this->view->response("No tiene permisos", 500);
        }
    }

    // muestra un 404 al no encontrar lo que se pidió
    public function show404($params = null) {
        $this->view->response("El recurso solicitado no existe", 404);
    }


}