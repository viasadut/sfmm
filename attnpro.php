<?php 
    session_start();
    require('db1.php');
	$role = $_SESSION['sess_userrole'];
	
	$queryc = "SELECT COUNT(utype) FROM user where '$role' in ('mng','staff')"; 
$resultc = mysqli_query($con, $queryc) or die(mysqli_error());
$rowc = mysqli_fetch_array($resultc);
$c1=$rowc['COUNT(utype)'];
	
    if(!isset($_SESSION['sess_username']) || $c1==0){
      header('Location: login2?err=2');
    }
?>



<?php
/*
Author: Javed Ur Rehman
Website: https://www.allphptricks.com/
*/
//include("auth.php"); 
require('db1.php');
$dd= date('m/d/Y',strtotime("+1 days")); 
$user=$_SESSION["sess_username"];
$pdate=date("d/m/Y H:i:s");
$query139 = "SELECT * FROM user where uname= '$user'"; 
	 
$result139 = mysqli_query($con, $query139) or die(mysqli_error());

// Print out result
$row139 = mysqli_fetch_array($result139);
$dname=$row139['fullname'];



  
  
  
//$sql90="Select * from imedi2 where pmrn= '$pmrn' and eid='$eid'and status !='Cancel' and odate='$dd' and pstatus='Ordered' order by `time` and `infusion` asc;";
//$result90=mysql_query($sql90);

//$count90=mysql_num_rows($result90);
  
  
?>


<?php
require('db1.php');
if(isset($_POST['btnDelete']))

if(empty($_REQUEST['chkDel']))
{
	echo '<script language="javascript">';
    echo 'alert("Unsuccessful !!! No Row Selected!!"); ';
    echo '</script>';
	
}
else {
$objConnect = mysql_connect("localhost","root","Godiloveu16") or die("Error Connect to Database");
$objDB = mysql_select_db("sfmmkpjnew");

	for($i=0;$i<count($_POST["chkDel"]);$i++)
	{
		if($_POST["chkDel"][$i] != "")
		{
			
			
			
			
			$status3 = $_REQUEST["status1"][$i];
			$strSQL = "UPDATE tm set status='$status3'";
			$strSQL .="WHERE id = '".$_POST["chkDel"][$i]."' ";
			$objQuery = mysql_query($strSQL);
		}
	}

		
	echo '<script language="javascript">';
    echo 'alert("Successfully Processed !!"); ';

    echo '</script>';

mysql_close($objConnect);
}
?>




<?php
/*
Author: Javed Ur Rehman
Website: https://www.allphptricks.com/
*/
$dd=date('m/d/Y');
require('db1.php');



// if successful redirect to delete_multiple.php 





//$update="update imedi2 set pstatus='served' where `id`='$name'";
//mysqli_query($con,$update) or die(mysql_error());





?>



<!DOCTYPE html>
<html lang="en" >

<head>
  <meta charset="UTF-8">
  <title>Sign Up Form</title>
  
    <link rel="stylesheet" href="jsnew/normalize.min.css">

  
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

