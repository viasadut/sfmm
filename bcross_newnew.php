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


$datenew=date('Y-m-d');
$n1=date('Ymd').'100';


$querymax1 = "SELECT max(bagno) FROM bcross1 where udate='$datenew'"; 
$resultmax1 = mysqli_query($con, $querymax1) or die(mysqli_error());
$rowmax1 = mysqli_fetch_array($resultmax1);
$max1=$rowmax1['max(bagno)']+1;

$querymax2 = "SELECT count(bagno) FROM bcross1 where udate='$datenew'"; 
$resultmax2 = mysqli_query($con, $querymax2) or die(mysqli_error());
$rowmax2= mysqli_fetch_array($resultmax2);
$max2=$rowmax2['count(bagno)'];




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

$query6 = mysqli_query($db,"select * from patient where pmrn='$pmrn'");
$data2 = mysqli_fetch_assoc($query6);


$query5 = mysqli_query($db,"select * from pappnew where pmrn='$pmrn' and eid='$eid'");
$data1 = mysqli_fetch_assoc($query5);


$queryq = mysqli_query($db,"select * from bcross where sno='$sno'");
$dataq = mysqli_fetch_assoc($queryq);
$abo=$dataq['group1'].' '.$dataq['rhd'];

  
  $url = "bcrosscom?pmrn=$pmrn&sno=$sno&id=$id"; 
?>


<?php
/*
Author: Javed Ur Rehman
Website: https://www.allphptricks.com/
*/
 
require('db1.php');

