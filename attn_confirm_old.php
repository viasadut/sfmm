<?php 
    session_start();
    require('db1.php');
	$role = $_SESSION['sess_userrole'];
	
$queryc = "SELECT COUNT(utype) FROM user where '$role' in ('attn','staff')"; 
$resultc = mysqli_query($con, $queryc) or die(mysqli_error());
$rowc = mysqli_fetch_array($resultc);
$c1=$rowc['COUNT(utype)'];
	
    if(!isset($_SESSION['sess_username']) || $c1==0){
      header('Location: login2?err=2');
    }
?>

<?php
$url1=$_SERVER['REQUEST_URI'];
header("Refresh: 1; URL=$url1");



?>

<?php
require('db1.php');
 $fullname = $_SESSION['sess_username'];

$dt=date('Y-m-d');


$queryd = "SELECT * FROM cmea where cdate='$dt' order by id DESC limit 1"; 
	 
$resultd = mysqli_query($con, $queryd) or die(mysqli_error());

// Print out result
$rowd = mysqli_fetch_array($resultd);
$attn_id=$rowd['sid'];
$attn_id1=$rowd['sid'].'.jpg';
$etime=$rowd['etime'];

$query3 = "SELECT * FROM staff3 where sid= '$attn_id'"; 
	 
$result3 = mysqli_query($con, $query3) or die(mysqli_error());

// Print out result
$row3 = mysqli_fetch_array($result3);
//$dept=$row3['dept'];
$gg=$row3['sid'];


$query39 = "SELECT * FROM user where uname= '$attn_id'"; 
	 
$result39 = mysqli_query($con, $query39) or die(mysqli_error());

// Print out result
$row39 = mysqli_fetch_array($result39);

$full = $row39['fullname'];


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
    //height: 40px;
    width: 30%;
    background-color: powderblue;
}



img {
  border-radius: 50%;
  
}

</style>



   <link rel="stylesheet" href="styles.css">
   <script src="jsnew/jquery-latest.min.js" type="text/javascript"></script>
   <script src="script.js"></script>
<link rel="stylesheet" href="css/presentational.css">
    
    
    <link rel="stylesheet" href="css/circular-images.css">



</head>


<body>






 


<?php
$user=$_SESSION["sess_username"];
$date= date('m/d/Y');
?>
<br><br><br><br><br><br>


<table width="100%" height ="100%" border="1" align="center" bgcolor="#FFFF99" style="border-collapse:collapse;" >

<?php if($gg!='')
{echo'



<h1 style="color:green;font-size:60px;font-weight:bold">Attendance Confirmed...<h1><br>





<tr><td colspan="20"align="center"bgcolor="lightblue"class="style1" border="0" style="color:red;font-size:60px;font-weight:bold">Welcome On Todays CME !!!</td>



</tr>
<tr><td colspan="20"align="center"bgcolor="lightgreen"><img  src="staff_pic/'.$row3["pic"].'" width="280"  height="280" align="center"></td>

</tr>

<tr><td colspan="20"align="center"bgcolor="lightblue"class="style1" border="0" style="color:red;font-size:60px;font-weight:bold">'.$row3["sname"].'</td>



</tr>

<tr><td colspan="20"align="center"bgcolor="lightblue"class="style1" border="0" style="color:red;font-size:60px;font-weight:bold">'.$row3["desig"].','.$row3['dept'].'</td>



</tr>




<tr><td colspan="20"align="center"bgcolor="lightblue"class="style1" border="0" style="color:red;font-size:60px;font-weight:bold">Attendance Time: '.$etime.'</td>



</tr>

';}


else 
	
	{
		echo'
		

<h1 style="color:green;font-size:60px;font-weight:bold">Attendance Confirmed...<h1><br>
		
<tr><td colspan="20"align="center"bgcolor="lightblue"class="style1" border="0" style="color:red;font-size:60px;font-weight:bold">Welcome On Todays CME !!!</td></tr>
		
<tr><td colspan="20"align="center"bgcolor="lightgreen"><img  src="prescription/prescription/doctor/'.$attn_id1.'" width="280"  height="280" align="center"></td></tr>

<tr><td colspan="20"align="center"bgcolor="lightblue"class="style1" border="0" style="color:red;font-size:60px;font-weight:bold">'.$full.'</td>



</tr>

<tr><td colspan="20"align="center"bgcolor="lightblue"class="style1" border="0" style="color:red;font-size:60px;font-weight:bold">Attendance Time: '.$etime.'</td>



</tr>';
		
		
	}

?>





</table>
    



 
</form>

</body>

</html>
