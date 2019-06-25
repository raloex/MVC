<?php

class Redirect extends Controller{
    function __construct() {
        parent::__construct();
    }
    
    function render($nombre){
        require 'views/'.$nombre.'.php';
    }
}
