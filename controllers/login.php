<?php

error_reporting(E_ALL);


class Login extends Controller {

    function __construct() {
        parent::__construct();
        $this->view->mensaje = "";
    }

    function login() {
        try {
            $data = ['username' => $_POST['username'], 'password' => $_POST['password']];

            if ($this->model->login($data)) {
        
        
                $results = ["success" => true, "message" => "Si"];
                //require 'views/main/index.php';
                //header('Location: http://localhost/local/MVC/main');
                //$this->view->render('main/index');
                
               /* require_once 'controllers/main.php';
                $controller = new Main();
                $controller->loadModel('main');
                $controller->render();
                return false;
                */
                
                
                //FUNCIONA
                //$results = ["success" => true, "message" => "<script type='text/javascript'>window.location.href = 'http://localhost/local/MVC/main';</script>"];
                
                
                
            } else {
                $results = ["success" => false, "message" => "No"];
            }
        } catch (Exception $e) {
            $results = ["success" => false, "message" => "No"];
        }

        echo json_encode($results);
        
    }

    function render() {
        $this->view->render('login/index');
    }

}
