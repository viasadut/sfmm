<?php
//require('force_justify.php');
//require('fpdf/fpdf.php');


require('force_justify.php');
$id=$_REQUEST['id'];

require('db1.php');

$db = mysqli_connect('localhost','root','Godiloveu16');
mysqli_select_db($db,'sfmmkpjnew');
$query = mysqli_query($db,"select * from incident1 where id='$id'");
$data = mysqli_fetch_array($query);
//$d=$data['date'];
//$b = date( 'j-F-Y', strtotime( $d) );
$rby=$data['rby'];
$hos=$data['hos'];
$fby=$data['fby'];
$hos1=$data['hos1'];
$cc=$data['cc'];
$m1=$data['m1'];
$m2=$data['m2'];
$m3=$data['m3'];
$m4=$data['m4'];
$m5=$data['m5'];

$m6=$data['m6'];
$m7=$data['m7'];
$m8=$data['m8'];
$m9=$data['m9'];
$m10=$data['m10'];




$query3r = "SELECT * FROM staff3 where sid= '$rby'"; 
	 
$result3r = mysqli_query($con, $query3r) or die(mysqli_error());

// Print out result
$row3r = mysqli_fetch_array($result3r);
$rby1=$row3r['sname'];
$dept1=$row3r['dept'];

$query3ra = "SELECT * FROM staff1 where sid= '$rby'"; 
	 
$result3ra = mysqli_query($con, $query3ra) or die(mysqli_error());

// Print out result
$row3ra = mysqli_fetch_array($result3ra);
$rby1a=$row3ra['mname'];
$dept1a=$row3ra['category'];



$query3h = "SELECT * FROM staff3 where sid= '$hos'"; 
	 
$result3h = mysqli_query($con, $query3h) or die(mysqli_error());

// Print out result
$row3h = mysqli_fetch_array($result3h);
$hos1=$row3h['sname'];


$query3f = "SELECT * FROM staff3 where sid= '$fby'"; 
	 
$result3f = mysqli_query($con, $query3f) or die(mysqli_error());

// Print out result
$row3f = mysqli_fetch_array($result3f);
$fby1=$row3f['sname'];


$query3cc = "SELECT * FROM staff1 where sid= '$cc'"; 
	 
$result3cc = mysqli_query($con, $query3cc) or die(mysqli_error());

// Print out result
$row3cc = mysqli_fetch_array($result3cc);
$cc1=$row3cc['mname'];

$query3m1 = "SELECT * FROM user where uname= '$m1'"; 
	 
$result3m1 = mysqli_query($con, $query3m1) or die(mysqli_error());

// Print out result
$row3m1 = mysqli_fetch_array($result3m1);
$mm1=$row3m1['fullname'];


$query3m2 = "SELECT * FROM user where uname= '$m2'"; 
	 
$result3m2 = mysqli_query($con, $query3m2) or die(mysqli_error());

// Print out result
$row3m2 = mysqli_fetch_array($result3m2);
$mm2=$row3m2['fullname'];


$query3m3 = "SELECT * FROM user where uname= '$m3'"; 
	 
$result3m3 = mysqli_query($con, $query3m3) or die(mysqli_error());

// Print out result
$row3m3 = mysqli_fetch_array($result3m3);
$mm3=$row3m3['fullname'];

$query3m4 = "SELECT * FROM user where uname= '$m4'"; 
	 
$result3m4 = mysqli_query($con, $query3m4) or die(mysqli_error());

// Print out result
$row3m4 = mysqli_fetch_array($result3m4);
$mm4=$row3m4['fullname'];


$query3m5 = "SELECT * FROM user where uname= '$m5'"; 
	 
$result3m5 = mysqli_query($con, $query3m5) or die(mysqli_error());

// Print out result
$row3m5 = mysqli_fetch_array($result3m5);
$mm5=$row3m5['fullname'];



$query3m6 = "SELECT * FROM user where uname= '$m6'"; 
	 
$result3m6 = mysqli_query($con, $query3m6) or die(mysqli_error());

// Print out result
$row3m6 = mysqli_fetch_array($result3m6);
$mm6=$row3m6['fullname'];


$query3m7 = "SELECT * FROM user where uname= '$m7'"; 
	 
$result3m7 = mysqli_query($con, $query3m7) or die(mysqli_error());

// Print out result
$row3m7 = mysqli_fetch_array($result3m7);
$mm7=$row3m7['fullname'];



$query3m8 = "SELECT * FROM user where uname= '$m8'"; 
	 
$result3m8 = mysqli_query($con, $query3m8) or die(mysqli_error());

