<?php

require_once "Models/post.models.php";

class PostController{

    public function Agregar($nombre,$precio,$cantidad){
        //recibimos en $response lo ejecución del metodos Agregar de la clase PostModel que esta en el arcivos post.models.php
        $response = PostModel::Agregar($nombre,$precio,$cantidad);
        //devolvemos la respuesta a get.php para quelo muestre en la ruta
        $return = new PostController();
        $return-> fncResponse($response);
    }

    /*
    LAS RESPUESTAS DEL CONTROLADOR 
    */
    public function fncResponse($response){

        // Si no vino nada en el response que recibimos desde modelo, avisamos que no están los datos, sino, los mostramos indicando en total la cantidad de resultados
        if(!empty($response)){

            echo json_encode(array('message'=> 'Producto agregado correctamente'));

        }else{
            echo json_encode(array('message'=> 'Error al intentar agregar al producto'));
            }
    
    }

}
