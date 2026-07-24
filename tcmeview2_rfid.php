<?php 
    session_start();
    require('db1.php');
	$role = $_SESSION['sess_userrole'];
	
	$queryc = "SELECT COUNT(utype) FROM user where '$role' in ('attn','staff')"; 
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
$odate=date('m/d/Y');
$user=$_SESSION["sess_username"];




$query139 = "SELECT * FROM user where uname= '$user'"; 
	 
$result139 = mysqli_query($con, $query139) or die(mysqli_error());

// Print out result
$row139 = mysqli_fetch_array($result139);
$fname=$row139['fullname'];

//include("auth.php");
$cdate=date('Y-m-d');
$id=$_REQUEST['id'];
$ctopic=$_REQUEST['topic'];
$db = mysqli_connect('localhost','root','Godiloveu16');
mysqli_select_db($db,'sfmmkpjnew');
$query4 = mysqli_query($db,"select * from cme where id='$id'");
$data59 = mysqli_fetch_assoc($query4);

$date=$data59['date'];

$attn=$data59['attn'];

$cdate1=date('d/m/Y',strtotime($date));
$cat=$data59['category'];  
?>


<?php
/*
Author: Javed Ur Rehman
Website: https://www.allphptricks.com/
*/
 
require('db1.php');

if(isset($_POST['Submit'])){
	$ccat = $data59['category'];
	$ctopic = $data59['topic'];
	$cdate = $data59['date'];
	$cvenue = $data59['venue'];
	$ctime = $data59['time'];

	//$odate = date('m/d/Y H:i:s');
	$uname = $_REQUEST['uname'];
	$rfid_card = $_REQUEST['rfid_card'];
	$etime=date('m/d/Y H:i:s');




	$sel90="SELECT * FROM user WHERE `uname`='$uname';";
	$result90 = mysqli_query($con,$sel90);

	$sel92="SELECT * FROM cmea WHERE `sid`='$uname' and ctopic='$ctopic' and cdate='$cdate';";
	$result92 = mysqli_query($con,$sel92);



	$db = mysqli_connect('localhost','root','Godiloveu16');
	mysqli_select_db($db,'sfmmkpjnew');
	$query60 = mysqli_query($db,"select * from staff1 where sid='$uname'");
	$data60 = mysqli_fetch_assoc($query60);

	$mname=$data60['mname'];
	$sd=$data60['sdepartment'];

	$attn1=$data59['attn'].','.$mname;

	/*if($res90=mysqli_num_rows($result90)==0){
		echo '<script language="javascript">';
		echo 'alert("Unsuccessful !!! Username is Incorrect.. Pls Try Again"); ';
		echo '</script>';
		header("Refresh: .1;");
	}
	
	if($res92=mysqli_num_rows($result92)==1){
		echo '<script language="javascript">';
		echo 'alert("Unsuccessful !!! Your attendance is already Given "); ';
		echo '</script>';
		header("Refresh: .1;");
	}
		
	else {
		$ins_query="insert into cmea (`sid`,`ctopic`,`cdate`,`ctime`,`cvenue`,`etime`,`ccat`,`mname`,`sdepartment`) values ( '$uname','$ctopic','$cdate','$ctime','$cvenue','$etime','$ccat','$mname','$sd')";
		mysqli_query($con,$ins_query) or die(mysql_error());

		$update33="update cme set `attn`='$attn1' where `id`='$id'";
		mysqli_query($con,$update33) or die("Problem in Update CME");

		

		
		//header("Refresh: .1;");
	}
	*/
	$update33="UPDATE `user` SET `rfid_card`='$rfid_card' WHERE `uname`='$uname'";
		mysqli_query($con,$update33) or die("Problem in Update CME");
		
		echo '<script language="javascript">';
		echo 'alert("Successful !!!"); ';
		echo '</script>';
}
?>



<!DOCTYPE html>
<html lang="en" >

<head>
  <meta charset="UTF-8">
  <title>Sign Up Form</title>
  
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/normalize/5.0.0/normalize.min.css">

  
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

