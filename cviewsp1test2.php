<?php 
    session_start();
    $role = $_SESSION['sess_userrole'];
    if(!isset($_SESSION['sess_username']) || $role!="clinical"){
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
require('db1.php');
//include("auth.php");
$fullname = $_SESSION['sess_username'];
$query39 = "SELECT * FROM user where uname= '$fullname'"; 
	 
$result39 = mysqli_query($con, $query39) or die(mysqli_error());

// Print out result
$row39 = mysqli_fetch_array($result39)
//$full = $row39['fullname'];
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
  font-size: 18px;
  text-align: center;
  font-style: normal;
  border-radius: 5px;
  width: 100%;
  height: 5%
  border: 1px solid #8265B0;
  /*#3ac162*/
  border-width: 1px 1px 3px;
  box-shadow: 0 -1px 0 rgba(255,255,255,0.1) inset;
  margin-bottom: 10px;
}
</style>


   <link rel="stylesheet" href="styles.css">
   <script src="jsnew/jquery-latest.min.js" type="text/javascript"></script>
   <script src="script.js"></script>




</head>


<body>


<div id='cssmenu'>
<ul>
   <li><a href='cviewsp1'><span>Home</span></a></li>
      <li class='active has-sub'><a href='#'><span>Appointment</span></a>
      <ul>
         <li class='has-sub'><a href='cggttt'><span>Set Doctor's Appointment</span></a>
            
         </li>
         <li class='has-sub'><a href='ami'><span>Set Restrictions on Appointment Time</span></a>
            
         </li>
		 <li class='has-sub'><a href='cview'><span>List of Unpaid Appointment</span></a>
            
         </li>
		 		 <li class='has-sub'><a href='cviewsp11'><span>Doctor's Available Slot</span></a>
            
         </li>
      </ul>
	  
   </li>

    	    <li class='last'><a href='gg1new'><span>Set Patient's Appointment</span></a></li>
      <li class='last'><a href='view4'><span>Search previous patients</span></a></li>
	  
   <li class='last'><a href='logout'><span>LOGOUT</span></a></li>
</ul>
</div>








<p align="center" class="style1">!! WELCOME !! <?php echo $fullname; ?>'s Dash Board </p> 
<form action="cviewsp1" method="Post">

								
					
<table width="100%" height ="100%" border="1" align="center" bgcolor="#FFFF99" style="border-collapse:collapse;">


    
    <tr>
      <th width="4%"><strong>S.No</strong></th>
      <th width="17%"><strong>Patient's Name</strong></th>
      <th width="10%"><strong>MRN</strong></th>
	  <th width="10%"><strong>Age</strong></th>
	  <th width="10%"><strong>Gender</strong></th>
      <th width="15%"><strong>Appointment Time </strong>
      <th width="14%"><strong>Date</strong> 
      <th width="14%"><strong>Reffered From</strong>
      <th width="14%"><strong>Doctor Name</strong>  
      <th width="14%"><strong>Status</strong>
	        <th width="14%"><strong>Update</strong>
	  



	   </tr>
  </thead>
  <tbody>
  
    
	<?php
	
$user=$_SESSION["sess_username"];
//$start=$_REQUEST["stdate"];
//$end=$_REQUEST["endate"];
//$bt=$_REQUEST["bt"];
	
	
	

//$user=$_SESSION["sess_username"];
$date= date('m/d/Y');
$count=1;

$sel_query="Select * from pappnew where adate= '$date' and bill='Billed' and status='NOT SEEN' and dname IN ('Dr. Ranen Biswas','Dr. Razeeb Hassan', 'Dr. J.M.H Qausar Alam','Dr. Md. Rakibul Hassan','Dr. Subrata Shakhar kar','Dr. Md. Mahbubul Alam','Dr. Rashidul Hasan','Dr. Md. Abbas Uddin') ORDER BY dname asc;";

$result = mysqli_query($con,$sel_query);
//echo   $bt;
echo "Today's Unseen Patients";

