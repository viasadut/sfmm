<?php 
    session_start();
    $role = $_SESSION['sess_userrole'];
    if(!isset($_SESSION['sess_username']) || $role!="imo"){
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

$user=$_SESSION["sess_username"];

$query139 = "SELECT * FROM user where uname= '$user'"; 
	 
$result139 = mysqli_query($con, $query139) or die(mysqli_error());

// Print out result
$row139 = mysqli_fetch_array($result139);
$dname=$row139['fullname'];

//include("auth.php");
$pmrn=$_REQUEST['pmrn'];
$eid=$_REQUEST['eid'];
$db = mysqli_connect('localhost','root','Godiloveu16');
mysqli_select_db($db,'sfmmkpjnew');
$query4 = mysqli_query($db,"select * from inpatient where pmrn='$pmrn' and discharge='' and eid='$eid'");
$data59 = mysqli_fetch_assoc($query4);
  $date=date('d/m/Y');
  $ortime = date('d/m/Y H:i:s');
  $ndate = date('Y-m-d');
 $full=$data59['adoc']; 
  
    $query4d = mysqli_query($db,"select * from staff1 where mname='$full'");
$datad = mysqli_fetch_assoc($query4d);
$ddn=$datad['sid'];

?>


<?php
/*
Author: Javed Ur Rehman
Website: https://www.allphptricks.com/
*/
 
require('db1.php');

if(isset($_POST['Submit']))
{



$pname = $data59['pname'];
$pmrn = $data59['pmrn'];
$eid = $data59['eid'];
$padd = $data59['padd'];
$adm = $data59['adate'];
$pphone=$data59['pphone'];
$page=$data59['age'];
$psex=$data59['gender'];
$odate = date('m/d/Y H:i:s');
$odate1 = date('m/d/Y');
$infu = $_REQUEST['infu'];
$root = $_REQUEST['root'];

//$dtime = $_REQUEST['dtime'];
$infu1 = $_REQUEST['infu1'];
//$infu2 = $_REQUEST['infu2'];
//$infu3 = $_REQUEST['infu3'];
//$infu4 = $_REQUEST['infu4'];
//$infu5 = $_REQUEST['infu5'];
//$infu6 = $_REQUEST['infu6'];
//$alert=  $_REQUEST['alert'];
$ddate = $_REQUEST['ddate'];

$date1 = date('Y-m-d',strtotime($_REQUEST['date']));
$edate1 = date('Y-m-d',strtotime($_REQUEST['edate']));


$edate2=date('Y-m-d', strtotime($edate1.'+1 days') );


$dilu = $_REQUEST['dilu'];

$sel990="SELECT * FROM medicine WHERE `mname`='$infu' and status='Active';";
$result990 = mysqli_query($con,$sel990);
$rowz = mysqli_fetch_assoc($result990);
$uprice=$rowz['uprice'];
$alert=$rowz['alert'];
$p_code=$rowz['code'];
$url = "imoidocmedi.php?pmrn=$pmrn&eid=$eid"; 

$sel_re="SELECT * FROM medicine WHERE `mname`='$infu' and status='Active' and pre IN('Tablet','Vaginal Suppository','VT','Suppository','Soft Capsule','Sachet','Capsule','Injection')";
$result_re = mysqli_query($con,$sel_re);


if($res990=mysqli_num_rows($result990)==0)
{
 	
       echo '<script language="javascript">';
    echo 'alert("Unsuccessful !!! The Medicine Name is not in the Database List.. Please contact with Pharmacy Department"); ';
    echo '</script>';
    }


else if ($res990=mysqli_num_rows($result990)>0){
	
	
$pname = $data59['pname'];
$pmrn = $data59['pmrn'];
$eid = $data59['eid'];
$padd = $data59['padd'];
$adm = $data59['adate'];
$pphone=$data59['pphone'];
$page=$data59['age'];
$psex=$data59['gender'];
$odate = date('m/d/Y H:i:s');
$odate1 = date('m/d/Y');
$infu = $_REQUEST['infu'];
$root = $_REQUEST['root'];

//$dtime = $_REQUEST['dtime'];
$infu1 = $_REQUEST['infu1'];
//$infu2 = $_REQUEST['infu2'];
//$infu3 = $_REQUEST['infu3'];
//$infu4 = $_REQUEST['infu4'];
//$infu5 = $_REQUEST['infu5'];
//$infu6 = $_REQUEST['infu6'];
//$alert=  $_REQUEST['alert'];
$ddate = $_REQUEST['ddate'];	
	
$date1 = date('Y-m-d',strtotime($_REQUEST['date']));
$edate1 = date('Y-m-d',strtotime($_REQUEST['edate']));


$edate2=date('Y-m-d', strtotime($edate1.'+1 days') );


	
	$begin = new DateTime($date1);
$end = new DateTime($edate2);

$daterange = new DatePeriod($begin, new DateInterval('P1D'), $end);

foreach($daterange as $datemn){
	//$datem = trim($datem);
    $datem=$datemn->format("Y-m-d");
	$datem1=$datemn->format("m/d/Y");


if(isset($_POST["infu1"]))  
        { 
            // Retrieving each selected option 
            foreach ($_POST['infu1'] as $infu1)  
            //print "You selected $subject<br/>"; 
			{	

$sel94="SELECT * FROM imedi3 WHERE `pmrn`='$pmrn' and `eid`='$eid' and`infusion`='$infu' and odate='$datem1' and `time`='$infu1' and `status`='Active' and status1 in ('SEEN','Rupdated','implemented');";
$result94 = mysqli_query($con,$sel94);

			
if($res94=mysqli_num_rows($result94)>0)
{
echo '<script language="javascript">';
    echo 'alert("This Medicine is Already Added in Todays Order  !!"); ';

    echo '</script>';
	
	//header("Refresh: .1; URL=$url");
}

else if($res_re=mysqli_num_rows($result_re)<=0)
        { 
            // Retrieving each selected option 
            //foreach ($_POST['infu1'] as $infu1)  
            //print "You selected $subject<br/>"; 
			//{	

$ins_query6="insert into imedi3 (`pmrn`,`dname`,`eid`,`infusion`,`time`,`instruc`,`alert`,`orderby`,`odate`,`status`,`root`,`status1`,`pstatus`,`ortime`,`dilu`,`ndate`,`uprice`,`code`,`reuse`) values 
('$pmrn','$dname','$eid','$infu','$infu1','$ddate','$alert','$user','$datem1','Active','$root','Rupdated','Ordered','$ortime','$dilu','$datem','$uprice','$p_code','Reuse')";
mysqli_query($con,$ins_query6);
			
//}

	
}


else if($res_re=mysqli_num_rows($result_re)>0)
        { 
            // Retrieving each selected option 
            //foreach ($_POST['infu1'] as $infu1)  
            //print "You selected $subject<br/>"; 
			//{	

$ins_query6="insert into imedi3 (`pmrn`,`dname`,`eid`,`infusion`,`time`,`instruc`,`alert`,`orderby`,`odate`,`status`,`root`,`status1`,`pstatus`,`ortime`,`dilu`,`ndate`,`uprice`,`code`) values 
('$pmrn','$dname','$eid','$infu','$infu1','$ddate','$alert','$user','$datem1','Active','$root','Rupdated','Ordered','$ortime','$dilu','$datem','$uprice','$p_code')";
mysqli_query($con,$ins_query6);
			
//}

	
}
			
}

echo '<script language="javascript">';
    echo 'alert("Successfully Added  !!"); ';

    echo '</script>';
	
}



}


}
}
?>



<?php
/*
Author: Javed Ur Rehman
Website: https://www.allphptricks.com/
*/
 
require('db1.php');

if(isset($_POST['Submit1_a']))
{


$pname = $data59['pname'];
$pmrn = $data59['pmrn'];
$eid = $data59['eid'];
$padd = $data59['padd'];
$adm = $data59['adate'];
$pphone=$data59['pphone'];
$page=$data59['age'];
$psex=$data59['gender'];
$odate = date('m/d/Y H:i:s');
$odate1 = date('m/d/Y');
$infu = $_REQUEST['infu'];
$root = $_REQUEST['root'];
$dilu = $_REQUEST['dilu'];

//$dtime = $_REQUEST['dtime'];
$infu1 = $_REQUEST['infu1'];

//$alert=  $_REQUEST['alert'];
$ddate = $_REQUEST['ddate'];






$query159 = mysqli_query($db,"select * from doc_medi where iname='$infu'");

while($data159 = mysqli_fetch_assoc($query159))
//while($row = mysqli_fetch_assoc($result)) 
{
$ii=$data159["medi"];
//$ii2=$data159["ins"];


//$sel9=mysqli_query($db,"SELECT * FROM medicine WHERE `mname`='$ii'");
//$result9 = mysqli_fetch_assoc($sel9);
//$brand2=$result9["brand1"];
//echo $type;
//echo $type;

//$ins_query="insert into pmedi (`dname`,`pmrn`,`pname`,`eid`,`medi`,`ins`,`date`,`type`,`date`) values ('$full', '$pmrn','$pname','$eid','$medi','$pins','$date','$type','$date')";
//mysqli_query($con,$ins_query) or die(mysql_error());



$sel990="SELECT * FROM medicine WHERE `mname`='$ii' and status='Active';";
$result990 = mysqli_query($con,$sel990);
$rowz = mysqli_fetch_assoc($result990);
$uprice2=$rowz['uprice'];
$alert=$rowz['alert'];
$p_code=$rowz['code'];
$url = "imoidocmedi.php?pmrn=$pmrn&eid=$eid"; 

$sel_re="SELECT * FROM medicine WHERE `mname`='$ii' and status='Active' and pre IN('Tablet','Vaginal Suppository','VT','Suppository','Soft Capsule','Sachet','Capsule','Injection');";
$result_re = mysqli_query($con,$sel_re);


$date1 = date('Y-m-d',strtotime($_REQUEST['date']));
$edate1 = date('Y-m-d',strtotime($_REQUEST['edate']));


$edate2=date('Y-m-d', strtotime($edate1.'+1 days') );


	
	$begin = new DateTime($date1);
$end = new DateTime($edate2);

$daterange = new DatePeriod($begin, new DateInterval('P1D'), $end);



foreach($daterange as $datemn){
	//$datem = trim($datem);
    $datem=$datemn->format("Y-m-d");
	$datem1=$datemn->format("m/d/Y");


if(isset($_POST["infu1"]))  
        { 
            // Retrieving each selected option 
            foreach ($_POST['infu1'] as $infu1)  
            //print "You selected $subject<br/>"; 
			{	

$sel94="SELECT * FROM imedi3 WHERE `pmrn`='$pmrn' and `eid`='$eid' and`infusion`='$ii' and odate='$datem1' and `time`='$infu1' and `status`='Active' and status1 in ('SEEN','Rupdated','implemented');";
$result94 = mysqli_query($con,$sel94);



			
if($res94=mysqli_num_rows($result94)>0)
{
echo '<script language="javascript">';
    echo 'alert("This Medicine is Already Added in Todays Order  !!"); ';

    echo '</script>';
	
	//header("Refresh: .1; URL=$url");
}

else if($res94_p=mysqli_num_rows($result990)>0 and $res_re=mysqli_num_rows($result_re)<=0)
        { 
            // Retrieving each selected option 
            //foreach ($_POST['infu1'] as $infu1)  
            //print "You selected $subject<br/>"; 
			//{	

$ins_query6="insert into imedi3 (`pmrn`,`dname`,`eid`,`infusion`,`time`,`instruc`,`alert`,`orderby`,`odate`,`status`,`root`,`status1`,`pstatus`,`ortime`,`dilu`,`ndate`,`uprice`,`code`,`reuse`) values 
('$pmrn','$dname','$eid','$ii','$infu1','$ddate','$alert','$user','$datem1','Active','$root','Rupdated','Ordered','$ortime','$dilu','$datem','$uprice2','$p_code','Reuse')";
mysqli_query($con,$ins_query6);
			


	
}


else if($res94_p=mysqli_num_rows($result990)>0 and $res_re=mysqli_num_rows($result_re)>0)
        { 
            // Retrieving each selected option 
            //foreach ($_POST['infu1'] as $infu1)  
            //print "You selected $subject<br/>"; 
			//{	

$ins_query6="insert into imedi3 (`pmrn`,`dname`,`eid`,`infusion`,`time`,`instruc`,`alert`,`orderby`,`odate`,`status`,`root`,`status1`,`pstatus`,`ortime`,`dilu`,`ndate`,`uprice`,`code`) values 
('$pmrn','$dname','$eid','$ii','$infu1','$ddate','$alert','$user','$datem1','Active','$root','Rupdated','Ordered','$ortime','$dilu','$datem','$uprice2','$p_code')";
mysqli_query($con,$ins_query6);
			


	
}
			
}


	
}



}
echo '<script language="javascript">';
    echo 'alert("Successfully Added  !!"); ';

    echo '</script>';


}




}
?>









<?php

if(isset($_POST['btnDelete']))

	
	
if(empty($_REQUEST['chkDel']))
{
	echo '<script language="javascript">';
    echo 'alert("Unsuccessful !!! No Row Selected!!"); ';
    echo '</script>';
	
}
else {
$objConnect = mysqli_connect("localhost","root","Godiloveu16") or die("Error Connect to Database");
mysqli_select_db($objConnect, "sfmmkpjnew");

	for($i=0;$i<count($_POST["chkDel"]);$i++)
	{
		if($_POST["chkDel"][$i] != "")
			
			
		{
			
			$qq = mysqli_query($db,"select * from imedi3 where id='".$_POST["chkDel"][$i]."'");
			$dd = mysqli_fetch_assoc($qq);
			$dname=$dd['dname'];
			$pmrn=$dd['pmrn'];
			$time=$dd['time'];
			//$medi=$dd['medi'];
			$infu=$dd['infusion'];
			$instruc=$dd['instruc'];
			$eid=$dd['eid'];
			$alert=$dd['alert'];
			$root=$dd['root'];
					$p_code=$dd['code'];
						$uprice1=$dd['uprice'];
						$dilu=$dd['dilu'];
			//$date=$qq['date'];
			//$odate = $dd['odate'];
			$odate=date('m/d/Y',strtotime("+1 days"));
			$ndate3=date('Y-m-d',strtotime("+1 days"));
			//$pdos=$_POST["test3"][$i];
			$ortime = date('d/m/Y H:i:s');
			
			
			$sel95 = "SELECT * from medicine where mname='$infu' and pre in('Tablet','Vaginal Suppository','VT','Suppository','Soft Capsule','Sachet','Capsule','Injection') and status='Active'"; 
$result95 = mysqli_query($con,$sel95);
			
			
			$sel90 = "SELECT * from imedi3 where pmrn='$pmrn' and time='$time' and odate='$odate' and infusion='$infu' and status='Active'"; 
$result90 = mysqli_query($con,$sel90);
if($row90=mysqli_num_rows($result90)>0)
	{
echo '<script language="javascript">';
    echo 'alert("Unsuccessful !! Medicine Already Added in Tommorows List!!"); ';

    echo '</script>';
	
	}

			else if($row95=mysqli_num_rows($result95)>0)
			
			
			{
			$strSQL = "insert into imedi3 (`pmrn`,`dname`,`eid`,`infusion`,`time`,`instruc`,`alert`,`orderby`,`odate`,`status`,`root`,`status1`,`pstatus`,`ortime`,`dilu`,`uprice`,`code`,`ndate`) values 
('$pmrn','$dname','$eid','$infu','$time','$instruc','$alert','$user','$odate','Active','$root','Rupdated','Ordered','$ortime','$dilu','$uprice1','$p_code','$ndate3')";
			//$strSQL .="WHERE id = '".$_POST["chkDel"][$i]."' ";
			$objQuery = mysqli_query($objConnect,$strSQL);

	
			}
			
			else 
			
			
			{
			$strSQL = "insert into imedi3 (`pmrn`,`dname`,`eid`,`infusion`,`time`,`instruc`,`alert`,`orderby`,`odate`,`status`,`root`,`status1`,`pstatus`,`ortime`,`dilu`,`reuse`,`uprice`,`code`,`ndate`) values 
('$pmrn','$dname','$eid','$infu','$time','$instruc','$alert','$user','$odate','Active','$root','Rupdated','Ordered','$ortime','$dilu','Reuse','$uprice1','$p_code','$ndate3')";
			//$strSQL .="WHERE id = '".$_POST["chkDel"][$i]."' ";
			$objQuery = mysqli_query($objConnect,$strSQL);

	
			}
	}

	
	}
echo '<script language="javascript">';
    echo 'alert("Successfully Added !!"); ';

    echo '</script>';
	
	//$url = "meditest222?pmrn=$pmrn&eid=$eid&eido=$eid1&dname=$full";
//header("Location: $url");

mysqli_close($objConnect);
	
}
?>

<!DOCTYPE html>
<html lang="en" >

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


@media screen and (min-width: 480px) {

  form {
    max-width: 2000px;
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
	width:100vw;
	white-space: normal;
	height:200px;
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

    
<link rel="stylesheet" href="jsnew/bootstrap.min.css" />  
    <script src="jsnew/jjquery.min.js"></script>
    <script src="jsnew/bootstrap.min.js"></script>
   <link href="jsnew/jquery-ui.css" rel="stylesheet" />
    
    <script src="jsnew/jquery-1.12.4.js"></script>
    <script src="jsnew/jquery-ui.js"></script>
  
  




  <style type="text/css">
<!--
.style1 {font-weight: bold}
-->
  </style>
  

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
return confirm("Are you Sure to Reveive this Sample ?");
}

</script>

<script type="text/javascript">
function confirm_click2()
{
return confirm("Are you Sure to Reject this Sample ?");
}

</script>
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
		
		$('#datepicker1').datepicker({
			minDate: new Date(currentYear, currentMonth, currentDate),
			maxDate: new Date(currentYear, currentMonth, currentDate+6)
		});
	});
