<?php


require('../../logic/conexion.php');
require('../../logic/ciclos.php');
require('../../logic/salones.php');
require('../../logic/alumnos.php');
require('../../logic/calificaciones.php');
require('../../logic/info-escuela.php');
require('cargarDatos.php');

require_once('../../assets/lib/fpdf/fpdf.php'); // Incluímos las librerías anteriormente mencionadas
require_once('../../assets/lib/fpdi/src/autoload.php'); // Incluímos las librerías anteriormente mencionadas

$Periodo  = $_GET['Bimestre'];
$Salon    = $_GET['Salon'];
$Ciclo    = $_GET['Ciclo'];

$acumuladorPromedios = 0;
$contarMaterias = 0;
$acumPromediosAlum=0;

$AnchoPreg = 30;
$AltoCabecera  = 9;
$tamanioBoleta = 240; //NO MODIFICAR, DEJAR EN 360
$anchoRecuadroCal = 12;
$altoRecuadroCal  = 10.1;
$posX = 44;
$posY = 83;
$posX_A = 140;
$posY_A = 55;

$pdf = new \setasign\Fpdi\Fpdi();

$page_count = $pdf->setSourceFile("../../assets/pdf/reportes/inasistencia01.pdf"); 
$pageId = $pdf->importPage(1);

$pdf->AddPage('P','Letter',0);
$pdf->useImportedPage($pageId, -15, 0, $tamanioBoleta);


$pdf->SetFont('Arial','B',6);
$strCiclo = obtenerCadenaCiclo($Ciclo, $conexion);
$Grado = obtenerGrado($Salon, $conexion);
$Grupo = obtenerGrupo($Salon, $conexion);
$pdf->SetY(-10);
CabeceraReportesDatos($pdf, $CCT, $Nombre, $Turno, $Zona, $Domicilio, $Localidad, $Municipio, $Region, $strCiclo, $Grado, $Grupo);

$pdf->SetFillColor(232,232,232);
$pdf->SetFont('Arial','B',7);

$pdf->Ln(19.2);
$pdf->Cell(10,$AltoCabecera,'No.',1,0,'C',1);
$pdf->Cell(40,$AltoCabecera,'CURP',1,0,'C',1);
$pdf->Cell(25,$AltoCabecera,'Paterno',1,0,'C',1);
$pdf->Cell(25,$AltoCabecera,'Materno',1,0,'C',1);
$pdf->Cell(30,$AltoCabecera,'Nombre',1,0,'C',1);
$pdf->Cell(30,$AltoCabecera,'Inasistencias',1,0,'C',1);



$i=0;


//Listar Alumnos
$queryAlumnos = "SELECT alumnos.CURP as CURP , alumnos.paterno AS Paterno, alumnos.materno as Materno , alumnos.nombre as Nombre FROM alumnos, boleta WHERE Ciclo_id = $Ciclo AND Salones_id = $Salon AND inscrito = 'si' AND alumnos.CURP = boleta.CURP ORDER BY(Paterno);";    
$resultadoAlumnos = $conexion->query($queryAlumnos);

$posX_A = 140 ;
$posY_A = 55 + 9;

$posX_c = 0;
$posY_c = 0;

$pdf->SetFillColor(255,255,255);
    $pdf->SetFont('Arial','',6);
    
while($tupla = $resultadoAlumnos->fetch(PDO::FETCH_ASSOC)){
    $i = $i + 1;
    $pdf->Ln();
  
    $pdf->Cell(10,3.5,$i,1,0,'C',1);
    $pdf->Cell(40,3.5,utf8_decode($tupla['CURP']),1,0,'C',1);
    $pdf->Cell(25,3.5,utf8_decode($tupla['Paterno']),1,0,'C',1);
    $pdf->Cell(25,3.5,utf8_decode($tupla['Materno']),1,0,'C',1);
    $pdf->Cell(30,3.5,utf8_decode($tupla['Nombre']),1,0,'C',1);

    $Kardex = ObtenerKardex($tupla['CURP'], $Ciclo, $Salon, $conexion);

    $QueryInasistencias = "SELECT inasistencias.inasistencias AS Inasistencias, inasistencias.Boleta_id AS ID FROM inasistencias WHERE inasistencias.Boleta_id = $Kardex AND inasistencias.Bimestre_id = $Periodo;";
    $resultadoInasistencias = $conexion->query($QueryInasistencias);
    $controlador = 1;
    
    while($tupla = $resultadoInasistencias->fetch(PDO::FETCH_ASSOC)){
      
        
            $pdf->Cell($AnchoPreg,3.5,$tupla['Inasistencias'],1,0,'C',1);
       
 
        /*
        $pdf->SetXY($posX_A, $posY_A);
        $pdf->Cell($AnchoPreg,3.5,'',1,0,'C',1)
        $pdf->SetXY($posX_A, $posY_A + 0.8);
        $pdf->MultiCell($AnchoPreg,1.41, utf8_decode($tupla['Opcion']), 0.2, 'C');
        */ 
    }

}

$pdf->Output();
?>