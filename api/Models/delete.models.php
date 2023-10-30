<?php
// Incluir por única vez el archivo connection
include_once("connection.php");

class DeleteModel{
   
    static public function EliminarId($table,$id){

        $sql = "DELETE FROM productos WHERE id = :id";
        //en la variable statement llamamos al metodos conectar y el metodo de PDO prepare para preparar la consulta que esta almacenada en $sql
        $stmt = Connection::connect()->prepare($sql);
       // $stmt->bindParam(':table', $table);
        $stmt->bindParam(':id', $id);
        //Ejecutamos la consulta y la guardamos en stmt
        return $stmt->execute();
        // retornamos $stmt al Controlador
      
    }
}