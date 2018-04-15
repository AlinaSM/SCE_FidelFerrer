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
        $consulta = "INSERT INTO alumnos( CURP, paterno, materno, nombre, email_tutor, genero, fecha_nacimiento ) VALUES('$CURP','$paterno','$materno','$nombre','$email','$genero','$fecha_nac');";
        $resultado = $conexion->query($consulta);
     }catch(PDOException $e){
        $mensaje = "Error al generar la consulta a la base de datos: " . $e->getMessage();
    }
}

function ObtenerKardex($CURP, $Ciclo, $Salon, $conexion){
    try{
        //$consulta = "INSERT INTO boleta (CURP, Ciclo_id, Salones_id) VALUES('$CURP',$Ciclo, $Salon );" 
        $consulta = "SELECT id FROM boleta WHERE CURP = '$CURP' AND Ciclo_id = $Ciclo AND Salones_id = $Salon;";
        $resultado = $conexion->query($consulta);
        $valor = $resultado->fetch();

        if( $valor ){
            $id = $valor['id'];
            return $id;
        }

    }catch(PDOException $e){
        $mensaje = "Error al generar la consulta a la base de datos: " . $e->getMessage();
    }


    
}



function ObtenerPromedio($conexion, $Kardex, $Bimestre){
    try{
        $query = "SELECT avg(calificaciones.Calificacion) as Promedio FROM calificaciones WHERE calificaciones.Boleta_id = $Kardex AND calificaciones.Bimestre_id = $Bimestre;";
        $resultado = $conexion->query($query);
        $tupla = $resultado->fetch(PDO::FETCH_ASSOC);

        if($tupla){
            return $tupla['Promedio'];
        }else{
            return false;
        }
    }catch(PDOException $e){
        $mensaje = "Error al generar la consulta a la base de datos: " . $e->getMessage();
    }
}