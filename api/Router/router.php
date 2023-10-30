<?php
// CUANDO NO SE HACEN PETICIONES

if (isset($_SERVER['REQUEST_METHOD'])){
    //SOLICITUD GET
    if($_SERVER['REQUEST_METHOD']=="GET") {
        $routesArray = explode('/', $_SERVER['REQUEST_URI']);
        // hace un split separando por el separador /,
        $routesArray = array_filter($routesArray);
        include("services/get.php");
    }
    //SOLICITUD POST
    if($_SERVER['REQUEST_METHOD']=="POST") {
        include("services/post.php");
    }
    //SOLICITUD PUT
    if($_SERVER['REQUEST_METHOD']=="PUT") {
       include("services/put.php");
    }
    //SOLICITUD DELETE
    if($_SERVER['REQUEST_METHOD']=="DELETE") {
        $routesArray = explode('/', $_SERVER['REQUEST_URI']);
        // hace un split separando por el separador /,
        $routesArray = array_filter($routesArray);
        include("services/delete.php");
    }

    }
   


    // Consultamos por menor a tres debido a que la url trae apirest_PHP/api/ que serían dos quiere decir que no estamos recibiendo ningun parametro para hacer algo, caso contrario mostrará status 200
    // if (count($routesArray) < 3) {

    //     $json = array(
    //     // Avisamos que la respuesta fue satisfactoriamente
    //     'status' => 404,
    //     'result'=> 'Not Found',
    // ); 
    
    // echo json_encode($json, http_response_code($json['status']));
    
    // return;
    // }

    // //CUANTO SE HACEN PETICIONES A LA API
    // if (count($routesArray) >= 3 && isset($_SERVER['REQUEST_METHOD'])) {

    
    // }

