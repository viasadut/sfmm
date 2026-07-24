<?php 
    session_start();
    $role = $_SESSION['sess_userrole'];
    if(!isset($_SESSION['sess_username']) || $role!="doctor"){
      header('Location: login2?err=2');
    }
?>

<?php
    /*
    Author: Javed Ur Rehman
    Website: https://www.allphptricks.com/
    */
    //session_start();
    require('db1.php');
    //include("auth.php");
    $fullname = $_SESSION['sess_username'];
    $query39 = "SELECT * FROM user where uname= '$fullname'"; 
    $result39 = mysqli_query($con, $query39) or die(mysqli_error());
    // Print out result
    $row39 = mysqli_fetch_array($result39);
    $full = $row39['fullname'];
    $ugroup = $row39['ugroup'];
    $status = $row39['status'];
	
	$db = mysqli_connect('localhost','root','Godiloveu16');
mysqli_select_db($db,'sfmmkpjnew');

?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="UTF-8">
  <title>Sign Up Form</title>
  
    

  
      <style>
      /* NOTE: The styles were added inline because Prefixfree needs access to your styles and they must be inlined if they are on local disk! */
      /* Stephonce R. MOrris | 2014 */

html { box-sizing: border-box; }

*, *:before, *:after {
  -moz-box-sizing: border-box;
  -webkit-box-sizing: border-box;
  box-sizing: border-box;
}

body {
  font-family: 'Nunito',sans-serif;
  color: #384047;
  background: #A085C6;
}

form {
  max-width: 300px;
  margin: 10px auto;
  padding: 10px 20px;
  background: #f4f7f8;
  border-radius: 8px;
  border: 1px solid #8265B0;
  box-shadow: 3px 3px 3px rgba(0,0,0,0.2)
}

h1 {
  margin: 0 0 30px 0;
  text-align: center;
}

input[type="text"],
input[type="password"],
input[type="date"],
input[type="datetime"],
input[type="email"],
input[type="number"],
input[type="search"],
input[type="tel"],
input[type="time"],
input[type="url"],
textarea,
select {
  background: rgba(255,255,255,0.1);
  border: none;
  font-size: 16px;
  
  height: 10px;
  margin: 0;
  outline: 0;
  padding: 15px;
  width: 30%;
  background-color: #e8eeef;
  color: red;
  font-weight: bold;
  box-shadow: 0 1px 0 rgba(0,0,0,0.03) inset;
  margin-bottom: 30px;
}


input[type="radio"],
input[type="checkbox"] {
  margin: 0 4px 8px 0;
}

select {
  padding: 6px;
  height: 10px;
  border-radius: 2px;
}



button {
  padding: 19px 39px 18px 39px;
  color: #FFF;
  background-color: lightgreen;
  /*#4bc970*/
  font-size: 18px;
  text-align: center;
  font-style: normal;
  border-radius: 5px;
  width: 20%;
  border: 1px solid #8265B0;
  /*#3ac162*/
  border-width: 1px 1px 3px;
  box-shadow: 0 -1px 0 rgba(255,255,255,0.1) inset;
  margin-bottom: 10px;
}



fieldset {
  margin-bottom: 30px;
  border: none;
}

legend {
  font-size: 1.4em;
  margin-bottom: 10px;
}

label {
  display: block;
  margin-bottom: 8px;
}

label.light {
  font-weight: 300;
  display: inline;
}

.number {
  background-color: #A085C6;
  /*#5fcf80*/
  color: #fff;
  height: 30px;
  width: 30px;
  display: inline-block;
  font-size: 0.8em;
  margin-right: 4px;
  line-height: 30px;
  text-align: center;
  text-shadow: 0 1px 0 rgba(255,255,255,0.2);
  border-radius: 100%;
}

abbr[title] {
	border-bottom-width: 0;
}


@media screen and (min-width: 480px) {

  form {
    max-width: 2000px;
  }

}






* {
    box-sizing: border-box;
}
#data {
    overflow:hidden;
    padding:0;
	width:94vw;
	
}
select {
	padding:0;
	padding-left:1px;
	border:none;
	background-color:#eee;
	width:100%;
	white-space: normal;
	height:200px;
}
option {
	height:40px;
	width:52px;
	border:1px solid #000;
	background-color:white;
	margin-left:-1px;
	display:inline-block;
}




      </style>

    
<link rel="stylesheet" href="jsnew/bootstrap.min.css" />  
    <script src="jsnew/jjquery.min.js"></script>
    <script src="jsnew/bootstrap.min.js"></script>
   <link href="jsnew/jquery-ui.css" rel="stylesheet" />
    
    <script src="jsnew/jquery-1.12.4.js"></script>
    <script src="jsnew/jquery-ui.js"></script>
  
  




  <style type="text/css">
<!--
.style1 {font-weight: bold}
-->
  </style>
  

  <link rel="stylesheet" href="styles.css">

   <script src="script.js"></script>
   <script>
function goBack() {
    window.history.back();
}
</script>
<script type="text/javascript">
function confirm_click()
{
return confirm("Are you Sure to Reveive this Sample ?");
}

</script>

<script type="text/javascript">
function confirm_click2()
{
return confirm("Are you Sure to Reject this Sample ?");
}

</script>
<script src="jsnew/pprefixfree.min.js"></script>



<link rel="stylesheet" href="jsnew/jquery-ui.css">
<script src="jsnew/jquery.min.js"></script>
<script src="jsnew/jquery-ui.min.js"></script>

 <script type="text/javascript">
	jQuery(function() {		
		var date = new Date();
		var currentMonth = date.getMonth();
		var currentDate = date.getDate();
		var currentYear = date.getFullYear();
		
		$('#datepicker').datepicker({
			minDate: new Date(currentYear, currentMonth, currentDate),
			maxDate: new Date(currentYear, currentMonth, currentDate+6)
		});
		
		$('#datepicker1').datepicker({
			minDate: new Date(currentYear, currentMonth, currentDate),
			maxDate: new Date(currentYear, currentMonth, currentDate+6)
		});
	});
