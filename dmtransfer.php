<?php
include_once 'dbconfig.php';
?>

<?php 
    session_start();
    $role = $_SESSION['sess_userrole'];
    if(!isset($_SESSION['sess_username']) || $role!="ot"){
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

//include("auth.php");
//echo $count1;

$stime=date('h:i:s');
$sdate=date('Y-m-d');
//include("auth.php");
//$pmrn=$_REQUEST['pmrn'];
$id=$_REQUEST['id'];
//$eid=$_REQUEST['eid'];
$db = mysqli_connect('localhost','root','Godiloveu16');
mysqli_select_db($db,'sfmmkpjnew');
$query4 = mysqli_query($db,"select * from store where id='$id'");
$data = mysqli_fetch_assoc($query4);
//$oldbed=$data['room1'];

  
?>


<?php
/*
Author: Javed Ur Rehman
Website: https://www.allphptricks.com/
*/
 
require('db1.php');

if(isset($_POST['Submit']))
{


//$sendtime = $_REQUEST['sendtime'];
//$sendby = $_REQUEST['sendby'];
$sendto = $_REQUEST['sendto'];
$estatus = $_REQUEST['estatus'];
$fremarks = $_REQUEST['fremarks'];
//$bname = $_REQUEST['bname'];
//$cname=$_REQUEST['cname'];
//$form=$_REQUEST['form'];
//$cat=$_REQUEST['cat'];
//$adate=$_REQUEST['adate'];
$ename = $_REQUEST['ename'];
$eid = $_REQUEST['eid'];
$elocation = $_REQUEST['elocation'];
$etype = $_REQUEST['etype'];
$eqty = $_REQUEST['eqty'];


//$padd=$_REQUEST['padd'];

$adate= date('d/m/Y H:i:s');

$adate1= date('Y-m-d');


$query39 = "SELECT * FROM store where eid= '$eid' and elocation='$elocation'"; 
	 
$result39 = mysqli_query($con, $query39) or die(mysqli_error());

// Print out result
$row39 = mysqli_fetch_array($result39);
$seqty=$row39['eqty'];
$seqty1=$row39['eqty']-$eqty;


$query3 = "SELECT * FROM store where eid= '$eid' and elocation='$sendto'"; 
	 
$result3 = mysqli_query($con, $query3) or die(mysqli_error());

// Print out result
$row3 = mysqli_fetch_array($result3);
$seqty2=$row3['eqty'];
$seqty3=$row3['eqty']+$eqty;

$sel90="SELECT * FROM store WHERE `eid`='$eid' and elocation='$sendto';";
$result90 = mysqli_query($con,$sel90);


if($eqty>$seqty)
{
	echo '<script language="javascript">';
    echo 'alert("You dont have sufficient Quantity !!"); ';

    echo '</script>';

	
	
}





else if($res90=mysqli_num_rows($result90)>0)
{


$ins_query1="Update store set eqty='$seqty3' where eid='$eid' and elocation='$sendto'";
mysqli_query($con,$ins_query1) or die(mysql_error());


$ins_query="Update store set eqty='$seqty1' where eid='$eid' and elocation='$elocation'";
mysqli_query($con,$ins_query) or die(mysql_error());


$ins_query2="insert into storedetails (`ename`,`eid`,`elocation`,`etype`,`eqty`,`estatus`,`fremarks`,`sendtime`,`stime`,`sendto`,`sendby`) values 
('$ename','$eid','$elocation','$etype','$eqty','$estatus','$fremarks','$adate1','$stime','$sendto','$user')";
mysqli_query($con,$ins_query2) or die(mysql_error());


echo '<script language="javascript">';
    echo 'alert("Successfully Send !!"); ';

    echo '</script>';
	
	
	//header("Refresh: .1; URL=$url");
}

else{


$ins_query1="Update store set eqty='$seqty1' where eid='$eid' and elocation='$elocation'";
mysqli_query($con,$ins_query1) or die(mysql_error());


$ins_query="insert into store (`ename`,`eid`,`elocation`,`etype`,`eqty`,`estatus`,`sendby`) values 
('$ename','$eid','$sendto','$etype','$eqty','$estatus','$user')";
mysqli_query($con,$ins_query) or die(mysql_error());


$ins_query2="insert into storedetails (`ename`,`eid`,`elocation`,`etype`,`eqty`,`estatus`,`fremarks`,`sendtime`,`stime`,`sendto`,`sendby`) values 
('$ename','$eid','$elocation','$etype','$eqty','$estatus','$fremarks','$adate1','$stime','$sendto','$user')";
mysqli_query($con,$ins_query2) or die(mysql_error());


//if ($con->query($ins_query) == TRUE) 
//{

    echo '<script language="javascript">';
    echo 'alert("Send Successful"); ';
    echo '</script>';
 
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
  width: 100%;
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
		<h1>REQUSET FOR NEW GENERIC</h1>


        <fieldset>

			<legend></legend>
            <!-- Name Input -->
			
	  
	  <label for="age"><strong>Material ID :</strong></label>
	  <input  name="eid" type="text" size="70" value="<?php echo $data['eid'];?>" required  readonly>
	  
	  <label for="age"><strong>Material Name :</strong></label>
      
	  
	  <input name="ename" type="text" size="80"  style="text-transform:uppercase"value="<?php echo $data['ename'];?>" required  readonly>
  
	  
	  	 <br><br>
	  <label for="age"><strong>Material Type :</strong></label>
	 <input name="etype" type="text" size="80"  style="text-transform:uppercase"value="<?php echo $data['etype'];?>" required  readonly>
		<br><br>	
			<label for="age"><strong>Material Location :</strong></label>
	 <input name="elocation" type="text" size="80"  style="text-transform:uppercase"value="<?php echo $data['elocation'];?>" required  readonly>


		<br><br>	
			<label for="age" size="20"><strong>Quantity In Hand / Quantity Transfer:</strong></label>
			<input  name="eqty33" type="text" size="30" value="<?php echo $data['eqty'];?>"required readonly>
			
			
			
			<input  name="eqty" type="text" size="30" value=""required  />
		
<br><br>	
			<label for="age"><strong>Material Status :</strong></label>
	 <select name="estatus" value="" class="style1"required>
			        
					<option value='Active'>Active</option>
					
				
			</select>		
			
			<br><br>	
			<label for="age"><strong>Send To:</strong></label>
	 <select name="sendto" value="" class="style1"required>
			        
					
					    <option value='Store'>Store</option>
						<option value='Biomedical'>Biomedical</option>
						<option value='OT1'>OT1</option>
						<option value='OT2'>OT2</option>
						<option value='OT3'>OT3</option>
						<option value='OT4'>OT4</option>
						<option value='OT5'>OT5</option>
					
				
			</select>		
	        
  </fieldset>

 <label for="age"><strong>Description of Faultyness:</strong></label> 
<td colspan="15" align="center"> <textarea rows="5" name="fremarks" required></textarea></td>
<?php
/*
Author: Javed Ur Rehman
Website: https://www.allphptricks.com/
*/
//include("auth.php"); 


  
?>

<table><tr><td colspan="15">		<button type="submit" name="Submit">Give Feedback</button></td>
</table>

</form>
  


</body>

</html>
