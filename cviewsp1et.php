<?php 
    session_start();
    $role = $_SESSION['sess_userrole'];
    if(!isset($_SESSION['sess_username']) || $role!="clinicalet"){
      header('Location: login2?err=2');
    }
?>
<?php
$url1=$_SERVER['REQUEST_URI'];
header("Refresh: 30; URL=$url1");

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
//$full = $row39['fullname'];
$date9= date('m/d/Y');

$sel1="Select * from pappnew where adate= '$date9' and `bill`='Billed' and status IN ('HISTORY UPDATED')and dname IN ('DR. ABIRVAB NAHA') ORDER BY vtime asc;";

$re1 = mysqli_query($con,$sel1);

$r1 = mysqli_fetch_assoc($re1);



$sel2="Select * from pappnew where adate= '$date9' and `bill`='Billed' and status IN ('HISTORY UPDATED')and dname IN ('Dr. Farzana Sultana Borna') ORDER BY vtime asc;";

$re2 = mysqli_query($con,$sel2);

$r2 = mysqli_fetch_assoc($re2);



$sel3="Select * from pappnew where adate= '$date9' and `bill`='Billed' and status IN ('HISTORY UPDATED')and dname IN ('Dr. Ho Hon Lian') ORDER BY vtime asc;";

$re3 = mysqli_query($con,$sel3);

$r3 = mysqli_fetch_assoc($re3);




$sel4="Select * from pappnew where adate= '$date9' and `bill`='Billed' and status IN ('HISTORY UPDATED')and dname IN ('Dr.Isat-E-Rabban') ORDER BY vtime asc;";

$re4 = mysqli_query($con,$sel4);

$r4 = mysqli_fetch_assoc($re4);


$sel5="Select * from pappnew where adate= '$date9' and `bill`='Billed' and status IN ('HISTORY UPDATED')and dname IN ('Ms. Maisha Musharrat Nazia') ORDER BY vtime asc;";

$re5 = mysqli_query($con,$sel5);

$r5 = mysqli_fetch_assoc($re5);


$sel6="Select * from pappnew where adate= '$date9' and `bill`='Billed' and status IN ('HISTORY UPDATED')and dname IN ('Physiotherapy') ORDER BY vtime asc;";

$re6 = mysqli_query($con,$sel6);

$r6 = mysqli_fetch_assoc($re6);



$sel7="Select * from pappnew where adate= '$date9' and `bill`='Billed' and status IN ('HISTORY UPDATED')and dname IN ('Dr. A.K.M. AKRAMUZZAMAN') ORDER BY vtime asc;";

$re7 = mysqli_query($con,$sel7);

$r7 = mysqli_fetch_assoc($re7);


$sel8="Select * from pappnew where adate= '$date9' and `bill`='Billed' and status IN ('HISTORY UPDATED')and dname IN ('Prof. Dr. Pran Gopal Datta') ORDER BY vtime asc;";

$re8 = mysqli_query($con,$sel8);

$r8 = mysqli_fetch_assoc($re8);


$sel9="Select * from pappnew where adate= '$date9' and `bill`='Billed' and status IN ('HISTORY UPDATED')and dname IN ('DR.SUVOSHREE DAS') ORDER BY vtime asc;";

$re9 = mysqli_query($con,$sel9);

$r9 = mysqli_fetch_assoc($re9);




$sel9z="Select * from pappnew where adate= '$date9' and `bill`='Billed' and status IN ('HISTORY UPDATED')and dname IN ('Dr. Lt. Col. Md. Zakir Hossain (Retd)') ORDER BY vtime asc;";

$re9z = mysqli_query($con,$sel9z);



$r9z = mysqli_fetch_assoc($re9z);




$sel9z1="Select * from pappnew where adate= '$date9' and `bill`='Billed' and status IN ('HISTORY UPDATED')and dname IN ('Prof. Dr. Nafees Uddin Chowdhury') ORDER BY vtime asc;";

$re9z1 = mysqli_query($con,$sel9z1);

