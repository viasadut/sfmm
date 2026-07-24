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
            $db = mysqli_connect('localhost','root','Godiloveu16');
            mysqli_select_db($db,'sfmmkpjnew');            
            require_once 'vendor/autoload.php';
            $pmrn=$_REQUEST['pmrn'];
            $dname=$_REQUEST['dname'];
            $date=$_REQUEST['date'];
            $eid=$_REQUEST['eid'];
            
            $output = "";

            $query = mysqli_query($con,"select * from inpatient where pmrn='$pmrn' and eid='$eid'");
            $data = mysqli_fetch_array($query);
            //$d=$data['adate'];
            $d=date('Y-m-d');
            $b = date( 'j-F-Y', strtotime( $d) );
$n_did=$data['did'];

$n_did=$data['did'];
$emer_eid=$data['emerid'];
$query435 = "SELECT * FROM user where uname='$n_did';" ;
$result435 = mysqli_query($con, $query435) or die(mysqli_error());
$row435 = mysqli_fetch_assoc($result435);
$bb=$row435['fullname'];
$consultant_discount=$data['hos_doc_dis']+$data['hos_doc_dis_ot'];
$new_hos_dis=$data['hos1_dis']+$data['lab_dis']+$data['rad_dis']+$data['room_dis'];

            $query43 = "SELECT COUNT(pmrn) FROM iinves where pmrn= '$pmrn' and eid='$eid' and type in('lab','Lab','LAB') and status='RECEIVED';"; 
            $result43 = mysqli_query($con, $query43) or die(mysqli_error());
            $row43 = mysqli_fetch_assoc($result43);
            $count10=$row43['COUNT(pmrn)'];

            $query44 = "SELECT COUNT(pmrn) FROM imedi3 where pmrn= '$pmrn' and eid='$eid' and udone !='';"; 
            $result44 = mysqli_query($con, $query44) or die(mysqli_error());
            $row44 = mysqli_fetch_assoc($result44);
            $count11=$row44['COUNT(pmrn)'];
			
			$query44_c = "SELECT COUNT(pmrn) FROM iinves where pmrn= '$pmrn' and eid='$eid' and type in('rad','rad','RAD','spd','spd1','ANJAN OPD ( ENT)','SPD') and status in ('RECEIVED','SEEN','DONE');"; 
            $result44_c = mysqli_query($con, $query44_c) or die(mysqli_error());
            $row44_c = mysqli_fetch_assoc($result44_c);
            $count11_c=$row44_c['COUNT(pmrn)'];
			
			$query45 = "SELECT COUNT(pmrn) FROM inhoscharge where pmrn= '$pmrn' and eid='$eid';"; 
            $result45 = mysqli_query($con, $query45) or die(mysqli_error());
            $row45 = mysqli_fetch_assoc($result45);
            $count12=$row45['COUNT(pmrn)'];

            $query2 = mysqli_query($con,"Select COUNT(id) from ot where pmrn='$pmrn' and eid='$eid'");
            $data2 = mysqli_fetch_array($query2);

            $query2p = mysqli_query($con,"Select COUNT(id) from procedure1 where pmrn='$pmrn' and ieid='$eid'");
            $data2p = mysqli_fetch_array($query2p);

            $query2dis = mysqli_query($con,"Select COUNT(id) from phar_sale where pmrn='$pmrn' and eid='$eid'and location='Discharge'");
            $data2dis = mysqli_fetch_array($query2dis);

            $query2endo = mysqli_query($con,"Select COUNT(id) from endopapp where pmrn='$pmrn' and ieid='$eid' and status in ('Received','SEEN')");
            $data2endo = mysqli_fetch_array($query2endo);

            $query2cath = mysqli_query($con,"Select COUNT(id) from cath_receive where pmrn='$pmrn' and ieid='$eid'");
            $data2cath = mysqli_fetch_array($query2cath);

            $query2maternity = mysqli_query($con,"Select COUNT(id) from cath_receive where pmrn='$pmrn' and ieid='$eid'");
            $data2maternity = mysqli_fetch_array($query2maternity);
            
            $query_doc = mysqli_query($con,"Select COUNT(id) from icnote where pmrn= '$pmrn' and eid='$eid' and ugroup ='Doctor'");
            $data_doc = mysqli_fetch_array($query_doc);

            $query3 = mysqli_query($con,"select * from doctor1 where dname='$dname'");
            $data3 = mysqli_fetch_array($query3);
			
            $query5 = mysqli_query($db,"select * from emergency where pmrn='$pmrn' and eid='$emer_eid'");
            $data5 = mysqli_fetch_assoc($query5);
            $emer_dis=$data5['disstatus'];
            
			
            //$d=$data['date'];
            $d=date('Y-m-d');
            $b = date( 'j-F-Y', strtotime( $d) );

            $output .='<table style="font-family: freesans; font-size: 12px;" width=100%>
            <tr>
                <th style="font-family: freesans; font-size: 12px;text-align:left;"><b>Room Charge</b></th>
            </tr>
        </table>
       ';

            $output .='			
            <table style="font-family: freesans; font-size: 12px;" width=100% text-align:left;>
            <tr>
      <td colspan="1" align="center"><strong>S.No</strong></td>
      
      <td colspan="2" align="center"><strong>Ward</strong></td>
      <td colspan="2" align="center"><strong>Bed</strong></td>
      <td colspan="4" align="center"><strong>Admit Date</strong></td>
      <td colspan="4" align="center"><strong>Transfer Date</strong></td>   
      <td colspan="2" align="center"><strong>Charge Per Day</strong></td>   
	  <td colspan="2" align="center"><strong>Days Staying</strong></td>   
	  <td colspan="2" align="center"><strong>Total Charge</strong></td>   

	   </tr>
	</table>
';



$count=1;
$sel_query="Select * from newbed_new where pmrn= '$pmrn' and eid='$eid' order by `id` DESC;";

$result = mysqli_query($con,$sel_query);
$rows=mysqli_num_rows($result);


while($row = mysqli_fetch_assoc($result)) 
{

 $output .='
 <table style="font-family: freesans; font-size: 12px;text-align:left;" width=100%>
 <tr>

    <td  colspan="1">'.$count.'</td>
    <td colspan="2">'.$row["type"].'</td>
	<td colspan="2">'.$row["bno"].'</td>  
	<td colspan="4">'.$row["adatenew"].'</td>
	<td colspan="4">'.$row["adatenew1"].'</td>
    <td colspan="2">'.$row["tdays"].'</td>
    <td colspan="2">'.$row["b_charge"].'</td>
    <td colspan="2">'.$row["charge"].'</td>
			</tr>
            </table>
 ';
 $count++;
}

$username = "root";
$password = "Godiloveu16";
$hostname = "localhost"; 

//connection to the database
$dbhandle = mysqli_connect($hostname, $username, $password) 
 or die("Unable to connect to MySQL");
//echo "Connected to MySQL<br>";

//select a database to work with
$selected = mysqli_select_db($dbhandle,"sfmmkpjnew") 
  or die("Could not select examples");

	  $query198ad = "SELECT SUM(charge) FROM newbed_new where pmrn= '$pmrn' and eid='$eid'"; 
	 
$result198ad = mysqli_query($dbhandle, $query198ad) or die(mysql_error());

// Print out result
$row198ad = mysqli_fetch_array($result198ad);
$test1am_room=	$row198ad['SUM(charge)'];

$output .='
<table style="font-family: freesans; font-size: 12px;" width=100%>        	
<tr><td colspan="20" style="text-align:right"><font size="3" color="#FF0000"><strong>Total Room Charge is:  '.$test1am_room.' (BDT)</strong></td></tr>
<tr>
                                
                    ';

