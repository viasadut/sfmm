<!DOCTYPE html>
<?php
	require 'db1.php';
    $id=$_REQUEST['id'];
    $pmrn=$_REQUEST['pmrn'];
    $eid=$_REQUEST['eid'];
	    $rid=$_REQUEST['rid'];
	    $billno=$_REQUEST['billno'];
			    $refundno=$_REQUEST['refundno'];
//db connection 
define ('DB_USER', 'root');
define ('DB_PASSWORD','Godiloveu16');
define ('DB_HOST','localhost');
define ('DB_NAME','sfmmkpjnew');
//db connection check
$db=mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME) OR die
('Could not connect to MySQL :'.mysqli_connect_error());
//data check to database
//$row43=mysqli_fetch_assoc(mysqli_query($db,"SELECT * FROM alltest WHERE pmrn='123456'"));

$row44=mysqli_fetch_assoc(mysqli_query($db,"SELECT COUNT(id) FROM phar_sale_return WHERE rid='$refundno' and billno='$billno'"));
//echo $row44['COUNT(pmrn)'];
$objConnect = mysqli_connect("localhost","root","Godiloveu16") or die("Error Connect to Database");
$objDB = mysqli_select_db($objConnect,"sfmmkpjnew");
$strSQL = "Select * from phar_sale_return WHERE rid='$refundno' and billno='$billno' order by `id` desc;";
$objQuery = mysqli_query($objConnect,$strSQL) or die ("Error Query [".$strSQL."]");

$strSQL1 = "Select * from phar_sale_return WHERE rid='$refundno' and billno='$billno' order by `id` desc;";
$objQuery1 = mysqli_query($objConnect,$strSQL1) or die ("Error Query [".$strSQL1."]");
$row43=mysqli_fetch_array($objQuery1);
$dname=$row43['dname'];

$strSQL2 = "Select * from doctor1 where dname= '$dname' and status in ('Active','active') order by `did` desc;";
$objQuery2 = mysqli_query($objConnect,$strSQL2) or die ("Error Query [".$strSQL2."]");
$row50=mysqli_fetch_array($objQuery2);



$row45=mysqli_fetch_assoc(mysqli_query($db,"SELECT SUM(tprice) FROM phar_sale_return WHERE rid='$refundno' and billno='$billno'"));
//echo $row49['amount'];



//echo $row46['desig'];


$strSQL16 = "Select * from refund_bill where billno= '$billno' and id='$refundno';";
$objQuery16 = mysqli_query($objConnect,$strSQL16) or die ("Error Query [".$strSQL1."]");
$row49=mysqli_fetch_array($objQuery16);
$refund=$row49['amount'];

?>
<html lang="en">

	<head>
		<style>	
		.table {
			width: 100%;
			margin-bottom: 20px;
		}	
		
		.table-striped tbody > tr:nth-child(odd) > td,
		.table-striped tbody > tr:nth-child(odd) > th {
			background-color: #f9f9f9;
		}
		
		@media print{
			#print {
				display:none;
			}
		}
		@media print {
			#PrintButton {
				display: none;
			}
            header, footer{
		display: true;
	}		
			
			
		}
		
		@page {
			size: auto;   /* auto is the initial value */
			
			/*margin-top: 5cm;*/
			margin:0;  /* this affects the margin in the printer settings */

			header { 
                position: fixed; 
                top: 1cm; 
                left: 0; 
                right: 0; 
                height: 50px; 
            } 
  
            footer { 
                position: fixed; 
                bottom: 0; 
                left: 0; 
                right: 0; 
                height: 50px; 
            } 

		}

		table, th, td {
  border: 0px solid black;
  border-collapse: collapse;
  
}

