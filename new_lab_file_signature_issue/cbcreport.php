<?php

session_start();
$user=$_SESSION["sess_username"];

//require('force_justify.php');
//require('fpdf/fpdf.php');

$db1 = new PDO('mysql:host=localhost;dbname=sfmmkpjnew','root','Godiloveu16');
//require('force_justify.php');
require('force_justify1.php');
$pmrn=$_REQUEST['pmrn'];
$id='I'.$_REQUEST['id'];
$id1=$_REQUEST['id'];
//$date=$_REQUEST['date'];
$eid=$_REQUEST['eid'];

$db = mysqli_connect('localhost','root','Godiloveu16');
mysqli_select_db($db,'sfmmkpjnew');
$query = mysqli_query($db,"select * from cbctbl where pmrn='$pmrn' and eid='$eid' and sno='$id'");
$data = mysqli_fetch_array($query);


//$dname=$data['dname'];
$query2 = mysqli_query($db,"select * from inpatient where pmrn='$pmrn' and eid='$eid'");
$data2 = mysqli_fetch_array($query2);

$query3 = mysqli_query($db,"select * from iinves where pmrn='$pmrn' and eid='$eid' and id='$id1'");
$data3 = mysqli_fetch_array($query3);
$barcode=$data3['barcode1'];
$sdate=date('d/m/Y H:i:s',strtotime($data3["rtime"]));


$tt1=$data3['code'];


$queryc = $db1->query("SELECT * FROM radio where code= '$tt1'"); 
	 
$resultc = $queryc->Fetch(PDO::FETCH_OBJ);

//$db = new PDO('mysql:host=localhost;dbname=sfmmkpj','root','');



$pdf=new PDF_Code128();
$pdf->AliasNbPages();
$pdf->AddPage('P','A4',1);
$pdf->SetFont('Arial' , 'b' , 9);
$pdf->SetLeftMargin('17');

//$pdf->headerTable();
//$pdf->viewTable($db);




$pdf->SetXY(150,745);
$pdf->Code128(18,73,$barcode,40,10);
$pdf->SetXY(50,35);




$pdf->ln(1);
$pdf->SetFont('Times', 'bu',14);
$pdf->Cell('182',6,$data['iname'].' Report',0,1,'C');
//$pdf->Ln(2);

$pdf->SetFont('Times', 'b',14);
$pdf->Cell('30',5,'_________________________________________________________________________',0,1,'L');	

$pdf->Ln(4);
$pdf->SetFont('Times', 'b',12);

$pdf->Cell('60',5,'Referring Consultant Name: '. $data3['dname'],0,1,'L');

$pdf->Ln(2);
$pdf->SetFont('Times', 'b',10);
$pdf->Cell('110',5,'Patient Name: '. $data3['pname'],0,0,'L');
$pdf->Cell('50',5,'MRN: '.$data3['pmrn'],0,1,'L');

$pdf->Cell('110',5,'Gender: '.$data3['pgender'],0,0,'L');
$pdf->Cell('50',5,'Age: '.$data3['page'],0,1,'L');
$pdf->Cell('110',5,'Sample Date: '.$sdate,0,0,'L');	
$pdf->Cell('50',5,'Result Time: '.$data3['resulttime'],0,1,'L');

$pdf->Cell('110',5,'',0,0,'L');
$pdf->Cell('50',5,'Result Status: '. $data3['resultstatus'],0,1,'L');


$pdf->ln(6);
$pdf->SetFont('Times', '',14);
$pdf->Cell('110',5,'SNO-'.$barcode,0,0,'L');		

$pdf->SetFont('Times', 'b',14);

$pdf->ln(1);



$pdf->Cell('30',5,'_________________________________________________________________________',0,1,'L');	
//$pdf->ln(3);


//$pdf->SetFont('Arial' , 'b' , 10);
//$pdf->Cell('40',5,'Referral From:',1,0,'L');
//$pdf->Cell('141', 5,$data['dreffer'],1,1,'L');

//$pdf->ln(3);
$pdf->ln(1.5);

$pdf->SetFont('Arial' , 'b' , 11);


