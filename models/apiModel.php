<?php

class ApiModel extends Model{
    
    public function __construct() {
        parent::__construct();
    }
    
    public function insert($datos){
        //insertar datos en la BD
        try{
            $query = $this->db->connect()->prepare('INSERT INTO alumnos (matricula, nombre, apellidos) VALUES (:matricula, :nombre, :apellidos)');
            $query->execute($datos);
            return true;
        }catch(PDOException $e){
            //echo $e->getMessage();
            return false;
        }
    }
    
    public function get(){
        $items = [];
        
        try{
            $query = $this->db->connect()->query("SELECT * FROM alumnos");
            
            while($row = $query->fetch()){
                $item = ['matricula' => $row['matricula'], 'nombre' => $row['nombre'], 'apellidos' => $row['apellidos']];
                array_push($items, $item);
            }
            
            return $items;
            
        } catch (PDOException $e){
            return [];
        }
    }
    
    public function getById($id){
        
        try {
            $query = $this->db->connect()->prepare("SELECT * FROM alumnos WHERE matricula = :matricula");
            $query->execute(['matricula' => $id]);
            
            $row = $query->fetch();
            
            if($row){
                $this->matricula = $row['matricula'];
                $this->nombre    = $row['nombre'];
                $this->apellidos  = $row['apellidos'];
                return $this;
            }else{
                return false;
            }
 
        } catch (PDOException $e) {
            return $e;
        }
    }
    
    public function update($item){

        try {
            $query = $this->db->connect()->prepare("UPDATE alumnos SET nombre = :nombre, apellidos = :apellidos WHERE matricula = :matricula");
            $query->execute($item);
            
            return true;
            
        } catch (PDOException $e) {
            return false;
        }
    }
    
    public function delete($id){
        try{
            $query = $this->db->connect()->prepare('DELETE FROM alumnos WHERE matricula = :matricula');
            $query->execute([
                'matricula' => $id
            ]);
            return true;
        }catch(PDOException $e){
            return false;
        }
    }

}