</script>


  
          <head>  
           <title>Webslesson Tutorial | PHP Ajax Update MySQL Data Through Bootstrap Modal</title>  
           
		   <link rel="stylesheet" href="jsnew/bootstrap.min.css" />  
    <script src="jsnew/jjquery.min.js"></script>
    <script src="jsnew/bootstrap.min.js"></script>
   <link href="jsnew/jquery-ui.css" rel="stylesheet" />
    
    
    <script src="jsnew/jquery-ui.js"></script>
	
      </head>  







<body>
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

<form action="" method="post">
<h1 align="center"style="background-color:lightgreen;">INPATIENT MEDICINE </h1>
<!-- Form Title -->
        <table align="center" class="table table-bordered" id="dynamic_field">  
		<tr><td colspan="20" align="right"><button onClick="goBack()">Back</button></td></tr>
				<tr><td colspan="20"><label><strong>Doctors's Name :</strong></label></td></tr>
				
				<tr>	  
				<td colspan="20"><?php echo $data59["adoc"]; ?></td></tr>
				
						
						
				
					<input type="hidden" name="new" value="1" />

						</select></td></tr>
						
												<tr>
						
						
						<td colspan="5"><label><strong>Patient's MRN:</strong></label></td>
						<td colspan="3"><label><strong>Patient's Episode:</strong></label></td>
						<td colspan="12"><label><strong>Patient's Name:</strong></label></td>
						
						
						</tr>

