<?php 
    session_start();
    require('db1.php');
	$role = $_SESSION['sess_userrole'];
	
	$queryc = "SELECT COUNT(utype) FROM user where '$role' in ('doctor','staff','mng')"; 
$resultc = mysqli_query($con, $queryc) or die(mysqli_error());
$rowc = mysqli_fetch_array($resultc);
$c1=$rowc['COUNT(utype)'];
	
    if(!isset($_SESSION['sess_username']) || $c1==0){
      header('Location: login2?err=2');
    }
?>

<?php
$url1=$_SERVER['REQUEST_URI'];
header("Refresh: 120; URL=$url1");

?>
<?php
require('db1.php');
 $fullname = $_SESSION['sess_username'];
$query39 = "SELECT * FROM user where uname= '$fullname'"; 
	 
$result39 = mysqli_query($con, $query39) or die(mysqli_error());

// Print out result
$row39 = mysqli_fetch_array($result39)
?>
<?php
$full = $row39['fullname'];

?>

<?php
/*
Author: Javed Ur Rehman
Website: https://www.allphptricks.com/
*/
//session_start();
require('db1.php');
$id=$_REQUEST['id'];
//include("auth.php");
$query3 = "SELECT * FROM incident1 where id= '$id'"; 
	 
$result3 = mysqli_query($con, $query3) or die(mysqli_error());

// Print out result
$row3 = mysqli_fetch_array($result3);
$rby=$row3['rby'];
$hos=$row3['hos'];
$fby=$row3['fby'];

$query3r = "SELECT * FROM staff3 where sid= '$rby'"; 
	 
$result3r = mysqli_query($con, $query3r) or die(mysqli_error());

// Print out result
$row3r = mysqli_fetch_array($result3r);
$rby1=$row3r['sname'];


$query3h = "SELECT * FROM staff3 where sid= '$hos'"; 
	 
$result3h = mysqli_query($con, $query3h) or die(mysqli_error());

// Print out result
$row3h = mysqli_fetch_array($result3h);
$hos1=$row3h['sname'];


$query3f = "SELECT * FROM staff3 where sid= '$fby'"; 
	 
$result3f = mysqli_query($con, $query3f) or die(mysqli_error());

// Print out result
$row3f = mysqli_fetch_array($result3f);
$fby1=$row3f['sname'];


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
textarea { font-size: 25px;
color:black;
background-color: none;
white-space: pre-wrap;
line-height: 200%;
 }
</style>


   <link rel="stylesheet" href="styles.css">

   <script src="script.js"></script>




</head>


<body>








<div id='cssmenu'>
<ul>
   <li><a href='viewnew11'><span>Home</span></a></li>
   <li class='active has-sub'><a href='#'><span>Patients</span></a>
      <ul>
         <li class='has-sub'><a href='viewnew'><span>OPD Patients</span></a>
            
         </li>
         <li class='has-sub'><a href='iview'><span>In-Patients</span></a>
            
         </li>
      </ul>
   </li>
   <li class='active has-sub'><a href='#'><span>Appointment</span></a>
      <ul>
         <li class='has-sub'><a href='cggtttt'><span>Set Doctor's Appointment</span></a>
            
         </li>
         <li class='has-sub'><a href='ami2'><span>Set Restrictions on Appointment Time</span></a>
            
         </li>
      </ul>
	  
   </li>

   <li class='last'><a href='ot'><span>OT BOOKING</span></a></li>
   <li class='active has-sub'><a href='#'><span>Reports</span></a>
      <ul>
         <li class='has-sub'><a href='view3new'><span>OPD Prescription</span></a>
            
         </li>
         <li class='has-sub'><a href='con1'><span>Outpatient Stats</span></a>
            
         </li>
		          <li class='has-sub'><a href='con2'><span>OT Stats</span></a>
            
         </li>
         <li class='has-sub'><a href='con3'><span>In-Patient Stats</span></a>
            
         </li>
		   <li class='has-sub'><a href='con11'><span>Medicine Stats</span></a>
            
         </li>

      </ul>
   </li>
   <li class='last'><a href='logout'><span>LOGOUT</span></a></li>
</ul>
</div>
<p align="center" class="style1">Details Incident Report</p> 
<p align="right"> <?php echo "Date:" ?> <?php echo date('d/m/Y')?> </p>
<form action="" method="GET">
<table width="100%" height ="100%" border="1" align="center" bgcolor="#FFFF99" style="border-collapse:collapse;">

    
  <tbody>
  
    <?php
	
	
		
	
	
$user=$_SESSION["sess_username"];
$date= date('m/d/Y');
$count=1;
$sel_query="Select * from incident1 where id='$id'";
//$start=$row["aadate"];

