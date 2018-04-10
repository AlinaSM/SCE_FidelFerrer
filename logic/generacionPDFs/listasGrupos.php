<?php

include 'plantilla.php';
require '../../logic/conexion.php';
require_once('../../assets/lib/fpdf/fpdf.php'); // Incluímos las librerías anteriormente mencionadas
require_once('../../assets/lib/fpdi/src/autoload.php'); // Incluímos las librerías anteriormente mencionadas

$Ciclo = $_GET['idCiclo'];
$Salon = $_GET['idSalon'];

$query = "SELECT alumnos.CURP as CURP , alumnos.paterno as Paterno, alumnos.materno as Materno , alumnos.nombre as Nombre FROM alumnos, boleta WHERE Ciclo_id = $Ciclo AND Salones_id = $Salon AND inscrito = 'si' AND alumnos.CURP = boleta.CURP ORDER BY(Paterno);";    
$resultado = $conexion->query($query);

$pdf = new PDF();
$pdf->AliasNbPages();

$pdf->AddPage('L','Legal',0);

$pdf->SetFillColor(232,232,232);
$pdf->SetFont('Arial','B',12);

$pdf->Cell(10,6,'No.',1,0,'C',1);
$pdf->Cell(60,6,'CURP',1,0,'C',1);
$pdf->Cell(40,6,'PATERNO',1,0,'C',1);
$pdf->Cell(40,6,'MATERNO',1,0,'C',1);
$pdf->Cell(60,6,'NOMBRE',1,0,'C',1);
$i = 0;
$pdf->SetFillColor(255,255,255);
$pdf->SetFont('Arial','',9);



while($tupla = $resultado->fetch(PDO::FETCH_ASSOC)){
    $i = $i + 1;
    $pdf->Ln();
  
    $pdf->Cell(10,5,$i,1,0,'C',1);
    $pdf->Cell(60,5,utf8_decode($tupla['CURP']),1,0,'C',1);
    $pdf->Cell(40,5,utf8_decode($tupla['Paterno']),1,0,'C',1);
    $pdf->Cell(40,5,utf8_decode($tupla['Materno']),1,0,'C',1);
    $pdf->Cell(60,5,utf8_decode($tupla['Nombre']),1,0,'C',1);


} 

$pdf->Output();



?>