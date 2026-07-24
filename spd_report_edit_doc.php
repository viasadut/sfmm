<?php 
    session_start();
    require('db1.php');
	$role = $_SESSION['sess_userrole'];
	
	$queryc = "SELECT COUNT(utype) FROM user where '$role' in ('doctor','cath')"; 
$resultc = mysqli_query($con, $queryc) or die(mysqli_error());
$rowc = mysqli_fetch_array($resultc);
$c1=$rowc['COUNT(utype)'];
	
    if(!isset($_SESSION['sess_username']) || $c1==0){
      header('Location: login2?err=2');
    }
?>


<?php

require('db1.php');

$user=$_SESSION['sess_username'];


$fullname = $_SESSION['sess_username'];
$query39 = "SELECT * FROM user where uname= '$fullname'"; 
	 
$result39 = mysqli_query($con, $query39) or die(mysqli_error());


$row39 = mysqli_fetch_array($result39);
$full = $row39['fullname'];

$lid=$_REQUEST['lid'];
$id=$_REQUEST['id'];
$loc=$_REQUEST['loc'];
$pmrn=$_REQUEST['pmrn'];
$dreffer=$_REQUEST['dreffer'];
//$dname1=$_REQUEST['dname1'];

$lid_opd = substr($lid, 1);
    




$query = "SELECT * from ecg_test where id='$id'"; 
$result = mysqli_query($con, $query) or die ( mysqli_error());
$row = mysqli_fetch_assoc($result);
$pn= $row['pname'];
$pm= $row['pmrn'];
$dnam= $row['dname'];
  $ps= $row['pgender'];
  $pp= $row['pphone'];
  $pa= $row['page'];
    $inves= $row['ron'];
  
  
  

?>


<?php
 
require('db1.php');

