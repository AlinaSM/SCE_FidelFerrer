<?php
require '../../logic/info-escuela.php';
require '../../logic/FechaHora.php';
require '../../logic/ciclos.php';
require '../../logic/conexion.php';

require '../../logic/salones/consultar-salon.php';
$op = $_GET['op'];
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
    <script src="..\..\assets\js\listasPDF.js"></script>
    <title>Lista de Grupos</title>
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
            <li><a href="..\..\inicio-direc.php">Inicio</a></li>
            
            <li><a href="">Control Alumnos</a>
                <ul>
                    <li><a href="alumnos-altas.php">Altas</a></li>
                    <li><a href="alumnos-bajas.php">Bajas</a></li>
                    <li><a href="listado-grupos.php">Lista de Grupos</a></li>
                </ul>
            </li>
  
            <li style="float:right"><a href="">Cerrar Sesion</a></li>
        </ul>
    </nav>

    <section>

        <form action="..\..\logic\salones\consultar-salon.php" name="formListaGrupos" method="GET">
        <div class="regis-grado">

        <h3 style="color:black;" >Elija ciclo escolar, grado y grupo: </h3>

        <select  name="comboCiclo" id="idCiclo" required >
            <option value="" disabled selected>CICLO</option>
            <?php seleccionarCiclo($conexion); ?>
        </select>


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

        <input type="submit" value="Consultar" id="conslutar" >

        </div>
        
        </form>

    </section>
    <section>
        <?php if ($op=='mostrar'):  ?>
            <div class="encabezado-bit">
                <h4>Lista de Alumnos</h4>
                <button type="button" id='btnListaGruposPDF' onclick = "ListaGrupos()">Generar PDF </button>
                
            </div>
        <?php endif ?>
    
        <?php
            
            if($op=='mostrar'){
                    
                CrearTabla($_GET['idCiclo'], $_GET['idSalon'], $conexion);
            }
        ?>
    </section>


    <?php if (!empty($mensaje)):  ?>
        <p  style = "text-align: center;" > <?= $mensaje ?> </p>
    <?php endif ?>

    
</body>
</html>