<tr>				<td colspan="5"><?php echo $data59["pmrn"]; ?></td>
				<td colspan="3"><?php echo $data59["eid"]; ?> </td>
					 <td colspan="12"><?php echo $data59["pname"]; ?></td>

					 
</tr>

						
						
<tr><td colspan="20"><label><strong>Patient's Address :</strong></label></td></tr>
<tr><td colspan="20"><?php echo $data59["padd"]; ?></td></tr>


		<tr>
						
						<td colspan="5"><label><strong>Age:</strong></label></td>
						<td colspan="3"><label><strong>Admission Date:</strong></label></td>
						<td colspan="2"><label><strong>Gender:</strong></label></td>
						<td colspan="4"><label><strong>Phone NO:</strong></label></td>
						<td colspan="2"><label><strong>Room Type:</strong></label></td>
						<td colspan="4"><label><strong>Bed No:</strong></label></td>		
						</tr>
						
						<tr>				
						<td colspan="5"><?php echo $data59["age"]; ?></td>  
             		<td colspan="3"><?php echo $data59["adate"]; ?></td>					 	
					 <td colspan="2"><?php echo $data59["gender"]; ?></td>
					 <td colspan="4"><?php echo $data59["pphone"]; ?></td>  

			    	 <td colspan="2"><?php echo $data59["room"]; ?></td>  
					 <td colspan="4"><?php echo $data59["room1"]; ?></td>  
					 </tr>

						


