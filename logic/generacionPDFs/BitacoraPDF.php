<?php


require_once('../../assets/lib/fpdf/fpdf.php'); // Incluímos las librerías anteriormente mencionadas
require_once('../../assets/lib/fpdi/src/autoload.php'); // Incluímos las librerías anteriormente mencionadas

$pdf = new \setasign\Fpdi\Fpdi();

$page_count = $pdf->setSourceFile("../../assets/pdf/reportes/calificaciones.pdf"); // Sin extensión
$pageId = $pdf->importPage(1);
$pdf->AddPage('L','Legal',0);
$pdf->useImportedPage($pageId, 0, 0, 350);
//$pdf->useTemplate($template);
//$pdf->Image('../../assets/img/la_dona.jpg', $x, $y, $width, $height);
$pdf->Output();



?>