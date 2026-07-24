<?php 
    session_start();
    $role = $_SESSION['sess_userrole'];
    if(!isset($_SESSION['sess_username']) || $role!="lab"){
      header('Location: login2?err=2');
    }
?>
<?php
$url1=$_SERVER['REQUEST_URI'];
header("Refresh: 60; URL=$url1");
$dd=date('m/d/Y');
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
<?php
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
</style>


   <link rel="stylesheet" href="styles.css">

   <script src="script.js"></script>




</head>


<body>






<div id='cssmenu'>
<ul>
   <li><a href='inviewnew1'><span>Home</span></a></li>
   <li class='active has-sub'><a href='#'><span>Patients</span></a>
      <ul>
         <li class='has-sub'><a href='psadmin'><span>Patient Search By MRN</span></a>
            
         </li>
         <li class='has-sub'><a href='gg3new'><span>Manual Admission</span></a>
            
         </li>
      </ul>
	  
   </li>
   
   <li class='active has-sub'><a href='#'><span>Discharge</span></a>
      <ul>
         <li class='has-sub'><a href='dcview'><span>Discharge Request By Cnsultants</span></a>
            
         </li>
         <li class='has-sub'><a href='discharge'><span>Manual Discharge</span></a>
            
         </li>
		 <li class='has-sub'><a href='dischargeview'><span>Print Discharge Report</span></a>
            
         </li>
		 
      </ul>
	  
   </li>
   
   <li class='active has-sub'><a href='#'><span>Bed Management</span></a>
      <ul>
         <li class='has-sub'><a href='bedview'><span>All Bed Status</span></a>
            
         </li>
         <li class='has-sub'><a href='tes7'><span>Detail History</span></a>
            
         </li>
		          <li class='has-sub'><a href='tes77'><span>Detail History Episodewise</span></a>
            
         </li>

		 
      </ul>
	  
   </li>
   
   <li class='last'><a href='logout'><span>LOGOUT</span></a></li>
</ul>
</div>

<p align="center" class="style1">Welcome!!  <?php echo $row39['fullname']; ?>'s IPD DashBoard </p> 
<form action="" method="GET">
<table width="100%" height ="100%" border="1" align="center" bgcolor="#FFFF99" style="border-collapse:collapse;">
<tr> <td align="right" colspan="20"><a href="imoinviewtest"><strong>SEARCH</strong></a></td></tr>
<tr> <td align="right" colspan="20"></td></tr><tr> <td align="right" colspan="20"></td></tr><tr> <td align="right" colspan="20"></td></tr>
    




    <tr>
      <th width="4%"><strong>S.No</strong></th>
      <th width="17%"><strong>Patient's Name</strong></th>
      <th width="10%"><strong>MRN</strong></th>
      <th width="15%"><strong>Doctor's Name </strong>
      <th width="14%"><strong>Admission Date</strong>   
      

      <th width="14%"><strong>Procedure Name</strong>
	  <th width="14%"><strong>View Request</strong>
	  <th width="14%"><strong>Edit</strong>
	  <th width="14%"><strong>Status</strong>
      
	   </tr>
  </thead>
  <tbody>
  
    <?php
$user=$_SESSION["sess_username"];
$date= date('Y-m-d');
$count=1;
$sel_query="Select * from endopapp where adate='$date' order by id asc";

$result = mysqli_query($con,$sel_query);
while($row = mysqli_fetch_assoc($result)) { ?>
    <tr>
      <td align="center"><?php echo $count; ?></td>
      <td align="center"><?php echo $row["pname"]; ?></td>
      <td align="center"><?php echo $row["pmrn"]; ?>
      <td align="center"><?php echo $row["dreffer"]; ?>
      <td align="center"><?php echo $row["adate"]; ?>  
	  <td align="center"><?php echo $row["tname"]; ?>  

       
	  <td align="center"><a href="labinpendo?pmrn=<?php echo $row["pmrn"]; ?>&eid=<?php echo $row["eid"]; ?>">VIEW LAB REQUEST</a></td>
	    <td align="center"><a href="labinpeditendo?pmrn=<?php echo $row["pmrn"]; ?>&eid=<?php echo $row["eid"]; ?>">EDIT</a></td>
	  	  
<?php 
$pmrn1=$row['pmrn'];
$eid=$row['eid'];
$sel90="Select * from endolab where pmrn= $pmrn1 and eid='$eid'and date='$date';";
$result90 = mysqli_query($con,$sel90);
$row3 = mysqli_fetch_assoc($result90);


$query43 = "SELECT COUNT(status) FROM endolab where pmrn= '$pmrn1' and eid='$eid'and date='$date' and status='Ordered';"; 
$result43 = mysqli_query($con, $query43) or die(mysqli_error());
$row43 = mysqli_fetch_assoc($result43);
$count55 =$row43['COUNT(status)'];

?>

  	  	    <td align="center"colspan="1"<?php if($count55>0): ?> style="background-color:RED;"<?php else: ?> style="background-color:lightgreen;" <?php endif ; ?>>
        
		<?php echo $row3['status'];?>
		</td>

	  
      </tr>
    <?php $count++; } ?>
   </tbody>
</table>
</form>

</body>

</html>
