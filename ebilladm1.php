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
$url1=$_SERVER['REQUEST_URI'];
header("Refresh: 15; URL=$url1");

?>

<?php
/*
Author: Javed Ur Rehman
Website: https://www.allphptricks.com/
*/
//session_start();
$test=date('Y-m-d', strtotime('-30 days') );
 $test1=date('Y-m-d');

require('db1.php');
//include("auth.php");
 $fullname = $_SESSION['sess_username'];
$query39 = "SELECT * FROM user where uname= '$fullname'"; 
	 
$result39 = mysqli_query($con, $query39) or die(mysqli_error());

// Print out result
$row39 = mysqli_fetch_array($result39);


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
   <li><a href='bcview'><span>Home</span></a></li>
      <li class='active has-sub'><a href='#'><span>Appointment</span></a>
      <ul>

    	    <li class='last'><a href='bgg1new'><span>Set Patient's Appointment</span></a></li>
      <li class='last'><a href='bview4'><span>Search previous patients</span></a></li>
      </ul>
	  
   </li>


   <li class='last'><a href='logout'><span>LOGOUT</span></a></li>
</ul>
</div>
<p align="center" class="style1">!! WELCOME !! <?php echo $fullname; ?>'s Dash Board </p> 
<p align="center" class="style1">List of Reffered Patients</p>
<form action="" method="GET">
&nbsp;&nbsp;&nbsp;&nbsp;<a href='bcview'><span><b>Unbilled Patients</span><b></a>&nbsp;&nbsp;&nbsp;&nbsp;
		<a href='bviewreffer'><span>Reffered Patients</span></a><br><br>

<table width="100%" height ="100%" border="1" align="center" bgcolor="#FFFF99" style="border-collapse:collapse;">


    
    <tr>
      <th width="4%"><strong>S.No</strong></th>
      <th width="17%"><strong>Patient's Name</strong></th>
      <th width="10%"><strong>MRN</strong></th>
      <th width="15%"><strong>Doctor's Name </strong>
      <th width="14%"><strong>Request Date</strong> 
      <th width="14%"><strong> Gender</strong>
      <th width="14%"><strong>Age</strong>  
      <th width="14%"><strong>Request From</strong>
	  <th width="14%"><strong>Prefer Bed Type</strong>
	  <th width="14%"><strong>Update</strong>



	   </tr>
  </thead>
  <tbody>
  
    <?php
$user=$_SESSION["sess_username"];
$date= date('m/d/Y');
$count=1;
$sel_query="Select * from preadm where status='' and tstatus='Approved' and snew between '$test' and '$test1' order by snew desc;";

$result = mysqli_query($con,$sel_query);
while($row = mysqli_fetch_assoc($result)) { ?>
<?php
$ppp=$row['pmrn'];
$db = mysqli_connect('localhost','root','Godiloveu16');
mysqli_select_db($db,'sfmmkpjnew');
$query44 = mysqli_query($db,"select * from patient where pmrn='$ppp'");
$data1 = mysqli_fetch_assoc($query44);

?>
    <tr>
      <td align="center"><?php echo $count; ?></td>
      <td align="center"><?php echo $row["pname"]; ?></td>
      <td align="center"><?php echo $row["pmrn"]; ?>
      <td align="center"><?php echo $row["dname"]; ?>
      <td align="center"><?php echo $row["sda"]; ?>  
	  <td align="center"><?php echo $row["gender"]; ?>  
	  	  <td align="center"><?php echo $row["page"]; ?> 
      <td align="center" style="font:Verdana, Arial, Helvetica, sans-serif large" style="font-weight:bold"><?php echo $row["location"];?> </td> 
	  <td align="center" style="color:red;font-size:20px;font-weight:bold"><?php echo $row["btype"]; ?> </td>
	        <td align="center" style="font:Verdana, Arial, Helvetica, sans-serif large" style="font-weight:bold">
          
          <?php if($data1['remarks']!='Due' and $row['location']!='A&E'){echo' 
     <a href="ebilladm?pmrn='.$row["pmrn"].'&id='.$row["id"].'&eeid='.$row["eeid"].'">UPDATE</a>';
   }

   else if($data1['remarks']!='Due' and $row['location']=='A&E'){echo' 
    <a href="ebilladm_ae?pmrn='.$row["pmrn"].'&id='.$row["id"].'&eeid='.$row["eeid"].'">UPDATE</a>';
  }
     else {

      echo'<strong><SPAN STYLE="font-size:18.0pt;color:red;">PAYMENT DUE</span> </strong>';
     }?>
           </td>


	  
      </tr>
    <?php $count++; } ?>
  </tbody>
  
  
  
</table>
  </table>
</form>


</body>

</html>
