<?php
require('PDF1.php');
include("../DB.php");


//--------------------------------------------------------------------
$action  		= $_POST['action'];
$vb_action  	= $_GET['vb_action'];

if($action == "PrintSticker"){

$print_stat=$HTTP_POST_VARS['print_stat'];
$next_date=$HTTP_POST_VARS['next_date'];
$next_km=$HTTP_POST_VARS['next_km'];
$next_km=str_replace("km","",$next_km);
$next_km=str_replace("KM","",$next_km);
$next_km=str_replace("Km","",$next_km);
$next_km=str_replace("kM","",$next_km);
$next_km=$next_km." KM";
$next_text=$HTTP_POST_VARS['next_text'];
//--------


class PDF extends FPDF{
/*
function Header(){}
function Footer(){
    $this->SetY(-35);
    $this->SetFont('Arial','I',8);
    //$this->Cell(0,10,'Page '.$this->PageNo().'/{nb}',0,0,'C');
		$this->Cell(0,5,'Thank you for your business, please come again',0,1,'C');
		$this->Cell(0,5,'Markham City Auto',0,1,'C');
		$this->Cell(0,5,'REPAIR & COLLISION INC.',0,1,'C');
		$this->Cell(0,5,'Markham City Auto, Repair & Collision Inc. :: 9321 HYW 48, Unit 6,7 & 8 :: Markham :: Ontario :: (905)-910-0161 :: (905)-472-9869',0,1,'C');
		$this->Cell(0,5,'HST#:840330252TR0001',0,1,'C');
		
	 }
*/
}
$page_size_x=60;
$page_size_y=70;

$pdf=new PDF('P','mm',array($page_size_x,$page_size_y));

$pdf->AliasNbPages();
$pdf->AddFont('barcode','','barcode.php');
$pdf->SetFont('Times','B',20);
//-------
$pdf->AddPage();

$pdf->SetFont('Times','B',14);
$pdf->Image("1.jpg",3.5,3,10);
$pdf->SetXY(13.5,2.5);
$pdf->Cell(65,5,'Markham City Auto',0,2);

//$pdf->SetFont('Times','B',12);
//$pdf->SetXY(4,8);
//$pdf->Cell(65,5,'REPAIR & COLLISION INC.',"0",'2','L');

$pdf->SetFont('Times','',10);
$pdf->SetXY(2,8);
$pdf->Cell(48,5,'9321 HYW 48,Markham,ON,L3P3J3',"0",'2','L');
//$pdf->SetXY(10,16);
//$pdf->Cell(48,5,'Markham, ON, L3P3J3',"0",'2','C');
$pdf->SetFont('Times','',15);
$pdf->SetXY(10,13);
$pdf->Cell(48,5,'Tel. :905-910-0161',"0",'2','C');
$pdf->SetFont('Times','',10);
//-------
$pdf->SetXY(8.5,19);
$pdf->Cell(48,4,"Next Service","0",'2','L');
$pdf->SetFont('Times','',15);
if($next_date!="" and $next_km!=""){
	$next_date=substr($next_date,0,(strlen($next_date)-4))."".substr($next_date,(strlen($next_date)-2));
	$pdf->Cell(50,10,$next_date." or ".$next_km,"TB",'1','C');
}else{
	if($next_date!=""){
		$pdf->Cell(50,10,$next_date,"TB",'1','C');
	}else{
		$pdf->Cell(50,10,$next_km,"TB",'1','C');
	}
}
//----------
$pdf->SetFont('Times','',10);
if($next_text!=""){
	$pdf->Cell(45,5,$next_text,"0",'1','C');
}else{
	$pdf->Cell(45,5,"http://www.cityautocenter.ca","0",'1','C');
}
//$pdf->Cell(48,5,"http://www.cityautocenter.ca","0",'1','C');


$file_name  		= "D".uniqid().".pdf";
if($print_stat =="D"){
	$pdf->Output("../Print/".$file_name);
	$date=date('Ymd');
	$time=date('His');
	$qr = mysql_query("INSERT INTO print_server VALUES (NULL,'$date','$time','$file_name','P1','Q')")or die(mysql_error());
}else{
	$pdf->Output();
}


//$pdf->Output();
}

if($action == "PrintSticker1"){

$print_stat=$HTTP_POST_VARS['print_stat'];
$next_date=$HTTP_POST_VARS['next_date'];
$next_km=$HTTP_POST_VARS['next_km'];
$next_km=str_replace("km","",$next_km);
$next_km=str_replace("KM","",$next_km);
$next_km=str_replace("Km","",$next_km);
$next_km=str_replace("kM","",$next_km);
$next_km=$next_km." KM";
$next_text=$HTTP_POST_VARS['next_text'];
//--------


class PDF extends FPDF{
/*
function Header(){}
function Footer(){
    $this->SetY(-35);
    $this->SetFont('Arial','I',8);
    //$this->Cell(0,10,'Page '.$this->PageNo().'/{nb}',0,0,'C');
		$this->Cell(0,5,'Thank you for your business, please come again',0,1,'C');
		$this->Cell(0,5,'Markham City Auto',0,1,'C');
		$this->Cell(0,5,'REPAIR & COLLISION INC.',0,1,'C');
		$this->Cell(0,5,'Markham City Auto, Repair & Collision Inc. :: 9321 HYW 48, Unit 6,7 & 8 :: Markham :: Ontario :: (905)-910-0161 :: (905)-472-9869',0,1,'C');
		$this->Cell(0,5,'HST#:840330252TR0001',0,1,'C');
		
	 }
*/
}
$page_size_x=60;
$page_size_y=70;

$pdf=new PDF('P','mm',array($page_size_x,$page_size_y));

$pdf->AliasNbPages();
$pdf->AddFont('barcode','','barcode.php');
$pdf->SetFont('Times','B',20);
//-------
$pdf->AddPage();

$pdf->SetFont('Times','B',14);
$pdf->Image("1.jpg",3.5,3,10);
$pdf->SetXY(13.5,2.5);
$pdf->Cell(65,5,'Markham City Auto',0,2);

$pdf->SetFont('Times','B',12);
$pdf->SetXY(4,8);
$pdf->Cell(65,5,'REPAIR & COLLISION INC.',"0",'2','L');

$pdf->SetFont('Times','',11);
$pdf->SetXY(10,12);
$pdf->Cell(48,5,'9321 HYW 48 Unit 6,7 & 8',"0",'2','L');
$pdf->SetXY(10,16);
$pdf->Cell(48,5,'Markham, ON, L3P3J3',"0",'2','C');
$pdf->SetXY(10,20);
$pdf->Cell(48,5,'Tel. :905-910-0161',"0",'2','C');
//-------
$pdf->SetXY(8.5,23.5);
$pdf->Cell(48,5,"Next Service","0",'2','L');
if($next_date!="" and $next_km!=""){
	$pdf->Cell(50,5,$next_date." or ".$next_km,"1",'1','C');
}else{
	if($next_date!=""){
		$pdf->Cell(50,5,$next_date,"1",'1','C');
	}else{
		$pdf->Cell(50,5,$next_km,"1",'1','C');
	}
}
//----------
if($next_text!=""){
	$pdf->Cell(45,5,$next_text,"0",'1','C');
}else{
	$pdf->Cell(45,5,"http://www.cityautocenter.ca","0",'1','C');
}
//$pdf->Cell(48,5,"http://www.cityautocenter.ca","0",'1','C');


$file_name  		= "D".uniqid().".pdf";
if($print_stat =="D"){
	$pdf->Output("../Print/".$file_name);
	$date=date('Ymd');
	$time=date('His');
	$qr = mysql_query("INSERT INTO print_server VALUES (NULL,'$date','$time','$file_name','P1','Q')")or die(mysql_error());
}else{
	$pdf->Output();
}


//$pdf->Output();
}

