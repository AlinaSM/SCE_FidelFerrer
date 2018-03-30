<?php

function obtenerIdSalon($grado, $grupo,$conexion){
    try{
        $consulta = "SELECT id FROM salones WHERE Grados_id=$grado AND grupo = '$grupo';";
        $resultado = $conexion->query($consulta);
        $tupla = $resultado->fetch();

        if( $tupla ){
            $id = $tupla['id'];
            return $id;
        }else{
            return false;
        }
    }catch(PDOException $e){
        echo "Error: " . $e->getMessage();
    }
}

function salonLleno($IdCiclo,$IdSalon,$conexion){
    try{
        $consulta = "SELECT COUNT(id) FROM boleta WHERE idCiclo = $IdCiclo AND idSalon = $IdSalon;";
        $resultado = $conexion->query($consulta);
        $nTuplas = $resultado->fetchColumn();

      if($nTuplas<21){
          return false;
      }else{
          return true;
      }
    }catch(PDOException $e){
        echo "Error: " . $e->getMessage();
    }
}


function asignarSalon($CURP, $IdCiclo, $IdSalon, $conexion){
    try{
       $consulta = "INSERT INTO boleta (CURP,idCiclo, idSalon) VALUES('$CURP', $IdCiclo, $IdSalon);";
       echo "Hola";
       $resultado = $conexion->query($consulta);
       echo "Hola 2";
    }catch(PDOException $e){
        $mensaje = "Error al generar la consulta a la base de datos: " . $e->getMessage();
    }


}


?>
