<?php
// echo 1;exit;
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

$post = [
    'action' => 'load',
    'pageName' => 'softform_1',
];

$ch = curl_init("https://jeavensoftcdn.com/icarus/V2Update/test.php");
curl_setopt($ch, CURLOPT_POSTFIELDS, $post);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
$data = curl_exec($ch);
$data = json_decode($data, true);
curl_close ($ch);
$keys = array_keys($data);

function get_checked($key) {
    global $data;
    $result = $data[$key]=="true" ? "4" : '';
    return $result;
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
$pdf->Cell($width - 12, 10, $data['form_1_0'], 0, 1);

$pdf->SetFont('Arial','B',14);
$pdf->Cell(65, 10, 'To Whom It May Concern:');
$pdf->SetFont('Arial','',14);
$pdf->Cell($width - 65, 10, $data['form_1_1'], 0, 1);

$pdf->MultiCell($width, 5, 'Surgical stockings have been prescribed for the above-mentioned patient insured by your company.', 0, 1);

//1th check group
$pdf->SetFont('Arial','B',14); $pdf->Cell($width, 10, 'Symptoms:', 0, 1);
//show check mark
$pdf->SetFont('ZapfDingbats','', 15); $pdf->Cell(5, 5, get_checked('form_1_1_check'), 1, 0, 'C'); $pdf->SetFont('Arial','',14); $pdf->Cell($width/2, 5, "tired legs and feet");
$pdf->SetFont('ZapfDingbats','', 15); $pdf->Cell(5, 5, get_checked('form_1_2_check'), 1, 0, 'C'); $pdf->SetFont('Arial','',14); $pdf->Cell($width/2, 5, "varicosities", 0, 1);
$pdf->Cell($width, 1.5, '', 0, 1);

$pdf->SetFont('ZapfDingbats','', 15); $pdf->Cell(5, 5, get_checked('form_1_3_check'), 1, 0, 'C'); $pdf->SetFont('Arial','',14); $pdf->Cell($width/2, 5, "aching, fatigued legs");
$pdf->SetFont('ZapfDingbats','', 15); $pdf->Cell(5, 5, get_checked('form_1_4_check'), 1, 0, 'C'); $pdf->SetFont('Arial','',14); $pdf->Cell($width/2, 5, "edema", 0, 1);
$pdf->Cell($width, 1.5, '', 0, 1);

$pdf->SetFont('ZapfDingbats','', 15); $pdf->Cell(5, 5, get_checked('form_1_5_check'), 1, 0, 'C'); $pdf->SetFont('Arial','',14); $pdf->Cell($width/2, 5, "ankle and leg swelling");
$pdf->SetFont('ZapfDingbats','', 15); $pdf->Cell(5, 5, get_checked('form_1_6_check'), 1, 0, 'C'); $pdf->SetFont('Arial','',14); $pdf->Cell($width/2, 5, "thrombophlebitis", 0, 1);
$pdf->Cell($width, 1.5, '', 0, 1);

$pdf->SetFont('ZapfDingbats','', 15); $pdf->Cell(5, 5, get_checked('form_1_7_check'), 1, 0, 'C'); $pdf->SetFont('Arial','',14); $pdf->Cell($width/2, 5, "poor circulation");
$pdf->SetFont('ZapfDingbats','', 15); $pdf->Cell(5, 5, get_checked('form_1_8_check'), 1, 0, 'C'); $pdf->SetFont('Arial','',14); $pdf->Cell($width/2, 5, "pregnancy", 0, 1);
$pdf->Cell($width, 1.5, '', 0, 1);

$pdf->SetFont('ZapfDingbats','', 15); $pdf->Cell(5, 5, get_checked('form_1_9_check'), 1, 0, 'C'); $pdf->SetFont('Arial','',14); $pdf->Cell($width/2, 5, "Other:".$data['form_1_10'], 0, 1);


$pdf->SetFont('Arial','B',14);
$pdf->Cell(75, 10, 'Date of examination performed: ');
$pdf->SetFont('Arial','',14);
$pdf->Cell($width - 75, 10, $data['form_1_11'], 0, 1);

//2th check group
$pdf->SetFont('Arial','B',14); $pdf->Cell($width, 10, 'Compression Stocking Manufacturer:', 0, 1);
//show check mark
$pdf->SetFont('ZapfDingbats','', 15); $pdf->Cell(5, 5, get_checked('form_1_12_check'), 1, 0, 'C'); $pdf->SetFont('Arial','',14); $pdf->Cell($width/4 - 5, 5, "Jobst");
$pdf->SetFont('ZapfDingbats','', 15); $pdf->Cell(5, 5, get_checked('form_1_13_check'), 1, 0, 'C'); $pdf->SetFont('Arial','',14); $pdf->Cell($width/4, 5, "Therafirm", 0, 1);
$pdf->Ln();

//3th check group
$pdf->SetFont('Arial','B',14); $pdf->Cell($width/4, 5, 'Compression: ');
//show check mark
$pdf->SetFont('ZapfDingbats','', 15); $pdf->Cell(5, 5, get_checked('form_1_14_check'), 1, 0, 'C'); $pdf->SetFont('Arial','',14); $pdf->Cell($width/4, 5, "15 - 20 mmHg");
$pdf->SetFont('ZapfDingbats','', 15); $pdf->Cell(5, 5, get_checked('form_1_15_check'), 1, 0, 'C'); $pdf->SetFont('Arial','',14); $pdf->Cell($width/4, 5, "20 - 30 mmHg");
$pdf->SetFont('ZapfDingbats','', 15); $pdf->Cell(5, 5, get_checked('form_1_16_check'), 1, 0, 'C'); $pdf->SetFont('Arial','',14); $pdf->Cell($width/4, 5, "30 - 40 mmHg", 0, 1);
$pdf->Ln();

//4th check group
$pdf->SetFont('Arial','B',14); $pdf->Cell($width/4, 5, 'Style: ');
//show check mark
$pdf->SetFont('ZapfDingbats','', 15); $pdf->Cell(5, 5, get_checked('form_1_17_check'), 1, 0, 'C'); $pdf->SetFont('Arial','',14); $pdf->Cell($width/6, 5, "knee");
$pdf->SetFont('ZapfDingbats','', 15); $pdf->Cell(5, 5, get_checked('form_1_18_check'), 1, 0, 'C'); $pdf->SetFont('Arial','',14); $pdf->Cell($width/6, 5, "thigh");
$pdf->SetFont('ZapfDingbats','', 15); $pdf->Cell(5, 5, get_checked('form_1_19_check'), 1, 0, 'C'); $pdf->SetFont('Arial','',14); $pdf->Cell($width/6, 5, "waist");
$pdf->SetFont('ZapfDingbats','', 15); $pdf->Cell(5, 5, get_checked('form_1_20_check'), 1, 0, 'C'); $pdf->SetFont('Arial','',14); $pdf->Cell($width/6, 5, "maternity", 0, 1);
$pdf->Ln();


$pdf->SetFont('Arial','B',14);
$pdf->Cell(40, 10, 'Comments: ');
$pdf->SetFont('Arial','',14);
$pdf->Cell($width - 40, 10, $data['form_1_21'], 0, 1);

$pdf->SetFont('Arial','',12);
$pdf->Cell($width, 5, 'Cost of the surgical stockings is shown on the attached receipt. ', 0, 1);
$pdf->Cell($width, 5, 'Please feel free to contact me if you have any further questions. ', 0, 1);
$pdf->Cell($width, 5, 'Sincerely,', 0, 1);
$pdf->Ln();

$pdf->Cell($width, 10, $data['form_1_22'], 0, 1, 'C');
$pdf->Cell($width, 10, 'Dr. Mark Renzoni D.C., R.M.T., H.B.Sc. ', 0, 1, 'C');

$pdf->Output();
$pdf->Output('./upload/form_fpdf1.pdf');

?>