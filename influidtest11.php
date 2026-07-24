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
$query4 = mysqli_query($db,"select * from inpatient where pmrn='$pmrn' and eid='$eid' and discharge=''");
$data59 = mysqli_fetch_assoc($query4);
$date=date('d/m/Y');



$query49 = mysqli_query($db,"select * from infulid where pmrn='$pmrn' and eid='$eid' and date='$date'");
$data49 = mysqli_fetch_assoc($query49);
$i1=$data49['rr1'];
$i2=$data49['rr2'];
$i3=$data49['rr3'];
$i4=$data49['rr4'];
$i5=$data49['rr5'];
$i6=$data49['rr6'];
$i7=$data49['rr7'];
$i8=$data49['rr8'];
$i9=$data49['rr9'];
$i10=$data49['rr10'];
$i11=$data49['rr11'];
$i12=$data49['rr12'];
$i13=$data49['rr13'];
$i14=$data49['rr14'];
$i15=$data49['rr15'];
$i16=$data49['rr16'];
$i17=$data49['rr17'];
$i18=$data49['rr18'];
$i19=$data49['rr19'];
$i20=$data49['rr20'];
$i21=$data49['rr21'];
$i22=$data49['rr22'];
$i23=$data49['rr23'];
$i24=$data49['rr24'];


$o1=$data49['r1'];
$o2=$data49['r2'];
$o3=$data49['r3'];
$o4=$data49['r4'];
$o5=$data49['r5'];
$o6=$data49['r6'];
$o7=$data49['r7'];
$o8=$data49['r8'];
$o9=$data49['r9'];
$o10=$data49['r10'];
$o11=$data49['r11'];
$o12=$data49['r12'];
$o13=$data49['r13'];
$o14=$data49['r14'];
$o15=$data49['r15'];
$o16=$data49['r16'];
$o17=$data49['r17'];
$o18=$data49['r18'];
$o19=$data49['r19'];
$o20=$data49['r20'];
$o21=$data49['r21'];
$o22=$data49['r22'];
$o23=$data49['r23'];
$o24=$data49['r24'];




$tin=$i1+$i2+$i3+$i4+$i5+$i6+$i7+$i8+$i9+$i10+$i11+$i12+$i13+$i14+$i15+$i16+$i17+$i18+$i19+$i20+$i21+$i22+$i23+$i24;
$tot=$o1+$o2+$o3+$o4+$o5+$o6+$o7+$o8+$o9+$o10+$o11+$o12+$o13+$o14+$o15+$o16+$o17+$o18+$o19+$o20+$o21+$o22+$o23+$o24;
$diff=$tin-$tot;

$sel="SELECT * FROM infulid WHERE `pmrn`='$pmrn' and `eid`='$eid' and date='$date';";
$result = mysqli_query($con,$sel);

?>


<?php
// Make a MySQL Connection
$username = "root";
$password = "Godiloveu16";
$hostname = "localhost"; 

//connection to the database
$dbhandle = mysql_connect($hostname, $username, $password) 
 or die("Unable to connect to MySQL");
//echo "Connected to MySQL<br>";

//select a database to work with
$selected = mysql_select_db("sfmmkpjnew",$dbhandle) 
  or die("Could not select examples");

$query98 = "SELECT pmrn, SUM(rr1) FROM infulid GROUP BY pmrn"; 
	 
$result98 = mysql_query($query98) or die(mysql_error());

// Print out result
while($row98 = mysql_fetch_array($result98)){
	//echo "Total ". $row98['pmrn']. " = $". $row98['SUM(rr1)'];
	//echo "<br />";
	

}

$query198 = "SELECT pmrn, SUM(rr2) FROM infulid GROUP BY pmrn"; 
	 
$result198 = mysql_query($query198) or die(mysql_error());

// Print out result
while($row198 = mysql_fetch_array($result198)){
	//echo "Total ". $row198['pmrn']. " = $". $row198['SUM(rr2)'];
	//echo "<br />";
	

}
?>

<?php
/*
Author: Javed Ur Rehman
Website: https://www.allphptricks.com/
*/
 
require('db1.php');

