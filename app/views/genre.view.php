<?php

include_once 'libs/libs/Smarty.class.php';

class GenreView{

    private $smarty;

    function __construct(){
        $this->smarty = new Smarty();
    }

    function showPanelGenres($genres, $msg = null){
        $this->smarty->assign('genres', $genres);
        $this->smarty->assign('msg', $msg);
        $this->smarty->display('templates/panel-genres.tpl');
    }

    function showFormGenre($genre){
        $this->smarty->assign('genre', $genre);
        $this->smarty->display('templates/form-genre.tpl');
    }

}