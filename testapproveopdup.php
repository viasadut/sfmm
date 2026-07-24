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

div1 {
    height: 40px;
    width: 30%;
    background-color: powderblue;
}
</style>


   <link rel="stylesheet" href="styles.css">
   <script src="jsnew/jquery-latest.min.js" type="text/javascript"></script>
   <script src="script.js"></script>




</head>


<body>
<div id='cssmenu'>
<ul>
   <li><a href='endohome'><span>Home</span></a></li>
      
		  		  
      <li class='last'><a href='logout'><span>LOGOUT</span></a></li>
</ul>
</div>





	
	

<form action="" method="POST">
<h1 align="center"style="background-color:lightgreen;">48 Hrs Approved Investigation List</h1>
<!-- Form Title -->
        
<table width="100%" height ="100%" border="1" align="center" bgcolor="#FFFF99" style="border-collapse:collapse;">




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
		  <td colspan="1" align="center"><strong>Confirm</strong></td>
		  <td colspan="1" align="center"><strong>Edit</strong></td>
		  <td colspan="1" align="center"><strong>Report</strong></td>

	   </tr>
  
  <tbody>
  
    <?php
	
	if($ugroup=='lab' && $status='active'){	
	$apdate=date('Y-m-d');
$test=date('Y-m-d', strtotime('-3 days') );
$count=1;
$sel_query="Select * from alltest where type in('lab','Lab','LAB') and rstatus ='RECEIVED' and status ='RECEIVED' and resultstatus='Confirmed By Consultant' and rdate between '$test' and '$apdate'  order by `id` DESC;";

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
     <td align="center"colspan="1"><?php echo $row["pmrn"]; ?></td>
      
	  <td align="center"colspan="1"><?php echo date('d/m/Y',strtotime($row["date1"])); ?></td>  
	  <td align="center"colspan="2"><?php echo $row["medi"]; ?></td>
	  
			<td align="center"colspan="1"><?php echo $row["rtime"]; ?></td>  
			<td align="left"colspan="4"><?php echo $row["result"]; ?></td>
			<td align="left"colspan="4"><?php echo nl2br($remarks);?></td>		  
        	  	  <td align="center"colspan="2"><?php echo $row["rcomments"]; ?></td>
	  
	  	  <td align="center"colspan="1"><?php echo $row["rby"]; ?></td>
		  
		  
		  
		  
		  
<td align="center" colspan="1"><a onclick="return confirm_click();" href="labreportconfirmopd?id=<?php echo $row["id"]; ?>">Confirm</a></td>

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
  	  
<td align="center"colspan="1"><a target='_blank' href="<?php echo $row['report']?>?id=<?php echo $row['id']; ?>&pmrn=<?php echo $row['pmrn']; ?>&eid=<?php echo $row['eid']; ?>&sno=<?php echo 'O'.$row['id']; ?>">REPORT</a></td>
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

<td align="center" colspan="20"><h1 align="center"style="background-color:lightgreen;">APPROVED INVESTIGATION LIST (IPD)</h1></td>



<?php
	
	if($ugroup=='lab' && $status='active'){	
	$apdate=date('Y-m-d');
$test=date('Y-m-d', strtotime('-3 days') );
$count=1;
$sel_query="Select * from iinves where type in('lab','LAB','Lab') and rstatus ='RECEIVED' and status ='RECEIVED' and resultstatus='Confirmed By Consultant' and rdate between '$test' and '$apdate'  order by `id` DESC;";

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
     <td align="center"colspan="1"><?php echo $row["pmrn"]; ?></td>
      
	  <td align="center"colspan="1"><?php echo $row["odate"]; ?></td>  
	  <td align="center"colspan="2"><?php echo $row["infusion"]; ?></td>
	  
			<td align="center"colspan="1"><?php echo $row["rtime"]; ?></td>  
			<td align="left"colspan="4"><?php echo $row["result"]; ?></td>
			<td align="left"colspan="4"><?php echo nl2br($remarks);?></td>		  
        	  	  <td align="center"colspan="2"><?php echo $row["rcomments"]; ?></td>
	  
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

<td align="center" colspan="20"><h1 align="center"style="background-color:lightgreen;">APPROVED INVESTIGATION LIST (A&E)</h1></td>
    <?php
	
	if($ugroup=='lab' && $status='active'){	
	$apdate=date('Y-m-d');
$test=date('Y-m-d', strtotime('-3 days') );
$count=1;
$sel_query="Select * from einves where type in('lab','LAB','Lab') and rstatus ='RECEIVED' and status ='RECEIVED' and resultstatus='Confirmed By Consultant' and rdate between $test and '$apdate'  order by `id` DESC;";

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
     <td align="center"colspan="1"><?php echo $row["pmrn"]; ?></td>
      
	  <td align="center"colspan="1"><?php echo $row["odate"]; ?></td>  
	  <td align="center"colspan="2"><?php echo $row["infusion"]; ?></td>
	  
			<td align="center"colspan="1"><?php echo $row["rtime"]; ?></td>  
			<td align="left"colspan="4"><?php echo $row["result"]; ?></td>
			<td align="left"colspan="4"><?php echo nl2br($remarks);?></td>		  
        	  	  <td align="center"colspan="2"><?php echo $row["rcomments"]; ?></td>
	  
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




  </tbody>
</table>

</form>

</body>

</html>
