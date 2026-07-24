<?php

    session_start();
    $role = $_SESSION['sess_userrole'];
    if(!isset($_SESSION['sess_username']) || $role!="ot"){
      header('Location: login2?err=2');
    }
?>
<?php
require('db1.php');
 $fullname = $_SESSION['sess_username'];
 $id = $_REQUEST['id'];
$sel_query="Select * from ot where id= '$id';";

$result = mysqli_query($con,$sel_query);
$res = mysqli_fetch_array($result);
$sprequire=$res['sprequire'];
$otdate=$res['otdate'];
$duration=$res['duration'];
$tanes=$res['tanes'];
$nurse=$res['nurse'];
$dname=$res['dname'];

 
$query39 = "SELECT * FROM user where uname= '$fullname'"; 
	 
$result39 = mysqli_query($con, $query39) or die(mysqli_error());

// Print out result
$row39 = mysqli_fetch_array($result39)
?>
<?php
$full = $row39['fullname'];
$date=date('m/d/Y');
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
//$id=$_REQUEST['ID'];
//$pmrn=$_REQUEST['pmrn'];
//$pname=$_REQUEST['pname'];
$query = "SELECT * from ot where id='$id'"; 
$result = mysqli_query($con, $query) or die ( mysqli_error());
$row = mysqli_fetch_assoc($result);
$pn= $row['pname'];
$pm= $row['pmrn'];
$pp= $row['pphone'];  
$pa= $row['page'];
$ps= $row['psex'];
  
?>


<?php
/*
Author: Javed Ur Rehman
Website: https://www.allphptricks.com/
*/
 
require('db1.php');

if(isset($_POST['Submit']))
{


$diagnosis=$_REQUEST['diagnosis'];
//$cdetails=$_REQUEST['cdetails'];
//$page=$_REQUEST['page'];
//$psex=$_REQUEST['psex'];
$adate=$_REQUEST['adate'];
$otdate=$_REQUEST['otdate'];
$bkdate=$_REQUEST['bkdate'];
$bt=$_REQUEST['bt'];
$tp=$_REQUEST['tp'];
//$ta=$_REQUEST['ta'];
$sn=$_REQUEST['sn'];
$na=$_REQUEST['na'];
$xl=$_REQUEST['xl'];
$lx= implode(",",$xl);
$duration=$_REQUEST['duration'];
$otherins=$_REQUEST['otherins'];
//$sprequire=$_REQUEST['sprequire'];
$remarks=$_REQUEST['remarks'];
//$typeo=$_REQUEST['typeo'];
$x3=$_REQUEST['xl3'];
//$lx3= implode(",",$x3);

$x2=$_REQUEST['xl2'];
//$lx2= implode(",",$x2);

$otdate= date('m/d/Y');



$x4=$_REQUEST['xl4'];
$lx4= implode(",",$x4);





$Indication=$_REQUEST['Indication'];
$prep=$_REQUEST['prep'];
$incision=$_REQUEST['incision'];
$findings=$_REQUEST['findings'];
$procedure2=$_REQUEST['procedure2'];
$peroperative=$_REQUEST['peroperative'];
$drain=$_REQUEST['drain'];
$cs=$_REQUEST['cs'];
$position=$_REQUEST['position'];
$biopsyspe=$_REQUEST['biopsyspe'];
$biopsy=$_REQUEST['biopsy'];
$bloss=$_REQUEST['bloss'];
$pplan=$_REQUEST['pplan'];
$hplan=$_REQUEST['hplan'];
$rad=$_REQUEST['rad'];
$urine=$_REQUEST['urine'];
$blood=$_REQUEST['blood'];
$pc=$_REQUEST['pc'];
$bs=$_REQUEST['bs'];
$il=$_REQUEST['il'];
$oo=$_REQUEST['oo'];
$ci=$_REQUEST['ci'];
$ngi=$_REQUEST['ngi'];
$di=$_REQUEST['di'];
$morder=$_REQUEST['morder'];
$nmorder=$_REQUEST['nmorder'];
$inorder=$_REQUEST['inorder'];
$o2=$_REQUEST['o2'];


$update= "update ot set status='DONE',Indication='$Indication', prep='$prep',incision='$incision',findings='$findings',procedure2='$procedure2',peroperative='$peroperative',drain='$drain'
,cs='cs',position='$position',biopsyspe='$biopsyspe',biopsy='$biopsy',bloss='$bloss',pplan='$pplan',hplan='$hplan',
diagnosis='$diagnosis',adate='$adate',otdate='$otdate',bookingdt='$bkdate',duration='$bt',
ptype='$tp',tanes='$x3',nanes='$na',proce='$lx',duration1='$duration',otherins='$otherins',sprequire='$sprequire',remarks='$remarks',otdate='$otdate',nurse='$x2',asdoc='$lx4',rad='$rad',urine='$urine',blood='$blood',pc='$pc',bs='$bs',il='$il',oo='$oo',ci='$ci',ngi='$ngi',di='$di',morder='$morder',nmorder='$nmorder',inorder='$inorder',o2='$o2'where `id`='$id'";

mysqli_query($con,$update);

//header("Location:$url");

}
?>


