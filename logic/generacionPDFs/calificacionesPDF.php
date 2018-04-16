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

$Bimestre = $_GET['Bimestre'];
$Salon    = $_GET['Salon'];
$Ciclo    = $_GET['Ciclo'];

$acumuladorPromedios = 0;
$contarMaterias = 0;
$acumPromediosAlum=0;

$AnchoAsig = 20;
$AltoCabecera  = 9;
$tamanioBoleta = 360; //NO MODIFICAR, DEJAR EN 360
$anchoRecuadroCal = 12;
$altoRecuadroCal  = 10.1;
$posX = 44;
$posY = 83;
$posX_A = 140;
$posY_A = 55;

$pdf = new \setasign\Fpdi\Fpdi();

$page_count = $pdf->setSourceFile("../../assets/pdf/reportes/calificaciones.pdf"); 
$pageId = $pdf->importPage(1);

$pdf->AddPage('L','Legal',0);
$pdf->useImportedPage($pageId, -5, -15, $tamanioBoleta);


$pdf->SetFont('Arial','B',6);
$strCiclo = obtenerCadenaCiclo($Ciclo, $conexion);
$Grado = obtenerGrado($Salon, $conexion);
$Grupo = obtenerGrupo($Salon, $conexion);

CabeceraReportesDatos($pdf, $CCT, $Nombre, $Turno, $Zona, $Domicilio, $Localidad, $Municipio, $Region, $strCiclo, $Grado, $Grupo);

$pdf->SetFillColor(232,232,232);
$pdf->SetFont('Arial','B',7);

$pdf->SetY(55);
$pdf->Cell(10,$AltoCabecera,'No.',1,0,'C',1);
$pdf->Cell(40,$AltoCabecera,'CURP',1,0,'C',1);
$pdf->Cell(25,$AltoCabecera,'Paterno',1,0,'C',1);
$pdf->Cell(25,$AltoCabecera,'Materno',1,0,'C',1);
$pdf->Cell(30,$AltoCabecera,'Nombre',1,0,'C',1);

$queryAsignaturas = "SELECT asignaturas.id AS ID, asignaturas.nombre AS Asignatura FROM asignaturas, asignaturas_has_grados WHERE asignaturas_has_grados.Grados_id = $Grado AND asignaturas_has_grados.Asignaturas_id = asignaturas.id;";
$result = $conexion->query($queryAsignaturas);

while($tupla = $result->fetch(PDO::FETCH_ASSOC)){
    $pdf->SetXY($posX_A, $posY_A);
    $pdf->Cell($AnchoAsig,$AltoCabecera,'',1,0,'C',1);
    $pdf->SetXY($posX_A, $posY_A + 1.5);
    $pdf->MultiCell($AnchoAsig,2.5, utf8_decode($tupla['Asignatura']), 0.2, 'C');

    $posX_A = $posX_A + 20;
    $contarMaterias = $contarMaterias + 1;
}
$result = null;

$pdf->SetXY($posX_A, $posY_A);
$pdf->Cell(10,$AltoCabecera,'Prom.',1,0,'C',1);

$i = 0;

$pdf->SetFillColor(255,255,255);
$pdf->SetFont('Arial','',6);

$query = "SELECT alumnos.CURP as CURP , alumnos.paterno AS Paterno, alumnos.materno as Materno , alumnos.nombre as Nombre FROM alumnos, boleta WHERE Ciclo_id = $Ciclo AND Salones_id = $Salon AND inscrito = 'si' AND alumnos.CURP = boleta.CURP ORDER BY(Paterno);";    
$resultado = $conexion->query($query);

$posX_A = 140 ;
$posY_A = 55 + 9;

$posX_c = 0;
$posY_c = 0;

while($tupla = $resultado->fetch(PDO::FETCH_ASSOC)){
    $i = $i + 1;
    $pdf->Ln();
  
    $pdf->Cell(10,3.5,$i,1,0,'C',1);
    $pdf->Cell(40,3.5,utf8_decode($tupla['CURP']),1,0,'C',1);
    $pdf->Cell(25,3.5,utf8_decode($tupla['Paterno']),1,0,'C',1);
    $pdf->Cell(25,3.5,utf8_decode($tupla['Materno']),1,0,'C',1);
    $pdf->Cell(30,3.5,utf8_decode($tupla['Nombre']),1,0,'C',1);

    $Kardex = ObtenerKardex($tupla['CURP'], $Ciclo, $Salon, $conexion);

    $queryCalificaciones = "SELECT Calificacion FROM  calificaciones WHERE calificaciones.Boleta_id = $Kardex  AND calificaciones.Bimestre_id = $Bimestre;";
    $resultadoCali = $conexion->query($queryCalificaciones);
    $controlador = 1;
    
    while($tupla = $resultadoCali->fetch(PDO::FETCH_ASSOC)){

        $pdf->SetXY($posX_A, $posY_A);
        $pdf->Cell($AnchoAsig,3.5,'',1,0,'C',1);
        $pdf->SetXY($posX_A, $posY_A + 0.8);
        $pdf->MultiCell($AnchoAsig,1.41, utf8_decode($tupla['Calificacion']), 0.2, 'C');
        $controlador = $controlador + 1;
        $posX_A = $posX_A + 20;
        
    }

    
     $valor = ObtenerPromedio($conexion, $Kardex, $Bimestre);
     $promedio = number_format($valor, 1);
     $acumPromediosAlum = $acumPromediosAlum + $promedio; 

     $pdf->SetXY($posX_A, $posY_A);
     $pdf->Cell(10,3.5,$promedio,1,0,'C',1);    

     if ($controlador % ($contarMaterias + 1) == 0) {
        $controlador = 1;
        $posX_A = 140;
        $posY_A = $posY_A + 3.55;

    }

}


$pdf->Ln(5);

$pdf->Cell(130,4,"PROMEDIO POR MATERIA: ",1,0,'C',1);
$result = $conexion->query($queryAsignaturas);

while( $tupla = $result->fetch(PDO::FETCH_ASSOC) ){
    $idAsignatura = $tupla['ID'];
    
    $promedio = number_format(ObtenerCalificacion($conexion, $idAsignatura),1);
    $acumuladorPromedios = $acumuladorPromedios + $promedio;
    $pdf->Cell($AnchoAsig,4,"$promedio",1,0,'C',1);

}

$acumuladorPromedios = number_format($acumuladorPromedios/$contarMaterias , 1);
$acumPromediosAlum = number_format( $acumPromediosAlum/$i , 1 );
$pdf->SetFont('Arial','B',7);
$pdf->Ln(5);

$pdf->SetXY(118, 152.5);
$pdf->Cell(5,4,"$acumuladorPromedios",0,0,'L',1);

$pdf->SetXY(283, 152.5);
$pdf->Cell(5,4,"$acumPromediosAlum",0,0,'C',1);

$pdf->Output();



?>