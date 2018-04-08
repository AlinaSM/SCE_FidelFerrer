<?php 



function AltaCalificacion($KardexAlumno, $Bimestre, $Asignatura, $Calificacion, $conexion){

    try{
        //Saber si existe la califiacion de la asignatura deacuerdo con el kardex

        $queryBuscar = "SELECT id AS id_Calificacion FROM calificaciones WHERE Asignaturas_id = $Asignatura AND  Boleta_id = $KardexAlumno AND Bimestre_id =$Bimestre ;";
        $resultadoBuscar = $conexion->query($queryBuscar);
        $resultId  = $resultadoBuscar->fetch();



        if( $resultId  ){
            $idCalificacion = $resultId['id_Calificacion'];
            echo "<br> $idCalificacion";
            $queryModificar = "UPDATE calificaciones SET Calificacion = $Calificacion WHERE id = $idCalificacion;";
            $conexion->query($queryModificar);
        }else{

            $consulta = "INSERT INTO calificaciones(Asignaturas_id, Calificacion, Boleta_id, Bimestre_id) VALUES($Asignatura, $Calificacion, $KardexAlumno, $Bimestre);";
            $resultado = $conexion->query($consulta);
            $valor = $resultado->fetch();

        }


        



    }catch(PDOException $e){
        $mensaje = "Error al generar la consulta a la base de datos: " . $e->getMessage();
    }
}

?>