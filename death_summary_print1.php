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
            $pmrn=$_REQUEST['pmrn'];
//$dname=$_REQUEST['dname'];
//$date=$_REQUEST['date'];
$eid=$_REQUEST['eid'];

$db = mysqli_connect('localhost','root','Godiloveu16');
mysqli_select_db($db,'sfmmkpjnew');

$query2 = mysqli_query($db,"select * from inpatient where pmrn='$pmrn' order by id desc limit 1");
$data2 = mysqli_fetch_array($query2);
$doctor=$data2['adoc'];
$eid2=$data2['eid'];



$query = mysqli_query($db,"select * from death_summary where pmrn='$pmrn' and eid='$eid2'");
$data = mysqli_fetch_array($query);



$query3 = mysqli_query($db,"select * from doctor1 where dname='$doctor'");
$data3 = mysqli_fetch_array($query3);
$d=date('d/m/Y H:i:s', strtotime($data['add_time']));

if($data['diagnosis']!=''){	
    $output .='
   <table>
       <tr>
           <td><b style="font-family: freesans; font-size: 12px;">DIAGNOSIS</b></td>
       </tr>
       <tr>
           <td style="font-family: freesans; font-size: 14px; text-align:justify">'.$data['diagnosis'].'</td>
       </tr>
       
       
   </table>
';	
   }	

			
