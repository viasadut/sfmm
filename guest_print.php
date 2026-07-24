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
    <h1>Guest List</h1>
</div>
  
<div class="container">
    <div class="row">
        <div class="col-md-12 col-sm-12">
        <?php
            require('db1.php');
            
            require_once 'vendor/autoload.php';
$id=$_REQUEST['id'];            
$ename='2nd Graduation Ceremony 2023';            
            $output = "";

            
      
			if($id=='all'){
                $output .='<table border="1">
                                <tr>
                                    <th><b>SNO:</b></th>
									<th><b>Invitee</b></th>
									<th><b>Designation</b></th>
									
								<th><b>Organization</b></th>
								<th><b>Category</b></th>
                                </tr>
                            
                            ';
                 $query1 = mysqli_query($con,"SELECT * FROM event_invitee_list where e_name='$ename'  and status='0' order by cat desc");
                $count=1;
				
				
                while ($data1 = mysqli_fetch_array($query1)) {
                    $output .='
                            <tr>
                                <td><b>'.$count.'. </b></td>
                                <td ><b> '.$data1['invitee'].'<b></td>
								 <td><b> '.$data1['desig'].'<b></td>
								  <td><b> '.$data1['organization'].'<b></td>
								   <td><b> '.$data1['cat'].'<b></td>
                            </tr>
                            
                    ';
                    $count++;
            
                
            }
			$output .= '</table>';}
			
			
			
						else {
                $output .='<table border="1">
                                <tr>
                                    <th><b>SNO:</b></th>
									<th><b>Invitee</b></th>
									<th><b>Designation</b></th>
									
								<th><b>Organization</b></th>
								<th><b>Phone</b></th>
                                </tr>
                            
                            ';
                 $query1 = mysqli_query($con,"SELECT * FROM event_invitee_list where cat='$id' and e_name='$ename' and status='0' order by id desc");
                $count=1;
				
				
                while ($data1 = mysqli_fetch_array($query1)) {
                    $output .='
                            <tr>
                                <td ><b>'.$count.'. </b></td>
                                <td ><b> '.$data1['invitee'].'<b></td>
								 <td ><b> '.$data1['desig'].'<b></td>
								  <td ><b> '.$data1['organization'].'<b></td>
								   <td ><b> '.$data1['phone'].'<b></td>
                            </tr>
                            
                    ';
                    $count++;
            
                
            }
			$output .= '</table>';}
            
           // $output .= '<p align="right">Computer Generated Summary, No Signature Required</p> ';
            $mpdf = new \Mpdf\Mpdf([
                // 'default_font' => 'bangla',
                'default_font' => 'Roboto',
                'default_font_size' => 9,
                'mode' => 'utf-8',
				'margin_left' => 23
            ]);
            $mpdf->SetWatermarkImage(
                
                5,
                '',
                array(177,43)
            );
            $mpdf->showWatermarkImage = true;
            $mpdf->setAutoTopMargin = 'stretch';
            $mpdf->setAutoBottomMargin = 'stretch';
            $mpdf->SetHTMLHeader('
                <table width="100%">
                    <tr>
                        <td width="15%"><img src="1.png"></td>
                        <td width="70%" align="center" style="text-align: center; font-weight: bold; font-size:17px;">SHEIKH FAZILATUNNESA MUJIB MEMORIAL<br>
                        KPJ SPECIALIZED HOSPITAL AND NURSING COLLEGE<br>
                        C/12, Tetuibari, Kashimpur, Gazipur, Bangladesh. </td>
						
                        <td width="15%" style="text-align: right;"><img src="2.png"></td>
                    </tr>
                </table>
                <hr>

                <table width="100%">
                    <tr>
                        <td width="23%"></td>
                        <td width="50%"><b><h1 align="laft">Guest List('.$id.')</h1> </b></td>
                        
                    </tr>
                </table>
               
                
            
            ');

            $mpdf->SetHTMLFooter('
                <table width="100%">
                    <tr>
                        <td width="25%" align="center">Page-{PAGENO}/{nbpg}</td>
                    </tr>
                    
                </table>
            ');
            
            $mpdf->WriteHTML($output);
            //$fileName = $data['pname'].'-'.$data['pmrn'].'.pdf';
            ob_clean(); 
            $mpdf->Output();
        ?>
        </div>
    </div>
</div>

</body>
</html>

<!-- http://localhost/sfmm/ticket/pdf_p.php?pmrn=123456&eid=3&date=07/20/2018&dname=Dr.%20Razeeb%20Hassan -->