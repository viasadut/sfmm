<?php 
    session_start();
    require('db1.php');
	$role = $_SESSION['sess_userrole'];
	
	$queryc = "SELECT COUNT(utype) FROM user where '$role' in ('doctor','moopd')"; 
$resultc = mysqli_query($con, $queryc) or die(mysqli_error());
$rowc = mysqli_fetch_array($resultc);
$c1=$rowc['COUNT(utype)'];
	
    if(!isset($_SESSION['sess_username']) || $c1==0){
      header('Location: login2?err=2');
    }

    include_once 'dbconfig.php';
?>
<?php
$url1=$_SERVER['REQUEST_URI'];
header("Refresh: 600; URL=$url1");

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
//include("auth.php");


 
?>

<!DOCTYPE html>
<html>
<head>

  <meta charset="UTF-8">
  <title>Sign Up Form</title>
  <style>
      /* NOTE: The styles were added inline because Prefixfree needs access to your styles and they must be inlined if they are on local disk! */
      /* Stephonce R. MOrris | 2014 */

html { box-sizing: border-box; }

*, *:before, *:after {
  -moz-box-sizing: border-box;
  -webkit-box-sizing: border-box;
  box-sizing: border-box;
}

body {
  font-family: 'Nunito',sans-serif;
  color: #384047;
  background: #A085C6;
}

form {
  max-width: 300px;
  margin: 10px auto;
  padding: 10px 20px;
  background: #f4f7f8;
  border-radius: 8px;
  border: 1px solid #8265B0;
  box-shadow: 3px 3px 3px rgba(0,0,0,0.2)
}

h1 {
  margin: 0 0 30px 0;
  text-align: center;
}

input[type="text"],
input[type="password"],
input[type="date"],
input[type="datetime"],
input[type="email"],
input[type="number"],
input[type="search"],
input[type="tel"],
input[type="time"],
input[type="url"],
textarea,
select {
  background: rgba(255,255,255,0.1);
  border: none;
  font-size: 16px;
  height: auto;
  margin: 0;
  outline: 0;
  padding: 15px;
  width: 100%;
  background-color: #e8eeef;
  color: #8a97a0;
  box-shadow: 0 1px 0 rgba(0,0,0,0.03) inset;
  margin-bottom: 30px;
}


input[type="radio"],
input[type="checkbox"] {
  margin: 0 4px 8px 0;
}

select {
  padding: 6px;
  height: 32px;
  border-radius: 2px;
}



fieldset {
  margin-bottom: 30px;
  border: none;
}

legend {
  font-size: 1.4em;
  margin-bottom: 10px;
}

label {
  display: block;
  margin-bottom: 8px;
}

label.light {
  font-weight: 300;
  display: inline;
}

.number {
  background-color: #A085C6;
  /*#5fcf80*/
  color: #fff;
  height: 30px;
  width: 30px;
  display: inline-block;
  font-size: 0.8em;
  margin-right: 4px;
  line-height: 30px;
  text-align: center;
  text-shadow: 0 1px 0 rgba(255,255,255,0.2);
  border-radius: 100%;
}

abbr[title] {
	border-bottom-width: 0;
}


@media screen and (min-width: 600px) {

  form {
    max-width: 2000px;
  }

}

</style>


   <link rel="stylesheet" href="styles.css">

   <script src="script.js"></script>


 <link rel="stylesheet" href="jsnew/bootstrap.min.css" />  
    <script src="jsnew/jjquery.min.js"></script>
    <script src="jsnew/bootstrap.min.js"></script>

   

<link rel="stylesheet" href="styles.css">

   <script src="script.js"></script>
   <script src="./jquery.multiselect.js"></script>
<link href="./jquery.multiselect.css" rel="stylesheet" />
   
   <script src="jsnew/pprefixfree.min.js"></script>
</head>

<body>








<div id='cssmenu'>
<ul>
   <li><a href='viewnew11'><span>Home</span></a></li>
   <li class='active has-sub'><a href='#'><span>Patients</span></a>
      <ul>
         <li class='has-sub'><a href='prescription/prescription/viewnew'><span>OPD Patients</span></a>
            
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
<h1 align="center"style="background-color:lightgreen;"><?php echo $full; ?>'s In-Patient List</h1>
    <tr>
      <th width="4%"><strong>S.No</strong></th>
      <th width="17%"><strong>Patient's Name</strong></th>
	  
      <th width="10%"><strong>MRN</strong></th>
      <th width="10%"><strong>Medication</strong></th>
      <th width="10%"><strong>Investigation</strong></th>
	  <th width="17%"><strong>Age</strong></th>
      
	  <th width="15%"><strong>Bed No</strong>
      <th width="14%"><strong>Admission Date</strong>  
