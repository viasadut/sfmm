<?php 
session_start();
    require('db1.php');
	$role = $_SESSION['sess_userrole'];
	
	$queryc = "SELECT COUNT(utype) FROM user where '$role' in ('billin','bill')"; 
$resultc = mysqli_query($con, $queryc) or die(mysqli_error());
$rowc = mysqli_fetch_array($resultc);
$c1=$rowc['COUNT(utype)'];
	
    if(!isset($_SESSION['sess_username']) || $c1==0){
      header('Location: login2?err=2');
    }
?><?php
$url1=$_SERVER['REQUEST_URI'];
//header("Refresh: 15; URL=$url1");\
$date1='2022-01-01';
$formatted_date=date(strtotime($date1,'Y-m-d'));
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

$pmrn=$_REQUEST['pmrn'];
$eid=$_REQUEST['eid'];
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
   <li><a href='insummary_api1'><span>Home</span></a></li>
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
	  <th width="10%"><strong>Type</strong></th>
      <th width="15%"><strong>Doctor's Name </strong>
      <th width="14%"><strong>Admission Date</strong>   
      <th width="14%"><strong>Room No</strong>
      <th width="14%"><strong>Bed No</strong>
	  <th width="14%"><strong>Phone No</strong>
	  <th width="14%"><strong>Days Staying</strong>
      <th width="14%"><strong>Go</strong>
	  <th width="14%"><strong>Clear Card Status</strong>
	  <th width="14%"><strong>Sticker</strong>
	  
      
	   </tr>
  </thead>
  <tbody>
  
    <?php
$user=$_SESSION["sess_username"];
$date= date('m/d/Y');
$count=1;
$sel_query="Select * from iinves where status IN ('RECEIVED','DONE','SEEN') and api_status=0 and pmrn='$pmrn' and eid='$eid' and type not in('spd1','spd','SPD') order by id asc";

$result = mysqli_query($con,$sel_query);
while($row = mysqli_fetch_assoc($result)) { ?>
    <tr>
      <td align="center"><?php echo $count; ?></td>
	  
	   <?php
$tt1=$row['pmrn'];


?>
      <td align="center"><?php echo $row["pname"]; ?></td>
      <td align="center"><?php echo $row["pmrn"]; ?></td>
	  <td align="center"><a href="chg_type?pmrn=<?php echo $row["pmrn"]; ?>&id=<?php echo $row["id"]; ?>&eid=<?php echo $row["eid"]; ?>&p_type=<?php echo $row["type"]; ?>"><?php echo $row["type"]; ?></td>
      <td align="center"><?php echo $row["adoc"]; ?></td>
      <td align="center"><?php echo $row["infusion"]; ?>  </td>

      <td align="center" style="font:Verdana, Arial, Helvetica, sans-serif large" style="font-weight:bold"><?php echo $row["room"];?>  
	  <td align="center" style="font:Verdana, Arial, Helvetica, sans-serif large" style="font-weight:bold"><?php echo $row["room1"];?>  
	  <td align="center" style="font:Verdana, Arial, Helvetica, sans-serif large" style="font-weight:bold"><?php echo $row["pphone"];?>  
	  <td align="center" style="font:Verdana, Arial, Helvetica, sans-serif large" style="font-weight:bold"><?php $start=$row["aadate"];$date1=date_create("$start");
$date2=date_create("$date");
$diff=date_diff($date1,$date2);
echo $diff->format("%R%a days");?>  </td>
	  <td align="center"><a href="api_inves_manual?pmrn=<?php echo $row["pmrn"]; ?>&eid=<?php echo $row["eid"]; ?>&id=<?php echo $row["id"]; ?>">Manual Push</a></td>
	  

	  
      </tr>
    <?php $count++; } ?>



    <?php
$user=$_SESSION["sess_username"];
$date= date('m/d/Y');
$count=1;
$sel_query="Select * from iinves where rstatus IN ('RECEIVED','DONE','SEEN') and api_status=0 and pmrn='$pmrn' and eid='$eid' and type in('spd1','spd','SPD') order by id asc";

