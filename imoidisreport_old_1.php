<?php

    session_start();
    $role = $_SESSION['sess_userrole'];
    if(!isset($_SESSION['sess_username']) || $role!="imo"){
      header('Location: login2.php?err=2');
    }
?>
<?php
require('db1.php');

$eid=$_REQUEST['eid'];
$pmrn=$_REQUEST['pmrn'];

 $fullname = $_SESSION['sess_username'];
$query39 = "SELECT * FROM user where uname= '$fullname'"; 
	 
$result39 = mysqli_query($con, $query39) or die(mysqli_error());

// Print out result
$row39 = mysqli_fetch_array($result39);


$full = $row39['fullname'];


$query40 = "SELECT * FROM idischarge1 where pmrn= '$pmrn' and eid='$eid'"; 
	 
$result40 = mysqli_query($con, $query40) or die(mysqli_error());

// Print out result
$row40 = mysqli_fetch_array($result40);




$queryd = "SELECT * FROM diap where pmrn= '$pmrn' and  eid='$eid' order by id DESC limit 1"; 
	 
$resultd = mysqli_query($con, $queryd) or die(mysqli_error());

// Print out result
$rowd = mysqli_fetch_array($resultd);
$inves=$rowd['inves'];



$query11 = "SELECT * from massess where pmrn= '$pmrn' and eid='$eid'"; 
$result11 = mysqli_query($con, $query11) or die ( mysqli_error());
$row11 = mysqli_fetch_assoc($result11);

?>

<?php

require('db1.php');

$user=$_SESSION['sess_username'];



$eid=$_REQUEST['eid'];
$pmrn=$_REQUEST['pmrn'];



$query = "SELECT * from inpatient where pmrn='$pmrn' and eid='$eid'"; 
$result = mysqli_query($con, $query) or die ( mysqli_error());
$row = mysqli_fetch_assoc($result);
$pn= $row['pname'];
$pm= $row['pmrn'];
$phone= $row['pphone'];  
$pa= $row['age'];
$pdate= $row['adate'];
$padd= $row['padd'];
$pg= $row['gender'];
$vc= $row['card1'];
$vc1= $row['card2'];
$room1= $row['room1'];


//$pa= $row['padd'];
  
?>


<?php
 
