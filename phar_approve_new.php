<?php 
   session_start();
    require('db1.php');
	$role = $_SESSION['sess_userrole'];
	
	$queryc = "SELECT COUNT(utype) FROM user where '$role' in ('mng','staff','store','doctor')"; 
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

?>
<?php
require('db1.php');
 $fullname = $_SESSION['sess_username'];
$query39 = "SELECT * FROM user where uname= '$fullname'"; 
	 
$result39 = mysqli_query($con, $query39) or die(mysqli_error());

// Print out result
$row39 = mysqli_fetch_array($result39);
?>
<?php
$full = $row39['fullname'];

$user=$_SESSION["sess_username"];

$query40 = "SELECT * FROM staff3 where sid='$fullname'"; 
	 
$result40 = mysqli_query($con, $query40) or die(mysqli_error());

// Print out result
$row40 = mysqli_fetch_array($result40);

$sid1=$row40['sid1'];
$cat=$row40['cat'];
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


<script type="text/javascript">
function confirm_click()
{
return confirm("Are you Sure to Confirm this Request ?");
}

</script>

<script type="text/javascript">
function confirm_click1()
{
return confirm("Are you Sure to Reject this Leave ?");
}

</script>

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
<p align="center" class="style1">Todays  <?php echo $full; ?>'s Charge Code Pending Approval List </p> 
<p align="right"> <?php echo "Date:" ?> <?php echo date('d/m/Y')?> </p>
<form action="" method="GET">
<table width="100%" height ="100%" border="1" align="center" bgcolor="#FFFF99" style="border-collapse:collapse;">

    <tr>
      <th width="4%"><strong>S.No</strong></th>
      
	  <th width="17%"><strong>Code</strong></th>
	  <th width="17%"><strong>Chargeable Code</strong></th>
      <th width="10%"><strong>Generic Name</strong></th>
	  <th width="10%"><strong>Brand Name</strong></th>
	  <th width="10%"><strong>Company Name</strong></th>
	  	  
	  <th width="10%"><strong>Request For</strong></th>
      
      <th width="14%"><strong>Cost Price</strong>   
      <th width="14%"><strong>Pre. Price(OPD)</strong>
	  <th width="14%"><strong>Pre. Price(IPD)</strong>
	  <th width="14%"><strong>New Price(OPD)</strong>
	  <th width="14%"><strong>Margin(OPD)%</strong>
	  <th width="14%"><strong>New Price(IPD)</strong>
	  <th width="14%"><strong>Margin(IPD)%</strong>
	  <th width="14%"><strong>Request By</strong>
	  
	  <th width="14%"><strong>Status</strong>
	  <th width="14%"><strong>Remarks</strong>
	  <th width="14%"><strong>MID</strong>
	  
	  
	  
	  <th width="14%"><strong>View/Edit</strong>
	  <th width="14%"><strong>Approve</strong>
	  <th width="14%"><strong>Reject</strong>
	  <th width="14%"><strong>Print</strong>
	  
      
	   </tr>
  </thead>
  <tbody>


  
	<?php
	

//$start=$_REQUEST["stdate"];
//$end=$_REQUEST["endate"];
//$bt=$_REQUEST["bt"];
	
//$user=$_SESSION["sess_username"];
$date= date('m/d/Y');
$count=1;

$sel_query="Select * from medicinerequest where rstatus='Waiting For approval' and '$fullname'='338' and a2!='Approved' ORDER BY id asc;";

$result = mysqli_query($con,$sel_query);
//echo   $bt;


while($row = mysqli_fetch_assoc($result)) { ?>
    <tr>
      <td align="center"><?php echo $count; ?></td>
	  
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
      <td align="center" style="color:red;font-weight:bold">New Generic</td>
      <td align="center"><?php echo $row["cprice"]; ?></td>
      <td align="center"></td>  
	  <td align="Left"></td>
	  	  <td align="Left"><?php echo $row["uprice"]; ?>  </td>
	  	  
	  	  <td align="Left"> </td>
		  <td align="Left"><?php echo $row["uprice1"]; ?></td>  
		  <td align="Left"> </td>
		  <td align="Left"><?php echo $row["rby"]; ?>  </td>
      
	  <td align="center" style="font:Verdana, Arial, Helvetica, sans-serif large" style="font-weight:bold"><?php echo $row["rstatus"];?> </td> 
	  <td align="Left"><?php echo $row["remarks"]; ?>  
<td align="center"><a href="addmedicinerequestmng?id=<?php echo $row["id"]; ?>">View/Edit</a></td>
	  <td align="center" style="font:Verdana, Arial, Helvetica, sans-serif large" style="font-weight:bold"><a onclick="return confirm_click();" href="updatemedicinestatus_new?id=<?php echo $row["id"]; ?>&user=<?php echo "$fullname";?>">Approve</a> </td>
	  
	  <td align="center"><a onclick="return confirm_click2();" href="addmedicinerequestdeletemng?id=<?php echo $row["id"]; ?>"><strong>Reject</strong></a></td>
	

	      


	  
      </tr>
    <?php $count++; } ?>
	
	
	
	<?php
	