$r9z1 = mysqli_fetch_assoc($re9z1);







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
         <li class='has-sub'><a href='#cggttt'><span>Set Doctor's Appointment</span></a>
            
         </li>
         <li class='has-sub'><a href='#ami'><span>Set Restrictions on Appointment Time</span></a>
            
         </li>
		 <li class='has-sub'><a href='cview'><span>List of Unpaid Appointment</span></a>
            
         </li>
		 		 <li class='has-sub'><a href='#cviewsp11'><span>Doctor's Available Slot</span></a>
            
         </li>
      </ul>
	  
   </li>

    	    <li class='last'><a href='#gg1new'><span>Set Patient's Appointment</span></a></li>
      <li class='last'><a href='#view4'><span>Search previous patients</span></a></li>
	  
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
	  <th width="10%"><strong>Age</strong></th>
	  <th width="10%"><strong>Gender</strong></th>
      <th width="15%"><strong>Appointment Time </strong>
      <th width="14%"><strong>Date</strong> 
      <th width="14%"><strong>Reffered From</strong>
      <th width="14%"><strong>Doctor Name</strong>  
      <th width="14%"><strong>Status</strong>
	  <th width="14%"><strong>Covid</strong>
	        <th width="14%"><strong>Update</strong>
	  



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

$sel_query="Select * from pappnew where adate= '$date' and bill='Billed' and status='NOT SEEN' and dname IN ('DR. ABIRVAB NAHA','Dr. Farzana Sultana Borna','Dr. Ho Hon Lian','Dr.Isat-E-Rabban','Ms. Maisha Musharrat Nazia','Ms. Shanti Bormon','Md. Shahid Khan','Mr. K. Utshab Zaman','Physiotherapy','Dr. A.K.M. AKRAMUZZAMAN','Prof. Dr. Pran Gopal Datta','DR.SUVOSHREE DAS','Dr. Lt. Col. Md. Zakir Hossain (Retd)','Prof. Dr. Nafees Uddin Chowdhury') ORDER BY dname asc;";

$result = mysqli_query($con,$sel_query);
//echo   $bt;
echo "Today's Unseen Patients";

while($row = mysqli_fetch_assoc($result)) { ?>
    <tr>
      <td align="center"><?php echo $count; ?></td>
      <td align="center"><?php echo $row["pname"]; ?></td>
      <td align="center"><?php echo $row["pmrn"]; ?>
	  
	  <td align="center"><?php echo $row["page"]; ?>
	  <td align="center"><?php echo $row["psex"]; ?>
      <td align="center"><?php echo $row["aslot"]; ?>
      <td align="center"><?php echo $row["adate"]; ?>  
	  <td align="Left"><?php echo $row["dreffer"]; ?>  
	  	  <td align="Left"><?php echo $row["dname"]; ?> 
		  
		  	   <?php
$tt1=$row["pmrn"];
$date455=date('Y-m-d');


$queryc = "SELECT * FROM covidopd where pmrn= '$tt1' order by id DESC limit 1"; 
	 
$resultc = mysqli_query($con, $queryc) or die(mysqli_error());

// Print out result
$rowc = mysqli_fetch_array($resultc);

$cr=$rowc['tresult'];


$tt=$rowc['tresult'];
$dcon=$rowc["dconfirm"];
$ss1=$rowc["ssent"];
$ss=date('m/d/Y', strtotime($rowc["ssent"]));



$date45=date('m/d/Y',strtotime($date455));

$date22=date_create("$date45");
$date21=date_create("$ss");
$diff44=date_diff($date21,$date22);

$diff47=$diff44->format("%r%a");


//$start=date('Y-m-d', strtotime($_REQUEST["stdate"]));

$queryt= "SELECT COUNT(pmrn) FROM covidopd where pmrn='$tt1'"; 
	 
$resultt = mysqli_query($con, $queryt) or die(mysqli_error());
$rowt = mysqli_fetch_assoc($resultt);
$co=$rowt['COUNT(pmrn)'];







?>
		  
		  
      <td align="center" style="font:Verdana, Arial, Helvetica, sans-serif large" style="font-weight:bold"><?php echo $row["status"];?> </td> 
<td align="center"><a target='_blank' href="pcovidresult?pmrn=<?php echo "$tt1"; ?>"><?php if($tt=='P' and $dcon=='confirmed' and $diff47<=2){echo "<span style='color:red;text-align:center;'><b>POSITIVE"; }else if($tt=='N' and $dcon=='confirmed'and $diff47<=2){echo "<span style='color:green;text-align:center;'><b>NEGATIVE"; }else if($co==0){echo "<span style='color:black;text-align:center;'><b>Test Not Done Yet";}else if($diff47>2){echo "<span style='color:darkorange;text-align:center;'><b>Test Not Done Recently";} else {echo "<span style='color:blue;text-align:center;'><b>Result Pending";} ?></a>  </td>
	       <td align="center" style="font:Verdana, Arial, Helvetica, sans-serif large" style="font-weight:bold"><a href="newcdetails_et?pmrn=<?php echo $row["pmrn"]; ?>&ID=<?php echo $row["ID"];?>">UPDATE</a> </td>


	       


	  
      </tr>
    <?php $count++; } ?>
  </tbody>