</script>


  <script src="ckeditor/ckeditor.js"></script>
<script src="ckeditor/samples/js/sample.js"></script>
          
           <title>Webslesson Tutorial | PHP Ajax Update MySQL Data Through Bootstrap Modal</title>  
           
		   <link rel="stylesheet" href="jsnew/bootstrap.min.css" />  
    <script src="jsnew/jjquery.min.js"></script>
    <script src="jsnew/bootstrap.min.js"></script>
   <link href="jsnew/jquery-ui.css" rel="stylesheet" />
    
    
    <script src="jsnew/jquery-ui.js"></script>
	
</head>
<body>
    <div id='cssmenu'>
        <ul>
            <li><a href='endohome'><span>Home</span></a></li>
            <li class='last'><a href='logout'><span>LOGOUT</span></a></li>
        </ul>
    </div>
    <p align="center" class="style1">SEARCH PANEL FOR PATIENTS RECORD</p>
    <form action="" method="POST">
        <h1 align="center" style="background-color:lightgreen;">PENDING INVESTIGATION LIST FOR CONFIRMATION(OPD)</h1>
        <!-- Form Title -->
        <table width="100%" height="100%" border="1" align="center" bgcolor="#FFFF99" style="border-collapse:collapse;">
            <tr>
                <td colspan="1" align="center"><strong>S.No</strong></td>
                <td colspan="1" align="center"><strong>MRN</strong></td>
				<td colspan="1" align="center"><strong>Barcode</strong></td>

                <td colspan="1" align="center"><strong>Order Date </strong></td>
                <td colspan="2" align="center"><strong>Investigation</strong></td>

                <td colspan="1" align="center"><strong>Done Date</strong></td>
                <td colspan="4" align="center"><strong>Result</strong></td>
				<td colspan="4" align="center"><strong>Last Result</strong></td>
                <td colspan="4" align="center"><strong>Reference Value</strong></td>
                <td colspan="2" align="center"><strong>Received Comments</strong></td>
                <td colspan="1" align="center"><strong>Received By</strong></td>
                <td colspan="1" align="center"><strong>Confirm</strong></td>
                <td colspan="1" align="center"><strong>Edit</strong></td>
                <td colspan="1" align="center"><strong>Report</strong></td>
            </tr>
            <tbody>
                <?php
                    if($ugroup=='lab' && $status='active'){	
                        $apdate=date('Y-m-d');
                        $test=date('Y-m-d', strtotime('-30 days') );
                        $count=1;
                        $sel_query="Select * from alltest where type='lab' and rstatus ='RECEIVED' and status ='RECEIVED' and resultstatus='Updated By Technologist' and rdate between '$test' and '$apdate'  and subtype in('BIOCHEMISTRY','HAEMATOLOGY','PROFILE','FLUIDS & EXCREATIONS','BLOOD BANK') order by `ins` DESC;";
                        $result = mysqli_query($con,$sel_query);
                        while($row = mysqli_fetch_assoc($result)){
                ?>
                <tr>
                    <?php 
                        $medi=$row["code"];
						$inf1=$row["medi"];
						$pmrn=$row["pmrn"];
                        $selq="Select * from radio where code='$medi';";
                        $resultq = mysqli_query($con,$selq);
                        $rowq = mysqli_fetch_assoc($resultq);
                        $ref1=$rowq['reference'];
                        $ref2=$rowq['ref2'];
                        $unit=$rowq['unit'];
                        $remarks=$rowq['remarks'];    
						
						
						$opd_last= mysqli_query($db,"select * from alltest where pmrn='$pmrn' and medi='$inf1' and billdate NOT IN('0000-00-00','NULL') and cby!='' order by id desc limit 1");
$data_opd = mysqli_fetch_assoc($opd_last);
$result_opd=$data_opd['result'];
$opd_bill_date=$data_opd['billdate'];
$opd_bill_date1=date('d/m/Y',strtotime($data_opd['billdate']));


$ipd_last= mysqli_query($db,"select * from iinves where pmrn='$pmrn' and infusion='$inf1' and rdate NOT IN('0000-00-00','NULL') and conby!='' order by id desc limit 1");
$data_ipd = mysqli_fetch_assoc($ipd_last);
$result_ipd=$data_ipd['result'];
$ipd_bill_date=$data_ipd['rdate'];
$ipd_bill_date1=date('d/m/Y',strtotime($data_ipd['rdate']));


$ae_last= mysqli_query($db,"select * from einves where pmrn='$pmrn' and infusion='$inf1' and rdate NOT IN('0000-00-00','NULL') and conby!='' order by id desc limit 1");
$data_ae = mysqli_fetch_assoc($ae_last);
$result_ae=$data_ae['result'];
$ae_bill_date=$data_ae['rdate'];
$ae_bill_date1=date('d/m/Y',strtotime($data_ae['rdate']));


                    ?>
                    <td align="center" colspan="1"><?php echo $count; ?></td>
                    <td align="center"colspan="1"><a target='_blank' href="allreportdocnew?pmrn=<?php echo $row['pmrn']; ?>"style="color:#FF0000;"><?php echo $row["pmrn"]; ?></a></td>
                    <td align="center" colspan="1"><?php echo $row["barcode1"]; ?></td>
					
					<td align="center" colspan="1"><?php echo date('d/m/Y',strtotime($row["date1"])); ?></td>
                    <td align="center" colspan="2"><a target='_blank' href="all_test_compare?pmrn=<?php echo $row['pmrn']; ?>&infu=<?php echo $row['medi']; ?>"style="color:#FF0000;"><?php echo $row["medi"]; ?></a></td>
                    <td align="center" colspan="1"><?php echo $row["resulttime"]; ?></td>
                    <td align="center" colspan="4"><?php echo $row["result"]; ?></td>
					
					
					<td align="center" colspan="4">
					
					<?php
			
			if($opd_bill_date!='' and $ipd_bill_date!='' and $ae_bill_date!='' and $opd_bill_date>$ipd_bill_date and $opd_bill_date>$ae_bill_date)
				{echo"<p style='color:red;font-size:12px;font-weight:bold'>(OPD)- ".$result_opd." <br>(Date: ".$opd_bill_date1.")</p>";}		
		
		
			else if($opd_bill_date!='' and $ipd_bill_date!='' and $opd_bill_date>$ipd_bill_date)
				{echo"<p style='color:red;font-size:12px;font-weight:bold'>(OPD)- ".$result_opd." <br>(Date: ".$opd_bill_date1.")</p>";}		
		
		else if($opd_bill_date!='' and $ae_bill_date!='' and $opd_bill_date>$ae_bill_date)
				{echo"<p style='color:red;font-size:12px;font-weight:bold'>(OPD)- ".$result_opd." <br>(Date: ".$opd_bill_date1.")</p>";}		
		
		

		
		
		else if($opd_bill_date!='' and $ipd_bill_date!='' and $ae_bill_date!='' and $ipd_bill_date>$opd_bill_date and $ipd_bill_date>$ae_bill_date)
			{echo"<p style='color:red;font-size:12px;font-weight:bold'>(IPD)- ".$result_ipd." <br>(Date: ".$ipd_bill_date1.")</p>";}		
		
		
		else if($opd_bill_date!='' and $ipd_bill_date!='' and $ipd_bill_date>$opd_bill_date)
			{echo"<p style='color:red;font-size:12px;font-weight:bold'>(IPD)- ".$result_ipd." <br>(Date: ".$ipd_bill_date1.")</p>";}		
		
		else if($ipd_bill_date!='' and $ae_bill_date!='' and $ipd_bill_date>$ae_bill_date)
			{echo"<p style='color:red;font-size:12px;font-weight:bold'>(IPD)- ".$result_ipd."<br> (Date: ".$ipd_bill_date1.")</p>";}		
		
		
		
		
		
		
		
				else if($opd_bill_date!='' and $ipd_bill_date!='' and $ae_bill_date!='' and $ae_bill_date>$opd_bill_date and $ae_bill_date>$ipd_bill_date)
			{echo"<p style='color:red;font-size:12px;font-weight:bold'>(AE)- ".$result_ae."<br> (Date: ".$ae_bill_date1.")</p>";}		
		
				else if($opd_bill_date!='' and $ae_bill_date!='' and $ae_bill_date>$opd_bill_date)
			{echo"<p style='color:red;font-size:12px;font-weight:bold'>(AE)- ".$result_ae." <br>(Date: ".$ae_bill_date1.")</p>";}		
		
		else if($ipd_bill_date!='' and $ae_bill_date!='' and $ae_bill_date>$ipd_bill_date)
			{echo"<p style='color:red;font-size:12px;font-weight:bold'>(AE)- ".$result_ae." <br>(Date: ".$ae_bill_date1.")</p>";}		


		else if($opd_bill_date!='')
			{echo"<p style='color:red;font-size:12px;font-weight:bold'>(OPD)- ".$result_opd."<br> (Date: ".$opd_bill_date1.")</p>";}		
		
		else if($ipd_bill_date!='')
			{echo"<p style='color:red;font-size:12px;font-weight:bold'>(IPD)- ".$result_ipd."<br> (Date: ".$ipd_bill_date1.")</p>";}		
		
		else if($ae_bill_date!='')
			{echo"<p style='color:red;font-size:12px;font-weight:bold'>(AE)- ".$result_ae." <br>(Date: ".$ae_bill_date1.")</p>";}		
		
			
			
			?>
					
					
					
					</td>
                    <td align="center" colspan="4"><?php echo $remarks;?></td>
                    <td align="center" colspan="2" style="color:red;"><?php echo $row["ins"]; ?></td>
                    <td align="center" colspan="1"><?php echo $row["rby"]; ?></td>
                    <td align="center" colspan="1"><a onclick="return confirm_click();"
                        href="labreportconfirmopd?id=<?php echo $row["id"]; ?>">Confirm</a></td>
                    <td align="center" colspan="1"><a target='_blank'
                        href="<?php echo $row['linkv']?>?id=<?php
                            $simple_string = $row["id"];
                            $ciphering = "AES-192-CTR";
                            $iv_length = openssl_cipher_iv_length($ciphering);
                            $options = 0;
                            $encryption_iv = '1234567891011121';
                            $encryption_key = "kpj";
                            $encryption = openssl_encrypt($simple_string,
                            $ciphering,
                            $encryption_key, $options, $encryption_iv);
                            echo $encryption;
                        ?>&pmrn=<?php
                            $simple_string = $row["pmrn"];
                            $encryption = openssl_encrypt($simple_string,
                            $ciphering,
                            $encryption_key, $options, $encryption_iv);
                            echo $encryption;
                        ?>&eid=<?php
                            $simple_string = $row["eid"];
                            $encryption = openssl_encrypt($simple_string,
                            $ciphering,
                            $encryption_key, $options, $encryption_iv);
                            echo $encryption;
                        ?>">EDIT</a>
                    </td>
                    <td align="center" colspan="1"><a target='_blank'
                        href="<?php echo $row['report']?>?id=<?php echo $row['id']; ?>&pmrn=<?php echo $row['pmrn']; ?>&eid=<?php echo $row['eid']; ?>&sno=<?php echo 'O'.$row['id']; ?>">REPORT</a>
                    </td>
                </tr>
                <?php $count++;  }}
                    else {
                    echo '<script language="javascript">';
                    echo 'alert("Only Lab Consultant have privilege to Access... Thank You !!"); ';
                    echo '</script>';
                    $url = "labome";  
                    header("Refresh: .1; URL=$url");
                }
                ?>
				
				<tr><td colspan="20"> <h1><align="center"style="background-color:lightgreen;">PENDING INVESTIGATION LIST FOR CONFIRMATION(A&E)<h1></td></tr>
				
				
				
				
				<tr>
      <td colspan="1" align="center"><strong>S.No</strong></td>
      <td colspan="1" align="center"><strong>MRN</strong></td>
	  <td colspan="1" align="center"><strong>Barcode</strong></td>
      
      <td colspan="1" align="center"><strong>Order Date </strong></td>
      <td colspan="2" align="center"><strong>Investigation</strong></td>
         
      <td colspan="1" align="center"><strong>Done Date</strong></td>
	  <td colspan="4" align="center"><strong>Result</strong></td>
	  <td colspan="4" align="center"><strong>Last Result</strong></td>
	  <td colspan="4" align="center"><strong>Reference Value</strong></td>
       	  <td colspan="2" align="center"><strong>Received Comments</strong></td>
		  <td colspan="1" align="center"><strong>Received By</strong></td>
		  <td colspan="1" align="center"><strong>Confirm</strong></td>
		  <td colspan="1" align="center"><strong>Edit</strong></td>
		  <td colspan="1" align="center"><strong>Report</strong></td>

	   </tr>
  
				<?php
	
	if($ugroup=='lab' && $status='active'){	
	$apdate=date('Y-m-d');
$test=date('Y-m-d', strtotime('-30 days') );
$count=1;
$sel_query="Select * from einves where type='lab' and rstatus ='RECEIVED' and status ='RECEIVED' and resultstatus='Updated By Technologist' and rdate between $test and '$apdate' and subtype in('BIOCHEMISTRY','HAEMATOLOGY','PROFILE','FLUIDS & EXCREATIONS','BLOOD BANK')  order by `room` DESC;";

$result = mysqli_query($con,$sel_query);

while($row = mysqli_fetch_assoc($result)) 
{ ?>    <tr>

		  <?php 
		  $medi=$row["code"];
		  $inf1=$row["infusion"];
						$pmrn=$row["pmrn"];
		  $selq="Select * from radio where code='$medi';";

$resultq = mysqli_query($con,$selq);
$rowq = mysqli_fetch_assoc($resultq);
$ref1=$rowq['reference'];
$ref2=$rowq['ref2'];
$unit=$rowq['unit'];
$remarks=$rowq['remarks'];


$opd_last= mysqli_query($db,"select * from alltest where pmrn='$pmrn' and medi='$inf1' and billdate NOT IN('0000-00-00','NULL') and cby!='' order by id desc limit 1");
$data_opd = mysqli_fetch_assoc($opd_last);
$result_opd=$data_opd['result'];
$opd_bill_date=$data_opd['billdate'];
$opd_bill_date1=date('d/m/Y',strtotime($data_opd['billdate']));


$ipd_last= mysqli_query($db,"select * from iinves where pmrn='$pmrn' and infusion='$inf1' and rdate NOT IN('0000-00-00','NULL') and conby!='' order by id desc limit 1");
$data_ipd = mysqli_fetch_assoc($ipd_last);
$result_ipd=$data_ipd['result'];
$ipd_bill_date=$data_ipd['rdate'];
$ipd_bill_date1=date('d/m/Y',strtotime($data_ipd['rdate']));


$ae_last= mysqli_query($db,"select * from einves where pmrn='$pmrn' and infusion='$inf1' and rdate NOT IN('0000-00-00','NULL') and conby!='' order by id desc limit 1");
$data_ae = mysqli_fetch_assoc($ae_last);
$result_ae=$data_ae['result'];
$ae_bill_date=$data_ae['rdate'];
$ae_bill_date1=date('d/m/Y',strtotime($data_ae['rdate']));


		  
		  ?>

      <td align="center" colspan="1"><?php echo $count; ?></td>
     <td align="center"colspan="1"><a target='_blank' href="allreportdocnew?pmrn=<?php echo $row['pmrn']; ?>"style="color:#FF0000;"><?php echo $row["pmrn"]; ?></a></td>
	 <td align="center" colspan="1"><?php echo $row["barcode"]; ?></td>
      
	  <td align="center"colspan="1"><?php echo $row["odate"]; ?></td>  
	  <td align="center"colspan="2"><a target='_blank' href="all_test_compare?pmrn=<?php echo $row['pmrn']; ?>&infu=<?php echo $row['infusion']; ?>"style="color:#FF0000;"><?php echo $row["infusion"]; ?></a></td>
	  
			<td align="center"colspan="1"><?php echo $row["resulttime"]; ?></td>  
			<td align="center"colspan="4"><?php echo $row["result"]; ?></td>
			
			
			
			<td align="center" colspan="4">
					
						<?php
			
			if($opd_bill_date!='' and $ipd_bill_date!='' and $ae_bill_date!='' and $opd_bill_date>$ipd_bill_date and $opd_bill_date>$ae_bill_date)
				{echo"<p style='color:red;font-size:12px;font-weight:bold'>(OPD)- ".$result_opd." <br>(Date: ".$opd_bill_date1.")</p>";}		
		
		
			else if($opd_bill_date!='' and $ipd_bill_date!='' and $opd_bill_date>$ipd_bill_date)
				{echo"<p style='color:red;font-size:12px;font-weight:bold'>(OPD)- ".$result_opd." <br>(Date: ".$opd_bill_date1.")</p>";}		
		
		else if($opd_bill_date!='' and $ae_bill_date!='' and $opd_bill_date>$ae_bill_date)
				{echo"<p style='color:red;font-size:12px;font-weight:bold'>(OPD)- ".$result_opd." <br>(Date: ".$opd_bill_date1.")</p>";}		
		
		

		
		
		else if($opd_bill_date!='' and $ipd_bill_date!='' and $ae_bill_date!='' and $ipd_bill_date>$opd_bill_date and $ipd_bill_date>$ae_bill_date)
			{echo"<p style='color:red;font-size:12px;font-weight:bold'>(IPD)- ".$result_ipd." <br>(Date: ".$ipd_bill_date1.")</p>";}		
		
		
		else if($opd_bill_date!='' and $ipd_bill_date!='' and $ipd_bill_date>$opd_bill_date)
			{echo"<p style='color:red;font-size:12px;font-weight:bold'>(IPD)- ".$result_ipd." <br>(Date: ".$ipd_bill_date1.")</p>";}		
		
		else if($ipd_bill_date!='' and $ae_bill_date!='' and $ipd_bill_date>$ae_bill_date)
			{echo"<p style='color:red;font-size:12px;font-weight:bold'>(IPD)- ".$result_ipd."<br> (Date: ".$ipd_bill_date1.")</p>";}		
		
		
		
		
		
		
		
				else if($opd_bill_date!='' and $ipd_bill_date!='' and $ae_bill_date!='' and $ae_bill_date>$opd_bill_date and $ae_bill_date>$ipd_bill_date)
			{echo"<p style='color:red;font-size:12px;font-weight:bold'>(AE)- ".$result_ae."<br> (Date: ".$ae_bill_date1.")</p>";}		
		
				else if($opd_bill_date!='' and $ae_bill_date!='' and $ae_bill_date>$opd_bill_date)
			{echo"<p style='color:red;font-size:12px;font-weight:bold'>(AE)- ".$result_ae." <br>(Date: ".$ae_bill_date1.")</p>";}		
		
		else if($ipd_bill_date!='' and $ae_bill_date!='' and $ae_bill_date>$ipd_bill_date)
			{echo"<p style='color:red;font-size:12px;font-weight:bold'>(AE)- ".$result_ae." <br>(Date: ".$ae_bill_date1.")</p>";}		


		else if($opd_bill_date!='')
			{echo"<p style='color:red;font-size:12px;font-weight:bold'>(OPD)- ".$result_opd."<br> (Date: ".$opd_bill_date1.")</p>";}		
		
		else if($ipd_bill_date!='')
			{echo"<p style='color:red;font-size:12px;font-weight:bold'>(IPD)- ".$result_ipd."<br> (Date: ".$ipd_bill_date1.")</p>";}		
		
		else if($ae_bill_date!='')
			{echo"<p style='color:red;font-size:12px;font-weight:bold'>(AE)- ".$result_ae." <br>(Date: ".$ae_bill_date1.")</p>";}		
		
			
			
			?>
					
					
					
					</td>
			<td align="center"colspan="4"><?php echo $remarks;?></td>		  
        	  	  <td align="center"colspan="2" style="color:red;"><?php echo $row["room"]; ?></td>
	  
	  	  <td align="center"colspan="1"><?php echo $row["rby"]; ?></td>
		  
		  
		  
		  
		  
<td align="center" colspan="1"><a onclick="return confirm_click();" href="labreportconfirmae?id=<?php echo $row["id"]; ?>">Confirm</a></td>

<td align="center"colspan="1"><a target='_blank' href="<?php echo $row['linkv']?>?id=<?php echo $row['id']; ?>&pmrn=<?php echo $row['pmrn']; ?>&eid=<?php echo $row['eid']; ?>">EDIT</a></td>
  	  
<td align="center"colspan="1"><a target='_blank' href="<?php echo $row['report']?>?id=<?php echo $row['id']; ?>&pmrn=<?php echo $row['pmrn']; ?>&eid=<?php echo $row['eid']; ?>&sno=<?php echo 'E'.$row['id']; ?>">REPORT</a></td>
      </tr>


	<?php $count++;  }}
	
	else {
	
	echo '<script language="javascript">';
    echo 'alert("Only Lab Consultant have privilege to Access... Thank You !!"); ';
    echo '</script>';
	
	$url = "labome";
	//header("Location: $url");
	
	header("Refresh: .1; URL=$url");
}
?>



