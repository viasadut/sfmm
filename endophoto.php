<?php
//require('force_justify.php');
//require('fpdf/fpdf.php');


require('force_justify.php');
$pmrn=$_REQUEST['pmrn'];
//$dname=$_REQUEST['dname'];
//$date=$_REQUEST['date'];
$eid=$_REQUEST['eid'];

$db = mysqli_connect('localhost','root','Godiloveu16');
mysqli_select_db($db,'sfmmkpjnew');
$query = mysqli_query($db,"select * from image_gallery where pmrn='$pmrn' and eid='$eid'");
$data = mysqli_fetch_array($query);
//$d=$data['date'];
//$b = date( 'j-F-Y', strtotime( $d) );




//$db = new PDO('mysql:host=localhost;dbname=sfmmkpj','root','');
class myPDF extends FPDF{
function header(){
$this->Image('logo.jpg',15,7);
$this->Image('logo1.jpg',180,7);
$this->SetFont('Arial','B',12);
$this->Cell(190,5,'SHEIKH FAZILATUNNESA MUJIB MEMORIAL',0,0,'C');
$this->Ln(3);
$this->SetFont('Arial','B',12);
$this->Cell(195,10,'KPJ SPECIALIZED HOSPITAL AND NURSING COLLEGE',0,0,'C'); 
$this->ln(5);
$this->SetFont('Arial','B',12);
$this->Cell(190,10,'C/12, Tetuibari, Kashimpur, Gazipur, Bangladesh.',0,0,'C'); 
$this->ln(10);

}
function footer(){
$this->SetY(-10);
$this->SetFont('Arial','B',8);

$this->ln(2);
$this->SetFont('Arial','B',10);
$this->Cell(0,10,'Contact Numbers:  Ambulance:  +880244077029, +8801791987466, Appointments: +880244077030, +8801703788561',0,0,'C');


}


//$this->Ln();
}


$pdf = new myPDF();
$pdf->AliasNbPages();
$pdf->AddPage('P','A4',0);
$pdf->SetFont('Arial' , 'b' , 9);
$pdf->SetLeftMargin('17');
//$pdf->headerTable();
//$pdf->viewTable($db);
$pdf->SetFont('Arial' , 'b' , 15);
$pdf->Cell('183',6,'OUTPATIENT RECORD',1,1,'C');
//$this->SetFont('Arial','B',);


$pdf->SetFont('Arial' , 'b' , 10);
$pdf->Cell('182',5,'Medication Advised:',0,1,'L');
$query1 = mysqli_query($db,"select * from image_gallery where pmrn='$pmrn' and eid='$eid'");

$data1 = mysqli_fetch_array($query1);

//$path = '/path/to/fpdf/images/';
//$path='uploads/$data1['image'];';	
//$image2=$data1['image'];
//$image1 = $path.$image2;
//$pdf->Cell( 40, 40, $pdf->Image('uploads/'.$data1['image'], $pdf->GetX(0), $pdf->GetY(0), 245.78), 0, 0, 'J', false );

//$pdf->Image('uploads/'.$data1['image']);
//'uploads/'.$image_name

//$pdf->Image('uploads/'.$data1['image'], $pdf->GetX(0), $pdf->GetY(0), 245.78), 0, 0, 'J', false );

list($x1, $y1) = getimagesize('uploads/'.$data1['image']);
$x2 = 2;
$y2 = 2;
if(($x1 / $x2) < ($y1 / $y2)) {
    $y2 = 0;
} else {
    $x2 = 0;
}


list($x3, $y3) = getimagesize('uploads/'.$data1['image1']);
$x4 = 2;
$y4 = 20;
if(($x3 / $x4) < ($y3 / $y4)) {
    $y4 = 0;
} else {
    $x4 = 0;
}

$pdf->ln(20);

$pdf->Cell(90, 120, "", 1, 1, 'C',$pdf->Image('uploads/'.$data1['image'],$x2,$y2,50,200));
//$pdf->Cell(90, 160, "", 1, 1, 'C',$pdf->Image('uploads/'.$data1['image1'],$x2,$y2,0,120));

//$pdf->Cell( 50, 50, $pdf->Image('uploads/'.$data1['image'], $pdf->GetX(0), $pdf->GetY(0), 245.78), 1, 1, 'L', false );
//$pdf->Cell( 40, 40, $pdf->Image('uploads/'.$data1['image1'], $pdf->GetX(0), $pdf->GetY(0), 245.78), 1, 1, 'J', false );


//$pdf->MultiCell('182', 5,$data1['medi'],1,1);
$pdf->SetFont('Arial' , '' , 10);
//$pdf->MultiCell('182' , 5,$data1['image'],0,1);
//$pdf->Cell( 40, 40, $pdf->Image("uploads\$data1[image].jpg", $pdf->GetX(0), $pdf->GetY(0), 245.78), 0, 0, 'J', false );
$pdf->ln(1);


$pdf->ln(10);

$pdf->SetFont('Arial' , 'b' , 10);
$pdf->Cell('182',5,'Consultants Signature:',0,1,'R');




//$pdf->SetFont('Arial' , 'b' , 15);
//$pdf->Cell('90',5,'OUT PATIENT RECORD',1,0,'L');


//$pdf->ln(10);
//$pdf->MultiCell('160' , 5,$data['xl'],1,1);
//$pdf->Cell('30' , 5,'Doasge',1,1);
//$pdf->MultiCell('160' , 5,'jashfjh sjfh jsdhfjsdhjfh jsdhjf hjsdhfj dsjhf djsh jfdshjf dsjhf jdsh fdhsf hjsdhf sdhf jdhsf hdsjfhjsdhf sdhf jdshjfhjskdhf jsdh fjhsdjkf hjdsfjd s',1,1);
//$dd=$data['refer']

//$dd = rtrim($dd, ',');
//$string = rtrim($string, ',');

$pdf->Output();