if($action == "Print"){
class PDF extends FPDF{
function Header(){}
function Footer(){
    $this->SetY(-35);
    $this->SetFont('Arial','I',8);
    //$this->Cell(0,10,'Page '.$this->PageNo().'/{nb}',0,0,'C');
		$this->Cell(0,5,'Thank you for your business, please come again',0,1,'C');
		$this->Cell(0,5,'Markham City Auto',0,1,'C');
		$this->Cell(0,5,'REPAIR & COLLISION INC.',0,1,'C');
		$this->Cell(0,5,'Markham City Auto, Repair & Collision Inc. :: 9321 HYW 48, Unit 6,7 & 8 :: Markham :: Ontario :: (905)-910-0161 :: (905)-472-9869',0,1,'C');
		$this->Cell(0,5,'HST#:840330252TR0001',0,1,'C');
		
	 }
	 
}
$pdf=new PDF();
$pdf->AliasNbPages();
$pdf->AddFont('barcode','','barcode.php');
$pdf->SetFont('Times','B',20);

//------------------
$xml=$HTTP_POST_VARS['xml'];
$print_stat=$HTTP_POST_VARS['print_stat'];

$xml=$xml."";

//$pdf->AddPage("","Letter");
//$pdf->SetXY(20,30);
//$pdf->Cell(65,5,$xml,"0",'2','L');

$xml 	=str_replace("\\","",$xml);
$att_list_xml 	= simplexml_load_string($xml);

$form4_i=0;
foreach($att_list_xml->children() as $child){
	$ID=$att_list_xml->val[$form4_i][ID];
	$pdf->AddPage("","Letter");
	$form4_i++;
	//$pdf->SetXY(20,30);
	//$pdf->Cell(65,5,$ID,"0",'2','L');
	$pdf->Ln();
	
	//-----------------------------
	$qr_xml = mysql_query("SELECT * FROM invoice WHERE ID = '$ID'")or die("&replay=MySQL".$action_type."_3 - ".mysql_error());
	$row = mysql_fetch_array($qr_xml);
	
	//-----------------------------
$pdf->SetFont('Times','B',20);
$pdf->Image("1.jpg",10,10,50);
$pdf->SetXY(60,18);
$pdf->Cell(65,5,'Markham City Auto',0,2);
$pdf->SetFont('Times','B',12);
$pdf->Cell(65,5,'REPAIR & COLLISION INC.',"0",'2','R');
$pdf->SetFont('Times','B',11);
$pdf->SetXY(20,30);
$pdf->Cell(65,5,'9321 HYW 48 Unit 6,7 & 8',"0",'2','L');
$pdf->Cell(65,5,'Markham, ON',"0",'2','L');
$pdf->Cell(65,5,'L3P 3J3',"0",'2','L');
$pdf->Cell(65,5,'Tel. :905-910-0161',"0",'2','L');
$pdf->Cell(65,5,'Fax. :905-472-9869',"0",'2','L');
//---------

$pdf->SetXY(135,15);
$pdf->SetFont('Times','B',10);
//-----------------------
$invoice_id=$row[9];
//-----------------------
//$pdf->Cell(65,5,'Invoice ID:'.$invoice_id,"0",'2','R');
$pdf->Cell(65,5,'Invoice ID:'.format_string($ID,6,"L","0"),"0",'2','R');

$pdf->SetFont('barcode','',10);
$pdf->Cell(65,18,$invoice_id,"0",'2','R');

$pdf->SetFillColor(255,255,255);
$pdf->SetXY(135,27);
$pdf->Cell(65,18,"","0",'2','R',1);
$pdf->SetFont('Times','B',45);
//$pdf->SetFillColor(255,255,12);
$pdf->SetXY(135,26);
$pdf->Cell(65,18,"INVOICE","0",'2','R');

$pdf->SetFont('Times','',12);
$pdf->SetXY(135,33);
//-----------------------
$num= strpos($row[3], "-");
$invoice_date=substr($row[3],0,$num);
if($row[24]!="undefined" and $row[24]!=""){
	$claim_num="Claim #:".$row[24];
}else{
	$claim_num="";
}
//-----------------------
$pdf->Cell(65,18,$invoice_date,"0",'2','R');
$pdf->SetXY(135,38);
$pdf->Cell(65,18,$claim_num,"0",'2','R');
$pdf->Line(10,58,200,58);
$pdf->Line(10,59,200,59);
$pdf->SetFont('Times','',12);
$pdf->SetXY(10,60);


//clint info------------------------
$pdf->Cell(100,5,find_c_name($row[10],2)." ".find_c_name($row[10],3),"0",'0','L');
if($row[23]!="undefined" and $row[23]!=""){
	$pdf->Cell(60,5,"Service At:".$row[23],"0",'1','L');
}else{
	$pdf->Cell(60,5,"","0",'1','L');
}

$pdf->Cell(100,5,find_c_name($row[10],9),"0",'0','L');
if($row[25]!="undefined" and $row[25]!=""){
	$pdf->Cell(60,5,"Next Service At:".$row[25],"0",'1','L');
}else{
	$pdf->Cell(60,5,"","0",'1','L');
}
if(find_c_name($row[10],10) ==0){
	$city="Toronto";
}else if(find_c_name($row[10],10) ==1){
	$city="Brampton";
}else if(find_c_name($row[10],10) ==10){
	$city="Oshawa";
}else if(find_c_name($row[10],10) ==12){
	$city="Richmond Hill";
}else if(find_c_name($row[10],10) ==16){
	$city="Milton";
}else if(find_c_name($row[10],10) ==21){
	$city="Uxbridge";
}else if(find_c_name($row[10],10) ==22){
	$city="Scugog";
}else if(find_c_name($row[10],10) ==27){
	$city="Woodbridge";
}else if(find_c_name($row[10],10) ==31){
	$city="Maple ";
}else if(find_c_name($row[10],10) ==33){
	$city="Unionville ";
}else if(find_c_name($row[10],10) ==35){
	$city="Stouffville";
}else if(find_c_name($row[10],10) ==4){
	$city="Ajax";
}else if(find_c_name($row[10],10) ==5){
	$city="Aurora";
}else if(find_c_name($row[10],10) ==7){
	$city="Markham";
}

$pdf->Cell(60,5,$city.", ON, ".find_c_name($row[10],12),"0",'2','L');
$make=find_c_name($row[10],6);
$model=find_c_name($row[10],7);
$car=find_car_make($make,$model);
//$pdf->Cell(60,5,find_c_name($row[10],8)." - ".$car." (".find_c_name($row[10],5).")","0",'2','L');//org car line
$pdf->Cell(60,5,"Plate: ".find_c_name($row[10],5)."","0",'2','L');
$pdf->Cell(60,5,"VIN: ".find_c_name($row[10],4),"0",'2','L');
//clint info------------------------

$pdf->SetFillColor(204,204,204);
$pdf->Cell(15,5,"Qty","1",'0','L',1);
$pdf->Cell(15,5,"Item","1",'0','L',1);
$pdf->Cell(140,5,"Description","1",'0','L',1);
$pdf->Cell(20,5,"Unit Value","1",'0','L',1);
$pdf->Ln();
//-------------------loop items
	$items 	= simplexml_load_string($row[17]);
	//if($items!="" and $items!="undefined"){
		$num_1=0;
		foreach($items->children() as $child){
			$qty=$items->val[$num_1][qty];
			$item=$items->val[$num_1][item];
			$description=$items->val[$num_1][description];
			$unit_value=$items->val[$num_1][unit_value];
			$unit_value=str_replace("$","",$unit_value);
			if($unit_value!=""){
				$unit_value="$".format_monye($unit_value);
			}
			
			//------
			//$pdf->SetFillColor(0,0,0);
			$pdf->Cell(15,5,$qty,"1",'0','L');
			$pdf->Cell(15,5,$item,"1",'0','L');
			$pdf->Cell(140,5,$description,"1",'0','L');
			$pdf->Cell(20,5,$unit_value,"1",'0','L');
			$pdf->Ln();
			//------
			$num_1++;
		}
	//}
//-------------------loop items
$pdf->Ln();
$pdf->SetFillColor(255,255,255);
$pdf->Cell(15,5,"","",'0','L',1);
$pdf->Cell(115,5,"","",'0','L',1);
$pdf->SetFillColor(204,204,204);
$pdf->Cell(40,5,"Subtotal","1",'0','l',1);
//------------
$sub_total=$row[20];
$sub_total=str_replace("$","",$sub_total);
$sub_total="$".format_monye($sub_total);
//------------
$pdf->Cell(20,5,$sub_total,"1",'0','l',1);
$pdf->Ln();
$pdf->SetFillColor(255,255,255);
$pdf->Cell(15,5,"","",'0','L',1);
$pdf->Cell(115,5,"","",'0','L',1);
$pdf->SetFillColor(204,204,204);
$pdf->Cell(40,5,"Tax(13%)","1",'0','l',1);
//------------
$tax=($row[20]*1.13)-$row[20];
$tax=str_replace("$","",$tax);
$tax="$".format_monye($tax);
//------------
$pdf->Cell(20,5,$tax,"1",'0','l',1);
$pdf->Ln();
$pdf->SetFillColor(255,255,255);
$pdf->Cell(15,5,"","",'0','L',1);
if($row[13]!=""){
	$pdf->Cell(75,5,"","",'0','L',1);
	$pdf->SetFillColor(204,204,204);
	$pdf->Cell(40,5,"Discount($".$row[13].")","1",'0','L',1);
}else{
	$pdf->SetFillColor(204,204,204);
	$pdf->Cell(115,5,"","",'0','L');
}
$pdf->Cell(40,5,"Total","1",'0','L',1);
//---------
$total=$row[22];
$total=str_replace("$","",$total);
$total="$".format_monye($total);
//---------
$pdf->Cell(20,5,$total,"1",'0','L',1);
$pdf->Ln();
//-------
}
$file_name  		= "D".uniqid().".pdf";
if($print_stat =="D"){
	$pdf->Output("../Print/".$file_name);
	$date=date(Ymd);
	$time=date(His);
	$qr = mysql_query("INSERT INTO print_server VALUES (NULL,'$date','$time','$file_name','RX','Q')")or die(mysql_error());
}else{
	$pdf->Output();
}

}