//$start=$_REQUEST["stdate"];
//$end=$_REQUEST["endate"];
//$bt=$_REQUEST["bt"];
	
//$user=$_SESSION["sess_username"];
$date= date('m/d/Y');
$count=1;

$sel_query="Select * from medicinerequest where rstatus NOT IN ('DONE','Cancelled') and rstatus='WAITING FOR Chairman APPROVAL' and '$fullname'='1175' and a2!='Approved' ORDER BY id asc;";

$result = mysqli_query($con,$sel_query);
//echo   $bt;


while($row = mysqli_fetch_assoc($result)) { ?>
    <tr>
      <td align="center"><?php echo $count; ?></td>
	  
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
      <td align="center" style="color:red;font-weight:bold">New Generic</td>
      <td align="center"><?php echo $row["cprice"]; ?></td>
      <td align="center"></td>  
	  <td align="Left"></td>
	  	  <td align="Left"><?php echo $row["uprice"]; ?>  </td>
	  	  
	  	  <td align="Left"> </td>
		  <td align="Left"><?php echo $row["uprice1"]; ?></td>  
		  <td align="Left"> </td>
		  <td align="Left"><?php echo $row["rby"]; ?>  </td>
      
	  <td align="center" style="font:Verdana, Arial, Helvetica, sans-serif large" style="font-weight:bold"><?php echo $row["rstatus"];?> </td> 
	  <td align="Left"><?php echo $row["remarks"]; ?>  
<td align="center"><a href="addmedicinerequestmng?id=<?php echo $row["id"]; ?>">View/Edit</a></td>
	  <td align="center" style="font:Verdana, Arial, Helvetica, sans-serif large" style="font-weight:bold"><a onclick="return confirm_click();" href="updatemedicinestatus_new?id=<?php echo $row["id"]; ?>&user=<?php echo "$fullname";?>">Approve</a> </td>
	  
	  <td align="center"><a onclick="return confirm_click2();" href="addmedicinerequestdeletemng?id=<?php echo $row["id"]; ?>"><strong>Reject</strong></a></td>
	

	      


	  
      </tr>
    <?php $count++; } ?>
	

		<?php
	
$user=$_SESSION["sess_username"];
//$start=$_REQUEST["stdate"];
//$end=$_REQUEST["endate"];
//$bt=$_REQUEST["bt"];
	
//$user=$_SESSION["sess_username"];
$date= date('m/d/Y');
$count=1;

$sel_query="Select * from medicinerequest where rstatus NOT IN ('DONE','Cancelled') and rstatus='WAITING FOR CFO APPROVAL' and '$fullname'='1601'  ORDER BY id asc;";

$result = mysqli_query($con,$sel_query);
//echo   $bt;


while($row = mysqli_fetch_assoc($result)) { ?>
    <tr>
      <td align="center"><?php echo $count; ?></td>
	  
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
      <td align="center" style="color:red;font-weight:bold">New Generic</td>
      <td align="center"><?php echo $row["cprice"]; ?>
      <td align="center"></td>  
	  <td align="Left"></td>
	  	  <td align="Left"><?php echo $row["uprice"]; ?>  </td>
	  	  
	  	  <td align="Left"> </td>
		  <td align="Left"><?php echo $row["uprice1"]; ?></td>  
		  <td align="Left"> </td>
		  <td align="Left"><?php echo $row["rby"]; ?>  
      
	  <td align="center" style="font:Verdana, Arial, Helvetica, sans-serif large" style="font-weight:bold"><?php echo $row["rstatus"];?> </td> 
	  <td align="Left"><?php echo $row["remarks"]; ?>  
<td align="center"><a href="addmedicinerequestmng?id=<?php echo $row["id"]; ?>">View/Edit</a></td>
	  <td align="center" style="font:Verdana, Arial, Helvetica, sans-serif large" style="font-weight:bold"><a onclick="return confirm_click();" href="updatemedicinestatus_new?id=<?php echo $row["id"]; ?>&user=<?php echo "$fullname";?>">Approve</a> </td>
	  
	  <td align="center"><a onclick="return confirm_click2();" href="addmedicinerequestdeletemng?id=<?php echo $row["id"]; ?>"><strong>Reject</strong></a></td>
	

	       


	  
      </tr>
    <?php $count++; } ?>

			<?php
	