</table>

<br><br>


<table width="100%" height ="100%" border="1" align="center" bgcolor="#FFFF99" style="border-collapse:collapse;">

<tr><td colspan='20'><?php echo 'Todays Seen Patients;'?></td></tr>
    
    <tr>
      <th width="4%"><strong>S.No</strong></th>
      <th width="17%"><strong>Patient's Name</strong></th>
      <th width="10%"><strong>MRN</strong></th>
	  <th width="10%"><strong>Age</strong></th>
	  <th width="10%"><strong>Gender</strong></th>
      <th width="15%"><strong>Appointment Time </strong>
      <th width="14%"><strong>Date</strong> 
      <th width="14%"><strong>Reffered From</strong>
      <th width="14%"><strong>Doctor Name</strong>  
	  <th width="14%"><strong>Update Time</strong>  
	  <th width="14%"><strong>Seen Time</strong>
      <th width="14%"><strong>Status</strong>

	  



	   </tr>
  </thead>
  <tbody>
  
  
  
  
    <?php

	
	if($r1>0){
echo '<tr> <td colspan="20" bgcolor="lightblue"style="font:Verdana, Arial, Helvetica sans-serif large" style="font-weight:bold;color:red;"><b>DR. ABIRVAB NAHA<b> </td> </tr>';
}

	
$user=$_SESSION["sess_username"];
$date= date('m/d/Y');
//$bt=$_REQUEST["bt"];
$count=1;
//echo   $bt;


$sel_query="Select * from pappnew where adate= '$date' and `bill`='Billed' and status IN ('HISTORY UPDATED')and dname IN ('DR. ABIRVAB NAHA') ORDER BY aslot asc;";

$result = mysqli_query($con,$sel_query);



while($row = mysqli_fetch_assoc($result)) { ?>
    <tr>
      <td align="center"><?php echo $count; ?></td>
      <td align="center"><?php echo $row["pname"]; ?></td>
      <td align="center"><?php echo $row["pmrn"]; ?>
	  <td align="center"><?php echo $row["page"]; ?>
	  <td align="center"><?php echo $row["psex"]; ?>
      <td align="center"><?php echo $row["aslot"]; ?>
      <td align="center"><?php echo $row["adate"]; ?>  
	  <td align="Left"><?php echo $row["dreffer"]; ?>  
	  	  <td align="Left"><?php echo $row["dname"]; ?> 
		  <td align="Left"><?php echo $row["vtime"]; ?> 
      <td align="center" style="font:Verdana, Arial, Helvetica, sans-serif large" style="font-weight:bold"><?php echo $row["stime"];?> </td>
	  <td align="center" style="font:Verdana, Arial, Helvetica, sans-serif large" style="font-weight:bold"><?php echo $row["status"];?> </td> 
	   

  

	       


	  
      </tr>
    <?php $count++; } ?>

	
	
	
	    <?php


			if($r2>0){
echo '<tr> <td colspan="20" bgcolor="lightblue"style="font:Verdana, Arial, Helvetica sans-serif large" style="font-weight:bold;color:red;"><b>Dr. Farzana Sultana Borna<b> </td> </tr>';
}

		$user=$_SESSION["sess_username"];
$date= date('m/d/Y');
//$bt=$_REQUEST["bt"];
$count=1;
//echo   $bt;


$sel_query="Select * from pappnew where adate= '$date' and `bill`='Billed' and status IN ('HISTORY UPDATED')and dname IN ('Dr. Farzana Sultana Borna') ORDER BY aslot asc;";

$result = mysqli_query($con,$sel_query);





