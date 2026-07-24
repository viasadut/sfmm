<?php
//require('force_justify.php');
//require('fpdf/fpdf.php');


require('force_justify.php');
$pmrn=$_REQUEST['pmrn'];
//$dname=$_REQUEST['adoc'];
//$date=$_REQUEST['adate'];
$eid=$_REQUEST['eid'];
$id=$_REQUEST['id'];



$db = mysqli_connect('localhost','root','Godiloveu16');
mysqli_select_db($db,'sfmmkpjnew');
$query = mysqli_query($db,"select * from inpatient where pmrn='$pmrn' and eid='$eid'");
$data = mysqli_fetch_array($query);

$query1 = mysqli_query($db,"select * from preadm where id='$id'");
$data1 = mysqli_fetch_array($query1);
$chno=$data1['chno'];



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
$this->SetY(-65);
$this->SetFont('Arial','B',10);
//$this->Cell(0,10,'Page'.$this->PageNo().' / (SFMM/BMTCSR/001/18)',0,0,'R');

$this->Cell('45',5,'Prepared By',0,0,'L');
$this->Cell('45',5,'Checked By',0,0,'L');
$this->Cell('45',5,'Authorized By',0,0,'L');
$this->Cell('45',5,'Received By',0,1,'L');


$this->SetFont('Arial' , 'b' , 8);	
$this->Cell('45',5,'RINKU CHANDRA DEBNATH',0,0,'L');
$this->Cell('45',5,'NURADILAH SHUIB',0,0,'L');
$this->Cell('45',5,'MOHD. TAUFIK ISMAIL',0,0,'L');
$this->Cell('45',5,'',0,1,'L');



$this->Cell('45',5,'(BUSINESS OFFICE OFFICER)',0,0,'L');
$this->Cell('45',5,'(CHIEF FINANCE OFFICER)',0,0,'L');
$this->Cell('45',5,'(CHIEF EXECUTIVE OFFICER)',0,0,'L');
$this->Cell('45',5,'',0,1,'L');
$this->ln(20);


$this->SetFont('Arial' , 'b' , 10);	
$this->Cell('130',5,'*** BANGABANDHU MEMORIAL TRUST DORIDRO RUGIR SHEBA TOHBIL ***',0,0,'L');
$this->Cell('70',5,' (SFMM/BMTCSR/001/18)',0,1,'L');

}




//$this->Ln();
}

$dt=date('d/m/Y');
$pdf = new myPDF();
$pdf->AliasNbPages();
$pdf->AddPage('P','A4',0);
$pdf->SetFont('Arial' , 'b' , 9);
$pdf->SetLeftMargin('18');
//$pdf->headerTable();
//$pdf->viewTable($db);
$pdf->SetFont('Arial' , 'b' , 16);
$pdf->ln(5);	
$pdf->Cell('183',6,'PAYMENT VOUCHER',0,1,'C');
//$this->SetFont('Arial','B',);
$pdf->ln(1);
$pdf->Cell('30',5,'----------------------------------------------------------------------------------------------',0,0,'L');

$pdf->ln(5);
$pdf->SetFont('Arial' , 'b' , 10);
$pdf->Cell('30',5,'Direct Payment# :',0,0,'L');
$pdf->Cell('20',5,'I'.$data1['pvno'],0,0,'L');


$pdf->Cell('73');
$pdf->Cell('20',5,'Date:',0,0,'L');
$pdf->Cell('20',5,date($data1['ceoa']),0,1,'L');

$pdf->SetFont('Arial' , 'b' , 16);
$pdf->ln(5);
$pdf->Cell('30',5,'----------------------------------------------------------------------------------------------',0,0,'L');





$pdf->ln(6);
$pdf->SetFont('Arial' , 'b' , 10);

$pdf->Cell('30',5,'Payee Name:',0,0,'L');
$pdf->Cell('90',5,$data1['pname'],0,1,'L');


$pdf->Cell('30',5,'Payee Adress:',0,0,'L');
$pdf->Cell('90',5,$data1['padd'],0,1,'L');

$pdf->Cell('30',5,'Phone No:',0,0,'L');
$pdf->Cell('28',5,$data1['pphone'],0,1,'L');


$pdf->Cell('30',5,'Bill No:',0,0,'L');
$pdf->Cell('28',5,$data1['billno'],0,1,'L');




$pdf->ln(5);

if($data1['gender']=='M'){
	

$pdf->SetFont('Arial' , 'b' , 10);
$pdf->Cell('60',5,'MR. '.$data1['pname'],0,1,'L');
}
if($data1['gender']=='F')
	
	{
$pdf->SetFont('Arial' , 'b' , 10);
$pdf->Cell('60',5,'MRS. '.$data1['pname'],0,1,'L');
	}

//$pdf->MultiCell('183',5,'Enclosed, Cheque number-'. $chno .' being payment for very poor patients from the income of the fund donated by the Honorable Chairman of Bangabandhu Memorial Trust and Honorable Prime  Minister  of  the Republic  of Bangladesh  Government to Sheikh Fazilatunnesa Mujib Memorial KPJ Specialized Hospital',0,1);  
$pdf->MultiCell('183',5,'Enclosed, Cheque number-'. $chno .' being payment for very poor patients from the income of the fund donated by the Honorable Chairman of Bangabandhu Memorial Trust to Sheikh Fazilatunnesa Mujib Memorial KPJ Specialized Hospital',0,1);  
	
$pdf->ln(5);	
	
$pdf->Cell('30',5,'Direct Payment# :',0,0,'L');	
$pdf->Cell('30',5,'I'.$data1['pvno'],0,1,'L');	

$pdf->ln(5);	

$pdf->Cell('90',5,'Document / Details',0,0,'L');	
$pdf->Cell('70',5,'Remarks',0,0,'L');	
$pdf->Cell('50',5,'Amount',0,1,'L');	
$pdf->SetFont('Arial' , 'b' , 16);


$pdf->Cell('30',5,'----------------------------------------------------------------------------------------------',0,0,'L');
$pdf->ln(5);

$pdf->SetFont('Arial' , 'b' , 10);
$pdf->Cell('90',5,$data1['pname'],0,0,'L');	
$pdf->Cell('70',5,'MRN-'.$data1['pmrn'],0,0,'L');	
$pdf->Cell('50',5,$data1['bfigure'],0,1,'L');

$pdf->ln(5);
$pdf->Cell('180',5,'Admission Under  '.$data1['dname'],0,1,'L');	


$pdf->ln(5);
$pdf->MultiCell('180',5,'Diagnosis: '.$data1['dia1'],0,1);	

$pdf->SetFont('Arial' , 'b' , 16);
$pdf->ln(3);
$pdf->Cell('30',5,'----------------------------------------------------------------------------------------------',0,0,'L');

$pdf->SetFont('Arial' , 'b' , 10);	
	$pdf->ln(5);
$pdf->Cell('40',5,'Bangladesh Taka (BDT): ',0,0,'L');
$pdf->Cell('110',5,'  '.$data1['bword'],0,0,'L');	

$pdf->Cell('10',5,'Total: ',0,0,'L');
$pdf->Cell('50',5,'  '.$data1['bfigure'],0,1,'L');	
	

	

//$pdf->Cell('180',5,'*** Bangabandhu Memorial Trust Doriodro Rugir Sheba Tahbil ***',0,0,'L');
         

$pdf->Output();