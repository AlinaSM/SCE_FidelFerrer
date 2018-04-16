<?php

require('../conexion.php');
require('../alumnos.php');
require('funciones.php');

$CURP       = $_GET['CURP'];
$idCiclo    = $_GET['idCiclo'];
$Periodo    = $_GET['idPeriodo'];
$idSalon    = $_GET['idSalon'];

$Kardex = ObtenerKardex($CURP, $idCiclo, $idSalon, $conexion);

if(isset($_GET['btnGuardar'])){ 
    
   //Alta de compresion lectora 
   echo "ALTA";

    if(isset($_GET['comboResp1'])){
        AltaCompresion($conexion, $Kardex, $Periodo, 1, $_GET['comboResp1']);
    }
    if(isset($_GET['comboResp2'])){
        AltaCompresion($conexion, $Kardex,  $Periodo, 2, $_GET['comboResp2']);
    }
    if(isset($_GET['comboResp3'])){
        AltaCompresion($conexion, $Kardex,  $Periodo, 3, $_GET['comboResp3']);
    }


} 
if (isset($_GET['btnBorrar'])){
    //Borrar la comprension lectora del alumno
    echo "BAJA";
    
} 

//pages/evaluaciones/compresion-lectora.php?op=mostrar&idSalon=1&idPeriodo=1
header("Location: ../../pages/evaluaciones/compresion-lectora.php?op=mostrar?op=mostrar&idSalon=$idSalon&idPeriodo=$Periodo");


?>