<tr><td colspan="20"> <h1><align="center"style="background-color:lightgreen;">PENDING INVESTIGATION LIST FOR CONFIRMATION(IPD)<h1></td></tr>






 <tr>
      <td colspan="1" align="center"><strong>S.No</strong></td>
      <td colspan="1" align="center"><strong>MRN</strong></td>
	  <td colspan="1" align="center"><strong>Barcode</strong></td>
      
      <td colspan="1" align="center"><strong>Order Date </strong></td>
      <td colspan="2" align="center"><strong>Investigation</strong></td>
         
      <td colspan="1" align="center"><strong>Done Date</strong></td>
	  <td colspan="4" align="center"><strong>Result</strong></td>
	  <td colspan="4" align="center"><strong>Last Result</strong></td>
	  <td colspan="4" align="center"><strong>Reference Value</strong></td>
       	  <td colspan="2" align="center"><strong>Received Comments</strong></td>
		  <td colspan="1" align="center"><strong>Received By</strong></td>
		  <td colspan="1" align="center"><strong>Confirm</strong></td>
		  <td colspan="1" align="center"><strong>Edit</strong></td>
		  <td colspan="1" align="center"><strong>Report</strong></td>

	   </tr>
  
  <tbody>
  
    <?php
	
	if($ugroup=='lab' && $status='active'){	
	$apdate=date('Y-m-d');
$test=date('Y-m-d', strtotime('-30 days') );
$count=1;
$sel_query="Select * from iinves where type='lab' and rstatus ='RECEIVED' and status ='RECEIVED' and resultstatus='Updated By Technologist' and rdate between '$test' and '$apdate' and subtype in('BIOCHEMISTRY','HAEMATOLOGY','PROFILE','FLUIDS & EXCREATIONS','BLOOD BANK') order by `room` DESC;";

$result = mysqli_query($con,$sel_query);

while($row = mysqli_fetch_assoc($result)) 
{ ?>    <tr>

		  <?php 
		  $medi=$row["code"];
		  $inf1=$row["infusion"];
						$pmrn=$row["pmrn"];
		  
		  $selq="Select * from radio where code='$medi';";

$resultq = mysqli_query($con,$selq);
$rowq = mysqli_fetch_assoc($resultq);
$ref1=$rowq['reference'];
$ref2=$rowq['ref2'];
$unit=$rowq['unit'];
$remarks=$rowq['remarks'];
		  
		  
		  $opd_last= mysqli_query($db,"select * from alltest where pmrn='$pmrn' and medi='$inf1' and billdate NOT IN('0000-00-00','NULL') and cby!='' order by id desc limit 1");
$data_opd = mysqli_fetch_assoc($opd_last);
$result_opd=$data_opd['result'];
$opd_bill_date=$data_opd['billdate'];
$opd_bill_date1=date('d/m/Y',strtotime($data_opd['billdate']));


$ipd_last= mysqli_query($db,"select * from iinves where pmrn='$pmrn' and infusion='$inf1' and rdate NOT IN('0000-00-00','NULL') and conby!='' order by id desc limit 1");
$data_ipd = mysqli_fetch_assoc($ipd_last);
$result_ipd=$data_ipd['result'];
$ipd_bill_date=$data_ipd['rdate'];
$ipd_bill_date1=date('d/m/Y',strtotime($data_ipd['rdate']));


$ae_last= mysqli_query($db,"select * from einves where pmrn='$pmrn' and infusion='$inf1' and rdate NOT IN('0000-00-00','NULL') and conby!='' order by id desc limit 1");
$data_ae = mysqli_fetch_assoc($ae_last);
$result_ae=$data_ae['result'];
$ae_bill_date=$data_ae['rdate'];
$ae_bill_date1=date('d/m/Y',strtotime($data_ae['rdate']));

		  ?>

      <td align="center" colspan="1"><?php echo $count; ?></td>
     <td align="center"colspan="1"><a target='_blank' href="allreportdocnew?pmrn=<?php echo $row['pmrn']; ?>"style="color:#FF0000;"><?php echo $row["pmrn"]; ?></a></td>
      <td align="center" colspan="1"><?php echo $row["barcode"]; ?></td>
	  <td align="center"colspan="1"><?php echo $row["odate"]; ?></td>  
	  <td align="center"colspan="2"><a target='_blank' href="all_test_compare?pmrn=<?php echo $row['pmrn']; ?>&infu=<?php echo $row['infusion']; ?>"style="color:#FF0000;"><?php echo $row["infusion"]; ?></a></td>
	  
			<td align="center"colspan="1"><?php echo $row["resulttime"]; ?></td>  
			<td align="center"colspan="4"><?php echo $row["result"]; ?></td>
			
			
			<td align="center" colspan="4">
					
					<?php
			
			if($opd_bill_date!='' and $ipd_bill_date!='' and $ae_bill_date!='' and $opd_bill_date>$ipd_bill_date and $opd_bill_date>$ae_bill_date)
				{echo"<p style='color:red;font-size:12px;font-weight:bold'>(OPD)- ".$result_opd." <br>(Date: ".$opd_bill_date1.")</p>";}		
		
		
			else if($opd_bill_date!='' and $ipd_bill_date!='' and $opd_bill_date>$ipd_bill_date)
				{echo"<p style='color:red;font-size:12px;font-weight:bold'>(OPD)- ".$result_opd." <br>(Date: ".$opd_bill_date1.")</p>";}		
		
		else if($opd_bill_date!='' and $ae_bill_date!='' and $opd_bill_date>$ae_bill_date)
				{echo"<p style='color:red;font-size:12px;font-weight:bold'>(OPD)- ".$result_opd." <br>(Date: ".$opd_bill_date1.")</p>";}		
		
		

		
		
		else if($opd_bill_date!='' and $ipd_bill_date!='' and $ae_bill_date!='' and $ipd_bill_date>$opd_bill_date and $ipd_bill_date>$ae_bill_date)
			{echo"<p style='color:red;font-size:12px;font-weight:bold'>(IPD)- ".$result_ipd." <br>(Date: ".$ipd_bill_date1.")</p>";}		
		
		
		else if($opd_bill_date!='' and $ipd_bill_date!='' and $ipd_bill_date>$opd_bill_date)
			{echo"<p style='color:red;font-size:12px;font-weight:bold'>(IPD)- ".$result_ipd." <br>(Date: ".$ipd_bill_date1.")</p>";}		
		
		else if($ipd_bill_date!='' and $ae_bill_date!='' and $ipd_bill_date>$ae_bill_date)
			{echo"<p style='color:red;font-size:12px;font-weight:bold'>(IPD)- ".$result_ipd."<br> (Date: ".$ipd_bill_date1.")</p>";}		
		
		
		
		
		
		
		
				else if($opd_bill_date!='' and $ipd_bill_date!='' and $ae_bill_date!='' and $ae_bill_date>$opd_bill_date and $ae_bill_date>$ipd_bill_date)
			{echo"<p style='color:red;font-size:12px;font-weight:bold'>(AE)- ".$result_ae."<br> (Date: ".$ae_bill_date1.")</p>";}		
		
				else if($opd_bill_date!='' and $ae_bill_date!='' and $ae_bill_date>$opd_bill_date)
			{echo"<p style='color:red;font-size:12px;font-weight:bold'>(AE)- ".$result_ae." <br>(Date: ".$ae_bill_date1.")</p>";}		
		
		else if($ipd_bill_date!='' and $ae_bill_date!='' and $ae_bill_date>$ipd_bill_date)
			{echo"<p style='color:red;font-size:12px;font-weight:bold'>(AE)- ".$result_ae." <br>(Date: ".$ae_bill_date1.")</p>";}		


		else if($opd_bill_date!='')
			{echo"<p style='color:red;font-size:12px;font-weight:bold'>(OPD)- ".$result_opd."<br> (Date: ".$opd_bill_date1.")</p>";}		
		
		else if($ipd_bill_date!='')
			{echo"<p style='color:red;font-size:12px;font-weight:bold'>(IPD)- ".$result_ipd."<br> (Date: ".$ipd_bill_date1.")</p>";}		
		
		else if($ae_bill_date!='')
			{echo"<p style='color:red;font-size:12px;font-weight:bold'>(AE)- ".$result_ae." <br>(Date: ".$ae_bill_date1.")</p>";}		
		
			
			
			?>
					
					
					
					</td>
			<td align="center"colspan="4"><?php echo $remarks;?></td>		  
        	  	  <td align="center"colspan="2" style="color:red;"><?php echo $row["room"]; ?></td>
	  
	  	  <td align="center"colspan="1"><?php echo $row["rby"]; ?></td>
		  
		  
		  
		   
		  
<td align="center" colspan="1"><a onclick="return confirm_click();" href="labreportconfirm?id=<?php echo $row["id"]; ?>">Confirm</a>

<input type="button" name="edit" value="Serve" id="<?php echo $row['id'];?>" class="btn btn-info btn-xs edit_data" /></td>

<td align="center"colspan="1"><a target='_blank' href="<?php echo $row['linkv']?>?id=<?php echo $row['id']; ?>&pmrn=<?php echo $row['pmrn']; ?>&eid=<?php echo $row['eid']; ?>">EDIT</a></td>
  	  
<td align="center"colspan="1"><a target='_blank' href="<?php echo $row['report']?>?id=<?php echo $row['id']; ?>&pmrn=<?php echo $row['pmrn']; ?>&eid=<?php echo $row['eid']; ?>&sno=<?php echo 'I'.$row['id']; ?>">REPORT</a></td>
      </tr>


	<?php $count++;  }}
	
	else {
	
	echo '<script language="javascript">';
    echo 'alert("Only Lab Consultant have privilege to Access... Thank You !!"); ';
    echo '</script>';
	
	$url = "labome";
	//header("Location: $url");
	
	header("Refresh: .1; URL=$url");
}
?>



            </tbody>
        </table>
    </form>
