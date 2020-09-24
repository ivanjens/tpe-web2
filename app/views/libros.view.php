<?php

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

    function showPanelAdmin($libros){
        include_once 'templates/header.php';
        include_once 'templates/form-libro.php';
        echo '<h5> Libros publicados </h5>';
        echo '<div>';
        foreach($libros as $libro){
            echo '
            <div class="card d-inline-block ml-5 mt-5" style="width: 12rem;">
                <img src="..." class="card-img-top" alt="Portada libro">
                <div class="card-body">
                    <h6 class="card-title text-center">' . $libro->titulo .'<h6>
                    <a class="btn btn-danger btn-sm" href="eliminar-libro/'. $libro->id .'">BORRAR</a>
                </div>
            </div>
            ';
        }
        echo '</div>';
        include_once 'templates/footer.php';
    }

    function showError($mensaje){
        include_once 'templates/header.php';
        echo '<p>' . $mensaje . '</p>';
        include_once 'templates/footer.php';
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