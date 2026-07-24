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

//echo $rt ='test'.$user."<br />".'hhh:'.$user;
//echo $rt='test '.$user ;
//include("auth.php");
//echo $count1;
$id=$_REQUEST['id'];
$sno='I'.$id;
$pmrn=$_REQUEST['pmrn'];
$eid=$_REQUEST['eid'];

$db = mysqli_connect('localhost','root','Godiloveu16');
mysqli_select_db($db,'sfmmkpjnew');
$query4 = mysqli_query($db,"select * from iinves where id='$id'");
$data = mysqli_fetch_assoc($query4);
$eid=$data['eid'];
$iname=$data['infusion'];


$query5 = mysqli_query($db,"select * from urine where sno='$sno'");
$data1 = mysqli_fetch_assoc($query5);  

  
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

$sediment=$_REQUEST['sediment'];

$sedi_v=$_REQUEST['sedi_v'];

//$crea=$_REQUEST['crea'];

$adate= date('d/m/Y H:i:s');

$adate1= date('m/d/Y');

$comment=$_REQUEST['comment'];

$granular_c=$_REQUEST['granular_c'];
$hyaline_c=$_REQUEST['hyaline_c'];
$wbc=$_REQUEST['wbc_c'];
$rbc=$_REQUEST['rbc_c'];

$cal_ox=$_REQUEST['cal_ox'];
$uric_acid=$_REQUEST['uric_acid'];
$triple_phosphate=$_REQUEST['triple_phosphate'];
$c_others=$_REQUEST['c_others'];
$color=$_REQUEST['color'];



$rr='Appearance:'.$aurine."<br />".'Colour:'.$color."<br />".'Sediment:'.$sediment."<br />".'Specific Gravity:'.$surine."<br />".'pH:'.$purine."<br />".'Protien:'.$prurine."<br />".'Glucose:'.$gurine."<br />".
'Ketone:'.$kurine."<br />".'Bilirubin:'.$burine."<br />".'Urobilinogen:'.$uurine."<br />".'Blood:'.$blurine
."<br />".'WBC:'.$wurine."<br />".'RBC:'.$rurine."<br />".'Epitheial Cell:'.$eurine."<br />".'Cast:'.$curine
."<br />".'Crystal:'.$crurine."<br />".'Bacteria:'.$burine."<br />".'Yeast Cell:'.$yurine."<br />".'Other:'.$ourine."<br />".'Comment:'.$comment;

$rr_1='Appearance:'.$aurine."<br />".'Colour:'.$color."<br />".'Sediment:'.$sedi_v."<br />".'Specific Gravity:'.$surine."<br />".'pH:'.$purine."<br />".'Protien:'.$prurine."<br />".'Glucose:'.$gurine."<br />".
'Ketone:'.$kurine."<br />".'Bilirubin:'.$burine."<br />".'Urobilinogen:'.$uurine."<br />".'Blood:'.$blurine
."<br />".'WBC:'.$wurine."<br />".'RBC:'.$rurine."<br />".'Epitheial Cell:'.$eurine."<br />".'Cast:'.$curine
."<br />".'Crystal:'.$crurine."<br />".'Bacteria:'.$burine."<br />".'Yeast Cell:'.$yurine."<br />".'Other:'.$ourine."<br />".'Comment:'.$comment;

$rr1='Appearance:'.$aurine."<br />".'Colour:'.$color."<br />".'Sediment:'.$sediment."<br />".'Specific Gravity:'.$surine."<br />".'pH:'.$purine."<br />".'Protien:'.$prurine."<br />".'Glucose:'.$gurine."<br />".
'Ketone:'.$kurine."<br />".'Bilirubin:'.$burine."<br />".'Urobilinogen:'.$uurine."<br />".'Blood:'.$blurine
."<br />".'WBC:'.$wurine."<br />".'RBC:'.$rurine."<br />".'Epitheial Cell:'.$eurine."<br /><br />".'Cast:'.$curine
."<br /><br />".'Hyaline Cast:'.$hyaline_c."<br />".'Granular Cast:'.$granular_c."<br />".'WBC Cast:'.$wbc."<br />".'RBC Cast:'.$rbc."<br /><br />".'Crystal:'.$crurine."<br />".'Bacteria:'.$burine."<br />".'Yeast Cell:'.$yurine."<br />".'Other:'.$ourine."<br />".'Comment:'.$comment;