$result = mysqli_query($con,$sel_query);
while($row = mysqli_fetch_assoc($result)) { ?>
    <tr>
      <td align="center"><?php echo $count; ?></td>
	  
	   <?php
$tt1=$row['pmrn'];


?>
      <td align="center"><?php echo $row["pname"]; ?></td>
      <td align="center"><?php echo $row["pmrn"]; ?></td>
	  <td align="center"><a href="chg_type?pmrn=<?php echo $row["pmrn"]; ?>&id=<?php echo $row["id"]; ?>&eid=<?php echo $row["eid"]; ?>&p_type=<?php echo $row["type"]; ?>"><?php echo $row["type"]; ?></td>
      <td align="center"><?php echo $row["infusion"]; ?></td>
      <td align="center"><?php echo $row["aadate"]; ?>  </td>

      <td align="center" style="font:Verdana, Arial, Helvetica, sans-serif large" style="font-weight:bold"><?php echo $row["room"];?>  
	  <td align="center" style="font:Verdana, Arial, Helvetica, sans-serif large" style="font-weight:bold"><?php echo $row["room1"];?>  
	  <td align="center" style="font:Verdana, Arial, Helvetica, sans-serif large" style="font-weight:bold"><?php echo $row["pphone"];?>  
	  <td align="center" style="font:Verdana, Arial, Helvetica, sans-serif large" style="font-weight:bold"><?php $start=$row["aadate"];$date1=date_create("$start");
$date2=date_create("$date");
$diff=date_diff($date1,$date2);
echo $diff->format("%R%a days");?> HHHS </td>
	  <td align="center"><a href="api_inves_spd_manual?pmrn=<?php echo $row["pmrn"]; ?>&eid=<?php echo $row["eid"]; ?>&id=<?php echo $row["id"]; ?>">Manual Push</a></td>
	  

	  
      </tr>
    <?php $count++; } ?>



    <?php
$user=$_SESSION["sess_username"];
$date= date('m/d/Y');
$count=1;
$sel_query="Select * from imedi3 where status1 IN ('implemented','DONE','SEEN') and api_status='0' and pmrn='$pmrn' and eid='$eid' order by id asc";

$result = mysqli_query($con,$sel_query);
while($row = mysqli_fetch_assoc($result)) { ?>
    <tr>
      <td align="center"><?php echo $count; ?></td>
	  
	   <?php
$tt1=$row['pmrn'];


?>
      <td align="center"><?php echo $row["pname"]; ?></td>
      <td align="center"><?php echo $row["pmrn"]; ?></td>
	  <td align="center"><a href="chg_type?pmrn=<?php echo $row["pmrn"]; ?>&id=<?php echo $row["id"]; ?>&eid=<?php echo $row["eid"]; ?>&p_type=<?php echo $row["type"]; ?>"><?php echo $row["type"]; ?></td>
      <td align="center"><?php echo $row["adoc"]; ?></td>
      <td align="center"><?php echo $row["aadate"]; ?>  </td>

      <td align="center" style="font:Verdana, Arial, Helvetica, sans-serif large" style="font-weight:bold"><?php echo $row["infusion"];?>  
	  <td align="center" style="font:Verdana, Arial, Helvetica, sans-serif large" style="font-weight:bold"><?php echo $row["room1"];?>  
	  <td align="center" style="font:Verdana, Arial, Helvetica, sans-serif large" style="font-weight:bold"><?php echo $row["pphone"];?>  
	  <td align="center" style="font:Verdana, Arial, Helvetica, sans-serif large" style="font-weight:bold"><?php $start=$row["aadate"];$date1=date_create("$start");
$date2=date_create("$date");
$diff=date_diff($date1,$date2);
echo $diff->format("%R%a days");?>  </td>
	  <td align="center"><a href="api_medi_manual?pmrn=<?php echo $row["pmrn"]; ?>&eid=<?php echo $row["eid"]; ?>&id=<?php echo $row["id"]; ?>">Manual Push</a></td>
	  

	  
      </tr>
    <?php $count++; } ?>




    <?php