$pdf->Cell('80',2,'Particulars',0,0,'L');
$pdf->Cell('30',2,'Value',0,0,'C');
$pdf->Cell('31',2,'Unit',0,0,'C');
$pdf->Cell('40',2,'Reference Range',0,1,'C');
$pdf->SetFont('Arial' , 'b' , 10);
$pdf->Cell('30',2,'____________________________________________________________________________________________',0,1,'L');	

$pdf->ln(2);
$pdf->Cell('182',5,'HAEMOGLOBIN',0,1,'L');
if($data['haemo']>=13 and $data['haemo']<=18)
{	
	//$pdf->ln(1);
	$pdf->SetFont('Arial' , '' , 10);
//$pdf->SetTextColor(000,0,0);
$pdf->Cell('80',5,'Haemoglobin(Hb)',0,'L');
$pdf->Cell('30',5,$data['haemo'],0,0,'C');
$pdf->Cell('31',5,'g/dL',0,0,'C');
$pdf->Cell('40',5,'13.0-18.0',0,1,'C');
}

else 
{	
//$pdf->SetTextColor(194,8,8);
//$pdf->ln(1);
	$pdf->SetFont('Arial' , 'b' , 10);
$pdf->Cell('80',5,'Haemoglobin(Hb)',0,'L');
$pdf->Cell('30',5,$data['haemo'],0,0,'C');
$pdf->Cell('31',5,'g/dL',0,0,'C');
$pdf->Cell('40',5,'13.0-18.0',0,1,'C');

}

$pdf->SetFont('Arial' , 'b' , 10);
$pdf->ln(1.5);
$pdf->Cell('182',5,'RBC COUNT',0,1,'L');

 if($data['red']>=4.5 and $data['red']<=5.9)

{	
//$pdf->SetTextColor(000,0,0);
$pdf->SetFont('Arial' , '' , 10);
$pdf->Cell('80',5,'Total RBC Count',0,0,'L');
$pdf->Cell('30',5,$data['red'],0,0,'C');
$pdf->Cell('31',5,'10^12/L',0,0,'C');
$pdf->Cell('40',5,'4.5-5.9',0,1,'C');
}
else 
{	
//$pdf->SetTextColor(194,8,8);
$pdf->SetFont('Arial' , 'b' , 10);
$pdf->Cell('80',5,'Total RBC Count',0,0,'L');
$pdf->Cell('30',5,$data['red'],0,0,'C');
$pdf->Cell('31',5,'10^12/L',0,0,'C');
$pdf->Cell('40',5,'4.5-5.9',0,1,'C');
}
$pdf->SetFont('Arial' , 'b' , 10);
$pdf->ln(1.5);
$pdf->Cell('182',5,'RBC INDICES',0,1,'L');


if($data['pcv']>=41 and $data['pcv']<=53)
{
//$pdf->SetTextColor(000,0,0);
$pdf->SetFont('Arial' , '' , 10);
$pdf->Cell('80',5,'Haematocrit (PCV)',0,0,'L');
$pdf->Cell('30',5,$data['pcv'],0,0,'C');
$pdf->Cell('31',5,'%',0,0,'C');
$pdf->Cell('40',5,'41-53',0,1,'C');
}
else 
{
//$pdf->SetTextColor(194,8,8);
$pdf->SetFont('Arial' , 'b' , 10);
$pdf->Cell('80',5,'Haematocrit (PCV)',0,0,'L');
$pdf->Cell('30',5,$data['pcv'],0,0,'C');
$pdf->Cell('31',5,'%',0,0,'C');
$pdf->Cell('40',5,'41-53',0,1,'C');
}
if($data['mcv']>=76 and $data['mcv']<=103)
{
//$pdf->SetTextColor(000,0,0);
$pdf->SetFont('Arial' , '' , 10);
$pdf->Cell('80',5,'MCV',0,0,'L');
$pdf->Cell('30',5,$data['mcv'],0,0,'C');
$pdf->Cell('31',5,'fL',0,0,'C');
$pdf->Cell('40',5,'76-103',0,1,'C');
}

else 
	
