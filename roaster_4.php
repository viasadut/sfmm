<?php

    session_start();
    $role = $_SESSION['sess_userrole'];
    if(!isset($_SESSION['sess_username']) || $role!="mng"){
      header('Location: login2.php?err=2');
    }
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

require('db1.php');

$user=$_SESSION['sess_username'];


$id=$_REQUEST['id'];

//$dreffer=$_REQUEST['dreffer'];
//$dname1=$_REQUEST['dname1'];






$query = "SELECT * from roaster where id='$id'"; 
$result = mysqli_query($con, $query) or die ( mysqli_error());
$row_r = mysqli_fetch_assoc($result);


  
?>


<?php
 
require('db1.php');

if(isset($_POST['Submit']))
{
$pbp1 = implode(",",$_POST["pbp1"]);
$pbp1_1 = implode(",",$_POST["pbp1_1"]);
$pbp1_2 = implode(",",$_POST["pbp1_2"]);
	  $pbp2 = implode(",",$_POST["pbp2"]);
	  $pbp3 = implode(",",$_POST["pbp3"]);
	  $pbp4 = implode(",",$_POST["pbp4"]);
	  $pbp5 = implode(",",$_POST["pbp5"]);
	  $pbp6 = implode(",",$_POST["pbp6"]);
	  $pbp7 = implode(",",$_POST["pbp7"]);
/*$sel="SELECT * FROM alltest where pmrn= '$pmrn' and type='spd1' and medi='ECHO IMAGING' and status='' and date1='$datenew';"; 
$result = mysqli_query($con,$sel);

if($res3=mysqli_num_rows($result)>0)
{
 	
    echo '<script language="javascript">';
    echo 'alert("Unsuccessful !!The patient Already Have pending Echo Request"); ';
    echo '</script>';
    }

else {*/

$query = "update roaster set ln1='$pbp1',ln1_1='$pbp1_1',ln1_2='$pbp1_2',ln2='$pbp2',ln3='$pbp3',ln4='$pbp4',ln5='$pbp5',ln6='$pbp6',ln7='$pbp7' WHERE id = '$id'";  
		   mysqli_query($con,$query) or die(mysql_error());
           $message = 'Data Updated';  

		   header("Location: roaster_1");
//$update="update ecgapp set status='SEEN' where `id`='$id'";
//mysqli_query($con,$update);

}
?>
<?php 
$query39 = "SELECT * FROM radreport where pmrn= '$pmrn' and eid='$count1'"; 
	 
$result39 = mysqli_query($con, $query39) or die(mysqli_error());

// Print out result
$row39 = mysqli_fetch_array($result39);
$dname3=$row39['dname'];

?>


<!DOCTYPE html>
<html lang="en" >

<head>
  <meta charset="UTF-8">
  <title>DID REPORT</title>
  
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/normalize/5.0.0/normalize.min.css">

  
      <style>

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
  max-width: 2000px;
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
  background-color: #A085C6;
  /*#4bc970*/
  font-size: 18px;
  text-align: center;
  font-style: normal;
  border-radius: 5px;
  width: 100%;
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
    max-width: 2000px;
  }

}
      </style>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/prefixfree/1.0.7/prefixfree.min.js"></script>



<link rel="stylesheet" href="https://ajax.googleapis.com/ajax/libs/jqueryui/1.11.4/themes/smoothness/jquery-ui.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.11.4/jquery-ui.min.js"></script>
      <script src="./jquery.multiselect.js"></script>
  <script>
  $(document).ready(function() {
    $("#datepicker").datepicker();
  });
  </script>

<link rel="stylesheet" href="styles.css">

   <script src="script.js"></script>



  <style type="text/css">
<!--
.style1 {font-weight: bold}
-->
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


<link rel="stylesheet" href="styles.css">

   <script src="script.js"></script>
</head>

<body>

<div id='cssmenu'>
<ul>
   <li><a href='tesrad'><span>Home</span></a></li>
      <li><a href='radapp'><span>Appointment</span></a></li>
      
      <li class='active has-sub'><a href='#'><span>Reports</span></a>
      <ul>
         <li class='last'><a href='todayreport'><span>Today's Report</span></a></li>
		 <li class='has-sub'><a href='donereport'><span>Search Done Reports</span></a>
		 <li class='has-sub'><a href='allreport'><span>Datewise All Done Report </span></a>
            <li class='last'><a href='raddtsearch2'><span>Patients pending Report Search</span></a></li>
			<li class='last'><a href='radapp22'><span>Patients Appointment Report</span></a></li>
         </li>
		 
      </ul>
   </li>
	  <li class='last'><a href='radview1'><span>Pending Reports</span></a></li>
	  	  <li class='last'><a href='viewnewrad'><span>Search Pervious Patients</span></a></li>
		  <li class='last'><a href='rpapp22'><span>New Patients</span></a></li>
		  <li class='last'><a href='raddtsearch'><span>Patients pending request Search</span></a></li>
		  		  
      <li class='last'><a href='logout'><span>LOGOUT</span></a></li>
</ul>
</div>

<h1 align="center"><?php echo $row_r['date'];?></h1>

  <!-- Stephonce R. MOrris | 2014 -->

<!-- Google Font -->
		

<form action="" method="post" onSubmit="if(confirm('Want to proceed the submission?')){return true;}" autocomplete="on">


<!-- Form Title -->
        <table align="center" class="table table-bordered" id="dynamic_field">  
<label>Level 5A & 5B  Morning</label>  
						  <select type="text" name="pbp1[]" id="pbp1" multiple="multiple" class="3col active" required>
						<option value="<?php echo $row_r['ln1'];?>"selected><?php echo $row_r['ln1'];?></option>
                          
			<?php 
			$sql = "Select * from staff3 where dept='Nursing Services' and status='Active';";
			$res = mysqli_query($con, $sql);
			if(mysqli_num_rows($res) > 0) {
				while($row = mysqli_fetch_object($res)) {
					echo "<option value='".$row->sname."'>".$row->sname."</option>";
				}
			}
			?>
		  </select>



