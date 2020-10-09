<?php

include_once 'libs/libs/Smarty.class.php';

class GeneroView{

    private $smarty;

    function __construct(){
        $this->smarty = new Smarty();
    }

    function showPanelGeneros($generos){
        $this->smarty->assign('generos', $generos);
        $this->smarty->display('templates/genero.tpl');
    }

    function showFormGenero($genero){
        $this->smarty->assign('genero', $genero);
        $this->smarty->display('templates/form-genero.tpl');
    }

}