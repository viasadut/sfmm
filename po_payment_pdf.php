<!DOCTYPE html>
<html lang="en">
<head>
    <title>PMS</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <style>
        html, body{
            font-family: freesans;
            
        }
		
		
		div.relative {
  position: relative;
  width: 400px;
  height: 200px;
  border: 3px solid #73AD21;
} 

div.absolute {
  position: absolute;
  top: 80px;
  right: 0;
  width: 200px;
  height: 100px;
  border: 3px solid #73AD21;
}
    </style>
</head>
<body>

<div class="jumbotron text-center">
    <h1>PMS PDF</h1>
</div>
  
<div class="container">
    <div class="row">
        <div class="col-md-12 col-sm-12">
        <?php
            
require_once 'vendor/autoload.php';
$user=$_SESSION["sess_username"];
require('db1.php');

$encryption=$_REQUEST['ono'];
    $options = 0;
    $ciphering = "AES-256-CTR";
    $decryption_iv = '1234567891011121';
    $decryption_key = "kpj";
    $decryption=openssl_decrypt ($encryption, $ciphering,
    $decryption_key, $options, $decryption_iv);
    //$id = $decryption;
    $id=$_REQUEST['ono'];






$query43 = "SELECT * FROM pms_payment_old where billno= '$id';"; 
$result43 = mysqli_query($con, $query43) or die(mysqli_error());
$row43 = mysqli_fetch_assoc($result43);

$output .='
<div style="height:200px;width:700px;border:1">
<table width="100%">
                
              <tr>
                        <td style="font-family: freesans;" width="5%"><b>S/NO </b>
                        </td>
                        
                        <td style="font-family: freesans; text-align:left" width="25%"><b>Pay To</b>
                        </td>

                        <td style="font-family: freesans; text-align:left" width="40%"><b>Invoice No</b>
                        </td>
                        <td style="font-family: freesans; text-align:left" width="10%"><b>Amount</b>
                        </td>

                        
                    </tr>


                    <tr>
                        <td style="font-family: freesans;" width="5%">1. 
                        </td>
                        
                        <td style="font-family: freesans; text-align:left" width="25%">Payment Details
                        </td>

                        <td style="font-family: freesans; text-align:left" width="40%">'.$row43['creditor_name'].'
                        </td>
                        <td style="font-family: freesans; text-align:left" width="10%">'.$row43['paying_amount'].'
                        </td>

                        
                    </tr>

                    
                    
                    
                </table>

                <br><br><br><br><br><br><br>

                <table width="100%">
                <tr>
                <td style="font-family: freesans;text-align:center" width="20%">'.$row43['user'].'<br><b>Bill By</b>
                </td>
                
                <td style="font-family: freesans; text-align:center" width="20%">'.$row43['time'].'<br><b>Bill Time</b>
                </td>
                <td style="font-family: freesans; text-align:center" width="20%">'.$row43['pmethod'].'<br><b>Paymant Method</b>
                </td>
                ';


           
	
           $output .= '<p align="right" style="font-family: freesans;">Software Generated Report, No Signature Required</p> ';
            $mpdf = new \Mpdf\Mpdf([
                // 'default_font' => 'freesans',
               // 'default_font' => 'freesans',
                'default_font_size' => 9,
                'mode' => 'utf-8',
				'margin_left' => 23,
        'format' => 'B6-P'
            ]);
           /* $mpdf->SetWatermarkImage(
                '1001.jpg',
                5,
                '',
                array(177,43)
            );*/
            $mpdf->showWatermarkImage = true;
            $mpdf->setAutoTopMargin = 'stretch';
            $mpdf->setAutoBottomMargin = 'stretch';
           
			
			$mpdf->SetHTMLHeader('
                <table width="100%">
                    <tr>
                        <td width="15%"><img src="kpj_logo/1.png"></td>
                        <td width="70%" align="center" style="text-align: center; font-weight: bold; font-size:17px; font-family: freesans;">SHEIKH FAZILATUNNESA MUJIB MEMORIAL<br>
                        KPJ SPECIALIZED HOSPITAL <br>
                        C/12, Tetuibari, Kashimpur, Gazipur, Bangladesh. </td>
						
                        <td width="15%" style="text-align: right;"><img src="kpj_logo/2.png"></td>
                    </tr>
                </table>
                <hr>

               
                
                
            <table style="border: 1px solid black" width="100%" >
              <tr>
                        <td style="font-family: freesans;" width="60%"> <b>Patient Name : '.$row43['creditor_name'].'</b>
                        <br><b>MRN &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                        : '.$row43['req_dept'].'</b>
                        <br><b>Age &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                        : '.$row43['page'].'</b>
                        <br><b>Gender &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                        : '.$row43['psex'].'</b><br>
                        
                        <barcode code="'.$row43['billno'].'" type="C128A" class="barcode" /><br>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Billno
                        </td>
                        
                        <td style="font-family: freesans; text-align:left" width="40%"><b>Patient Type &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;: '.$row43['ptype'].'</b>
                        <br><b>Appointment Date 
                        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;: '.date('d/m/Y', strtotime($row43['time'])).'</b>
                        <br><b>Appointment Time No 
                        : '.$row43['date'].'</b>
                        <br><b>Bill Status &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;: '.$row43['bill'].'</b><br>
                        <barcode code="'.$row43['ono'].'" type="C128A" class="barcode" /><br>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;PO No
                        </td>
                        
                    </tr>

                    
                </table>


                
            
                
                               
           
            ');
            $mpdf->SetHTMLFooter('
                <table width="100%">
                    <tr>
                        <td width="25%" align="center" style="font-family: freesans;">Page-{PAGENO}/{nbpg}</td>
                    </tr>
                    <tr>
                        <td width="100%" style="color:red; font-size:10px; font-family: freesans;">Contact Numbers: Ambulance: 01810008074, +880244077029, Appointments: 01810008080, +880244077030 | (SFMMKPJSH/OPD/MR-01)</td>
                    </tr>
                </table>
            ');
            
            $mpdf->WriteHTML($output);
            $fileName = $data['pname'].'-'.$data['pmrn'].'.pdf';
            ob_clean(); 
            $mpdf->Output();
        ?>
        </div>
    </div>
</div>

</body>
</html>

<!-- http://localhost/sfmm/ticket/pdf_p.php?pmrn=123456&eid=3&date=07/20/2018&dname=Dr.%20Razeeb%20Hassan -->