while($row1 = mysqli_fetch_assoc($result)) { ?>
    <tr>
      <td align="center"><?php echo $count; ?></td>
      <td align="center"><?php echo $row1["pname"]; ?></td>
      <td align="center"><?php echo $row1["pmrn"]; ?>
	  
	  <td align="center"><?php echo $row1["page"]; ?>
	  <td align="center"><?php echo $row1["psex"]; ?>
      <td align="center"><?php echo $row1["aslot"]; ?>
      <td align="center"><?php echo $row1["adate"]; ?>  
	  <td align="Left"><?php echo $row1["dreffer"]; ?>  
	  	  <td align="Left"><?php echo $row1["dname"]; ?> 
      <td align="center" style="font:Verdana, Arial, Helvetica, sans-serif large" style="font-weight:bold"><?php echo $row1["status"];?> </td> 

	       <td align="center" style="font:Verdana, Arial, Helvetica, sans-serif large" style="font-weight:bold"><a href="newcdetails?pmrn=<?php echo $row1["pmrn"]; ?>&ID=<?php echo $row1["ID"];?>">UPDATE</a> </td>


	       


	  
      </tr>
    <?php $count++; } ?>
  </tbody>
</table>

<br><br>


<table width="100%" height ="100%" border="1" align="center" bgcolor="#FFFF99" style="border-collapse:collapse;">

<tr><td colspan='20'><?php echo 'Todays Seen Patients;'?></td></tr>
    
    <tr>
      <th width="4%"><strong>S.No</strong></th>
      <th width="17%"><strong>Patient's Name</strong></th>
      <th width="10%"><strong>MRN</strong></th>
	  <th width="10%"><strong>Age</strong></th>
	  <th width="10%"><strong>Gender</strong></th>
      <th width="15%"><strong>Appointment Time </strong>
      <th width="14%"><strong>Date</strong> 
      <th width="14%"><strong>Reffered From</strong>
      <th width="14%"><strong>Doctor Name</strong>  
	  <th width="14%"><strong>Update Time</strong>  
	  <th width="14%"><strong>Seen Time</strong>
      <th width="14%"><strong>Status</strong>

	  



	   </tr>
  </thead>
  <tbody>
  
  
  
  
    <?php

$user=$_SESSION["sess_username"];
$date= date('m/d/Y');
//$bt=$_REQUEST["bt"];
$count=1;
//echo   $bt;



$sel_query="Select * from pappnew where adate= '$date' and `bill`='Billed' and status IN ('HISTORY UPDATED')and dname IN ('Dr. Md. Rakibul Hassan') ORDER BY vtime asc;";

$result1 = mysqli_query($con,$sel_query);

if(mysqli_fetch_assoc($result1)>0){
echo '<tr> <td colspan="20" bgcolor="lightblue"style="font:Verdana, Arial, Helvetica sans-serif large" style="font-weight:bold;color:red;"><b>Dr. Ranen Biswas<b> </td> </tr>';
}


while($row2 = mysqli_fetch_assoc($result1)) { ?>
    <tr>
      <td align="center"><?php echo $count; ?></td>
      <td align="center"><?php echo $row2["pname"]; ?></td>
      <td align="center"><?php echo $row2["pmrn"]; ?>
	  <td align="center"><?php echo $row2["page"]; ?>
	  <td align="center"><?php echo $row2["psex"]; ?>
      <td align="center"><?php echo $row2["aslot"]; ?>
      <td align="center"><?php echo $row2["adate"]; ?>  
	  <td align="Left"><?php echo $row2["dreffer"]; ?>  
	  	  <td align="Left"><?php echo $row2["dname"]; ?> 
		  <td align="Left"><?php echo $row2["vtime"]; ?> 
      <td align="center" style="font:Verdana, Arial, Helvetica, sans-serif large" style="font-weight:bold"><?php echo $row2["stime"];?> </td>
	  <td align="center" style="font:Verdana, Arial, Helvetica, sans-serif large" style="font-weight:bold"><?php echo $row2["status"];?> </td> 
	   

  

	       


	  
      </tr>
    <?php $count++; } ?>

	
  </tbody>
</table>
</form>


</body>

</html>
