<?php 
    session_start();
    $role = $_SESSION['sess_userrole'];
    if(!isset($_SESSION['sess_username']) || $role!="mng"){
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

                <td colspan="1" align="center"><strong>Order Date </strong></td>
                <td colspan="2" align="center"><strong>Investigation</strong></td>

                <td colspan="1" align="center"><strong>Done Date</strong></td>
                <td colspan="4" align="center"><strong>Result</strong></td>
                <td colspan="4" align="center"><strong>Reference Value</strong></td>
                <td colspan="2" align="center"><strong>Received Comments</strong></td>
                <td colspan="1" align="center"><strong>Received By</strong></td>
                
                <td colspan="1" align="center"><strong>Report</strong></td>
            </tr>
            <tbody>
                <?php
                    
                        $apdate=date('Y-m-d');
                        $test=date('Y-m-d', strtotime('-35 days') );
                        $count=1;
                        $sel_query="Select * from alltest where type='lab' and rstatus ='RECEIVED' and status ='RECEIVED' and resultstatus='Updated By Technologist' and date1 between '$test' and '$apdate'  and subtype in('BACTERIOLOGY','IMMUNOLOGY/SEROLOGY','VIROLOGY') and rejectby='' order by `id` DESC;";
                        $result = mysqli_query($con,$sel_query);
                        while($row = mysqli_fetch_assoc($result)){
                ?>
                <tr>
                    <?php 
                        $medi=$row["code"];
                        $selq="Select * from radio where code='$medi';";
                        $resultq = mysqli_query($con,$selq);
                        $rowq = mysqli_fetch_assoc($resultq);
                        $ref1=$rowq['reference'];
                        $ref2=$rowq['ref2'];
                        $unit=$rowq['unit'];
                        $remarks=$rowq['remarks'];    
                    ?>
                    <td align="center" colspan="1"><?php echo $count; ?></td>
                    <td align="center"colspan="1"><a target='_blank' href="allreportdocnew?pmrn=<?php echo $row['pmrn']; ?>"style="color:#FF0000;"><?php echo $row["pmrn"]; ?></a></td>
                    <td align="center" colspan="1"><?php echo date('d/m/Y',strtotime($row["date1"])); ?></td>
                    <td align="center" colspan="2"><a target='_blank' href="all_test_compare?pmrn=<?php echo $row['pmrn']; ?>&infu=<?php echo $row['medi']; ?>"style="color:#FF0000;"><?php echo $row["medi"]; ?></a></td>
                    <td align="center" colspan="1"><?php echo $row["retime"]; ?></td>
                    <td align="center" colspan="4"><?php echo $row["result"]; ?></td>
                    <td align="center" colspan="4"><?php echo $remarks;?></td>
                    <td align="center" colspan="2"><?php echo $row["rcomments"]; ?></td>
                    <td align="center" colspan="1"><?php echo $row["rby"]; ?></td>
                    
                    <td align="center" colspan="1"><a target='_blank'
                        href="<?php echo $row['report']?>?id=<?php echo $row['id']; ?>&pmrn=<?php echo $row['pmrn']; ?>&eid=<?php echo $row['eid']; ?>&sno=<?php echo 'O'.$row['id']; ?>">REPORT</a>
                    </td>
                </tr>
                <?php $count++;  }
                ?>
				
				<tr><td colspan="20"> <h1><align="center"style="background-color:lightgreen;">PENDING INVESTIGATION LIST FOR CONFIRMATION(A&E)<h1></td></tr>
				
				
				
				
				<tr>
      <td colspan="1" align="center"><strong>S.No</strong></td>
      <td colspan="1" align="center"><strong>MRN</strong></td>
      
      <td colspan="1" align="center"><strong>Order Date </strong></td>
      <td colspan="2" align="center"><strong>Investigation</strong></td>
         
      <td colspan="1" align="center"><strong>Done Date</strong></td>
	  <td colspan="4" align="center"><strong>Result</strong></td>
	  <td colspan="4" align="center"><strong>Reference Value</strong></td>
       	  <td colspan="2" align="center"><strong>Received Comments</strong></td>
		  <td colspan="1" align="center"><strong>Received By</strong></td>

		  <td colspan="1" align="center"><strong>Report</strong></td>

	   </tr>
  
				<?php
	

	$apdate=date('Y-m-d');
$test=date('Y-m-d', strtotime('-30 days') );
$count=1;
$sel_query="Select * from einves where type='lab' and rstatus ='RECEIVED' and status ='RECEIVED' and resultstatus='Updated By Technologist' and ndate between $test and '$apdate' and subtype in('BACTERIOLOGY','IMMUNOLOGY/SEROLOGY','VIROLOGY') and rejectby='' order by `id` DESC;";

$result = mysqli_query($con,$sel_query);

while($row = mysqli_fetch_assoc($result)) 
{ ?>    <tr>

		  <?php 
		  $medi=$row["code"];
		  
		  $selq="Select * from radio where code='$medi';";

$resultq = mysqli_query($con,$selq);
$rowq = mysqli_fetch_assoc($resultq);
$ref1=$rowq['reference'];
$ref2=$rowq['ref2'];
$unit=$rowq['unit'];
$remarks=$rowq['remarks'];
		  
		  ?>

      <td align="center" colspan="1"><?php echo $count; ?></td>
     <td align="center"colspan="1"><a target='_blank' href="allreportdocnew?pmrn=<?php echo $row['pmrn']; ?>"style="color:#FF0000;"><?php echo $row["pmrn"]; ?></a></td>
      
	  <td align="center"colspan="1"><?php echo $row["odate"]; ?></td>  
	  <td align="center"colspan="2"><a target='_blank' href="all_test_compare?pmrn=<?php echo $row['pmrn']; ?>&infu=<?php echo $row['infusion']; ?>"style="color:#FF0000;"><?php echo $row["infusion"]; ?></a></td>
	  
			<td align="center"colspan="1"><?php echo $row["resulttime"]; ?></td>  
			<td align="center"colspan="4"><?php echo $row["result"]; ?></td>
			<td align="center"colspan="4"><?php echo $remarks;?></td>		  
        	  	  <td align="center"colspan="2"><?php echo $row["rcomments"]; ?></td>
	  
	  	  <td align="center"colspan="1"><?php echo $row["rby"]; ?></td>
		  
		  
		  
		  
		  
  	  
<td align="center"colspan="1"><a target='_blank' href="<?php echo $row['report']?>?id=<?php echo $row['id']; ?>&pmrn=<?php echo $row['pmrn']; ?>&eid=<?php echo $row['eid']; ?>&sno=<?php echo 'E'.$row['id']; ?>">REPORT</a></td>
      </tr>


	<?php $count++;  }
	
?>



<tr><td colspan="20"> <h1><align="center"style="background-color:lightgreen;">PENDING INVESTIGATION LIST FOR CONFIRMATION(IPD)<h1></td></tr>






 <tr>
      <td colspan="1" align="center"><strong>S.No</strong></td>
      <td colspan="1" align="center"><strong>MRN</strong></td>
      
      <td colspan="1" align="center"><strong>Order Date </strong></td>
      <td colspan="2" align="center"><strong>Investigation</strong></td>
         
      <td colspan="1" align="center"><strong>Done Date</strong></td>
	  <td colspan="4" align="center"><strong>Result</strong></td>
	  <td colspan="4" align="center"><strong>Reference Value</strong></td>
       	  <td colspan="2" align="center"><strong>Received Comments</strong></td>
		  <td colspan="1" align="center"><strong>Received By</strong></td>

		  <td colspan="1" align="center"><strong>Report</strong></td>

	   </tr>
  
  <tbody>
  
    <?php
	

	$apdate=date('Y-m-d');
$test3=date('Y-m-d', strtotime('-30 days') );
$count=1;
$sel_query="Select * from iinves where type='lab' and rstatus ='RECEIVED' and status ='RECEIVED' and resultstatus='Updated By Technologist' and ndate between '$test3' and '$apdate' and subtype in('BACTERIOLOGY','IMMUNOLOGY/SEROLOGY','VIROLOGY') and rejectby='' order by `id` DESC;";

$result = mysqli_query($con,$sel_query);

while($row = mysqli_fetch_assoc($result)) 
{ ?>    <tr>

		  <?php 
		  $medi=$row["code"];
		  
		  $selq="Select * from radio where code='$medi';";

$resultq = mysqli_query($con,$selq);
$rowq = mysqli_fetch_assoc($resultq);
$ref1=$rowq['reference'];
$ref2=$rowq['ref2'];
$unit=$rowq['unit'];
$remarks=$rowq['remarks'];
		  
		  ?>

      <td align="center" colspan="1"><?php echo $count; ?></td>
     <td align="center"colspan="1"><a target='_blank' href="allreportdocnew?pmrn=<?php echo $row['pmrn']; ?>"style="color:#FF0000;"><?php echo $row["pmrn"]; ?></a></td>
      
	  <td align="center"colspan="1"><?php echo $row["odate"]; ?></td>  
	  <td align="center"colspan="2"><a target='_blank' href="all_test_compare?pmrn=<?php echo $row['pmrn']; ?>&infu=<?php echo $row['infusion']; ?>"style="color:#FF0000;"><?php echo $row["infusion"]; ?></a></td>
	  
			<td align="center"colspan="1"><?php echo $row["resulttime"]; ?></td>  
			<td align="center"colspan="4"><?php echo $row["result"]; ?></td>
			<td align="center"colspan="4"><?php echo $remarks;?></td>		  
        	  	  <td align="center"colspan="2"><?php echo $row["rcomments"]; ?></td>
	  
	  	  <td align="center"colspan="1"><?php echo $row["rby"]; ?></td>
		  
		  
		  
		  
		  
  	  
<td align="center"colspan="1"><a target='_blank' href="<?php echo $row['report']?>?id=<?php echo $row['id']; ?>&pmrn=<?php echo $row['pmrn']; ?>&eid=<?php echo $row['eid']; ?>&sno=<?php echo 'I'.$row['id']; ?>">REPORT</a></td>
      </tr>


	<?php $count++;  }
	
	

	
?>


<tr><td colspan="20"> <h1><align="center"style="background-color:lightgreen;">PENDING INVESTIGATION LIST FOR CONFIRMATION(ENDOSCOPY)<h1></td></tr>






 <tr>
      <td colspan="1" align="center"><strong>S.No</strong></td>
      <td colspan="1" align="center"><strong>MRN</strong></td>
      
      <td colspan="1" align="center"><strong>Order Date </strong></td>
      <td colspan="2" align="center"><strong>Investigation</strong></td>
         
      <td colspan="1" align="center"><strong>Done Date</strong></td>
	  <td colspan="4" align="center"><strong>Result</strong></td>
	  <td colspan="4" align="center"><strong>Reference Value</strong></td>
       	  <td colspan="2" align="center"><strong>Received Comments</strong></td>
		  <td colspan="1" align="center"><strong>Received By</strong></td>
	
		  <td colspan="1" align="center"><strong>Report</strong></td>

	   </tr>
  
  <tbody>
  
    <?php
	
	
	$apdate=date('Y-m-d');
$test3=date('Y-m-d', strtotime('-30 days') );
$count=1;
$sel_query="Select * from endolab where type='lab' and rstatus ='RECEIVED' and status ='RECEIVED' and resultstatus='Updated By Technologist' and odate between '$test3' and '$apdate' and rejectby='' order by `id` DESC;";

$result = mysqli_query($con,$sel_query);

while($row = mysqli_fetch_assoc($result)) 
{ ?>    <tr>

		  <?php 
		  $medi=$row["code"];
		  
		  $selq="Select * from radio where code='$medi';";

$resultq = mysqli_query($con,$selq);
$rowq = mysqli_fetch_assoc($resultq);
$ref1=$rowq['reference'];
$ref2=$rowq['ref2'];
$unit=$rowq['unit'];
$remarks=$rowq['remarks'];
		  
		  ?>

      <td align="center" colspan="1"><?php echo $count; ?></td>
     <td align="center"colspan="1"><a target='_blank' href="allreportdocnew?pmrn=<?php echo $row['pmrn']; ?>"style="color:#FF0000;"><?php echo $row["pmrn"]; ?></a></td>
      
	  <td align="center"colspan="1"><?php echo $row["odate"]; ?></td>  
	  <td align="center"colspan="2"><a target='_blank' href="all_test_compare?pmrn=<?php echo $row['pmrn']; ?>&infu=<?php echo $row['infusion']; ?>"style="color:#FF0000;"><?php echo $row["infusion"]; ?></a></td>
	  
			<td align="center"colspan="1"><?php echo $row["resulttime"]; ?></td>  
			<td align="center"colspan="4"><?php echo $row["result"]; ?></td>
			<td align="center"colspan="4"><?php echo $remarks;?></td>		  
        	  	  <td align="center"colspan="2"><?php echo $row["rcomments"]; ?></td>
	  
	  	  <td align="center"colspan="1"><?php echo $row["rby"]; ?></td>
		  
		  
		  
		  
		  
  	  
<td align="center"colspan="1"><a target='_blank' href="<?php echo $row['report']?>?id=<?php echo $row['id']; ?>&pmrn=<?php echo $row['pmrn']; ?>&eid=<?php echo $row['eid']; ?>&sno=<?php echo 'I'.$row['id']; ?>">REPORT</a></td>
      </tr>


	<?php $count++;  }
	
	

	
	
?>


            </tbody>
        </table>
    </form>
</body>

</html>