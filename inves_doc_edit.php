<?php
include_once 'dbconfig.php';
?>

<?php 
    session_start();
    require('db1.php');
	$role = $_SESSION['sess_userrole'];
	
	$queryc = "SELECT COUNT(utype) FROM user where '$role' in ('mng','doctor')"; 
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
$id=$_REQUEST["id"];




$query139 = "SELECT * FROM inves_doc where id= '$id'"; 
	 
$result139 = mysqli_query($con, $query139) or die(mysqli_error());

// Print out result
$row_new = mysqli_fetch_array($result139);
//$fname=$row139['fullname'];

//include("auth.php");
//echo $count1;


  
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
$dname = $_REQUEST['dname'];
$inves_doc = $_REQUEST['inves_doc'];

$sdate=date('Y-m-d',strtotime($_REQUEST["sdate"]));
$edate=date('Y-m-d',strtotime($_REQUEST["edate"]));
//$bname = $_REQUEST['bname'];
//$cname=$_REQUEST['cname'];
//$form=$_REQUEST['form'];
//$cat=$_REQUEST['cat'];
//$adate=$_REQUEST['adate'];

//$padd=$_REQUEST['padd'];

$adate1= date('Y-m-d H:i:s');

$adate= date('Y-m-d');


$query1390 = "SELECT * FROM user where uname= '$inves_doc'"; 
	 
$result1390 = mysqli_query($con, $query1390) or die(mysqli_error());

// Print out result
$row1390 = mysqli_fetch_array($result1390);
$fname6=$row1390['fullname'];


$query13902 = "SELECT * FROM user where uname= '$dname'"; 
	 
$result13902 = mysqli_query($con, $query13902) or die(mysqli_error());

// Print out result
$row13902 = mysqli_fetch_array($result13902);
$fname62=$row13902['fullname'];




$ins_query1="Update inves_doc set `doc_name_full`='$fname62',`inves_dname_full`='$fname6',`sdate`='$sdate',`edate`='$edate',`status`='$status',`edit_by`='$user',`edit_time`='$adate1',`doc_name`='$dname',`inves_dname`='$inves_doc' where id='$id'";
mysqli_query($con,$ins_query1) or die(mysql_error());


//if ($con->query($ins_query) == TRUE) 
//{

    echo '<script language="javascript">';
    echo 'alert("Entry Successful"); ';
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


@media screen and (min-width: 1200px) {

  form {
    max-width: 1300px;
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
		<h1>Add Consultant in Investigation Panel</h1>


        <fieldset>

			<legend></legend>
            <!-- Name Input -->
			
	  
  
	  	 
	  <label for="age"><strong>Doctor's Name :</strong></label>
	  
	  
	  <input list="browsers1114" name="dname"  size="80"  style="text-transform:uppercase"required autocomplete='off' value='<?php echo $row_new['doc_name_full'];?>'>
  <datalist id="browsers1114">

						<option value='<?php echo $row_new['doc_name'];?>'><?php echo $row_new['doc_name'];?></option>
						
				<?php 
			$sql = "select * from `staff1` where astatus='Active' and designation!='Medical Officer'";
			$res = mysqli_query($con, $sql);
			if(mysqli_num_rows($res) > 0) {
				while($row = mysqli_fetch_object($res)) {
					echo "<option value='".$row->sid." "."'>".$row->mname."- ".$row->sdepartment."- ".$row->designation."</option>";
				}
			}
			
			
			?>

			</datalist>
			
			<label for="age"><strong>Investigator's Name:</strong></label>
			
			<input list="browsers1115" name="inves_doc"  size="80"  style="text-transform:uppercase"required autocomplete='off' value='<?php echo $row_new['inves_dname_full'];?>'>
  <datalist id="browsers1115">

						<option value='<?php echo $row_new['inves_dname'];?>'><?php echo $row_new['inves_dname'];?></option>
							<?php 
			$sql = "select * from `staff1` where astatus='Active' and designation!='Medical Officer'";
			$res = mysqli_query($con, $sql);
			if(mysqli_num_rows($res) > 0) {
				while($row = mysqli_fetch_object($res)) {
					echo "<option value='".$row->sid." "."'>".$row->mname."- ".$row->sdepartment."- ".$row->designation."</option>";
				}
			}
			
			
			?>
				 </datalist>
				 
				 <label for="age"><strong>Start :</strong></label>
				 <input type="text" name="sdate" id="datepicker1" placeholder="Select Date" size="15" value="<?php echo date('m/d/Y',strtotime($row_new['sdate']));?>"required>
				 
				 <label for="age"><strong>End:</strong></label>
				<input type="text" name="edate" id="datepicker2" placeholder="Select Date" size="15" value="<?php echo date('m/d/Y',strtotime($row_new['edate']));?>" required>  
	  	  


	  <label for="age"><strong>Status</strong></label>
	  
	  
	  
  <select id="browsers1114" name='status'>

						<option value='<?php echo $row_new['status'];?>'><?php echo $row_new['status'];?></option>
						<option value='Cancel'>Cancel</option>
						<option value='Active'>Active</option>
						
						
				

			</select>		  
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
  

</body>

</html>
