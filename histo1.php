<?php

    session_start();
    $role = $_SESSION['sess_userrole'];
    if(!isset($_SESSION['sess_username']) || $role!="doctor"){
      header('Location: login2.php?err=2');
    }
?>
<?php
require('db1.php');
 $user = $_SESSION['sess_username'];
$query139 = "SELECT * FROM user where uname= '$user'"; 
	 
$result139 = mysqli_query($con, $query139) or die(mysqli_error());

// Print out result
$row139 = mysqli_fetch_array($result139)
?>
<?php
$full = $row139['fullname'];

?>

<?php

require('db1.php');

$pmrn=$_REQUEST['pmrn'];
$eeid=$_REQUEST['eeid'];
//$dname1=$_REQUEST['dname1'];
//include("auth.php");
$user=$_SESSION["sess_userrole"];

$query39 = "SELECT * FROM patient where pmrn= '$pmrn'"; 
$result39 = mysqli_query($con, $query39) or die(mysqli_error());
$row39 = mysqli_fetch_array($result39);

$query11 = "SELECT * FROM histo where pmrn= '$pmrn' and eeid='$eeid' and dname='$full'"; 
$result11 = mysqli_query($con, $query11) or die(mysqli_error());
$row11 = mysqli_fetch_array($result11);

  
?>

<?php
$query543 = "SELECT COUNT(pmrn) FROM histo where pmrn= '$pmrn';"; 
$result543 = mysqli_query($con, $query543) or die(mysqli_error());
$row543 = mysqli_fetch_assoc($result543);
$count =$row543['COUNT(pmrn)'];
$count1 = $count+1;
?>

<?php
 
require('db1.php');
$stime=date("h:i:sa");
if(isset($_POST['Submit']))
{

$dname =$_REQUEST['dname'];
$date1 =date('m/d/Y');
$time =date("h:i:sa");
$pmrn =$_REQUEST['pmrn'];
$pname =$_REQUEST['pname'];
$pphone =$_REQUEST['pphone'];
$page =$_REQUEST['page'];
$psex =$_REQUEST['psex'];
$shistory =$_REQUEST['shistory'];
$noperation =$_REQUEST['noperation'];
$indication =$_REQUEST['indication'];
$find =$_REQUEST['find'];
$bio1 =$_REQUEST['bio1'];
$bio2 =$_REQUEST['bio2'];
//$compli =$_REQUEST['compli'];
$bsize =$_REQUEST['bsize'];

$ins_query="insert into histo (`dname`,`date`,`time`,`pmrn`,`pname`,`pphone`,`page`,`psex`,`shistory`,`noperation`,`indication`,`find`,`bio1`,`bio2`,`eid`,`status`,`bstatus`,`bsize`,`eeid`) 
values ('$full','$date1', '$time','$pmrn','$pname','$pphone','$page','$psex','$shistory','$noperation','$indication','$find','$bio1','$bio2','$count1','NOT SEEN','Not Confirm','$bsize','$eeid')";
mysqli_query($con,$ins_query) or die("Problem in histo");

//$gg= $_REQUEST['pname'];
//$update="update pappnew set status='SEEN' where `ID`='$id'";
//mysqli_query($con,$update) or die(mysql_error());



}
?>


<!DOCTYPE html>
<html lang="en" >

<head>
  <meta charset="UTF-8">
  <title>Out Patient Record</title>
  
    <link rel="stylesheet" href="jsnew/normalize.min.css">

  
      <style>

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
  max-width: 2000px;
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
  font-size: 12px;
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
    max-width: 2000px;
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
   <li><a href='viewnew1'><span>Home</span></a></li>
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

<h1 align="center">OUTPATIENT RECORD </h1>

  <!-- Stephonce R. MOrris | 2014 -->

<!-- Google Font -->
		<link href='jsnew/fonts' rel='stylesheet' type='text/css'>

<form action="" method="post" onsubmit='return confirm("Do You Want To Proceed??");' />


<!-- Form Title -->
        <table align="center" class="table table-bordered" id="dynamic_field">  
		<tr><td align="right" colspan="20"><a target='_blank' href="view3newtest?pmrn=<?php echo "$pmrn"; ?>&dname=<?php echo "$full"?>"><b>Record of Previous Visits<b></a>&nbsp;&nbsp;
		<a target='_blank' href="https://medex.com.bd"><b>Reference Drug Index of Bangladesh(medex.com.bd)<b></a></td></tr>
		
				<tr><td colspan="20"><label><strong>Doctors's Name :</strong></label></td></tr>
				<tr>	  
				<td colspan="20"><input type="text" name="dname" value="<?php echo $full;?>" readonly/>
				
						
						
				
					<input type="hidden" name="new" value="1" />
					<input name="ID" type="hidden" value="<?php echo $row['ID'];?>" />
						</select></td></tr>
						
												<tr>
						
						
						<td colspan="10"><label><strong>Patient's Name:</strong></label></td>
						<td colspan="2"><label><strong>Patient's MRN:</strong></label></td>				
						<td colspan="2"><label><strong>Patient's Age:</strong></label></td>
						<td colspan="2"><label><strong>Patient's Gender:</strong></label></td>
						<td colspan="4"><label><strong>Patient's Phone No:</strong></label></td>
						
						
						</tr>

