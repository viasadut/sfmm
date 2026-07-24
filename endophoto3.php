<?php
/* Caveat: I'm not a PHP programmer, so this may or may
 * not be the most idiomatic code...
 *
 * FPDF is a free PHP library for creating PDFs:
 * http://www.fpdf.org/
 */

 $pmrn=$_REQUEST['pmrn'];
//$dname=$_REQUEST['dname'];
//$date=$_REQUEST['date'];
$eid=$_REQUEST['eid'];

$db = mysqli_connect('localhost','root','Godiloveu16');
mysqli_select_db($db,'sfmmkpjnew');
$query = mysqli_query($db,"select * from image_gallery where pmrn='$pmrn' and eid='$eid' and sid=1");
$data = mysqli_fetch_array($query);
$one=$data['image'];
$query1 = mysqli_query($db,"select * from image_gallery where pmrn='$pmrn' and eid='$eid' and sid=2");
$data1 = mysqli_fetch_array($query1);
$two=$data1['image'];

$query2 = mysqli_query($db,"select * from image_gallery where pmrn='$pmrn' and eid='$eid' and sid=3");
$data2 = mysqli_fetch_array($query2);
$three=$data2['image'];


$query3 = mysqli_query($db,"select * from image_gallery where pmrn='$pmrn' and eid='$eid' and sid=4");
$data3 = mysqli_fetch_array($query3);
$four=$data3['image'];


$query4 = mysqli_query($db,"select * from image_gallery where pmrn='$pmrn' and eid='$eid' and sid=5");
$data4 = mysqli_fetch_array($query4);
$five=$data4['image'];

$query5 = mysqli_query($db,"select * from image_gallery where pmrn='$pmrn' and eid='$eid' and sid=6");
$data5 = mysqli_fetch_array($query5);
$six=$data5['image'];




$query10 = mysqli_query($db,"select * from endopapp where pmrn='$pmrn' and eid='$eid'");
$data10 = mysqli_fetch_array($query10);
$pname=$data10['pname'];
$dname=$data10['dreffer'];
$adate=$data10['adate'];
$tname=$data10['tname'];

 
require('fpdf/fpdf1.php');





class PDF extends FPDF {
    
	
	const DPI = 62.4;
const MM_IN_INCH = 12;
const A4_WIDTH = 297;
const A4_HEIGHT = 210;
const MAX_HEIGHT = 800;
const MAX_WIDTH = 500;


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
$this->SetY(-8);
$this->SetFont('Arial','B',8);
$this->Cell(0,10,'Page'.$this->PageNo().' /(SFMMKPJ)',0,0,'C');

}
	
	
	/*const DPI = 96;
    const MM_IN_INCH = 10.4;
    const A4_HEIGHT = 100;
    const A4_WIDTH = 210;
    // tweak these values (in pixels)
    const MAX_WIDTH = 800;
    const MAX_HEIGHT = 500;*/
    function pixelsToMM($val) {
        return $val * self::MM_IN_INCH / self::DPI;
    }
    function resizeToFit($imgFilename) {
        list($width, $height) = getimagesize($imgFilename);
        $widthScale = self::MAX_WIDTH / $width;
        $heightScale = self::MAX_HEIGHT / $height;
        $scale = min($widthScale, $heightScale);
        return array(
            round($this->pixelsToMM($scale * $width)),
            round($this->pixelsToMM($scale * $height))
        );
    }
    function centreImage($img) {
        list($width, $height) = $this->resizeToFit($img);
        // you will probably want to swap the width/height
        // around depending on the page's orientation
        $this->Image(
            $img, (self::A4_HEIGHT - $width) / 1.1,
            (self::A4_WIDTH - $height) / 4.2,
            $width,
            $height
        );
    }
	
	   function centreImage1($img) {
        list($width, $height) = $this->resizeToFit($img);
        // you will probably want to swap the width/height
        // around depending on the page's orientation
        $this->Image(
            $img, (self::A4_HEIGHT - $width) / 15,
            (self::A4_WIDTH - $height) / 4.2,
            $width,
            $height
        );
		
		
		
    }
	
	function centreImage2($img) {
        list($width, $height) = $this->resizeToFit($img);
        // you will probably want to swap the width/height
        // around depending on the page's orientation
        $this->Image(
            $img, (self::A4_HEIGHT - $width) / 15,
            (self::A4_WIDTH - $height) / 1.75,
            $width,
            $height
        );
	    }
		
		function centreImage3($img) {
        list($width, $height) = $this->resizeToFit($img);
        // you will probably want to swap the width/height
        // around depending on the page's orientation
        $this->Image(
            $img, (self::A4_HEIGHT - $width) / 1.1,
            (self::A4_WIDTH - $height) / 1.75,
            $width,
            $height
        );
	    }
		
		function centreImage4($img) {
        list($width, $height) = $this->resizeToFit($img);
        // you will probably want to swap the width/height
        // around depending on the page's orientation
        $this->Image(
            $img, (self::A4_HEIGHT - $width) / 15,
            (self::A4_WIDTH - $height) / 1.1,
            $width,
            $height
        );
	    }
		
		function centreImage5($img) {
        list($width, $height) = $this->resizeToFit($img);
        // you will probably want to swap the width/height
        // around depending on the page's orientation
        $this->Image(
            $img, (self::A4_HEIGHT - $width) / 1.1,
            (self::A4_WIDTH - $height) / 1.1,
            $width,
            $height
        );
	    }
}
// usage:


/*$pdf = new myPDF();
$pdf->AliasNbPages();
$pdf->AddPage('P','A4',1);
$pdf->SetFont('Arial' , 'b' , 9);
$pdf->SetLeftMargin('15');*/
//$pdf->headerTable();
//$pdf->viewTable($db);




$pdf = new PDF();
$pdf->AliasNbPages();
$pdf->AddPage('P','A4',1);
//$pdf->SetFont('Arial' , 'b' , 9);
$pdf->SetLeftMargin('15');

//$pdf->AddPage("P");

$pdf->SetFont('Arial' , 'b' , 15);
$pdf->ln(1);
$pdf->SetFont('Arial' , '' , 9);
$pdf->Cell('160',5,'Date:',0,0,'R');
$pdf->Cell('10',5,$adate,0,0,'L');


//$this->SetFont('Arial','B',);

$pdf->ln(6);
$pdf->SetFont('Arial' , 'b' , 10);
$pdf->Cell('25',5,'',0,0,'L');
$pdf->Cell('30',5,'Patient Name:',1,0,'L');
$pdf->Cell('70',5,$pname,1,0,'L');

$pdf->SetFont('Arial' , 'b' , 9);

$pdf->Cell('10',5,'MRN:',1,0,'L');
$pdf->Cell('15',5,$pmrn,1,1,'L');
$pdf->Cell('25',5,'',0,0,'L');
$pdf->Cell('30',5,'Doctor Name:',1,0,'L');
$pdf->Cell('95',5,$dname,1,1,'L');
$pdf->Cell('25',5,'',0,0,'L');
$pdf->Cell('30',5,'Procedure Name:',1,0,'L');
$pdf->Cell('95',5,$tname,1,0,'L');



$pdf->centreImage('uploads/'.$one);
$pdf->centreImage1('uploads/'.$two);
$pdf->centreImage2('uploads/'.$three);
$pdf->centreImage3('uploads/'.$four);
$pdf->centreImage4('uploads/'.$five);
$pdf->centreImage5('uploads/'.$six);


$pdf->Output();
?>
