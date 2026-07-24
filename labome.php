<?php 
    session_start();
	//$tt = $_SESSION['sess_fullname'];
    $role = $_SESSION['sess_userrole'];
    if(!isset($_SESSION['sess_username']) || $role!="doctor"){
      header('Location: login2?err=2');
    }
?>
<?php
$url1=$_SERVER['REQUEST_URI'];
//header("Refresh: 5; URL=$url1");

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
$ugroup = $row39['ugroup'];

$apdate=date('Y-m-d');
$test=date('Y-m-d', strtotime('-30 days') );

$lab = "SELECT COUNT(id) from alltest where type='lab' and rstatus ='RECEIVED' and status ='RECEIVED' and resultstatus='Updated By Technologist' and rdate between '$test' and '$apdate' and subtype in('BIOCHEMISTRY','HAEMATOLOGY','PROFILE','FLUIDS & EXCREATIONS') and rejectby=''"; 
$lab_result= mysqli_query($con, $lab) or die(mysqli_error());
$lab_row = mysqli_fetch_array($lab_result);
$lab_r=$lab_row['COUNT(id)'];

$lab1 = "SELECT COUNT(id) from iinves where type='lab' and rstatus ='RECEIVED' and status ='RECEIVED' and resultstatus='Updated By Technologist' and rdate between '$test' and '$apdate' and subtype in('BIOCHEMISTRY','HAEMATOLOGY','PROFILE','FLUIDS & EXCREATIONS') and rejectby=''"; 
$lab_result1= mysqli_query($con, $lab1) or die(mysqli_error());
$lab_row1 = mysqli_fetch_array($lab_result1);
$lab_r1=$lab_row1['COUNT(id)'];

$lab2 = "SELECT COUNT(id) from einves where type='lab' and rstatus ='RECEIVED' and status ='RECEIVED' and resultstatus='Updated By Technologist' and rdate between '$test' and '$apdate'and subtype in('BIOCHEMISTRY','HAEMATOLOGY','PROFILE','FLUIDS & EXCREATIONS') and rejectby=''"; 
$lab_result2= mysqli_query($con, $lab2) or die(mysqli_error());
$lab_row2 = mysqli_fetch_array($lab_result2);
$lab_r2=$lab_row2['COUNT(id)'];

$lab_all=$lab_r + $lab_r1 + $lab_r2;





$lab_bb = "SELECT COUNT(id) from alltest where type='lab' and rstatus ='RECEIVED' and status ='RECEIVED' and resultstatus='Updated By Technologist' and rdate between '$test' and '$apdate' and subtype in('BLOOD BANK') and rejectby=''"; 
$lab_result_bb= mysqli_query($con, $lab_bb) or die(mysqli_error());
$lab_row_bb = mysqli_fetch_array($lab_result_bb);
$lab_r_bb=$lab_row_bb['COUNT(id)'];

$lab1_bb = "SELECT COUNT(id) from iinves where type='lab' and rstatus ='RECEIVED' and status ='RECEIVED' and resultstatus='Updated By Technologist' and rdate between '$test' and '$apdate' and subtype in('BLOOD BANK') and rejectby=''"; 
$lab_result1_bb= mysqli_query($con, $lab1_bb) or die(mysqli_error());
$lab_row1_bb = mysqli_fetch_array($lab_result1_bb);
$lab_r1_bb=$lab_row1_bb['COUNT(id)'];

$lab2_bb = "SELECT COUNT(id) from einves where type='lab' and rstatus ='RECEIVED' and status ='RECEIVED' and resultstatus='Updated By Technologist' and rdate between '$test' and '$apdate'and subtype in('BLOOD BANK') and rejectby=''"; 
$lab_result2_bb= mysqli_query($con, $lab2_bb) or die(mysqli_error());
$lab_row2_bb = mysqli_fetch_array($lab_result2_bb);
$lab_r2_bb=$lab_row2_bb['COUNT(id)'];

$lab_all_bb=$lab_r_bb + $lab_r1_bb + $lab_r2_bb;