// Print out result
$row3m8 = mysqli_fetch_array($result3m8);
$mm8=$row3m8['fullname'];


$query3m9 = "SELECT * FROM user where uname= '$m9'"; 
	 
$result3m9 = mysqli_query($con, $query3m9) or die(mysqli_error());

// Print out result
$row3m9 = mysqli_fetch_array($result3m9);
$mm9=$row3m9['fullname'];



$query3m10 = "SELECT * FROM user where uname= '$m10'"; 
	 
$result3m10 = mysqli_query($con, $query3m10) or die(mysqli_error());

// Print out result
$row3m10 = mysqli_fetch_array($result3m10);
$mm10=$row3m10['fullname'];








//$db = new PDO('mysql:host=localhost;dbname=sfmmkpj','root','');
class myPDF extends FPDF{
function header(){
$this->Image('logo1.jpg',15,7);
//$this->Image('logo1.jpg',180,7);
$this->SetFont('Arial','B',12);
//$this->Cell(190,5,'SHEIKH FAZILATUNNESA MUJIB MEMORIAL',0,0,'C');
$this->Ln(3);
$this->SetFont('Arial','B',12);
$this->Cell(195,10,'KPJ SPECIALIZED HOSPITAL AND NURSING COLLEGE',0,0,'C'); 
$this->ln(5);
$this->SetFont('Arial','B',12);
$this->Cell(190,10,'C/12, Tetuibari, Kashimpur, Gazipur, Bangladesh.',0,0,'C'); 
$this->ln(10);

}
function footer(){
$this->SetY(-20);
$this->SetFont('Arial','B',8);

$this->ln(2);
$this->SetFont('Arial','B',8);
$this->Cell(0,10,'Contact Numbers: Ambulance: +880244077029, +8801791987466,Appointments: +880244077030,+8801703788561 (SFMMKPJSH/OPD/MR-01)',0,0,'C');


}


//$this->Ln();
}


$pdf = new myPDF();
$pdf->AliasNbPages();

//$pdf->AddFont('SundayMorning','I','SundayMorning.php');


$pdf->AddPage('P','A4',0);


//$pdf->SetFont('SundayMorning','',8);

//$pdf->SetFont('Arial' , 'b' , 9);
$pdf->SetLeftMargin('22');
//$pdf->headerTable();
//$pdf->viewTable($db);
$pdf->SetFont('Arial' , 'b' , 15);
$pdf->Cell('180',6,'Incident Report',1,1,'C');
$pdf->ln(2);
$pdf->SetFont('Arial' , 'b' , 10);
$pdf->Cell('45',6,'Type: '.$data['itype'],1,0,'L');
$pdf->Cell('45',6,'Category: '.$data['cat'],1,0,'L');
$pdf->Cell('45',6,'Injury: '.$data['injury'],1,0,'L');
$pdf->Cell('45',6,'Status: '.$data['status'],1,1,'R');
//$this->SetFont('Arial','B',);






//$pdf->Image('1001.jpg',180,42);



$pdf->Cell('60',5,'Date Of Reporting:',1,0,'L');
$pdf->Cell('120',5,$data['rdate1'],1,1,'L');
$pdf->Cell('60',5,'Incident Raised By:',1,0,'L');
if($rby1!=''){
$pdf->Cell('120',5,$rby1,1,1,'L');
$pdf->Cell('60',5,'Staff ID:',1,0,'L');
$pdf->Cell('120',5,$rby,1,1,'L');
$pdf->Cell('60',5,'Department:',1,0,'L');
$pdf->Cell('120',5,$dept1,1,1,'L');}

if($rby1a!=''){
$pdf->Cell('120',5,$rby1a,1,1,'L');
$pdf->Cell('60',5,'Staff ID:',1,0,'L');
$pdf->Cell('120',5,$rby,1,1,'L');
$pdf->Cell('60',5,'Department:',1,0,'L');
$pdf->Cell('120',5,$dept1a,1,1,'L');}
$pdf->Cell('60',5,'Area Of Incident:',1,0,'L');
$pdf->Cell('120',5,$data['idept'],1,1,'L');

$pdf->ln(3);

$pdf->SetFont('Arial' , 'b' , 10);
$pdf->Cell('180',5,'Description:',1,1,'L');
$pdf->SetFont('Arial' , '' , 10);
$pdf->MultiCell('180' , 5,$data['idetails'],1,1);




