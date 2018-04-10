<?php

require('../conexion.php');
require('../alumnos.php');
require('dbCalificaciones.php');

$CURP       = $_GET['CURP'];
$idCiclo    = $_GET['idCiclo'];
$Bimestre   = $_GET['idBimestre'];
$idSalon    = $_GET['idSalon'];

$Kardex = ObtenerKardex($CURP, $idCiclo, $idSalon, $conexion);

if(isset($_GET['btnGuardar'])){ 
    
   

    if(isset($_GET['txtCal_1'])){
        //Español
        AltaCalificacion($Kardex, $Bimestre, 1, $_GET['txtCal_1'], $conexion);
    
    }

    if(isset($_GET['txtCal_2'])){
        //Matematicas
        AltaCalificacion($Kardex, $Bimestre, 2, $_GET['txtCal_2'], $conexion);
    
    }
    if(isset($_GET['txtCal_3'])){
        //Exploracion de la naturaleza
        AltaCalificacion($Kardex, $Bimestre, 3, $_GET['txtCal_3'], $conexion);
    
    }

    if(isset($_GET['txtCal_4'])){
        //formacion civica y etica
        AltaCalificacion($Kardex, $Bimestre, 4, $_GET['txtCal_4'], $conexion);
        
    }

    if(isset($_GET['txtCal_5'])){
        //educacion fisica
        AltaCalificacion($Kardex, $Bimestre, 5, $_GET['txtCal_5'], $conexion);
        
    }
    if(isset($_GET['txtCal_6'])){
        //educacion artistica
        AltaCalificacion($Kardex, $Bimestre, 6, $_GET['txtCal_6'], $conexion);
        
    }

    if(isset($_GET['txtCal_7'])){
        //la entidad donde vivo
        AltaCalificacion($Kardex, $Bimestre,7, $_GET['txtCal_7'], $conexion);
        
    }
    if(isset($_GET['txtCal_8'])){
        //geografia
        AltaCalificacion($Kardex, $Bimestre, 8, $_GET['txtCal_8'], $conexion);
    }

    if(isset($_GET['txtCal_9'])){
        //historia
        AltaCalificacion($Kardex, $Bimestre, 9, $_GET['txtCal_9'], $conexion);
    }
    if(isset($_GET['txtCal_10'])){
        //Ciencias naturales
        AltaCalificacion($Kardex, $Bimestre, 10, $_GET['txtCal_10'], $conexion);
    }


} 
else if(isset($_GET['btnBorrar'])){
    BorrarCalificaciones($Kardex, $Bimestre, $conexion);
    
} 


header("Location: ../../pages/evaluaciones/asignaturas.php?op=mostrar&idSalon=$idSalon&idBimestre=$Bimestre");


?>