if(isset($_POST['Submit1']))
{
$pmrn = $data59['pmrn'];
$eid = $data59['eid'];	
$date=date('d/m/Y');
	if($res=mysqli_num_rows($result)>0){
		echo '<script language="javascript">';
    echo 'alert("Date Already Set!!"); ';
    echo '</script>';
	}
	else{
		
$ins_query66="insert into infulid (`pmrn`,`eid`,`date`) values ('$pmrn','$eid','$date')";
mysqli_query($con,$ins_query66) or die(mysql_error());
echo '<script language="javascript">';
    echo 'alert("Date Set Successfully!!"); ';
    echo '</script>';
	}
}


?>
<?php
require('db1.php');
if(isset($_POST['Submit']))
{

$date=date('d/m/Y');
$date1=date('Y-m-d');

//$pname = $data59['pname'];
$pmrn = $data59['pmrn'];
//$eid = $data59['eid'];
//$padd = $data59['padd'];
//$adm = $data59['adate'];
//$pphone=$data59['pphone'];
//$page=$data59['age'];
//$psex=$data59['gender'];
//$odate = date('m-d-Y H:i:s');
//$infu = $_REQUEST['infu'];
//$root = $_REQUEST['root'];

//$dtime = $_REQUEST['dtime'];
$rr1 = $_REQUEST['rr1'];
$rr2 = $_REQUEST['rr2'];
$rr3 = $_REQUEST['rr3'];
$rr4 = $_REQUEST['rr4'];
$rr5 = $_REQUEST['rr5'];
$rr6 = $_REQUEST['rr6'];
$time1=$date1.' '.$rr2.':00';
//$alert=  $_REQUEST['alert'];
//$ddate = $_REQUEST['ddate'];
//$tn=$rr1+$rr2+$rr3+$rr4+$rr5+$rr6+$rr7+$rr8+$rr9+$rr10+$rr11+$rr12+$rr13+$rr14+$rr15+$rr16+$rr17+$rr18+$rr19+$rr20+$rr21+$rr22+$rr23+$rr24;
//$to=$r1+$r2+$r3+$r4+$r5+$r6+$r7+$r8+$r9+$r10+$r11+$r12+$r13+$r14+$r15+$r16+$r17+$r18+$r19+$r20+$r21+$r22+$r23+$r24;
//$update="update test set status='Booked' where `dname`='$dname' and `ddate`='$date1' and `dslot`='$slot'";
if (!empty($_POST['rr5']) or !empty($_POST['rr3'])){
$ins_query6="insert into influid (`date`,`type`,`route`,`time`,`qty`,`pmrn`,`udone`,`eid`,`type1`,`qty1`,`route1`,`date1`,`time1`) values ('$rr1','Intake','$rr3','$rr2','$rr4','$pmrn','$user','$eid','Output','$rr6','$rr5','$date1','$time1')";
mysqli_query($con,$ins_query6) or die(mysql_error());}



else 
{
	
       echo '<script language="javascript">';
    echo 'alert("Data Entry Not successful !!"); ';
    echo '</script>';
	
	
	

    }


}

?>



<!DOCTYPE html>
<html lang="en" >

<head>
  <meta charset="UTF-8">
  <title>Fluid Chart</title>
  
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/normalize/5.0.0/normalize.min.css">

  
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
  width: 10%;
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

    <script src="https://cdnjs.cloudflare.com/ajax/libs/prefixfree/1.0.7/prefixfree.min.js"></script>



<link rel="stylesheet" href="https://ajax.googleapis.com/ajax/libs/jqueryui/1.11.4/themes/smoothness/jquery-ui.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.11.4/jquery-ui.min.js"></script>
  
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
    <title>Fluid Chart</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />  
    <script src="//ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>

    <link href="https://code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css" rel="stylesheet" />
    <link href="./jquery.multiselect.css" rel="stylesheet" />
    <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
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
return confirm("Are you Sure to Stop The Medicine ?");
}

</script>
</head>


<body>

<div id='cssmenu'>
<ul>
   <li><a href='idetails?pmrn=<?php echo "$pmrn"; ?>&eid=<?php echo "$eid"; ?>'><span>Home</span></a></li>
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
		<link href='https://fonts.googleapis.com/css?family=Nunito:400,300' rel='stylesheet' type='text/css'>

<form action="" method="post">
<h1 align="center"style="background-color:lightgreen;">INPATIENT FLUID CHART </h1>
<!-- Form Title -->
        <table align="center" class="table table-bordered" id="dynamic_field">  
		<tr>
		
	  
</tr>
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

						

