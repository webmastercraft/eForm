<?php
//define('FPDF_FONTPATH','/font');
require('PDF1.php');
require("FPDI/fpdi.php");


class PDF extends FPDF{
function Header(){}
function Footer(){
		//$this->SetY(-22);
		//$this->SetFont('Arial','I',9);				
		//$this->Cell(0,3,'19 Penn Drive North York, ON, M9L 2A7',0,1,'C');
		//$this->Cell(0,3,'Tel:416-744-9568',0,1,'C');
	 }
}
$pdf=new FPDI();
$pdf->AliasNbPages();
$pdf->AddFont('barcode','','barcode.php');
$pdf->AddFont('latha','','Tamil2016Bam.php');

//---

// $data = explode( ',', $_POST['base64data'] );
// $image = base64_decode($data[1]);

// $testPNG = 'test.png';

// $ifp = fopen( $testPNG, 'wb' ); 
// fwrite( $ifp, $image );
// fclose( $ifp ); 

// $pdf->AddPage("P","Letter");
// $pdf->Image($image, 0, 0 , 200, 1500);
// $file_name="printer.pdf";
// $pdf->Output("imageToPDF/".$file_name);

//---

$pdf->AddPage();
$pdf->SetFont('Arial','B',16);

include_once('headerFile.php');
$pdf->ln();
$pdf->ln();
$pdf->ln();
$pdf->Cell(40,10,'sfdfdfsd','LBR');
$pdf->Output();
/*
$pdf->AddPage("P","A4");
$pdf->Image('300x300.png',3,17,50);

$file_name="test.pdf";
$pdf->Output($file_name);
*/

?>