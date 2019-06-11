<?php

class Modal extends Controller {
    function __construct() {
        parent::__construct();
        $this->view->mensaje = "";
    }

    function registrarAlumno(){
        if(!empty($_POST)){
            $matricula  = $_POST['matricula'];
            $nombre     = $_POST['nombre'];
            $apellidos  = $_POST['apellidos'];
            
            $mensaje = "";

            if($this->model->insert(['matricula' => $matricula, 'nombre' => $nombre, 'apellidos' => $apellidos])){
                $mensaje = "Creado";
            }else{
                $mensaje = "Ya existe";
            }
            
            $this->view->mensaje = $mensaje;
            $this->render();
        }
    }
    
    function nuevo(){
        $this->view->render('alumno/modal/add');
    }
    
    function eliminar($param = null){
        $this->view->matricula = $param[0];
        $this->view->render('alumno/modal/delete');
    }

    function editar($param = null){
        $this->loadModel('alumno');
        $this->view->alumno = $this->model->getById($param[0]);
        
        if($this->view->alumno){
            $this->view->render('alumno/modal/edit');
        } else {
            $controller = new Errors();
        }
    }
    
}