$output .= '</table>';
            
            if($count11==0){
            }
            else {
                $output .='<table>
                                <tr>
                                    <th style="font-family: freesans; font-size: 12px;"><b>Medicine Used</b></th>
                                </tr>
                            </table>
                            <table style="font-family: freesans; font-size: 12px;" width=100%>';

                            $output .=' <tr>
      <td colspan="1" align="center"><strong>S.No</strong></td>
      
	  
	  <td colspan="2" align="center"><strong>Order Date</strong></td>
	  <td colspan="2" align="center"><strong>Order Time</strong></td>
        
      <td colspan="8" align="left"><strong>Medication</strong></td>   
	  
	  <td colspan="3" align="center"><strong>QTY</strong></td>
	  <td colspan="4" align="center"><strong>Price</strong></td>
	  
       

	   </tr>';

                            $count=1;
$sel_query="Select * from imedi3 where pmrn= '$pmrn' and eid='$eid' and udone !='' group by infusion order by `time` asc;";

$result = mysqli_query($con,$sel_query);

while($row = mysqli_fetch_assoc($result)) 
{

                    $output .='
                            <tr>
                                <td align="center" colspan="1" style="font-family: freesans; font-size: 10px;">'.$count.'.
								
								
								</td>
                                <td colspan="2" align="center" style="font-family: freesans; font-size: 10px;">'.$row['odate'].'</td>
                                <td colspan="2" align="center" style="font-family: freesans; font-size: 10px;">'.$row['time'].'</td>
                                <td colspan="8" align="left" style="font-family: freesans; font-size: 10px;">'.$row['infusion'].'</td>
                            
                    
                    ';
                    
						
						
						$p_price=$row['uprice'];
						$pp_medi=$row['infusion'];
						
						$query4p = mysqli_query($db,"select COUNT(infusion) from imedi3 where pmrn='$pmrn' and eid='$eid' and infusion='$pp_medi' and udone !=''");
						$datap = mysqli_fetch_assoc($query4p);
						$t_qty=$datap['COUNT(infusion)'];

						
						$query4pc = mysqli_query($db,"select SUM(uprice) from imedi3 where pmrn='$pmrn' and eid='$eid' and infusion='$pp_medi' and udone !='' ");
						$datapc = mysqli_fetch_assoc($query4pc);
						$uomp=$datapc['SUM(uprice)'];
					
                        $output .='
                            	</td>
                                <td colspan="3" align="center" style="font-family: freesans; font-size: 10px;"> '.$t_qty.'</td>
                                <td colspan="4" align="center" style="font-family: freesans; font-size: 10px;">'.$uomp.'</td>
                            </tr>
                    
                    ';
                    $count++;
                }

                $username = "root";
$password = "Godiloveu16";
$hostname = "localhost"; 

//connection to the database
$dbhandle = mysqli_connect($hostname, $username, $password) 
 or die("Unable to connect to MySQL");
//echo "Connected to MySQL<br>";

//select a database to work with
$selected = mysqli_select_db($dbhandle,"sfmmkpjnew") 
  or die("Could not select examples");

  $query198ad = "SELECT SUM(uprice) FROM imedi3 where pmrn= '$pmrn' and eid='$eid' and status1='implemented' and reuse=''"; 
	 
  $result198ad = mysqli_query($dbhandle, $query198ad) or die(mysql_error());
  
  // Print out result
  $row198ad = mysqli_fetch_array($result198ad);
  $test1am2=	$row198ad['SUM(uprice)'];
  
  
  
  $query198ad3 = "SELECT SUM(uprice) FROM imedi3 where pmrn= '$pmrn' and eid='$eid' and status1='implemented' and reuse='Reuse' and discard='New'"; 
       
  $result198ad3 = mysqli_query($dbhandle, $query198ad3) or die(mysql_error());
  
  // Print out result
  $row198ad3 = mysqli_fetch_array($result198ad3);
  $test1am3=	$row198ad3['SUM(uprice)'];
  
  
  $test1am=$test1am3+$test1am2;
$output .='
                            	
<tr><td colspan="20" style="text-align:right"><font size="3" color="#FF0000"><strong>Total Medicine Charge is:  '.$test1am.' (BDT)</strong></td></tr>
<tr>
                                
                    ';

$output .= '</table>';
            }

            if($count10==0){
            }

            else {
                $output .='<table>
                                <tr>
                                    <th style="font-family: freesans; font-size: 12px;"><b>Investigation Done</b></th>
                                </tr>
                            </table>
                            <table style="font-family: freesans; font-size: 12px;" width=100%>';

                            $output .=' <tr>
      <td colspan="1" align="center"><strong>S.No</strong></td>
      
	  
	  <td colspan="2" align="center"><strong>Order Date</strong></td>
	  
        
      <td colspan="8" align="left"><strong>Investigation(LAB)</strong></td>   
	  
	  <td colspan="3" align="center"><strong>QTY</strong></td>
	  <td colspan="4" align="center"><strong>Price</strong></td>
	  
       

	   </tr>';

                            $count=1;
$sel_query="Select * from iinves where pmrn= '$pmrn' and eid='$eid' and type in('lab','Lab','LAB') and status='RECEIVED' order by `id` DESC;";

$result = mysqli_query($con,$sel_query);

while($row = mysqli_fetch_assoc($result)) 
{

                    $output .='
                            <tr>
                                <td align="center" colspan="1" style="font-family: freesans; font-size: 10px;">'.$count.'.
								
								
								</td>
                                <td colspan="2" align="center" style="font-family: freesans; font-size: 10px;">'.$row['odate'].'</td>
                                
                                <td colspan="10" align="left" style="font-family: freesans; font-size: 10px;">'.$row['infusion'].'</td>
                            
                    
                    ';
                    
						
						
                    
						
						
                    $p_price_lab=$row['price'];
                    $pp_medi_lab=$row['infusion'];
                    
                    $query4p_lab = mysqli_query($db,"select COUNT(infusion) from iinves where pmrn='$pmrn' and eid='$eid' and infusion='$pp_medi_lab' and status='RECEIVED'");
                    $datap_lab = mysqli_fetch_assoc($query4p_lab);
                    $t_qty_lab=$datap_lab['COUNT(infusion)'];

                    
                    $query4pc_lab = mysqli_query($db,"select SUM(price) from iinves where pmrn='$pmrn' and eid='$eid' and infusion='$pp_medi_lab' and status='RECEIVED' ");
                    $datapc_lab = mysqli_fetch_assoc($query4pc_lab);
                    $uomp_lab=$datapc_lab['SUM(price)'];
                    



					
                        $output .='
                            	</td>
                                <td colspan="3" align="center" style="font-family: freesans; font-size: 10px;">1</td>
                                <td colspan="4" align="center" style="font-family: freesans; font-size: 10px;">'.$row["price"].'</td>
                            </tr>
                    
                    ';
                    $count++;
                }

                $username = "root";
$password = "Godiloveu16";
$hostname = "localhost"; 

//connection to the database
$dbhandle = mysqli_connect($hostname, $username, $password) 
 or die("Unable to connect to MySQL");
//echo "Connected to MySQL<br>";

//select a database to work with
$selected = mysqli_select_db($dbhandle,"sfmmkpjnew") 
  or die("Could not select examples");

	  $query198af = "SELECT SUM(price) FROM iinves where pmrn= '$pmrn' and eid='$eid' and status='RECEIVED' and type in('lab','Lab','LAB')"; 
	 
$result198af = mysqli_query($dbhandle,$query198af) or die(mysql_error());

// Print out result
$row198af = mysqli_fetch_array($result198af);
$test1al=	$row198af['SUM(price)'];


$output .='
                            	
<tr><td colspan="20" style="text-align:right"><font size="3" color="#FF0000"><strong>Total Investigation Charge is:  '.$test1al.' (BDT)</strong></td></tr>
<tr>
                                
                    ';

$output .= '</table>';
            }

            if($count11_c==0){
            }

            else {
                $output .='<table>
                                <tr>
                                    <th style="font-family: freesans; font-size: 12px;"><b>Investigation Done (Radiology)</b></th>
                                </tr>
                            </table>
                            <table style="font-family: freesans; font-size: 12px;" width=100%>';

                            $output .=' <tr>
      <td colspan="1" align="center"><strong>S.No</strong></td>
      
	  
	  <td colspan="2" align="center"><strong>Order Date</strong></td>
	  
        
      <td colspan="8" align="left"><strong>Investigation</strong></td>   
	  
	  <td colspan="3" align="center"><strong>QTY</strong></td>
	  <td colspan="4" align="center"><strong>Price</strong></td>
	  
       

	   </tr>';

                            $count=1;
$sel_query="Select * from iinves where pmrn= '$pmrn' and eid='$eid' and type in('rad','rad','RAD','spd','spd1','ANJAN OPD ( ENT)','SPD') and status in ('RECEIVED','SEEN','DONE') order by `id` DESC;";

$result = mysqli_query($con,$sel_query);

while($row = mysqli_fetch_assoc($result)) 
{

                    $output .='
                            <tr>
                                <td align="center" colspan="1" style="font-family: freesans; font-size: 10px;">'.$count.'.
								
								
								</td>
                                <td colspan="2" align="center" style="font-family: freesans; font-size: 10px;">'.$row['odate'].'</td>
                                
                                <td colspan="10" align="left" style="font-family: freesans; font-size: 10px;">'.$row['infusion'].'</td>
                            
                    
                    ';
                    
						
						
                    
						
						
                    $p_price_lab=$row['price'];
                    $pp_medi_lab=$row['infusion'];
                    
                    $query4p_lab = mysqli_query($db,"select COUNT(infusion) from iinves where pmrn='$pmrn' and eid='$eid' and infusion='$pp_medi_lab' and status in ('RECEIVED','SEEN','DONE')");
                    $datap_lab = mysqli_fetch_assoc($query4p_lab);
                    $t_qty_lab=$datap_lab['COUNT(infusion)'];

                    
                    $query4pc_lab = mysqli_query($db,"select SUM(price) from iinves where pmrn='$pmrn' and eid='$eid' and infusion='$pp_medi_lab' and status in ('RECEIVED','SEEN','DONE') ");
                    $datapc_lab = mysqli_fetch_assoc($query4pc_lab);
                    $uomp_lab=$datapc_lab['SUM(price)'];
                    
$a_price=$row['price']+$row['doc_price'];


					
                        $output .='
                            	</td>
                                <td colspan="3" align="center" style="font-family: freesans; font-size: 10px;">1</td>
                                <td colspan="4" align="center" style="font-family: freesans; font-size: 10px;">'.$a_price.'</td>
                            </tr>
                    
                    ';
                    $count++;
                }

                $username = "root";
$password = "Godiloveu16";
$hostname = "localhost"; 

//connection to the database
$dbhandle = mysqli_connect($hostname, $username, $password) 
 or die("Unable to connect to MySQL");
//echo "Connected to MySQL<br>";

//select a database to work with
$selected = mysqli_select_db($dbhandle,"sfmmkpjnew") 
  or die("Could not select examples");

	  $query198af_rad = "SELECT SUM(price), SUM(doc_price) FROM iinves where pmrn= '$pmrn' and eid='$eid' and status in ('RECEIVED','SEEN','DONE') and type in('rad','Rad','RAD','spd','spd1','ANJAN OPD ( ENT)','SPD')"; 
	 
$result198af_rad = mysqli_query($dbhandle,$query198af_rad) or die(mysql_error());

// Print out result
$row198af_rad = mysqli_fetch_array($result198af_rad);
$test1al_rad=	$row198af_rad['SUM(price)']+$row198af_rad['SUM(doc_price)'];


$output .='
                            	
<tr><td colspan="20" style="text-align:right"><font size="3" color="#FF0000"><strong>Total Investigation Charge is:  '.$test1al_rad.' (BDT)</strong></td></tr>
<tr>
                                
                    ';

$output .= '</table>';
            }
			
			if($count12==0){
            }
            else {
                $output .='<table>
                                <tr>
                                    <th style="font-family: freesans; font-size: 12px;"><b>Hospital Charges</b></th>
                                </tr>
                            </table>
                            <table style="font-family: freesans; font-size: 12px;" width=100%>';

                            $output .=' <tr>
      <td colspan="1" align="center"><strong>S.No</strong></td>
      
	  
	  <td colspan="2" align="center"><strong>Order Date</strong></td>
	  
        
      <td colspan="8" align="left"><strong>Item</strong></td>   
	  
	  <td colspan="3" align="center"><strong>QTY</strong></td>
	  <td colspan="4" align="center"><strong>Price</strong></td>
	  
       

	   </tr>';

                            $count=1;
                            $sel_query="Select * from inhoscharge where pmrn= '$pmrn' and eid='$eid' group by medi";

$result = mysqli_query($con,$sel_query);

while($row = mysqli_fetch_assoc($result)) 
{

    
						
    $rrt=$row['code'];
    $p_price=$row['price'];
    $pp_medi=$row['medi'];
    $query4p = mysqli_query($db,"select * from storenew where eid='$rrt'");
    $datap = mysqli_fetch_assoc($query4p);
    $uom=$datap['uom'];
    $u_price=$datap['price'];

    
    $query4pc = mysqli_query($db,"select SUM(pdos) from inhoscharge where pmrn='$pmrn' and eid='$eid' and medi='$pp_medi'");
    $datapc = mysqli_fetch_assoc($query4pc);
    $uomp=$datapc['SUM(pdos)'];


$query4pcy = mysqli_query($db,"select SUM(price) from inhoscharge where pmrn='$pmrn' and eid='$eid' and medi='$pp_medi'");
    $datapcy = mysqli_fetch_assoc($query4pcy);
    $uompy=$datapcy['SUM(price)'];
    
    $n_uom=$u_price*$uomp;
    



                    $output .='
                            <tr>
                                <td align="center" colspan="1" style="font-family: freesans; font-size: 10px;">'.$count.'.
								
								
								</td>
                                <td colspan="2" align="center" style="font-family: freesans; font-size: 10px;">'.$row['date'].'</td>
                                
                                <td colspan="10" align="left" style="font-family: freesans; font-size: 10px;">'.$row['medi'].'</td>
                            
                    
                    ';
                    
						
						
                    
						
						
                   


					
                        $output .='
                            	</td>
                                <td colspan="3" align="center" style="font-family: freesans; font-size: 10px;">'.$uomp.'</td>
                                <td colspan="4" align="center" style="font-family: freesans; font-size: 10px;">'.$uompy.'</td>
                            </tr>
                    
                    ';
                    $count++;
                }




                $count=1;
                $sel_query="Select * from inhoscharge where pmrn= '$pmrn' and eid='$eid' group by infusion";

$result = mysqli_query($con,$sel_query);

while($row = mysqli_fetch_assoc($result)) 
{


            
    $rrt_care=$row_care['code'];
    $p_price_care=$row_care['price'];
    $pp_medi_care=$row_care['infusion'];
    $query4p_care = mysqli_query($db,"select * from storenew where eid='$rrt_care'");
    $datap_care = mysqli_fetch_assoc($query4p_care);
    //$uom_care=$datap['uom'];
    $u_price_care=$datap_care['price'];

    
    $query4pc_care = mysqli_query($db,"select SUM(room) from careshope1 where pmrn='$pmrn' and eid='$eid' and infusion='$pp_medi_care'");
    $datapc_care = mysqli_fetch_assoc($query4pc_care);
    $uomp_care=$datapc_care['SUM(room)'];


    $query4pc_care4 = mysqli_query($db,"select SUM(price) from careshope1 where pmrn='$pmrn' and eid='$eid' and infusion='$pp_medi_care'");
    $datapc_care4 = mysqli_fetch_assoc($query4pc_care4);
    $uomp_care4=$datapc_care4['SUM(price)'];
    
    $n_uom_care=$u_price_care*$uomp_care;
  


        $output .='
                <tr>
                    <td align="center" colspan="1" style="font-family: freesans; font-size: 10px;">'.$count.'.
                    
                    
                    </td>
                    <td colspan="2" align="center" style="font-family: freesans; font-size: 10px;">'.$row['date'].'</td>
                    
                    <td colspan="10" align="left" style="font-family: freesans; font-size: 10px;">'.$row['infusion'].'</td>
                
        
        ';
        
            
            
        
            
            
       


        
            $output .='
                    </td>
                    <td colspan="3" align="center" style="font-family: freesans; font-size: 10px;">'.$uomp_care.'</td>
                    <td colspan="4" align="center" style="font-family: freesans; font-size: 10px;">'.$uomp_care4.'</td>
                </tr>
        
        ';
        $count++;
    }




                $username = "root";
$password = "Godiloveu16";
$hostname = "localhost"; 

//connection to the database
$dbhandle = mysqli_connect($hostname, $username, $password) 
 or die("Unable to connect to MySQL");
//echo "Connected to MySQL<br>";

//select a database to work with
$selected = mysqli_select_db($dbhandle,"sfmmkpjnew") 
  or die("Could not select examples");

	  $query198af_hos = "SELECT SUM(price) FROM inhoscharge where pmrn= '$pmrn' and eid='$eid'"; 
	 
$result198af_hos = mysqli_query($dbhandle,$query198af_hos) or die(mysql_error());

// Print out result
$row198af_hos = mysqli_fetch_array($result198af_hos);




  $query198_care = "SELECT SUM(price) FROM careshope1 where pmrn= '$pmrn' and eid='$eid'"; 
     
  $result198_care = mysqli_query($dbhandle,$query198_care) or die(mysql_error());
  
  $row198_care = mysqli_fetch_array($result198_care);
  $care_price=$row198_care['SUM(price)'];
  // Print out result

  $test1al_hos=	$row198af_hos['SUM(price)']+$care_price;
  
  


$output .='
                            	
<tr><td colspan="20" style="text-align:right"><font size="3" color="#FF0000"><strong>Total Investigation Charge is:  '.$test1al_hos.' (BDT)</strong></td></tr>
<tr>
                                
                    ';

$output .= '</table>';
            }



            if($data_doc['COUNT(id)']==0){
            }
            else {
                $output .='<table>
                                <tr>
                                    <th style="font-family: freesans; font-size: 12px;"><b>Doctors Charges</b></th>
                                </tr>
                            </table>
                            <table style="font-family: freesans; font-size: 12px;" width=100%>';

                            $output .=' <tr>
      <td colspan="1" align="center"><strong>S.No</strong></td>
      
	  
	  <td colspan="2" align="center"><strong>Order Date</strong></td>
	  
        
      <td colspan="8" align="left"><strong>Item</strong></td>   
	  
	  <td colspan="3" align="center"><strong>QTY</strong></td>
	  <td colspan="4" align="center"><strong>Price</strong></td>
	  
       

	   </tr>';

                            $count=1;
$sel_query="Select * from icnote where pmrn= '$pmrn' and eid='$eid' and ugroup ='Doctor';";

$result = mysqli_query($con,$sel_query);

while($row = mysqli_fetch_assoc($result)) 
{

                    $output .='
                            <tr>
                                <td align="center" colspan="1" style="font-family: freesans; font-size: 10px;">'.$count.'.
								
								
								</td>
                                <td colspan="2" align="center" style="font-family: freesans; font-size: 10px;">'.$row['user'].'</td>
                                
                                <td colspan="10" align="left" style="font-family: freesans; font-size: 10px;">'.$row['vtype'].'</td>
                            
                    
                    ';
                    
						
						
                    
						
						
                   


					
                        $output .='
                            	
                                <td colspan="3" align="center" style="font-family: freesans; font-size: 10px;">'.$row["charge"].'</td>
                                <td colspan="4" align="center" style="font-family: freesans; font-size: 10px;">'.$row["charge"].'</td>
                            </tr>
                    
                    ';
                    $count++;
                }

                $username = "root";
$password = "Godiloveu16";
$hostname = "localhost"; 

//connection to the database
$dbhandle = mysqli_connect($hostname, $username, $password) 
 or die("Unable to connect to MySQL");
//echo "Connected to MySQL<br>";

//select a database to work with
$selected = mysqli_select_db($dbhandle,"sfmmkpjnew") 
  or die("Could not select examples");

	  $query198af_doc_visit = "SELECT SUM(charge) FROM icnote where pmrn= '$pmrn' and eid='$eid'"; 
	 
$result198af_doc_visit = mysqli_query($dbhandle,$query198af_doc_visit) or die(mysql_error());

// Print out result
$row198af_doc_visit = mysqli_fetch_array($result198af_doc_visit);
$test1al_doc_visit=	$row198af_doc_visit['SUM(charge)'];


$output .='
                            	
<tr><td colspan="20" style="text-align:right"><font size="3" color="#FF0000"><strong>Total Doctor Charge is:  '.$test1al_doc_visit.' (BDT)</strong></td></tr>
<tr>
                                
                    ';

$output .= '</table>';
            }
			

            if($data2p['COUNT(id)']==0){
            }
            else {
                $output .='<table>
                                <tr>
                                    <th style="font-family: freesans; font-size: 12px;"><b>OPD Procedure Charge</b></th>
                                </tr>
                            </table>
                            <table style="font-family: freesans; font-size: 12px;" width=100%>';

                            $output .=' <tr>
                            <th colspan="1"><strong>S.No</strong></th>
                            <th colspan="5"><strong>Consultant Name</strong>
                            <th colspan="3"><strong>Patients Name</strong></th>
                            <th colspan="1"><strong>MRN</strong></th>
                            <th colspan="1"><strong>OT Time </strong>
                            <th colspan="1"><strong>Anaethetist Name</strong> 
                            <th colspan="1"><strong>Duration</strong>
                            <th colspan="3"><strong>Procedure</strong>  
                            
                                  <th colspan="1"><strong>Type</strong>
                                  
                                  <th colspan="3"><strong>OT Charge</strong>
                                  
                                  
                            
                      
                      
                      
                             </tr>';

                            $count=1;
$sel_query="Select * from procedure1 where pmrn='$pmrn' and ieid='$eid' order by `id` asc;";

$result = mysqli_query($con,$sel_query);

while($row = mysqli_fetch_assoc($result)) 
{

                    $output .='
                    <tr>
                    <td align="center" colspan="1">'.$count.'</td>
                    <td align="center" colspan="5"style="font:Verdana, Arial, Helvetica, sans-serif large" style="font-weight:bold">'.$row["dname"].'</td> 
                    <td align="center"colspan="3">'.$row["pname"].'</td>
                    <td align="center" colspan="1">'.$row["pmrn"].'</td>
                    <td align="center" colspan="1">'.$row["duration"].'</td>
                    <td align="center" colspan="1">'.$row["nanes"].' </td>
                    <td align="Left" colspan="1">'.$row["otdate"].' </td>
                          <td align="Left" colspan="3">'.$row["proce"].'</td>
                    
              
                         <td align="center" colspan="1"style="font:Verdana, Arial, Helvetica, sans-serif large" style="font-weight:bold">'.$row["ptype"].'</td>
              
                    
                    ';
                    
						
						
                    $username = "root";
$password = "Godiloveu16";
$hostname = "localhost"; 

//$id=$row['id'];

//connection to the database
$dbhandle = mysqli_connect($hostname, $username, $password) 
 or die("Unable to connect to MySQL");
//echo "Connected to MySQL<br>";

//select a database to work with
$selected = mysqli_select_db($dbhandle,"sfmmkpjnew") 
  or die("Could not select examples");

  $opd_procedure = "SELECT SUM(price) FROM prohoscharge where pmrn= '$pmrn' and ieid='$eid' "; 
	 
  $opd_procedure_res = mysqli_query($dbhandle,$opd_procedure) or die(mysql_error());
  
  // Print out result
  $opd_procedure_data = mysqli_fetch_array($opd_procedure_res);
  $opd_procedure_sum=	$opd_procedure_data['SUM(price)'];
  
  $opd_procedure_medi = "SELECT SUM(price) FROM promediused where pmrn= '$pmrn' and ieid='$eid' "; 
       
  $opd_procedure_res_medi = mysqli_query($dbhandle,$opd_procedure_medi) or die(mysql_error());
  
  // Print out result
  $opd_procedure_data_medi = mysqli_fetch_array($opd_procedure_res_medi);
  $opd_procedure_sum_medi=	$opd_procedure_data_medi['SUM(price)'];
  
  
  $opd_procedure_doc = "SELECT SUM(procharge) FROM procedure1 where pmrn= '$pmrn' and ieid='$eid' "; 
       
  $opd_procedure_res_doc = mysqli_query($dbhandle,$opd_procedure_doc) or die(mysql_error());
  
  // Print out result
  $opd_procedure_data_doc = mysqli_fetch_array($opd_procedure_res_doc);
  $opd_procedure_sum_doc=	$opd_procedure_data_doc['SUM(procharge)'];
  
  $opd_pro_summary=$opd_procedure_sum+$opd_procedure_sum_medi+$opd_procedure_sum_doc;                   


					
                        $output .='
                            	</td>
                                <td colspan="3" align="center" style="font-family: freesans; font-size: 10px;">'.$test1c_doc.'</td>
                                <td colspan="4" align="center" style="font-family: freesans; font-size: 10px;">'.$row["price"].'</td>


                                <td align="right"bgcolor="lightgreen" colspan="3"><a target="_blank" href="b_ot_dis_new.php?pmrn='.$row['pmrn'].'&id='.$row['id'].'">'.$opd_pro_summary.'</strong></a></td>		
                            </tr>
                    
                    ';
                    

                



$count++;
                }

            
$output .= '</table>';
            }



            if($data2['COUNT(id)']==0){
            }
            else {
                $output .='<table>
                                <tr>
                                    <th style="font-family: freesans; font-size: 12px;"><b>OT Charges</b></th>
                                </tr>
                            </table>
                            <table style="font-family: freesans; font-size: 12px;" width=100%>';

                            $output .=' <tr>
      <td colspan="1" align="center"><strong>S.No</strong></td>
      
	  
	  <td colspan="2" align="center"><strong>Order Date</strong></td>
	  
        
      <td colspan="8" align="left"><strong>Item</strong></td>   
	  
	  <td colspan="3" align="center"><strong>QTY</strong></td>
	  <td colspan="4" align="center"><strong>Price</strong></td>
	  
       

	   </tr>';

                            $count=1;
$sel_query="Select * from ot where pmrn='$pmrn' and eid='$eid' order by `id` asc;";

$result = mysqli_query($con,$sel_query);

while($row = mysqli_fetch_assoc($result)) 
{

                    $output .='
                            <tr>
                                <td align="center" colspan="1" style="font-family: freesans; font-size: 10px;">'.$count.'.
								
								
								</td>
                                <td colspan="2" align="center" style="font-family: freesans; font-size: 10px;">'.$row['dname'].'</td>
                                
                                <td colspan="8" align="left" style="font-family: freesans; font-size: 10px;">'.$row['proce'].'</td>
                                <td colspan="2" align="left" style="font-family: freesans; font-size: 10px;">'.$row['nanes'].'</td>
                            
                    
                    ';
                    
						
						
                    $username = "root";
$password = "Godiloveu16";
$hostname = "localhost"; 

$id=$row['id'];

//connection to the database
$dbhandle = mysqli_connect($hostname, $username, $password) 
 or die("Unable to connect to MySQL");
//echo "Connected to MySQL<br>";

//select a database to work with
$selected = mysqli_select_db($dbhandle,"sfmmkpjnew") 
  or die("Could not select examples");

	  $query198af_hos = "SELECT SUM(room) FROM otivisitendo where pmrn= '$pmrn' and ieid='$eid' "; 
	 
$result198af_hos = mysqli_query($dbhandle,$query198af_hos) or die(mysql_error());

// Print out result
$row198af_hos = mysqli_fetch_array($result198af_hos);
$test1c_doc=	$row198af_hos['SUM(room)'];

$query198j_dis = "SELECT SUM(ins) FROM othoscharge where pmrn= '$pmrn' and ieid='$eid' "; 
	 
$result198j_dis = mysqli_query($dbhandle,$query198j_dis) or die(mysqli_error());

// Print out result
$row198j_dis = mysqli_fetch_array($result198j_dis);
$test1c_dis=	$row198j_dis['SUM(ins)'];

$query198j_medi = "SELECT SUM(ins) FROM othoscharge1 where pmrn= '$pmrn' and ieid='$eid' "; 
	 
$result198j_medi = mysqli_query($dbhandle,$query198j_medi) or die(mysqli_error());

// Print out result
$row198j_medi = mysqli_fetch_array($result198j_medi);
$test1c_medi=	$row198j_medi['SUM(ins)'];


$query198j_amedi = "SELECT SUM(price) FROM otanaesmedi where pmrn= '$pmrn' and eid='$id' "; 
	 
$result198j_amedi = mysqli_query($dbhandle,$query198j_amedi) or die(mysqli_error());

// Print out result
$row198j_amedi = mysqli_fetch_array($result198j_amedi);
$test1c_amedi=	$row198j_amedi['SUM(price)'];

$query198j_ainfu = "SELECT SUM(price) FROM otanaesinfusion where pmrn= '$pmrn' and eid='$id' "; 
	 
$result198j_ainfu = mysqli_query($dbhandle,$query198j_ainfu) or die(mysqli_error());

// Print out result
$row198j_ainfu = mysqli_fetch_array($result198j_ainfu);
$test1c_ainfu=	$row198j_ainfu['SUM(price)'];


$all_ot_charge=$test1c_doc+$test1c_dis+$test1c_medi+$test1c_amedi+$test1c_ainfu-$data['ot_hos_dis']-$data['ot_doc_dis'];


						
						
                   


					
                        $output .='
                            	</td>
                                <td colspan="3" align="center" style="font-family: freesans; font-size: 10px;">'.$test1c_doc.'</td>
                                <td colspan="4" align="center" style="font-family: freesans; font-size: 10px;">'.$row["price"].'</td>


                                <td align="right"bgcolor="lightgreen" colspan="3"><a target="_blank" href="b_ot_dis_new.php?pmrn='.$row['pmrn'].'&id='.$row['id'].'">'.$all_ot_charge.'</strong></a></td>		
                            </tr>
                    
                    ';
                    

                



$count++;
                }

            
$output .= '</table>';
            }




            if($emer_dis!='SEEN'){
            }
            else {
                	
                  
                      $username = "root";
                  $password = "Godiloveu16";
                  $hostname = "localhost"; 
                  
                  //connection to the database
                  $dbhandle = mysqli_connect($hostname, $username, $password) 
                   or die("Unable to connect to MySQL");
                  //echo "Connected to MySQL<br>";
                  
                  //select a database to work with
                  $selected = mysqli_select_db($dbhandle,"sfmmkpjnew") 
                    or die("Could not select examples");
                  
                    
                    
                  $emer_medi = "SELECT SUM(uprice) FROM estat where pmrn= '$pmrn' and eid='$emer_eid' and status='Rupdated'"; 
                  
                       
                  $emer_medi_1 = mysqli_query($dbhandle, $emer_medi) or die(mysql_error());
                  
                  // Print out result
                  $emer_medi_res = mysqli_fetch_array($emer_medi_1);
                  $emer_medi_bill=	$emer_medi_res['SUM(uprice)'];
                  
                  
                  $emer_inves = "SELECT SUM(price) FROM einves where pmrn= '$pmrn' and eid='$emer_eid' and status in ('RECEIVED','SEEN','DONE')"; 
                       
                  $emer_inves_1 = mysqli_query($dbhandle, $emer_inves) or die(mysql_error());
                  
                  // Print out result
                  $emer_inves_res = mysqli_fetch_array($emer_inves_1);
                  $emer_inves_bill=	$emer_inves_res['SUM(price)'];
                  
                  $emer_dispo = "SELECT SUM(price) FROM edisposible where pmrn= '$pmrn' and eid='$emer_eid'"; 
                       
                  $emer_dispo_1 = mysqli_query($dbhandle, $emer_dispo) or die(mysql_error());
                  
                  // Print out result
                  $emer_dispo_res = mysqli_fetch_array($emer_dispo_1);
                  $emer_dispo_bill=	$emer_dispo_res['SUM(price)'];
                  
                  
                  $emer_evisit = "SELECT SUM(visit) FROM ecnote where pmrn= '$pmrn' and eid='$emer_eid'"; 
                       
                  $emer_evisit_1 = mysqli_query($dbhandle, $emer_evisit) or die(mysql_error());
                  
                  // Print out result
                  $emer_evisit_res = mysqli_fetch_array($emer_evisit_1);
                  $emer_evisit_bill=	$emer_evisit_res['SUM(visit)'];
                  
                  $nurse_procedure = "SELECT SUM(price) FROM enprocedure where pmrn='$pmrn' and eid='$emer_eid'"; 
                       
                  $nurse_procedure1 = mysqli_query($dbhandle,$nurse_procedure) or die(mysql_error());
                  
                  // Print out result
                  $nurse_procedure2 = mysqli_fetch_array($nurse_procedure1);
                  $nurse_procedure_price=	$nurse_procedure2['SUM(price)'];
                  
                  
                  $emer_all_bill=$emer_evisit_bill+$emer_dispo_bill+$emer_inves_bill+$emer_medi_bill+$nurse_procedure_price+0;
                  


            
$output .= '
<table style="font-family: freesans; font-size: 12px;" width=100%>
<tr><td colspan="20" style="text-align:right"><font size="3" color="#FF0000"><strong>Emergency is:  '.$emer_all_bill.' (BDT)</strong></td></tr>      

</table>';
            }


     
            if($data2dis['COUNT(id)']==0){
            }
            else {
                	
                  
                $username = "root";
                $password = "Godiloveu16";
                $hostname = "localhost"; 
                
                //connection to the database
                $dbhandle = mysqli_connect($hostname, $username, $password) 
                 or die("Unable to connect to MySQL");
                //echo "Connected to MySQL<br>";
                
                //select a database to work with
                $selected = mysqli_select_db($dbhandle,"sfmmkpjnew") 
                  or die("Could not select examples");
                
                    $query198_dis = "SELECT SUM(tprice) FROM phar_sale where pmrn= '$pmrn' and eid='$eid' and location='Discharge'"; 
                     
                $result198_dis = mysqli_query($dbhandle,$query198_dis) or die(mysql_error());
                
                // Print out result
                $row198_dis = mysqli_fetch_array($result198_dis);
                $test1_dis=	$row198_dis['SUM(tprice)'];
                


            
$output .= '
<table style="font-family: freesans; font-size: 12px;" width=100%>
<tr><td colspan="20" style="text-align:right"><font size="3" color="#FF0000"><strong>Discharge Medicine Charge is:  '.$test1_dis.' (BDT)</strong></td></tr>      

</table>';
            }



            if($data2endo['COUNT(id)']==0){
            }
            else {
                	
                  
                $username = "root";
                $password = "Godiloveu16";
                $hostname = "localhost"; 
                //connection to the database
                $dbhandle = mysqli_connect($hostname, $username, $password) 
                 or die("Unable to connect to MySQL");
                //echo "Connected to MySQL<br>";
                
                //select a database to work with
                $selected = mysqli_select_db($dbhandle,"sfmmkpjnew") 
                  or die("Could not select examples");
                
                    
                    
                    $endo_doc = "SELECT SUM(room) FROM ivisitendo where pmrn= '$pmrn' and ieid='$eid' "; 
                     
                $endo_doc_res = mysqli_query($dbhandle,$endo_doc) or die(mysql_error());
                
                // Print out result
                $endo_doc_data = mysqli_fetch_array($endo_doc_res);
                echo $endo_doc_sum=	$endo_doc_data['SUM(room)'];
                
                $endo_hos = "SELECT SUM(price) FROM endohoscharge1 where pmrn= '$pmrn' and ieid='$eid' "; 
                     
                $endo_hos_q = mysqli_query($dbhandle,$endo_hos) or die(mysql_error());
                
                // Print out result
                $endo_hos_data = mysqli_fetch_array($endo_hos_q);
                $endo_hos_sum=	$endo_hos_data['SUM(price)'];
                
                
                $endo_medi = "SELECT SUM(price) FROM endohoscharge where pmrn= '$pmrn' and ieid='$eid' "; 
                     
                $endo_medi_q = mysqli_query($dbhandle,$endo_medi) or die(mysql_error());
                
                // Print out result
                $endo_medi_data = mysqli_fetch_array($endo_medi_q);
                $endo_medi_sum=	$endo_medi_data['SUM(price)'];
                
                $endo_summary=$endo_doc_sum+$endo_hos_sum+$endo_medi_sum;

            
$output .= '
<table style="font-family: freesans; font-size: 12px;" width=100%>
<tr><td colspan="20" style="text-align:right"><font size="3" color="#FF0000"><strong>Endoscopy Charge is:  '.$endo_summary.' (BDT)</strong></td></tr>      

</table>';
            }

       
            if($data2cath['COUNT(id)']==0){
            }
            else {
                	
                $username = "root";
                $password = "Godiloveu16";
                $hostname = "localhost"; 
                
                //connection to the database
                $dbhandle = mysqli_connect($hostname, $username, $password) 
                 or die("Unable to connect to MySQL");
                //echo "Connected to MySQL<br>";
                
                //select a database to work with
                $selected = mysqli_select_db($dbhandle,"sfmmkpjnew") 
                  or die("Could not select examples");
                
                    
                    
                    $opd_cath = "SELECT SUM(qty) FROM cathhoscharge where pmrn= '$pmrn' and ieid='$eid' "; 
                     
                $opd_cath_res = mysqli_query($dbhandle,$opd_cath) or die(mysql_error());
                
                // Print out result
                $opd_cath_data = mysqli_fetch_array($opd_cath_res);
                $opd_cath_sum=	$opd_cath_data['SUM(qty)'];
                
                $opd_cath_medi = "SELECT SUM(price) FROM cathmediused where pmrn= '$pmrn' and ieid='$eid' "; 
                     
                $opd_cath_res_medi = mysqli_query($dbhandle,$opd_cath_medi) or die(mysql_error());
                
                // Print out result
                $opd_cath_data_medi = mysqli_fetch_array($opd_cath_res_medi);
                $opd_cath_sum_medi=	$opd_cath_data_medi['SUM(price)'];
                
                
/*                $opd_cath_doc = "SELECT SUM(procharge) FROM cath_receive where pmrn= '$pmrn' and ieid='$eid' "; 
                     
                $opd_cath_res_doc = mysqli_query($dbhandle,$opd_cath_doc) or die(mysql_error());
                
                // Print out result
                $opd_cath_data_doc = mysqli_fetch_array($opd_cath_res_doc);
                $opd_cath_sum_doc=	$opd_cath_data_doc['SUM(procharge)'];
                
*/
                $opd_cath_doc = "SELECT SUM(charge) FROM cath_charge where pmrn= '$pmrn' and ieid='$eid' and c_status=''"; 
	 
                $opd_cath_res_doc = mysqli_query($dbhandle,$opd_cath_doc) or die(mysql_error());
                
                // Print out result
                $opd_cath_data_doc = mysqli_fetch_array($opd_cath_res_doc);
                $opd_cath_sum_doc=	$opd_cath_data_doc['SUM(charge)'];
                

                $opd_cath_summary=$opd_cath_sum+$opd_cath_sum_medi+$opd_cath_sum_doc;
                
            
$output .= '
<table style="font-family: freesans; font-size: 12px;" width=100%>
<tr><td colspan="20" style="text-align:right"><font size="3" color="#FF0000"><strong>Cathlab Procedure Charge is:  '.$opd_cath_summary.' (BDT)</strong></td></tr>      

</table>';
            }


            if($data2maternity['COUNT(id)']==0){
            }
            else {
                	
                $username = "root";
$password = "Godiloveu16";
$hostname = "localhost"; 

//connection to the database
$dbhandle = mysqli_connect($hostname, $username, $password) 
 or die("Unable to connect to MySQL");
//echo "Connected to MySQL<br>";

//select a database to work with
$selected = mysqli_select_db($dbhandle,"sfmmkpjnew") 
  or die("Could not select examples");

	
	
$opd_msuite = "SELECT SUM(price) FROM prohoscharge_ms where pmrn= '$pmrn' and ieid='$eid' "; 
	 
$opd_msuite_res = mysqli_query($dbhandle,$opd_msuite) or die(mysql_error());

// Print out result
$opd_msuite_data = mysqli_fetch_array($opd_msuite_res);
$opd_msuite_sum=	$opd_msuite_data['SUM(price)'];

$opd_msuite_medi = "SELECT SUM(price) FROM promediused_ms where pmrn= '$pmrn' and ieid='$eid' "; 
	 
$opd_msuite_res_medi = mysqli_query($dbhandle,$opd_msuite_medi) or die(mysql_error());

// Print out result
$opd_msuite_data_medi = mysqli_fetch_array($opd_msuite_res_medi);
$opd_msuite_sum_medi=	$opd_msuite_data_medi['SUM(price)'];


$opd_msuite_doc = "SELECT SUM(procharge) FROM m_suite where pmrn= '$pmrn' and ieid='$eid' "; 
	 
$opd_msuite_res_doc = mysqli_query($dbhandle,$opd_msuite_doc) or die(mysql_error());

// Print out result
$opd_msuite_data_doc = mysqli_fetch_array($opd_msuite_res_doc);
$opd_msuite_sum_doc=	$opd_msuite_data_doc['SUM(procharge)'];

$opd_msuite_summary=$opd_msuite_sum+$opd_msuite_sum_medi+$opd_msuite_sum_doc;

                
            
$output .= '
<table style="font-family: freesans; font-size: 12px;" width=100%>
<tr><td colspan="20" style="text-align:right"><font size="3" color="#FF0000"><strong>Maternity Suite Procedure Charge is:  '.$opd_msuite_summary.' (BDT)</strong></td></tr>      

</table>';
            }



            $output .='<table>
            <tr>
                <th style="font-family: freesans; font-size: 12px;"><b>Other Charges</b></th>
            </tr>
        </table>
        <table style="font-family: freesans; font-size: 12px;" width=100%>';

        $output .=' <tr>
