<?php 
   session_start();
    require('db1.php');
	$role = $_SESSION['sess_userrole'];
	
	$queryc = "SELECT COUNT(utype) FROM user where '$role' in ('adminmng','staff')"; 
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
   <li><a href='homemng'><span>Home</span></a></li>
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
      <th width="10%"><strong>EID</strong></th>
	  <th width="10%"><strong>Category</strong></th>
      <th width="15%"><strong>Appointment Time </strong>
      <th width="14%"><strong>Date</strong> 
      <th width="14%"><strong>Reffered From</strong>
      <th width="14%"><strong>Doctor Name</strong>  
	  <th width="14%"><strong>Seen Time</strong>
      <th width="14%"><strong>Status</strong>
	  
	  <th width="14%"><strong>A/E</strong>

	  



	   </tr>
  </thead>
  <tbody>
  
    <?php

$user=$_SESSION["sess_username"];
$date= date('m/d/Y');
//$bt=$_REQUEST["bt"];
$count=1;
//echo   $bt;
echo "Today's Unseen Patients";

$sel_query="Select * from pappnew where adate= '$date' and `bill`='Billed' and status IN('NOT SEEN','HISTORY UPDATED') ORDER BY dname asc;";

$result = mysqli_query($con,$sel_query);

while($row = mysqli_fetch_assoc($result)) { ?>
    <tr>
      <td align="center"><?php echo $count; ?></td>
      <td align="center" style="text-transform:uppercase"><?php echo $row["pname"]; ?></td>
      <?php
	  $tr=$row['ptype'];
	  $pmr=$row['pmrn'];
	  
    $query9 = "SELECT MAX(eid) FROM pappnew where pmrn= '$pmr'"; 
	 
    $result9 = mysqli_query($con, $query9) or die(mysqli_error());
    
    // Print out result
    $row9 = mysqli_fetch_array($result9);

    //$pmrn_e=$pmr.'-'.$row9['MAX(eid)'];
    $pmrn_e=$row9['MAX(eid)'];
	  $url_d = "deathstatdetailsmng?pmrn=$pmr";?>
	  
      <td align="center"><?php if($row['ptype']=='Staff' || $row['ptype']=='Staff Spouse' || $row['ptype']=='Staff Children' || $row['ptype']=='Consultant')
	  {echo "<a target='_blank' href='$url_d'>".$pmr."";} 
  else {
	  
	  echo $pmr;
  }
  
  ?>
	  
    <td align="center"><?php if($pmrn_e>0){echo $pmrn_e;} else {echo "New";} ?>
	  <?php
	  $tr=$row['ptype'];
	  $pmr=$row['pmrn'];
	  
	  $url_d = "deathstatdetailsmng?pmrn=$pmr";
	  if($row['ptype']=='Staff' || $row['ptype']=='Staff Spouse' || $row['ptype']=='Staff Children' || $row['ptype']=='Consultant')
	{ 
echo "<td align='center' style='background-color:lightblue;'><a target='_blank' href='$url_d'>".$tr."</a>


</td>";
	}
	
	else if($row['ptype']=='General') 
	{ 
echo "<td align='center' style='background-color:lightgreen;'>".$tr."</td>";
	}
	
	else if($row['ptype']=='VIP') 
	{ 
echo "<td align='center' style='background-color:red;'>".$tr."</td>";
	}
	
	
	else if($row['ptype']=='Corporate') 
	{ 
echo "<td align='center' style='background-color:lightyellow;'>".$tr."</td>";
	}
	
	else 
	{ 
echo "<td align='center'>".$tr."</td>";
	}
	  ?>
	  
	  
      <td align="center"><?php echo $row["aslot"]; ?>
      <td align="center"><?php echo $row["adate"]; ?>  
	  <td align="Left"><?php echo $row["dreffer"]; ?>  
	  	  <td align="Left"><?php echo $row["dname"]; ?> 
		  
		  
		   <?php
$tt1=$row["pmrn"];
$date455=date('Y-m-d');


/*$queryc = "SELECT * FROM covidopd where pmrn= '$tt1' order by id DESC limit 1"; 
	 
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
*/
$e_date=date('Y-m-d');
$query_e = "SELECT * FROM emergency where pmrn= '$tt1' and adate2='$e_date'"; 
	 
$result_e = mysqli_query($con, $query_e) or die(mysqli_error());

// Print out result
$row_e = mysqli_fetch_array($result_e);
$res90=mysqli_num_rows($result_e);

$e_pmrn=$row_e['pmrn'];
$e_id=$row_e['eid'];

$url_emer = "edocviewmng_indu?pmrn=$pmr&eid=$e_id";



?>
		  
      <td align="center" style="font:Verdana, Arial, Helvetica, sans-serif large" style="font-weight:bold"><?php echo $row["stime"];?> </td>
	  <td align="center" style="font:Verdana, Arial, Helvetica, sans-serif large" style="font-weight:bold"><?php echo $row["status"];?> </td> 
	   

  <td align="center"><b><?php if($res90==0 and $row['ptype']=='Staff' || $row['ptype']=='Staff Spouse' || $row['ptype']=='Staff Children' || $row['ptype']=='Consultant'){echo "NO A&E Record";} else if($res90>0){echo "<a target='_blank'href='$url_emer'>From A&E</a>";} ?></td>

	       


	  
      </tr>
    <?php $count++; } ?>

  </tbody>
