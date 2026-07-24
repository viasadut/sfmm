<?php
include_once 'dbconfig.php';
?>

<?php 
   session_start();
    require('db1.php');
	$role = $_SESSION['sess_userrole'];
	
	$queryc = "SELECT COUNT(utype) FROM user where '$role' in ('mng','ddf')"; 
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
$eid1=$_REQUEST['eid'];
$pmrn=$_REQUEST['pmrn'];
$id=$_REQUEST['id'];
//$pmrn=$_REQUEST['dname'];
//include("auth.php");
//echo $count1;
 
$db = mysqli_connect('localhost','root','Godiloveu16');
mysqli_select_db($db,'sfmmkpjnew');
$query4 = mysqli_query($db,"select * from patient where pmrn='$pmrn'");
$data59 = mysqli_fetch_assoc($query4);


$query444 = mysqli_query($db,"select * from preadm where id='$id'");
$data444 = mysqli_fetch_assoc($query444);



$dname=$data444['dname'];
$pname=$data444['pname'];
$pmrn=$data444['pmrn'];
$page=$data444['page'];
$padd=$data444['padd'];
$gender=$data444['gender'];
$pphone=$data444['pphone'];
$eid=$data444['eid'];
$arequest=$data444['arequest'];
$aid=$data444['aid'];


$query43 = "SELECT COUNT(pmrn) FROM inpatient where pmrn= '$pmrn' and eid='$eid1';"; 
$result43 = mysqli_query($con, $query43) or die(mysqli_error());
$row43 = mysqli_fetch_assoc($result43);
$count =$row43['COUNT(pmrn)'];
$count1 = $count+1;  
  


$query444a = mysqli_query($db,"select * from inpatient where pmrn= '$pmrn' and eid='$eid1'");
$data444a = mysqli_fetch_assoc($query444a);
$ddate=$data444a['dnew'];

  
?>


<?php
//$full = $row39['fullname'];
$querymax = "SELECT max(pvno) FROM preadm"; 
$resultmax = mysqli_query($con, $querymax) or die(mysqli_error());
$rowmax = mysqli_fetch_array($resultmax);
$max=$rowmax['max(pvno)']+1;
?>
<?php
require('db1.php');
 $fullname = $_SESSION['sess_username'];
$query39 = "SELECT * FROM user where uname= '$fullname'"; 
	 
$result39 = mysqli_query($con, $query39) or die(mysqli_error());

// Print out result
$row39 = mysqli_fetch_array($result39)
?>
<?php
$full = $row39['fullname'];

?>

<?php
/*
Author: Javed Ur Rehman
Website: https://www.allphptricks.com/
*/
 
require('db1.php');

if(isset($_POST['Submit']))
{



$date1 = date('d/m/Y H:i:s');
$ddate1 = date('m/d/Y');
//$nidcard=$_REQUEST['nidcard'];
//$bcard=$_REQUEST['bcard'];
//$vgcard=$_REQUEST['vgcard'];
//$ocard=$_REQUEST['ocard'];
//$wcard=$_REQUEST['wcard'];
//$hcard=$_REQUEST['hcard'];
//$fcard=$_REQUEST['fcard'];

$pvno=$_REQUEST['pvno'];
$pvdate=date('Y-m-d', strtotime($_REQUEST['pvdate']));

$chno=$_REQUEST['chno'];
$billno=$_REQUEST['billno'];
$aldate=date('Y-m-d', strtotime($_REQUEST['aldate']));
//$spcase=$_REQUEST['spcase'];


$update212="update preadm set pvno='$pvno',chno='$chno',pvdate='$pvdate',billno='$billno',aldate='$aldate' where `id`='$id'";
mysqli_query($con,$update212);


    echo '<script language="javascript">';
    echo 'alert("Record Successfully Updated"); ';
    echo '</script>';

	
	

}
?>

<!DOCTYPE html>
<html lang="en" >

