<?php


require('../../logic/alumnos.php');

function tablaLectora( $idSalon,$Periodo,$Ciclo, $conexion){
    $cont = 1;
    $idCiclo = 1;
    $Asignatura = array();
    $nAsig = 0;


    echo "<table class='tablaAlumnos' >";
    echo "<tr class='encabezadoTabla'><th>No.</th><th>CURP</th><th>Paterno</th><th>Materno</th><th>Nombre</th> ";
    
    try{
        $queryPreguntas = "SELECT id, pregunta FROM compresion_lectora;";
        $resultadoPreguntas = $conexion->query($queryPreguntas);

        while ($tupla = $resultadoPreguntas->fetch(PDO::FETCH_ASSOC)) {
            echo "<th>".$tupla['pregunta']."</th>";
        }
       
        echo "</tr>";

        $queryAlumnos = "SELECT alumnos.CURP as curp, alumnos.paterno as paterno, alumnos.materno as materno, alumnos.nombre as nombre FROM boleta, alumnos WHERE boleta.Ciclo_id = $idCiclo AND boleta.Salones_id = $idSalon AND boleta.CURP = alumnos.CURP AND boleta.inscrito = 'si' ORDER BY alumnos.paterno;";
        $resultadoAlumnos = $conexion->query($queryAlumnos); 
        
        while($tupla = $resultadoAlumnos->fetch(PDO::FETCH_ASSOC)){
          
            echo "<tr> <form action='../../logic/compresion-lectora/subirComprension-lectora.php' name='form".$cont."' method='GET'>";
            
            echo "<input type='hidden' name='CURP' value='".$tupla['curp']."'>";
            echo "<input type='hidden' name='idSalon' value='".$idSalon."'>";
            echo "<input type='hidden' name='idPeriodo' value='".$Periodo."'>";
            echo "<input type='hidden' name='idCiclo' value='".$Ciclo."'>";

            echo "<td>".$cont."</td><td>".$tupla['curp']."</td><td>".$tupla['paterno']."</td><td>".$tupla['materno']
                ."</td><td>".$tupla['nombre']."</td>";
           
            $Kardex = ObtenerKardex($tupla['curp'], $Ciclo, $idSalon, $conexion);  

            $queryOpc = "SELECT id, opcion FROM opciones_cl order by(id);";
            

           
            for ($i=1; $i < 4 ; $i++) { 
                $resultadoOpc = $conexion->query($queryOpc);
                echo "<td>";
                echo "<select  name='comboResp$i' id='idPes$i' required >";
                echo "<option value='' disabled selected>OPCION</option>";

                while ($tupla = $resultadoOpc->fetch(PDO::FETCH_ASSOC)) {
                    echo "<option value=".$tupla['id'].">".$tupla['opcion']."</option>";
                }  
               
            echo "</select>";
            echo "</td>";
            $resultadoOpc = null;
            }
            
                echo "<td> <input type='submit' name='btnGuardar' value='Guardar'> </td>";
                echo "<td> <input type='submit' name='btnBorrar'  value='Borrar' > </td>";
                echo '</form></tr>';

            $cont = $cont+ 1 ;
        }
        
    }catch(PDOException $e) {
        echo "Error: " . $e->getMessage();
    }
    echo "</table>";
}

?>