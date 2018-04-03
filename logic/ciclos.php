<?php

function obtenerIdCiclo($cicloInicial, $cicloFinal, $conexion){
    try{
        $consulta = "SELECT id FROM ciclo_escolar wHERE anio_inicio = $cicloInicial AND anio_final = $cicloFinal;";
        $resultado = $conexion->query($consulta);
        $tupla = $resultado->fetch();

        if( $tupla ){
            $id = $tupla['id'];
            return $id;
        }
    }catch(PDOException $e){
        echo "Error: " . $e->getMessage();
    }
}


function seleccionarCiclo($conexion){
    try{
        $consulta = "SELECT id, anio_inicio, anio_final FROM ciclo_escolar;";
        $resultado = $conexion->query($consulta);
        

        while( $tupla = $resultado->fetch(PDO::FETCH_ASSOC) ){
            $inicio = $tupla['anio_inicio'];
            $fin    = $tupla['anio_final'];
            $id     = $tupla['id'];
            echo "<option value='$id'>$inicio - $fin</option> ";
        }
    }catch(PDOException $e){
        echo "Error: " . $e->getMessage();
    }

}

?>