<td colspan="20" align="center"><strong>Fluid CHART<br><?php
// Make a MySQL Connection
$username = "root";
$password = "Godiloveu16";
$hostname = "localhost"; 

//connection to the database
$dbhandle = mysql_connect($hostname, $username, $password) 
 or die("Unable to connect to MySQL");
//echo "Connected to MySQL<br>";

//select a database to work with
$selected = mysql_select_db("sfmmkpjnew",$dbhandle) 
  or die("Could not select examples");

$query98 = "SELECT type, SUM(qty) FROM influid where date='$date'GROUP BY type"; 
	 
$result98 = mysql_query($query98) or die(mysql_error());

// Print out result
while($row98 = mysql_fetch_array($result98)){
	//echo "Total ". $row98['type']. " = ". $row98['SUM(qty)'];
	//echo "<br />";
	

}

?>


<?php
// Make a MySQL Connection
$username = "root";
$password = "Godiloveu16";
$hostname = "localhost"; 

//connection to the database
$dbhandle = mysql_connect($hostname, $username, $password) 
 or die("Unable to connect to MySQL");
//echo "Connected to MySQL<br>";

//select a database to work with
$selected = mysql_select_db("sfmmkpjnew",$dbhandle) 
  or die("Could not select examples");

	
	



?>
<br>
<?php
// Make a MySQL Connection
$username = "root";
$password = "Godiloveu16";
$hostname = "localhost"; 

//connection to the database
$dbhandle = mysql_connect($hostname, $username, $password) 
 or die("Unable to connect to MySQL");
//echo "Connected to MySQL<br>";

//select a database to work with
$selected = mysql_select_db("sfmmkpjnew",$dbhandle) 
  or die("Could not select examples");

$query298 = "SELECT type, SUM(qty) FROM influid where date='$date' and pmrn='$pmrn' and eid='$eid'and type='intake'GROUP BY type"; 
	 
$result298 = mysql_query($query298) or die(mysql_error());

// Print out result
$row298 = mysql_fetch_array($result298);
	//echo $row298['SUM(qty)'];

$test=$row298['SUM(qty)'];

	
$query198 = "SELECT type1, SUM(qty1) FROM influid where date='$date' and pmrn='$pmrn'and eid='$eid'and type1='Output 'GROUP BY type1"; 
	 
$result198 = mysql_query($query198) or die(mysql_error());

// Print out result
$row198 = mysql_fetch_array($result198);
	//echo $row198['SUM(qty)'];

	
$test1=	$row198['SUM(qty1)'];

$test3=$test-$test1;

//echo $test3; 

$query398 = "SELECT route, SUM(qty) FROM influid where date='$date' and pmrn='$pmrn' and eid='$eid'and route='oral'GROUP BY route"; 
	 
$result398 = mysql_query($query398) or die(mysql_error());

// Print out result
$row398 = mysql_fetch_array($result398);

$query498 = "SELECT route, SUM(qty) FROM influid where date='$date' and pmrn='$pmrn' and eid='$eid'and route='IV'GROUP BY route"; 
	 
$result498 = mysql_query($query498) or die(mysql_error());

// Print out result
$row498 = mysql_fetch_array($result498);

$test4=	$row498['SUM(qty)'];
$test5=	$row398['SUM(qty)'];
?>
</strong></td>
<tr>

<td colspan="4" align="center"bgcolor="lightgreen"><strong>Total Intake (Oral-<?php echo $test5;?> ml and IV-<?php echo $test4;?> ml)</strong></td>
<td colspan="2" align="center"><font size="4.5" color="Lightgreen"><strong><?php echo $test;?> ml</strong></td>
<td colspan="6" align="center"bgcolor="lightblue"><strong>Total Outake</strong></td>
<td colspan="2" align="center"><font size="4.5" color="Lightblue"><strong><?php echo $test1;?> ml</strong></td>
<td colspan="2" align="center"bgcolor="red"><strong>Difference</strong></td>
<td colspan="4" align="center"><font size="4.5" color="#FF0000"><strong><?php echo $test3;?> ml</strong></td>
</tr>

<tr>
<td colspan="2" align="center"><label><strong>Date</strong></label></td> 
<td colspan="2" align="center"><label><strong>Time</strong></label></td>
<td colspan="6" align="center"><label><strong>Intake Pattern</strong></label></td>
<td colspan="2" align="center"><label><strong>Intake Qty</strong></label></td>
<td colspan="6" align="center"><label><strong>Output Pattern</strong></label></td>
<td colspan="2" align="center"><label><strong>Output Qty</strong></label></td>


