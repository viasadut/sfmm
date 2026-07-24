<?php 
    session_start();
    require('db1.php');
	$role = $_SESSION['sess_userrole'];
	
	$queryc = "SELECT COUNT(utype) FROM user where '$role' in ('mng','doctor','mrd','bill','billin')"; 
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

$proce = $_REQUEST['proce'];

$fullname = $_SESSION['sess_username'];
$query39 = "SELECT * FROM user where uname= '$fullname'"; 
	 
$result39 = mysqli_query($con, $query39) or die(mysqli_error());

// Print out result
$row39 = mysqli_fetch_array($result39)
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

<script type="text/javascript">
function confirm_click()
{
return confirm("Are you Sure to Stop The Medicine ?");
}

</script>


</head>


<body>


<div id='cssmenu'>
<ul>
   <li><a href='cviewsp1'><span>Home</span></a></li>
      <li class='active has-sub'><a href='#'><span>Appointment</span></a>
      <ul>
         <li class='has-sub'><a href='cggttt'><span>Set Doctor's Appointment</span></a>
            
         </li>
         <li class='has-sub'><a href='ami'><span>Set Restrictions on Appointment Time</span></a>
            
         </li>
		 <li class='has-sub'><a href='cview'><span>List of Unpaid Appointment</span></a>
            
         </li>
		 		 <li class='has-sub'><a href='cviewsp11'><span>Doctor's Available Slot</span></a>
            
         </li>
      </ul>
	  
   </li>

    	    <li class='last'><a href='gg1new'><span>Set Patient's Appointment</span></a></li>
      <li class='last'><a href='view4'><span>Search previous patients</span></a></li>
	  <li class='last'><a href='app1'><span>Appointment Report</span></a></li>
   <li class='last'><a href='logout'><span>LOGOUT</span></a></li>
</ul>
</div>








<p align="center" class="style1">!! WELCOME !! <?php echo $fullname; ?>'s Dash Board </p> 
<form action="" method="Post">

								
					
<table width="100%" height ="100%" border="1" align="center" bgcolor="#FFFF99" style="border-collapse:collapse;">


    
    <tr>
      <th width="4%"><strong>S.No</strong></th>
      <th width="14%"><strong>Consultant Name</strong>
	  <th width="17%"><strong>Patient's Name</strong></th>
      <th width="10%"><strong>MRN</strong></th>
      <th width="15%"><strong>OT Time </strong>
      <th width="14%"><strong>Anaethetist Name</strong> 
      <th width="14%"><strong>Duration</strong>
      <th width="14%"><strong>Procedure</strong>  
      
	        <th width="14%"><strong>Type</strong>
			
			<th width="14%"><strong>OT Charge</strong>
			<th width="14%"><strong>Inpatient Charge</strong>
			<th width="14%"><strong>Total Charge</strong>
			
	  



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

$sel_query="Select * from ot where proce='$proce' and status='Received' ORDER BY id DESC LIMIT 10;";

$result = mysqli_query($con,$sel_query);
//echo   $bt;
echo "Today's OT Plan List";

