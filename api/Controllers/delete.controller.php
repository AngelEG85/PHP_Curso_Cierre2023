<?php

require_once "Models/delete.models.php";
class DeleteController{

       static public function eliminarId($table,$id){
        //recibimos en $response lo ejecución del metodos getData de la clase getModel que esta en el arcivos get.models.php
        // verificamos la recepciónde los datos
         var_dump($table);
         var_dump($id);
        $response = DeleteModel::eliminarId($table,$id);
        //devolvemos la respuesta a get.php para quelo muestre en la ruta
        $return = new DeleteController();
        $return-> fncResponse($response);
    }

    /*
    LAS RESPUESTAS DEL CONTROLADOR 
    */
    public function fncResponse($response){

        // Si no vino nada en el response que recibimos desde modelo, avisamos que no están los datos, sino, los mostramos indicando en total la cantidad de resultados
        if(!empty($response)){

            echo json_encode(array('message'=> 'Producto eliminado'));

        }else{
            echo json_encode(array('message'=> 'Error al Eliminar el Producto'));
            }
    
    }

}