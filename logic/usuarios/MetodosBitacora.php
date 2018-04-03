<?php 
 
function registrarBitacora($usuario, $fechaIngreso, $tipo, $conexion){
    try{
        $consulta = "INSERT INTO bitacora (usuario, tipo, fecha_ingreso) VALUES ('$usuario', '$tipo' ,'$fechaIngreso');";
        $resultado = $conexion->query($consulta);
     }catch(PDOException $e){
        $mensaje = "Error al generar la consulta a la base de datos: " . $e->getMessage();
    }

}

function consultarBitacora($conexion){
    echo "<table class='tablaAlumnos'>";
    echo "<tr class='encabezadoTabla'><th>Usuario</th><th>Fecha de Ingreso</th></tr>";
    try{
        $consulta = "SELECT usuario, fecha_ingreso FROM bitacora;";
        $resultado = $conexion->query($consulta); 

        while($tupla = $resultado->fetch(PDO::FETCH_ASSOC)){
            echo "<tr><td>".$tupla['usuario']."</td><td>".$tupla['fecha_ingreso']."</td></tr>";
        }
    }
    catch(PDOException $e) {
        echo "Error: " . $e->getMessage();
    }

    $conn = null;
    echo "</table>";
}



?>