<?php
// Incluir por única vez el archivo connection
include_once("connection.php");

class PostModel{
    // El metodo Agregar recibe los datos del producto del controlador y ejecuta la consulta en la base de datos
    static public function Agregar($nombre,$precio,$cantidad){
        try {
            $sql = "INSERT INTO productos (nombre, precio, cantidad) VALUES (:nombre, :precio, :cantidad)";

            //en la variable statement llamamos al metodos conectar y el metodo de PDO prepare para preparar la consulta que esta almacenada en $sql
            $stmt = Connection::connect()->prepare($sql);
            $stmt->bindParam(':nombre', $nombre);
            $stmt->bindParam(':precio', $precio);
            $stmt->bindParam(':cantidad', $cantidad);
            //Ejecutamos la consulta y la guardamos en ·smtm
          //  $stmt -> execute();
            // retornamos $smtm al Controlador
            return $stmt->execute();
        } catch (PDOException $e) {
            die("Error de conexión a la base de datos: " . $e->getMessage());
        }
    }
}
