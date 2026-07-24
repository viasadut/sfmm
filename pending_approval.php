<?php 
    session_start();
    $role = $_SESSION['sess_userrole'];
    if(!isset($_SESSION['sess_username']) || $role!="mng"){
      header('Location: login2?err=2');
    }
?>
<?php
$url1=$_SERVER['REQUEST_URI'];
//header("Refresh: 5; URL=$url1");
$db = mysqli_connect('localhost','root','Godiloveu16');
mysqli_select_db($db,'sfmmkpjnew');


//$datediff78 = $now - $doj78;

//echo $fday8= round($datediff78 / (60 * 60 * 24)*.0833) ;



?>
<?php
require('db1.php');
 $fullname = $_SESSION['sess_username'];
/*$query39 = "SELECT * FROM user where uname= '$fullname'"; 
	 
$result39 = mysqli_query($con, $query39) or die(mysqli_error());

// Print out result
$row39 = mysqli_fetch_array($result39)*/
?>
<?php
/*$full = $row39['fullname'];

//echo $now = time(); // or your date as well
$tt=date('Y');
$your_date = strtotime("$tt-12-31");
$fday= round($your_date / (60 * 60 * 24)*.0833) ;
$your_date1 = strtotime("2019-01-01");
$fday1= round($your_date1 / (60 * 60 * 24)*.0833) ;

$query39 = "SELECT * FROM staff1 where sid= '$fullname'"; 
	 
$result39 = mysqli_query($con, $query39) or die(mysqli_error());

// Print out result
$row39 = mysqli_fetch_array($result39);
//$idept=$row39['sdept'];
//$gender= $row39['gender'];
$doj= $row39['doj'];
$doj78=strtotime($doj);
$datediff = $your_date - $doj78;
$fday1= round($datediff / (60 * 60 * 24)*.0833) ;
*/
?>

<?php
/*
Author: Javed Ur Rehman
Website: https://www.allphptricks.com/
*/
//session_start();
require('db1.php');
//include("auth.php");
/*$query3 = "SELECT * FROM incident1 where itype= 'Clinical'"; 
	 
$result3 = mysqli_query($con, $query3) or die(mysqli_error());

// Print out result
$row3 = mysqli_fetch_array($result3);*/
?>

<?php

if(isset($_POST['btnDelete']))

{
	
if(empty($_REQUEST['chkDel']))
{
	echo '<script language="javascript">';
    echo 'alert("Unsuccessful !!! No Row Selected!!"); ';
    echo '</script>';
	
}
else {
$objConnect1 = mysqli_connect("localhost","root","Godiloveu16") or die("Error Connect to Database");
$objDB1 = mysqli_select_db($objConnect1,"sfmmkpjnew");

	for($i=0;$i<count($_POST["chkDel"]);$i++)
	{
		if($_POST["chkDel"][$i] != "")
			
			
		{
			
			//$qq = mysqli_query($db,"select * from staff3 where id='".$_POST["chkDel"][$i]."'");
			//$dd = mysqli_fetch_assoc($qq);
			//$aleave=$_['aleave'];
			$b_leave1 = $_REQUEST["b_leave"][$i];
			
			
			if($b_leave1>=8){
			
			$strSQL = "update staff3_test set c_forward='8'";
			$strSQL .="WHERE id = '".$_POST["chkDel"][$i]."' ";
			$objQuery = mysqli_query($objConnect1,$strSQL);
			
			}
			
			else if ($b_leave1<8)
			{
				$strSQL = "update staff3_test set c_forward='$b_leave1'";
			$strSQL .="WHERE id = '".$_POST["chkDel"][$i]."' ";
			$objQuery = mysqli_query($objConnect1,$strSQL);}
		}
	}

	echo '<script language="javascript">';
    echo 'alert("Successfully Added !!'.$b_leave1.'"); ';

    echo '</script>';

	
	//$url = "staff_carry_forward";
//header("Location: $url");

mysqli_close($objConnect1);

}
}
?>



