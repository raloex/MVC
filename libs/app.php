<?php

require_once 'controllers/errors.php';

class App{
    function __construct(){
        $url = isset($_GET['url']) ? $_GET['url']: null;
        $url = rtrim($url, '/');
        $url = explode('/', $url);
        
        // cuando se ingresa sin definir controlador
        if(empty($url[0])){
            require_once 'controllers/main.php';
            $controller = new Main();
            $controller->loadModel('main');
            $controller->render();
            return false;
        }
        
        $archivoController = 'controllers/' . $url[0] . '.php';
        if(file_exists($archivoController)){
            require_once $archivoController;
            // inicializar controlador
            $controller = new $url[0];
            $controller->loadModel($url[0]);
            
            // # elementos del arreglo
            $nparam = sizeof($url);
            
            switch ($nparam){
                case 1:
                    $controller->render();
                break;
                
                case 2: 
                    $controller->{$url[1]}();
                break;
                
                default:
                    //comprobamos que en el controlador existe el método que necesitamos
                    $directorio = new $url[0];
                    if(method_exists($directorio, $url[1])){
                        $param = [];
                        for ($i = 2; $i < $nparam; $i++){
                            array_push($param, $url[$i]);
                        }
                        $controller->{$url[1]}($param);
                    } else {
                        $controller = new Errors();
                    }
                break;
            }
            
        }else{
            $controller = new Errors();
        }
    }
}

