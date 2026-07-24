<?php 
    session_start();
    require('db1.php');
	$role = $_SESSION['sess_userrole'];
	
$queryc = "SELECT COUNT(utype) FROM user where '$role' in ('staff','nurse','doctor')"; 
$resultc = mysqli_query($con, $queryc) or die(mysqli_error());
$rowc = mysqli_fetch_array($resultc);
$c1=$rowc['COUNT(utype)'];
	
    if(!isset($_SESSION['sess_username']) || $c1==0){
      header('Location: login2?err=2');
    }
?>

<!DOCTYPE html>
<html>
<head>
<style>
table {
  width: 100%;
  border-collapse: collapse;
}

table, td, th {
  border: 1px solid black;
  padding: 5px;
}

th {text-align: left;}
</style>
</head>
<body>



<?php

$user=$_SESSION["sess_username"];
$q1 = $_GET['q'];
$q=date('Y-m-d', strtotime($q1));
//$con = mysqli_connect('localhost','root','Godiloveu16','sfmmkpjnew');
require('db1.php');

if (!$con) {
  die('Could not connect: ' . mysqli_error($con));
}

mysqli_select_db($con,"ajax_demo");
echo'
<h1>PATIENT'S APPOINTMENT </h1>

        <fieldset>

			
            <!-- Name Input -->
			
			
			<label for="name"><strong>Doctor's Name :</strong></label>
			<select class="js-example-basic-single" name="tname23" value="" id='dname' style="background-color:lightgreen;font-size:18px;font-weight:bold;color:red;width:350px" required>
			
						<option value=''>-Select-</option>
						
						<?php 
			$sql = "select * from `doctor` where status='Active'";
			$res = mysqli_query($con, $sql);
			if(mysqli_num_rows($res) > 0) {
				while($row = mysqli_fetch_object($res)) {
					echo "<option value='".$row->dname."'>".$row->dname."</option>";
				}
			}
			?>
			
			
			
			
			
						
				
</select>
							
		<script>
$(document).ready(function() {
    $('.js-example-basic-single').select2();
});
</script>

	<link rel="stylesheet"
			href=
"jsnew/chosen.min.css" />

		<!--These jQuery libraries for select2
			need to be included-->
		<script src=
"jsnew/select2.min.js">
	</script>
		<link rel="stylesheet"
			href=
"jsnew/select2.min.css" />					

			
			    
		<!-- E-mail Input -->
		
		<label for="age"><strong>MRN :</strong></label>
<input name="pmrn" id="pmrn"onkeyup="GetDetail(this.value)" type="text" placeholder="MRN" value="" style="background-color:lightgreen;font-size:18px;font-weight:bold;color:red;width:300px">
      
	  

			<label for="age"><strong>Name :</strong></label>
      &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input name="name" id="pname" type="text" value="" required readonly style="background-color:lightgreen;font-size:18px;font-weight:bold;color:red;width:300px">
 	  <label for="age"><strong>ADDRESS :</strong></label>
      <input name="padd" id="padd" type="text" size="85" value="" required readonly style="background-color:lightgreen;font-size:18px;font-weight:bold;color:red;width:330px">


<label for="age"><strong>District :</strong></label>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<select name="dis" id="dis" class="style1" placeholder="District" required style="background-color:lightgreen;font-size:18px;font-weight:bold;color:red;width:200px"> 
		
		
		<option value=""></option>

