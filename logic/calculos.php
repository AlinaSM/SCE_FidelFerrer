<?php

function calcularNacimiento($CURP){
    $anio = substr($CURP,4,2);
    $mes  = substr($CURP,6,2);
    $dia  = substr($CURP,8,2);

    return "$anio-$mes-$dia";
}
?>