$rr1_1='Appearance:'.$aurine."<br />".'Colour:'.$color."<br />".'Sediment:'.$sedi_v."<br />".'Specific Gravity:'.$surine."<br />".'pH:'.$purine."<br />".'Protien:'.$prurine."<br />".'Glucose:'.$gurine."<br />".
'Ketone:'.$kurine."<br />".'Bilirubin:'.$burine."<br />".'Urobilinogen:'.$uurine."<br />".'Blood:'.$blurine
."<br />".'WBC:'.$wurine."<br />".'RBC:'.$rurine."<br />".'Epitheial Cell:'.$eurine."<br /><br />".'Cast:'.$curine
."<br /><br />".'Hyaline Cast:'.$hyaline_c."<br />".'Granular Cast:'.$granular_c."<br />".'WBC Cast:'.$wbc."<br />".'RBC Cast:'.$rbc."<br /><br />".'Crystal:'.$crurine."<br />".'Bacteria:'.$burine."<br />".'Yeast Cell:'.$yurine."<br />".'Other:'.$ourine."<br />".'Comment:'.$comment;

$rr2='Appearance:'.$aurine."<br />".'Colour:'.$color."<br />".'Sediment:'.$sediment."<br />".'Specific Gravity:'.$surine."<br />".'pH:'.$purine."<br />".'Protien:'.$prurine."<br />".'Glucose:'.$gurine."<br />".
'Ketone:'.$kurine."<br />".'Bilirubin:'.$burine."<br />".'Urobilinogen:'.$uurine."<br />".'Blood:'.$blurine
."<br />".'WBC:'.$wurine."<br />".'RBC:'.$rurine."<br />".'Epitheial Cell:'.$eurine."<br />".'Cast:'.$curine
."<br /><br />".'Crystal:'.$crurine."<br />".'Calcium Oxalate:'.$cal_ox."<br />".'Uice Acid:'.$uric_acid."<br />".'Triple Phosphate:'.$triple_phosphate."<br />".'Others:'.$c_others."<br /><br />".'Bacteria:'.$burine."<br />".'Yeast Cell:'.$yurine."<br />".'Other:'.$ourine."<br />".'Comment:'.$comment;

$rr2_2='Appearance:'.$aurine."<br />".'Colour:'.$color."<br />".'Sediment:'.$sedi_v."<br />".'Specific Gravity:'.$surine."<br />".'pH:'.$purine."<br />".'Protien:'.$prurine."<br />".'Glucose:'.$gurine."<br />".
'Ketone:'.$kurine."<br />".'Bilirubin:'.$burine."<br />".'Urobilinogen:'.$uurine."<br />".'Blood:'.$blurine
."<br />".'WBC:'.$wurine."<br />".'RBC:'.$rurine."<br />".'Epitheial Cell:'.$eurine."<br />".'Cast:'.$curine
."<br /><br />".'Crystal:'.$crurine."<br />".'Calcium Oxalate:'.$cal_ox."<br />".'Uice Acid:'.$uric_acid."<br />".'Triple Phosphate:'.$triple_phosphate."<br />".'Others:'.$c_others."<br /><br />".'Bacteria:'.$burine."<br />".'Yeast Cell:'.$yurine."<br />".'Other:'.$ourine."<br />".'Comment:'.$comment;

$rr3='Appearance:'.$aurine."<br />".'Colour:'.$color."<br />".'Sediment:'.$sediment."<br />".'Specific Gravity:'.$surine."<br />".'pH:'.$purine."<br />".'Protien:'.$prurine."<br />".'Glucose:'.$gurine."<br />".
'Ketone:'.$kurine."<br />".'Bilirubin:'.$burine."<br />".'Urobilinogen:'.$uurine."<br />".'Blood:'.$blurine
."<br />".'WBC:'.$wurine."<br />".'RBC:'.$rurine."<br />".'Epitheial Cell:'.$eurine."<br /><br />".'Cast:'.$curine
."<br />".'Hyaline Cast:'.$hyaline_c."<br />".'Granular Cast:'.$granular_c."<br />".'WBC Cast:'.$wbc."<br />".'RBC Cast:'.$rbc."<br /><br />".'Crystal:'.$crurine."<br />".'Calcium Oxalate:'.$cal_ox."<br />".'Uice Acid:'.$uric_acid."<br />".'Triple Phosphate:'.$triple_phosphate."<br />".'Others:'.$c_others."<br /><br />".'Bacteria:'.$burine."<br />".'Yeast Cell:'.$yurine."<br />".'Other:'.$ourine."<br />".'Comment:'.$comment;

