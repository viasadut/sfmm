<?php 
session_start();
    require('db1.php');
	$role = $_SESSION['sess_userrole'];
	
	$queryc = "SELECT COUNT(utype) FROM user where '$role' in ('nurse','doctor','imo','mrd')"; 
$resultc = mysqli_query($con, $queryc) or die(mysqli_error());
$rowc = mysqli_fetch_array($resultc);
$c1=$rowc['COUNT(utype)'];
	
    if(!isset($_SESSION['sess_username']) || $c1==0){
      header('Location: login2?err=2');
    }?>



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
$date=$_REQUEST['date'];


$rr=date('Y-m-d', strtotime($date . "+1 days"));

$db = mysqli_connect('localhost','root','Godiloveu16');
mysqli_select_db($db,'sfmmkpjnew');
$query4 = mysqli_query($db,"select * from inpatient where pmrn='$pmrn' and eid='$eid' and discharge=''");
$data59 = mysqli_fetch_assoc($query4);
//$date=date('d/m/Y');



?>


<?php
// Make a MySQL Connection
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
//$alert=  $_REQUEST['alert'];
//$ddate = $_REQUEST['ddate'];
//$tn=$rr1+$rr2+$rr3+$rr4+$rr5+$rr6+$rr7+$rr8+$rr9+$rr10+$rr11+$rr12+$rr13+$rr14+$rr15+$rr16+$rr17+$rr18+$rr19+$rr20+$rr21+$rr22+$rr23+$rr24;
//$to=$r1+$r2+$r3+$r4+$r5+$r6+$r7+$r8+$r9+$r10+$r11+$r12+$r13+$r14+$r15+$r16+$r17+$r18+$r19+$r20+$r21+$r22+$r23+$r24;
//$update="update test set status='Booked' where `dname`='$dname' and `ddate`='$date1' and `dslot`='$slot'";
if (!empty($_POST['rr5']) or !empty($_POST['rr3'])){
$ins_query6="insert into influid (`date`,`type`,`route`,`time`,`qty`,`pmrn`,`udone`,`eid`,`type1`,`qty1`,`route1`) values ('$rr1','Intake','$rr3','$rr2','$rr4','$pmrn','$user','$eid','Output','$rr6','$rr5')";
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
		<link href='https://fonts.googleapis.com/css?family=Nunito:400,300' rel='stylesheet' type='text/css'>

<form action="" method="post">
<h1 align="center"style="background-color:lightgreen;">INPATIENT DIET </h1>
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

						

<td colspan="20" align="center"font size="7"><strong>Fluid CHART (<?php echo $date;?>)<br>




<?php
// Make a MySQL Connection
$username = "root";
$password = "Godiloveu16";
$hostname = "localhost"; 

//connection to the database
$dbhandle = mysqli_connect($hostname, $username, $password) 
 or die("Unable to connect to MySQL");
//echo "Connected to MySQL<br>";

//select a database to work with
$selected = mysqli_select_db($dbhandle,"sfmmkpjnew") 
  or die("Could not select examples");

$query298 = "SELECT type, SUM(qty) FROM influid where date1='$date' and pmrn='$pmrn' and eid='$eid' and type='intake' GROUP BY type"; 
	 
$result298 = mysqli_query($dbhandle,$query298) or die(mysql_error());

// Print out result
$row298 = mysqli_fetch_array($result298);
	//echo $row298['SUM(qty)'];

$test=$row298['SUM(qty)'];

	
$query198 = "SELECT type1, SUM(qty1) FROM influid where date1='$date' and pmrn='$pmrn'and eid='$eid'and type1='Output 'GROUP BY type1"; 
	 
$result198 = mysqli_query($dbhandle,$query198) or die(mysql_error());

// Print out result
$row198 = mysqli_fetch_array($result198);
	//echo $row198['SUM(qty)'];

	
$test1=	$row198['SUM(qty1)'];

$test3=$test-$test1;

//echo $test3; 

$query398 = "SELECT route, SUM(qty) FROM influid where date1='$date' and pmrn='$pmrn' and eid='$eid'and route='oral'GROUP BY route"; 
	 
$result398 = mysqli_query($dbhandle,$query398) or die(mysql_error());

// Print out result
$row398 = mysqli_fetch_array($result398);

$query498 = "SELECT route, SUM(qty) FROM influid where date1='$date' and pmrn='$pmrn' and eid='$eid'and route='IV'GROUP BY route"; 
	 
$result498 = mysqli_query($dbhandle,$query498) or die(mysql_error());

// Print out result
$row498 = mysqli_fetch_array($result498);

$test4=	$row498['SUM(qty)'];
$test5=	$row398['SUM(qty)'];
?>
</strong></td>


 <?php
	
$query298 = "SELECT type, SUM(qty) FROM influid where date1='$date' and pmrn='$pmrn' and eid='$eid'and type='intake'GROUP BY type"; 
	 
$result298 = mysqli_query($dbhandle,$query298) or die(mysql_error());

// Print out result
$row298 = mysqli_fetch_array($result298);
	//echo $row298['SUM(qty)'];

$test=$row298['SUM(qty)'];

	
$query198 = "SELECT type1, SUM(qty1) FROM influid where date1='$date' and pmrn='$pmrn'and eid='$eid'and type1='Output 'GROUP BY type1"; 
	 
$result198 = mysqli_query($dbhandle,$query198) or die(mysql_error());

// Print out result
$row198 = mysqli_fetch_array($result198);
	//echo $row198['SUM(qty)'];

	
$test1=	$row198['SUM(qty1)'];

$test3=$test-$test1;

//echo $test3; 

$query398 = "SELECT route, SUM(qty) FROM influid where date1='$date' and pmrn='$pmrn' and eid='$eid'and route='oral'GROUP BY route"; 
	 
$result398 = mysqli_query($dbhandle,$query398) or die(mysql_error());

// Print out result
$row398 = mysqli_fetch_array($result398);

$query498 = "SELECT route, SUM(qty) FROM influid where date1='$date' and pmrn='$pmrn' and eid='$eid'and route='IV'GROUP BY route"; 
	 
$result498 = mysqli_query($dbhandle,$query498) or die(mysql_error());

// Print out result
$row498 = mysqli_fetch_array($result498);

$test4=	$row498['SUM(qty)'];
$test5=	$row398['SUM(qty)'];




$query11 = "SELECT route1, SUM(qty1) FROM influid where date1='$date' and pmrn='$pmrn' and eid='$eid'and route1='Vomitus'GROUP BY route1"; 
	 
$result11 = mysqli_query($dbhandle,$query11) or die(mysql_error());

// Print out result
$row11 = mysqli_fetch_array($result11);

$query22 = "SELECT route1, SUM(qty1) FROM influid where date1='$date' and pmrn='$pmrn' and eid='$eid'and route1='NG' GROUP BY route1"; 
	 
$result22 = mysqli_query($dbhandle,$query22) or die(mysql_error());

// Print out result
$row22 = mysqli_fetch_array($result22);


$query33 = "SELECT route1, SUM(qty1) FROM influid where date1='$date' and pmrn='$pmrn' and eid='$eid'and route1='Urine'GROUP BY route1"; 
	 
$result33 = mysqli_query($dbhandle,$query33) or die(mysql_error());

// Print out result
$row33 = mysqli_fetch_array($result33);


$query44 = "SELECT route1, SUM(qty1) FROM influid where date1='$date' and pmrn='$pmrn' and eid='$eid'and route1='Drain-1'GROUP BY route1"; 
	 
$result44 = mysqli_query($dbhandle,$query44) or die(mysql_error());

// Print out result
$row44 = mysqli_fetch_array($result44);


$query55 = "SELECT route1, SUM(qty1) FROM influid where date1='$date' and pmrn='$pmrn' and eid='$eid'and route1='Drain-2'GROUP BY route1"; 
	 
$result55 = mysqli_query($dbhandle,$query55) or die(mysql_error());

// Print out result
$row55 = mysqli_fetch_array($result55);

$query66 = "SELECT route1, SUM(qty1) FROM influid where date1='$date' and pmrn='$pmrn' and eid='$eid'and route1='Drain-3'GROUP BY route1"; 
	 
$result66 = mysqli_query($dbhandle,$query66) or die(mysql_error());

// Print out result
$row66 = mysqli_fetch_array($result66);

$query77 = "SELECT route1, SUM(qty1) FROM influid where date1='$date' and pmrn='$pmrn' and eid='$eid'and route1='Drain-4'GROUP BY route1"; 
	 
$result77 = mysqli_query($dbhandle,$query77) or die(mysql_error());

// Print out result
$row77 = mysqli_fetch_array($result77);

$query88 = "SELECT route1, SUM(qty1) FROM influid where date1='$date' and pmrn='$pmrn' and eid='$eid'and route1='Drain-5'GROUP BY route1"; 
	 
$result88 = mysqli_query($dbhandle,$query88) or die(mysql_error());

// Print out result
$row88 = mysqli_fetch_array($result88);


$query99 = "SELECT route1, SUM(qty1) FROM influid where date1='$date' and pmrn='$pmrn' and eid='$eid'and route1='Drain-6'GROUP BY route1"; 
	 
$result99 = mysqli_query($dbhandle,$query99) or die(mysql_error());

// Print out result
$row99 = mysqli_fetch_array($result99);


$query00 = "SELECT route1, SUM(qty1) FROM influid where date1='$date' and pmrn='$pmrn' and eid='$eid'and route1='Drain-7'GROUP BY route1"; 
	 
$result00 = mysqli_query($dbhandle,$query00) or die(mysql_error());

// Print out result
$row00 = mysqli_fetch_array($result00);


$query009 = "SELECT route1, SUM(qty1) FROM influid where date1='$date' and pmrn='$pmrn' and eid='$eid'and route1='Stool'GROUP BY route1"; 
	 
$result009 = mysqli_query($dbhandle,$query009) or die(mysql_error());

// Print out result
$row009 = mysqli_fetch_array($result009);


$test11=	$row11['SUM(qty1)'];
$test22=	$row22['SUM(qty1)'];
$test33=	$row33['SUM(qty1)'];
$test44=	$row44['SUM(qty1)'];
$test55=	$row55['SUM(qty1)'];
$test66=	$row66['SUM(qty1)'];
$test77=	$row77['SUM(qty1)'];
$test88=	$row88['SUM(qty1)'];
$test99=	$row99['SUM(qty1)'];
$test00=	$row00['SUM(qty1)'];
$test009=	$row009['SUM(qty1)'];







?>
<tr>

<td colspan="10" align="center"bgcolor="lightgreen"><strong>Total Intake </strong></td>
<td colspan="10" align="center"bgcolor="red"><strong>Total Output </strong></td>

</tr>
<tr>

<tr>

<td colspan="5" align="Right"bgcolor="lightgreen"><strong>Oral</strong></td>
<td colspan="5" align="Right"bgcolor="lightgreen"><strong><?php echo $test5;?> </strong></td>
<td colspan="5" align="Right"bgcolor="lightgreen"><strong>Vomitus</strong></td>
<td colspan="5" align="Right"bgcolor="lightgreen"><strong><?php echo $test11;?></strong></td>
</tr>

<tr>

<td colspan="5" align="Right"bgcolor="lightgreen"><strong>IV</strong></td>
<td colspan="5" align="Right"bgcolor="lightgreen"><strong><?php echo $test4;?> </strong></td>
<td colspan="5" align="Right"bgcolor="lightgreen"><strong>NG</strong></td>
<td colspan="5" align="right"bgcolor="lightgreen"><strong><?php echo $test22;?>  </strong></td>


</tr>



<tr>


<td colspan="5" align="right"bgcolor="lightgreen"></strong></td>
<td colspan="5" align="Right"bgcolor="lightgreen"><strong></strong></td>
<td colspan="5" align="Right"bgcolor="lightgreen"><strong>Urine</strong></td>
<td colspan="5" align="right"bgcolor="lightgreen"><strong><?php echo $test33;?> </strong></td>


</tr>


<tr>


<td colspan="5" align="right"bgcolor="lightgreen"></strong></td>
<td colspan="5" align="Right"bgcolor="lightgreen"><strong></strong></td>
<td colspan="5" align="Right"bgcolor="lightgreen"><strong>Stool</strong></td>
<td colspan="5" align="right"bgcolor="lightgreen"><strong><?php echo $test009;?> </strong></td>


</tr>

<tr>


<td colspan="5" align="right"bgcolor="lightgreen"></strong></td>
<td colspan="5" align="Right"bgcolor="lightgreen"><strong></strong></td>
<td colspan="5" align="Right"bgcolor="lightgreen"><strong>Drain-1</strong></td>
<td colspan="5" align="right"bgcolor="lightgreen"><strong><?php echo $test44;?> </strong></td>


</tr>


<tr>


<td colspan="5" align="right"bgcolor="lightgreen"></strong></td>
<td colspan="5" align="Right"bgcolor="lightgreen"><strong></strong></td>
<td colspan="5" align="Right"bgcolor="lightgreen"><strong>Drain-2</strong></td>
<td colspan="5" align="right"bgcolor="lightgreen"><strong><?php echo $test55;?> </strong></td>


</tr>


<tr>

<td colspan="5" align="Right"bgcolor="lightgreen"><strong></strong></td>
<td colspan="5" align="right"bgcolor="lightgreen"></strong></td>
<td colspan="5" align="Right"bgcolor="lightgreen"><strong>Drain-3</strong></td>
<td colspan="5" align="right"bgcolor="lightgreen"><strong><?php echo $test66;?> </strong></td>


</tr>

<tr>

<td colspan="5" align="Right"bgcolor="lightgreen"><strong></strong></td>
<td colspan="5" align="right"bgcolor="lightgreen"></strong></td>
<td colspan="5" align="Right"bgcolor="lightgreen"><strong>Drain-4</strong></td>
<td colspan="5" align="right"bgcolor="lightgreen"><strong><?php echo $test77;?> </strong></td>


</tr>


<tr>

<td colspan="5" align="Right"bgcolor="lightgreen"><strong></strong></td>
<td colspan="5" align="right"bgcolor="lightgreen"></strong></td>
<td colspan="5" align="Right"bgcolor="lightgreen"><strong>Drain-5</strong></td>
<td colspan="5" align="right"bgcolor="lightgreen"><strong><?php echo $test88;?> </strong></td>


</tr>


<tr>

<td colspan="5" align="Right"bgcolor="lightgreen"><strong></strong></td>
<td colspan="5" align="right"bgcolor="lightgreen"></strong></td>
<td colspan="5" align="Right"bgcolor="lightgreen"><strong>Drain-6</strong></td>
<td colspan="5" align="right"bgcolor="lightgreen"><strong><?php echo $test99;?></strong></td>


</tr>

<tr>

<td colspan="5" align="Right"bgcolor="lightgreen"><strong></strong></td>
<td colspan="5" align="right"bgcolor="lightgreen"></strong></td>
<td colspan="5" align="Right"bgcolor="lightgreen"><strong>Drain-7</strong></td>
<td colspan="5" align="right"bgcolor="lightgreen"><strong><?php echo $test00;?> </strong></td>


</tr>





<td colspan="3" align="center"bgcolor="lightblue"><strong>Total Intake</strong></td>
<td colspan="3" align="center"><font size="4.5"><strong><?php echo $test;?> ml</strong></td>
<td colspan="3" align="center"bgcolor="lightblue"><strong>Total Outake</strong></td>
<td colspan="3" align="center"><font size="4.5"><strong><?php echo $test1;?> ml</strong></td>
<td colspan="4" align="center"bgcolor="red"><strong>Difference</strong></td>
<td colspan="4" align="center"><font size="4.5" color="#FF0000"><strong><?php echo $test3;?> ml</strong></td>
</tr>

	
</table>

</form>


</body>
</html>
