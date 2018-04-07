<?php

function tablaAsignaturas( $idSalon, $conexion){
    $cont = 1;
    $idCiclo = 1;
    $Asignatura = array();
    $nAsig = 0;
    echo "<table class='tablaAlumnos' >";
    echo "<tr class='encabezadoTabla'><th>No.</th><th>CURP</th><th>Paterno</th><th>Materno</th><th>Nombre</th> ";
    
    try{
        $consultaAsignaturas = "SELECT asignaturas.nombre AS Asignatura, asignaturas.id AS id FROM salones, grados, asignaturas_has_grados , asignaturas WHERE salones.id = $idSalon AND salones.Grados_id = grados.id AND grados.id = asignaturas_has_grados.Grados_id AND asignaturas_has_grados.Asignaturas_id = asignaturas.id;";
        $res_asign = $conexion->query($consultaAsignaturas); 

        while($tplAsignatura = $res_asign->fetch(PDO::FETCH_ASSOC)){
            //array_push($Asignatura, $tplAsignatura);
            $id = $tplAsignatura['id'];
            $Asig = $tplAsignatura['Asignatura'];
            array_push($Asignatura, array($id,$Asig));
            echo "<th>".$tplAsignatura['Asignatura']."</th>";  

            $nAsig = $nAsig + 1;
        }
        echo "</tr>";

        $consulta = "SELECT alumnos.CURP as curp, alumnos.paterno as paterno, alumnos.materno as materno, alumnos.nombre as nombre FROM boleta, alumnos WHERE boleta.Ciclo_id = $idCiclo AND boleta.Salones_id = $idSalon AND boleta.CURP = alumnos.CURP AND boleta.inscrito = 'si' ORDER BY alumnos.paterno;";
        $resultado = $conexion->query($consulta); 
        
        while($tupla = $resultado->fetch(PDO::FETCH_ASSOC)){
          
            echo "<tr> <form action='../../logic/evaluaciones/subirCalificacion.php' name='form".$cont."' method='GET'>";
            echo "<input type='hidden' name='CURP' value='".$tupla['curp']."'>";

            echo "<td>".$cont."</td><td>".$tupla['curp']."</td><td>".$tupla['paterno']."</td><td>".$tupla['materno']."</td><td>".$tupla['nombre']."</td>";
                
                for($i = 0; $i < count($Asignatura); $i++){//
                  
                    // el input tiene que aparecer con un valor en caso de que el alumno 
                    // tenga registrada una calificacion, si no es asi se mostrara el 
                    // input en blanco.
                    echo '<td><input id="idCalificacion" name = "txtCalificacion'.$i.'" type = "number" value = "" size="14" min="5" max="10" required> </td>';
                }
                echo "<td> <input type='submit' name='btnGuardar' value='Guardar'> </td>";
                echo "<td> <input type='submit' name='btnBorrar'  value='Borrar'>  </td>";
                echo '</form></tr>';

            $cont = $cont+ 1 ;
        }
        


    }catch(PDOException $e) {
        echo "Error: " . $e->getMessage();
    }
    
    echo "</table>";
}

?>