$row1 = mysqli_query($con,$sel_query);
while($row = mysqli_fetch_assoc($row1)) { ?>
    <tr><td align="right" style="font-size: 30px;"><a href="incident_photo_view?pmrn=<?php echo $id;?>">Photo View</a></td>
	</tr>  
      <tr><td align="left" style="font-size: 30px;"><?php echo 'Incident Raised By'.'- '.$rby1; ?></a></td></tr>
      <tr><td align="left"style="font-size: 30px;"><?php echo 'Department Involved'.'- '.$row["idept"]; ?></tr>
      <tr><td align="left"><textarea rows="15"  readonly><?php echo 'Incident Details'.'- '.'&#013;&#010;&#013;&#010;'.$row["idetails"]; ?></textarea></tr>
      
	  <tr><td align="left">
	  
	  <?php 
	  $z1=$row['com5'];
	  if($row['com5']!='')
	  {echo
  "<textarea rows='15'readonly>'HOS Comments'.'- '.$hos1.'&#013;&#010;&#013;&#010;'.$z1</textarea>";
	  }
	  ?>
	  </tr>  
	  
	  
	  <tr><td align="left">
	  
	  
	  <?php 
	  $z2=$row['m1'];
	  $z21=$row['m1com'];
	  if($row['m1']!='')
	  {echo
  "<textarea rows='15'readonly>'Staff1 Comments'.'- '.$z2.'&#013;&#010;&#013;&#010;'.$z21</textarea>
  
  ";
	

	}
	  ?>
	  
	  
	  
	  
	  
	  </tr>
	  <tr><td align="left">
	  
	  
	  
	  <?php 
	  $z3=$row['m2'];
	  $z31=$row['m2com'];
	  if($row['m2']!='')
	  {echo
  "<textarea rows='15'readonly>'Staff2 Comments'.'- '.$z3.'&#013;&#010;&#013;&#010;'.$z31</textarea>
  
  ";
	

	}
	  ?>
	  
	  
	  
	  
	  
	  
	  </tr>
	  <tr><td align="left">
	  
	  
	  <?php 
	  $z4=$row['m3'];
	  $z41=$row['m3com'];
	  if($row['m3']!='')
	  {echo
  "<textarea rows='15'readonly>'Staff3 Comments'.'- '.$z4.'&#013;&#010;&#013;&#010;'.$z41</textarea>
  
  ";
	

	}
	  ?>
	  
	  
	  
	  
	  </tr>
	  <tr><td align="left">
	  
	  
	  	  <?php 
	  $z5=$row['m4'];
	  $z51=$row['m4com'];
	  if($row['m4']!='')
	  {echo
  "<textarea rows='15'readonly>'Staff4 Comments'.'- '.$z5.'&#013;&#010;&#013;&#010;'.$z51</textarea>
  
  ";
	

	}
	  ?>
	  
	  
	  
	  </tr>
	  
	  
	  
	  
	  <tr><td align="left">
	  
	  	  <?php 
	  $z6=$row['m5'];
	  $z61=$row['m5com'];
	  if($row['m5']!='')
	  {echo
  "<textarea rows='15'readonly>'Staff5 Comments'.'- '.$z6.'&#013;&#010;&#013;&#010;'.$z61</textarea>
  
  ";
	

	}
	  ?>
	  
	  
	  
	  
	  
	  </tr>
	  <tr><td align="left"><textarea rows="15"readonly><?php echo 'TM Comments'.'- '.$fby1.'&#013;&#010;&#013;&#010;'.$row["com6"]; ?></textarea></tr>
	  
	  <tr><td align="left"><textarea rows="15"readonly><?php echo 'CFO Comments'.'- '.$row["cfo"].'- '.'&#013;&#010;&#013;&#010;'.$row["com2"]; ?>  </textarea></tr>
	  <tr><td align="left"><textarea rows="15"readonly><?php echo 'CNO Comments'.'- '.$row["cno"].'- '.'&#013;&#010;&#013;&#010;'.$row["com3"]; ?>  </textarea></tr>
	  <tr><td align="left"><textarea rows="15"readonly><?php echo 'MD Comments'.'- '.$row["md"].'- '.'&#013;&#010;&#013;&#010;'.$row["com4"]; ?> </textarea> </tr>
	  <tr><td align="left"><textarea rows="15"readonly><?php echo 'CEO Comments'.'- '.$row["ceo"].'- '.'&#013;&#010;&#013;&#010;'.$row["com1"]; ?>  </textarea></tr>
	  
	  
      
      </tr>
    <?php $count++; } ?>
  </tbody>
</table>

</form>

</body>

</html>
