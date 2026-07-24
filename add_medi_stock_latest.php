<?php
include_once 'dbconfig.php';
?>

<?php 
    session_start();
    $role = $_SESSION['sess_userrole'];
    if(!isset($_SESSION['sess_username']) || $role!="pharmacy"){
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
//$id=$_REQUEST['id'];

//include("auth.php");
//echo $count1;

$runningTime = date('dmisi');
  
?>


<?php
/*
Author: Javed Ur Rehman
Website: https://www.allphptricks.com/
*/
 
require('db1.php');

if(isset($_POST['Submit']))
{

$code = $_REQUEST['code'];
$g_name = $_REQUEST['g_name'];
$b_name = $_REQUEST['b_name'];
$add_qty=$_REQUEST['add_qty'];

$exdate=date('Y-m-d',strtotime($_REQUEST["exdate"]));
$u_price=$_REQUEST['u_price'];
$t_price=$_REQUEST['u_price']*$_REQUEST['add_qty'];
$batch_no=$_REQUEST['batch_no'];
$rfid=$_REQUEST['rfid'];
$remarks=$_REQUEST['remarks'];
$location=$_REQUEST['location'];
$perlevel=$_REQUEST['perlevel'];

$adate= date('d/m/Y H:i:s');

$adate1= date('m/d/Y');
$ittime1= date('Y-m-d H:i:s');


$sel95="SELECT COUNT(id) FROM medi_stock WHERE `code`='$code' and location='Pharmacy' and add_qty>0;";
$result95 = mysqli_query($con,$sel95);
$b_chk=mysqli_fetch_assoc($result95);
$count_qty=$b_chk['COUNT(id)'];


$sel95w="SELECT COUNT(id),add_qty,id,given_qty FROM medi_stock WHERE `code`='$code' and location='Pharmacy' and batch_no='$batch_no' and add_qty>0;";
$result95w = mysqli_query($con,$sel95w);
$b_chkw=mysqli_fetch_assoc($result95w);
$count_qtyw=$b_chkw['COUNT(id)'];



$new_qty=$b_chkw['add_qty'] + $add_qty;
$new_given=$b_chkw['given_qty'] + $add_qty;
//$ins_query2="update medicine set `tqty`='$total_qty', `location`='$location', `perlevel`='$perlevel' where code='$code'";
//mysqli_query($con,$ins_query2) or die(mysql_error());

if($count_qty>=7 and $count_qtyw<=0)
	
	{
		
		echo '<script language="javascript">';
    echo 'alert("Cannot Add More Than Two Batch"); ';
    echo '</script>';
		
	}
	
	
	


//$ins_query2="update medicine set `tqty`='$total_qty', `location`='$location', `perlevel`='$perlevel' where code='$code'";
//mysqli_query($con,$ins_query2) or die(mysql_error());

else if($count_qty<=7 and $count_qtyw<=0)
	
	{
		
		$ins_query1="insert into medi_stock (`code`,`g_name`,`b_name`,`add_qty`,`given_qty`,`exdate`,`u_price`,`t_price`,`batch_no`,`rfid`,`remarks`,`add_by`,`add_time`,`location`,`location1`)
 values ('$code','$g_name','$b_name','$add_qty','$add_qty','$exdate','$u_price','$t_price','$batch_no','$rfid','$remarks','$user','$ittime1','Pharmacy','$location')";
mysqli_query($con,$ins_query1) or die(mysql_error());





//header("Location: add_medi_stock");
header("Location: medi_bar?g_name=$g_name&rfid=$rfid");

		
	}
	
	
	else if($count_qty<=7 and $count_qtyw>0)
	
	{
		
		$ins_query1="update medi_stock set `code`='$code',`g_name`='$g_name',`b_name`='$b_name',`add_qty`='$new_qty',`given_qty`='$new_given',`exdate`='$exdate',`u_price`='$u_price',`t_price`='$t_price',`rfid`='$rfid',`remarks`='$remarks',`add_by`='$user',`add_time`='ittime1' where batch_no='$batch_no' and add_qty>0";
mysqli_query($con,$ins_query1) or die(mysql_error());





//header("Location: add_medi_stock");
header("Location: medi_bar?g_name=$g_name&rfid=$rfid");

		
	}

	
	
//if ($con->query($ins_query) == TRUE) 
//{

   
 

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
		<h1>Medicine Top Up Panel</h1>


        <fieldset>

			<legend></legend>
            <!-- Name Input -->
			
	  <label for="age"><strong>Code:</strong></label>
      <input type="text" id="pmrn" onkeyup="GetDetail(this.value)" class="form-control action" list="categoryname" autocomplete="off" name='code' required style="font-weight: bold;font-size:22px;color:green">

    <datalist id="categoryname">
	<option value=''>-Select-</option>
				
				<?php
            require('db1.php');
            $uname = '';
            $query = "select * from `medicine` where status='Active'";
            $result = mysqli_query($con, $query);
            while($row = mysqli_fetch_array($result)) {
        ?>
            <option value="<?php echo $row['code']; ?>"><?php echo $row['mname']; ?></option>
        <?php } ?>
        
    </datalist>

<label for="age"><strong>Generic Name:</strong></label>							
	
	<tr>
	  <td colspan="6" align="center"><textarea name="g_name" id="code" class="form-control action" cols="30" rows="5"style="font-weight: bold;font-size:22px;color:green"readonly required>


</textarea>

</td>
	</tr>
	
<label for="age"><strong>Brand Name:</strong></label>						
						
						 
						
		<tr>				
						<td colspan="3"><input type="text" name="b_name" id="brand" required value="" readonly style="font-weight: bold;font-size:22px;color:green"></td>
		</tr>

		<label for="age"><strong>Store Location:</strong></label>						
						
						 
						
		<tr>				
						<td colspan="3"><input type="text" name="location" id="location" required value="" style="font-weight: bold;font-size:22px;color:green"></td>
		</tr>

		
<label for="age"><strong>Available In Stock:</strong></label>								
<tr>
<td colspan="3" ><input type="text" name="uprice" id="tqty" required value="" readonly style="font-weight: bold;font-size:22px;color:green"></td>

<label for="age"><strong>Add New Quantity:</strong></label>	
<td colspan="3" ><input type="text" name="add_qty" id="" required value="" style="font-weight: bold;font-size:22px;color:green"></td>

	</tr>					
						
						<label for="age"><strong>Unit Price:</strong></label>
						<tr>
						<td colspan="3" ><input type="text" name="u_price" id="uprice" required value="" style="font-weight: bold;font-size:22px;color:green"></td>
	  </tr>
	  
	   <tr>
	  	 <label for="age"><strong>Batch No:</strong></label>
      
	  
	  
	  <input type="text" class="form-control action" list="categoryname1" autocomplete="off" name='batch_no' required style="font-weight: bold;font-size:22px;color:green">

    <datalist id="categoryname1">
	<option value=''>-Select-</option>
				
				<?php
            require('db1.php');
            $uname = '';
            $query = "select * from `medi_stock` where location='Pharmacy' and add_qty>0";
            $result = mysqli_query($con, $query);
            while($row = mysqli_fetch_array($result)) {
        ?>
            <option value="<?php echo $row['batch_no']; ?>"><?php echo $row['batch_no']; ?></option>
        <?php } ?>
        
    </datalist>
	  
	  
	      </tr>  
		  
		  <tr>
	  	 <label for="age"><strong>RFID / BARCODE:</strong></label>
      <input name="rfid" type="text" size="70" style="text-transform:uppercase" value="<?php echo $runningTime;?>"required readonly>
	      </tr>  
	  
	  <tr>
	  <label for="age"><strong>Expire Date :</strong></label>
      <input type="date" name="exdate" id="datepicker1" placeholder="Select Date" size="15" required>
	  <tr>
	  
	  <tr>
	  <label for="age"><strong>Per Level :</strong></label>
      <input name="perlevel" id="perlevel" type="text" size="70" style="text-transform:uppercase" value="<?php echo $perlevel;?>"required readonly>
	  <tr>
	  
	  
	  	 <label for="age"><strong>Remarks:</strong></label>
      <input name="remarks" type="text" size="70" style="text-transform:uppercase" value=""required>
	      </tr>  
  </fieldset>

<?php
/*
Author: Javed Ur Rehman
Website: https://www.allphptricks.com/
*/
//include("auth.php"); 


  
?>

<table><tr><td colspan="15">		<button type="submit" name="Submit">Add</button></td>
</table>

</form>
  


</body>

<script>

		// onkeyup event will occur when the user
		// release the key and calls the function
		// assigned to this event
		function GetDetail(str) {
			if (str.length == 0) {
				document.getElementById("tqty").value = "";

				document.getElementById("brand").value = "";
				document.getElementById("code").value = "";
				document.getElementById("uprice").value = "";
				document.getElementById("location").value = "";
				document.getElementById("perlevel").value = "";
				
				//document.getElementById("pp").value = "";
				
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
							("tqty").value = myObj[0];
						
						// Assign the value received to
						// last name input field
//						document.getElementById(
	//						"page").value = myObj[1];
							
							document.getElementById(
							"uprice").value = myObj[1];
							
							
							
							document.getElementById(
							"code").value = myObj[2];
							
							document.getElementById(
							"brand").value = myObj[3];
							
														document.getElementById(
							"location").value = myObj[4];
							
							document.getElementById(
							"perlevel").value = myObj[5];
							
							//document.getElementById(
							//"pp").value = myObj[3];
							
							//document.getElementById(
							//"qty").value = 0;
							if(myObj[0]>0){
							document.getElementById('tqty').style.color = "green";}
else {
							document.getElementById('tqty').style.color = "red";}							

					}
				};

				// xhttp.open("GET", "filename", true);
				xmlhttp.open("GET", "stock_medi.php?pmrn=" + str, true);
				
				// Sends the request to the server
				xmlhttp.send();
			}
		}
	</script>  
</html>
