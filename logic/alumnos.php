<?php
function existeAlumno($curp, $conexion){
    try{
        $consulta = "SELECT COUNT(curp) FROM alumnos WHERE CURP='$curp';";
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


function altaAlumno($CURP, $paterno, $materno,$nombre,$email,$genero,$fecha_nac, $conexion){
    try{
        $consulta = "INSERT INTO alumnos( curp, paterno, materno, nombre, email_tutor,genero, fecha_nac ) VALUES('$CURP','$paterno','$materno','$nombre','$email','$genero','$fecha_nac');";
        $resultado = $conexion->query($consulta);
     }catch(PDOException $e){
        $mensaje = "Error al generar la consulta a la base de datos: " . $e->getMessage();
    }
}

