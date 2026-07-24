<?php 
    session_start();
    $role = $_SESSION['sess_userrole'];
    if(!isset($_SESSION['sess_username']) || $role!="nurse"){
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

/*$query139 = "SELECT * FROM user where uname= '$user'"; 
	 
$result139 = mysqli_query($con, $query139) or die(mysqli_error());

// Print out result
$row139 = mysqli_fetch_array($result139);
$dname=$row139['fullname'];
*/
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

$sel990="SELECT * FROM medicine WHERE `mname`='$infu';";
$result990 = mysqli_query($con,$sel990);
$rowz = mysqli_fetch_assoc($result990);
$uprice=$rowz['uprice'];
$alert=$rowz['alert'];
$p_code=$rowz['code'];
$url = "imoidocmedi.php?pmrn=$pmrn&eid=$eid"; 

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

$sel94="SELECT * FROM imedi2 WHERE `pmrn`='$pmrn' and `eid`='$eid' and`infusion`='$infu' and odate='$datem1' and `time`='$infu1' and `status`='Active' and status1 in ('SEEN','Rupdated');";
$result94 = mysqli_query($con,$sel94);

			
if($res94=mysqli_num_rows($result94)>0)
{
echo '<script language="javascript">';
    echo 'alert("This Medicine is Already Added in Todays Order  !!"); ';

    echo '</script>';
	
	//header("Refresh: .1; URL=$url");
}

else 
        { 
            // Retrieving each selected option 
            //foreach ($_POST['infu1'] as $infu1)  
            //print "You selected $subject<br/>"; 
			//{	

$ins_query6="insert into imedi2 (`pmrn`,`dname`,`eid`,`infusion`,`time`,`instruc`,`alert`,`orderby`,`odate`,`status`,`root`,`status1`,`pstatus`,`ortime`,`dilu`,`ndate`,`uprice`,`code`) values 
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



$sel990="SELECT * FROM medicine WHERE `mname`='$ii';";
$result990 = mysqli_query($con,$sel990);
$rowz = mysqli_fetch_assoc($result990);
$uprice2=$rowz['uprice'];
$alert=$rowz['alert'];
$p_code=$rowz['code'];
$url = "imoidocmedi.php?pmrn=$pmrn&eid=$eid"; 

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

$sel94="SELECT * FROM imedi2 WHERE `pmrn`='$pmrn' and `eid`='$eid' and`infusion`='$ii' and odate='$datem1' and `time`='$infu1' and `status`='Active' and status1 in ('SEEN','Rupdated');";
$result94 = mysqli_query($con,$sel94);

			
if($res94=mysqli_num_rows($result94)>0)
{
echo '<script language="javascript">';
    echo 'alert("This Medicine is Already Added in Todays Order  !!"); ';

    echo '</script>';
	
	//header("Refresh: .1; URL=$url");
}

else 
        { 
            // Retrieving each selected option 
            //foreach ($_POST['infu1'] as $infu1)  
            //print "You selected $subject<br/>"; 
			//{	

$ins_query6="insert into imedi2 (`pmrn`,`dname`,`eid`,`infusion`,`time`,`instruc`,`alert`,`orderby`,`odate`,`status`,`root`,`status1`,`pstatus`,`ortime`,`dilu`,`ndate`,`uprice`,`code`) values 
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
			
			$qq = mysqli_query($db,"select * from imedi2 where id='".$_POST["chkDel"][$i]."'");
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
			//$pdos=$_POST["test3"][$i];
			$ortime = date('d/m/Y H:i:s');
			
			
			$sel95 = "SELECT * from medicine where mname='$infu' and pre in('Tablet','Vaginal Suppository','VT','Suppository','Soft Capsule','Sachet','Capsule','Injection')"; 
$result95 = mysqli_query($con,$sel95);
			
			
			$sel90 = "SELECT * from imedi2 where pmrn='$pmrn' and time='$time' and odate='$odate' and infusion='$infu' and status='Active'"; 
$result90 = mysqli_query($con,$sel90);
if($row90=mysqli_num_rows($result90)>0)
	{
echo '<script language="javascript">';
    echo 'alert("Unsuccessful !! Medicine Already Added in Tommorows List!!"); ';

    echo '</script>';
	
	}

			else if($row95=mysqli_num_rows($result95)>0)
			
			
			{
			$strSQL = "insert into imedi2 (`pmrn`,`dname`,`eid`,`infusion`,`time`,`instruc`,`alert`,`orderby`,`odate`,`status`,`root`,`status1`,`pstatus`,`ortime`,`dilu`,`uprice`,`code`) values 
('$pmrn','$dname','$eid','$infu','$time','$instruc','$alert','$user','$odate','Active','$root','Rupdated','Ordered','$ortime','$dilu','$uprice1','$p_code')";
			//$strSQL .="WHERE id = '".$_POST["chkDel"][$i]."' ";
			$objQuery = mysqli_query($objConnect,$strSQL);

	
			}
			
			else 
			
			
			{
			$strSQL = "insert into imedi2 (`pmrn`,`dname`,`eid`,`infusion`,`time`,`instruc`,`alert`,`orderby`,`odate`,`status`,`root`,`status1`,`pstatus`,`ortime`,`dilu`,`reuse`,`uprice`,`code`) values 
('$pmrn','$dname','$eid','$infu','$time','$instruc','$alert','$user','$odate','Active','$root','Rupdated','Ordered','$ortime','$dilu','Reuse','$uprice1','$p_code')";
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
$strSQL = "Select * from imedi2 where pmrn= '$pmrn' and eid='$eid' and status!='Cancel' and status1='Rupdated' and odate='$dd' order by `time` asc;";
$objQuery = mysqli_query($con,$strSQL) or die ("Error Query [".$strSQL."]");
//$sel_query="Select * from pmedi where pmrn= '$pmrn' and eid='$eid1'order by `id` DESC;";

?>


<table align="center" class="table table-bordered" id="dynamic_field">  
<tr><td colspan="20" align="right"bgcolor="pink"><a href="nursemedireturn?pmrn=<?php echo "$pmrn"; ?>&eid=<?php echo "$eid"; ?>"><strong>Return Medi List</strong></a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<a href="cancelmediimo?pmrn=<?php echo $pmrn; ?>&eid=<?php echo $eid; ?>"><font size="4.5" color="#FF0000"><b>(Today's Cancelled Medicine List)<b></a></td></tr>
<tr><td colspan="20" align="center"bgcolor="lightgreen"><label><strong>Medication Form</strong></label></td> </tr>

<tr>
       <td colspan="1" align="center"><strong>S.No</strong></td>
      
      <td colspan="1" align="center"><strong>MRN</strong></td>
	        <td colspan="2" align="center"><strong>Order By</strong></td>
      <td colspan="1" align="center"><strong>Order Date </strong></td>
      <td colspan="2" align="center"><strong>Order Time</strong></td>   
      <td colspan="5" align="center"><strong>Medication</strong></td>
	  <td colspan="1" align="center"><strong>Route</strong></td>
	  <td colspan="3" align="center"><strong>Instruction</strong></td>

	  <td colspan="1" align="enter"><strong>Caution</strong></td>
	  <td colspan="1" align="enter"><strong>O.Type</strong></td>
	  <td colspan="1" align="center"><strong>PStatus</strong></td>
	  <td colspan="1" align="center"><strong>UPDATE</strong></td>
      
		
       

	   </tr>
	<?php
$i = 0;
while($row = mysqli_fetch_array($objQuery))
{
$i++;

?>
   


<tr>

      <td align="center" colspan="1"><?php echo $count; ?></td>
      
      <td align="center"colspan="1"><?php echo $row["pmrn"]; ?></td>
	  <td align="center"colspan="2"><?php echo $row["orderby"]; ?></td>
	  <td align="center"colspan="1"><?php echo $row["odate"]; ?></td>  
      <td align="center"colspan="2"><?php echo $row["time"]; ?></td>
	  
<?php

$ii=$row['id'];
$query43 = "SELECT COUNT(pstatus) FROM imedi2 where id= '$ii' and pstatus='Ordered' and status !='Cancel';"; 
$result43 = mysqli_query($con, $query43) or die(mysqli_error());
$row43 = mysqli_fetch_assoc($result43);
$count55 =$row43['COUNT(pstatus)'];
?>
	  
	  
      <td align="center"colspan="5"<?php if($count55>0): ?> style="background-color:RED;"<?php else: ?> style="" <?php endif ; ?>><?php echo $row["infusion"]; ?></td>
	  <td align="center"colspan="1"><?php echo $row["root"]; ?></td>  
	  <td align="center"colspan="3"><?php echo $row["instruc"]; ?></td>  
	  
  	  <td align="center"colspan="1"<?php if($row['alert']== "H. Medi"): ?> style="background-color:RED;"<?php else: ?> style="background-color:lightblue;" <?php endif ; ?>>
        <?php echo $row['alert'];?></td>
		<td align="center"colspan="1"<?php if($row['reuse']== "Reuse"): ?> style="background-color:GREEN;"<?php else: ?> style="background-color:lightgreen;" <?php endif ; ?>>
        <?php echo $row['reuse'];?></td>
	  <td align="center"colspan="1"><?php echo $row["pstatus"]; ?></td>  
	  
<?php

$pm=$row['pmrn'];
$ed=$row['eid'];
$idd=$row['id'];
$ps=$row['pstatus'];
$cc=$row['code'];
$rf=$row['rfid'];
$reuse=$row['reuse'];


$url8 = "imedi2test_new?pmrn=$pm&eid=$ed&id=$idd&user=$user&code=$cc&rf=$rf&reuse=$reuse"; 
?>
	  
<td colspan="1" align="center"><?php if($ps=='Served'){echo"<a href='$url8'><strong>UPDATE<strong></a>";} else if($ps!='Served')
{echo'<input type="button" name="kk" value="Use From Stock" id="'.$row['id'].'" class="btn btn-info btn-xs edit_data_co" />';} ?></a>


</td>	  
	  
	  
      </tr>
    <?php
 $count++;}
?>
<?php
mysqli_close($objConnect);
?>


<tr><td colspan="20" align="center"></td></tr>
	<tr><td colspan="20" align="center"bgcolor="lightgreen"><Strong><b>Implemented Medicine List<b><strong></td></tr>
<tr>
      <td colspan="1" align="center"><strong>S.No</strong></td>
      
	  <td colspan="1" align="center"><strong>Order By</strong></td>
	  <td colspan="1" align="center"><strong>Order Date</strong></td>
	  <td colspan="1" align="center"><strong>Order Time</strong></td>
        
      <td colspan="6" align="center"><strong>Medication</strong></td>  
	  <td colspan="1" align="center"><strong>Route</strong></td>  
	  
      <td colspan="2" align="center"><strong>Status</strong></td>
      <td colspan="1" align="center"><strong>User Done</strong></td>
	  <td colspan="2" align="center"><strong>Done time</strong></td>
	  <td colspan="2" align="center"><strong>Done Time</strong></td>
	  <td colspan="1" align="center"><strong>Caution</strong></td>
	  <td colspan="1" align="center"><strong>O.Type</strong></td>
	  
       

	   </tr>
 
 
 <?php
	
$user=$_SESSION["sess_username"];
$pmrn=$pmrn;
//$id=$_REQUEST["id"];
$episode=$data59["eid"];

$count=1;
$sel_query="Select * from imedi2 where pmrn= '$pmrn' and eid='$eid' and status1 in ('implemented','SEEN') and odate='$dd'order by `donet` desc;";

$result = mysqli_query($con,$sel_query);

while($row = mysqli_fetch_assoc($result)) 
{ ?>    <tr>

      <td align="center" colspan="1"><?php echo $count; ?></td>
      
      
	  <td align="center"colspan="1"><?php echo $row["orderby"]; ?></td>
	  <td align="center"colspan="1"><?php echo $row["odate"]; ?></td>
      <td align="center"colspan="1"><?php echo $row["time"]; ?></td>  
	  <td align="center"colspan="6"><?php echo $row["infusion"]; ?></td>
	  <td align="center"colspan="1"><?php echo $row["root"]; ?></td>  
	  <td align="center"colspan="2"><?php echo $row["instruc"]; ?></td>
	  <td align="center"colspan="1"><?php echo $row["status"]; ?></td>
	  
	  <td align="center"colspan="2"><?php echo $row["udone"]; ?></td>
	  
	  <td align="center"colspan="2"><?php echo $row["donet"]; ?></td>
	  <td align="center"colspan="1"<?php if($row['alert']== "H. Alert"): ?> style="background-color:RED;"<?php else: ?> style="background-color:lightblue;" <?php endif ; ?>>
        <?php echo $row['alert'];?></td>
  	  <td align="center"colspan="1"<?php if($row['reuse']== "Reuse"): ?> style="background-color:Green;"<?php else: ?> style="background-color:LightGreen;" <?php endif ; ?>>
        <?php echo $row['reuse'];?></td>

	  
      </tr>
	  
    <?php $count++; } ?>
	
	</table>	 

</form>

</body>

</html>

 
 
 
 
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
					 <?php if(isset($_POST['kk']))
						 
						 {echo 'dsf';}?>

                         <label>Patient MRN </label>  
                          <input type="text" name="name1" id="name1" class="form-control" size="15" readonly/>  
						  
						  <label>Patient EID</label>  
                          <input type="text" name="dname1" id="dname1" class="form-control" size="15" readonly/>  
                          
                          <label>Medicine</label>  
                          <input type="text" name="address1" id="address1" class="form-control"  size="15"readonly>  
                          <?php echo $row['id'];?>
						  
						 

						
                          
						<input type="text" name="yy" id="yy" class="form-control" >
						
		<script>


var ccode=document.getElementById('yy');

</script>

						
						  <label>Stock<?php echo $_POST['yy'];?></label>  
						  
						<input list="stock" name="dilu" id="dilu" class="form-control" autocomplete='Off'>
  <datalist id="stock">

						<option value=''>-Select Dilution</option>
				<?php 
			$sql76 = "select * from `medi_stock` where location in ('ICU','NICU','5AB Medicine stock','5CD Medicine stock','6AB Medicine stock','6CD Medicine stock','HMD','Cathlab and SPD','5AB emergency trolley','5CD emergency trolley','6th Fl emergency trolley','Maternity Suite') and add_qty!='0'";
			$res76 = mysqli_query($con, $sql76);
			if(mysqli_num_rows($res76) > 0) {
				while($row76 = mysqli_fetch_object($res76)) {
					echo "<option value='".$row76->sno."'>".$row76->g_name.'-'.$row76->sno."</option>";
				}
			}
			?> 
			  </datalist>
                     
						                          
                          <input type="hidden" name="eid1" id="eid1" /> 
						  <input type="hidden" name="alert1" id="alert1" /> 
						  	  <input type="hidden" name="uprice1" id="uprice1" /> 
						  
						  
						  
                          
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
		   var employee_id3 = $(this).attr("name");  
           $.ajax({  
                url:"edit_ipd_nurse.php",  
                method:"POST",  
                data:{employee_id2:employee_id2},  
				
                dataType:"json",  
                success:function(data){  
                      $('#name1').val(data.pmrn);  
                     $('#address1').val(data.infusion);  
                     $('#dilu').val(data.dilu); 
					 $('#dname1').val(data.eid); 
					 $('#ins1').val(data.instruc); 
					 $('#route1').val(data.root); 
					 $('#eid1').val(data.eid); 
					 $('#time1').val(data.time); 
					 $('#alert1').val(data.alert); 
					 $('#uprice1').val(data.code); 
					 $('#yy').val(employee_id3); 
					 $('#employee_id2').val(data.id);  
                     $('#insert450').val("Update");  
                     $('#add_data_Modal7').modal('show');  
					  
                     
					 
          

		  
                }  
				 
				 
				 
				
				
           });  
      });  
      $('#insert_form7').on("submit", function(event){  
           event.preventDefault();  
           if($('#name1').val() == "")  
           {  
                alert("Name is required");  
           }  
           else if($('#address1').val() == '')  
           {  
                alert("Address is required");  
           }  
           
           else  
           {  
          $.ajax({  
                     url:"edit_update_nurse1.php",  
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

