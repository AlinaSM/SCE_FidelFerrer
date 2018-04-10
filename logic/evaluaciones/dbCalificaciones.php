<?php 

function ExisteCalificacion($Asignatura, $KardexAlumno, $Bimestre, $conexion){
    try{
        $queryBuscar = "SELECT id AS id_Calificacion FROM calificaciones WHERE Asignaturas_id = $Asignatura AND  Boleta_id = $KardexAlumno AND Bimestre_id =$Bimestre ;";
        $resultadoBuscar = $conexion->query($queryBuscar);
        $resultId  = $resultadoBuscar->fetch();

        if( $resultId  ){
            return $idCalificacion = $resultId['id_Calificacion'];
        }

    }catch(PDOException $e){
        $mensaje = "Error al generar la consulta a la base de datos: " . $e->getMessage();
    }
}


function ObtenerCalificacion($id, $conexion){
    try{
        $Buscar = "SELECT calificacion FROM calificaciones WHERE id = $id; ";
        $resultadoBuscar = $conexion->query($Buscar);
        $resultado  = $resultadoBuscar->fetch();

        if( $resultado  ){
            return $calificacion = $resultado['calificacion'];
        }
        
    }catch(PDOException $e){
        $mensaje = "Error al generar la consulta a la base de datos: " . $e->getMessage();
    }
}


function AltaCalificacion($KardexAlumno, $Bimestre, $Asignatura, $Calificacion, $conexion){

    try{
        //Saber si existe la califiacion de la asignatura deacuerdo con el kardex
        $resultId  = ExisteCalificacion($Asignatura, $KardexAlumno, $Bimestre, $conexion);

        if( $resultId  ){
            $idCalificacion = $resultId;
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



function BorrarCalificaciones($Kardex, $Bimestre, $conexion){

    try{
        $buscar = "SELECT id FROM calificaciones WHERE calificaciones.Boleta_id = $Kardex AND calificaciones.Bimestre_id = $Bimestre;";
        $resultadoBusqueda = $conexion->query($buscar);

        while ($tupla = $resultadoBusqueda->fetch(PDO::FETCH_ASSOC)) {
            $queryEliminar = "DELETE FROM calificaciones WHERE id =".$tupla['id'].";";
            $conexion->query($queryEliminar);
        }
    }catch(PDOException $e){
        echo "Error: ".$e->getMessage();
    }




}
?>