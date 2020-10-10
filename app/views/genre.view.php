<?php

include_once 'libs/libs/Smarty.class.php';

class GenreView{

    private $smarty;

    function __construct(){
        $this->smarty = new Smarty();
    }

    function showPanelGenres($genres){
        $this->smarty->assign('genres', $genres);
        $this->smarty->display('templates/genres.tpl');
    }

    function showFormGenre($genre){
        $this->smarty->assign('genre', $genre);
        $this->smarty->display('templates/form-genre.tpl');
    }

}