$laba = "SELECT COUNT(id) from alltest where type='lab' and rstatus ='RECEIVED' and status ='RECEIVED' and resultstatus='Updated By Technologist' and rdate between '$test' and '$apdate' and subtype in('BACTERIOLOGY','IMMUNOLOGY/SEROLOGY','VIROLOGY') and rejectby=''"; 
$lab_resulta= mysqli_query($con, $laba) or die(mysqli_error());
$lab_rowa = mysqli_fetch_array($lab_resulta);
$lab_ra=$lab_rowa['COUNT(id)'];

$lab1a = "SELECT COUNT(id) from iinves where type='lab' and rstatus ='RECEIVED' and status ='RECEIVED' and resultstatus='Updated By Technologist' and rdate between '$test' and '$apdate' and subtype in('BACTERIOLOGY','IMMUNOLOGY/SEROLOGY','VIROLOGY') and rejectby=''"; 
$lab_result1a= mysqli_query($con, $lab1a) or die(mysqli_error());
$lab_row1a = mysqli_fetch_array($lab_result1a);
$lab_r1a=$lab_row1a['COUNT(id)'];

$lab2a = "SELECT COUNT(id) from einves where type='lab' and rstatus ='RECEIVED' and status ='RECEIVED' and resultstatus='Updated By Technologist' and rdate between '$test' and '$apdate'and subtype in('BACTERIOLOGY','IMMUNOLOGY/SEROLOGY','VIROLOGY') and rejectby=''"; 
$lab_result2a= mysqli_query($con, $lab2a) or die(mysqli_error());
$lab_row2a = mysqli_fetch_array($lab_result2a);
$lab_r2a=$lab_row2a['COUNT(id)'];

$apdate1=date('Y-m-d');
$test1=date('Y-m-d', strtotime('-30 days') );


$lab2ac = "SELECT COUNT(id) from covidopd where ssent between '$test1' and '$apdate1' and lstatus ='Received' and tresult !='' and dconfirm=''"; 
$lab_result2ac= mysqli_query($con, $lab2ac) or die(mysqli_error());
$lab_row2ac = mysqli_fetch_array($lab_result2ac);
$lab_r2ac=$lab_row2ac['COUNT(id)'];

$lab_alla=$lab_ra + $lab_r1a + $lab_r2a + $lab_r2ac;


$labh = "SELECT COUNT(id) from alltest where type='lab' and rstatus ='RECEIVED' and status ='RECEIVED' and resultstatus='Updated By Technologist' and rdate between '$test' and '$apdate' and subtype in('HISTOLOGY','CYTOLOGY') and rejectby=''"; 
$lab_resulth= mysqli_query($con, $labh) or die(mysqli_error());
$lab_rowh = mysqli_fetch_array($lab_resulth);
$lab_rh=$lab_rowh['COUNT(id)'];

$lab1h = "SELECT COUNT(id) from iinves where type='lab' and rstatus ='RECEIVED' and status ='RECEIVED' and resultstatus='Updated By Technologist' and rdate between '$test' and '$apdate' and subtype in('HISTOLOGY','CYTOLOGY')and rejectby=''"; 
$lab_result1h= mysqli_query($con, $lab1h) or die(mysqli_error());
$lab_row1h = mysqli_fetch_array($lab_result1h);
$lab_r1h=$lab_row1h['COUNT(id)'];

$lab2h = "SELECT COUNT(id) from einves where type='lab' and rstatus ='RECEIVED' and status ='RECEIVED' and resultstatus='Updated By Technologist' and rdate between '$test' and '$apdate'and subtype in('HISTOLOGY','CYTOLOGY') and rejectby=''"; 
$lab_result2h= mysqli_query($con, $lab2h) or die(mysqli_error());
$lab_row2h = mysqli_fetch_array($lab_result2h);
$lab_r2h=$lab_row2h['COUNT(id)'];

$lab_allh=$lab_rh + $lab_r1h + $lab_r2h;