<!DOCTYPE html>
<html lang="en" >

<head>
  <meta charset="UTF-8">
  <title>Surgical Note</title>
  
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

    <script src="https://cdnjs.cloudflare.com/ajax/libs/prefixfree/1.0.7/prefixfree.min.js"></script>



<link rel="stylesheet" href="https://ajax.googleapis.com/ajax/libs/jqueryui/1.11.4/themes/smoothness/jquery-ui.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.11.4/jquery-ui.min.js"></script>
  
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
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />  
    <script src="//ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>

    <link href="https://code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css" rel="stylesheet" />
    <link href="./jquery.multiselect.css" rel="stylesheet" />
    <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
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

<h1 align="center">SURGERY / PROCEDURE NOTE </h1>

  <!-- Stephonce R. MOrris | 2014 -->

<!-- Google Font -->
		<link href='https://fonts.googleapis.com/css?family=Nunito:400,300' rel='stylesheet' type='text/css'>

<form action="" method="post" onsubmit='return confirm("Do You Want To Proceed??");'">


<!-- Form Title -->
        <table align="center" class="table table-bordered" id="dynamic_field">  
				<tr><td colspan="20"><label><strong>Surgeon's Name :</strong></label></td></tr>
				
				<tr>	  
				<td colspan="20"><?php echo $row['dname']; ?>
				
						
						
				
					<input type="hidden" name="new" value="1" />
					<input name="ID" type="hidden" value="<?php echo $row['ID'];?>" />
						</select></td></tr>
						
												<tr>
						
				<tr><td colspan="20"><label><strong>Assistant Surgeon's Name :</strong></label></td></tr>		
				<tr><td colspan="20"><?php echo $row['asdoc']; ?></td></tr>
						<td colspan="2"><label><strong>Patient's MRN:</strong></label></td>
						<td colspan="18"><label><strong>Patient's Name:</strong></label></td>
						
						
						</tr>

<tr>				<td colspan="2"><?php echo $row['pmrn']; ?></td>
					 <td colspan="18"><?php echo $row['pname']; ?></td>

					 
</tr>

						
						



		<tr>
						
						<td colspan="2"><label><strong>Age:</strong></label></td>
						<td colspan="3"><label><strong>Admission Date:</strong></label></td>
						<td colspan="2"><label><strong>Gender:</strong></label></td>
						<td colspan="2"><label><strong>Phone No:</strong></label></td>
						<td colspan="2"><label><strong>OT Date:</strong></label></td>
						<td colspan="6"><label><strong>OT TIME:</strong></label></td>		
						</tr>
						
						
						<tr>				
						<td colspan="2"><?php echo $row['page']; ?></td>  
             		<td colspan="3"><?php echo $row['adate']; ?></td>					 	
					 <td colspan="2"><?php echo $row['psex']; ?></td>
					 <td colspan="2"><?php echo $row['pphone']; ?></td>  

			    	 <td colspan="2"><?php echo $row['otdate']; ?></td>  
					 <td colspan="6"><?php echo $row['duration']; ?>
				
