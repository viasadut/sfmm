<?php 
    session_start();
    $role = $_SESSION['sess_userrole'];
    if(!isset($_SESSION['sess_username']) || $role!="diet"){
      header('Location: login2?err=2');
    }
?>
<?php
$url1=$_SERVER['REQUEST_URI'];
//header("Refresh: 60; URL=$url1");
$dd=date('Y-m-d');
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
   
      <li class='active has-sub'><a href='#'><span>Today's Summary Diet Order</span></a>
      <ul>
         <li class='has-sub'><a href='inplabdietcafenot'><span>Morning</span></a>
            
         </li>
         <li class='has-sub'><a href='inplabdietcafenot1'><span>Mid Morning</span></a>
            
         </li>
		          <li class='has-sub'><a href='inplabdietcafenot2'><span>Lunch</span></a>
            
         </li>
		 
		 <li class='has-sub'><a href='inplabdietcafenot3'><span>Evening</span></a>
            
         </li>
		 
		 <li class='has-sub'><a href='inplabdietcafenot4'><span>Dinner</span></a>
            
         </li>

		 
      </ul>
	  
   </li>
   <li class='last'><a href='logout'><span>LOGOUT</span></a></li>
</ul>
</div>

<p align="center" class="style1">Welcome!!  <?php echo $row39['fullname']; ?>'s IPD DashBoard </p> 
<form action="" method="GET">
<table width="100%" height ="100%" border="1" align="center" bgcolor="#FFFF99" style="border-collapse:collapse;">
<tr> <td align="right" colspan="20"><a href="menudetailsdiet"><strong>Details List Of Available Diet</strong></a></td></tr>
<tr> <td align="right" colspan="20"></td></tr><tr> <td align="right" colspan="20"></td></tr><tr> <td align="right" colspan="20"></td></tr>
    




    <tr>
      <th width="4%"><strong>S.No</strong></th>
      <th width="17%"><strong>Patient's Name</strong></th>
      <th width="10%"><strong>MRN</strong></th>
      <th width="15%"><strong>Doctor's Name </strong>
      
	  <th width="14%"><strong>Admission Date</strong>   
	  <th width="14%"><strong>Working Diagnosis</strong>
<th width="14%"><strong>All Reports</strong>	  
      <th width="14%"><strong>Room No</strong>
      <th width="14%"><strong>Bed No</strong>
	  <th width="14%"><strong>Days Staying</strong>
      <th width="14%"><strong>Go</strong>
	  
	  <th width="14%"><strong>Status</strong>
<th width="14%"><strong>Diet</strong>
	      
	  <th width="14%"><strong>Referral</strong>      
	   </tr>
  </thead>
  <tbody>
  
    <?php
$user=$_SESSION["sess_username"];
$date= date('m/d/Y');
$count=1;
$sel_query="Select * from inpatient where discharge= '' order by room asc";

