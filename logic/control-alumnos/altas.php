<?php
require('../calculos.php');
require('../conexion.php');
require('../ciclos.php');
require('../salones.php');
require('../alumnos.php');


$nombre = $_POST['txtNombre'];
$paterno= $_POST['txtPaterno'];
$materno= $_POST['txtMaterno'];
$curp   = $_POST['txtCURP'];
$email  = $_POST['txtEmail'];
$fecha_nac = calcularNacimiento($curp);
$genero = substr($curp,10,1);

$grado = $_POST['comboGrado'];
$grupo = $_POST['comboGrupo'];

$cicloInicio = date("Y");
$cicloFin    = date("Y")+1;


/*                    Verificar si hay lugar en el grupo                 */
$idSalon = obtenerIdSalon($grado, $grupo, $conexion);
$idCiclo = obtenerIdCiclo($cicloInicio, $cicloFin, $conexion);
$salonLleno = salonLleno($idCiclo, $idSalon, $conexion);
$existeAlumno = existeAlumno($curp, $conexion);


if($existeAlumno){
   echo "El alumno ya esta registrado en la base de datos."; 
   header('Location: ../../pages/control-alumnos/confirmar.php?op=yaExiste');
}else{
    if(!$salonLleno){
        //Codigal para hacer todo el desmadre de la alta al alumno!!!
        altaAlumno($curp, $paterno, $materno,$nombre,$email,$genero,$fecha_nac, $conexion);
        asignarSalon($curp, $idCiclo, $idSalon, $conexion);
        
        header("Location: ../../pages/control-alumnos/confirmar.php?op=exito&ciclo=$idCiclo&salon=$idSalon");
    }else{
        header('Location: ../../pages/control-alumnos/confirmar.php?op=noCabe');

    }
}

?>

