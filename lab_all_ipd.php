<?php 
    session_start();
    $role = $_SESSION['sess_userrole'];
    if(!isset($_SESSION['sess_username']) || $role!="doctor"){
      header('Location: login2?err=2');
    }
?>

<?php
header("Refresh: 60; URL=$url1");

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

$apdate=date('Y-m-d');
$test=date('Y-m-d', strtotime('-30 days') );

$laba = "SELECT COUNT(id) from alltest where type='lab' and rstatus ='RECEIVED' and status ='RECEIVED' and resultstatus='Updated By Technologist' and rdate between '$test' and '$apdate' and subtype in('BIOCHEMISTRY','HAEMATOLOGY','PROFILE','FLUIDS & EXCREATIONS') and rejectby=''"; 
$lab_resulta= mysqli_query($con, $laba) or die(mysqli_error());
$lab_rowa = mysqli_fetch_array($lab_resulta);
$lab_ra=$lab_rowa['COUNT(id)'];

$lab1a = "SELECT COUNT(id) from iinves where type='lab' and rstatus ='RECEIVED' and status ='RECEIVED' and resultstatus='Updated By Technologist' and rdate between '$test' and '$apdate' and subtype in('BIOCHEMISTRY','HAEMATOLOGY','PROFILE','FLUIDS & EXCREATIONS') and rejectby=''"; 
$lab_result1a= mysqli_query($con, $lab1a) or die(mysqli_error());
$lab_row1a = mysqli_fetch_array($lab_result1a);
$lab_r1a=$lab_row1a['COUNT(id)'];

$lab2a = "SELECT COUNT(id) from einves where type='lab' and rstatus ='RECEIVED' and status ='RECEIVED' and resultstatus='Updated By Technologist' and rdate between '$test' and '$apdate'and subtype in('BIOCHEMISTRY','HAEMATOLOGY','PROFILE','FLUIDS & EXCREATIONS') and rejectby=''"; 
$lab_result2a= mysqli_query($con, $lab2a) or die(mysqli_error());
$lab_row2a = mysqli_fetch_array($lab_result2a);
$lab_r2a=$lab_row2a['COUNT(id)'];