$user=$_SESSION["sess_username"];
//$start=$_REQUEST["stdate"];
//$end=$_REQUEST["endate"];
//$bt=$_REQUEST["bt"];
	
//$user=$_SESSION["sess_username"];
$date= date('m/d/Y');
$count=1;

$sel_query="Select * from medicinerequest where rstatus NOT IN ('DONE','Cancelled') and rstatus='WAITING FOR CEO APPROVAL' and '$fullname'='ceo'  ORDER BY id asc;";

$result = mysqli_query($con,$sel_query);
//echo   $bt;


while($row = mysqli_fetch_assoc($result)) { ?>
    <tr>
      <td align="center"><?php echo $count; ?></td>
	  
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
      <td align="center" style="color:red;font-weight:bold">New Generic</td>
      <td align="center"><?php echo $row["cprice"]; ?>
      <td align="center"></td>  
	  <td align="Left"></td>
	  	  <td align="Left"><?php echo $row["uprice"]; ?>  </td>
	  	  
	  	  <td align="Left"> </td>
		  <td align="Left"><?php echo $row["uprice1"]; ?></td>  
		  <td align="Left"> </td>
		  <td align="Left"><?php echo $row["rby"]; ?>  
      
	  <td align="center" style="font:Verdana, Arial, Helvetica, sans-serif large" style="font-weight:bold"><?php echo $row["rstatus"];?> </td> 
	  <td align="Left"><?php echo $row["remarks"]; ?>  
<td align="center"><a href="addmedicinerequestmng?id=<?php echo $row["id"]; ?>">View/Edit</a></td>
	  <td align="center" style="font:Verdana, Arial, Helvetica, sans-serif large" style="font-weight:bold"><a onclick="return confirm_click();" href="updatemedicinestatus_new?id=<?php echo $row["id"]; ?>&user=<?php echo "$fullname";?>">Approve</a> </td>
	  
	  <td align="center"><a onclick="return confirm_click2();" href="addmedicinerequestdeletemng?id=<?php echo $row["id"]; ?>"><strong>Reject</strong></a></td>
	

	       


	  
      </tr>
    <?php $count++; } ?>

		<?php
	
$user=$_SESSION["sess_username"];
//$start=$_REQUEST["stdate"];
//$end=$_REQUEST["endate"];
//$bt=$_REQUEST["bt"];
	
//$user=$_SESSION["sess_username"];
$date= date('m/d/Y');
$count=1;

$sel_query="Select * from medicinerequest where rstatus NOT IN ('DONE','Cancelled') and rstatus='Forward to MD Approval' and '$fullname'='md'  ORDER BY id asc;";

$result = mysqli_query($con,$sel_query);
//echo   $bt;
 

while($row = mysqli_fetch_assoc($result)) { ?>
    <tr>
       <td align="center"><?php echo $count; ?></td>
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
      <td align="center" style="color:red;font-weight:bold">New Generic</td>
      <td align="center"><?php echo $row["cprice"]; ?>
      <td align="center"></td>  
	  <td align="Left"></td>
	  	  <td align="Left"><?php echo $row["uprice"]; ?>  </td>
	  	  
	  	  <td align="Left"> </td>
		  <td align="Left"><?php echo $row["uprice1"]; ?></td>  
		  <td align="Left"> </td>
		  <td align="Left"><?php echo $row["rby"]; ?>  
      
	  <td align="center" style="font:Verdana, Arial, Helvetica, sans-serif large" style="font-weight:bold"><?php echo $row["rstatus"];?> </td> 
	  <td align="Left"><?php echo $row["remarks"]; ?>  
<td align="center"><a href="addmedicinerequestmng?id=<?php echo $row["id"]; ?>">View/Edit</a></td>
	  <td align="center" style="font:Verdana, Arial, Helvetica, sans-serif large" style="font-weight:bold"><a onclick="return confirm_click();" href="updatemedicinestatus_new?id=<?php echo $row["id"]; ?>&user=<?php echo "$fullname";?>">Approve</a> </td>
	  
	  <td align="center"><a onclick="return confirm_click2();" href="addmedicinerequestdeletemng?id=<?php echo $row["id"]; ?>"><strong>Reject</strong></a></td>
	

	       


	  
      </tr>
    <?php $count++; } ?>
	


  
  
  

  <?php
	
	
	
	
	