</select></td>  
				
					 </tr>
					 
					 
		
		<tr>
							<td colspan="2"><label><strong>Duration:</strong></label></td>
						<td colspan="3"><label><strong>Booking Date& Time:</strong></label></td>
						<td colspan="2"><label><strong>Type Of Patients:</strong></label></td>
						<td colspan="2"><label><strong>Name of Anesthetist:</strong></label></td>
						<td colspan="4"><label><strong>Special Need:</strong></label></td>
						<td colspan="6"><label><strong>Type of Anesthesia:</strong></label></td>
						
						</tr>
						
						<tr>				
						
					 <td colspan="2"><?php echo $row['duration1']; ?></td> 
					 <td colspan="3"><?php echo $row['bookingdt']; ?></td>  		

						
						
						<td colspan="2"><?php echo $row['ptype']; ?></td>  
             		<td colspan="2"><?php echo $row['nanes']; ?></td>					 	
					 <td colspan="4"><?php echo $row['spereq']; ?></td>








					 <td colspan="6"><?php echo $row['tanes']; ?></td>

 <tr><td colspan="20"><label><strong>Patient's Diagnosis:</strong></label></td>  </tr>
						  <tr><td colspan="20"><?php echo $row['diagnosis']; ?></td>  </tr>
						


		<tr><td colspan="20"><label><strong>Procedure Name:</strong></label></td>  </tr>
		<tr><td colspan="20"><?php echo $row['proce']; ?>
</td></tr>
<td colspan="20"><?php echo $row['Otherins']; ?></td>	    	 
					 </tr>

		
		
		
					 
<tr><td colspan="20"><label><strong>Indication:</strong></label></td></tr>						
<tr><td colspan="20"><?php echo $row['indication']; ?></td>  </tr>
<tr><td colspan="20"><label><strong>Prep and Drape::</strong></label></td></tr>	
<tr><td colspan="20"><?php echo $row['prep']; ?></td>  </tr>
<tr><td colspan="20"><label><strong>Incision/port placement:</strong></label></td></tr>	
<tr><td colspan="20"><?php echo $row['incision']; ?></td>  </tr>
<tr><td colspan="20"><label><strong>Findings:</strong></label></td></tr>	
<tr><td colspan="20"><?php echo $row['findings']; ?></td>  </tr>
<tr><td colspan="20"><label><strong>Procedure:</strong></label></td></tr>	
<tr><td colspan="20"><?php echo $row['procedure2']; ?></td>  </tr>
<tr><td colspan="20"><label><strong>Peroperative complications:</strong></label></td></tr>	
<tr><td colspan="20"><?php echo $row['peroperative']; ?></td>  </tr>
<tr><td colspan="20"><label><strong>Drain:</strong></label></td></tr>	
<tr><td colspan="20"><?php echo $row['drain']; ?></td>  </tr>
<tr><td colspan="20"><label><strong>Any CS?:</strong></label></td></tr>	
<tr><td colspan="20"><?php echo $row['cs']; ?></td>  </tr>
<tr><td colspan="20"><label><strong>Special instruments used:</strong></label></td></tr>	
<tr><td colspan="20"><?php echo $row['sprequire']; ?></td>  </tr>
<tr><td colspan="20"><label><strong>Position:</strong></label></td></tr>	
<tr><td colspan="20"><?php echo $row['position']; ?></td></tr>
<tr><td colspan="20"><label><strong>Biopsy specimen:</strong></label></td></tr>	
<tr><td colspan="20"><?php echo $row['biopsyspe']; ?></td>  </tr>
<tr><td colspan="20"><label><strong>Biopsy For:</strong></label></td></tr>	
<tr><td colspan="12"><?php echo $row['biopsy']; ?></td>

