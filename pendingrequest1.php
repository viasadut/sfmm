<?php 
    session_start();
    $role = $_SESSION['sess_userrole'];
    if(!isset($_SESSION['sess_username']) || $role!="doctor"){
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
      <th width="17%"><strong>Generic Name</strong></th>
      <th width="10%"><strong>Brand</strong></th>
      <th width="15%"><strong>Company </strong>
      <th width="14%"><strong>Form</strong> 
      <th width="14%"><strong>Category</strong>
      <th width="14%"><strong>Remarks</strong>  
	  <th width="14%"><strong>Requested By</strong> 
	   <th width="14%"><strong>Chairman</strong>  
	         <th width="14%"><strong>MD</strong>  
			       <th width="14%"><strong>CFO</strong>  
				         <th width="14%"><strong>CEO</strong>  
      
	  
	        <th width="14%"><strong>Approve</strong>
	  



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

$sel_query="Select * from medicinerequest where rstatus='WAITING FOR Chairman APPROVAL' and aname1='$fullname' and a1 ='Waiting'  ORDER BY id asc;";

$result = mysqli_query($con,$sel_query);
//echo   $bt;
echo "Pending List";

while($row = mysqli_fetch_assoc($result)) { ?>
    <tr>
      <td align="center"><?php echo $count; ?></td>
      <td align="center"><?php echo $row["code"]; ?></td>
	  <td align="center"><?php echo $row["mname"]; ?></td>
      <td align="center"><?php echo $row["brand1"]; ?>
      <td align="center"><?php echo $row["brand2"]; ?>
      <td align="center"><?php echo $row["pre"]; ?>  
	  <td align="Left"><?php echo $row["pcat"]; ?>  
	  <td align="Left"><?php echo $row["remarks"]; ?>  
	  	  <td align="Left"><?php echo $row["rby"]; ?> 
      <td align="center" style="font:Verdana, Arial, Helvetica, sans-serif large" style="font-weight:bold"><?php echo $row["a1"];?> </td> 
	  <td align="center" style="font:Verdana, Arial, Helvetica, sans-serif large" style="font-weight:bold"><?php echo $row["a2"];?> </td> 
	  <td align="center" style="font:Verdana, Arial, Helvetica, sans-serif large" style="font-weight:bold"><?php echo $row["a3"];?> </td> 
	  <td align="center" style="font:Verdana, Arial, Helvetica, sans-serif large" style="font-weight:bold"><?php echo $row["a4"];?> </td> 

	       <td align="center" style="font:Verdana, Arial, Helvetica, sans-serif large" style="font-weight:bold"><a href="updatemedicinestatusc?id=<?php echo $row["id"]; ?>&user=<?php echo "$fullname";?>">Approve</a> </td>


	       


	  
      </tr>
    <?php $count++; } ?>
	

	
		<?php
	
	
	
	
	
$user=$_SESSION["sess_username"];
$date= date('m/d/Y');
$count1=1;
$sel_query="Select * from medicineedit where status='WAITING FOR Chairman APPROVAL' and chairman='1175'";
//$start=$row["aadate"];

$row1 = mysqli_query($con,$sel_query);
while($row = mysqli_fetch_assoc($row1)) { ?>
        <td align="center"><?php echo $count1; ?></td>
		<?php
		   $codem=$row['code'];
		   $a = "SELECT * FROM medicine where code='$codem'"; 
	 
$b = mysqli_query($con, $a) or die(mysqli_error());

// Print out result
$c = mysqli_fetch_array($b);
$c_code=$c['c_code'];

		   ?>
	  
	  
	  <td align="center"><?php echo $row["code"]; ?></td>
	  <td align="center"><?php echo $c_code; ?></td>
      
      
	  <td align="center"><?php echo $row["mname"]; ?></td>
	  <td align="center"><?php echo $row["brand1"]; ?></td>
	  <td align="center"><?php echo $row["brand2"]; ?></td>
	  <td align="center" style="color:green;font-weight:bold">Update</td>
      
      <td align="center"><?php echo $row["cprice"]; ?></td>  
	  <td align="center"><?php echo $row["oprice"]; ?></td>  
	  <td align="center"><?php echo $row["oprice1"]; ?></td> 
<td align="center"><?php echo $row["uprice"]; ?></td>  

<td align="center"><?php
	  $cc=$row['oprice']; 
	  $cc1=$row['uprice']; 
	  
	  $cc2=$cc1-$cc; 
	  
	  $cc3=100*$cc2/$cc;
	  
	  echo number_format($cc3, 2);
	  
	  ?></td>
	  <td align="center"><?php echo $row["uprice1"]; ?></td> 	  
	  
	  
	  
	  
	  
	  <td align="center"><?php
	  $cc=$row['oprice1']; 
	  $cc1=$row['uprice1']; 
	  
	  $cc2=$cc1-$cc; 
	  
	  $cc3=100*$cc2/$cc;
	  
	  echo number_format($cc3, 2);
	  
	  ?></td>


	  
	  <td align="center"><?php echo $row["eby"]; ?></td>  
	  
	  <td align="center"><?php echo $row["status"]; ?> </td> 
	  <td align="center"><?php echo $row["remarks"]; ?> </td> 
<td align="center"><a href="edit_phar1_p?id=<?php echo $row["id"]; ?>"><strong>View/Edit</strong></a></td>	   
<td align="center"><a onclick="return confirm_click();" href="phar_edit_confirm_c?id=<?php echo $row["id"]; ?>"><strong>Confirm</strong></a></td>

<td align="center"><a href="mreject_phar_c?id=<?php echo $row["id"]; ?>"><strong>Reject</strong></a></td>


	  
      </tr>
    <?php $count1++; } ?>

  </tbody>
</table>

<br><br>



</form>


</body>

</html>