while($row = mysqli_fetch_assoc($result)) { ?>
    <tr>
      <td align="center"><?php echo $count; ?></td>
      <td align="center"><?php echo $row["pname"]; ?></td>
      <td align="center"><?php echo $row["pmrn"]; ?>
	  <td align="center"><?php echo $row["page"]; ?>
	  <td align="center"><?php echo $row["psex"]; ?>
      <td align="center"><?php echo $row["aslot"]; ?>
      <td align="center"><?php echo $row["adate"]; ?>  
	  <td align="Left"><?php echo $row["dreffer"]; ?>  
	  	  <td align="Left"><?php echo $row["dname"]; ?> 
		  <td align="Left"><?php echo $row["vtime"]; ?> 
      <td align="center" style="font:Verdana, Arial, Helvetica, sans-serif large" style="font-weight:bold"><?php echo $row["stime"];?> </td>
	  <td align="center" style="font:Verdana, Arial, Helvetica, sans-serif large" style="font-weight:bold"><?php echo $row["status"];?> </td> 
	   

  

	       


	  
      </tr>
    <?php $count++; } ?>
	
	
	
		
	    <?php

		
		if($r3>0){
echo '<tr> <td colspan="20" bgcolor="lightblue"style="font:Verdana, Arial, Helvetica sans-serif large" style="font-weight:bold;color:red;"><b>Dr. Ho Hon Lian<b> </td> </tr>';
}

		
$user=$_SESSION["sess_username"];
$date= date('m/d/Y');
//$bt=$_REQUEST["bt"];
$count=1;
//echo   $bt;


$sel_query="Select * from pappnew where adate= '$date' and `bill`='Billed' and status IN ('HISTORY UPDATED')and dname IN ('Dr. Ho Hon Lian') ORDER BY aslot asc;";

$result = mysqli_query($con,$sel_query);




while($row = mysqli_fetch_assoc($result)) { ?>
    <tr>
      <td align="center"><?php echo $count; ?></td>
      <td align="center"><?php echo $row["pname"]; ?></td>
      <td align="center"><?php echo $row["pmrn"]; ?>
	  <td align="center"><?php echo $row["page"]; ?>
	  <td align="center"><?php echo $row["psex"]; ?>
      <td align="center"><?php echo $row["aslot"]; ?>
      <td align="center"><?php echo $row["adate"]; ?>  
	  <td align="Left"><?php echo $row["dreffer"]; ?>  
	  	  <td align="Left"><?php echo $row["dname"]; ?> 
		  <td align="Left"><?php echo $row["vtime"]; ?> 
      <td align="center" style="font:Verdana, Arial, Helvetica, sans-serif large" style="font-weight:bold"><?php echo $row["stime"];?> </td>
	  <td align="center" style="font:Verdana, Arial, Helvetica, sans-serif large" style="font-weight:bold"><?php echo $row["status"];?> </td> 
	   

  

	       


	  
      </tr>
    <?php $count++; } ?>
	
	
	
		
	    <?php
		
			if($r4>0){
echo '<tr> <td colspan="20" bgcolor="lightblue"style="font:Verdana, Arial, Helvetica sans-serif large" style="font-weight:bold;color:red;"><b>Dr.Isat-E-Rabban<b> </td> </tr>';
}


$user=$_SESSION["sess_username"];
$date= date('m/d/Y');
//$bt=$_REQUEST["bt"];
$count=1;
//echo   $bt;


$sel_query="Select * from pappnew where adate= '$date' and `bill`='Billed' and status IN ('HISTORY UPDATED')and dname IN ('Dr.Isat-E-Rabban') ORDER BY aslot asc;";

$result = mysqli_query($con,$sel_query);




while($row = mysqli_fetch_assoc($result)) { ?>
    <tr>
      <td align="center"><?php echo $count; ?></td>
      <td align="center"><?php echo $row["pname"]; ?></td>
      <td align="center"><?php echo $row["pmrn"]; ?>
	  <td align="center"><?php echo $row["page"]; ?>
	  <td align="center"><?php echo $row["psex"]; ?>
      <td align="center"><?php echo $row["aslot"]; ?>
      <td align="center"><?php echo $row["adate"]; ?>  
	  <td align="Left"><?php echo $row["dreffer"]; ?>  
	  	  <td align="Left"><?php echo $row["dname"]; ?> 
		  <td align="Left"><?php echo $row["vtime"]; ?> 
      <td align="center" style="font:Verdana, Arial, Helvetica, sans-serif large" style="font-weight:bold"><?php echo $row["stime"];?> </td>
	  <td align="center" style="font:Verdana, Arial, Helvetica, sans-serif large" style="font-weight:bold"><?php echo $row["status"];?> </td> 
	   

  

	       


	  
      </tr>
    <?php $count++; } ?>
	
	
	
	
		
	    <?php
		
		
			if($r5>0){
echo '<tr> <td colspan="20" bgcolor="lightblue"style="font:Verdana, Arial, Helvetica sans-serif large" style="font-weight:bold;color:red;"><b>Ms. Maisha Musharrat Nazia<b> </td> </tr>';
}


