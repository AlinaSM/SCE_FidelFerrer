<?php
$Servidor = "localhost";
$BaseDatos = "mydb";
$Usuario = "root";
$contrasena = "";

try{
    $conexion = new PDO('mysql:host=localhost;dbname=mydb',
                     $Usuario,
                     $contrasena);
    $conexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
}catch(PDOException $e){
    $CadenaSalida = "Error durante la conexion con la base de datos." . $e;
    echo $CadenaSalida;
}

?>
