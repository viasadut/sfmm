<!DOCTYPE html>
<?php
	require 'db1.php';
    $encryption=$_REQUEST['ono'];
    $options = 0;
    $ciphering = "AES-128-CTR";
    $decryption_iv = '1234567891011121';
    $decryption_key = "kpj";
    $decryption=openssl_decrypt ($encryption, $ciphering,
    $decryption_key, $options, $decryption_iv);
    $id = $decryption;

    $encryption11=$_REQUEST['grn'];
    $options1 = 0;
    $ciphering1 = "AES-128-CTR";
    $decryption_iv1 = '1234567891011124';
    $decryption_key1 = "kpjj";
    $decryption1=openssl_decrypt ($encryption11, $ciphering1,
    $decryption_key1, $options1, $decryption_iv1);
    $grn = $decryption1;


    $id1=$_REQUEST['id'];

//db connection 
define ('DB_USER', 'root');
define ('DB_PASSWORD','Godiloveu16');
define ('DB_HOST','localhost');
define ('DB_NAME','sfmmkpjnew');
//db connection check
$db=mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME) OR die
('Could not connect to MySQL :'.mysqli_connect_error());
//data check to database
$row43=mysqli_fetch_assoc(mysqli_query($db,"SELECT * FROM purchase_stock3 WHERE sno='$id' and grn='$grn'"));
//$grn_date=$row43['re_date'];
$po_no=$row43['po_id'];
$row433=mysqli_fetch_assoc(mysqli_query($db,"SELECT * FROM po_table WHERE id='$po_no'"));

$row44=mysqli_fetch_assoc(mysqli_query($db,"SELECT COUNT(id) FROM purchase_stock3 WHERE sno='$id' and grn='$grn'"));
//$id=$row43['ID'];

$objConnect = mysqli_connect("localhost","root","Godiloveu16") or die("Error Connect to Database");
$objDB = mysqli_select_db($objConnect,"sfmmkpjnew");
$strSQL = "Select * from purchase_stock3 where sno='$id' and grn='$grn' order by `id` asc;";
$objQuery = mysqli_query($objConnect,$strSQL) or die ("Error Query [".$strSQL."]");
//$data=mysqli_fetch_assoc($objQuery);

//tb Data

$tbSQL = "
    SELECT
        MAX(CASE WHEN trans_type='DR' THEN acct_code END) AS dr_acct_code,
        MAX(CASE WHEN trans_type='CR' THEN acct_code END) AS cr_acct_code,
        SUM(CASE WHEN trans_type='DR' THEN amount ELSE 0 END) AS total_dr,
        SUM(CASE WHEN trans_type='CR' THEN amount ELSE 0 END) AS total_cr
    FROM pms_tb
    WHERE trans_id='$grn'
";

$tbQuery = mysqli_query($objConnect, $tbSQL)
           or die('Error Query [' . mysqli_error($objConnect) . ']');

$tb_data = mysqli_fetch_assoc($tbQuery);


//



$strSQL1 = "Select * from purchase_stock3 where sno='$id' and grn='$grn' order by `id` desc;";
$objQuery1 = mysqli_query($objConnect,$strSQL1) or die ("Error Query [".$strSQL."]");
$data=mysqli_fetch_assoc($objQuery1);


$strSQL2 = "Select SUM(t_price) from purchase_stock3 where sno='$id' and grn='$grn' and b_remarks='' order by `id` desc;";
$objQuery2 = mysqli_query($objConnect,$strSQL2) or die ("Error Query [".$strSQL."]");
$data2=mysqli_fetch_assoc($objQuery2);

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
  <td width="5%"></td>
                        <td width="20%"><img src="kpj_logo.jpeg" style="height:80px; width:150px; text-align:center;vertical-align:middle"></td>
                        <td width="75%" style="text-align: left; font-weight: bold; font-size:18px;">
                        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;KPJ SPECIALIZED HOSPITAL <br>
                        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;C/12, Tetuibari, Kashimpur, Gazipur, Bangladesh.<br><br>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;GOOD RECEIVED NOTE</td>
						
                        
                    </tr>
                </table>

                

               <div style="height:150px; border:1px solid; margin-left:30px;margin-right:20px;">
                
                
            <table  width="100%" >
              <tr>
                        <td style="font-family: freesans;font-size:14px;" width="60%"> <b>Supplier Name : <?php echo $row433['creditor_code'];?></b>
                        <br><b>PO No &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                        : <?php echo $row433['ono'];?></b>
                        <br><b>PO Date &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                        : <?php echo $row433['issue_date'];?></b>
                        
                        
                        
                        </td>
                        
                        <td style="font-family: freesans; text-align:left;font-size:14px;" width="40%"><b>GRN NO&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;: <?php echo $row43['grn'];?></b>
                        <br><b>GRN Date & Time
                        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;: <?php echo date('d/m/Y H:i:s', strtotime($row43['add_time']));?></b>
                        <br><b>Invoice no
                        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;: <?php echo $row43['invoice_no'];?></b>
                        
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
  
                <td style="font-family: freesans;font-size:14px;text-align:center" width="100%"><b>GRN RECEIVED NOTE</b>
                        </td>

    </tr>
    </table>
    <br>
        <table width="100%">
                
              <tr>
                        <td style="font-family: freesans;font-size:12px;" width="1%"><b>S/N </b>
                        </td>
                        
                        <td style="font-family: freesans; text-align:left;font-size:12px;" width="50%"><b>Item</b>
                        </td>

                        <td style="font-family: freesans; text-align:center;font-size:12px;" width="14%"><b>Received Qty</b>
                        </td>

                        
                        <td style="font-family: freesans; text-align:center;font-size:12px;" width="15%"><b>Unit Price</b>
                        </td>

                        <td style="font-family: freesans; text-align:center;font-size:12px;" width="20%"><b>Total Price</b>
                        </td>

                        
                    </tr>

                    <?php
