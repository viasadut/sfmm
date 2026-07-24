<?php 
    session_start();
    $role = $_SESSION['sess_userrole'];
    if(!isset($_SESSION['sess_username']) || $role!="bill"){
      header('Location: login2?err=2');
    }
?>

<?php
require('db1.php');
if(isset($_POST['bsearch'])){
$user=$_SESSION["sess_username"];
//$start=date('Y-m-d',strtotime($_REQUEST["stdate"]));
//$end=date('Y-m-d',strtotime($_REQUEST["endate"]));
//$bt=$_REQUEST["bt"];

/*$query43 = "SELECT COUNT(pmrn) FROM otreport where date1 BETWEEN '$start' and '$end';"; 
	 
$result43 = mysqli_query($con, $query43) or die(mysqli_error());
$row43 = mysqli_fetch_assoc($result43);*/
$pmrn=$_REQUEST['search'];
$sno=date('dmYsi').$user;
$select=$_REQUEST['select'];
if($select=='id')
{
//$url = "lab_bill_test2_new2_bill?ID=$pmrn&sno=$sno";
$url = "new_refund_receipt_new?ID=$pmrn&sno=$sno";

header("Location: $url"); 
}

else if($select=='MRN')

{
	$url = "new_refund_receipt_new?ID=$pmrn"; 
header("Location: $url"); 
	
}
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

   <script src="script.js"></script>




</head>


<body>

<div id='cssmenu'>
<ul>
   <li><a href='bcview'><span>Home</span></a></li>
   
   
   
   
   <li class='last'><a href='logout'><span>LOGOUT</span></a></li>
</ul>
</div>
<p align="center" class="style1">WELCOME TO PATIENT'S SEARCH PANEL FOR ADMISSION </p> 


<form action="" method="POST">
<table width="100%" height ="100%" border="1" align="center" bgcolor="#FFFF99" style="border-collapse:collapse;">
<tr> 
<td colspan="2"><select name="select" required>
	  
	  <option value='id'>Billno</option>
	  
	  </select></td>

<td colspan="3"><input type="text" name="search"placeholder="Billno"></td>

<td colspan="3"><button type="submit" name="bsearch" value="bb">Search</button></td>
</tr>

  </tbody>
</table>
</form>

</body>

</html>
