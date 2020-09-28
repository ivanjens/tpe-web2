<?php

include_once 'libs/libs/Smarty.class.php';

class LibrosView{

    function showLibros($libros, $generos){
        $smarty = new Smarty();
        $smarty->assign('libros', $libros);
        $smarty->assign('generos', $generos);
        $smarty->display('templates/home.tpl');
    }

    function showPanelLibros($libros, $generos){
        $smarty = new Smarty();
        $smarty->assign('libros', $libros);
        $smarty->assign('generos', $generos);
        $smarty->display('templates/libros.tpl');
    }

    function showEditarLibro($libro, $generos){
        $smarty = new Smarty();
        $smarty->assign('libro', $libro);
        $smarty->assign('generos', $generos);
        $smarty->display('templates/form-libro.tpl');
    }

    function showFormGenero($genero){
        $smarty = new Smarty();
        $smarty->assign('genero', $genero);
        $smarty->display('templates/form-genero.tpl');
    }

    function showError($mensaje){
        $smarty = new Smarty();
        $smarty->assign('msg', $mensaje);
        $smarty->display('templates/show-error.tpl');
    }
    //
    function showAbout($name,$descripcion) {
    
        $smarty = new Smarty();
        $smarty->assign('name', $name);
        $smarty->assign('descripcion', $descripcion);
        $smarty->display('templates/about.tpl');
    }
}