button {
  padding: 19px 39px 18px 39px;
  color: #FFF;
  background-color: lightgreen;
  /*#4bc970*/
  font-size: 18px;
  text-align: center;
  font-style: normal;
  border-radius: 5px;
  width: 60%;
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


@media screen and (min-width: 480px) {

  form {
    max-width: 1200px;
  }

}
      </style>

    <script src="jsnew/pprefixfree.min.js"></script>



<link rel="stylesheet" href="jsnew/jquery-ui.css">
<script src="jsnew/jquery.min.js"></script>
<script src="jsnew/jquery-ui.min.js"></script>

  
 <script type="text/javascript">
	jQuery(function() {		
		var date = new Date();
		var currentMonth = date.getMonth();
		var currentDate = date.getDate();
		var currentYear = date.getFullYear();
		
		$('#datepicker').datepicker({
			minDate: new Date(currentYear, currentMonth, currentDate),
			maxDate: new Date(currentYear, currentMonth, currentDate+6)
		});
	});
</script>




  <style type="text/css">
<!--
.style1 {font-weight: bold}
-->
  </style>
  
  <head>
    <title>PHP - Dynamically Add or Remove input fields using JQuery</title>
    <link rel="stylesheet" href="jsnew/bootstrap.min.css" />  
    <script src="jsnew/jjquery.min.js"></script>
    <script src="jsnew/bootstrap.min.js"></script>

    <link href="jsnew/jquery-ui.css" rel="stylesheet" />
    <link href="./jquery.multiselect.css" rel="stylesheet" />
    <script src="jsnew/jquery-1.12.4.js"></script>
    <script src="jsnew/jquery-ui.js"></script>
    <script src="./jquery.multiselect.js"></script>


 <script>
  $(document).ready(function() {
    $("#datepicker").datepicker();
  });
  </script>

  <link rel="stylesheet" href="styles.css">

   <script src="script.js"></script>
<script>
function goBack() {
    window.history.back();
}
</script>
<script type="text/javascript">
function confirm_click()
{
return confirm("Are you Sure to Send Medicine Update Notification ??");
}

</script>
</head>


<body>
<script language="JavaScript">
	function ClickCheckAll(vol)
	{
	
		var i=1;
		for(i=1;i<=document.frmMain.hdnCount.value;i++)
		{
			if(vol.checked == true)
			{
				eval("document.frmMain.chkDel"+i+".checked=true");
			}
			else
			{
				eval("document.frmMain.chkDel"+i+".checked=false");
			}
		}
	}

	function onDelete()
	{
		if(confirm('Do you want to Update the Status ?')==true)
		{
			return true;
		}
		else
		{
			return false;
		}
	}
</script>
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
   
   <li class='last'><a href='logout'><span>LOGOUT</span></a></li>
</ul>
</div>




  <!-- Stephonce R. MOrris | 2014 -->

<!-- Google Font -->
		<link href='jsnew/fonts' rel='stylesheet' type='text/css'>

<form name="frmMain" action="" method="post" OnSubmit="return onDelete();">


<h1 align="center"style="background-color:lightgreen;">Process Attendance</h1>
<!-- Form Title -->
        <table align="center" class="table table-bordered" id="dynamic_field">  
		




		
	   
</tr>


	


<?php
$user=$_SESSION["sess_username"];

$count=1;
$date1=date('Y-m-d');

$objConnect = mysql_connect("localhost","root","Godiloveu16") or die("Error Connect to Database");
$objDB = mysql_select_db("sfmmkpjnew");
$strSQL = "Select * from tm where date1 ='$date1' order by dept asc";
$objQuery = mysql_query($strSQL) or die ("Error Query [".$strSQL."]");
?>

<table align="center" class="table table-bordered" id="dynamic_field">  
<tr>
      <tr>
      <th width="4%"><strong>S.No</strong></th>
      <th width="17%"><strong>Name</strong></th>
	  <th width="17%"><strong>ID</strong></th>
	  <th width="17%"><strong>Department</strong></th>
	  <th width="17%"><strong>Start Time</strong></th>
	  <th width="17%"><strong>Date</strong></th>
	  <th width="20%"><strong>Status</strong></th>
	  
        
    
    <th width="17%"> <input name="CheckAll" type="checkbox" id="CheckAll" value="Y" onClick="ClickCheckAll(this);">
    </th>
  </tr>
<?php
$i = 0;
while($row = mysql_fetch_array($objQuery))
{
$i++;

?>

	  

  <tr>
    <td align="center"><?php echo $count; ?></td>
      <td align="center"><?php echo $row["name"]; ?></a></td>
	  
	  <td align="center"><?php echo $row["uid"]; ?></a></td>
	  <td align="center"><?php echo $row["dept"]; ?></a></td>
       <?php 

$adate=date('Y-m-d');

//$rd=date('Y-m-d', strtotime('-1 days') );
$ssid=$row["uid"];
$query40 = "SELECT * FROM tm where uid= '$ssid' and date1='$adate';"; 
	 
$result40 = mysqli_query($con, $query40) or die(mysqli_error());

// Print out result
$row40 = mysqli_fetch_array($result40);
$mname=$row40["status"];
//$location=$row40["location"];

$myvalue = $row40["date"];
$datetime = new DateTime($myvalue); 
$sdate = $datetime->format('Y-m-d'); 
$stime = $datetime->format('His');


$stime1='090000';
//$stime2 = strtotime('H:i:s' $stime1);

$stime3=$stime-$stime1;




$q9 = "SELECT * from dleave where hstatus='Confirmed By TM' and sid='$ssid' and '$adate' between sdate and edate"; 
$re9 = mysqli_query($con, $q9) or die ( mysqli_error());
$r9 = mysqli_fetch_assoc($re9);
//$stime=$row40["date"];



$qh = "SELECT * from hday where hdate='$adate'"; 
$reh = mysqli_query($con, $qh) or die ( mysqli_error());
$rh = mysqli_fetch_assoc($reh);
//$mode=$row40["mode"];

/*$sel_query50="Select COUNT(sid) from conleavedetails where status in('Approved By ALL','Approval Pending','Approve By Replacement Consultant') and '$adate' between sdate and edate and sid='$ssid'";
$result50 = mysqli_query($con, $sel_query50) or die(mysqli_error());
$row50 = mysqli_fetch_array($result50);
$num1=$row50['COUNT(sid)'];*/


?>

	   
	   <td align="center"><?php echo $row['date'];?></td>
	   <td align="center"><?php echo $row['date1'];?></td>
	   
	

<td><input type="text" name="status1[]" id="status1<?php echo $i;?>" value="<?php if($stime3>0 && $mname !='') {echo 'LT';}else if($stime3<0 && $mname =='P'){echo 'P'; }?>" readonly></td>


    
    <td align="center"><input type="checkbox" name="chkDel[]" id="chkDel<?php echo $i;?>" value="<?php echo $row["id"];?>"></td>
  
  </tr>
<?php
 $count++;}
?>
<tr><td colspan="20" align="right"><button type="submit" name="btnDelete">Confirm Process</button><input type="hidden" name="hdnCount" value="<?php echo $i;?>"></td>
</tr>
</table>
<?php
mysql_close($objConnect);
?>




</html>
