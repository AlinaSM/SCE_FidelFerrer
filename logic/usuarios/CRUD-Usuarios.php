<?php

function existeUsuario($usuario, $conexion){
    try{
        $consulta = "SELECT COUNT(usuario) FROM usuarios WHERE usuario = '$usuario';";
        $resultado = $conexion->query($consulta);
        $nTuplas = $resultado->fetchColumn();
      if($nTuplas>0){
          return true;
      }else{
          return false;
      }
    }catch(PDOException $e){
        echo "Error: " . $e->getMessage();
    }
}

function cabeSecretarioNuevo($conexion){
    try{
        $consulta = "SELECT COUNT(usuario) FROM usuarios WHERE puesto = 'SECRETARIO';";
        $resultado = $conexion->query($consulta);
        $nTuplas = $resultado->fetchColumn();

      if($nTuplas>=3){
          return false;
      }else{
          return true;
      }
    }catch(PDOException $e){
        echo "Error: " . $e->getMessage();
    }
}

function registrarUsuario($usuario, $contrasena,$paterno, $materno,$nombre, $conexion){
    try{
        $puesto = "SECRETARIO";
        $consulta = "INSERT INTO usuarios (puesto, usuario, contrasenia, paterno, materno, nombre) VALUES ('$puesto','$usuario' , '$contrasena', '$paterno','$materno','$nombre');";
        $conexion->query($consulta);
       
    }catch(PDOException $e){
        echo "Error: " . $e->getMessage();
    }
}



?>