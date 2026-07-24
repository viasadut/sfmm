<?php 
    session_start();
    $role = $_SESSION['sess_userrole'];
    if(!isset($_SESSION['sess_username']) || $role!="pharmacy"){
      header('Location: login2.php?err=2');
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

require('db1.php');
//include("auth.php");

/*$query = "SELECT * from pmedi where id='".$id."'"; 
$result = mysqli_query($con, $query) or die ( mysqli_error());
$row = mysqli_fetch_assoc($result);
*/
if(isset($_POST['GO'])){
//$rr =$_REQUEST['rr'];
$update="update pmedi set `status`='$rr' where `id`='".$id."'";
mysqli_query($con,$update) or die(mysql_error());
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
</head>
<body>

<div id='cssmenu'>
<ul>
   <li><a href='view2.php'><span>Home</span></a></li>
   <li class='active has-sub'><a href='#'><span>Prescription</span></a>
      <ul>
         <li class='has-sub'><a href='pharp.php'><span>OPD Prescription</span></a>
            
         </li>
         <li class='has-sub'><a href='pharinview.php'><span>IPD Prescription</span></a>
            
         </li>
      </ul>
   </li>
      <li class='last'><a href='logout.php'><span>LOGOUT</span></a></li>
</ul>
</div>


<p align="center" class="style1">WELCOME TO PHARMACY PANEL</p> 
<form action="" method="GET">
<table width="100%" height ="100%" border="1" align="center" bgcolor="#FFFF99" style="border-collapse:collapse;">
  
    




    <tr>
      <th width="4%"><strong>S.No</strong></th>
	  <th width="17%"><strong>Patient's Name</strong></th>
      <th width="17%"><strong>MRN</strong></th>
      <th width="10%"><strong>Doctor Name</strong></th>
      <th width="15%"><strong>Time </strong>
      <th width="14%"><strong>Date</strong>   
	        <th width="14%"><strong>Medicine Name</strong>   
      <th width="14%"><strong>Status</strong>
      <th width="14%"><strong>ID</strong>
      <th width="14%"><strong>GO</strong>
	   </tr>
  </thead>
  <tbody>
  
    <?php
	
$user=$_SESSION["sess_username"];
$date= date('m/d/Y');
//$id =$_GET['id'];
$count=1;
$sel_query="Select * from pmedi where date='$date' ORDER BY date desc;";

$result = mysqli_query($con,$sel_query);
while($row = mysqli_fetch_assoc($result)) { ?>
    <tr>

      <td align="center"><?php echo $count; ?></td>
      <td align="center"><?php echo $row["pname"]; ?></td>
      <td align="center"><?php echo $row["pmrn"]; ?></td>
      <td align="center"><?php echo $row["dname"]; ?></td>
      <td align="center"><?php echo date("h:i:sa"); ?></td>
      <td align="center"><?php echo $row["date"]; ?></td>
	  <td align="center"><?php echo $row["medi"]; ?></td>
	  <td align="center"><?php echo $row["status"];?></td>  

	  <td align="center"><?php echo $row["id"];?></td>  

	  	  	  <td align="center"><a href="gg2.php?id=<?php echo $row["id"]; ?>">GO</a></td>

      </tr>
    <?php $count++; } ?>
  </tbody>
</table>
</form>
</body>
</html>
