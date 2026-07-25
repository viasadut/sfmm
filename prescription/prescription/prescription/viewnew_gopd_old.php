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
?>
<?php
$url1=$_SERVER['REQUEST_URI'];
header("Refresh: 120; URL=$url1");
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

div1 {
    height: 40px;
    width: 30%;
    background-color: powderblue;
}
</style>


   <link rel="stylesheet" href="styles.css">
   <script src="jsnew/jquery-latest.min.js" type="text/javascript"></script>
   <script src="script.js"></script>



   <script type="text/javascript">
function confirm_click9()
{
return confirm("Are you Sure to Call ?");
}

</script>

<script type="text/javascript">
function confirm_click1()
{
return confirm("Are you Sure to Cancel The Call ?");
}

</script>


<script type="text/javascript">
function confirm_click11()
{
return confirm("Are you Sure to Set Next Patient ?");
}

</script>


</head>


<body>







<div id='cssmenu'>
<ul>
   <li><a href='../../viewnew11'><span>Home</span></a></li>
   <li class='active has-sub'><a href='#'><span>Patients</span></a>
      <ul>
         <li class='has-sub'><a href='viewnew'><span>OPD Patients</span></a>
            
         </li>
         <li class='has-sub'><a href='../../iview'><span>In-Patients</span></a>
            
         </li>
      </ul>
   </li>
   <li class='active has-sub'><a href='#'><span>Appointment</span></a>
      <ul>
         <li class='has-sub'><a href='cggtttt'><span>Set Doctor's Appointment</span></a>
            
         </li>
         <li class='has-sub'><a href='ami2'><span>Set Restrictions on Appointment Time</span></a>
            
         </li>
      </ul>
	  
   </li>

   <li class='last'><a href='ot'><span>OT BOOKING</span></a></li>
   <li class='active has-sub'><a href='#'><span>Reports</span></a>
      <ul>
         <li class='has-sub'><a href='view3new'><span>OPD Prescription</span></a>
            
         </li>
         <li class='has-sub'><a href='con1'><span>Outpatient Stats</span></a>
            
         </li>
		          <li class='has-sub'><a href='con2'><span>OT Stats</span></a>
            
         </li>
         <li class='has-sub'><a href='con3'><span>In-Patient Stats</span></a>
            
         </li>
		   <li class='has-sub'><a href='con11'><span>Medicine Stats</span></a>
            
         </li>

      </ul>
   </li>
   <li class='last'><a href='../../logout'><span>LOGOUT</span></a></li>
</ul>
</div>
<p align="center" class="style1">Todays  <?php echo $full; ?>'s Out Patients List </p>



	  
  </p>
<form action="" method="GET">

<p align="right" class="style1">
<?php

$url1 = "doc_call_on?dn=$full";   
$url2 = "doc_call_off?dn=$full";   
	 if($call_record==0)
		
		{
			
			echo "
			
			
  
  <a onclick='return confirm_click9();' href='$url1'>
  <img src='../../audio/green_call.png' title='Active...' width='100'  height='80'></a></td>
  ";
		}  
		
		else if($call_record==1)
		
		{
			
			echo "
			
			
  <audio autoplay><source src='../../audio/call.mp3' type='audio/mpeg'></audio>
  <a onclick='return confirm_click1();' href='$url2'>
  <img src='../../audio/red_call.png' title='Calling...' width='100'  height='100'></a></td>
  ";
		}  
	 
?>	 
</p>

<table width="100%" height ="100%" border="1" align="center" bgcolor="#FFFF99" style="border-collapse:collapse;">

<tr><td colspan="20" align="right" bgcolor="lightgreen"><?php if($tt=='192.168.100.252:8081'){echo"<a target='_blank' href='http://192.168.100.202/'><b>ACCESS PACS<b></a>";} else {echo"<a target='_blank' href='http://182.160.124.36/'><b>ACCESS PACS<b></a>";}?></td></tr>
    
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


	   </tr>
  </thead>
  <tbody>
  
    <?php
$user=$_SESSION["sess_username"];
$date= date('m/d/Y');
$count=1;
$sel_query="Select * from pappnew where dname= 'MO(General OPD)' and adate= '$date' and status not in('SEEN','Cancel') ORDER BY aslot asc;";

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
$next=$row['s_no'];
$url = "prescription3_3?ID=$ID&pmrn=$pmrn"; 
$url22 = "doc_call_next?ID=$ID&dname=$full";
?>
	  
	  
	  
      <td align="center">
	  <?php if($bstatus=='BILLED' and $status!='HISTORY UPDATED'){echo"<span style='color:green;text-align:center;'><b>".$name."";} else if($bstatus!='BILLED' and $status!='HISTORY UPDATED'){echo "<span style='color:red;text-align:center;'><b>".$name."";}

else if($status=='HISTORY UPDATED' and $bstatus=='BILLED'){echo "<a href='$url'><strong>".$name."</strong></a>";}