<option value='Barguna'>Barguna</option>
<option value='Barisal'>Barisal</option> 
<option value='Bhola'>Bhola</option>
<option value='Jhalokati'>Jhalokati</option> 
<option value='Patuakhali'>Patuakhali</option> 
<option value='Pirojpur'>Pirojpur</option> 
<option value='Bandarban'>Bandarban</option> 
<option value='Brahmanbaria'>Brahmanbaria</option> 
<option value='Chandpur'>Chandpur</option> 
<option value='Chittagong'>Chittagong</option> 
<option value='Comilla'>Comilla</option> 
<option value='Coxs Bazar'>Cox's Bazar</option> 
<option value='Feni'>Feni</option> 
<option value='Khagrachhari'>Khagrachhari</option> 
<option value='Lakshmipur'>Lakshmipur</option> 
<option value='Noakhali'>Noakhali</option> 
<option value='Rangamati'>Rangamati</option> 
<option value='Dhaka'>Dhaka</option> 
<option value='Faridpur'>Faridpur</option> 
<option value='Gazipur'>Gazipur</option> 
<option value='Gopalganj'>Gopalganj</option> 
<option value='Kishoreganj'>Kishoreganj</option> 
<option value='Madaripur'>Madaripur</option> 
<option value='Manikganj'>Manikganj</option> 
<option value='Munshiganj'>Munshiganj</option> 
<option value='Narayanganj'>Narayanganj</option> 
<option value='Narsingdi'>Narsingdi</option> 
<option value='Rajbari'>Rajbari</option> 
<option value='Shariatpur'>Shariatpur</option> 
<option value='Tangail'>Tangail</option> 
<option value='Bagerhat'>Bagerhat</option> 
<option value='Chuadanga'>Chuadanga</option> 
<option value='Jessore'>Jessore</option> 
<option value='Jhenaidah'>Jhenaidah</option> 
<option value='Khulna'>Khulna</option> 
<option value='Kushtia'>Kushtia</option> 
<option value='Magura'>Magura</option> 
<option value='Meherpur'>Meherpur</option> 
<option value='Narail'>Narail</option> 
<option value='Satkhira'>Satkhira</option> 
<option value='Jamalpur'>Jamalpur</option> 
<option value='Mymensingh'>Mymensingh</option> 
<option value='Netrokona'>Netrokona</option> 
<option value='Sherpur'>Sherpur</option> 
<option value='Bogra'>Bogra</option> 
<option value='Joypurhat'>Joypurhat</option> 
<option value='Naogaon'>Naogaon</option> 
<option value='Natore'>Natore</option> 
<option value='Chapai Nawabganj'>Chapai Nawabganj</option> 
<option value='Pabna'>Pabna</option> 
<option value='Rajshahi'>Rajshahi</option> 
<option value='Sirajganj'>Sirajganj</option> 
<option value='Dinajpur'>Dinajpur</option> 
<option value='Gaibandha'>Gaibandha</option> 
<option value='Kurigram'>Kurigram</option> 
<option value='Lalmonirhat'>Lalmonirhat</option> 
<option value='Nilphamari'>Nilphamari</option> 
<option value='Panchagarh'>Panchagarh</option> 
<option value='Rangpur'>Rangpur</option> 
<option value='Thakurgaon'>Thakurgaon</option> 
<option value='Habiganj'>Habiganj</option> 
<option value='Moulvibazar'>Moulvibazar</option> 
<option value='Sunamganj'>Sunamganj</option> 
<option value='Sylhet'>Sylhet</option> 

			
				
      </select>

	  <label for="age"><strong>Gender :</strong></label>
	  	
            
	  	<select name="psex" id="psex"class="style1" placeholder="Gender"  required readonly style="background-color:lightgreen;font-size:18px;font-weight:bold;color:red;width:120px"> 
		
		
		<option value=""></option>
			<option value="M">MALE</option>;
			<option value="F">FEMALE</option>;
			
				
      </select>
	  
	  
	  <label for="age"><strong>Phone Number :</strong></label>
	 <input name="pphone" type="text" id="pphone" placeholder="Phone No"value="" required readonly style="background-color:lightgreen;font-size:18px;font-weight:bold;color:red;width:200px">	  
            

  
            
	  

	  <br><br>
<label><strong>DOB(DD/MM/YYYY) :</strong></label>
<input name="dd" id="dd" type="text" maxlength="2" size="1" value=""  readonly required placeholder="DD" style="background-color:lightgreen;font-size:18px;font-weight:bold;color:red;width:60px">	/

<input name="mm" id="mm" type="text" maxlength="2" size="1" value=""  readonly required placeholder="MM" style="background-color:lightgreen;font-size:18px;font-weight:bold;color:red;width:60px"> /	

