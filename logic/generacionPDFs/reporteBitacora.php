<?php

include 'plantilla.php';
require '../../logic/conexion.php';
require_once('../../assets/lib/fpdf/fpdf.php'); // Incluímos las librerías anteriormente mencionadas
require_once('../../assets/lib/fpdi/src/autoload.php'); // Incluímos las librerías anteriormente mencionadas


$pdf = new PDFBit();

$pdf->AliasNbPages();
$pdf->AddPage('L','Legal',0);

$pdf->SetFillColor(232,232,232);
$pdf->SetFont('Arial','B',12);

$pdf->setX(80);
$pdf->Cell(100,6,'USUARIOS',1,0,'C',1);
$pdf->Cell(100,6,'FECHA Y HORA DE INGRESO',1,0,'C',1);


$pdf->SetFillColor(255,255,255);
$pdf->SetFont('Arial','',9);



$consulta = "SELECT usuario, fecha_ingreso FROM bitacora;";
$resultado = $conexion->query($consulta); 

while($tupla = $resultado->fetch(PDO::FETCH_ASSOC)){
    $pdf->Ln();
    $pdf->setX(80);
    $pdf->Cell(100,6,$tupla['usuario'],1,0,'C',1);
    $pdf->Cell(100,6,$tupla['fecha_ingreso'],1,0,'C',1);
}



$pdf->Output();


?>