{
//$pdf->SetTextColor(194,8,8);
$pdf->SetFont('Arial' , 'b' , 10);
$pdf->Cell('80',5,'MCV',0,0,'L');
$pdf->Cell('30',5,$data['mcv'],0,0,'C');
$pdf->Cell('31',5,'fL',0,0,'C');
$pdf->Cell('40',5,'76-103',0,1,'C');
}

if($data['mch']>=26 and $data['mch']<=34)
{
//$pdf->SetTextColor(000,0,0);
$pdf->SetFont('Arial' , '' , 10);
$pdf->Cell('80',5,'MCH',0,0,'L');
$pdf->Cell('30',5,$data['mch'],0,0,'C');
$pdf->Cell('31',5,'pg',0,0,'C');
$pdf->Cell('40',5,'26-34',0,1,'C');
}
else
{
//$pdf->SetTextColor(194,8,8);
$pdf->SetFont('Arial' , 'b' , 10);
$pdf->Cell('80',5,'MCH',0,0,'L');
$pdf->Cell('30',5,$data['mch'],0,0,'C');
$pdf->Cell('31',5,'pg',0,0,'C');
$pdf->Cell('40',5,'26-34',0,1,'C');
}


if($data['mchc']>=31 and $data['mchc']<=36)

{
	//$pdf->SetTextColor(000,0,0);
	$pdf->SetFont('Arial' , '' , 10);
$pdf->Cell('80',5,'MCHC',0,0,'L');
$pdf->Cell('30',5,$data['mchc'],0,0,'C');
$pdf->Cell('31',5,'g/dL',0,0,'C');
$pdf->Cell('40',5,'31-36',0,1,'C');
}

else 
{
	//$pdf->SetTextColor(194,8,8);
	$pdf->SetFont('Arial' , 'b' , 10);
	$pdf->Cell('80',5,'MCHC',0,0,'L');
	$pdf->Cell('30',5,$data['mchc'],0,0,'C');
	$pdf->Cell('31',5,'g/dL',0,0,'C');
	$pdf->Cell('40',5,'31-36',0,1,'C');}


if($data['rdw']>=8 and $data['rdw']<=14.6)
{
//$pdf->SetTextColor(000,0,0);	
$pdf->SetFont('Arial' , '' , 10);
$pdf->Cell('80',5,'RDW',0,0,'L');
$pdf->Cell('30',5,$data['rdw'],0,0,'C');
$pdf->Cell('31',5,'%',0,0,'C');
$pdf->Cell('40',5,'8.0-14.6',0,1,'C');
}

else 
{
//$pdf->SetTextColor(194,8,8);	
$pdf->SetFont('Arial' , 'b' , 10);
$pdf->Cell('80',5,'RDW',0,0,'L');
$pdf->Cell('30',5,$data['rdw'],0,0,'C');
$pdf->Cell('31',5,'%',0,0,'C');
$pdf->Cell('40',5,'8.0-14.6',0,1,'C');}

$pdf->SetFont('Arial' , 'b' , 10);
$pdf->ln(1.5);
$pdf->Cell('182',5,'WBC COUNT',0,1,'L');


