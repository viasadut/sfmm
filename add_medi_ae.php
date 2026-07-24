<?php
include_once 'dbconfig.php';
?>

<?php 
    session_start();
    $role = $_SESSION['sess_userrole'];
    if(!isset($_SESSION['sess_username']) || $role!="emergency"){
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

$runningTime = date('Ydmsi');
  
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

$location=$_REQUEST['location'];


$adate= date('d/m/Y H:i:s');

$adate1= date('m/d/Y');
$ittime1= date('Y-m-d H:i:s');

if($location=='5th Floor' || $location=='Female Ward' || $location=='Male Ward' || $location=='HMD')
	
	{

$ins_query1="insert into medi_stock (`code`,`g_name`,`b_name`,`add_qty`,`exdate`,`u_price`,`t_price`,`batch_no`,`rfid`,`remarks`,`add_by`,`add_time`,`location`,`location1`)
 values ('$code','$g_name','$b_name','$add_qty','$exdate','$u_price','$t_price','$batch_no','$rfid','$remarks','$user','$ittime1','IPD','$location')";
mysqli_query($con,$ins_query1) or die(mysql_error());




header("Location: medi_bar?g_name=$g_name&rfid=$rfid");

	}
	
	else
		
	{

$ins_query1="insert into medi_stock (`code`,`g_name`,`b_name`,`add_qty`,`exdate`,`u_price`,`t_price`,`batch_no`,`rfid`,`remarks`,`add_by`,`add_time`,`location`,`location1`)
 values ('$code','$g_name','$b_name','$add_qty','$exdate','$u_price','$t_price','$batch_no','$rfid','$remarks','$user','$ittime1','$location','$location')";
mysqli_query($con,$ins_query1) or die(mysql_error());




header("Location: medi_bar?g_name=$g_name&rfid=$rfid");

	}

/*$ins_query1="update medicine set mname='$mname', brand1='$bname', brand2='$cname', pre='$form', 
pcat='$cat', etime='$adate',eby='$user',frequency='$frequency',frelation='$frelation',pcategory='$pcategory',duration='$duration',contrain='$contrain',meffect='$meffect',uprice='$uprice' where id='$id'";
mysqli_query($con,$ins_query1) or die(mysql_error());*/


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
						<td colspan="3"><input type="text" name="b_name" id="brand" required value=""  style="font-weight: bold;font-size:22px;color:green"></td>
		</tr>

		<label for="age"><strong>Store Location:</strong></label>						
						
						 
						
		<tr>				
						<td colspan="3">
						
						
						<select name="location" required>
					 
					 <option value="">-Select-</option>
					 <option value="AE">AE</option>
					
					 
					 </select>
						
						
						</td>
		</tr>

		


<label for="age"><strong>Add New Quantity:</strong></label>	
<td colspan="3" ><input type="text" name="add_qty" id="" required value="" style="font-weight: bold;font-size:22px;color:green"></td>

	</tr>					
						
						<label for="age"><strong>Unit Price:</strong></label>
						<tr>
						<td colspan="3" ><input type="text" name="u_price" id="uprice" required value="" style="font-weight: bold;font-size:22px;color:green"></td>
	  </tr>
	  
	   <tr>
	  	 <label for="age"><strong>Batch No:</strong></label>
      <input name="batch_no" type="text" size="70" style="text-transform:uppercase" value=""required>
	      </tr>  
		  
		  <tr>
	  	 <label for="age"><strong>RFID / BARCODE:</strong></label>
      <input name="rfid" type="text" size="70" style="text-transform:uppercase" value="<?php echo $runningTime;?>"required readonly>
	      </tr>  
	  
	  <tr>
	  <label for="age"><strong>Expire Date :</strong></label>
      <input type="date" name="exdate" id="datepicker1" placeholder="Select Date" size="15">
	  <tr>
	  
	 
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
						
						
						// Assign the value received to
						// last name input field
//						document.getElementById(
	//						"page").value = myObj[1];
							
							document.getElementById(
							"uprice").value = myObj[0];
							
							
							
							document.getElementById(
							"code").value = myObj[1];
							
							document.getElementById(
							"brand").value = myObj[2];
							
														document.getElementById(
							"location").value = myObj[3];
							
							
							
							//document.getElementById(
							//"pp").value = myObj[3];
							
							//document.getElementById(
							//"qty").value = 0;
							}

				};

				// xhttp.open("GET", "filename", true);
				xmlhttp.open("GET", "stock_ipd.php?pmrn=" + str, true);
				
				// Sends the request to the server
				xmlhttp.send();
			}
		}
	</script>  
</html>