<tr>				 <td colspan="10"><input type="text" name="pname"  value="<?php echo $row39['pname'];?>" readonly/></td>
					<td colspan="2"><input type="text" name="pmrn"   value="<?php echo $row39['pmrn'];?>" readonly/></td>
					<td colspan="2"><input type="text" name="page" required value="<?php echo $row39['page'];?>" /></td>  	
					 <td colspan="2"><input type="text" name="psex" required value="<?php echo $row39['psex'];?>" /></td>
					 <td colspan="4"><input type="text" name="pphone" required value="<?php echo $row39['pphone'];?>" /></td>  

					 
</tr>

			
				<tr><td colspan="20" bgcolor="#00CCCC"><label><strong></strong></label></td></tr>					



						 <tr><td colspan="20"><label><strong>Short History:</strong></label></td>  </tr>
						 <tr><td colspan="20"><textarea class="form-control" id="exampleTextarea" name="shistory" rows="5" ><?php echo $row11['shistory'];?></textarea></td>  </tr>
						 
						 <tr><td colspan="20"><label><strong>Name Of Operation:</strong></label></td>  </tr>
						  <tr><td colspan="20"><textarea class="form-control" id="exampleTextarea1" name="noperation" rows="5"><?php echo $row11['noperation'];?></textarea></td>  </tr>
						<tr><td colspan="20"><label><strong>Indication:</strong></label></td>  </tr>
						  <tr><td colspan="20"><textarea class="form-control" id="exampleTextarea1" name="indication" rows="5"><?php echo $row11['indication'];?></textarea></td>  </tr>
				<tr><td colspan="20"><label><strong>Findings</strong></label></td>  </tr>
						  <tr><td colspan="20"><textarea class="form-control" id="exampleTextarea1" name="find" rows="5"><?php echo $row11['find'];?></textarea></td>  </tr>
														<tr><td colspan="20"><label><strong>Biospy Specimen:</strong></label></td>  </tr>
						  <tr><td colspan="20"><textarea class="form-control" id="exampleTextarea1" name="bio1" rows="5" required></textarea></td>  </tr>
						  
						  
						  <tr><td colspan="20"><label><strong>Biospy Specimen Size:</strong></label></td>  </tr>
						  <tr><td colspan="20"><select name="bsize" required>

       
						<option></option>
						<option value='Small'>Small</option>
						<option value='Medium'>Medium</option>
						<option value='Large'>Large</option>
						
						
</select></td></tr>

<tr><td colspan="20"><label><strong>Biospy For:</strong></label></td>  </tr>
						  <tr><td colspan="20"><textarea class="form-control" id="exampleTextarea1" name="bio2" rows="5">HISTOPATHOLOGY</textarea></td>  </tr>

						 


<tr>

		<td colspan="5" align='right'><button type="submit" name="Submit">Confirm</button></td>
	  
	  				
</tr>
</table>
<table width="100%" height ="100%" border="1" align="center" bgcolor="#FFFF99" style="border-collapse:collapse;">


    



    <tr>
      <td colspan="1" align="center"><strong>S.No</strong></td>
      
	  <td colspan="1" align="center"><strong>MRN</strong></td>
	  <td colspan="1" align="center"><strong>Patient Name</strong></td>
	  <td colspan="1" align="center"><strong>Doctor Name</strong></td>
        
      <td colspan="7" align="center"><strong>S. History</strong></td>   
	  <td colspan="2" align="center"><strong>Name Of Operation</strong></td>
	  <td colspan="5" align="center"><strong>Indication</strong></td>
      <td colspan="1" align="center"><strong>Findings</strong></td>

	  <td colspan="1" align="center"><strong>Biospy Specimen</strong></td>
	  <td colspan="1" align="center"><strong>Specimen Size</strong></td>

       

	   </tr>

  </thead>
  <tbody>

  
     <?php
	
$user=$_SESSION["sess_username"];

//$start=$_REQUEST["stdate"];
//$end=$_REQUEST["endate"];
//$bt=$_REQUEST["bt"];
//$id=$_REQUEST["id"];

//echo "<font color=blue font size=5> Total Record found in the search  -";
//echo   $row43['COUNT(type1)'];
//echo " ,  From  ";
//echo $start;
//echo "  To  ";
//echo $end;

$count=1;
$sel_query="Select * from histo where pmrn= '$pmrn' and eeid='$eeid' and dname='$full';";

//Select * from imedi2 where pmrn= '$pmrn' and eid='$eid'and status !='Cancel' order by `odate` asc;
$result = mysqli_query($con,$sel_query);

while($row = mysqli_fetch_assoc($result)) 
{ ?>    <tr>

      <td align="center" colspan="1"><?php echo $count; ?></td>
      
      
	  <td align="center"colspan="1"><?php echo $row["pmrn"]; ?></td>
	  <td align="center"colspan="1"><?php echo $row["pname"]; ?></td>
      <td align="center"colspan="1"><?php echo $row["dname"]; ?></td>  
	  <td align="center"colspan="7"><?php echo $row["shistory"]; ?></td>
	  <td align="center"colspan="2"><?php echo $row["noperation"]; ?></td>
	  <td align="center"colspan="5"><?php echo $row["indication"]; ?></td>
	  <td align="center"colspan="1"><?php echo $row["find"]; ?></td>
	  <td align="center"colspan="1"><?php echo $row["bio1"]; ?></td>
	  <td align="center"colspan="1"><?php echo $row["bsize"]; ?></td>
	  
  	  



      </tr>
    <?php $count++; } ?>
<tr><td colspan="10"><a target='_blank' href="historeq.php?pmrn=<?php echo "$pmrn"; ?>&eeid=<?php echo "$eeid"; ?>&dname1=<?php echo "$full"; ?>"><img src="print.png" title="Print Report" width="150" height="60" /></a></td>		</tr>
</body>

</html>
