<?php 
    session_start();
    require('db1.php');
	$role = $_SESSION['sess_userrole'];
	
	$queryc = "SELECT COUNT(utype) FROM user where '$role' in ('mng','doctor','staff','clinicalet','physio')"; 
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
$ct=date('H:i:s');
?>
<?php
require('db1.php');
$fullname = $_SESSION['sess_username'];
$query39 = "SELECT * FROM user where uname= '$fullname'"; 
	 
$result39 = mysqli_query($con, $query39) or die(mysqli_error());

// Print out result
$row39 = mysqli_fetch_array($result39)
?>
<?php
$full = $row39['fullname'];
$mng=$row39['ugroup'];

$query40 = "SELECT * FROM staff3 where sid= '$fullname'"; 
	 
$result40 = mysqli_query($con, $query40) or die(mysqli_error());

// Print out result
$row40 = mysqli_fetch_array($result40);

$opd=$row40['opd'];




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
$row3 = mysqli_fetch_array($result3);
?>

<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>View Records</title>
<link rel="stylesheet" href="css/style2.css">



<style>
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
  text-align: left;
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
  align:center;
  
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

</style>
   <link rel="stylesheet" href="styles.css">

   <script src="script.js"></script>


<script type="text/javascript">
function confirm_click()
{
return confirm("Are you Sure to Approve this Leave ?");
}

</script>

<script type="text/javascript">
function confirm_click1()
{
return confirm("Are you Sure to Reject this Leave ?");
}

</script>



</head>


<body>








<div id='cssmenu'>
<ul>
   <li><a href='homestaff'><span>Home</span></a></li>
   <li><a href='opd_doc_schedule_opd'><span>New Appointment System</span></a></li>
   
   
   
   <li class='last'><a href='logout'><span>LOGOUT</span></a></li>

</div>

<br>
<div2 class="blink-bg"><h1 align="center" ><?php echo $opd;?> OPD</h1></div2>
<p align="right"> <?php echo "Date:" ?> <?php echo date('d/m/Y')?> </p>
<br>



 

<form action="" method="GET">
<table width="100%" height ="100%" border="1" align="center" bgcolor="#FFFF99" style="border-collapse:collapse;" id="myTable">

    <tr class="header">
	
      
	   </tr>
  </thead>
  <tbody>
  
   
	<?php
	
$user=$_SESSION["sess_username"];
$date= date('m/d/Y');
$count=1;
$sel_query="Select distinct dname from doctor where dname='Physiotherapy' and status='Active' order by dname asc";
//$start=$row["aadate"];

$row1 = mysqli_query($con,$sel_query);
while($row = mysqli_fetch_assoc($row1)) { ?>
      
      
	  
	   <?php
	   $date2=date('Y-m-d');
	   $dn = $row['dname'];
$query40 = "SELECT * FROM doctor where dname= '$dn' and status='Active'"; 
	 
$result40 = mysqli_query($con, $query40) or die(mysqli_error());

// Print out result
$row40 = mysqli_fetch_array($result40);
$ss=$row40['sid'];


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

   $url = "new_opd_1_physio?sid=$ss"; 
   
	  if($row41aa['COUNT(status)']!=0 || $row41aaa['COUNT(status)']!=0)
	
	{
	echo"		
	<td align=center'><span style='color:red;text-align:center;font-size:14px'>
	<a href='$url'><img  src='prescription/prescription/doctor/".$ss.".jpg' width='60'  height='60' align='center'></a>
	
	<br><b><a href='$url'><strong>".$dn."</strong></a></br>
	</td>
	
	
	";
	}
	?>

	  



      
    <?php $count++; } ?>
	
</tbody>
</table>

</form>


</body>

</html>

