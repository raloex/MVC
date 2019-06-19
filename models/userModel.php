<?php

class UserModel extends Model{
    
    public function __construct() {
        parent::__construct();
    }
    
    public function create(){
        $query = "INSERT INTO " . $this->table_name . "
                SET
                    name = :name,
                    lastname = :lastname,
                    email = :email,
                    password = :password";

        // prepare the query
        $stmt = $this->db->connect()->prepare($query);

        // sanitize
        $this->name         = htmlspecialchars(strip_tags($this->name));
        $this->lastname     = htmlspecialchars(strip_tags($this->lastname));
        $this->email        = htmlspecialchars(strip_tags($this->email));
        $this->password     = htmlspecialchars(strip_tags($this->password));

        // bind the values
        $stmt->bindParam(':name', $this->name);
        $stmt->bindParam(':lastname', $this->lastname);
        $stmt->bindParam(':email', $this->email);

        // hash the password before saving to database
        $password_hash = password_hash($this->password, PASSWORD_BCRYPT);
        $stmt->bindParam(':password', $password_hash);

        // execute the query, also check if query was successful
        if($stmt->execute()){
            return true;
        }

        return false;
    }
    
    function emailExists(){
        // query to check if email exists
        $query = "SELECT id, firstname, lastname, password
                FROM " . $this->table_name . "
                WHERE email = ?
                LIMIT 0,1";

        // prepare the query
        $stmt = $this->db->connect()->prepare($query);

        // sanitize
        $this->email = htmlspecialchars(strip_tags($this->email));

        // bind given email value
        $stmt->bindParam(1, $this->email);

        // execute the query
        $stmt->execute();

        // get number of rows
        $num = $stmt->rowCount();

        // if email exists, assign values to object properties for easy access and use for php sessions
        if($num>0){

            // get record details / values
            $row = $stmt->fetch(PDO::FETCH_ASSOC);

            // assign values to object properties
            $this->id = $row['id'];
            $this->firstname = $row['firstname'];
            $this->lastname = $row['lastname'];
            $this->password = $row['password'];

            // return true because email exists in the database
            return true;
        }

        // return false if email does not exist in the database
        return false;
    }
    
    


    
}