if(isset($_POST['Submit']))
{
$dname =$_REQUEST['dname'];

$select=$_REQUEST['select'];
$cdetails=$_REQUEST['cdetails'];
$date= date('Y-m-d');
$date1=date('m/d/Y');
$date2=date('d/m/Y');
$date2=date('d/m/Y');
$stime=date("h:i:sa");
$type=$_REQUEST['type'];	
$add_time=date('Y-m-d H:i:s');
$plaintext = strip_tags($cdetails);

$rr='Report:'.$cdetails."<br />".'Findings:'.$find;
//$url = "p4new1.php?pmrn=$pmrn&eid=$count1&dname=$full"; 
$date_d= date('Y-m-d');


$code = "SELECT * from radio where iname='$pd'"; 
$code_result = mysqli_query($con, $code) or die ( mysqli_error());
$code_row = mysqli_fetch_assoc($code_result);
$price_code=$code_row['code'];



if($loc=='OPD' and isset($_POST['vehicle1']))

{

$ins_query_format="insert into spd_report_format (`dname`,`dcode`,`inves`,`add_by`,`add_time`,`status`,`type`,`iname`) 
values ('$full', '$fullname','$cdetails','$fullname','$add_time','Active','$type','$ptemp')";
mysqli_query($con,$ins_query_format);


$update="update alltest set status='Updated', report='$plaintext' where `id`='$lid_opd'";
mysqli_query($con,$update);

$update="update ecg_test set details='$cdetails', r_u_by='$fullname',r_u_t='$add_time' where `id`='$id'";
mysqli_query($con,$update);


$ins_query="insert into ecg_test1 (`dname`,`dname1`,`pmrn`,`pname`,`page`,`psex`,`pphone`,`details`,`eid`,`date1`,`date2`,`stime`,`status1`,`location`,`datenew`,`ron`,`lid`,`r_u_by`,`r_u_t`) 
values('$dnam','$dname','$pm','$pn','$pa','$ps','$pp','$cdetails','$count1','$date1','$date2','$stime','Updated','OPD','$date_d','$inves','$lid','$user','$add_time')";
mysqli_query($con,$ins_query);


//header("Refresh: .1; URL=$url");
}

else if($loc=='OPD')

{


$update="update alltest set status='Updated', report='$plaintext' where `id`='$lid_opd'";
mysqli_query($con,$update);

$update="update ecg_test set details='$cdetails', r_u_by='$fullname',r_u_t='$add_time' where `id`='$id'";
mysqli_query($con,$update);


$ins_query="insert into ecg_test1 (`dname`,`dname1`,`pmrn`,`pname`,`page`,`psex`,`pphone`,`details`,`eid`,`date1`,`date2`,`stime`,`status1`,`location`,`datenew`,`ron`,`lid`,`r_u_by`,`r_u_t`) 
values('$dnam','$dname','$pm','$pn','$pa','$ps','$pp','$cdetails','$count1','$date1','$date2','$stime','Updated','OPD','$date_d','$inves','$lid','$user','$add_time')";
mysqli_query($con,$ins_query);


//header("Refresh: .1; URL=$url");
}

else if($loc=='IPD' and isset($_POST['vehicle1']))

{

$ins_query_format="insert into spd_report_format (`dname`,`dcode`,`inves`,`add_by`,`add_time`,`status`,`type`,`iname`) 
values ('$full', '$fullname','$cdetails','$fullname','$add_time','Active','$type','$ptemp')";
mysqli_query($con,$ins_query_format);

$update="update iinves set status='Updated', report='$plaintext' where `id`='$lid_opd'";
mysqli_query($con,$update);

$update="update ecg_test set details='$cdetails', r_u_by='$fullname',r_u_t='$add_time' where `id`='$id'";
mysqli_query($con,$update);


$ins_query="insert into ecg_test1 (`dname`,`dname1`,`pmrn`,`pname`,`page`,`psex`,`pphone`,`details`,`eid`,`date1`,`date2`,`stime`,`status1`,`location`,`datenew`,`ron`,`lid`,`r_u_by`,`r_u_t`) 
values('$dnam','$dname','$pm','$pn','$pa','$ps','$pp','$cdetails','$count1','$date1','$date2','$stime','Updated','IPD','$date_d','$inves','$lid','$user','$add_time')";
mysqli_query($con,$ins_query);


//header("Refresh: .1; URL=$url");
}



else if($loc=='IPD')

{



$update="update iinves set status='Updated', report='$plaintext' where `id`='$lid_opd'";
mysqli_query($con,$update);

$update="update ecg_test set details='$cdetails', r_u_by='$fullname',r_u_t='$add_time' where `id`='$id'";
mysqli_query($con,$update);


$ins_query="insert into ecg_test1 (`dname`,`dname1`,`pmrn`,`pname`,`page`,`psex`,`pphone`,`details`,`eid`,`date1`,`date2`,`stime`,`status1`,`location`,`datenew`,`ron`,`lid`,`r_u_by`,`r_u_t`) 
values('$dnam','$dname','$pm','$pn','$pa','$ps','$pp','$cdetails','$count1','$date1','$date2','$stime','Updated','IPD','$date_d','$inves','$lid','$user','$add_time')";
mysqli_query($con,$ins_query);


//header("Refresh: .1; URL=$url");
}

else if($loc=='AE' and isset($_POST['vehicle1']))

{

$ins_query_format="insert into spd_report_format (`dname`,`dcode`,`inves`,`add_by`,`add_time`,`status`,`type`,`iname`) 
values ('$full', '$fullname','$cdetails','$fullname','$add_time','Active','$type','$ptemp')";
mysqli_query($con,$ins_query_format);

$update="update einves set status='Updated', report='$plaintext' where `id`='$lid_opd'";
mysqli_query($con,$update);

$update="update ecg_test set details='$cdetails', r_u_by='$fullname',r_u_t='$add_time' where `id`='$id'";
mysqli_query($con,$update);


$ins_query="insert into ecg_test1 (`dname`,`dname1`,`pmrn`,`pname`,`page`,`psex`,`pphone`,`details`,`eid`,`date1`,`date2`,`stime`,`status1`,`location`,`datenew`,`ron`,`lid`,`r_u_by`,`r_u_t`) 
values('$dnam','$dname','$pm','$pn','$pa','$ps','$pp','$cdetails','$count1','$date1','$date2','$stime','Updated','AE','$date_d','$inves','$lid','$user','$add_time')";
mysqli_query($con,$ins_query);


//header("Refresh: .1; URL=$url");
}


else if($loc=='AE')

{

$ins_query_format="insert into spd_report_format (`dname`,`dcode`,`inves`,`add_by`,`add_time`,`status`,`type`,`iname`) 
values ('$full', '$fullname','$cdetails','$fullname','$add_time','Active','$type','$ptemp')";
mysqli_query($con,$ins_query_format);

$update="update einves set status='Updated', report='$plaintext' where `id`='$lid_opd'";
mysqli_query($con,$update);

$update="update ecg_test set details='$cdetails', r_u_by='$fullname',r_u_t='$add_time' where `id`='$id'";
mysqli_query($con,$update);


$ins_query="insert into ecg_test1 (`dname`,`dname1`,`pmrn`,`pname`,`page`,`psex`,`pphone`,`details`,`eid`,`date1`,`date2`,`stime`,`status1`,`location`,`datenew`,`ron`,`lid`,`r_u_by`,`r_u_t`) 
values('$dnam','$dname','$pm','$pn','$pa','$ps','$pp','$cdetails','$count1','$date1','$date2','$stime','Updated','AE','$date_d','$inves','$lid','$user','$add_time')";
mysqli_query($con,$ins_query);


//header("Refresh: .1; URL=$url");
}

}