</table>								
		

<br><br>


<table width="100%" height ="100%" border="1" align="center" bgcolor="#FFFF99" style="border-collapse:collapse;">


    
    <tr>
      <th width="4%"><strong>S.No</strong></th>
      <th width="17%"><strong>Patient's Name</strong></th>
      <th width="10%"><strong>MRN</strong></th>
      <th width="10%"><strong>EID</strong></th>
	  <th width="10%"><strong>Category</strong></th>
      <th width="10%"><strong>Appointment Time </strong>
      <th width="10%"><strong>Diagnosis</strong> 
      <th width="10%"><strong>Reffered From</strong>
      <th width="10%"><strong>Doctor Name</strong>  
	  <th width="10%"><strong>App Time</strong>
	  <th width="10%"><strong>Bill Time</strong>
	  <th width="10%"><strong>Vitals Time</strong>
	  <th width="10%"><strong>Seen Time</strong>
      <th width="10%"><strong>Status</strong>
	  <th width="10%"><strong>Details</strong>
	  
	  

	  



	   </tr>
  </thead>
  <tbody>
  
    <?php

$user=$_SESSION["sess_username"];
$date= date('m/d/Y');
//$bt=$_REQUEST["bt"];
$count=1;
//echo   $bt;
echo "Today's Seen Patients";

$sel_query="Select * from pappnew where adate= '$date' and `bill`='Billed' and status ='SEEN' ORDER BY dname asc;";

$result = mysqli_query($con,$sel_query);

