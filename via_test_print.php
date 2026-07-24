<!DOCTYPE html>
<html lang="en">
<head>
    <title>PMS</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <style>
        html, body{
            font-family: bangla;
            font-family: serif; font-size: 10pt;
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
            $dname=$_REQUEST['dname'];
            $date=$_REQUEST['date'];
            $id=$_REQUEST['id'];
            
            $output = "";

            $query = mysqli_query($con,"select * from via_test where id='$id'");
            $data = mysqli_fetch_array($query);

            $eid=$data['eid'];
            $sno=$data['sno'];
            $done_by=$data['done_by'];
            $done_date=date('d/m/Y',strtotime($data['date']));

            $query1 = mysqli_query($con,"select * from alltest where id='$sno'");
            $data1 = mysqli_fetch_array($query1);
            $d=$data['date'];
            $b = date( 'j-F-Y', strtotime( $d) );

            $query2 = mysqli_query($con,"select * from staff3 where sid='$done_by' and status='Active'");
            $data2 = mysqli_fetch_array($query2);
			
			
            $d=$data['date'];
            $b = date( 'j-F-Y', strtotime( $d) );



            $output .='
                <table width="100%">
                    <tr>
                        <td>
                        <div style="font-family: bangla; font-size: 24px;">
                        
                        <b>সাধারণ সমস্যা : </b></div></td>
                    </tr>
                    <tr>
                        <td>
                        <div style="font-family: bangla; font-size: 20px;">
                        
                        ১। &nbsp; স্বামী সহবাসের পর রক্ত স্রাব:  '.$data['one'].'
                        
                        </div>
                        </td>

                        </tr>


                        <tr>
                        <td>
                        <div style="font-family: bangla; font-size: 20px;">
                        
                        ২ । &nbsp;যোনীপথে স্রাব:  '.$data['two'].'
                        
                        </div>
                        </td>

                        </tr>


                        <tr>
                        <td>
                        <div style="font-family: bangla; font-size: 20px;">
                        
                        ৩ । &nbsp;যোনীপথে অনিয়মিত রক্তস্রাব:  '.$data['three'].'
                        
                        </div>
                        </td>

                        </tr>


                        <tr>
                        <td>
                        <div style="font-family: bangla; font-size: 20px;">
                        
                        ৪ । &nbsp;তলপেটে  ব্যথা:  '.$data['four'].'
                        
                        </div>
                        </td>

                        </tr>

                        <tr>
                        <td>
                        <div style="font-family: bangla; font-size: 20px;">
                        
                        ৫ । &nbsp;অন্যান্য:  '.$data['five'].'
                        
                        </div>
                        </td>

                        </tr>


                       
                </table>';

                $output .='
                <table>
                <tr>
                <td width="10%" style="font-size: 18px;">
                VIA
                </td>
                <td style="font-family: bangla; font-size: 24px;" >
                
                
              
                
                <b>পরীক্ষার ফলাফল : &nbsp;'.$data['report'].'</b>
                </td>

                দয়া করে একজন গাইনি বিশেষজ্ঞের পরামর্শ নিন।
                
            </tr>
            </table>
            
            ';

            if($data['report']=='পজিটিভ'){
            $output .='
                <table>
                <tr>
                
                <td style="font-family: bangla; font-size: 26px;" >
                
                
              
                
                নির্দেশনা: দয়া করে একজন গাইনি বিশেষজ্ঞের পরামর্শ নিন।
                </td>

               
                
            </tr>


            
            </table>
<br /><br /><br /><br /><br /><br /><br />

            <table width="100%">
            <tr>
                
                <td style="font-family: bangla; font-size: 22px;" width="30%">
                
                
                পরীক্ষাকারীর পূর্ণ নাম 
                
                :
                
                
                </td>

                <td style="font-size: 18px;"width="70%" >
                
                
                '.$data2['sname'].'
                
                
                </td>

               
                
            </tr>

            <tr>
                
            <td style="font-family: bangla; font-size: 22px;" width="30%">
            
            
            পদবী &nbsp;&nbsp;&nbsp;&nbsp;
            
            : 
            
            
            </td>

            <td style="font-size: 18px;" width="70%">
            
            
            '.$data2['desig'].'
            
            
            </td>

           
            
        </tr>

        <tr>
                
        <td style="font-family: bangla; font-size: 22px;" width="30%">
        
        
        তারিখ &nbsp;&nbsp;&nbsp;
        
        : 
        
        
        </td>

        <td style="font-size: 18px;" width="70%">
        
        
        '.$done_date.'
        
        
        </td>

       
        
    </tr>

    <tr>
                
        <td style="font-family: bangla; font-size: 22px;" width="30%">
        
        
        সেন্টারের নাম &nbsp;
        
        : 
        
        
        </td>

        <td style="font-size: 18px;" width="70%">
        
        
        KPJ SPECIALIZED HOSPITAL
        
        
        </td>

       
        
    </tr>

    <tr>
                
        <td style="font-family: bangla; font-size: 22px;" width="30%">
        
        
        উপজেলা / থানা 
        
        : 
        
        
        </td>

        <td style="font-size: 18px;" width="70%">
        
        
        KASHIMPUR
        
        
        </td>

       
        
    </tr>

    <tr>
                
        <td style="font-family: bangla; font-size: 22px;" width="30%">
        
        
        জেলা &nbsp;&nbsp;&nbsp;&nbsp;
        
        : 
        
        
        </td>

        <td style="font-size: 18px;" width="70%">
        
        
        GAZIPUR
        
        
        </td>

       
        
    </tr>
            </table>
            ';
            }
			
			
			
            //$output .= '<p align="right">Computer Generated Summary, No Signature Required</p> ';
            $mpdf = new \Mpdf\Mpdf([
                // 'default_font' => 'bangla',
                'default_font' => 'Roboto',
                'default_font_size' => 9,
                'mode' => 'utf-8',
				'margin_left' => 23
            ]);
           
            if($data['report']=='পজিটিভ')

            {
                
                $mpdf->SetWatermarkImage(
                    'via.png',
                    5,
                    '10',
                    
                    array(130,80)
                );
            }
            $mpdf->showWatermarkImage = true;
            $mpdf->setAutoTopMargin = 'stretch';
            $mpdf->setAutoBottomMargin = 'stretch';
            $mpdf->SetHTMLHeader('
            <table width="100%">
            <tr>
                <td width="20%" style="font-family: freesans; text-align:left;vertical-align: center;"><img src="prescription/prescription/KPJ_Updated_Logo.jpg" style="width:100px;">
                </td>
                <td width="80%" style="font-family: freesans; text-align:center;vertical-align: top;"><img src="prescription/prescription/kpj_new_logo_add2.png" style="width:480px;">
                </td>
                                  
            </tr>
        </table>
                <hr>

                <table width="100%">
                    <tr>
                        
                       <td width="100%" align="center"><b><h1>VIA TEST REPORT</h1> </b></td>
                        
                    </tr>
                </table>
               
			<table width="100%">
			<tr>
			<td width="10%" align="center">
			<barcode code="'.$data['id'].'" type="C128A" class="barcode" />
			MRN-'.$data1['pmrn'].'
			</td>
					<td width="80%" align="center">
					
					</td>
					
					<td class="verticalTableHeader" width="10%" align="center">
					<barcode code="'.$data['id'].'" type="C128A" class="barcode" />
					Report ID-'.$data['id'].'
					</td>
					</tr>
			</table>
			
                <table style="border: 1px solid black" width="100%">
                    <tr>
                        <td> <b>Patient Name : '.$data1['pname'].'</b></td>
                        <td><b>MRN :'.$data1['pmrn'].'</b></td>
                        <td><b>GENDER :</b>'.$data1['pgender'].'</td>
                        <td><b>AGE :</b>'.$data1['page'].'</td>
                    </tr>
                </table>
            
                <table style="border: 1px solid black" width="100%">
                    <tr>
                        <td><b>H(CM) :</b> '.$data2['height'].'</td>
                        <td><b>W(KG) :</b>'.$data2['weight'].'</td>
                        <td><b>BMI :</b>'.$data2['pbmi'].'</td>
                        <td><b>PuLse :</b>'.$data2['ppluse'].'</td>
                        <td><b>BP :</b>'.$data2['pbp'].''.'/'.$data2['pbp1'].'</td>
                        <td><b>Temp(F) :</b>'.$data2['temp'].'</td>
                        <td><b>SPO2 :</b>'.$data2['spo2'].'</td>
                        <td><b>RR :</b>'.$data2['rr'].'</td>
                    </tr>
                </table>
            ');

            $mpdf->SetHTMLFooter('
                <table width="100%">
                    <tr>
                        <td width="25%" align="center">Page-{PAGENO}/{nbpg}</td>
                    </tr>
                    <tr>
                        <td width="100%" style="color:red; font-size:10px;">Contact Numbers: Ambulance: 01810008074, +880244077029, Appointments: 01810008080, +880244077030 | (SFMMKPJSH/OPD/MR-01)</td>
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