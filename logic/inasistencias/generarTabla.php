<?php
require('../../logic/alumnos.php');
require('asignacion.php');

function tablaInasistencias( $idSalon,$Bimestre,$Ciclo, $conexion){
    $cont = 1;
    $idCiclo = 1;
    

    echo "<table class='tablaAlumnos' >";
    echo "<tr class='encabezadoTabla'><th>No.</th><th>CURP</th><th>Paterno</th><th>Materno</th><th>Nombre</th> <th>Inasistencias</th> </tr>";
    
    try{

        $consulta = "SELECT alumnos.CURP as curp, alumnos.paterno as paterno, alumnos.materno as materno, alumnos.nombre as nombre FROM boleta, alumnos WHERE boleta.Ciclo_id = $idCiclo AND boleta.Salones_id = $idSalon AND boleta.CURP = alumnos.CURP AND boleta.inscrito = 'si' ORDER BY alumnos.paterno;";
        $resultado = $conexion->query($consulta); 
        
        while($tupla = $resultado->fetch(PDO::FETCH_ASSOC)){
  
            echo "<tr> <form action='../../logic/inasistencias/alta-inasistencia.php' name='form".$cont."' method='GET'>";
            
            echo "<input type='hidden' name='CURP' value='".$tupla['curp']."'>";
            echo "<input type='hidden' name='idSalon' value='".$idSalon."'>";
            echo "<input type='hidden' name='idBimestre' value='".$Bimestre."'>";
            echo "<input type='hidden' name='idCiclo' value='".$Ciclo."'>";

            echo "<td>".$cont."</td><td>".$tupla['curp']."</td><td>".$tupla['paterno']."</td><td>".$tupla['materno']."</td><td>".$tupla['nombre']."</td>";
            
            $Kardex = ObtenerKardex($tupla['curp'], $idCiclo, $idSalon, $conexion);  
            //Ver si tiene inasistencias
            $idInasistencia = tieneInasistencias($Kardex, $Bimestre, $conexion);
            $numero = 0;
            $backcolor = '#89CCF9';
            $color = '#000000';

            if( $idInasistencia ){
                
                $numero = NumeroInasistencias($idInasistencia, $conexion);
            }
            
            if( $numero > 0){
                $backcolor = '#B31212';
                $color = '#FFFFFF';
            }

            echo "<td> <input type= 'number' name= 'txtInasistencia'value='$numero' style = 'background-color: $backcolor; font-size: 15px; padding:3px; color: $color; ' min = '0' min='200'> </td>";
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