$user=$_SESSION["sess_username"];
$date= date('m/d/Y');
$count1=1;
$sel_query="Select * from medicineedit where status in ('Waiting For Finance Fowrading','test','waiting') and fby='$user'";
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
	  $cc=$row['cprice']; 
	  $cc1=$row['uprice']; 
	  
	  $cc2=$cc1-$cc; 
	  
	  $cc3=100*$cc2/$cc;
	  
	  echo number_format($cc3, 2);
	  
	  ?></td>
	  <td align="center"><?php echo $row["uprice1"]; ?></td> 	  
	  
	  
	  
	  
	  
	  <td align="center"><?php
	  $cc=$row['cprice']; 
	  $cc1=$row['uprice1']; 
	  
	  $cc2=$cc1-$cc; 
	  
	  $cc3=100*$cc2/$cc;
	  
	  echo number_format($cc3, 2);
	  
	  ?></td>
	  <td align="center"><?php echo $row["eby"]; ?></td>  
	  
	  <td align="center"><?php echo $row["status"]; ?> </td> 
	  <td align="center"><?php echo $row["remarks"]; ?> </td> 
<td align="center"><a href="edit_phar1_p?id=<?php echo $row["id"]; ?>"><strong>View/Edit</strong></a></td>	   
<td align="center"><a onclick="return confirm_click();" href="phar_edit_confirm?id=<?php echo $row["id"]; ?>"><strong>Confirm</strong></a></td>

<td align="center"><a href="mreject_phar?id=<?php echo $row["id"]; ?>"><strong>Reject</strong></a></td>


	  
      </tr>
    <?php $count1++; } ?>
  
  
    
	 
  
  <?php
	
	
	
	
	
$user=$_SESSION["sess_username"];
$date= date('m/d/Y');
$count1=1;
$sel_query="Select * from medicineedit where status='WAITING FOR CFO APPROVAL'";
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
<td align="center"><a onclick="return confirm_click();" href="phar_edit_confirm?id=<?php echo $row["id"]; ?>"><strong>Confirm</strong></a></td>

<td align="center"><a href="mreject_phar?id=<?php echo $row["id"]; ?>"><strong>Reject</strong></a></td>

	  
      </tr>
    <?php $count1++; } ?>
	
	
	
	
	  <?php
	
	
	
	
	
$user=$_SESSION["sess_username"];
$date= date('m/d/Y');
$count1=1;
$sel_query="Select * from medicineedit where status='Waiting For MD Approval' and md='$user'";
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
<td align="center"><a onclick="return confirm_click();" href="phar_edit_confirm?id=<?php echo $row["id"]; ?>"><strong>Confirm</strong></a></td>

<td align="center"><a href="mreject_phar?id=<?php echo $row["id"]; ?>"><strong>Reject</strong></a></td>


	  
      </tr>
    <?php $count1++; } ?>
	
	<?php
	
	
	
	
	
$user=$_SESSION["sess_username"];
$date= date('m/d/Y');
$count1=1;
$sel_query="Select * from medicineedit where status='WAITING FOR CEO APPROVAL' and ceo='$user'";
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
<td align="center"><a onclick="return confirm_click();" href="phar_edit_confirm?id=<?php echo $row["id"]; ?>"><strong>Confirm</strong></a></td>

<td align="center"><a href="mreject_phar?id=<?php echo $row["id"]; ?>"><strong>Reject</strong></a></td>


	  
      </tr>
    <?php $count1++; } ?>

	
	
	 
<?php
	
	
	
	
	
