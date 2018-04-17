<?php 
require '../../logic/conexion.php';
require 'generarTablas.php';
require '../../logic/salones.php';

error_reporting(E_ERROR | E_WARNING);
$Bimestre = $_GET['comboBimestre'];
$Grado      = $_GET['comboGrado'];
$Grupo      = $_GET['comboGrupo'];
$idCiclo = $_GET['idCiclo'];

if( $Grado && $Grupo){
    $idSalon = obtenerIdSalon($Grado, $Grupo, $conexion);
    urlEnviar($idSalon, $Bimestre, $idCiclo);
}


function urlEnviar($idSalon, $idBimestre, $idCiclo){
    header("Location: ../../pages/evaluaciones/asignaturas.php?op=mostrar&idSalon=$idSalon&idBimestre=$idBimestre&idCiclo=$idCiclo");
}

?>