$labhf = "SELECT COUNT(id) from alltest where type='lab' and rstatus ='RECEIVED' and status ='RECEIVED' and resultstatus='Updated By Technologist' and rdate between '$test' and '$apdate' and subtype in('Body Fluid') and rejectby=''"; 
$lab_resulthf= mysqli_query($con, $labhf) or die(mysqli_error());
$lab_rowhf = mysqli_fetch_array($lab_resulthf);
$lab_rhf=$lab_rowhf['COUNT(id)'];

$lab1hf = "SELECT COUNT(id) from iinves where type='lab' and rstatus ='RECEIVED' and status ='RECEIVED' and resultstatus='Updated By Technologist' and rdate between '$test' and '$apdate' and subtype in('Body Fluid')and rejectby=''"; 
$lab_result1hf= mysqli_query($con, $lab1hf) or die(mysqli_error());
$lab_row1hf = mysqli_fetch_array($lab_result1hf);
$lab_r1hf=$lab_row1hf['COUNT(id)'];

$lab2hf = "SELECT COUNT(id) from einves where type='lab' and rstatus ='RECEIVED' and status ='RECEIVED' and resultstatus='Updated By Technologist' and rdate between '$test' and '$apdate'and subtype in('Body Fluid') and rejectby=''"; 
$lab_result2hf= mysqli_query($con, $lab2hf) or die(mysqli_error());
$lab_row2hf = mysqli_fetch_array($lab_result2hf);
$lab_r2hf=$lab_row2hf['COUNT(id)'];

$lab_allhf=$lab_rhf + $lab_r1hf + $lab_r2hf;




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
   <script src="jsnew/jquery-latest.min.js" type="text/javascript"></script>
   <script src="script.js"></script>




</head>


<body>





<div id='cssmenu'>
<ul>
   <li><a href='viewnew11'><span>Home</span></a></li>
  
   <li class='last'><a href='logout'><span>LOGOUT</span></a></li>
</ul>
</div>
<p align="center" class="style1">Welcome!!  <?php echo $row39['fullname']; ?> To Laboratory Suite </p> 
<p align="right"> <?php echo "Date:" ?> <?php echo date('d/m/Y')?> </p>
<form action="" method="GET">

 <?php
$user=$_SESSION["sess_username"];
$date= date('m/d/Y');
?>
   
  </tbody>
</table>
</form>

<table width="100%" height ="100%" border="1" align="center" bgcolor="#FFFF99" style="border-collapse:collapse;">

<tr><td colspan="20"align="center"bgcolor="lightgreen"><h3> Please Select Your Desire Module</h3></td></tr>
<tr><td colspan="20"align="left"bgcolor="white"><br></td></tr>
<tr><td colspan="5"align="left"><a href="viewlab"><font size="4.5">View Lab Report BY MRN</a></td></tr>
<tr><td colspan="5"align="left"><a href="viewlabpms"><font size="4.5">View Lab Report BY MRN(Only PMS)</a></td></tr>