if($data['com5']!=''){
	$pdf->ln(3);
$pdf->SetFont('Arial' , 'b' , 10);
$pdf->Cell('180',5,'Note From Head of the relevant Department: ',1,1,'L');
$pdf->Cell('120',5,$hos1,1,0,'L');
$pdf->Cell('60',5,'Date/Time:  '.$data['com5time'],1,1,'R');
$pdf->SetFont('Arial' , '' , 10);
$pdf->MultiCell('180' , 5,$data['com5'],1,1);
}



if($data['hos1com']!=''){
	$pdf->ln(3);
$pdf->SetFont('Arial' , 'b' , 10);

$pdf->Cell('180',5,'Departmental HOS Comments:',0,1,'L');
$pdf->Cell('120',5,$hos1,1,0,'L');

$pdf->Cell('60',5,'Date/Time:  '.$data['hos1time'],1,1,'R');

$pdf->SetFont('Arial' , '' , 10);
$pdf->MultiCell('180' , 5,$data['hos1com'],0,1);
}



if($data['m1com']!=''){
	$pdf->ln(3);
$pdf->SetFont('Arial' , 'b' , 10);
$pdf->Cell('180',5,'Staff Involved:',1,1,'L');
$pdf->Cell('120',5,$mm1,1,0,'L');
$pdf->Cell('60',5,'Date/Time:  '.$data['m1date'],1,1,'R');
$pdf->SetFont('Arial' , '' , 10);
$pdf->MultiCell('180' , 5,$data['m1com'],1,1);
}

if($data['m2com']!=''){
	$pdf->ln(3);
$pdf->SetFont('Arial' , 'b' , 10);
$pdf->Cell('180',5,'Staff Involved:',1,1,'L');
$pdf->Cell('120',5,$mm2,1,0,'L');
$pdf->Cell('60',5,'Date/Time:  '.$data['m2date'],1,1,'R');
$pdf->SetFont('Arial' , '' , 10);
$pdf->MultiCell('182' , 5,$data['m2com'],1,1);
}


if($data['m3com']!=''){
	$pdf->ln(3);
$pdf->SetFont('Arial' , 'b' , 10);
$pdf->Cell('180',5,'Staff Involved:',1,1,'L');
$pdf->Cell('120',5,$mm3,1,0,'L');
$pdf->Cell('60',5,'Date/Time:  '.$data['m3date'],1,1,'R');
$pdf->SetFont('Arial' , '' , 10);
$pdf->MultiCell('182' , 5,$data['m3com'],1,1);
}


if($data['m4com']!=''){
	$pdf->ln(3);
$pdf->SetFont('Arial' , 'b' , 10);
$pdf->Cell('180',5,'Staff Involved:',1,1,'L');
$pdf->Cell('120',5,$mm4,1,0,'L');
$pdf->Cell('60',5,'Date/Time:  '.$data['m4date'],1,1,'R');
$pdf->SetFont('Arial' , '' , 10);
$pdf->MultiCell('182' , 5,$data['m4com'],1,1);
}


if($data['m5com']!=''){
	$pdf->ln(3);
$pdf->SetFont('Arial' , 'b' , 10);
$pdf->Cell('180',5,'Staff Involved:',1,1,'L');
$pdf->Cell('120',5,$mm5,1,0,'L');
$pdf->Cell('60',5,'Date/Time:  '.$data['m5date'],1,1,'R');
$pdf->SetFont('Arial' , '' , 10);
$pdf->MultiCell('182' , 5,$data['m5com'],1,1);
}

if($data['m6com']!=''){
	$pdf->ln(3);
$pdf->SetFont('Arial' , 'b' , 10);
$pdf->Cell('180',5,'Staff Involved:',1,1,'L');
$pdf->Cell('120',5,$mm6,1,0,'L');
$pdf->Cell('60',5,'Date/Time:  '.$data['m6date'],1,1,'R');
$pdf->SetFont('Arial' , '' , 10);
$pdf->MultiCell('182' , 5,$data['m6com'],1,1);
}


if($data['m7com']!=''){
	$pdf->ln(3);
$pdf->SetFont('Arial' , 'b' , 10);
$pdf->Cell('180',5,'Staff Involved:',1,1,'L');
$pdf->Cell('120',5,$mm7,1,0,'L');
$pdf->Cell('60',5,'Date/Time:  '.$data['m7date'],1,1,'R');
$pdf->SetFont('Arial' , '' , 10);
$pdf->MultiCell('182' , 5,$data['m7com'],1,1);
}


if($data['m8com']!=''){
	$pdf->ln(3);
$pdf->SetFont('Arial' , 'b' , 10);
$pdf->Cell('180',5,'Staff Involved:',1,1,'L');
$pdf->Cell('120',5,$mm8,1,0,'L');
$pdf->Cell('60',5,'Date/Time:  '.$data['m8date'],1,1,'R');
$pdf->SetFont('Arial' , '' , 10);
$pdf->MultiCell('182' , 5,$data['m8com'],1,1);
}

