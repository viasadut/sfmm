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


$loc=$_REQUEST['loc'];
//$date3=$_REQUEST['date'];

//$dreffer=$_REQUEST['dreffer'];
//$dname1=$_REQUEST['dname1'];






/*$query = "SELECT * from roaster where id='$id'"; 
$result = mysqli_query($con, $query) or die ( mysqli_error());
$row_r = mysqli_fetch_assoc($result);
$ddate=$row_r['date'];*/
$ddate1=date('d/m/Y h:i:s');
  
?>


<?php
 
require('db1.php');

if(isset($_POST['Submit']))
{
$loc=$_REQUEST['loc'];	
$pbp1 = implode(",",$_POST["pbp1"]);
$pbp1_1 = implode(",",$_POST["pbp1_1"]);
$pbp1_2 = implode(",",$_POST["pbp1_2"]);
$r_date=date('Y-m-d',strtotime($_REQUEST['r_date']));	  
/*$sel="SELECT * FROM alltest where pmrn= '$pmrn' and type='spd1' and medi='ECHO IMAGING' and status='' and date1='$datenew';"; 
$result = mysqli_query($con,$sel);

if($res3=mysqli_num_rows($result)>0)
{
 	
    echo '<script language="javascript">';
    echo 'alert("Unsuccessful !!The patient Already Have pending Echo Request"); ';
    echo '</script>';
    }

else {*/


$query = " insert into roaster_1 (`emor`,`mor`,`late`,`night`,`aby`,`location`,`dept`,`date`,`adate`) values 
('$pbp1','$pbp1','$pbp1_1','$pbp1_2','$user','$loc','Nursing','$r_date','$ddate1')";  
		   mysqli_query($con,$query) or die(mysql_error());
           $message = 'Data Updated';  

		   
//$update="update ecgapp set status='SEEN' where `id`='$id'";
//mysqli_query($con,$update);



	  
	  
$treat=explode(',',$pbp1);
$treat1=explode(',',$pbp1_1);
$treat2=explode(',',$pbp1_2);
//$treat2=explode(',',$pbp3);

foreach ($treat as $item) {
	    $item = trim($item);
		
		
		
		
$querycz = "SELECT COUNT(mor) FROM roaster_2 where date ='$r_date' and mor='$item' and emor='Morning'"; 
$resultcz = mysqli_query($con, $querycz) or die(mysqli_error());
$rowcz = mysqli_fetch_array($resultcz);
$c1z=$rowcz['COUNT(mor)'];


if($c1z>0)
      
{
 	
       
    }
		else {
		$query = " insert into roaster_2 (`emor`,`mor`,`aby`,`location`,`dept`,`date`,`adate`) values 
('Morning','$item','$user','$loc','Nursing','$r_date','$ddate1')";  
		   mysqli_query($con,$query) or die(mysql_error());
		}
}


foreach ($treat1 as $item1) {
	    $item1 = trim($item1);
		
		
		$querycz = "SELECT COUNT(mor) FROM roaster_2 where date ='$r_date' and mor='$item' and emor='Late'"; 
$resultcz = mysqli_query($con, $querycz) or die(mysqli_error());
$rowcz = mysqli_fetch_array($resultcz);
$c1z=$rowcz['COUNT(mor)'];


if($c1z>0)
      
{
 	
       
    }
		else {
		
		$query = " insert into roaster_2 (`emor`,`mor`,`aby`,`location`,`dept`,`date`,`adate`) values 
('Late','$item1','$user','$loc','Nursing','$r_date','$ddate1')";  
		   mysqli_query($con,$query) or die(mysql_error());
		}

}

foreach ($treat2 as $item2) {
	    $item2 = trim($item2);
		
		$querycz = "SELECT COUNT(mor) FROM roaster_2 where date ='$r_date' and mor='$item' and emor='Night'"; 
$resultcz = mysqli_query($con, $querycz) or die(mysqli_error());
$rowcz = mysqli_fetch_array($resultcz);
$c1z=$rowcz['COUNT(mor)'];


if($c1z>0)
      
{
 	
       
    }
		else {
		$query = " insert into roaster_2 (`emor`,`mor`,`aby`,`location`,`dept`,`date`,`adate`) values 
('Night','$item2','$user','$loc','Nursing','$r_date','$ddate1')";  
		   mysqli_query($con,$query) or die(mysql_error());
		}

}


//header("Location: roaster_11?date=$date3");

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
		

<form action="" method="post">


<!-- Form Title -->
        <table align="center" class="table table-bordered" id="dynamic_field"> 

		
		<label>Select Date</label> 
				  <input name="r_date" type="date" size="70" value="<?php 
	  
	   		if(isset($_POST['load'])==1){
				$r_date1=$_REQUEST['r_date'];
			
					echo $r_date1;
			
			}
			
			?>"required>
				  
				  <input type="text" id="pmrn" onkeyup="GetDetail(this.value)" class="form-control action" list="categoryname" autocomplete="off" name='vtype'>

    <datalist id="categoryname">
	<option value=''>-Select-</option>
				
				<?php
            require('db1.php');
            $uname = '';
            $query = "select * from `privilege` where dname='common' and status='Approved'";
            $result = mysqli_query($con, $query);
            while($row = mysqli_fetch_array($result)) {
        ?>
            <option value="<?php echo $row['pname']; ?>"><?php echo $row['pname']; ?></option>
        <?php } ?>
        <?php
            require('db1.php');
            $uname = '';
            $query = "select * from `privilege` where dname='$full' and status='Approved'";
            $result = mysqli_query($con, $query);
            while($row = mysqli_fetch_array($result)) {
        ?>
            <option value="<?php echo $row['pname']; ?>"><?php echo $row['pname']; ?></option>
        <?php } ?>
    </datalist>
	
	</td>
	
	
		
		
		
		<select type="text" name="pbp1[]" id="porder" multiple="multiple" class="form-control action" required>
	</select>	
		<label>Location</label> 
	  <select type="text" name="loc" id="loc" class="form-control" required>
						
                          
			<?php 
			$sql = "Select * from roaster_location;";
			$res = mysqli_query($con, $sql);
			if(mysqli_num_rows($res) > 0) {
				while($row = mysqli_fetch_object($res)) {
					echo "<option value='".$row->loc."'>".$row->loc."</option>";
				}
			}
			?>
			
			<option value='Off'>Off</option>    
		  </select>

<input name="load" type="submit" id="load" value="Load Staff"><br>
		
<label>Morning</label>  
						  <select type="text" name="pbp1[]" id="pbp1" multiple="multiple" class="3col active" required>
						
						
						
						
						
						
						<option value=""selected></option>
            

<?php 
	  
	   		if(isset($_POST['load'])==1){
				$loc=$_REQUEST['loc'];
			$sql = "Select * from staff3 where dept='Nursing Services' and status='Active' and c_location='$loc'";
			$res = mysqli_query($con, $sql);
			if(mysqli_num_rows($res) > 0) {
				while($row = mysqli_fetch_object($res)) {
					echo "<option value='".$row->sid."'>".$row->sname."</option>";
				}
			}
			}
			?>

		  </select>



<label>Late</label>  
						  <select type="text" name="pbp1_1[]" id="pbp1" multiple="multiple" class="3col active" required>
						<option value=""selected></option>
            

<?php 
	  
	   		if(isset($_POST['load'])==1){
				$loc=$_REQUEST['loc'];
			$sql = "Select * from staff3 where dept='Nursing Services' and status='Active' and c_location='$loc'";
			$res = mysqli_query($con, $sql);
			if(mysqli_num_rows($res) > 0) {
				while($row = mysqli_fetch_object($res)) {
					echo "<option value='".$row->sid."'>".$row->sname."</option>";
				}
			}
			}
			?>
		  </select>


<label>Night</label>  
						  <select type="text" name="pbp1_2[]" id="pbp1" multiple="multiple" class="3col active" required>
						<option value=""selected></option>
            

<?php 
	  
	   		if(isset($_POST['load'])==1){
				$loc=$_REQUEST['loc'];
			$sql = "Select * from staff3 where dept='Nursing Services' and status='Active' and c_location='$loc'";
			$res = mysqli_query($con, $sql);
			if(mysqli_num_rows($res) > 0) {
				while($row = mysqli_fetch_object($res)) {
					echo "<option value='".$row->sid."'>".$row->sname."</option>";
				}
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


<script>

		// onkeyup event will occur when the user
		// release the key and calls the function
		// assigned to this event
		function GetDetail(str) {
			if (str.length == 0) {
				document.getElementById("sformat").value = "";

				document.getElementById("charge").value = "";
				document.getElementById("porder").value = "";
				
				return;
			}
			else {

				// Creates a new XMLHttpRequest object
				var xmlhttp = new XMLHttpRequest();
				xmlhttp.onreadystatechange = function () {

					// Defines a function to be called when
					// the readyState property changes
					if (this.readyState == 4 &&
							this.status == 200) {
						
						// Typical action to be performed
						// when the document is ready
						var myObj = JSON.parse(this.responseText);

						// Returns the response data as a
						// string and store this array in
						// a variable assign the value
						// received to first name input field
						
						document.getElementById
							("sformat").value = myObj[0];
						
						// Assign the value received to
						// last name input field
//						document.getElementById(
	//						"page").value = myObj[1];
							
							document.getElementById(
							"charge").value = myObj[1];
							
							document.getElementById(
							"porder").value = myObj[2];
							
							
					}
				};

				// xhttp.open("GET", "filename", true);
				xmlhttp.open("GET", "pro_charge.php?pmrn=" + str, true);
				
				// Sends the request to the server
				xmlhttp.send();
			}
		}
	</script>  
</html>
