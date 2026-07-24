<?php 
    session_start();
    require('db1.php');
	$role = $_SESSION['sess_userrole'];
	
$queryc = "SELECT COUNT(utype) FROM user where '$role' in ('imo','nurse','ot','mng','doctor')"; 
$resultc = mysqli_query($con, $queryc) or die(mysqli_error());
$rowc = mysqli_fetch_array($resultc);
$c1=$rowc['COUNT(utype)'];
	
    if(!isset($_SESSION['sess_username']) || $c1==0){
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
$tt=$_SERVER['HTTP_HOST']	;
//include("auth.php");
$pmrn=$_REQUEST['pmrn'];
$eid=$_REQUEST['eid'];
$ordate=date('m/d/Y');
$db = mysqli_connect('localhost','root','Godiloveu16');
mysqli_select_db($db,'sfmmkpjnew');
$query4 = mysqli_query($db,"select * from inpatient where pmrn='$pmrn' and discharge=''");
$data = mysqli_fetch_assoc($query4);
$full=$data['adoc'];
$eeid=$data['emerid'];

  
  
  $query4d = mysqli_query($db,"select * from staff1 where mname='$full'");
$datad = mysqli_fetch_assoc($query4d);
$ddn=$datad['sid'];




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
$ndate = date('Y-m-d');
$infu = $_REQUEST['infu'];
$remarks = $_REQUEST['remarks'];
$d_name = $_REQUEST['d_name'];
$query159 = mysqli_query($db,"select * from radio1 where iname='$infu'");
$data159 = mysqli_fetch_assoc($query159);

$query1590 = mysqli_query($db,"select * from radio where iname='$infu'");
$data1590 = mysqli_fetch_assoc($query1590);



$type=$data159["type"];
$code=$data1590["code"];
$price=$data1590["price"];
$subtype=$data159["subtype"];
//$result=$data159["result"];
//$reference=$data159["reference"];
//$unit=$data159["unit"];
$link=$data159["link"];
$report=$data159["report"];
$linkv=$data159["linkv"];
$reportv=$data159["reportv"];
$unit=$data159["unit"];


$sel90="SELECT * FROM radio1 WHERE `iname`='$infu';";
$result90 = mysqli_query($con,$sel90);
if($res90=mysqli_num_rows($result90)==0)
{
 	
       echo '<script language="javascript">';
    echo 'alert("Unsuccessful !!! The Investigation Name is not in the Database List.. Please contact with Concern Department"); ';
    echo '</script>';
    }

else{

$ins_query="insert into iinves (`pmrn`,`eid`,`pname`,`padd`,`page`,`padmission`,`pgender`,`pphone`,`odate`,`infusion`,`user`,`room`,`status`,`ordate`,`type`,`code`,`price`,`subtype`,`rstatus`,`link`,`report`,`ndate`,`linkv`,`reportv`,`unit`,`dname`) values 
( '$pmrn','$eid','$pname','$padd','$page','$adm','$psex','$pphone','$odate','$infu','$user','$remarks','Data Updated','$ordate','$type','$code','$price','$subtype','Ordered','$link','$report','$ndate','$linkv','$reportv','$unit','$d_name')";
mysqli_query($con,$ins_query) or die(mysql_error());
}
}
?>
<?php