<tr><td colspan="20" align="center"bgcolor="lightgreen"><label><strong>Medication Form</strong></label></td> </tr>
<td colspan="3" align="center"><label><strong>Start Date</strong></label></td>
<td colspan="3" align="center"><label><strong>End Date</strong></label></td>
<td colspan="14" align="center"><label><strong>Medication</strong></label></td> 

</tr>


<td colspan="3" align="left"><input type="text" class="style" name="date" id="datepicker" placeholder="Select Date" value="<?php echo date('m/d/Y');?>" required></td>
<td colspan="3" align="left"><input type="text" class="style" name="edate" id="datepicker1" placeholder="Select Date" value="<?php echo date('m/d/Y');?>" required></td>
<td colspan="14" align="center"><input list="rr" name="infu" class="form-control" autocomplete="off" required>
  <datalist id="rr">

						<option value=''>-Select Medicine</option>
						
						<?php 
			$sql = "select distinct iname from `doc_medi` where dname='$ddn'";
			$res = mysqli_query($con, $sql);
			if(mysqli_num_rows($res) > 0) {
				while($row = mysqli_fetch_object($res)) {
					echo "<option value='".$row->iname."'>".$row->iname."</option>";
				}
			}
			?>
						
						
				<?php 
			$sql76 = "select * from `medicine` where status='Active'";
			$res76 = mysqli_query($con, $sql76);
			if(mysqli_num_rows($res76) > 0) {
				while($row76 = mysqli_fetch_object($res76)) {
					echo "<option value='".$row76->mname."'>".$row76->mname."</option>";
				}
			}
			?>  </datalist></td>
</tr>

<tr>
<td colspan="5" align="center"><label><strong>Route</strong></label></td>
<td colspan="5" align="center"><label><strong>Dilution</strong></label></td>
<td colspan="10" align="center"><label><strong>Instruction</strong></label></td>


</tr>
<tr>
<td colspan="5" align="center"><input list="rr10" name="root" class="form-control" required>
  <datalist id="rr10">

						<option value=''>-Select Route</option>
						<option value='Intravenous'>Intravenous</option>
						<option value='Intramuscular'>Intramuscular</option>
						<option value='Oral'>Oral</option>
						<option value='Per Rectal'>Per Rectal</option>
						<option value='Sub Cutaneous'>Sub Cutaneous</option>
						<option value='Infusion'>Infusion</option>
						<option value='Deep Intramuscular'>Deep Intramuscular</option>
						<option value='Eye'>Eye</option>
						<option value='Ear'>Ear</option>
						<option value='Epidural'>Epidural</option>
						<option value='Nebulizer'>Nebulizer</option>
						<option value='Inhaler'>Inhaler</option>
						<option value='Nose'>Nose</option>
						<option value='Local'>Local</option>
						<option value='Per Vaginal'>Per Vaginal</option>
			  </datalist></td>
			  
			  
			  
			  
			  <td colspan="5" align="center"><input list="dilu" name="dilu" class="form-control">
  <datalist id="dilu">

						<option value=''>-Select Dilution</option>
				<?php 
			$sql76 = "select * from `medicine` where status='Active'";
			$res76 = mysqli_query($con, $sql76);
			if(mysqli_num_rows($res76) > 0) {
				while($row76 = mysqli_fetch_object($res76)) {
					echo "<option value='".$row76->mname."'>".$row76->mname."</option>";
				}
			}
			?> 
			  </datalist></td>
			  
			  
			  
			  <td colspan="10" align="center"><textarea name="ddate"  value="" /></textarea></td>

			  