<td colspan="1" align="center"><strong>S.No</strong></td>


<td colspan="2" align="center"><strong>Order Date</strong></td>


<td colspan="8" align="left"><strong>Item</strong></td>   

<td colspan="3" align="center"><strong>QTY</strong></td>
<td colspan="4" align="center"><strong>Price</strong></td>



</tr>';

            

            $count=1;
            $sel_query_ex="Select * from ipd_extra_charge where pmrn= '$pmrn' and eid='$eid' and delete_status='0';";
            
            $result_ex = mysqli_query($con,$sel_query_ex);
            
            while($row_ex = mysqli_fetch_assoc($result_ex)) 
            {
            
                                $output .='
                                        <tr>
                                            <td align="center" colspan="1" style="font-family: freesans; font-size: 10px;">'.$count.'.
                                            
                                            
                                            </td>
                                            <td colspan="2" align="center" style="font-family: freesans; font-size: 10px;">'.$row_ex['medi'].'</td>
                                            
                                            <td colspan="8" align="left" style="font-family: freesans; font-size: 10px;">'.$row_ex['date1'].'</td>
                                        
                                
                                ';
                                
                                    
                                    
                                
                                    
                                    
                               
            
            
                                
                                    $output .='
                                            
                                            <td colspan="3" align="center" style="font-family: freesans; font-size: 10px;">'.$row_ex["qty"].'</td>
                                            <td colspan="4" align="center" style="font-family: freesans; font-size: 10px;">'.$row_ex["price"].'</td>
                                        </tr>
                                
                                ';
                                $count++;
                            }
            
            
                            $output .= '</table>';

            $query198j_implant = "SELECT SUM(price) FROM ipd_extra_charge where pmrn= '$pmrn' and eid='$eid' and medi LIKE '%IMPLANT%' and delete_status='0'"; 
	 