$user=$_SESSION["sess_username"];
$date= date('m/d/Y');
$count1=1;
$sel_query="Select * from medicineedit where status='WAITING FOR IT ENTRY' and '$user' in ('1274')";
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
	  $cc=$row['cprice']; 
	  $cc1=$row['uprice']; 
	  
	  $cc2=$cc1-$cc; 
	  
	  $cc3=100*$cc2/$cc;
	  
	  echo number_format($cc3, 2);
	  
	  ?></td>
	  <td align="center"><?php echo $row["uprice1"]; ?></td> 	  
	  
	  
	  
	  
	  
	  <td align="center"><?php
	  $cc=$row['cprice']; 
	  $cc1=$row['uprice1']; 
	  
	  $cc2=$cc1-$cc; 
	  
	  $cc3=100*$cc2/$cc;
	  
	  echo number_format($cc3, 2);
	  
	  ?></td>
	  <td align="center"><?php echo $row["eby"]; ?></td>  
	  
	  <td align="center"><?php echo $row["status"]; ?> </td>
<td align="center"><?php echo $row["remarks"]; ?> </td> 
<td align="center"><?php echo $row["mid"]; ?></td>  	  
<td align="center"><a href="edit_phar1_p?id=<?php echo $row["id"]; ?>"><strong>View/Edit</strong></a></td>	   
<td align="center"><a onclick="return confirm_click();" href="phar_edit_confirm?id=<?php echo $row["id"]; ?>"><strong>Confirm</strong></a></td>

<td align="center"><a href="mreject_phar?id=<?php echo $row["id"]; ?>"><strong>Reject</strong></a></td>

<td align="center"><a href="charge_code_phar?ed=<?php echo $row["ittime1"]; ?>"><strong>Print</strong></a></td>	   

	  
      </tr>
    <?php $count1++; } ?>	
	
		




<?php
	
	
	
	
	
$user=$_SESSION["sess_username"];
$date= date('m/d/Y');
$count1=1;
$sel_query="Select * from medicineedit where status in ('WAITING FOR IT ENTRY','WAITING FOR MD APPROVAL','WAITING FOR CFO APPROVAL','WAITING FOR Chairman APPROVAL') and ceo='$user'";
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
	  <td align="center">Update</td>
      
      <td align="center"><?php echo $row["cprice"]; ?></td>  
	  <td align="center"><?php echo $row["oprice"]; ?></td>  
	  <td align="center"><?php echo $row["oprice1"]; ?></td> 
<td align="center"><?php echo $row["uprice"]; ?></td>  
<td align="center"><?php
	  $cc=$row['cprice']; 
	  $cc1=$row['uprice']; 
	  
	  $cc2=$cc1-$cc; 
	  
	  $cc3=100*$cc2/$cc;
	  
	  echo number_format($cc3, 2);
	  
	  ?></td>
	  <td align="center"><?php echo $row["uprice1"]; ?></td> 	  
	  
	  
	  
	  
	  
	  <td align="center"><?php
	  $cc=$row['cprice']; 
	  $cc1=$row['uprice1']; 
	  
	  $cc2=$cc1-$cc; 
	  
	  $cc3=100*$cc2/$cc;
	  
	  echo number_format($cc3, 2);
	  
	  ?></td>
	  <td align="center"><?php echo $row["eby"]; ?></td>  
	  
	  <td align="center"><?php echo $row["status"]; ?> </td> 
<td align="center"><?php echo $row["remarks"]; ?> </td> 



	  
      </tr>
    <?php $count1++; } ?>	
		


<?php
	
	
	
	
	
$user=$_SESSION["sess_username"];
$date= date('m/d/Y');
$count1=1;
$sel_query="Select * from medicineedit where status in ('WAITING FOR IT ENTRY','WAITING FOR CEO APPROVAL','WAITING FOR MD APPROVAL','Waiting For Finance Fowrading')and cfo='$user'";
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
	  <td align="center">Update</td>
      
      <td align="center"><?php echo $row["cprice"]; ?></td>  
	  <td align="center"><?php echo $row["oprice"]; ?></td>  
	  <td align="center"><?php echo $row["oprice1"]; ?></td> 