$count = 1;
while($row = mysqli_fetch_array($objQuery))
{
$i5++;

?>
					
<tr>
                        <td style="font-family: freesans;font-size:12px;text-align:center" width="1%"><?php echo $count.'.';?>
                        </td>
                        
                        <?php

                        if($row['b_remarks']==''){echo '<td style="font-family: freesans; text-align:left;font-size:12px;" width="50%">'.$row['g_name'].'<br>('.$row['code'].')
                        </td>';}
                        
                        else if($row['b_remarks']!=''){echo '<td style="font-family: freesans; text-align:left;font-size:12px;" width="50%">'.$row['g_name'].'('.$row['b_remarks'].')
                          </td>';}
                        
                        ?>


                        <td style="font-family: freesans; text-align:center;font-size:12px;" width="14%"><?php echo $row['req_qty'];?>
                        </td>


                        
                        <td style="font-family: freesans; text-align:center;font-size:12px;" width="15%"><?php echo $row['u_price'];?>
                        </td>

                        

                        <?php

                        if($row['b_remarks']==''){echo '<td style="font-family: freesans; text-align:center;font-size:12px;" width="20%">'.$row['t_price'].'
                        </td>';}
                        
                        else if($row['b_remarks']!=''){echo '<td style="font-family: freesans; text-align:center;font-size:12px;" width="20%">0
                          </td>';}
                        
                        ?>

                        
                    </tr>

                    <?php
 $count++;}
?>

    </table>

<?php if($row43['remarks']!=''){echo'
                    <br><br><br><table><tr>
                        <td style="font-family: freesans;font-size:12px;text-align:left" width="100%">Remarks: '.$row43['remarks'].'
                        </td>
                        
                        

                        
                        
                    </tr></table>';}?>

					
                    
                    
                    
                


                <br>
                
                <footer>
                <table width="100%">
<tr>
                <td style="font-family: freesans; text-align:right;font-size:14px;font-weight:bold" width="100%"><b>_________________________________________</b>
                </td>
</tr>
</table>
                <table width="100%">
<tr>
                <td style="font-family: freesans; text-align:right;font-size:14px;font-weight:bold" width="80%"><b>Grand Total:</b>
                </td>
                <td style="font-family: freesans; text-align:right;font-size:14px;font-weight:bold" width="20%"><?php echo $data2['SUM(t_price)'];?>
                </td>
</tr>

<tr>
                <td style="font-family: freesans; text-align:right;font-size:14px;font-weight:bold" width="80%"><b>Total Discount:</b>
                </td>
                <td style="font-family: freesans; text-align:right;font-size:14px;font-weight:bold" width="20%"><?php echo $row433['amount_discount'];?>
                </td>
</tr>

<tr>
                <td style="font-family: freesans; text-align:right;font-size:14px;font-weight:bold" width="80%"><b>Net Amount :</b>
                </td>
                <td style="font-family: freesans; text-align:right;font-size:14px;font-weight:bold" width="20%"><?php echo $data2['SUM(t_price)']-$row433['amount_discount'];?>
                </td>
</tr>
</table>
<br><br><br>
<table width="100%">
                <tr>
                
                <td style="font-family: freesans; text-align:left;font-size:10px;" width="50%"><b>Received By:</b><?php echo $data['add_by'];?>
                </td>
                <td style="font-family: freesans; text-align:right;font-size:10px;" width="50%"><b>Checked By:</b><?php echo $data['add_by'];?>
                </td>

</tr>

<tr>

<td>
<?php 
echo '<br />';
echo
'DR: '. $tb_data['dr_acct_code'].' (Amount:'. $tb_data['total_dr'].')';
echo '<br />';
echo 'CR: '. $tb_data['cr_acct_code'].' (Amount:'. $tb_data['total_cr'].')';




?>
</td>
</tr>

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
          let barcodeValue = <?= $grn ?>;
          let displayText = "GRN: " + barcodeValue;
          JsBarcode("#mrn", barcodeValue, {
            displayValue: true,
            text: displayText,
            width:3,
  height: 40,
  font:5,          
          });
        });        

        $(document).ready(function() {
          let barcodeValue = <?= $row43['po_id'] ?>;
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