table.center {
  margin-left: auto; 
  margin-right: auto;
  
}
body {
			margin-top: 0in;
			margin-left: 0in;
		}
		.page {
			width: 8.5in;
			height: 10.5in;
			margin-top: 0.5in;
			margin-left: 0.25in;
		}
    .label {
			width: 2.1in;
			height: .9in;
			padding: .125in .3in 0;
			margin-right: 0.125in;
			float: left;
			text-align: center;
			overflow: hidden;
		}
    .page-break {
			clear: left;
			display:block;
			page-break-after:always;
		}

	</style>

<link rel="stylesheet" href="styles.css">
   <script src="jsnew/jquery-latest.min.js" type="text/javascript"></script>
   <script src="script.js"></script>
   <script src="bill/JsBarcode.all.min.js"></script>

	</head>
<body>

	<header>
<br><br>

	<table width="100%">
                    <tr>
                        <td width="30%" align="right"><img src="kpj_logo/1.png" width="30" height="30"></td>
                        <td width="40%" align="center" style="text-align: center; font-weight: bold; font-size:10px; font-family: freesans;">SHEIKH FAZILATUNNESA MUJIB MEMORIAL<br>
                        KPJ SPECIALIZED HOSPITAL <br>
                        C/12, Tetuibari, Kashimpur, Gazipur, Bangladesh. </td>
						
                        <td width="30%" style="text-align:left;"><img src="kpj_logo/2.png" width="30" height="30"></td>
                    </tr>
                </table>
                

               <div style="height:150px; border:1px solid; margin-left:30px;margin-right:20px;">
        
            <table  width="100%" >
              <tr>
                        <td style="font-family: freesans;font-size:14px;" width="60%"> <b>Patient Name : <?php echo $row43['pname'];?></b>
                        <br><b>MRN &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                        : <?php echo $row43['pmrn'];?></b>
                        <br><b>Age &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                        : <?php echo $row43['page'];?></b>
                        <br><b>Gender &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                        : <?php echo $row43['pgender'];?></b><br>
                        
                        
                        </td>
                        
                        <td style="font-family: freesans; text-align:left;font-size:14px;" width="40%"><b>Consultant Name: <?php echo $row43['dname'];?></b>
                        <br><?php echo $row50['degree'];?>
                        </b>
                        <br><b><?php echo $row50['desig'].', '.$row50['Discipline'];?></b>
                        <br>
                        
                        </td>
                        
                    </tr>
                    </table>
                    
                    <table width="100%">
                    <tr>
                    <td style="font-family: freesans; text-align:left;" width="10%"><svg id="mrn"></svg></td>
                    <td style="font-family: freesans; text-align:left;" width="80%"></td>
                    <td style="font-family: freesans; text-align:left;" width="10%"><svg id="id"></svg></td>


                    </tr>
                </table>
</div>

	</header>
<br>

		<div style="height:300px;border:1px solid;margin-left:30px;margin-right:20px;">
		
		                  <table width="100%">
                    <tr>
                    <td style="font-family: freesans; text-align:center; font-weight:bold; font-size:16px;">REFUND BILL (Against Bill No- <?php echo $billno;?>)</td>
                    


                    </tr>
                </table>
<table width="100%">
                
              <tr>
                        <td style="font-family: freesans;font-size:12px;" width="5%"><b>S/NO </b>
                        </td>
                        
                        

                        <td style="font-family: freesans; text-align:left;font-size:12px;" width="75%"><b>Medicine Name</b>
                        </td>
						<td style="font-family: freesans; text-align:left;font-size:12px;" width="10%"><b>Qty</b>
                        </td>
                        <td style="font-family: freesans; text-align:left;font-size:12px;" width="10%"><b>Amount</b>
                        </td>

                        
                    </tr>
                    <?php
