<?php 
    session_start();
    require('db1.php');
	$role = $_SESSION['sess_userrole'];
	
	$queryc = "SELECT COUNT(utype) FROM user where '$role' in ('mng','ddf','corona','doctor','moopd','ddf1','staff','imo','nurse','mofficer','physio','techbio','endo','rad')"; 
$resultc = mysqli_query($con, $queryc) or die(mysqli_error());
$rowc = mysqli_fetch_array($resultc);
$c1=$rowc['COUNT(utype)'];
	
    if(!isset($_SESSION['sess_username']) || $c1==0){
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

require('db1.php');
//include("auth.php");
$pmrn=$_REQUEST['pmrn'];
//$eid=$_REQUEST['eid'];
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
button {
  padding: 19px 39px 18px 39px;
  color: #FFF;
  background-color: #A085C6;
  /*#4bc970*/
  font-size: 8px;
  text-align: center;
  font-style: normal;
  border-radius: 5px;
  width: 30%;
  border: 1px solid #8265B0;
  /*#3ac162*/
  border-width: 1px 1px 3px;
  box-shadow: 0 -1px 0 rgba(255,255,255,0.1) inset;
  margin-bottom: 10px;
}

</style>
   <link rel="stylesheet" href="styles.css">
</head>
<body>
<div id='cssmenu'>
<ul>
   <li><span>Home</span></li>
   
  
      <li class='last'><a href='logout'><span>LOGOUT</span></a></li>
</ul>
</div>


<p align="center" class="style1">View Patient Surgery Note</p> 
<form action="" method="GET">
<table width="100%" height ="100%" border="1" align="center" bgcolor="#FFFF99" style="border-collapse:collapse;">
  
    



    <tr>
      <th width="4%"><strong>S.No</strong></th>
      <th width="17%"><strong>Patient's Name</strong></th>
      <th width="10%"><strong>MRN</strong></th>
      <th width="15%"><strong>OT Date </strong>
      <th width="14%"><strong>Doctor's Name</strong>   
	        <th width="14%"><strong>ID</strong>   
      <th width="14%"><strong>UPDATE</strong>
      <th width="14%"><strong>PRINT(Old Format)</strong>
	  <th width="14%"><strong>PRINT(New Format)</strong>

	   </tr>
  </thead>
  <tbody>
  
    <?php
	
$user=$_SESSION["sess_username"];
$date= date('m/d/Y');
//$id =$_GET['id'];
$count=1;
$sel_query="Select * from ot where pmrn='$pmrn' ORDER BY id desc;";

$result = mysqli_query($con,$sel_query);
while($row = mysqli_fetch_assoc($result)) { ?>
    <tr>

      <td align="center"><?php echo $count; ?></td>
      <td align="center"></td>
      <td align="center"><?php echo $row["pmrn"]; ?></td>

      <td align="center"><?php echo $row["otdate"]; ?></td>
	  <td align="center"><?php echo $row["dname"]; ?></td>
	  	  <td align="center"><?php echo $row["id"];?></td> 
	  <td align="center"><a href="ot2viewdoc?id=<?php echo $row["id"]; ?>"></a></td>

 

	  	  	  <td align="center"><a target='_blank' href="otnote_patient?id=<?php echo $row["id"]; ?>"><img src="print.png" title="Print Report(Old Format)" width="50" height="60" /></a></td>
			  <td align="center"><a target='_blank' href="newotnote_patient?pmrn=<?php echo $row["pmrn"]; ?>&eid=<?php echo $row["id"]; ?>"><img src="print.png" title="Print Report(New Format)" width="50" height="60" /></a></td>

      </tr>
    <?php $count++; } ?>
	
  </tbody>
</table>
</form>
</body>
</html>