$user=$_SESSION["sess_username"];
$date= date('m/d/Y');
//$bt=$_REQUEST["bt"];
$count=1;
//echo   $bt;


$sel_query="Select * from pappnew where adate= '$date' and `bill`='Billed' and status IN ('HISTORY UPDATED')and dname IN ('Ms. Maisha Musharrat Nazia') ORDER BY aslot asc;";

$result = mysqli_query($con,$sel_query);



while($row = mysqli_fetch_assoc($result)) { ?>
    <tr>
      <td align="center"><?php echo $count; ?></td>
      <td align="center"><?php echo $row["pname"]; ?></td>
      <td align="center"><?php echo $row["pmrn"]; ?>
	  <td align="center"><?php echo $row["page"]; ?>
	  <td align="center"><?php echo $row["psex"]; ?>
      <td align="center"><?php echo $row["aslot"]; ?>
      <td align="center"><?php echo $row["adate"]; ?>  
	  <td align="Left"><?php echo $row["dreffer"]; ?>  
	  	  <td align="Left"><?php echo $row["dname"]; ?> 
		  <td align="Left"><?php echo $row["vtime"]; ?> 
      <td align="center" style="font:Verdana, Arial, Helvetica, sans-serif large" style="font-weight:bold"><?php echo $row["stime"];?> </td>
	  <td align="center" style="font:Verdana, Arial, Helvetica, sans-serif large" style="font-weight:bold"><?php echo $row["status"];?> </td> 
	   

  

	       


	  
      </tr>
    <?php $count++; } ?>
	
	
	
	
	<?php
		
		
			if($r6>0){
echo '<tr> <td colspan="20" bgcolor="lightblue"style="font:Verdana, Arial, Helvetica sans-serif large" style="font-weight:bold;color:red;"><b>Physiotherapy<b> </td> </tr>';
}


$user=$_SESSION["sess_username"];
$date= date('m/d/Y');
//$bt=$_REQUEST["bt"];
$count=1;
//echo   $bt;


$sel_query="Select * from pappnew where adate= '$date' and `bill`='Billed' and status IN ('HISTORY UPDATED')and dname IN ('Physiotherapy') ORDER BY aslot asc;";

$result = mysqli_query($con,$sel_query);



while($row = mysqli_fetch_assoc($result)) { ?>
    <tr>
      <td align="center"><?php echo $count; ?></td>
      <td align="center"><?php echo $row["pname"]; ?></td>
      <td align="center"><?php echo $row["pmrn"]; ?>
	  <td align="center"><?php echo $row["page"]; ?>
	  <td align="center"><?php echo $row["psex"]; ?>
      <td align="center"><?php echo $row["aslot"]; ?>
      <td align="center"><?php echo $row["adate"]; ?>  
	  <td align="Left"><?php echo $row["dreffer"]; ?>  
	  	  <td align="Left"><?php echo $row["dname"]; ?> 
		  <td align="Left"><?php echo $row["vtime"]; ?> 
      <td align="center" style="font:Verdana, Arial, Helvetica, sans-serif large" style="font-weight:bold"><?php echo $row["stime"];?> </td>
	  <td align="center" style="font:Verdana, Arial, Helvetica, sans-serif large" style="font-weight:bold"><?php echo $row["status"];?> </td> 
	   

  

	       


	  
      </tr>
    <?php $count++; } ?>



	<?php
		
		
			if($r7>0){
echo '<tr> <td colspan="20" bgcolor="lightblue"style="font:Verdana, Arial, Helvetica sans-serif large" style="font-weight:bold;color:red;"><b>Dr. A.K.M. AKRAMUZZAMANDr. Md. Mostofa Kaisar<b> </td> </tr>';
}


$user=$_SESSION["sess_username"];
$date= date('m/d/Y');
//$bt=$_REQUEST["bt"];
$count=1;
//echo   $bt;


$sel_query="Select * from pappnew where adate= '$date' and `bill`='Billed' and status IN ('HISTORY UPDATED')and dname IN ('Dr. A.K.M. AKRAMUZZAMAN') ORDER BY aslot asc;";

