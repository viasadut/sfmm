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

$colors=$_REQUEST['colors'];
$consis=$_REQUEST['consis'];
$mucus=$_REQUEST['mucus'];
$blood=$_REQUEST['blood'];
$helmin=$_REQUEST['helmin'];
$ph=$_REQUEST['ph'];
$oblood=$_REQUEST['oblood'];
$rsub=$_REQUEST['rsub'];
$ecell=$_REQUEST['ecell'];
$pcell=$_REQUEST['pcell'];
$rbc=$_REQUEST['rbc'];
$mac=$_REQUEST['mac'];
$fat=$_REQUEST['fat'];
$veg=$_REQUEST['veg'];
$starch=$_REQUEST['starch'];
$muscle=$_REQUEST['muscle'];
$yeasts=$_REQUEST['yeasts'];
$other=$_REQUEST['other'];

//$crea=$_REQUEST['crea'];

$adate= date('d/m/Y H:i:s');

$adate1= date('m/d/Y');


$rr='STOOL / FAECAL ANALYSIS (StME2):'."<br />".'Colour:'.$colors."<br />".'Consistency:'.$consis."<br />".'Mucus:'.$mucus."<br />".'Blood:'.$blood."<br />".
'Helminths:'.$helmin."<br />".'Stool For Chemical Examination:'."<br />".'PH:'.$ph."<br />".'Occult Blood:'.$oblood."<br />".'Reducing Substances:'.$rsub.
"<br />".'Stool For Microscopy Examination:'."<br />".'Epithelial Cell:'.$ecell."<br />".'Pus Cell:'.$pcell.
"<br />".'RBC:'.$rbc."<br />".'Macrophage:'.$mac."<br />".'Fat Globules:'.$fat.
"<br />".'Vegetable Cells:'.$veg."<br />".'Starch Granules:'.$starch."<br />".'Muscle Fiber:'.$muscle.
"<br />".'Yeasts:'.$yeasts."<br />".'Other:'.$other;

$rr1='STOOL / FAECAL ANALYSIS (StME2):'."<br />".'Colour:'.$colors."<br />".'Consistency:'.$consis."<br />".'Mucus:'.$mucus."<br />".'Blood:'.$blood."<br />".
'Helminths:'.$helmin."<br />".'Stool For Chemical Examination:'."<br />".'PH:'.$ph."<br />".'Occult Blood:'.$oblood."<br />".'Reducing Substances:'.$rsub.
"<br />".'Stool For Microscopy Examination:'."<br />".'Epithelial Cell:'.$ecell."<br />".'Pus Cell:'.$pcell.
"<br />".'RBC:'.$rbc."<br />".'Macrophage:'.$mac."<br />".'Fat Globules:'.$fat.
"<br />".'Vegetable Cells:'.$veg."<br />".'Starch Granules:'.$starch."<br />".'Muscle Fiber:'.$muscle.
"<br />".'Yeasts:'.$yeasts."<br />".'Other:'.$other;




$ins_query1="insert into stool (`pname`,`pmrn`,`pphone`,`psex`,`page`,`colors`,`consis`,`mucus`,`blood`,`helmin`,`ph`,
`oblood`,`rsub`,`ecell`,`pcell`,`rbc`,`mac`,`fat`,`veg`,`starch`,`muscle`,`yeasts`,`other`,`uby`,`udate`,`eid`,`iname`,`inid`,`sno`) values 
('$pname','$pmrn','$pphone','$psex','$page','$colors','$consis','$mucus','$blood','$helmin','$ph','$oblood','$rsub',
'$ecell','$pcell','$rbc','$mac','$fat','$veg','$starch','$muscle','$yeasts','$other','$user','$adate','$eid','$iname','$id','$sno')";
mysqli_query($con,$ins_query1) or die(mysql_error());

$update="update alltest set resultstatus='Updated By Technologist',resulttime='$adate',resultby='$user',result='$rr',result1='$rr1' where id='$id'";
mysqli_query($con,$update) or die(mysql_error());



