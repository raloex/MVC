<?php

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
                
                $this->view->render('main/index');
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