$result198j_implant = mysqli_query($dbhandle,$query198j_implant) or die(mysqli_error());

// Print out result
$row198j_implant = mysqli_fetch_array($result198j_implant);
$implant=	$row198j_implant['SUM(price)'];

$query198j_extra = "SELECT SUM(price) FROM ipd_extra_charge where pmrn= '$pmrn' and eid='$eid' and medi NOT LIKE '%IMPLANT%' and medi NOT LIKE '%SERVICE CHARGE%' and delete_status='0'"; 
	 
$result198j_extra = mysqli_query($dbhandle,$query198j_extra) or die(mysqli_error());

// Print out result
$row198j_extra = mysqli_fetch_array($result198j_extra);
$extra=	$row198j_extra['SUM(price)'];

$query198j_extra_service = "SELECT SUM(price) FROM ipd_extra_charge where pmrn= '$pmrn' and eid='$eid' and medi IN ('SERVICE CHARGE') and delete_status='0'"; 
	 
$result198j_extra_service = mysqli_query($dbhandle,$query198j_extra_service) or die(mysqli_error());

// Print out result
$row198j_extra_service = mysqli_fetch_array($result198j_extra_service);
$service_charge=	$row198j_extra_service['SUM(price)'];


            $all_inpatient_charge=$test1am+$test1al+$test1al_rad+$test1al_hos+$test1al_doc_visit+$test1am_room+$implant+$extra+$service_charge;            
            $grand_total=$all_inpatient_charge+$all_ot_charge+$emer_all_bill+$opd_pro_summary+$test1_dis+$endo_summary+$opd_cath_summary+$opd_msuite_summary-$data['advance']-$new_hos_dis-$consultant_discount;
            
            
            
            if($data2['COUNT(id)']==0){
            
            
            $output .=' <table style="font-family: freesans; font-size: 12px;" width=100%>
            
            
            
            <tr><td colspan="20" style="text-align:right"><font size="3" color="#FF0000"><strong>Total Inpatient Charge is:  '.$all_inpatient_charge.' (BDT)</strong></td></tr>
            <tr><td colspan="20" style="text-align:right"><font size="3" color="#FF0000"><strong>Advance / Deposit is:  '.$data['advance'].' (BDT)</strong></td></tr>
            <tr><td colspan="20" style="text-align:right"><font size="3" color="#FF0000"><strong>Consultant Discount:'.$consultant_discount.' (BDT)</strong></td></tr>	
            <tr><td colspan="20" style="text-align:right"><font size="3" color="#FF0000"><strong>Hospital Discount:'.$new_hos_dis.' (BDT)</strong></td></tr>	
            <tr><td colspan="20" style="text-align:right"><font size="3" color="#FF0000"><strong>Grand Total is:  '.$grand_total.' (BDT)</strong></td></tr>
                                            </table>
                                ';
            
            }
            
            else if($data2['COUNT(id)']>0){
            $output .=' <table style="font-family: freesans; font-size: 12px;" width=100%>
            
            
                                <tr><td colspan="20" style="text-align:right"><font size="3" color="#FF0000"><strong>Total OT Charge is:  '.$all_ot_charge.' (BDT)</strong></td></tr>
                                <tr><td colspan="20" style="text-align:right"><font size="3" color="#FF0000"><strong>Total Inpatient Charge is:  '.$all_inpatient_charge.' (BDT)</strong></td></tr>
                                <tr><td colspan="20" style="text-align:right"><font size="3" color="#FF0000"><strong>Advance / Deposit is:  '.$data['advance'].' (BDT)</strong></td></tr>
                                <tr><td colspan="20" style="text-align:right"><font size="3" color="#FF0000"><strong><strong>Consultant Discount:'.$consultant_discount.' (BDT)</strong></td></tr>	
            <tr><td colspan="20" style="text-align:right"><font size="3" color="#FF0000"><strong><strong>Hospital Discount:'.$new_hos_dis.' (BDT)</strong></td></tr>	
                                <tr><td colspan="20" style="text-align:right"><font size="3" color="#FF0000"><strong>Grand Total is:  '.$grand_total.' (BDT)</strong></td></tr>
                                                                </table>
                                                    ';
            }

            $output .= '<p align="right" style="font-family: freesans;"></p> ';//Software Generated Report, No Signature Required
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
           if($data['did']==''){
			
			$mpdf->SetHTMLHeader('
                <table width="100%">
                    <tr>
                        <td width="100%" align="center"><img src="new_bill/kpj_logo2.jpeg" width="400" height="80"></td>
                        
                    </tr>
                </table>
                <hr>

                <table width="100%">
                    <tr>
                        
                        <td width="80%" style="font-family: freesans;text-align: center;"><h1>Details Bill</h1></td>
                         <td width="20%" style="font-family: freesans; text-align: right; font-weight:bold;font-size:10px;">Date: '.$b.'<br> Episode: '.$data['eid'].'</td>
                    </tr>
                </table>
               
                <table>
                    <tr>
                        <td width="30%" style="font-family: freesans;"><h2 align="laft"><b>Doctor Name:</b></h2></td>
                        <td width="70%" style="font-weight: bold !important;font-family: freesans;"><h2 align="laft"><b>'.$data['adoc'].'</h2></b></td>
                    </tr>
                    <tr>
                        <td></td>
                        <td style="font-family: freesans;">'.$data3['degree'].'</td>
                    </tr>
                    <tr>
                        <td style="font-family: freesans;"></td>
                        <td style="font-family: freesans;font-weight:bold;">'.$data3['Discipline'].'</td>
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
					Prescription ID-'.$data['id'].'
					</td>
					</tr>
			</table>
			
                <table style="border: 1px solid black" width="100%" >
                    <tr>
                        <td style="font-family: freesans;"> <b>Patient Name : '.$data['pname'].'</b></td>
                        <td style="font-family: freesans;"><b>MRN :'.$data['pmrn'].'</b></td>
                        <td style="font-family: freesans;"><b>GENDER :</b>'.$data['gender'].'</td>
                        <td style="font-family: freesans;"><b>AGE :</b>'.$data['age'].'</td>
                    </tr>
                </table>
            
                
            ');}
			
			
			else if($data['did']!=''){
			
			$mpdf->SetHTMLHeader('
                <table width="100%">
                    <tr>
                        <td width="15%" style="font-family: freesans;"><img src="1.png"></td>
                        <td width="70%" align="center" style="text-align: center; font-weight: bold; font-size:17px;font-family: freesans;">SHEIKH FAZILATUNNESA MUJIB MEMORIAL<br>
                        KPJ SPECIALIZED HOSPITAL <br>
                        C/12, Tetuibari, Kashimpur, Gazipur, Bangladesh. </td>
						
                        <td width="15%" style="text-align: right;"><img src="2.png"></td>
                    </tr>
                </table>
                <hr>

                <table width="100%">
                    <tr>
                        
                        <td width="80%" style="font-family: freesans;text-align: center;"><h1>Details Bill</h1></td>
                         <td width="20%" style="font-family: freesans; text-align: right; font-weight:bold;font-size:10px;">Date: '.$b.'<br> Episode: '.$data['eid'].'</td>
                    </tr>
                </table>
               
                <table>
                    <tr>
                        <td width="30%" style="font-family: freesans;"><h2 align="laft"><b>Doctor Name:</b></h2></td>
                        <td width="70%" style="font-weight: bold !important;font-family: freesans;"><h2 align="laft"><b>'.$bb.'</h2></b></td>
                    </tr>
                    <tr>
                        <td></td>
                        <td style="font-family: freesans;">'.$data3['degree'].'</td>
                    </tr>
                    <tr>
                        <td></td>
                        <td style="font-family: freesans;font-weight:bold;">'.$data3['Discipline'].'</td>
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
					Prescription ID-'.$data['id'].'
					</td>
					</tr>
			</table>
			
                <table style="border: 1px solid black" width="100%">
                    <tr>
                        <td style="font-family: freesans;"> <b>Patient Name : '.$data['pname'].'</b></td>
                        <td style="font-family: freesans;"><b>MRN :'.$data['pmrn'].'</b></td>
                        <td style="font-family: freesans;"><b>GENDER :</b>'.$data['psex'].'</td>
                        <td style="font-family: freesans;"><b>AGE :</b>'.$data['page'].'</td>
                    </tr>
                </table>
            
                
            ');}
            $mpdf->SetHTMLFooter('
                <table width="100%">
                    <tr>
                        <td width="25%" align="center" style="font-family: freesans;">Page-{PAGENO}/{nbpg}</td>
                    </tr>
                    <tr>
                        <td width="100%" style="color:red; font-size:10px; font-family: freesans;text-align:center">Contact Numbers: Ambulance: 01810008074, +880244077029, Appointments: +8809644552233, +8809613552233 </td>
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