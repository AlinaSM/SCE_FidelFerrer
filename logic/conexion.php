<?php
$Servidor = "localhost";
$BaseDatos = "db_Fidel_Ferrer";
$Usuario = "root";
$contrasena = "";

try{
    $conexion = new PDO("mysql:host=$Servidor;dbname=$BaseDatos",$Usuario,$contrasena);
    $conexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
}catch(PDOException $e){
    $CadenaSalida = "Error durante la conexion con la base de datos." . $e;
    echo $CadenaSalida;
}

?>
