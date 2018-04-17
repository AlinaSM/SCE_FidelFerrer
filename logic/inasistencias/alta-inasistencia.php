<?php
require('../alumnos.php');
require('../conexion.php');
require('asignacion.php');

$CURP       = $_GET['CURP'];
$idCiclo    = $_GET['idCiclo'];
$Bimestre   = $_GET['idBimestre'];
$idSalon    = $_GET['idSalon'];
$Numero     = $_GET['txtInasistencia'];

$Kardex = ObtenerKardex($CURP, $idCiclo, $idSalon, $conexion);



if(isset($_GET['btnGuardar'])){ 
    AsignarInasistencia($Numero, $Kardex, $Bimestre, $conexion);
}else if(isset($_GET['btnBorrar'])){
    borrarInasistencia($Kardex, $Bimestre, $conexion);
}
header("Location: ../../pages/evaluaciones/inasistencias.php?op=mostrar&idSalon=$idSalon&idBimestre=$Bimestre&idCiclo=$idCiclo");



?>
