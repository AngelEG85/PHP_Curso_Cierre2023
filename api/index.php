<?php

// Mostramos los errores que genera problemas con la API
ini_set("display_errors",1); // visualizar errores desde navegador
ini_set("log_errors",1);//crear  archivos de errores
ini_set("error_log","C:/xampp/htdocs/apirest_php/php_error_log"); // donde guardar el archivo anterior

//===============prueba de conexion=====================
// require_once("models/connection.php");

// Connection::infoDatabase();
// echo '<pre>'; print_r(Connection::connect()); echo '</pre>';

// return;

//==========fin de prueba de conexion==================

//Requerimos el controladores de las rutas
require_once("Controllers/router.controllers.php");


// creamos a index como un objeto de la clase controlador de rutas
$index = new RouterControllers();
// ejecutamos el método index
$index->index();