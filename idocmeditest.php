<?php 
    session_start();
    $role = $_SESSION['sess_userrole'];
    if(!isset($_SESSION['sess_username']) || $role!="doctor"){
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
$query4 = mysqli_query($db,"select * from inpatient where pmrn='$pmrn' and discharge=''");
$data59 = mysqli_fetch_assoc($query4);
  $date=date('d/m/Y');
    $ortime = date('d/m/Y H:i:s');
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
$infu2 = $_REQUEST['infu2'];
$infu3 = $_REQUEST['infu3'];
$infu4 = $_REQUEST['infu4'];
$infu5 = $_REQUEST['infu5'];
$alert=  $_REQUEST['alert'];
$ddate = $_REQUEST['ddate'];
$date1 = $_REQUEST['date'];

$sel90="SELECT * FROM imedi3 WHERE `pmrn`='$pmrn' and `eid`='$eid' and`infusion`='$infu' and odate='$odate1' and `time`='$infu1' and `status`='Active';";
$result90 = mysqli_query($con,$sel90);

$sel91="SELECT * FROM imedi3 WHERE `pmrn`='$pmrn' and `eid`='$eid' and`infusion`='$infu' and odate='$odate1' and `time`='$infu2' and `status`='Active';";
$result91 = mysqli_query($con,$sel91);


$sel92="SELECT * FROM imedi3 WHERE `pmrn`='$pmrn' and `eid`='$eid' and`infusion`='$infu' and odate='$odate1' and `time`='$infu3' and `status`='Active';";
$result92 = mysqli_query($con,$sel92);


$sel93="SELECT * FROM imedi3 WHERE `pmrn`='$pmrn' and `eid`='$eid' and`infusion`='$infu' and odate='$odate1' and `time`='$infu4' and `status`='Active';";
$result93 = mysqli_query($con,$sel93);


$sel94="SELECT * FROM imedi3 WHERE `pmrn`='$pmrn' and `eid`='$eid' and`infusion`='$infu' and odate='$odate1' and `time`='$infu5' and `status`='Active';";
$result94 = mysqli_query($con,$sel94);

$sel990="SELECT * FROM medicine WHERE `mname`='$infu';";
$result990 = mysqli_query($con,$sel990);

if($res990=mysqli_num_rows($result990)==0)
{
 	
       echo '<script language="javascript">';
    echo 'alert("Unsuccessful !!! The Medicine Name is not in the Database List.. Please contact with Pharmacy Department"); ';
    echo '</script>';
    }



else if($res90=mysqli_num_rows($result90)>0)
{
echo '<script language="javascript">';
    echo 'alert("This Medicine is Already Added in Tommorows Order  !!"); ';

    echo '</script>';
	
	//header("Refresh: .1; URL=$url");
}

else if($res91=mysqli_num_rows($result91)>0)
{
echo '<script language="javascript">';
    echo 'alert("This Medicine is Already Added in Todays Order  !!"); ';

    echo '</script>';
	
	//header("Refresh: .1; URL=$url");
}


else if($res92=mysqli_num_rows($result92)>0)
{
echo '<script language="javascript">';
    echo 'alert("This Medicine is Already Added in Todays Order  !!"); ';

    echo '</script>';
	
	//header("Refresh: .1; URL=$url");
}

else if($res93=mysqli_num_rows($result93)>0)
{
echo '<script language="javascript">';
    echo 'alert("This Medicine is Already Added in Todays Order  !!"); ';

    echo '</script>';
	
	//header("Refresh: .1; URL=$url");
}

else if($res94=mysqli_num_rows($result94)>0)
{
echo '<script language="javascript">';
    echo 'alert("This Medicine is Already Added in Todays Order  !!"); ';

    echo '</script>';
	
	//header("Refresh: .1; URL=$url");
}


else {

if(!empty ($_POST['infu1'])){
$ins_query6="insert into imedi3 (`pmrn`,`dname`,`eid`,`infusion`,`time`,`instruc`,`alert`,`orderby`,`odate`,`status`,`root`,`status1`,`pstatus`,`ortime`) values ('$pmrn','$dname','$eid','$infu','$infu1','$ddate','$alert','$user','$date1','Active','$root','Rupdated','Ordered','$ortime')";
mysqli_query($con,$ins_query6);}

if(!empty ($_POST['infu2'])){
$ins_query7="insert into imedi3 (`pmrn`,`dname`,`eid`,`infusion`,`time`,`instruc`,`alert`,`orderby`,`odate`,`status`,`root`,`status1`,`pstatus`,`ortime`) values ('$pmrn','$dname','$eid','$infu','$infu2','$ddate','$alert','$user','$date1','Active','$root','Rupdated','Ordered','$ortime')";
mysqli_query($con,$ins_query7);}

if(!empty ($_POST['infu3'])){
$ins_query8="insert into imedi3 (`pmrn`,`dname`,`eid`,`infusion`,`time`,`instruc`,`alert`,`orderby`,`odate`,`status`,`root`,`status1`,`pstatus`,`ortime`) values ('$pmrn','$dname','$eid','$infu','$infu3','$ddate','$alert','$user','$date1','Active','$root','Rupdated','Ordered','$ortime')";
mysqli_query($con,$ins_query8);}

if(!empty ($_POST['infu4'])){
$ins_query9="insert into imedi3 (`pmrn`,`dname`,`eid`,`infusion`,`time`,`instruc`,`alert`,`orderby`,`odate`,`status`,`root`,`status1`,`pstatus`,`ortime`) values ('$pmrn','$dname','$eid','$infu','$infu4','$ddate','$alert','$user','$date1','Active','$root','Rupdated','Ordered','$ortime')";
mysqli_query($con,$ins_query9);}

if(!empty ($_POST['infu5'])){
$ins_query10="insert into imedi3 (`pmrn`,`dname`,`eid`,`infusion`,`time`,`instruc`,`alert`,`orderby`,`odate`,`status`,`root`,`status1`,`pstatus`,`ortime`) values ('$pmrn','$dname','$eid','$infu','$infu5','$ddate','$alert','$user','$date1','Active','$root','Rupdated','Ordered','$ortime')";
mysqli_query($con,$ins_query10);}
}
}
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
   <link href="jsnew//jquery-ui.css" rel="stylesheet" />
    
    <script src="jsnew//jquery-1.12.4.js"></script>
    <script src="jsnew//jquery-ui.js"></script>


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

