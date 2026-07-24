<?php

require('code128.php');
//require('force_justify1.php');





//$pdf1->AddPage();
$pdf=new PDF_Code128();



//$pdf->AliasNbPages();
$pdf->AddPage('L','cbar1');
//$pdf1->AddPage('P','A4',0);
$pdf->SetFont('Arial' , 'b' , 10);
$pdf->SetLeftMargin('17');
//$pdf->headerTable();
//$pdf->viewTable($db);

//$pdf1->AddPage();
//$pdf1->SetFont('Arial','',10);

$pmrn=$_REQUEST['pmrn'];
$bar=$_REQUEST['bar'];
$pname=$_REQUEST['pname'];
$rinfusion=$_REQUEST['rinfusion'];
$dd=date('d/m/Y');
//$pdf->ln(10);
$code=$bar;
//$code='123456789';




//$pdf->Write(1.2,$sid);
//$pdf->SetXY(10,1.6);




$pdf->SetXY(1,1);

//$pdf->SetXY(1,3.7);
//$pdf->Write(2,$cname);

$pdf->SetFont('Arial' , 'b' , 9);
$pdf->Cell('5',2,$bar,0,0,'L');

$pdf->SetXY(23,1);
$pdf->SetFont('Arial' , 'b' , 5);
$pdf->Cell('5',2,'DT-'.$dd,0,1,'L');
$pdf->SetXY(1,3.8);
$pdf->SetFont('Arial' , 'b' , 5);
$pdf->Cell('5',1,$pname.'('.'MRN-'.$pmrn.')',0,1,'L');

$pdf->SetXY(1,6.3);
//$pdf->SetFont('Arial' , 'b' , 5);

//$pdf->Cell('30',1,'RCV. DT-'.$dd,0,1,'L');

//$pdf->SetXY(1,6.51);
$pdf->SetFont('Arial' , 'b' , 5);
$pdf->Cell('30',1,$rinfusion,0,0,'L');

//$pdf->Cell('30',1,$bar,0,1,'C');

//$pdf->ln(5);
$pdf->SetXY(1,7.5);
//$pdf->Cell('2',9.1,'MRN-'.$pmrn,0,0,'L');
$pdf->Code128(1,9,$code,35,15);

//$pdf->SetXY(50,195);





$pdf->Output();

?>