$result = mysqli_query($con,$sel_query);



while($row = mysqli_fetch_assoc($result)) { ?>
    <tr>
      <td align="center"><?php echo $count; ?></td>
      <td align="center"><?php echo $row["pname"]; ?></td>
      <td align="center"><?php echo $row["pmrn"]; ?>
	  <td align="center"><?php echo $row["page"]; ?>
	  <td align="center"><?php echo $row["psex"]; ?>
      <td align="center"><?php echo $row["aslot"]; ?>
      <td align="center"><?php echo $row["adate"]; ?>  
	  <td align="Left"><?php echo $row["dreffer"]; ?>  
	  	  <td align="Left"><?php echo $row["dname"]; ?> 
		  <td align="Left"><?php echo $row["vtime"]; ?> 
      <td align="center" style="font:Verdana, Arial, Helvetica, sans-serif large" style="font-weight:bold"><?php echo $row["stime"];?> </td>
	  <td align="center" style="font:Verdana, Arial, Helvetica, sans-serif large" style="font-weight:bold"><?php echo $row["status"];?> </td> 
	   

  

	       


	  
      </tr>
    <?php $count++; } ?>




	<?php
		
		
			if($r8>0){
echo '<tr> <td colspan="20" bgcolor="lightblue"style="font:Verdana, Arial, Helvetica sans-serif large" style="font-weight:bold;color:red;"><b>Prof. Dr. Pran Gopal Datta<b> </td> </tr>';
}


$user=$_SESSION["sess_username"];
$date= date('m/d/Y');
//$bt=$_REQUEST["bt"];
$count=1;
//echo   $bt;


$sel_query="Select * from pappnew where adate= '$date' and `bill`='Billed' and status IN ('HISTORY UPDATED')and dname IN ('Prof. Dr. Pran Gopal Datta') ORDER BY aslot asc;";

$result = mysqli_query($con,$sel_query);



while($row = mysqli_fetch_assoc($result)) { ?>
    <tr>
      <td align="center"><?php echo $count; ?></td>
      <td align="center"><?php echo $row["pname"]; ?></td>
      <td align="center"><?php echo $row["pmrn"]; ?>
	  <td align="center"><?php echo $row["page"]; ?>
	  <td align="center"><?php echo $row["psex"]; ?>
      <td align="center"><?php echo $row["aslot"]; ?>
      <td align="center"><?php echo $row["adate"]; ?>  
	  <td align="Left"><?php echo $row["dreffer"]; ?>  
	  	  <td align="Left"><?php echo $row["dname"]; ?> 
		  <td align="Left"><?php echo $row["vtime"]; ?> 
      <td align="center" style="font:Verdana, Arial, Helvetica, sans-serif large" style="font-weight:bold"><?php echo $row["stime"];?> </td>
	  <td align="center" style="font:Verdana, Arial, Helvetica, sans-serif large" style="font-weight:bold"><?php echo $row["status"];?> </td> 
	   

  

	       


	  
      </tr>
    <?php $count++; } ?>
	
	
	
	
		<?php
		
		
			if($r9>0){
echo '<tr> <td colspan="20" bgcolor="lightblue"style="font:Verdana, Arial, Helvetica sans-serif large" style="font-weight:bold;color:red;"><b>DR.SUVOSHREE DAS<b> </td> </tr>';
}


$user=$_SESSION["sess_username"];
$date= date('m/d/Y');
//$bt=$_REQUEST["bt"];
$count=1;
//echo   $bt;


$sel_query="Select * from pappnew where adate= '$date' and `bill`='Billed' and status IN ('HISTORY UPDATED')and dname IN ('DR.SUVOSHREE DAS') ORDER BY aslot asc;";

$result = mysqli_query($con,$sel_query);



