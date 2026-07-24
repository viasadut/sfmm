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
            
            $dname=$_REQUEST['dname'];
            $date=$_REQUEST['date'];
            $eid=$_REQUEST['eid'];
            
            $output = "";

			
			
			
	$username = "root";
$password = "Godiloveu16";
$hostname = "localhost"; 
$ot_id=$data59['id'];
//connection to the database
$dbhandle = mysqli_connect($hostname, $username, $password) 
 or die("Unable to connect to MySQL");
//echo "Connected to MySQL<br>";

//select a database to work with
$selected = mysqli_select_db($dbhandle,"sfmmkpjnew") 
  or die("Could not select examples");

	$query198jot = "SELECT COUNT(sname) FROM otreport where sname= '$dname' and pname!=''"; 
	 
$result198jot = mysqli_query($dbhandle,$query198jot) or die(mysql_error());

// Print out result
$row198jot = mysqli_fetch_array($result198jot);
$test1cot=	$row198jot['COUNT(sname)'];



	

            

            $query3 = mysqli_query($con,"select * from doctor1 where dname='$dname'");
            $data3 = mysqli_fetch_array($query3);

            $d=$data['date'];
            $b = date( 'j-F-Y', strtotime( $d) );

            

            
                $output .='<table>
                                <tr >
								<th width="10%" style="border:1px solid black;"><b>SNO</b></th>
                                    <th width="80%" align="left" style="border:1px solid black;"><b>Procedure Performed</b></th>
									<th width="10%" style="border:1px solid black;"><b>Quantity</b></th>
                                </tr>
                            
                            ';
                $query1 = mysqli_query($con,"select COUNT(pname),pname from otreport where sname='$dname' and pname!='' group by pname");
                $count=1;
                while ($data1 = mysqli_fetch_array($query1)) {
                    $output .='
                            <tr>
                                <td width="10%" style="border:1px solid black;"><b>'.$count.'. </b></td>
                                <td width="80%" style="border:1px solid black;"><b> '.$data1['pname'].'<b></td>
								<td width="10%" align="center" style="border:1px solid black;"><b> '.$data1['COUNT(pname)'].'<b></td>
                            </tr>
                            
                    ';
                    $count++;
                }
                $output .= '</table>';
            

                        $output .= '<br><p> This Is To Be Confirmed That '.$dname.' Has Performed Total '.$test1cot.' Cases In This Hospital.</p>'; 
			
			
            $output .= '<br><table>
                    <tr>
                        <td><b>Confirmed  By</b></td></tr>
						<br><br><br><br>
						<tr>
                        <td><b>Dr. Razeeb Hassan</b></td>
                    </tr>
                    <tr>
                        
                        <td>Medical Director</td>
                    </tr>
                    <tr>
                       
                        <td>Sheikh Fazilatunnesa Mijub Memorial KPJ Specialized Hospital</td>
                    </tr>
                </table>';
            $mpdf = new \Mpdf\Mpdf([
                // 'default_font' => 'bangla',
                'default_font' => 'Roboto',
                'default_font_size' => 9,
                'mode' => 'utf-8',
				'margin_left' => 23
            ]);
            
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
                        <td width="50%"><b><h1 align="laft">Performed Procedure Stats</h1> </b></td>
                        
                    </tr>
                </table>
               
                <table>
                    <tr>
                        <td width="30%" ><h2 align="laft"><b>Consultant Name:</b></h2></td>
                        <td width="70%" style="font-weight: bold !important;"><h2 align="laft"><b>'.$dname.'</h2></b></td>
                    </tr>
                    <tr>
                        <td></td>
                        <td>'.$data3['degree'].'</td>
                    </tr>
                    <tr>
                        <td></td>
                        <td>'.$data3['Discipline'].'</td>
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