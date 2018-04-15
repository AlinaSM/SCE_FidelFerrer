<?php 
require_once('../../assets/lib/fpdf/fpdf.php'); // Incluímos las librerías anteriormente mencionadas
require('../../logic/info-escuela.php');
require_once('../../assets/lib/fpdi/src/autoload.php');


$pdf = new \setasign\Fpdi\Fpdi();

$page_count = $pdf->setSourceFile("../../assets/pdf/boletas/PRIMARIA1.pdf"); // Sin extensión


class PDF extends FPDF{
    
    function Header(){
        $this->Image('../../assets/img/SEG.jpg',5,8,70);
        $this->Image('../../assets/img/SEP.jpg',300,10,50);
        $this->SetFont('Arial','B',15);
        $this->Cell(30);
        $this->SetXY(70,10);
        $this->Cell(220,25,'Lista de Alumnos',1,0,'C');
        
        $this->Ln(30);
    }   

    function Footer(){
        $this->SetY(-15);
        $this->SetFont('Arial','I',8);
        $this->Cell(0,10,'Pagina'.$this->PageNo().'/{nb}',0,0,'');
        
    }

}


class PDFBit extends FPDF{
    
    function Header(){
        $this->Image('../../assets/img/SEG.jpg',5,8,70);        $this->Image('../../assets/img/SEP.jpg',300,10,50);
        $this->SetFont('Arial','B',15);
        $this->Cell(30);
        $this->SetXY(70,10);
        $this->Cell(220,25,utf8_decode('Bitácora'),1,0,'C');
        
        $this->Ln(30);
    }   

    function Footer(){
        $this->SetY(-15);
        $this->SetFont('Arial','I',8);
        $this->Cell(0,10,'Pagina'.$this->PageNo().'/{nb}',0,0,'');
        
    }

}



/*
class PDFCalificaciones extends FPDF{
    
    function Header(){
        $this->Image('../../assets/img/SEG.jpg',5,8,70);
        $this->Image('../../assets/img/SEP.jpg',300,10,50);
        $this->SetFont('Arial','B',15);
        $this->Cell(30);
        $this->SetXY(70,10);
        $this->Cell(220,25,'Lista de Alumnos',1,0,'C');
        
        $this->Ln(30);
    }   

    function Footer(){
        $this->SetY(-15);
        $this->SetFont('Arial','I',8);
        $this->Cell(0,10,'Pagina'.$this->PageNo().'/{nb}',0,0,'');
        
    }

}
*/

?>