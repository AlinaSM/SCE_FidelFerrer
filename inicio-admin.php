<?php
require 'logic/info-escuela.php';
require 'logic/FechaHora.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="assets\css\estilos.css">
    <link href="https://fonts.googleapis.com/css?family=Ubuntu" rel="stylesheet">
    <title>SCE: Fidel Ferrer</title>
</head>
<body>
    <header>
        <div class = "head-inicio">
            <h1>Sistema de Control Escolar</h1>
            <h2>Fidel Ferrer</h2>
            <img class="logo-escuela" src="assets\img\logo.jpg">
            <h5 style="text-align: left; margin: 0;" >PRIMARIA: <?php echo $Nombre; ?> | CCT: <?php echo $CCT; ?>   | CICLO ESCOLAR: <?= Ciclo() ?> | FECHA:  <?= FechaActual() ?>  </h5>
        </div>
    </header>

    <nav>
        <ul>
            <li><a href="">Inicio</a></li>
            <li><a href="">Control Usuarios</a>
                <ul>
                    <li><a href="#">Gestionar Usuarios</a></li>
                    <li><a href="#">Bitacora</a></li>
                </ul>
            </li>
            <li><a href="">Control Alumnos</a>
                <ul>
                    <li><a href="#">Altas</a></li>
                    <li><a href="#">Bajas</a></li>
                    <li><a href="#">Lista de Grupos</a></li>
                </ul>
            </li>
            <li><a href="#">Evaluaciones</a></li>
            <li><a href="#">Estadisticas</a></li>
            <li><a href="">Escuela</a>
                <ul>
                    <li><a href="#">Informacion</a></li>
                </ul>
            </li>
            <li style="float:right"><a href="">Cerrar Sesion</a></li>
        </ul>
    </nav>


    <?php if (!empty($mensaje)):  ?>
        <p  style = "text-align: center;" > <?= $mensaje ?> </p>
    <?php endif ?>

    
</body>
</html>