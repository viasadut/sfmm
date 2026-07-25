<?php 
    session_start();
    require('db1.php');
	$role = $_SESSION['sess_userrole'];
	
$queryc = "SELECT COUNT(utype) FROM user where '$role' in ('doctor','moopd','gpopd')"; 
$resultc = mysqli_query($con, $queryc) or die(mysqli_error());
$rowc = mysqli_fetch_array($resultc);
$c1=$rowc['COUNT(utype)'];
	
    if(!isset($_SESSION['sess_username']) || $c1==0){
      header('Location: login2?err=2');
    }
	$tt=$_SERVER['HTTP_HOST'];
  
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
$row39 = mysqli_fetch_array($result39)
?>
<?php
$full = $row39['fullname'];

$date3=date('d/m/Y');


$bell = "select * from doctor where sid='$fullname' and status='Active'";
			$bell_q = mysqli_query($con, $bell);
			$bell_r = mysqli_fetch_array($bell_q);
			$call_record=$bell_r['c_call'];
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

* {
  box-sizing: border-box;
}

#myInput {
  background-image: url('/css/searchicon.png');
  background-position: 10px 10px;
  background-repeat: no-repeat;
  width: 100%;
  font-size: 16px;
  padding: 12px 20px 12px 40px;
  border: 1px solid #ddd;
  margin-bottom: 12px;
}

#myTable {
  border-collapse: collapse;
  width: 100%;
  border: 1px solid #ddd;
  font-size: 18px;
}

#myTable th, #myTable td {
  text-align: center;
  padding: 12px;
  vertical-align: top;
  
}

#myTable tr {
  border-bottom: 1px solid #ddd;
}

#myTable tr.header, #myTable tr:hover {
  background-color: #f1f1f1;
}


img {
  
  
  display: block;
  margin-left: auto;
  margin-right: auto;
  
}

div1 {
  height: 50px;
  width: 50%;
  border: 1px solid #4CAF50;
  float: right;
  
}


