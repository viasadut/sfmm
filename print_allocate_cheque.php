<!DOCTYPE html>
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



<?php
	require 'db1.php';
    $cname=$_REQUEST['cname'];
    $id=$_REQUEST['id'];
    $chequeno=$_REQUEST['chequeno'];

//db connection 
define ('DB_USER', 'root');
define ('DB_PASSWORD','Godiloveu16');
define ('DB_HOST','localhost');
define ('DB_NAME','sfmmkpjnew');
//db connection check
$db=mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME) OR die
('Could not connect to MySQL :'.mysqli_connect_error());
//data check to database
$row43=mysqli_fetch_assoc(mysqli_query($db,"SELECT * FROM pms_bill_payment WHERE chequeno='$chequeno' and creditor_name='$cname'"));


//$grn_date=$row43['re_date'];
$sid=$row43['user'];
$p_id=$row43['billno'];

$row435=mysqli_fetch_assoc(mysqli_query($db,"SELECT * FROM acct_ap WHERE payment_id='$p_id'"));



$row433=mysqli_fetch_assoc(mysqli_query($db,"SELECT * FROM pms_bill_payment WHERE chequeno='$chequeno' and creditor_name='$cname'"));

$row44=mysqli_fetch_assoc(mysqli_query($db,"SELECT COUNT(billno) FROM pms_bill_payment WHERE chequeno='$chequeno' and creditor_name='$cname'"));
//$id=$row43['ID'];

$objConnect = mysqli_connect("localhost","root","Godiloveu16") or die("Error Connect to Database");
$objDB = mysqli_select_db($objConnect,"sfmmkpjnew");
$strSQL = "Select * from pms_bill_payment WHERE chequeno='$chequeno' and creditor_name='$cname'";
$objQuery = mysqli_query($objConnect,$strSQL) or die ("Error Query [".$strSQL."]");
//$data=mysqli_fetch_assoc($objQuery);

$strSQL1 = "Select * from suppliers_master WHERE supplier_code='$cname';";
$objQuery1 = mysqli_query($objConnect,$strSQL1) or die ("Error Query [".$strSQL."]");
$data=mysqli_fetch_assoc($objQuery1);

$c_due=mysqli_fetch_assoc(mysqli_query($db,"SELECT SUM(amount),SUM(vat),SUM(tax) FROM acct_ap WHERE creditor_code='$cname' and status !='Paid'"));
$c_paid=mysqli_fetch_assoc(mysqli_query($db,"SELECT SUM(paid) FROM acct_ap WHERE creditor_code='$cname' and status !='Paid'"));

$query22s = mysqli_query($con,"select * from staff3 where sid='$sid'");
$data22s = mysqli_fetch_array($query22s);



$strSQL2 = "Select SUM(gtotal) from pms_bill_payment WHERE chequeno='$chequeno' and creditor_name='$cname';";
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
                        <td width="30%" style="text-align: right;"><img src="kpj_logo.jpeg" style="height:80px; width:150px;"></td>
                        <td width="70%" style="text-align: left; font-weight: bold; font-size:18px;">
                        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;KPJ SPECIALIZED HOSPITAL <br>
                        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;C/12, Tetuibari, Kashimpur, Gazipur, Bangladesh.</td>
						
                        
                    </tr>
                </table>            

               <div style="height:160px; border:1px solid; margin-left:30px;margin-right:20px;">
                
                
            <table  width="100%" >
              <tr>
                        <td style="font-family: Courier New;font-size:14px;" width="50%"> <b>Payee Name&nbsp;&nbsp;&nbsp;&nbsp;: <?php echo $data['supplier_name'];?></b>
                        <br><b>Payee Address 
                        : <?php echo $data['address'];?></b>
                        <br><b>Payee Tel No&nbsp; 
                        : <?php echo $data['com_phone'];?></b>
                        <br><br><br><br><br>
                        
                        
                        </td>
                        <td style="font-family: Courier New; text-align:left;font-size:14px;" width="10%"></td>
                        <td style="font-family: Courier New; text-align:left;font-size:14px;" width="40%"><b>Cheque NO&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;: <?php echo $row43['chequeno'];?></b>
                        <br><b>Cheque Issue Date
                        &nbsp;&nbsp;: <?php echo date('d/m/Y', strtotime($row43['date']));?></b>
                        <br><svg id="id"></svg>
                        </td>
                        
                    </tr>
                    </table>
                    
                    
</div>

	</header>
<br>

		<div style="height:600px;border:1px solid;margin-left:30px;margin-right:20px;">
        
    
    
    <table width="100%">
                
                <tr>
  
                <td style="font-family:Courier New;font-size:14px;text-align:center" width="100%"><b>PAYMENT / REMMITTANCE ADVICE</b>
                        </td>

    </tr>


    <?php
$bank_info=mysqli_fetch_assoc(mysqli_query($db,"SELECT * FROM bank_info WHERE bank_code='".$row43['bankno']."'"));

?>
    <tr>
  
  <td style="font-family:Courier New;font-size:14px;text-align:left" width="100%"><br>MR/MRS,<br><br>
Enclosed, <?php echo $bank_info['bank_name'];?> cheque number <?php echo $row43['chequeno'];?> being payment for the following, Kindly issue official receipt and indicate our payment voucher number for reference.
          <br></td>

