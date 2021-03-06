<?php
require '../../logic/conexion.php';
require '../../logic/info-escuela.php';
require '../../logic/FechaHora.php';
require '../../logic/usuarios/MetodosBitacora.php';

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="..\..\assets\css\estilos.css">
    <script src="..\..\assets\js\listasPDF.js"></script>
    <link href="https://fonts.googleapis.com/css?family=Ubuntu" rel="stylesheet">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.9/css/all.css" integrity="sha384-5SOiIsAziJl6AWe0HWRKTXlfcSHKmYV4RBF18PPJ173Kzn7jzMyFuTtk8JA7QQG1" crossorigin="anonymous">


    <title>SCE: Fidel Ferrer</title>
</head>
<body>
    <header>
        <div class = "head-inicio">
            <h1>Sistema de Control Escolar</h1>
            <h2>Fidel Ferrer</h2>
            <img class="logo-escuela" src="..\..\assets\img\logo.jpg">
            <h5 style="text-align: left = 10px;; margin: 0;" >PRIMARIA: <?php echo $Nombre; ?> | CCT: <?php echo $CCT; ?>   | CICLO ESCOLAR: <?= Ciclo() ?> | FECHA:  <?= FechaActual() ?>  </h5>
        </div>
    </header>

    <nav>
        <ul>
            <li><a href="..\..\inicio-direc.php">Inicio</a></li>
            <li><a href="#">Control Usuarios</a>
                <ul>
                    <li><a href="altas-users.php">Registrar Usuario</a></li>
                    <li><a href="bajas-users.php">Eliminar Usuario</a></li>
                    <li><a href="#">Bitacora</a></li>
                </ul>
            </li>
            
            <li style="float: right"><a href="">Cerrar Sesion</a></li>
        </ul>
    </nav>

    <section>
        <div class="encabezado-bit">
            <h4>Bitácora</h4>
            <button type="button" id='btnBitacoraPDF' onclick="BitacoraPDF()" >Generar PDF </button>            
        </div>


        <?php
            consultarBitacora($conexion);
        ?>

    </section>

    
    <?php if (!empty($mensaje)):  ?>
        <p  style = "text-align: center;" > <?= $mensaje ?> </p>
    <?php endif ?>

    
</body>
</html>