$result = mysqli_query($con,$sel_query);
while($row = mysqli_fetch_assoc($result)) { ?>
    <tr>
      <td align="center"><?php echo $count; ?></td>
      <td align="center"><?php echo $row["pname"]; ?></td>
      <td align="center"><?php echo $row["pmrn"]; ?></td>
      <td align="center"><?php echo $row["adoc"]; ?></td>
      <td align="center"><?php echo $row["adate"]; ?>  </td>
	  
	    <?php 
$pmrn1=$row['pmrn'];
$eid4=$row['eid'];

$query43 = "SELECT COUNT(status) FROM iidiet where pmrn= '$pmrn1' and odate='$dd' and status='Diet Ordered' and status1!='Cancel' ;"; 
$result43 = mysqli_query($con, $query43) or die(mysqli_error());
$row43 = mysqli_fetch_assoc($result43);
$count55 =$row43['COUNT(status)'];


$queryd = "SELECT * FROM diap where pmrn= '$pmrn1' and  eid='$eid4' order by id DESC limit 1"; 
	 
$resultd = mysqli_query($con, $queryd) or die(mysqli_error());

// Print out result
$rowd = mysqli_fetch_array($resultd);
$inves=$rowd['inves'];


?>
	  <td align="center"><a href="diap1?pmrn=<?php echo $row["pmrn"]; ?>&eid=<?php echo $row["eid"]; ?>"><span style='color:green;text-align:center;'><b><?php echo $inves;?></a></td>
	  
	  <td align="center"><a href="allreportdocnew?pmrn=<?php echo $row["pmrn"]; ?>&eid=<?php echo $row["eid"]; ?>"><span style='color:red;text-align:center;'><b>All Reports</a></td>
	  

      <td align="center" style="font:Verdana, Arial, Helvetica, sans-serif large" style="font-weight:bold"><?php echo $row["room"];?>  </td>
	  <td align="center" style="font:Verdana, Arial, Helvetica, sans-serif large" style="font-weight:bold"><?php echo $row["room1"];?>  </td>
	  <td align="center" style="font:Verdana, Arial, Helvetica, sans-serif large" style="font-weight:bold"><?php $start=$row["aadate"];$date1=date_create("$start");
$date2=date_create("$date");
$diff=date_diff($date1,$date2);
echo $diff->format("%R%a days");?>  </td>
<td align="center"><a href="idocdetailsdiet?pmrn=<?php echo $row["pmrn"]; ?>&eid=<?php echo $row["eid"]; ?>">GO</a></td>
	




	 <td align="center"<?php if($count55>0): ?> style="background-color:RED;"<?php else: ?> style="background-color:lightgreen;" <?php endif ; ?>> </td>

	  	  <?php
$tt1=$row['pmrn'];


$queryc = "SELECT * FROM covidopd where pmrn= '$tt1' order by id DESC limit 1"; 
	 
$resultc = mysqli_query($con, $queryc) or die(mysqli_error());

// Print out result
$rowc = mysqli_fetch_array($resultc);

$cr=$rowc['tresult'];


$tt=$rowc['tresult'];
$dcon=$rowc["dconfirm"];

/*$queryt= "SELECT COUNT(pmrn) FROM covidopd where pmrn='$tt1'"; 
	 
$resultt = mysqli_query($con, $queryt) or die(mysqli_error());
$rowt = mysqli_fetch_assoc($resultt);
$co=$rowt['COUNT(pmrn)'];*/
$dd4=date('Y-m-d');
$db = mysqli_connect('localhost','root','Godiloveu16');
mysqli_select_db($db,'sfmmkpjnew');
$query46 = mysqli_query($db,"select * from irefferal where pmrn='$pmrn1' and eid='$eid4' and sid in ('618','1340') and cstatus='Active'");
$data46=mysqli_num_rows($query46);


$query46d = mysqli_query($db,"Select * from iidiet where pmrn= '$pmrn1' and eid='$eid4'and status1 !='Cancel' and odate='$dd4'");
$data46d=mysqli_fetch_assoc($query46d);

$query46dd = mysqli_query($db,"Select * from icnote where pmrn= '$pmrn1' and eid='$eid4' and daten='$dd4' and user='$full'");
$data46dd=mysqli_fetch_assoc($query46dd);
?>
<td align="center" style="font:Verdana, Arial, Helvetica, sans-serif large" style="font-weight:bold"><?php echo $data46d["infusion"];?>  </td>

<td align="center"><a target='_blank' href="idocnote?pmrn=<?php echo "$pmrn1"; ?>&eid=<?php echo "$eid4"; ?>"><?php if ($data46>0){echo "<span style='color:red;text-align:center;'><b>Referral"; }else if ($data46dd>0){echo "<span style='color:green;text-align:center;'><b>Done"; }else {echo "<span style='color:blue;text-align:center;'>Daily Note<b>";} ?></a>  </td>

      </tr>
    <?php $count++; } ?>
   </tbody>
</table>
</form>

</body>

</html>