<td colspan="4"><label><a target='_blank' href="histo1?pmrn=<?php echo $pmrn; ?>"><strong>Request Histo</strong></a></label></td>
<td colspan="4"><label><a target='_blank' href="otcs?pmrn=<?php echo $pmrn; ?>&id=<?php echo $id?>"><strong>CS Request</strong></a></label></td>
</tr>
<tr><td colspan="20"><label><strong>Blood Loss:</strong></label></td></tr>	
<tr><td colspan="20"><?php echo $row['bloss']; ?></td>  </tr>
<tr><td colspan="20"><label><strong>Hospital stay plan:</strong></label></td></tr>	
<tr><td colspan="20"><?php echo $row['hplan']; ?></td>  </tr>
<tr><td colspan="20"><label><strong>Immediate Postoperative plan:</strong></label></td></tr>	
<tr><td colspan="20"><?php echo $row['pplan']; ?></td>  </tr>
						 
						
		<tr><td colspan="20"><label><strong>Nurse Name:</strong></label></td>  </tr>
		<td colspan="20"><?php echo $row['nurse']; ?></td>  

						 
						
				
														

</tr>		

<tr>
						
						<td colspan="20"><label><strong>Remarks:</strong></label></td>
						
						</tr>
						
						<tr>				
						<td colspan="20"><?php echo $row['remarks']; ?></td>  
				
						
					 
					 </tr>
		
		
	<tr><td colspan="20"><label><strong>Post Operative Order (It is not completed Yet Please dont use this Page Now) :</strong></label></td></tr>
	<tr><td colspan="20"><label><strong>Order For o2 :</strong></label></td></tr>													
<tr><td colspan="20"><?php echo $row['o2']; ?></td>  </tr>

	<tr><td colspan="20"><label><strong>Infusion Order :</strong></label></td></tr>													
<tr><td colspan="20"><?php echo $row['inorder']; ?></td>  </tr>

	<tr><td colspan="20"><label><strong>Medication Order :</strong></label></td></tr>													
<tr><td colspan="20"><?php echo $row['morder']; ?></td>  </tr>

	<tr><td colspan="20"><label><strong>Non Medication Order :</strong></label></td></tr>													
<tr><td colspan="20"><?php echo $row['nmorder']; ?></td>  </tr>
	<tr><td colspan="20"><label><strong>Dietary Instruction :</strong></label></td></tr>													
<tr><td colspan="20"><?php echo $row['di']; ?></td>  </tr>

	<tr><td colspan="20"><label><strong>NG Instruction :</strong></label></td></tr>													
<tr><td colspan="20"><?php echo $row['ngi']; ?></td>  </tr>

	<tr><td colspan="20"><label><strong>Catheter Instruction :</strong></label></td></tr>													
<tr><td colspan="20"><?php echo $row['ci']; ?></td>  </tr>

	<tr><td colspan="20"><label><strong>Other Order :</strong></label></td></tr>													
<tr><td colspan="20"><?php echo $row['oo']; ?></td>  </tr>

	<tr><td colspan="20"><label><strong>Immediate Lab Request :</strong></label></td></tr>													
<tr><td colspan="20"><?php echo $row['il']; ?></td>  </tr>

	<tr><td colspan="20"><label><strong>Biopsy Specimen :</strong></label></td></tr>													
<tr><td colspan="20"><?php echo $row['bs']; ?></td>  </tr>

	<tr><td colspan="20"><label><strong>Pus for C&S :</strong></label></td></tr>													
<tr><td colspan="20"><?php echo $row['pc']; ?></td>  </tr>

	<tr><td colspan="20"><label><strong>Blood :</strong></label></td></tr>													
<tr><td colspan="20"><?php echo $row['blood']; ?></td>  </tr>

	<tr><td colspan="20"><label><strong>Urine :</strong></label></td></tr>													
<tr><td colspan="20"><?php echo $row['urine']; ?></td>  </tr>

	<tr><td colspan="20"><label><strong>Radiology :</strong></label></td></tr>													
<tr><td colspan="20"><?php echo $row['rad']; ?></td>  </tr>










</body>

</html>
