<?php
require 'logic\FechaHora.php';
require 'logic\usuarios\MetodosBitacora.php';

$mensaje_error = null;

function consultarUsuario($conexion, $usuario, $contrasena){
   $fecha_sist = FechaHoraSistema(); 
    try{
        $consulta = "SELECT id, puesto, usuario, contrasenia FROM usuarios WHERE usuario = '$usuario';";
        $resultado = $conexion->query($consulta);
        $tupla = $resultado->fetch();

        if($tupla && $contrasena == $tupla['contrasenia']){
            $_SESSION['user_id'] = $tupla['id'];
            $tipo = $tupla['puesto'];

            registrarBitacora($usuario, $fecha_sist,$tipo, $conexion);

            switch($tupla['puesto']){
                case 'DIRECTOR':
                    header("Location: inicio-direc.php");
                break;
                case 'SECRETARIO':
                    header("Location: inicio-secre.php");
                break;
            }
        }

    }catch(PDOException $e){

        $mensaje_error = "Error al generar la consulta a la base de datos: " . $e->getMessage();

    }
}


?>