button {
  padding: 19px 39px 18px 39px;
  color: #FFF;
  background-color: #FA8072		;
  /*#4bc970*/
  font-size: 18px;
  text-align: center;
  font-style: normal;
  border-radius: 5px;
  width: 10%;
  border: 1px solid #8265B0;
  /*#3ac162*/
  border-width: 1px 1px 3px;
  box-shadow: 0 -1px 0 rgba(255,255,255,0.1) inset;
  margin-bottom: 10px;
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

    <script src="https://cdnjs.cloudflare.com/ajax/libs/prefixfree/1.0.7/prefixfree.min.js"></script>



<link rel="stylesheet" href="https://ajax.googleapis.com/ajax/libs/jqueryui/1.11.4/themes/smoothness/jquery-ui.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.11.4/jquery-ui.min.js"></script>
  
 <script type="text/javascript">
	jQuery(function() {		
		var date = new Date();
		var currentMonth = date.getMonth();
		var currentDate = date.getDate();
		var currentYear = date.getFullYear();
		
		$('#datepicker').datepicker({
			minDate: new Date(currentYear, currentMonth, currentDate),
			maxDate: new Date(currentYear, currentMonth, currentDate+6)
		});
	});
</script>




  <style type="text/css">

  </style>
  
  <head>
    <title>PHP - Dynamically Add or Remove input fields using JQuery</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />  
    <script src="//ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>

    <link href="https://code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css" rel="stylesheet" />
    <link href="./jquery.multiselect.css" rel="stylesheet" />
    <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
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
		

<form action="" method="post">
<h2 align="center"style="background-color:lightblue;"><strong>Todays Topic : " <?php echo $data59["topic"]; ?> "<strong> <br><br>  Key Note Speaker -   <?php echo $data59["speaker"]; ?> 
<br><br>Date & Time -  <?php echo $cdate1; ?> & <?php echo $data59["time"]; ?><br><br>Venue -  <?php echo $data59["venue"]; ?></h2>

<!-- Form Title -->
         <table align="center" class="table table-bordered" id="dynamic_field">  
		
				

<tr><td colspan="20" align="center"bgcolor="lightgreen"><h4><label><strong>CME ATTENDANCE FORM</strong></label><h4></td> </tr>
<tr bgcolor="#F08080">

<td colspan="10" align="center"><h4><label><strong>User ID</strong></label><h4></td> 

<td colspan="8" align="center"><h4><label><strong>ID Card</strong></label><h4></td>

</tr>

<tr>

<td colspan="10" align="center"bgcolor="lightblue">
	<input list="browsers111" name="uname"  size="100" required autocomplete='off' type='text'>
	<datalist id="browsers111">
		<option value=""></option>
		<?php
			$sel_query1="SELECT * FROM `user`  ORDER BY `uname` ASC ";
			$resultid = mysqli_query($con,$sel_query1);
			while($rowid = mysqli_fetch_assoc($resultid)){
		?>
		<option value="<?php echo $rowid['uname'] ?>"><?php echo $rowid['uname'] ?> - <?php echo $rowid['fullname'] ?></option>
		<?php
			}
		?>
	</datalist>
</td>

<td colspan="8" align="center"bgcolor="lightblue"><input type="text" name="rfid_card" required value="" /></td>

<tr><td colspan="20" align="right">		<button type="submit" name="Submit">Confirm</button></td>		        

</table>
<table align="center" class="table table-bordered" id="dynamic_field">  


<tr><td colspan="20" align="center"bgcolor="lightblue"><h2><label><strong>CONFIRMED ATTENDANCE LIST</strong></label><h2></td> </tr>
<tr bgcolor="#F08080">
      <td colspan="1" align="center"><strong>S.No</strong></td>
      <td colspan="1" align="center"><strong>Staff Name</strong></td>
	  <td colspan="1" align="center"><strong>Username</strong></td>
	  <td colspan="1" align="center"><strong>Department</strong></td>
      <td colspan="2" align="center"><strong>Topic</strong></td>
      <td colspan="1" align="center"><strong>Date</strong></td>
      <td colspan="4" align="center"><strong>Time</strong></td>
      <td colspan="2" align="center"><strong>Venue</strong></td>   
      <td colspan="3" align="center"><strong>Attendance Time</strong></td>
	  
		  

	   </tr>
 <?php
	
$user=$_SESSION["sess_username"];
$date6=date('Y-m-d');
$count=1;
$sel_query="Select * from cmea where ccat= '$cat' and cdate='$date6' order by `id` DESC;";

$result = mysqli_query($con,$sel_query);

while($row = mysqli_fetch_assoc($result)) 
{ ?>    <tr>

      <td align="center" colspan="1"><?php echo $count; ?></td>
	  
	  
	  <?php
	  $s9=$row['sid'];
$a9 = "SELECT * FROM user where uname= '$s9'"; 
	 
$r9 = mysqli_query($con, $a9) or die(mysqli_error());

// Print out result
$r9 = mysqli_fetch_array($r9);
$f9=$r9['fullname'];
	  
	  
	  ?>
     <td align="center"colspan="1"><?php echo $f9; ?></td>
	  <td align="center"colspan="1"><?php echo $row["sid"]; ?></td>
	 <td align="center"colspan="1"><?php echo $row["sdepartment"]; ?></td>
       <td align="center"colspan="2"><?php echo $row["ctopic"]; ?></td>
	  
	  <td align="center"colspan="1"><?php echo date('d/m/Y',strtotime($row["cdate"])); ?></td>
  <td align="center"colspan="4"><?php echo $row["ctime"]; ?></td>  
	  <td align="center"colspan="2"><?php echo $row["cvenue"]; ?></td>	  
	  <td align="center"colspan="3"><?php echo $row["etime"]; ?></td>
	        
    
	  	  
 
  
      </tr>
    <?php $count++; } ?>
</table>
</form>
</body>

</html>
