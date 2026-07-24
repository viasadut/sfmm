<?php 
    session_start();
    $role = $_SESSION['sess_userrole'];
    if(!isset($_SESSION['sess_username']) || $role!="bill"){
      header('Location: login2?err=2');
    }
?>
<?php
$url1=$_SERVER['REQUEST_URI'];
//header("Refresh: 5; URL=$url1");
$ad='b';



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
$full = $row39['fullname'];
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



@-webkit-keyframes invalid {
  from { background-color: red; }
  to { background-color: inherit; }
}
@-moz-keyframes invalid {
  from { background-color: red; }
  to { background-color: inherit; }
}
@-o-keyframes invalid {
  from { background-color: red; }
  to { background-color: inherit; }
}
@keyframes invalid {
  from { background-color: red; }
  to { background-color: inherit; }
}
.invalid {
  -webkit-animation: invalid 3s infinite; /* Safari 4+ */
  -moz-animation:    invalid 3s infinite; /* Fx 5+ */
  -o-animation:      invalid 3s infinite; /* Opera 12+ */
  animation:         invalid 3s infinite; /* IE 10+ */
}

td {
    padding: 1em;
}
}


blink {
        color: #1c87c9;
        font-size: 25px;
        font-weight: bold;
        font-family: sans-serif;
      }
	  
	  
	  #myDIV {
  
  background: red;
  animation: mymove 3s infinite;
}

@keyframes mymove {
  from {background-color: red;}
  to {background-color: lightgreen;}
}
</style>


   <link rel="stylesheet" href="styles.css">
   <script src="jsnew/jquery-latest.min.js" type="text/javascript"></script>
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
<li class='last'><a href='billpass'><span>Change Password</span></a></li>
<li class='last'><a href='billapp'><span>Appoinment Report</span></a></li>
<li class='last'><a href='opdbill'><span>OPD PROCEDURE BILL</span></a></li>
<li class='last'><a href='otallbill'><span>OT STATS</span></a></li>

<li class='active has-sub'><a href='#'><span>Endoscopy</span></a>
      <ul>
<li class='last'><a href='endobillsummary'><span>Today's Endoscopy Patient List</span></a></li>
    	    <li class='last'><a href='endocensusbill'><span>Endoscopy STATS</span></a></li>
      
      </ul>
	  
   </li>

   <li class='active has-sub'><a href='#'><span>Oncology</span></a>
      <ul>
<li class='last'><a href='chemobillsummary'><span>Today's Oncology Patient List</span></a></li>
    	    <li class='last'><a href='chemocensusbill'><span>Oncology STATS</span></a></li>
      
      </ul>
	  
   </li>

   
<li class='last'><a href='billotbill'><span>Todays OT List</span></a></li>
<li class='last'><a href='register1'><span>Register New Patient</span></a></li>


<li class='active has-sub'><a href='#'><span>Doriddro Fund</span></a>
      <ul>

    	    
      <li class='last'><a href='ddrequestsend'><span>View DD Fund Request From Consultant / MO</span></a></li>
	  <li class='last'><a href='ddrequestsend1'><span>View DD Fund Final Print</span></a></li>
	  <li class='last'><a href='ddfinalprintdate'><span>Datewise ALL Approved DD Fund Print</span></a></li>
	  <li class='last'><a href='ddstats3bill'><span>Stats of Allocation Datewise DD Fund Amount</span></a></li>
	  <li class='last'><a href='ddmanualbill'><span>Manual Request</span></a></li>
	  
      </ul>
	  
   </li>
   
 <li class='active has-sub'><a href='#'><span>Covid Menu</span></a>  
<ul>
<li class='last'><a href='covidhomeg'><span>Covid</span></a></li>
<li class='last'><a href='covidbillstati'><span>Todays Bill Collection</span></a></li>

</ul>
</li>
   <li class='last'><a href='insummary'><span>IPD</span></a></li>
<li class='last'><a href='leave2'><span>Apply Leave</span></a></li>   

<li class='last'><a href="ticketv2/dashboard">Hospital Ticketing System</a></li>


<li class='last'><a href="attnstatsindu">Attendance Report</a></li>
<li class='last'><a href="hinfo111">Hospital Information</a></li>
   <li class='last'><a href='logout'><span>LOGOUT</span></a></li>
</ul>
</div>
<p align="center" class="style1">!! WELCOME !! <?php echo $fullname; ?>'s Dash Board </p> 
<p align="center" class="style1">List of Unbilled Patients</p>
<form action="bcview_test" method="post">
 