<!DOCTYPE html>
<html>
<head>
<title>Medicine</title>
  
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

    <script src="jsnew/prefixfree.min.js"></script>



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
			minDate: new Date(currentMonth, currentDate,currentYear),
			maxDate: new Date(currentMonth, currentDate,currentYear)
		});
	});
</script>




  <style type="text/css">
<!--
.style1 {font-weight: bold}
-->
  </style>
  
  <head>
    <title>Investigation</title>
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


<script language="JavaScript">
	function ClickCheckAll(vol)
	{
	
		var i=1;
		for(i=1;i<=document.frmMain1.hdnCount.value;i++)
		{
			if(vol.checked == true)
			{
				eval("document.frmMain1.chkDel"+i+".checked=true");
			}
			else
			{
				eval("document.frmMain1.chkDel"+i+".checked=false");
			}
		}
	}

	function onDelete()
	{
		if(confirm('Do you want to Add the Medicine ?')==true)
		{
			return true;
			
		}
		else
		{
			return false;
			
		}
	}
</script>




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
<p align="center" class="style1">Todays  <?php echo $full; ?>'s In-Patients List </p> 
<p align="right"> <?php echo "Date:" ?> <?php echo date('d/m/Y')?> </p>
<form name="frmMain1" action="" method="post" OnSubmit="return onDelete();"> 
<table width="100%" height ="100%" border="1" align="center" bgcolor="#FFFF99" style="border-collapse:collapse;">

<?php


$count=1;
$objConnect = mysqli_connect("localhost","root","Godiloveu16") or die("Error Connect to Database");
$objDB = mysqli_select_db($objConnect,"sfmmkpjnew");
$strSQL = "SELECT * FROM staff3 where status= 'Active'";


$objQuery = mysqli_query($objConnect,$strSQL) or die ("Error Query [".$strSQL."]");
?>
    <tr>
      <th width="4%"><strong>S.No</strong></th>
      <th width="17%"><strong>Requested By</strong></th>
      <th width="10%"><strong>Leave Type</strong></th>
      <th width="15%"><strong>Total Days Applied </strong>
      <th width="14%"><strong>Start From</strong>   
      
	  <th width="14%"><strong>Replacement Consultant</strong>
	  
	  <th width="14%"><strong>Status</strong>
	
      <th width="30"> <div align="center">
      <input name="CheckAll" type="checkbox" id="CheckAll" value="Y" onClick="ClickCheckAll(this);">
    </div></th>
  </tr>