$lab2a4 = "SELECT COUNT(id) from iinves where type='lab' and rstatus ='RECEIVED' and status ='RECEIVED' and resultstatus='Updated By Technologist' and rdate between '$test' and '$apdate'and subtype in('BIOCHEMISTRY','HAEMATOLOGY','PROFILE','FLUIDS & EXCREATIONS') and rejectby!=''"; 
$lab_result2a4= mysqli_query($con, $lab2a4) or die(mysqli_error());
$lab_row2a4 = mysqli_fetch_array($lab_result2a4);
$reject_item=$lab_row2a4['COUNT(id)'];

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
            <li><a href='labome'><span>Home</span></a></li>
            <li class='last'><a href='logout'><span>LOGOUT</span></a></li>
        </ul>
    </div>
    <br>
    <h1 align="center" style="background-color:lightgreen;text-align:left"><a href='lab_all_opd'>OPD (<?php echo $lab_ra;?>)</a>&nbsp;&nbsp;&nbsp;<a href='lab_all_ipd' style="color:red">IPD(<?php echo $lab_r1a;?>)</a>&nbsp;&nbsp;&nbsp;<a href='lab_all_ae'>AE(<?php echo $lab_r2a;?>)</a></h1>
    <form action="" method="POST">
        
    <h1 align="center" style="background-color:lightgreen;">PENDING INVESTIGATION LIST FOR CONFIRMATION(IPD)</h1>
        <!-- Form Title -->
        <table width="100%" height="100%" border="1" align="center" bgcolor="#FFFF99" style="border-collapse:collapse;vertical-align:top;">
    


 <tr>
      <td colspan="1" align="center"><strong>S.No</strong></td>
      <td colspan="1" align="center"><strong>MRN</strong></td>
	  <td colspan="1" align="center"><strong>Barcode</strong></td>
      
      <td colspan="1" align="center"><strong>Collection Date </strong></td>
      <td colspan="2" align="center"><strong>Investigation</strong></td>
         
      <td colspan="1" align="center"><strong>Done Date</strong></td>
	  <td colspan="4" align="center"><strong>Result</strong></td>
	  <td colspan="4" align="center"><strong>Last Result</strong></td>
	  <td colspan="4" align="center"><strong>Reference Value</strong></td>
       	  <td colspan="2" align="center"><strong>Gender</strong></td>
		  <td colspan="1" align="center"><strong>Age</strong></td>
		  <td colspan="1" align="center"><strong>Confirm</strong></td>
		  <td colspan="1" align="center"><strong>Edit</strong></td>
		  <td colspan="1" align="center"><strong>Report</strong></td>
          <td colspan="1" align="center"><strong>Reject</strong></td>

	   </tr>
  
  <tbody>
  
    <?php
	
	if($ugroup=='lab' && $status='active'){	
	$apdate=date('Y-m-d');
$test=date('Y-m-d', strtotime('-30 days') );
$count=1;
$sel_query="Select * from iinves where type in ('lab','LAB','Lab') and rstatus ='RECEIVED' and status ='RECEIVED' and resultstatus='Updated By Technologist' and rdate between '$test' and '$apdate' and subtype in('BIOCHEMISTRY','HAEMATOLOGY','PROFILE','FLUIDS & EXCREATIONS','BIOCHEMISTRY	','FLUIDS & EXCREATIONS	','PROFILE	','HAEMATOLOGY	') and rejectby='' order by `resulttime` ASC;";

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
	  <td align="center"colspan="1"><?php echo date('d/m/Y H:i:s', strtotime($row["rtime"])); ?></td>  
	  <td align="center"colspan="2"><a target='_blank' href="all_test_compare?pmrn=<?php echo $row['pmrn']; ?>&infu=<?php echo $row['infusion']; ?>"style="color:#FF0000;"><?php echo $row["infusion"]; ?></a></td>
	  
			<td align="center"colspan="1"><?php echo $row["resulttime"]; ?></td>  
			<td align="left"colspan="4">
                
            <?php 
                    //if($ref1=!'' and $ref2!='' and is_int($ref1)==true and is_int($ref2)==true){
						if($ref1=!'' and $ref2!=''){
                    if($row['result']>=$ref1 and $row['result']<=$ref2){
                        echo nl2br($row["result"]);
                    //echo '<span style="color:red;font-weight:bold">'.nl2br($row["result"]).'</span>';
                }
                    else {

                      //  echo nl2br($row["result"]);
                        echo '<span style="color:red;font-weight:bold">'.nl2br($row["result"]).'</span>';
                    }
                }
                else{
                    echo nl2br($row["result"]);
                }
                    ?>
            
            
            </td>
			
			
			<td align="left" colspan="4">
					
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
			<td align="left"colspan="4"><?php echo nl2br($remarks);?></td>		  
        	  	  <td align="center"colspan="2" style="color:red;"><?php echo $row["pgender"]; ?></td>
	  
	  	  <td align="center"colspan="1"><?php echo $row["page"]; ?></td>
		  
		  
		  
		  
		  
<td align="center" colspan="1"><a onclick="return confirm_click();" href="labreportconfirm?id=<?php echo $row["id"]; ?>">Confirm</a></td>

<td align="center"colspan="1"><a target='_blank' href="<?php echo $row['linkv']?>?id=<?php echo $row['id']; ?>&pmrn=<?php echo $row['pmrn']; ?>&eid=<?php echo $row['eid']; ?>">Edit</a></td>
  	  
<td align="center"colspan="1"><a target='_blank' href="<?php echo $row['report']?>?id=<?php echo $row['id']; ?>&pmrn=<?php echo $row['pmrn']; ?>&eid=<?php echo $row['eid']; ?>&sno=<?php echo 'I'.$row['id']; ?>">Report</a></td>
<td align="center" colspan="1"><a onclick="return confirm_click1();" href="reject_ipd_bio?id=<?php echo $row["id"]; ?>">Reject</a></td>
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

<?php if($reject_item>0){
echo '<tr><td style="font-size:30px; color:red; font-weight:bold;" colspan="10">Waiting Investigation List</td></tr>';
}
?>
<?php
	
	if($ugroup=='lab' && $status='active'){	
	$apdate=date('Y-m-d');
$test=date('Y-m-d', strtotime('-30 days') );
$count=1;
$sel_query="Select * from iinves where type in ('lab','LAB','Lab') and rstatus ='RECEIVED' and status ='RECEIVED' and resultstatus='Updated By Technologist' and rdate between '$test' and '$apdate' and subtype in('BIOCHEMISTRY','HAEMATOLOGY','PROFILE','FLUIDS & EXCREATIONS','BIOCHEMISTRY	','FLUIDS & EXCREATIONS	','PROFILE	','HAEMATOLOGY	') and rejectby!='' order by `resulttime` ASC;";

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
      
	  <td align="center"colspan="1"><?php echo date('d/m/Y H:i:s', strtotime($row["rtime"])); ?></td>  
	  <td align="center"colspan="2"><a target='_blank' href="all_test_compare?pmrn=<?php echo $row['pmrn']; ?>&infu=<?php echo $row['infusion']; ?>"style="color:#FF0000;"><?php echo $row["infusion"]; ?></a></td>
	  
			<td align="center"colspan="1"><?php echo $row["resulttime"]; ?></td>  
			<td align="left"colspan="4">



            <?php 
                    if($ref1=!'' and $ref2!='' and is_int($ref1)==true and is_int($ref2)==true){
                    
                    if($row['result']>=$ref1 and $row['result']<=$ref2){
                        echo nl2br($row["result"]);
                    //echo '<span style="color:red;font-weight:bold">'.nl2br($row["result"]).'</span>';
                }
                    else {

                      //  echo nl2br($row["result"]);
                        echo '<span style="color:red;font-weight:bold">'.nl2br($row["result"]).'</span>';
                    }
                }
                else{
                    echo nl2br($row["result"]);
                }
                    ?>
            </td>
			
			
			
			<td align="left" colspan="4">
					
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
			<td align="left"colspan="4"><?php echo nl2br($remarks);?></td>		  
        	  	  <td align="center"colspan="2" style="color:red;"><?php echo $row["pgender"]; ?></td>
	  
	  	  <td align="center"colspan="1"><?php echo $row["page"]; ?></td>
		  
		  
		  
		  
		  
<td align="center" colspan="1"><a onclick="return confirm_click();" href="labreportconfirm?id=<?php echo $row["id"]; ?>">Confirm</a></td>

<td align="center"colspan="1"><a target='_blank' href="<?php echo $row['linkv']?>?id=<?php echo $row['id']; ?>&pmrn=<?php echo $row['pmrn']; ?>&eid=<?php echo $row['eid']; ?>">Edit</a></td>
  	  
<td align="center"colspan="1"><a target='_blank' href="<?php echo $row['report']?>?id=<?php echo $row['id']; ?>&pmrn=<?php echo $row['pmrn']; ?>&eid=<?php echo $row['eid']; ?>&sno=<?php echo 'E'.$row['id']; ?>">Report</a></td>
<td align="center" colspan="1"><a onclick="return confirm_click1();" href="reject_ipd_bio?id=<?php echo $row["id"]; ?>">Reject</a></td>
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