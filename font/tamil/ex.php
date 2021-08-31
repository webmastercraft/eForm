<?php

// Optionally define the filesystem path to your system fonts
// otherwise tFPDF will use [path to tFPDF]/font/unifont/ directory
// define("_SYSTEM_TTFONTS", "C:/Windows/Fonts/");

require('tfpdf.php');

$pdf = new tFPDF();
$pdf->AddPage();

// Add a Unicode font (uses UTF-8)
$pdf->AddFont('DejaVu','','latha.ttf',true);
$pdf->SetFont('DejaVu','',14);

$pdf->Cell(15,5,"வீடு","0",'0','L');


$pdf->Output();
?>
