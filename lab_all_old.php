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
    <meta charset="utf-8">
    <title>View Records</title>
    <link rel="stylesheet" href="css/style2.css">
    <style type="text/css">
    <!--
    .style1 {
        font-size: x-large;
        font-weight: bold;
        font-style: italic;
    }
    -->
    div1
    {
    height:
    40px;
    width:
    30%;
    background-color:
    powderblue;
    }
    </style>
    <link rel="stylesheet" href="styles.css">
    <script src="jsnew/jquery-latest.min.js" type="text/javascript"></script>
    <script src="script.js"></script>
	
	<script type="text/javascript">
function confirm_click()
{
return confirm("Are you Sure to Confirm this Report ?");
}

</script>

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
						
						
						$opd_last= mysqli_query($db,"select * from alltest where pmrn='$pmrn' and medi='$inf1' and rdate NOT IN('0000-00-00','NULL') and cby!='' order by id desc limit 1");
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


$opd_last= mysqli_query($db,"select * from alltest where pmrn='$pmrn' and medi='$inf1' and rdate NOT IN('0000-00-00','NULL') and cby!='' order by id desc limit 1");
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
		  
		  
		$opd_last= mysqli_query($db,"select * from alltest where pmrn='$pmrn' and medi='$inf1' and rdate NOT IN('0000-00-00','NULL') and cby!='' order by id desc limit 1");
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
		  
		  
		  
		  
		  
<td align="center" colspan="1"><a onclick="return confirm_click();" href="labreportconfirm?id=<?php echo $row["id"]; ?>">Confirm</a></td>

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