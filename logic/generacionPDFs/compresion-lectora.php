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

$Periodo = $_GET['Periodo'];
$Salon    = $_GET['Salon'];
$Ciclo    = $_GET['Ciclo'];

$acumuladorPromedios = 0;
$contarMaterias = 0;
$acumPromediosAlum=0;

$AnchoPreg = 50;
$AltoCabecera  = 9;
$tamanioBoleta = 360; //NO MODIFICAR, DEJAR EN 360
$anchoRecuadroCal = 12;
$altoRecuadroCal  = 10.1;
$posX = 44;
$posY = 83;
$posX_A = 140;
$posY_A = 55;

$pdf = new \setasign\Fpdi\Fpdi();

$page_count = $pdf->setSourceFile("../../assets/pdf/reportes/comprencionlectora01.pdf"); 
$pageId = $pdf->importPage(1);

$pdf->AddPage('L','Legal',0);
$pdf->useImportedPage($pageId, -1, -12.5, $tamanioBoleta);


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

//Poner los titulos de la comprension lectora
$QueryPreguntas="SELECT id, pregunta FROM compresion_lectora;";
$resultPreguntas = $conexion->query($QueryPreguntas);

while($tupla = $resultPreguntas->fetch(PDO::FETCH_ASSOC)){
    $pdf->SetXY($posX_A, $posY_A);
    $pdf->Cell($AnchoPreg,$AltoCabecera,'',1,0,'C',1);
    $pdf->SetXY($posX_A, $posY_A + 1.5);
    $pdf->MultiCell($AnchoPreg,2.5, utf8_decode($tupla['pregunta']), 0.2, 'C');

    $posX_A = $posX_A + 50;
    
}
$result = null;
$pdf->Ln(2.4);

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

    $QueryRespuestas = "SELECT CL.num AS Num, OP.opcion AS Opcion FROM  opciones_cl AS OP, boleta_cl AS Bo, compresion_lectora AS CL WHERE Bo.Boleta_id = $Kardex  AND Bo.Periodo_id = $Periodo  AND Bo.CL_id = CL.id AND Bo.opcion_cl_id = OP.id order by(CL.num);";
    $resultadoRespuestas = $conexion->query($QueryRespuestas);
    $controlador = 1;

    
    while($tupla = $resultadoRespuestas->fetch(PDO::FETCH_ASSOC)){

        $pdf->SetXY($posX_A, $posY_A);
        $pdf->Cell($AnchoPreg,3.5,'',1,0,'C',1);
        $pdf->SetXY($posX_A, $posY_A + 0.8);
        $pdf->MultiCell($AnchoPreg,1.41, utf8_decode($tupla['Opcion']), 0.2, 'C');
        $controlador = $controlador + 1;
        $posX_A = $posX_A + 50;
        
    }

    if ($controlador % 4 == 0) {
        $controlador = 1;
        $posX_A = 140;
        $posY_A = $posY_A + 3.55;

    }


}


$pdf->Output();
?>