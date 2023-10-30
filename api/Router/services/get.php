<?php

require_once "Controllers/get.controller.php";

//guardamos en tabla lo que viene desdes el get, el elemento 3 es la tabla, el 4 sera el id

if (count($routesArray) <= 3) {

    $table =($routesArray[3]);
    $response = new GetController();
    $response -> getData($table);
    
} else {

    $table =($routesArray[3]);
    $id = ($routesArray[4]);
    $response = new GetController();
    $response -> getDataId($table,$id);
}









