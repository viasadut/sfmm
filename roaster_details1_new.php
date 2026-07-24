<?php 
    session_start();
    require('db1.php');
	$role = $_SESSION['sess_userrole'];
	
	$queryc = "SELECT COUNT(utype) FROM user where '$role' in ('mng','doctor','qc','mrd','covid','call','imo','mofficer','nurse','emergency','staff','ot','endo','bill','billin','lab')"; 
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
$row39 = mysqli_fetch_array($result39)
?>
<?php
$full = $row39['fullname'];
$id1=$_REQUEST['id1'];
$id=$_REQUEST['id'];
$sid=$_REQUEST['sid'];

$time=strtotime($id);
$month=date("F",$time);
$year=date("Y",$time);



$query3 = "SELECT * FROM staff3 where sid= '$sid'"; 
	 
$result3 = mysqli_query($con, $query3) or die(mysqli_error());

// Print out result
$row7 = mysqli_fetch_array($result3);
$dept=$row7['dept'];
$c_location=$row7['c_location'];

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

<?php 
if(isset($_POST['Submit']))
{



$odate = date('m/d/Y H:i:s');
$odate1 = date('m/d/Y');
$a = $_REQUEST['1'];
$b = $_REQUEST['2'];
$c = $_REQUEST['3'];
$d = $_REQUEST['4'];
$e = $_REQUEST['5'];
$f = $_REQUEST['6'];
$g = $_REQUEST['7'];
$h = $_REQUEST['8'];
$ii = $_REQUEST['9'];
$j = $_REQUEST['109'];
$k = $_REQUEST['11'];
$l = $_REQUEST['12'];
$m = $_REQUEST['13'];
$n = $_REQUEST['14'];
$o = $_REQUEST['15'];
$p = $_REQUEST['16'];
$q = $_REQUEST['17'];
$r = $_REQUEST['18'];
$s = $_REQUEST['19'];
$t = $_REQUEST['20'];
$u = $_REQUEST['21'];
$v = $_REQUEST['22'];
$w = $_REQUEST['23'];
$x = $_REQUEST['24'];
$y = $_REQUEST['25'];
$z = $_REQUEST['26'];
$aa = $_REQUEST['27'];
$ab = $_REQUEST['28'];
$ac = $_REQUEST['29'];
$ad = $_REQUEST['30'];
$ae = $_REQUEST['31'];






$aloc = $_REQUEST['loc1'];
$bloc = $_REQUEST['loc2'];
$cloc = $_REQUEST['loc3'];
$dloc = $_REQUEST['loc4'];
$eloc = $_REQUEST['loc5'];
$floc = $_REQUEST['loc6'];
$gloc = $_REQUEST['loc7'];
$hloc = $_REQUEST['loc8'];
$iiloc = $_REQUEST['loc9'];
$jloc = $_REQUEST['loc10'];
$kloc = $_REQUEST['loc11'];
$lloc = $_REQUEST['loc12'];
$mloc = $_REQUEST['loc13'];
$nloc = $_REQUEST['loc14'];
$oloc = $_REQUEST['loc15'];
$ploc = $_REQUEST['loc16'];
$qloc = $_REQUEST['loc17'];
$rloc = $_REQUEST['loc18'];
$sloc = $_REQUEST['loc19'];
$tloc = $_REQUEST['loc20'];
$uloc = $_REQUEST['loc21'];
$vloc = $_REQUEST['loc22'];
$wloc = $_REQUEST['loc23'];
$xloc = $_REQUEST['loc24'];
$yloc = $_REQUEST['loc25'];
$zloc = $_REQUEST['loc26'];
$aaloc = $_REQUEST['loc27'];
$abloc = $_REQUEST['loc28'];
$acloc = $_REQUEST['loc29'];
$adloc = $_REQUEST['loc30'];
$aeloc = $_REQUEST['loc31'];

$i1=$id1.'01';
$i2=$id1.'02';
$i3=$id1.'03';
$i4=$id1.'04';
$i5=$id1.'05';
$i6=$id1.'06';
$i7=$id1.'07';
$i8=$id1.'08';
$i9=$id1.'09';
$i10=$id1.'10';
$i11=$id1.'11';
$i12=$id1.'12';
$i13=$id1.'13';
$i14=$id1.'14';
$i15=$id1.'15';
$i16=$id1.'16';
$i17=$id1.'17';
$i18=$id1.'18';
$i19=$id1.'19';
$i20=$id1.'20';
$i21=$id1.'21';
$i22=$id1.'22';
$i23=$id1.'23';
$i24=$id1.'24';
$i25=$id1.'25';
$i26=$id1.'26';
$i27=$id1.'27';
$i28=$id1.'28';
$i29=$id1.'29';
$i30=$id1.'30';
$i31=$id1.'31';





$sid=$_REQUEST['sid'];
//$date3=$_REQUEST['date'];
$ddate1=date('d/m/Y h:i:s');


if($a!='' && $aloc!='')
{
		   
		   $query = " insert into roaster_2 (`emor`,`mor`,`aby`,`location`,`dept`,`date`,`adate`,`a_status`,`a_send`,`a_send_time`) values 
('$a','$sid','$fullname','$aloc','$dept','$i1','$ddate1','Pending','$user','$etime')";  
		   mysqli_query($con,$query) or die(mysql_error());
}


if($b!='' && $bloc!='')
{
		   
		   $query = " insert into roaster_2 (`emor`,`mor`,`aby`,`location`,`dept`,`date`,`adate`,`a_status`,`a_send`,`a_send_time`) values 
('$b','$sid','$fullname','$bloc','$dept','$i2','$ddate1','Pending','$user','$etime')";  
		   mysqli_query($con,$query) or die(mysql_error());
}

if($c!='' && $cloc!='')
{
		   
		   $query = " insert into roaster_2 (`emor`,`mor`,`aby`,`location`,`dept`,`date`,`adate`,`a_status`,`a_send`,`a_send_time`) values 
('$c','$sid','$fullname','$cloc','$dept','$i3','$ddate1','Pending','$user','$etime')";  
		   mysqli_query($con,$query) or die(mysql_error());
}
		   
if($d!='' && $dloc!='')
{
		   
		   $query = " insert into roaster_2 (`emor`,`mor`,`aby`,`location`,`dept`,`date`,`adate`,`a_status`,`a_send`,`a_send_time`) values 
('$d','$sid','$fullname','$dloc','$dept','$i4','$ddate1','Pending','$user','$etime')";  
		   mysqli_query($con,$query) or die(mysql_error());
}		   
		   
		   
if($e!='' && $eloc!='')
{
		   
		   $query = " insert into roaster_2 (`emor`,`mor`,`aby`,`location`,`dept`,`date`,`adate`,`a_status`,`a_send`,`a_send_time`) values 
('$e','$sid','$fullname','$eloc','$dept','$i5','$ddate1','Pending','$user','$etime')";  
		   mysqli_query($con,$query) or die(mysql_error());
}
		   
		   if($f!='' && $floc!='')
{
		   
		   $query = " insert into roaster_2 (`emor`,`mor`,`aby`,`location`,`dept`,`date`,`adate`,`a_status`,`a_send`,`a_send_time`) values 
('$f','$sid','$fullname','$floc','$dept','$i6','$ddate1','Pending','$user','$etime')";  
		   mysqli_query($con,$query) or die(mysql_error());
}
		   
		   if($g!='' && $gloc!='')
{
		   
		   $query = " insert into roaster_2 (`emor`,`mor`,`aby`,`location`,`dept`,`date`,`adate`,`a_status`,`a_send`,`a_send_time`) values 
('$g','$sid','$fullname','$gloc','$dept','$i7','$ddate1','Pending','$user','$etime')";  
		   mysqli_query($con,$query) or die(mysql_error());
}

		   if($h!='' && $hloc!='')
{
		   
		   $query = " insert into roaster_2 (`emor`,`mor`,`aby`,`location`,`dept`,`date`,`adate`,`a_status`,`a_send`,`a_send_time`) values 
('$h','$sid','$fullname','$hloc','$dept','$i8','$ddate1','Pending','$user','$etime')";  
		   mysqli_query($con,$query) or die(mysql_error());
}


		   if($ii!='' && $iiloc!='')
{
		   
		   $query = " insert into roaster_2 (`emor`,`mor`,`aby`,`location`,`dept`,`date`,`adate`,`a_status`,`a_send`,`a_send_time`) values 
('$ii','$sid','$fullname','$iiloc','$dept','$i9','$ddate1','Pending','$user','$etime')";  
		   mysqli_query($con,$query) or die(mysql_error());
}


		   if($j!='' && $jloc!='')
{
		   
		   $query = " insert into roaster_2 (`emor`,`mor`,`aby`,`location`,`dept`,`date`,`adate`,`a_status`,`a_send`,`a_send_time`) values 
('$j','$sid','$fullname','$jloc','$dept','$i10','$ddate1','Pending','$user','$etime')";  
		   mysqli_query($con,$query) or die(mysql_error());
}


		   if($k!='' && $kloc!='')
{
		   
		   $query = " insert into roaster_2 (`emor`,`mor`,`aby`,`location`,`dept`,`date`,`adate`,`a_status`,`a_send`,`a_send_time`) values 
('$k','$sid','$fullname','$kloc','$dept','$i11','$ddate1','Pending','$user','$etime')";  
		   mysqli_query($con,$query) or die(mysql_error());
}


		   if($l!='' && $lloc!='')
{
		   
		   $query = " insert into roaster_2 (`emor`,`mor`,`aby`,`location`,`dept`,`date`,`adate`,`a_status`,`a_send`,`a_send_time`) values 
('$l','$sid','$fullname','$lloc','$dept','$i12','$ddate1','Pending','$user','$etime')";  
		   mysqli_query($con,$query) or die(mysql_error());
}


		   if($m!='' && $mloc!='')
{
		   
		   $query = " insert into roaster_2 (`emor`,`mor`,`aby`,`location`,`dept`,`date`,`adate`,`a_status`,`a_send`,`a_send_time`) values 
('$m','$sid','$fullname','$mloc','$dept','$i13','$ddate1','Pending','$user','$etime')";  
		   mysqli_query($con,$query) or die(mysql_error());
}


		   if($n!='' && $nloc!='')
{
		   
		   $query = " insert into roaster_2 (`emor`,`mor`,`aby`,`location`,`dept`,`date`,`adate`,`a_status`,`a_send`,`a_send_time`) values 
('$n','$sid','$fullname','$nloc','$dept','$i14','$ddate1','Pending','$user','$etime')";  
		   mysqli_query($con,$query) or die(mysql_error());
}



		   if($o!='' && $oloc!='')
{
		   
		   $query = " insert into roaster_2 (`emor`,`mor`,`aby`,`location`,`dept`,`date`,`adate`,`a_status`,`a_send`,`a_send_time`) values 
('$o','$sid','$fullname','$oloc','$dept','$i15','$ddate1','Pending','$user','$etime')";  
		   mysqli_query($con,$query) or die(mysql_error());
}


		   if($p!='' && $ploc!='')
{
		   
		   $query = " insert into roaster_2 (`emor`,`mor`,`aby`,`location`,`dept`,`date`,`adate`,`a_status`,`a_send`,`a_send_time`) values 
('$p','$sid','$fullname','$ploc','$dept','$i16','$ddate1','Pending','$user','$etime')";  
		   mysqli_query($con,$query) or die(mysql_error());
}

		   if($q!='' && $qloc!='')
{
		   
		   $query = " insert into roaster_2 (`emor`,`mor`,`aby`,`location`,`dept`,`date`,`adate`,`a_status`,`a_send`,`a_send_time`) values 
('$q','$sid','$fullname','$qloc','$dept','$i17','$ddate1','Pending','$user','$etime')";  
		   mysqli_query($con,$query) or die(mysql_error());
}


		   if($r!='' && $rloc!='')
{
		   
		   $query = " insert into roaster_2 (`emor`,`mor`,`aby`,`location`,`dept`,`date`,`adate`,`a_status`,`a_send`,`a_send_time`) values 
('$r','$sid','$fullname','$rloc','$dept','$i18','$ddate1','Pending','$user','$etime')";  
		   mysqli_query($con,$query) or die(mysql_error());
}

		   if($s!='' && $sloc!='')
{
		   
		   $query = " insert into roaster_2 (`emor`,`mor`,`aby`,`location`,`dept`,`date`,`adate`,`a_status`,`a_send`,`a_send_time`) values 
('$s','$sid','$fullname','$sloc','$dept','$i19','$ddate1','Pending','$user','$etime')";  
		   mysqli_query($con,$query) or die(mysql_error());
}


		   if($t!='' && $tloc!='')
{
		   
		   $query = " insert into roaster_2 (`emor`,`mor`,`aby`,`location`,`dept`,`date`,`adate`,`a_status`,`a_send`,`a_send_time`) values 
('$t','$sid','$fullname','$tloc','$dept','$i20','$ddate1','Pending','$user','$etime')";  
		   mysqli_query($con,$query) or die(mysql_error());
}

		   if($u!='' && $uloc!='')
{
		   
		   $query = " insert into roaster_2 (`emor`,`mor`,`aby`,`location`,`dept`,`date`,`adate`,`a_status`,`a_send`,`a_send_time`) values 
('$u','$sid','$fullname','$uloc','$dept','$i21','$ddate1','Pending','$user','$etime')";  
		   mysqli_query($con,$query) or die(mysql_error());
}


if($v!='' && $vloc!='')
{
		   
		   $query = " insert into roaster_2 (`emor`,`mor`,`aby`,`location`,`dept`,`date`,`adate`,`a_status`,`a_send`,`a_send_time`) values 
('$v','$sid','$fullname','$vloc','$dept','$i22','$ddate1','Pending','$user','$etime')";  
		   mysqli_query($con,$query) or die(mysql_error());
}


		   if($w!='' && $wloc!='')
{
		   
		   $query = " insert into roaster_2 (`emor`,`mor`,`aby`,`location`,`dept`,`date`,`adate`,`a_status`,`a_send`,`a_send_time`) values 
('$w','$sid','$fullname','$wloc','$dept','$i23','$ddate1','Pending','$user','$etime')";  
		   mysqli_query($con,$query) or die(mysql_error());
}


		   if($x!='' && $xloc!='')
{
		   
		   $query = " insert into roaster_2 (`emor`,`mor`,`aby`,`location`,`dept`,`date`,`adate`,`a_status`,`a_send`,`a_send_time`) values 
('$x','$sid','$fullname','$xloc','$dept','$i24','$ddate1','Pending','$user','$etime')";  
		   mysqli_query($con,$query) or die(mysql_error());
		   
}

		   if($y!='' && $yloc!='')
{
		   
		   $query = " insert into roaster_2 (`emor`,`mor`,`aby`,`location`,`dept`,`date`,`adate`,`a_status`,`a_send`,`a_send_time`) values 
('$y','$sid','$fullname','$yloc','$dept','$i25','$ddate1','Pending','$user','$etime')";  
		   mysqli_query($con,$query) or die(mysql_error());
}


		   if($z!='' && $zloc!='')
{
		   
		   $query = " insert into roaster_2 (`emor`,`mor`,`aby`,`location`,`dept`,`date`,`adate`,`a_status`,`a_send`,`a_send_time`) values 
('$z','$sid','$fullname','$zloc','$dept','$i26','$ddate1','Pending','$user','$etime')";  
		   mysqli_query($con,$query) or die(mysql_error());
}


		   if($aa!='' && $aaloc!='')
{
		   
		   $query = " insert into roaster_2 (`emor`,`mor`,`aby`,`location`,`dept`,`date`,`adate`,`a_status`,`a_send`,`a_send_time`) values 
('$aa','$sid','$fullname','$aaloc','$dept','$i27','$ddate1','Pending','$user','$etime')";  
		   mysqli_query($con,$query) or die(mysql_error());
}

		   if($ab!='' && $abloc!='')
{
		   
		   $query = " insert into roaster_2 (`emor`,`mor`,`aby`,`location`,`dept`,`date`,`adate`,`a_status`,`a_send`,`a_send_time`) values 
('$ab','$sid','$fullname','$abloc','$dept','$i28','$ddate1','Pending','$user','$etime')";  
		   mysqli_query($con,$query) or die(mysql_error());
}

		   if($ac!='' && $acloc!='')
{
		   
		   $query = " insert into roaster_2 (`emor`,`mor`,`aby`,`location`,`dept`,`date`,`adate`,`a_status`,`a_send`,`a_send_time`) values 
('$ac','$sid','$fullname','$acloc','$dept','$i29','$ddate1','Pending','$user','$etime')";  
		   mysqli_query($con,$query) or die(mysql_error());
}

		   if($ad!='' && $adloc!='')
{
		   
		   $query = " insert into roaster_2 (`emor`,`mor`,`aby`,`location`,`dept`,`date`,`adate`,`a_status`,`a_send`,`a_send_time`) values 
('$ad','$sid','$fullname','$adloc','$dept','$i30','$ddate1','Pending','$user','$etime')";  
		   mysqli_query($con,$query) or die(mysql_error());
}

		   if($ae!='' && $aeloc!='')
{
		   
		   $query = " insert into roaster_2 (`emor`,`mor`,`aby`,`location`,`dept`,`date`,`adate`,`a_status`,`a_send`,`a_send_time`) values 
('$ae','$sid','$fullname','$aeloc','$dept','$i31','$ddate1','Pending','$user','$etime')";  
		   mysqli_query($con,$query) or die(mysql_error());
}

		   if($ff!='' && $ffloc!='')
{
		   
		   $query = " insert into roaster_2 (`emor`,`mor`,`aby`,`location`,`dept`,`date`,`adate`,`a_status`,`a_send`,`a_send_time`) values 
('$ff','$sid','$fullname','$aloc','$dept','$i31','$ddate1','Pending','$user','$etime')";  
		   mysqli_query($con,$query) or die(mysql_error());
}





$url = "roaster_details1_new1?id=$id&id1=$id1" ;
header("Location:$url");


}