if($data['wbc']>=4.3 and $data['wbc']<=10.5)
		
		{
//$pdf->SetTextColor(000,0,0);	
$pdf->SetFont('Arial' , '' , 10);			
$pdf->Cell('80',5,'Total WBC Count',0,0,'L');
$pdf->Cell('30',5,$data['wbc'],0,0,'C');
$pdf->Cell('31',5,'10^3/uL',0,0,'C');
$pdf->Cell('40',5,'4.3-10.5',0,1,'C');
		}
	else 	
		
		{
//$pdf->SetTextColor(194,8,8);			
$pdf->SetFont('Arial' , 'b' , 10);			
$pdf->Cell('80',5,'Total WBC Count',0,0,'L');
$pdf->Cell('30',5,$data['wbc'],0,0,'C');
$pdf->Cell('31',5,'10^3/uL',0,0,'C');
$pdf->Cell('40',5,'4.3-10.5',0,1,'C');
		}
	


		$pdf->SetFont('Arial' , 'b' , 10);
		$pdf->ln(1.5);
		$pdf->Cell('182',5,'DIFFERENTIAL WBC COUNT',0,1,'L');
		
		if($data['neu']!='0.00' and $data['neu']>=40 and $data['neu']<=75)
		{
		//$pdf->SetTextColor(000,0,0);	
		$pdf->SetFont('Arial' , '' , 10);
		$pdf->Cell('80',5,'Neutrophil',0,0,'L');
		$pdf->Cell('30',5,$data['neu'],0,0,'C');
		$pdf->Cell('31',5,'%',0,0,'C');
		$pdf->Cell('40',5,'40-75',0,1,'C');
		}
		
		//else if($data['neu']!='0.00')
		else 
		{
		//$pdf->SetTextColor(194,8,8);
		$pdf->SetFont('Arial' , 'b' , 10);
		$pdf->Cell('80',5,'Neutrophil',0,0,'L');
		$pdf->Cell('30',5,$data['neu'],0,0,'C');
		$pdf->Cell('31',5,'%',0,0,'C');
		$pdf->Cell('40',5,'40-75',0,1,'C');
		}
		
		
		if($data['lym']!='0.00' and $data['lym']>=20 and $data['lym']<=45)
			
			
			{
		//$pdf->SetTextColor(000,0,0);	
		$pdf->SetFont('Arial' , '' , 10);
		$pdf->Cell('80',5,'Lymphocyte',0,0,'L');
		$pdf->Cell('30',5,$data['lym'],0,0,'C');
		$pdf->Cell('31',5,'%',0,0,'C');
		$pdf->Cell('40',5,'20-45',0,1,'C');
			}
			
		//else if($data['lym']!='0.00')
		else
			{
		//$pdf->SetTextColor(194,8,8);	
		$pdf->SetFont('Arial' , 'b' , 10);
		$pdf->Cell('80',5,'Lymphocyte',0,0,'L');
		$pdf->Cell('30',5,$data['lym'],0,0,'C');
		$pdf->Cell('31',5,'%',0,0,'C');
		$pdf->Cell('40',5,'20-45',0,1,'C');
			}
			
			
		
		
		if($data['mono']!='0.00' and $data['mono']>=1 and $data['mono']<=11)
			
			{
		
		//$pdf->SetTextColor(000,0,0);
		$pdf->SetFont('Arial' , '' , 10);
		$pdf->Cell('80',5,'Monocyte',0,0,'L');
		$pdf->Cell('30',5,$data['mono'],0,0,'C');
		$pdf->Cell('31',5,'%',0,0,'C');
		$pdf->Cell('40',5,'1-11',0,1,'C');
			}
		//else if($data['mono']!='0.00')	
		else 
		{
		
		//$pdf->SetTextColor(194,8,8);
		$pdf->SetFont('Arial' , 'b' , 10);
		$pdf->Cell('80',5,'Monocyte',0,0,'L');
		$pdf->Cell('30',5,$data['mono'],0,0,'C');
		$pdf->Cell('31',5,'%',0,0,'C');
		$pdf->Cell('40',5,'1-11',0,1,'C');
			}	
		
			//if($data['eos']!='0.00' and $data['eos']>=0 and $data['eos']<=6)
			if($data['eos']>=0 and $data['eos']<=6)
		{	
			//$pdf->SetTextColor(000,0,0);
			$pdf->SetFont('Arial' , '' , 10);
		$pdf->Cell('80',5,'Eosinophil',0,0,'L');
		$pdf->Cell('30',5,$data['eos'],0,0,'C');
		$pdf->Cell('31',5,'%',0,0,'C');
		$pdf->Cell('40',5,'0-6.0',0,1,'C');
		}
		
		//else if($data['eos']!='0.00') 
		else
		{	
			//$pdf->SetTextColor(194,8,8);
			$pdf->SetFont('Arial' , 'b' , 10);
			$pdf->Cell('80',5,'Eosinophil',0,0,'L');
			$pdf->Cell('30',5,$data['eos'],0,0,'C');
			$pdf->Cell('31',5,'%',0,0,'C');
			$pdf->Cell('40',5,'0-6.0',0,1,'C');
		}
		if($data['bas']>=0 and $data['bas']<=2)
		
		{	
			//$pdf->SetTextColor(000,0,0);
			$pdf->SetFont('Arial' , '' , 10);
		$pdf->Cell('80',5,'Basophil',0,0,'L');
		$pdf->Cell('30',5,$data['bas'],0,0,'C');
		$pdf->Cell('31',5,'%',0,0,'C');
		$pdf->Cell('40',5,'0-2',0,1,'C');
		
		}
		//else if($data['bas']!='0.00')
		else
		{	
			//$pdf->SetTextColor(194,8,8);
			$pdf->SetFont('Arial' , 'b' , 10);
			$pdf->Cell('80',5,'Basophil',0,0,'L');
			$pdf->Cell('30',5,$data['bas'],0,0,'C');
			$pdf->Cell('31',5,'%',0,0,'C');
			$pdf->Cell('40',5,'0-2',0,1,'C');
		
		}

		if($data['promyclocyte']!='0.00')

