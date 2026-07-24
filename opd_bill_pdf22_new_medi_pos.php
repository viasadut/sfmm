<!DOCTYPE html>
<?php
	require 'db1.php';
    $id=$_REQUEST['id'];
    $pmrn=$_REQUEST['pmrn'];
    $eid=$_REQUEST['eid'];
	$billno=$_REQUEST['billno'];
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

$row44=mysqli_fetch_assoc(mysqli_query($db,"SELECT COUNT(id) FROM phar_sale WHERE location IN ('OPD','OPD-DIS','OPD_DIS','OTC_Sale','OPD_Medi','OTC') and billno='$billno'"));
//echo $row44['COUNT(pmrn)'];
$objConnect = mysqli_connect("localhost","root","Godiloveu16") or die("Error Connect to Database");
$objDB = mysqli_select_db($objConnect,"sfmmkpjnew");
$strSQL = "Select * from phar_sale where billno='$billno' and location IN ('OPD','OPD-DIS','OPD_DIS','OTC_Sale','OPD_Medi','OTC') order by `id` desc;";
$objQuery = mysqli_query($objConnect,$strSQL) or die ("Error Query [".$strSQL."]");

$strSQL1 = "Select * from phar_sale where billno= '$billno' and location IN ('OPD','OPD-DIS','OPD_DIS','OTC_Sale','OPD_Medi','OTC')  order by `id` desc;";
$objQuery1 = mysqli_query($objConnect,$strSQL1) or die ("Error Query [".$strSQL1."]");
$row43=mysqli_fetch_array($objQuery1);
//$dname='OTC Sale';
$kk=$row43['pmrn'];

$strSQL2 = "Select * from doctor1 where dname= '$dname' and status in ('Active','active') order by `did` desc;";
$objQuery2 = mysqli_query($objConnect,$strSQL2) or die ("Error Query [".$strSQL2."]");
$row49=mysqli_fetch_array($objQuery2);



$row45=mysqli_fetch_assoc(mysqli_query($db,"SELECT SUM(tprice) FROM phar_sale WHERE location='OPD' and billno='$billno'"));
//echo $row45['SUM(price)'];



//echo $row46['desig'];


$strSQL16 = "Select * from pms_bill where billno= '$billno';";
$objQuery16 = mysqli_query($objConnect,$strSQL16) or die ("Error Query [".$strSQL1."]");
$row433=mysqli_fetch_array($objQuery16);
$payable=$row433['amount']-$row433['dis_amount'];

$strSQL15 = "Select * from phar_sale where billno= '$billno' order by `id` desc;";
$objQuery15 = mysqli_query($objConnect,$strSQL15) or die ("Error Query [".$strSQL1."]");
$row15=mysqli_fetch_array($objQuery15);