<head>
  <meta charset="UTF-8">
  <title>Admission Form</title>
  
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
  width: 30%;
}

select1 {
  padding: 6px;
  height: 32px;
  border-radius: 2px;
  width: 20%;
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
label1 {
  background-color: lightgreen;
  color: black;
  font-weight: bold;
  padding: 4px;
  text-transform: uppercase;
  
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
  <script>
  $(document).ready(function() {
    $("#datepicker1").datepicker();
  });
  </script>

<script>
  $(document).ready(function() {
    $("#datepicker3").datepicker();
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

<!-- Google Font -->
		<link href='jsnew/fonts' rel='stylesheet' type='text/css'>

<form action="" method="post">

<!-- Form Title -->
		<h1>PATIENT'S ADMISSION </h1>


        <fieldset>
<a target='_blank' href="opdradreportmng?pmrn=<?php echo "$pmrn"; ?>"><b>Radiology Report<b></a>&nbsp;&nbsp;<a target='_blank' href="cardiolinkmng?pmrn=<?php echo "$pmrn"; ?>"><b>Cardiology Report<b></a>&nbsp;&nbsp;<a target='_blank' href="http://192.168.100.254?pmrn=<?php echo "$pmrn"; ?>"><b>Lab Report<b></a>&nbsp;&nbsp;<a target='_blank' href="surnotemng?pmrn=<?php echo "$pmrn"; ?>"><b>Surgery Note<b></a>&nbsp;&nbsp;<a target='_blank' href="endoreportinmng?pmrn=<?php echo "$pmrn"; ?>"><b>Record of Endoscopy Report<b></a>&nbsp;&nbsp;<a target='_blank' href="deathstatdetailsmng?pmrn=<?php echo "$pmrn"; ?>"><b>Patients Records<b></a></td>		</tr>
			<legend></legend>
            <!-- Name Input -->
			 <label1 for="age"><strong color="green">Patient Particulars   :</strong></label1> <br><br><br>
	  
	  <label for="age"><strong>Patient's Name :</strong></label>
      <input name="pname" type="text" size="70" value="<?php echo $data59['pname'];?>"required readonly />
 	  <label for="age"><strong>Patient's ADDRESS :</strong></label>
      <input name="padd" type="text" size="70" value="<?php echo $data59['padd'];?>"required readonly>

	  <label for="age"><strong>Patient's Details (Gender / MRN / Phone / Age) :</strong></label>
	  	<input name="psex" type="text" size="10" value="<?php echo $data59['psex'];?>"required readonly>

		
						


						<input name="pmrn" type="text" size="15" value="<?php echo $data59['pmrn'];?>" placeholder="MRN" required readonly/>
      <input name="pphone" type="text" size="13" value="<?php echo $data59['pphone'];?>" placeholder="Phone No" required>	  
	  <input name="page" type="text" size="2"value="<?php echo $data59['page'];?>" placeholder="Age" required readonly/>

	  

    <label for="age"><strong>Allocation Date:</strong></label>
<input type="text" name="aldate" id="datepicker3" placeholder="MM/DD/YYYY" size="15" value="<?php echo date('m/d/Y',strtotime($data444['aldate']));?>">


<label for="age"><strong>Payment Voucher NO :</strong></label>
<input name="pvno" type="text" size="70" value="<?php echo $max;?>"readonly  >		<b>	  


<label for="age"><strong>Payment Voucher Date:</strong></label>
<input type="text" name="pvdate" id="datepicker1" placeholder="MM/DD/YYYY" size="15" value="<?php echo date('m/d/Y',strtotime($data444['pvdate']));?>">

<label for="age"><strong>Cheque NO :</strong></label>
<input name="chno" type="text" size="70" value=""  >		<b>	 


<label for="age"><strong>Bill NO :</strong></label>
<input name="billno" type="text" size="70" value=""  >		<b>	  





<table><tr><td colspan="15">		<button type="submit" name="Submit">Confirm</button></td>
</table>

</form>
  


</body>

</html>
