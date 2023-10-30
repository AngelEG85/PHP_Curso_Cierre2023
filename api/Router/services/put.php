<?php

require_once "Controllers/put.controller.php";

//guardamos los parametros que vienen en el JSON desde el PUT Y se lo enviamos al controlador

if(isset($_POST)){

    $data = json_decode(file_get_contents('php://input'),true);

     $id= $data['id'];
     $nombre= $data['nombre'];
     $precio= $data['precio'];
     $cantidad= $data['cantidad'];

      // verificamos la recepciónde los datos
    //  var_dump($id);
    //  var_dump($nombre);
    //  var_dump($precio);
    //  var_dump($cantidad);

     $response = new PutController();
     $response -> Actualizar($id,$nombre,$precio,$cantidad);

}


?>