<script type="text/javascript">
function confirm_click1()
{
return confirm("Are you Sure to Add The Medicine for Tomorrow?");
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

						



	
	   
</tr>
<tr>
      <td colspan="1" align="center"><strong>S.No</strong></td>
      
	  <td colspan="10" align="center"><strong>Medicine Name</strong></td>
	  <td colspan="9" align="center"><strong>Instruction</strong></td>
	  
	   </tr>
 <?php
	
$user=$_SESSION["sess_username"];
$pmrn=$pmrn;
//$id=$_REQUEST["id"];
$episode=$data59["eid"];
$dd=date('m/d/Y');
$count=1;
$sel_query="Select DISTINCT(infusion),instruc from imedi3 where pmrn= '$pmrn' and eid='$eid'and status !='Cancel' and odate='$dd'order by `infusion` asc;";

$result = mysqli_query($con,$sel_query);

while($row = mysqli_fetch_assoc($result)) 
{ ?>    <tr>

      <td align="center" colspan="1"><?php echo $count; ?></td>
      
      
	  <td align="center"colspan="10"><a href="addpharmediimodetailsdoc?pmrn=<?php echo "$pmrn"; ?>&eid=<?php echo "$eid"; ?>&infu=<?php echo $row['infusion'];?>"><?php echo $row["infusion"]; ?></a></td>
	  <td align="center"colspan="9"><?php echo $row["instruc"]; ?></td>
	  
	  
	  
      </tr>
    <?php $count++; } ?>
	 <tr><td colspan="10"><a target='_blank' href="testpdfmname.php?pmrn=<?php echo "$pmrn"; ?>&eid=<?php echo "$eid"; ?>"><img src="print.png" title="Print Report" width="150" height="60" /></a></td>	</tr>
</table>

</form>


</body>
<?php echo $data59["eid"]; ?>
</html>
