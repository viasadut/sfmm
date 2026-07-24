<?php 
    session_start();
    $role = $_SESSION['sess_userrole'];
    if(!isset($_SESSION['sess_username']) || $role!="staff"){
      header('Location: login2?err=2');
    }
?>
<?php
$url1=$_SERVER['REQUEST_URI'];
//header("Refresh: 5; URL=$url1");

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

$query40 = "SELECT * FROM staff3 where sid= '$fullname'"; 
	 
$result40 = mysqli_query($con, $query40) or die(mysqli_error());

// Print out result
$row40 = mysqli_fetch_array($result40);

$opd=$row40['opd'];





?>

<table width="100%" height ="100%" border="1" align="center" bgcolor="#FFFF99" style="border-collapse:collapse;" >
<tr >







  
   
	<?php
	
$user=$_SESSION["sess_username"];
$date= date('m/d/Y');
$count=1;
$sel_query="Select distinct dname from doctor where status='Active' and opd='$opd' order by dname asc";
//$start=$row["aadate"];

$row1 = mysqli_query($con,$sel_query);
while($row = mysqli_fetch_assoc($row1)) { ?>
      
      
	  
	   <?php
	   $date2=date('Y-m-d');
	   $dn = $row['dname'];
	   $call = $row['c_call'];
$query40 = "SELECT * FROM doctor where dname= '$dn' and status='Active' order by did desc "; 
	 
$result40 = mysqli_query($con, $query40) or die(mysqli_error());

// Print out result
$row40 = mysqli_fetch_array($result40);
$ss1=$row40['sid'];


			/*$sql1a = "select COUNT(status) from opd_appoint1 where dname='$dn' and date1='$date2' and status='NOT AVAILABLE'";
			$res1a = mysqli_query($con, $sql1a);
			$row41a = mysqli_fetch_array($res1a);
			*/
			$sql1aa = "select COUNT(status) from opd_appoint1 where dname='$dn' and date1='$date2' and status='AVAILABLE'";
			$res1aa = mysqli_query($con, $sql1aa);
			$row41aa = mysqli_fetch_array($res1aa);
			
			$sql1aaa = "select COUNT(status) from opd_appoint1 where dname='$dn' and date1='$date2' and status='Booked'";
			$res1aaa = mysqli_query($con, $sql1aaa);
			$row41aaa = mysqli_fetch_array($res1aaa);
			
			
						
			$bell = "select * from doctor where dname='$dn'";
			$bell_q = mysqli_query($con, $bell);
			$bell_r = mysqli_fetch_array($bell_q);
			$call_r = $bell_r['c_call'];

			
   $url = "new_opd_1?sid=$ss1";
$url1 = "doc_call_off_ca?dn=$dn&sid=$ss";   
   
	  if($row41aa['COUNT(status)']!=0 || $row41aaa['COUNT(status)']!=0)
	
	{
	echo"
	
	<td style='color:red;font-size:14px;font-weight:bold;text-align:center;'>
	<a href='$url'><img  src='prescription/prescription/doctor/".$ss1.".jpg' width='60'  height='60' align='center'></a>
	
	<span ><a href='$url'>".$dn."</a></span><br>";
	
	}
	
	
	
	?>

	<?php
	if($call_r==1)
		
		{
			
			echo "
			
			<audio autoplay><source src='call1.mp3'></audio>
			<a onclick='return confirm_click1();' href='$url1'>
			<img src='audio/call_bell1.gif' title='Calling...' width='80'  height='80'></a></td>
  ";
		}  
		
		
		
		else {echo "</td>";}

?>

      
	  
	 
	  
	  
	  
	  
    <?php $count++; } ?>
	
		</tr></table>
		
   <table width="100%" height ="100%" border="1" align="center" bgcolor="#FFFF99" style="border-collapse:collapse;" >
<tr> <td colspan="20" bgcolor="lightblue"style="font:Verdana, Arial, Helvetica sans-serif large;text-align:center;font-weight:bold;color:red;"><b><h2><?php echo $dname;?><b></h2> </td> </tr>


    
    <tr>
      <th width="4%"><strong>S.No</strong></th>
      <th width="17%"><strong>Patient's Name</strong></th>
      <th width="10%"><strong>MRN</strong></th>
	  <th width="10%"><strong>Age</strong></th>
	  <th width="10%"><strong>Gender</strong></th>
	  <th width="10%"><strong>Phone</strong></th>
      <th width="15%"><strong>Appointment Time </strong>
      <th width="14%"><strong>Date</strong> 
      <th width="14%"><strong>Reffered From</strong>
       
	  
      <th width="14%"><strong>Status</strong>

	  



	   </tr>

	
		<?php
		
		





$user=$_SESSION["sess_username"];
$date= date('Y-m-d');
//$bt=$_REQUEST["bt"];
$count=1;
//echo   $bt;


$sel_query="Select * from pappnew where adate1= '$date' and status IN ('HISTORY UPDATED','NOT SEEN')and dname='$dname' and aslot!=''ORDER BY aslot asc;";

$result = mysqli_query($con,$sel_query);



while($row = mysqli_fetch_assoc($result)) { ?>
    <tr >
      <td align="center"><?php echo $count; ?></td>
	  
	   <?php 

$bstatus=$row['bill'];
$status=$row['status'];
$name=$row['pname'];
$ID=$row['ID'];
$pmrn=$row['pmrn'];
$s_no=$row['s_no'];
$url = "newcdetails_et?ID=$ID&pmrn=$pmrn"; 

?>
	  
	  
      <td align="center">
	  
	  <?php if($bstatus=='BILLED' and $status!='HISTORY UPDATED' and $status!='SEEN'){echo"<a href='$url'><strong>".$name."</strong></a>";} 
	  else if($bstatus!='BILLED' and $status!='HISTORY UPDATED'){echo "<span style='color:red;text-align:center;'><b>".$name."";}
	  else if($status=='HISTORY UPDATED' and $bstatus=='BILLED'){echo "<span style='color:green;text-align:center;'><b>".$name."";}



?>
	  
	  
	  
	  </td>
      <td align="center"><?php echo $row["pmrn"]; ?>

	  <?php

	  $ID=$row['ID'];
	  $pmrn=$row['pmrn'];
$url1="opd_sticker_consultation?ID=$ID&pmrn=$pmrn";
	  ?>
	  <a  href=<?php echo $url1;?> target="_blank"><img src='print.png' title='Print Sticker' width='20' height='20' /></a>
	</td>
	  <td align="center"><?php echo $row["page"]; ?></td>
	  <td align="center"><?php echo $row["psex"]; ?></td>
	  <td align="center"><?php echo $row["pphone"]; ?></td>
      <td align="center"><?php echo $row["aslot"]; ?></td>
      <td align="center"><?php echo $row["adate"]; ?>  </td>
	  <td align="Left"><?php echo $row["dreffer"]; ?>  </td>
	  	  
		
      
	  
	   

	   
	  



<td align="center"><?php 
if($bstatus=='BILLED' and $status!='HISTORY UPDATED' and $status !='SEEN'){echo"<a onclick='return confirm_click();' href='$url'><strong>UPDATE</strong></a>";} 
else if($bstatus!='BILLED' and $status!='HISTORY UPDATED'){echo "<span style='color:red;text-align:center;'><b>UNPAID";}
else if($status=='HISTORY UPDATED' and $bstatus=='BILLED'){echo "<span style='color:green;text-align:center;'><b>".$status."";}



?></td>
  

	       
</tr>

	  
      
    <?php $count++; } ?>
	
	
	</table>