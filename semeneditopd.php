<?php
include_once 'dbconfig.php';
?>

<?php 
session_start();
    require('db1.php');
	$role = $_SESSION['sess_userrole'];
	
	$queryc = "SELECT COUNT(utype) FROM user where '$role' in ('doctor','lab')"; 
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

// $id=$_REQUEST['id'];
$encryption=$_REQUEST['id'];
$options = 0;
$ciphering = "AES-192-CTR";
$decryption_iv = '1234567891011121';
$decryption_key = "kpj";
$decryption=openssl_decrypt ($encryption, $ciphering,
$decryption_key, $options, $decryption_iv);
$id = $decryption;

$sno='O'.$id;

// $pmrn=$_REQUEST['pmrn'];
$encryption=$_REQUEST['pmrn'];
$decryption=openssl_decrypt ($encryption, $ciphering,
$decryption_key, $options, $decryption_iv);
$pmrn = $decryption;

// $eid=$_REQUEST['eid'];
$encryption=$_REQUEST['eid'];
$decryption=openssl_decrypt ($encryption, $ciphering,
$decryption_key, $options, $decryption_iv);
$eid = $decryption;


$query4 = mysqli_query($con,"select * from alltest where id='$id'");
$data = mysqli_fetch_assoc($query4);

$iname=$data['medi'];
  
  
  
$query5 = mysqli_query($con,"select * from semen where sno='$sno'");
$data1 = mysqli_fetch_assoc($query5);  

$query6 = mysqli_query($con,"select * from pappnew where pmrn='$pmrn' and eid='$eid'");
$data2 = mysqli_fetch_assoc($query6);
 
?>


<?php
/*
Author: Javed Ur Rehman
Website: https://www.allphptricks.com/
*/
 
require('db1.php');

if(isset($_POST['Submit']))
{


$pname = $_REQUEST['pname'];
$pmrn = $_REQUEST['pmrn'];
$pphone=$_REQUEST['pphone'];
$page=$_REQUEST['page'];
$psex=$_REQUEST['psex'];
//$adate=$_REQUEST['adate'];

$ap=$_REQUEST['ap'];
$vo=$_REQUEST['vo'];
//$bo=$_REQUEST['bo'];
$vis=$_REQUEST['vis'];
$sc=$_REQUEST['sc'];
$sm=$_REQUEST['sm'];
$rpm=$_REQUEST['rpm'];
$sfp=$_REQUEST['sfp'];
$npm=$_REQUEST['npm'];


$iss=$_REQUEST['iss'];
$nfss=$_REQUEST['nfss'];
$hds=$_REQUEST['hds'];
$nmdf=$_REQUEST['nmdf'];
$tds=$_REQUEST['tds'];
$ims=$_REQUEST['ims'];
$sv=$_REQUEST['sv'];
$rbcf=$_REQUEST['rbcf'];
$ecsf=$_REQUEST['ecsf'];
$wbcsf=$_REQUEST['wbcsf'];
$cdsf=$_REQUEST['cdsf'];
$sasf=$_REQUEST['sasf'];
$inter=$_REQUEST['inter'];
$advice=$_REQUEST['advice'];


//$crea=$_REQUEST['crea'];

$adate= date('d/m/Y H:i:s');

$adate1= date('m/d/Y');


/*$rr='Appearance, Seminal Fluid:'.$ap."<br />".'Volume, Seminal Fluid:'.$vo."<br />".'Viscosity, Seminal Fluid:'.$vis."<br />".'Sprem Count, Seminal Fluid:'.$sc."<br />".'Sperm Motility, Seminal Fluid:'.$sm
."<br />".'Normal Form Sperm:'.$nfs."<br />".'Reb Blood Cell(RBC), Seminal Fluid:'.$rbc."<br />".'White Blood Cell(WBC), Seminal Fluid:'.$wbc;

*/

$rr='Appearance, Seminal Fluid:'.$ap."<br />".'Volume, Seminal Fluid:'.$vo."<br />".'Viscosity, Seminal Fluid:'.$vis."<br />".'Sprem Count, Seminal Fluid:'.$sc."<br />".'Total Motility:'.$sm
."<br />".'Rapid Progressive Motility:'.$rpm."<br />".'Slow or Sluggish forward progression:'.$sfp."<br />".'Non Progressive Motility:'.$npm."<br />".'Immotile Sperm:'
.$iss."<br />".'Normal form Sprem:'.$nfss."<br />".'Head Defect Sperm:'.$hds."<br />".'Neck or Midpiece defect sprem:'.$nmdf
."<br />".'Tail Defect Sperm:'.$tds."<br />".'Immature Sperm:'.$ims."<br />".
'Sperm Viability:'.$sv."<br />".'Red Blood Cell(RBC), Seminal Fluid:'.$rbcf."<br />".'White Blood Cell(WBC), Seminal Fluid:'.$wbcsf."<br />".'Epithelial Cells, Seminal Fluid:'.$ecsf
."<br />".'Cellular Debris, Seminal FLUID:'.$cdsf."<br />".'Sperm Agglutination, Seminal FLUID:'.$sasf."<br />".'Interpretation:'.$inter."<br />".'Advice:'.$advice;






$ins_query1="update semen set 
ap='$ap',
vo='$vo',
vis='$vis',
sc='$sc',
sm='$sm',
rpm='$rpm',
sfp='$sfp',
npm='$npm',
iss='$iss',
nfss='$nfss',
hds='$hds',
nmdf='$nmdf',
tds='$tds',
ims='$ims',
sv='$sv',
rbcf='$rbcf',
ecsf='$ecsf',
wbcsf='$wbcsf',
cdsf='$cdsf',
sasf='$sasf',
inter='$inter',
advice='$advice',

`eby`='$user',
`etime`='$adate'
 where sno='$sno'";
mysqli_query($con,$ins_query1) or die(mysql_error());

$update="update alltest set resultstatus='Updated By Technologist',resulttime='$adate',resultby='$user',result='$rr' where id='$id'";
mysqli_query($con,$update) or die(mysql_error());


//if ($con->query($ins_query) == TRUE) 
//{

    echo '<script language="javascript">';
    echo 'alert("Update Successful"); ';
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
  width: 25%;
}
textarea {
  padding: 2px;
  height: 100px;
  border-radius: 2px;
  width: 100%;
}