if(isset($_POST['Submit1_a']))
{

$url = "idocinves.php?pmrn=$pmrn&eid=$eid";   
//$dname =$_REQUEST["adoc"];
$medi1 = $_REQUEST['infu'];
$pname = $data['pname'];
$pmrn = $data['pmrn'];
$eid = $data['eid'];
$padd = $data['padd'];
$adm = $data['adate'];
$pphone=$data['pphone'];
$page=$data['age'];
$psex=$data['gender'];
$odate = date('m-d-Y H:i:s');
$ndate = date('Y-m-d');
$d_name = $_REQUEST['d_name'];
$query159 = mysqli_query($db,"select * from doc_inves where iname='$medi1'");

while($data159 = mysqli_fetch_assoc($query159))
//while($row = mysqli_fetch_assoc($result)) 
{
$ii=$data159["medi"];
$ii2=$data159["ins"];



$query9 = mysqli_query($db,"select * from radio1 where iname='$ii'");
$data9 = mysqli_fetch_assoc($query9);


$type=$data9["type"];
$price=$data9["price"];
$code=$data9["code"];
//echo $type;
//echo $type;
$link=$data9["link"];
$linkv=$data9["linkv"];
$report=$data9["report"];
$reportv=$data9["reportv"];

$subtype=$data9["subtype"];


$unit=$data9["unit"];


/*$sel9=mysqli_query($db,"SELECT * FROM radio WHERE `mname`='$ii'");
$result9 = mysqli_fetch_assoc($sel9);
$brand2=$result9["brand1"];*/
//echo $type;
//echo $type;

//$ins_query="insert into pmedi (`dname`,`pmrn`,`pname`,`eid`,`medi`,`ins`,`date`,`type`,`date`) values ('$full', '$pmrn','$pname','$eid','$medi','$pins','$date','$type','$date')";
//mysqli_query($con,$ins_query) or die(mysql_error());



$ins_query="insert into iinves (`pmrn`,`eid`,`pname`,`padd`,`page`,`padmission`,`pgender`,`pphone`,`odate`,`infusion`,`user`,`room`,`status`,`ordate`,`type`,`code`,`price`,`subtype`,`rstatus`,`link`,`report`,`ndate`,`linkv`,`reportv`,`unit`,`dname`) values 
( '$pmrn','$eid','$pname','$padd','$page','$adm','$psex','$pphone','$odate','$ii','$user','$remarks','Data Updated','$ordate','$type','$code','$price','$subtype','Ordered','$link','$report','$ndate','$linkv','$reportv','$unit','$d_name')";
mysqli_query($con,$ins_query) or die(mysql_error());

//$ins_query1="insert into pmedi (`dname`,`pmrn`,`pname`,`medi`,`eid`,`brand`,`pdos`,`date`,`ndate`) values ('$full','$pmrn','$pname','$ii','$eid','$brand2','$ii2','$date1','$date2')";
//mysqli_query($con,$ins_query1) or die(mysql_error());


}
//header("Refresh: .1;");
header("location:$url;");
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
    max-width: 1300px;
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
				<td colspan="20">
				
					




   <select name="d_nameee"  size="1" required style='font-size:20px;color:red;font-weight:bold;'>
						  
						  <option value='<?php echo $data['adoc'];?>'><?php echo $data['adoc'];?></option>
						  
						  
						  
						  </select>
		




				
				
				</td></tr>
				
						
						
				
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
						<td colspan="2"><label><strong>Ward/Cabin:</strong></label></td>
						<td colspan="4"><label><strong>Bed NO:</strong></label></td>
	
						</tr>
						
						<tr>				
						<td colspan="5"><?php echo $data["age"]; ?></td>  
             		<td colspan="3"><?php echo $data["adate"]; ?></td>					 	
					 <td colspan="2"><?php echo $data["gender"]; ?></td>
					 <td colspan="4"><?php echo $data["pphone"]; ?></td>  
					 <td colspan="2"><?php echo $data["room"]; ?></td>  
					 <td colspan="4"><?php echo $data["room1"]; ?></td>  

				 </tr>



<tr><td colspan="20" align="center"bgcolor="lightgreen"><label><strong>Investigation Request Form</strong></label></td> </tr>
<tr><td colspan="5" align="center"bgcolor="lightblue"><label><strong>Consultant Name</strong></label></td>
<td colspan="8" align="center"bgcolor="lightblue"><label><strong>Name Of the Investigation</strong></label></td>
<td colspan="7" align="center"bgcolor="lightblue"><label><strong>Instruction</strong></label></td>
 </tr>
<tr>

<td colspan="5">
				
					




   <select name="d_name"  size="5" required style='font-size:20px;color:red;font-weight:bold;'>
						  
						  <option value='<?php echo $data['adoc'];?>'selected><?php echo $data['adoc'];?></option>
						  
		<?php 
			$sql = "select infusion from `irefferal` where pmrn='$pmrn' and eid='$eid' and cstatus='Active' order by id asc";
			$res = mysqli_query($con, $sql);
			if(mysqli_num_rows($res) > 0) {
				while($row = mysqli_fetch_object($res)) {
					echo "<option value='".$row->infusion."'>".$row->infusion."</option>";
				}
			}
			?>				  
						  
						  
						  </select>
		




				
				
				</td>

<td colspan="8" align="center">
			
			
			
			<select id="pmrn" onchange="GetDetail(this.value)" class="con_charge" list="categoryname" autocomplete="off" name='infu' required>
		
			<option value="">--Select--</option>
			<?php 
			$sql = "select distinct iname from `doc_inves` where dname='$ddn'";
			$res = mysqli_query($con, $sql);
			if(mysqli_num_rows($res) > 0) {
				while($row = mysqli_fetch_object($res)) {
					echo "<option value='".$row->iname."'>".$row->iname."</option>";
				}
			}
			?>
				<?php 
			$sql = "select distinct iname from `doc_inves` where uname='$ddn'";
			$res = mysqli_query($con, $sql);
			if(mysqli_num_rows($res) > 0) {
				while($row = mysqli_fetch_object($res)) {
					echo "<option value='".$row->iname."'>".$row->iname."</option>";
				}
			}
			?>
	
        <?php
            require('db1.php');
            $uname = '';
            $query = "select * from `radio1` where status='Active'";
            $result = mysqli_query($con, $query);
            while($row = mysqli_fetch_array($result)) {
        ?>
            <option value="<?php echo $row['iname']; ?>"><?php echo $row['iname']; ?></option>
        <?php } ?>
    </select>
			
			
			<link rel="stylesheet"
			href=
"jsnew/chosen.min.css" />

		<!--These jQuery libraries for select2
			need to be included-->
		<script src=
"jsnew/select2.min.js">
	</script>
		<link rel="stylesheet"
			href=
"jsnew/select2.min.css" />			
			<script>
$(document).ready(function() {
    $('.con_charge').select2();
});
</script>
			
			
			</td>
			<td colspan="7" align="center">
			
			   <textarea name="remarks" id="remarks" class="form-control action" cols="30" rows="10"></textarea>
			
			</td>

</tr> 

<tr>
		
		<td colspan="20"align="right"><button type="submit" name="Submit">Confirm</button>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<button type="submit" name="Submit1_a">ADD SET</button></td></td>
	  
</tr>


<script>

		// onkeyup event will occur when the user
		// release the key and calls the function
		// assigned to this event
		function GetDetail(str) {
			if (str.length == 0) {
				//document.getElementById("sformat").value = "";

				document.getElementById("remarks").value = "";
				//document.getElementById("porder").value = "";
				
				return;
			}
			else {

				// Creates a new XMLHttpRequest object
				var xmlhttp = new XMLHttpRequest();
				xmlhttp.onreadystatechange = function () {

					// Defines a function to be called when
					// the readyState property changes
					if (this.readyState == 4 &&
							this.status == 200) {
						
						// Typical action to be performed
						// when the document is ready
						var myObj = JSON.parse(this.responseText);

						// Returns the response data as a
						// string and store this array in
						// a variable assign the value
						// received to first name input field
						
						//document.getElementById
						//("sformat").value = myObj[0];
						
						// Assign the value received to
						// last name input field
//						document.getElementById(
	//						"page").value = myObj[1];
							
							document.getElementById(
							"remarks").value = myObj[0];
							
							//document.getElementById(
							//"porder").value = myObj[2];
							
							
					}
				};

				// xhttp.open("GET", "filename", true);
				xmlhttp.open("GET", "inves_details.php?pmrn=" + str, true);
				
				// Sends the request to the server
				xmlhttp.send();
			}
		}
	</script> 



<tr><td colspan="20" align="right"bgcolor="lightblue"><a target='_blank' href="http://192.168.100.254?pmrn=<?php echo "$pmrn"; ?>"><b>LAB REPORT<b></a></td></tr>
						

<tr><td colspan="20" align="center"bgcolor="lightgreen"><label><strong>Investigation Form</strong></label></td> </tr>
<tr><td colspan="20" align="center"bgcolor="lightblue"><label><strong>RED= Request From Emergency</strong></label></td> </tr>
<tr>
      <td colspan="1" align="center"><strong>S.No</strong></td>
      <td colspan="1" align="center"><strong>MRN</strong></td>
      <td colspan="2" align="center"><strong>Requested By</strong></td>
      <td colspan="1" align="center"><strong>Order Date </strong></td>
      <td colspan="3" align="center"><strong>Investigation</strong></td>
      <td colspan="2" align="center"><strong>Remarks</strong></td>   
      <td colspan="4" align="center"><strong>Status</strong></td>
	  <td colspan="2" align="center"><strong>Result</strong></td>
       	  <td colspan="2" align="center"><strong>Instructions</strong></td>
		  <td colspan="2" align="center"><strong>Delete</strong></td>

	   </tr>
 <?php
	
$user=$_SESSION["sess_username"];
$pmrn=$data["pmrn"];
//$id=$_REQUEST["id"];
$episode=$data["eid"];

$count=1;
$sel_query="Select * from iinves where pmrn= '$pmrn' and eid='$episode'and rstatus ='Ordered' order by `id` DESC;";

$result = mysqli_query($con,$sel_query);

while($row = mysqli_fetch_assoc($result)) 
{ ?>    <tr>

      <td align="center" colspan="1"><?php echo $count; ?></td>
     <td align="center"colspan="1"><?php echo $row["pmrn"]; ?></td>
       <td align="center"colspan="2"><?php echo $row["user"]; ?></td>
	  <td align="center"colspan="1"><?php echo $row["odate"]; ?></td>  
	  <td align="center"colspan="3"><?php echo $row["infusion"]; ?></td>
	        <td align="center"colspan="2"><?php echo $row["room"]; ?></td>
      <td align="center"colspan="4"><?php echo $row["rstatus"]; ?></td>  
	  <td align="center"colspan="2"><?php echo $row["otime"]; ?></td>
	  	  <td colspan="2"><a target='_blank' href="view_ins.php?infu=<?php echo $row['infusion']; ?>">Instructions</a></td>  
 <td align="center" colspan="2"><a href="delete1iinvesimo?id=<?php echo $row["id"]; ?>&pmrn=<?php echo "$pmrn"; ?>&eid=<?php echo "$eid"; ?>">DELETE</a></td>  	  
  
      </tr>
    <?php $count++; } ?>
	</form>
	
	<table width="100%" height ="100%" border="1" align="center" bgcolor="#FFFF99" style="border-collapse:collapse;">
	<tr><td colspan="15" align="center"bgcolor="lightblue"><label><strong>RECEIVED SAMPLE</strong></label></td>
	<td colspan="7" align="right"bgcolor="lightblue">
	<a href="datewise_investigation_list?pmrn=<?php echo "$pmrn"; ?>&eid=<?php echo "$eid"; ?>" style="font-size:20px; color:red;font-weight:bold;">View Datewise Investigation List</a>
	
	</td> </tr>	

<tr>
      <td colspan="1" align="center"><strong>S.No</strong></td>
      
      <td colspan="1" align="center"><strong>Order Date </strong></td>
      <td colspan="4" align="center"><strong>Investigation</strong></td>
      <td colspan="2" align="center"><strong>Remarks</strong></td>   
      <td colspan="2" align="center"><strong>Done Date</strong></td>
	  <td colspan="1" align="center"><strong>Status</strong></td>
       	  <td colspan="2" align="center"><strong>Received Comments</strong></td>
		  <td colspan="1" align="center"><strong>Received By</strong></td>
		  <td colspan="1" align="center"><strong>Confirm By</strong></td>
		  <td colspan="3" align="center"><strong>Result</strong></td>
		  <td colspan="2" align="center"><strong>Ref. Value</strong></td>
		  <td colspan="2" align="center"><strong>View</strong></td>
		  

	   </tr>
	   
	   
	   
	   
	   
	   
	   
	   <?php
	
$user=$_SESSION["sess_username"];
//$pmrn=$data["pmrn"];
//$id=$_REQUEST["id"];
//$episode=$data["eid"];

$count=1;
$sel_query="Select * from einves where pmrn= '$pmrn' and eid='$eeid' and status IN ('RECEIVED','Data Updated','DONE')  order by `id` DESC;";

$result = mysqli_query($con,$sel_query);

while($row = mysqli_fetch_assoc($result)) 
{ ?>    <tr>

      <td align="center" colspan="1"><?php echo $count; ?></td>
     
       
	  <td align="center"colspan="1"><?php echo date('d/m/Y', strtotime($row["odate1"])); ?></td>  
	  <td align="center"colspan="4">  <?php
		
		$type=$row["type"];
		$pmrn=$row["pmrn"];
		$eid2=$row["eid"];
		$infu=$row["infusion"];
		
	



	
		$url = "compareinvesimo?pmrn=$pmrn&eid=$eid2&infu=$infu"; 
		
		 if($type=='lab')
	{ 
echo "<a target='_blank' href='$url' style='color: red'><b>$infu<b></a>";
	}
	
	 else if($type=='LAB')
	{ 
echo "<a target='_blank' href='$url' style='color: red'><b>$infu<b></a>";
	}
	else if($type=='rad')
	{ 
echo '<span style="color:red;text-align:center;"><b>'.$infu.'<b></span>';
	}

	else if($type=='rad')
	{ 
echo '<span style="color:red;text-align:center;"><b>'.$infu.'<b></span>';
	}
	
		  
	?>	 </td>
	        <td align="center"colspan="2"><?php echo $row["room"]; ?></td>
			<td align="center"colspan="2"><?php echo $row["rtime"]; ?></td>  
			<td align="center"colspan="1"<?php if($row['status']== "REJECTED"): ?> style="background-color:RED;"<?php else: ?> style="background-color:lightblue;" <?php endif ; ?>>
        <?php echo $row['status'];?></td>
        	  	  <td align="center"colspan="2"><?php echo $row["rcomments"]; ?></td>
	  
	  	  <td align="center"colspan="1"><?php echo $row["rby"]; ?></td>
		  <td align="center"colspan="1"><?php echo $row["resultstatus"]; ?></td>
		  <td align="center"colspan="3">
		  <?php
		
		$type=$row["type"];
		$ac_no='E'.$row["id"];
		$eid3=$row["eid"];
		$id=$row["id"];
		$link=$row["report"];
	

$query23 = "SELECT COUNT(status) FROM radpapp where a_no='$ac_no' and status='SEEN'"; 
$result23 = mysqli_query($con, $query23) or die(mysqli_error());
$row23 = mysqli_fetch_array($result23);
$c1=$row23['COUNT(status)'];

	$url_spd = "ecg_pdf2?ac_no=$ac_no&pmrn=$pmrn&id=$id"; 
		$url = "inradreport?ac_no=$ac_no&dname=$full"; 
		$url_new = "rad_report_new2_1.php?pmrn=$pmrn&acno=$ac_no&dname=$dname5"; 
$date_d= date('2022-04-02');		

	
		$url = "inradreport?ac_no=$ac_no&dname=$full"; 
		 if($type=='lab')
	{ 
echo $row["result"];
	}
	
	else if($type=='rad' && $c1>0 and $row['ndate']>=$date_d)
	{ 
echo "<a target='_blank' href='$url_new'>REPORT</a>";
	}
	
	else if($type=='RAD' && $c1>0 and $row['ndate']>=$date_d)
	{ 
echo "<a target='_blank' href='$url_new'>REPORT</a>";
	}
	
	
	else if($type=='rad' && $c1>0 and $row['ndate']<$date_d)
	{ 
echo "<a target='_blank' href='$url'>REPORT</a>";
	}
	
	else if($type=='RAD' && $c1>0 and $row['ndate']<$date_d)
	{ 
echo "<a target='_blank' href='$url'>REPORT</a>";
	}
	
	else if($type=='rad' && $c1==0)
	{ 
echo "REPORT PENDING";
	}
	
	else if($type=='RAD' && $c1==0)
	{ 
echo "REPORT PENDING";
	}
		  
	?>	  
		  
		  </td>
		
		<td align="center"colspan="2">
		  <?php
		
		$icode=$row["code"];  
		$rr=$row["result"];  
		  $selq="Select * from radio where code='$icode';";

$resultq = mysqli_query($con,$selq);
$rowq = mysqli_fetch_assoc($resultq);
$ref1=$rowq['reference'];
$ref2=$rowq['ref2'];
$unit=$rowq['unit'];
$remarks=$rowq['remarks'];

	
		
		 if($type=='lab' and $rr !='')
	{ 
echo $remarks.' '.$unit ;
	}
	
	
	
	else if($type=='spd1' || $type=='spd' and $rstatus='RECEIVED' and $row['status']=='SEEN')
	{ 
echo "<a target='_blank' href='$url_spd'>REPORT</a>";

	}	
		 
else
	{ 
echo "";
	}		 
	?>	  
		  
		  </td>
		
		
		
		
		
		
  	    <td align="center"colspan="2">
		<?php
		
		$type=$row["type"];
		$pmrn=$row["pmrn"];
		$eid4=$row["eid"];
		$id=$row["id"];
		$link=$row["report"];
		$record=$row["result"];
		$ac_no='E'.$row["id"];
		$url = "$link?pmrn=$pmrn&eid=$eid4&id=$id&sno=$ac_no"; 
	if($type=='lab' && $record !='')
	{ 
echo "<a target='_blank' href='$url'>REPORT</a>";
	}
	
	else if($type=='LAB' && $record !='')
	{ 
echo "<a target='_blank' href='$url'>REPORT</a>";
	}
	else if($type=='lab' && $record =='')
	{ 
echo "REPORT PENDING";
	}
	
	
else if
($type=='rad')
	{ 
	echo '<form target="_blank" action="https://192.168.100.202:443/PACSAPI/Launch_Viewer?" method="post" id="tt" >
<input type="hidden" name="AccessionNumber" value="'.$ac_no.'"</input>
<input type="hidden" name="Username" value="hisuser"></input>
<input type="hidden" name="Password" value="hisuser"></input>
<input type="submit" name="Submit90" value="PACS VIEW" align="right"></input>
	</form>';}
	
	?>
	
	
		


</td>
  
      </tr>
<?php $count++; } ?>
	   
	   
	   
	   
	   
	   
	   
	   
	   
	   
	   
	   
	   
	   
	<?php
	
$user=$_SESSION["sess_username"];
$pmrn=$data["pmrn"];
//$id=$_REQUEST["id"];
$episode=$data["eid"];

//$count=1;
$sel_query="Select * from iinves where pmrn= '$pmrn' and eid='$eid' and rstatus IN ('RECEIVED','REJECTED')  order by `id` DESC;";

$result = mysqli_query($con,$sel_query);

while($row = mysqli_fetch_assoc($result)) 
{ ?>    <tr>

      <td align="center" colspan="1"><?php echo $count; ?></td>
     
       
	  <td align="center"colspan="1"><?php echo date('d/m/Y', strtotime($row["ordate"])); ?></td>  
	  <td align="center"colspan="4">  <?php
		
		$type=$row["type"];
		$pmrn=$row["pmrn"];
		$eid=$row["eid"];
		$infu=$row["infusion"];
	

	
	



	
		$url = "compareinvesimo?pmrn=$pmrn&eid=$eid&infu=$infu"; 
if($type=='lab' || $type=='LAB' || $type=='spd' || $type=='spd1')
	{ 
echo "<a target='_blank' href='$url'>$infu</a>";
	}
	
	else if($type=='rad' || $type=='RAD')
	{ 
echo $infu;
	}
	
		  
	?>	 </td>
	        <td align="center"colspan="2"><?php echo $row["room"]; ?></td>
			<td align="center"colspan="2"><?php echo $row["rtime"]; ?></td>  
			<td align="center"colspan="1"<?php if($row['rstatus']== "REJECTED"): ?> style="background-color:RED;"<?php else: ?> style="background-color:lightblue;" <?php endif ; ?>>
        <?php echo $row['rstatus'];?></td>
        	  	  <td align="center"colspan="2"><?php echo $row["rcomments"]; ?></td>
	  
	  	  <td align="center"colspan="1"><?php echo $row["rby"]; ?></td>
		  <td align="center"colspan="1"><?php echo $row["resultstatus"]; ?></td>
		  <td align="center"colspan="3">
		  <?php
		
		$type=$row["type"];
		$ac_no='I'.$row["id"];
		$eid=$row["eid"];
		$id=$row["id"];
		$rstatus=["rstatus"];
		$link=$row["report"];
	

$query23 = "SELECT COUNT(status) FROM radpapp where a_no='$ac_no' and status='SEEN'"; 
$result23 = mysqli_query($con, $query23) or die(mysqli_error());
$row23 = mysqli_fetch_array($result23);
$c1=$row23['COUNT(status)'];



$sel_query_oae="Select * from oae_pic where sno='$ac_no' ORDER BY id Desc";
$result_oae = mysqli_query($con,$sel_query_oae);
$row_oae = mysqli_fetch_assoc($result_oae);
$oae_no=$row_oae['image'];


$url_oae="cam_test/oae_photo/$oae_no";

	
		$url = "inradreport?ac_no=$ac_no&dname=$full"; 
		$url_spd = "ecg_pdf2?ac_no=$ac_no&pmrn=$pmrn&id=$id"; 
		
$url_new = "rad_report_new2_1.php?pmrn=$pmrn&acno=$ac_no&dname=$dname5"; 
$date_d= date('2022-03-31');		
		 if($type=='lab')
	{ 
echo $row["result"];
	}
	
	else if($type=='rad' && $c1>0 && $row['ndate']>=$date_d)
	{ 
echo "<a target='_blank' href='$url_new'>REPORT</a>";
	}
	
	else if($type=='RAD' && $c1>0 && $row['ndate']>=$date_d)
	{ 
echo "<a target='_blank' href='$url_new'>REPORT</a>";
	}
	
	
	else if($type=='rad' && $c1>0 && $row['ndate']<$date_d)
	{ 
echo "<a target='_blank' href='$url'>REPORT</a>";
	}
	
	else if($type=='RAD' && $c1>0 && $row['ndate']<$date_d)
	{ 
echo "<a target='_blank' href='$url'>REPORT</a>";
	}
	
	else if($type=='rad' && $c1==0)
	{ 
echo "REPORT PENDING";
	}
		
else if($type=='RAD' && $c1==0)
	{ 
echo "REPORT PENDING";
	}		
	
	
	else if($type=='spd1' || $type=='spd' and $rstatus='RECEIVED' and $row['status']=='SEEN')
	{ 
echo "<a target='_blank' href='$url_spd'>REPORT</a>";

	}
	
	
	else if($row['infusion']=='OAE HEARING SCREENING TEST')
	{ 
echo "<a target='_blank' href='$url_oae'>REPORT</a>";
	}
	?>	  
		  
		  </td>
		  
		  
		  <td align="center"colspan="2">
		  <?php
		
		$icode=$row["code"];  
		$rr=$row["result"];  
		  $selq="Select * from radio where code='$icode';";

$resultq = mysqli_query($con,$selq);
$rowq = mysqli_fetch_assoc($resultq);
$ref1=$rowq['reference'];
$ref2=$rowq['ref2'];
$unit=$rowq['unit'];

	
		
		 if($type=='lab' and $rr !='')
	{ 
echo $ref1.'-'.$ref2.' '.$unit ;
	}
	
	else
	{ 
echo "";
	}
	
	
		  
	?>	  
		  
		  </td>
		
  	    <td align="center"colspan="2">
		<?php
		
		$type=$row["type"];
		$pmrn=$row["pmrn"];
		$eid=$row["eid"];
		$id=$row["id"];
		$link=$row["report"];
		$record=$row["result"];
		$ac_no='I'.$row["id"];
		$url = "$link?pmrn=$pmrn&eid=$eid&id=$id&sno=$ac_no"; 
	if($type=='lab' && $record !='')
	{ 
echo "<a target='_blank' href='$url'>REPORT</a>";
	}
	
	else if($type=='LAB' && $record !='')
	{ 
echo "<a target='_blank' href='$url'>REPORT</a>";
	}
	
	
	else if($type=='lab' && $record =='')
	{ 
echo "REPORT PENDING";
	}
	
	

	
	
	
	
	else if
($type=='rad' || $type=='RAD' and $tt=='192.168.100.252:8081')
	{ 
	echo '<form target="_blank" action="https://192.168.100.202:443/PACSAPI/Launch_Viewer?" method="post" id="tt" >
<input type="hidden" name="AccessionNumber" value="'.$ac_no.'"</input>
<input type="hidden" name="Username" value="hisuser"></input>
<input type="hidden" name="Password" value="hisuser"></input>
<input type="submit" name="Submit90" value="PACS VIEW" align="right"></input>
	</form>';}


else if
($type=='rad' || $type=='RAD' and $tt!='192.168.100.252:8081')
	{ 
	echo'<form target="_blank" action="https://182.160.124.36:443/PACSAPI/Launch_Viewer?" method="post" id="tt" >
<input type="hidden" name="AccessionNumber" value="'.$ac_no.'"</input>
<input type="hidden" name="Username" value="hisuser"></input>
<input type="hidden" name="Password" value="hisuser"></input>
<input type="submit" name="Submit90" value="PACS VIEW" align="right"></input>
	</form>';}

	?>
	
	
		


</td>
  
      </tr>
<?php $count++; } ?>
	
	
	
	<tr><td colspan="2"><a target='_blank' href="piinves.php?pmrn=<?php echo "$pmrn"; ?>&eid=<?php echo "$eid"; ?>"><img src="lab.png" title="Print Report" width="150" height="60" /></a></td>
	<td colspan="2"><a target='_blank' href="piinves1.php?pmrn=<?php echo "$pmrn"; ?>&eid=<?php echo "$eid"; ?>"><img src="rad.png" title="Print Report" width="150" height="60" /></a></td>
<td colspan="2"><a target='_blank' href="spdprint.php?pmrn=<?php echo "$pmrn"; ?>&eid=<?php echo "$eid"; ?>"><img src="spd.png" title="Print Report" width="150" height="60" /></a></td>
<td colspan="2"><a target='_blank' href="printlabreporttest1_lab.php?pmrn=<?php echo "$pmrn"; ?>&eid=<?php echo "$eid"; ?>"><img src="lab_report.png" title="Print Report" width="100" height="100" /></a></td>
<td colspan="2"><a target='_blank' href="printlabreporttest1_radio.php?pmrn=<?php echo "$pmrn"; ?>&eid=<?php echo "$eid"; ?>"><img src="radio_report.png" title="Print Report" width="100" height="100" /></a></td>
	</tr>
</table>

</body>

</html>