<?php
$i = 0;
while($row = mysqli_fetch_array($objQuery))
{
$i++;

?>
	   </tr>
  </thead>
  <tbody>
  
    

	
	
      <td align="center"><?php echo $count; ?></td>
      <td align="center"><?php echo $row["sid"]; ?></a></td>
      <td align="center"><?php echo $row["sname"]; ?>
	  <td align="center"><?php echo $row["doj"]; ?>
      <td align="center"><?php echo $row["gender"]; ?>
      <td align="center"><?php echo $row["religion"]; ?>  
	  
	  
	  
	  
	  
	  <?php
	  
	  $sid=$row['sid'];
	  $query39 = "SELECT * FROM staff3 where sid= '$sid'"; 
	 
$result39 = mysqli_query($con, $query39) or die(mysqli_error());

// Print out result
$row39 = mysqli_fetch_array($result39);

	  
	  $idept=$row39['dept'];
$gender= $row39['gender'];
$doj= $row39['doj'];
$status1= $row39['cstatus'];
$pal1= $row39['paleave'];
$cdate=date('m/d/Y');
//$status1;
//$id=$_REQUEST['ID'];
//$pmrn=$_REQUEST['pmrn'];
//echo $gender;
/*$query9 = "SELECT * FROM staff where sdept= '$idept' and sdesignation='HOS'"; 
$result9 = mysqli_query($con, $query9) or die(mysqli_error());
$row9 = mysqli_fetch_array($result9);

*/
$hos=$row39['hos'];
$incharge=$row39['incharge'];
$date4 = new DateTime($cdate);
$date3 = new DateTime($doj);

$diff2 = $date3->diff($date4, true);

$diff3= $diff2->format('%a')+1;
$el= $row39['etaken'];
$al= $row39['ataken'];
$sl= $row39['staken'];
$sl1= $row39['sleave'];

//$ma= 112-(int)$row39['mataken']; 
$pa= $row39['pataken'];
$doj= $row39['doj'];  
$status= $row39['status']; 
//$pa= $row['padd'];
$cf= $row39['cfleave'];

//$sl1s=14-(int)$sl;

//$sl1s_p=5-(int)$sl;
 
/*$date2=date('01/01/2019');
$date1= date('m/d/Y');
$date3=date_create("$date2");
$date4=date_create("$date1");
$diff=date_diff($date4,$date3);
echo $diff->format("%d");*/
$now = time(); // or your date as well


$doj78=strtotime($doj);



$doj12=date('Y',strtotime($doj));


$datediff78 = $now - $doj78;

//echo $fday8= round($datediff78 / (60 * 60 * 24)*.0833) ;
$fday8= round($datediff78 / (60 * 60 * 24)*.0164,2) ;


$year=date('Y');
$rr=date('Y');
$your_date = strtotime("$rr-01-01");
$your_date1 = strtotime("$doj");
//$your_date = strtotime("2019-01-01");
$datediff = $now - $your_date;
$datediff_y = $now - $your_date1;
//echo $datediff;
//$test= round ($your_date / (60 * 60 * 24));
$fday= round($datediff / (60 * 60 * 24)*.0438,2) ;
$fday_y= round($datediff_y / (60 * 60 * 24)*.0438,2) ;
$fday1= round($datediff / (60 * 60 * 24)*.0274,2) ;
$fday1_y= round($datediff_y / (60 * 60 * 24)*.0274,2) ;

$fday9= round($datediff78 / (60 * 60 * 24)*.0274,2) ;

$fday3= round($datediff / (60 * 60 * 24)*.0164,2) ;
$fday3_y= round($datediff_y / (60 * 60 * 24)*.0164,2) ;
//$fday4= round($datediff / (60 * 60 * 24)*.0274) ;


//echo $fday;
$aday=$fday+$cf-$al;
$aday_y=$fday_y+$cf-$al;
$aday1=$fday1-$el;
$aday1_y=$fday1_y-$el;
$aday2=$fday3-$al;
$aday2_y=$fday3_y-$al;
//$aday2_y=3-$al;

  //echo $test;
//echo $aday;
//echo $aday2;

/*$username = "root";
$password = "Godiloveu16";
$hostname = "localhost"; 
$dbhandle = mysqli_connect($hostname, $username, $password) 
 or die("Unable to connect to MySQL");

$selected = mysqli_select_db($dbhandle,"sfmmkpjnew") 
  or die("Could not select examples");
$query198 = "SELECT SUM(total) FROM dleave  where hstatus in('Approval Pending','Forwarded to Incharge') and tleave in ('Annual Leave') and uname='$user' and cyear='$cyear'"; 
	 
$result198 = mysqli_query($dbhandle,$query198) or die(mysql_error());

$row198 = mysqli_fetch_array($result198);
// Print out result

$testl=$row198['SUM(total)'];*/

?>

<td align="center"><input type="text" name="b_leave[]" id="b_leave<?php echo $i;?>" value="<?php if($status1=='Confirm' and $cyear!=$doj12){echo $aday;} else if($status1=='Confirm' and $cyear==$doj12){echo $aday_y;}else if($status1=='nonconfirm'){echo $aday2_y;}?>"readonly></td>
<td align="center" colspan="1" ><input type="checkbox" name="chkDel[]" id="chkDel<?php echo $i;?>" value="<?php echo $row["id"];?>"></td>


	  
      </tr>
    <?php $count++; } ?>

<tr><td colspan="20" align="right"><button type="submit" name="btnDelete">Set Carry Forward Leave</button><input type="hidden" name="hdnCount" value="<?php echo $i;?>"></td>
	</table>

	
<?php
mysqli_close($objConnect);
?>

</form>

</body>

</html>