if($vb_action=="UpdateTable"){	
	$ID		  	= $_GET['ID'];
	$qr_1 = mysql_query("update print_server set statues='P' where ID='$ID'")or die(mysql_error());
	echo "ID: $ID Colum Updated!";
}

if($vb_action=="CheckOutgoing"){
	mysql_select_db("egarage");
	$qr_1 = mysql_query("SELECT * FROM print_server WHERE statues='Q'")or die("nos4". mysql_error());
	$nrows_1 = mysql_num_rows($qr_1);
	$xmlPacket_1="<A>";
	for ($i=0; $i < $nrows_1; $i++) {
		$row_1 = mysql_fetch_array($qr_1);
		$xmlPacket_1.="<val ID=\"$row_1[0]\" file_name=\"$row_1[3]\" send_to=\"$row_1[4]\"/>";
	}
	$xmlPacket_1.="</A>";
	echo $xmlPacket_1;
}

function find_c_name($id,$row){
	$qr_xml1 = mysql_query("SELECT * FROM clints WHERE (id) = '$id' ")or die("&replay=MySQL".$action_type."_3 - ".mysql_error());
	$num_of_row1 = mysql_num_rows($qr_xml1);	
	$row1 = mysql_fetch_array($qr_xml1);
	$row=$row1[$row];

return $row;
}
function find_car_make($make,$model){
	$car_xml="<A label=\"cars\" data=\"6\" name=\"Cars\"><make label=\"Acura\" data=\"0\"><val model=\"CL\" data=\"0\"/><val model=\"CSX\" data=\"1\"/><val model=\"EL\" data=\"2\"/><val model=\"Integra\" data=\"3\"/><val model=\"Legend\" data=\"4\"/><val model=\"MDX\" data=\"5\"/><val model=\"NSX\" data=\"6\"/><val model=\"RDX\" data=\"7\"/><val model=\"RL\" data=\"8\"/><val model=\"RSX\" data=\"9\"/><val model=\"SLX\" data=\"10\"/><val model=\"TL\" data=\"11\"/><val model=\"TSX\" data=\"12\"/><val model=\"Vigor\" data=\"13\"/></make><make label=\"Audi\" data=\"1\"><val model=\"A3\" data=\"0\"/><val model=\"A4\" data=\"1\"/><val model=\"A5\" data=\"2\"/><val model=\"A6\" data=\"3\"/><val model=\"A8\" data=\"4\"/><val model=\"allroad\" data=\"5\"/><val model=\"allroad quattro\" data=\"6\"/><val model=\"Cabriolet\" data=\"7\"/><val model=\"GT\" data=\"8\"/><val model=\"Q7\" data=\"9\"/><val model=\"Quattro\" data=\"10\"/><val model=\"R8\" data=\"11\"/><val model=\"RS4\" data=\"12\"/><val model=\"RS6\" data=\"13\"/><val model=\"S4\" data=\"14\"/><val model=\"S5\" data=\"15\"/><val model=\"S6\" data=\"16\"/><val model=\"S8\" data=\"17\"/><val model=\"TT\" data=\"18\"/><val model=\"V8\" data=\"19\"/></make><make label=\"BMW\" data=\"2\"><val model=\"1 Series\" data=\"0\"/><val model=\"3 Series\" data=\"1\"/><val model=\"5 Series\" data=\"2\"/><val model=\"6 Series\" data=\"3\"/><val model=\"7 Series\" data=\"4\"/><val model=\"8 Series\" data=\"5\"/><val model=\"K Series\" data=\"6\"/><val model=\"M Series\" data=\"7\"/><val model=\"R Series\" data=\"8\"/><val model=\"X Series\" data=\"9\"/><val model=\"Z Series\" data=\"10\"/><val model=\"Z8\" data=\"11\"/></make><make label=\"Cadillac\" data=\"3\"><val model=\"Allante\" data=\"0\"/><val model=\"Catera\" data=\"1\"/><val model=\"Cimarron\" data=\"2\"/><val model=\"CTS\" data=\"3\"/><val model=\"DeVille\" data=\"4\"/><val model=\"DTS\" data=\"5\"/><val model=\"Eldorado\" data=\"6\"/><val model=\"Escalade\" data=\"7\"/><val model=\"Fleetwood\" data=\"8\"/><val model=\"LaSalle\" data=\"9\"/><val model=\"Series 62\" data=\"10\"/><val model=\"Seville\" data=\"11\"/><val model=\"SRX\" data=\"12\"/><val model=\"STS\" data=\"13\"/><val model=\"XLR\" data=\"14\"/></make><make label=\"Chevrolet\" data=\"4\"><val model=\"Astro\" data=\"0\"/><val model=\"Avalanche\" data=\"1\"/><val model=\"Aveo\" data=\"2\"/><val model=\"Beauville\" data=\"3\"/><val model=\"Bel Air\" data=\"4\"/><val model=\"Beretta\" data=\"5\"/><val model=\"Blazer\" data=\"6\"/><val model=\"C/K\" data=\"7\"/><val model=\"Camaro\" data=\"8\"/><val model=\"Camero\" data=\"9\"/><val model=\"Caprice\" data=\"10\"/><val model=\"Cavalier\" data=\"11\"/><val model=\"Celebrity\" data=\"12\"/><val model=\"Chevelle\" data=\"13\"/><val model=\"Chevette\" data=\"14\"/><val model=\"Citation\" data=\"15\"/><val model=\"Cobalt\" data=\"16\"/><val model=\"Colorado\" data=\"17\"/><val model=\"Corsica\" data=\"18\"/><val model=\"Corvair\" data=\"19\"/><val model=\"Corvette\" data=\"20\"/><val model=\"Cube Van\" data=\"21\"/><val model=\"El Camino\" data=\"22\"/><val model=\"Epica\" data=\"23\"/><val model=\"Equinox\" data=\"24\"/><val model=\"Express\" data=\"25\"/><val model=\"EXPRESS 1500 \" data=\"26\"/><val model=\"Express 2500\" data=\"27\"/><val model=\"Express 3500\" data=\"28\"/><val model=\"HHR\" data=\"29\"/><val model=\"Impala\" data=\"30\"/><val model=\"Kodiack\" data=\"31\"/><val model=\"Kodiak\" data=\"32\"/><val model=\"Lumina\" data=\"33\"/><val model=\"Malibu\" data=\"34\"/><val model=\"Metro\" data=\"35\"/><val model=\"Monte Carlo\" data=\"36\"/><val model=\"Nova\" data=\"37\"/><val model=\"Optra\" data=\"38\"/><val model=\"S-10\" data=\"39\"/><val model=\"Silverado\" data=\"40\"/><val model=\"Silverado 1500\" data=\"41\"/><val model=\"Silverado 2500\" data=\"42\"/><val model=\"Silverado 3500\" data=\"43\"/><val model=\"SSR\" data=\"44\"/><val model=\"Suburban\" data=\"45\"/><val model=\"Tahoe\" data=\"46\"/><val model=\"Tracker\" data=\"47\"/><val model=\"Trailblazer\" data=\"48\"/><val model=\"Traverse\" data=\"49\"/><val model=\"Uplander\" data=\"50\"/><val model=\"Vega\" data=\"51\"/><val model=\"Venture\" data=\"52\"/></make><make label=\"Chrysler\" data=\"5\"><val model=\"300\" data=\"0\"/><val model=\"300C\" data=\"1\"/><val model=\"300M\" data=\"2\"/><val model=\"Aspen\" data=\"3\"/><val model=\"Cirrus\" data=\"4\"/><val model=\"Concord\" data=\"5\"/><val model=\"Cordoba\" data=\"6\"/><val model=\"Crossfire\" data=\"7\"/><val model=\"Dynasty\" data=\"8\"/><val model=\"Fifth Avenue\" data=\"9\"/><val model=\"Intrepid\" data=\"10\"/><val model=\"LE BARON  \" data=\"11\"/><val model=\"LeBaron\" data=\"12\"/><val model=\"LHS\" data=\"13\"/><val model=\"New Yorker\" data=\"14\"/><val model=\"Pacifica\" data=\"15\"/><val model=\"PT Cruiser\" data=\"16\"/><val model=\"Sebring\" data=\"17\"/><val model=\"Town Country\" data=\"18\"/><val model=\"Voyager\" data=\"19\"/></make><make label=\"Dodge\" data=\"6\"><val model=\"Avenger\" data=\"0\"/><val model=\"Caliber\" data=\"1\"/><val model=\"Caravan\" data=\"2\"/><val model=\"Challenger\" data=\"3\"/><val model=\"Charger\" data=\"4\"/><val model=\"Coronet\" data=\"5\"/><val model=\"Dakota\" data=\"6\"/><val model=\"Durango\" data=\"7\"/><val model=\"Grand Caravan\" data=\"8\"/><val model=\"Journey\" data=\"9\"/><val model=\"Magnum\" data=\"10\"/><val model=\"Neon\" data=\"11\"/><val model=\"Nitro\" data=\"12\"/><val model=\"Ram\" data=\"13\"/><val model=\"Ram 1500\" data=\"14\"/><val model=\"Ram 2500\" data=\"15\"/><val model=\"Ram 3500\" data=\"16\"/><val model=\"Sprinter\" data=\"17\"/><val model=\"SRT-4\" data=\"18\"/><val model=\"Stealth\" data=\"19\"/><val model=\"Stratus\" data=\"20\"/><val model=\"SX 2.0\" data=\"21\"/><val model=\"Viper\" data=\"22\"/></make><make label=\"Ford\" data=\"7\"><val model=\"Aerostar\" data=\"0\"/><val model=\"Aspire\" data=\"1\"/><val model=\"Bronco\" data=\"2\"/><val model=\"Cobra\" data=\"3\"/><val model=\"Contour\" data=\"4\"/><val model=\"Crown Victoria\" data=\"5\"/><val model=\"E-150\" data=\"6\"/><val model=\"E-250\" data=\"7\"/><val model=\"E-350\" data=\"8\"/><val model=\"E-450\" data=\"9\"/><val model=\"E-Series\" data=\"10\"/><val model=\"Econoline\" data=\"11\"/><val model=\"Edge\" data=\"12\"/><val model=\"Escape\" data=\"13\"/><val model=\"Escort\" data=\"14\"/><val model=\"Excursion\" data=\"15\"/><val model=\"Expedition\" data=\"16\"/><val model=\"Explorer\" data=\"17\"/><val model=\"F-100\" data=\"18\"/><val model=\"F-150\" data=\"19\"/><val model=\"F-150 SuperCrew\" data=\"20\"/><val model=\"F-250\" data=\"21\"/><val model=\"F-250 SuperCrew\" data=\"22\"/><val model=\"F-350\" data=\"23\"/><val model=\"F-450\" data=\"24\"/><val model=\"F-550\" data=\"25\"/><val model=\"F-650\" data=\"26\"/><val model=\"Festiva\" data=\"27\"/><val model=\"Five Hundred\" data=\"28\"/><val model=\"Flex\" data=\"29\"/><val model=\"Focus\" data=\"30\"/><val model=\"Freestar\" data=\"31\"/><val model=\"Freestyle\" data=\"32\"/><val model=\"Fusion\" data=\"33\"/><val model=\"Galaxie\" data=\"34\"/><val model=\"GT\" data=\"35\"/><val model=\"GT40\" data=\"36\"/><val model=\"Laser\" data=\"37\"/><val model=\"Meteor\" data=\"38\"/><val model=\"Model A\" data=\"39\"/><val model=\"Model T\" data=\"40\"/><val model=\"Mustang\" data=\"41\"/><val model=\"Pinto\" data=\"42\"/><val model=\"Probe\" data=\"43\"/><val model=\"Ranger\" data=\"44\"/><val model=\"Scorpio\" data=\"45\"/><val model=\"Sport Trac\" data=\"46\"/><val model=\"Taurus\" data=\"47\"/><val model=\"Tempo\" data=\"48\"/><val model=\"Thunderbird\" data=\"49\"/><val model=\"Torino\" data=\"50\"/><val model=\"Windstar\" data=\"51\"/></make><make label=\"Geo\" data=\"8\"><val model=\"Metro\" data=\"0\"/></make><make label=\"Gmc\" data=\"9\"><val model=\"Acadia\" data=\"0\"/><val model=\"Canyon\" data=\"1\"/><val model=\"Envoy\" data=\"2\"/><val model=\"Jimmy\" data=\"3\"/><val model=\"Safari\" data=\"4\"/><val model=\"Savana\" data=\"5\"/><val model=\"Savana 2500\" data=\"6\"/><val model=\"Savana 3500\" data=\"7\"/><val model=\"Savana Cargo\" data=\"8\"/><val model=\"Savana Conversion\" data=\"9\"/><val model=\"Savana Passenger\" data=\"10\"/><val model=\"Sierra\" data=\"11\"/><val model=\"Sierra 1500\" data=\"12\"/><val model=\"Sierra 2500\" data=\"13\"/><val model=\"Sierra 3500\" data=\"14\"/><val model=\"Sierra Denali\" data=\"15\"/><val model=\"Sonoma\" data=\"16\"/><val model=\"Yukon\" data=\"17\"/><val model=\"Yukon Denali\" data=\"18\"/></make><make label=\"Honda\" data=\"10\"><val model=\"Accord\" data=\"0\"/><val model=\"Acty\" data=\"1\"/><val model=\"Civic\" data=\"2\"/><val model=\"Civic Hybrid\" data=\"3\"/><val model=\"CR-V\" data=\"4\"/><val model=\"CR-X\" data=\"5\"/><val model=\"Element\" data=\"6\"/><val model=\"Fit\" data=\"7\"/><val model=\"NRX1800\" data=\"8\"/><val model=\"Odyssey\" data=\"9\"/><val model=\"Pilot\" data=\"10\"/><val model=\"Prelude\" data=\"11\"/><val model=\"Ridgeline\" data=\"12\"/><val model=\"S2000\" data=\"13\"/><val model=\"Shadow\" data=\"14\"/></make><make label=\"Hummer\" data=\"11\"><val model=\"H1\" data=\"0\"/><val model=\"H2\" data=\"1\"/><val model=\"H3\" data=\"2\"/></make><make label=\"Hyundai\" data=\"12\"><val model=\"Accent\" data=\"0\"/><val model=\"Azera\" data=\"1\"/><val model=\"Elantra\" data=\"2\"/><val model=\"Entourage\" data=\"3\"/><val model=\"Excel\" data=\"4\"/><val model=\"Genesis\" data=\"5\"/><val model=\"Santa Fe\" data=\"6\"/><val model=\"Scoupe\" data=\"7\"/><val model=\"Sonata\" data=\"8\"/><val model=\"Tiburon\" data=\"9\"/><val model=\"Tucson\" data=\"10\"/><val model=\"Veracruz\" data=\"11\"/><val model=\"XG300\" data=\"12\"/><val model=\"XG350\" data=\"13\"/></make><make label=\"Infiniti\" data=\"13\"><val model=\"EX35\" data=\"0\"/><val model=\"FX-Series\" data=\"1\"/><val model=\"G20\" data=\"2\"/><val model=\"G35\" data=\"3\"/><val model=\"G37\" data=\"4\"/><val model=\"I30\" data=\"5\"/><val model=\"I35\" data=\"6\"/><val model=\"J30\" data=\"7\"/><val model=\"M Series\" data=\"8\"/><val model=\"M35x\" data=\"9\"/><val model=\"M45 \" data=\"10\"/><val model=\"Q45\" data=\"11\"/><val model=\"QX4\" data=\"12\"/><val model=\"QX56\" data=\"13\"/></make><make label=\"Isuzu\" data=\"14\"><val model=\"Rodeo\" data=\"0\"/><val model=\"Trooper\" data=\"1\"/></make><make label=\"Jaguar\" data=\"15\"><val model=\"S-Type\" data=\"0\"/><val model=\"X-Type\" data=\"1\"/><val model=\"XJ Series\" data=\"2\"/><val model=\"XK Series\" data=\"3\"/><val model=\"XK140\" data=\"4\"/></make><make label=\"Jeep\" data=\"16\"><val model=\"Cherokee\" data=\"0\"/><val model=\"CJ-Series\" data=\"1\"/><val model=\"Comanche\" data=\"2\"/><val model=\"Commander\" data=\"3\"/><val model=\"Compass\" data=\"4\"/><val model=\"Grand Cherokee\" data=\"5\"/><val model=\"Grand Wagoneer\" data=\"6\"/><val model=\"Liberty\" data=\"7\"/><val model=\"Patriot\" data=\"8\"/><val model=\"Sport\" data=\"9\"/><val model=\"TJ\" data=\"10\"/><val model=\"Wrangler\" data=\"11\"/><val model=\"YJ\" data=\"12\"/></make><make label=\"Kia\" data=\"17\"><val model=\"Amanti\" data=\"0\"/><val model=\"Borrego\" data=\"1\"/><val model=\"Magentis\" data=\"2\"/><val model=\"Optima\" data=\"3\"/><val model=\"Rio\" data=\"4\"/><val model=\"Rondo\" data=\"5\"/><val model=\"Sedona\" data=\"6\"/><val model=\"Sephia\" data=\"7\"/><val model=\"Sorento\" data=\"8\"/><val model=\"Spectra\" data=\"9\"/><val model=\"Sportage\" data=\"10\"/></make><make label=\"Land Rover\" data=\"18\"><val model=\"Defender\" data=\"0\"/><val model=\"Discovery\" data=\"1\"/><val model=\"Freelander\" data=\"2\"/><val model=\"LR2\" data=\"3\"/><val model=\"LR3\" data=\"4\"/><val model=\"Range Rover\" data=\"5\"/></make><make label=\"Lexus\" data=\"19\"><val model=\"ES Series\" data=\"0\"/><val model=\"GS\" data=\"1\"/><val model=\"GS Series\" data=\"2\"/><val model=\"GX Series\" data=\"3\"/><val model=\"H5\" data=\"4\"/><val model=\"IS Series\" data=\"5\"/><val model=\"LS Series\" data=\"6\"/><val model=\"LX\" data=\"7\"/><val model=\"LX Series\" data=\"8\"/><val model=\"RX Series\" data=\"9\"/><val model=\"SC\" data=\"10\"/><val model=\"SC Series\" data=\"11\"/></make><make label=\"Mazda\" data=\"20\"><val model=\"626\" data=\"0\"/><val model=\"B-2300\" data=\"1\"/><val model=\"B-3000\" data=\"2\"/><val model=\"B-4000\" data=\"3\"/><val model=\"B-Series\" data=\"4\"/><val model=\"CX-7\" data=\"5\"/><val model=\"CX-9\" data=\"6\"/><val model=\"Mazda 3\" data=\"7\"/><val model=\"Mazda 5\" data=\"8\"/><val model=\"Mazda 6\" data=\"9\"/><val model=\"Mazdaspeed 3\" data=\"10\"/><val model=\"Mazdaspeed 6\" data=\"11\"/><val model=\"Mazdaspeed MX-5 Miata\" data=\"12\"/><val model=\"Mazdaspeed Proteg\" data=\"13\"/><val model=\"Millenia\" data=\"14\"/><val model=\"MPV\" data=\"15\"/><val model=\"MX-3 Precidia\" data=\"16\"/><val model=\"MX-5 Miata\" data=\"17\"/><val model=\"MX-6\" data=\"18\"/><val model=\"Proteg\" data=\"19\"/><val model=\"Protege\" data=\"20\"/><val model=\"Proteger\" data=\"21\"/><val model=\"RX-7\" data=\"22\"/><val model=\"RX-8\" data=\"23\"/><val model=\"Tribute\" data=\"24\"/></make><make label=\"Mercedes-benz\" data=\"21\"><val model=\"190\" data=\"0\"/><val model=\"190SL\" data=\"1\"/><val model=\"AMG Series\" data=\"2\"/><val model=\"B-Class\" data=\"3\"/><val model=\"C-Class\" data=\"4\"/><val model=\"CL-Class\" data=\"5\"/><val model=\"CLK-Class\" data=\"6\"/><val model=\"CLS-Class\" data=\"7\"/><val model=\"E-Class\" data=\"8\"/><val model=\"G-Class\" data=\"9\"/><val model=\"GL-Class\" data=\"10\"/><val model=\"M-Class\" data=\"11\"/><val model=\"R-Class\" data=\"12\"/><val model=\"S-Class\" data=\"13\"/><val model=\"SL-Class\" data=\"14\"/><val model=\"SLK-Class\" data=\"15\"/><val model=\"SLR McLaren\" data=\"16\"/></make><make label=\"Mg\" data=\"22\"><val model=\"MGB\" data=\"0\"/></make><make label=\"Mini\" data=\"23\"><val model=\"Cooper\" data=\"0\"/><val model=\"Cooper Clubman\" data=\"1\"/><val model=\"Cooper S\" data=\"2\"/><val model=\"Cooper S Clubman\" data=\"3\"/></make><make label=\"Mitsubishi\" data=\"24\"><val model=\"Delica\" data=\"0\"/><val model=\"Diamante\" data=\"1\"/><val model=\"Eclipse\" data=\"2\"/><val model=\"Eclipse Spyder\" data=\"3\"/><val model=\"Endeavor\" data=\"4\"/><val model=\"EVO\" data=\"5\"/><val model=\"Galant\" data=\"6\"/><val model=\"GTO\" data=\"7\"/><val model=\"Lancer\" data=\"8\"/><val model=\"Lancer Evolution\" data=\"9\"/><val model=\"Lancer Ralliart\" data=\"10\"/><val model=\"Lancer Sportback\" data=\"11\"/><val model=\"Montero\" data=\"12\"/><val model=\"Outlander\" data=\"13\"/><val model=\"Raider\" data=\"14\"/></make><make label=\"Nissan\" data=\"25\"><val model=\"200SX\" data=\"0\"/><val model=\"240SX\" data=\"1\"/><val model=\"300ZX\" data=\"2\"/><val model=\"350Z\" data=\"3\"/><val model=\"370Z\" data=\"4\"/><val model=\"Altima\" data=\"5\"/><val model=\"Armada\" data=\"6\"/><val model=\"Axxess\" data=\"7\"/><val model=\"Figaro\" data=\"8\"/><val model=\"Frontier\" data=\"9\"/><val model=\"Maxima\" data=\"10\"/><val model=\"Murano\" data=\"11\"/><val model=\"Pathfinder\" data=\"12\"/><val model=\"Pulsar\" data=\"13\"/><val model=\"Pulsar GTI-R\" data=\"14\"/><val model=\"Quest\" data=\"15\"/><val model=\"Rogue\" data=\"16\"/><val model=\"Sentra\" data=\"17\"/><val model=\"Stanza\" data=\"18\"/><val model=\"Titan\" data=\"19\"/><val model=\"Versa\" data=\"20\"/><val model=\"X-Trail\" data=\"21\"/><val model=\"Xterra\" data=\"22\"/></make><make label=\"Oldsmobile\" data=\"26\"><val model=\"200SX\" data=\"0\"/><val model=\"240SX\" data=\"1\"/><val model=\"300ZX\" data=\"2\"/><val model=\"350Z\" data=\"3\"/><val model=\"370Z\" data=\"4\"/><val model=\"Altima\" data=\"5\"/><val model=\"Armada\" data=\"6\"/><val model=\"Axxess\" data=\"7\"/><val model=\"Figaro\" data=\"8\"/><val model=\"Frontier\" data=\"9\"/><val model=\"Maxima\" data=\"10\"/><val model=\"Murano\" data=\"11\"/><val model=\"Pathfinder\" data=\"12\"/><val model=\"Pulsar\" data=\"13\"/><val model=\"Pulsar GTI-R\" data=\"14\"/><val model=\"Quest\" data=\"15\"/><val model=\"Rogue\" data=\"16\"/><val model=\"Sentra\" data=\"17\"/><val model=\"Stanza\" data=\"18\"/><val model=\"Titan\" data=\"19\"/><val model=\"Versa\" data=\"20\"/><val model=\"X-Trail\" data=\"21\"/><val model=\"Xterra\" data=\"22\"/></make><make label=\"Packard\" data=\"27\"><val model=\"Super Eight\" data=\"0\"/></make><make label=\"Porsche\" data=\"28\"><val model=\"911\" data=\"0\"/><val model=\"928\" data=\"1\"/><val model=\"944\" data=\"2\"/><val model=\"968\" data=\"3\"/><val model=\"Boxster\" data=\"4\"/><val model=\"Carrera\" data=\"5\"/><val model=\"Cayenne\" data=\"6\"/><val model=\"Cayman\" data=\"7\"/></make><make label=\"Rolls-royce\" data=\"29\"><val model=\"Corniche\" data=\"0\"/><val model=\"Phantom \" data=\"1\"/><val model=\"Silver Seraph\" data=\"2\"/><val model=\"Silver Shadow\" data=\"3\"/><val model=\"Silver Spirit\" data=\"4\"/><val model=\"Silver Spur\" data=\"5\"/></make><make label=\"Saab\" data=\"30\"><val model=\"9-2X\" data=\"0\"/><val model=\"9-3\" data=\"1\"/><val model=\"9-5\" data=\"2\"/><val model=\"9-7X\" data=\"3\"/><val model=\"900\" data=\"4\"/><val model=\"9000\" data=\"5\"/><val model=\"H5\" data=\"6\"/></make><make label=\"Saturn\" data=\"31\"><val model=\"Astra\" data=\"0\"/><val model=\"Aura\" data=\"1\"/><val model=\"Ion\" data=\"2\"/><val model=\"L-Series\" data=\"3\"/><val model=\"Outlook\" data=\"4\"/><val model=\"Relay\" data=\"5\"/><val model=\"S-Series\" data=\"6\"/><val model=\"Sky\" data=\"7\"/><val model=\"Vue\" data=\"8\"/></make><make label=\"Smart\" data=\"32\"><val model=\"fortwo\" data=\"0\"/><val model=\"fortwo Cabriolet\" data=\"1\"/></make><make label=\"Subaru\" data=\"33\"><val model=\"B9 Tribeca\" data=\"0\"/><val model=\"Baja\" data=\"1\"/><val model=\"Forester\" data=\"2\"/><val model=\"Impreza\" data=\"3\"/><val model=\"Legacy\" data=\"4\"/><val model=\"Outback\" data=\"5\"/><val model=\"Sambar\" data=\"6\"/><val model=\"Tribeca\" data=\"7\"/><val model=\"WRX\" data=\"8\"/></make><make label=\"Suzuki\" data=\"34\"><val model=\"Aerio\" data=\"0\"/><val model=\"Boulevard\" data=\"1\"/><val model=\"Esteem\" data=\"2\"/><val model=\"Grand Vitara\" data=\"3\"/><val model=\"GSX\" data=\"4\"/><val model=\"Hyabusa\" data=\"5\"/><val model=\"Intruder\" data=\"6\"/><val model=\"Samurai\" data=\"7\"/><val model=\"Sidekick\" data=\"8\"/><val model=\"Swift\" data=\"9\"/><val model=\"SX4\" data=\"10\"/><val model=\"Verona\" data=\"11\"/><val model=\"Vitara\" data=\"12\"/><val model=\"X-90\" data=\"13\"/><val model=\"XL-7\" data=\"14\"/></make><make label=\"Toyota\" data=\"35\"><val model=\"4Runner\" data=\"0\"/><val model=\"Avalon\" data=\"1\"/><val model=\"Camry\" data=\"2\"/><val model=\"Celica\" data=\"3\"/><val model=\"Corolla\" data=\"4\"/><val model=\"Corona\" data=\"5\"/><val model=\"Cressida\" data=\"6\"/><val model=\"Echo\" data=\"7\"/><val model=\"FJ Cruiser\" data=\"8\"/><val model=\"Highlander\" data=\"9\"/><val model=\"Land Cruiser\" data=\"10\"/><val model=\"Matrix\" data=\"11\"/><val model=\"MR2\" data=\"12\"/><val model=\"Paseo\" data=\"13\"/><val model=\"Previa\" data=\"14\"/><val model=\"Prius\" data=\"15\"/><val model=\"RAV4\" data=\"16\"/><val model=\"Sequoia\" data=\"17\"/><val model=\"Sienna\" data=\"18\"/><val model=\"Solara\" data=\"19\"/><val model=\"Starlet\" data=\"20\"/><val model=\"Supra\" data=\"21\"/><val model=\"Tacoma\" data=\"22\"/><val model=\"Tercel\" data=\"23\"/><val model=\"Tundra\" data=\"24\"/><val model=\"Yaris\" data=\"25\"/></make><make label=\"Yamaha\" data=\"36\"><val model=\"V-Star\" data=\"0\"/></make></A>";
	$car 	= simplexml_load_string($car_xml);
	
	$make=$car_xml->make[5][label];
	$model=$model;
	
	//$items 	= simplexml_load_string($row[17]);
	//$num_1=0;
	//foreach($items->children() as $child){
	//$qty=$items->val[$num_1][qty];
			
	return $make;
}
function format_string($org_val,$max_length,$from_side,$add_type){
	if(strlen($org_val)>$max_length){
		$new_val=substr($org_val,0,$max_length);
	}else{
		if($from_side == "L"){
			$new_val=str_pad($org_val, $max_length, $add_type, STR_PAD_LEFT);
		}else if($from_side == "R"){
			$new_val=str_pad($org_val, $max_length, $add_type, STR_PAD_RIGHT);
		}else if($from_side == "B"){
			$new_val=str_pad($org_val, $max_length, $add_type, STR_PAD_BOTH);
		}
	}
return $new_val;
}
function format_monye($amount){
return $amount;
/*
	if($amount == 0){
			return "0.00";
	}else{
		if(strpos($amount,".")==false){
			$new_val=substr($amount,0,-2).".".substr($amount,-2);
			return $new_val;
		}else{
			return sprintf("%01.2f", $amount);
		}
	}
	*/
}

?>