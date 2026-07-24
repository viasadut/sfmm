<?php 
    session_start();
    require('db1.php');
	$role = $_SESSION['sess_userrole'];
	
	$queryc = "SELECT COUNT(utype) FROM user where '$role' in ('mng','staff')"; 
$resultc = mysqli_query($con, $queryc) or die(mysqli_error());
$rowc = mysqli_fetch_array($resultc);
$c1=$rowc['COUNT(utype)'];
	
    if(!isset($_SESSION['sess_username']) || $c1==0){
      header('Location: login2?err=2');
    }
?>
<?php
$url1=$_SERVER['REQUEST_URI'];
//header("Refresh: 20; URL=$url1");

?>
<?php
require('db1.php');
 $fullname = $_SESSION['sess_username'];
$query39 = "SELECT * FROM user where uname= '$fullname'"; 
	 
$result39 = mysqli_query($con, $query39) or die(mysqli_error());

// Print out result
$row39 = mysqli_fetch_array($result39);

$full = $row39['fullname'];

$query3 = "SELECT * FROM staff where uname= '$fullname'"; 
	 
$result3 = mysqli_query($con, $query3) or die(mysqli_error());

// Print out result
$row7 = mysqli_fetch_array($result3);
$dept=$row7['sdept'];
//echo $dept;
?>

<?php
/*
Author: Javed Ur Rehman
Website: https://www.allphptricks.com/
*/
//session_start();
require('db1.php');
//include("auth.php");
$query3 = "SELECT * FROM incident1 where itype= 'Clinical'"; 
	 
$result3 = mysqli_query($con, $query3) or die(mysqli_error());

// Print out result
$row7 = mysqli_fetch_array($result3);
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


<script type="text/javascript">
function confirm_click()
{
return confirm("Are you Sure to Confirm this Leave ?");
}

</script>

</head>


<body>








<div id='cssmenu'>
<ul>
   <li><a href='viewnew11'><span>Home</span></a></li>
  <li class='last'><a href='leaveprint1'><span>Print Approved Leave</span></a></li>
   <li class='last'><a href='viewleave'><span>Leave Balance</span></a></li>
   <li class='last'><a href='leavestatsadm'><span>Consultant Wise Leave Stats</span></a></li>
   <li class='last'><a href='tadmleave'><span>Today's Present Consultant List</span></a></li>
   <li class='last'><a href='attnstatsadm'><span>Consultant Wise Attendance Stats</span></a></li>
   
   <li class='last'><a href='logout'><span>LOGOUT</span></a></li>
</ul>
</div>




<p align="center" class="style1">Todays Summary of Departmentwise Attendance Report</p> 
<p align="right"> <?php echo "Date:" ?> <?php echo date('d/m/Y')?> </p>
<form action="" method="GET">
<table width="100%" height ="100%" border="1" align="center" bgcolor="#FFFF99" style="border-collapse:collapse;">

    <tr>
      <th width="4%"style="color:black;text-align:center;font-size:25px;font-weight:bold;"><strong>S.No</strong></th>
      <th width="17%"style="color:black;text-align:center;font-size:25px;font-weight:bold;"><strong>Department</strong></th>
	  <th width="17%"style="color:black;text-align:center;font-size:25px;font-weight:bold;"><strong>Total Manpower</strong></th>
	  <th width="17%"style="color:black;text-align:center;font-size:25px;font-weight:bold;"><strong>Present</strong></th>
	  <th width="17%"style="color:black;text-align:center;font-size:25px;font-weight:bold;"><strong>Late</strong></th>
	  <th width="17%"style="color:black;text-align:center;font-size:25px;font-weight:bold;"><strong>Absent</strong></th>
	  
      <th width="10%"style="color:black;text-align:center;font-size:25px;font-weight:bold;"><strong>Leave</strong></th>
	  <th width="10%"style="color:black;text-align:center;font-size:25px;font-weight:bold;"><strong>Present(%)</strong></th>
	  <th width="10%"style="color:black;text-align:center;font-size:25px;font-weight:bold;"><strong>Absent(%)</strong></th>
	  
      
      
	  
      
	   </tr>
  </thead>
  <tbody>

  
  
  

    


<?php
	
	

	
	
$user=$_SESSION["sess_username"];
$date= date('Y-m-d');

