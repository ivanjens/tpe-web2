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
}