</body>

</html>

 <div id="add_data_Modal" class="modal fade" tabindex="-1" >  
      <div class="modal-dialog">  
           <div class="modal-content">  
                
                <div class="modal-body">  
                     <form method="post" id="insert_form" name="frmMain2">  
                          
                          
						  <textarea name="address" id="address" style="width:500px;" readonly cols="1" rows="6"> </textarea>
						  	<script>
    CKEDITOR.replace('address', {
      width: '100%',
      height: 200
	  
    });
  </script>
			
			
			<td colspan="10"align="right" id='address'style="font-weight: bold;font-size:35px;color:red"></td>

                          <input type="hidden" name="id" id="id" /> 
						   <input type="hidden" name="code2" id="code2" /> 
						   <input type="hidden" name="add2" id="add2" /> 
						   <input type="hidden" name="rloc" id="rloc" />
						   <input type="hidden" name="lrfid" id="lrfid" />
						  
						   
						
						  
						  
            
       				  
						  
						  <label for="age" style="width:500px;"><strong>Barcode:</strong></label>
      <input type="text" id="pmrn" onkeyup="GetDetail(this.value)" class="form-control action" list="categoryname" autocomplete="off" name='code' required style="font-weight: bold;font-size:22px;color:green;width:500px;">

    <datalist id="categoryname">
	<option value=''>-Select-</option>
				
				<?php
            require('db1.php');
            $uname = '';
            $query = "select * from `purchase_stock` where add_qty>0 and location='Store'";
            $result = mysqli_query($con, $query);
            while($row = mysqli_fetch_array($result)) {
        ?>
            <option value="<?php echo $row['rfid']; ?>"><?php echo $row['rfid'].'('.$row['g_name'].')'; ?></option>
        <?php } ?>
        
    </datalist>

