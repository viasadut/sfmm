<?php 
    session_start();
    $role = $_SESSION['sess_userrole'];
    if(!isset($_SESSION['sess_username']) || $role!="bill"){
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

if(isset($_POST['but_update'])){

$pmrn=$_REQUEST['pmrn'];
$id=$_REQUEST['id'];
$dname=$_REQUEST['dname'];
$bdate=$_REQUEST['bdate'];
$bdate=$_REQUEST['bdate'];
$pname=$_REQUEST['pname'];
$psex=$_REQUEST['psex'];
$pphone=$_REQUEST['pphone'];

$te=date('d',strtotime($bdate));
$te1=date('m',strtotime($bdate));
$te2=date('Y',strtotime($bdate));
  


$date11=date_create("$te-$te1-$te2");
$date91=date_format($date11,'Y-m-d');
$date12= date('d-m-Y');
$date22=date_create($date12);
//$date90=date_format($date2,'d/m/Y');
$diff=date_diff($date22,$date11);
$diff1= $diff->format("%y Y %m M %d D");
$diff1;
$diff2= $diff->format("%y");

$url = "manual_bill1.php?pmrn=$pmrn&ID=$id&dname=$dname&bdate=$diff1&pname=$pname&psex=$psex&pphone=$pphone"; 

	header("Location: $url");
					
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


<form action="" method="POST" name='test1'>
<table width="100%" height ="100%" border="1" align="center" bgcolor="#FFFF99" style="border-collapse:collapse;">
<tr> 
<td colspan="10"><select name="select" required>
<option value='MRN'>MRN</option>
	  <option value='phone'>PHONE</option>
	  
	  </select></td>

<td colspan="5"><input type="text" name="search"placeholder="ENTER PHONE NO OR MRN" required></td>

<td colspan="5"><button type="submit" name="bsearch">Search</button></td>
</tr>
</table>
</form>


  
    <?php
	if(isset($_POST['bsearch'])){
$user=$_SESSION["sess_username"];
$pmrn=$_REQUEST["search"];
//$id=$_REQUEST["id"];

echo'<form action="" method="POST" name="test">
<table width="100%" height ="100%" border="1" align="center" bgcolor="#FFFF99" style="border-collapse:collapse;">
	<tr>
      <td colspan="1"align="center"><strong>S.No</strong></td>
      <td colspan="6"align="center"><strong>Patients Name</strong></td>
      <td colspan="1"align="center"><strong>MRN</strong></td>
      <td colspan="1"align="center"><strong>ID </strong></td>
      <td colspan="2"align="center"><strong>Address</strong></td>   
      <td colspan="1"align="center"><strong>Phone</strong></td>
	 <td colspan="6"align="center"><strong>Doctors Name</strong></td> 
      <td colspan="2"align="center"><strong>GO</strong></td>

	   </tr>
  
  <tbody>';





if (($_POST['select'])=="phone"){


$sel_query="Select * from patient where pphone= '$pmrn';";}
 else{
	 $sel_query="Select * from patient where pmrn= '$pmrn';";
 } 
$count=1;	 
$result = mysqli_query($con,$sel_query);



while($row = mysqli_fetch_assoc($result)) 
{ ?>    <tr>

      <td colspan="1" align="center"><?php echo $count; ?></td>
      <td colspan="6"align="center"><?php echo $row["pname"]; ?></td>
      <td colspan="1"align="center"><?php echo $row["pmrn"]; ?></td>
      <td colspan="1"align="center"><?php echo $row["ID"]; ?> 
	  <input name="pmrn" type="hidden" value='<?php echo $row['pmrn'];?>'>
	  <input name="id" type="hidden" value='<?php echo $row['ID'];?>'>
	  <input name="bdate" type="hidden" value='<?php echo $row['bdate'];?>'>
	  <input name="pname" type="hidden" value='<?php echo $row['pname'];?>'>
	  <input name="psex" type="hidden" value='<?php echo $row['psex'];?>'>
	  <input name="pphone" type="hidden" value='<?php echo $row['pphone'];?>'></td>
	  
	  </td> 
      <td colspan="2"align="center"><?php echo $row["padd"]; ?></td>
      <td colspan="1"align="center"><?php echo $row["pphone"]; ?> </td>
	  <td colspan="6"><input list="browsers10" name="dname" class="form-control" autocomplete="off" size="60%"value=''required>
  <datalist id="browsers10">
			        
					<option value=''>--Select Doctor's Name--</option>
					
				<?php 
			$sql = "select * from `doctor` where status in ('Active','Active1')";
			$res = mysqli_query($con, $sql);
			if(mysqli_num_rows($res) > 0) {
				while($row = mysqli_fetch_object($res)) {
					echo "<option value='".$row->dname."'>".$row->dname."</option>";
				}
			}
			?>
			</datalist></td>
	  
	  <td colspan='2' align='right'><input type='submit' value='Go' name='but_update'><br><br></td>

	  
      </tr>
    <?php $count++; } }?>
  </tbody>
</table>
</form>

</body>

</html>
