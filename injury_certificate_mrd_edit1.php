<?php 
    session_start();
    $role = $_SESSION['sess_userrole'];
    if(!isset($_SESSION['sess_username']) || $role!="mrd"){
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
 
?>


<?php

$id=$_REQUEST['id'];
if(isset($_POST['but_update'])){

$pmrn=$_REQUEST['pmrn'];
//$id=$_REQUEST['id'];
$dname=$_REQUEST['dname'];
$dname1=$_REQUEST['dname1'];
$bdate=$_REQUEST['bdate'];
$bdate=$_REQUEST['bdate'];
$pname=$_REQUEST['pname'];
$psex=$_REQUEST['psex'];
$pphone=$_REQUEST['pphone'];

$te=date('d',strtotime($bdate));
$te1=date('m',strtotime($bdate));
$te2=date('Y',strtotime($bdate));
  
$atime=date('Y-m-d H:i:s');

$date11=date_create("$te-$te1-$te2");
$date91=date_format($date11,'Y-m-d');
$date12= date('d-m-Y');
$date22=date_create($date12);
//$date90=date_format($date2,'d/m/Y');
$diff=date_diff($date22,$date11);
$diff1= $diff->format("%y Y %m M %d D");
$diff1;
$diff2= $diff->format("%y");

//$url = "cam_test/injury_upload_edit.php?pmrn=$pmrn&dname=$dname&id=$id"; 

//	header("Location: $url");

$ins_query="update injury set `euser`='$dname',`econfirmby`='$dname1',`euser_assign`='$user',`euser_assign_time`='$atime',`estatus`='Pending' where id='$id'";

if(mysqli_query($con,$ins_query)===true){

    echo '<script language="javascript">';
    echo 'alert("Injury Certificate Issued Successfully !!"); ';
echo '</script>';

header("Location: injury_certificate_mrd_edit");
}

else {
    echo '<script language="javascript">';
    echo 'alert("Something Went Wrong !!"); ';
echo '</script>';

}



}
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

   <script src="script.js"></script>




</head>


<body>

<div id='cssmenu'>
<ul>
   <li><a href='bcview'><span>Home</span></a></li>
   
   </li>
   
   
   
   <li class='last'><a href='logout'><span>LOGOUT</span></a></li>
</ul>
</div>
<p align="center" class="style1">WELCOME TO PATIENT'S SEARCH PANEL FOR ADMISSION </p> 




  


<form action="" method="POST" name="test">
<table width="100%" height ="100%" border="1" align="center" bgcolor="#FFFF99" style="border-collapse:collapse;">
	<tr>
      <td colspan="1"align="center"><strong>S.No</strong></td>
      <td colspan="6"align="center"><strong>Patients Name</strong></td>
      <td colspan="1"align="center"><strong>MRN</strong></td>
      <td colspan="4"align="center"><strong>Details </strong></td>
      
	 <td colspan="3"align="center"><strong>Doctors Name</strong></td> 
   <td colspan="3"align="center"><strong>Confirm By</strong></td> 
      <td colspan="2"align="center"><strong>Confirm</strong></td>

	   </tr>
  
  <tbody>





  <?php
	
    $user=$_SESSION["sess_username"];
    $pmrn=$_REQUEST["search"];
    


$sel_query="Select * from injury where id= '$id' and estatus!='Confirmed';";

$count=1;	 
$result = mysqli_query($con,$sel_query);



while($row = mysqli_fetch_assoc($result)) 
{ ?>    <tr>

      <td colspan="1" align="center"><?php echo $count; ?></td>
      <td colspan="6"align="center"><?php echo $row["pname"]; ?></td>
      <td colspan="1"align="center"><?php echo $row["pmrn"]; ?></td>
      <td colspan="4"align="center"><?php echo $row["ffor"]; ?> 
	  <input name="pmrn" type="hidden" value='<?php echo $row['fdate_new'];?>'>
	  <input name="id" type="hidden" value='<?php echo $row['id'];?>'>
	  <input name="bdate" type="hidden" value='<?php echo $row['bdate'];?>'>
	  <input name="pname" type="hidden" value='<?php echo $row['pname'];?>'>
	  <input name="psex" type="hidden" value='<?php echo $row['psex'];?>'>
	  <input name="pphone" type="hidden" value='<?php echo $row['pphone'];?>'></td>
    <input name="pmrn" type="hidden" value='<?php echo $row['pmrn'];?>'></td>
	  
	  </td> 
      
	  <td colspan="3"><input list="browsers10" name="dname" class="form-control" autocomplete="off" size="60%"value='<?php echo $row['user'];?>'>
  <datalist id="browsers10">
			        
					<option value=''>--Select Doctor's Name--</option>
					
				<?php 
			$sql = "select * from `staff1` where astatus in ('Active','Active1')";
			$res = mysqli_query($con, $sql);
			if(mysqli_num_rows($res) > 0) {
				while($row5 = mysqli_fetch_object($res)) {
					echo "<option value='".$row5->mname."'>".$row5->mname."</option>";
				}
			}
			?>
			</datalist></td>
	  


      <td colspan="3"><input list="browsers11" name="dname1" class="form-control" autocomplete="off" size="60%"value='<?php echo $row['confirmby'];?>'>
  <datalist id="browsers11">
			        
					<option value=''>--Select Doctor's Name--</option>
					
				<?php 
			$sql1 = "select * from `staff1` where astatus in ('Active','Active1')";
			$res1 = mysqli_query($con, $sql1);
			if(mysqli_num_rows($res1) > 0) {
				while($row51 = mysqli_fetch_object($res1)) {
					echo "<option value='".$row51->mname."'>".$row51->mname."</option>";
				}
			}
			?>
			</datalist></td>
	  <td colspan='2' align='right'>
      
    
    
    <input type='submit' value='Confirm' name='but_update'><br><br></td>

	  
      </tr>
    <?php $count++; } ?>
  </tbody>
</table>
</form>

</body>

</html>
