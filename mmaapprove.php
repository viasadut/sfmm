<?php 
    session_start();
    $role = $_SESSION['sess_userrole'];
    if(!isset($_SESSION['sess_username']) || $role!="mng"){
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


<script type="text/javascript">
function confirm_click()
{
return confirm("Are you Sure to Approve?");
}

</script>

<script type="text/javascript">
function confirm_click1()
{
return confirm("Are you Sure to Approve it From Meeting?");
}

</script>

<script type="text/javascript">
function confirm_click2()
{
return confirm("Are you Sure to Reject?");
}

</script>


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
	  <li class='last'><a href='app1'><span>View Appointment Report</span></a></li>
   <li class='last'><a href='logout'><span>LOGOUT</span></a></li>
</ul>
</div>








<p align="center" class="style1">!! WELCOME !! <?php echo $fullname; ?>'s Dash Board </p> 
<form action="" method="Post">

			
			
					
<table width="100%" height ="100%" border="1" align="center" bgcolor="#FFFF99" style="border-collapse:collapse;">


    
    <tr>
      <th width="4%"><strong>S.No</strong></th>
      <th width="17%"><strong>Privilige Name</strong></th>
      <th width="10%"><strong>Doctor Name</strong></th>
      <th width="15%"><strong>Request Time </strong>
      <th width="14%"><strong>Status</strong> 
      <th width="14%"><strong>Comments</strong>
	  
	        <th width="14%"><strong>Approve</strong>
		
			<th width="14%"><strong>Reject</strong>
		
			
	  



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

$sel_query="Select * from privilege where status in ('pending','Edited') and $fullname in ('md','md01') ORDER BY id asc;";

$result = mysqli_query($con,$sel_query);
//echo   $bt;
echo "Pending Privilege List For Approval"; 

while($row = mysqli_fetch_assoc($result)) { ?>
    <tr>
      <td align="center"><?php echo $count; ?></td>
      <td align="center"><?php echo $row["pname"]; ?></td>
      <td align="center"><?php echo $row["dname"]; ?>
      <td align="center"><?php echo $row["adate"]; ?>
      <td align="center"><?php echo $row["status"]; ?>  
	  <td align="Left"><?php echo $row["comments"]; ?>  
	  	  
	  <td align="center" style="font:Verdana, Arial, Helvetica, sans-serif large" style="font-weight:bold"><a href="mmarequestedit?id=<?php echo $row["id"]; ?>"><strong>Approve</a> </td>
	  
	  <td align="center"><a href="reject_privilege?id=<?php echo $row["id"]; ?>"><strong>Reject</strong></a></td>
	  
	

	       


	  
      </tr>
    <?php $count++; } ?>
	

  </tbody>
</table>






<br><br>

<table width="100%" height ="100%" border="1" align="center" bgcolor="#FFFF99" style="border-collapse:collapse;">


    
    <tr>
      <th width="4%"><strong>S.No</strong></th>
      <th width="17%"><strong>Privilige Name</strong></th>
      <th width="10%"><strong>Doctor Name</strong></th>
      <th width="15%"><strong>Request Time </strong>
      <th width="14%"><strong>Status</strong> 
      <th width="14%"><strong>Comments</strong>
	  
	        <th width="14%"><strong>Approve / Reject By</strong>
		
			<th width="14%"><strong>Time</strong>
			<th width="14%"><strong>Cancel privilege</strong>
		
			
	  



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

$sel_query="Select * from privilege where status in('Approved','Reject')  ORDER BY id asc;";

$result = mysqli_query($con,$sel_query);
//echo   $bt;
echo "Approved Privilege List"; 

while($row = mysqli_fetch_assoc($result)) { ?>
    <tr>
      <td align="center"><?php echo $count; ?></td>
      <td align="center"><?php echo $row["pname"]; ?></td>
      <td align="center"><?php echo $row["dname"]; ?>
      <td align="center"><?php echo $row["adate"]; ?>
      <td align="center"><?php echo $row["status"]; ?>  
	  <td align="Left"><?php echo $row["comments"]; ?>  
	  <td align="Left"><?php echo $row["aby"]; ?>  
	  <td align="Left"><?php echo $row["atime"]; ?>  
<td align="center"><a onclick="return confirm_click2();" href="mmar1?id=<?php echo $row["id"]; ?>"><strong>Cancel Privilege</strong></a></td>	  	  
	  
	

	       


	  
      </tr>
    <?php $count++; } ?>
	

  </tbody>
</table>
</form>


</body>

</html>
