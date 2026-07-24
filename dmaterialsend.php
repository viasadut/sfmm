<?php 
    session_start();
    require('db1.php');
	$role = $_SESSION['sess_userrole'];
	
	$queryc = "SELECT COUNT(utype) FROM user where '$role' in ('ot','bio')"; 
$resultc = mysqli_query($con, $queryc) or die(mysqli_error());
$rowc = mysqli_fetch_array($resultc);
$c1=$rowc['COUNT(utype)'];
	
    if(!isset($_SESSION['sess_username']) || $c1==0){
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
      <th width="17%"><strong>ID</strong></th>
      <th width="10%"><strong>Equipment Name</strong></th>
      <th width="15%"><strong>DEpartment</strong>
      <th width="14%"><strong>Asset TAG</strong> 
      <th width="14%"><strong>Vendor</strong>
      <th width="14%"><strong>Model</strong>  
      <th width="14%"><strong>Sent TO</strong>
	  <th width="14%"><strong>Maintenance Note</strong>
	  
	  
	        
	  



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

$sel_query="Select * from biom where remarks= 'Functioning' ORDER BY id asc;";

$result = mysqli_query($con,$sel_query);
//echo   $bt;
echo "Today's Unseen Patients";

while($row = mysqli_fetch_assoc($result)) { ?>
    <tr>
      <td align="center"><?php echo $count; ?></td>
      <td align="center"><a target='_blank' href="materialhistory1.php?eid=<?php echo $row['id']; ?>"><?php echo $row["id"]; ?></td>
      <td align="center"><?php echo $row["ename"]; ?></td>
      <td align="center"><?php echo $row["dept"]; ?>
      
	  <td align="center"><?php echo $row["ano"]; ?>
	  <td align="center"><?php echo $row["vendor"]; ?>
	  <td align="center"><?php echo $row["model"]; ?>
	  	  

	        <td><a target='_blank' href="dmsend.php?id=<?php echo $row['id']; ?>">Send to Boimedical</a></td>	
				        <td><a target='_blank' href="dmsendbio12.php?id=<?php echo $row['id']; ?>">Maintenance Note</a></td>	


	       


	  
      </tr>
    <?php $count++; } ?>

  </tbody>
</table>

<br><br>


</form>


</body>

</html>
