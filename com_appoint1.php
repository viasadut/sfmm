<!DOCTYPE html>
<html lang="en">
<head>
    <title>PMS</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <style>
        html, body, div {
            font-family: bangla;
            font-family: serif; font-size: 10pt;
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
            $cname=$_REQUEST['cname'];
$mname=$_REQUEST['mname'];
$date=$_REQUEST['date'];
$id=$_REQUEST['id'];
require('db1.php');

$db = mysqli_connect('localhost','root','Godiloveu16');
mysqli_select_db($db,'sfmmkpjnew');
$query = mysqli_query($db,"select * from ccomm where id='$id'");
$data = mysqli_fetch_array($query);
$cname=$data['cname'];
$mname=$data['mname'];
$mrole=$data['mrole'];
$sdate=$data['sdate'];
$edate=$data['edate'];

$sno=date('Y', strtotime($sdate));
$b = date( 'j-F-Y', strtotime( $d) );

//$dname=$data['dname'];
$query3 = mysqli_query($db,"select * from doctor1 where dname='$mname' and status='Active'");
$data3 = mysqli_fetch_array($query3);


$query4 = mysqli_query($db,"select * from staff3 where sname='$mname' and status='Active'");
$data4 = mysqli_fetch_array($query4);


$query5 = mysqli_query($db,"select * from ccom where cname='$cname'");
$data5 = mysqli_fetch_array($query5);
//echo $dd=$data4['desig'];

  
 $output .='
			<br><br><br><br><br><br><br>
			<table style="overflow: wrap">
                    <tr>
                        <td width="100%" style="font-size:16px;" ><b>REF:SFMM/CC/'. strtoupper($sno).'/'.$data5['id'].'</b>
															
						<br><b>DATE:'.date('d/m/Y',strtotime($sdate)).'</b>
						
						
						</td>
                        
                    </tr>
					
					
                    
                </table>
			
';
  
            

            
if($data3['degree']!=''){
            $output .='
			<br>
			<table style="overflow: wrap">
                    <tr>
                        <td width="100%" style="font-size:16px;" ><b>'. strtoupper($mname).'</b>
						<br>									
						
						
						<b>'. strtoupper($data3['Discipline']).'</b><br>
						<b>SFMMKPJSH & NC.</b><br>
						
						</td>
                        
                    </tr>
					
					
                    
                </table>
			
';}

else
	{
            $output .='
			<br>
			<table style="overflow: wrap">
                    <tr>
                        <td width="100%" style="font-size:16px;"><b>'. strtoupper($mname).'</b>
															
						
						<br>
						<b>'. strtoupper($data4['desig']).'</b><br>
						<b>SFMMKPJSH & NC.</b><br>
						
						</td>
                        
                    </tr>
					
					
                    
                </table>
			
';}

            $output .='
                <table style="overflow: wrap">
                    <tr>
                        <td style="font-size:16px;"><br><b>DEAR '. strtoupper($mname).' ,<br><br>

APPOINTMENT AS '. strtoupper($mrole).' OF '.$cname.' FOR THE PERIOD OF '.date('d/m/Y',strtotime($sdate)).' To '.date('d/m/Y',strtotime($edate)).'.
 </b>
 
 <br><b>----------------------------------------------------------------------------------------------------------</b>
 
 
 </td>
                    </tr>
					</table>';
			$output .='		
					<table style="overflow: wrap;text-align: justify;"  >
					
					<tr>
                        <td style="font-size:16px;"><br>We are pleased to inform that the Management of Sheikh Fazilatunnessa Mujib Memorial KPJ Specialized Hospital & Nursing College (SFMMKPJSH & NC) has appointed you as the <b>'. strtoupper($mrole).'</b> Of <b>'. strtoupper($cname).'</b> for a period of two (2) years.

The above committee (s) will meet every quarterly or as when necessary. We are confident that your support and participation as committee member will ensure that SFMMKPJSH & NC be able to discuss, deliberate and propose clinical policies to further enhance best clinical practices and clinical protocols.<br><br> 

Kindly confirm your acceptance of the above by signing and returning the duplicate copy attached within one week from the date of this letter.
<br><br>
Thank you.<br><br>
Care for life<br>
<br>
Yours sincerely<br><br>
<b>Sheikh Fazilatunnessa Mujib Memorial KPJ Specialized Hospital & Nursing College</b>


<br><br><br>

<b>MOHD TAUFIK BIN ISMAIL <br>
CHIEF EXECUTIVE OFFICER</b> 
<br><br><br>

<b>---------------------------------------------------------------------------------------------------------------------</b><br><br>

I, ……………………………………………………………… Office ID No: …………………………………………….<br><br>
Hereby accept the appointment as mentioned above.
<br><br><br><br>

Signature: …………………………………………     Date: ………………………………………………..


 </td>
                    </tr>
                    
                </table>
            ';

          
               
            $mpdf = new \Mpdf\Mpdf([
                // 'default_font' => 'bangla',
                'default_font' => 'Roboto',
                
                
				'margin_left' => 23
            ]);
            
            $mpdf->showWatermarkImage = true;
            $mpdf->setAutoTopMargin = 'stretch';
            $mpdf->setAutoBottomMargin = 'stretch';
            $mpdf->SetHTMLHeader('
                
                    

                
               
                
            
                
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