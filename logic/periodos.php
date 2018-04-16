<?php
function seleccionarPeriodo($conexion){
    try{
        $consulta = "SELECT id, numero, mes FROM periodo;";
        $resultado = $conexion->query($consulta);
        
        while( $tupla = $resultado->fetch(PDO::FETCH_ASSOC) ){
            $id = $tupla['id'];
            $numero    = $tupla['numero'];
            $mes     = $tupla['mes'];
            echo "<option value='$id'>$numero - $mes</option> ";
        }
    }catch(PDOException $e){
        echo "Error: " . $e->getMessage();
    }

}


?>