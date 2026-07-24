<?php
include_once 'dbconfig.php';
?>

<?php 
    session_start();
    $role = $_SESSION['sess_userrole'];
    if(!isset($_SESSION['sess_username']) || $role!="lab"){
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







$user=$_SESSION['sess_username'];

//echo $rt ='test'.$user."<br />".'hhh:'.$user;
//echo $rt='test '.$user ;
//include("auth.php");
//echo $count1;
$id=$_REQUEST['id'];
$sno='O'.$id;
$pmrn=$_REQUEST['pmrn'];
$eid=$_REQUEST['eid'];

$db = mysqli_connect('localhost','root','Godiloveu16');
mysqli_select_db($db,'sfmmkpjnew');
$query4 = mysqli_query($db,"select * from alltest where id='$id'");
$data = mysqli_fetch_assoc($query4);
$eid=$data['eid'];
$iname=$data['medi'];

$query5 = mysqli_query($db,"select * from pappnew where pmrn='$pmrn' and eid='$eid'");
$data1 = mysqli_fetch_assoc($query5);
$rdate=date('Y-m-d');  
$pname=$data['pname'];


$query6 = mysqli_query($db,"select * from micro where pmrn='$pmrn' and sno='$sno'");
$data6 = mysqli_fetch_assoc($query6);
$smm1=$data6['mm1'];
$smm2=$data6['mm2'];
$spe=$data6['medi2'];
$smm11=$data6['mm3'];
$smm22=$data6['mm4'];
?>


<?php
/*
Author: Javed Ur Rehman
Website: https://www.allphptricks.com/
*/
 
require('db1.php');

if(isset($_POST['Submit']))
{


//$pname = $_REQUEST['pname'];
//$pmrn = $_REQUEST['pmrn'];
//$pphone=$_REQUEST['pphone'];
//$page=$_REQUEST['page'];
//$psex=$_REQUEST['psex'];
//$adate=$_REQUEST['adate'];

$mm1=$_REQUEST['mm1'];
$mm2=$_REQUEST['mm2'];
$medi1=$_REQUEST['medi1'];
$ins1=$_REQUEST['pins1'];
//$medi2=$_REQUEST['medi2'];
$ins2=$_REQUEST['pins2'];
$spe1=$_REQUEST['spe'];
$mm11=$_REQUEST['mm11'];
$mm22=$_REQUEST['mm22'];

//$adate= date('d/m/Y H:i:s');

//$adate1= date('m/d/Y');


/*$rr='Appearance, Urine:'.$aurine."<br />".'Specific Gravity, Urine:'.$surine."<br />".'pH, Urine:'.$purine."<br />".'Protien, Urine:'.$prurine."<br />".'Glucose, Urine:'.$gurine."<br />".
'Ketone, Urine:'.$kurine."<br />".'Bilirubin Screen, Urine:'.$burine."<br />".'Urobilinogen Screen, Urine:'.$uurine."<br />".'Blood, Urine:'.$blurine
."<br />".'WBC, Urine:'.$wurine."<br />".'RBC, Urine:'.$rurine."<br />".'Epitheial Cell, Urine:'.$eurine."<br />".'Cast, Urine:'.$curine
."<br />".'Crystal, Urine:'.$crurine."<br />".'Bacteria, Urine:'.$burine."<br />".'Yeast Cell, Urine:'.$yurine."<br />".'Other, Urine:'.$ourine;*/





$ins_query1="insert into micro (`pname`,`pmrn`,`mm1`,`medi1`,`ins1`,`ins2`,`rdate`,`rby`,`inid`,`sno`,`mm2`,`medi2`,`mm3`,`mm4`) values 
('$pname','$pmrn','$mm1','$medi1','$ins1','$ins2','$rdate','$user','$id','$sno','$mm2','$spe1','$mm11','$mm22')";
mysqli_query($con,$ins_query1) or die(mysql_error());

/*$update="update alltest set resultstatus='Updated By Technologist',resulttime='$adate',resultby='$user',result='$rr' where id='$id'";
mysqli_query($con,$update) or die(mysql_error());



$update1="update alllab set resultstatus='Updated By Technologist',result='$rr',resulttime='$rtime',resultby='$user',
r1='$aurine',r2='$surine',r3='$purine',
 r4='$prurine',r5='$gurine',r6='$kurine',r7='$burine',r8='$uurine',r9='$blurine',r10='$wurine',r11='$eurine',r12='$curine',r13='$crurine',r14='$baurine',r15='$yurine',r16='$ourine' where `sno`='$sno'";
mysqli_query($con,$update1);*/

//if ($con->query($ins_query) == TRUE) 
//{

    echo '<script language="javascript">';
    echo 'alert("Update Successful"); ';
    echo '</script>';
} 



if(isset($_POST['Submit1']))
	

{
	$adate= date('d/m/Y H:i:s');
	
$update="update alltest set resultstatus='Updated By Technologist',resulttime='$adate',resultby='$user',result='DONE' where id='$id'";
mysqli_query($con,$update) or die(mysql_error());

echo '<script language="javascript">';
    echo 'alert("test"); ';
    echo '</script>';
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

    <script src="jsnew/prefixfree.min.js"></script>



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
}
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


<script type="text/javascript">
function confirm_click()
{
return confirm("Are you Sure to Complete This Report ?");
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
<!-- Form Title -->
        <table align="center" class="table table-bordered" id="dynamic_field">  
		
				<tr>
					<td colspan="6"><label><strong>Doctors's Name :</strong></label></td>
					<td colspan="6"><label><strong>Patient's Name :</strong></label></td>
					<td colspan="4"><label><strong>Patient's MRN:</strong></label></td>
					<td colspan="4"><label><strong>Patient's Episode:</strong></label></td>

										<input type="hidden" name="new" value="1" />	
				</tr>
				
				<tr>	  
				<td colspan="6"><?php echo $data["dname"]; ?></td>
				<td colspan="6"><?php echo $data["pname"]; ?></td>
				<td colspan="4"><?php echo $pmrn; ?></td>
				<td colspan="4"><?php echo $eid; ?> </td>	
												
						
				
</tr>
						

						
						
					


				

<tr><td colspan="20" align="center"bgcolor="lightgreen"><label><strong><?php echo $iname;?></strong></label></td> </tr>


<tr><td colspan="20" align="center"><label><strong>Specimen</strong></label></td> </tr>


<tr>
<td colspan="20" align="center"><input list="browsers555" name="spe" size=60% class="form-control" autocomplete="off"  value="<?php echo $spe;?>">
  <datalist id="browsers555">

						<option value=''>-Select Specimen-</option>
				<?php 
			$sql = "select * from `anti` where type='Specimen'";
			$res = mysqli_query($con, $sql);
			if(mysqli_num_rows($res) > 0) {
				while($row = mysqli_fetch_object($res)) {
					echo "<option value='".$row->name."'>".$row->name."</option>";
				}
			}
			?>  </datalist></td>
</tr>


<tr><td colspan="10" align="center"><label><strong>Organism-1</strong></label></td>
<td colspan="10" align="center"><label><strong>Organism-2</strong></label></td> </tr>
<tr>
<td colspan="10" align="center"><input list="browsers5555" name="mm1" size=60% class="form-control" autocomplete="off"  value="<?php echo $smm1;?>">
  <datalist id="browsers5555">

						<option value=''>-Select Investigation</option>
				<?php 
			$sql = "select * from `anti` where type='Organism'";
			$res = mysqli_query($con, $sql);
			if(mysqli_num_rows($res) > 0) {
				while($row = mysqli_fetch_object($res)) {
					echo "<option value='".$row->name."'>".$row->name."</option>";
				}
			}
			?>  </datalist></td>

			
			<td colspan="10" align="center"><input list="browsers6665" name="mm2" size=60% class="form-control" autocomplete="off" value="<?php echo $smm2;?>">
  <datalist id="browsers6665">

						<option value=''>-Select Investigation</option>
				<?php 
			$sql = "select * from `anti` where type='Organism'";
			$res = mysqli_query($con, $sql);
			if(mysqli_num_rows($res) > 0) {
				while($row = mysqli_fetch_object($res)) {
					echo "<option value='".$row->name."'>".$row->name."</option>";
				}
			}
			?>  </datalist></td>

			
			</tr>

<tr><td colspan="10" align="center"><label><strong>Growth</strong></label></td>
<td colspan="10" align="center"><label><strong>Growth</strong></label></td> </tr>
<tr>


<tr>
<td colspan="10" align="center"><input list="browsers50" name="mm11" size=60% class="form-control" autocomplete="off"  value="<?php echo $smm11;?>">
  <datalist id="browsers50">

						<option value=''>-Select Investigation</option>
						<option value='Heavy'>Heavy</option>
						<option value='Moderate'>Moderate</option>
						<option value='Light'>Light</option>
						<option value='10^5'>'10^5'</option>
						<option value='10^4'>'10^4'</option>
						<option value='10^3'>'10^3'</option>
						<option value='10^2'>'10^2'</option>
				 </datalist></td>

			
			<td colspan="10" align="center"><input list="browsers60" name="mm22" size=60% class="form-control" autocomplete="off" value="<?php echo $smm22;?>">
  <datalist id="browsers60">

				<option value=''>-Select Investigation</option>
						<option value='Heavy'>Heavy</option>
						<option value='Moderate'>Moderate</option>
						<option value='Light'>Light</option>
						<option value='10^5'>'10^5'</option>
						<option value='10^4'>'10^4'</option>
						<option value='10^3'>'10^3'</option>
						<option value='10^2'>'10^2'</option>
				  </datalist></td>

			
			</tr>



			
			
			
<tr><td colspan="10" align="center"><label><strong>Antibiotic Name</strong></label></td> 

<td colspan="5" align="center"><label><strong>Sensitivity (Organism-1)</strong></label></td> 

<td colspan="5" align="center"><label><strong>Sensitivity (Organism-2)</strong></label></td> 



</tr>






<tr>
<td colspan="10" align="center"><input list="browsers1" name="medi1" size=60% class="form-control" autocomplete="off" >
  <datalist id="browsers1">

						<option value=''>-Select Antibiotic</option>
				<?php 
			$sql = "select * from `anti` where type='antibiotic'";
			$res = mysqli_query($con, $sql);
			if(mysqli_num_rows($res) > 0) {
				while($row = mysqli_fetch_object($res)) {
					echo "<option value='".$row->name."'>".$row->name."</option>";
				}
			}
			?>  </datalist></td>

<td colspan="5" align="center"><input list="browsers2" name="pins1" size=60% class="form-control" autocomplete="off" >
  <datalist id="browsers2">

						<option value=''>-Select-</option>
						<option value='S'>S</option>
						<option value='R'>R</option>
						
				 </datalist></td>
				 
				 
				 

<td colspan="5" align="center"><input list="browsers4" name="pins2" size=60% class="form-control" autocomplete="off" >
  <datalist id="browsers4">

						<option value=''>-Select-</option>
						<option value='S'>S</option>
						<option value='R'>R</option>
						
				 </datalist></td>




</tr>			        

<tr>
		<td colspan="20"align="right"><button type="submit" name="Submit">ADD</button></td>
	  
</tr>

</table>



<p>
<?php echo $spe;?><br><?php echo $smm1.'-'.$smm11;?><br> <?php echo $smm2.'-'.$smm22;?> </p>
<table width="100%" height ="100%" border="1" align="center" bgcolor="#FFFF99" style="border-collapse:collapse;">
    

    
    <tr>
      <th width="4%"><strong>S.No</strong></th>
      <th width="17%"><strong>Antibiotic Name</strong></th>
      <th width="10%"><strong>Sensitivity(Organism-1)</strong></th>
      <th width="14%"><strong>Sensitivity(Organism-2)</strong>  
      
      


	   </tr>
  </thead>
  <tbody>
  
    <?php
$user=$_SESSION["sess_username"];
$date= date('m/d/Y');

$count=1;



$sel_query1="Select * from micro where sno= '$sno' ORDER BY id desc;";

$result1 = mysqli_query($con,$sel_query1);
while($row1 = mysqli_fetch_assoc($result1)) { ?>
    <tr>
      <td align="center"><?php echo $count; ?></td>
      <td align="center"><?php echo $row1["medi1"]; ?></td>
      <td align="center"><?php echo $row1["ins1"]; ?>
  	  
      <td align="center"><?php echo $row1["ins2"]; ?>
      

	  
      </tr>
    <?php $count++; } ?>
	
<td align="center"><a onclick="return confirm_click();" href="labmicroconfirm?id=<?php echo $id; ?>"><strong>Complete Report</strong></a></td>
  </tbody>
</table>
</form>


</body>

</html>
