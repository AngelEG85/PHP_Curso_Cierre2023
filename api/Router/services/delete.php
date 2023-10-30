<?php

require_once "Controllers/delete.controller.php";

//guardamos en tabla lo que viene desdes el get, el elemento 3 es la tabla, el 4 sera el id

    $table =($routesArray[3]);
    $id = ($routesArray[4]);
    $response = new DeleteController();
    $response -> EliminarId($table,$id);
