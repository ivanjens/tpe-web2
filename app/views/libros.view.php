<?php

include_once 'libs/libs/Smarty.class.php';

class LibrosView{

    function showLibros($libros){
        include_once 'templates/header.php';
        echo '<div>';
        foreach($libros as $libro){
            echo '
            <div class="card d-inline-block ml-5 mt-5" style="width: 14rem;">
                <img src="..." class="card-img-top" alt="Portada libro">
                <div class="card-body">
                    <h6 class="card-title text-center">' . $libro->titulo .'<h6>
                </div>
            </div>
            ';
        }
        echo '</div>';
        include_once 'templates/footer.php';
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