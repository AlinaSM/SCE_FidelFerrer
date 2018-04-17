<?php

function NumeroInasistencias($id, $conexion){
    try{
        $query = "SELECT inasistencias FROM inasistencias WHERE id = $id ;";
        $resultado =  $conexion->query($query);
        $valor = $resultado->fetch();

        if($valor){
            return $valor['inasistencias'];
        }else{
            return 0;
        }

    }catch(PDOException $e){

    }
}

function borrarInasistencia($Kardex, $Bimestre, $conexion){
    try{     

        $queryEliminar = "UPDATE inasistencias SET inasistencias='0' WHERE Boleta_id = $Kardex AND Bimestre_id = $Bimestre;";
        $conexion->query($queryEliminar);
    }catch(PDOException $e){
        echo "Error: ".$e->getMessage();
    }

}



function tieneInasistencias($Kardex, $Bimestre, $conexion){
    try{

        $Buscar = "SELECT id FROM inasistencias WHERE Boleta_id = $Kardex AND Bimestre_id = $Bimestre;";
        $resultado = $conexion->query($Buscar);
        $tupla = $resultado->fetch();

        if( $tupla ){
            return $id = $tupla['id'];
        }

    }catch(PDOException $e){

    }
}


function AsignarInasistencia($Numero, $Kardex, $Bimestre, $conexion){
    try{
        //
        $Buscar = "SELECT id FROM inasistencias WHERE Boleta_id = $Kardex AND Bimestre_id = $Bimestre;";
        $resultado = $conexion->query($Buscar);
        $tupla = $resultado->fetch();

        if( $tupla ){
            $id = $tupla['id']."<br>";
            $Modificar = "UPDATE inasistencias SET inasistencias = $Numero WHERE id = ".$tupla['id'].";";
            echo "depues<br>";  
            $conexion->query($Modificar);
        }else{
            echo "lol<br>";
            $consulta = "INSERT INTO inasistencias(inasistencias, Boleta_id, Bimestre_id) VALUES ($Numero,$Kardex,$Bimestre); ";
            $conexion->query($consulta);
        }

    }catch(PDOException $e){
        
    }
}

?>