require('db1.php');
$stime=date("h:i:sa");
if(isset($_POST['Submit']))
{

//$dname =$_REQUEST['dname'];
$pname = $_REQUEST['pname'];
$pmrn = $_REQUEST['pmrn'];
$pphone=$_REQUEST['pphone'];
$page = $_REQUEST['page'];
//$padd = $_REQUEST['padd'];
$psex = $_REQUEST['psex'];
$discharge = $_REQUEST['discharge'];
$ddia = $_REQUEST['ddia'];
$surgery = $_REQUEST['surgery'];
$ill = $_REQUEST['ill'];
$other = $_REQUEST['other'];
$plan = $_REQUEST['plan'];
$dinves = $_REQUEST['dinves'];
$date1 = date('d/m/Y H:i:s');
$ddate1 = date('m/d/Y');
$dname=$_REQUEST['xl'];
$refer=$_REQUEST['refer'];
//$dname= implode(",",$xl);
if($res=mysqli_num_rows($result40)>0)
{
 	
       echo '<script language="javascript">';
    echo 'alert("Unsuccessful !!Patient Already Discharged"); ';
    echo '</script>';
    }
	else{
$ins_query="insert into idischarge1 (`dname`,`pname`,`pphone`,`pmrn`,`page`,`psex`,`discharge`,`ddia`,`surgery`,`ill`,`other`,`plan`, `ddate`,`eid`,`emo`,`dinves`,`refer`)
 values ('$dname', '$pname','$pphone','$pmrn','$page','$psex','$discharge','$ddia','$surgery','$ill','$other','$plan','$date1','$eid','$full','$dinves','$refer')";
mysqli_query($con,$ins_query) or die("Problem in presnew");



$url = "imoidoccondis?pmrn=$pmrn&eid=$eid" ;
header("Location:$url");


//$gg= $_REQUEST['pname'];
//$update="update pappnew set status='SEEN' where `ID`='$id'";
//mysqli_query($con,$update) or die(mysql_error());

	}


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

input[type="text1"] {
  background: rgba(255,255,255,0.1);
  border: none;
  font-size: 20px;
  font-weight:bold;
  font-color: Blue;
  height: auto;
  margin: 0;
  outline: 0;
  padding: 15px;
  width: 100%;
  background-color: yellow;
  color: Black;
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
   
   
   
   <script src="ckeditor/ckeditor.js"></script>
<script src="ckeditor/samples/js/sample.js"></script>
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
		&nbsp;&nbsp;<a target='_blank' href="opdradreport?pmrn=<?php echo "$pmrn"; ?>"><b>Record of Radiology Report<b></a>&nbsp;&nbsp;<a target='_blank' href="https://medex.com.bd"><b>Reference Drug Index of Bangladesh(medex.com.bd)<b></a>&nbsp&nbsp<a target='_blank' href="http://192.168.100.254?pmrn=<?php echo "$pmrn"; ?>"><b>LAB REPORT<b></a></td></tr>
		
				<tr><td colspan="20"><label><strong>Doctors's Name :</strong></label></td></tr>
				<tr>	  
				 <tr><td colspan="20"><select name="xl" class="js-example-basic-single" placeholder="Select Investigations">
				 
<option value="<?php echo $row['adoc'];?>"><?php echo $row['adoc'];?></option>

       <?php 
			$sql = "select * from `doctor` where status='Active'";
			$res = mysqli_query($con, $sql);
			if(mysqli_num_rows($res) > 0) {
				while($row = mysqli_fetch_object($res)) {
					echo "<option value='".$row->dname."'>".$row->dname."</option>";
				}
			}
			?>
    </select>

    <script>
$(document).ready(function() {
    $('.js-example-basic-single').select2();
});
</script>

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
</td></tr>
       
						
						
						
						
				
</select></td>  

				
						
						
				
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

<tr>				 
					<td colspan="10"><input type="text1" name="pname"  value="<?php echo $pn;?>" readonly/></td>
					<td colspan="2"><input type="text1" name="pmrn"   value="<?php echo $pm;?>" readonly/></td>
					<td colspan="2"><input type="text" name="page" required value="<?php echo $pa;?>" readonly/></td>  	
					 <td colspan="2"><input type="text" name="psex" required value="<?php echo $pg;?>" readonly/></td>
					 <td colspan="4"><input type="text" name="pphone" required value="<?php echo $phone;?>" readonly/></td>  

					 
</tr>
<tr><td colspan="20"><label><strong>Discharge Type :</strong></label></td></tr>
<tr><td colspan="20"><input list=dis name="discharge" placeholder="-Select Discharge Type-" class="form-control" required>
					<datalist id="dis">	
						
						<option value=''>-Select Discharge Type-</option>
						<option value='Discharge Advised'>Discharge Advised</option>
						<option value='Discharge On Request'>Discharge On Request</option>
						<option value='Discharge Against Medical Advice'>Discharge Against Medical Advice</option>
						<option value='Transfer'>Transfer</option>
					
						</datalist>
</td>
						
					
</tr>



<tr><td colspan="20"><label><strong>Consultant Involved:</strong></label></td></tr>
<tr><td colspan="20"><textarea class="form-control" id="exampleTextarea" name="refer" rows="5" style="text-align:left;" readonly>
<?php
$sel_query5="Select * from irefferal where pmrn= '$pmrn' and eid='$eid'";

$result5 = mysqli_query($con,$sel_query5);

while($row5 = mysqli_fetch_assoc($result5)) 
                        {
                    ?><?php 
					
					$doc_name=$row5['infusion'];
					
					$sel_query6="Select * from doctor1 where dname= '$doc_name' and status='Active'";

$result6 = mysqli_query($con,$sel_query6);
$row6 = mysqli_fetch_assoc($result6);

					
					
					echo $row5['infusion'].'('.$row6['Discipline'].'), ';
                    
                        } 
                    ?>






</textarea></td>  </tr>





<tr><td colspan="20"><label><strong>Surgery / Procedure (if Any) :</strong></label></td></tr>
<tr><td colspan="20"><textarea class="form-control" id="exampleTextarea" name="surgery" rows="5" ><?php echo $row56['infusion'];?>, <?php echo $row57['infusion'];?></textarea></td>  </tr>

<script>
    CKEDITOR.replace('surgery', {
      width: '100%',
      height: 200
	  
    });
  </script>
<tr><td colspan="20"><label><strong>Discharge Diagnosis :</strong></label></td></tr>
<tr><td colspan="20"><textarea class="form-control" id="exampleTextarea" name="ddia" rows="5" ><?php echo $inves;?></textarea></td>  </tr>

<script>
    CKEDITOR.replace('ddia', {
      width: '100%',
      height: 200
	  
    });
  </script>
<tr><td colspan="20"><label><strong>Course Of Treatment (Optional) :</strong></label></td></tr>
<tr><td colspan="20"><textarea class="form-control" id="exampleTextarea1" name="ill" rows="5">
<?php if($row40['ill']==''){echo $row11['pill'];} else {echo $row40['ill'];}?>


</textarea></td>  </tr>

<script>
    CKEDITOR.replace('ill', {
      width: '100%',
      height: 200
	  
    });
  </script>
				

								



<tr><td align="left" colspan="3"><a target='_blank' href="imoidmoinves?pmrn=<?php echo "$pmrn"; ?>&eid=<?php echo "$eid"?>"><img src="test1.jpg" title="test" width="130" height="90" /></a></td><td align="left" colspan="3"><a target='_blank' href="imoidismomedi?pmrn=<?php echo "$pmrn"; ?>&eid=<?php echo "$eid"?>"><img src="medicine1.jpg" title="medicine" width="120" height="90" /></a></td></tr>

<tr><td colspan="20"><label for="age"><strong>Investigation Done:</strong></label></td></tr>
<tr><td colspan="20"><textarea id="exampleTextarea2" name="dinves" rows="5" placeholder="Advise on Discharge"></textarea></td>  </tr>	
<script>
    CKEDITOR.replace('dinves', {
      width: '100%',
      height: 200
	  
    });
  </script>


<tr><td colspan="20"><label for="age"><strong>Advise On Discharge:(Can Write Both in Bangla & English)</strong></label></td></tr>
<tr><td colspan="20"><textarea id="exampleTextarea2" name="other" rows="5" placeholder="Advise on Discharge"></textarea></td>  </tr>	
<script>
    CKEDITOR.replace('other', {
      width: '100%',
      height: 200
	  
    });
  </script>

<tr><td colspan="20"><label for="age"><strong>Follow Up Plan:(Can Write Both in Bangla & English)</strong></label></td></tr>
<tr><td colspan="20"><textarea id="exampleTextarea2" name="plan" rows="5" placeholder="Follow Up Plan"></textarea></td>  </tr>	

<script>
    CKEDITOR.replace('plan', {
      width: '100%',
      height: 200
	  
    });
  </script>
<tr>
		<td colspan="10"><button type="submit" name="Submit">Confirm</button></td>
	
	  				
</tr>

</body>

</html>