while($row = mysqli_fetch_assoc($result)) { ?>
    <tr>
      <td align="center"><?php echo $count; ?></td>
      <td align="center" style="text-transform:uppercase"><?php echo $row["pname"]; ?></td>
	  
	  <?php
	  $tr=$row['ptype'];
	  $pmr=$row['pmrn'];
	  $eid3=$row['eid'];
	  
	  
    $query9e = "SELECT * FROM pappnew where pmrn= '$pmr' and status='SEEN' order by ID desc limit 1,1"; 
	 
    $result9e = mysqli_query($con, $query9e) or die(mysqli_error());
    
    // Print out result
    $row9e = mysqli_fetch_array($result9e);

    //$pmrn_ee=$pmr.'-'.$row9e['eid'];
    $pmrn_ee=$row9e['eid'];
    //$pmrn_ee1=$pmr.'- 0';


	  $url_d = "deathstatdetailsmng?pmrn=$pmr";?>
	  
      <td align="center"><?php if($row['ptype']=='Staff' || $row['ptype']=='Staff Spouse' || $row['ptype']=='Staff Children' || $row['ptype']=='Consultant')
	   {echo "<a target='_blank' href='$url_d'>".$row['pmrn']."";} 
     else {
       
       echo $row['pmrn'];
     }
  
  ?>
	  <td align="center"><?php if($row9e['eid']==''){echo "New";} else {echo $pmrn_ee;} ?>
	  <?php
	  if($row['ptype']=='Staff' || $row['ptype']=='Staff Spouse' || $row['ptype']=='Staff Children' || $row['ptype']=='Consultant')
	{ 
echo "<td align='center' style='background-color:lightblue;'><a target='_blank' href='$url_d'>".$tr."</a>


</td>";
	}
	
	
	else if($row['ptype']=='General') 
	{ 
echo "<td align='center' style='background-color:lightgreen;'>".$tr."</td>";
	}
	
	else if($row['ptype']=='VIP') 
	{ 
echo "<td align='center' style='background-color:red;'>".$tr."</td>";
	}
	
	
	else if($row['ptype']=='Corporate') 
	{ 
echo "<td align='center' style='background-color:lightyellow;'>".$tr."</td>";
	}
	
	else
	{ 
echo "<td align='center'>".$tr."</td>";
	}
	  ?>

<?php
	//$pmr=$row['pmrn'];
	
	$e_date=date('Y-m-d');
$query_e = "SELECT * FROM emergency where pmrn= '$pmr' and adate2='$e_date'"; 
	 
$result_e = mysqli_query($con, $query_e) or die(mysqli_error());

// Print out result
$row_e = mysqli_fetch_array($result_e);
$res90=mysqli_num_rows($result_e);

$e_pmrn=$row_e['pmrn'];
$e_id=$row_e['eid'];

$url_emer = "edocviewmng_indu?pmrn=$pmr&eid=$e_id";





$query434 = "SELECT * FROM presnew where pmrn='$pmr' and eid='$eid3';" ;
$result434 = mysqli_query($con, $query434) or die(mysqli_error());
$row434 = mysqli_fetch_assoc($result434);
$n_did=$row434['did'];
$dia=substr($row434['diagnosis'], 0, 15); 

$query435 = "SELECT * FROM user where uname='$n_did';" ;
$result435 = mysqli_query($con, $query435) or die(mysqli_error());
$row435 = mysqli_fetch_assoc($result435);
$bb=$row435['fullname'];

	?>
      <td align="center"><?php echo $row["aslot"]; ?>
      <td align="Left"><?php echo $dia; ?>  </td>
	  
	  
	  
	  
	  <td align="Left"><?php echo $row["dreffer"]; ?>  </td>
	  	  <td align="Left"><?php if($row434['dname']!='MO(General OPD)'){echo $row434["dname"];} else {echo $bb.' -'.$row434["dname"];}?></td>
		  
	
		  
		  
       <td align="center"><?php echo $row["aatime"]; ?> </td>
	  <td align="center"><?php echo $row["billtime"]; ?>  </td>
	  <td align="center"><?php echo $row["vtime"]; ?>  </td>
	  <td align="center"><?php echo $row["stime"]; ?>  </td>
	  <td align="center" style="font:Verdana, Arial, Helvetica, sans-serif large" style="font-weight:bold"><?php echo $row["status"];?> </td> 
	  	  <td align="center"><a target='_blank' href="prescription/prescription/pdf_p_12?pmrn=<?php echo $row['pmrn']; ?>&eid=<?php echo $row["eid"]?>&date=<?php echo $row["adate"]?>&dname=<?php echo $row["dname"]?>"><b>Details<b></a></td>	  
	   

  <?php /*if($res90==0 and $row['ptype']=='Staff' || $row['ptype']=='Staff Spouse' || $row['ptype']=='Staff Children' || $row['ptype']=='Consultant'){echo "NO A&E Record";} else if($res90>0){echo "<a target='_blank'href='$url_emer'>From A&E</a>";} */?>



	       


	  
      </tr>
    <?php $count++; } ?>

  </tbody>
</table>
</form>


</body>

</html>