</tr>
<tr>
<td colspan="20" align="center"><label><strong>Select Time</strong></label></td> 
</tr>
<tr>
<td colspan="20" align="center">

<div id="data">

<select list="rr1" name="infu1[]" multiple size="2.5" class="form-control" required>
  


<option value='SOS'>SOS</option>
						<option value='00:00'>00:00</option>
						<option value='01:00'>01:00</option>
						<option value='02:00'>02:00</option>
						<option value='03:00'>03:00</option>
						<option value='04:00'>04:00</option>
						<option value='05:00'>05:00</option>
						<option value='06:00'>06:00</option>
						<option value='07:00'>07:00</option>
						<option value='08:00'>08:00</option>
						<option value='09:00'>09:00</option>
						<option value='10:00'>10:00</option>
						<option value='11:00'>11:00</option>
						<option value='12:00'>12:00</option>
						<option value='13:00'>13:00</option>
						<option value='14:00'>14:00</option>
						<option value='15:00'>15:00</option>
						<option value='16:00'>16:00</option>
						<option value='17:00'>17:00</option>
						<option value='18:00'>18:00</option>
						<option value='19:00'>19:00</option>
						<option value='20:00'>20:00</option>
						<option value='21:00'>21:00</option>
						<option value='22:00'>22:00</option>
						<option value='23:00'>23:00</option>
			  </select>
			  
			  </div></td>

</tr>

			        
<tr><td colspan="20"align="right"><button type="submit" name="Submit">ADD</button> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<button type="submit" name="Submit1_a">ADD SET</button></td></tr>

</form>

<form name="frmMain" action="" method="post" OnSubmit="return onDelete();">


<?php



$user=$_SESSION["sess_username"];
$pmrn=$_REQUEST["pmrn"];
$eid=$_REQUEST["eid"];
//$dname=$_REQUEST["dname"];
//$id1=$_REQUEST["ID"];
//$test=$_REQUEST["test"];
//$id=$_REQUEST["id"];
//$episode=$data59["eid"];
$dd=date('m/d/Y');

$count=1;


$objConnect = mysqli_connect("localhost","root","Godiloveu16") or die("Error Connect to Database");
$objDB = mysqli_select_db($con,"sfmmkpjnew");
$strSQL = "Select * from imedi3 where pmrn= '$pmrn' and eid='$eid'and status !='Cancel' and odate='$dd' and status1='RUPDATED'order by `time` and `infusion` asc;";
$objQuery = mysqli_query($con,$strSQL) or die ("Error Query [".$strSQL."]");
//$sel_query="Select * from pmedi where pmrn= '$pmrn' and eid='$eid1'order by `id` DESC;";

?>