$rr3_3='Appearance:'.$aurine."<br />".'Colour:'.$color."<br />".'Sediment:'.$sedi_v."<br />".'Specific Gravity:'.$surine."<br />".'pH:'.$purine."<br />".'Protien:'.$prurine."<br />".'Glucose:'.$gurine."<br />".
'Ketone:'.$kurine."<br />".'Bilirubin:'.$burine."<br />".'Urobilinogen:'.$uurine."<br />".'Blood:'.$blurine
."<br />".'WBC:'.$wurine."<br />".'RBC:'.$rurine."<br />".'Epitheial Cell:'.$eurine."<br /><br />".'Cast:'.$curine
."<br />".'Hyaline Cast:'.$hyaline_c."<br />".'Granular Cast:'.$granular_c."<br />".'WBC Cast:'.$wbc."<br />".'RBC Cast:'.$rbc."<br /><br />".'Crystal:'.$crurine."<br />".'Calcium Oxalate:'.$cal_ox."<br />".'Uice Acid:'.$uric_acid."<br />".'Triple Phosphate:'.$triple_phosphate."<br />".'Others:'.$c_others."<br /><br />".'Bacteria:'.$burine."<br />".'Yeast Cell:'.$yurine."<br />".'Other:'.$ourine."<br />".'Comment:'.$comment;


$ins_query1="update urine set `aurine`='$aurine',`surine`='$surine',`purine`='$purine',`prurine`='$prurine',`gurine`='$gurine',`kurine`='$kurine',
`burine`='$burine',`uurine`='$uurine',`blurine`='$blurine',`wurine`='$wurine',`eurine`='$eurine',`curine`='$curine',`crurine`='$crurine',`baurine`='$baurine',`yurine`='$yurine',`ourine`='$ourine',`eby`='$user',`etime`='$adate',`rurine`='$rurine',
`rbc`='$rbc',`wbc`='$wbc',`hyaline_c`='$hyaline_c',`granular_c`='$granular_c',`cal_ox`='$cal_ox',`uric_acid`='$uric_acid',`triple_phosphate`='$triple_phosphate',`c_others`='$c_others',`comment`='$comment',`color`='$color',sediment='$sediment',sedi_v='$sedi_v' where sno='$sno'";
mysqli_query($con,$ins_query1) or die(mysql_error());


