<?php


class TableRows extends RecursiveIteratorIterator { 
   function __construct($it) { 
       parent::__construct($it, self::LEAVES_ONLY); 
   }

   function current() {
       return "<td class='tdTablaAlumnos'>" . parent::current(). "</td>";
   }

   function beginChildren() { 
       echo "<tr>"; 
   } 

   function endChildren() { 
       echo "</tr>" . "\n";
   } 
} 

function CrearTabla($idCiclo, $idSalon, $conexion){
    echo "<table class='tablaAlumnos'>";
    echo "<tr class='encabezadoTabla'><th>CURP</th><th>Paterno</th><th>Materno</th><th>Nombre</th></tr>";
    try{
        $consulta = "SELECT alumnos.CURP, alumnos.paterno, alumnos.materno, alumnos.nombre FROM boleta, alumnos WHERE boleta.idCiclo = $idCiclo AND boleta.idSalon = $idSalon AND boleta.CURP = alumnos.CURP ORDER BY alumnos.paterno;";
        $sentencia = $conexion->prepare($consulta); 
        $sentencia->execute();

    // set the resulting array to associative
    $resultado = $sentencia->setFetchMode(PDO::FETCH_ASSOC); 

    foreach(new TableRows(new RecursiveArrayIterator($sentencia->fetchAll())) as $k=>$v) { 
        echo $v;
    }
    }
    catch(PDOException $e) {
        echo "Error: " . $e->getMessage();
    }

    $conn = null;
    echo "</table>";

}





?>