</tr>
    </table>
    <br>
    <table width="100%">
                    <tr>
                    <td style="font-family: Courier New; text-align:left;" width="100%">
                  ------------------------------------------------------------------------------</td>
                    

                    </tr>
                </table>
    
        <table width="100%">
                
              <tr>
                        <td style="font-family: Courier New;font-size:12px;" width="1%"><b>S/N </b>
                        </td>
                        
                        

                        <td style="font-family: Courier New; text-align:left;font-size:12px;" width="30%"><b>Invoice NO</b>
                        </td>

                        <td style="font-family: Courier New; text-align:left;font-size:12px;" width="30%"><b>Remarks</b>
                        </td>
                        
                        <td style="font-family: Courier New; text-align:right;font-size:12px;" width="39%"><b>Invoice Amount</b>
                        </td>

                        
                        
                    </tr>
  </table>
  <table width="100%">
                    <tr>
                    <td style="font-family: Courier New; text-align:left;" width="100%">
                  ------------------------------------------------------------------------------</td>
                    

                    </tr>
                </table>
    

                    <?php
$count = 1;
while($row = mysqli_fetch_array($objQuery))
{
$i5++;

?>
				<table width="100%">	
<tr>
                        <td style="font-family: Courier New;font-size:12px;text-align:center" width="1%"><?php echo $count.'.';?>
                        </td>
                        
                       
                        <td style="font-family: Courier New; text-align:left;font-size:12px;" width="30%"><?php echo $row['invoice_no'];?>
                        </td>

                        <td style="font-family: Courier New; text-align:left;font-size:12px;" width="30%"><?php echo 'Dated '. date('d/m/Y', strtotime($row['date'])).' ('.$row['remarks'].')';?>
                        </td>

                        
                        <td style="font-family: Courier New; text-align:right;font-size:12px;" width="39%"><?php echo $row['gtotal'];?>
                        </td>

                        

                        
                    </tr>

                    <?php
 $count++;}
?>

    </table>

<?php if($row43['remarks']!=''){echo'
                    <br><br><br><table><tr>
                        <td style="font-family: Courier New;font-size:12px;text-align:left" width="100%">Remarks: '.$row43['p_remarks'].'
                        </td>
                        
                        

                        
                        
                    </tr></table>';}?>

					
                    
                    
                    
                


                <br>
                
                <footer>
                <table width="100%">
                    <tr>
                    <td style="font-family: Courier New; text-align:left;" width="100%">
                  ------------------------------------------------------------------------------</td>
                    

                    </tr>
                </table>
                <table width="100%">
<tr>
                <td style="font-family: Courier New; text-align:right;font-size:14px;font-weight:bold" width="80%"><b>Grand Total:</b>
                </td>
                <td style="font-family: Courier New; text-align:right;font-size:14px;font-weight:bold" width="20%"><?php echo $data2['SUM(gtotal)'];?>
                </td>
</tr>

<tr>
<td style="font-family: Courier New; text-align:left;font-size:14px;" width="100%">In Words: <?php echo convert_to_words_array($data2['SUM(gtotal)']);?>	Taka Only.</td>                
</tr>

<tr>

<td>
<br />Current Outstanding Amount is: <?php 

echo $c_due['SUM(amount)']-$c_paid['SUM(paid)']-$c_due['SUM(vat)']-$c_due['SUM(tax)'];?>
                            </td>
                            </tr>

</table>

<table width="100%">
                    <tr>
                    <td style="font-family: Courier New; text-align:left;" width="100%">
                  ------------------------------------------------------------------------------</td>
                    

                    </tr>
                </table>
  

<table width="100%">

<tr>
<tr>
     <td style="font-family: Courier New; text-align:left;font-size:10px;" width="25%"><b>Prepared By<br><br><br><br>
                                    <?php echo $data22s['sname'].'<br>'.$data22s['desig'].'<br>'.$data22s['dept'];?></b></td>
                                    <td style="font-family: Courier New; text-align:left;font-size:10px;" width="25%"><b>Checked By<br>

                                    <?php if($row43['approve_status']=='2'|| $row43['approve_status']=='3')
                                {
echo '<img src="cfo.jpg" style="height:30px; width:80px; text-align:left">';
echo '<br/>';
                                }?>
                                    Amit Kumar Dhali <br>CHIEF FINANCE OFFICER<br>(Acting)<br></b></b>

                                
                                </td>
                                    <td style="font-family: Courier New; text-align:left;font-size:10px;" width="25%"><b>Authorised By<br>
                                    <?php if($row43['approve_status']=='3')
                                {
echo '<img src="118.jpg" style="height:30px; width:80px; text-align:left">';
echo '<br/>';
                                }?>
                                
                                    Dr. Razeeb Hassan<br>Medical Director <br><br></b>
                                
                                </b></td>
                                    
                                    <td style="font-family: Courier New; text-align:left;font-size:10px;" width="25%"><b>Received By<br><br><br><br><br>
                                     <br><br></b></b></td>
                                    
                                </tr>
    
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
          let barcodeValue = <?= $chequeno ?>;
          let displayText = "Cheque No: " + barcodeValue;
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


