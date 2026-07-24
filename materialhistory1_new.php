<?php 
    session_start();
    require('db1.php');
	$role = $_SESSION['sess_userrole'];
	
$queryc = "SELECT COUNT(utype) FROM user where '$role' in ('store','staff','ot','nurse','imo','mofficer','emergency','mng')"; 
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
$eid=$_REQUEST['eid'];
//include("auth.php");
$fullname = $_SESSION['sess_username'];
$query39 = "SELECT * FROM user where uname= '$fullname'"; 
	 
$result39 = mysqli_query($con, $query39) or die(mysqli_error());

// Print out result
$row39 = mysqli_fetch_array($result39);
//$full = $row39['fullname'];

$query_s = "SELECT * FROM storenew where id= '$eid'"; 
	 
$result_s = mysqli_query($con, $query_s) or die(mysqli_error());

// Print out result
$row_s = mysqli_fetch_array($result_s);
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
      <th width="17%"><strong>Ticket ID</strong></th>
      <th width="10%"><strong>Equipment Name & ID</strong></th>
      <th width="15%"><strong>Equipment Type</strong>
      <th width="14%"><strong>Current Location</strong> 
      <th width="14%"><strong>Status</strong>
      <th width="14%"><strong>Sedning Time</strong>  
	  <th width="14%"><strong>Sedning Remarks</strong>  
      <th width="14%"><strong>Bio. Remarks</strong>
	  <th width="14%"><strong>Bio. Time</strong>  
      <th width="14%"><strong>Details</strong>
	  
	  



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

$sel_query="Select * from ticket_tickets where e_id='$eid' ORDER BY id desc;";

$result = mysqli_query($con,$sel_query);
//echo   $bt;
echo "Today's Unseen Patients";

while($row = mysqli_fetch_assoc($result)) { ?>
    <tr>
      <td align="center"><?php echo $count; ?></td>
	  <?php	  
$t_id=$row["ticket_id"];


$query_s2 = "SELECT * FROM ticket_comment where ticket_id= '$t_id' order by id DESC limit 1"; 
	 
$result_s2 = mysqli_query($con, $query_s2) or die(mysqli_error());

// Print out result
$row2 = mysqli_fetch_array($result_s2);


$query_s3 = "SELECT * FROM ticket_comment where ticket_id= '$t_id' order by id ASC limit 1"; 
	 
$result_s3 = mysqli_query($con, $query_s3) or die(mysqli_error());

// Print out result
$row3 = mysqli_fetch_array($result_s3);



	  $query_s1 = "SELECT * FROM ticket_comment where ticket_id= '$t_id' and status='Close'"; 
	 
$result_s1 = mysqli_query($con, $query_s1) or die(mysqli_error());

// Print out result
$row1 = mysqli_fetch_array($result_s1);


?>
      <td align="center"><?php echo $row["ticket_id"]; ?></td>
      <td align="center"><?php echo $row_s["ename"]; ?>
      <td align="center"><?php echo $row_s["etype"]; ?>
      <td align="center"><?php echo $row_s["c_loc"]; ?>  
	  <td align="center"><?php echo $row_s["estatus"]; ?>  
	  
<td align="center"><?php echo $row3["created_at"]; ?>	  
	  
	  <td align="center"><?php echo $row3["comment"]; ?>
	  <td align="center"><?php echo $row2["comment"]; ?>  

	  
	  <td align="center"><?php echo $row2["created_at"]; ?> 

	  	  
<td>
                                        <a href="ticketv2/user/ticket_details.php?ticket_id=<?php echo $row["ticket_id"];?>" class="btn btn-info btn-sm">
                                            Details
                                            <i class="fa fa-info-circle"></i>
                                        </a>
                                    </td>
	        


	       


	  
      </tr>
    <?php $count++; } ?>

  </tbody>
</table>

<br><br>


</form>


</body>

</html>
