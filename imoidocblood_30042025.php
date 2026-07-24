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

//include("auth.php");
$pmrn=$_REQUEST['pmrn'];
$eid=$_REQUEST['eid'];

$db = mysqli_connect('localhost','root','Godiloveu16');
mysqli_select_db($db,'sfmmkpjnew');
$query4 = mysqli_query($db,"select * from inpatient where pmrn='$pmrn' and discharge=''");
$data = mysqli_fetch_assoc($query4);


$datenew=date('Y-m-d');
$n1=date('Ymd').'1';


$querymax1 = "SELECT max(barcode) FROM iblood where rdate='$datenew'"; 
$resultmax1 = mysqli_query($con, $querymax1) or die(mysqli_error());
$rowmax1 = mysqli_fetch_array($resultmax1);
$max1=$rowmax1['max(barcode)']+1;



$querymax2 = "SELECT count(barcode) FROM iblood where rdate='$datenew' and barcode !='0'"; 
$resultmax2 = mysqli_query($con, $querymax2) or die(mysqli_error());
$rowmax2= mysqli_fetch_array($resultmax2);
$max2=$rowmax2['count(barcode)'];


$bgroup = mysqli_query($db,"select * from bcross where pmrn='$pmrn' order by id desc LIMIT 1");
$bgroup_data = mysqli_fetch_assoc($bgroup);
$b_group=strtoupper($bgroup_data['group1'].' '.$bgroup_data['rhd']);


$bg = mysqli_query($db,"select * from bgroup where pmrn='$pmrn' order by id desc");
$bg_data = mysqli_fetch_assoc($bg);

$bg1 = mysqli_query($db,"select * from bcross where pmrn='$pmrn' order by id desc");
$bg_data1 = mysqli_fetch_assoc($bg1);
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
$odate = date('d/m/Y H:i:s');
$otime = date('d/m/Y');
$infu = $_REQUEST['infu'];
$remarks = $_REQUEST['remarks'];
$infu1 = $_REQUEST['infu1'];

$ins_query="insert into iblood (`pmrn`,`eid`,`pname`,`padd`,`page`,`padmission`,`pgender`,`pphone`,`odate`,`infusion`,`user`,`room`,`barcode`,`status`,`otime`,`rdate`,`location`) values 
( '$pmrn','$eid','$pname','$padd','$page','$adm','$psex','$pphone','$odate','$infu','$user','$remarks','$infu1','Data Updated','$otime','$datenew','IPD')";
mysqli_query($con,$ins_query) or die(mysql_error());

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
<h1 align="center"style="background-color:lightgreen;">INPATIENT INVESTIGATION </h1>
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

						
						
<tr><td colspan="15"><label><strong>Patient's Address :</strong></label></td>
<td colspan="5"><label><strong>Patient's Blood Group :</strong></label></td></tr>
<tr><td colspan="15"><?php echo $data["padd"]; ?></td>
<td colspan="5" style="color:red;font-size:20px;font-weight:bold"><?php echo $b_group; ?></td>
</tr>


		<tr>
						
						<td colspan="5"><label><strong>Age:</strong></label></td>
						<td colspan="3"><label><strong>Admission Date:</strong></label></td>
						<td colspan="2"><label><strong>Gender:</strong></label></td>
						<td colspan="4"><label><strong>Phone NO:</strong></label></td>
						<td colspan="3"><label><strong>Ward/Cabin</strong></label></td>
						<td colspan="3"><label><strong>Bed NO:</strong></label></td>
	
						</tr>
						
						<tr>				
						<td colspan="5"><?php echo $data["age"]; ?></td>  
             		<td colspan="3"><?php echo $data["adate"]; ?></td>					 	
					 <td colspan="2"><?php echo $data["gender"]; ?></td>
					 <td colspan="4"><?php echo $data["pphone"]; ?></td>  
					 				 <td colspan="3"><?php echo $data["room"]; ?></td>  
									 				 <td colspan="3"><?php echo $data["room1"]; ?></td>  

				 </tr>



<tr><td colspan="20" align="center"bgcolor="lightgreen"><label><strong>Blood Request Form</strong></label>
<?php if($bg_data['pmrn']!='') {echo '<p style="font-size:25px; color:red; font-weight:bold;">Patient Blood Group- '.$bg_data['abo'].' '.$bg_data['dgroup'].'</p>';}
//else if($bg_data['pmrn']=='' and $bg_data1['pmrn']!=) {echo '<p style="font-size:25px; color:red; font-weight:bold;">Patient Blood Group- '.$bg_data1['group1'].' '.$bg_data1['rhd'].'</p>';}
else if($bg_data1['pmrn']!='' and $bg_data['pmrn']=='') {echo '<p style="font-size:25px; color:red; font-weight:bold;">Patient Blood Group- "'.$bg_data1['group1'].'" '.$bg_data1['rhd'].'</p>';}
?>

&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<a href="teslab2"><strong>Blood Bank Stock<strong></a></td> </tr>

<tr>
						
						<td colspan="5"><label><strong>Blood Group:</strong></label></td>
						<td colspan="13"><label><strong>Blood Type:</strong></label></td>
						<td colspan="2"><label><strong>Barcode:</strong></label></td>

	
						</tr>