$strSQL_opd = "Select * from pappnew where pmrn='$pmrn' and eid='$eid'";
$objQuery_opd = mysqli_query($objConnect,$strSQL_opd) or die ("Error Query [".$strSQL."]");
$objQuery_opd1=mysqli_fetch_array($objQuery_opd);
?>
<?php
function convert_to_words_array($number)
{
    $words = array(
        '0' => 'Zero', '1' => 'One', '2' => 'Two',
        '3' => 'Three', '4' => 'Four', '5' => 'Five',
        '6' => 'Six', '7' => 'Seven', '8' => 'Eight',
        '9' => 'Nine', '10' => 'Ten', '11' => 'Eleven',
        '12' => 'Twelve', '13' => 'Thirteen', '14' => 'Fourteen',
        '15' => 'Fifteen', '16' => 'Sixteen', '17' => 'Seventeen',
        '18' => 'Eighteen', '19' => 'Nineteen', '20' => 'Twenty',
        '30' => 'Thirty', '40' => 'Forty', '50' => 'Fifty', '60' => 'Sixty',
        '70' => 'Seventy', '80' => 'Eighty', '90' => 'Ninety'
    );

    if ($number <= 20) {
        return $words[$number];
    }
    elseif ($number < 100) {
        return $words[10 * floor($number / 10)]
            . ($number % 10 > 0 ? ' ' . $words[$number % 10] : '');
    }
    else {
        $output = '';
        if ($number >= 1000000000) {
            $output .= convert_to_words_array(floor($number / 1000000000))
                . ' Billion ';
            $number %= 1000000000;
        }
        if ($number >= 100000) {
            $output .= convert_to_words_array(floor($number / 100000))
                . ' Lac ';
            $number %= 100000;
        }
		
		
        if ($number >= 1000) {
            $output .= convert_to_words_array(floor($number / 1000))
                . ' Thousand ';
            $number %= 1000;
        }
        if ($number >= 100) {
            $output .= convert_to_words_array(floor($number / 100))
                . ' Hundred ';
            $number %= 100;
        }
        if ($number > 0) {
            $output .= ($number <= 20) ? $words[$number] :
            $words[10 * floor($number / 10)] . ' '
                . ($number % 10 > 0 ? $words[$number % 10] : '');
        }
        return trim($output); 
    }
}


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
                        
                        <td width="100%" style="text-align: center; font-weight: bold; font-size:20px; font-family: freesans;">
                        KPJ SPECIALIZED HOSPITAL <br>
                        <span style="text-align: center; font-weight: bold; font-size:14px; font-family: freesans;">C/12, Tetuibari, Kashimpur, Gazipur, Bangladesh.</span> </td>
						
                        
                    </tr>
                </table>
                

               <div style="border:0px solid; margin-left:5px;margin-right:20px;">
        
            <table  width="100%" >
              <tr>
                        <td style="font-family: freesans;font-size:14px;" width="60%"> <b>Patient Name : <?php echo $row15['pname'];?></b>
                        <br><b>MRN &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                        : <?php echo $row15['pmrn'];?></b>
                        <br><b>Age &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                        : <?php echo $objQuery_opd1['page'];?></b>
                        <br><b>Gender &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                        : <?php echo $objQuery_opd1['psex'];?></b><br>
                        
                        <b>Ref. By &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                        : <?php echo $objQuery_opd1['dname'];?></b><br>
                        
                        </td>
                        
                        
                    </tr>
					
					<tr>
                        <td style="font-family: freesans;font-size:14px;" width="100%"> <b>Bill BY &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;: <?php echo $row433['user'];?></b>
                        <br><b>Bill Time&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; 
                        : <?php echo $row433['time'];?></b>
                        <br><b>Payment Mode 
                        : <?php echo $row433['p_mode'];?></b>
                        
                        
                        
                        </td>
                        
                        
                        
                        
                        
                    </tr>
					
					<tr>
					<td style="font-family: freesans; text-align:center;font-size:20px;font-weight:bold" width="100%"><b><?php echo $dname;?></b>
						<br />
						 Queue No : <?php echo $row433['queue'];?>
                        
                        </td>
                        </tr>
				
				
					
                    </table>
                    
                    <table width="100%">
                    <tr>
                    <td style="font-family: freesans; text-align:left;" width="10%"><svg id="id"></svg></td>
                    <td style="font-family: freesans; text-align:left;" width="80%"></td>
                    <td style="font-family: freesans; text-align:left;" width="10%"></td>


                    </tr>
                </table>
</div>

	</header>

<hr style="width=100%; font-weight:20px;"/>
		<div style="border:0px solid;margin-left:5px;margin-right:5px;">
		
<table width="100%" style="border:1px solid black;">
                
              <tr>
			  
                        
                        

                        <td style="font-family: freesans; text-align:left;font-size:14px;border:1px solid black;" width="80%"><b>Medicine Name</b>
                        </td>
                        <td style="font-family: freesans; text-align:left;font-size:14px;border:1px solid black;" width="5%"><b>Qty</b>
                        </td>
