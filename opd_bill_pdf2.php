<!DOCTYPE html>
<?php
	require 'db1.php';
    $id=$_REQUEST['id'];
//db connection 
define ('DB_USER', 'root');
define ('DB_PASSWORD','Godiloveu16');
define ('DB_HOST','localhost');
define ('DB_NAME','sfmmkpjnew');
//db connection check
$db=mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME) OR die
('Could not connect to MySQL :'.mysqli_connect_error());
//data check to database
$row43=mysqli_fetch_assoc(mysqli_query($db,"SELECT * FROM pappnew WHERE ID='$id'"));

$row44=mysqli_fetch_assoc(mysqli_query($db,"SELECT COUNT(ID) FROM pappnew WHERE ID='$id'"));
//echo $row44['COUNT(ID)'];

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
                        <td style="font-family: freesans;font-size:18px;" width="5%"><b>S/NO </b>
                        </td>
                        
                        <td style="font-family: freesans; text-align:left;font-size:18px;" width="25%"><b>Description</b>
                        </td>

                        <td style="font-family: freesans; text-align:left;font-size:18px;" width="60%"><b>Doctor Name</b>
                        </td>
                        <td style="font-family: freesans; text-align:left;font-size:18px;" width="10%"><b>Amount</b>
                        </td>

                        
                    </tr>


                    <tr>
                        <td style="font-family: freesans;font-size:18px;" width="5%">1. 
                        </td>
                        
                        <td style="font-family: freesans; text-align:left;font-size:18px;" width="25%">OPD Consultation
                        </td>

                        <td style="font-family: freesans; text-align:left;font-size:18px;" width="60%"><?php echo $row43['dname'];?>
                        </td>
                        <td style="font-family: freesans; text-align:center;font-size:18px;" width="10%"><?php echo $row43['payment'];?>
                        </td>

                        
                    </tr>

                    
                    
                    
                </table>


                <?php if($row44['COUNT(ID)']==1){echo 
                '<br><br><br><br><br><br><br>
                <br><br><br><br><br>
                <footer>
                <table width="100%">
                <tr>
                <td style="font-family: freesans;text-align:center;font-size:14px;" width="10%"><b>Billed By:</b>'.$row43['billby'].'
                </td>
                
                <td style="font-family: freesans; text-align:center;font-size:14px;" width="30%"><b>Billed Time:</b>'.$row43['billtime'].'
                </td>
                <td style="font-family: freesans; text-align:left;font-size:14px;" width="20%"><b>Paymant Mode:</b>'.$row43['pmethod'].'
                </td>';
                }

                else if($row44['COUNT(ID)']==2){echo 
                    '<br><br><br><br><br><br><br>
                    <br>
                    <footer>
                    <table width="100%">
                    <tr>
                    <td style="font-family: freesans;text-align:center;font-size:18px;" width="10%"><b>Billed By:</b>'.$row43['billby'].'
                    </td>
                    
                    <td style="font-family: freesans; text-align:center;font-size:18px;" width="30%"><b>Bill Time:</b>'.$row43['billtime'].'
                    </td>
                    <td style="font-family: freesans; text-align:left;font-size:18px;" width="20%"><b>Paymant Method:</b>'.$row43['pmethod'].'
                    </td>';
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
          let barcodeValue = <?= $row43['pmrn'] ?>;
          let displayText = "MRN: " + barcodeValue;
          JsBarcode("#mrn", barcodeValue, {
            displayValue: true,
            text: displayText,
            width:1.5,
  height: 40,
  font:5,          
          });
        });        

        $(document).ready(function() {
          let barcodeValue = <?= $row43['ID'] ?>;
          let displayText = "ID: " + barcodeValue;
          JsBarcode("#id", barcodeValue, {
            
            displayValue: true,
            text: displayText,
            width:1.5,
  height: 40,
  font:5,
  
            
          });
        });
    </script>
</html>


