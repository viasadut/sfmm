<?php
//require('force_justify.php');
//require('fpdf/fpdf.php');


require('force_justify.php');
require('db1.php');
$id=$_REQUEST['id'];

$db = mysqli_connect('localhost','root','Godiloveu16');
mysqli_select_db($db,'sfmmkpjnew');
$query = mysqli_query($db,"select * from covidopd where id='$id'");
$data = mysqli_fetch_array($query);



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
$this->SetY(-30);
$this->SetFont('Arial','B',8);

$this->ln(2);
$this->SetFont('Arial','B',8);
$this->Cell(0,10,'Contact Numbers: Ambulance: +880244077029, +8801791987466,Appointments: +880244077030,+8801810008080 (SFMMKPJSH/COVID-19/MR-2)',0,0,'C');


}


//$this->Ln();
}


$pdf = new myPDF();
$pdf->AliasNbPages();
$pdf->AddPage('P','A4',0);
$pdf->SetFont('Arial' , 'b' , 9);
$pdf->SetLeftMargin('16');
//$pdf->headerTable();
//$pdf->viewTable($db);
$pdf->SetFont('Arial' , 'b' , 20);

$pdf->ln(10);
$pdf->Cell('183',6,'COVID-19 Suspected Case Record Form',0,1,'C');
//$this->SetFont('Arial','B',);
$pdf->ln(10);
$pdf->SetFont('Arial' , 'b' , 15);
$pdf->Cell('50',5,'Appointment Date:',0,0,'L');
$pdf->SetFont('Arial' , 'b' , 20);
$pdf->Cell('50',5,date('d/m/Y',strtotime($data["apdate"])),0,0,'L');
$pdf->SetFont('Arial' , 'b' , 15);
$pdf->Cell('50',5,'Appointment Time:',0,0,'L');
$pdf->SetFont('Arial' , 'b' , 20);
$pdf->Cell('70',5,$data['aptime'],0,1,'L');
$pdf->SetFont('Arial' , 'b' , 15);
$pdf->Cell('23',5,'_______________________________________________________________',0,0,'L');

$pdf->ln(8);


$pdf->SetFont('Arial' , 'b' , 20);
$pdf->Cell('10',5,'ID:',0,0,'L');

$pdf->Cell('30',5,$data['sid'],0,0,'L');
$pdf->SetFont('Arial' , 'b' , 14);
$pdf->Cell('53',5,'Sample Classification:',0,0,'L');

$pdf->Cell('43',5,$data['sam'],0,0,'L');

$pdf->Cell('27',5,'Bill Status:',0,0,'L');

$pdf->Cell('40',5,$data['bstatus'],0,1,'L');



$pdf->ln(2);
$pdf->SetFont('Arial' , '' , 10);
$pdf->Cell('11',5,'Name:',0,0,'L');
$pdf->Cell('70',5,$data['name'],0,0,'L');
$pdf->Cell('8',5,'Age:',0,0,'L');
$pdf->Cell('18',5,$data['page'],0,0,'L');
$pdf->Cell('8',5,'Sex:',0,0,'L');
$pdf->Cell('17',5,$data['psex'],0,0,'L');
$pdf->Cell('5',5,'',0,0,'L');
$pdf->Cell('18',5,'Phone No:',0,0,'L');
$pdf->Cell('25',5,$data['phone'],0,1,'L');
$pdf->ln(1);
$pdf->Cell('15',5,'Address:',0,0,'L');
$pdf->Cell('122',5,$data['padd'],0,0,'L');
$pdf->Cell('13',5,'District:',0,0,'L');
$pdf->Cell('18',5,$data['district'],0,1,'L');
$pdf->ln(1);
$pdf->Cell('11',5,'Email:',0,0,'L');
$pdf->Cell('126',5,$data['email'],0,0,'L');
$pdf->Cell('10',5,'Ward:',0,0,'L');
$pdf->Cell('70',5,$data['ward'],0,1,'L');