<label>Level 5A & 5B  Late</label>  
						  <select type="text" name="pbp1_1[]" id="pbp1" multiple="multiple" class="3col active" required>
						<option value="<?php echo $row_r['ln1_1'];?>"selected><?php echo $row_r['ln1_1'];?></option>
                          
			<?php 
			$sql = "Select * from staff3 where dept='Nursing Services' and status='Active';";
			$res = mysqli_query($con, $sql);
			if(mysqli_num_rows($res) > 0) {
				while($row = mysqli_fetch_object($res)) {
					echo "<option value='".$row->sname."'>".$row->sname."</option>";
				}
			}
			?>
		  </select>


<label>Level 5A & 5B  Night</label>  
						  <select type="text" name="pbp1_2[]" id="pbp1" multiple="multiple" class="3col active" required>
						<option value="<?php echo $row_r['ln1_2'];?>"selected><?php echo $row_r['ln1_2'];?></option>
                          
			<?php 
			$sql = "Select * from staff3 where dept='Nursing Services' and status='Active';";
			$res = mysqli_query($con, $sql);
			if(mysqli_num_rows($res) > 0) {
				while($row = mysqli_fetch_object($res)) {
					echo "<option value='".$row->sname."'>".$row->sname."</option>";
				}
			}
			?>
		  </select>
		  
		  <label>Level 5C & 5D </label>  
						  <select name="pbp2[]" id="pbp2" multiple="multiple" class="3col active" required>
						<option value="<?php echo $row_r['ln2'];?>"selected><?php echo $row_r['ln2'];?></option>  
                          
			<?php 
			$sql = "Select * from staff3 where dept='Nursing Services' and status='Active';";
			$res = mysqli_query($con, $sql);
			if(mysqli_num_rows($res) > 0) {
				while($row = mysqli_fetch_object($res)) {
					echo "<option value='".$row->sname."'>".$row->sname."</option>";
				}
			}
			?>
		  </select>
		  
		 				  
						  <label>Level 6A & 6B </label>  
						  <select name="pbp3[]" id="pbp3" multiple="multiple" class="3col active" required>
						  
                          <option value="<?php echo $row_r['ln3'];?>"selected><?php echo $row_r['ln3'];?></option>
			<?php 
			$sql = "Select * from staff3 where dept='Nursing Services' and status='Active';";
			$res = mysqli_query($con, $sql);
			if(mysqli_num_rows($res) > 0) {
				while($row = mysqli_fetch_object($res)) {
					echo "<option value='".$row->sname."'>".$row->sname."</option>";
				}
			}
			?>
		  </select>
		  
		  
		  <label>Level 6C & 6D </label>  
						  <select name="pbp4[]" id="pbp4" multiple="multiple" class="3col active" required>
						  
                          <option value="<?php echo $row_r['ln4'];?>"selected><?php echo $row_r['ln4'];?></option>
			<?php 
			$sql = "Select * from staff3 where dept='Nursing Services' and status='Active';";
			$res = mysqli_query($con, $sql);
			if(mysqli_num_rows($res) > 0) {
				while($row = mysqli_fetch_object($res)) {
					echo "<option value='".$row->sname."'>".$row->sname."</option>";
				}
			}
			?>
		  </select>
		  
		  <label>Level 7A & 7B </label>  
						  <select name="pbp5[]" id="pbp5" multiple="multiple" class="3col active" required>
						  <option value="<?php echo $row_r['ln5'];?>"selected><?php echo $row_r['ln5'];?></option>
                          
			<?php 
			$sql = "Select * from staff3 where dept='Nursing Services' and status='Active';";
			$res = mysqli_query($con, $sql);
			if(mysqli_num_rows($res) > 0) {
				while($row = mysqli_fetch_object($res)) {
					echo "<option value='".$row->sname."'>".$row->sname."</option>";
				}
			}
			?>
		  </select>
						  
						  
						  <label>ICU</label>  
						  <select name="pbp6[]" id="pbp6" multiple="multiple" class="3col active" required>
						  <option value="<?php echo $row_r['ln6'];?>"selected><?php echo $row_r['ln6'];?></option>
                          
			<?php 
			$sql = "Select * from staff3 where dept='Nursing Services' and status='Active';";
			$res = mysqli_query($con, $sql);
			if(mysqli_num_rows($res) > 0) {
				while($row = mysqli_fetch_object($res)) {
					echo "<option value='".$row->sname."'>".$row->sname."</option>";
				}
			}
			?>
		  </select>
		  
		  <label>NICU</label>  
						  <select name="pbp7[]" id="pbp7" multiple="multiple" class="3col active" required>
						 <option value="<?php echo $row_r['ln7'];?>"selected><?php echo $row_r['ln7'];?></option> 
                          
			<?php 
			$sql = "Select * from staff3 where dept='Nursing Services' and status='Active';";
			$res = mysqli_query($con, $sql);
			if(mysqli_num_rows($res) > 0) {
				while($row = mysqli_fetch_object($res)) {
					echo "<option value='".$row->sname."'>".$row->sname."</option>";
				}
			}
			?>
		  </select>
						 
							 <script>
    $(function () {
        $('select[multiple].active.3col').multiselect({
            columns: 3,
            placeholder: 'Select Nurse',
            search: true,
            searchOptions: {
                'default': ''
            },
            selectAll: true
        });

    });
</script>	   
														


<tr>
		<td colspan="10"><button type="submit" name="Submit">Confirm</button></td>

	  				
</tr>

</body>

</html>
