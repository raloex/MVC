<?php

class LoginModel extends Model {

    public function __construct() {
        parent::__construct();
    }

    function login($datos) {
        try {
            $query = $this->db->connect()->prepare('SELECT * FROM user WHERE username = :username AND password = :password');
            $query->execute($datos);

            if ($query->rowCount() > 0) {
                return true;
            } else {
                return false;
            }
            
        } catch (PDOException $e) {
            return array('error' => $e->getMessage());
        }
    }

}
