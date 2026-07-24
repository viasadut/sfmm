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
header("Refresh: 5; URL=$url1");

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

?>

<?php
/*
Author: Javed Ur Rehman
Website: https://www.allphptricks.com/
*/
//session_start();
require('db1.php');
//include("auth.php");
$query3 = "SELECT * FROM incident1 where itype= 'Clinical'"; 
	 
$result3 = mysqli_query($con, $query3) or die(mysqli_error());

// Print out result
$row3 = mysqli_fetch_array($result3);
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
<p align="center" class="style1">Todays  <?php echo $full; ?>'s In-Patients List </p> 
<p align="right"> <?php echo "Date:" ?> <?php echo date('d/m/Y')?> </p>
<form action="" method="GET">
<table width="100%" height ="100%" border="1" align="center" bgcolor="#FFFF99" style="border-collapse:collapse;">

    <tr>
      <th width="4%"><strong>S.No</strong></th>
      <th width="5%"><strong>Incident Type</strong></th>
      <th width="5%"><strong>Department Involved</strong></th>
      <th width="75%"><strong>Details </strong>
      
	  <th width="5%"><strong>Write Comments</strong>
      <th width="3%"><strong>More </strong>
	  <th width="3%"><strong>Upload Photo </strong>
	   </tr>
  </thead>
  <tbody>
  
    




<?php
	
	
		
	
	
//$user1=$_SESSION["sess_username"];
$date= date('m/d/Y');
$count=1;


$sel_queryz="Select * from incident1 where '$user' in (`m1`,`m2`,`m3`,`m4`,`m5`,`cc`,`rby`,`hos1`,`hos`,`fby`) and status!='Closed'";
//$start=$row["aadate"];

$row1z = mysqli_query($con,$sel_queryz);
while($rowz = mysqli_fetch_assoc($row1z)) { ?>
      <td align="center"><?php echo $count; ?></td>
      <td align="center"><?php echo $rowz["itype"]; ?></td>
      <td align="center"><?php echo $rowz["idept"]; ?>
      <td align="center"><textarea rows="15" readonly><?php echo $rowz["idetails"]; ?></textarea>
      
      <td align="center"align="right">
	  
	  <?php
				$id6=$rowz["id"];
		$ceo=$rowz["ceo"];
		$cfo=$rowz["cfo"];
		$cno=$rowz["cno"];
		$md=$rowz["md"];
		$hos=$rowz["hos"];
		$hoscom=$rowz["com5"];
	$hos1=$rowz["hos1"];
		$hos1com=$rowz["hos1com"];
		$rby=$rowz["rby"];
		$id=$rowz["id"];
		$com5=$rowz["com5"];
		$com6=$rowz["com6"];
		$fby=$rowz["fby"];
		$cc=$rowz["cc"];
		
		
		$m1=$rowz["m1"];
		$m1com=$rowz["m1com"];
		
		$m2=$rowz["m2"];
		$m2com=$rowz["m2com"];
		
		$m3=$rowz["m3"];
		$m3com=$rowz["m3com"];
		
		$m4=$rowz["m4"];
		$m4com=$rowz["m4com"];
		
		$m5=$rowz["m5"];
		$m5com=$rowz["m5com"];
		
		$cc=$rowz["cc"];
		$cccom=$rowz["chaircom"];
		
		
		
		
		$url = "incident1staff?ceo=$ceo&cfo=$cfo&cno=$cno&md=$md&hos=$hos&id=$id&fby=$fby&cc=$cc"; 
	  if($user==$rby)
	{ 
echo "Incident Still Not Closed";
	}

	
	else if($user==$hos and $hoscom=='' )
	{ 
echo "<a target='_blank' href='$url'>Write Comments</a>";
	}
	
	
	else if($user==$m1 and $m1com=='' )
	{ 
echo "<a target='_blank' href='$url'>Write Comments</a>";
	}
	
	else if($user==$m2 and $m2com=='' )
	{ 
echo "<a target='_blank' href='$url'>Write Comments</a>";
	}
	
	else if($user==$m3 and $m3com=='' )
	{ 
echo "<a target='_blank' href='$url'>Write Comments</a>";
	}
	  
	  else if($user==$m4 and $m4com=='' )
	{ 
echo "<a target='_blank' href='$url'>Write Comments</a>";
	}
	
	else if($user==$m5 and $m5com=='' )
	{ 
echo "<a target='_blank' href='$url'>Write Comments</a>";
	}


else if($user==$hos1 and $hos1com =='')
	{ 
echo "<a target='_blank' href='$url'>Write Comments</a>";
	}
	
	
	else if($user==$cc and $cccom =='')
	{ 
echo "<a target='_blank' href='$url'>Write Comments</a>";
	}
	
	
	else if($user==$fby and $com6 =='')
	{ 
echo "<a target='_blank' href='$url'>Write Comments</a>";
	}
		
	
	else {
		  
		  echo'Comments Already Written';
	  }
	  ?>
	  
	  
	  
	  
	  </td>	  
	  <td align="center"align="right"><a href="incident_details?id=<?php echo $rowz['id']; ?>">More</a></td>	  
	  
	  	  <td align="center"align="right">
		  
		  
		  <?php
		
		$id=$rowz["id"];
		
		$url = "incident_photo?pmrn=$id"; 
		$url2 = "add_in_p?id=$id"; 
	  if($user==$rby)
	{ 
echo "<a target='_blank' href='$url'>Upload Photo</a>";
	}
	
	
	  if($user==$fby)
	{ 
echo "<a target='_blank' href='$url2'>Involve Staff</a>";
	}
	
	
	
	else{
		
		echo'';
		
	}
?>
		  
		  
		  </td>	  
      </tr>
<?php $count++; } ?>
  </tbody>

    

  </table>

</form>

</body>

</html>
