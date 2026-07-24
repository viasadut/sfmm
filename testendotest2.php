<?php
//require('force_justify.php');
//require('fpdf/fpdf.php');


require('force_justify.php');
$link = mysqli_connect('localhost','root','Godiloveu16','sfmmkpjnew');
//$pmrn=$_REQUEST['pmrn'];
//$dname=$_REQUEST['dname'];
$start=$_REQUEST['date'];
$end=$_REQUEST['date1'];
//$eid=$_REQUEST['eid'];
$dd=date('m/d/Y');
$query2 = mysqli_query($link,"Select dname,count(*) from endoreport where dname='Dr. Razeeb Hassan' and type='ENDOSCOPY OF UPPER GIT' and r1date BETWEEN '$start' and '$end'" );
$data2 = mysqli_fetch_array($query2);

$query3 = mysqli_query($link,"Select dname,count(*) from endoreport where dname='Dr. Ranen Biswas' and type='ENDOSCOPY OF UPPER GIT' and r1date BETWEEN '$start' and '$end'" );
$data3 = mysqli_fetch_array($query3);

$query4 = mysqli_query($link,"Select dname,count(*) from endoreport where dname='Dr. J.M.H Qausar Alam' and type='ENDOSCOPY OF UPPER GIT' and r1date BETWEEN '$start' and '$end'" );
$data4 = mysqli_fetch_array($query4);

$query5 = mysqli_query($link,"Select dname,count(*) from endoreport where dname='Dr. Taslima Zaman' and type='ENDOSCOPY OF UPPER GIT' and r1date BETWEEN '$start' and '$end'" );
$data5 = mysqli_fetch_array($query5);

$query6 = mysqli_query($link,"Select dname,count(*) from endoreport where dname='Dr. Mohd. Abbas Uddin' and type='ENDOSCOPY OF UPPER GIT' and r1date BETWEEN '$start' and '$end'" );
$data6 = mysqli_fetch_array($query6);

$query7 = mysqli_query($link,"Select dname,count(*) from endoreport where dname='Dr. Md. Abdur Razzak' and type='ENDOSCOPY OF UPPER GIT' and r1date BETWEEN '$start' and '$end'" );
$data7 = mysqli_fetch_array($query7);


$sum1=$data2['count(*)']+$data3['count(*)']+$data4['count(*)']+$data5['count(*)']+$data6['count(*)']+$data7['count(*)'];


$query8 = mysqli_query($link,"Select dname,count(*) from endoreport where dname='Dr. Razeeb Hassan' and type='COLONOSCOPY' and r1date BETWEEN '$start' and '$end'" );
$data8 = mysqli_fetch_array($query8);

$query9 = mysqli_query($link,"Select dname,count(*) from endoreport where dname='Dr. Ranen Biswas' and type='COLONOSCOPY' and r1date BETWEEN '$start' and '$end'" );
$data9 = mysqli_fetch_array($query9);

$query10 = mysqli_query($link,"Select dname,count(*) from endoreport where dname='Dr. J.M.H Qausar Alam' and type='COLONOSCOPY' and r1date BETWEEN '$start' and '$end'" );
$data10 = mysqli_fetch_array($query10);

$query11 = mysqli_query($link,"Select dname,count(*) from endoreport where dname='Dr. Taslima Zaman' and type='COLONOSCOPY' and r1date BETWEEN '$start' and '$end'" );
$data11 = mysqli_fetch_array($query11);

$query12 = mysqli_query($link,"Select dname,count(*) from endoreport where dname='Dr. Mohd. Abbas Uddin' and type='COLONOSCOPY' and r1date BETWEEN '$start' and '$end'" );
$data12 = mysqli_fetch_array($query12);

$query13 = mysqli_query($link,"Select dname,count(*) from endoreport where dname='Dr. Md. Abdur Razzak' and type='COLONOSCOPY' and r1date BETWEEN '$start' and '$end'" );
$data13 = mysqli_fetch_array($query13);


$sum2=$data8['count(*)']+$data9['count(*)']+$data10['count(*)']+$data11['count(*)']+$data12['count(*)']+$data13['count(*)'];


$query14 = mysqli_query($link,"Select dname,count(*) from endoreport where dname='Dr. Razeeb Hassan' and type='SIGMOIDOSCOPY' and r1date BETWEEN '$start' and '$end'" );
$data14 = mysqli_fetch_array($query14);

$query15 = mysqli_query($link,"Select dname,count(*) from endoreport where dname='Dr. Ranen Biswas' and type='SIGMOIDOSCOPY' and r1date BETWEEN '$start' and '$end'" );
$data15 = mysqli_fetch_array($query15);

$query16 = mysqli_query($link,"Select dname,count(*) from endoreport where dname='Dr. J.M.H Qausar Alam' and type='SIGMOIDOSCOPY' and r1date BETWEEN '$start' and '$end'" );
$data16 = mysqli_fetch_array($query16);

$query17 = mysqli_query($link,"Select dname,count(*) from endoreport where dname='Dr. Taslima Zaman' and type='SIGMOIDOSCOPY' and r1date BETWEEN '$start' and '$end'" );
$data17 = mysqli_fetch_array($query17);

$query18 = mysqli_query($link,"Select dname,count(*) from endoreport where dname='Dr. Mohd. Abbas Uddin' and type='SIGMOIDOSCOPY' and r1date BETWEEN '$start' and '$end'" );
$data18 = mysqli_fetch_array($query18);

$query19 = mysqli_query($link,"Select dname,count(*) from endoreport where dname='Dr. Md. Abdur Razzak' and type='SIGMOIDOSCOPY' and r1date BETWEEN '$start' and '$end'" );
$data19 = mysqli_fetch_array($query19);



