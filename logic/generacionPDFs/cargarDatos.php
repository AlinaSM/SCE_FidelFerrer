<?php

function datosBoletaAlumno($pdf, $PaternoAlum, $MaternoAlum, $NombreAlum, $CURP ){
    

$pdf->SetFont('Arial','',10 );

//Datos del Alumno
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
    
//Datos de la escuela
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
    //Ubicacion de la escuela

$pdf->SetXY(8, 57);
$pdf->Cell(97, 5, $Localidad, 0, 0,'C');

$pdf->SetXY(108, 57);
$pdf->Cell(60, 5, $Municipio, 0, 0,'C');

$pdf->SetXY(175, 57);
$pdf->Cell(30, 5, $Region, 0, 0,'C');
}

?>