$update1="update alllab set resultstatus='Updated By Technologist',result='$rr',resulttime='$rtime',resultby='$user',
r1='$colors',r2='$consis',r3='$mucus',
 r4='$blood',r5='$helmin',r6='$ph',r7='$oblood',r8='$rsub',r9='$ecell',r10='$pcell',r11='$rbc',r12='$mac',r13='$fat',r14='$veg',r15='$starch',r16='$muscle',r17='$yeasts',r18='$other',result1='$rr1' where `sno`='$sno'";
mysqli_query($con,$update1);

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
		<h1>STOOL FORM </h1>


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
      
	  <label for="age"><strong>Stool For Macroscopic Examination:</strong></label>
	  <label for="age"><strong>Colour, Stool</strong></label>
      <input name="colors" type="text" size="70" style="text-transform:uppercase" value="To Follow"required/>
	  <label for="age"><strong>Consistency, Stool</strong></label>
      <input name="consis" type="text" size="70" style="text-transform:uppercase" value="Soft Stool"required/>
	  <label for="age"><strong>Mucus, Stool</strong></label>
      <input name="mucus" type="text" size="70" style="text-transform:uppercase" value="Negative"required/>
	  <label for="age"><strong>Blood, Stool:</strong></label>
      <input name="blood" type="text" size="70" style="text-transform:uppercase" value="Negative"required/>
	  <label for="age"><strong>Helminths, Stool:</strong></label>
      <input name="helmin" type="text" size="70" style="text-transform:uppercase" value="Not Seen"required/>
	  <label for="age"><strong>Stool For Chemical Examination:</strong></label>
	  <label for="age"><strong>pH, Stool:</strong></label>
      <input name="ph" type="text" size="70" style="text-transform:uppercase" value="Not Done"required/>
	  <label for="age"><strong>Occult Blood, Stool:</strong></label>
      <input name="oblood" type="text" size="70" style="text-transform:uppercase" value="Not Done"required/>
	  <label for="age"><strong>Reducing Substances, Stool:</strong></label>
      <input name="rsub" type="text" size="70" style="text-transform:uppercase" value="Not Done"required/>
	  <label for="age"><strong>Stool For Microscopy Examination:</strong></label>
	  <label for="age"><strong>Epithelial Cell, Stool:</strong></label>
      <input name="ecell" type="text" size="70" style="text-transform:uppercase" value="Nil"required/>
	  <label for="age"><strong>Pus Cell, Stool:</strong></label>
      <input name="pcell" type="text" size="70" style="text-transform:uppercase" value="To Follow"required/>
	  <label for="age"><strong>Red Blood Cell(RBC), Stool:</strong></label>
      <input name="rbc" type="text" size="70" style="text-transform:uppercase" value="Nil"required/>
	  <label for="age"><strong>Macrophage, Stool:</strong></label>
      <input name="mac" type="text" size="70" style="text-transform:uppercase" value="Not Seen"required/>
	  <label for="age"><strong>Fat Globules, Stool:</strong></label>
      <input name="fat" type="text" size="70" style="text-transform:uppercase" value="Not Seen"required/>
	  <label for="age"><strong>Vegetable Cells, Stool:</strong></label>
      <input name="veg" type="text" size="70" style="text-transform:uppercase" value="Not Seen"required/>
	  <label for="age"><strong>Starch Granules, Stool:</strong></label>
      <input name="starch" type="text" size="70" style="text-transform:uppercase" value="Not Seen"required/>
	  <label for="age"><strong>Muscle Fibre, Stool:</strong></label>
      <input name="muscle" type="text" size="70" style="text-transform:uppercase" value="Not Seen"required/>
	  <label for="age"><strong>Yeasts, Stool:</strong></label>
      <input name="yeasts" type="text" size="70" style="text-transform:uppercase" value="Not Seen"required/>
	  <label for="age"><strong>Other, Stool:</strong></label>
      <input name="other" type="text" size="70" style="text-transform:uppercase" value="Negative"required/>
	  
	  
	  
	  
	  
	  
	  
	  
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
