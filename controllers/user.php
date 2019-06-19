<?php

class User extends Controller{
    
    // database connection and table name
    private $conn;
    private $table_name = "users";
 
    // object properties
    public $id;
    public $name;
    public $lastname;
    public $email;
    public $password;
    
    function __construct() {
        parent::__construct();
    }
    




 

 
}