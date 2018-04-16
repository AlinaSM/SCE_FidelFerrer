<?php 
require '../../logic/conexion.php';
require 'generarTablas.php';
require '../../logic/salones.php';

error_reporting(E_ERROR | E_WARNING);
$idPeriodo  = $_GET['comboPeriodo'];
$Grado      = $_GET['comboGrado'];
$Grupo      = $_GET['comboGrupo'];

if( $Grado && $Grupo){
    $idSalon = obtenerIdSalon($Grado, $Grupo, $conexion);
    //echo "$idPeriodo";
   header("Location: ../../pages/evaluaciones/compresion-lectora.php?op=mostrar&idSalon=$idSalon&idPeriodo=$idPeriodo");
}


?>