$user=$_SESSION["sess_username"];
$date= date('m/d/Y');
$count=1;
$sel_query="Select * from inhoscharge where api_status='0' and pmrn='$pmrn' and eid='$eid' order by id asc";

$result = mysqli_query($con,$sel_query);
while($row = mysqli_fetch_assoc($result)) { ?>
    <tr>
      <td align="center"><?php echo $count; ?></td>
	  
	   <?php
$tt1=$row['pmrn'];


?>
      <td align="center"><?php echo $row["pname"]; ?></td>
      <td align="center"><?php echo $row["pmrn"]; ?></td>
	  <td align="center"><a href="chg_type?pmrn=<?php echo $row["pmrn"]; ?>&id=<?php echo $row["id"]; ?>&eid=<?php echo $row["eid"]; ?>&p_type=<?php echo $row["type"]; ?>"><?php echo $row["type"]; ?></td>
      <td align="center"><?php echo $row["adoc"]; ?></td>
      <td align="center"><?php echo $row["aadate"]; ?>  </td>

      <td align="center" style="font:Verdana, Arial, Helvetica, sans-serif large" style="font-weight:bold"><?php echo $row["medi"];?>  
	  <td align="center" style="font:Verdana, Arial, Helvetica, sans-serif large" style="font-weight:bold"><?php echo $row["room1"];?>  
	  <td align="center" style="font:Verdana, Arial, Helvetica, sans-serif large" style="font-weight:bold"><?php echo $row["pphone"];?>  
	  <td align="center" style="font:Verdana, Arial, Helvetica, sans-serif large" style="font-weight:bold">
</td>
	  <td align="center"><a href="api_hoscharge_manual?pmrn=<?php echo $row["pmrn"]; ?>&eid=<?php echo $row["eid"]; ?>&id=<?php echo $row["id"]; ?>">Manual Push</a></td>
	  

	  
      </tr>
    <?php $count++; } ?>






    <?php
$user=$_SESSION["sess_username"];
$date= date('m/d/Y');
$count=1;
$sel_query="Select * from icnote where api_status='0' and pmrn='$pmrn' and eid='$eid' and ugroup='Doctor' order by id asc";

$result = mysqli_query($con,$sel_query);
while($row = mysqli_fetch_assoc($result)) { ?>
    <tr>
      <td align="center"><?php echo $count; ?></td>
	  
	   <?php
$tt1=$row['pmrn'];


?>
      <td align="center"><?php echo $row["pname"]; ?></td>
      <td align="center"><?php echo $row["pmrn"]; ?></td>
	  <td align="center"><a href="chg_type?pmrn=<?php echo $row["pmrn"]; ?>&id=<?php echo $row["id"]; ?>&eid=<?php echo $row["eid"]; ?>&p_type=<?php echo $row["type"]; ?>"><?php echo $row["type"]; ?></td>
      <td align="center"><?php echo $row["user"]; ?></td>
      <td align="center"><?php echo $row["aadate"]; ?>  </td>

      <td align="center" style="font:Verdana, Arial, Helvetica, sans-serif large" style="font-weight:bold"><?php echo $row["charge"];?>  
	  <td align="center" style="font:Verdana, Arial, Helvetica, sans-serif large" style="font-weight:bold"><?php echo $row["vtype"];?>  
	  <td align="center" style="font:Verdana, Arial, Helvetica, sans-serif large" style="font-weight:bold"><?php echo $row["pphone"];?>  
	  <td align="center" style="font:Verdana, Arial, Helvetica, sans-serif large" style="font-weight:bold"><?php $start=$row["aadate"];$date1=date_create("$start");
$date2=date_create("$date");
$diff=date_diff($date1,$date2);
echo $diff->format("%R%a days");?>  </td>
	  <td align="center"><a href="api_doccharge_manual?pmrn=<?php echo $row["pmrn"]; ?>&eid=<?php echo $row["eid"]; ?>&id=<?php echo $row["id"]; ?>">Manual Push</a></td>
	  

	  
      </tr>
    <?php $count++; } ?>




    <?php
