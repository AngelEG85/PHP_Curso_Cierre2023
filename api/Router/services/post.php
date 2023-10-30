<?php

require_once "Controllers/post.controller.php";

//guardamos los parametros que vienen en el JSON desde el POST Y se lo enviamos al controlador

if(isset($_POST)){

    $data = json_decode(file_get_contents('php://input'),true);
   
     $nombre= $data['nombre'];
     $precio= $data['precio'];
     $cantidad= $data['cantidad'];

      // verificamos la recepciónde los datos
    // var_dump($nombre);
    // var_dump($precio);
    // var_dump($cantidad);

     $response = new PostController();
     $response -> Agregar($nombre,$precio,$cantidad);

}


?>