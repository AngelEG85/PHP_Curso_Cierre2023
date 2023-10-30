<?php

require_once "Models/get.models.php";
class GetController{

    static public function getData($table){
        //recibimos en $response lo ejecución del metodos getData de la clase getModel que esta en el arcivos get.models.php
        $response = GetModel::getData($table);
        //devolvemos la respuesta a get.php para quelo muestre en la ruta
        $return = new GetController();
        $return-> fncResponse($response);
    }

    static public function getDataId($table,$id){
        //recibimos en $response lo ejecución del metodos getData de la clase getModel que esta en el arcivos get.models.php
        $response = GetModel::getDataId($table,$id);
        //devolvemos la respuesta a get.php para quelo muestre en la ruta
        $return = new GetController();
        $return-> fncResponse($response);
    }

    /*
    LAS RESPUESTAS DEL CONTROLADOR 
    */
    public function fncResponse($response){

        // Si no vino nada en el response que recibimos desde modelo, avisamos que no están los datos, sino, los mostramos indicando en total la cantidad de resultados
        if(!empty($response)){

            $json = array(
                // Avisamos que la respuesta fue satisfactoriamente
                'status' => 200,
                'total' => count($response),
                'results'=> $response
            ); 
            
            echo json_encode($json, http_response_code($json['status']));

        }else{
            $json = array(
                // Avisamos que la respuesta fue satisfactoriamente
                'status' => 404,
                'results'=> 'Not Found',
            ); 
            
            echo json_encode($json, http_response_code($json['status']));
        }
    
    }

}