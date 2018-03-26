<?php
require 'conexion.php';

$CCT        = "";
$Nombre     = "N";
$Turno      = "";
$Zona       = "";
$Domicilio  = "";
$Localidad  = "";
$Municipio  = "";
$Region     = "";

$mensaje = null;

try{
    $consulta = 'SELECT cct, nombre, turno, zona, domicilio, localidad, municipio, region FROM escuela;';
    $resultado = $conexion->query($consulta);
    $tupla = $resultado->fetch();

    if( $tupla ){
        $CCT        = $tupla['cct'];
        $Nombre     = $tupla['nombre'];
        $Turno      = $tupla['turno'];
        $Zona       = $tupla['zona'];
        $Domicilio  = $tupla['domicilio'];
        $Localidad  = $tupla['localidad'];
        $Municipio  = $tupla['municipio'];
        $Region     = $tupla['region'];

    }

}catch(PDOException $e){
    $mensaje = "Error al generar la consulta a la base de datos: " . $e->getMessage();
}


?>