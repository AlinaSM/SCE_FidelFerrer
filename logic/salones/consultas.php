<?php

function CrearTabla($idCiclo, $idSalon, $conexion){
    $i = 1;
    echo "<table class='tablaAlumnos'>";
    echo "<tr class='encabezadoTabla'><th>No.</th><th>CURP</th><th>Paterno</th><th>Materno</th><th>Nombre</th></tr>";
    try{
        $consulta = "SELECT alumnos.CURP as curp, alumnos.paterno as paterno, alumnos.materno as materno, alumnos.nombre as nombre FROM boleta, alumnos WHERE boleta.idCiclo = $idCiclo AND boleta.idSalon = $idSalon AND boleta.CURP = alumnos.CURP ORDER BY alumnos.paterno;";
        $resultado = $conexion->query($consulta); 
        
        while($tupla = $resultado->fetch(PDO::FETCH_ASSOC)){
            echo "<tr><td>".$i."</td><td>".$tupla['curp']."</td><td>".$tupla['paterno']."</td><td>".$tupla['materno']."</td><td>".$tupla['nombre']."</td></tr>";
            $i = $i+ 1 ;
        }
        
    }
    catch(PDOException $e) {
        echo "Error: " . $e->getMessage();
    }

    $conn = null;
    echo "</table>";

}





?>