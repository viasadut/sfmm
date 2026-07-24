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

$row44=mysqli_fetch_assoc(mysqli_query($db,"SELECT COUNT(id) FROM phar_sale WHERE location='OTC' and billno='$billno'"));
//echo $row44['COUNT(pmrn)'];
$objConnect = mysqli_connect("localhost","root","Godiloveu16") or die("Error Connect to Database");
$objDB = mysqli_select_db($objConnect,"sfmmkpjnew");
$strSQL = "Select * from phar_sale where billno='$billno' and location='OTC' order by `id` desc;";
$objQuery = mysqli_query($objConnect,$strSQL) or die ("Error Query [".$strSQL."]");

$strSQL1 = "Select * from phar_sale where billno= '$billno' and location='OTC'  order by `id` desc;";
$objQuery1 = mysqli_query($objConnect,$strSQL1) or die ("Error Query [".$strSQL1."]");
$row43=mysqli_fetch_array($objQuery1);
//$dname='OTC Sale';
$kk=$row43['pmrn'];

$strSQL2 = "Select * from doctor1 where dname= '$dname' and status in ('Active','active') order by `did` desc;";
$objQuery2 = mysqli_query($objConnect,$strSQL2) or die ("Error Query [".$strSQL2."]");
$row49=mysqli_fetch_array($objQuery2);



$row45=mysqli_fetch_assoc(mysqli_query($db,"SELECT SUM(tprice) FROM phar_sale WHERE location='OTC' and billno='$billno'"));
//echo $row45['SUM(price)'];



//echo $row46['desig'];


$strSQL16 = "Select * from pms_bill where billno= '$billno';";
$objQuery16 = mysqli_query($objConnect,$strSQL16) or die ("Error Query [".$strSQL1."]");
$row433=mysqli_fetch_array($objQuery16);
$payable=$row433['amount']-$row433['dis_amount'];

$strSQL15 = "Select * from phar_sale where billno= '$billno' order by `id` desc;";
$objQuery15 = mysqli_query($objConnect,$strSQL15) or die ("Error Query [".$strSQL1."]");
$row15=mysqli_fetch_array($objQuery15);

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
                        <td width="10%" align="right"></td>
                        <td width="90%" align="left" style="text-align: left; font-weight: bold; font-size:10px; font-family: freesans;">
                        KPJ SPECIALIZED HOSPITAL <br>
                        C/12, Tetuibari, Kashimpur, Gazipur, Bangladesh. </td>
						
                        
                    </tr>
                </table>
                <br />

               <div style="border:0px solid; margin-left:30px;margin-right:20px;">
        
            <table  width="100%" >
			<tr>
					<td style="font-family: freesans; text-align:center;font-size:30px;font-weight:bold" width="100%">
						
						 Queue No : <?php echo $row433['queue'];?>
                        
                        </td>
                        </tr>
              <tr>
                        <td style="font-family: freesans;font-size:14px;" width="60%"> <br /><b>Patient Name : <?php echo $row15['pname'];?></b>
                        <br><b>MRN &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                        : <?php echo $row15['pmrn'];?></b>
                        <br><b>Age &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                        : <?php echo $row15['page'];?></b>
                        <br><b>Gender &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                        : <?php echo $row15['psex'];?></b><br>
                        
                        
                        </td>
                        
                        
                    </tr>
					
					<tr>
                        <td style="font-family: freesans;font-size:14px;" width="100%"> <b>Bill No: <?php echo $row433['billno'];?></b>
                        
                        </td>
                        
                        
                        
                        
                        
                    </tr>
					
					
				
				
					
                    </table>
                    
                    <table width="100%">
                    <tr>
                    <td style="font-family: freesans; text-align:left;" width="10%"><svg id="id2"></svg></td>
                    <td style="font-family: freesans; text-align:left;" width="80%"></td>
                    <td style="font-family: freesans; text-align:left;" width="10%"></td>


                    </tr>
                </table>
</div>

	</header>

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
          let barcodeValue = <?= $row43['billno']; ?>;
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