if($curine=='Negative' and $crurine=='Negative' and $sediment=='Absent'){
  $update="update iinves set resultstatus='Updated By Technologist',resulttime='$adate',resultby='$user',result='$rr' where id='$id'";
  mysqli_query($con,$update) or die(mysql_error());
  }
  
  else if($curine=='Negative' and $crurine=='Negative' and $sediment=='Present'){
    $update="update iinves set resultstatus='Updated By Technologist',resulttime='$adate',resultby='$user',result='$rr_1' where id='$id'";
    mysqli_query($con,$update) or die(mysql_error());
    }
  
  else if($curine=='Positive' and $crurine=='Negative' and $sediment=='Absent'){
    $update="update iinves set resultstatus='Updated By Technologist',resulttime='$adate',resultby='$user',result='$rr1' where id='$id'";
    mysqli_query($con,$update) or die(mysql_error());
    }
  
    else if($curine=='Positive' and $crurine=='Negative' and $sediment=='Present'){
      $update="update iinves set resultstatus='Updated By Technologist',resulttime='$adate',resultby='$user',result='$rr1_1' where id='$id'";
      mysqli_query($con,$update) or die(mysql_error());
      }
  
    else if($curine=='Positive' and $crurine=='Positive' and $sediment=='Absent'){
      $update="update iinves set resultstatus='Updated By Technologist',resulttime='$adate',resultby='$user',result='$rr3' where id='$id'";
      mysqli_query($con,$update) or die(mysql_error());
      }
  
  
      else if($curine=='Positive' and $crurine=='Positive' and $sediment=='Present'){
        $update="update iinves set resultstatus='Updated By Technologist',resulttime='$adate',resultby='$user',result='$rr3_3' where id='$id'";
        mysqli_query($con,$update) or die(mysql_error());
        }
    
      else if($curine=='Negative' and $crurine=='Positive' and $sediment=='Absent'){
        $update="update iinves set resultstatus='Updated By Technologist',resulttime='$adate',resultby='$user',result='$rr2' where id='$id'";
        mysqli_query($con,$update) or die(mysql_error());
        }
  
        else if($curine=='Negative' and $crurine=='Positive' and $sediment=='Present'){
          $update="update iinves set resultstatus='Updated By Technologist',resulttime='$adate',resultby='$user',result='$rr2_2' where id='$id'";
          mysqli_query($con,$update) or die(mysql_error());
          }
  
  
  

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
      <input name="aurine" type="text" size="70" " value="<?php echo $data1['aurine'];?>"required>


      <label for="age"><strong>Colour, Urine:</strong></label>
      <input name="color" type="text" size="70" style="text-transform:uppercase" value="<?php echo $data1['color'];?>"required>

      <label for="age"><strong>Sediment, Urine:</strong></label>
      


      
      <select  id="pmrn3" onkeyup="GetDetail(this.value)" name="sediment" required>
      <option value='<?php echo $data1['sediment'];?>'><?php echo $data1['sediment'];?></option>
      <option value='Absent'>Absent</option>
                <option value='Present'>Present</option>
                
    </select>
    
          <label for="age" id="sedi_v" hidden><strong style="color:red; font:weight:bold;">Sediment Value:</strong></label>
          <input name="sedi_v" type="text" size="70" value="" id="sedi_v1" hidden>
	  <label for="age"><strong>Specific Gravity, Urine:</strong></label>
      <input name="surine" type="text" size="70"  value="<?php echo $data1['surine'];?>"required>
	  <label for="age"><strong>pH, Urine:</strong></label>
      <input name="purine" type="text" size="70" value="<?php echo $data1['purine'];?>"required>
	  <label for="age"><strong>Protein, Urine:</strong></label>
      <input name="prurine" type="text" size="70"  value="<?php echo $data1['prurine'];?>"required>
	  <label for="age"><strong>Glucose, Urine:</strong></label>
      <input name="gurine" type="text" size="70"  value="<?php echo $data1['gurine'];?>"required>
	  <label for="age"><strong>Ketone, Urine:</strong></label>
      <input name="kurine" type="text" size="70"  value="<?php echo $data1['kurine'];?>"required>
	  <label for="age"><strong>Bilirubin Screen, Urine:</strong></label>
      <input name="burine" type="text" size="70"  value="<?php echo $data1['burine'];?>"required>
	  <label for="age"><strong>Urobilinogen, Urine:</strong></label>
      <input name="uurine" type="text" size="70"  value="<?php echo $data1['uurine'];?>"required>
	  
	  <label for="age"><strong>Blood, Urine:</strong></label>
      <input name="blurine" type="text" size="70"  value="<?php echo $data1['blurine'];?>"required>
	  <label for="age"><strong>Microscopic Examination, Urine:</strong></label>
	  <label for="age"><strong>WBC, Urine:</strong></label>
      <input name="wurine" type="text" size="70"  value="<?php echo $data1['wurine'];?>"required>
	  <label for="age"><strong>RBC, Urine:</strong></label>
      <input name="rurine" type="text" size="70"  value="<?php echo $data1['rurine'];?>"required>
	  <label for="age"><strong>Epithelial Cell, Urine:</strong></label>
      <input name="eurine" type="text" size="70"  value="<?php echo $data1['eurine'];?>"required>
	  

      <label for="age"><strong>Cast, Urine:</strong></label>
      <select  id="pmrn" onkeyup="GetDetail(this.value)" name="curine" required>
      <option value='<?php echo $data1['curine'];?>'><?php echo $data1['curine'];?></option>
  <option value='Negative'>Negative</option>
            <option value='Positive'>Positive</option>
            
</select>

      <label for="age" id="cast4" ><strong style="color:red; font:weight:bold;">Hyaline Cast:</strong></label>
      <input name="hyaline_c" type="text" size="70" value="<?php echo $data1['hyaline_c'];?>" id="hyaline_c"  >

      <label for="age" id="cast3" ><strong style="color:red; font:weight:bold;">Granular Cast:</strong></label>
      <input name="granular_c" type="text" size="70" value="<?php echo $data1['granular_c'];?>" id="granular_c" >

      <label for="age" id="cast2" ><strong style="color:red; font:weight:bold;">WBC Cast:</strong></label>
      <input name="wbc_c" type="text" size="70" value="<?php echo $data1['wbc'];?>" id="wbc" >

      <label for="age" id="cast1" ><strong style="color:red; font:weight:bold;">RBC Cast:</strong></label>
      <input name="rbc_c" type="text" size="70" value="<?php echo $data1['rbc'];?>" id="rbc" >


	  <label for="age"><strong>Crystal, Urine:</strong></label>
      


      <select  id="pmrn1" onkeyup="GetDetail(this.value)" name="crurine" required>
      <option value='<?php echo $data1['crurine'];?>'><?php echo $data1['crurine'];?></option>
      <option value='Negative'>Negative</option>
            <option value='Positive'>Positive</option>
            
