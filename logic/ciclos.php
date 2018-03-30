<?php

function obtenerIdCiclo($cicloInicial, $cicloFinal, $conexion){
    try{
        $consulta = "SELECT idCiclo_Escolar FROM ciclo_escolar wHERE anio_inicio = $cicloInicial AND anio_final = $cicloFinal;";
        $resultado = $conexion->query($consulta);
        $tupla = $resultado->fetch();

        if( $tupla ){
            $id = $tupla['idCiclo_Escolar'];
            return $id;
        }
    }catch(PDOException $e){
        echo "Error: " . $e->getMessage();
    }
}


?>