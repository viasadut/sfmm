<?php 
    session_start();
    $role = $_SESSION['sess_userrole'];
    if(!isset($_SESSION['sess_username']) || $role!="qc"){
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

<li class='last'><a href='billapp'><span>Appoinment Report</span></a></li>
   <li class='last'><a href='logout'><span>LOGOUT</span></a></li>
</ul>
</div>
<p align="center" class="style1">!! WELCOME !! <?php echo $fullname; ?>'s Dash Board </p> 
<p align="center" class="style1">Inpatient Search Panel</p>
<form action="" method="post">
 
		
		
		<table>
											
						<tr>				
						
             		
					 
			    	 
					 <td colspan="3" align="right"><select name="bt">
        
						<option value=''>-Select-</option>
						<?php 
			$sql = "select discipline from `topic`";
			$res = mysqli_query($con, $sql);
			if(mysqli_num_rows($res) > 0) {
				while($row = mysqli_fetch_object($res)) {
					echo "<option value='".$row->discipline."'>".$row->discipline."</option>";
				}
			}
			?>
						
				
</select></td>  
					<td>	<button type="submit" name="bsearch" align="right">Search</button></td>
					<td>Select Cabin From Dropdown List&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>
					<td><a href="topicview">    <strong>BACK</strong></a></td>
					 </tr>
</table>

  <table width="100%" height ="100%" border="1" align="center" bgcolor="#FFFF99" style="border-collapse:collapse;">
       <tr>
      <th width="4%"><strong>S.No</strong></th>
      <th width="17%"><strong>Topic Name</strong></th>
      <th width="10%"><strong>Discipline</strong></th>
      <th width="15%"><strong>Added By </strong>
      <th width="14%"><strong>Date</strong>   
	  <th width="14%"><strong>Details</strong>   
      
      
	   </tr>
  </thead>
  <tbody>

  
    <?php
	if(isset($_POST['bsearch'])){
		$bt=$_REQUEST["bt"];
$user=$_SESSION["sess_username"];
$date= date('m/d/Y');

$count=1;

$sel_query="Select * from topic where  discipline='$bt' order by id desc";

$result = mysqli_query($con,$sel_query);
while($row = mysqli_fetch_assoc($result)) { ?>
    <tr>
      <td align="center"><?php echo $count; ?></td>
      <td align="center"><?php echo $row["tname"]; ?></td>
      <td align="center"><?php echo $row["discipline"]; ?>
      <td align="center"><?php echo $row["eby"]; ?>
      <td align="center"><?php echo $row["adate1"]; ?>  

     
	<td align="center"><a href="topicview1?id=<?php echo $row["id"]; ?>">DETAILS</a></td> 
    <?php $count++; } }?>
   </tbody>
  </table>
</form>


</body>

</html>