<td style="font-family: freesans; text-align:left;font-size:14px;border:1px solid black;" width="5%"><b>Unit
Price</b>
                        </td>
						
						<td style="font-family: freesans; text-align:left;font-size:14px;border:1px solid black;" width="10%"><b>Total
						Price</b>
                        </td>
                        
                    </tr>
					
                    <?php
$count = 1;
while($row = mysqli_fetch_array($objQuery))
{
$i5++;

?>

                   

                    <tr>
                        
                        

                        <td style="font-family: freesans; text-align:left;font-size:14px;border:1px solid black;" width="85%"><?php echo $count.'. '.$row['medi'].'('.$row['brand'].')';?>
                        </td>
                        <td style="font-family: freesans; text-align:center;font-size:14px;border:1px solid black;" width="5%"><?php echo $row['qty'];?>
                        </td>
<td style="font-family: freesans; text-align:center;font-size:14px;border:1px solid black;" width="5%"><?php echo $row['uprice'];?>
                        </td>
                        <td style="font-family: freesans; text-align:center;font-size:14px;border:1px solid black;" width="10%"><?php echo $row['tprice'];?>
                        </td>
                    </tr>

                    <?php
 $count++;}
?>
                    
	</table>				
					<?php if($row433['dis_amount']>0){echo'
					
					<table width="100%" style="border:1px solid black;">
					<tr>
                        
                     <td style="font-family: freesans;text-align:left;font-size:14px;font-weight:bold" width="30%">
                        </td>
						<td style="font-family: freesans;text-align:left;font-size:14px;font-weight:bold" width="10%">
                        </td>
                        <td style="font-family: freesans;text-align:left;font-size:14px;font-weight:bold" width="40%">Total Amount
                        </td>
                        

                        <td style="font-family: freesans;font-size:14px;font-weight:bold;text-align:right;" width="20%">'.$row433['amount'].'
                        </td>

                    </tr>
					
					<tr>
                        
                        
<td style="font-family: freesans;text-align:left;font-size:14px;font-weight:bold" width="30%">
                        </td>
						<td style="font-family: freesans;text-align:left;font-size:14px;font-weight:bold" width="10%">
                        </td>
                        <td style="font-family: freesans;text-align:left;font-size:14px;font-weight:bold" width="40%">Discount
                        </td>
                        

                        <td style="font-family: freesans;font-size:14px;font-weight:bold;text-align:right;" width="20%">(-) '.$row433['dis_amount'].'
                        </td>
                    </tr>
					</table>';}?>
                               
                


                <?php 
                $record=$row44['COUNT(id)'];
                if($record>0){echo 
                '
                <footer>
                <table width="100%" style="border:1px solid black;">
                <tr>
                
                <td style="font-family: freesans; text-align:right;font-size:18px;" width="30%"><b>Grand Total:'.$payable.'</b>
                </td></tr></table>';
                }
                
                ?>
                
                     
	
	<br />
	In words:&nbsp;<?php echo convert_to_words_array($payable)?>	Taka Only.
	<br /><br />&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;***** Received With Thanks *****
	</div>
<br />	
<div style="border:1px solid;margin-left:100px;margin-right:5px; text-align:center; width:90px; font:weight:bold; font-size:30px;">
PAID

</div>
<div style="border:0px solid;margin-left:5px;margin-right:5px; text-align:left">
<br />Note: Cutting Strips, Opened Containters, Insulin, Liquid Cream, Ointment, Temperature Sensitive Medicines & Medical Items are not returnable.
</div>
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

       /* $(document).ready(function() {
          let barcodeValue = <?= $kk; ?>;
          let displayText = "MRN: " + barcodeValue;
          JsBarcode("#mrn", barcodeValue, {
            displayValue: true,
            text: displayText,
            width:3,
  height: 40,
  font:5,          
          });
        });        
*/
        $(document).ready(function() {
          let barcodeValue = <?= $billno; ?>;
          let displayText = "ID: " + barcodeValue;
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


