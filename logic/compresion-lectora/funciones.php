<?php 

function ExisteCL($conexion, $Kardex,  $Periodo, $Pregunta){
    try{
        $queryBuscar = "SELECT id FROM boleta_cl WHERE Boleta_id = $Kardex AND CL_id =$Pregunta AND Periodo_id = $Periodo;";
        $resultadoBuscar = $conexion->query($queryBuscar);
        $resultId  = $resultadoBuscar->fetch();

        if( $resultId  ){
            return $idCalificacion = $resultId['id'];
        }

    }catch(PDOException $e){
        $mensaje = "Error al generar la consulta a la base de datos: " . $e->getMessage();
    }
}

function AltaCompresion($conexion, $Kardex,  $Periodo, $Pregunta, $Respuesta){
    $resultadoBuscar =  ExisteCL($conexion, $Kardex,  $Periodo, $Pregunta);

    if($resultadoBuscar){
        $Update = "UPDATE boleta_cl SET opcion_cl_id=$Respuesta WHERE id = $resultadoBuscar;";
        $conexion->query($Update);

    }else{
        $query = "INSERT INTO boleta_cl (Boleta_id, CL_id, Periodo_id, opcion_cl_id) VALUES ('$Kardex', '$Pregunta', '$Periodo', '$Respuesta');";
        $conexion->query($query);

    }
    
}



function NombreOpcion($conexion, $Kardex, $Pregunta, $Periodo){
    $consulta = "SELECT opcion FROM boleta_cl, opciones_cl WHERE Boleta_id = $Kardex AND CL_id = $Pregunta AND Periodo_id = $Periodo AND boleta_cl.opcion_cl_id = opciones_cl.id;";
    $resultado = $conexion->query($consulta);
    $Respuesta  = $resultado->fetch();

    if($Respuesta){
        return $Respuesta['opcion'];
    }else{
        return false;
    }
}

?>