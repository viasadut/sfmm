<?php 
    session_start();
    $role = $_SESSION['sess_userrole'];
    if(!isset($_SESSION['sess_username']) || $role!="staff"){
      header('Location: login2?err=2');
    }
?>
<?php
$url1=$_SERVER['REQUEST_URI'];
header("Refresh: 5; URL=$url1");

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
  
}

#myTable tr {
  border-bottom: 1px solid #ddd;
}

#myTable tr.header, #myTable tr:hover {
  background-color: #f1f1f1;
}


img {
  border-radius: 50%;
  
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



</head>


<body>


<div id='cssmenu'>
<ul>
   <li><a href='new_opd'><span>Home</span></a></li>
     
   <li class='last'><a href='logout'><span>LOGOUT</span></a></li>
</ul>
</div>








<p align="center" class="style1">!! WELCOME !! <?php echo $fullname; ?>'s Dash Board </p> 


<table width="100%" height ="100%" border="1" align="center" bgcolor="#FFFF99" style="border-collapse:collapse;" id="myTable">

    <tr class="header">
	
      
	   </tr>
  </thead>
  <tbody>
  
   
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
$query40 = "SELECT * FROM doctor where dname= '$dn' and status='Active'"; 
	 
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
	<td>
	<a href='$url'><img  src='prescription/prescription/doctor/".$ss1.".jpg' width='60'  height='60' align='center'></a>
	
	<span style='color:red;text-align:center;font-size:14px'><a href='$url'><strong>".$dn."</strong></a><br>";
	
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
	
</tbody>
</table>


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
$date= date('2023-08-12');
//$bt=$_REQUEST["bt"];
$count=1;
//echo   $bt;


$sel_query="Select * from pappnew where adate1= '$date' and status IN ('HISTORY UPDATED','NOT SEEN')and dname='$dname' ORDER BY aslot asc;";

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
$url = "newcdetails_et?ID=$ID&pmrn=$pmrn"; 

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
