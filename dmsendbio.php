<?php 
    session_start();
    $role = $_SESSION['sess_userrole'];
    if(!isset($_SESSION['sess_username']) || $role!="bio"){
      header('Location: login2?err=2');
    }
?>
<?php
$url1=$_SERVER['REQUEST_URI'];
header("Refresh: 20; URL=$url1");

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
<title>View Reports</title>
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
   <li><a href='histohome'><span>Home</span></a></li>
      
		  		  
      <li class='last'><a href='logout'><span>LOGOUT</span></a></li>
</ul>
</div>







<p align="center" class="style1">!! WELCOME !! <?php echo $fullname; ?>'s Dash Board </p> 
<form action="" method="Post">

								
					
<table width="100%" height ="100%" border="1" align="center" bgcolor="#FFFF99" style="border-collapse:collapse;">


    
    <tr>
      <th width="4%"><strong>S.No</strong></th>
      <th width="17%"><strong>Equipment ID</strong></th>
      <th width="10%"><strong>Equipment Name</strong></th>
      <th width="15%"><strong>Equipment Type</strong>
      <th width="14%"><strong>Location</strong> 
      <th width="14%"><strong>Current Status</strong>
      <th width="14%"><strong>Sedning Remarks</strong>  
      <th width="14%"><strong>Bio. Remarks</strong>
	        <th width="14%"><strong>Feedback</strong>
	  



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

$sel_query="Select * from biom where remarks= 'Not Functioning' ORDER BY id asc;";

$result = mysqli_query($con,$sel_query);
//echo   $bt;
echo "Today's Unseen Patients";

while($row = mysqli_fetch_assoc($result)) { ?>
    <tr>
      <td align="center"><?php echo $count; ?></td>
      <td align="center"><a target='_blank' href="materialfhistory.php?eid=<?php echo $row['id']; ?>"><?php echo $row["id"]; ?></td>
      <td align="center"><?php echo $row["ename"]; ?>
      <td align="center"><?php echo $row["etype"]; ?>
      <td align="center"><?php echo $row["dept"]; ?>  
	  <td align="center"><?php echo $row["remarks"]; ?>  
	  <td align="center"><?php echo $row["fremarks"]; ?>  
	  <td align="center"><?php echo $row["bremarks"]; ?>  
	  	  

	        <td colspan="10"><a target='_blank' href="dmsendbio1.php?id=<?php echo $row['id']; ?>">Give Feedback</a></td>	


	       


	  
      </tr>
    <?php $count++; } ?>

  </tbody>
</table>

<br><br>


</form>


</body>

</html>