</select>

      <label for="age" id="crystal1" ><strong style="color:red; font:weight:bold;">Calcium Oxalate:</strong></label>
      <input name="cal_ox" type="text" size="70"  value="<?php echo $data1['cal_ox'];?>" id="cal_ox" >

      <label for="age" id="crystal2" ><strong style="color:red; font:weight:bold;">Uric Acid:</strong></label>
      <input name="uric_acid" type="text" size="70"  value="<?php echo $data1['uric_acid'];?>" id="uric_acid" >

      <label for="age" id="crystal3" ><strong style="color:red; font:weight:bold;">Triple Phosphate:</strong></label>
      <input name="triple_phosphate" type="text" size="70"  value="<?php echo $data1['triple_phosphate'];?>" id="triple_phosphate" >

      <label for="age" id="crystal4" ><strong style="color:red; font:weight:bold;">Others:</strong></label>
      <input name="c_others" type="text" size="70"  value="<?php echo $data1['c_others'];?>" id="c_others" >




	  <label for="age"><strong>Bacteria, Urine:</strong></label>
      <input name="baurine" type="text" size="70"  value="<?php echo $data1['baurine'];?>"required>
	  <label for="age"><strong>Yeast, Urine:</strong></label>
      <input name="yurine" type="text" size="70"  value="<?php echo $data1['yurine'];?>"required>
	  <label for="age"><strong>Others, Urine:</strong></label>
      <input name="ourine" type="text" size="70"  value="<?php echo $data1['ourine'];?>"required>
	  
	  
      <label for="age"><strong>Comments:</strong></label>
      <input name="comment" type="text" size="70" value="<?php echo $data1['comment'];?>"required>
	  
	  
	  
	  
	  
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
<script>
$(document).ready(function(){
  $('#pmrn').change(function() {
    if( $(this).val() == 'Positive') {
        $('#rbc').prop( "disabled", false );
        $('#wbc').prop( "disabled", false );
        $('#hyaline_c').prop( "disabled", false );
        $('#granular_c').prop( "disabled", false );
        $('#cast1').prop( "disabled", false );
        $('#cast2').prop( "disabled", false );
        $('#cast3').prop( "disabled", false );
        $('#cast4').prop( "disabled", false );
		$('#rbc').show();
    $('#wbc').show();
    $('#hyaline_c').show();
    $('#granular_c').show();
    $('#cast1').show();
    $('#cast2').show();
    $('#cast3').show();
    $('#cast4').show();
    } else {       
        
      $('#rbc').hide();
    $('#wbc').hide();
    $('#hyaline_c').hide();
    $('#granular_c').hide();
    $('#cast1').hide();
    $('#cast2').hide();
    $('#cast3').hide();
    $('#cast4').hide();
		
    }
});
});
</script>


<script>
$(document).ready(function(){
  $('#pmrn1').change(function() {
    if( $(this).val() == 'Positive') {
        $('#cal_ox').prop( "disabled", false );
        $('#uric_acid').prop( "disabled", false );
        $('#triple_phosphate').prop( "disabled", false );
        $('#c_others').prop( "disabled", false );
        $('#crystal1').prop( "disabled", false );
        $('#crystal2').prop( "disabled", false );
        $('#crystal3').prop( "disabled", false );
        $('#crystal4').prop( "disabled", false );
		$('#cal_ox').show();
    $('#uric_acid').show();
    $('#triple_phosphate').show();
    $('#c_others').show();
    $('#crystal1').show();
    $('#crystal2').show();
    $('#crystal3').show();
    $('#crystal4').show();
    } else {       
        
      $('#cal_ox').hide();
    $('#uric_acid').hide();
    $('#triple_phosphate').hide();
    $('#c_others').hide();
    $('#crystal1').hide();
    $('#crystal2').hide();
    $('#crystal3').hide();
    $('#crystal4').hide();
		
    }
});
});
</script>
<script>
$(document).ready(function(){
  $('#pmrn3').change(function() {
    if( $(this).val() == 'Present') {
        $('#sedi_v').prop( "disabled", false );
        $('#sedi_v1').prop( "disabled", false );
        
		$('#sedi_v').show();
    $('#sedi_v1').show();
    
    } else {       
        
      $('#sedi_v').hide();
    $('#sedi_v1').hide();
    
    }
});
});
</script>