?>


<!DOCTYPE html>
<html lang="en" >

<head>
  <meta charset="UTF-8">
  <title>DID REPORT</title>
  
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
    max-width: 1800px;
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
    <title>PHP - Dynamically Add or Remove input fields using JQuery</title>
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
return confirm("Are you Sure to Add Inpatient Visit ?");
}

</script>
<script type="text/javascript">
function confirm_click1()
{
return confirm("Are you Sure to Add ICU Visit ?");
}

</script>

<script type="text/javascript">
function confirm_click2()
{
return confirm("Are you Sure to Add Emergency Visit ?");
}

</script>


<script type="text/javascript">
function confirm_click3()
{
return confirm("Are you Sure to Add After Office Hour Visit ?");
}

</script>

<script src="ckeditor/ckeditor.js"></script>
<script src="ckeditor/samples/js/sample.js"></script></head>

<body>

<div id='cssmenu'>
<ul>
   <li><a href='rad_report_outside2'><span>Home</span></a></li>
      
		  		  
      <li class='last'><a href='logout'><span>LOGOUT</span></a></li>
</ul>
</div>

<h1 align="center">Reporting Panel</h1>

  <!-- Stephonce R. MOrris | 2014 -->

<!-- Google Font -->
	

<form action="" method="post" onSubmit="if(confirm('Want to proceed the submission?')){return true;}" autocomplete="on">


<!-- Form Title -->
        <table align="center" class="table table-bordered" id="dynamic_field">  
		<tr><td align="right" colspan="20"><a target='_blank' href="deathstatdetailsmng?pmrn=<?php echo "$pmrn"; ?>&dname=<?php echo "$full"?>"><b>All Records<b></a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<a target='_blank' href="allreportdocnew?pmrn=<?php echo "$pmrn"; ?>&dname=<?php echo "$full"?>"><b>All Reports<b></a></td></tr>
				<tr><td colspan="10" style="font-size:18px;color:green;"><label><strong> Reporting Doctors's Name : <?php echo $full;?></strong></label></td>
				<td colspan="10" style="font-size:18px;color:blue;"><label><strong>Referral Doctors's Name : <?php echo $dnam;?></strong></label></td></tr>
				<tr>
				<td colspan="10"><select name="dname" required>
			        
					<option value='<?php echo $row['dname1'];?>'><?php echo $row['dname1'];?></option>
					
					
					
					</select></td>
					<td colspan="10" style="font-size:18px;color:blue;"><label><strong><?php echo $dnam;?></strong></label></td>
				</tr>
				
				
				<tr>
				
				
				</tr>
				
						
						
						
						
						
						
												<tr>
						
						
						<td colspan="4" style="font-size:18px;color:red;"><label><strong>Patient's MRN: <?php echo $pm;?></strong></label></td>
						<td colspan="10" style="font-size:18px;color:red;"><label><strong>Patient's Name: <?php echo $pn;?></strong></label></td>
						
						
						


						
						



		
						
						<td colspan="2" style="font-size:18px;color:red;"><label><strong>Age: <?php echo $pa;?></strong></label></td>
						<td colspan="2" style="font-size:18px;color:red;"><label><strong>Gender: <?php echo $ps;?></strong></label></td>
						<td colspan="2" style="font-size:18px;color:red;"><label><strong>Phone NO: <?php echo $pp;?></strong></label></td>
						
						
						</tr>
						<tr>
						<td colspan="20" style="font-size:18px;color:green;"><label><strong>REPORT ON: <?php echo $inves;?></strong></label></td></tr>
				<tr>