$count = 1;
while($row = mysqli_fetch_array($objQuery))
{
$i5++;

?>

                   

                    <tr>
                        <td style="font-family: freesans;font-size:12px;text-align:center" width="5%"><?php echo $count.'.';?>
                        </td>
                        
                        

                        <td style="font-family: freesans; text-align:left;font-size:12px;" width="75%"><?php echo $row['medi'];?>
                        </td>
						<td style="font-family: freesans; text-align:left;font-size:12px;" width="10%"><?php echo $row['qty'];?>
                        </td>
                        <td style="font-family: freesans; text-align:left;font-size:12px;" width="10%"><?php echo $row['tprice'];?>
                        </td>

                        
                    </tr>

                    <?php
 $count++;}
?>
                    
        

 <?php
					if($row49['dis_amount']>0){
						
						echo '
						<tr>
						<td style="font-family: freesans; text-align:left;font-size:12px;" width="5%"></td>
						<td style="font-family: freesans; text-align:left;font-size:12px;font-weight:bold;" width="65%">Adjustment From Last Bill
                        </td>
						
						<td style="font-family: freesans; text-align:left;font-size:12px;" width="10%">(-)</td>
						<td style="font-family: freesans; text-align:left;font-size:12px;font-weight:bold;" width="10%">'.$row49['dis_amount'].'
                        </td>
						
						</tr>';
					}
					
					?>		
                </table>


                <?php 
                $record=$row44['COUNT(id)'];
                if($row44['COUNT(id)']==1){echo 
                '<br><br><br><br><br><br><br>
                <br><br><br><br><br>
                <footer>
                <table width="100%">
                <tr>
                <td style="font-family: freesans;text-align:center;font-size:14px;" width="10%"><b>refund_by:</b>'.$row49['refund_by'].'
                </td>
                
                <td style="font-family: freesans; text-align:center;font-size:14px;" width="30%"><b>Refund Time:</b>'.$row49['refund_time'].'
                </td>
                <td style="font-family: freesans; text-align:left;font-size:14px;" width="30%"><b>Paymant Mode:</b>'.$row49['p_mode'].'
                </td>
                <td style="font-family: freesans; text-align:right;font-size:16px;" width="30%"><b>Grand Total:'.$row49['r_amount'].'</b>
                </td>';
                }
                else if($record==2 ){echo 

                  '<br><br><br><br><br><br><br><br><br><br><br><footer>
                  <table width="100%">
                  <tr>
                  <td style="font-family: freesans;text-align:center;font-size:14px;" width="10%"><b>refund_by:</b>'.$row49['refund_by'].'
                </td>
                
                <td style="font-family: freesans; text-align:center;font-size:14px;" width="30%"><b>Refund Time:</b>'.$row49['refund_time'].'
                </td>
                <td style="font-family: freesans; text-align:left;font-size:14px;" width="30%"><b>Paymant Mode:</b>'.$row49['p_mode'].'
                </td>
                <td style="font-family: freesans; text-align:right;font-size:16px;" width="30%"><b>Grand Total:'.$row49['r_amount'].'</b>
                </td>';
                  }
                else if($record==3 ){echo 

                  '<br><br><br><br><br><br><br><br><br><br><br><footer>
                  <table width="100%">
                  <tr>
                  <td style="font-family: freesans;text-align:center;font-size:12px;" width="10%"><b>refund_by:</b>'.$row49['refund_by'].'
                  </td>
                  
                  <td style="font-family: freesans; text-align:center;font-size:12px;" width="30%"><b>Bill Time:</b>'.$row49['refund_time'].'
                  </td>
                  <td style="font-family: freesans; text-align:left;font-size:12px;" width="20%"><b>Paymant Method:</b>'.$row49['p_mode'].'
                  </td>
                  <td style="font-family: freesans; text-align:right;font-size:16px;" width="30%"><b>Grand Total:'.$row49['r_amount'].'</b>
                </td>';
                  }
                else if($record==4 ){echo 

                  '<br><br><br><br><br><br><br><br><br><br><footer>
                  <table width="100%">
                  <tr>
                  <td style="font-family: freesans;text-align:center;font-size:12px;" width="10%"><b>refund_by:</b>'.$row49['refund_by'].'
                  </td>
                  
                  <td style="font-family: freesans; text-align:center;font-size:12px;" width="30%"><b>Bill Time:</b>'.$row49['refund_time'].'
                  </td>
                  <td style="font-family: freesans; text-align:left;font-size:12px;" width="20%"><b>Paymant Method:</b>'.$row49['p_mode'].'
                  </td>
                  <td style="font-family: freesans; text-align:right;font-size:16px;" width="30%"><b>Grand Total:'.$row49['r_amount'].'</b>
                </td>';
                  }
                else if($record==5 ){echo 

                  '<br><br><br><br><br><br><br><br><br><footer>
                  <table width="100%">
                  <tr>
                  <td style="font-family: freesans;text-align:center;font-size:12px;" width="10%"><b>refund_by:</b>'.$row49['refund_by'].'
                  </td>
                  
                  <td style="font-family: freesans; text-align:center;font-size:12px;" width="30%"><b>Bill Time:</b>'.$row49['refund_time'].'
                  </td>
                  <td style="font-family: freesans; text-align:left;font-size:12px;" width="20%"><b>Paymant Method:</b>'.$row49['p_mode'].'
                  </td>
                  <td style="font-family: freesans; text-align:right;font-size:16px;" width="30%"><b>Grand Total:'.$row49['r_amount'].'</b>
                </td>';
                  }
                else if($record==6 ){echo 

                  '<br><br><br><br><br><br><br><br><footer>
                  <table width="100%">
                  <tr>
                  <td style="font-family: freesans;text-align:center;font-size:12px;" width="10%"><b>refund_by:</b>'.$row49['refund_by'].'
                  </td>
                  
                  <td style="font-family: freesans; text-align:center;font-size:12px;" width="30%"><b>Bill Time:</b>'.$row49['refund_time'].'
                  </td>
                  <td style="font-family: freesans; text-align:left;font-size:12px;" width="20%"><b>Paymant Method:</b>'.$row49['p_mode'].'
                  </td>
                  <td style="font-family: freesans; text-align:right;font-size:16px;" width="30%"><b>Grand Total:'.$row49['r_amount'].'</b>
                </td>';
                  }
                else if($record==7 ){echo 

                  '<br><br><br><br><br><br><br><footer>
                  <table width="100%">
                  <tr>
                  <td style="font-family: freesans;text-align:center;font-size:12px;" width="10%"><b>refund_by:</b>'.$row49['refund_by'].'
                  </td>
                  
                  <td style="font-family: freesans; text-align:center;font-size:12px;" width="30%"><b>Bill Time:</b>'.$row49['refund_time'].'
                  </td>
                  <td style="font-family: freesans; text-align:left;font-size:12px;" width="20%"><b>Paymant Method:</b>'.$row49['p_mode'].'
                  </td>
                  <td style="font-family: freesans; text-align:right;font-size:16px;" width="30%"><b>Grand Total:'.$row49['r_amount'].'</b>
                </td>';
                  }
                else if($record==8 ){echo 

                  '<br><br><br><br><br><br><footer>
                  <table width="100%">
                  <tr>
                  <td style="font-family: freesans;text-align:center;font-size:12px;" width="10%"><b>refund_by:</b>'.$row49['refund_by'].'
                  </td>
                  
                  <td style="font-family: freesans; text-align:center;font-size:12px;" width="30%"><b>Bill Time:</b>'.$row49['refund_time'].'
                  </td>
                  <td style="font-family: freesans; text-align:left;font-size:12px;" width="20%"><b>Paymant Method:</b>'.$row49['p_mode'].'
                  </td>
                  <td style="font-family: freesans; text-align:right;font-size:16px;" width="30%"><b>Grand Total:'.$row49['r_amount'].'</b>
                </td>';
                  }

                else if($record==9 ){echo 

                  '<br><br><br><br><br><footer>
                  <table width="100%">
                  <tr>
                  <td style="font-family: freesans;text-align:center;font-size:12px;" width="10%"><b>refund_by:</b>'.$row49['refund_by'].'
                  </td>
                  
                  <td style="font-family: freesans; text-align:center;font-size:12px;" width="30%"><b>Bill Time:</b>'.$row49['refund_time'].'
                  </td>
                  <td style="font-family: freesans; text-align:left;font-size:12px;" width="20%"><b>Paymant Method:</b>'.$row49['p_mode'].'
                  </td>
                  <td style="font-family: freesans; text-align:right;font-size:16px;" width="30%"><b>Grand Total:'.$row49['r_amount'].'</b>
                </td>';
                  }
                else if($record==10 ){echo 

                  '<br><br><br><br><br><footer>
                  <table width="100%">
                  <tr>
                  <td style="font-family: freesans;text-align:center;font-size:12px;" width="10%"><b>refund_by:</b>'.$row49['refund_by'].'
                  </td>
                  
                  <td style="font-family: freesans; text-align:center;font-size:12px;" width="30%"><b>Bill Time:</b>'.$row49['refund_time'].'
                  </td>
                  <td style="font-family: freesans; text-align:left;font-size:12px;" width="20%"><b>Paymant Method:</b>'.$row49['p_mode'].'
                  </td>
                  <td style="font-family: freesans; text-align:right;font-size:16px;" width="30%"><b>Grand Total:'.$row49['r_amount'].'</b>
                </td>
                ';
                  }

                else if($record==11 ){echo 

                  '<br><br><br><br><footer>
                  <table width="100%">
                  <tr>
                  <td style="font-family: freesans;text-align:center;font-size:12px;" width="10%"><b>refund_by:</b>'.$row49['refund_by'].'
                  </td>
                  
                  <td style="font-family: freesans; text-align:center;font-size:12px;" width="30%"><b>Bill Time:</b>'.$row49['refund_time'].'
                  </td>
                  <td style="font-family: freesans; text-align:left;font-size:12px;" width="20%"><b>Paymant Method:</b>'.$row49['p_mode'].'
                  </td>
                  <td style="font-family: freesans; text-align:right;font-size:16px;" width="30%"><b>Grand Total:'.$row49['r_amount'].'</b>
                </td>';
                  }
                else if($record==12 ){echo 

                  '<br><br><br><footer>
                  <table width="100%">
                  <tr>
                  <td style="font-family: freesans;text-align:center;font-size:12px;" width="10%"><b>refund_by:</b>'.$row49['refund_by'].'
                  </td>
                  
                  <td style="font-family: freesans; text-align:center;font-size:12px;" width="30%"><b>Bill Time:</b>'.$row49['refund_time'].'
                  </td>
                  <td style="font-family: freesans; text-align:left;font-size:12px;" width="20%"><b>Paymant Method:</b>'.$row49['p_mode'].'
                  </td>
                  <td style="font-family: freesans; text-align:right;font-size:16px;" width="30%"><b>Grand Total:'.$row49['r_amount'].'</b>
                </td>';
                  }

                else if($record==13 ){echo 

                  '<br><br><footer>
                  <table width="100%">
                  <tr>
                  <td style="font-family: freesans;text-align:center;font-size:12px;" width="10%"><b>refund_by:</b>'.$row49['refund_by'].'
                  </td>
                  
                  <td style="font-family: freesans; text-align:center;font-size:12px;" width="30%"><b>Bill Time:</b>'.$row49['refund_time'].'
                  </td>
                  <td style="font-family: freesans; text-align:left;font-size:12px;" width="20%"><b>Paymant Method:</b>'.$row49['p_mode'].'
                  </td>
                  <td style="font-family: freesans; text-align:right;font-size:16px;" width="30%"><b>Grand Total:'.$row49['r_amount'].'</b>
                </td>';
                  }

                  else if($record==14 ){echo 

                    '<br><footer>
                    <table width="100%">
                    <tr>
                    <td style="font-family: freesans;text-align:center;font-size:12px;" width="10%"><b>refund_by:</b>'.$row49['refund_by'].'
                    </td>
                    
                    <td style="font-family: freesans; text-align:center;font-size:12px;" width="30%"><b>Bill Time:</b>'.$row49['refund_time'].'
                    </td>
                    <td style="font-family: freesans; text-align:left;font-size:12px;" width="20%"><b>Paymant Method:</b>'.$row49['p_mode'].'
                    </td>
                    <td style="font-family: freesans; text-align:right;font-size:16px;" width="30%"><b>Grand Total:'.$row49['r_amount'].'</b>
                </td>';
                    }

                else if($record==15){echo 
                    '<footer>
                    <table width="100%">
                    <tr>
                    <td style="font-family: freesans;text-align:center;font-size:12px;" width="10%"><b>refund_by:</b>'.$row49['refund_by'].'
                    </td>
                    
                    <td style="font-family: freesans; text-align:center;font-size:12px;" width="30%"><b>Bill Time:</b>'.$row49['refund_time'].'
                    </td>
                    <td style="font-family: freesans; text-align:left;font-size:12px;" width="20%"><b>Paymant Method:</b>'.$row49['p_mode'].'
                    </td>
                    <td style="font-family: freesans; text-align:right;font-size:16px;" width="30%"><b>Grand Total:'.$row49['r_amount'].'</b>
                </td>';
                    }

                    else {echo 
                      '<footer>
                      <table width="100%">
                      <tr>
                      <td style="font-family: freesans;text-align:center;font-size:12px;" width="10%"><b>refund_by:</b>'.$row49['refund_by'].'
                      </td>
                      
                      <td style="font-family: freesans; text-align:center;font-size:12px;" width="30%"><b>Bill Time:</b>'.$row49['refund_time'].'
                      </td>
                      <td style="font-family: freesans; text-align:left;font-size:12px;" width="20%"><b>Paymant Method:</b>'.$row49['p_mode'].'
                      </td>
                      <td style="font-family: freesans; text-align:right;font-size:16px;" width="30%"><b>Grand Total:'.$row49['r_amount'].'</b>
                </td>
                      
                      ';
                      }
                ?>
                

                     
	</table>
    </footer>
    <table style="border:1px">
	<center><button id="PrintButton" onclick="PrintPage()">Print</button></center>
    

