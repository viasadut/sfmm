<?php 
    session_start();
    $role = $_SESSION['sess_userrole'];
    if(!isset($_SESSION['sess_username']) || $role!="physio"){
      header('Location: login2?err=2');
    }
?>
<?php
$url1=$_SERVER['REQUEST_URI'];
header("Refresh: 30; URL=$url1");

?>



<?php
/*
Author: Javed Ur Rehman
Website: https://www.allphptricks.com/
*/
//session_start();
require('db1.php');
//include("auth.php");
$ss=$_REQUEST['sid'];
$fullname = $_SESSION['sess_username'];
$query39 = "SELECT * FROM user where uname= '$ss'"; 
	 
$result39 = mysqli_query($con, $query39) or die(mysqli_error());

// Print out result
$row39 = mysqli_fetch_array($result39);
$dname = $row39['fullname'];
$date9= date('m/d/Y');






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
button {
  padding: 19px 39px 18px 39px;
  color: #FFF;
  background-color: #A085C6;
  /*#4bc970*/
  font-size: 18px;
  text-align: center;
  font-style: normal;
  border-radius: 5px;
  width: 100%;
  height: 5%
  border: 1px solid #8265B0;
  /*#3ac162*/
  border-width: 1px 1px 3px;
  box-shadow: 0 -1px 0 rgba(255,255,255,0.1) inset;
  margin-bottom: 10px;
}
</style>


   <link rel="stylesheet" href="styles.css">
   <script src="jsnew/jquery-latest.min.js" type="text/javascript"></script>
   <script src="script.js"></script>




</head>


<body>


<div id='cssmenu'>
<ul>
   <li><a href='new_opd'><span>Home</span></a></li>
     
   <li class='last'><a href='logout'><span>LOGOUT</span></a></li>
</ul>
</div>








<p align="center" class="style1">!! WELCOME !! <?php echo $fullname; ?>'s Dash Board </p> 
<form action="cviewsp1" method="Post">
					
					

<table width="100%" height ="100%" border="1" align="center" bgcolor="#FFFF99" style="border-collapse:collapse;">

  <tr> <td colspan="20" bgcolor="lightblue"style="font:Verdana, Arial, Helvetica sans-serif large" style="font-weight:bold;color:red;"><b><h1><?php echo $dname;?><b></h1> </td> </tr>


    
    <tr>
      <th width="4%"><strong>S.No</strong></th>
      <th width="17%"><strong>Patient's Name</strong></th>
      <th width="10%"><strong>MRN</strong></th>
	  <th width="10%"><strong>Age</strong></th>
	  <th width="10%"><strong>Gender</strong></th>
      <th width="15%"><strong>Appointment Time </strong>
      <th width="14%"><strong>Date</strong> 
      <th width="14%"><strong>Reffered From</strong>
       
	  
      <th width="14%"><strong>Status</strong>

	  



	   </tr>
  </thead>
  <tbody>
  

  
  
		<?php
		
		





$user=$_SESSION["sess_username"];
$date= date('m/d/Y');
//$bt=$_REQUEST["bt"];
$count=1;
//echo   $bt;


$sel_query="Select * from pappnew where adate= '$date' and status IN ('HISTORY UPDATED','NOT SEEN')and dname='$dname' ORDER BY aslot asc;";

$result = mysqli_query($con,$sel_query);



while($row = mysqli_fetch_assoc($result)) { ?>
    <tr>
      <td align="center"><?php echo $count; ?></td>
	  
	   <?php 

$bstatus=$row['bill'];
$status=$row['status'];
$name=$row['pname'];
$ID=$row['ID'];
$pmrn=$row['pmrn'];
$url = "newcdetails_et_physio?ID=$ID&pmrn=$pmrn"; 

?>
	  
	  
      <td align="center">
	  
	  <?php if($bstatus=='BILLED' and $status!='HISTORY UPDATED'){echo"<a href='$url'><strong>".$name."</strong></a>";} else if($bstatus!='BILLED' and $status!='HISTORY UPDATED'){echo "<span style='color:red;text-align:center;'><b>".$name."";}

else if($status=='HISTORY UPDATED' and $bstatus=='BILLED'){echo "<span style='color:green;text-align:center;'><b>".$name."";}



?>
	  
	  
	  
	  </td>
      <td align="center"><?php echo $row["pmrn"]; ?>
	  <td align="center"><?php echo $row["page"]; ?>
	  <td align="center"><?php echo $row["psex"]; ?>
      <td align="center"><?php echo $row["aslot"]; ?>
      <td align="center"><?php echo $row["adate"]; ?>  
	  <td align="Left"><?php echo $row["dreffer"]; ?>  
	  	  
		
      
	  
	   

	   
	  



<td align="center"><?php if($bstatus=='BILLED' and $status!='HISTORY UPDATED'){echo"<a onclick='return confirm_click();' href='$url'><strong>UPDATE</strong></a>";} else if($bstatus!='BILLED' and $status!='HISTORY UPDATED'){echo "<span style='color:red;text-align:center;'><b>UNPAID";}

else if($status=='HISTORY UPDATED' and $bstatus=='BILLED'){echo "<span style='color:green;text-align:center;'><b>".$status."";}



?></td>
  

	       


	  
      </tr>
    <?php $count++; } ?>
	
	
		
	    
  </tbody>
</table>
</form>


</body>

</html>
