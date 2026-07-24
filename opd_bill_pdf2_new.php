<!DOCTYPE html>
<?php
	require 'db1.php';
    $pmrn=$_REQUEST['pmrn'];
	    $billno=$_REQUEST['billno'];
	$dname=$_REQUEST['dname'];
	$adate1=$_REQUEST['adate1'];
//db connection 
define ('DB_USER', 'root');
define ('DB_PASSWORD','Godiloveu16');
define ('DB_HOST','localhost');
define ('DB_NAME','sfmmkpjnew');
//db connection check
$db=mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME) OR die
('Could not connect to MySQL :'.mysqli_connect_error());
//data check to database
$row43=mysqli_fetch_assoc(mysqli_query($db,"SELECT * FROM pappnew WHERE pmrn='$pmrn' and dname='$dname' and adate1='$adate1' "));
$id=$row43['ID'];


$row44=mysqli_fetch_assoc(mysqli_query($db,"SELECT COUNT(ID) FROM pappnew WHERE ID='$id'"));
//echo $row44['COUNT(ID)'];

$row45=mysqli_fetch_assoc(mysqli_query($db,"SELECT SUM(amount) FROM opd_bill WHERE pmrn='$pmrn' and date='$adate1' and location='OPD' and billno='$billno'"));
$row46=mysqli_fetch_assoc(mysqli_query($db,"SELECT * FROM opd_bill WHERE pmrn='$pmrn' and dname='$dname' and date='$adate1' and location='OPD' and billno='$billno'"));


$objConnect = mysqli_connect("localhost","root","Godiloveu16") or die("Error Connect to Database");
$objDB = mysqli_select_db($objConnect,"sfmmkpjnew");
$strSQL = "Select * from opd_bill where pmrn= '$pmrn' and date='$adate1' and location='OPD' and billno='$billno' order by `id` asc;";
$objQuery = mysqli_query($objConnect,$strSQL) or die ("Error Query [".$strSQL."]");

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
                        : <?php echo $row43['psex'];?></b><br>
                        
                        
                        </td>
                        
                        <td style="font-family: freesans; text-align:left;font-size:14px;" width="40%"><b>Patient Type &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;: <?php echo $row43['ptype'];?></b>
                        <br><b>Appointment Date 
                        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;: <?php echo date('d/m/Y', strtotime($row43['adate1']));?></b>
                        <br><b>Appointment Time No: <?php echo $row43['aslot'];?></b>
                        <br><b>Bill Status &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;: <?php echo $row43['bill'];?></b><br>
                        
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
                        <td style="font-family: freesans;font-size:12px;" width="5%"><b>S/NO </b>
                        </td>
                        
                        <td style="font-family: freesans; text-align:left;font-size:12px;" width="25%"><b>Description</b>
                        </td>

                        <td style="font-family: freesans; text-align:left;font-size:12px;" width="60%"><b>Particulars</b>
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
                        
                        

                        <td style="font-family: freesans; text-align:left;font-size:12px;" width="25%"><?php echo $row['remarks'];?>
                        </td>

<?php if($row['remarks']!='NEW MRN'){echo'						
						<td style="font-family: freesans; text-align:left;font-size:12px;" width="60%">'.$row['dname'].'
</td>';}
else {
	
	echo'<td style="font-family: freesans; text-align:left;font-size:12px;" width="60%">Registration Charge';
}
						
						?>

                        <td style="font-family: freesans; text-align:left;font-size:12px;" width="10%"><?php echo $row['amount'];?>
                        </td>

                        
                    </tr>

                    <?php
 $count++;}
?>
                    
					
                    
                    
                    
                </table>


                <?php if($row44['COUNT(ID)']==1){echo 
                '<br><br><br><br><br><br><br>
                <br><br><br><br><br>
                <footer>
                <table width="100%">
                <tr>
                <td style="font-family: freesans;text-align:center;font-size:10px;" width="10%"><b>Billed By:</b>'.$row46['user'].'
                </td>
                
                <td style="font-family: freesans; text-align:center;font-size:10px;" width="30%"><b>Billed Time:</b>'.$row46['time'].'
                </td>
                <td style="font-family: freesans; text-align:left;font-size:10px;" width="20%"><b>Paymant Mode:</b>'.$row46['p_mode'].'
                </td>
				<td style="font-family: freesans; text-align:right;font-size:16px;" width="30%"><b>Grand Total:'.$row45['SUM(amount)'].' Taka</b>
                </td>
				';
                }

                else if($row44['COUNT(ID)']==2){echo 
                    '<br><br><br><br><br><br><br>
                    <br>
                    <footer>
                    <table width="100%">
                    <tr>
                    <td style="font-family: freesans;text-align:center;font-size:10px;" width="10%"><b>Billed By:</b>'.$row46['user'].'
                    </td>
                    
                    <td style="font-family: freesans; text-align:center;font-size:10px;" width="30%"><b>Bill Time:</b>'.$row46['time'].'
                    </td>
                    <td style="font-family: freesans; text-align:left;font-size:10px;" width="20%"><b>Paymant Method:</b>'.$row46['p_mode'].'
                    </td>
					<td style="font-family: freesans; text-align:right;font-size:16px;" width="30%"><b>Grand Total:'.$row45['SUM(amount)'].' Taka</b>
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
	/*function PrintPage() {
		window.print();
	}
	document.loaded = function(){
		
	}
	window.addEventListener('DOMContentLoaded', (event) => {
   		PrintPage()
		setTimeout(function(){ window.close() },750)
		
		//setTimeout(function(),750)
		window.location.href = 'ccgg1new_test1_new1_bill_new_1_old1.php';
	});
	*/
	
	
	  window.print();
    setTimeout(function() {
        window.location.href = "ccgg1new_test1_new1_bill_new_1_old1.php";
    }, 3000); // Redirect after 3 seconds (adjust as needed)
</script>


<script>
        $(document).ready(function() {
          let barcodeValue = <?= $row43['pmrn'] ?>;
          let displayText = "MRN: " + barcodeValue;
          JsBarcode("#mrn", barcodeValue, {
            displayValue: true,
            text: displayText,
            width:3,
  height: 40,
  font:5,          
          });
        });        

        $(document).ready(function() {
          let barcodeValue = <?= $row46['billno'] ?>;
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


