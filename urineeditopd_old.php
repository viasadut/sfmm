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
/*
Author: Javed Ur Rehman
Website: https://www.allphptricks.com/
*/
//include("auth.php"); 
require('db1.php');







$user=$_SESSION['sess_username'];

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

$db = mysqli_connect('localhost','root','Godiloveu16');
mysqli_select_db($db,'sfmmkpjnew');
$query4 = mysqli_query($db,"select * from alltest where id='$id'");
$data = mysqli_fetch_assoc($query4);
$eid=$data['eid'];
$iname=$data['medi'];


$query5 = mysqli_query($db,"select * from urine where sno='$sno'");
$data1 = mysqli_fetch_assoc($query5);  

$query6 = mysqli_query($db,"select * from pappnew where pmrn='$pmrn' and eid='$eid'");
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

$aurine=$_REQUEST['aurine'];
$surine=$_REQUEST['surine'];
$purine=$_REQUEST['purine'];
$prurine=$_REQUEST['prurine'];
$gurine=$_REQUEST['gurine'];
$kurine=$_REQUEST['kurine'];
$burine=$_REQUEST['burine'];
$uurine=$_REQUEST['uurine'];
$blurine=$_REQUEST['blurine'];
$wurine=$_REQUEST['wurine'];
$rurine=$_REQUEST['rurine'];
$eurine=$_REQUEST['eurine'];
$curine=$_REQUEST['curine'];
$crurine=$_REQUEST['crurine'];
$baurine=$_REQUEST['baurine'];
$yurine=$_REQUEST['yurine'];
$ourine=$_REQUEST['ourine'];

//$crea=$_REQUEST['crea'];

$adate= date('d/m/Y H:i:s');

$adate1= date('m/d/Y');


/*$rr='Appearance, Urine:'.$aurine."<br />".'Specific Gravity, Urine:'.$surine."<br />".'pH, Urine:'.$purine."<br />".'Protien, Urine:'.$purine."<br />".'Glucose, Urine:'.$gurine."<br />".
'Ketone, Urine:'.$kurine."<br />".'Bilirubin Screen, Urine:'.$burine."<br />".'Urobilinogen Screen, Urine:'.$uurine."<br />".'Blood, Urine:'.$blurine
."<br />".'WBC, Urine:'.$wurine."<br />".'RBC, Urine:'.$rurine."<br />".'Epitheial Cell, Urine:'.$eurine."<br />".'Cast, Urine:'.$curine
."<br />".'Crystal, Urine:'.$crurine."<br />".'Bacteria, Urine:'.$burine."<br />".'Yeast Cell, Urine:'.$yurine."<br />".'Other, Urine:'.$ourine;
*/

$rr='Appearance:'.$aurine."<br />".'Specific Gravity:'.$surine."<br />".'pH:'.$purine."<br />".'Protien:'.$prurine."<br />".'Glucose:'.$gurine."<br />".
'Ketone:'.$kurine."<br />".'Bilirubin:'.$burine."<br />".'Urobilinogen:'.$uurine."<br />".'Blood:'.$blurine
."<br />".'WBC:'.$wurine."<br />".'RBC:'.$rurine."<br />".'Epitheial Cell:'.$eurine."<br />".'Cast:'.$curine
."<br />".'Crystal:'.$crurine."<br />".'Bacteria:'.$burine."<br />".'Yeast Cell:'.$yurine."<br />".'Other:'.$ourine;





$ins_query1="update urine set `aurine`='$aurine',`surine`='$surine',`purine`='$purine',`prurine`='$prurine',`gurine`='$gurine',`kurine`='$kurine',
`burine`='$burine',`uurine`='$uurine',`blurine`='$blurine',`wurine`='$wurine',`eurine`='$eurine',`curine`='$curine',`crurine`='$crurine',`baurine`='$baurine',`yurine`='$yurine',`ourine`='$ourine',`eby`='$user',`etime`='$adate',`rurine`='$rurine' where sno='$sno'";
mysqli_query($con,$ins_query1) or die(mysql_error());

