<?php
// Incluir por única vez el archivo connection
include_once("connection.php");

class PutModel{
    // El metodo Actualizar recibe los datos del producto del controlador y ejecuta la consulta en la base de datos
    static public function Actualizar($id,$nombre,$precio,$cantidad){
        try {
            // verificamos que exista el registro

            $sqlValidacionID = "SELECT COUNT(*) FROM productos WHERE id=:id";
            $stmtValidacionID= Connection::connect()->prepare($sqlValidacionID);
            $stmtValidacionID->bindParam(":id",$id);
            $stmtValidacionID->execute();
            $count = $stmtValidacionID->fetchColumn();

            if($count == 0){
                $sql = "UPDATE productos SET nombre=:nombre, precio=:precio, cantidad=:cantidad WHERE id=:id";

                //en la variable statement llamamos al metodos conectar y el metodo de PDO prepare para preparar la consulta que esta almacenada en $sql
                $stmt = Connection::connect()->prepare($sql);
                $stmt->bindParam(":id", $id);
                $stmt->bindParam(':nombre', $nombre);
                $stmt->bindParam(':precio', $precio);
                $stmt->bindParam(':cantidad', $cantidad);
                //Ejecutamos la consulta y la guardamos en ·smtm
            //  $stmt -> execute();
                // retornamos $smtm al Controlador

                if ($stmt->execute()) {
                    return true; // Éxito
                } else {
                    return false; // Falló la actualización
                }
                
            }else{
                return false; // El registro con el ID no existe
            }
        } catch (PDOException $e) {
            die("Error de conexión a la base de datos: " . $e->getMessage());
        }
    }
}