&nbsp;&nbsp;&nbsp;&nbsp;<a href='bcview'><span><b>Unbilled Patients</span><b></a>&nbsp;&nbsp;&nbsp;&nbsp;
		<a href='bviewreffer'><span>Reffered Patients</span></a><br><br>
		
		
		<table>
											
						<tr>				
						
             		
					 
			    	 
					 <td colspan="3" align="right"><select name="bt">
        
						<option value=''>-Select-</option>
						<?php 
			$sql = "select * from `doctor`";
			$res = mysqli_query($con, $sql);
			if(mysqli_num_rows($res) > 0) {
				while($row = mysqli_fetch_object($res)) {
					echo "<option value='".$row->dname."'>".$row->dname."</option>";
				}
			}
			?>
						
				
</select></td>  
					<td>	<button type="submit" name="bsearch" align="right">Search</button></td>
					 </tr>
</table>

  <table width="100%" height ="100%" border="1" align="center" bgcolor="#FFFF99" style="border-collapse:collapse;">
    <tr>
      <th width="4%"><strong>S.No</strong></th>
      <th width="17%"><strong>Patient's Name</strong></th>
      <th width="10%"><strong>MRN</strong></th>
      <th width="15%"><strong>Appointment Time </strong>
      <th width="14%"><strong>Date</strong> 
      <th width="14%"><strong>Reffered From</strong>
      <th width="14%"><strong>Doctor Name</strong>  
      <th width="14%"><strong>Status</strong>
	  <th width="14%"><strong>Bill</strong>
	  <th width="14%"><strong>Update</strong>



	   </tr>
  </thead>
  <tbody>
  
    <?php
	if(isset($_POST['bsearch'])){
		$bt=$_REQUEST["bt"];
$user=$_SESSION["sess_username"];
$date= date('m/d/Y');

$count=1;

$sel_query100="Select * from pappnew where adate= '$date' and status='NOT SEEN' and dname='$bt' and `bill`='' ORDER BY aslot desc;";

$result100 = mysqli_query($con,$sel_query100);
while($row100 = mysqli_fetch_assoc($result100)) { ?>
    <tr>
      <td align="center"><?php echo $count; ?></td>
      <td align="center"><?php echo $row100["pname"]; ?></td>
      <td align="center"><?php echo $row100["pmrn"]; ?>
      <td align="center"><?php echo $row100["aslot"]; ?>
      <td align="center"><?php echo $row100["adate"]; ?>  
	  <td align="center"><?php echo $row100["dreffer"]; ?>  
	  	  <td align="center"><?php echo $row100["dname"]; ?> 
      <td align="center" style="font:Verdana, Arial, Helvetica, sans-serif large" style="font-weight:bold"><?php echo $row100["status"];?> </td> 
	        
			<?php
$pp=$row100['pmrn'];
$dd=$row100['dname'];

$query_a = "SELECT * FROM doctor where dname= '$dd'"; 
	 
$result_a = mysqli_query($con, $query_a) or die(mysqli_error());

// Print out result
$row_a = mysqli_fetch_array($result_a);
$v1 = $row_a['v1'];
$v2 = $row_a['v2'];


$query_b = "SELECT * FROM pappnew where dname= '$dd' and pmrn='$pp' and status='SEEN' order by ID DESC limit 1"; 
	 
$result_b = mysqli_query($con, $query_b) or die(mysqli_error());

// Print out result
$row_b = mysqli_fetch_array($result_b);

$l_date=date_create($row_b['adate1']);

$l_date1=$row_b['adate1'];
$t_date1=date('Y-m-d');

$t_date=date_create($t_date1);


//$date1=date_create("2013-03-15");
//$date2=date_create("2013-12-12");
$diff=date_diff($l_date,$t_date);
$diff1=$diff->format("%a");



?>	
			
			
		
		
 		
			<td id="myDIV" ><?php if($diff1<=3){echo "0";} else if($diff1>3 and $diff1<=10){echo $v2;}else if($diff1>10){echo $v1;}?> </td>
			
			
			
			
			
			
			<td  align ="center" style="font:Verdana, Arial, Helvetica, sans-serif large" style="font-weight:bold"><a href="bgg3333?pmrn=<?php echo $row100["pmrn"]; ?>&ID=<?php echo $row100["ID"];?>">UPDATE</a> </td>

			

	  
      </tr>
    <?php $count++; }}?>
	
	
	
  </tbody>
  </table>
  
  
</form>
<?php if($ad=='b')
{
	$txt='Greetings'.' '.$full.'WELCOME TO SFMMKPJSH PATIENT Management SYStem';
  $txt1=htmlspecialchars($txt);
  $txt2=rawurlencode($txt1);
  $html=file_get_contents('https://translate.google.com/translate_tts?ie=UTF-8&client=gtx&q='.$txt2.'&tl=en-IN');
   
	echo '
	<audio autoplay>
	<source src="data:audio/mpeg;base64,'.base64_encode($html).'">
  <source src="data:audio/ogg;base64,'.base64_encode($html).'">
 
</audio>';}?>


</body>




</html>