<input name="yy" id="yy" type="text" maxlength="4" size="1" value=""   readonly required placeholder="YYYY" style="background-color:lightgreen;font-size:18px;font-weight:bold;color:red;width:90px">		  
	  
	
	  
	  
	  
							 
<label for="age"><strong>Patient's Type :</strong></label>
	  	
            
	  	<select name="type" id="type"class="style1" placeholder="Patient Type"  required style="background-color:lightgreen;font-size:18px;font-weight:bold;color:red;width:100px"> 
		
		
		<option value=""></option>
			<option value="General">General</option>;
			<option value="Staff">Staff</option>;
			<option value="Staff Spouse">Staff Spouse</option>;
			<option value="Staff Children">Staff Children</option>;
			<option value="Consultant">Consultant</option>;
			<option value="VIP">VIP</option>;
			<option value="Corporate">Corporate</option>;
			
				
      </select>

	   
	
	  
      
      

			<label for="age"><strong>Covid Result :</strong></label>
	 <input name="cr" type="text" id="cr" placeholder="CR"value="" readonly style="background-color:lightgreen;font-size:18px;font-weight:bold;color:red;width:60px">	  
			
	  

<label for="mail"><strong>Appointment Date :</strong></label>

									  
									<input type="date" name="daten" onchange="showUser(this.value)"size="20" style='background-color:lightgreen;font-size:22px;font-weight:bold;color:red;width:200px' min="<?= date('Y-m-d'); ?>" max="<?= date("Y-m-d", strtotime("45 days") ); ?>">  
									  
									  
									 
									<label for="age"><strong>Available Slot :</strong></label>
			
			
			<select id="txtHint" style="background-color:lightgreen;font-size:18px;font-weight:bold;color:red;width:120px" name = 'slot[]' required multiple="true" class="country">
			
			<option value=''>-Select-</option>
			
			</select>	


			
		&nbsp;&nbsp;&nbsp;<button type="submit" name="Submit" style="background-color:#ED6572">Confirm</button>  
  </fieldset>

		

</form>';
mysqli_close($con);
?>

<script>
			$(document).ready(function () {
				//Select2
				$(".country").select2({
					maximumSelectionLength:5,
				});
				//Chosen
				/*$(".country1").chosen({
					max_selected_options: 20,
				});*/
			});
		</script>

<script>

		// onkeyup event will occur when the user
		// release the key and calls the function
		// assigned to this event
		function GetDetail(str) {
			if (str.length == 0) {
				document.getElementById("pname").value = "";

				document.getElementById("psex").value = "";
				document.getElementById("padd").value = "";
				document.getElementById("pphone").value = "";
				document.getElementById("dis").value = "";
				document.getElementById("dd").value = "";
				document.getElementById("mm").value = "";
				document.getElementById("yy").value = "";
				document.getElementById("cr").value = "";
				document.getElementById("type").value = "";
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
							("pname").value = myObj[0];
						
						// Assign the value received to
						// last name input field
//						document.getElementById(
	//						"page").value = myObj[1];
							
							document.getElementById(
							"psex").value = myObj[1];
							
							document.getElementById(
							"padd").value = myObj[2];
							
							document.getElementById(
							"pphone").value = myObj[3];
							
							document.getElementById(
							"dis").value = myObj[4];
							
							document.getElementById(
							"dd").value = myObj[5];
							
							document.getElementById(
							"mm").value = myObj[6];
							
							document.getElementById(
							"yy").value = myObj[7];
							
							document.getElementById(
							"cr").value = myObj[8];
							
							
							document.getElementById(
							"type").value = myObj[9];
						document.getElementById('type').style.color = "red";	
						document.getElementById('cr').style.color = "red";	
						document.getElementById('yy').style.color = "red";	
						document.getElementById('mm').style.color = "red";	
						document.getElementById('dd').style.color = "red";	
						document.getElementById('dis').style.color = "red";	
						document.getElementById('phone').style.color = "red";	
						document.getElementById('padd').style.color = "red";	
						document.getElementById('psex').style.color = "red";	
						document.getElementById('pname').style.color = "red";	
							
					}
				};

				// xhttp.open("GET", "filename", true);
				xmlhttp.open("GET", "gfg1_endo.php?pmrn=" + str, true);
				
				// Sends the request to the server
				xmlhttp.send();
			}
		}
	</script>  
	
	
	
	
<script>
function showUser(str) {
  if (str=="") {
    document.getElementById("txtHint").innerHTML="";
    return;
  }
  var xmlhttp=new XMLHttpRequest();
  xmlhttp.onreadystatechange=function() {
    if (this.readyState==4 && this.status==200) {
      document.getElementById("txtHint").innerHTML=this.responseText;
    }
  }
  xmlhttp.open("GET","endo_slot.php?q="+str + "&dname2=<?php echo $dname2;?>", true);
  xmlhttp.send();
}
</script>

</body>
</html>