if($data['cod']!=''){		

    $output .='
                    <table>
                        <tr>
                            <td><b style="font-family: freesans; font-size: 12px; ">Cause Of Death</b></td>
                        </tr>
                        <tr>
                            <td style="font-family: freesans; font-size: 14px; text-align:justify">'.$data['cod'].'</td>
                        </tr>
                        
                        
                    </table>
    ';		}		
    
    
                
    if($data['mlc']!=''){	
        $output .='
       <table>
           <tr>
               <td><b style="font-family: freesans; font-size: 12px;">Medical Legal Case</b></td>
           </tr>
           <tr>
               <td style="font-family: freesans; font-size: 14px; text-align:justify">'.$data['mlc'].'</td>
           </tr>
           
           
       </table>
';	
       }	
	
	
if($data['refer']!=''){
	 $output .='
                <table>
                    <tr>
                        <td><b style="font-family: freesans; font-size: 12px;"><b>OTHER INVOLVED CONSULTANT(S) </b></b></td>
                    </tr>
                    <tr>
                        <td style="font-family: freesans; font-size: 14px;">'.$data['refer'].'</td>
                    </tr>
					
					
                </table>
';	}
	

if($data['dsummary']!=''){				
    $output .='
                   <table>
                       <tr>
                           <td><b style="font-family: freesans; font-size: 12px; ">CASE SUMMARY</b></td>
                       </tr>
                       <tr>
                           <td style="font-family: freesans; font-size: 14px; text-align:justify">'.$data['dsummary'].'</td>
                       </tr>
                       
                       
                   </table>
       ';			}
   
	           
    		

                $output .='<table>
                                <tr>
                                    <th style="font-family: freesans; font-size: 12px;"><b>Medication</b></th>
                                </tr>
                            </table>
                            <table>';
                $query1 = mysqli_query($con,"Select distinct(infusion), instruc from imedi3 where pmrn= '$pmrn' and eid='$eid2' and status in ('Active','Served')");
                $count=1;
                while ($data1 = mysqli_fetch_array($query1)) {
                    $output .='
                            <tr>
                                
                                <td style="font-family: freesans; font-size: 14px;">'.$count.') '.$data1['infusion'].'('.$data1['instruc'].')</td>
                            </tr>
                            
                    ';
                    $count++;
                }
				
                $output .= '</table>';
				
				
				
				
				$output .='<table>
                                <tr>
                                    <th style="font-family: freesans; font-size: 12px;"><b>Investigation</b></th>
                                </tr>
                            </table>
                            <table>';
                            $query1 = mysqli_query($con,"Select distinct(infusion) from iinves where pmrn= '$pmrn' and eid='$eid2' and rstatus in ('RECEIVED','Ordered')");
                            $count=1;
                            while ($data1 = mysqli_fetch_array($query1)) {
                                $output .='
                                        <tr>
                                            
                                            <td style="font-family: freesans; font-size: 14px;">'.$count.') '.$data1['infusion'].'</td>
                                        </tr>
                                        
                                ';
                                $count++;
                            }
				
                $output .= '</table>';
				
				
			if($data['surgery']!=''){	
				
				 $output .='
                <table>
                    <tr>
                        <td><b style="font-family: freesans; font-size: 12px;">SURGERY OR PROCEDURE (IF ANY)</b></td>
                    </tr>
                    <tr>
                        <td style="font-family: freesans; font-size: 14px; text-align:justify">'.$data['surgery'].'</td>
                    </tr>
					
					
                </table>
			';	}
				
				
				

               
   
	

          
			

            $output .= '<p align="right" style="font-family: freesans;">Software Generated Report, No Signature Required
			<br>'.$data2['dconfirm'].'</p> ';
            $mpdf = new \Mpdf\Mpdf([
                // 'default_font' => 'freesans',
               // 'default_font' => 'freesans',
                'default_font_size' => 9,
                'mode' => 'utf-8',
				'margin_left' => 18
				
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
                        <td width="15%"><img src="1.png"></td>
                        <td width="70%" align="center" style="text-align: center; font-weight: bold; font-size:17px; font-family: freesans;">SHEIKH FAZILATUNNESA MUJIB MEMORIAL<br>
                        KPJ SPECIALIZED HOSPITAL <br>
                        C/12, Tetuibari, Kashimpur, Gazipur, Bangladesh. </td>
						
                        <td width="15%" style="text-align: right;"><img src="2.png"></td>
                    </tr>
                </table>
                <hr>

                <table width="100%">
                    <tr>
                        
                        <td width="100%" style="font-family: freesans;text-align: center;"><h1><u>DEATH SUMMARY</u></h1></td>
                         
                    </tr>
                </table>
               <br>
                <table>
                    
					
					
					<tr>
                        <td width="30%" style="font-family: freesans;"><h2 align="laft"><b>Consultant Name &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;:</b></h2></td>
                        <td width="70%" style="font-weight: bold !important;font-family: freesans;"><h2 align="laft"><b>'.$data2['adoc'].'</h2></b></td>
                    </tr>
                    <tr>
                        <td></td>
                        <td style="font-family: freesans;">'.$data3['degree'].'</td>
                    </tr>
                    <tr>
                        <td style="font-family: freesans;"></td>
                        <td style="font-family: freesans;">'.$data3['Discipline'].'</td>
                    </tr>
                </table>
            
			<table width="100%">
			<tr>
			<td width="10%" align="center" style="font-family: freesans;">
			<barcode code="'.$data['pmrn'].'" type="C128A" class="barcode" />
			MRN-'.$data['pmrn'].'
			</td>
					<td width="80%" align="center">
					
					</td>
					
					<td class="verticalTableHeader" width="10%" align="center" style="font-family: freesans;">
					<barcode code="'.$data['id'].'" type="C128A" class="barcode" />
					D.Summary-'.$data['id'].'
					</td>
					</tr>
			</table>
			
                <table style="border: 1px solid black" width="100%" >
                    <tr>
                        <td style="font-family: freesans; text-align:left"> <b>Patient Name : '.$data2['pname'].'</b></td>
                        <td style="font-family: freesans; font-size:16px;text-align:left"><b>MRN :'.$data2['pmrn'].'</b></td>
                        <td style="font-family: freesans; text-align:left"><b>GENDER :</b>'.$data2['gender'].'</td>
                        <td style="font-family: freesans; text-align:left"><b>AGE :</b>'.$data2['age'].'</td>
                    </tr>
               
                    <tr>
                        <td style="font-family: freesans; text-align:left"><b>Admission Date :</b> '.$data2['adate'].'</td>
                        <td style="font-family: freesans; text-align:left"><b>Ward :</b>'.$data2['room'].'</td>
                        <td style="font-family: freesans; text-align:left"><b>Bed :</b>'.$data2['room1'].'</td>
						<td style="font-family: freesans; text-align:left"><b>Episode :</b>'.$data['eid'].'</td>
						
                        
                    </tr>
					
					<tr>
					<td style="font-family: freesans; text-align:left"><b>D.S.Time :</b> '.$d.'</td>
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