<label for="age"><strong>Generic Name:</strong></label>							
	<textarea name="g_name" id="code" class="form-control action" cols="1" rows="1"style="font-weight: bold;font-size:22px;color:green"readonly required>


</textarea>

<br>
<label for="age"><strong>Brand Name:</strong></label>						
						
						 
						
						
		<input type="text" name="b_name" id="brand" required value="" readonly style="font-weight: bold;font-size:22px;color:green"></td>
		

		<label for="age"><strong>Expiry Date:</strong></label>						
						<input type="hidden" name="prfid" id="prfid" required>
						
						
		
						<input type="text" name="location" id="location" required readonly value="" style="font-weight: bold;font-size:22px;color:green"></td>
		
 
		
		
		<label for="age"><strong>R.Qty:</strong></label>	
						  <input type="number" name="result5" id="result5" readonly style="width:70px;"> 
		
		
		<label for="age"><strong>G.Qty:</strong></label>	
						  <input type="number" name="gqty" id="gqty" readonly style="width:70px;"> 
		
		
<label for="age"><strong>A. Qty:</strong></label>								

<input type="number" name="tqty" id="tqty" required value="" readonly style="font-weight: bold;font-size:16px;color:green;width:90px">


		  
						  
						  
				


<label for="age"><strong>S.Qty:</strong></label>	
<input type="number" name="sqty" id="sqty"  required value="" style="font-weight: bold;font-size:16px;color:green;width:80px" >





	<label for="age"><strong>Batch NO:</strong></label>	
	<input type="text" name="u_price" id="u_price" readonly value="" style="font-weight: bold;font-size:20px;color:red;width:250px">
				
						