<th width="14%"><strong>Category</strong>	  
	  <th width="24%"><strong>Working Diagnosis</strong>
      
      
	  <th width="14%"><strong>Days Staying</strong>
      
      
	  
	  <th width="10%"><strong>OT Clearance</strong>
       <th width="10%"><strong>Covid Result</strong>
	   </tr>
  </thead>
  <tbody>
  
    <?php
	
	
		
	
	
$user=$_SESSION["sess_username"];
$date= date('m/d/Y');
$count=1;
$sel_query="Select * from inpatient where adoc= '$full' and discharge=''";
//$start=$row["aadate"];

$result = mysqli_query($con,$sel_query);
while($row = mysqli_fetch_assoc($result)) { ?>
      <td align="center"><?php echo $count; ?></td>
	  
	   <?php
//$tt1=$row['pmrn'];
$date455=$row['anew'];
$rid=$row['eid'];



$tt1=$row['pmrn']; 
 $rid=$row['eid']; 
 $date5=date('Y-m-d'); 
  
  $query43_o = "SELECT * FROM ot where pmrn= '$tt1' and date5='$date5';"; 
$result43_o = mysqli_query($con, $query43_o) or die(mysqli_error());
$row43_o = mysqli_fetch_assoc($result43_o);

$rows_ot=mysqli_num_rows($result43_o); 
  $m_c=$row43_o['m_clearance'];
 
$queryc = "SELECT * FROM covidopd where pmrn= '$tt1' order by id DESC limit 1"; 
	 
$resultc = mysqli_query($con, $queryc) or die(mysqli_error());

// Print out result
$rowc = mysqli_fetch_array($resultc);

$cr=$rowc['tresult'];


$tt=$rowc['tresult'];
$dcon=$rowc["dconfirm"];
$ss1=$rowc["ssent"];
$ss=date('m/d/Y', strtotime($rowc["ssent"]));



$date45=date('m/d/Y',strtotime($row['anew']));

$date22=date_create("$date45");
$date21=date_create("$ss");
$diff44=date_diff($date21,$date22);

$diff47=$diff44->format("%r%a");


//$start=date('Y-m-d', strtotime($_REQUEST["stdate"]));

$queryt= "SELECT COUNT(pmrn) FROM covidopd where pmrn='$tt1'"; 
	 
$resultt = mysqli_query($con, $queryt) or die(mysqli_error());
$rowt = mysqli_fetch_assoc($resultt);
$co=$rowt['COUNT(pmrn)'];




$queryd = "SELECT * FROM diap where pmrn= '$tt1' and  eid='$rid' order by id DESC limit 1"; 
	 
$resultd = mysqli_query($con, $queryd) or die(mysqli_error());

// Print out result
$rowd = mysqli_fetch_array($resultd);
$inves=$rowd['inves'];

$nndate=date('Y-m-d');
$query_note= "SELECT COUNT(id) FROM icnote where pmrn='$tt1' and eid='$rid' and user='$full' and daten='$nndate' and charge>0"; 
	 
$result_note = mysqli_query($con, $query_note) or die(mysqli_error());
$row_note = mysqli_fetch_assoc($result_note);
$note=$row_note['COUNT(id)'];
//$note_url = "idocnote?pmrn=$tt1&eid=$rid" ;
$note_url = "idocnote_20012026?pmrn=$tt1&eid=$rid" ;
?>

      <td align="center"><a href="idocdetails?pmrn=<?php echo $row["pmrn"]; ?>&id=<?php echo $row["id"]; ?>&eid=<?php echo $row["eid"]; ?>&dname=<?php echo $row["adoc"]; ?>"><?php echo $row["pname"]; ?></a>
     
      
     
     </td>
	  
	  
	  <?php
	  if($note==1)
	  {echo'
      <td align="center" bgcolor="lightgreen"><a href='.$note_url.'>'.$row["pmrn"].'</a>
      
      <input type="button" name="edit" value="Visit" id="'.$row["id"].'" class="btn btn-info btn-xs edit_data">
      </td>';}
	  
	  else if($note>=2)
	  {echo'
      <td align="center" bgcolor="#fed8b1"><a href='.$note_url.'>'.$row["pmrn"].'</a>
      
      <input type="button" name="edit" value="Visit" id="'.$row["id"].'" class="btn btn-info btn-xs edit_data">
      </td>';}
	  else{
		  
		  echo '
		  <td align="center"><a href='.$note_url.'>'.$row["pmrn"].'</a>
      
      <input type="button" name="edit" value="Visit" id="'.$row["id"].'" class="btn btn-info btn-xs edit_data">
      
      </td>
		  ';
	  }
	  ?>

<td align="center"><a href="idocmeditestdoc?pmrn=<?php echo $row["pmrn"]; ?>&eid=<?php echo $row["eid"]; ?>">Medication</a></td>
<td align="center"><a href="idocinves?pmrn=<?php echo $row["pmrn"]; ?>&eid=<?php echo $row["eid"]; ?>">Investigation</a></td>
	  <td align="center"><?php echo $row["age"]; ?></td>
	  
      <td align="center"><?php echo $row["room1"]; ?></td>
      <td align="center"><?php echo $row["adate"]; ?>  </td>
	  
	  
	  
	  <td align="center"<?php if($rowi['type']!='General'): ?> style="background-color:SKYBLUE;"<?php else: ?> style="" <?php endif ; ?>><?php echo $rowi["type"]; ?></td>
<td align="center"><a href="diap?pmrn=<?php echo $row["pmrn"]; ?>&eid=<?php echo $row["eid"]; ?>"><span style='color:green;text-align:center;'><b><?php echo $inves;?></a></td>
	  
	  
	  
      
	   
	  <td align="center" style="font:Verdana, Arial, Helvetica, sans-serif large" style="font-weight:bold"><?php $start=$row["aadate"];$date1=date_create("$start");
$date2=date_create("$date");
$diff=date_diff($date1,$date2);
echo $diff->format("%R%a days");?>  </td>
	  

<?php
  if($rows_ot>0 and $m_c!='')
	{ 
echo "<td align='center' style='background-color:lightgreen; font-size:12px;'>OT Clearance Done</td>";
	}
	
	else if($rows_ot>0 and $m_c=='')
	{ 
echo "<td align='center' style='background-color:red;font-size:12px;'>Waiting For OT Clearance</td>";
	}
	
	else 
	{ 
echo "<td align='center' style='background-color:#eed7a1;font-size:12px;'></td>";
	}
?>

<td><a target="_blank" href="pcovidresult?pmrn=<?php echo $tt1;?>">
<?php if($tt=="P" and $dcon=="confirmed" and $diff47<=4)
  {echo "<span style='color:red;text-align:center;'><b>POSITIVE"; }
  else if($tt=="N" and $dcon=="confirmed"and $diff47<=4)
  {echo "<span style='color:green;text-align:center;'><b>NEGATIVE"; }
  else if($co==0){echo "<span style='color:black;text-align:center;'><b>Test Not Done Yet";}
  else if($diff47>4){echo "<span style='color:darkorange;text-align:center;'><b>Test Not Done Recently";} 
  else {echo "<span style='color:blue;text-align:center;'><b>Result Pending";}

?>
</a>
</td>
      </tr>
    <?php $count++; } ?>
  </tbody>
</table>

<br><br>

<table width="100%" height ="100%" border="1" align="center" bgcolor="#FFFF99" style="border-collapse:collapse;">
<h1 align="center"style="background-color:lightblue;">Referral Patient List</h1>
    <tr>
      <th width="4%"><strong>S.No</strong></th>
      <th width="17%"><strong>Patient's Name</strong></th>
      <th width="10%"><strong>MRN</strong></th>
	  <th width="10%"><strong>Medication</strong></th>
      <th width="10%"><strong>Investigation</strong></th>
      <th width="14%"><strong>Bed</strong>
      <th width="15%"><strong>Referred By </strong>
      <th width="14%"><strong>Referred Date</strong>   
      <th width="14%"><strong>Gender</strong>
      <th width="14%"><strong>Age</strong>
	  <th width="14%"><strong>Category</strong>
	  <th width="14%"><strong>Working Diagnosis</strong>
	  
      
	  <th width="14%"><strong>Cancel Referral </strong>
	  <th width="10%"><strong>Covid Result</strong>
 
	   </tr>
  </thead>
  <tbody>
  
    <?php
	

	
	
$user=$_SESSION["sess_username"];
$date= date('m/d/Y');
$count=1;
$sel_query="Select * from irefferal where infusion= '$full' and status='' and tstatus='' and sid='$fullname' and cstatus='Active'and user!='Covid Unit'";

$result = mysqli_query($con,$sel_query);
while($row = mysqli_fetch_assoc($result)) { ?>
      <td align="center"><?php echo $count; ?></td>
	  
	   <?php
$tt1=$row['pmrn'];
$date455i=$row['ndate'];
$rid=$row['eid'];
$id_in=$row['id'];


$queryi = "SELECT * FROM inpatient where pmrn= '$tt1' and eid='$rid'"; 
	 
$resulti = mysqli_query($con, $queryi) or die(mysqli_error());

// Print out result
$rowi = mysqli_fetch_array($resulti);

$date455=$rowi['anew'];
$id_ref=$rowi['id'];


$queryc = "SELECT * FROM covidopd where pmrn= '$tt1' order by id DESC limit 1"; 
	 
$resultc = mysqli_query($con, $queryc) or die(mysqli_error());

// Print out result
$rowc = mysqli_fetch_array($resultc);

$cr=$rowc['tresult'];


$tt=$rowc['tresult'];
$dcon=$rowc["dconfirm"];
$ss1=$rowc["ssent"];
$ss=date('m/d/Y', strtotime($rowc["ssent"]));



$date45=date('m/d/Y',strtotime($rowi['anew']));

$date22=date_create("$date45");
$date21=date_create("$ss");
$diff44=date_diff($date21,$date22);

$diff47=$diff44->format("%r%a");


//$start=date('Y-m-d', strtotime($_REQUEST["stdate"]));

$queryt= "SELECT COUNT(pmrn) FROM covidopd where pmrn='$tt1'"; 
	 
$resultt = mysqli_query($con, $queryt) or die(mysqli_error());
$rowt = mysqli_fetch_assoc($resultt);
$co=$rowt['COUNT(pmrn)'];




$queryd = "SELECT * FROM diap where pmrn= '$tt1' and  eid='$rid' order by id DESC limit 1"; 
	 
$resultd = mysqli_query($con, $queryd) or die(mysqli_error());

// Print out result
$rowd = mysqli_fetch_array($resultd);
$inves=$rowd['inves'];

$nndate=date('Y-m-d');
$query_note= "SELECT COUNT(id) FROM icnote where pmrn='$tt1' and eid='$rid' and user='$full' and daten='$nndate'"; 
	 
$result_note = mysqli_query($con, $query_note) or die(mysqli_error());
$row_note = mysqli_fetch_assoc($result_note);
$note=$row_note['COUNT(id)'];
$note_url = "idocnotes?pmrn=$tt1&eid=$rid" ;

?>


      <td align="center"><a href="idocdetails?pmrn=<?php echo $row["pmrn"]; ?>&eid=<?php echo $row["eid"]; ?>&dname=<?php echo $row["infusion"]; ?>">
      
      

      
      <?php echo $row["pname"]; ?></a>
      
    
    </td>
      <?php
	  if($note==1)
	  {echo'
      <td align="center" bgcolor="lightgreen"><a href='.$note_url.'>'.$row["pmrn"].'</a>
      
      <input type="button" name="edit" value="Visit" id="'.$id_ref.'" class="btn btn-info btn-xs edit_data">
      </td>';}
	  
	  else if($note>=2)
	  {echo'
      <td align="center" bgcolor="#fed8b1"><a href='.$note_url.'>'.$row["pmrn"].'</a>
      
      <input type="button" name="edit" value="Visit" id="'.$id_ref.'" class="btn btn-info btn-xs edit_data">

    
      </td>';}
	  else{
		  
		  echo '
		  <td align="center"><a href='.$note_url.'>'.$row["pmrn"].'</a>
      
      <input type="button" name="edit" value="Visit" id="'.$id_ref.'" class="btn btn-info btn-xs edit_data">
      
      </td>
		  ';
	  }
	  ?>
	  <td align="center"><a href="idocmeditestdoc?pmrn=<?php echo $row["pmrn"]; ?>&eid=<?php echo $row["eid"]; ?>">Medication</a></td>
<td align="center"><a href="idocinves?pmrn=<?php echo $row["pmrn"]; ?>&eid=<?php echo $row["eid"]; ?>">Investigation</a></td>

	  <td align="center" style="font:Verdana, Arial, Helvetica, sans-serif large" style="font-weight:bold"><?php echo $row["bed1"];?>  
      <td align="center"><?php echo $row["user"]; ?>
      <td align="center"><?php echo $row["odate"]; ?>  
      <td align="center" style="font:Verdana, Arial, Helvetica, sans-serif large" style="font-weight:bold"><?php echo $row["pgender"];?>  
	  <td align="center" style="font:Verdana, Arial, Helvetica, sans-serif large" style="font-weight:bold"><?php echo $row["page"];?>  
	 
	  
	  
<td align="center"<?php if($rowi['type']!='General'): ?> style="background-color:SKYBLUE;"<?php else: ?> style="" <?php endif ; ?>><?php echo $rowi["type"]; ?></td>	  
<td align="center"><a href="diap?pmrn=<?php echo $row["pmrn"]; ?>&eid=<?php echo $row["eid"]; ?>"><span style='color:green;text-align:center;'><b><?php echo $inves;?></a></td>


	 
	  





 <?php 
	  
	  $uu=$row['infusion'];
	  $id=$row['id'];
	  
	  
	  $url40="can_refer?id=$id";
	  ?>
	  
	  
	  
	   <td align="center"><?php if($full==$uu){echo"<a onclick='return confirm_click();' href='$url40'><strong>Cancel Referral</strong></a>";} else {echo '';}?></td>

        <td><a target="_blank" href="pcovidresult?pmrn=<?php echo $tt1;?>">
<?php if($tt=="P" and $dcon=="confirmed" and $diff47<=4)
  {echo "<span style='color:red;text-align:center;'><b>POSITIVE"; }
  else if($tt=="N" and $dcon=="confirmed"and $diff47<=4)
  {echo "<span style='color:green;text-align:center;'><b>NEGATIVE"; }
  else if($co==0){echo "<span style='color:black;text-align:center;'><b>Test Not Done Yet";}
  else if($diff47>4){echo "<span style='color:darkorange;text-align:center;'><b>Test Not Done Recently";} 
  else {echo "<span style='color:blue;text-align:center;'><b>Result Pending";}

?>
</a>
</td>

      </tr>
    <?php $count++; } ?>
  </tbody>
  <tr><td colspan="20" align="Right"><a target='_blank' href="testpdfpa.php?dname=<?php echo "$full"; ?>"><img src="print.png" title="Print Report" width="150" height="60" /></a></td>	</tr>
</table>



<table width="100%" height ="100%" border="1" align="center" bgcolor="#FFFF99" style="border-collapse:collapse;">
<h1 align="center"style="background-color:red;">Referral Patient From Covid Unit</h1>
    <tr>
      <th width="4%"><strong>S.No</strong></th>
      <th width="17%"><strong>Patient's Name</strong></th>
      <th width="10%"><strong>MRN</strong></th>
      <th width="15%"><strong>Referred By </strong>
      <th width="14%"><strong>Referred Date</strong>   
      <th width="14%"><strong>Gender</strong>
      <th width="14%"><strong>Age</strong>
	  <th width="14%"><strong>Category</strong>
	  <th width="14%"><strong>Working Diagnosis</strong>
	  <th width="14%"><strong>Ward</strong>
      <th width="14%"><strong>Bed</strong>
      <th width="14%"><strong>Go</strong>
	  <th width="14%"><strong>Transfer</strong>
	  <th width="14%"><strong>PWL</strong>
	  <th width="14%"><strong>Covid Test</strong>
	  <th width="14%"><strong>Cancel Referral </strong>
	  <th width="14%"><strong>Stage</strong>
	  <th width="14%"><strong>Treatment</strong>
	  	  <th width="14%"><strong>Update Stage</strong>
	   </tr>
  </thead>
  <tbody>
  
    <?php
	

	
	
$user=$_SESSION["sess_username"];
$date= date('m/d/Y');
$count=1;
$sel_query="Select * from irefferal where infusion= '$full' and status='' and tstatus='' and sid='$fullname' and cstatus='Active' and user='Covid Unit'";

$result = mysqli_query($con,$sel_query);
while($row = mysqli_fetch_assoc($result)) { ?>
      <td align="center"><?php echo $count; ?></td>
	  
	  <?php
$tt1=$row['pmrn'];
$date455i=$row['ndate'];
$rid=$row['eid'];
$id_in=$row['id'];


$queryi = "SELECT * FROM inpatient where pmrn= '$tt1' and eid='$rid'"; 
	 
$resulti = mysqli_query($con, $queryi) or die(mysqli_error());

// Print out result
$rowi = mysqli_fetch_array($resulti);

$date455=$rowi['anew'];


/*$queryc = "SELECT * FROM covidopd where pmrn= '$tt1' order by id DESC limit 1"; 
	 
$resultc = mysqli_query($con, $queryc) or die(mysqli_error());

// Print out result
$rowc = mysqli_fetch_array($resultc);

$cr=$rowc['tresult'];


$tt=$rowc['tresult'];
$dcon=$rowc["dconfirm"];
$ss1=$rowc["ssent"];
$ss=date('m/d/Y', strtotime($rowc["ssent"]));



$date45=date('m/d/Y',strtotime($rowi['anew']));

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


$queryd = "SELECT * FROM diap where pmrn= '$tt1' and  eid='$rid' order by id DESC limit 1"; 
	 
$resultd = mysqli_query($con, $queryd) or die(mysqli_error());

// Print out result
$rowd = mysqli_fetch_array($resultd);
$inves=$rowd['inves'];



$nndate=date('Y-m-d');
$query_note= "SELECT COUNT(id) FROM icnote where pmrn='$tt1' and eid='$rid' and user='$full' and daten='$nndate'"; 
	 
$result_note = mysqli_query($con, $query_note) or die(mysqli_error());
$row_note = mysqli_fetch_assoc($result_note);
$note=$row_note['COUNT(id)'];
$note_url = "idocnotes?pmrn=$tt1&eid=$rid" ;
?>
      <td align="center"><a href="idocdetails?pmrn=<?php echo $row["pmrn"]; ?>&eid=<?php echo $row["eid"]; ?>&dname=<?php echo $row["infusion"]; ?>"><?php echo $row["pname"]; ?></a></td>
      <?php
	  if($note==1)
	  {echo'
      <td align="center" bgcolor="lightgreen"><a href='.$note_url.'>'.$row["pmrn"].'</a></td>';}
	  
	 else if($note>=2)
	  {echo'
      <td align="center" bgcolor="#fed8b1"><a href='.$note_url.'>'.$row["pmrn"].'</a></td>';}
	  else{
		  
		  echo '
		  <td align="center"><a href='.$note_url.'>'.$row["pmrn"].'</a></td>
		  ';
	  }
	  ?>
	  
      <td align="center"><?php echo $row["user"]; ?>
      <td align="center"><?php echo $row["odate"]; ?>  
      <td align="center" style="font:Verdana, Arial, Helvetica, sans-serif large" style="font-weight:bold"><?php echo $row["pgender"];?>  
	  <td align="center" style="font:Verdana, Arial, Helvetica, sans-serif large" style="font-weight:bold"><?php echo $row["page"];?>  
	 
 

	  
	  
	  <td align="center"<?php if($rowi['type']!='General'): ?> style="background-color:SKYBLUE;"<?php else: ?> style="" <?php endif ; ?>><?php echo $rowi["type"]; ?></td>
<td align="center"><a href="diap?pmrn=<?php echo $row["pmrn"]; ?>&eid=<?php echo $row["eid"]; ?>"><span style='color:green;text-align:center;'><b><?php echo $inves;?></a></td>


	 <td align="center" style="font:Verdana, Arial, Helvetica, sans-serif large" style="font-weight:bold"><?php echo $row["ward"];?>  
	  <td align="center" style="font:Verdana, Arial, Helvetica, sans-serif large" style="font-weight:bold"><?php echo $row["bed1"];?>  
	  <td align="center"><a href="idocdetails?pmrn=<?php echo $row["pmrn"]; ?>&eid=<?php echo $row["eid"]; ?>&dname=<?php echo $row["infusion"]; ?>">GO</a></td>
<td align="center"><a href="tdoc?pmrn=<?php echo $row["pmrn"]; ?>&id=<?php echo $row["id"]; ?>&eid=<?php echo $row["eid"]; ?>">Transfer</a></td>	  
<td align="center"><a href="todolistdoc?pmrn=<?php echo $row["pmrn"]; ?>&id=<?php echo $row["id"]; ?>&eid=<?php echo $row["eid"]; ?>">PWL</a></td>	  
	  

<td align="center"></td>


 <?php 
	  
	  $uu=$row['infusion'];
	  $id=$row['id'];
	  
	  
	  $url40="can_refer?id=$id";
	  ?>
	  
	  
	  
	   <td align="center"><?php if($full==$uu){echo"<a onclick='return confirm_click();' href='$url40'><strong>Cancel Referral</strong></a>";} else {echo '';}?></td>



<td align="center"><?php echo $rowi['stage'];?></td>	  
<td align="center"><?php echo $rowi['treat'];?></td>	  
<td><input type="button" name="edit" value="Update Stage" id="<?php echo "$id_in"; ?>" class="btn btn-info btn-xs edit_data6767"></td>
      </tr>
    <?php $count++; } ?>
  </tbody>
  <tr><td colspan="20" align="Right"><a target='_blank' href="testpdfpa.php?dname=<?php echo "$full"; ?>"><img src="print.png" title="Print Report" width="150" height="60" /></a></td>	
  
  
  </tr>
</table>






<br><br>


<table width="100%" height ="100%" border="1" align="center" bgcolor="#FFFF99" style="border-collapse:collapse;">
<h1 align="center"style="background-color:orange;">Today's Discharged Patients List</h1>
    <tr>
      <th width="4%"><strong>S.No</strong></th>
      <th width="17%"><strong>Patient's Name</strong></th>
      <th width="10%"><strong>MRN</strong></th>
      <th width="15%"><strong>Doctor's Name </strong>
      <th width="14%"><strong>Admission Date</strong>   
	  <th width="24%"><strong>Working Diagnosis</strong>
      <th width="14%"><strong>Room No</strong>
      <th width="14%"><strong>Bed No</strong>
	  <th width="14%"><strong>Days Staying</strong>
      <th width="14%"><strong>Go</strong>
      
	  <th width="5%"><strong>PWL</strong>
	  <th width="10%"><strong>Covid Result</strong>
	   </tr>
  </thead>
  <tbody>
  
    <?php
	
	
		
	
	
$user=$_SESSION["sess_username"];
$date= date('Y-m-d');
$count=1;
$sel_query="Select * from inpatient where adoc= '$full' and discharge='Discharged' and dnew='$date'";
//$start=$row["aadate"];

$result = mysqli_query($con,$sel_query);
while($row = mysqli_fetch_assoc($result)) { ?>
      <td align="center"><?php echo $count; ?></td>
	  
	  <?php
$tt1=$row['pmrn'];
$date455=$row['anew'];
$rid=$row['eid'];


/*$queryc = "SELECT * FROM covidopd where pmrn= '$tt1' order by id DESC limit 1"; 
	 
$resultc = mysqli_query($con, $queryc) or die(mysqli_error());

// Print out result
$rowc = mysqli_fetch_array($resultc);

$cr=$rowc['tresult'];


$tt=$rowc['tresult'];
$dcon=$rowc["dconfirm"];
$ss1=$rowc["ssent"];
$ss=date('m/d/Y', strtotime($rowc["ssent"]));



$date45=date('m/d/Y',strtotime($row['anew']));

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


$queryd = "SELECT * FROM diap where pmrn= '$tt1' and  eid='$rid' order by id DESC limit 1"; 
	 
$resultd = mysqli_query($con, $queryd) or die(mysqli_error());

// Print out result
$rowd = mysqli_fetch_array($resultd);
$inves=$rowd['inves'];


$nndate=date('Y-m-d');
$query_note= "SELECT COUNT(id) FROM icnote where pmrn='$tt1' and eid='$rid' and user='$full' and daten='$nndate'"; 
	 
$result_note = mysqli_query($con, $query_note) or die(mysqli_error());
$row_note = mysqli_fetch_assoc($result_note);
$note=$row_note['COUNT(id)'];
$note_url = "idocnotes?pmrn=$tt1&eid=$rid" ;

?>
      <td align="center"><a href="idocdetails?pmrn=<?php echo $row["pmrn"]; ?>&id=<?php echo $row["id"]; ?>&eid=<?php echo $row["eid"]; ?>&dname=<?php echo $row["adoc"]; ?>"><?php echo $row["pname"]; ?></a></td>
     <?php
	  if($note==1)
	  {echo'
      <td align="center" bgcolor="lightgreen"><a href='.$note_url.'>'.$row["pmrn"].'</a></td>';}
	  
	  else if($note>=2)
	  {echo'
      <td align="center" bgcolor="#fed8b1"><a href='.$note_url.'>'.$row["pmrn"].'</a></td>';}
	  else{
		  
		  echo '
		  <td align="center"><a href='.$note_url.'>'.$row["pmrn"].'</a></td>
		  ';
	  }
	  ?>
	  
	  
      <td align="center"><?php echo $row["adoc"]; ?>
      <td align="center"><?php echo $row["adate"]; ?>  
	   

	  
	  
	  
<td align="center"><a href="diap?pmrn=<?php echo $row["pmrn"]; ?>&eid=<?php echo $row["eid"]; ?>"><span style='color:green;text-align:center;'><b><?php echo $inves;?></a></td>
	  
	  
	  
      <td align="center" style="font:Verdana, Arial, Helvetica, sans-serif large" style="font-weight:bold"><?php echo $row["room"];?>  
	  <td align="center" style="font:Verdana, Arial, Helvetica, sans-serif large" style="font-weight:bold"><?php echo $row["room1"];?>  
	  <td align="center" style="font:Verdana, Arial, Helvetica, sans-serif large" style="font-weight:bold"><?php $start=$row["aadate"];$date1=date_create("$start");
$date2=date_create("$date");
$diff=date_diff($date1,$date2);
echo $diff->format("%R%a days");?>  </td>
	  <td align="center"><a href="idocdetails?pmrn=<?php echo $row["pmrn"]; ?>&id=<?php echo $row["id"]; ?>&eid=<?php echo $row["eid"]; ?>&dname=<?php echo $row["adoc"]; ?>">GO</a></td>

<td align="center"><a href="todolistdoc?pmrn=<?php echo $row["pmrn"]; ?>&id=<?php echo $row["id"]; ?>&eid=<?php echo $row["eid"]; ?>">PWL</a></td>	  
	  
	 

<td align="center">  </td>




      </tr>
    <?php $count++; } ?>
  </tbody>
</table>



</form>

</body>

</html>


<div id="dataModal" class="modal fade">  
      <div class="modal-dialog">  
           <div class="modal-content">  
                <div class="modal-header">  
                     <button type="button" class="close" data-dismiss="modal">&times;</button>  
                     <h4 class="modal-title"></h4>  
                </div>  
                <div class="modal-body" id="employee_detail">  
                </div>  
                <div class="modal-footer">  
                     <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>  
                </div>  
           </div>  
      </div>  
 </div>  
 <div id="add_data_Modal" class="modal fade">  
      <div class="modal-dialog">  
           <div class="modal-content">  
                <div class="modal-header">  
                     <button type="button" class="close" data-dismiss="modal">&times;</button>  
                     <h4 class="modal-title"align='center'>Consultant Charge Portal</h4>  
                </div>  
                <div class="modal-body">  
				
                     <form method="post" id="insert_form" name="frmMain2">  
					 
					 
                          <label>Patient MRN</label>  
                          <input type="text" name="pmrn" id="po_no" class="form-control" size="15" readonly>  
						   
						                           
                          <label>Patient Name</label>  
                          <input type="text" name="ppluse" id="po_type" class="form-control"  size="15" readonly>  
						  
						  
						  <label>Visit Type</label>                          
                        

              <select name="pa_type" value="" required class="country" style="font-size:20px; font-weight:bold;color:green;width:540px;" id="pmrn" onkeyup="GetDetail(this.value)">
			        
<option ="">--Select--</option>
<?php
	$stmt = $DB_con->prepare("select * from `privilege` where dname in('common') and status in ('Approved','Waiting For CFO Approval')");
	$stmt->execute();
	while($row=$stmt->fetch(PDO::FETCH_ASSOC))
	{
		?>
        <option value="<?php echo $row['pname'].','.$row['id']; ?>"><?php echo $row['pname']; ?></option>
        <?php
	} 
?>
</select>
		<script>
$(document).ready(function() {
    $('.country').select2(
	
	
	);
	
	
});
</script>	

						
							<link rel="stylesheet"
			href=
"new_bill/jsnew/chosen.min.css" />

		<!--These jQuery libraries for select2
			need to be included-->
		<script src=
"new_bill/jsnew/select2.min.js">
	</script>
		<link rel="stylesheet"
			href=
"new_bill/jsnew/select2.min.css" />


                         
                          <input type="hidden" name="employee_id" id="employee_id" />  
                          <input type="hidden" name="eid" id="eid" />  
                          <input type="hidden" name="adoc" id="adoc" />  

 						  
                          <input type="hidden" name="charge" id="charge" required value="" readonly>                 

                          
					<br />	  <br />	  
						  <label><input type="submit" name="insert" id="insert45" value="Insert" class="btn btn-success"></label>  
					 
                     </form>  
                </div>  
                <div class="modal-footer">  
                     <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>  
                </div>  

                <script>
					         document.getElementById('insert45').addEventListener('click', function() {
        this.style.display = 'none'; // Hides the button
        // Optional: Add a message indicating submission is in progress
        // document.getElementById('myForm').innerHTML += '<p>Processing, please wait...</p>';
    });
					 </script>
		
           </div>  
      </div>  
 </div>  
<script>  
 $(document).ready(function(){  
      $('#add').click(function(){  
           $('#insert').val("Insert");  
           $('#insert_form')[0].reset();  
      });  
      $(document).on('click', '.edit_data', function(){  
           var employee_id = $(this).attr("id");  
           $.ajax({  
                url:"doc_visit_pri.php",  
                method:"POST",  
                data:{employee_id:employee_id},  
				
                dataType:"json",  
                success:function(data){  
                     $('#po_no').val(data.pmrn);  
                     $('#eid').val(data.eid);  
                     $('#po_type').val(data.pname);  
					 $('#req_department').val(data.eid);  
					$('#adoc').val(data.adoc); 
					 $('#total_amount').val(data.adate); 
					 //$('#pin_no').val(data.total_amount); 
					 
					 
					  
                     
					 
                     $('#employee_id').val(data.id);  
                     $('#insert45').val("Confirm");  
                     $('#add_data_Modal').modal('show');  
                }  
				 
				 
				 
				
				
           });  
      });  
      $('#insert_form').on("submit", function(event){  
           event.preventDefault();  
           if($('#po_no').val() == "")  
           {  
                alert("MRN is required");  
           }  
           
           else  
           {  
                $.ajax({  
                     url:"pro_charge_11.php",  
                     method:"POST",  
                     data:$('#insert_form').serialize(),  
                     beforeSend:function(){  
                          $('#insert').val("Inserting");  
                     },  
                     success:function(data){  
                          $('#insert_form')[0].reset();  
                          $('#add_data_Modal').modal('hide');  
                          $('#employee_table').html(data);  
						  
						  
						  
						  parent.location.reload();
                     }  
                });  
           }  
      });  
      
 });  
 
  
 </script>

