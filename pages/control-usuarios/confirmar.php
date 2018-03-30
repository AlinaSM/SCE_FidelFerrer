<?php
require '../../logic/info-escuela.php';
require '../../logic/FechaHora.php';

$op = $_GET['op'];

switch($op){
    case 'yaExiste':
        $mensajeOP = "El usuario que desea agregar ya existe en la base de datos.";
    break;
    
    case 'exito':
    $mensajeOP = "El usuario ha sido registrado correctamente.";
    break;

    case 'noCabe':
    $mensajeOP = "Se ha excedido el cupo de usuarios registrados en la base de datos.";
    break;

}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="..\..\assets\css\estilos.css">
    <link href="https://fonts.googleapis.com/css?family=Ubuntu" rel="stylesheet">
    <script src="..\..\assets\js\scriptUsuarios.js"></script>
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
            <li><a href="">Control Usuarios</a>
                <ul>
                    <li><a href="altas-users.php">Registrar Usuario</a></li>
                    <li><a href="bajas-users.php">Eliminar Usuario</a></li>
                    <li><a href="#">Bitacora</a></li>
                </ul>
            </li>
            
            <li style="float:right"><a href="">Cerrar Sesion</a></li>
        </ul>
    </nav>

    <section>
        <h1> <?php echo $mensajeOP ?> </h1>
    </section>


    <?php if (!empty($mensaje)):  ?>
        <p  style = "text-align: center;" > <?= $mensaje ?> </p>
    <?php endif ?>

    
</body>
</html>