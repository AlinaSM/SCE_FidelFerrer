<?php

require('cargarDatos.php');

$NombreAlum  = "Alina";
$PaternoAlum = "Salinas";
$MaternoAlum = "Mendoza";
$CURP="SAMA950215MGRLNL02";
$Grupo = "A";


$NombreEsc = "Fidel Ferrer";
$Turno = "Vespertino";
$CCT = "5G2I1TY14R";
$Zona = 024;
$Localidad = "Acapulco de Juarez";
$Municipio = "Acapulco de Juarez";
$Region = "Acapulco";


$tamanioBoleta = 215; //NO MODIFICAR, DEJAR EN 215
$nuevoNombreDelPDF="Primaria1";

$anchoRecuadroCal = 13;
$altoRecuadroCal  = 11;
$posX = 44;
$posY = 83;

require_once('../../assets/lib/fpdf/fpdf.php'); // Incluímos las librerías anteriormente mencionadas
require_once('../../assets/lib/fpdi/src/autoload.php'); // Incluímos las librerías anteriormente mencionadas

$pdf = new \setasign\Fpdi\Fpdi();

$page_count = $pdf->setSourceFile("../../assets/pdf/boletas/PRIMARIA1.pdf"); // Sin extensión
$pageId = $pdf->importPage(1);

$pdf->AddPage('P','Letter',0);

datosBoletaAlumno($pdf, $PaternoAlum, $MaternoAlum, $NombreAlum, $CURP);
datosGeneralesEscuela($pdf,$NombreEsc,$Grupo,$Turno, $CCT,$Zona);
datosUbicacionEscuela($pdf, $Localidad, $Municipio, $Region);

//Primera materia puntos origen 44,83  tamaño 13w 11h
$pdf->SetXY($posX, $posY);
$pdf->Cell($anchoRecuadroCal, $altoRecuadroCal, '10.0', 1, 0,'C');



//Segunda materia
$pdf->SetXY(45, 93.5);
$pdf->Cell(10, 10, '10.0', 1, 0,'C');

$pdf->SetXY(56.5, 93.5);
$pdf->Cell(10, 10, '10.0', 1, 0,'C');

$pdf->SetXY(68.5, 93.5);
$pdf->Cell(10, 10, '10.0', 1, 0,'C');

$pdf->SetXY(80.5, 93.5);
$pdf->Cell(10, 10, '10.0', 1, 0,'C');

$pdf->SetXY(92.5, 93.5);
$pdf->Cell(10, 10, '10.0', 1, 0,'C');


//Tercera materia
$pdf->SetXY(45, 103.5);
$pdf->Cell(10, 10, '10.0', 1, 0,'C');

$pdf->SetXY(56.5, 103.5);
$pdf->Cell(10, 10, '10.0', 1, 0,'C');

$pdf->SetXY(68.5, 103.5);
$pdf->Cell(10, 10, '10.0', 1, 0,'C');

$pdf->SetXY(80.5, 103.5);
$pdf->Cell(10, 10, '10.0', 1, 0,'C');

$pdf->SetXY(92.5, 103.5);
$pdf->Cell(10, 10, '10.0', 1, 0,'C');


//Tercera materia
$pdf->SetXY(45, 103.5);
$pdf->Cell(10, 10, '10.0', 1, 0,'C');

$pdf->SetXY(56.5, 103.5);
$pdf->Cell(10, 10, '10.0', 1, 0,'C');

$pdf->SetXY(68.5, 103.5);
$pdf->Cell(10, 10, '10.0', 1, 0,'C');

$pdf->SetXY(80.5, 103.5);
$pdf->Cell(10, 10, '10.0', 1, 0,'C');

$pdf->SetXY(92.5, 103.5);
$pdf->Cell(10, 10, '10.0', 1, 0,'C');


$pdf->useImportedPage($pageId, 0, 0, $tamanioBoleta);



$pageId = $pdf->importPage(2);
$pdf->AddPage('P','Letter',0);
$pdf->useImportedPage($pageId, 0, 0, $tamanioBoleta);
$pdf->Output();



?>