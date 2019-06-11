<?php

class Api extends Controller{
    function __construct() {
        parent::__construct();
    }
    
    function allAlumno(){
        echo json_encode($this->model->get());
    }
}