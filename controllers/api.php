<?php
include_once 'public/plugins/php-jwt/src/BeforeValidException.php';
include_once 'public/plugins/php-jwt/src/ExpiredException.php';
include_once 'public/plugins/php-jwt/src/SignatureInvalidException.php';
include_once 'public/plugins/php-jwt/src/JWT.php';

class Api extends Controller{
    
    function __construct() {
        parent::__construct();
    }
    
    private function validateToken($jwt){
        if($jwt) {
            try {
                $tkn = new Firebase\JWT\JWT();
                $tkn->decode($jwt, constant('KEY_TOKEN'), array('HS256'));
                http_response_code(200);
                return true;

            } catch (Exception $e){
                http_response_code(401);
                return false;
            }
        } else {
            http_response_code(401);
            return false;
        }
    }

    public function createToken(){
        header("Access-Control-Allow-Origin: " . constant('URL') );
        header("Content-Type: application/json; charset=UTF-8");
        header("Access-Control-Allow-Methods: POST");
        header("Access-Control-Max-Age: 3600");
        header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");
        
        try {
            if(strcasecmp($_SERVER['REQUEST_METHOD'], 'POST') != 0){
                http_response_code(401);
                throw new Exception('Acceso denegado: método de envío incorrecto');
            }
            
            $token = array(
                "iss" => constant('URL'),
                "aud" => constant('URL'),
                "iat" => time(),
                "nbf" => time(),
                "exp" => time()+(60*60),
                "data" => null
            );

            $jwt = new Firebase\JWT\JWT();
            $result = $jwt->encode($token, constant('KEY_TOKEN'));
            
            if($result) {
                http_response_code(200);
                echo json_encode(array("token" => $result));

            } else {
                http_response_code(401);
                throw new Exception('Acceso denegado: error token');
            }

        } catch (Exception $e) {
            http_response_code(401);
            echo json_encode(array("error" => $e->getMessage()));
        }
    }
    
    function createUser(){
        header("Access-Control-Allow-Origin: " . constant('URL') );
        header("Content-Type: application/json; charset=UTF-8");
        header("Access-Control-Allow-Methods: POST");
        header("Access-Control-Max-Age: 3600");
        header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");
        
        try {
            if(strcasecmp($_SERVER['REQUEST_METHOD'], 'POST') != 0){
                http_response_code(401);
                throw new Exception('Acceso denegado: método de envío incorrecto');
            }
        
            $headers = getallheaders();
            $token = explode(" ", $headers['Authorization']);
            
            
            if($token[0] != "Bearer" || empty($token[1])) {
                http_response_code(401);
                throw new Exception('Acceso denegado: authorization incorrecto');
            }

            if($this->validateToken($token[1])) {
                $data = json_decode( file_get_contents("php://input"), true);

                http_response_code(200);
                echo json_encode($this->model->insertUser($data));
            } else {
                http_response_code(401);
                throw new Exception('Acceso denegado: error token');
            }

        } catch (Exception $e) {
            http_response_code(401);
            echo json_encode(array("error" => $e->getMessage()));
        }
    }
}