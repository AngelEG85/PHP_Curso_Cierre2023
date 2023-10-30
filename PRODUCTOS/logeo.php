<?php

session_start();

include_once 'conexion.php';
$objeto = new Conexion();
$conexion = $objeto->Conectar();

//Recepcion de los datos enviados mediante post desde ajax
$usuario = (isset($_POST['usuario'])) ? $_POST['usuario']: '';
$clave = (isset($_POST['password'])) ? $_POST['password']: '';
$email = (isset($_POST['email'])) ? $_POST['email']:


$consulta = "SELECT username, password, email, token FROM PRODUCTOS where username = '$usuario' and password = '$clave'";
$resultado = $conexion->prepare($consulta);
$resultado->execute();

if ($resultado->rowCount()>= 1) {
  $data = $resultado-> fetchAll(PDO::FETCH_ASSOC);
  foreach ($data as $muestra) {
  //hacer consulta y obtener nombre
  $_SESSION["s_usuario"] = $usuario;
 
  $_SESSION["s_NombreUsuario"] = $muestra['username'];
  }
} else {
  $_SESSION["s_usuario"] = null;
  $data=null;
}

print json_encode($data);
$conexion=null;
