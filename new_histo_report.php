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
           $pmrn=$_REQUEST['pmrn'];
$dname1=$_REQUEST['dname1'];
//$date=$_REQUEST['date'];
$eid=$_REQUEST['eid'];

            
            $output = "";

            $db = mysqli_connect('localhost','root','Godiloveu16');
mysqli_select_db($db,'sfmmkpjnew');
$query = mysqli_query($db,"select * from histo where pmrn='$pmrn' and eid='$eid'");
$data = mysqli_fetch_array($query);

$dname=$data['dname'];
$query2 = mysqli_query($db,"select * from doctor1 where dname='$dname1'");
$data2 = mysqli_fetch_array($query2);

            $output .='
			<br>
                <table>
                    
                    <tr>
                        <td width="100%" style="font-size:15px;">'.$data['report'].'</td>
                    </tr>
                </table>
            ';

            
            $output .= '<p align="right">Computer Generated Report, No Signature Required</p> ';
            $mpdf = new \Mpdf\Mpdf([
                // 'default_font' => 'bangla',
                'default_font' => 'Roboto',
                'default_font_size' => 9,
                'mode' => 'utf-8'
            ]);
            $mpdf->SetWatermarkImage(
                '1001.jpg',
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
                        <td width="55%"><b><h1 align="laft">HISTOPATHOLOGICAL REPORT</h1> </b></td>
                        <td width="26%"></td>
                    </tr>
                </table>
               <br>
                <table>
                    <tr>
                        <td width="25%" ><h2 align="laft"><b>Consultant Name:</b></h2></td>
                        <td width="75%" style="font-weight: bold !important;"><h2 align="laft"><b>'.$dname1.'</h2></b></td>
                    </tr>
                    <tr>
                        <td></td>
                        <td>'.$data2['degree'].'</td>
                    </tr>
                    <tr>
                        <td></td>
                        <td>'.$data2['Discipline'].'</td>
                    </tr>
					</table>
					<table>
					<tr>
                        
                        <td width="100%" ></td>
                    </tr>
					
                </table>
            
                <table style="border: 1px solid black" width="100%">
                    <tr>
                        <td> <b>Patient Name : '.$data['pname'].'</b></td>
                        <td><b>MRN :'.$data['pmrn'].'</b></td>
                        <td><b>GENDER :</b>'.$data['psex'].'</td>
                        <td><b>AGE :</b>'.$data['page'].'</td>
                    </tr>
                </table>
            
                <table style="border: 1px solid black" width="100%">
                    <tr>
                        
                        <td><h3 align="right">Referral From: '.$data['dname'].'</h3></td>
                    </tr>
					</table>
					<br>
					<table>
					 <tr>
                        
                        <td width="60%"><h3 style="text-align: left;">Histopathological Serial No: '.$data['hno'].'</h3></td>
						<td width="40%"><h3 align="right">Date & Time: '.$data['rdate'].' '.$data['rtime'].'</h3></td>
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
            //$fileName = $data['pname'].'-'.$data['pmrn'].'.pdf';
            //ob_clean(); 
            $mpdf->Output();
        ?>
        </div>
    </div>
</div>

</body>
</html>