<td align="center"><?php echo $row["uprice"]; ?></td>  
<td align="center"><?php
	  $cc=$row['cprice']; 
	  $cc1=$row['uprice']; 
	  
	  $cc2=$cc1-$cc; 
	  
	  $cc3=100*$cc2/$cc;
	  
	  echo number_format($cc3, 2);
	  
	  ?></td>
	  <td align="center"><?php echo $row["uprice1"]; ?></td> 	  
	  
	  
	  
	  
	  
	  <td align="center"><?php
	  $cc=$row['cprice']; 
	  $cc1=$row['uprice1']; 
	  
	  $cc2=$cc1-$cc; 
	  
	  $cc3=100*$cc2/$cc;
	  
	  echo number_format($cc3, 2);
	  
	  ?></td>
	  <td align="center"><?php echo $row["eby"]; ?></td>  
	  
	  <td align="center"><?php echo $row["status"]; ?> </td> 
<td align="center"><?php echo $row["remarks"]; ?> </td> 



	  
      </tr>
    <?php $count1++; } ?>	



<?php
	
	
	
	
	
$user=$_SESSION["sess_username"];
$date= date('m/d/Y');
$count1=1;
$sel_query="Select * from medicineedit where status in ('WAITING FOR IT ENTRY','WAITING FOR CEO APPROVAL','WAITING FOR CFO APPROVAL','Waiting For Finance Fowrading')and md='$user'";
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
	  <td align="center">Update</td>
      
      <td align="center"><?php echo $row["cprice"]; ?></td>  
	  <td align="center"><?php echo $row["oprice"]; ?></td>  
	  <td align="center"><?php echo $row["oprice1"]; ?></td> 
<td align="center"><?php echo $row["uprice"]; ?></td>  
<td align="center"><?php
	  $cc=$row['cprice']; 
	  $cc1=$row['uprice']; 
	  
	  $cc2=$cc1-$cc; 
	  
	  $cc3=100*$cc2/$cc;
	  
	  echo number_format($cc3, 2);
	  
	  ?></td>
	  <td align="center"><?php echo $row["uprice1"]; ?></td> 	  
	  
	  
	  
	  
	  
	  <td align="center"><?php
	  $cc=$row['cprice']; 
	  $cc1=$row['uprice1']; 
	  
	  $cc2=$cc1-$cc; 
	  
	  $cc3=100*$cc2/$cc;
	  
	  echo number_format($cc3, 2);
	  
	  ?></td>
	  <td align="center"><?php echo $row["eby"]; ?></td>  
	  
	  <td align="center"><?php echo $row["status"]; ?> </td> 
<td align="center"><?php echo $row["remarks"]; ?> </td> 



	  
      </tr>
    <?php $count1++; } ?>	



<?php
	
	
	
	
	
$user=$_SESSION["sess_username"];
$date= date('m/d/Y');
$count1=1;
$sel_query="Select * from medicineedit where status in ('WAITING FOR IT ENTRY','WAITING FOR CEO APPROVAL','WAITING FOR CFO APPROVAL','WAITING FOR MD APPROVAL')and fby='$user'";
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
	  <td align="center">Update</td>
      
      <td align="center"><?php echo $row["cprice"]; ?></td>  
	  <td align="center"><?php echo $row["oprice"]; ?></td>  
	  <td align="center"><?php echo $row["oprice1"]; ?></td> 
<td align="center"><?php echo $row["uprice"]; ?></td>  
<td align="center"><?php
	  $cc=$row['cprice']; 
	  $cc1=$row['uprice']; 
	  
	  $cc2=$cc1-$cc; 
	  
	  $cc3=100*$cc2/$cc;
	  
	  echo number_format($cc3, 2);
	  
	  ?></td>
	  <td align="center"><?php echo $row["uprice1"]; ?></td> 	  
	  
	  
	  
	  
	  
	  <td align="center"><?php
	  $cc=$row['cprice']; 
	  $cc1=$row['uprice1']; 
	  
	  $cc2=$cc1-$cc; 
	  
	  $cc3=100*$cc2/$cc;
	  
	  echo number_format($cc3, 2);
	  
	  ?></td>
	  <td align="center"><?php echo $row["eby"]; ?></td>  
	  
	  <td align="center"><?php echo $row["status"]; ?> </td> 
<td align="center"><?php echo $row["remarks"]; ?> </td> 



	  
      </tr>
    <?php $count1++; } ?>	
	

</tbody>
</table>

</form>

</body>

</html>