$pdf->ln(1);
$pdf->Cell('18',5,'Specimen:',0,0,'L');
$pdf->Cell('45',5,$data['specimen'],0,0,'L');
$pdf->Cell('41',5,'Specimen Collection Site:',0,0,'L');
$pdf->Cell('33',5,'SFMMKPJSH',0,0,'L');
$pdf->Cell('25',5,'Collection Date:',0,0,'L');
$pdf->Cell('18',5,$data['ssent1'],0,1,'L');

$pdf->ln(1);
$pdf->SetFont('Arial' , 'b' , 12);
$pdf->Cell('27',5,'Patient Type:',0,0,'L');
$pdf->Cell('40',5,$data['tp'],0,1,'L');


$pdf->ln(5);
$pdf->SetFont('Arial' , 'b' , 15);
$pdf->Cell('23',5,'_______________________________________________________________',0,0,'L');
$pdf->ln(12);

$pdf->SetFont('Arial' , 'b' , 16);
$pdf->Cell('182',5,'COVID-19 Suspect Criteria: Given',0,1,'C');

$pdf->ln(6);



$pdf->SetFont('Arial' , 'b' , 11);
$pdf->Cell('48',5,'Name Of The Test Centre:',0,0,'L');
$pdf->SetFont('Arial' , '' , 11);
$pdf->Cell('70' , 5,$data['sentto'],0,1);
$pdf->ln(3);



$pdf->SetFont('Arial' , 'b' , 11);
$pdf->Cell('22',5,'Symptoms:',0,0,'L');
$pdf->SetFont('Arial' , '' , 11);
$pdf->MultiCell('170' , 5,$data['symptom'],0,1);
$pdf->ln(3);




if($data['phyper']=='' && $data['pdm']=='' && $data['asthma']=='' && $data['copd']=='' && $data['mali']=='')
{
	$pdf->SetFont('Arial' , '' , 11);

}

else 
{$pdf->SetFont('Arial' , 'b' , 11);
$pdf->Cell('22',5,'Comobidity:',0,1,'L');
$pdf->SetFont('Arial' , '' , 11);
$pdf->Cell('170' , 5,'Hypertension: '. $data['phyper'],0,1);
$pdf->Cell('170' , 5,'DM:                '.   $data['pdm'],0,1);
$pdf->Cell('170' , 5,'Asthma:          '. $data['asthma'],0,1);
$pdf->Cell('170' , 5,'COPD:            '. $data['copd'],0,1);
$pdf->Cell('170' , 5,'Malignancy:    '. $data['mali'],0,1);

$pdf->ln(3);	
}


if($data['other']=='')
{
	$pdf->SetFont('Arial' , '' , 11);

}

else 
{$pdf->SetFont('Arial' , 'b' , 11);
	$pdf->Cell('15',5,'Others:',0,0,'L');
$pdf->SetFont('Arial' , '' , 11);
$pdf->MultiCell('170' , 5,$data['other'],0,1);

$pdf->ln(3);	
}


if($data['ldate']=='0000-00-00' ||$data['ldate']=='1970-01-01')
{
	$pdf->SetFont('Arial' , 'b' , 11);
	$pdf->Cell('40',5,'Symptom Start Date:',0,0,'L');
$pdf->SetFont('Arial' , '' , 11);
$pdf->MultiCell('170' , 5,'Symptom Less',0,1);
$pdf->ln(3);
}

else 
{$pdf->SetFont('Arial' , 'b' , 11);
	$pdf->Cell('40',5,'Symptom Start Date:',0,0,'L');
$pdf->SetFont('Arial' , '' , 11);
$pdf->MultiCell('170' , 5,$data['ldate1'],0,1);

$pdf->ln(3);	
}




$pdf->SetFont('Arial' , 'b' , 11);
$pdf->Cell('28',5,'Travel History:',0,0,'L');
$pdf->SetFont('Arial' , '' , 11);
$pdf->Cell('70' , 5,$data['pcase'],0,1);
$pdf->ln(3);

