<?php 
    session_start();
    $role = $_SESSION['sess_userrole'];
    if(!isset($_SESSION['sess_username']) || $role!="rad"){
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
   <script src="jsnew/jquery-latest.min.js" type="text/javascript"></script>
   <script src="script.js"></script>




</head>


<body>
<div id='cssmenu'>
<ul>
   <li><a href='tesrad'><span>Home</span></a></li>
      <li><a href='radapp'><span>Appointment</span></a></li>
      
      <li class='active has-sub'><a href='#'><span>Reports</span></a>
      <ul>
         <li class='last'><a href='todayreport'><span>Today's Report</span></a></li>
		 <li class='has-sub'><a href='donereport'><span>Search Done Reports</span></a>
		 <li class='has-sub'><a href='allreport'><span>Datewise All Done Report </span></a>
            <li class='last'><a href='raddtsearch2'><span>Patients pending Report Search</span></a></li>
			<li class='last'><a href='radapp22'><span>Patients Appointment Report</span></a></li>
         </li>
		 
      </ul>
   </li>
	  <li class='last'><a href='radview1'><span>Pending Reports</span></a></li>
	  	  <li class='last'><a href='viewnewrad'><span>Search Pervious Patients</span></a></li>
		  <li class='last'><a href='rpapp22'><span>New Patients</span></a></li>
		  <li class='last'><a href='raddtsearch'><span>Patients pending request Search</span></a></li>
		  		  
      <li class='last'><a href='logout'><span>LOGOUT</span></a></li>
</ul>
</div>


<p align="center" class="style1">SEARCH PANEL FOR  PATIENTS RECORD</p> 


<form action="" method="POST"id="tt1" >
<table width="100%" height ="100%" border="1" align="center" bgcolor="#FFFF99" style="border-collapse:collapse;">
<tr> 
<td colspan="2"><select name="select" >
	  <option value=''>-Select Option-</option>
	  <option value='phone'>PHONE</option>
	  <option value='MRN'>MRN</option>
	  </select></td>

<td colspan="3"><input type="text" name="search"placeholder="ENTER PHONE NO OR MRN"></td>

<td colspan="3"><button type="submit" name="bsearch" form="tt1" >Search</button></td>
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
	  <td colspan="1"align="center"><a href="rpapp2?pmrn=<?php echo $row["pmrn"]; ?>">GO</a></td>
<td><form action="http:\\192.168.100.202/Launch_Viewer.asp?" method="post" id='tt' >
<input type="hidden" name="PatientID" value="<?php echo $row['pmrn'];?>"></input>
<input type="hidden" name="Username" value="hisuser"></input>
<input type="hidden" name="Password" value="hisuser"></input>
<button type="submit" name="Submit4" form="tt" >Confirm</button>
</form></td>
	  
      </tr>

	<?php $count++;  }}?>

  </tbody>
</table>

</form>

</body>

</html>