?>


<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<title>View Records</title>

<style type="text/css">
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

button {
  padding: 19px 39px 18px 39px;
  color: #FFF;
  background-color: lightgreen;
  /*#4bc970*/
  font-size: 18px;
  text-align: center;
  font-style: normal;
  border-radius: 5px;
  width: 20%;
  border: 1px solid #8265B0;
  /*#3ac162*/
  border-width: 1px 1px 3px;
  box-shadow: 0 -1px 0 rgba(255,255,255,0.1) inset;
  margin-bottom: 10px;
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


@media screen and (min-width: 1500px) {

  form {
    max-width: 5000px;
  }

}






* {
    box-sizing: border-box;
}
#data {
    overflow:hidden;
    padding:0;
	width:94vw;
	
}
select {
	padding:0;
	padding-left:1px;
	border:none;
	background-color:#eee;
	width:10vw;
	white-space: normal;
	height:30px;
}
option {
	height:40px;
	width:52px;
	border:1px solid #000;
	background-color:white;
	margin-left:-1px;
	display:inline-block;
}

</style>


   <link rel="stylesheet" href="styles.css">

   


<script type="text/javascript">
function confirm_click()
{
return confirm("Are you Sure to Approve this Leave ?");
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
<h1 align="center" class="style1"><?php echo 'Roster Of ' .$row7['sname']. ' For Month Of '.$month.' '.$year;?></h1> 
<p align="right"> <?php echo "Date:" ?> <?php echo date('d/m/Y')?> </p>


<form action="" method="POST">
<table border="1" align="center" bgcolor="#FFFF99" style="border-collapse:collapse;" id="myTable">

    <tr>

      <th ><strong><?php echo $id1.'01'?></strong></th>
	  <th ><strong><?php echo $id1.'02'?></strong></th>
      <th ><strong><?php echo $id1.'03'?></strong></th>
	  <th ><strong><?php echo $id1.'04'?></strong></th>
	  <th ><strong><?php echo $id1.'05'?></strong></th>
	  <th ><strong><?php echo $id1.'06'?></strong></th>
	  <th ><strong><?php echo $id1.'07'?></strong></th>
	  <th ><strong><?php echo $id1.'08'?></strong></th>
	  <th ><strong><?php echo $id1.'09'?></strong></th>
	  <th ><strong><?php echo $id1.'10'?></strong></th>
	  <th ><strong><?php echo $id1.'11'?></strong></th>
	  <th ><strong><?php echo $id1.'12'?></strong></th>
	  <th ><strong><?php echo $id1.'13'?></strong></th>
	  <th ><strong><?php echo $id1.'14'?></strong></th>
	  <th ><strong><?php echo $id1.'15'?></strong></th>
	  <th ><strong><?php echo $id1.'16'?></strong></th>
	  <th ><strong><?php echo $id1.'17'?></strong></th>
	  <th ><strong><?php echo $id1.'18'?></strong></th>
	  <th ><strong><?php echo $id1.'19'?></strong></th>
	  <th ><strong><?php echo $id1.'20'?></strong></th>
	  <th ><strong><?php echo $id1.'21'?></strong></th>
	  <th ><strong><?php echo $id1.'22'?></strong></th>
	  <th ><strong><?php echo $id1.'23'?></strong></th>
	  <th ><strong><?php echo $id1.'24'?></strong></th>
	  <th ><strong><?php echo $id1.'25'?></strong></th>
	  <th ><strong><?php echo $id1.'26'?></strong></th>
	  <th ><strong><?php echo $id1.'27'?></strong></th>
	  <th ><strong><?php echo $id1.'28'?></strong></th>
	  <th ><strong><?php echo $id1.'29'?></strong></th>
	  <th ><strong><?php echo $id1.'30'?></strong></th>
	  <th ><strong><?php echo $id1.'31'?></strong></th>
      
	   </tr>
  </thead>
  <tbody>
  
   

      
<th ><strong><select type="text" name="1" id="pbp31" class="form-control" >
			<option value=''>-Select-</option>    
			<?php 
			$sql = "Select * from roster_duty_schedule order by schedule_name asc;";
			$res = mysqli_query($con, $sql);
			if(mysqli_num_rows($res) > 0) {
				while($row = mysqli_fetch_object($res)) {
					echo "<option value='".$row->schedule_name."'>".$row->schedule_name."</option>";
				}
			}
			?>
			
			
			
		  </select></strong>
		  
		  
		  <select type="text" name="loc1" id="loc" class="form-control" placeholder='Location'>
				
                   <option value='<?php echo $c_location;?>'selected><?php echo $c_location;?></option>
			<?php 
			$sql = "Select * from roaster_location where dept='$dept';";
			$res = mysqli_query($con, $sql);
			if(mysqli_num_rows($res) > 0) {
				while($row = mysqli_fetch_object($res)) {
					echo "<option value='".$row->loc."'>".$row->loc."</option>";
				}
			}
			?>
			
			<option value='Off'>Off</option>    
		  </select>

		  
		  </th>
	  <th ><strong><select type="text" name="2" id="pbp31" class="form-control" >
			<option value=''>-Select-</option>    
			<?php 
			$sql = "Select * from roster_duty_schedule order by schedule_name asc;";
			$res = mysqli_query($con, $sql);
			if(mysqli_num_rows($res) > 0) {
				while($row = mysqli_fetch_object($res)) {
					echo "<option value='".$row->schedule_name."'>".$row->schedule_name."</option>";
				}
			}
			?>
			
			
			
		  </select>
		  </strong>
		  
		  <select type="text" name="loc2" id="loc" class="form-control" placeholder='Location'>
				
                   <option value='<?php echo $c_location;?>'selected><?php echo $c_location;?></option> 
			<?php 
			$sql = "Select * from roaster_location where dept='$dept';";
			$res = mysqli_query($con, $sql);
			if(mysqli_num_rows($res) > 0) {
				while($row = mysqli_fetch_object($res)) {
					echo "<option value='".$row->loc."'>".$row->loc."</option>";
				}
			}
			?>
			
			<option value='Off'>Off</option>    
		  </select>
		  </th>
      <th ><strong><select type="text" name="3" id="pbp31" class="form-control" >
			<option value=''>-Select-</option>    
			<?php 
			$sql = "Select * from roster_duty_schedule order by schedule_name asc;";
			$res = mysqli_query($con, $sql);
			if(mysqli_num_rows($res) > 0) {
				while($row = mysqli_fetch_object($res)) {
					echo "<option value='".$row->schedule_name."'>".$row->schedule_name."</option>";
				}
			}
			?>
			
			
			
		  </select></strong>
		  
		  <select type="text" name="loc3" id="loc" class="form-control" placeholder='Location'>
				
                   <option value='<?php echo $c_location;?>'selected><?php echo $c_location;?></option>
			<?php 
			$sql = "Select * from roaster_location where dept='$dept';";
			$res = mysqli_query($con, $sql);
			if(mysqli_num_rows($res) > 0) {
				while($row = mysqli_fetch_object($res)) {
					echo "<option value='".$row->loc."'>".$row->loc."</option>";
				}
			}
			?>
			
			<option value='Off'>Off</option>    
		  </select>
		  
		  </th>
	  <th ><strong><select type="text" name="4" id="pbp31" class="form-control" >
			<option value=''>-Select-</option>    
			<?php 
			$sql = "Select * from roster_duty_schedule order by schedule_name asc;";
			$res = mysqli_query($con, $sql);
			if(mysqli_num_rows($res) > 0) {
				while($row = mysqli_fetch_object($res)) {
					echo "<option value='".$row->schedule_name."'>".$row->schedule_name."</option>";
				}
			}
			?>
			
			
			
		  </select></strong>
		  
		  <select type="text" name="loc4" id="loc" class="form-control" placeholder='Location'>
				
                   <option value='<?php echo $c_location;?>'selected><?php echo $c_location;?></option>
			<?php 
			$sql = "Select * from roaster_location where dept='$dept';";
			$res = mysqli_query($con, $sql);
			if(mysqli_num_rows($res) > 0) {
				while($row = mysqli_fetch_object($res)) {
					echo "<option value='".$row->loc."'>".$row->loc."</option>";
				}
			}
			?>
			
			<option value='Off'>Off</option>    
		  </select>
		  
		  </th>
	  <th ><strong><select type="text" name="5" id="pbp31" class="form-control" >
			<option value=''>-Select-</option>    
			<?php 
			$sql = "Select * from roster_duty_schedule order by schedule_name asc;";
			$res = mysqli_query($con, $sql);
			if(mysqli_num_rows($res) > 0) {
				while($row = mysqli_fetch_object($res)) {
					echo "<option value='".$row->schedule_name."'>".$row->schedule_name."</option>";
				}
			}
			?>
			
			
			
		  </select></strong>
		  
		  <select type="text" name="loc5" id="loc" class="form-control" placeholder='Location'>
				
                   <option value='<?php echo $c_location;?>'selected><?php echo $c_location;?></option>
			<?php 
			$sql = "Select * from roaster_location where dept='$dept';";
			$res = mysqli_query($con, $sql);
			if(mysqli_num_rows($res) > 0) {
				while($row = mysqli_fetch_object($res)) {
					echo "<option value='".$row->loc."'>".$row->loc."</option>";
				}
			}
			?>
			
			<option value='Off'>Off</option>    
		  </select>
		  
		  </th>
	  <th ><strong><select type="text" name="6" id="pbp31" class="form-control" >
			<option value=''>-Select-</option>    
			<?php 
			$sql = "Select * from roster_duty_schedule order by schedule_name asc;";
			$res = mysqli_query($con, $sql);
			if(mysqli_num_rows($res) > 0) {
				while($row = mysqli_fetch_object($res)) {
					echo "<option value='".$row->schedule_name."'>".$row->schedule_name."</option>";
				}
			}
			?>
			
			
			
		  </select></strong>
		  
		  <select type="text" name="loc6" id="loc" class="form-control" placeholder='Location'>
				
                   <option value='<?php echo $c_location;?>'selected><?php echo $c_location;?></option>
			<?php 
			$sql = "Select * from roaster_location where dept='$dept';";
			$res = mysqli_query($con, $sql);
			if(mysqli_num_rows($res) > 0) {
				while($row = mysqli_fetch_object($res)) {
					echo "<option value='".$row->loc."'>".$row->loc."</option>";
				}
			}
			?>
			
			<option value='Off'>Off</option>    
		  </select>
		  
		  </th>
	  <th ><strong><select type="text" name="7" id="pbp31" class="form-control" >
			<option value=''>-Select-</option>    
			<?php 
			$sql = "Select * from roster_duty_schedule order by schedule_name asc;";
			$res = mysqli_query($con, $sql);
			if(mysqli_num_rows($res) > 0) {
				while($row = mysqli_fetch_object($res)) {
					echo "<option value='".$row->schedule_name."'>".$row->schedule_name."</option>";
				}
			}
			?>
			
			
			
		  </select></strong>
		  
		  <select type="text" name="loc7" id="loc" class="form-control" placeholder='Location'>
				
                   <option value='<?php echo $c_location;?>'selected><?php echo $c_location;?></option>
			<?php 
			$sql = "Select * from roaster_location where dept='$dept';";
			$res = mysqli_query($con, $sql);
			if(mysqli_num_rows($res) > 0) {
				while($row = mysqli_fetch_object($res)) {
					echo "<option value='".$row->loc."'>".$row->loc."</option>";
				}
			}
			?>
			
			<option value='Off'>Off</option>    
		  </select>
		  
		  
		  </th>
	  <th ><strong><select type="text" name="8" id="pbp31" class="form-control" >
			<option value=''>-Select-</option>    
			<?php 
			$sql = "Select * from roster_duty_schedule order by schedule_name asc;";
			$res = mysqli_query($con, $sql);
			if(mysqli_num_rows($res) > 0) {
				while($row = mysqli_fetch_object($res)) {
					echo "<option value='".$row->schedule_name."'>".$row->schedule_name."</option>";
				}
			}
			?>
			
			
			
		  </select></strong>
		  
		  <select type="text" name="loc8" id="loc" class="form-control" placeholder='Location'>
				
                   <option value='<?php echo $c_location;?>'selected><?php echo $c_location;?></option>
			<?php 
			$sql = "Select * from roaster_location where dept='$dept';";
			$res = mysqli_query($con, $sql);
			if(mysqli_num_rows($res) > 0) {
				while($row = mysqli_fetch_object($res)) {
					echo "<option value='".$row->loc."'>".$row->loc."</option>";
				}
			}
			?>
			
			<option value='Off'>Off</option>    
		  </select>
		  
		  </th>
	  <th ><strong><select type="text" name="9" id="pbp31" class="form-control" >
			<option value=''>-Select-</option>    
			<?php 
			$sql = "Select * from roster_duty_schedule order by schedule_name asc;";
			$res = mysqli_query($con, $sql);
			if(mysqli_num_rows($res) > 0) {
				while($row = mysqli_fetch_object($res)) {
					echo "<option value='".$row->schedule_name."'>".$row->schedule_name."</option>";
				}
			}
			?>
			
			
			
		  </select></strong>
		  
		  <select type="text" name="loc9" id="loc" class="form-control" placeholder='Location'>
				
                   <option value='<?php echo $c_location;?>'selected><?php echo $c_location;?></option>
			<?php 
			$sql = "Select * from roaster_location where dept='$dept';";
			$res = mysqli_query($con, $sql);
			if(mysqli_num_rows($res) > 0) {
				while($row = mysqli_fetch_object($res)) {
					echo "<option value='".$row->loc."'>".$row->loc."</option>";
				}
			}
			?>
			
			<option value='Off'>Off</option>    
		  </select>
		  
		  </th>
	  <th ><strong><select type="text" name="109" id="pbp31" class="form-control" >
			<option value=''>-Select-</option>    
			<?php 
			$sql = "Select * from roster_duty_schedule order by schedule_name asc;";
			$res = mysqli_query($con, $sql);
			if(mysqli_num_rows($res) > 0) {
				while($row = mysqli_fetch_object($res)) {
					echo "<option value='".$row->schedule_name."'>".$row->schedule_name."</option>";
				}
			}
			?>
			
			
			
		  </select></strong>
		  
		  <select type="text" name="loc10" id="loc" class="form-control">
				
                   <option value='<?php echo $c_location;?>'selected><?php echo $c_location;?></option> 
			<?php 
			$sql = "Select * from roaster_location where dept='$dept';";
			$res = mysqli_query($con, $sql);
			if(mysqli_num_rows($res) > 0) {
				while($row = mysqli_fetch_object($res)) {
					echo "<option value='".$row->loc."'>".$row->loc."</option>";
				}
			}
			?>
			
			<option value='Off'>Off</option>    
		  </select>
		  
		  </th>
	  <th ><strong><select type="text" name="11" id="pbp31" class="form-control" >
			<option value=''>-Select-</option>    
			<?php 
			$sql = "Select * from roster_duty_schedule order by schedule_name asc;";
			$res = mysqli_query($con, $sql);
			if(mysqli_num_rows($res) > 0) {
				while($row = mysqli_fetch_object($res)) {
					echo "<option value='".$row->schedule_name."'>".$row->schedule_name."</option>";
				}
			}
			?>
			
			
			
		  </select></strong>
		  
		  <select type="text" name="loc11" id="loc" class="form-control" placeholder='Location'>
				
                   <option value='<?php echo $c_location;?>'selected><?php echo $c_location;?></option> 
			<?php 
			$sql = "Select * from roaster_location where dept='$dept';";
			$res = mysqli_query($con, $sql);
			if(mysqli_num_rows($res) > 0) {
				while($row = mysqli_fetch_object($res)) {
					echo "<option value='".$row->loc."'>".$row->loc."</option>";
				}
			}
			?>
			
			<option value='Off'>Off</option>    
		  </select>
		  
		  </th>
	  <th ><strong><select type="text" name="12" id="pbp31" class="form-control" >
			<option value=''>-Select-</option>    
			<?php 
			$sql = "Select * from roster_duty_schedule order by schedule_name asc;";
			$res = mysqli_query($con, $sql);
			if(mysqli_num_rows($res) > 0) {
				while($row = mysqli_fetch_object($res)) {
					echo "<option value='".$row->schedule_name."'>".$row->schedule_name."</option>";
				}
			}
			?>
			
			
			
		  </select></strong>
		  <select type="text" name="loc12" id="loc" class="form-control" placeholder='Location'>
				
                   <option value='<?php echo $c_location;?>'selected><?php echo $c_location;?></option>
			<?php 
			$sql = "Select * from roaster_location where dept='$dept';";
			$res = mysqli_query($con, $sql);
			if(mysqli_num_rows($res) > 0) {
				while($row = mysqli_fetch_object($res)) {
					echo "<option value='".$row->loc."'>".$row->loc."</option>";
				}
			}
			?>
			
			<option value='Off'>Off</option>    
		  </select>
		  
		  </th>
	  <th ><strong><select type="text" name="13" id="pbp31" class="form-control" >
			<option value=''>-Select-</option>    
			<?php 
			$sql = "Select * from roster_duty_schedule order by schedule_name asc;";
			$res = mysqli_query($con, $sql);
			if(mysqli_num_rows($res) > 0) {
				while($row = mysqli_fetch_object($res)) {
					echo "<option value='".$row->schedule_name."'>".$row->schedule_name."</option>";
				}
			}
			?>
			
			
			
		  </select></strong>
		  
		  <select type="text" name="loc13" id="loc" class="form-control" placeholder='Location'>
				
                   <option value='<?php echo $c_location;?>'selected><?php echo $c_location;?></option>
			<?php 
			$sql = "Select * from roaster_location where dept='$dept';";
			$res = mysqli_query($con, $sql);
			if(mysqli_num_rows($res) > 0) {
				while($row = mysqli_fetch_object($res)) {
					echo "<option value='".$row->loc."'>".$row->loc."</option>";
				}
			}
			?>
			
			<option value='Off'>Off</option>    
		  </select>
		  
		  </th>
	  <th ><strong><select type="text" name="14" id="pbp31" class="form-control" >
			<option value=''>-Select-</option>    
			<?php 
			$sql = "Select * from roster_duty_schedule order by schedule_name asc;";
			$res = mysqli_query($con, $sql);
			if(mysqli_num_rows($res) > 0) {
				while($row = mysqli_fetch_object($res)) {
					echo "<option value='".$row->schedule_name."'>".$row->schedule_name."</option>";
				}
			}
			?>
			
			
			
		  </select></strong>
		  
		  <select type="text" name="loc14" id="loc" class="form-control" placeholder='Location'>
				
                   <option value='<?php echo $c_location;?>'selected><?php echo $c_location;?></option>
			<?php 
			$sql = "Select * from roaster_location where dept='$dept';";
			$res = mysqli_query($con, $sql);
			if(mysqli_num_rows($res) > 0) {
				while($row = mysqli_fetch_object($res)) {
					echo "<option value='".$row->loc."'>".$row->loc."</option>";
				}
			}
			?>
			
			<option value='Off'>Off</option>    
		  </select>
		  
		  </th>
	  <th ><strong><select type="text" name="15" id="pbp31" class="form-control" >
			<option value=''>-Select-</option>    
			<?php 
			$sql = "Select * from roster_duty_schedule order by schedule_name asc;";
			$res = mysqli_query($con, $sql);
			if(mysqli_num_rows($res) > 0) {
				while($row = mysqli_fetch_object($res)) {
					echo "<option value='".$row->schedule_name."'>".$row->schedule_name."</option>";
				}
			}
			?>
			
			
			
		  </select></strong>
		  
		  <select type="text" name="loc15" id="loc" class="form-control" placeholder='Location'>
				
                   <option value='<?php echo $c_location;?>'selected><?php echo $c_location;?></option>
			<?php 
			$sql = "Select * from roaster_location where dept='$dept';";
			$res = mysqli_query($con, $sql);
			if(mysqli_num_rows($res) > 0) {
				while($row = mysqli_fetch_object($res)) {
					echo "<option value='".$row->loc."'>".$row->loc."</option>";
				}
			}
			?>
			
			<option value='Off'>Off</option>    
		  </select>
		  
		  </th>
	  <th ><strong><select type="text" name="16" id="pbp31" class="form-control" >
			<option value=''>-Select-</option>    
			<?php 
			$sql = "Select * from roster_duty_schedule order by schedule_name asc;";
			$res = mysqli_query($con, $sql);
			if(mysqli_num_rows($res) > 0) {
				while($row = mysqli_fetch_object($res)) {
					echo "<option value='".$row->schedule_name."'>".$row->schedule_name."</option>";
				}
			}
			?>
			
			
			
		  </select></strong>
		  <select type="text" name="loc16" id="loc" class="form-control" placeholder='Location'>
				
                   <option value='<?php echo $c_location;?>'selected><?php echo $c_location;?></option>  
			<?php 
			$sql = "Select * from roaster_location where dept='$dept';";
			$res = mysqli_query($con, $sql);
			if(mysqli_num_rows($res) > 0) {
				while($row = mysqli_fetch_object($res)) {
					echo "<option value='".$row->loc."'>".$row->loc."</option>";
				}
			}
			?>
			
			<option value='Off'>Off</option>    
		  </select>
		  
		  </th>
	  <th ><strong><select type="text" name="17" id="pbp31" class="form-control" >
			<option value=''>-Select-</option>    
			<?php 
			$sql = "Select * from roster_duty_schedule order by schedule_name asc;";
			$res = mysqli_query($con, $sql);
			if(mysqli_num_rows($res) > 0) {
				while($row = mysqli_fetch_object($res)) {
					echo "<option value='".$row->schedule_name."'>".$row->schedule_name."</option>";
				}
			}
			?>
			
			
			
		  </select></strong>
		  
		  <select type="text" name="loc17" id="loc" class="form-control" placeholder='Location'>
				
                   <option value='<?php echo $c_location;?>'selected><?php echo $c_location;?></option> 
			<?php 
			$sql = "Select * from roaster_location where dept='$dept';";
			$res = mysqli_query($con, $sql);
			if(mysqli_num_rows($res) > 0) {
				while($row = mysqli_fetch_object($res)) {
					echo "<option value='".$row->loc."'>".$row->loc."</option>";
				}
			}
			?>
			
			<option value='Off'>Off</option>    
		  </select>
		  </th>
	  <th ><strong><select type="text" name="18" id="pbp31" class="form-control" >
			<option value=''>-Select-</option>    
			<?php 
			$sql = "Select * from roster_duty_schedule order by schedule_name asc;";
			$res = mysqli_query($con, $sql);
			if(mysqli_num_rows($res) > 0) {
				while($row = mysqli_fetch_object($res)) {
					echo "<option value='".$row->schedule_name."'>".$row->schedule_name."</option>";
				}
			}
			?>
			
			
			
		  </select></strong>
		  
		  <select type="text" name="loc18" id="loc" class="form-control" placeholder='Location'>
				
                   <option value='<?php echo $c_location;?>'selected><?php echo $c_location;?></option> 
			<?php 
			$sql = "Select * from roaster_location where dept='$dept';";
			$res = mysqli_query($con, $sql);
			if(mysqli_num_rows($res) > 0) {
				while($row = mysqli_fetch_object($res)) {
					echo "<option value='".$row->loc."'>".$row->loc."</option>";
				}
			}
			?>
			
			<option value='Off'>Off</option>    
		  </select>
		  </th>
	  <th ><strong><select type="text" name="19" id="pbp31" class="form-control" >
			<option value=''>-Select-</option>    
			<?php 
			$sql = "Select * from roster_duty_schedule order by schedule_name asc;";
			$res = mysqli_query($con, $sql);
			if(mysqli_num_rows($res) > 0) {
				while($row = mysqli_fetch_object($res)) {
					echo "<option value='".$row->schedule_name."'>".$row->schedule_name."</option>";
				}
			}
			?>
			
			
			
		  </select></strong>
		  <select type="text" name="loc19" id="loc" class="form-control" placeholder='Location'>
				
                   <option value='<?php echo $c_location;?>'selected><?php echo $c_location;?></option> 
			<?php 
			$sql = "Select * from roaster_location where dept='$dept';";
			$res = mysqli_query($con, $sql);
			if(mysqli_num_rows($res) > 0) {
				while($row = mysqli_fetch_object($res)) {
					echo "<option value='".$row->loc."'>".$row->loc."</option>";
				}
			}
			?>
			
			<option value='Off'>Off</option>    
		  </select>
		  </th>
	  <th ><strong><select type="text" name="20" id="pbp31" class="form-control" >
			<option value=''>-Select-</option>    
			<?php 
			$sql = "Select * from roster_duty_schedule order by schedule_name asc;";
			$res = mysqli_query($con, $sql);
			if(mysqli_num_rows($res) > 0) {
				while($row = mysqli_fetch_object($res)) {
					echo "<option value='".$row->schedule_name."'>".$row->schedule_name."</option>";
				}
			}
			?>
			
			
			
		  </select></strong>
		  
		  <select type="text" name="loc20" id="loc" class="form-control" placeholder='Location'>
				
                   <option value='<?php echo $c_location;?>'selected><?php echo $c_location;?></option>
			<?php 
			$sql = "Select * from roaster_location where dept='$dept';";
			$res = mysqli_query($con, $sql);
			if(mysqli_num_rows($res) > 0) {
				while($row = mysqli_fetch_object($res)) {
					echo "<option value='".$row->loc."'>".$row->loc."</option>";
				}
			}
			?>
			
			<option value='Off'>Off</option>    
		  </select>
		  </th>
	  <th ><strong><select type="text" name="21" id="pbp31" class="form-control" >
			<option value=''>-Select-</option>    
			<?php 
			$sql = "Select * from roster_duty_schedule order by schedule_name asc;";
			$res = mysqli_query($con, $sql);
			if(mysqli_num_rows($res) > 0) {
				while($row = mysqli_fetch_object($res)) {
					echo "<option value='".$row->schedule_name."'>".$row->schedule_name."</option>";
				}
			}
			?>
			
			
			
		  </select></strong>
		  
		  <select type="text" name="loc21" id="loc" class="form-control" placeholder='Location'>
				
                   <option value='<?php echo $c_location;?>'selected><?php echo $c_location;?></option>
			<?php 
			$sql = "Select * from roaster_location where dept='$dept';";
			$res = mysqli_query($con, $sql);
			if(mysqli_num_rows($res) > 0) {
				while($row = mysqli_fetch_object($res)) {
					echo "<option value='".$row->loc."'>".$row->loc."</option>";
				}
			}
			?>
			
			<option value='Off'>Off</option>    
		  </select>
		  </th>
	  <th ><strong><select type="text" name="22" id="pbp31" class="form-control" >
			<option value=''>-Select-</option>    
			<?php 
			$sql = "Select * from roster_duty_schedule order by schedule_name asc;";
			$res = mysqli_query($con, $sql);
			if(mysqli_num_rows($res) > 0) {
				while($row = mysqli_fetch_object($res)) {
					echo "<option value='".$row->schedule_name."'>".$row->schedule_name."</option>";
				}
			}
			?>
			
			
			
		  </select></strong>
		  
		  <select type="text" name="loc22" id="loc" class="form-control" placeholder='Location'>
				
                   <option value='<?php echo $c_location;?>'selected><?php echo $c_location;?></option>
			<?php 
			$sql = "Select * from roaster_location where dept='$dept';";
			$res = mysqli_query($con, $sql);
			if(mysqli_num_rows($res) > 0) {
				while($row = mysqli_fetch_object($res)) {
					echo "<option value='".$row->loc."'>".$row->loc."</option>";
				}
			}
			?>
			
			<option value='Off'>Off</option>    
		  </select>
		  </th>
	  <th ><strong><select type="text" name="23" id="pbp31" class="form-control" >
			<option value=''>-Select-</option>    
			<?php 
			$sql = "Select * from roster_duty_schedule order by schedule_name asc;";
			$res = mysqli_query($con, $sql);
			if(mysqli_num_rows($res) > 0) {
				while($row = mysqli_fetch_object($res)) {
					echo "<option value='".$row->schedule_name."'>".$row->schedule_name."</option>";
				}
			}
			?>
			
			
			
		  </select></strong>
		  
		  <select type="text" name="loc23" id="loc" class="form-control" placeholder='Location'>
				
                   <option value='<?php echo $c_location;?>'selected><?php echo $c_location;?></option>
			<?php 
			$sql = "Select * from roaster_location where dept='$dept';";
			$res = mysqli_query($con, $sql);
			if(mysqli_num_rows($res) > 0) {
				while($row = mysqli_fetch_object($res)) {
					echo "<option value='".$row->loc."'>".$row->loc."</option>";
				}
			}
			?>
			
			<option value='Off'>Off</option>    
		  </select>
		  
		  </th>
	  <th ><strong><select type="text" name="24" id="pbp31" class="form-control" >
			<option value=''>-Select-</option>    
			<?php 
			$sql = "Select * from roster_duty_schedule order by schedule_name asc;";
			$res = mysqli_query($con, $sql);
			if(mysqli_num_rows($res) > 0) {
				while($row = mysqli_fetch_object($res)) {
					echo "<option value='".$row->schedule_name."'>".$row->schedule_name."</option>";
				}
			}
			?>
			
			
			
		  </select></strong>
		  
		  <select type="text" name="loc24" id="loc" class="form-control" placeholder='Location'>
				
                   <option value='<?php echo $c_location;?>'selected><?php echo $c_location;?></option>
			<?php 
			$sql = "Select * from roaster_location where dept='$dept';";
			$res = mysqli_query($con, $sql);
			if(mysqli_num_rows($res) > 0) {
				while($row = mysqli_fetch_object($res)) {
					echo "<option value='".$row->loc."'>".$row->loc."</option>";
				}
			}
			?>
			
			<option value='Off'>Off</option>    
		  </select>
		  
		  </th>
	  <th ><strong><select type="text" name="25" id="pbp31" class="form-control" >
			<option value=''>-Select-</option>    
			<?php 
			$sql = "Select * from roster_duty_schedule order by schedule_name asc;";
			$res = mysqli_query($con, $sql);
			if(mysqli_num_rows($res) > 0) {
				while($row = mysqli_fetch_object($res)) {
					echo "<option value='".$row->schedule_name."'>".$row->schedule_name."</option>";
				}
			}
			?>
			
			
			
		  </select></strong>
		  
		  <select type="text" name="loc25" id="loc" class="form-control" placeholder='Location'>
				
                   <option value='<?php echo $c_location;?>'selected><?php echo $c_location;?></option>
			<?php 
			$sql = "Select * from roaster_location where dept='$dept';";
			$res = mysqli_query($con, $sql);
			if(mysqli_num_rows($res) > 0) {
				while($row = mysqli_fetch_object($res)) {
					echo "<option value='".$row->loc."'>".$row->loc."</option>";
				}
			}
			?>
			
			<option value='Off'>Off</option>    
		  </select>
		  
		  </th>
	  <th ><strong><select type="text" name="26" id="pbp31" class="form-control" >
			<option value=''>-Select-</option>    
			<?php 
			$sql = "Select * from roster_duty_schedule order by schedule_name asc;";
			$res = mysqli_query($con, $sql);
			if(mysqli_num_rows($res) > 0) {
				while($row = mysqli_fetch_object($res)) {
					echo "<option value='".$row->schedule_name."'>".$row->schedule_name."</option>";
				}
			}
			?>
			
			
			
		  </select></strong>
		  
		  <select type="text" name="loc26" id="loc" class="form-control" placeholder='Location'>
				
                   <option value='<?php echo $c_location;?>'selected><?php echo $c_location;?></option> 
			<?php 
			$sql = "Select * from roaster_location where dept='$dept';";
			$res = mysqli_query($con, $sql);
			if(mysqli_num_rows($res) > 0) {
				while($row = mysqli_fetch_object($res)) {
					echo "<option value='".$row->loc."'>".$row->loc."</option>";
				}
			}
			?>
			
			<option value='Off'>Off</option>    
		  </select>
		  </th>
	  <th ><strong><select type="text" name="27" id="pbp31" class="form-control" >
			<option value=''>-Select-</option>    
			<?php 
			$sql = "Select * from roster_duty_schedule order by schedule_name asc;";
			$res = mysqli_query($con, $sql);
			if(mysqli_num_rows($res) > 0) {
				while($row = mysqli_fetch_object($res)) {
					echo "<option value='".$row->schedule_name."'>".$row->schedule_name."</option>";
				}
			}
			?>
			
			
			
		  </select></strong>
		  <select type="text" name="loc27" id="loc" class="form-control" placeholder='Location'>
				
                   <option value='<?php echo $c_location;?>'selected><?php echo $c_location;?></option>
			<?php 
			$sql = "Select * from roaster_location where dept='$dept';";
			$res = mysqli_query($con, $sql);
			if(mysqli_num_rows($res) > 0) {
				while($row = mysqli_fetch_object($res)) {
					echo "<option value='".$row->loc."'>".$row->loc."</option>";
				}
			}
			?>
			
			<option value='Off'>Off</option>    
		  </select>
		  </th>
	  <th ><strong><select type="text" name="28" id="pbp31" class="form-control" >
			<option value=''>-Select-</option>    
			<?php 
			$sql = "Select * from roster_duty_schedule order by schedule_name asc;";
			$res = mysqli_query($con, $sql);
			if(mysqli_num_rows($res) > 0) {
				while($row = mysqli_fetch_object($res)) {
					echo "<option value='".$row->schedule_name."'>".$row->schedule_name."</option>";
				}
			}
			?>
			
			
			
		  </select></strong>
		  
		  <select type="text" name="loc28" id="loc" class="form-control" placeholder='Location'>
				
                   <option value='<?php echo $c_location;?>'selected><?php echo $c_location;?></option>
			<?php 
			$sql = "Select * from roaster_location where dept='$dept';";
			$res = mysqli_query($con, $sql);
			if(mysqli_num_rows($res) > 0) {
				while($row = mysqli_fetch_object($res)) {
					echo "<option value='".$row->loc."'>".$row->loc."</option>";
				}
			}
			?>
			
			<option value='Off'>Off</option>    
		  </select>
		  </th>
	  <th ><strong><select type="text" name="29" id="pbp31" class="form-control" >
			<option value=''>-Select-</option>    
			<?php 
			$sql = "Select * from roster_duty_schedule order by schedule_name asc;";
			$res = mysqli_query($con, $sql);
			if(mysqli_num_rows($res) > 0) {
				while($row = mysqli_fetch_object($res)) {
					echo "<option value='".$row->schedule_name."'>".$row->schedule_name."</option>";
				}
			}
			?>
			
			
			
		  </select></strong>
		  
		  <select type="text" name="loc29" id="loc" class="form-control" placeholder='Location'>
				
                   <option value='<?php echo $c_location;?>'selected><?php echo $c_location;?></option>
			<?php 
			$sql = "Select * from roaster_location where dept='$dept';";
			$res = mysqli_query($con, $sql);
			if(mysqli_num_rows($res) > 0) {
				while($row = mysqli_fetch_object($res)) {
					echo "<option value='".$row->loc."'>".$row->loc."</option>";
				}
			}
			?>
			
			<option value='Off'>Off</option>    
		  </select>
		  
		  </th>
	  <th ><strong><select type="text" name="30" id="pbp31" class="form-control" >
			<option value=''>-Select-</option>    
			<?php 
			$sql = "Select * from roster_duty_schedule order by schedule_name asc;";
			$res = mysqli_query($con, $sql);
			if(mysqli_num_rows($res) > 0) {
				while($row = mysqli_fetch_object($res)) {
					echo "<option value='".$row->schedule_name."'>".$row->schedule_name."</option>";
				}
			}
			?>
			
			
			
		  </select></strong>
		  
		  <select type="text" name="loc30" id="loc" class="form-control" placeholder='Location'>
				
                   <option value='<?php echo $c_location;?>'selected><?php echo $c_location;?></option>
			<?php 
			$sql = "Select * from roaster_location where dept='$dept';";
			$res = mysqli_query($con, $sql);
			if(mysqli_num_rows($res) > 0) {
				while($row = mysqli_fetch_object($res)) {
					echo "<option value='".$row->loc."'>".$row->loc."</option>";
				}
			}
			?>
			
			<option value='Off'>Off</option>    
		  </select>
		  
		  </th>
	  <th ><strong><select type="text" name="31" id="pbp31" class="form-control" >
			<option value=''>-Select-</option>    
			<?php 
			$sql = "Select * from roster_duty_schedule order by schedule_name asc;";
			$res = mysqli_query($con, $sql);
			if(mysqli_num_rows($res) > 0) {
				while($row = mysqli_fetch_object($res)) {
					echo "<option value='".$row->schedule_name."'>".$row->schedule_name."</option>";
				}
			}
			?>
			
			
			
		  </select></strong>
		  
		  <select type="text" name="loc31" id="loc" class="form-control" placeholder='Location'>
				
                   <option value='<?php echo $c_location;?>'selected><?php echo $c_location;?></option>  
			<?php 
			$sql = "Select * from roaster_location where dept='$dept';";
			$res = mysqli_query($con, $sql);
			if(mysqli_num_rows($res) > 0) {
				while($row = mysqli_fetch_object($res)) {
					echo "<option value='".$row->loc."'>".$row->loc."</option>";
				}
			}
			?>
			
			<option value='Off'>Off</option>    
		  </select>
		  </th>
</tbody>




</table>

<tr><td colspan="20"align="right"><button type="submit" name="Submit">ADD</button></td></tr>
</form>


</body>

</html>