</tr>
<tr>

<td colspan="2" align="center"><input name="rr1" type="text" value="<?php echo $date; ?>"readonly/>
  </td>
<td colspan="2" align="center"><select list="rr2" name="rr2"  class="form-control" required>
  
<option value=''>-Select-</option>
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
			  </select></td>

			  

			  <td colspan="6" align="center"><select list="rr3" name="rr3"  class="form-control">
  
<option value=''>-Select-</option>
						<option value='Oral'>Oral</option>
						<option value='IV'>IV</option>
						
					</select>	</td>

<td colspan="2" align="center"><input name="rr4" type="text" value=""></td>

<td colspan="6" align="center"><select list="rr5" name="rr5"  class="form-control">
  
<option value=''>-Select-</option>
						<option value='Vomitus'>Vomitus</option>
						<option value='NG'>NG</option>
						<option value='Urine'>Urine</option>
						<option value='Stool'>Stool</option>
						<option value='Drain-1'>Drain-1</option>
						<option value='Drain-2'>Drain-2</option>
						<option value='Drain-3'>Drain-3</option>
						<option value='Drain-4'>Drain-4</option>
						<option value='Drain-5'>Drain-5</option>
						<option value='Drain-6'>Drain-6</option>
						<option value='Others'>Others</option>
						
						</select></td>
			
<td colspan="2" align="center"><input name="rr6" type="text" value=""></td>
</tr>

			        

<tr>
		<td colspan="20"align="right"><button type="submit" name="Submit">Confirm</button></td>
	  
</tr>

<tr><td colspan="20"align="right"font size="8.5" color="Lightgreen"><strong><a target='_blank' href="influiddoctestnurse.php?pmrn=<?php echo "$pmrn"; ?>&eid=<?php echo "$eid"; ?>">Summary &nbsp;&nbsp;<a target='_blank' href="fluidstat?pmrn=<?php echo "$pmrn";?>&eid=<?php echo "$eid"; ?>">Datewise Stats</a></td></tr>
<tr>
      <td colspan="1" align="center"><strong>S.No</strong></td>
      
	  <td colspan="1" align="center"><strong>Date</strong></td>
	  <td colspan="1" align="center"><strong>Time</strong></td>
	  
	  <td colspan="2" align="center"><strong>Type</strong></td>
      <td colspan="2" align="center"><strong>Quantity (ml)</strong></td>  
	  <td colspan="3" align="center"><strong>Route</strong></td>   
      <td colspan="2" align="center"><strong>Type</strong></td>   
	  
	  <td colspan="2" align="center"><strong>Quantity (ml)</strong></td>
	  <td colspan="3" align="center"><strong>Route</strong></td>   
	  <td colspan="3" align="center"><strong>Entry By</strong></td>
             

	   </tr>
 <?php
	
$user=$_SESSION["sess_username"];
$pmrn=$pmrn;
//$id=$_REQUEST["id"];
$episode=$data59["eid"];

$count=1;
$sel_query="Select * from influid where pmrn= '$pmrn' and date='$date' order by type asc;";

$result = mysqli_query($con,$sel_query);

while($row = mysqli_fetch_assoc($result)) 
{ ?>    <tr>

      <td align="center" colspan="1"><?php echo $count; ?></td>
      
      
	  <td align="center"colspan="1"><?php echo $row["date"]; ?></td>
	  <td align="center"colspan="1"><?php echo $row["time"]; ?></td>
      <td align="center"colspan="2"><?php echo $row["type"]; ?></td>  
	  <td align="center"colspan="2"><?php echo $row["qty"]; ?></td>
	  <td align="center"colspan="3"><?php echo $row["route"]; ?></td>
	  <td align="center"colspan="2"><?php echo $row["type1"]; ?></td>  
	  <td align="center"colspan="2"><?php echo $row["qty1"]; ?></td>
	  <td align="center"colspan="3"><?php echo $row["route1"]; ?></td>
	  <td align="center"colspan="3"><?php echo $row["udone"]; ?></td>
	  
      </tr>
    <?php $count++; } ?>
	
	<tr><td colspan="10" align="right"></td>	</tr>
</table>

</form>


</body>
</html>
