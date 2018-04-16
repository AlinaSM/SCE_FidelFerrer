<?php

function ObtenerCalificacion($conexion, $Asignatura){
    
    try{
        $query="SELECT avg(calificaciones.Calificacion) as Promedio FROM calificaciones WHERE calificaciones.Asignaturas_id = $Asignatura AND calificaciones.Bimestre_id = 1;";
        $resultado = $conexion->query($query);

        while ($tupla = $resultado->fetch(PDO::FETCH_ASSOC)) {
            return $tupla['Promedio'];
        }

    }catch(PDOException $e){

    }
}


?>