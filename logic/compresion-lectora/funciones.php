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
//SELECT id FROM boleta_cl WHERE Boleta_id = $Kardex AND CL_id =$Pregunta ;
    $resultadoBuscar =  ExisteCL($conexion, $Kardex,  $Periodo, $Pregunta);

    if($resultadoBuscar){
        $Update = "UPDATE boleta_cl SET opcion_cl_id=$Respuesta WHERE id = $resultadoBuscar;";
        $conexion->query($Update);
       

    }else{
        $query = "INSERT INTO boleta_cl (Boleta_id, CL_id, Periodo_id, opcion_cl_id) VALUES ('$Kardex', '$Pregunta', '$Periodo', '$Respuesta');";
        $conexion->query($query);

    }
    



}

?>