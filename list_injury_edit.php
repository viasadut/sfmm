<?php 
    session_start();
    require('db1.php');
	$role = $_SESSION['sess_userrole'];
	
	$queryc = "SELECT COUNT(utype) FROM user where '$role' in ('imo','doctor','gpopd','mofficer')"; 
$resultc = mysqli_query($con, $queryc) or die(mysqli_error());
$rowc = mysqli_fetch_array($resultc);
$c1=$rowc['COUNT(utype)'];
	
    if(!isset($_SESSION['sess_username']) || $c1==0){
      header('Location: login2?err=2');
    }
?>


<?php
/*
Author: Javed Ur Rehman
Website: https://www.allphptricks.com/
*/
//session_start();
require('db1.php');
//include("auth.php");
 
?>

<?php
require('db1.php');
 $user = $_SESSION['sess_username'];
$query39 = "SELECT * FROM user where uname= '$user'"; 
	 
$result39 = mysqli_query($con, $query39) or die(mysqli_error());

// Print out result
$row39 = mysqli_fetch_array($result39)
?>
<?php
$full = $row39['fullname'];
$pmrn=$_REQUEST['pmrn'];
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
   <script src="http://code.jquery.com/jquery-latest.min.js" type="text/javascript"></script>
   <script src="script.js"></script>




</head>


<body>
<div id='cssmenu'>
<ul>
   <li><a href='ccview'><span>Home</span></a></li>
      <li class='active has-sub'><a href='#'><span>Appointment</span></a>
      <ul>
         <li class='has-sub'><a href='ccggttt'><span>Set Doctor's Appointment</span></a>
            
         </li>
         <li class='has-sub'><a href='ccami'><span>Set Restrictions on Appointment Time</span></a>
            
         </li>
		 <li class='has-sub'><a href='ccviewsp11'><span>Doctor's Available Slot</span></a>
            
         </li>
		 
      </ul>
	  
   </li>

    	    <li class='last'><a href='ccgg1new'><span>Set Patient's Appointment</span></a></li>
      <li class='last'><a href='view4new1'><span>Search previous patients</span></a></li>
	  <li class='last'><a href='ccapp1'><span>Appointment Report</span></a></li>
   <li class='last'><a href='logout'><span>LOGOUT</span></a></li>
</ul>
</div>
<p align="center" class="style1">SEARCH PANEL FOR  PATIENTS RECORD</p> 


<form action="" method="POST">
<table width="100%" height ="100%" border="1" align="center" bgcolor="#FFFF99" style="border-collapse:collapse;">

    <tr>
      <td colspan="1"align="center"><strong>S.No</strong></td>
      
      <td colspan="1"align="center"><strong>MRN</strong></td>
      
      <td colspan="2"align="center"><strong>Uploaded Documents</strong></td>   
      
      <td colspan="1"align="center"><strong>Issue</strong></td>

	   </tr>
  
  <tbody>
  
    <?php
	
$sel_query="Select * from injury where pmrn= '$pmrn' and euser='$full' and estatus='Pending' order by id desc;";
 $count=1;	 
$result = mysqli_query($con,$sel_query);



while($row = mysqli_fetch_assoc($result)) 
{ ?>    <tr>

      <td colspan="1" align="center"><?php echo $count; ?></td>
      <td colspan="1"align="center"><?php echo $row["pmrn"]; ?></td>
      <td colspan="1"align="center">

      <a class="thumbnail fancybox" rel="ligthbox" target='_blank' href="cam_test/upload/<?php echo $row['upload'] ?>">
                        <img class="img-responsive" alt="" src="cam_test/upload/<?php echo $row['upload'] ?>" height="100px" width="100px">

                        <div class='text-center'>
                            <small class='text-muted'><?php echo $row['upload'] ?></small>
                        </div> </a>

      </td>
      
      
      
<td colspan="2"align="center">
<a target='_blank' href="injuryedit.php?id=<?php echo $row["id"]; ?>&pmrn=<?php echo$row["pmrn"];?>">Edit Injury Certificate</a>
</td>

	  
      </tr>

	<?php $count++;  }?>

  </tbody>
</table>

</form>

</body>

</html>
