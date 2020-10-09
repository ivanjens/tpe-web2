<?php

include_once 'libs/libs/Smarty.class.php';

class LibrosView{

    private $smarty;

    function __construct(){
        $this->smarty = new Smarty();
    }

    function showLibros($libros, $generos){
        $this->smarty->assign('libros', $libros);
        $this->smarty->assign('generos', $generos);
        $this->smarty->display('templates/home.tpl');
    }

    function showPanelLibros($libros, $generos){
        $this->smarty->assign('libros', $libros);
        $this->smarty->assign('generos', $generos);
        $this->smarty->display('templates/libros.tpl');
    }

    function showFormLibro($libro, $generos){
        $this->smarty->assign('libro', $libro);
        $this->smarty->assign('generos', $generos);
        $this->smarty->display('templates/form-libro.tpl');
    }

    function showError($mensaje){
        $this->smarty->assign('msg', $mensaje);
        $this->smarty->display('templates/error.tpl');
    }
    //
    function showAbout($name,$descripcion) {
        $this->smarty->assign('name', $name);
        $this->smarty->assign('descripcion', $descripcion);
        $this->smarty->display('templates/about.tpl');
    }

    function showLibro($libro) {
        $this->smarty->assign('libro', $libro);
        $this->smarty->display('templates/libroDetail.tpl');
    }


}