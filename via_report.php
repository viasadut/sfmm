<?php
include_once 'dbconfig.php';
?>

<?php 
    session_start();
    $role = $_SESSION['sess_userrole'];
    if(!isset($_SESSION['sess_username']) || $role!="opdpro"){
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

$pmrn = $_REQUEST['pmrn'];
$id = $_REQUEST['id'];


$query139 = "SELECT * FROM user where uname= '$user'"; 
	 
$result139 = mysqli_query($con, $query139) or die(mysqli_error());

// Print out result
$row139 = mysqli_fetch_array($result139);
$fname=$row139['fullname'];


$query = "SELECT * FROM alltest where id= '$id'"; 
	 
$result = mysqli_query($con, $query) or die(mysqli_error());

// Print out result
$row = mysqli_fetch_array($result);
$eid=$row['eid'];

$date=date('Y-m-d');

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


$cname = $_REQUEST['cname'];
$cdescription = $_REQUEST['cdescription'];

$one = $_REQUEST['one'];
$two = $_REQUEST['two'];
$three = $_REQUEST['three'];
$four = $_REQUEST['four'];
$five = $_REQUEST['five'];
$result = $_REQUEST['result'];



$adate= date('d/m/Y H:i:s');

$adate1= date('m/d/Y');

$servername = "localhost";
$username = "root";
$password = "Godiloveu16";
$dbname = "sfmmkpjnew";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}
if($user!=''){

$sql = "insert into via_test (one,two,three,four,five,report,pmrn,eid,sno,date,done_by) values ('$one','$two','$three','$four','$five','$result','$pmrn','$eid','$id','$date','$user')";

if ($conn->query($sql) === TRUE) {
  $last_id = $conn->insert_id;

  
  $ins_query1="update alltest set status='DONE',rstatus='DONE' where id='$id'";
mysqli_query($con,$ins_query1) or die(mysql_error());


header("Location: via_test_print.php?id=$last_id");
}




//if ($con->query($ins_query) == TRUE) 
//{

    echo '<script language="javascript">';
    echo 'alert("Entry Successful"); ';
    echo '</script>';
}

}
?>

<!DOCTYPE html>
<html lang="en" >

<head>
  <meta charset="UTF-8">
  <title>VIA_TEST</title>
   <link rel="icon" href=
"pms_logo_new1.png"
        type="image/x-icon" />
  
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



input[type="checkbox"] {
  margin: 0 4px 8px 0;
}

input[type="radio"] {
    width: 30px;
    height: 30px;
    accent-color: #0d6efd; /* Bootstrap blue */
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
<script src="prescription/prescription/ckeditor/ckeditor.js"></script>
<script src="prescription/prescription/ckeditor/samples/js/sample.js"></script>
</head>

<body>

<div id='cssmenu'>
<ul>
   <li><a href='pharmacy_home'><span>Home</span></a></li>
   
         <li class='has-sub'><a href='prescription/prescription/view3new'><span>OPD Prescription</span></a>
            
         </li>
         <li class='has-sub'><a href='prescription/prescription/con1'><span>Outpatient Stats</span></a>
            
         </li>
	
    
   
   <li class='last'><a href='prescription/prescription/docchangepass'><span>Change Password</span></a></li>
   
	
	 <li class='last'><a href='logout'><span>LOGOUT</span></a></li>
   
</ul>
</div>


<!-- Google Font -->
		<link href='jsnew/fonts' rel='stylesheet' type='text/css'>

<form action="" method="post">

<!-- Form Title -->
		<h1>VIA TEST REPORT FORM</h1>


        <fieldset>

	  
	  <label for="age" style="font-size:28px;"><strong>সাধারণ সমস্যা :</strong></label>
<br />
<br />
<label for="age" style="font-size:20px;"> ১ । স্বামী সহবাসের পর রক্ত স্রাব &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
    <input type="radio" name="one" value="হ্যাঁ"<?php if($row3['cpatient']=="YES"){ echo "checked";}?>> হ্যাঁ &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type="radio" name="one" value="না"<?php if($row3['cpatient']=="NO"){ echo "checked";}?>> না &nbsp;&nbsp;
</label>
	  <br /><br />

    <label for="age" style="font-size:20px;"> ২ । যোনীপথে স্রাব &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
    <input type="radio" name="two" value="স্বাভাবিক "<?php if($row3['cpatient']=="YES"){ echo "checked";}?>> স্বাভাবিক  &nbsp;&nbsp;<input type="radio" name="two" value="গন্ধযুক্ত"<?php if($row3['cpatient']=="NO"){ echo "checked";}?>> গন্ধযুক্ত &nbsp;&nbsp;
</label>

    <br /><br />

    <label for="age" style="font-size:20px;">  ৩ । যোনীপথে অনিয়মিত রক্তস্রাব &nbsp;&nbsp;&nbsp;
    <input type="radio" name="three" value="হ্যাঁ"<?php if($row3['cpatient']=="YES"){ echo "checked";}?>> হ্যাঁ &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type="radio" name="three" value="না"<?php if($row3['cpatient']=="NO"){ echo "checked";}?>> না &nbsp;&nbsp;
</label>
	  <br /><br />

    <label for="age" style="font-size:20px;"> ৪ । তলপেটে  ব্যথা &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
    <input type="radio" name="four" value="হ্যাঁ"<?php if($row3['cpatient']=="YES"){ echo "checked";}?>> হ্যাঁ &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type="radio" name="four" value="না"<?php if($row3['cpatient']=="NO"){ echo "checked";}?>> না &nbsp;&nbsp;
</label>

    <br /><br />

    <label for="age" style="font-size:20px;">  ৫ । অন্যান্য &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
    <input type="radio" name="five" value="হ্যাঁ"<?php if($row3['cpatient']=="YES"){ echo "checked";}?>> হ্যাঁ &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type="radio" name="five" value="না"<?php if($row3['cpatient']=="NO"){ echo "checked";}?>> না &nbsp;&nbsp;
</label>
    


    <br /><br />


    <label for="age" style="font-size:24px;">VIA পরীক্ষার ফলাফল : 
    <br />
    <br />
    <input type="radio" name="result" value="পজিটিভ"<?php if($row3['cpatient']=="YES"){ echo "checked";}?>> পজিটিভ &nbsp;&nbsp;<input type="radio" name="result" value="নেগেটিভ"<?php if($row3['cpatient']=="NO"){ echo "checked";}?>> নেগেটিভ &nbsp;&nbsp;
    </label>
    
                                    </div>
                                </div>
								 

									
     </td>



</fieldset>
<table><tr><td colspan="15">		<button type="submit" name="Submit">Add</button></td>
</table>

</form>
  


</body>

</html>
<script>

		// onkeyup event will occur when the user
		// release the key and calls the function
		// assigned to this event
		function GetDetail2(str) {
			if (str.length == 0) {
				//document.getElementById("sformat").value = "";

				document.getElementById("charge").value = "";
				//document.getElementById("porder").value = "";
				
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
						
						//document.getElementById
						//("sformat").value = myObj[0];
						
						// Assign the value received to
						// last name input field
//						document.getElementById(
	//						"page").value = myObj[1];
							
							document.getElementById(
							"cdescription").value = myObj[0];
                                  //CKEDITOR.instances["cdescription"].setData(myObj[0]);

							
							//document.getElementById(
							//"porder").value = myObj[2];
							
							
					}
				};

				// xhttp.open("GET", "filename", true);
				xmlhttp.open("GET", "prescription/prescription/other_data_b.php?pmrn=" + str, true);
				
				// Sends the request to the server
				xmlhttp.send();
			}
		}
	</script>  