if($data['m9com']!=''){
	$pdf->ln(3);
$pdf->SetFont('Arial' , 'b' , 10);
$pdf->Cell('180',5,'Staff Involved:',1,1,'L');
$pdf->Cell('120',5,$mm9,1,0,'L');
$pdf->Cell('60',5,'Date/Time:  '.$data['m9date'],1,1,'R');
$pdf->SetFont('Arial' , '' , 10);
$pdf->MultiCell('182' , 5,$data['m9com'],1,1);
}

if($data['m10com']!=''){
	$pdf->ln(3);
$pdf->SetFont('Arial' , 'b' , 10);
$pdf->Cell('180',5,'Staff Involved:',1,1,'L');
$pdf->Cell('120',5,$mm10,1,0,'L');
$pdf->Cell('60',5,'Date/Time:  '.$data['m10date'],1,1,'R');
$pdf->SetFont('Arial' , '' , 10);
$pdf->MultiCell('182' , 5,$data['m10com'],1,1);
}







if($data['com6']!=''){
	
	$pdf->ln(3);
$pdf->SetFont('Arial' , 'b' , 10);
$pdf->Cell('180',5,'HR Advise:',1,1,'L');
$pdf->Cell('120',5,$fby1,1,0,'L');
$pdf->Cell('60',5,'Date/Time:  '.$data['com6time'],1,1,'R');

$pdf->SetFont('Arial' , '' , 10);
$pdf->MultiCell('180' , 5,$data['com6'],1,1);
}

if($data['chaircom']!=''){
	$pdf->ln(3);
$pdf->SetFont('Arial' , 'b' , 10);
$pdf->Cell('180',5,'Recommendation from Clinical Risk Management Committee:',1,1,'L');
$pdf->Cell('120',5,$cc1,1,0,'L');
$pdf->Cell('60',5,'Date/Time:  '.$data['chairtime'],1,1,'R');

$pdf->SetFont('Arial' , '' , 10);
$pdf->MultiCell('180' , 5,$data['chaircom'],1,1);
}



if($data['com4']!=''){
	$pdf->ln(3);
$pdf->SetFont('Arial' , 'b' , 10);
$pdf->Cell('180',5,'Recommendation from Medical Director:',1,1,'L');
$pdf->Cell('120',5,'Dr. Razeeb Hassan',1,0,'L');
$pdf->Cell('60',5,'Date/Time:  '.$data['com4time'],1,1,'R');

$pdf->SetFont('Arial' , '' , 10);
$pdf->MultiCell('180' , 5,$data['com4'],1,1);
}

if($data['com3']!=''){
	$pdf->ln(3);
$pdf->SetFont('Arial' , 'b' , 10);
$pdf->Cell('120',5,'Recommendation from Chief Nursing Officer:',1,0,'L');
$pdf->Cell('60',5,'Date/Time:  '.$data['com3time'],1,1,'R');
$pdf->Cell('180',5,'Ruzita Mohd Dan',1,1,'L');

$pdf->SetFont('Arial' , '' , 10);
$pdf->MultiCell('180' , 5,$data['com3'],1,1);

}


if($data['com2']!=''){
	$pdf->ln(3);
$pdf->SetFont('Arial' , 'b' , 10);
$pdf->Cell('180',5,'Recommendation from Chief Finance Officer:',1,1,'L');
$pdf->Cell('120',5,'Nuradilah Binti Shuib',1,0,'L');
$pdf->Cell('60',5,'Date/Time:  '.$data['com2time'],1,1,'R');

$pdf->SetFont('Arial' , '' , 10);
$pdf->MultiCell('180' , 5,$data['com2'],1,1);
}

if($data['com1']!=''){
	$pdf->ln(3);
$pdf->SetFont('Arial' , 'b' , 10);
$pdf->Cell('180',5,'Recommendation from Chief Executive Officer:',1,1,'L');
$pdf->Cell('120',5,'Mohd Taufik Bin Ismail',1,0,'L');
$pdf->Cell('60',5,'Date/Time:  '.$data['com1time'],1,1,'R');
$pdf->SetFont('Arial' , '' , 10);
$pdf->MultiCell('180' , 5,$data['com1'],1,1);
}






$pdf->ln(3);

$pdf->ln(10);

$pdf->SetFont('Arial' , 'b' , 10);
$pdf->Cell('182',5,'Computer Generated Report, No Signature Required',0,1,'R');


$pdf->Output();