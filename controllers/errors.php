<?php

class Errors extends Controller{
    function __construct() {
        parent::__construct();
        $this->view->mensaje = "Error 404!!!";
        $this->view->render('error/index');
    }
}

