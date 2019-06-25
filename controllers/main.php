<?php

class Main extends Controller{
    function __construct() {
        parent::__construct();
    }
    
    function render(){
        $this->view->render('main/index');
    }
    
    function redirect(){
        header('Location: http://localhost/local/MVC/main');
        exit;
    }
}