?>
	  
	  </td>
      <td align="center">
	  
	  <?php if($bstatus=='BILLED' and $status!='HISTORY UPDATED'){echo"<span style='color:green;text-align:center;'><b>".$pmrn."";} else if($bstatus!='BILLED' and $status!='HISTORY UPDATED'){echo "<span style='color:red;text-align:center;'><b>".$pmrn."";}

else if($status=='HISTORY UPDATED' and $bstatus=='BILLED' and $next==''){echo "<a onclick='return confirm_click11();' href='$url22'><strong>".$pmrn."</strong></a>";}

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

else if($status=='HISTORY UPDATED' and $bstatus=='BILLED'){echo "<a href='$url'><strong>New</strong></a>";}



?>
	   
	   
	   </td> 
      </tr>
    <?php $count++; } ?>
	
	
  </tbody>
</table>

<br><br>
<p> SEEN PATIENTS</p>
<table width="100%" height ="100%" border="1" align="center" bgcolor="#FFFF99" style="border-collapse:collapse;">


    
    <tr>
      <th width="4%"><strong>S.No</strong></th>
      <th width="17%"><strong>Patient's Name</strong></th>
      <th width="10%"><strong>MRN</strong></th>
	  <th width="10%"><strong>Category</strong></th>
      <th width="14%"><strong>Gender</strong>  
      <th width="15%"><strong>Appointment Time </strong>
      <th width="14%"><strong>Seen Time</strong> 
      <th width="14%"><strong>EPISODE</strong>
      <th width="14%"><strong>EDIT</strong>
	  <th width="14%"><strong>Admission Form</strong>


	   </tr>
  </thead>
  <tbody>
  
    <?php
$user=$_SESSION["sess_username"];
$date= date('m/d/Y');

$count=1;



$sel_query1="Select * from pappnew where dname= 'MO(General OPD)' and adate= '$date' and status='SEEN' and `bill`='Billed' ORDER BY aslot asc;";

$result1 = mysqli_query($con,$sel_query1);
while($row1 = mysqli_fetch_assoc($result1)) { ?>
    <tr>
      <td align="center"><?php echo $count; ?></td>
      <td align="center"><a href="prescription3_1_edit?pmrn=<?php echo $row1["pmrn"]; ?>&eid=<?php echo $row1["eid"]; ?>&ID=<?php echo $row1["ID"]; ?>"><?php echo $row1["pname"]; ?></a></td>
      <td align="center"><?php echo $row1["pmrn"]; ?>
	  
	  <?php
	  $tr=$row1['ptype'];
	  if($row1['ptype']=='Staff' || $row1['ptype']=='Staff Spouse' || $row1['ptype']=='Staff Children' || $row1['ptype']=='Consultant')
	{ 
echo "<td align='center' style='background-color:lightblue;'>".$tr."</td>";
	}
	
	else if($row1['ptype']=='General') 
	{ 
echo "<td align='center' style='background-color:lightgreen;'>".$tr."</td>";
	}
	
	else if($row1['ptype']=='VIP') 
	{ 
echo "<td align='center' style='background-color:red;'>".$tr."</td>";
	}
	
	
	else if($row1['ptype']=='Corporate') 
	{ 
echo "<td align='center' style='background-color:lightyellow;'>".$tr."</td>";
	}
	
	else
	{ 
echo "<td align='center'>".$tr."</td>";
	}
	  ?>
  	  <td align="center"><?php echo $row1["psex"]; ?>  
      <td align="center"><?php echo $row1["aslot"]; ?>
      <td align="center"><?php echo $row1["stime"]; ?>  
	  <td align="center"><?php echo $row1["eid"]; ?>  

<?php
$ppmrn=$row1['pmrn'];
$rdate=date('m/d/Y');
$adm = "SELECT COUNT(id) FROM preadm where pmrn= '$ppmrn' and dname='$full' and rdate='$rdate'"; 
	 
$adm1 = mysqli_query($con, $adm) or die(mysqli_error());

// Print out result
$adm2 = mysqli_fetch_array($adm1);

$d2=$adm2['COUNT(id)'];


?>
	  <td align="center"><a href="prescription3_1_edit?pmrn=<?php echo $row1["pmrn"]; ?>&eid=<?php echo $row1["eid"]; ?>&ID=<?php echo $row1["ID"]; ?>">Edit</a></td>

	  
	  
	  
	  <td>
<?php if($d2>0)

{
	
	echo'

<a target="_blank" href="admdoc?pmrn='.$row1["pmrn"].'&adoc='.$row1["dname"].'&rdate='.$rdate.'"><img src="print.png" title="Print Report" width="100" height="60" /></a>';

}

?>
</td>  


	  
      </tr>
    <?php $count++; } ?>
	
	
  </tbody>
</table>
</form>


</body>

</html>
