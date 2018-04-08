<?php

require('../conexion.php');
require('../alumnos.php');
require('dbCalificaciones.php');

$CURP       = $_GET['CURP'];
$idCiclo    = $_GET['idCiclo'];
$Bimestre = $_GET['idBimestre'];
$idSalon    = $_GET['idSalon'];

//Obtener el kardex del alumno

$Kardex = ObtenerKardex($CURP, $idCiclo, $idSalon, $conexion);


echo $Kardex;





if(isset($_GET['txtCal_1'])){
    //Español
    AltaCalificacion($Kardex, $Bimestre, 1, $_GET['txtCal_1'], $conexion);
    echo "Existe 1 ";
}

if(isset($_GET['txtCal_2'])){
    //Matematicas
    AltaCalificacion($Kardex, $Bimestre, 2, $_GET['txtCal_2'], $conexion);
    echo "Existe 2 ";
}
if(isset($_GET['txtCal_3'])){
    //Exploracion de la naturaleza
    AltaCalificacion($Kardex, $Bimestre, 3, $_GET['txtCal_3'], $conexion);
    echo "Existe 3 ";
}

if(isset($_GET['txtCal_4'])){
    //formacion civica y etica
    AltaCalificacion($Kardex, $Bimestre, 4, $_GET['txtCal_4'], $conexion);
    echo "Existe 4 ";
}

if(isset($_GET['txtCal_5'])){
    //educacion fisica
    AltaCalificacion($Kardex, $Bimestre, 5, $_GET['txtCal_5'], $conexion);
    echo "Existe 5 ";
}
if(isset($_GET['txtCal_6'])){
    //educacion artistica
    AltaCalificacion($Kardex, $Bimestre, 6, $_GET['txtCal_6'], $conexion);
    echo "Existe 6 ";
}

if(isset($_GET['txtCal_7'])){
    //la entidad donde vivo
    AltaCalificacion($Kardex, $Bimestre,7, $_GET['txtCal_7'], $conexion);
    echo "Existe 7 ";
}
if(isset($_GET['txtCal_8'])){
    //geografia
    AltaCalificacion($Kardex, $Bimestre, 8, $_GET['txtCal_8'], $conexion);
    echo "Existe 8 ";
}

if(isset($_GET['txtCal_9'])){
    //historia
    AltaCalificacion($Kardex, $Bimestre, 9, $_GET['txtCal_9'], $conexion);
    echo "Existe 9 ";
}
if(isset($_GET['txtCal_10'])){
    //Ciencias naturales
    AltaCalificacion($Kardex, $Bimestre, 10, $_GET['txtCal_10'], $conexion);
    echo "Existe 10 ";
}


?>