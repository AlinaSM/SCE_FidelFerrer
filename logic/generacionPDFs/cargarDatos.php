<?php

function datosBoletaAlumno($pdf, $PaternoAlum, $MaternoAlum, $NombreAlum, $CURP ){

    $pdf->SetFont('Arial','',10 );

    $pdf->SetXY(8, 27.5);
    $pdf->Cell(45, 5, $PaternoAlum, 0, 0,'C');

    $pdf->SetXY(56, 27.5);
    $pdf->Cell(45, 5, $MaternoAlum, 0, 0,'C');

    $pdf->SetXY(105, 27.5);
    $pdf->Cell(60, 5, $NombreAlum, 0, 0,'C');

    $pdf->SetXY(168, 27.5);
    $pdf->Cell(41, 5, $CURP, 0, 0,'C');

}

function datosGeneralesEscuela($pdf,$NombreEsc,$Grupo,$Turno, $CCT,$Zona){
    
    $pdf->SetXY(8, 42.6);
    $pdf->Cell(105, 5, $NombreEsc, 0, 0,'C');

    $pdf->SetXY(114.5, 42.6);
    $pdf->Cell(20, 5, $Grupo, 0, 0,'C');

    $pdf->SetXY(140, 42.6);
    $pdf->Cell(20, 5, $Turno, 0, 0,'C');

    $pdf->SetXY(165, 42.6);
    $pdf->Cell(29, 5, $CCT, 0, 0,'C');

    $pdf->SetXY(195, 42.6);
    $pdf->Cell(13, 5, "0$Zona", 0, 0,'C');

}


function datosUbicacionEscuela($pdf, $Localidad, $Municipio, $Region){

    $pdf->SetXY(8, 57);
    $pdf->Cell(97, 5, $Localidad, 0, 0,'C');

    $pdf->SetXY(108, 57);
    $pdf->Cell(60, 5, $Municipio, 0, 0,'C');

    $pdf->SetXY(175, 57);
    $pdf->Cell(30, 5, $Region, 0, 0,'C');
}



function CabeceraReportesDatos($pdf, $CCT, $Nombre, $Turno, $Zona, $Domicilio, $Localidad, $Municipio, $Region, $Ciclo, $Grado, $Grupo){

    $pdf->SetXY(25, 35.8);
    $pdf->Cell(15, 5, $CCT, 0, 0,'C');

    $pdf->SetXY(20.5, 40.8);
    $pdf->Cell(15, 5, $Zona, 0, 0,'C');

    $pdf->SetXY(40, 45.8);
    $pdf->Cell(15, 5, $Domicilio, 0, 0,'C');

    $pdf->SetXY(65, 35.8);
    $pdf->Cell(15, 5, $Nombre, 0, 0,'C');

    $pdf->SetXY(128, 45.5);
    $pdf->Cell(15, 5, $Localidad, 0, 0,'C');

    $pdf->SetXY(218, 45.5);
    $pdf->Cell(15, 5, $Municipio, 0, 0,'C');

    $pdf->SetXY(302, 45.5);
    $pdf->Cell(15, 5, $Region, 0, 0,'C');
    
    $pdf->SetXY(150, 35.8);
    $pdf->Cell(15, 5, $Turno, 0, 0,'C');

    $pdf->SetXY(158, 40.8);
    $pdf->Cell(15, 5, $Ciclo, 0, 0,'C');

    $pdf->SetXY(215, 35.8);
    $pdf->Cell(15, 5, $Grado, 0, 0,'C');


    $pdf->SetXY(268, 35.8);
    $pdf->Cell(15, 5, $Grupo, 0, 0,'C');

}

?>