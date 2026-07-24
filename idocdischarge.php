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

//include("auth.php");
$pmrn=$_REQUEST['pmrn'];
//$id=$_REQUEST['id'];
$eid=$_REQUEST['eid'];
$db = mysqli_connect('localhost','root','Godiloveu16');
mysqli_select_db($db,'sfmmkpjnew');
$query4 = mysqli_query($db,"select * from inpatient where pmrn='$pmrn' and eid='$eid' and discharge=''");
$data = mysqli_fetch_assoc($query4);
$dname=$data['adoc'];


$query43 = "SELECT COUNT(pmrn) FROM dis_request where pmrn= '$pmrn' and eid='$eid' and canstatus!='CANCEL';"; 
	 
$result43 = mysqli_query($con, $query43) or die(mysqli_error());
$row43 = mysqli_fetch_assoc($result43);

$tth=date('2022-06-25 13:37:04');
$now5 = strtotime($tth);

$ff=('2022-06-24 19:53:26');
$now6=strtotime($ff);

//echo $difference = round(abs($now5 - $now6) / 3600,2);
$datediff = $now5-$now6;
echo $fday_t= round($datediff/(60*60),2) ;
?>


<?php
/*
Author: Javed Ur Rehman
Website: https://www.allphptricks.com/
*/
 
require('db1.php');