<?php 
if($ugroup=='lab' and $user=='153')
{echo
'<tr><td colspan="5"align="left"><a href="testapproveae"><font size="4.5">Pending Approval List(A&E)</a></td></tr>
<tr><td colspan="5"align="left"><a href="testapproveopd"><font size="4.5">Pending Approval List(OPD)</a></td></tr>
<tr><td colspan="5"align="left"><a href="testapprove"><font size="4.5">Pending Approval List(IPD)</a></td></tr>
<tr><td colspan="3" align="left"><a href="categoryinves"><font size="4.5">	Categorywise Investigation Search</a></td>	</tr>
	
<tr><td colspan="3" align="left"><a href="categoryinvesmng"><span>Edit Category Wise Investigation List</span></a></td>		</tr>
<tr><td colspan="3" align="left"><a href="coviddoc2"><span>Covid Stats</span></a></td>		</tr>
<tr><td colspan="5"align="left"><a href="lab_all_opd_2"><font size="4.5">Approved Investigation List(Last 2 Days)</a></td></tr>		

<tr><td colspan="5"align="left" bgcolor="lightgreen"><a href="lab_all_opd"><font size="4.5">All Pending Approval List(BIOCHEMISTRY, HAEMATOLOGY, PROFILE, FLUIDS & EXCREATIONS, BLOOD BANK)</a><strong style="color:red;">('.$lab_all.')</strong></td></tr>		
<tr><td colspan="5"align="left" bgcolor="lightgreen"><a href="lab_all_opd_bac"><font size="4.5">All Pending Approval List(BACTERIOLOGY, IMMUNOLOGY/SEROLOGY,VIROLOGY)</a><strong style="color:red;">('.$lab_alla.')</strong></td></tr>		
<tr><td colspan="5"align="left" bgcolor="lightgreen"><a href="lab_all1_histo"><font size="4.5">All Pending Approval List(Histology)</a><strong style="color:red;">('.$lab_allh.')</strong></td></tr>		
<tr><td colspan="5"align="left" bgcolor="lightgreen"><a href="lab_allf"><font size="4.5">All Pending Approval List(Body Fluid)</a><strong style="color:red;">('.$lab_allhf.')</strong></td></tr>			
<tr><td colspan="5"align="left"><a href="labstatmng"><font size="4.5">Individual Investigation Stats</a></td></tr>	  
<tr><td colspan="5"align="left"><a href="datewiselab"><font size="4.5">All Investigation Stats</a></td></tr>
<tr><td colspan="5"align="left"><a href="datewiselab_reports"><strong style="color:red;">Datewise All Received Sample Stats</a></td></tr>
<tr><td colspan="5"align="left"><a href="inves_done_stats"><strong style="color:red;">Investigation Done Stats</a></td></tr>
<tr><td colspan="5"align="left"><a href="categoryinvesmng_doc"><strong style="color:red;">Reference Value Update</a></td></tr>';}

if($ugroup=='lab' and $user=='1580')
{echo
'
<tr><td colspan="3" align="left"><a href="categoryinves"><font size="4.5">	Categorywise Investigation Search</a></td>	</tr>
	
<tr><td colspan="3" align="left"><a href="categoryinvesmng"><span>Edit Category Wise Investigation List</span></a></td>		</tr>
<tr><td colspan="3" align="left"><a href="coviddoc2"><span>Covid Stats</span></a></td>		</tr>
<tr><td colspan="5"align="left"><a href="lab_all_opd_2"><font size="4.5">Approved Investigation List(Last 2 Days)</a></td></tr>		

<tr><td colspan="5"align="left" bgcolor="lightgreen"><a href="lab_all_opd"><font size="4.5">All Pending Approval List(BIOCHEMISTRY, HAEMATOLOGY, PROFILE, FLUIDS & EXCREATIONS)</a><strong style="color:red;">('.$lab_all.')</strong></td></tr>		
<tr><td colspan="5"align="left" bgcolor="lightgreen"><a href="lab_all_opd_bb"><font size="4.5">All Pending Approval List(BLOOD BANK)</a><strong style="color:red;">('.$lab_all_bb.')</strong></td></tr>		
<tr><td colspan="5"align="left" bgcolor="lightgreen"><a href="lab_all_opd_bac"><font size="4.5">All Pending Approval List(BACTERIOLOGY, IMMUNOLOGY/SEROLOGY,VIROLOGY)</a><strong style="color:red;">('.$lab_alla.')</strong></td></tr>		
<tr><td colspan="5"align="left" bgcolor="lightgreen"><a href="lab_all1_histo"><font size="4.5">All Pending Approval List(Histology)</a><strong style="color:red;">('.$lab_allh.')</strong></td></tr>		
<tr><td colspan="5"align="left" bgcolor="lightgreen"><a href="lab_allf"><font size="4.5">All Pending Approval List(Body Fluid)</a><strong style="color:red;">('.$lab_allhf.')</strong></td></tr>			
<tr><td colspan="5"align="left"><a href="labstatmng"><font size="4.5">Individual Investigation Stats</a></td></tr>	  
<tr><td colspan="5"align="left"><a href="datewiselab"><font size="4.5">All Investigation Stats</a></td></tr>
<tr><td colspan="5"align="left"><a href="datewiselab_reports"><strong style="color:red;">Datewise All Received Sample Stats</a></td></tr>
<tr><td colspan="5"align="left"><a href="inves_done_stats"><strong style="color:red;">Investigation Done Stats</a></td></tr>
<tr><td colspan="5"align="left"><a href="categoryinvesmng_doc"><strong style="color:red;">Reference Value Update</a></td></tr>

';}

if($ugroup=='lab' and $user=='1584')
{echo
  '
  <tr><td colspan="3" align="left"><a href="categoryinves"><font size="4.5">	Categorywise Investigation Search</a></td>	</tr> 
  
  
  <tr><td colspan="5"align="left"><a href="lab_all_opd_2"><font size="4.5">Approved Investigation List(Last 2 Days)</a></td></tr>		
  
  <tr><td colspan="5"align="left" bgcolor="lightgreen"><a href="lab_all_opd_bb"><font size="4.5">All Pending Approval List(BLOOD BANK)</a><strong style="color:red;">('.$lab_all_bb.')</strong></td></tr>		
  <tr><td colspan="5"align="left"><a href="labstatmng"><font size="4.5">Individual Investigation Stats</a></td></tr>	  
  <tr><td colspan="5"align="left"><a href="datewiselab"><font size="4.5">All Investigation Stats</a></td></tr>
  <tr><td colspan="5"align="left"><a href="datewiselab_reports"><strong style="color:red;">Datewise All Received Sample Stats</a></td></tr>
  <tr><td colspan="5"align="left"><a href="inves_done_stats"><strong style="color:red;">Investigation Done Stats</a></td></tr>
  <tr><td colspan="5"align="left"><a href="categoryinvesmng_doc"><strong style="color:red;">Reference Value Update</a></td></tr>

  <tr><td colspan="5"align="left"><a href="blood_bank_stats_type" style="color:green;font-size:18px;"><strong>Datewise Blood Bank Stats</a></td></tr>
  <tr><td colspan="5"align="left"><a href="teslab2" style="color:green;font-size:18px;"><strong>Blood Bank Stock</a></td></tr>
  
  <tr><td colspan="5"align="left"><a href="teslab3_issued"><span>Issued Blood List</span></a></td></tr>
  <tr><td colspan="5"align="left"><a href="lab_blood_return"><span>Return Blood</span></a></td></tr>
  <tr><td colspan="5"align="left"><a href="lab_blood_report"><span>Transfusion Reaction Report</span></a></td></tr>
  <tr><td colspan="5"align="left"><a href="discard_blood_bank"><span>Expired Blood Bag List</span></a></td></tr>
  ';}
  
  if($ugroup=='lab' and $user=='1602' || $user=='865')
  {echo
  '<tr><td colspan="3" align="left"><a href="categoryinves"><font size="4.5">	Categorywise Investigation Search</a></td>	</tr>
    
  
  
  <tr><td colspan="5"align="left"><a href="lab_all_opd_2"><font size="4.5">Approved Investigation List(Last 2 Days)</a></td></tr>		
  
  
  
  <tr><td colspan="5"align="left" bgcolor="lightgreen"><a href="lab_all1_histo"><font size="4.5">All Pending Approval List(Histology)</a><strong style="color:red;">('.$lab_allh.')</strong></td></tr>		
  
  <tr><td colspan="5"align="left"><a href="labstatmng"><font size="4.5">Individual Investigation Stats</a></td></tr>	  
  <tr><td colspan="5"align="left"><a href="datewiselab"><font size="4.5">All Investigation Stats</a></td></tr>
  <tr><td colspan="5"align="left"><a href="datewiselab_reports"><strong style="color:red;">Datewise All Received Sample Stats</a></td></tr>
  <tr><td colspan="5"align="left"><a href="inves_done_stats"><strong style="color:red;">Investigation Done Stats</a></td></tr>
  <tr><td colspan="5"align="left"><a href="categoryinvesmng_doc"><strong style="color:red;">Reference Value Update</a></td></tr>
  
  ';}
    

?>





</table>
    


  
    

   
  </tbody>
</table>
</form>

</body>

</html>
