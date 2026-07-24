<?php 
    session_start();
    $role = $_SESSION['sess_userrole'];
    if(!isset($_SESSION['sess_username']) || $role!="lab"){
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
   <li><a href='edischarge3'><span>Home</span></a></li>
   <li class='active has-sub'><a href='#'><span>Patients</span></a>
      <ul>
         <li class='has-sub'><a href='esearch'><span>Patient Search By MRN</span></a>         </li>
         <li class='has-sub'><a href='eadm'><span>New Patient</span></a>         </li>
      </ul>
   </li>
   
   
   
   <li class='last'><a href='logout'><span>LOGOUT</span></a></li>
</ul>
</div>
<p align="center" class="style1">WELCOME TO PATIENT'S SEARCH PANEL FOR ADMISSION </p> 


<form action="" method="POST">
<table width="100%" height ="100%" border="1" align="center" bgcolor="#FFFF99" style="border-collapse:collapse;">
<tr> 


<td colspan="10"><input type="text" name="search"placeholder="ENTER BARCODE NO"></td>

<td colspan="10"><button type="submit" name="bsearch">Search</button></td>
</tr>

    <tr>
      <td colspan="1" align="center"><strong>S.No</strong></td>
      <td colspan="1" align="center"><strong>MRN</strong></td>
      <td colspan="2" align="center"><strong>Requested By</strong></td>
      <td colspan="1" align="center"><strong>Order Date </strong></td>
      <td colspan="2" align="center"><strong>Investigation</strong></td>
      <td colspan="2" align="center"><strong>Remarks</strong></td>   
      <td colspan="2" align="center"><strong>Done Date</strong></td>
	  <td colspan="1" align="center"><strong>Status</strong></td>
       	  <td colspan="2" align="center"><strong>Received Comments</strong></td>
		  <td colspan="2" align="center"><strong>Received By</strong></td>
		  <td colspan="2" align="center"><strong>Update</strong></td>

	   </tr>
  
  <tbody>
  
    <?php
	if(isset($_POST['bsearch'])){
$user=$_SESSION["sess_username"];
$pmrn=$_REQUEST["search"];
//$id=$_REQUEST["id"];



$sel_query="Select * from iinves where barcode= '$pmrn' and rstatus='RECEIVED' and result!='';";
 
$count=1;	 
$result = mysqli_query($con,$sel_query);



while($row = mysqli_fetch_assoc($result)) 
{ ?>    <tr>

      <td colspan="1" align="center"><?php echo $count; ?></td>
      <td align="center"colspan="1"><?php echo $row["pmrn"]; ?></td>
       <td align="center"colspan="2"><?php echo $row["user"]; ?></td>
	  <td align="center"colspan="1"><?php echo $row["odate"]; ?></td>  
	  <td align="center"colspan="2"><?php echo $row["infusion"]; ?></td>
	        <td align="center"colspan="2"><?php echo $row["room"]; ?></td>
			<td align="center"colspan="2"><?php echo $row["rtime"]; ?></td>  
			<td align="center"colspan="1"<?php if($row['rstatus']== "REJECTED"): ?> style="background-color:RED;"<?php else: ?> style="background-color:lightblue;" <?php endif ; ?>>
        <?php echo $row['rstatus'];?></td>
        	  	  <td align="center"colspan="2"><?php echo $row["rcomments"]; ?></td>
	  
	  	  <td align="center"colspan="2"><?php echo $row["rby"]; ?></td>
		  
		  


<td><?php
		$type=$row["type"];
		$report5=$row["report"];
		$pmrn5=$row["pmrn"];
		
		$eid5=$row["eid"];
		$id5=$row["id"];
		$id6='I'.$row["id"];
		$dname5=$row["dname"];
		$rrr55=$row["resultstatus"];
		$url = "$report5?pmrn=$pmrn&eid=$eid5&id=$id5&sno=$id6"; 
		$url2 = "p4new1r.php?pmrn=$pmrn&acno=$id6&dname=$dname5"; 
		$url3 = "pipd.php?pmrn=$pmrn&id=$id5"; 
	  $rrr=$row["result"];
		$rrr1=$row["status"];
	  
	  		 if($type=='lab' || $type=='LAB' and $rrr!='')
	{ 
echo "<a target='_blank' href='$url'><img src='print.png' title='Print Report' width='150' height='60' /></a>";
	}
	
?>
	  </td>

	  
      </tr>
    <?php $count++; } }?>
	
	
	
	
	
	 <?php
	if(isset($_POST['bsearch'])){
$user=$_SESSION["sess_username"];
$pmrn=$_REQUEST["search"];
//$id=$_REQUEST["id"];



$sel_query="Select * from einves where barcode= '$pmrn' and rstatus='Received' and result!='';";
 
$count=1;	 
$result = mysqli_query($con,$sel_query);



while($row = mysqli_fetch_assoc($result)) 
{ ?>    <tr>

      <td colspan="1" align="center"><?php echo $count; ?></td>
      <td align="center"colspan="1"><?php echo $row["pmrn"]; ?></td>
       <td align="center"colspan="2"><?php echo $row["user"]; ?></td>
	  <td align="center"colspan="1"><?php echo $row["odate"]; ?></td>  
	  <td align="center"colspan="2"><?php echo $row["infusion"]; ?></td>
	        <td align="center"colspan="2"><?php echo $row["room"]; ?></td>
			<td align="center"colspan="2"><?php echo $row["rtime"]; ?></td>  
			<td align="center"colspan="1"<?php if($row['rstatus']== "REJECTED"): ?> style="background-color:RED;"<?php else: ?> style="background-color:lightblue;" <?php endif ; ?>>
        <?php echo $row['rstatus'];?></td>
        	  	  <td align="center"colspan="2"><?php echo $row["rcomments"]; ?></td>
	  
	  	  <td align="center"colspan="2"><?php echo $row["rby"]; ?></td>
		  
		  


<td><?php
		$type=$row["type"];
		$report5=$row["report"];
		$pmrn5=$row["pmrn"];
		
		$eid5=$row["eid"];
		$id5=$row["id"];
		$id6='E'.$row["id"];
		$dname5=$row["dname"];
		$url = "$report5?pmrn=$pmrn&eid=$eid5&id=$id5&sno=$id6"; 
		$url2 = "p4new1r.php?pmrn=$pmrn&acno=$id6&dname=$dname5"; 
	  $rrr=$row["result"];
	  $rrr55=$row["resultstatus"];
		$rrr1=$row["status"];
	  //$url3 = "$pemer?pmrn=$pmrn&id=$id5"; 
	  		 if($type=='lab' || $type=='LAB' and $rrr!='')
	{ 
echo "<a target='_blank' href='$url'><img src='print.png' title='Print Report' width='150' height='60' /></a>";
	}
	
	else {
		
		echo"$rrr55";
	}
	
	if($type=='rad' and $rrr1=='DONE')
	{ 
echo "<a target='_blank' href='$url2'><img src='print.png' title='Print Report' width='150' height='60' /></a>";
	}
?>
	  </td>

	  
      </tr>
    <?php $count++; } }?>
	
	
	
	
	
	  
	 <?php
	if(isset($_POST['bsearch'])){
$user=$_SESSION["sess_username"];
$pmrn=$_REQUEST["search"];
//$id=$_REQUEST["id"];

$count=1;
$sel_query="Select * from alltest where barcode1='$pmrn' and rstatus='RECEIVED' and result!='';";

$result = mysqli_query($con,$sel_query);
while($row = mysqli_fetch_assoc($result)) { ?>
    <tr>

      <td align="center"><?php echo $count; ?></td>
      <td align="center"><?php echo $row["pname"]; ?></td>
      <td align="center"><?php echo $row["pmrn"]; ?></td>

      <td align="center"><?php echo $row["date"]; ?></td>
	  <td align="center"><?php echo $row["retime"]; ?></td>
	  <td align="center"><?php echo $row["dname"]; ?></td>
	  	  <td align="center"><?php echo $row["medi"];?></td> 
	  
<td><?php
		$type=$row["type"];
		$report5=$row["report"];
		$pmrn=$row["pmrn"];
		
		$eid5=$row["eid"];
		$id5=$row["id"];
		$sno='O'.$row["id"];
		$rrr=$row["result"];
		$rrr55=$row["resultstatus"];
		$rrr1=$row["status"];
		$dname5=$row["dname"];
		$url = "$report5?pmrn=$pmrn&eid=$eid5&id=$id5&sno=$sno"; 
		$url2 = "p4new1r.php?pmrn=$pmrn&acno=$id5&dname=$dname5"; 
		$url3 = "popd.php?pmrn=$pmrn&id=$id5"; 
	  
	  
	  		 if($type=='lab' || $type=='LAB' and $rrr!='')
	{ 
echo "<a target='_blank' href='$url'><img src='print.png' title='Print Report' width='50' height='60' /></a>";
	}
	
	
?>
	  </td>
 

	  	  	  

      </tr>
    <?php $count++; } }?>

	
  </tbody>
</table>
</form>

</body>

</html>