{
	//$pdf->SetTextColor(000,0,0);
	$pdf->SetFont('Arial' , '' , 10);
$pdf->Cell('80',5,'Pro-Myelocyte',0,0,'L');
$pdf->Cell('30',5,$data['promyclocyte'],0,0,'C');
$pdf->Cell('31',5,'%',0,0,'C');
$pdf->Cell('40',5,'',0,1,'C');
}

if($data['metamyclocyte']!='0.00')

{
	//$pdf->SetTextColor(000,0,0);
	$pdf->SetFont('Arial' , '' , 10);
$pdf->Cell('80',5,'Metamyelocyte',0,0,'L');
$pdf->Cell('30',5,$data['metamyclocyte'],0,0,'C');
$pdf->Cell('31',5,'%',0,0,'C');
$pdf->Cell('40',5,'',0,1,'C');
}

if($data['lymphoblast']!='0.00')

{
	//$pdf->SetTextColor(000,0,0);
	$pdf->SetFont('Arial' , '' , 10);
$pdf->Cell('80',5,'Lymphoblast',0,0,'L');
$pdf->Cell('30',5,$data['lymphoblast'],0,0,'C');
$pdf->Cell('31',5,'%',0,0,'C');
$pdf->Cell('40',5,'',0,1,'C');
}

if($data['myoblast']!='0.00')

{
	//$pdf->SetTextColor(000,0,0);
	$pdf->SetFont('Arial' , '' , 10);
$pdf->Cell('80',5,'Myeloblast',0,0,'L');
$pdf->Cell('30',5,$data['myoblast'],0,0,'C');
$pdf->Cell('31',5,'%',0,0,'C');
$pdf->Cell('40',5,'',0,1,'C');
}

if($data['nrbc']!='0.00')

{
	//$pdf->SetTextColor(000,0,0);
	$pdf->SetFont('Arial' , '' , 10);
$pdf->Cell('80',5,'NRBC',0,0,'L');
$pdf->Cell('30',5,$data['nrbc'],0,0,'C');
$pdf->Cell('31',5,'10^3/uL',0,0,'C');
$pdf->Cell('40',5,'',0,1,'C');
}

if($data['a_cell']!='0.00')

{
	//$pdf->SetTextColor(000,0,0);
	$pdf->SetFont('Arial' , '' , 10);
$pdf->Cell('80',5,'Atypical, Cells',0,0,'L');
$pdf->Cell('30',5,$data['a_cell'],0,0,'C');
$pdf->Cell('31',5,'%',0,0,'C');
$pdf->Cell('40',5,'',0,1,'C');
}

		
		
		$pdf->SetFont('Arial' , 'b' , 10);
		$pdf->ln(1.5);
		$pdf->Cell('182',5,'PLATELET COUNT',0,1,'L');
if($data['pla']>=150 and $data['pla']<=450)
{
//$pdf->SetTextColor(000,0,0);	
$pdf->SetFont('Arial' , '' , 10);
$pdf->Cell('80',5,'Platelet Count',0,0,'L');
$pdf->Cell('30',5,$data['pla'],0,0,'C');
$pdf->Cell('31',5,'10^3/uL',0,0,'C');
$pdf->Cell('40',5,'150-450',0,1,'C');
}

else 
	
