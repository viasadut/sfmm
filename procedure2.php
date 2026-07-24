<?php

    session_start();
    $role = $_SESSION['sess_userrole'];
    if(!isset($_SESSION['sess_username']) || $role!="doctor"){
      header('Location: login2?err=2');
    }
?>
<?php
require('db1.php');
 $fullname = $_SESSION['sess_username'];
$query39 = "SELECT * FROM user where uname= '$fullname'"; 
	 
$result39 = mysqli_query($con, $query39) or die(mysqli_error());

// Print out result
$row39 = mysqli_fetch_array($result39)
?>
<?php

$today=date('Y-m-d');
$timestamp = strtotime($today); // Example timestamp for 30-JUL-2025
$formattedDate = date('d-M-Y', $timestamp);

$full = $row39['fullname'];
$date=date('m/d/Y');
$pmrn=$_REQUEST['pmrn'];
$id=$_REQUEST['id'];
$date=date('m/d/Y');
$odate = date('d/m/Y H:i:s');


?>


<?php
/*
Author: Javed Ur Rehman
Website: https://www.allphptricks.com/
*/
//include("auth.php"); 
require('db1.php');

$user=$_SESSION['sess_username'];

//include("auth.php");
$id=$_REQUEST['id'];
$pmrn=$_REQUEST['pmrn'];
//$pname=$_REQUEST['pname'];
$query = "SELECT * from procedure1 where id='$id' and pmrn='$pmrn'"; 
$result = mysqli_query($con, $query) or die ( mysqli_error());
$row = mysqli_fetch_assoc($result);
$pn= $row['pname'];
$pm= $row['pmrn'];
$pp= $row['pphone'];  
$pa= $row['page'];
$ps= $row['psex'];
$dname= $row['dname'];
$eid= $row['eid'];
$pdate= $row['pdate'];
$ptime= $row['ptime'];
$proname= $row['proname'];
$diagnosis= $row['diagnosis'];
$pnote= $row['pnote'];
$procharge= $row['procharge'];
$type= $row['type'];
$ieid= $row['ieid'];

$pmrn_int=(int)$row['pmrn'];

$db = mysqli_connect('localhost','root','Godiloveu16');
mysqli_select_db($db,'sfmmkpjnew');

$query4 = mysqli_query($db,"select * from inpatient where pmrn='$pmrn' and discharge='' and eid='$ieid'");
$data = mysqli_fetch_assoc($query4);

$ward=$data['room'];
$bed1=$data['room1'];
//$adoc=$data['adoc'];
$pname=$data['pname'];
$api_adminssion_no=(int)$data['OUT_ADMISSION_NO_PK'];
$adoc=$data['adoc'];
$emerid=$data['emerid'];
$api_adminssion_no_char=$data['OUT_ADMISSION_NO_PK'];

$queryd = mysqli_query($db,"select * from doctor where dname='$full'");
$datad= mysqli_fetch_assoc($queryd);
$dcode=$datad['dcode'];
//$code=(int)$datad['code'];

$queryd1 = mysqli_query($db,"select * from doctor_code where dcode='$dcode' and dname like '%PROCEDURE%'");
$datad1= mysqli_fetch_assoc($queryd1);

$code=$datad1['ccode'];


$ip=$datad1['ip'];
$op=$datad1['op'];
$app_con=$datad1['app_con'];
$ccentre=$datad1['ccentre'];

$modified_string = substr($code, 1);
//$modified_string = $code7;

$db = mysqli_connect('localhost','root','Godiloveu16');
mysqli_select_db($db,'sfmmkpjnew');

$tb_q = mysqli_query($db,"select * from acct_master_new where item_code='$code'");
		$tb_result = mysqli_fetch_assoc($tb_q);
		if($tb_result['tb_op']==''){
$tb_data=$tb_result['tb_ip'];
    }
    else if($tb_result['tb_op']!=''){
      $tb_data=$tb_result['tb_op'];
      }



$querynew = "SELECT * from privilege where pname='$proname' and dname='$dname' and status='Approved'"; 
$resultnew = mysqli_query($con, $querynew) or die ( mysqli_error());
$new = mysqli_fetch_assoc($resultnew);
  
?>


<?php
/*
Author: Javed Ur Rehman
Website: https://www.allphptricks.com/
*/
 
