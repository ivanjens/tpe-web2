<?php

class AuthView{

    private $smarty;

    function __construct(){
        $this->smarty = new Smarty();
    }

    function showFormLogin(){
        $this->smarty->display('templates/login.tpl');
    }

    // function showFormRegister(){}
}