<?php 
require '../../logic/conexion.php';
require 'consultas.php';
require '../../logic/salones.php';

error_reporting(E_ERROR | E_WARNING);
$idCiclo = $_GET['comboCiclo'];
$Grado   = $_GET['comboGrado'];
$Grupo   = $_GET['comboGrupo'];

if($idCiclo && $Grado && $Grupo){
    $idSalon = obtenerIdSalon($Grado, $Grupo, $conexion);
    header("Location: ../../pages/control-alumnos/listado-grupos.php?op=mostrar&idSalon=$idSalon&idCiclo=$idCiclo");
}


?>