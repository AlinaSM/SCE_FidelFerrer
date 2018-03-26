<?php
require 'logic\FechaHora.php';

$mensaje_error = null;
$fecha_sist = FechaHoraSistema();

function consultarUsuario($conexion, $usuario, $contrasena){
    
    try{
        $consulta = "SELECT id, puesto, usuario, contrasenia FROM usuarios WHERE usuario = '$usuario';";
        $resultado = $conexion->query($consulta);
        $tupla = $resultado->fetch();

        if($tupla && $contrasena == $tupla['contrasenia']){
            $_SESSION['user_id'] = $tupla['id'];
            
            switch($tupla['puesto']){
                case 'DIRECTOR':
                    header("Location: inicio-admin.php");
                break;
                case 'SECRETARIO':
                    header("Location: inicio.php");
                break;
            }
        }

    }catch(PDOException $e){

        $mensaje_error = "Error al generar la consulta a la base de datos: " . $e->getMessage();

    }
}


?>