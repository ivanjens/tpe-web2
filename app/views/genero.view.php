<?php

class GeneroView{

    function showEditarGenero($genero){
        $smarty = new Smarty();
        $smarty->assign('genero', $genero);
        $smarty->display('templates/form-genero.tpl');
    }

    function showPanelGeneros($generos){
        $smarty = new Smarty();
        $smarty->assign('generos', $generos);
        $smarty->display('templates/generos.tpl');
    }


}