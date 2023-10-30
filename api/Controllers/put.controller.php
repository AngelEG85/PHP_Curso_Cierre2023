<?php

require_once "Models/put.models.php";

class PutController{

    public function Actualizar($id,$nombre,$precio,$cantidad){
        //recibimos en $response y se realiza la ejecución del metodos actualizar de la clase PutModel que esta en el arcivos put.models.php
        $response = PutModel::Actualizar($id,$nombre,$precio,$cantidad);
        //devolvemos la respuesta a put.php para quelo muestre en la ruta
        $return = new PutController();
        $return-> fncResponse($response);
    }

    /*
    LAS RESPUESTAS DEL CONTROLADOR 
    */
    public function fncResponse($response){

        // Si no vino nada en el response que recibimos desde modelo, avisamos que no están los datos, sino, los mostramos indicando en total la cantidad de resultados
        if ($response === true) {
            // Actualización exitosa
            echo json_encode(array('message' => 'Producto actualizado con éxito'));
        } else {
            // Actualización fallida
            echo json_encode(array('message' => 'Error al intentar actualizar el producto'));
        }
    }

}