&nbsp;&nbsp;						<input type="submit" name="insert" id="insert45" value="Insert" class="btn btn-success" style="font-weight: bold;font-size:22px;color:red;width:80px">  
						</strong>&nbsp;&nbsp;&nbsp;&nbsp;
						<button type="button" class="btn btn-default" name="close" id="close" data-dismiss="modal" style="font-weight: bold;font-size:22px;color:red;width:80px">Close</button>  
						</label>
						
						
	  

	
		
	  
	  
	  
                     </form>  
                </div>  
                  
           </div>  
      </div>  
 </div>  
<script>  
 $(document).ready(function(){  
      $('#add').click(function(){ 
//$('insert_form').trigger('reset');	  
           $('#insert').val("Insert");  
           $('#insert_form')[0].reset();  
      });  
	  
	  jQuery(document).ready(function(e) {
  $('#add_data_Modal').on('shown.bs.modal', function() {
    $('input[name="code"]').focus();
  });
});

	  
	  
      $(document).on('click', '.edit_data', function(){  
	  
	  $('#add_data_Modal').modal({backdrop: 'static', keyboard: false})  
           var employee_id = $(this).attr("id");  
           $.ajax({  
                url:"ipd_search_inves.php",  
                method:"POST",  
                data:{employee_id:employee_id},  
				
                dataType:"json",  
                success:function(data){  
                    
                     $('#address').val(data.result1); 
					 $('#add2').val(data.result); 

					// $('#code').val(code); 		
                     $('#result5').val(data.result); 
					 
					 $('#gqty').val(data.add_qty); 
					$('#id').val(data.id);					 
					
					 $('#rloc').val(data.location);
$('#lrfid').val(data.sno);					 
					 //$('#ggqty').val(data.req_qty); 
					  
                     
					 
                     $('#employee_id').val(data.id);  
                     $('#insert45').val("Serve");  
                     $('#add_data_Modal').modal('show');  
                }  
				 
				 
				 
				
				
           });  
      });  
      $('#insert_form').on("submit", function(event){  
	  
	  //var tr = $('#sqty').val() + $('#gqty').val();
           event.preventDefault();  
		   
		     var x = document.forms["insert_form"]["sqty"].value;
			 var xx = document.forms["insert_form"]["gqty"].value;
			 var z = document.forms["insert_form"]["tqty"].value;
			  var xy = document.forms["insert_form"]["result5"].value;
			 var ox = +x + +xx;
           if($('#code2').val() != $('#add2').val())  
           {  
                alert("Medicine is Not Mactched");  
           }
		   
		   
		    else if(ox > z)  
			  // else if(x !='')  
           {  
                alert("Insufficient Balance- " + ox);  
           }
		   
		   
		   else if(ox > xy)  
			  // else if(x !='')  
           {  
                alert("Servering Qty is Grater Than The Request Qty- " + ox);  
           } 
		   
		    
		   
		   
           else  
           {  
                $.ajax({  
                     url:"new_purchase_dispense3.php",  
                     method:"POST",  
                     data:$('#insert_form').serialize(),  
                     beforeSend:function(){  
                          $('#insert').val("Inserting");  
                     },  
                     success:function(data){  
                          $('#insert_form')[0].reset();  
                          $('#add_data_Modal').modal('hide');  
                          $('#employee_table').html(data);  
						  
						  
						  
						  parent.location.reload();
                     } 






					 
                });  
           }  
      });  
	  
	  $('#close').click(function(){
	  
          
						$('#insert_form')[0].reset();    
						// parent.location.reload();
                       
                });  
				
				
    


       
	  
	  
	  
	  
	  
	  
      $(document).on('click', '.view_data', function(){  
           var employee_id = $(this).attr("id");  
           if(employee_id != '')  
           {  
                $.ajax({  
                     url:"selectmodallab.php",  
                     method:"POST",  
                     data:{employee_id:employee_id},  
                     success:function(data){  
                          $('#employee_detail').html(data);  
                          $('#dataModal').modal('show');  
                     }  
                });  
           }            
      });  
 });  
 
 
 </script>
 
	<script>

		// onkeyup event will occur when the user
		// release the key and calls the function
		// assigned to this event
		function GetDetail(str) {
			
			
			
			
			if (str.length == 0) {
				document.getElementById("tqty").value = "";

				document.getElementById("brand").value = "";
				document.getElementById("code").value = "";
				document.getElementById("uprice").value = "";
				document.getElementById("location").value = "";
				document.getElementById("perlevel").value = "";
				
				//document.getElementById("pp").value = "";
				
				return;
			}
			else {

				// Creates a new XMLHttpRequest object
				var xmlhttp = new XMLHttpRequest();
				xmlhttp.onreadystatechange = function () {

					// Defines a function to be called when
					// the readyState property changes
					if (this.readyState == 4 &&
							this.status == 200) {
						
						// Typical action to be performed
						// when the document is ready
						var myObj = JSON.parse(this.responseText);

						// Returns the response data as a
						// string and store this array in
						// a variable assign the value
						// received to first name input field
						
						document.getElementById
							("tqty").value = myObj[0];
						
						
						document.getElementById
							("code2").value = myObj[5];
						
						// Assign the value received to
						// last name input field
//						document.getElementById(
	//						"page").value = myObj[1];
							
							document.getElementById(
							"u_price").value = myObj[1];
							
							
							
							document.getElementById(
							"code").value = myObj[2];
							
							document.getElementById(
							"brand").value = myObj[3];
							
														document.getElementById(
							"location").value = myObj[4];
							
							
							document.getElementById(
							"prfid").value = myObj[6];
							//document.getElementById(
							//"perlevel").value = myObj[5];
							
							//document.getElementById(
							//"pp").value = myObj[3];
							
							//document.getElementById(
							//"qty").value = 0;
							
							
							
							if(myObj[0]>0){
							document.getElementById('tqty').style.color = "green";}
else {
							document.getElementById('tqty').style.color = "red";}		




							

					}
				};

				// xhttp.open("GET", "filename", true);
				xmlhttp.open("GET", "stock_purchase_test.php?pmrn=" + str, true);
				
				// Sends the request to the server
				xmlhttp.send();
				
				
				
					
			}
		}
		
		
	
	</script>  
	
	
	<script>
	
	
	</script>
