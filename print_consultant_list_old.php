<!DOCTYPE html>
<html lang="en">
<head>
    <title>PMS</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <style>
        html, body{
            font-family: bangla;
            font-family: serif; font-size: 15pt;
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
           
			
			
			
	
                $output .='<table width="100%" autosize="1">
                                <tr>
                                    <th><b>Resident Consultant List:</b></th>
                                </tr>
                            </table>
                            <table border="1">
                            
                            <tr>
      <th width="4%" style="font-family: freesans; font-size: 14px;"><strong>S.No</strong></th>
      <th width="17%" style="font-family: freesans; font-size: 14px;"><strong>Doctor Name</strong></th>
      <th width="14%" style="font-family: freesans; font-size: 14px;"><strong>Department</strong>
	       
      <th width="14%" style="font-family: freesans; font-size: 14px;"><strong>Phone</strong>   
      
	  

	   </tr>
                            
                            
                            ';
                $query1 = mysqli_query($con,"Select * from staff1 where astatus='Active' and ugroup='doctor' and stype in('permanent','Contractual')order by sdepartment asc;");
                $count=1;
                while ($row = mysqli_fetch_array($query1)) {
                    $output .='
                            <tr>
                              
      <td align="left" style="font-family: freesans; font-size: 14px;">'.$count.'</td>
      <td align="left"  style="font-family: freesans; font-size: 14px;">'.$row["mname"].'</td>
      <td align="left" style="font-family: freesans; font-size: 14px;">'.$row["sdepartment"].'  </td>
	   
      
      <td align="left"  style="font-family: freesans; font-size: 14px;">'.$row["phone"].'  </td>
      

	  


	  
      </tr>
                          
                    ';
                    $count++;
                }
                $output .= '</table>';


                $output .='<table width="100%">
                <tr>
                    <th><b>Sessional Consultant List:</b></th>
                </tr>
            </table>
            <table border="1" style="font-family: freesans; font-size: 14px;">
            
            <tr>
<th width="4%" style="font-family: freesans; font-size: 14px;"><strong>S.No</strong></th>
<th width="17%" style="font-family: freesans; font-size: 14px;"><strong>Doctor Name</strong></th>
<th width="14%" style="font-family: freesans; font-size: 14px;"><strong>Department</strong>

<th width="14%" style="font-family: freesans; font-size: 14px;"><strong>Phone</strong>   



</tr>
            
            
            ';
$query1 = mysqli_query($con,"Select * from staff1 where astatus='Active' and ugroup='doctor' and stype in('Sessional','out')order by sdepartment asc;");
$count=1;
while ($row = mysqli_fetch_array($query1)) {
    $output .='
            <tr>
              
<td align="left" style="font-family: freesans; font-size: 14px;">'.$count.'</td>
<td align="left" style="font-family: freesans; font-size: 14px;">'.$row["mname"].'</td>
<td align="left" style="font-family: freesans; font-size: 14px;">'.$row["sdepartment"].'  </td>


<td align="left" style="font-family: freesans; font-size: 14px;">'.$row["phone"].'  </td>






</tr>
     
    ';
    $count++;
}
$output .= '</table>';
            

           
           // $output .= '<p align="right">Computer Generated Summary, No Signature Required</p> ';
            $mpdf = new \Mpdf\Mpdf([
                // 'default_font' => 'bangla',
                'default_font' => 'Roboto',
                'default_font_size' => 7,
                'mode' => 'utf-8',
				'margin_left' => 23
            ]);
            
            $mpdf->showWatermarkImage = true;
            $mpdf->setAutoTopMargin = 'stretch';
            $mpdf->setAutoBottomMargin = 'stretch';
            $mpdf->SetHTMLHeader('
                <table width="100%">
                    <tr>
                        <td width="15%"><img src="2.png"></td>
                        <td width="70%" align="center" style="text-align: center; font-weight: bold; font-size:17px;">
                        KPJ SPECIALIZED HOSPITAL <br>
                        C/12, Tetuibari, Kashimpur, Gazipur, Bangladesh. </td>
						
                        
                    </tr>
                </table>
                <hr>

               
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