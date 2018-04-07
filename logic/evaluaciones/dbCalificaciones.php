<?php 




function AltaCalificacion($KardexAlumno, $Bimestre, $Asignatura, $Calificacion){

    $InsCalificacion = "INSERT INTO calificaciones(Asignaturas_id, Calificacion, Boleta_id, Bimestre_id) VALUES($Asignatura, $Calificacion, $KardexAlumno, $Bimestre);";

}

?>