$pdf->SetFont('Arial' , 'b' , 11);
$pdf->Cell('67',5,'Contact History With Positive Case:',0,0,'L');
$pdf->SetFont('Arial' , '' , 11);
$pdf->Cell('70' , 5,$data['cp'],0,1);
$pdf->ln(20);
if($data['tp']=='OPD')
{
$pdf->SetFont('Arial' , 'b' , 14);
$pdf->Cell('67',5,'*** Sample Collection-500 Taka, Test- 2000 Taka',0,1,'L');
$pdf->Cell('67',5,'*** Non-Refundable',0,1,'L');
$pdf->Cell('67',5,'*** Applicable Only For Specified Appointment Date',0,0,'L');
}


else if($data['tp']=='InPatient')
{
$pdf->SetFont('Arial' , 'b' , 11);
$pdf->Cell('67',5,'*** Sample Collection-500 Taka, Test- 2000 Taka',0,1,'L');
$pdf->Cell('67',5,'*** Non-Refundable',0,1,'L');
$pdf->Cell('67',5,'*** Applicable Only For Specified Appointment Date',0,0,'L');
}

else if($data['tp']=='Staff')
{
$pdf->SetFont('Arial' , 'b' , 11);
$pdf->Cell('67',5,'*** Sample Collection-500 Taka, Test- 2000 Taka',0,1,'L');
$pdf->Cell('67',5,'*** Non-Refundable',0,1,'L');
$pdf->Cell('67',5,'*** Applicable Only For Specified Appointment Date',0,0,'L');
}


else if($data['tp']=='Outside')
{
$pdf->SetFont('Arial' , 'b' , 11);
$pdf->Cell('67',5,'*** Sample Collection-500 Taka, Test- 2000 Taka',0,1,'L');
$pdf->Cell('67',5,'*** Non-Refundable',0,1,'L');
$pdf->Cell('67',5,'*** Applicable Only For Specified Appointment Date',0,0,'L');
}


else if($data['tp']=='Outsource')
{
$pdf->SetFont('Arial' , 'b' , 11);
$pdf->Cell('67',5,'*** Sample Collection-500 Taka, Test- 2000 Taka',0,1,'L');
$pdf->Cell('67',5,'*** Non-Refundable',0,1,'L');
$pdf->Cell('67',5,'*** Applicable Only For Specified Appointment Date',0,0,'L');
}


else if($data['tp']=='Corporate')
{
$pdf->SetFont('Arial' , 'b' , 11);
$pdf->Cell('67',5,'*** Sample Collection-500 Taka, Test- 2000 Taka',0,1,'L');
$pdf->Cell('67',5,'*** Non-Refundable',0,1,'L');
$pdf->Cell('67',5,'*** Applicable Only For Specified Appointment Date',0,0,'L');
}

else if($data['tp']=='Police')
{
$pdf->SetFont('Arial' , 'b' , 11);
$pdf->Cell('67',5,'*** Sample Collection-500 Taka, Test- 2000 Taka',0,1,'L');
$pdf->Cell('67',5,'*** Non-Refundable',0,1,'L');
$pdf->Cell('67',5,'*** Applicable Only For Specified Appointment Date',0,0,'L');
}


else if($data['tp']=='Onsite')
{
$pdf->SetFont('Arial' , 'b' , 14);
$pdf->Cell('67',5,'*** Test Charge 7500 Taka',0,1,'L');
$pdf->Cell('67',5,'*** Non-Refundable',0,1,'L');
$pdf->Cell('67',5,'*** Applicable Only For Specified Appointment Date',0,0,'L');
}


else if($data['tp']=='CS_Office')
{
$pdf->SetFont('Arial' , 'b' , 14);
$pdf->Cell('67',5,'*** Test Charge 0 Taka',0,1,'L');
$pdf->Cell('67',5,'*** Non-Refundable',0,1,'L');
$pdf->Cell('67',5,'*** Applicable Only For Specified Appointment Date',0,0,'L');
}


else if($data['tp']=='Foreign_Passenger')
{
$pdf->SetFont('Arial' , 'b' , 11);
$pdf->Cell('67',5,'*** Sample Collection-500 Taka, Test- 2000 Taka',0,1,'L');
$pdf->Cell('67',5,'*** Non-Refundable',0,1,'L');
$pdf->Cell('67',5,'*** Applicable Only For Specified Appointment Date',0,0,'L');
}

$pdf->Output();