<table align="center" class="table table-bordered" id="dynamic_field">  
<tr>
		<td colspan="21"align="right"><font size="4.5" color="#FF0000"><b><a href="idocmeditestimo?pmrn=<?php echo "$pmrn"; ?>&eid=<?php echo "$eid"; ?>">View Today's Medicine</a></strong>&nbsp;&nbsp;<label><strong><a href="addpharmediimo?pmrn=<?php echo "$pmrn"; ?>&eid=<?php echo "$eid"; ?>">View Tomorrow's Medicine</a></strong>&nbsp;&nbsp;<a href="datewisemediimo?pmrn=<?php echo $pmrn; ?>&eid=<?php echo $eid; ?>"><font size="4.5" color="#FF0000"><b>(See Datewise Medicine List)<b></a>&nbsp;&nbsp;<a href="cancelmediimo?pmrn=<?php echo $pmrn; ?>&eid=<?php echo $eid; ?>"><font size="4.5" color="#FF0000"><b>(Today's Cancelled Medicine List)<b></a>&nbsp;&nbsp;<a target="_blank" href="imoidocmediso?pmrn=<?php echo $pmrn; ?>&eid=<?php echo $eid; ?>"><font size="4.5" color="#FF0000"><b>(Add Bulk Medicine)<b></a></td>
	   
</tr>

<tr>
      <td colspan="1" align="center"><strong>S.No</strong></td>
      
	  <td colspan="1" align="center"><strong>Order By</strong></td>
	  <td colspan="1" align="center"><strong>Order Date</strong></td>
	  <td colspan="1" align="center"><strong>Order Time</strong></td>
        
      <td colspan="4" align="center"><strong>Medication</strong></td>   
	  <td colspan="1" align="center"><strong>Route</strong></td>
	  <td colspan="1" align="center"><strong>Dilution</strong></td>
	  <td colspan="2" align="center"><strong>Instruction</strong></td>
      
      <td colspan="1" align="center"><strong>User Done</strong></td>
	  <td colspan="1" align="center"><strong>Done time</strong></td>
	  <td colspan="1" align="center"><strong>Caution</strong></td>
	  <td colspan="1" align="center"><strong>O.Type</strong></td>
	  <td colspan="1" align="center"><strong>PStatus</strong></td>
	  <td colspan="1" align="center"><strong>Stop</strong></td>
	  <td colspan="1" align="center"><strong>Stop ALL</strong></td>
	  <td colspan="1" align="center"><strong>ADD</strong></td>
      
		
       

	   </tr>
	<?php
$i = 0;
while($row = mysqli_fetch_array($objQuery))
{
$i++;

?>
   


<tr>

      <td align="center" colspan="1"><?php echo $count; ?></td>
      
      
	  <td align="center"colspan="1"><?php echo $row["orderby"]; ?></td>
	  <td align="center"colspan="1"><?php echo $row["odate"]; ?></td>
      <td align="center"colspan="1"><?php echo $row["time"]; ?></td>  
	  <td align="center"colspan="4"> <a href="addpharmediimodetails?pmrn=<?php echo "$pmrn"; ?>&eid=<?php echo "$eid"; ?>&infu=<?php echo $row['infusion'];?>"><?php echo $row["infusion"]; ?></a>
	  <input type="button" name="edit_co" value="E" id="<?php echo $row['id']; ?>" class="btn btn-info btn-xs edit_data_co" />
	  
	  
	  </td>
	  <td align="center"colspan="1"><?php echo $row["root"]; ?></td>
	  <td align="center"colspan="1"><?php echo $row["dilu"]; ?></td>
	  <td align="center"colspan="2"><?php echo $row["instruc"]; ?></td>
	  
	  <td align="center"colspan="1"><?php echo $row["udone"]; ?></td>
	  
	  <td align="center"colspan="1"><?php echo $row["donet"]; ?></td>
	  <td align="center"colspan="1"<?php if($row['alert']== "H. Medi"): ?> style="background-color:RED;"<?php else: ?> style="background-color:lightblue;" <?php endif ; ?>>
        <?php echo $row['alert'];?></td>
		<td align="center"colspan="1"<?php if($row['reuse']== "Reuse"): ?> style="background-color:GREEN;"<?php else: ?> style="background-color:lightgreen;" <?php endif ; ?>>
        <?php echo $row['reuse'];?></td>
  	  <td align="center"colspan="1"><?php echo $row["pstatus"]; ?></td>
<td align="center" colspan="1"><a onclick="return confirm_click();" href="imediupdate1?id=<?php echo $row["id"]; ?>&eid=<?php echo $row["eid"]; ?>&pmrn=<?php echo $row["pmrn"]; ?>&user=<?php echo $user; ?>">Stop</a></td>
<td align="center" colspan="1"><a href="imediupdatemo?id=<?php echo $row["id"]; ?>&user=<?php echo $user; ?>&pmrn=<?php echo "$pmrn"; ?>&eid=<?php echo "$eid"; ?>">Stop ALL</a></td>



<td align="center"colspan="1"><input type="button" name="edit" value="ADD-TO" id="<?php echo $row["id"]; ?>" class="btn btn-info btn-xs edit_data" /></td>  		  	  

	  
      </tr>
    <?php
 $count++;}
?>
<tr><td colspan="20" align="center"bgcolor="lightBlue"><b></td>
	 </tr>
<tr><td colspan="20" align="center"bgcolor="lightBlue"><b>DISPENSED MEDICINE</td>
	 </tr>
</table>
<?php
mysqli_close($objConnect);
?>
	 
</form>
	 
	<form name="frmMain1" action="" method="post" OnSubmit="return onDelete();"> 
	 <?php



$user=$_SESSION["sess_username"];
$pmrn=$_REQUEST["pmrn"];
$eid=$_REQUEST["eid"];
//$dname=$_REQUEST["dname"];
//$id1=$_REQUEST["ID"];
//$test=$_REQUEST["test"];
//$id=$_REQUEST["id"];
//$episode=$data59["eid"];
$dd=date('m/d/Y');

$count=1;


$objConnect = mysqli_connect("localhost","root","Godiloveu16") or die("Error Connect to Database");
$objDB = mysqli_select_db($con,"sfmmkpjnew");
$strSQL = "Select * from imedi3 where pmrn= '$pmrn' and eid='$eid'and status !='Cancel' and odate='$dd' and status1='SEEN'order by `time` and `infusion` asc;";
$objQuery = mysqli_query($con,$strSQL) or die ("Error Query [".$strSQL."]");
//$sel_query="Select * from pmedi where pmrn= '$pmrn' and eid='$eid1'order by `id` DESC;";

?>


<table align="center" class="table table-bordered" id="dynamic_field">  
<tr>
		
	   
</tr>

<tr>
      <td colspan="1" align="center"><strong>S.No</strong></td>
      
	  <td colspan="1" align="center"><strong>Order By</strong></td>
	  <td colspan="1" align="center"><strong>Order Date</strong></td>
	  <td colspan="1" align="center"><strong>Order Time</strong></td>
        
      <td colspan="5" align="center"><strong>Medication</strong></td>   
	  <td colspan="1" align="center"><strong>Route</strong></td>
	  	  <td colspan="1" align="center"><strong>Dilution</strong></td>
	  <td colspan="2" align="center"><strong>Instruction</strong></td>
      
      <td colspan="1" align="center"><strong>User Done</strong></td>
	  <td colspan="1" align="center"><strong>Done time</strong></td>
	  <td colspan="1" align="center"><strong>Caution</strong></td>
	  <td colspan="1" align="center"><strong>O.Type</strong></td>
	  
	  
      <td colspan="1" align="center"><strong>ADD</strong></td> 
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
   


<tr>

      <td align="center" colspan="1"><?php echo $count; ?></td>
      
      
	  <td align="center"colspan="1"><?php echo $row["orderby"]; ?></td>
	  <td align="center"colspan="1"><?php echo $row["odate"]; ?></td>
      <td align="center"colspan="1"><?php echo $row["time"]; ?></td>  
	  <td align="center"colspan="5"> <a href="addpharmediimodetails?pmrn=<?php echo "$pmrn"; ?>&eid=<?php echo "$eid"; ?>&infu=<?php echo $row['infusion'];?>"><?php echo $row["infusion"]; ?></a>
	 
	  </td>
	  <td align="center"colspan="1"><?php echo $row["root"]; ?></td>
	  <td align="center"colspan="1"><?php echo $row["dilu"]; ?></td>
	  <td align="center"colspan="2"><?php echo $row["instruc"]; ?></td>
	  
	  <td align="center"colspan="1"><?php echo $row["udone"]; ?></td>
	  
	  <td align="center"colspan="1"><?php echo $row["donet"]; ?></td>
	  <td align="center"colspan="1"<?php if($row['alert']== "H. Medi"): ?> style="background-color:RED;"<?php else: ?> style="background-color:lightblue;" <?php endif ; ?>>
        <?php echo $row['alert'];?></td>
		<td align="center"colspan="1"<?php if($row['reuse']== "Reuse"): ?> style="background-color:GREEN;"<?php else: ?> style="background-color:lightgreen;" <?php endif ; ?>>
        <?php echo $row['reuse'];?></td>
  	  

<td align="center"colspan="1"><input type="button" name="edit" value="ADD-TO" id="<?php echo $row["id"]; ?>" class="btn btn-info btn-xs edit_data" /></td>  		  	  	  


<td align="center" ><input type="checkbox" name="chkDel[]" id="chkDel<?php echo $i;?>" value="<?php echo $row["id"];?>"></td>


      </tr>
    <?php
 $count++;}
