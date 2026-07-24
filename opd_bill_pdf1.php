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

$id=$_REQUEST['ID'];
$query43 = "SELECT * FROM pappnew where ID= '$id';"; 
$result43 = mysqli_query($con, $query43) or die(mysqli_error());
$row43 = mysqli_fetch_assoc($result43);

$output .='
<div style="height:200px;width:700px;border:1">
<table width="100%">
                
              <tr>
                        <td style="font-family: freesans;font-size:10px;" width="5%"><b>S/NO </b>
                        </td>
                        
                        <td style="font-family: freesans; text-align:left;font-size:10px;" width="25%"><b>Description</b>
                        </td>

                        <td style="font-family: freesans; text-align:left;font-size:10px;" width="60%"><b>Doctor Name</b>
                        </td>
                        <td style="font-family: freesans; text-align:left;font-size:10px;" width="10%"><b>Amount</b>
                        </td>

                        
                    </tr>


                    <tr>
                        <td style="font-family: freesans;" width="5%">1. 
                        </td>
                        
                        <td style="font-family: freesans; text-align:left;font-size:10px;" width="25%">OPD Consultation
                        </td>

                        <td style="font-family: freesans; text-align:left;font-size:10px;" width="60%">'.$row43['dname'].'
                        </td>
                        <td style="font-family: freesans; text-align:center;font-size:10px;" width="10%">'.$row43['payment'].'
                        </td>

                        
                    </tr>

                    
                    
                    
                </table>

                <br><br><br><br><br><br><br>

                <table width="100%">
                <tr>
                <td style="font-family: freesans;text-align:center;font-size:10px;" width="10%">'.$row43['billby'].'<br><b>Bill By</b>
                </td>
                
                <td style="font-family: freesans; text-align:center;font-size:10px;" width="30%">'.$row43['billtime'].'<br><b>Bill Time</b>
                </td>
                <td style="font-family: freesans; text-align:center;font-size:10px;" width="20%">'.$row43['pmethod'].'<br><b>Paymant Method</b>
                </td>
                ';


           if($row43['payment']=='800'){
$output .='
                <td style="font-family: freesans; text-align:center;font-size:10px;" width="40%">Eight Hundred Taka Only<br><b>Amount Received</b>
                </td>
                
                </tr>
                </table>
</div>
';
           }

           else if($row43['payment']=='700'){
            $output .='
                            <td style="font-family: freesans; text-align:center;font-size:10px;" width="40%">Seven Hundred Taka Only<br><b>Amount Received</b>
                            </td>

                            </tr>
                            </table>
            </div>
            ';
                       }
           
           
                
           
	
           $output .= '<p align="right" style="font-family: freesans;font-size:10px;">Software Generated Report, No Signature Required</p> ';
            $mpdf = new \Mpdf\Mpdf([
                // 'default_font' => 'freesans',
               // 'default_font' => 'freesans',
                'default_font_size' => 9,
                'mode' => 'utf-8',
				'margin_left' =>10,
        'format' => 'B7-L'
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
                        <td width="15%"><img src="kpj_logo/1.png" width="30" height="30"></td>
                        <td width="70%" align="center" style="text-align: center; font-weight: bold; font-size:10px; font-family: freesans;">SHEIKH FAZILATUNNESA MUJIB MEMORIAL<br>
                        KPJ SPECIALIZED HOSPITAL <br>
                        C/12, Tetuibari, Kashimpur, Gazipur, Bangladesh. </td>
						
                        <td width="15%" style="text-align: right;"><img src="kpj_logo/2.png" width="30" height="30"></td>
                    </tr>
                </table>
                

               <div style="height:100px; border:1">
                
                
            <table  width="100%" >
              <tr>
                        <td style="font-family: freesans;font-size:10px;" width="60%"> <b>Patient Name : '.$row43['pname'].'</b>
                        <br><b>MRN &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                        : '.$row43['pmrn'].'</b>
                        <br><b>Age &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                        : '.$row43['page'].'</b>
                        <br><b>Gender &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                        : '.$row43['psex'].'</b><br>
                        
                        
                        </td>
                        
                        <td style="font-family: freesans; text-align:left;font-size:10px;" width="40%"><b>Patient Type &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;: '.$row43['ptype'].'</b>
                        <br><b>Appointment Date 
                        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;: '.date('d/m/Y', strtotime($row43['adate1'])).'</b>
                        <br><b>Appointment Time No 
                        : '.$row43['aslot'].'</b>
                        <br><b>Bill Status &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;: '.$row43['bill'].'</b><br>
                        
                        </td>
                        
                    </tr>
                    </table>
                    <table width="100%">
                    <tr>
                    <td style="font-family: freesans; text-align:left;font-size:10px;" width="10%"><barcode code="'.$row43['pmrn'].'" type="C128A" class="barcode" /><br>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Patient MRN</td>
                    <td style="font-family: freesans; text-align:left;font-size:10px;" width="80%"></td>
                    <td style="font-family: freesans; text-align:left;font-size:10px;" width="10%"><barcode code="'.$row43['ID'].'" type="C128A" class="barcode" /><br>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Prescription ID</td>


                    </tr>
                </table>
</div>

                
            
                
                               
           
            ');
            $mpdf->SetHTMLFooter('
                <table width="100%">
                    <tr>
                        <td width="100%" style="color:red; font-size:10px; font-family: freesans;font-size:10px;">Contact Numbers: Ambulance: 01810008074, +880244077029, Appointments: 01810008080, +880244077030 | (SFMMKPJSH/OPD/MR-01)</td>
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