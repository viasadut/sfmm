<?php 
    session_start();
    $role = $_SESSION['sess_userrole'];
    if(!isset($_SESSION['sess_username']) || $role!="vc"){
      header('Location: login2?err=2');
    }
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
$url1=$_SERVER['REQUEST_URI'];
//header("Refresh: 5; URL=$url1");
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




</head>


<body>



<div id='cssmenu'>
<ul>
   <li><a href=''><span>Home</span></a></li>
   <li><a href='register_vaccine'><span>Registration</span></a></li>
   
   <li class='last'><a href='phar_transfer_vc?sno=<?php echo date('sYsmd');?>'><span>Request Stock</span></a></li>
   <li class='last'><a href='vaccine_stock'><span>View Stock</span></a></li>
   <li class='last'><a href='vc_return_phar?sno=<?php echo date('mdYis');?>'><span>Return Stock Medicine</span></a></li>
   <li class='last'><a href='discard_medi_vaccine'><span>Discard Medicine</span></a></li>
   <li class='last'><a href='docchangepass'><span>Change Password</span></a></li>
   
   
   <li class='last'><a href='logout'><span>LOGOUT</span></a></li>
</ul>



</div>



<p align="center" class="style1">PATIENTS VACCINATION SEARCH PANEL </p> 

<form action="" method="POST">
<table width="100%" height ="100%" border="1" align="center" bgcolor="#FFFF99" style="border-collapse:collapse;">


    



<tr> 
<td colspan="5"><input type="text" name="search"></td>
<td colspan="3"><button type="submit" name="bsearch">Search</button></td>
</tr>
    <tr>
      <th width="4%"><strong>S.No</strong></th>
      <th width="17%"><strong>Patient's Name</strong></th>
      <th width="10%"><strong>MRN</strong></th>
      <th width="15%"><strong>Age </strong>
      <th width="14%"><strong>Phone No</strong>   
      <th width="14%"><strong>EPI Vaccine</strong>
      <th width="14%"><strong>Private Vaccine</strong>

	   </tr>
  </thead>
  <tbody>
  
    <?php
	if(isset($_POST['bsearch'])){
$user=$_SESSION["sess_username"];
$pmrn=$_REQUEST["search"];
//$id=$_REQUEST["id"];

$count=1;
$sel_query="Select * from patient where pmrn= '$pmrn' order by ID desc;";

$result = mysqli_query($con,$sel_query);

while($row = mysqli_fetch_assoc($result)) 
{ ?>    <tr>

      <td align="center"><?php echo $count; ?></td>
      <td align="center"><?php echo $row["pname"]; ?></td>
      <td align="center"><?php echo $row["pmrn"]; ?>
      <td align="center"><?php echo $row["page"]; ?>
      <td align="center"><?php echo $row["pphone"]; ?>  
      
	  <td align="center"><a target='_blank' href="vc002?pmrn=<?php echo "$pmrn"; ?>&pname=<?php echo $row["pname"];?>"><b>EPI Vaccine<b></a></td>
<td align="center"><a target='_blank' href="vc002_sfmm?pmrn=<?php echo "$pmrn"; ?>&pname=<?php echo $row["pname"];?>"><b>Private Vaccine<b></a></td>
	  
      </tr>
    <?php $count++; } }?>
  </tbody>
</table>
</form>

</body>

</html>