button {
  padding: 19px 39px 18px 39px;
  color: #FFF;
  background-color: #A085C6;
  /*#4bc970*/
  font-size: 16px;
  text-align: center;
  font-style: normal;
  border-radius: 5px;

  width: 100%;
  border: 1px solid #8265B0;
  /*#3ac162*/
  border-width: 1px 1px 3px;
  box-shadow: 0 -1px 0 rgba(255,255,255,0.1) inset;
  margin-bottom: 3px;
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
  margin-bottom: 0px;
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
    max-width: 750px;
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
  
  
  
  <link rel="stylesheet" href="styles.css">
  <script type="text/javascript" src="jquery-1.4.1.min.js"></script>
<script type="text/javascript">
$(document).ready(function()
{
	$("#loding1").hide();
	$("#loding2").hide();
	$(".country").change(function()
	{
		$("#loding1").show();
		var id=$(this).val();
		var dataString = 'id='+ id;
		$(".state").find('option').remove();
		$(".city").find('option').remove();
		$.ajax
		({
			type: "POST",
			url: "get_state.php",
			data: dataString,
			cache: false,
			success: function(html)
			{
				$("#loding1").hide();
				$(".state").html(html);
			} 
		});
	});
	
	
	$(".state").change(function()
	{
		$("#loding2").show();
		var id=$(this).val();
		var dataString = 'id='+ id;
	
		$.ajax
		({
			type: "POST",
			url: "get_city.php",
			data: dataString,
			cache: false,
			success: function(html)
			{
				$("#loding2").hide();
				$(".city").html(html);
			} 
		});
	});
	
});
</script>

</head>

<body>

<div id='cssmenu'>
<ul>
   <li><a href='edischarge3'><span>Home</span></a></li>
   <li class='active has-sub'><a href='#'><span>Patients</span></a>
      <ul>
         <li class='has-sub'><a href='esearch'><span>Patient Search By MRN</span></a>         </li>
         <li class='has-sub'><a href='eadm'><span>New Patient</span></a>         </li>
      </ul>
   </li>
   
   
   
   <li class='last'><a href='logout'><span>LOGOUT</span></a></li>
</ul>
</div>

<!-- Google Font -->
		<link href='jsnew/fonts' rel='stylesheet' type='text/css'>

<form action="" method="post">

<!-- Form Title -->
		<h1>SEMEN ANALYSIS FORM </h1>


        <fieldset>

			<legend></legend>
            <!-- Name Input -->
			
	  
	  <label for="age"><strong>Patient's Name :</strong></label>
      <input name="pname" type="text" size="70" style="text-transform:uppercase" value="<?php echo $data['pname']?>"required/>
 	  

	  <label for="age"><strong>Patient's Details :</strong></label>
	  	
      <input name="psex" type="text" size="5"value="<?php echo $data['pgender']?>" required/>
														
						
            <input name="pmrn" type="text" size="15" value="<?php echo $data['pmrn']?>" required/>
      <input name="pphone" type="text" size="13" value="<?php echo $data['pphone']?>"  required/>	  
	  <input name="page" type="text" size="2"value="<?php echo $data['page']?>" required/>
       
	  

      <label for="age"><strong>SEMINAL FLUID FOR ANALYSIS (SemenAn2):</strong></label>
	  <label for="age"><strong>Appearance, Seminal Fluid:</strong></label>
      <input name="ap" type="text" size="70" style="text-transform:uppercase" value="<?php echo $data1['ap'];?>"required>
	  <label for="age"><strong>Volume, Seminal Fluid:</strong></label>
      <input name="vo" type="text" size="70" style="text-transform:uppercase" value="<?php echo $data1['vo'];?>"required>
	  <label for="age"><strong>Viscosity, Seminal Fluid:</strong></label>
      <input name="vis" type="text" size="70" style="text-transform:uppercase" value="<?php echo $data1['vis'];?>"required>
	  <label for="age"><strong>Sperm Count, Seminal Fluid:</strong></label>
      <input name="sc" type="text" size="70" style="text-transform:uppercase" value="<?php echo $data1['sc'];?>"required>
	  <label for="age"><strong>Total Motility:</strong></label>
      <input name="sm" type="text" size="70" style="text-transform:uppercase" value="<?php echo $data1['sm'];?>"required>
	  
	  
	  <label for="age"><strong>Rapid Progressive Motility:</strong></label>
      <input name="rpm" type="text" size="70" style="text-transform:uppercase" value="<?php echo $data1['rpm'];?>"required>
	  
	  <label for="age"><strong>Slow Or Sluggish Forward Progression:</strong></label>
      <input name="sfp" type="text" size="70" style="text-transform:uppercase" value="<?php echo $data1['sfp'];?>"required>
	  
	  <label for="age"><strong>Non-Progressive Motility:</strong></label>
      <input name="npm" type="text" size="70" style="text-transform:uppercase" value="<?php echo $data1['npm'];?>"required>
	  
	  
	  <label for="age"><strong>Immotile Sperm:</strong></label>
      <input name="iss" type="text" size="70" style="text-transform:uppercase" value="<?php echo $data1['iss'];?>"required>
	  
	  
	  <label for="age"><strong>Normal Form Sprem:</strong></label>
      <input name="nfss" type="text" size="70" style="text-transform:uppercase" value="<?php echo $data1['nfss'];?>"required>
	  
	  <label for="age"><strong>Head Defect Sperm:</strong></label>
      <input name="hds" type="text" size="70" style="text-transform:uppercase" value="<?php echo $data1['hds'];?>"required>
	  
	  <label for="age"><strong>Neck or Midpiece defect sperm:</strong></label>
      <input name="nmdf" type="text" size="70" style="text-transform:uppercase" value="<?php echo $data1['nmdf'];?>"required>
	  
	  <label for="age"><strong>Tail Defect Sperm:</strong></label>
      <input name="tds" type="text" size="70" style="text-transform:uppercase" value="<?php echo $data1['tds'];?>"required>
	  
	  <label for="age"><strong>Immature Sperm:</strong></label>
      <input name="ims" type="text" size="70" style="text-transform:uppercase" value="<?php echo $data1['ims'];?>"required>
	  
	  <label for="age"><strong>Sprem Viability:</strong></label>
      <input name="sv" type="text" size="70" style="text-transform:uppercase" value="<?php echo $data1['sv'];?>"required>
	  
	  <label for="age"><strong>Red Blood (RBC), Seminal Fluid:</strong></label>
      <input name="rbcf" type="text" size="70" style="text-transform:uppercase" value="<?php echo $data1['rbcf'];?>"required>
	  
	  <label for="age"><strong>Epithelial Cells, Seminal Fluid:</strong></label>
      <input name="ecsf" type="text" size="70" style="text-transform:uppercase" value="<?php echo $data1['ecsf'];?>"required>
	  
	  <label for="age"><strong>White Blood Cell(WBC), Seminal Fluid:</strong></label>
      <input name="wbcsf" type="text" size="70" style="text-transform:uppercase" value="<?php echo $data1['wbcsf'];?>"required>
	  
	  <label for="age"><strong>Cellular Debris, Seminal Fluid:</strong></label>
      <input name="cdsf" type="text" size="70" style="text-transform:uppercase" value="<?php echo $data1['cdsf'];?>"required>
	  
	  <label for="age"><strong>Sperm Agglutination, Seminal Fluid:</strong></label>
      <input name="sasf" type="text" size="70" style="text-transform:uppercase" value="<?php echo $data1['sasf'];?>"required>
	  
	  <label for="age"><strong>Interpretation:</strong></label>
      <input name="inter" type="text" size="70" style="text-transform:uppercase" value="<?php echo $data1['inter'];?>"required>
	  
	  <label for="age"><strong>Advice:</strong></label>
      <input name="advice" type="text" size="70" style="text-transform:uppercase" value="<?php echo $data1['advice'];?>"required>

	  
	  
	  
  </fieldset>

<?php
/*
Author: Javed Ur Rehman
Website: https://www.allphptricks.com/
*/
//include("auth.php"); 


  
?>

<table><tr><td colspan="15">		<button type="submit" name="Submit">Confirm</button></td>
<td colspan="10">		<a target='_blank' href="adm?pmrn=<?php echo "$pmrn"; ?>&adoc=<?php echo $data4["adoc"]; ?>&adate=<?php echo $data4["adate"]; ?>&eid=<?php echo $count1; ?>"><img src="print.png" title="Print Report" width="150" height="60" /></a></td></tr></table>

</form>
  


</body>

</html>