?>
<tr><td colspan="20" align="right"><button type="submit" id="btnDelete" name="btnDelete">ADD ALL</button><input type="hidden" name="hdnCount" value="<?php echo $i;?>"></td>
</tr>

</table>
<?php
mysqli_close($objConnect);
?>

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
                     <h4 class="modal-title">ADD TOMORROW MEDICINE Form</h4>  
                </div>  
                <div class="modal-body">  
                     <form method="post" id="insert_form" name="frmMain2">  
                          <label>Patient MRN</label>  
                          <input type="text" name="name" id="name" class="form-control" size="15" readonly/>  
                          
						  <label>Code</label>  
                          <input type="text" name="code" id="code" class="form-control"  size="15"readonly/>  
						  
						  
                          <label>Medicine</label>  
                          <input type="text" name="address" id="address" class="form-control"  size="15"readonly/>  
                          
                          <label>Dilution</label>  
                          <input type="text" name="result" id="result" class="form-control" />  
						  
						  <label>Instruction</label>  
                          <input type="text" name="ins" id="ins" class="form-control" />  
						  
						  <label>Route</label>  
						  <select list="rr1" name="route" id="route"  class="form-control">
                          <option value=''>-Select Route</option>
						<option value='Intravenous'>Intravenous</option>
						<option value='Intramuscular'>Intramuscular</option>
						<option value='Oral'>Oral</option>
						<option value='Per Rectal'>Per Rectal</option>
						<option value='Sub Cutaneous'>Sub Cutaneous</option>
						<option value='Infusion'>Infusion</option>
						<option value='Deep Intramuscular'>Deep Intramuscular</option>
						<option value='Eye'>Eye</option>
						<option value='Ear'>Ear</option>
						<option value='Epidural'>Epidural</option>
						<option value='Nebulizer'>Nebulizer</option>
						<option value='Inhaler'>Inhaler</option>
						<option value='Nose'>Nose</option>
						<option value='Local'>Local</option>
						<option value='Per Vaginal'>Per Vaginal</option>
			  </select>
						  
						  <label>Time</label>  
						  
						  <select list="rr1" name="time" id="time"  class="form-control">
  
<option value=''>-Select-</option>

<option value='SOS'>SOS</option>
						<option value='00:00'>00:00</option>
						<option value='01:00'>01:00</option>
						<option value='02:00'>02:00</option>
						<option value='03:00'>03:00</option>
						<option value='04:00'>04:00</option>
						<option value='05:00'>05:00</option>
						<option value='06:00'>06:00</option>
						<option value='07:00'>07:00</option>
						<option value='08:00'>08:00</option>
						<option value='09:00'>09:00</option>
						<option value='10:00'>10:00</option>
						<option value='11:00'>11:00</option>
						<option value='12:00'>12:00</option>
						<option value='13:00'>13:00</option>
						<option value='14:00'>14:00</option>
						<option value='15:00'>15:00</option>
						<option value='16:00'>16:00</option>
						<option value='17:00'>17:00</option>
						<option value='18:00'>18:00</option>
						<option value='19:00'>19:00</option>
						<option value='20:00'>20:00</option>
						<option value='21:00'>21:00</option>
						<option value='22:00'>22:00</option>
						<option value='23:00'>23:00</option>
			  </select>
                          
						                          
                          <input type="hidden" name="eid" id="eid" /> 
						  <input type="hidden" name="uprice" id="uprice" /> 
						  <input type="hidden" name="alert" id="alert" /> 
						  
						  
                          
                          <input type="hidden" name="employee_id" id="employee_id" />  
                          <input type="submit" name="insert" id="insert45" value="Insert" class="btn btn-success" />  
                     </form>  
                </div>  
                <div class="modal-footer">  
                     <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>  
                </div>  
           </div>  
      </div>  
 </div>  
