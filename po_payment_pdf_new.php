<!DOCTYPE html>
<?php
	require 'db1.php';
    $encryption=$_REQUEST['ono'];
    $options = 0;
    $ciphering = "AES-256-CTR";
    $decryption_iv = '1234567891011121';
    $decryption_key = "kpj";
    $decryption=openssl_decrypt ($encryption, $ciphering,
    $decryption_key, $options, $decryption_iv);
    //$id = $decryption;
    $id=$_REQUEST['ono'];
//db connection 
define ('DB_USER', 'root');
define ('DB_PASSWORD','Godiloveu16');
define ('DB_HOST','localhost');
define ('DB_NAME','sfmmkpjnew');
//db connection check
$db=mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME) OR die
('Could not connect to MySQL :'.mysqli_connect_error());
//data check to database
$row43=mysqli_fetch_assoc(mysqli_query($db,"SELECT * FROM pms_payment WHERE billno='$id'"));

$row44=mysqli_fetch_assoc(mysqli_query($db,"SELECT COUNT(billno) FROM pms_payment WHERE billno='$id'"));
//$id=$row43['ID'];



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
                        <td style="font-family: freesans;font-size:14px;" width="60%"> <b>Payee Name : <?php echo $row43['creditor_name'];?></b>
                        <br><b>Bill No &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                        : <?php echo $row43['billno'];?></b>
                        <br><b>BillDate &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                        : <?php echo $row43['time'];?></b>
                        
                        
                        
                        </td>
                        
                        <td style="font-family: freesans; text-align:left;font-size:14px;" width="40%"><b>PO NO &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;: <?php echo $row43['ono'];?></b>
                        <br><b>Cheque Date 
                        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;: <?php echo date('d/m/Y', strtotime($row43['date']));?></b>
                        <br><b>Cheque No &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;: <?php echo $row43['cheque_no'];?></b>
                        <br><b>Bank Name&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;: <?php echo $row43['bank_name'];?></b><br>
                        
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
                        
                        <td style="font-family: freesans; text-align:left;font-size:12px;" width="75%"><b>Description</b>
                        </td>

                        <td style="font-family: freesans; text-align:right;font-size:12px;" width="20%"><b>Amount</b>
                        </td>

                        
                    </tr>


					
<tr>
                        <td style="font-family: freesans;font-size:12px;text-align:center" width="5%"><?php echo '1';?>
                        </td>
                        
                        

                        <td style="font-family: freesans; text-align:left;font-size:12px;" width="75%"><?php echo 'Payment Against PO NO'.'- '.$row43['ono'];?>
                        </td>


                        <td style="font-family: freesans; text-align:right;font-size:12px;" width="20%"><?php echo $row43['paying_amount'];?>
                        </td>

                        
                    </tr>
    </table>

<?php if($row43['remarks']!=''){echo'
                    <br><br><br><table><tr>
                        <td style="font-family: freesans;font-size:12px;text-align:left" width="100%">Remarks: '.$row43['remarks'].'
                        </td>
                        
                        

                        
                        
                    </tr></table>';}?>

					
                    
                    
                    
                


                <?php if($row44['COUNT(billno)']==1 and $row43['remarks']==''){echo 
                '<br><br><br><br><br><br><br>
                <br><br><br><br><br>
                <footer>
                <table width="100%">
                <tr>
                <td style="font-family: freesans;text-align:center;font-size:10px;" width="10%"><b>Prepared By:</b>'.$row43['user'].'
                </td>
                
                <td style="font-family: freesans; text-align:center;font-size:10px;" width="30%"><b>Prepared Time:</b>'.$row43['time'].'
                </td>
                <td style="font-family: freesans; text-align:left;font-size:10px;" width="20%"><b>Receiver Signature:</b>'.$row43['p_mode'].'
                </td>
				<td style="font-family: freesans; text-align:right;font-size:16px;" width="30%"><b>Grand Total:'.$row43['paying_amount'].' Taka</b>
                </td>
				';
                }

                if($row44['COUNT(billno)']==1 and $row43['remarks']!=''){echo 
                    '<br><br><br><br><br><br><br><br><br>
                    
                    <footer>
                    <table width="100%">
                    <tr>
                    <td style="font-family: freesans;text-align:center;font-size:10px;" width="10%"><b>Prepared By:</b>'.$row43['user'].'
                    </td>
                    
                    <td style="font-family: freesans; text-align:center;font-size:10px;" width="30%"><b>Prepared Time:</b>'.$row43['time'].'
                    </td>
                    <td style="font-family: freesans; text-align:left;font-size:10px;" width="20%"><b>Receiver Signature:</b>'.$row43['p_mode'].'
                    </td>
                    <td style="font-family: freesans; text-align:right;font-size:16px;" width="30%"><b>Grand Total:'.$row43['paying_amount'].' Taka</b>
                    </td>
                    ';
                    }

                else if($row44['COUNT(ID)']==2){echo 
                    '<br><br><br><br><br><br><br>
                    <br>
                    <footer>
                    <table width="100%">
                    <tr>
                    <td style="font-family: freesans;text-align:center;font-size:10px;" width="10%"><b>Prepared By:</b>'.$row44['user'].'
                    </td>
                    
                    <td style="font-family: freesans; text-align:center;font-size:10px;" width="30%"><b>Bill Time:</b>'.$row44['time'].'
                    </td>
                    <td style="font-family: freesans; text-align:left;font-size:10px;" width="20%"><b>Receiver Signature:</b>'.$row44['p_mode'].'
                    </td>
					<td style="font-family: freesans; text-align:right;font-size:16px;" width="30%"><b>Grand Total:'.$row44['paying_amount'].' Taka</b>
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
        $(document).ready(function() {
          let barcodeValue = <?= $row43['billno'] ?>;
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
          let barcodeValue = <?= $row43['ono'] ?>;
          let displayText = "PO No: " + barcodeValue;
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