$user=$_SESSION["sess_username"];
$date= date('Y-m-d');
$count=1;
$sel_query="Select * from othoscharge1 where pmrn= '$pmrn' and ndate='$date' and api_status='0' order by `id` DESC;";

$result = mysqli_query($con,$sel_query);

while($row = mysqli_fetch_assoc($result)) 
{ ?>    <tr>

      <td align="center" colspan="1"><?php echo $count; ?></td>

      <td align="center"colspan="2"><?php echo $row["pmrn"]; ?></td>
	        <td align="center"colspan="10"><?php echo $row["medi"]; ?></td>
				        <td align="center"colspan="3"><?php echo $row["aqty"]; ?></td>
						<td align="center"colspan="1"><?php echo $row["pdos"]; ?></td>
            <td align="center"colspan="1"><?php echo $row["mtime"]; ?></td>
			      
	  <td align="center"><a href="api_ot_manual?pmrn=<?php echo $row["pmrn"]; ?>&eid=<?php echo $row["eid"]; ?>&id=<?php echo $row["id"]; ?>">Manual Push</a></td>
	  

	  
      </tr>
    <?php $count++; } ?>





    <?php
$user=$_SESSION["sess_username"];
$date= date('m/d/Y');
$count=1;
$sel_query="Select * from othoscharge where pmrn= '$pmrn' and date='$date' and api_status='0' order by `id` DESC;";

$result = mysqli_query($con,$sel_query);

while($row = mysqli_fetch_assoc($result)) 
{ ?>    <tr>

      <td align="center" colspan="1"><?php echo $count; ?></td>

      <td align="center"colspan="2"><?php echo $row["pmrn"]; ?></td>
	        <td align="center"colspan="10"><?php echo $row["medi"]; ?></td>
				        <td align="center"colspan="3"><?php echo $row["aqty"]; ?></td>
						<td align="center"colspan="1"><?php echo $row["pdos"]; ?></td>
            <td align="center"colspan="1"><?php echo $row["mtime"]; ?></td>
			      
	  <td align="center"><a href="api_ot_hos_manual?pmrn=<?php echo $row["pmrn"]; ?>&eid=<?php echo $row["eid"]; ?>&id=<?php echo $row["id"]; ?>">Manual Push</a></td>
	  

	  
      </tr>
    <?php $count++; } ?>


    <?php
$user=$_SESSION["sess_username"];
$date= date('Y-m-d');
$count=1;
$sel_query="Select * from otreport where pmrn= '$pmrn' and date1='$date' and api_status='0' order by `id` DESC;";

$result = mysqli_query($con,$sel_query);

while($row = mysqli_fetch_assoc($result)) 
{ ?>    <tr>

      <td align="center" colspan="1"><?php echo $count; ?></td>

      <td align="center"colspan="2"><?php echo $row["pmrn"]; ?></td>
	        <td align="center"colspan="10"><?php echo $row["medi"]; ?></td>
				        <td align="center"colspan="3"><?php echo $row["aqty"]; ?></td>
						<td align="center"colspan="1"><?php echo $row["pdos"]; ?></td>
            <td align="center"colspan="1"><?php echo $row["mtime"]; ?></td>
			      
	  <td align="center"><a href="api_ot_doc_manual?pmrn=<?php echo $row["pmrn"]; ?>&eid=<?php echo $row["eid"]; ?>&id=<?php echo $row["id"]; ?>">Manual Push</a></td>
	  

	  
      </tr>
    <?php $count++; } ?>





    <?php
$user=$_SESSION["sess_username"];
$date= date('Y-m-d');
$count=1;
$sel_query="Select * from prohoscharge where pmrn= '$pmrn' and ieid='$eid' and api_status='0' order by `id` DESC;";

$result = mysqli_query($con,$sel_query);

while($row = mysqli_fetch_assoc($result)) 
{ ?>    <tr>

      <td align="center" colspan="1"><?php echo $count; ?></td>

      <td align="center"colspan="2"><?php echo $row["pmrn"]; ?></td>
	        <td align="center"colspan="10"><?php echo $row["medi"]; ?></td>
				        <td align="center"colspan="5"><?php echo $row["pdos"]; ?></td>
			      
	  <td align="center"><a href="api_opro_manual?pmrn=<?php echo $row["pmrn"]; ?>&eid=<?php echo $row["eid"]; ?>&id=<?php echo $row["id"]; ?>">Manual Push</a></td>
	  

	  
      </tr>
    <?php $count++; } ?>



    <?php