<tr>

<td colspan="5" align="center"><input list="browsers1" name="infu" size=60% class="form-control" value="<?php echo $b_group;?>">
  <datalist id="browsers1">

						<option value=''>-Select Blood Group</option>
						<option value='A POSITIVE'>A+(ve)</option>
						<option value='A NEGATIVE'>A-(ve)</option>
						<option value='B POSITIVE'>B+(ve)</option>
						<option value='B NEGATIVE'>B-(ve)</option>
						<option value='O POSITIVE'>O+(ve)</option>
						<option value='O NEGATIVE'>O-(ve)</option>						
						<option value='AB POSITIVE'>AB+(ve)</option>												
						<option value='AB NEGATIVE'>AB-(ve)</option>																		
								
				
				  </datalist></td>
			<td colspan="13" align="center"><input list="browsers3" name="remarks" size=60% class="form-control">
  <datalist id="browsers3">

						<option value=''>-Select Blood Type</option>
						<option value='WHOLE BLOOD'>WHOLE BLOOD</option>
						<option value='FFP'>FFP</option>
						<option value='PLATELETE CONCENTRATE'>PLATELETE CONCENTRATE</option>
						
						<option value='PRBC'>PRBC</option>
            <option value="PLATELET APHERESIS">PLATELET APHERESIS</option>
					
				  </datalist></td>


							
  			<td colspan="2" align="center"><input type="text" name="infu1" required readonly value="<?php if($max2=='0'){echo $n1;} else if($max2!='0'){echo $max1;}?>"></td></td>	  
</tr> 

<tr>
		<td colspan="20"align="right"><button type="submit" name="Submit">Confirm</button></td>
	  
</tr>



						

<tr><td colspan="20" align="center"bgcolor="lightgreen"><label><strong>Blood Request Form</strong></label></td> </tr>
<tr>
      <td colspan="1" align="center"><strong>S.No</strong></td>
      <td colspan="1" align="center"><strong>MRN</strong></td>
      <td colspan="4" align="center"><strong>Requested By</strong></td>
      <td colspan="1" align="center"><strong>Order Date </strong></td>
      <td colspan="3" align="center"><strong>Investigation</strong></td>
      <td colspan="2" align="center"><strong>Remarks</strong></td>   
      <td colspan="4" align="center"><strong>Done Date</strong></td>
	  <td colspan="2" align="center"><strong>Result</strong></td>
       	  <td colspan="2" align="center"><strong>Done By</strong></td>

	   </tr>
 <?php
	
$user=$_SESSION["sess_username"];
$pmrn=$data["pmrn"];
//$id=$_REQUEST["id"];
$episode=$data["eid"];

$count=1;
$sel_query="Select * from iblood where pmrn= '$pmrn' and eid='$episode' and status!='Cancel' and location='IPD'  order by `id` DESC;";

$result = mysqli_query($con,$sel_query);

while($row = mysqli_fetch_assoc($result)) 
{ ?>    <tr>

      <td align="center" colspan="1"><?php echo $count; ?></td>
      <td align="center"colspan="1"><?php echo $row["pmrn"]; ?></td>
      <td align="center"colspan="4"><?php echo $row["user"]; ?></td>
	  <td align="center"colspan="1"><?php echo $row["odate"]; ?></td>  
	  <td align="center"colspan="3"><?php echo $row["infusion"]; ?></td>
	  <td align="center"colspan="2"><?php echo $row["room"]; ?></td>
      
	  <td align="center"colspan="2"><?php echo $row["otime"]; ?></td>
  	  <td align="center"colspan="2"><?php echo $row["duser"]; ?></td>
  	  
	  <td align="center"colspan="2"><?php echo $row["bagno"]; ?></td>
	  <td align="center"colspan="2">
<?php

$bb=$row['bagno'];
$oo=$row['ooby1'];
$bb1=$row['bbstatus'];

$id1=$row['id'];
$eid1=$row['eid'];
$pmrn1=$row['pmrn'];

//$bno=$_REQUEST['bagno'];
$url = "imoidocblood11?id=$id1&pmrn=$pmrn1&eid=$eid1&bb=$bb"; 
$url6 = "cancel_blood_order_imo?id=$id1&pmrn=$pmrn1&eid=$eid1"; 



if($bb1=='' and $oo=='')
	
{
echo"<strong>Blood Not Issued yet</strong></a>";
echo"<br>";
echo"<a onclick='return confirm_click();' href='$url6'><strong>Cancel</strong></a>";
}

else if($bb1=='Issued' and $oo!='')
	
{
echo"<strong>Already Ordered</strong></a>";
}

else if($bb1=='Issued' and $oo=='')

{
echo"<a onclick='return confirm_click1();' href='$url'><strong>Order</strong></a>";
}

else 

{
echo"<strong></strong></a>";
}

	  ?>

</td>
  
      </tr>
    <?php $count++; } ?>
	
	<tr><td colspan="2"><a target='_blank' href="bloodrequest.php?pmrn=<?php echo "$pmrn"; ?>&eid=<?php echo "$eid"; ?>"><img src="lab.png" title="Print Report" width="150" height="60" /></a></td>
</table>
</form>
</body>

</html>
