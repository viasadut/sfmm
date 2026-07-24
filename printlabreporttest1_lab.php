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
            require('db1.php');
            
            require_once 'vendor/autoload.php';
            $pmrn=$_REQUEST["pmrn"];
$eid=$_REQUEST["eid"];
//$id=$_REQUEST["id"];

$db = mysqli_connect('localhost','root','Godiloveu16');
mysqli_select_db($db,'sfmmkpjnew');
//$db = new PDO('mysql:host=localhost;dbname=sfmmkpj','root','');

$query7 = mysqli_query($db,"Select * from inpatient where pmrn='$pmrn' and eid='$eid';");

$data7 = mysqli_fetch_array($query7);

$pname=$data7['pname'];
$page=$data7['age'];
$psex=$data7['gender'];
$eeid=$data7['emerid'];

            
            $output = "";

           
			
			
			
			
	
                $output .='<table width="100%">
                                <tr>
                                    <td style="font-family: freesans; font-size: 18px; text-align:center"><b>LAB INVESTIGATION RECORD (INPATIENT)</b></td>
                                </tr>
                            </table>
                            <table>';
                $query1 = mysqli_query($con,"Select * from einves where pmrn='$pmrn' and eid='$eeid' and type='lab' and status='Received' order by odate1 desc");
                $count=1;
                while ($data11 = mysqli_fetch_array($query1)) {
                    $output .='
                            <tr>
                                 <td style="font-family: freesans; font-size: 15px;"><b>'.$count.'. '.$data11['infusion'].' ('.$data11['barcode'].' / '.$data11['ndate'].' )</b>
								
								
								</td>
                                
                            </tr>';
							
							
							if($data11['result']==''){
								$output .='
							<tr>
							<td style="font-family:freesans;font-size: 15px; text-align:left;">Report Pending<br></td>
							
                            </tr>
							';}
					
							else if($data11['result']!=''){
								$output .='
							<tr>
							<td style="font-family:freesans;font-size: 15px; text-align:left;">'.$data11['result1'].'<br></td>
                            </tr>
                 ';}
                    $count++;
                }
                $output .= '</table>';
				
				
				
				 $output .='
                            <table width="100%">';
                $query11 = mysqli_query($con,"Select * from iinves where pmrn='$pmrn' and eid='$eid' and type='lab' and status='RECEIVED'order by ndate desc");
                $count=1;
                while ($data111 = mysqli_fetch_array($query11)) {
                    $output .='
                            <tr>
                                <td style="font-family: freesans; font-size: 15px;"><b>'.$count.'. '.$data111['infusion'].' ('.$data111['barcode'].' / '.$data111['ndate'].' )</b>
								
								
								</td>
                                
                            
                            
                            
                                
                            </tr>';
							
							
							if($data111['result']==''){
								$output .='
							<tr>
							<td style="font-family:freesans;font-size: 15px; text-align:left;">Report Pending<br></td>
							
                            </tr>
							';}
					
							else if($data111['result']!=''){
								$output .='
							<tr>
							<td style="font-family:freesans;font-size: 15px; text-align:left;">'.$data111['result1'].'<br></td>
                            </tr>
                 ';}
                    
                    $count++;
                }
                $output .= '</table>';
				
				
				
				
			  






				
			

            $output .= '<p align="right" style="font-family: freesans;"><b>Software Generated Report, No Signature Required</b></p> ';
            $mpdf = new \Mpdf\Mpdf([
                // 'default_font' => 'freesans',
               // 'default_font' => 'freesans',
                'default_font_size' => 9,
                'mode' => 'utf-8',
				'margin_left' => 23
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
                        <td width="15%" style="font-family: freesans;"><img src="2.png"></td>
                        <td width="70%" align="center" style="text-align: center; font-weight: bold; font-size:17px;font-family: freesans;">
                        KPJ SPECIALIZED HOSPITAL <br>
                        C/12, Tetuibari, Kashimpur, Gazipur, Bangladesh. </td>
						
                        
                    </tr>
                </table>
                <hr>

                
			
			
                <table style="border: 1px solid black" width="100%">
                    <tr>
                        <td style="font-family: freesans; font-size:15px;"> <b>Patient Name :</b> '.$data7['pname'].'</td>
                        <td style="font-family: freesans; font-size:15px;"><b>MRN :</b>'.$data7['pmrn'].'</td>
                        <td style="font-family: freesans; font-size:15px;"><b>GENDER :</b>'.$data7['gender'].'</td>
                        <td style="font-family: freesans; font-size:15px;"><b>AGE :</b>'.$data7['age'].'</td>
                    </tr>
                </table>
            
                <table style="border: 1px solid black" width="100%">
                    <tr>
                        <td style="font-family: freesans; font-size:15px;"><b>Admit Under :</b> '.$data7['adoc'].'</td>
                        
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
            
			$output = UTF8_decode($output);
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