$sum3=$data14['count(*)']+$data15['count(*)']+$data16['count(*)']+$data17['count(*)']+$data18['count(*)']+$data19['count(*)'];
$i1=$data2['count(*)']+$data8['count(*)']+$data14['count(*)'];
$i2=$data15['count(*)']+$data9['count(*)']+$data3['count(*)'];
$i3=$data16['count(*)']+$data10['count(*)']+$data4['count(*)'];
$i4=$data18['count(*)']+$data12['count(*)']+$data6['count(*)'];
$i5=$data19['count(*)']+$data13['count(*)']+$data7['count(*)'];
$i6=$data17['count(*)']+$data11['count(*)']+$data5['count(*)'];
$gsum=$sum1+$sum2+$sum3;

//$db = new PDO('mysql:host=localhost;dbname=sfmmkpj','root','');
class myPDF extends FPDF{
function header(){
$this->Image('logo.jpg',70,7);
$this->Image('logo1.jpg',220,7);
$this->SetFont('Arial','B',12);
$this->Cell(300,5,'SHEIKH FAZILATUNNESA MUJIB MEMORIAL',0,0,'C');
$this->Ln(3);
$this->SetFont('Arial','B',12);
$this->Cell(300,10,'KPJ SPECIALIZED HOSPITAL AND NURSING COLLEGE',0,0,'C'); 
$this->ln(5);
$this->SetFont('Arial','B',12);
$this->Cell(300,10,'C/12, Tetuibari, Kashimpur, Gazipur, Bangladesh.',0,0,'C'); 
$this->ln(20);

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
$pdf->AddPage('L','A4',0);
$pdf->SetFont('Arial' , 'b' , 9);
$pdf->SetLeftMargin('17');
//$pdf->headerTable();
//$pdf->viewTable($db);
$pdf->SetFont('Arial' , 'b' , 15);
$pdf->Cell('265',6,'Monthly Endoscopic Procedure Report ',0,1,'C');
$pdf->ln(1);
$pdf->Cell('265',6,'FROM  '.$start.'  TO  '.$end ,0,1,'C');
//$this->SetFont('Arial','B',);
$pdf->ln(1);


$pdf->ln(8);
$pdf->SetFont('Arial' , 'b' , 8);
$pdf->Cell('35',5,'Name Of Procedure',1,0,'C');
$pdf->Cell('35',5,'Dr. Razeeb',1,0,'C');
$pdf->Cell('35',5,'Dr. Ranen',1,0,'C');
$pdf->Cell('35',5,'Dr. Qausar',1,0,'C');
$pdf->Cell('35',5,'Dr. Abbas',1,0,'C');
$pdf->Cell('35',5,'Dr. Razzak',1,0,'C');
$pdf->Cell('35',5,'Dr. Taslima',1,0,'C');
$pdf->Cell('20',5,'Total',1,1,'C');
$pdf->Cell('35',5,'Endoscopy',1,0,'C');
$pdf->Cell('35',5,$data2['count(*)'],1,0,'C');
$pdf->Cell('35',5,$data3['count(*)'],1,0,'C');
$pdf->Cell('35',5,$data4['count(*)'],1,0,'C');
$pdf->Cell('35',5,$data6['count(*)'],1,0,'C');
$pdf->Cell('35',5,$data7['count(*)'],1,0,'C');
$pdf->Cell('35',5,$data5['count(*)'],1,0,'C');
$pdf->Cell('20',5,$sum1,1,1,'C');
$pdf->Cell('35',5,'Colonoscopy',1,0,'C');
$pdf->Cell('35',5,$data8['count(*)'],1,0,'C');
$pdf->Cell('35',5,$data9['count(*)'],1,0,'C');
$pdf->Cell('35',5,$data10['count(*)'],1,0,'C');
$pdf->Cell('35',5,$data12['count(*)'],1,0,'C');
$pdf->Cell('35',5,$data13['count(*)'],1,0,'C');
$pdf->Cell('35',5,$data11['count(*)'],1,0,'C');
$pdf->Cell('20',5,$sum2,1,1,'C');

$pdf->Cell('35',5,'Sigmoidoscopy',1,0,'C');
$pdf->Cell('35',5,$data14['count(*)'],1,0,'C');
$pdf->Cell('35',5,$data15['count(*)'],1,0,'C');
$pdf->Cell('35',5,$data16['count(*)'],1,0,'C');
$pdf->Cell('35',5,$data18['count(*)'],1,0,'C');
$pdf->Cell('35',5,$data19['count(*)'],1,0,'C');
$pdf->Cell('35',5,$data17['count(*)'],1,0,'C');
$pdf->Cell('20',5,$sum3,1,1,'C');

$pdf->Cell('35',5,'Grand Total',1,0,'C');
$pdf->Cell('35',5,$i1,1,0,'C');
$pdf->Cell('35',5,$i2,1,0,'C');
$pdf->Cell('35',5,$i3,1,0,'C');
$pdf->Cell('35',5,$i4,1,0,'C');
$pdf->Cell('35',5,$i5,1,0,'C');
$pdf->Cell('35',5,$i6,1,0,'C');
$pdf->Cell('20',5,$gsum,1,1,'C');

//$pdf->Cell('95',5,$data['dname'],0,1,'L');
$pdf->SetFont('Arial','', 11);
$pdf->Cell('42',5);
//$pdf->Cell('95',5,$data3['degree'],0,1,'L');
$pdf->Cell('42',3);
//$pdf->Cell('80',3,$data3['Discipline'],0,1,'L');
$pdf->SetFont('Arial' , 'b' , 9);

$pdf->ln(6);



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