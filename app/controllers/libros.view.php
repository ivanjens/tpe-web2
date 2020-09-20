<?php

class LibrosView(){

    function showLibros($libros){
        echo '<ul>';
        foreach($libros as $libro){
            echo '<li>' . $libro->titulo . $libro->autor . $libro->editorial . $libro->sinopsis . $libro->titulo . $libro->precio . $libro->stock . '</li>';
        }
        echo '</ul>';
    }
}