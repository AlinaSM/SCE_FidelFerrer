<?php 
require '../../logic/conexion.php';
require 'generarTablas.php';
require '../../logic/salones.php';

error_reporting(E_ERROR | E_WARNING);
$idBimestre = $_GET['comboBimestre'];
$Grado      = $_GET['comboGrado'];
$Grupo      = $_GET['comboGrupo'];

if( $Grado && $Grupo){
    $idSalon = obtenerIdSalon($Grado, $Grupo, $conexion);
    header("Location: ../../pages/evaluaciones/asignaturas.php?op=mostrar&idSalon=$idSalon&idBimestre=$idBimestre");
}


?>