</html>
<script>  
 $(document).ready(function(){  
      $('#add').click(function(){  
           $('#insert').val("Insert");  
           $('#insert_form')[0].reset();  
      });  
      $(document).on('click', '.edit_data', function(){  
           var employee_id = $(this).attr("id");  
           $.ajax({  
                url:"addmedi.php",  
                method:"POST",  
                data:{employee_id:employee_id},  
				
                dataType:"json",  
                success:function(data){  
                     $('#name').val(data.pmrn);  
                     $('#address').val(data.infusion);  
                     $('#result').val(data.dilu); 
					 $('#dname').val(data.time); 
					 $('#ins').val(data.instruc); 
					 $('#route').val(data.root); 
					 $('#eid').val(data.eid); 
					 $('#time').val(data.time); 
					 $('#alert').val(data.alert); 
					 $('#uprice').val(data.uprice); 
					 $('#code').val(data.code); 
					 
					
					  
                     
					 
                     $('#employee_id').val(data.id);  
                     $('#insert45').val("ADD");  
                     $('#add_data_Modal').modal('show');  
                }  
				 
				 
				 
				
				
           });  
      });  
      $('#insert_form').on("submit", function(event){  
           event.preventDefault();  
           if($('#name').val() == "")  
           {  
                alert("MRN is required");  
           }  
           else if($('#address').val() == '')  
           {  
                alert("Medicine is required");  
           }  
           else if($('#designation').val() == '')  
           {  
                alert("Dosage is required");  
           }  
           else if($('#age').val() == '')  
           {  
                alert("Age is required");  
           }  
           else  
           {  
                $.ajax({  
                     url:"newmediadd.php",  
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
      $(document).on('click', '.view_data', function(){  
           var employee_id = $(this).attr("id");  
           if(employee_id != '')  
           {  
                $.ajax({  
                     url:"selectmodallab.php",  
                     method:"POST",  
                     data:{employee_id:employee_id},  
                     success:function(data){  
                          $('#employee_detail').html(data);  
                          $('#dataModal').modal('show');  
                     }  
                });  
           }            
      });  
 });  
 
  
 </script>
 
 
 
 
 
 
 
   <div id="dataModal7" class="modal fade">  
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
 <div id="add_data_Modal7" class="modal fade">  
      <div class="modal-dialog">  
           <div class="modal-content">  
                <div class="modal-header">  
                     <button type="button" class="close" data-dismiss="modal">&times;</button>  
                     <h4 class="modal-title">Edit Dosage / Instruction</h4>  
                </div>  
                <div class="modal-body">  
                     <form method="post" name="insert_form7" id="insert_form7">  
                         <label>Patient MRN</label>  
                          <input type="text" name="name1" id="name1" class="form-control" size="15" readonly/>  
                          
                          <label>Medicine</label>  
                          <input type="text" name="address1" id="address1" class="form-control"  size="15"readonly/>  
                          
                          <label>Dilution</label>  
                          <input type="text" name="result1" id="result1" class="form-control" />  
						  
						  <label>Instruction</label>  
                          <input type="text" name="ins1" id="ins1" class="form-control" />  
						  
						  
						  
						  <label>Route</label>  
						  <select list="rr1" name="route1" id="route1"  class="form-control">
                          <option value=''>-Select Route</option>
						<option value='Intravenous'>Intravenous</option>
						<option value='Intramuscular'>Intramuscular</option>
						<option value='Oral'>Oral</option>
						<option value='Per Rectal'>Per Rectal</option>
						<option value='Sub Cutaneous'>Sub Cutaneous</option>
						<option value='Infusion'>Infusion</option>
						<option value='Deep Intramuscular'>Deep Intramuscular</option>
						<option value='Eye'>Eye</option>
						<option value='Ear'>Ear</option>
						<option value='Epidural'>Epidural</option>
						<option value='Nebulizer'>Nebulizer</option>
						<option value='Inhaler'>Inhaler</option>
						<option value='Nose'>Nose</option>
						<option value='Local'>Local</option>
						<option value='Per Vaginal'>Per Vaginal</option>
			  </select>
						  
						  <label>Time</label>  
						  
						  <select list="rr1" name="time1" id="time1"  class="form-control">
  
<option value=''>-Select-</option>

<option value='SOS'>SOS</option>
						<option value='00:00'>00:00</option>
						<option value='01:00'>01:00</option>
						<option value='02:00'>02:00</option>
						<option value='03:00'>03:00</option>
						<option value='04:00'>04:00</option>
						<option value='05:00'>05:00</option>
						<option value='06:00'>06:00</option>
						<option value='07:00'>07:00</option>
						<option value='08:00'>08:00</option>
						<option value='09:00'>09:00</option>
						<option value='10:00'>10:00</option>
						<option value='11:00'>11:00</option>
						<option value='12:00'>12:00</option>
						<option value='13:00'>13:00</option>
						<option value='14:00'>14:00</option>
						<option value='15:00'>15:00</option>
						<option value='16:00'>16:00</option>
						<option value='17:00'>17:00</option>
						<option value='18:00'>18:00</option>
						<option value='19:00'>19:00</option>
						<option value='20:00'>20:00</option>
						<option value='21:00'>21:00</option>
						<option value='22:00'>22:00</option>
						<option value='23:00'>23:00</option>
			  </select>
                          
						                          
                          <input type="hidden" name="eid1" id="eid1" /> 
						  <input type="hidden" name="alert1" id="alert1" /> 
						  
						  
						  
                          
                          <input type="hidden" name="employee_id2" id="employee_id2" />  
                         <input type="submit" name="insert" id="insert450" value="Insert" class="btn btn-success" />  
													
													
                           
                     </form>  
                </div>  
                <div class="modal-footer">  
                     <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>  
                </div>  
           </div>  
      </div>  
 </div>  

 
 <script>  
 $(document).ready(function(){  
      $('#add').click(function(){  
           $('#insert').val("Insert");  
           $('#insert_form7')[0].reset();  
      });  
      $(document).on('click', '.edit_data_co', function(){  
           var employee_id2 = $(this).attr("id");  
           $.ajax({  
                url:"edit_ipd_dosage.php",  
                method:"POST",  
                data:{employee_id2:employee_id2},  
				
                dataType:"json",  
                success:function(data){  
                      $('#name1').val(data.pmrn);  
                     $('#address1').val(data.infusion);  
                     $('#result1').val(data.dilu); 
					 $('#dname1').val(data.time); 
					 $('#ins1').val(data.instruc); 
					 $('#route1').val(data.root); 
					 $('#eid1').val(data.eid); 
					 $('#time1').val(data.time); 
					 $('#alert1').val(data.alert); 
					 $('#uprice1').val(data.uprice); 
					 $('#employee_id2').val(data.id);  
                     $('#insert450').val("Update");  
                     $('#add_data_Modal7').modal('show');  
					  
                     
					 
          

		  
                }  
				 
				 
				 
				
				
           });  
      });  
      $('#insert_form7').on("submit", function(event){  
           event.preventDefault();  
           if($('#phyper').val() == "")  
           {  
                alert("Name is required");  
           }  
           else if($('#pheart').val() == '')  
           {  
                alert("Address is required");  
           }  
           
           else  
           {  
          $.ajax({  
                     url:"edit_ipd_dosage1.php",  
                     method:"POST",  
                     data:$('#insert_form7').serialize(),  
                     beforeSend:function(){  
                          $('#insert').val("Inserting");  
                     },  
                     success:function(data){  
                          $('#insert_form7')[0].reset();  
                          $('#add_data_Modal7').modal('hide');  
                          $('#employee_table').html(data);  
						  
						  
						  
						  parent.location.reload();
                     }  
                });  
           }  
      });   
     
 });  
 </script>