if(isset($_POST['Submit']))
{



$pname = $data['pname'];
$pmrn = $data['pmrn'];
$eid = $data['eid'];
$padd = $data['padd'];
$adm = $data['adate'];
$pphone=$data['pphone'];
$page=$data['age'];
$psex=$data['gender'];
$bed_no=$data["room1"];
$ward_no=$data["room"];
//$odate = $_REQUEST['odate'];
$infu = $_REQUEST['infu'];
$adate1= date('d/m/Y H:i:s');
$date4= date('Y-m-d');

$adatenew= date('Y-m-d H:i:s');
$query_bed1 = mysqli_query($db,"select * from newbed where type='$ward_no' and bno='$bed_no' and pmrn='$pmrn' and eid='$eid' order by id desc limit 1 ");
$charge_bed1 = mysqli_fetch_assoc($query_bed1);
	
//$start_d=$adatenew;
$start=$charge_bed1["adatenew"];

$now = strtotime($adatenew);
$your_date = strtotime($start);
$datediff = $now-$your_date;

$query_bed = mysqli_query($db,"select * from bed where bno='$bed_no'");
$charge_bed = mysqli_fetch_assoc($query_bed);
$b_charge=$charge_bed['charge']/24;
$b_charge1=$charge_bed['charge'];

$fday= round($datediff/(60*60) * $b_charge) ;
$fday_t= round($datediff/(60*60),2) ;




if($row43['COUNT(pmrn)']>0)
	
	{
		echo '<script language="javascript">';
    echo 'alert("Patient Already Have One Active Request"); ';
    echo '</script>';
	}
	
	else {
		
$update="update inpatient set disstatus='Discharge Requested', dstatustime='$adate1', duser='$user',d_type='$infu' where `eid`='$eid' and pmrn='$pmrn'";
mysqli_query($con,$update) or die(mysql_error());

$insert="insert into dis_request (`pmrn`,`pname`,`eid`,`dname`,`disstatus`,`dstatustime`,`duser`,`drdate`,`d_type`) values
('$pmrn','$pname','$eid','$dname','Discharge Requested','$adate1','$user','$date4','$infu') ";
mysqli_query($con,$insert) or die(mysql_error());

$update1="update bed set discharge='Yes' where `bno`='$bed_no'";
mysqli_query($con,$update1) or die(mysql_error());


$update2_n="update newbed set adatenew1='$adatenew',tby1='$user',charge='$fday',tdays='$fday_t',b_charge='$b_charge1' where type='$ward_no' and bno='$bed_no' and pmrn='$pmrn' and eid='$eid'";
mysqli_query($con,$update2_n) or die(mysqli_error(gg));


echo '<script language="javascript">';
    echo 'alert("Request Sent Successfully"); ';
    echo '</script>';

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
    <title>PHP - Dynamically Add or Remove input fields using JQuery</title>
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
</head>
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
<h1 align="center"style="background-color:lightgreen;">INPATIENT INFUSION NOTE</h1>

<!-- Form Title -->
        <table align="center" class="table table-bordered" id="dynamic_field">  
		<tr><td colspan="20" align="right"><button onClick="goBack()">Back</button></td></tr>
				<tr><td colspan="20"><label><strong>Doctors's Name :</strong></label></td></tr>
				
				<tr>	  
				<td colspan="20"><?php echo $data['adoc'];?></td></tr>
				
						
						
				
					<input type="hidden" name="new" value="1" />

						</select></td></tr>
						
												<tr>
						
						
						<td colspan="5"><label><strong>Patient's MRN:</strong></label></td>
						<td colspan="3"><label><strong>Patient's Episode:</strong></label></td>
						<td colspan="12"><label><strong>Patient's Name:</strong></label></td>
						
						
						</tr>

<tr>				<td colspan="5"><?php echo $data["pmrn"]; ?></td>
				<td colspan="3"><?php echo $data["eid"]; ?> </td>
					 <td colspan="12"><?php echo $data["pname"]; ?></td>

					 
</tr>

						
						
<tr><td colspan="20"><label><strong>Patient's Address :</strong></label></td></tr>
<tr><td colspan="20"><?php echo $data["padd"]; ?></td></tr>


		<tr>
						
						<td colspan="5"><label><strong>Age:</strong></label></td>
						<td colspan="3"><label><strong>Admission Date:</strong></label></td>
						<td colspan="2"><label><strong>Gender:</strong></label></td>
						<td colspan="4"><label><strong>Phone NO:</strong></label></td>
						<td colspan="2"><label><strong>Ward/Cabin NO:</strong></label></td>
						<td colspan="4"><label><strong>Bed NO:</strong></label></td>
							
						</tr>
						
						<tr>				
						<td colspan="5"><?php echo $data["pmrn"]; ?></td>  
             		<td colspan="3"><?php echo $data["adate"]; ?></td>					 	
					 <td colspan="2"><?php echo $data["gender"]; ?></td>
					 <td colspan="4"><?php echo $data["pphone"]; ?></td>  
					 <td colspan="4"><?php echo $data["room"]; ?></td>  
					 <td colspan="4"><?php echo $data["room1"]; ?></td>  

					 </tr>

						

<tr><td colspan="20" align="center"bgcolor="lightgreen"><label><strong>Discharge Request</strong></label></td> </tr>

<tr>

<td colspan="20" align="center">

<select name="infu" required>
		<option value="Confirm Discharge Request">Confirm Discharge Request</option>
		<option value="Confirm Death Declaration Request">Confirm Death Declaration Request</option>
		
	</select>




</tr> 

<tr>
		<td colspan="20"align="right"><button type="submit" name="Submit">Confirm</button></td>
	  
</tr>

<tr><td colspan="20" align="center"bgcolor="lightgreen"><label><strong>Discharge Request</strong></label></td> </tr>
<tr>
      <td colspan="1" align="center"><strong>S.No</strong></td>
      <td colspan="4" align="center"><strong>Patient's Name</strong></td>
      <td colspan="1" align="center"><strong>MRN</strong></td>
      <td colspan="2" align="center"><strong>Request Date </strong></td>
      
      <td colspan="2" align="center"><strong>Request By</strong></td>
	  <td colspan="2" align="center"><strong>Bill Confirmed</strong></td>
	  <td colspan="2" align="center"><strong>User Bill Confirmed</strong></td>
	  <td colspan="2" align="center"><strong>Status</strong></td>
	  <td colspan="3" align="center"><strong>D. Type</strong></td>
	  <td colspan="1" align="center"><strong>Cancel</strong></td>

       

	   </tr>
 <?php
	
$user=$_SESSION["sess_username"];
$pmrn=$data["pmrn"];
//$id=$_REQUEST["id"];
$episode=$data["eid"];
$count=1;
$sel_query="Select * from dis_request where pmrn= '$pmrn' and eid='$episode' and canstatus!='CANCEL' order by `id` DESC;";

$result = mysqli_query($con,$sel_query);

while($row = mysqli_fetch_assoc($result)) 
{ ?>    <tr>


      <td align="center" colspan="1"><?php echo $count; ?></td>
      <td align="center"colspan="4"><?php echo $row["pname"]; ?></td>
      <td align="center"colspan="1"><?php echo $row["pmrn"]; ?></td>
	  <td align="center"colspan="2"><?php echo $row["dstatustime"]; ?></td>  
      
      <td align="center"colspan="2"><?php echo $row["duser"]; ?></td>
	  <td align="center"colspan="2"><?php echo $row["bstatustime"]; ?></td>  
	  <td align="center"colspan="2"><?php echo $row["buser"]; ?></td>  
<td align="center"colspan="2"><?php echo $row["canstatus"]; ?></td>
<td align="center"colspan="3"><?php echo $row["d_type"]; ?></td>
	  
	  
<td align="center" colspan="1"><a href="dis_req_cancel?id=<?php echo $row['id'];?>">CANCEL</a></td>   	  

	  
      </tr>
    <?php $count++; } ?>

	
	<?php
	
$user=$_SESSION["sess_username"];
$pmrn=$data["pmrn"];
//$id=$_REQUEST["id"];
$episode=$data["eid"];
$count=1;
$sel_query="Select * from dis_request where pmrn= '$pmrn' and eid='$episode' and canstatus='CANCEL' order by `id` DESC;";

$result = mysqli_query($con,$sel_query);

while($row = mysqli_fetch_assoc($result)) 
{ ?>    <tr>

      <td align="center" colspan="1"><?php echo $count; ?></td>
      <td align="center"colspan="4"><?php echo $row["pname"]; ?></td>
      <td align="center"colspan="1"><?php echo $row["pmrn"]; ?></td>
	  <td align="center"colspan="2"><?php echo $row["dstatustime"]; ?></td>  
      
      <td align="center"colspan="2"><?php echo $row["duser"]; ?></td>
	  <td align="center"colspan="2"><?php echo $row["bstatustime"]; ?></td>  
	  <td align="center"colspan="2"><?php echo $row["buser"]; ?></td>  
<td align="center"colspan="2"><?php echo $row["canstatus"]; ?></td>
<td align="center"colspan="3"><?php echo $row["d_type"]; ?></td>
	  
	  


	  
      </tr>
    <?php $count++; } ?>

</table>
</form>
</body>

</html>
