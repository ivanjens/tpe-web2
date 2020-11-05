<?php

class AuthView{

    private $smarty;

    function __construct(){
        $this->smarty = new Smarty();
    }

    function showFormLogin($msg = null){
        $this->smarty->assign('msg', $msg);
        $this->smarty->display('templates/login.tpl');
    }

    function showPanelElection(){
        $this->smarty->display('templates/panel-election.tpl');
    }

    function showPanelUsers($users){
        $this->smarty->assign('users', $users);
        $this->smarty->display('templates/panel-users.tpl');
    }

    function showFormRegister(){
            $this->smarty->display('templates/register.tpl');
    }
}