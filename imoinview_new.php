<?php 
    session_start();
    $role = $_SESSION['sess_userrole'];
    if(!isset($_SESSION['sess_username']) || $role!="imo"){
      header('Location: login2?err=2');
    }
?>
<?php
$url1=$_SERVER['REQUEST_URI'];
header("Refresh: 600; URL=$url1");
$test=$_SESSION['user_session_id'];
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

$ad3=date('d/m/Y H:i:s');

$sel3="Select * from inpatient where '$ad3' between alert1 and alert2";

$resu3 = mysqli_query($con,$sel3);
$rw3 = mysqli_fetch_assoc($resu3);
$tt3=$rw3['pmrn'];
$tt4=$rw3['pname'];


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



.button {
  background-color: #004A7F;
  -webkit-border-radius: 5px;
  border-radius: 5px;
  border: none;
  color: #FFFFFF;
  cursor: pointer;
  display: inline-block;
  font-family: Arial;
  font-size: 20px;
  padding: 5px 5px;
  text-align: center;
  text-decoration: none;
  -webkit-animation: glowing 1500ms infinite;
  -moz-animation: glowing 1500ms infinite;
  -o-animation: glowing 1500ms infinite;
  animation: glowing 1500ms infinite;
}
@-webkit-keyframes glowing {
  0% { background-color: #B20000; -webkit-box-shadow: 0 0 3px #B20000; }
  50% { background-color: #FF0000; -webkit-box-shadow: 0 0 40px #FF0000; }
  100% { background-color: #B20000; -webkit-box-shadow: 0 0 3px #B20000; }
}

@-moz-keyframes glowing {
  0% { background-color: #B20000; -moz-box-shadow: 0 0 3px #B20000; }
  50% { background-color: #FF0000; -moz-box-shadow: 0 0 40px #FF0000; }
  100% { background-color: #B20000; -moz-box-shadow: 0 0 3px #B20000; }
}

@-o-keyframes glowing {
  0% { background-color: #B20000; box-shadow: 0 0 3px #B20000; }
  50% { background-color: #FF0000; box-shadow: 0 0 40px #FF0000; }
  100% { background-color: #B20000; box-shadow: 0 0 3px #B20000; }
}

@keyframes glowing {
  0% { background-color: #B20000; box-shadow: 0 0 3px #B20000; }
  50% { background-color: #FF0000; box-shadow: 0 0 40px #FF0000; }
  100% { background-color: #B20000; box-shadow: 0 0 3px #B20000; }
}
</style>
</style>


   <link rel="stylesheet" href="styles.css">
   <script src="http://code.jquery.com/jquery-latest.min.js" type="text/javascript"></script>
   <script src="script.js"></script>




</head>


<body>


<div id='cssmenu'>
<ul>
   <li><a href='bcview'><span>Home</span></a></li>
      <li class='active has-sub'><a href='#'><span>Appointment</span></a>
      <ul>

    	    <li class='last'><a href='bgg1new'><span>Set Patient's Appointment</span></a></li>
      <li class='last'><a href='bview4'><span>Search previous patients</span></a></li>
      </ul>
	  
   </li>

<li class='last'><a href='billapp'><span>Appoinment Report</span></a></li>
   <li class='last'><a href='logout'><span>LOGOUT</span></a></li>
</ul>
</div>
<p align="center" class="style1">!! WELCOME !! <?php echo $fullname; ?>'s Dash Board </p> 
<p align="center" class="style1">Inpatient Search Panel</p>


<form action="" method="post">
 
		
		
		<table>
											
						<tr>				
						
             		
					 
			    	 
					 <td colspan="3" align="right"><select name="bt">
        
												<option value=''>-Select Ward-</option>
												<option value='ALL'>ALL</option>
						<?php 
			$sql = "select distinct type from `bed` where status in('Occupied')";
			$res = mysqli_query($con, $sql);
			if(mysqli_num_rows($res) > 0) {
				while($row = mysqli_fetch_object($res)) {
					echo "<option value='".$row->type."'>".$row->type."</option>";
				}
			}
			?>
						
				
</select></td>  
					<td>	<button type="submit" name="bsearch" align="right">Search</button></td>
					<td>Select Cabin From Dropdown List&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>
					<td><a href="imoinview">    <strong>View All Patient</strong></a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
					&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>
					<td colspan="3" align="right"><a class="button" href="covid_severe_imo">Covid Ward</a></td>
					 </tr>
</table>

  <table width="100%" height ="100%" border="1" align="center" bgcolor="#FFFF99" style="border-collapse:collapse;">
        <tr>
            <th width="4%"><strong>S.No</strong></th>
      <th width="17%"><strong>Patient's Name</strong></th>
      <th width="10%"><strong>MRN</strong></th>
	  <th width="10%"><strong>Category</strong></th>
      <th width="15%"><strong>Doctor's Name </strong>
      <th width="14%"><strong>Admission Date</strong>   
	  <th width="24%"><strong>Working Diagnosis</strong>
      <th width="14%"><strong>Room No</strong>
      <th width="14%"><strong>Bed No</strong>
	  <th width="14%"><strong>Days Staying</strong>
      <th width="14%"><strong>Summary Treatment</strong>
      <th width="5%"><strong>Transfer Bed</strong>
	  <th width="5%"><strong>PWL</strong>
	  <th width="10%"><strong>Covid Result</strong>
	  <th width="14%"><strong>OT Clearance</strong>

	   </tr>
  </thead>
  <tbody>

  
    <?php
	if(isset($_POST['bsearch'])){
		$bt=$_REQUEST["bt"];
$user=$_SESSION["sess_username"];
$date= date('m/d/Y');

$count=1;
if($bt=='ALL'){
	
	echo "<font color=blue font size=5> ALL Patient List  -";


	
	
$sel_query="Select * from inpatient where  discharge= '' order by room asc";}
else{
	
echo "<font color=blue font size=5> Patient View For Ward -";
echo   $bt;

	
$sel_query="Select * from inpatient where  room='$bt' and discharge= '' order by room1 asc";	
	
}

$result = mysqli_query($con,$sel_query);
while($row = mysqli_fetch_assoc($result)) { ?>
    <tr>
      <td align="center"><?php echo $count; ?></td>
<?php
$ad=date('d/m/Y H:i:s');
$pp=$row['pmrn'];
$sel="Select * from inpatient where '$ad' between alert1 and alert2 and pmrn='$pp' order by room1 asc";

$resu = mysqli_query($con,$sel);
$rw = mysqli_fetch_assoc($resu);
?>


      <td align="center"<?php if($rw==true): ?> style="background-color:VIOLET;"<?php else: ?> <?php endif ; ?>><a href="imoidetails?pmrn=<?php echo $row["pmrn"]; ?>&eid=<?php echo $row["eid"]; ?>"><?php echo $row["pname"]; ?></a></td>
      <td align="center"><?php echo $row["pmrn"]; ?>
	  
	  
	  <?php
	   
	   $pmrn=$row['pmrn'];
	   $baby="Select * from mo_baby where pmrn='$pmrn' or medi='$pmrn'";
$baby_result = mysqli_query($con, $baby) or die ( mysqli_error());
$data_baby = mysqli_fetch_assoc($baby_result);
$m_pmrn=$data_baby['pmrn'];
$b_pmrn=$data_baby['medi'];
$b_eid=$data_baby['beid'];
$m_eid=$data_baby['eid'];
	  if($m_pmrn==$pmrn)
	  {	  

$baby1="Select * from mo_baby where pmrn='$pmrn'";
$baby_result1 = mysqli_query($con, $baby1) or die ( mysqli_error());

  
while($data_baby1 = mysqli_fetch_assoc($baby_result1))


{ ?>
<?php $n=$data_baby1['medi'];
$n1=$data_baby1['beid'];
	
 echo'
		  <a target="_blank" href="ipallmng?pmrn='.$n.'&eid='.$n1.'"><strong><img src="baby1.png" title="Baby Details of '.$n.'" width="50" height="50" /></strong></a>

   </a>   
		  
		  
	  ';}	
	
	

	    
		  
		

	  
 }
	  else if($b_pmrn==$pmrn){
		  
		  echo '<a target="_blank" href="ipallmng?pmrn='.$m_pmrn.'&eid='.$m_eid.'"><strong><img src="mother1.png" title="Mother Details" width="50" height="50" /></strong></a>

   </a>   ';
	  }
	  ?>
	  
	  
	  
	  </td>
	  <td align="center"<?php if($row['type']!='General'): ?> style="background-color:SKYBLUE;"<?php else: ?> style="" <?php endif ; ?>><?php echo $row["type"]; ?></td>
      <td align="center"><?php echo $row["adoc"]; ?>
      <td align="center"<?php if($rw==true): ?> style="background-color:VIOLET;"<?php else: ?> <?php endif ; ?>><?php echo $row["adate"]; ?>  
	  
	  
	  
	  	  	 	  <?php
$tt1=$row["pmrn"];
$date455=$row['anew'];
$rid=$row['eid'];
$tt2=$row["pname"];


$date5=date('Y-m-d');
$query43_o = "SELECT * FROM ot where pmrn= '$tt1' and date5='$date5';"; 
$result43_o = mysqli_query($con, $query43_o) or die(mysqli_error());
$row43_o = mysqli_fetch_assoc($result43_o);

$rows_ot=mysqli_num_rows($result43_o); 



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



?>

	  
	  
	  
<td align="center"><a href="diap?pmrn=<?php echo $row["pmrn"]; ?>&eid=<?php echo $row["eid"]; ?>"><span style='color:green;text-align:center;'><b><?php echo $inves;?></a></td>
      <td align="center" style="font:Verdana, Arial, Helvetica, sans-serif large" style="font-weight:bold"><?php echo $row["room"];?>  
	  <td align="center" style="font:Verdana, Arial, Helvetica, sans-serif large" style="font-weight:bold"><?php echo $row["room1"];?>  
	  <td align="center" style="font:Verdana, Arial, Helvetica, sans-serif large" style="font-weight:bold"><?php $start=$row["aadate"];$date1=date_create("$start");
$date2=date_create("$date");
$diff=date_diff($date1,$date2);
echo $diff->format("%R%a days");?>  </td>
	  <td align="center"><a href="imo_summary_treatment?pmrn=<?php echo $row["pmrn"]; ?>&eid=<?php echo $row["eid"]; ?>">Summary Treatment</a></td>
	  	  <td align="center"><a href="imotdoc?pmrn=<?php echo $row["pmrn"]; ?>&id=<?php echo $row["id"]; ?>&eid=<?php echo $row["eid"]; ?>">transfer</a></td>
<td align="center"><a href="todolist?pmrn=<?php echo $row["pmrn"]; ?>&eid=<?php echo $row["eid"]; ?>">PWL</a></td>


<td align="center"><a target='_blank' href="pcovidresult?pmrn=<?php echo "$tt1"; ?>"><?php if($tt=='P' and $dcon=='confirmed' and $diff47<=4){echo "<span style='color:red;text-align:center;'><b>POSITIVE"; }else if($tt=='N' and $dcon=='confirmed'and $diff47<=4){echo "<span style='color:green;text-align:center;'><b>NEGATIVE"; }else if($co==0){echo "<span style='color:black;text-align:center;'><b>Test Not Done Yet";}else if($diff47>4){echo "<span style='color:darkorange;text-align:center;'><b>Test Not Done Recently";} else {echo "<span style='color:blue;text-align:center;'><b>Result Pending";} ?></a>  </td>


<?php
		$m_c=$row43_o['m_clearance'];
		$rid=$row_o['id'];
		$pp=$row_o['pmrn'];
		
		$url = "otpatientreceive?pmrn=$pp&id=$rid"; 
		  
		   
		
	if($rows_ot>0 and $m_c!='')
	{ 
echo "<td align='center' style='background-color:lightgreen;'>OT Clearance Done</td>";
	}
	
	else if($rows_ot>0 and $m_c=='')
	{ 
echo "<td align='center' style='background-color:red;'>Waiting For OT Clearance</td>";
	}
	
	else 
	{ 
echo "<td align='center' style='background-color:lightblue;'></td>";
	}
	?>


	  
      </tr>
	  

    <?php $count++; } }
	
	
	
	
	else {
		
$user=$_SESSION["sess_username"];
$date= date('m/d/Y');

$count=1;
		
$sel_query="Select * from inpatient where discharge= '' order by room1 asc";

$result = mysqli_query($con,$sel_query);
while($row = mysqli_fetch_assoc($result)) { ?>
    <tr>
      <td align="center"><?php echo $count; ?></td>
<?php
$ad=date('d/m/Y H:i:s');
$pp=$row['pmrn'];
$sel="Select * from inpatient where '$ad' between alert1 and alert2 and pmrn='$pp'";

$resu = mysqli_query($con,$sel);
$rw = mysqli_fetch_assoc($resu);
?>


      <td align="center"<?php if($rw==true): ?> style="background-color:VIOLET;"<?php else: ?> <?php endif ; ?>><a href="imoidetails?pmrn=<?php echo $row["pmrn"]; ?>&eid=<?php echo $row["eid"]; ?>"><?php echo $row["pname"]; ?></a></td>
      <td align="center"><?php echo $row["pmrn"]; ?>
	  
	    <?php
	   
	   $pmrn=$row['pmrn'];
	   $baby="Select * from mo_baby where pmrn='$pmrn' or medi='$pmrn'";
$baby_result = mysqli_query($con, $baby) or die ( mysqli_error());
$data_baby = mysqli_fetch_assoc($baby_result);
$m_pmrn=$data_baby['pmrn'];
$b_pmrn=$data_baby['medi'];
$b_eid=$data_baby['beid'];
$m_eid=$data_baby['eid'];
	  if($m_pmrn==$pmrn)
	  {	  

$baby1="Select * from mo_baby where pmrn='$pmrn'";
$baby_result1 = mysqli_query($con, $baby1) or die ( mysqli_error());

  
while($data_baby1 = mysqli_fetch_assoc($baby_result1))


{ ?>
<?php $n=$data_baby1['medi'];
$n1=$data_baby1['beid'];
	
 echo'
		  <a target="_blank" href="imoidetails?pmrn='.$n.'&eid='.$n1.'"><strong><img src="baby1.png" title="Baby Details Of MRN- '.$n.'" width="50" height="50" /></strong></a>

   </a>   
		  
		  
	  ';}	
	
	

	    
		  
		

	  
 }
	  else if($b_pmrn==$pmrn){
		  
		  echo '<a target="_blank" href="imoidetails?pmrn='.$m_pmrn.'&eid='.$m_eid.'"><strong><img src="mother1.png" title="Mother Details" width="50" height="50" /></strong></a>

   </a>   ';
	  }
	  ?>
	  
	  
	  
	  </td>
	  <td align="center"<?php if($row['type']!='General'): ?> style="background-color:SKYBLUE;"<?php else: ?> style="" <?php endif ; ?>><?php echo $row["type"]; ?></td>
      <td align="center"><?php echo $row["adoc"]; ?>
      <td align="center"<?php if($rw==true): ?> style="background-color:VIOLET;"<?php else: ?> <?php endif ; ?>><?php echo $row["adate"]; ?>  
	  
	  
	  
	  	  	 	  <?php
$tt1=$row["pmrn"];
$date455=$row['anew'];
$rid=$row['eid'];
$tt2=$row["pname"];

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
/*
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



$query77="Select COUNT(inves) from diap where eid='$rid' and pmrn='$tt1' and inves LIKE '%dengu%'  ORDER BY id asc;";
$result77 = mysqli_query($con, $query77) or die(mysqli_error());
$row77 = mysqli_fetch_assoc($result77);
$count77 =$row77['COUNT(inves)'];

$date5=date('Y-m-d');
$query43_o = "SELECT * FROM ot where pmrn= '$tt1' and date5='$date5';"; 
$result43_o = mysqli_query($con, $query43_o) or die(mysqli_error());
$row43_o = mysqli_fetch_assoc($result43_o);

$rows_ot=mysqli_num_rows($result43_o); 

?>

	  
	  
	  

      <td align="center" style="font:Verdana, Arial, Helvetica, sans-serif large" style="font-weight:bold"><?php echo $row["room"];?>  
	  <td align="center" style="font:Verdana, Arial, Helvetica, sans-serif large" style="font-weight:bold"><?php echo $row["room1"];?>  
	  <td align="center" style="font:Verdana, Arial, Helvetica, sans-serif large" style="font-weight:bold"><?php $start=$row["aadate"];$date1=date_create("$start");
$date2=date_create("$date");
$diff=date_diff($date1,$date2);
echo $diff->format("%R%a days");?>  </td>
	  <td align="center"><a href="imo_summary_treatment?pmrn=<?php echo $row["pmrn"]; ?>&eid=<?php echo $row["eid"]; ?>">Summary Treatment</a></td>
	  	  <td align="center"><a href="imotdoc?pmrn=<?php echo $row["pmrn"]; ?>&id=<?php echo $row["id"]; ?>&eid=<?php echo $row["eid"]; ?>">transfer</a></td>
<td align="center"><a href="todolist?pmrn=<?php echo $row["pmrn"]; ?>&eid=<?php echo $row["eid"]; ?>">PWL</a></td>


<td align="center">  </td>

	<?php
		$m_c=$row43_o['m_clearance'];
		$rid=$row_o['id'];
		$pp=$row_o['pmrn'];
		
		$url = "otpatientreceive?pmrn=$pp&id=$rid"; 
		  
		   
		
	if($rows_ot>0 and $m_c!='')
	{ 
echo "<td align='center' style='background-color:lightgreen;'>OT Clearance Done</td>";
	}
	
	else if($rows_ot>0 and $m_c=='')
	{ 
echo "<td align='center' style='background-color:red;'>Waiting For OT Clearance</td>";
	}
	
	else 
	{ 
echo "<td align='center' style='background-color:lightblue;'></td>";
	}
	?>


	  
      </tr>
	  

    
    <?php $count++; } }
		
		
		
	
	
	
	
	?>
	
	
	  
	  <?php

if($rw3==true)
{
	$txt='One Patient is registered in PMS, Patient Name is-'.$tt4.' And Patient- '.'MRN'.$tt3;
  $txt1=htmlspecialchars($txt);
  $txt2=rawurlencode($txt1);
  $html=file_get_contents('https://translate.google.com/translate_tts?ie=UTF-8&client=gtx&q='.$txt2.'&tl=en-US');
   
	echo '
	<audio autoplay>
	<source src="data:audio/mpeg;base64,'.base64_encode($html).'">
  <source src="data:audio/ogg;base64,'.base64_encode($html).'">
 
</audio>';}?>
	
	
   </tbody>
  </table>
</form>


</body>
<script>

function check_session_id()
{
    var session_id = "<?php echo $test; ?>";

    fetch('check_login.php').then(function(response){

        return response.json();

    }).then(function(responseData){

        if(responseData.output == 'logout')
        {
            window.location.href = 'logout_new.php';
        }

    });
}

setInterval(function(){

    check_session_id();
    
}, 10000);

</script>
</html>
