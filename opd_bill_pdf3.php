<?php
//GET Data
$id=$_REQUEST['ID'];
//db connection 
define ('DB_USER', 'root');
define ('DB_PASSWORD','Godiloveu16');
define ('DB_HOST','localhost');
define ('DB_NAME','sfmmkpjnew');
//db connection check
$db=mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME) OR die
('Could not connect to MySQL :'.mysqli_connect_error());
//data check to database
$assoc=mysqli_fetch_assoc(mysqli_query($db,"SELECT * FROM pappnew WHERE ID='$id'"));
if($assoc==null){
echo "<script>alert('Patient Not Found');</script>";
}
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>PMS - Appointment Bill Paper</title>
    <link href="bill/bootstrap.min.css" rel="stylesheet">
    <script src="bill/jquery-3.6.0.min.js"></script>
    <script src="bill/JsBarcode.all.min.js"></script>
        <style>
        .barcode {
            width: 500px;
            height: 80px;
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

        
    </style>
  </head>
  <body onload="document.title='PMS-Appointment-Bill-Paper-<?= date('Y-m-d') ?>'; printPage('PrintSection'); redirectTo('appointment.php');">
 <!--  <body> -->
<div id='PrintSection' class="container-fluid">
<br>
  <div style="border:1px solid;padding:5px;">
     <div class="row">
       <div class="col-2">
        <img height="100px" width="100px" src="sfmmkpjsh.png">
       </div>       
       <div class="col-4" style="font-size:11px;">
        <p style="font-size:12px;"><b>SHEIKH FAZILATUNNESSA MUJIB MEMORIAL KPJ SPECIALIZED HOSPITAL & NURSING COLLEGE</b></p><address>C/12, Tetuibari, Kasimpur, Gazipur, Bangladesh</address>
       </div>       
        
        <div class="col-6">
            <table class="table text-left" style="font-size:12px;line-height:0.1;border-bottom:0px white;">
                <tr>
                    <td><b>MRN :</b> <span></span> <?= $assoc['pmrn'] ?></td>
                    <td><b>ID :</b> <?= $assoc['ID'] ?></td>
                </tr>
                <tr>          
                    <td colspan="col-2"><b>Name :</b> <?= $assoc['pname'] ?></td>
                </tr>           
                <tr>          
                    <td><b>Age :</b> <?= $assoc['page'] ?> </td>
                    <td><b>Year  :</b> <?= $assoc['yage'] ?></td>
                </tr>           
                <tr>          
                    <td><b>Gender :</b> <?= $assoc['psex'] ?></td>
                    <td><b>Patient Type :</b> <?= $assoc['ptype'] ?></td>
                </tr>            
                <tr>          
                    <td><b>Serial Date :</b> <?= $assoc['adate'] ?> </td>
                    <td><b>Serial Time :</b> <?= $assoc['aslot'] ?></td>
                </tr>          
            </table>
        </div>
     </div>
  </div>
  <div style="border:1px solid;">
     <div class="row">
          <div class="col-6 text-center">
          <p><svg class="barcode" id="mrn"></svg></p>
         </div>       
         <div class="col-6 text-center">
          <p><svg class="barcode" id="id"></svg></p>
         </div>
     </div>
  </div>
  <div style="border:1px solid;">
           <table class="table table-bordered text-center"  style="border:1px solid;width:100%;">
           <tr>
              <th>SL</th>
              <th>DESCRIPTION</th>
              <th>DOCTOR</th>
              <th>AMOUNT</th>
           </tr>           
           <tr>
              <td>1</td>
              <td>OPD Consultation</td>
              <td><?= $assoc['dname'] ?></td>
              <td><?= $assoc['payment'] ?> TK</td>
           </tr>          
        </table>
  </div>
  <div style="border:1px solid;padding:5px;">
     <div class="row">
       <div class="col-4">
        <p><b>Received Amount : </b> <span style="font-size:11px;">Eight Hundred TK</span></p>
       </div>       
       <div class="col-4">
        <p><b>Payment Method :</b> Cash</p>
       </div>
       <div class="col-4">
        <p><b>Gross Amount :</b> <?= $assoc['payment'] ?> TK</p>
       </div>  
       <div class="col-4">
        <br>
        <p><b>Cashier Signature :</b></p>
       </div>        
       <div class="col-4">
        <br>
        <p><b>Web : www.sfmmkpjsh.com</b></p>
       </div>       
       <div class="col-4 text-right">
        <br>
        <p><b>Bill Date :</b> <?= $assoc['billtime'] ?></p>
       </div>       
       <div class="col-12 text-center" style="font-size:11px;">
        <p><b>Hospital Contact Numbers - </b> <b>Ambulance :</b> +880244077029, +8801791987466 <b>Appointments :</b> +880244077030, +8801703788561, +8801810008080 </p>
       </div>        
     </div>
  </div>
</div>

    <script src="bootstrap.bundle.min.js"></script>
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
          let barcodeValue = <?= $assoc['pmrn'] ?>;
          let displayText = "MRN: " + barcodeValue;
          JsBarcode("#mrn", barcodeValue, {
            displayValue: true,
            text: displayText,
            width: 4,
  height: 40,
          });
        });        

        $(document).ready(function() {
          let barcodeValue = <?= $assoc['ID'] ?>;
          let displayText = "ID: " + barcodeValue;
          JsBarcode("#id", barcodeValue, {
            displayValue: true,
            text: displayText,
            width: 4,
  height: 40,
          });
        });
    </script>
  </body>
</html>
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
