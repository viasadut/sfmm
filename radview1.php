<?php 
    session_start();
    require('db1.php');
	$role = $_SESSION['sess_userrole'];
	
	$queryc = "SELECT COUNT(utype) FROM user where '$role' in ('doctor','rad','staff')"; 
$resultc = mysqli_query($con, $queryc) or die(mysqli_error());
$rowc = mysqli_fetch_array($resultc);
$c1=$rowc['COUNT(utype)'];
	
    if(!isset($_SESSION['sess_username']) || $c1==0){
      header('Location: login2?err=2');
    }
?>
<?php
$url1=$_SERVER['REQUEST_URI'];
//header("Refresh: 30; URL=$url1");
 $test=date('Y-m-d', strtotime('-30 days') );
 $test1=date('Y-m-d');
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
$row39 = mysqli_fetch_array($result39);
//$full = $row39['fullname'];
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
button {
  padding: 19px 39px 18px 39px;
  color: #FFF;
  background-color: #A085C6;
  /*#4bc970*/
  font-size: 18px;
  text-align: center;
  font-style: normal;
  border-radius: 5px;
  width: 100%;
  height: 5%
  border: 1px solid #8265B0;
  /*#3ac162*/
  border-width: 1px 1px 3px;
  box-shadow: 0 -1px 0 rgba(255,255,255,0.1) inset;
  margin-bottom: 10px;
}
</style>


   <link rel="stylesheet" href="styles.css">
   <script src="jsnew/jquery-latest.min.js" type="text/javascript"></script>
   <script src="script.js"></script>




</head>


<body>


<div id='cssmenu'>
<ul>
   <li><a href='tesrad'><span>Home</span></a></li>
      <li><a href='radapp'><span>Appointment</span></a></li>
      
      <li class='active has-sub'><a href='#'><span>Reports</span></a>
      <ul>
         <li class='last'><a href='todayreport'><span>Today's Report</span></a></li>
		 <li class='has-sub'><a href='donereport'><span>Search Done Reports</span></a>
		 <li class='has-sub'><a href='allreport'><span>Datewise All Done Report </span></a>
            <li class='last'><a href='raddtsearch2'><span>Patients pending Report Search</span></a></li>
			<li class='last'><a href='radapp22'><span>Patients Appointment Report</span></a></li>
         </li>
		 
      </ul>
   </li>
	  <li class='last'><a href='radview1'><span>Pending Reports</span></a></li>
	  	  <li class='last'><a href='viewnewrad'><span>Search Pervious Patients</span></a></li>
		  <li class='last'><a href='rpapp22'><span>New Patients</span></a></li>
		  <li class='last'><a href='raddtsearch'><span>Patients pending request Search</span></a></li>
		  		  
      <li class='last'><a href='logout'><span>LOGOUT</span></a></li>
</ul>
</div>







<p align="center" class="style1">!! WELCOME !! <?php echo $fullname; ?>'s Dash Board </p> 
<form action="cviewsp1" method="Post">

								
					
<table width="100%" height ="100%" border="1" align="center" bgcolor="#FFFF99" style="border-collapse:collapse;">


    
    <tr>
      <th width="4%"><strong>S.No</strong></th>
      <th width="17%"><strong>Patient's Name</strong></th>
	        <th width="14%"><strong>Date</strong> 
      <th width="10%"><strong>MRN</strong></th>
	  <th width="10%"><strong>Investigation Name</strong></th>
	  <th width="10%"><strong>Instruction</strong></th>
	  <th width="10%"><strong>A_NO</strong></th>
      <th width="15%"><strong>Appointment Time </strong>

      <th width="14%"><strong>Reffered From</strong>
      
      

	  
	        <th width="14%"><strong>Update</strong>
			<th width="14%"><strong>All Reports</strong>
			<th width="14%"><strong>All Records</strong>
	  



	   </tr>
  </thead>
  <tbody>
  
    
	<?php
	
$user=$_SESSION["sess_username"];
//$start=$_REQUEST["stdate"];
//$end=$_REQUEST["endate"];
//$bt=$_REQUEST["bt"];
	
	
	

//$user=$_SESSION["sess_username"];
$date= date('m/d/Y');
$count=1;

$sel_query="Select * from radpapp where adate1 between '$test' and '$test1' and status in ('NOT SEEN','Draft') ORDER BY id desc;";

$result = mysqli_query($con,$sel_query);
//echo   $bt;
echo "Today's Unseen Patients";

while($row = mysqli_fetch_assoc($result)) { ?>
    <tr>
      <td align="center"><?php echo $count; ?></td>
      <td align="center"><?php echo $row["pname"]; ?></td>
	  <td align="center"><?php echo $row["adate"]; ?> </td>
      <td align="center"><a href="radpre_new_typist?pmrn=<?php echo $row["pmrn"]; ?>&ID=<?php echo $row["ID"];?>&dreffer=<?php echo $row["dreffer"];?>&dname1=<?php echo $row["dname"];?>"><?php echo $row["pmrn"]; ?></a> </td>
	   <td align="center"><?php echo $row["tname"]; ?> </td>
		  <td align="center"><?php echo $row["ins"]; ?> </td>
	  
	  <td align="center"><?php echo $row["a_no"]; ?></td>
      <td align="center"><?php echo $row["aslot"]; ?></td>
       
	  <td align="center"><?php echo $row["dreffer"]; ?>  </td>
	  	 
      

	       
		   
	  	 	  <?php
/*$tt1=$row['pmrn'];
$date455=date('Y-m-d');


$queryc = "SELECT * FROM covidopd where pmrn= '$tt1' order by id DESC limit 1"; 
	 
$resultc = mysqli_query($con, $queryc) or die(mysqli_error());

// Print out result
$rowc = mysqli_fetch_array($resultc);

$cr=$rowc['tresult'];


$tt=$rowc['tresult'];
$dcon=$rowc["dconfirm"];
$ss1=$rowc["ssent"];
$ss=date('m/d/Y', strtotime($rowc["ssent"]));



$date45=date('m/d/Y',strtotime($date455));

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

?>



		   
		   
		   <td align="center" style="font:Verdana, Arial, Helvetica, sans-serif large" style="font-weight:bold"><a href="radpre_new_typist?pmrn=<?php echo $row["pmrn"]; ?>&ID=<?php echo $row["ID"];?>&dreffer=<?php echo $row["dreffer"];?>&dname1=<?php echo $row["dname"];?>">UPDATE</a> </td>
		   <td align="center"><a target='_blank' href="allreportdocnew?pmrn=<?php echo $row["pmrn"]; ?>&ID=<?php echo $row["ID"];?>&dreffer=<?php echo $row["dreffer"];?>&dname1=<?php echo $row["dname"];?>">All Reports</a> </td>
		   <td align="center"><a target='_blank' href="deathstatdetailsmng?pmrn=<?php echo $row["pmrn"]; ?>&ID=<?php echo $row["ID"];?>&dreffer=<?php echo $row["dreffer"];?>&dname1=<?php echo $row["dname"];?>">All Records</a> </td>
		   <td align="center"><a target='_blank' href="opd_sticker?a_no=<?php echo $row["a_no"]; ?>">Sticker</a> </td>
		     


	       
	  
      </tr>
    <?php $count++; } ?>
  </tbody>
</table>

<br><br>


</form>


</body>

</html>
