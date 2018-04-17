<?php
require '../../logic/info-escuela.php';
require '../../logic/FechaHora.php';
require '../../logic/ciclos.php';
require '../../logic/conexion.php';

error_reporting(E_ERROR | E_WARNING);
$idCiclo = obtenerIdCiclo(date("Y"), date("Y") + 1, $conexion);

$op = $_GET['op'];
$Bimestre = $_GET['idBimestre'];
?>

<!DOCTYPE html>
<html lang="es-MX">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="..\..\assets\css\estilos.css">
    <link href="https://fonts.googleapis.com/css?family=Ubuntu" rel="stylesheet">
    <script src="..\..\assets\js\script.js"></script>
    <script src="..\..\assets\js\listasPDF.js"></script>
    <title>Asignaturas</title>
</head>
<body>
    <header>
        <div class = "head-inicio">
            <h1>Sistema de Control Escolar</h1>
            <h2>Fidel Ferrer</h2>
            <img class="logo-escuela" src="../../assets/img/logo.jpg">
            <h5 style="text-align: left = 10px; margin: 0;" >PRIMARIA: <?php echo $Nombre; ?> | CCT: <?php echo $CCT; ?>   | CICLO ESCOLAR: <?= Ciclo() ?> | FECHA:  <?= FechaActual() ?>  </h5>
        </div>
    </header>
    <nav>
        <ul>
            <li><a href="inicio.php">Inicio</a></li>
            <li><a href="asignaturas.php" class="activo">Asignaturas</a></li>
            <li><a href="compresion-lectora.php">Comprensión Lectora</a></li>
            <li><a href="hfa.php">HFA</a></li>
            <li><a href="inasistencias.php">Inasistencias</a></li>
            <li><a href="obs-especificas.php">Obs. Especificas</a></li>
            <li><a href="obs-generales.php">Obs. Generales</a></li>
  
            <li style="float:right"><a href="..\..\inicio-direc.php">Terminar</a></li>
        </ul>
    </nav>
    <section>

        <form action="../../logic/evaluaciones/asignaturas.php" name="formListaGrupos" method="GET">
        <div class="regis-grado" >

            <h3 style="color:black;" >Elija el grado, grupo y bimestre: </h3>

            <select  name="comboGrado" id="idGrado" required >
                <option value="" disabled selected>GRADO</option>
                <option value="1">1</option>
                <option value="2">2</option>
                <option value="3">3</option>
                <option value="4">4</option>
                <option value="5">5</option>
                <option value="6">6</option>
            </select>

            <select  name="comboGrupo" id="idGrupo" required >
                <option value="" disabled selected>GRUPO</option>
                <option value="A">A</option>
            </select>
            
            <select  name="comboBimestre" id="idBimestre" required >
                <option value="" disabled selected>BIMESTRE</option>
                <option value="1">1</option>
                <option value="2">2</option>
                <option value="3">3</option>
                <option value="4">4</option>
                <option value="5">5</option>
            </select>
            <?php echo "<input type='hidden' name='idCiclo' value='$idCiclo'>"; ?>
            <input type="submit" value="Consultar" id="consultar" >
            
        </div>
        </form>
    </section>
    <section>
        <div class="titulo-evaluacion">
            <h4>Escriba las calificaciones correspondientes para las asignaturas</h4>
        </div>

         <?php if ($op=='mostrar'):  ?>
            <div class="encabezado-bit">
                <h4>Calificaciones de Bimestre <?php echo $Bimestre;?></h4>
                <button type="button" id='btnListaGruposPDF' onclick = "CamposCompletos()">Generar PDF </button>
                
            </div>
        <?php endif ?>

        <?php 
                require '../../logic/evaluaciones/asignaturas.php';
                $op = $_GET['op'];
                
                if($op == 'mostrar'){
                    tablaAsignaturas( $_GET['idSalon'],$_GET['idBimestre'],$idCiclo, $conexion);
                }
        ?>
       
   </section>


    <?php if (!empty($mensaje)):  ?>
        <p  style = "text-align: center;" > <?= $mensaje ?> </p>
    <?php endif ?>

    
</body>
</html>