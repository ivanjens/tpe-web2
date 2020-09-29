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

    function showPanelGeneros($generos){
        $smarty = new Smarty();
        $smarty->assign('generos', $generos);
        $smarty->display('templates/generos.tpl');
    }

    function showFormLibro($libro, $generos){
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

    function showEditarGenero($genero){
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
    function showAbout($name = null) {
        include_once('templates/header.php');
    
        $html = '
    
        <h1>Acerca de</h1>
    
        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Eveniet sunt, asperiores nulla dolor at quos! Libero a quas placeat doloremque explicabo! Culpa, totam. Expedita recusandae fugiat consequatur laudantium amet alias?</p>
        
        <h2>Desarrolladores</h2>
        <ul>
            <li><a href="about/micaela">Micaela Cisneros</a></li>
            <li><a href="about/ivan">Ivan Jensen</a></li>
        </ul>'
            . getDev($name) .
    '</body>
    </html>';
    
        echo $html;
    }
}