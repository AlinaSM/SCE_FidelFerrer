<?php
require '../../logic/info-escuela.php';
require '../../logic/FechaHora.php';
require '../../logic/ciclos.php';
require '../../logic/conexion.php';

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="..\..\assets\css\estilos.css">
    <link href="https://fonts.googleapis.com/css?family=Ubuntu" rel="stylesheet">
    <script src="..\..\assets\js\script.js"></script>
    <title>Evaluaciones</title>
</head>
<body>
    <header>
        <div class = "head-inicio">
            <h1>Sistema de Control Escolar</h1>
            <h2>Fidel Ferrer</h2>
            <img class="logo-escuela" src="..\..\assets\img\logo.jpg">
            <h5 style="text-align: left = 10px; margin: 0;" >PRIMARIA: <?php echo $Nombre; ?> | CCT: <?php echo $CCT; ?>   | CICLO ESCOLAR: <?= Ciclo() ?> | FECHA:  <?= FechaActual() ?>  </h5>
        </div>
    </header>

    <nav>
        <ul>
            <li><a href="inicio.php" class="activo">Inicio</a></li>
            

            <li><a href="asignaturas.php">Asignaturas</a></li>
            <li><a href="compresion-lectora.php">Comprensión Lectora</a></li>
            <li><a href="hfa.php">HFA</a></li>
            <li><a href="inasistencias.php">Inasistencias</a></li>
            <li><a href="obs-especificas.php">Obs. Especificas</a></li>
            <li><a href="obs-generales.php">Obs. Generales</a></li>
  
            <li style="float:right"><a href="..\..\inicio-direc.php">Terminar</a></li>
        </ul>
    </nav>

    <section>

       <div class="info-bimestres">
       
       </div>

    </section>

    <section>
       
    </section>


    <?php if (!empty($mensaje)):  ?>
        <p  style = "text-align: center;" > <?= $mensaje ?> </p>
    <?php endif ?>

    
</body>
</html>