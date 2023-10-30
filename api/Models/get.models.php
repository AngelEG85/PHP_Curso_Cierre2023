<?php
// Incluir por única vez el archivo connection
include_once("connection.php");

class GetModel{
    // El metodo getData recibe la tabla del controlador y ejecuta la consulta en la base de datos
    static public function getData($table){

        $sql = "SELECT * FROM $table";
        //en la variable statement llamamos al metodos conectar y el metodo de PDO prepare para preparar la consulta que esta almacenada en $sql
        $smtm = Connection::connect()->prepare($sql);
        //Ejecutamos la consulta y la guardamos en ·smtm
        $smtm -> execute();
        // retornamos $smtm al Controlador
        return $smtm -> fetchAll(PDO::FETCH_CLASS);
    }

    static public function getDataId($table,$id){

        $sql = "SELECT * FROM $table WHERE id = $id";
        //en la variable statement llamamos al metodos conectar y el metodo de PDO prepare para preparar la consulta que esta almacenada en $sql
        $smtm = Connection::connect()->prepare($sql);
        //Ejecutamos la consulta y la guardamos en ·smtm
        $smtm -> execute();
        // retornamos $smtm al Controlador
        return $smtm -> fetchAll(PDO::FETCH_CLASS);
    }
}