$user=$_SESSION["sess_username"];
$date= date('Y-m-d');
$count=1;
$sel_query="Select * from promediused where pmrn= '$pmrn' and ieid='$eid' and api_status='0' order by `id` DESC;";

$result = mysqli_query($con,$sel_query);

while($row = mysqli_fetch_assoc($result)) 
{ ?>    <tr>

      <td align="center" colspan="1"><?php echo $count; ?></td>

      <td align="center"colspan="2"><?php echo $row["pmrn"]; ?></td>
	        <td align="center"colspan="10"><?php echo $row["medi"].' ('.$row["brand"].')'; ?></td>
			      <td align="center"colspan="5"><?php echo $row["pdos"]; ?></td>
			      
	  <td align="center"><a href="api_opro_medi_manual?pmrn=<?php echo $row["pmrn"]; ?>&eid=<?php echo $row["eid"]; ?>&id=<?php echo $row["id"]; ?>">Manual Push</a></td>
	  

	  
      </tr>
    <?php $count++; } ?>



    <?php
$user=$_SESSION["sess_username"];
$date= date('Y-m-d');
$count=1;
$sel_query="Select * from procedure1 where pmrn= '$pmrn' and ieid='$eid' and api_status='0' order by `id` DESC;";

$result = mysqli_query($con,$sel_query);

while($row = mysqli_fetch_assoc($result)) 
{ ?>    <tr>

      <td align="center" colspan="1"><?php echo $count; ?></td>

      <td align="center"colspan="2"><?php echo $row["pmrn"]; ?></td>
	        <td align="center"colspan="10"><?php echo $row["dname"]; ?></td>
			      <td align="center"colspan="5"><?php echo $row["proname"]; ?></td>
			      
	  <td align="center"><a href="api_opro_doc_manual?pmrn=<?php echo $row["pmrn"]; ?>&eid=<?php echo $row["eid"]; ?>&id=<?php echo $row["id"]; ?>">Manual Push</a></td>
	  

	  
      </tr>
    <?php $count++; } ?>

    

    <?php
$user=$_SESSION["sess_username"];
$date= date('Y-m-d');
$count=1;
$sel_query="Select * from cathhoscharge where pmrn= '$pmrn' and ieid='$eid' order by `id` DESC;";

$result = mysqli_query($con,$sel_query);

while($row = mysqli_fetch_assoc($result)) 
{ ?>    <tr>

      <td align="center" colspan="1"><?php echo $count; ?></td>

      <td align="center"colspan="2"><?php echo $row["pmrn"]; ?></td>
	        <td align="center"colspan="9"><?php echo $row["medi"]; ?></td>
				        
                <td align="center"colspan="3"><?php echo $row["pdos"]; ?></td>
                <td align="center"colspan="2"><?php echo $row["qty"]; ?></td>
                <td align="center"colspan="1"><?php echo $row["remarks"]; ?></td>
                <td align="center"colspan="1"><?php echo $row["ctype"]; ?>**CATH HOS**</td>
				 			      
	  <td align="center"><a href="api_cath_manual?pmrn=<?php echo $row["pmrn"]; ?>&eid=<?php echo $row["eid"]; ?>&id=<?php echo $row["id"]; ?>">Manual Push</a></td>
	  

	  
      </tr>
    <?php $count++; } ?>


    
    <?php
$user=$_SESSION["sess_username"];
$date= date('Y-m-d');
$count=1;
$sel_query="Select * from cathmediused where pmrn= '$pmrn' and ieid='$ieid' and eid='$eid' order by `id` DESC;";

$result = mysqli_query($con,$sel_query);

