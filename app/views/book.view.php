<?php

include_once 'libs/libs/Smarty.class.php';

class BookView{

    private $smarty;

    function __construct(){
        $this->smarty = new Smarty();
    }

    function showBooks($books, $genres){
        $this->smarty->assign('books', $books);
        $this->smarty->assign('genres', $genres);
        $this->smarty->display('templates/home.tpl');
    }

    function showPanelBooks($books, $genres){
        $this->smarty->assign('books', $books);
        $this->smarty->assign('genres', $genres);
        $this->smarty->display('templates/panel-books.tpl');
    }

    function showFormBook($book, $genres){
        $this->smarty->assign('book', $book);
        $this->smarty->assign('genres', $genres);
        $this->smarty->display('templates/form-book.tpl');
    }

    function showError($msg){
        $this->smarty->assign('msg', $msg);
        $this->smarty->display('templates/error.tpl');
    }
    
    function showAbout($name,$descripcion) {
        $this->smarty->assign('name', $name);
        $this->smarty->assign('descripcion', $descripcion);
        $this->smarty->display('templates/about.tpl');
    }

    function showBook($book, $promedio, $user_review) {
        $this->smarty->assign('book', $book);
        $this->smarty->assign('promedio', $promedio);
        $this->smarty->assign('user_review', $user_review);
        $this->smarty->display('templates/book-detail.tpl');
    }


}