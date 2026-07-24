<?php
//require('force_justify.php');
//require('fpdf/fpdf.php');


require('force_justify.php');
$id=$_REQUEST['id'];
//$dname=$_REQUEST['dname'];
//$date=$_REQUEST['date'];
//$eid=$_REQUEST['eid'];

$db = mysqli_connect('localhost','root','Godiloveu16');
mysqli_select_db($db,'sfmmkpjnew');
$query = mysqli_query($db,"select * from injury where id='$id'");
$data = mysqli_fetch_array($query);
$data5=$data['fdate'];
$bdate = date( 'd/m/Y', strtotime( $data5) );
//$iby=$data['iby'];

//$query1 = mysqli_query($db,"select * from user where uname='$iby'");
//$data1 = mysqli_fetch_array($query1);
//$full=$data1['fullname'];
//$data1=date('d/m/Y');

//$data2 = date( 'Y-m-d', strtotime( $data1 ) );




//$db = new PDO('mysql:host=localhost;dbname=sfmmkpj','root','');
class myPDF extends FPDF{
function header(){
$this->SetY(20);
$this->Image('logo1.jpg',25,15);
//$this->Image('logo1.jpg',259,15);
$this->SetFont('Arial','B',16);
//$this->Cell(273,10,'SHEIKH FAZILATUNNESA MUJIB MEMORIAL',0,0,'C');
$this->Ln(5);
$this->SetFont('Arial','B',16);
$this->Cell(273,10,'KPJ SPECIALIZED HOSPITAL',0,0,'C'); 
$this->ln(5);
$this->SetFont('Arial','B',16);
$this->Cell(273,10,'C/12, Tetuibari, Kashimpur, Gazipur, Bangladesh.',0,0,'C'); 
$this->ln(15);

}
function footer(){
$this->SetY(-20);
$this->SetFont('Arial','B',8);

$this->ln(2);
$this->SetFont('Arial','B',8);
$this->Cell(0,10,'Contact Numbers:  Ambulance:  +880244077029, +8801791987466, Appointments: +880244077030, +8801703788561 (SFMMKPJSH/IPD/MR-07)',0,0,'C');


}


//$this->Ln();
}


$pdf = new myPDF();
$pdf->AliasNbPages();
$pdf->AddPage('L','A4',0);
$pdf->SetFont('Arial' , 'b' , 9);
$pdf->SetLeftMargin('25');
//$pdf->headerTable();
//$pdf->viewTable($db);
$pdf->SetFont('Arial' , 'b' , 20);
$pdf->Cell('253',10,'INJURY CERTIFICATE',1,1,'C');
//$this->SetFont('Arial','B',);
$pdf->ln(1);
$pdf->SetFont('Arial' , '' , 9);
$pdf->Cell('185',5,'Serial No:',0,0,'R');
$pdf->Cell('22',5,'SFMM-'.$data['year'].'/'.$data['id'],0,0,'L');
$pdf->Cell('28',5,'ISSUE DATE:',0,0,'R');
$pdf->Cell('48',5,$data['idate'],0,0,'L');

$pdf->ln(10);
$pdf->SetFont('Arial' , 'I' , 12);
$pdf->MultiCell('253',8,strtoupper('THIS IS TO CERTIFY THAT '. $data['m1'].' '.$data['pname'].', '. ' AGE '.'- ' .$data['page'].','.' MRN '.'- ' .$data['pmrn'].' - ' .$data['nid'].'- '.$data['nid1'].', ' .'Was Admitted Through - '.$data['staff'].', '.'ON '. $data['fdate'].' AT '. $data['fdate1'].' , '.'ON ADMISSION I HAD EXAMINED THE PATIENT AND THE FINDINGS AS FOLLOWS -'.' '.$data['ffor']),0,1);
$pdf->ln(4);
$pdf->SetFont('Arial' , '' , 12);
$pdf->ln(4);
$pdf->MultiCell('253',5,strtoupper('THE PATIENT WAS DISCHARGED ON- '.$data['ddate']. ' AT '.$data['dtime'].' WITH THE DIAGNOSIS OF - '.$data['diagnosis']),0,1);
$pdf->ln(4);






//$pdf->Cell('60',5,$data5,0,0,'L');
//$pdf->Cell('15',5,'MRN:',1,0,'L');
//$pdf->Cell('18',5,$data['pmrn'],1,0,'L');
//$pdf->Cell('20',5,'GENDER:',1,0,'L');
//$pdf->Cell('20',5,$data['sex'],1,0,'L');
//$pdf->Cell('10',5,'AGE:',1,0,'L');
//$pdf->Cell('15',5,$data['page'],1,1,'L');




$pdf->ln(15);

$pdf->SetFont('Arial' , 'b' , 10);

$pdf->Cell('90',5,strtoupper('Name of the Issuing Doctor'),0,0,'L');
$pdf->Cell('90',5,strtoupper('Name of the Confirming Doctor'),0,0,'L');
$pdf->Cell('90',5,strtoupper('Name of the Acknowledgement Staff'),0,1,'L');
if($data['euser']==''){

    $pdf->Cell('90',5,strtoupper($data['user']),0,0,'L');
}

else if($data['euser']!=''){

    $pdf->Cell('90',5,strtoupper($data['user']),0,0,'L');
}

if($data['econfirmby']==''){
$pdf->Cell('90',5,strtoupper($data['confirmby']),0,0,'L');

}

else if($data['econfirmby']!=''){
    $pdf->Cell('90',5,strtoupper($data['econfirmby']),0,0,'L');
    
    }
$pdf->Cell('90',5,strtoupper($data['ackby']),0,1,'L');




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