while($row = mysqli_fetch_assoc($result)) 
{ ?>    <tr>

      <td align="center" colspan="1"><?php echo $count; ?></td>

      <td align="center"colspan="2"><?php echo $row["pmrn"]; ?></td>
	        <td align="center"colspan="10"><?php echo $row["medi"].' ('.$row["brand"].')'; ?></td>
			      <td align="center"colspan="5"><?php echo $row["pdos"]; ?>**CATH MEDI**</td>
				 			      
	  <td align="center"><a href="api_cath_medi_manual?pmrn=<?php echo $row["pmrn"]; ?>&eid=<?php echo $row["eid"]; ?>&id=<?php echo $row["id"]; ?>">Manual Push</a></td>
	  

	  
      </tr>
    <?php $count++; } ?>



    
    <?php
$user=$_SESSION["sess_username"];
$date= date('Y-m-d');
$count=1;
$sel_query="Select * from cath_charge where pmrn= '$pmrn' and eid='$id' and c_status=''order by `id` DESC;";

$result = mysqli_query($con,$sel_query);

while($row = mysqli_fetch_assoc($result)) 
{ ?>    <tr>

      <td align="center" colspan="1"><?php echo $count; ?></td>
      <td align="center"colspan="1"><?php echo $row["pmrn"]; ?></td>
      <td align="center"colspan="4"><?php echo $row["sname"]; ?></td>
	  <td align="center"colspan="1"><?php echo $row["otdate"]; ?></td>  
      
	  <td align="center"colspan="3"><?php echo $row["pname"].' '.$row["others"]; ?></td>
	  <td align="center"colspan="7"><?php echo $row["sreport"]; ?></td>
	  	  <td align="center"colspan="2"><?php echo $row["charge"]; ?>**CATH DOC**</td>
      
	  
				 			      
	  <td align="center"><a href="api_cath_doc_manual?pmrn=<?php echo $row["pmrn"]; ?>&eid=<?php echo $row["eid"]; ?>&id=<?php echo $row["id"]; ?>">Manual Push</a></td>
	  

	  
      </tr>
    <?php $count++; } ?>



    

    <?php
$user=$_SESSION["sess_username"];
$date= date('Y-m-d');
$count=1;
$sel_query="Select * from endohoscharge where pmrn= '$pmrn' and ieid='$eid'order by `id` DESC;";

$result = mysqli_query($con,$sel_query);

while($row = mysqli_fetch_assoc($result)) 
{ ?>    <tr>

      <td align="center" colspan="1"><?php echo $count; ?></td>

      <td align="center"colspan="2"><?php echo $row["pmrn"]; ?></td>
	        <td align="center"colspan="10"><?php echo $row["medi"]; ?></td>
				        <td align="center"colspan="5"><?php echo $row["pdos"]; ?></td>
      
	  
				 			      
	  <td align="center"><a href="api_endo_manual?pmrn=<?php echo $row["pmrn"]; ?>&eid=<?php echo $row["eid"]; ?>&id=<?php echo $row["id"]; ?>">Manual Push</a></td>
	  

	  
      </tr>
    <?php $count++; } ?>



    <?php
$user=$_SESSION["sess_username"];
$date= date('Y-m-d');
$count=1;
$sel_query="Select * from endohoscharge1 where pmrn= '$pmrn' and ieid='$eid'order by `id` DESC;";

$result = mysqli_query($con,$sel_query);

while($row = mysqli_fetch_assoc($result)) 
{ ?>    <tr>

      <td align="center" colspan="1"><?php echo $count; ?></td>

      <td align="center"colspan="2"><?php echo $row["pmrn"]; ?></td>
	        <td align="center"colspan="10"><?php echo $row["medi"]; ?></td>
				        <td align="center"colspan="5"><?php echo $row["pdos"]; ?></td>
			            
	  
				 			      
	  <td align="center"><a href="api_endo_medi_manual?pmrn=<?php echo $row["pmrn"]; ?>&eid=<?php echo $row["eid"]; ?>&id=<?php echo $row["id"]; ?>">Manual Push</a></td>
	  

	  
      </tr>
    <?php $count++; } ?>



    <?php