<td colspan="20">
	  <input type="text" id="pmrn" onkeyup="GetDetail(this.value)" class="form-control action" list="categoryname" autocomplete="off" name='vtype' placeholder='Use Previous Template'>

    <datalist id="categoryname">
	<option value=''>-Select-</option>
				
				<?php
            require('db1.php');
            $uname = '';
            $query_1 = "select * from `spd_report_format` where status='Active' and iname='$pd'";
            $result_1 = mysqli_query($con, $query_1);
            while($row_1 = mysqli_fetch_array($result_1)) {
        ?>
            <option value="<?php echo $row_1['type'];?>"><?php echo $row_1['type']; ?></option>
        <?php } ?>
        
    </datalist>
	
	
	
</td>
</tr>				

						 <tr><td colspan="20"><label><strong>Patient's Details Report:</strong></label></td>  </tr>
						 <tr><td colspan="20"><textarea class="form-control" id="charge" name="cdetails" rows="40" ><?php echo $row['details'];?></textarea></td>  </tr>
						 
						 <script>
                                                    CKEDITOR.replace( 'charge',{
  height: 700,
  
  
 
 } );
													
                                                </script>
						
				
														


<tr>

				 
					 <script type="text/javascript">
    function EnableDisableTextBox(chkPassport) {
        var txtPassportNumber = document.getElementById("txtPassportNumber");
        txtPassportNumber.disabled = chkPassport.checked ? false : true;
        if (!txtPassportNumber.disabled) {
            txtPassportNumber.focus();
        }
    }
</script>
	 
	 		<td colspan="10">
	 <input type="checkbox" id="vehicle1" name="vehicle1" value="Bike" id="chkPassport" onclick="EnableDisableTextBox(this)">				 
	 <input type="text" id="txtPassportNumber" name='type' disabled="disabled" required style="background-color:lightgreen;" placeholder="Name The Template">
</td>

		<td colspan="5"><button type="submit" name="Submit">Confirm</button></td>
	  <td colspan="5"><a target='_blank' href="ecg_print_con000.php?pmrn=<?php echo "$pmrn"; ?>&id=<?php echo $row['id']; ?>&ac_no=<?php echo $row['lid']; ?>"><img src="print.png" title="Print Report" width="150" height="60" /></a></td>	
	  				
</tr>


<script>

		// onkeyup event will occur when the user
		// release the key and calls the function
		// assigned to this event
		function GetDetail(str) {
			if (str.length == 0) {
				//document.getElementById("sformat").value = "";

				document.getElementById("charge").value = "";
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
							
							document.getElementById("charge").value = myObj[0];
							
							//document.getElementById("pd").value = myObj[2];
							
							
							CKEDITOR.instances["charge"].setData(myObj[0]);
							//CKEDITOR.instances["pd"].setData(myObj[2]);
					}
				};
//var variables = "pmrn=str&string=$pd";

				// xhttp.open("GET", "filename", true);
				xmlhttp.open("GET", "pro_spd.php?pmrn=" + str + "&porder=<?php echo $pd;?>", true);
//				xmlhttp.open("GET","getuser.php?q=" + q + "&r=" + r, true);

				
				// Sends the request to the server
				xmlhttp.send();
			}
		}
	</script>  

</body>

</html>
