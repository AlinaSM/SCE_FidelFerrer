<?php
require '../../logic/info-escuela.php';
require '../../logic/FechaHora.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="..\..\assets\css\estilos.css">
    <link href="https://fonts.googleapis.com/css?family=Ubuntu" rel="stylesheet">
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
            <li><a href="">Inicio</a></li>
            
            <li><a href="">Control Alumnos</a>
                <ul>
                    <li><a href="#">Altas</a></li>
                    <li><a href="#">Bajas</a></li>
                    <li><a href="#">Lista de Grupos</a></li>
                </ul>
            </li>
  
            <li style="float:right"><a href="">Cerrar Sesion</a></li>
        </ul>
    </nav>

    <section>
        <h3>Registro de Alumno</h3>
        <form action="" method="POST" class="regis-form">
            <label>Nombre</label>
            <input type="text" required>
            <label>Paterno</label>
            <input type="text" required>
            <label>Materno</label>
            <input type="text" required>
            <label>CURP</label>
            <input type="text" required>
            <label>Correo Electronico</label>
            <input type="email" required>
            
            <div class="regis-grado">
                <h3>Elija grado y grupo: </h3>

                <select  name="opcion-grado" required>
                    <option value="" disabled selected>GRADO</option>
                    <option value="1">1</option>
                    <option value="2">2</option>
                    <option value="3">3</option>
                    <option value="4">4</option>
                    <option value="5">5</option>
                    <option value="6">6</option>
                </select>
                <select  name="opcion-grupo" required>
                    <option value="" disabled selected>GRUPO</option>
                    <option value="A">A</option>

                </select>
            </div>

            <input type="submit" value="Enviar" class="login-form__submit">
        </form>

    </section>


    <?php if (!empty($mensaje)):  ?>
        <p  style = "text-align: center;" > <?= $mensaje ?> </p>
    <?php endif ?>

    
</body>
</html>