{
//$pdf->SetTextColor(194,8,8);	
$pdf->SetFont('Arial' , 'b' , 10);
$pdf->Cell('80',5,'Platelet Count',0,0,'L');
$pdf->Cell('30',5,$data['pla'],0,0,'C');
$pdf->Cell('31',5,'10^3/uL',0,0,'C');
$pdf->Cell('40',5,'150-450',0,1,'C');
}


if($data['mpv']>=5.8 and $data['mpv']<=12)
	
{

//$pdf->SetTextColor(000,0,0);	
$pdf->SetFont('Arial' , '' , 10);
$pdf->Cell('80',5,'MPV',0,0,'L');
$pdf->Cell('30',5,$data['mpv'],0,0,'C');
$pdf->Cell('31',5,'fL',0,0,'C');
$pdf->Cell('40',5,'5.8-12.0',0,1,'C');
}
else 	
{
//$pdf->SetTextColor(194,8,8);	
$pdf->SetFont('Arial' , 'b' , 10);
$pdf->Cell('80',5,'MPV',0,0,'L');
$pdf->Cell('30',5,$data['mpv'],0,0,'C');
$pdf->Cell('31',5,'fL',0,0,'C');
$pdf->Cell('40',5,'5.8-12.0',0,1,'C');
}	


	if($data['esr']!='' and $data['esr']>0 and $data['esr']<20)
	
	{
		$pdf->ln(1.5);
		//$pdf->SetTextColor(000,0,0);
		$pdf->SetFont('Arial' , '' , 10);
$pdf->Cell('80',5,'ESR',0,0,'L');
$pdf->Cell('30',5,$data['esr'],0,0,'C');
$pdf->Cell('31',5,'mm/h',0,0,'C');
$pdf->Cell('40',5,'0-20',0,1,'C');
	}

else if($data['esr']!='')
	{$pdf->ln(1.5);
		//$pdf->SetTextColor(194,8,8);
		//$pdf->SetTextColor(000,0,0);
		$pdf->SetFont('Arial' , 'b' , 10);
$pdf->Cell('80',5,'ESR',0,0,'L');
$pdf->Cell('30',5,$data['esr'],0,0,'C');
$pdf->Cell('31',5,'mm/h',0,0,'C');
$pdf->Cell('40',5,'0-20',0,1,'C');
	}



	



	


	


	
	if($data['remarks']!='')
	
	{
		$pdf->ln(1.5);
		$pdf->SetTextColor(000,0,0);
$pdf->MultiCell('180',5,'Remarks:'.$data['remarks']);
	}
	$pdf->SetFont('Arial' , '' , 10);

if($data['esr']!='' and $data['promyclocyte']!='0.00' and $data['metamyclocyte']!='0.00' and $data['lymphoblast']!='0.00' and $data['myoblast']!='0.00' and $data['nrbc']!='0.00' and $data['a_cell']!='0.00')
{	$pdf->Ln(5);

}

else if($data['esr']=='' and $data['promyclocyte']=='0.00' and $data['metamyclocyte']=='0.00' and $data['lymphoblast']=='0.00' and $data['myoblast']=='0.00' and $data['nrbc']=='0.00' and $data['a_cell']=='0.00')
{	$pdf->Ln(38);   // legacy spacer, trimmed so the approval footer fits on this page

}

else if($data['esr']!='' and $data['promyclocyte']=='0.00' and $data['metamyclocyte']=='0.00' and $data['lymphoblast']=='0.00' and $data['myoblast']=='0.00' and $data['nrbc']=='0.00' and $data['a_cell']=='0.00')
{	$pdf->Ln(28);   // legacy spacer, trimmed so the approval footer fits on this page

}

else 
{	$pdf->Ln(5);

}


	$pdf->SetTextColor(000,0,0);







// -------------------- Approval-flow footer (auto-inserted) --------------------
require_once('lab_report_footer.php');
lab_render_approval_footer($pdf, $db1, 'HAEMATOLOGY', (isset($data3['resultby'])?$data3['resultby']:''), (isset($data3['checked_by'])?$data3['checked_by']:''), (isset($data3['conby'])?$data3['conby']:''));
$pdf->Ln(10);

$pdf->Output();