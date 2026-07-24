<?php
include_once 'dbconfig.php';
?>

<?php 
    session_start();
    require('db1.php');
	$role = $_SESSION['sess_userrole'];
	
$queryc = "SELECT COUNT(utype) FROM user where '$role' in ('store','staff','ot','nurse','imo','mofficer','emergency','mng')"; 
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

$user=$_SESSION["sess_username"];
$cname=$_REQUEST["cname"];




$query139 = "SELECT * FROM user where uname= '$user'"; 
	 
$result139 = mysqli_query($con, $query139) or die(mysqli_error());

// Print out result
$row139 = mysqli_fetch_array($result139);
$fname=$row139['fullname'];

//include("auth.php");
//echo $count1;



$sum_qry = "SELECT SUM(mrole) FROM sur_count1 where cname= '$cname' and status='Active'"; 
	 
$sum_result = mysqli_query($con, $sum_qry) or die(mysqli_error());

// Print out result
$sum_row = mysqli_fetch_array($sum_result);
$sum_qty=$sum_row['SUM(cname)'];

  
?>


<?php
/*
Author: Javed Ur Rehman
Website: https://www.allphptricks.com/
*/
 
require('db1.php');

if(isset($_POST['Submit']))
{


//$cname = $_REQUEST['cname'];
$mname = $_REQUEST['mname'];
$mrole = $_REQUEST['mrole'];

$start=date('Y-m-d',strtotime($_REQUEST["stdate"]));
$end=date('Y-m-d',strtotime($_REQUEST["endate"]));
//$bname = $_REQUEST['bname'];
//$cname=$_REQUEST['cname'];
//$form=$_REQUEST['form'];
//$cat=$_REQUEST['cat'];
//$adate=$_REQUEST['adate'];

//$padd=$_REQUEST['padd'];

$adate1= date('d/m/Y H:i:s');

$adate= date('Y-m-d');


$query1390 = "SELECT * FROM user where uname= '$mname'"; 
	 
$result1390 = mysqli_query($con, $query1390) or die(mysqli_error());

// Print out result
$row1390 = mysqli_fetch_array($result1390);
$fname6=$row1390['fullname'];




$sel90="SELECT * FROM sur_count1 WHERE `cname`='$cname' and uid='$mname'and status='Active';";
$result90 = mysqli_query($con,$sel90);
if($res90=mysqli_num_rows($result90)>0)
{
echo '<script language="javascript">';
    echo 'alert("Member is Already Listed in The Set !!"); ';

    echo '</script>';
	
	//header("Refresh: .1; URL=$url");
}




else{

$ins_query1="insert into sur_count1 (`cname`,`mname`,`mrole`,`adate`,`adate1`,`aby`,`status`,`uid`,`sdate`,`edate`) values ('$cname','$fname6','$mrole','$adate','$adate1','$user','Active','$mname','$start','$end')";
mysqli_query($con,$ins_query1) or die(mysql_error());


//if ($con->query($ins_query) == TRUE) 
//{

    /*echo '<script language="javascript">';
    echo 'alert("Entry Successful"); ';
    echo '</script>';*/
} 
$url = "surgery_instrument1.php?cname=$cname";

header("Refresh: .1; URL=$url");
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
		<h1>ADD Instrument</h1>


        <fieldset>

			<legend></legend>
            <!-- Name Input -->
			
	  
	  <label for="age"><strong>Instrument Set Name :</strong></label>
      
	  
	  <input list="browsers111" name="cname"  size="80"  value="<?php echo $cname;?>" style="text-transform:uppercase"required autocomplete='off' readonly>
  <datalist id="browsers111">

						
				 </datalist>
	  
	  	 
	  <label for="age"><strong>Instrument Name :</strong></label>
	  
	  
	  <input list="browsers1114" name="mname"  size="80"  style="text-transform:uppercase"required autocomplete='off'>
  <datalist id="browsers1114">

						<option value=''>-Select Member</option>
						
				<?php 
			$sql = "select * from `asset_new` where estatus='Active' and etype='Instrument' and c_loc='OT'";
			$res = mysqli_query($con, $sql);
			if(mysqli_num_rows($res) > 0) {
				while($row = mysqli_fetch_object($res)) {
					echo "<option value='".$row->ename." "."'>".$row->ename."</option>";
				}
			}
			
			
			?>

			</datalist>
			
			<label for="age"><strong>Qty :</strong></label>
			
			<input type="number" name="mrole"  size="80"  style="text-transform:uppercase"required autocomplete='off'>
  
	        
  </fieldset>

 
<?php
/*
Author: Javed Ur Rehman
Website: https://www.allphptricks.com/
*/
//include("auth.php"); 


  
?>

<table><tr><td colspan="15">		<button type="submit" name="Submit">ADD</button></td>
</table>

</form>
  

<table width="100%" height ="100%" border="1" align="center" bgcolor="#FFFF99" style="border-collapse:collapse;">

    <tr>
      <th width="4%"><strong>S.No</strong></th>
	  
      <th width="17%"><strong>Instrument Name</strong></th>
      <th width="10%"><strong>Qty</strong></th>
      
	  
	  <th width="14%"><strong>Remove</strong>
	  
	  
      
	   </tr>
  </thead>
  <tbody>
  
  
  <?php
	
	
		
	
	
$user=$_SESSION["sess_username"];
$date= date('m/d/Y');
$count1=1;
$sel_query="Select * from sur_count1 where cname='$cname' and status='Active' order by mrole asc";
//$start=$row["aadate"];


echo "<font color=green font size=5> Total Instrument is -";
echo   $sum_row['SUM(mrole)'];



$row1 = mysqli_query($con,$sel_query);
while($row = mysqli_fetch_assoc($row1)) { ?>
      <td align="center"><?php echo $count1; ?></td>
      
      <td align="center"><?php echo $row["uid"]; ?></a></td>
	  <td align="center"><?php echo $row["mrole"]; ?></a></td>
	  
	  	  <td align="center" ><a onclick="return confirm_click();" href="cremove_ins?id=<?php echo $row["id"]; ?>&cname=<?php echo $row["cname"]; ?>">Remove</a></td>

	  
      </tr>
    <?php $count1++; } ?>

</body>

</html>
