<?php

class AuthHelper{


    // comprueba si un usuario está logeado
    function checkLogged() {
        session_start();
        if (!isset($_SESSION['ID_USER'])) {
            session_destroy();
        }
    }   
    
    // destruye la sesión de un usuario
    function logout() {
        session_start();
        session_destroy();
        header("Location: " . BASE_URL);
    }    

    // crea la sesión para el usuario
    function login($user) {
        session_start();
        $_SESSION['ID_USER'] = $user->id;
        $_SESSION['NAME_USER'] = $user->nombre;
        $_SESSION['EMAIL_USER'] = $user->email;
        $_SESSION['ADMIN'] = $user->permisos;
    }

}