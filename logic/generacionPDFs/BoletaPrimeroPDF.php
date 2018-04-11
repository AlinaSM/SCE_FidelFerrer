<?php
require('../../logic/conexion.php');
require('cargarDatos.php');
$Bimestre = 1;
$Kardex = 2;


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

$anchoRecuadroCal = 12;
$altoRecuadroCal  = 10.1;
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

$query = "SELECT asignaturas.nombre AS Asignatura , calificacion FROM calificaciones, asignaturas, boleta WHERE Boleta_id = 5 AND boleta.Ciclo_id = 1 AND calificaciones.Asignaturas_id = asignaturas.id group by(calificaciones.id);";
$resultado = $conexion->query($query);
$controlador = 1;

while ($tupla = $resultado->fetch(PDO::FETCH_ASSOC)) {
    $pdf->SetXY($posX, $posY);
    $pdf->Cell($anchoRecuadroCal, $altoRecuadroCal,$tupla['calificacion'], 0, 0,'C'); 
    $posY = $posY + $altoRecuadroCal;
    $controlador = $controlador + 1;

    if ($controlador % 7 == 0) {
        $controlador = 1;
        $posX = $posX + $anchoRecuadroCal;
        $posY = 83;

    }
}

$pdf->useImportedPage($pageId, 0, 0, $tamanioBoleta);

$pageId = $pdf->importPage(2);
$pdf->AddPage('P','Letter',0);
$pdf->useImportedPage($pageId, 0, 0, $tamanioBoleta);
$pdf->Output();



?>