require('db1.php');

if(isset($_POST['Submit']))
{

//$dname =$_REQUEST['dname'];
$proname1=$_REQUEST['proname'];
$pnote=$_REQUEST['pnote'];
$diagnosis=$_REQUEST['diagnosis'];
$procharge=(int)$_REQUEST['procharge'];
$o_ins=$_REQUEST['o_ins'];
$adoc_details=$full.'-'.$proname1;
//$x2=$_REQUEST['xl2'];
//$lx2= implode(",",$x2);

if($type=='Inpatient'){

$ins_query="update procedure1 set proname1='$proname1', pnote='$pnote', diagnosis='$diagnosis', procharge='$procharge', ustatus='Updated',rstatus='DONE',remarks1='$o_ins',dcode='$dcode', ccode='$code', ip='$ip', op='$op', acct_code='$app_con', ccentre='$ccentre' where id='$id'";
mysqli_query($con,$ins_query) or die(mysql_error());

	
	$ins_query1="insert into ivisit (`pmrn`,`eid`,`odate`,`infusion`,`user`,`room`,`vtype`,`cdate`) values 
( '$pmrn','$ieid','$odate','$dname','$fullname','$procharge','$proname1','$date')";
mysqli_query($con,$ins_query1) or die(mysql_error());





$date=date('Y-m-d');
		$ins_query6="insert into pms_tb (`trans_id`,`trans_type`,`acct_code`,`date`,`amount`,`location`) 
		values ('$id','CR','$tb_data','$date','$procharge','IPD_PROCEDURE')";
		mysqli_query($con,$ins_query6) or die(mysql_error());

		$ins_query7="insert into pms_tb (`trans_id`,`trans_type`,`acct_code`,`date`,`amount`,`location`) 
		values ('$id','DR','111999','$date','$procharge','IPD_PROCEDURE')";
		mysqli_query($con,$ins_query7) or die(mysql_error());



$url = "procedure2view?pmrn=$pmrn&id=$id&eid=$eid" ;
header("procedure2view?pmrn=$pmrn&id=$id&eid=$eid");

}

else if($type=='OPD'){
	
	$ins_query="update procedure1 set proname1='$proname1', pnote='$pnote', diagnosis='$diagnosis', procharge='$procharge',rstatus='DONE',dcode='$dcode', ccode='$code', ip='$ip', op='$op', acct_code='$app_con', ccentre='$ccentre' where id='$id'";
mysqli_query($con,$ins_query) or die(mysql_error());



$date=date('Y-m-d');
		$ins_query6="insert into pms_tb (`trans_id`,`trans_type`,`acct_code`,`date`,`amount`,`location`) 
		values ('$id','CR','$tb_data','$date','$procharge','OPD PROCEDURE')";
		mysqli_query($con,$ins_query6) or die(mysql_error());

		$ins_query7="insert into pms_tb (`trans_id`,`trans_type`,`acct_code`,`date`,`amount`,`location`) 
		values ('$id','DR','615100','$date','$procharge','OPD PROCEDURE')";
		mysqli_query($con,$ins_query7) or die(mysql_error());



$url = "procedure2view?pmrn=$pmrn&id=$id&eid=$eid" ;
header("Location:$url");
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
  background-color: #A085C6;
  /*#4bc970*/
  font-size: 18px;
  text-align: center;
  font-style: normal;
  border-radius: 5px;
  width: 100%;
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

  
  <script>
  $(document).ready(function() {
    $("#datepicker").datepicker();
  });
  </script>

 <script>
  $(document).ready(function() {
    $("#datepicker1").datepicker();
  });
  </script>

 <script>
  $(document).ready(function() {
    $("#datepicker2").datepicker();
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


<link rel="stylesheet" href="styles.css">

   <script src="script.js"></script>
</head>

<body>




<div id='cssmenu'>
<ul>
   <li><a href='otdash'><span>Home</span></a></li>
   <li class='active has-sub'><a href='#'><span>Patients</span></a>
      <ul>
         <li class='has-sub'><a href='viewnew'><span>OPD Patients</span></a>
            
         </li>
         <li class='has-sub'><a href='iview'><span>In-Patients</span></a>
            
         </li>
      </ul>
   </li>
   <li class='active has-sub'><a href='#'><span>Appointment</span></a>
      <ul>
         <li class='has-sub'><a href='cggtttt'><span>Set Doctor's Appointment</span></a>
            
         </li>
         <li class='has-sub'><a href='ami2'><span>Set Restrictions on Appointment Time</span></a>
            
         </li>
      </ul>
	  
   </li>

   <li class='last'><a href='ot'><span>OT BOOKING</span></a></li>
   <li class='active has-sub'><a href='#'><span>Reports</span></a>
      <ul>
         <li class='has-sub'><a href='view3new'><span>OPD Prescription</span></a>
            
         </li>
         <li class='has-sub'><a href='con1'><span>Outpatient Stats</span></a>
            
         </li>
		          <li class='has-sub'><a href='con2'><span>OT Stats</span></a>
            
         </li>
         <li class='has-sub'><a href='con3'><span>In-Patient Stats</span></a>
            
         </li>
		   <li class='has-sub'><a href='con11'><span>Medicine Stats</span></a>
            
         </li>

      </ul>
   </li>
   <li class='last'><a href='logout'><span>LOGOUT</span></a></li>
</ul>
</div>

<h1 align="center">PROCEDURE APPOINTMENT PANEL </h1>

  <!-- Stephonce R. MOrris | 2014 -->

<!-- Google Font -->
		<link href='jsnew/fonts' rel='stylesheet' type='text/css'>

<form action="" method="post" onSubmit="if(confirm('Want to proceed the submission?')){return true;}">


<!-- Form Title -->
        <table align="center" class="table table-bordered" id="dynamic_field">  
				<tr><td colspan="20"><label><strong>Doctors's Name :</strong></label>
				
				&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
				&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
				&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
				&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
				&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
				&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
				
				<a target='_blank' href="allreportdocnew?pmrn=<?php echo "$pmrn"; ?>"style="color:#FF0000;"><b>ALL REPORTS<b></a>&nbsp;&nbsp;&nbsp;&nbsp;<a target='_blank' href="deathstatdetailsmng?pmrn=<?php echo "$pmrn"; ?>"><b>ALL RECORDS<b></a>
				
				</td></tr>
				<tr>	  
				<td colspan="20"><select name="dname" value="<?php echo "$dname";?>" class="style1"required readonly>
			        <option value='<?php echo "$dname";?>'><?php echo "$dname";?></option>
				
			</select>
				
						
						
				
					<input type="hidden" name="new" value="1" />
					<input name="ID" type="hidden" value="<?php echo $row['ID'];?>" />
						</select></td></tr>
						
												<tr>
						
						
						<td colspan="2"><label><strong>Patient's MRN:</strong></label></td>
						<td colspan="18"><label><strong>Patient's Name:</strong></label></td>
						
						
						</tr>

<tr>				<td colspan="2"><input type="text" name="pmrn"  required value="<?php echo $pm;?>" readonly/></td>
					 <td colspan="18"><input type="text" name="pname" required value="<?php echo $pn;?>" readonly/></td>

					 
</tr>

						
						



		<tr>
						
						<td colspan="2"><label><strong>Age:</strong></label></td>
						<td colspan="2"><label><strong>Gender:</strong></label></td>
						<td colspan="2"><label><strong>Phone NO:</strong></label></td>
						<td colspan="2"><label><strong>Date:</strong></label></td>
						<td colspan="6"><label><strong>TIME:</strong></label></td>		
						</tr>
						
						<tr>				
						<td colspan="2"><input type="text" name="page" required value="<?php echo $pa;?>" readonly/></td>  
             		
					 <td colspan="2"><input type="text" name="psex" required value="<?php echo $ps;?>" readonly/></td>
					 <td colspan="2"><input type="text" name="pphone" required value="<?php echo $pp;?>" readonly/></td>  

			    	 <td colspan="2"><input type="text" name="pdate" id="datepicker1" placeholder="Select Date" size="15" value="<?php echo $pdate;?>"required/></td>  
					 <td colspan="6"><select name="ptime"required readonly/>
        
						<option value='<?php echo $ptime;?>'><?php echo $ptime;?></option>
						
				
</select></td>  
				
					 </tr>
					 
					 
					 
					 <tr>			 
					 
		
						<td colspan="20"><label><strong>Type of Procedure</strong></label></td>
						
						</tr>
						
						<tr>				
						
			
						
						
						<td colspan="20">
            
            <input type="text" id="pmrn" onkeyup="GetDetail1(this.value)" class="form-control action" list="categoryname" autocomplete="off" name='proname' placeholder='Select Procedure Name' style="color:green;font-size:22px; font-weight:bold" required>
<datalist id="categoryname">
            
            
            
            
        
						<option value="<?php echo "$proname";?>"><?php echo "$proname";?></option>
						<?php 


			$sql = "select * from `privilege` where dname='$dname'and status='Approved'";
			$res = mysqli_query($con, $sql);
			if(mysqli_num_rows($res) > 0) {
				while($row = mysqli_fetch_object($res)) {
					echo "<option value='".$row->pname."'>".$row->pname."</option>";
				}
			
}
			?>

		



		
</datalist></td>  </tr>

					 
					 
					 
					 
					
		            <tr>			 
					 
		
						<td colspan="20"><label><strong>Diagnosis</strong></label></td>
						
						</tr>
						
						<tr>				
		
					<tr><td colspan="20"><textarea name="diagnosis" rows="5"><?php echo "$diagnosis";?></textarea></td>  	</tr>
					
					<tr>			 
					 
		
						<td colspan="20"><label><strong>Procedure Note</strong></label></td>
						
						</tr>
						
<tr>
					 <td colspan="20"><textarea name="pnote" rows="8"><?php echo $new['sformat'];?></textarea></td></tr>
						
				
				
						
						<tr>			 
					 
		
						<td colspan="20"><label><strong>Other Instruction</strong></label></td>
						
						</tr>
						
						<tr>
					 <td colspan="20"><textarea name="o_ins" rows="8"><?php echo $new['remarks1'];?></textarea></td></tr>
					
				
<tr><td align="left" colspan="20"><a target='_blank' href="promedicine?pmrn=<?php echo "$pmrn"; ?>&dname=<?php echo "$dname"?>&eid=<?php echo "$eid"?>&id=<?php echo "$id"?>&type=<?php echo "$type"?>&ieid=<?php echo "$ieid"?>"><img src="medicine1.jpg" title="test" width="130" height="90" /></a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<a target='_blank' href="opd_pro_inves?pmrn=<?php echo "$pmrn"; ?>&dname=<?php echo "$dname"?>&eid=<?php echo "$eid"?>&id=<?php echo "$id"?>&type=<?php echo "$type"?>&ieid=<?php echo "$ieid"?>"><img src="test1.jpg" title="test" width="130" height="90" /></a></td></tr>
<tr><td colspan="20"></td></tr>
<tr>					<td colspan="20"><label><strong>Procedure Charge</strong></label></td></tr>

<tr><td colspan="20"><input type="text" name="procharge" required value="<?php echo $new['charge'];?>" /></td>  </tr>
<tr>
		<td colspan="10"><button type="submit" name="Submit">Confirm</button></td>
	  
	  				
</tr>

</body>

</html>



<script>

// onkeyup event will occur when the user
// release the key and calls the function
// assigned to this event
function GetDetail1(str) {
  if (str.length == 0) {
    //document.getElementById("sformat").value = "";

    document.getElementById("exampleTextarea22").value = "";
    //document.getElementById("porder").value = "";
    
    return;
  }
  else {
//var variables = "pmrn=Regular Visit&pd=$pd";
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
        
        //document.getElementById("porder").value = myObj[1];
        
        // Assign the value received to
        // last name input field
//						document.getElementById(
//						"page").value = myObj[1];
          
          //document.getElementById("exampleTextarea22").value = myObj[0];
          
          document.getElementById("uu").value = myObj[0];
          document.getElementById("uu1").value = myObj[1];
          document.getElementById("uu5").value = myObj[2];
          
          //document.getElementById("pd").value = myObj[2];
          
          
          //CKEDITOR.instances["exampleTextarea22"].setData(myObj[0]);
          
          
          
      }
    };
//var variables = "pmrn=str&string=$pd";

    // xhttp.open("GET", "filename", true);
    xmlhttp.open("GET", "ot_pull.php?pmrn=" + str + "&porder=<?php echo $full;?>", true);
//				xmlhttp.open("GET","getuser.php?q=" + q + "&r=" + r, true);

    
    // Sends the request to the server
    xmlhttp.send();
  }
}
</script>  
