<?php

class Alumno extends Controller{
    function __construct() {
        parent::__construct();
        $this->view->datos = [];
        $this->view->mensaje = "";
    }

    function render(){
        $this->view->render('alumno/index');
    }
           
    function allAlumno(){
        $results = array(
            "recordsTotal" => intval(count($this->model->get())),
            "recordsFiltered" => intval(count($this->model->get())),
            "data" => $this->model->get()
        );
        
        echo json_encode($results);
    }
    
    function actualizarAlumno(){
        if(!empty($_POST['matricula'])){
            
            $datos = ['matricula' => $_POST['matricula'], 'nombre' => $_POST['nombre'], 'apellidos' => $_POST['apellidos']];
            if($this->model->update($datos)){
                $results = array(
                    "result" => true,
                    "mensaje" => "Actualizado"
                );
                
            } else {
                $results = array(
                    "result" => false,
                    "mensaje" => "No se puede actualizar"
                );
            }
        }else{
            $results = array(
                "result" => false,
                "mensaje" => "Error ID"
            );
        }
        
        echo json_encode($results);
    }
    
    function eliminarAlumno($param = null){
        $matricula = $param[0];
        if($this->model->delete($matricula)){
            $results = array(
                "result" => true,
                "mensaje" => "Alumno eliminado correctamente"
            );
        }else{
            $results = array(
                "result" => false,
                "mensaje" => "No se pudo eliminar al alumno"
            );
        }
        
        echo json_encode($results);
    }
    
    function registrarAlumno(){
        if(!empty($_POST)){
            $matricula  = $_POST['matricula'];
            $nombre     = $_POST['nombre'];
            $apellidos  = $_POST['apellidos'];
            
            $mensaje = "";

            if($this->model->insert(['matricula' => $matricula, 'nombre' => $nombre, 'apellidos' => $apellidos])){
                $results = array(
                    "result" => true,
                    "mensaje" => "Creado"
                );
            }else{
                $results = array(
                    "result" => false,
                    "mensaje" => "Ya existe"
                );
            }
            
            echo json_encode($results);
        }
    }
}