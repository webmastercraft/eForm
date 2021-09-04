<?php
//define('FPDF_FONTPATH','/font');
require('PDF1.php');
require("FPDI/fpdi.php");


class PDF extends FPDF{
	function Header($head){
		$this->SetFont('Arial','B',12);
		$this->Cell(25,8,$head);
	}
	function Footer(){
		// $this->SetY(-22);
		// $this->SetFont('Arial','I',9);				
		// $this->Cell(0,3,'19 Penn Drive North York, ON, M9L 2A7',0,1,'C');
		// $this->Cell(0,3,'Tel:416-744-9568',0,1,'C');
	 }
	
protected $B = 0;
protected $I = 0;
protected $U = 0;
protected $HREF = '';

function WriteHTML($html)
{
    // HTML parser
    $html = str_replace("\n",' ',$html);
    $a = preg_split('/<(.*)>/U',$html,-1,PREG_SPLIT_DELIM_CAPTURE);
    foreach($a as $i=>$e)
    {
        if($i%2==0)
        {
            // Text
            if($this->HREF)
                $this->PutLink($this->HREF,$e);
            else
                $this->Write(5,$e);
        }
        else
        {
            // Tag
            if($e[0]=='/')
                $this->CloseTag(strtoupper(substr($e,1)));
            else
            {
                // Extract attributes
                $a2 = explode(' ',$e);
                $tag = strtoupper(array_shift($a2));
                $attr = array();
                foreach($a2 as $v)
                {
                    if(preg_match('/([^=]*)=["\']?([^"\']*)/',$v,$a3))
                        $attr[strtoupper($a3[1])] = $a3[2];
                }
                $this->OpenTag($tag,$attr);
            }
        }
    }
}

function OpenTag($tag, $attr)
{
    // Opening tag
    if($tag=='B' || $tag=='I' || $tag=='U')
        $this->SetStyle($tag,true);
    if($tag=='A')
        $this->HREF = $attr['HREF'];
    if($tag=='BR')
        $this->Ln(5);
}

function CloseTag($tag)
{
    // Closing tag
    if($tag=='B' || $tag=='I' || $tag=='U')
        $this->SetStyle($tag,false);
    if($tag=='A')
        $this->HREF = '';
}

function SetStyle($tag, $enable)
{
    // Modify style and select corresponding font
    $this->$tag += ($enable ? 1 : -1);
    $style = '';
    foreach(array('B', 'I', 'U') as $s)
    {
        if($this->$s>0)
            $style .= $s;
    }
    $this->SetFont('',$style);
}

function PutLink($URL, $txt)
{
    // Put a hyperlink
    $this->SetTextColor(0,0,255);
    $this->SetStyle('U',true);
    $this->Write(5,$txt,$URL);
    $this->SetStyle('U',false);
    $this->SetTextColor(0);
}
}

$html = 'You can now easily print text mixing different styles: <p><b>bold</b>, <i>italic</i>,
<u>underlined</u></p>, or <b><i><u>all at once</u></i></b>!<br><br>You can also insert links on
text, such as <a href="http://www.fpdf.org">www.fpdf.org</a>, or on an image: click on the logo.';

$pdf = new PDF();
// First page
// $pdf->AddPage();
// $pdf->SetFont('Arial','',20);
// $pdf->Write(5,"To find out what's new in this tutorial, click ");
// $pdf->SetFont('','U');
// $link = $pdf->AddLink();
// $pdf->Write(5,'here',$link);
// $pdf->SetFont('');
// Second page
$pdf->AddPage();
// $pdf->SetLink($link);
// $pdf->Image('logo.png',10,12,30,0,'','http://www.fpdf.org');
// $pdf->SetLeftMargin(45);
$pdf->SetFontSize(14);
$pdf->WriteHTML($html);
$pdf->Output();

// $pdf=new PDF();
// $pdf->AliasNbPages();
// $pdf->AddFont('barcode','','barcode.php');
// $pdf->AddFont('latha','','Tamil2016Bam.php');

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

// $pdf->AddPage();
// $pdf->SetFont('Arial','B',16);

// include_once('headerFile.php');
// $pdf->Header("1231231");
// $pdf->ln();
// $pdf->ln();
// $pdf->ln();
// $pdf->Cell(40,10,'sfdfdfsd','LBR');
// $html = '<para><h1>Codefixup.com - API and Web development Tutorial Website</h1><br>Website: <u>www.codefixup.com</u></para><br><br>How to Convert HTML to PDF with fpdf example';
// $pdf->WriteHTML($html);
// $pdf->WriteHTML($_POST['data']);
// $pdf->Footer();
// $pdf->Output();

// $pdf->Output('./upload/test.pdf');

?>