$user=$_SESSION["sess_username"];
$date= date('Y-m-d');
$count=1;
$sel_query="Select * from endoreport where pmrn= '$pmrn' and ieid='$eid'order by `id` DESC;";

$result = mysqli_query($con,$sel_query);

while($row = mysqli_fetch_assoc($result)) 
{ ?>    <tr>

      <td align="center" colspan="1"><?php echo $count; ?></td>

      <td align="center"colspan="2"><?php echo $row["pmrn"]; ?></td>
	        <td align="center"colspan="10"><?php echo $row["medi"]; ?></td>
				        <td align="center"colspan="5"><?php echo $row["pdos"]; ?></td>
			            
	  
				 			      
	  <td align="center"><a href="api_endo_doc_manual?pmrn=<?php echo $row["pmrn"]; ?>&eid=<?php echo $row["eid"]; ?>&id=<?php echo $row["id"]; ?>">Manual Push</a></td>
	  

	  
      </tr>
    <?php $count++; } ?>




    
    <?php
$user=$_SESSION["sess_username"];
$date= date('Y-m-d');
$count=1;
$sel_query="Select * from prohoscharge_ms where pmrn= '$pmrn' and eid='$eid'order by `id` DESC;";

$result = mysqli_query($con,$sel_query);

while($row = mysqli_fetch_assoc($result)) 
{ ?>    <tr>

      <td align="center" colspan="1"><?php echo $count; ?></td>

      <td align="center"colspan="2"><?php echo $row["pmrn"]; ?></td>
	        <td align="center"colspan="10"><?php echo $row["medi"]; ?></td>
				        <td align="center"colspan="5"><?php echo $row["pdos"]; ?></td>
	  
				 			      
	  <td align="center"><a href="api_ms_manual?pmrn=<?php echo $row["pmrn"]; ?>&eid=<?php echo $row["eid"]; ?>&id=<?php echo $row["id"]; ?>">Manual Push</a></td>
	  

	  
      </tr>
    <?php $count++; } ?>


    <?php
$user=$_SESSION["sess_username"];
$date= date('Y-m-d');
$count=1;
$sel_query="Select * from promediused_ms where pmrn= '$pmrn' and ieid='$eid'order by `id` DESC;";

$result = mysqli_query($con,$sel_query);

while($row = mysqli_fetch_assoc($result)) 
{ ?>    <tr>

      <td align="center" colspan="1"><?php echo $count; ?></td>

      <td align="center"colspan="2"><?php echo $row["pmrn"]; ?></td>
	        <td align="center"colspan="10"><?php echo $row["medi"].' ('.$row["brand"].')'; ?></td>
			      <td align="center"colspan="5"><?php echo $row["pdos"]; ?></td>
	  
				 			      
	  <td align="center"><a href="api_ms_medi_manual?pmrn=<?php echo $row["pmrn"]; ?>&eid=<?php echo $row["eid"]; ?>&id=<?php echo $row["id"]; ?>">Manual Push</a></td>
	  

	  
      </tr>
    <?php $count++; } ?>


    <?php
$user=$_SESSION["sess_username"];
$date= date('Y-m-d');
$count=1;
$sel_query="Select * from m_suite where pmrn= '$pmrn' and ieid='$eid'order by `id` DESC;";

$result = mysqli_query($con,$sel_query);

while($row = mysqli_fetch_assoc($result)) 
{ ?>    <tr>

      <td align="center" colspan="1"><?php echo $count; ?></td>

      <td align="center"colspan="2"><?php echo $row["pmrn"]; ?></td>
	        <td align="center"colspan="10"><?php echo $row["medi"].' ('.$row["brand"].')'; ?></td>
			      <td align="center"colspan="5"><?php echo $row["pdos"]; ?></td>
	  
				 			      
	  <td align="center"><a href="api_ms_doc_manual?pmrn=<?php echo $row["pmrn"]; ?>&eid=<?php echo $row["eid"]; ?>&id=<?php echo $row["id"]; ?>">Manual Push</a></td>
	  

	  
      </tr>
    <?php $count++; } ?>



  </tbody>
</table>
</form>

</body>

</html>
