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
            <li><a href="#">Inicio</a></li>
            <li><a href="">Control Usuarios</a>
                <ul>
                    <li><a href="pages\control-usuarios\altas-users.php">Registrar Usuario</a></li>
                    <li><a href="pages\control-usuarios\bajas-users.php">Eliminar Usuario</a></li>
                    <li><a href="pages\control-usuarios\bitacora-entradas.php">Bitacora</a></li>
                </ul>
            </li>
            <li><a>Control Alumnos</a>
                <ul>
                    <li><a href="pages\control-alumnos\alumnos-altas.php">Altas</a></li>
                    <li><a href="pages\control-alumnos\alumnos-bajas.php">Bajas</a></li>
                    <li><a href="pages\control-alumnos\listado-grupos.php">Lista de Grupos</a></li>
                </ul>
            </li>
            <li><a>Evaluaciones</a>
                <ul>
                    <li><a href="pages\evaluaciones\inicio-ciclo.php">Temporada</a></li>
                    <li><a href="pages\evaluaciones\inicio.php">Evaluar</a></li>
                </ul>
            </li>
            <li><a href="pages\estadisticas\estadisticas.php">Estadisticas</a></li>
            
            <li><a>Escuela</a>
                <ul>
                    <li><a href="pages\escuela\informacion.php">Informacion</a></li>
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