div2 {
  height: 50px;
  width: 100%;
  border: 1px solid #4CAF50;
  float: right;
  
}



	
	.blink-bg{
		color: #fff;
		padding: 10px;
		display: inline-block;
		border-radius: 20px;
		animation: blinkingBackground 20s infinite;
	}
	@keyframes blinkingBackground{
		0%		{ background-color: #10c018;}
		25%		{ background-color: #1056c0;}
		50%		{ background-color: #ef0a1a;}
		75%		{ background-color: #254878;}
		100%	{ background-color: #04a1d5;}
	}
	
	
	
	
	blink {
  -webkit-animation: 2s linear infinite condemned_blink_effect; /* for Safari 4.0 - 8.0 */
  animation: 2s linear infinite condemned_blink_effect;
}

/* for Safari 4.0 - 8.0 */
@-webkit-keyframes condemned_blink_effect {
  0% {
    visibility: hidden;
  }
  50% {
    visibility: hidden;
  }
  100% {
    visibility: visible;
  }
}

@keyframes condemned_blink_effect {
  10% {
    visibility: hidden;
  }
  50% {
    visibility: hidden;
  }
  100% {
    visibility: visible;
  }
}

.blink_img {
  animation: blinker 2s linear infinite;
  
}
@keyframes blinker {
  50% { opacity: 0; }
}
@keyframes blin {
  50% { opacity: 0; }
}




.button {
  background-color: #004A7F;
  -webkit-border-radius: 5px;
  border-radius: 5px;
  border: none;
  color: #FFFFFF;
  cursor: pointer;
  display: inline-block;
  font-family: Arial;
  font-size: 20px;
  padding: 5px 5px;
  text-align: center;
  text-decoration: none;
  -webkit-animation: glowing 1500ms infinite;
  -moz-animation: glowing 1500ms infinite;
  -o-animation: glowing 1500ms infinite;
  animation: glowing 1500ms infinite;
}
@-webkit-keyframes glowing {
  0% { background-color: #B20000; -webkit-box-shadow: 0 0 3px #B20000; }
  50% { background-color: #FF0000; -webkit-box-shadow: 0 0 40px #FF0000; }
  100% { background-color: #B20000; -webkit-box-shadow: 0 0 3px #B20000; }
}

@-moz-keyframes glowing {
  0% { background-color: #B20000; -moz-box-shadow: 0 0 3px #B20000; }
  50% { background-color: #FF0000; -moz-box-shadow: 0 0 40px #FF0000; }
  100% { background-color: #B20000; -moz-box-shadow: 0 0 3px #B20000; }
}

@-o-keyframes glowing {
  0% { background-color: #B20000; box-shadow: 0 0 3px #B20000; }
  50% { background-color: #FF0000; box-shadow: 0 0 40px #FF0000; }
  100% { background-color: #B20000; box-shadow: 0 0 3px #B20000; }
}

@keyframes glowing {
  0% { background-color: #B20000; box-shadow: 0 0 3px #B20000; }
  50% { background-color: #FF0000; box-shadow: 0 0 40px #FF0000; }
  100% { background-color: #B20000; box-shadow: 0 0 3px #B20000; }
}
</style>


   <link rel="stylesheet" href="styles.css">
   <script src="jsnew/jquery-latest.min.js" type="text/javascript"></script>
   <script src="script.js"></script>

<script type="text/javascript">
function confirm_click1()
{
return confirm("Are you Sure to Respond this Call?");
}

</script>



<div style="position: relative;left: 500px; top:00px;">


<?php

$url1 = "doc_call_on?dn=$full";   
$url2 = "doc_call_off?dn=$full";   
	 if($call_record==0)
		
		{
			
			echo "
			
			
  
  <a onclick='return confirm_click9();' href='$url1'>
  <img src='../../audio/green_call.png' title='Active...' width='80'  height='60'></a></td>
  ";
		}  
		
		else if($call_record==1)
		
		{
			
			echo "
			
			
  <audio autoplay><source src='../../audio/call.mp3' type='audio/mpeg'></audio>
  <a onclick='return confirm_click1();' href='$url2'>
  <img src='../../audio/red_call.png' title='Calling...' width='80'  height='60'></a></td>
  ";
		}  
	 
?>	 
</div>

<table width="100%" height ="100%" border="1" align="center" bgcolor="#FFDEAD" style="border-collapse:collapse;" >
	<tr><td colspan="20" align="right" bgcolor="lightgreen">
	<span style='background-color:red;font-weight:bold;color:white;'>
	   
      BILL NOT PAID
    

	</span>
<span style='background-color:purple;font-weight:bold;color:white;'>
 
 BILL PAID & HISTORY NOT UPDATED
 
</span>
    <span style='background-color:blue; font-weight:bold;color:white;'>
 
 HISTORY UPDATED
 

    <tr><td colspan="20" align="left" bgcolor="lightpink" style="font-size:18px;color:green;font-weight:bold">UNSEEN PATIENTS</td></tr>
    <tr>

    
      <th width="4%"><strong>S.No</strong></th>
      <th width="17%"><strong>Patient's Name</strong></th>
      <th width="10%"><strong>MRN</strong></th>
	  <th width="10%"><strong>Category</strong></th>
	  <th width="10%"><strong>Gender</strong></th>
	  <th width="10%"><strong>Age</strong></th>
      <th width="15%"><strong>Appointment Time </strong>
      <th width="14%"><strong>Date</strong> 
      
	  <th width="14%"><strong>Episode</strong> 
      <th width="14%"><strong>Referred From</strong>  
	  <th width="14%"><strong>Status</strong>

	        <th width="14%"><strong>NEW</strong>
          <th width="14%"><strong>All Reports</strong>
          <th width="14%"><strong>All Records</strong>
          <th width="14%"><strong>PACS</strong>


	   </tr>
  </thead>
  <tbody>
	
	<?php
	    session_start();
	require('db1.php');
$user=$_SESSION["sess_username"];
$date= date('Y-m-d');
$count=1;

$query400 = "SELECT * FROM staff3 where sid= '$user'"; 
	 
$result400 = mysqli_query($con, $query400) or die(mysqli_error());

// Print out result
$row400 = mysqli_fetch_array($result400);

$opd=$row400['opd'];


$sel_query="Select * from pappnew where liver_opd='SFMM LIVER CLINIC' and adate1= '$date' and status not in('Cancel') and aslot!='' ORDER BY aslot asc;";
//$start=$row["aadate"];

$row1 = mysqli_query($con,$sel_query);
while($row = mysqli_fetch_assoc($row1)) { ?>
      
      
	  
	   <?php
	  $bstatus=$row['bill'];
$status=$row['status'];
$name=$row['pname'];
$ID=$row['ID'];
$pmrn=$row['pmrn'];
$next=$row['s_no'];
$url = "prescription3_3?ID=$ID&pmrn=$pmrn"; 
$url22 = "doc_call_next?ID=$ID&dname=$full";
	?>
	
	
		<tr>  
		<td align="center"><?php echo $count; ?></td>
<td align="center">
	  <?php if($bstatus=='BILLED' and $status!='HISTORY UPDATED'){echo"<span style='color:purple;text-align:center;'><b>".$name."";} else if($bstatus!='BILLED' and $status!='HISTORY UPDATED'){echo "<span style='color:red;text-align:center;'><b>".$name."";}

else if($status=='HISTORY UPDATED' and $bstatus=='BILLED'){echo "<strong>".$name."</strong>";}



?>
	  
	  </td>
      <td align="center">
	  
	  <?php if($bstatus=='BILLED' and $status!='HISTORY UPDATED'){echo"<span style='color:purple;text-align:center;'><b>".$pmrn."";} else if($bstatus!='BILLED' and $status!='HISTORY UPDATED'){echo "<span style='color:red;text-align:center;'><b>".$pmrn."";}

else if($status=='HISTORY UPDATED' and $bstatus=='BILLED' and $next==''){echo "<strong>".$pmrn."</strong>";}

else if($status=='HISTORY UPDATED' and $bstatus=='BILLED' and $next!=''){echo "<span style='color:darkgreen;text-align:center;font-size:18px;'><strong>".$pmrn.'-Next'."</strong></a>";}



?>
	  
	  </td>
	  
	  
	  <?php
	  $tr=$row['ptype'];
	  if($row['ptype']=='Staff' || $row['ptype']=='Staff Spouse' || $row['ptype']=='Staff Children' || $row['ptype']=='Consultant')
	{ 
echo "<td align='center' style='background-color:lightblue;'>".$tr."</td>";
	}
	
	else if($row['ptype']=='General') 
	{ 
echo "<td align='center' style='background-color:lightgreen;'>".$tr."</td>";
	}
	
	else if($row['ptype']=='VIP') 
	{ 
echo "<td align='center' style='background-color:red;'>".$tr."</td>";
	}
	
	
	else if($row['ptype']=='Corporate') 
	{ 
echo "<td align='center' style='background-color:lightyellow;'>".$tr."</td>";
	}
	
	else
	{ 
echo "<td align='center'>".$tr."</td>";
	}
	  ?>
	  <td align="center"><?php echo $row["psex"]; ?>  
	  <td align="center"><?php echo $row["page"]; ?>  
      <td align="center"><?php echo $row["aslot"]; ?>
      <td align="center"><?php echo $date3; ?>  
	  
	  
	 

<?php 

$pmrn1= $row['pmrn'];
$query43 = "SELECT COUNT(pmrn) FROM presnew where pmrn= '$pmrn1';"; 
$result43 = mysqli_query($con, $query43) or die(mysqli_error());
$row43 = mysqli_fetch_assoc($result43);
$count2 =$row43['COUNT(pmrn)'];
?>
<td align="center"><?php echo $count2; ?>  
	  <td align="center"><?php echo $row["dreffer"]; ?> 
	  <td align="center" style="font:Verdana, Arial, Helvetica, sans-serif large" style="font-weight:bold"><?php echo $row["status"];?> </td> 

	   <td align="center">
	   <?php if($bstatus=='BILLED' and $status!='HISTORY UPDATED'){echo"<span style='color:green;text-align:center;'><b>Billed";} else if($bstatus!='BILLED' and $status!='HISTORY UPDATED'){echo "<span style='color:red;text-align:center;'><b>UNPAID";}

else if($status=='HISTORY UPDATED' and $bstatus=='BILLED'){echo "<strong>New</strong>";}



?>
	   
	   
	   </td> 

     
<?php

$pmrn=$row["pmrn"];
$eid=$row["eid"];


?>
<td>
<a target='_blank' href="../../allreportdocnew?pmrn=<?php echo $pmrn; ?>"style="color:blue">ALL REPORTS</a>
</td>
<td>
<a target='_blank' href="../../deathstatdetailsmng?pmrn=<?php echo "$pmrn"; ?>"style="color:blue">ALL RECORDS</a>
</td>

<td>

<?php

$pmrn=$row["pmrn"];
if($tt=='192.168.100.252:8081')
{echo'

<form target="_blank" action="http://192.168.100.202/Launch_Viewer.asp?" method="post" id="tt" >
  <input type="hidden" name="PatientID" value="'.$pmrn.'"></input>
<input type="hidden" name="Username" value="hisuser"></input>
<input type="hidden" name="Password" value="hisuser"></input>
<input type="submit" name="Submit90" value="PACS VIEW" align="right"></input>
</form>';}

else
	
	{
		echo'<form target="_blank" action="http://182.160.124.36/Launch_Viewer.asp?" method="post" id="tt" >
      <input type="hidden" name="PatientID" value="'.$pmrn.'"></input>
<input type="hidden" name="Username" value="hisuser"></input>
<input type="hidden" name="Password" value="hisuser"></input>
<input type="submit" name="Submit90" value="PACS VIEW" align="right"></input>
</form>';
		
	}


	/*else
	
	{
		echo'<form target="_blank" action="http://180.211.162.10//Launch_Viewer.asp?" method="post" id="tt" >
<input type="hidden" name="AccessionNumber" value="'.$row['a_no'].'"</input>
<input type="hidden" name="Username" value="hisuser"></input>
<input type="hidden" name="Password" value="hisuser"></input>
<input type="submit" name="Submit90" value="PACS VIEW" align="right"></input>
</form>';
		
	}
*/
	?>

</td>  

<td>
<a target='_blank' href="../../liver_pres_view?pmrn=<?php echo "$pmrn"; ?>&eid=<?php echo "$eid"; ?>"style="color:blue">Prescription</a>
</td>

      </tr>
	
	
	
	


<?php $count++; } ?>



</tbody>
</table>

<br><br>





</body>

</html>





	

    
	
	