$sel_query="Select dept from staff3 where sid='$user'";
//$start=$row["aadate"];
$countz=1;
$row1 = mysqli_query($con,$sel_query);
while($row = mysqli_fetch_assoc($row1)) { ?>
      <td align="center" style="color:black;text-align:center;font-size:25px;font-weight:bold;"><?php echo $countz; ?></td>
      
	  
	  
	  <td align="center" style="color:black;text-align:center;font-size:25px;font-weight:bold;"><?php echo $row["dept"]; ?></a></td>
    
<?php
$dd=$row['dept'];
$dt=date('Y-m-d');
$query22 = "SELECT COUNT(id) FROM tm3 where dept='$dd' and date1='$dt' and status='P'"; 
$result22 = mysqli_query($con, $query22) or die(mysqli_error());
$row22 = mysqli_fetch_array($result22);

$query23 = "SELECT COUNT(id) FROM tm3 where dept='$dd' and date1='$dt' and status='LT'"; 
$result23 = mysqli_query($con, $query23) or die(mysqli_error());
$row23 = mysqli_fetch_array($result23);

$query24 = "SELECT COUNT(id) FROM tm3 where dept='$dd' and date1='$dt' and status='A'"; 
$result24 = mysqli_query($con, $query24) or die(mysqli_error());
$row24 = mysqli_fetch_array($result24);

$query25 = "SELECT COUNT(id) FROM tm3 where dept='$dd' and date1='$dt' and status='L'"; 
$result25 = mysqli_query($con, $query25) or die(mysqli_error());
$row25 = mysqli_fetch_array($result25);


$query26 = "SELECT COUNT(id) FROM tm3 where dept='$dd' and date1='$dt'"; 
$result26 = mysqli_query($con, $query26) or die(mysqli_error());
$row26 = mysqli_fetch_array($result26);

$tp=$row22['COUNT(id)']+$row23['COUNT(id)'];
$tmp=$row26['COUNT(id)'];
$ta=$row24['COUNT(id)']+$row25['COUNT(id)'];
//$tpp=$tp/$tmp *100;




?>
  <td align="center" style="color:black;text-align:center;font-size:25px;font-weight:bold;"><a href="attn_com?dept=<?php echo $row["dept"]; ?>"><?php echo  $row26['COUNT(id)']; ?></a></td>
  <td align="center" style="color:green;text-align:center;font-size:25px;font-weight:bold;"><a href="attn_com1?dept=<?php echo $row["dept"]; ?>&ss=<?php echo 'P'; ?>"><?php echo $row22['COUNT(id)']; ?></a></td>
    <td align="center" style="color:blue;text-align:center;font-size:25px;font-weight:bold;"><a href="attn_com1?dept=<?php echo $row["dept"]; ?>&ss=<?php echo 'LT'; ?>"><?php echo $row23['COUNT(id)']; ?></a></td>
	  <td align="center" style="color:red;text-align:center;font-size:25px;font-weight:bold;"><a href="attn_com1?dept=<?php echo $row["dept"]; ?>&ss=<?php echo 'A'; ?>"><?php echo $row24['COUNT(id)']; ?></a></td>
	    <td align="center" style="color:brown;text-align:center;font-size:25px;font-weight:bold;"><a href="attn_com1?dept=<?php echo $row["dept"]; ?>&ss=<?php echo 'L'; ?>"><?php echo $row25['COUNT(id)']; ?></a></td>
		<td align="center" style="color:green;text-align:center;font-size:25px;font-weight:bold;">
		
		<?php 


if($tmp > 0){
       $count1 = $tp / $tmp;
       $count2 = $count1 * 100;
       $count = round($count2);
       echo $count;
    }else{
       echo 0; // or whatever you want
    }  


		?></a></td>
		
		
		<td align="center" style="color:red;text-align:center;font-size:25px;font-weight:bold;">
		
		<?php 


if($tmp > 0){
       $count1 = $ta / $tmp;
       $count2 = $count1 * 100;
       $count = round($count2);
       echo $count;
    }else{
       echo 0; // or whatever you want
    }  


		?></a></td>
  
      </tr>
<?php $countz++; } 

?>

  </tbody>
  
  
  
</table>













</form>

</body>

</html>


