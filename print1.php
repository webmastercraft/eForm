<?php
//define('FPDF_FONTPATH','/font');
require('PDF1.php');
require("FPDI/fpdi.php");


class PDF extends FPDF{
    function Header($pageWidth, $pageHeight){
        // $this->SetFont('Arial','B',12);
        // $this->Cell(25,8,$head);
        // $margin = 30;
        // $this->Rect( 0, 0, $pageWidth - $margin*2 , $pageHeight - $margin*2, 'S');
    }
    function Footer(){
        // $this->SetY(-22);
        // $this->SetFont('Arial','I',9);               
        // $this->Cell(0,3,'19 Penn Drive North York, ON, M9L 2A7',0,1,'C');
        // $this->Cell(0,3,'Tel:416-744-9568',0,1,'C'); 
    }
    
}


$pdf = new PDF();

$pdf->AddPage();
$width = $pdf->w - 60;
$height = $pdf->h;
$pdf->Header($width, $height);

$pdf->SetMargins(30, 15 , 30);
$pdf->Ln();

$pdf->SetFont('Arial','B',14);
$pdf->Cell(12, 10, 'Re:');
$pdf->SetFont('Arial','',14);
$pdf->Cell($width - 12, 10, 'printer test', 0, 1);

$pdf->SetFont('Arial','B',14);
$pdf->Cell(65, 10, 'To Whom It May Concern:');
$pdf->SetFont('Arial','',14);
$pdf->Cell($width - 65, 10, 'sdfsd', 0, 1);

$pdf->MultiCell($width, 10, 'Surgical stockings have been prescribed for the above-mentioned patient insured by your company.', 0, 1);

//1th check group
$pdf->SetFont('Arial','B',14); $pdf->Cell($width, 10, 'Symptoms:', 0, 1);
//show check mark
$pdf->SetFont('ZapfDingbats','', 15); $pdf->Cell(5, 5, "4", 1, 0, 'C'); $pdf->SetFont('Arial','',14); $pdf->Cell($width/2, 5, "tired legs and feet");
$pdf->SetFont('ZapfDingbats','', 15); $pdf->Cell(5, 5, "", 1, 0, 'C'); $pdf->SetFont('Arial','',14); $pdf->Cell($width/2, 5, "varicosities", 0, 1);

$pdf->SetFont('ZapfDingbats','', 15); $pdf->Cell(5, 5, "", 1, 0, 'C'); $pdf->SetFont('Arial','',14); $pdf->Cell($width/2, 5, "aching, fatigued legs");
$pdf->SetFont('ZapfDingbats','', 15); $pdf->Cell(5, 5, "4", 1, 0, 'C'); $pdf->SetFont('Arial','',14); $pdf->Cell($width/2, 5, "edema", 0, 1);

$pdf->SetFont('ZapfDingbats','', 15); $pdf->Cell(5, 5, "4", 1, 0, 'C'); $pdf->SetFont('Arial','',14); $pdf->Cell($width/2, 5, "ankle and leg swelling");
$pdf->SetFont('ZapfDingbats','', 15); $pdf->Cell(5, 5, "4", 1, 0, 'C'); $pdf->SetFont('Arial','',14); $pdf->Cell($width/2, 5, "thrombophlebitis", 0, 1);

$pdf->SetFont('ZapfDingbats','', 15); $pdf->Cell(5, 5, "4", 1, 0, 'C'); $pdf->SetFont('Arial','',14); $pdf->Cell($width/2, 5, "poor circulation");
$pdf->SetFont('ZapfDingbats','', 15); $pdf->Cell(5, 5, "", 1, 0, 'C'); $pdf->SetFont('Arial','',14); $pdf->Cell($width/2, 5, "pregnancy", 0, 1);

$pdf->SetFont('ZapfDingbats','', 15); $pdf->Cell(5, 5, "4", 1, 0, 'C'); $pdf->SetFont('Arial','',14); $pdf->Cell($width/2, 5, "Other:", 0, 1);


