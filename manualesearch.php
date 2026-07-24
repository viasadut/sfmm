<?php 
   session_start();
    require('db1.php');
	$role = $_SESSION['sess_userrole'];
	
	$queryc = "SELECT COUNT(utype) FROM user where '$role' in ('billin','bill')"; 
$resultc = mysqli_query($con, $queryc) or die(mysqli_error());
$rowc = mysqli_fetch_array($resultc);
$c1=$rowc['COUNT(utype)'];
	
    if(!isset($_SESSION['sess_username']) || $c1==0){
      header('Location: login2?err=2');
    }
?>

<?php
/*
Author: Javed Ur Rehman
Website: https://www.allphptricks.com/
*/
//session_start();
require('db1.php');
//include("auth.php");
 
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
   <li><a href='edischarge3'><span>Home</span></a></li>
   <li class='active has-sub'><a href='#'><span>Patients</span></a>
      <ul>
         <li class='has-sub'><a href='esearch'><span>Patient Search By MRN</span></a>         </li>
         <li class='has-sub'><a href='eadm'><span>New Patient</span></a>         </li>
      </ul>
   </li>
   
   
   
   <li class='last'><a href='logout'><span>LOGOUT</span></a></li>
</ul>
</div>
<p align="center" class="style1">WELCOME TO PATIENT'S SEARCH PANEL FOR ADMISSION </p> 


<form action="" method="POST">
<table width="100%" height ="100%" border="1" align="center" bgcolor="#FFFF99" style="border-collapse:collapse;">
<tr> 
<td colspan="2"><select name="select" required>
<option value='MRN'>MRN</option>
	  <option value='phone'>PHONE</option>
	  
	  </select></td>

<td colspan="3"><input type="text" name="search"placeholder="ENTER PHONE NO OR MRN"></td>

<td colspan="3"><button type="submit" name="bsearch">Search</button></td>
</tr>

    <tr>
      <td colspan="1"align="center"><strong>S.No</strong></td>
      <td colspan="1"align="center"><strong>Patient's Name</strong></td>
      <td colspan="1"align="center"><strong>MRN</strong></td>
      <td colspan="1"align="center"><strong>ID </strong></td>
      <td colspan="2"align="center"><strong>Address</strong></td>   
      <td colspan="1"align="center"><strong>Phone</strong></td>
      <td colspan="1"align="center"><strong>GO</strong></td>

	   </tr>
  
  <tbody>
  
    <?php
	if(isset($_POST['bsearch'])){
$user=$_SESSION["sess_username"];
$pmrn=$_REQUEST["search"];
//$id=$_REQUEST["id"];
if (($_POST['select'])=="phone"){


$sel_query="Select * from patient where pphone= '$pmrn';";}
 else{
	 $sel_query="Select * from patient where pmrn= '$pmrn';";
 } 
$count=1;	 
$result = mysqli_query($con,$sel_query);



while($row = mysqli_fetch_assoc($result)) 
{ ?>    <tr>

      <td colspan="1" align="center"><?php echo $count; ?></td>
      <td colspan="1"align="center"><?php echo $row["pname"]; ?></td>
      <td colspan="1"align="center"><?php echo $row["pmrn"]; ?></td>
      <td colspan="1"align="center"><?php echo $row["ID"]; ?> </td> 
      <td colspan="2"align="center"><?php echo $row["padd"]; ?></td>
      <td colspan="1"align="center"><?php echo $row["pphone"]; ?> </td>
	  <td align="center">
      
     <?php if($row['remarks']!='Due'){echo' 
     <a href="manualadm?pmrn='.$pmrn.'&ID='.$row["ID"].'">GO</a>';
   }
     else {

      echo'<strong><SPAN STYLE="font-size:18.0pt;color:red;">PAYMENT DUE</span> </strong>';
     }?>
     </td>

	  
      </tr>
    <?php $count++; } }?>
  </tbody>
</table>
</form>

</body>

</html>
