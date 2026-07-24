<?php 
    session_start();
    $role = $_SESSION['sess_userrole'];
    if(!isset($_SESSION['sess_username']) || $role!="bill"){
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
<li class='last'><a href='billpass'><span>Change Password</span></a></li>
<li class='last'><a href='billapp'><span>Appoinment Report</span></a></li>
<li class='last'><a href='opdbill'><span>OPD PROCEDURE BILL</span></a></li>
<li class='last'><a href='otallbill'><span>OT STATS</span></a></li>
<li class='last'><a href='endocensusbill'><span>Endoscopy STATS</span></a></li>
<li class='last'><a href='billotbill'><span>Todays OT List</span></a></li>
   <li class='last'><a href='logout'><span>LOGOUT</span></a></li>
</ul>
</div>
<p align="center" class="style1">!! WELCOME !! <?php echo $fullname; ?>'s Dash Board </p> 
<p align="center" class="style1">List of Unbilled Patients</p>
<form action="bcview" method="post">
 
&nbsp;&nbsp;&nbsp;&nbsp;<a href='bcview'><span><b>Unbilled Patients</span><b></a>&nbsp;&nbsp;&nbsp;&nbsp;
		<a href='bviewreffer'><span>Reffered Patients</span></a><br><br>
		
		
		<table>
											
						<tr>				
						
             		
					 
			    	 
					 <td colspan="3" align="right"><select name="bt">
        
						<option value=''>-Select-</option>
						<?php 
			$sql = "select * from `doctor`";
			$res = mysqli_query($con, $sql);
			if(mysqli_num_rows($res) > 0) {
				while($row = mysqli_fetch_object($res)) {
					echo "<option value='".$row->dname."'>".$row->dname."</option>";
				}
			}
			?>
						
				
</select></td>  
					<td>	<button type="submit" name="bsearch" align="right">Search</button></td>
					 </tr>
</table>

  <table width="100%" height ="100%" border="1" align="center" bgcolor="#FFFF99" style="border-collapse:collapse;">
    <tr>
      <th width="4%"><strong>S.No</strong></th>
      <th width="17%"><strong>Patient's Name</strong></th>
      <th width="10%"><strong>MRN</strong></th>
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
	if(isset($_POST['bsearch'])){
		$bt=$_REQUEST["bt"];
$user=$_SESSION["sess_username"];
$date= date('m/d/Y');

$count=1;

$sel_query100="Select * from pappnew where adate= '$date' and status='Not Seen' and dname='$bt' and `bill`=''  ORDER BY aslot desc;";

$result100 = mysqli_query($con,$sel_query100);
while($row100 = mysqli_fetch_assoc($result100)) { ?>
    <tr>
      <td align="center"><?php echo $count; ?></td>
      <td align="center"><?php echo $row100["pname"]; ?></td>
      <td align="center"><?php echo $row100["pmrn"]; ?>
      <td align="center"><?php echo $row100["aslot"]; ?>
      <td align="center"><?php echo $row100["adate"]; ?>  
	  <td align="center"><?php echo $row100["dreffer"]; ?>  
	  	  <td align="center"><?php echo $row100["dname"]; ?> 
      <td align="center" style="font:Verdana, Arial, Helvetica, sans-serif large" style="font-weight:bold"><?php echo $row100["status"];?> </td> 
	        <td align="center" style="font:Verdana, Arial, Helvetica, sans-serif large" style="font-weight:bold"><a href="bgg3333?pmrn=<?php echo $row100["pmrn"]; ?>&ID=<?php echo $row100["ID"];?>">UPDATE</a> </td>


	  
      </tr>
    <?php $count++; }}?>
  </tbody>
  </table>
</form>


</body>

</html>