</body>
<script type="text/javascript">
	function PrintPage() {
		window.print();
	}
	document.loaded = function(){
		
	}
	window.addEventListener('DOMContentLoaded', (event) => {
   		PrintPage()
		setTimeout(function(){ window.close() },750)
	});
</script>


<script>
/*    function printPage(divName){
             var printContents = document.getElementById(divName).innerHTML;
             var originalContents = document.body.innerHTML;
             document.body.innerHTML = printContents;
             window.print();
             document.body.innerHTML = originalContents;
             window.addEventListener("afterprint", function(event) {
                 alert('Appointment Bill Successfully Done');
                 window.location.href = 'appointment.php';
             });
        }*/

        $(document).ready(function() {
          let barcodeValue = <?= $row49['billno'] ?>;
          let displayText = "BillNo: " + barcodeValue;
          JsBarcode("#mrn", barcodeValue, {
            displayValue: true,
            text: displayText,
            width:3,
  height: 40,
  font:5,          
          });
        });        

        $(document).ready(function() {
          let barcodeValue = <?= $row49['id'] ?>;
          let displayText = "Refund ID: " + barcodeValue;
          JsBarcode("#id", barcodeValue, {
            
            displayValue: true,
            text: displayText,
            width:3,
  height: 40,
  font:5,
  
            
          });
        });
    </script>
</html>


