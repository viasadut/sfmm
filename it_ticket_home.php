<?php 
   session_start();
    require('db1.php');
	$role = $_SESSION['sess_userrole'];
	
	$queryc = "SELECT COUNT(utype) FROM user where '$role' in ('mng','staff','diet','bill','nurse')"; 
$resultc = mysqli_query($con, $queryc) or die(mysqli_error());
$rowc = mysqli_fetch_array($resultc);
$c1=$rowc['COUNT(utype)'];
	
    if(!isset($_SESSION['sess_username']) || $c1==0){
      header('Location: login2?err=2');
    }
?>
<?php
$url1=$_SERVER['REQUEST_URI'];
//header("Refresh: 5; URL=$url1");


$ad='b';
?>

<?php
require('db1.php');
 $fullname = $_SESSION['sess_username'];
$query39 = "SELECT * FROM user where uname= '$fullname'"; 
	 
$result39 = mysqli_query($con, $query39) or die(mysqli_error());

// Print out result
$row39 = mysqli_fetch_array($result39);

$full = $row39['fullname'];

$query3 = "SELECT * FROM staff3 where sid= '$fullname'"; 
	 
$result3 = mysqli_query($con, $query3) or die(mysqli_error());

// Print out result
$row3 = mysqli_fetch_array($result3);
$dept=$row3['dept'];
$cat=$row3['cat'];
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
   <li><a href='homemng'><span>Home</span></a></li>
   <li class='active has-sub'><a href='#'><span>Patients</span></a>
      <ul>
         <li class='has-sub'><a href='viewnew'><span>OPD Patients</span></a>
            
         </li>
         <li class='has-sub'><a href='iview'><span>In-Patients</span></a>
            
         </li>
		 <li class='has-sub'><a href='pedit1'><span>Edit Patient Record</span></a>
            
         </li>
		 <li class='has-sub'><a href='manualesearchdd'><span>Old Doridro Fund Request</span></a>
            
         </li>
      </ul>
   </li>
   
   
   
 
   <li class='last'><a href='docchangepass'><span>Change Password</span></a></li>
   <?php if($fullname==284)
   {
   echo "<li class='active has-sub'><a href='#'><span>Customer Counselling Menu</span></a>
      <ul>
         <li class='has-sub'><a href='bedviewbill'><span>Bed Management</span></a>
            
         </li>
         <li class='has-sub'><a href='qcview'><span>Today's In-Patients List</span></a>
            
         </li>
		 <li class='has-sub'><a href='feed'><span>Add Feedback</span></a>
            
         </li>
		 <li class='has-sub'><a href='feedstats'><span>Feedback Stats</span></a>
            
         </li>
      </ul>
   </li>";
   }
   ?>
   <li class='last'><a href='logout'><span>LOGOUT</span></a></li>
</ul>
</div>
<p align="center" class="style1">Welcome!!  <?php echo $row39['fullname']; ?>'s DashBoard </p> 
<p align="right"> <?php echo "Date:" ?> <?php echo date('d/m/Y')?> </p>
<form action="" method="GET">

 <?php
$user=$_SESSION["sess_username"];
$date= date('m/d/Y');
?>
   
  </tbody>
</table>
</form>

<table width="100%" height ="100%" border="1" align="center" bgcolor="#FFFF99" style="border-collapse:collapse;">

<tr><td colspan="20"align="center"bgcolor="lightgreen"><h3> Please Select Your Desire Module</h3></td></tr>


<tr><td colspan="20"align="left"><a href="ticket/index"><font size="4.5">IT_Ticketing_System </td></tr>	

<?php if($dept=='Information Technology')
{echo'	
<tr><td colspan="20"align="left"><a href="ticket/index_it"><font size="4.5">IT Panel</a></td></tr>
<tr><td colspan="20"align="left"><a href="ticket/index_management"><font size="4.5">Management Panel</a></td></tr>
'
;}
?>




	  
	 


</table>
    


  
    

    
	
   
  </tbody>
</table>
</form>

</body>

</html>
