<?php
require('../conexion.php');
require('CRUD-Usuarios.php');

$NombreUsuario = $_POST['txtUsuario'];
$Contrasena    = $_POST['txtContrasena'];
$Nombre        = $_POST['txtNombre'];
$Paterno       = $_POST['txtPaterno'];
$Materno       = $_POST['txtMaterno'];


if(existeUsuario($NombreUsuario, $conexion)){
    echo "El usuario ya esta registrado.";
    header('Location: ../../pages/control-usuarios/confirmar.php?op=yaExiste');
}else{
    if(cabeSecretarioNuevo($conexion)){
        registrarUsuario($NombreUsuario, $Contrasena,$Paterno, $Materno,$Nombre, $conexion);
        header('Location: ../../pages/control-usuarios/confirmar.php?op=exito');
    }else{
        echo "No cabe el secretario";
        header('Location: ../../pages/control-usuarios/confirmar.php?op=noCabe'); 
    } 
}

?>