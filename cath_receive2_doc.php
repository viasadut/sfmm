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
$row39 = mysqli_fetch_array($result39);
$full = $row39['fullname'];




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
return confirm("Are you Sure to Confirm Charges ??");
}

</script>



</head>


<body>


<div id='cssmenu'>
<ul>
   <li><a href='opddash'><span>Home</span></a></li>
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
<form action="cviewsp1" method="Post">

								
					
<table width="100%" height ="100%" border="1" align="center" bgcolor="#FFFF99" style="border-collapse:collapse;">


    
    <tr>
      <th width="4%"><strong>S.No</strong></th>
      <th width="17%"><strong>Patient's Name</strong></th>
      <th width="10%"><strong>MRN</strong></th>
      
      <th width="14%"><strong>Date</strong> 
	  <th width="15%"><strong>Appointment Time </strong>
	  <th width="14%"><strong>Location</strong> 
	  <th width="14%"><strong>Type</strong> 
      <th width="14%"><strong>Reffered From</strong>
	  <th width="14%"><strong>Procedure Name</strong>
      <th width="14%"><strong>Hospital Charges</strong>  
      <th width="14%"><strong>Used Medication</strong>
	  <th width="14%"><strong>Print Charges</strong>
	  <th width="14%"><strong>Print Procedure Summary(only IPD)</strong>
	  



	   </tr>
  </thead>
  <tbody>
  
  
  <tr> <td colspan="20"></td> </tr>
  <tr> <td colspan="20"></td> </tr>
  <tr> <td colspan="20"></td> </tr>
  <tr> <td colspan="20"></td> </tr>
  <tr> <td colspan="20"></td> </tr>
  <tr> <td colspan="20"></td> </tr>
  <tr> <td colspan="20" bgcolor="lightgreen"style="font:Verdana, Arial, Helvetica, sans-serif large" style="font-weight:bold;color:red;"><b>OPD<b> </td> </tr>
  <tr> <td colspan="20"></td> </tr>
  <tr> <td colspan="20"></td> </tr>
  <tr> <td colspan="20"></td> </tr>
  <tr> <td colspan="20"></td> </tr>
  <tr> <td colspan="20"></td> </tr>
  <tr> <td colspan="20"></td> </tr>	
    
	<?php
	
$user=$_SESSION["sess_username"];
//$start=$_REQUEST["stdate"];
//$end=$_REQUEST["endate"];
//$bt=$_REQUEST["bt"];
	
	
	

//$user=$_SESSION["sess_username"];
//$date= date('m/d/Y');
$date= date('Y-m-d');

$test=date('Y-m-d', strtotime('-2 days') );
$count=1;

$sel_query="Select * from cath_receive where date1 between '$test' and '$date' and ustatus='Updated' and type='OPD' and '$full' in (`dname`,`dname2`) order by ll asc;";

$result = mysqli_query($con,$sel_query);
//echo   $bt;
echo "Today's Unseen Patients";

while($row = mysqli_fetch_assoc($result)) { ?>
    <tr>
      <td align="center"><?php echo $count; ?></td>
      <td align="center"><?php echo $row["pname"]; ?></td>
      <td align="center"><?php echo $row["pmrn"]; ?>
      <td align="center"><?php echo $row["pdate"]; ?>
	  
      <td align="center"><?php echo $row["ptime"]; ?> 
	        <td align="center"><?php echo $row["ll"]; ?> 
			<td align="center"><?php echo $row["type"]; ?> 
	  
	  <td align="Left"><?php echo $row["dname"]; ?>  
	  <td align="Left"><?php echo $row["proname"]; ?>  
	  	  

	       <td align="left" ><a target='_blank' href="cath_charge_doc?pmrn=<?php echo $row["pmrn"]; ?>&dname=<?php echo $row["dname"]; ?>&eid=<?php echo $row["eid"]; ?>&id=<?php echo $row["id"]; ?>&type=<?php echo $row["type"];?>&ieid=<?php echo $row["ieid"];?>">Add Charges</a></td>
		  
		   		   <td colspan="5"><a target='_blank' href="proused.php?pmrn=<?php echo $row["pmrn"]; ?>&dname=<?php echo $row["dname"]; ?>&eid=<?php echo $row["eid"]; ?>&id=<?php echo $row["id"]; ?>"><img src="print.png" title="Print Report" width="150" height="60" /></a></td>						
		   

            


	  
      </tr>
    <?php $count++; } ?>
	

  </tbody>
</table>


  </tbody>
</table>
</form>


</body>

</html>