while($row = mysqli_fetch_assoc($result)) { ?>
    <tr>
      <td align="center"><?php echo $count; ?></td>
	  <td align="center" style="font:Verdana, Arial, Helvetica, sans-serif large" style="font-weight:bold"><?php echo $row["dname"];?> </td> 
      <td align="center"><?php echo $row["pname"]; ?></td>
      <td align="center"><?php echo $row["pmrn"]; ?>
      <td align="center"><?php echo $row["duration"]; ?>
      <td align="center"><?php echo $row["nanes"]; ?>  
	  <td align="Left"><?php echo $row["otdate"]; ?>  
	  	  <td align="Left"><?php echo $row["proce"]; ?> 
      

	       <td align="center" style="font:Verdana, Arial, Helvetica, sans-serif large" style="font-weight:bold"><?php echo $row["ptype"];?></td>
		




		

<?php
	$username = "root";
$password = "Godiloveu16";
$hostname = "localhost"; 
$pmrn=$row['pmrn'];
$id1=$row['id'];
$eid=$row['eid'];
//connection to the database
$dbhandle = mysqli_connect($hostname, $username, $password) 
 or die("Unable to connect to MySQL");
//echo "Connected to MySQL<br>";

//select a database to work with
$selected = mysqli_select_db($dbhandle,"sfmmkpjnew") 
  or die("Could not select examples");

	
	
	$query198j_doc = "SELECT SUM(room) FROM otivisitendo where pmrn= '$pmrn' and eid='$id1' "; 
	 
$result198j_doc = mysqli_query($dbhandle,$query198j_doc) or die(mysql_error());

// Print out result
$row198j_doc = mysqli_fetch_array($result198j_doc);
$test1c_doc=	$row198j_doc['SUM(room)'];


$query198j_dis = "SELECT SUM(ins) FROM othoscharge where pmrn= '$pmrn' and eid='$id1' "; 
	 
$result198j_dis = mysqli_query($dbhandle,$query198j_dis) or die(mysqli_error());

// Print out result
$row198j_dis = mysqli_fetch_array($result198j_dis);
$test1c_dis=	$row198j_dis['SUM(ins)'];

$query198j_medi = "SELECT SUM(ins) FROM othoscharge1 where pmrn= '$pmrn' and eid='$id1' "; 

$result198j_medi = mysqli_query($dbhandle,$query198j_medi) or die(mysqli_error());

// Print out result
$row198j_medi = mysqli_fetch_array($result198j_medi);
$test1c_medi=	$row198j_medi['SUM(ins)'];


$query198j_amedi = "SELECT SUM(price) FROM otanaesmedi where pmrn= '$pmrn' and eid='$id1' "; 
	 
$result198j_amedi = mysqli_query($dbhandle,$query198j_amedi) or die(mysqli_error());

// Print out result
$row198j_amedi = mysqli_fetch_array($result198j_amedi);
$test1c_amedi=	$row198j_amedi['SUM(price)'];

$query198j_ainfu = "SELECT SUM(price) FROM otanaesinfusion where pmrn= '$pmrn' and eid='$id1' "; 
	 
$result198j_ainfu = mysqli_query($dbhandle,$query198j_ainfu) or die(mysqli_error());

// Print out result
$row198j_ainfu = mysqli_fetch_array($result198j_ainfu);
$test1c_ainfu=	$row198j_ainfu['SUM(price)'];





// Inpatient Bill

$query198as = "SELECT SUM(uprice) FROM iinfusion where pmrn= '$pmrn' and eid='$eid' and duser !='' "; 
	 
$result198as = mysqli_query($dbhandle,$query198as) or die(mysqli_error());

// Print out result
$row198as = mysqli_fetch_array($result198as);
$test1ai=$row198as['SUM(uprice)'];


$query198ad = "SELECT SUM(uprice) FROM imedi3 where pmrn= '$pmrn' and eid='$eid' and udone !='' and reuse=''"; 
	 
$result198ad = mysqli_query($dbhandle, $query198ad) or die(mysql_error());

// Print out result
$row198ad = mysqli_fetch_array($result198ad);
$test1am=	$row198ad['SUM(uprice)'];

 $query198af = "SELECT SUM(price) FROM iinves where pmrn= '$pmrn' and eid='$eid' and status='RECEIVED' and type in ('lab','LAB','Lab')"; 
	 
$result198af = mysqli_query($dbhandle,$query198af) or die(mysql_error());

// Print out result
$row198af = mysqli_fetch_array($result198af);
$test1al=	$row198af['SUM(price)'];


$query198ag = "SELECT SUM(price) FROM iinves where pmrn= '$pmrn' and eid='$eid' and status='RECEIVED' and type in ('rad','RAD','Rad')"; 
	 
$result198ag = mysqli_query($dbhandle,$query198ag) or die(mysql_error());

// Print out result
$row198ag = mysqli_fetch_array($result198ag);
$test1a1=	$row198ag['SUM(price)'];



$query198ah = "SELECT SUM(price) FROM iinves where pmrn= '$pmrn' and eid='$eid' and status='RECEIVED' and type in('spd','spd1','SPD','SPD1')"; 
	 
$result198ah = mysqli_query($dbhandle,$query198ah) or die(mysql_error());

// Print out result
$row198ah = mysqli_fetch_array($result198ah);
$test1as=	$row198ah['SUM(price)'];

$query198 = "SELECT SUM(price) FROM inhoscharge where pmrn= '$pmrn' and eid='$eid'"; 
	 
$result198 = mysqli_query($dbhandle,$query198) or die(mysql_error());

// Print out result
$row198 = mysqli_fetch_array($result198);
$test1=	$row198['SUM(price)'];


$query198j = "SELECT SUM(charge) FROM icnote where pmrn= '$pmrn' and eid='$eid'"; 
	 
$result198j = mysqli_query($dbhandle,$query198j) or die(mysql_error());

// Print out result
$row198j = mysqli_fetch_array($result198j);
$test1c=	$row198j['SUM(charge)'];



$query198jot = "SELECT SUM(room) FROM otivisitendo where pmrn= '$pmrn' and eid='$ot_id'"; 
	 
$result198jot = mysqli_query($dbhandle,$query198jot) or die(mysql_error());

// Print out result
$row198jot = mysqli_fetch_array($result198jot);
$test1cot=	$row198jot['SUM(room)'];


$query198j_bed = "SELECT SUM(charge) FROM newbed where pmrn= '$pmrn' and eid='$eid' "; 
	 
$result198j_bed = mysqli_query($dbhandle,$query198j_bed) or die(mysql_error());

// Print out result
$row198j_bed = mysqli_fetch_array($result198j_bed);
$test1c_bed=	$row198j_bed['SUM(charge)'];
//b_ot_dis_new.php link for OT CHarge 
//ipall_new.php link for IP CHarge
/*a target='_blank' href="?pmrn=<?php echo $row['pmrn']; ?>&id=<?php echo $row['id']; ?>"
<a target='_blank' href="?pmrn=<?php echo $row['pmrn']; ?>&eid=<?php echo $row['eid']; ?>">
*/
	?>


	
<td align="right"bgcolor="lightgreen"><font size="6" color="#FF0000"><strong><?php echo $test1c_doc+$test1c_dis+$test1c_medi+$test1c_amedi+$test1c_ainfu;?></strong></a></td>		

<td align="right"bgcolor="lightgreen"><font size="6" color="#FF0000"><strong><?php echo $test1c+$test1+$test1as+$test1a1+$test1al+$test1ai+$test1am+$test1cot+$test1c_bed;?></strong></td>		
<td align="right"bgcolor="lightgreen"><font size="6" color="#FF0000"><strong><?php echo $test1c_doc+$test1c_dis+$test1c_medi+$test1c_amedi+$test1c_ainfu+$test1c+$test1+$test1as+$test1a1+$test1al+$test1ai+$test1am+$test1cot+$test1c_bed;?></strong></td>		
		
     </tr>
    <?php $count++; } ?>
	
	
  </tbody>
</table>



</form>


</body>

</html>