while($row = mysqli_fetch_assoc($result)) { ?>
    <tr>
      <td align="center"><?php echo $count; ?></td>
      <td align="center"><?php echo $row["pname"]; ?></td>
      <td align="center"><?php echo $row["pmrn"]; ?>
	  <td align="center"><?php echo $row["page"]; ?>
	  <td align="center"><?php echo $row["psex"]; ?>
      <td align="center"><?php echo $row["aslot"]; ?>
      <td align="center"><?php echo $row["adate"]; ?>  
	  <td align="Left"><?php echo $row["dreffer"]; ?>  
	  	  <td align="Left"><?php echo $row["dname"]; ?> 
		  <td align="Left"><?php echo $row["vtime"]; ?> 
      <td align="center" style="font:Verdana, Arial, Helvetica, sans-serif large" style="font-weight:bold"><?php echo $row["stime"];?> </td>
	  <td align="center" style="font:Verdana, Arial, Helvetica, sans-serif large" style="font-weight:bold"><?php echo $row["status"];?> </td> 
	   

  

	       


	  
      </tr>
    <?php $count++; } ?>




		<?php
		
		
			if($r9z>0){
echo '<tr> <td colspan="20" bgcolor="lightblue"style="font:Verdana, Arial, Helvetica sans-serif large" style="font-weight:bold;color:red;"><b>Dr. Lt. Col. Md. Zakir Hossain (Retd)<b> </td> </tr>';
}


$user=$_SESSION["sess_username"];
$date= date('m/d/Y');
//$bt=$_REQUEST["bt"];
$count=1;
//echo   $bt;


$sel_query="Select * from pappnew where adate= '$date' and `bill`='Billed' and status IN ('HISTORY UPDATED')and dname IN ('Dr. Lt. Col. Md. Zakir Hossain (Retd)') ORDER BY aslot asc;";

$result = mysqli_query($con,$sel_query);



while($row = mysqli_fetch_assoc($result)) { ?>
    <tr>
      <td align="center"><?php echo $count; ?></td>
      <td align="center"><?php echo $row["pname"]; ?></td>
      <td align="center"><?php echo $row["pmrn"]; ?>
	  <td align="center"><?php echo $row["page"]; ?>
	  <td align="center"><?php echo $row["psex"]; ?>
      <td align="center"><?php echo $row["aslot"]; ?>
      <td align="center"><?php echo $row["adate"]; ?>  
	  <td align="Left"><?php echo $row["dreffer"]; ?>  
	  	  <td align="Left"><?php echo $row["dname"]; ?> 
		  <td align="Left"><?php echo $row["vtime"]; ?> 
      <td align="center" style="font:Verdana, Arial, Helvetica, sans-serif large" style="font-weight:bold"><?php echo $row["stime"];?> </td>
	  <td align="center" style="font:Verdana, Arial, Helvetica, sans-serif large" style="font-weight:bold"><?php echo $row["status"];?> </td> 
	   

  

	       


	  
      </tr>
    <?php $count++; } ?>
	
	
	
	
		
<?php
		
		
			if($r9z1>0){
echo '<tr> <td colspan="20" bgcolor="lightblue"style="font:Verdana, Arial, Helvetica sans-serif large" style="font-weight:bold;color:red;"><b>Prof. Dr. Nafees Uddin Chowdhury<b> </td> </tr>';
}


$user=$_SESSION["sess_username"];
$date= date('m/d/Y');
//$bt=$_REQUEST["bt"];
$count=1;
//echo   $bt;


$sel_query="Select * from pappnew where adate= '$date' and `bill`='Billed' and status IN ('HISTORY UPDATED')and dname IN ('Prof. Dr. Nafees Uddin Chowdhury') ORDER BY aslot asc;";

$result = mysqli_query($con,$sel_query);



while($row = mysqli_fetch_assoc($result)) { ?>
    <tr>
      <td align="center"><?php echo $count; ?></td>
      <td align="center"><?php echo $row["pname"]; ?></td>
      <td align="center"><?php echo $row["pmrn"]; ?>
	  <td align="center"><?php echo $row["page"]; ?>
	  <td align="center"><?php echo $row["psex"]; ?>
      <td align="center"><?php echo $row["aslot"]; ?>
      <td align="center"><?php echo $row["adate"]; ?>  
	  <td align="Left"><?php echo $row["dreffer"]; ?>  
	  	  <td align="Left"><?php echo $row["dname"]; ?> 
		  <td align="Left"><?php echo $row["vtime"]; ?> 
      <td align="center" style="font:Verdana, Arial, Helvetica, sans-serif large" style="font-weight:bold"><?php echo $row["stime"];?> </td>
	  <td align="center" style="font:Verdana, Arial, Helvetica, sans-serif large" style="font-weight:bold"><?php echo $row["status"];?> </td> 
	   

  

	       


	  
      </tr>
    <?php $count++; } ?>	
	
		
	    
  </tbody>
</table>
</form>


</body>

</html>