if(isset($_POST['Submit']))
{

$bagno = $_REQUEST['bagno'];
$pname = $_REQUEST['pname'];
$pmrn = $_REQUEST['pmrn'];
$pphone=$_REQUEST['pphone'];
$page=$_REQUEST['page'];
$psex=$_REQUEST['psex'];
//$adate=$_REQUEST['adate'];

$haemo=$_REQUEST['haemo'];
$abo=$_REQUEST['abo'];
$vdrl=$_REQUEST['vdrl'];
$rhe=$_REQUEST['rhe'];
$hiv=$_REQUEST['hiv'];
$plas=$_REQUEST['plas'];
$plas1=$_REQUEST['plas1'];
$hbs=$_REQUEST['hbs'];
$hcv=$_REQUEST['hcv'];

$ppmrn=$_REQUEST['ppmrn'];

$btype=$_REQUEST['btype'];
$bqty=$_REQUEST['bqty'];



$adate= date('d/m/Y H:i:s');

$adate1= date('Y-m-d');

$edatewb=date('Y-m-d', strtotime('+35 days') );
$edateffp=date('Y-m-d', strtotime('+365 days') );
$edateplt=date('Y-m-d', strtotime('+5 days') );

$query6b = mysqli_query($db,"select * from bcross1 where bagno='$bagno'");
$data2b = mysqli_fetch_assoc($query6b);
//$bbno=$data2b['bagno'];


$rr='Haemoglobin:'.$haemo."<br />".'ABO Group:'.$abo."<br />".'Rhesus(D) Group:'.$rhe."<br />".'VDRL(RPR):'.$vdrl."<br />".'HIV I/II Antigen/Antibodies:'.$hiv."<br />".
'Plasmodium Falciparrum Ag(HRP-II P. Falciparrum):'.$plas."<br />".'Plasmodium Vivax Ag(Specific pLDH P. Vivax):'.$plas1."<br />".'HBs Antigen:'.$hbs."<br />".'Anti-HCV:'.$hcv;




$rr1='Haemoglobin:'.$haemo.' '.'g/dL'."<br />".'ABO Group:'.$abo."<br />".'Rhesus(D) Group:'.$rhe."<br />".'VDRL(RPR):'.$vdrl."<br />".'HIV I/II Antigen/Antibodies:'.$hiv."<br />".
'Plasmodium Falciparrum Ag(HRP-II P. Falciparrum):'.$plas."<br />".'Plasmodium Vivax Ag(Specific pLDH P. Vivax):'.$plas1."<br />".'HBs Antigen:'.$hbs."<br />".'Anti-HCV:'.$hcv;
if (empty($data2b) and $btype=='Whole Blood' and $vdrl=='Non-Reactive' and $rhe=='Negative' and $hiv=='Negative' and $plas=='Negative' and $plas1=='Negative' and $hbs=='Non-Reactive' and $hcv=='Non-Reactive')
{

$ins_query1="insert into bcross1 (`dname`,`dmrn`,`dphone`,`dsex`,`dage`,`hae`,`abo`,`vdrl`,`rhe`,`hiv`,`plas`,`plas1`,`hbs`,`hcv`,`uby`,`udate`,`btype`,`bqty`,`udate1`,`bagno`,`edate`,`status`,`result`,`sno`) values 
('$pname','$pmrn','$pphone','$psex','$page','$haemo','$abo','$vdrl','$rhe','$hiv','$plas','$plas1','$hbs','$hcv','$user','$adate1','$btype','$bqty','$adate','$bagno','$edatewb','available','Compatible','$sno')";
mysqli_query($con,$ins_query1) or die(mysql_error());


$update="update alltest set resultstatus='Updated By Technologist',resulttime='$adate',resultby='$user',bagno='$bagno' where id='$id'";
mysqli_query($con,$update) or die(mysql_error());

    echo '<script language="javascript">';
    echo 'alert("Update Successful"); ';
    echo '</script>';
	//$url = "bcrosscom?pmrn=$pmrn&sno=$sno"; 
	header("Location: $url"); 
}



else if (empty($data2b) and $btype=='Whole Blood' and $vdrl!='Non-Reactive' and $rhe!='Negative' and $hiv!='Negative' and $plas!='Negative' and $plas1!='Negative' and $hbs!='Non-Reactive' and $hcv!='Non-Reactive')
{

$ins_query1="insert into bcross1 (`dname`,`dmrn`,`dphone`,`dsex`,`dage`,`hae`,`abo`,`vdrl`,`rhe`,`hiv`,`plas`,`plas1`,`hbs`,`hcv`,`uby`,`udate`,`btype`,`bqty`,`udate1`,`bagno`,`edate`,`status`,`result`,`sno`) values 
('$pname','$pmrn','$pphone','$psex','$page','$haemo','$abo','$vdrl','$rhe','$hiv','$plas','$plas1','$hbs','$hcv','$user','$adate1','$btype','$bqty','$adate','$bagno','$edatewb','not available','Non Compatible','$sno')";
mysqli_query($con,$ins_query1) or die(mysql_error());




    echo '<script language="javascript">';
    echo 'alert("Update Successful"); ';
    echo '</script>';
	//$url = "bcrosscom?pmrn=$pmrn&sno=$sno"; 
	header("Location: $url"); 
}


else if (empty($data2b) and $btype=='PRBC' and $vdrl=='Non-Reactive' and $rhe=='Negative' and $hiv=='Negative' and $plas=='Negative' and $plas1=='Negative' and $hbs=='Non-Reactive' and $hcv=='Non-Reactive')
{

$ins_query1="insert into bcross1 (`dname`,`dmrn`,`dphone`,`dsex`,`dage`,`hae`,`abo`,`vdrl`,`rhe`,`hiv`,`plas`,`plas1`,`hbs`,`hcv`,`uby`,`udate`,`btype`,`bqty`,`udate1`,`bagno`,`edate`,`available`,`status`,`result`,`sno`) values 
('$pname','$pmrn','$pphone','$psex','$page','$haemo','$abo','$vdrl','$rhe','$hiv','$plas','$plas1','$hbs','$hcv','$user','$adate1','$btype','$bqty','$adate','$bagno','$edatewb','not available','available','Compatible','$sno')";
mysqli_query($con,$ins_query1) or die(mysql_error());




    echo '<script language="javascript">';
    echo 'alert("Update Successful"); ';
    echo '</script>';
	//$url = "bcrosscom?pmrn=$pmrn&sno=$sno"; 
	header("Location: $url"); 
}

else if (empty($data2b) and $btype=='PRBC' and $vdrl!='Non-Reactive' and $rhe!='Negative' and $hiv!='Negative' and $plas!='Negative' and $plas1!='Negative' and $hbs!='Non-Reactive' and $hcv!='Non-Reactive')
{

$ins_query1="insert into bcross1 (`dname`,`dmrn`,`dphone`,`dsex`,`dage`,`hae`,`abo`,`vdrl`,`rhe`,`hiv`,`plas`,`plas1`,`hbs`,`hcv`,`uby`,`udate`,`btype`,`bqty`,`udate1`,`bagno`,`edate`,`status`,`result`,`sno`) values 
('$pname','$pmrn','$pphone','$psex','$page','$haemo','$abo','$vdrl','$rhe','$hiv','$plas','$plas1','$hbs','$hcv','$user','$adate1','$btype','$bqty','$adate','$bagno','$edatewb','not available','Non Compatible','$sno')";
mysqli_query($con,$ins_query1) or die(mysql_error());




    echo '<script language="javascript">';
    echo 'alert("Update Successful"); ';
    echo '</script>';
	//$url = "bcrosscom?pmrn=$pmrn&sno=$sno"; 
	header("Location: $url"); 
}


else if (empty($data2b) and $btype=='FFP' and $vdrl=='Non-Reactive' and $rhe=='Negative' and $hiv=='Negative' and $plas=='Negative' and $plas1=='Negative' and $hbs=='Non-Reactive' and $hcv=='Non-Reactive')
{

$ins_query1="insert into bcross1 (`dname`,`dmrn`,`dphone`,`dsex`,`dage`,`hae`,`abo`,`vdrl`,`rhe`,`hiv`,`plas`,`plas1`,`hbs`,`hcv`,`uby`,`udate`,`btype`,`bqty`,`udate1`,`bagno`,`edate`,`status`,`result`,`sno`) values 
('$pname','$pmrn','$pphone','$psex','$page','$haemo','$abo','$vdrl','$rhe','$hiv','$plas','$plas1','$hbs','$hcv','$user','$adate1','$btype','$bqty','$adate','$bagno','$edateffp','available','Compatible','$sno')";
mysqli_query($con,$ins_query1) or die(mysql_error());




    echo '<script language="javascript">';
    echo 'alert("Update Successful"); ';
    echo '</script>';
	//$url = "bcrosscom?pmrn=$pmrn&sno=$sno"; 
	header("Location: $url"); 
}


else if (empty($data2b) and $btype=='FFP' and $vdrl!='Non-Reactive' and $rhe!='Negative' and $hiv!='Negative' and $plas!='Negative' and $plas1!='Negative' and $hbs!='Non-Reactive' and $hcv!='Non-Reactive')
{

$ins_query1="insert into bcross1 (`dname`,`dmrn`,`dphone`,`dsex`,`dage`,`hae`,`abo`,`vdrl`,`rhe`,`hiv`,`plas`,`plas1`,`hbs`,`hcv`,`uby`,`udate`,`btype`,`bqty`,`udate1`,`bagno`,`edate`,`status`,`result`,`sno`) values 
('$pname','$pmrn','$pphone','$psex','$page','$haemo','$abo','$vdrl','$rhe','$hiv','$plas','$plas1','$hbs','$hcv','$user','$adate1','$btype','$bqty','$adate','$bagno','$edateffp','not available','Non Compatible','$sno')";
mysqli_query($con,$ins_query1) or die(mysql_error());




    echo '<script language="javascript">';
    echo 'alert("Update Successful"); ';
    echo '</script>';
	//$url = "bcrosscom?pmrn=$pmrn&sno=$sno"; 
	header("Location: $url"); 
}



else if (empty($data2b) and $btype=='Platelet' and $vdrl=='Non-Reactive' and $rhe=='Negative' and $hiv=='Negative' and $plas=='Negative' and $plas1=='Negative' and $hbs=='Non-Reactive' and $hcv=='Non-Reactive')
{

$ins_query1="insert into bcross1 (`dname`,`dmrn`,`dphone`,`dsex`,`dage`,`hae`,`abo`,`vdrl`,`rhe`,`hiv`,`plas`,`plas1`,`hbs`,`hcv`,`uby`,`udate`,`btype`,`bqty`,`udate1`,`bagno`,`edate`,`status`,`result`,`sno`) values 
('$pname','$pmrn','$pphone','$psex','$page','$haemo','$abo','$vdrl','$rhe','$hiv','$plas','$plas1','$hbs','$hcv','$user','$adate1','$btype','$bqty','$adate','$bagno','$edateplt','available','Compatible','$sno')";
mysqli_query($con,$ins_query1) or die(mysql_error());




    echo '<script language="javascript">';
    echo 'alert("Update Successful"); ';
    echo '</script>';
	//$url = "bcrosscom?pmrn=$pmrn&sno=$sno"; 
	header("Location: $url"); 
}


else if (empty($data2b) and $btype=='Platelet' and $vdrl!='Non-Reactive' and $rhe!='Negative' and $hiv!='Negative' and $plas!='Negative' and $plas1!='Negative' and $hbs!='Non-Reactive' and $hcv!='Non-Reactive')
{

$ins_query1="insert into bcross1 (`dname`,`dmrn`,`dphone`,`dsex`,`dage`,`hae`,`abo`,`vdrl`,`rhe`,`hiv`,`plas`,`plas1`,`hbs`,`hcv`,`uby`,`udate`,`btype`,`bqty`,`udate1`,`bagno`,`edate`,`status`,`result`,`sno`) values 
('$pname','$pmrn','$pphone','$psex','$page','$haemo','$abo','$vdrl','$rhe','$hiv','$plas','$plas1','$hbs','$hcv','$user','$adate1','$btype','$bqty','$adate','$bagno','$edateplt','not available','Non Compatible','$sno')";
mysqli_query($con,$ins_query1) or die(mysql_error());




    echo '<script language="javascript">';
    echo 'alert("Update Successful"); ';
    echo '</script>';
	//$url = "bcrosscom?pmrn=$pmrn&sno=$sno"; 
	header("Location: $url"); 
}



else 
{

    echo '<script language="javascript">';
    echo 'alert("Bagno is Already in Blood Bank Stock"); ';
    echo '</script>';
	//$url = "bcrosscom?pmrn=$pmrn&sno=$sno"; 
	//header("Location: $url"); 
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
		<h1>Blood Donner Profile(BDI) FORM </h1>


        <fieldset>

			<legend></legend>
            <!-- Name Input -->
			<label for="age"><strong>Bag No:</strong></label>
			<input type="text"  name="bagno" required value="<?php if($max2=='0'){echo $n1;} else if($max2!='0'){echo $max1;}?>" readonly required></td>
			
	  <label for="age"><strong>Patient's MRN :</strong></label>
      <input name="ppmrn" type="text" size="70" style="text-transform:uppercase" value=""required>
	  
	  <label for="age"><strong>Donor's Name :</strong></label>
      <input name="pname" type="text" size="70" style="text-transform:uppercase" value="<?php echo $data['pname']?>"required/>
 	  

	  <label for="age"><strong>Donor's Details :</strong></label>
	  	
      <input name="psex" type="text" size="5"value="<?php echo $data['pgender']?>" required/>
														
						
            <input name="pmrn" type="text" size="15" value="<?php echo $data['pmrn']?>" required/>
      <input name="pphone" type="text" size="13" value="<?php echo $data2['pphone']?>"  required/>	  
	  <input name="page" type="text" size="2"value="<?php echo $data['page']?>" required/>
      
	  
	  
	  
	  <label for="age"><strong>Haemoglobin:</strong></label>
      <input name="haemo" type="text" size="70" style="text-transform:uppercase" value=""required/>
	  <label for="age"><strong>ABO Group:</strong></label>
	  
	  <select name="abo" value=''required>
<option value="">--Select--</option>
<option value="<?php echo $abo;?>"selected><?php echo $abo;?></option>
	  <option value="A POS">A POS</option>
	  <option value="B POS">B POS</option>
	  <option value="AB POS">AB POS</option>
	  <option value="O POS">O POS</option>
	  <option value="A NEG">A NEG</option>
	  <option value="B NEG">B NEG</option>
	  <option value="AB NEG">AB NEG</option>
	  <option value="O NEG">O NEG</option>

</select>


<label for="age"><strong>Component Type:</strong></label>
	  
	  <select name="btype" value=''required>
<option value="">--Select--</option>
	  <option value="Whole Blood">Whole Blood</option>
	  <option value="Packet red blood cell">Packet red blood cell</option>
	  <option value="Fresh frozen plasma">Fresh frozen plasma</option>
	  <option value="Platelet">Platelet</option>
	  

</select>

<label for="age"><strong>Component Quantity:</strong></label>
	  
	 <input name="bqty" type="text" size="13"value="" required>
	  
     
	  <label for="age"><strong>Rhesus (D) Group:</strong></label>
	  
	  <select name="rhe" value=''required>
<option value="">--Select--</option>
	  <option value="Positive">Positive</option>
<option value="Negative">Negative</option>
</select>
	  
      
	  <label for="age"><strong>VDRL (RPR):</strong></label>
      <select name="vdrl" value=''required>
<option value="">--Select--</option>
	  <option value="Reactive">Reactive</option>
<option value="Non-Reactive">Non-Reactive</option>
</select>
	  <label for="age"><strong>HIV I/II Antigen/Antibodies:</strong></label>
      <select name="hiv" value=''required>
<option value="">--Select--</option>
	  <option value="Positive">Positive</option>
<option value="Negative">Negative</option>
</select>
	  <label for="age"><strong>Plasmodium Falciparum Ag(HRP-II P. Falciparum):</strong></label>
      <select name="plas" value=''required>
<option value="">--Select--</option>
	  <option value="Positive">Positive</option>
<option value="Negative">Negative</option>
</select>
	  
	  <label for="age"><strong>Plasmodium Vivax Ag (Specefic pLDH P. Vivax):</strong></label>
      <select name="plas1" value=''required>
<option value="">--Select--</option>
	  <option value="Positive">Positive</option>
<option value="Negative">Negative</option>
</select>
	  <label for="age"><strong>HBS Antigen:</strong></label>
      <select name="hbs" value=''required>
<option value="">--Select--</option>
	  <option value="Reactive">Reactive</option>
<option value="Non-Reactive">Non-Reactive</option>
</select>
	  <label for="age"><strong>Anti-HCV:</strong></label>
	  
	 
      <select name="hcv" value=''required>
<option value="">--Select--</option>
	  <option value="Reactive">Reactive</option>
<option value="Non-Reactive">Non-Reactive</option>
</select>
	 
<br><br>

	  
	  
	  
	  
  </fieldset>

<?php
/*
Author: Javed Ur Rehman
Website: https://www.allphptricks.com/
*/
//include("auth.php"); 


  
?>

<table><tr><td colspan="15">		<button type="submit" name="Submit">Confirm</button></td>
<td align="center"><a target='_blank' href="bcrossreport1.php?pmrn=<?php echo $pmrn;?>&id=<?php echo $id; ?>&sno=<?php echo $sno; ?>"><img src="print.png" title="Print Report" width="150" height="60" /></a></td>

<td align="center"><a target='_blank' href="bcrossreport.php?pmrn=<?php echo $pmrn;?>&id=<?php echo $id; ?>&sno=<?php echo $sno; ?>"><img src="print.png" title="Print Report" width="150" height="60" /></a></td>

</form>
  


</body>

</html>