$update="update iinves set resultstatus='Updated By Technologist',resulttime='$adate',resultby='$user',result='$rr' where id='$id'";
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
		<h1>URINE FORM </h1>


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
      
	  <label for="age"><strong>Urine FEME / Urinalysis (uFEME1):</strong></label>
	  <label for="age"><strong>Appearance, Urine:</strong></label>
      <input name="aurine" type="text" size="70" style="text-transform:uppercase" value="<?php echo $data1['aurine'];?>"required>
	  <label for="age"><strong>Specific Gravity, Urine:</strong></label>
      <input name="surine" type="text" size="70" style="text-transform:uppercase" value="<?php echo $data1['surine'];?>"required>
	  <label for="age"><strong>pH, Urine:</strong></label>
      <input name="purine" type="text" size="70" style="text-transform:uppercase" value="<?php echo $data1['purine'];?>"required>
	  <label for="age"><strong>Protein, Urine:</strong></label>
      <input name="prurine" type="text" size="70" style="text-transform:uppercase" value="<?php echo $data1['prurine'];?>"required>
	  <label for="age"><strong>Glucose, Urine:</strong></label>
      <input name="gurine" type="text" size="70" style="text-transform:uppercase" value="<?php echo $data1['gurine'];?>"required>
	  <label for="age"><strong>Ketone, Urine:</strong></label>
      <input name="kurine" type="text" size="70" style="text-transform:uppercase" value="<?php echo $data1['kurine'];?>"required>
	  <label for="age"><strong>Bilirubin Screen, Urine:</strong></label>
      <input name="burine" type="text" size="70" style="text-transform:uppercase" value="<?php echo $data1['burine'];?>"required>
	  <label for="age"><strong>Urobilinogen, Urine:</strong></label>
      <input name="uurine" type="text" size="70" style="text-transform:uppercase" value="<?php echo $data1['uurine'];?>"required>
	  
	  <label for="age"><strong>Blood, Urine:</strong></label>
      <input name="blurine" type="text" size="70" style="text-transform:uppercase" value="<?php echo $data1['blurine'];?>"required>
	  <label for="age"><strong>Microscopic Examination, Urine:</strong></label>
	  <label for="age"><strong>WBC, Urine:</strong></label>
      <input name="wurine" type="text" size="70" style="text-transform:uppercase" value="<?php echo $data1['wurine'];?>"required>
	  <label for="age"><strong>RBC, Urine:</strong></label>
      <input name="rurine" type="text" size="70" style="text-transform:uppercase" value="<?php echo $data1['rurine'];?>"required>
	  <label for="age"><strong>Epithelial Cell, Urine:</strong></label>
      <input name="eurine" type="text" size="70" style="text-transform:uppercase" value="<?php echo $data1['eurine'];?>"required>
	  <label for="age"><strong>Cast, Urine:</strong></label>
      <input name="curine" type="text" size="70" style="text-transform:uppercase" value="<?php echo $data1['curine'];?>"required>
	  <label for="age"><strong>Crystal, Urine:</strong></label>
      <input name="crurine" type="text" size="70" style="text-transform:uppercase" value="<?php echo $data1['crurine'];?>"required>
	  <label for="age"><strong>Bacteria, Urine:</strong></label>
      <input name="baurine" type="text" size="70" style="text-transform:uppercase" value="<?php echo $data1['baurine'];?>"required>
	  <label for="age"><strong>Yeast, Urine:</strong></label>
      <input name="yurine" type="text" size="70" style="text-transform:uppercase" value="<?php echo $data1['yurine'];?>"required>
	  <label for="age"><strong>Others, Urine:</strong></label>
      <input name="ourine" type="text" size="70" style="text-transform:uppercase" value="<?php echo $data1['ourine'];?>"required>
	  
	  
	  
	  
	  
	  
	  
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