$pdf->SetFont('Arial','B',14);
$pdf->Cell(75, 10, 'Date of examination performed: ');
$pdf->SetFont('Arial','',14);
$pdf->Cell($width - 75, 10, 'test test ', 0, 1);

//2th check group
$pdf->SetFont('Arial','B',14); $pdf->Cell($width, 10, 'Compression Stocking Manufacturer:', 0, 1);
//show check mark
$pdf->SetFont('ZapfDingbats','', 15); $pdf->Cell(5, 5, "4", 1, 0, 'C'); $pdf->SetFont('Arial','',14); $pdf->Cell($width/4, 5, "Jobst");
$pdf->SetFont('ZapfDingbats','', 15); $pdf->Cell(5, 5, "", 1, 0, 'C'); $pdf->SetFont('Arial','',14); $pdf->Cell($width/4, 5, "Therafirm", 0, 1);
$pdf->Ln();

//3th check group
$pdf->SetFont('Arial','B',14); $pdf->Cell($width/4, 5, 'Compression: ');
//show check mark
$pdf->SetFont('ZapfDingbats','', 15); $pdf->Cell(5, 5, "", 1, 0, 'C'); $pdf->SetFont('Arial','',14); $pdf->Cell($width/4, 5, "15 - 20 mmHg");
$pdf->SetFont('ZapfDingbats','', 15); $pdf->Cell(5, 5, "4", 1, 0, 'C'); $pdf->SetFont('Arial','',14); $pdf->Cell($width/4, 5, "20 - 30 mmHg");
$pdf->SetFont('ZapfDingbats','', 15); $pdf->Cell(5, 5, "", 1, 0, 'C'); $pdf->SetFont('Arial','',14); $pdf->Cell($width/4, 5, "30 - 40 mmHg", 0, 1);
$pdf->Ln();

//3th check group
$pdf->SetFont('Arial','B',14); $pdf->Cell($width/4, 5, 'Style: ');
//show check mark
$pdf->SetFont('ZapfDingbats','', 15); $pdf->Cell(5, 5, "", 1, 0, 'C'); $pdf->SetFont('Arial','',14); $pdf->Cell($width/6, 5, "knee");
$pdf->SetFont('ZapfDingbats','', 15); $pdf->Cell(5, 5, "4", 1, 0, 'C'); $pdf->SetFont('Arial','',14); $pdf->Cell($width/6, 5, "thigh");
$pdf->SetFont('ZapfDingbats','', 15); $pdf->Cell(5, 5, "4", 1, 0, 'C'); $pdf->SetFont('Arial','',14); $pdf->Cell($width/6, 5, "waist");
$pdf->SetFont('ZapfDingbats','', 15); $pdf->Cell(5, 5, "", 1, 0, 'C'); $pdf->SetFont('Arial','',14); $pdf->Cell($width/6, 5, "maternity", 0, 1);
$pdf->Ln();


$pdf->SetFont('Arial','B',14);
$pdf->Cell(40, 10, 'Comments: ');
$pdf->SetFont('Arial','',14);
$pdf->Cell($width - 40, 10, 'test test ', 0, 1);

$pdf->SetFont('Arial','',12);
$pdf->Cell($width, 5, 'Cost of the surgical stockings is shown on the attached receipt. ', 0, 1);
$pdf->Cell($width, 5, 'Please feel free to contact me if you have any further questions. ', 0, 1);
$pdf->Cell($width, 5, 'Sincerely,', 0, 1);
$pdf->Ln();

$pdf->Cell($width, 10, 'test test ', 0, 1, 'C');
$pdf->Cell($width, 10, 'Dr. Mark Renzoni D.C., R.M.T., H.B.Sc. ', 0, 1, 'C');

$pdf->Output();
$pdf->Output('./upload/form_fpdf1.pdf');

?>