<?php
include_once 'dbconfig.php';
?>


<?php 
    session_start();
    $role = $_SESSION['sess_userrole'];
    if(!isset($_SESSION['sess_username']) || $role!="mofficer"){
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
$pmrn=$_REQUEST['pmrn'];
$id=$_REQUEST['id'];
$eid=$_REQUEST['eid'];
$db = mysqli_connect('localhost','root','Godiloveu16');
mysqli_select_db($db,'sfmmkpjnew');
$query4 = mysqli_query($db,"select * from emergency where pmrn='$pmrn' and id='$id'");
$data = mysqli_fetch_assoc($query4);
  

$query43 = "SELECT COUNT(pmrn) FROM inpatient where pmrn= '$pmrn';"; 
$result43 = mysqli_query($con, $query43) or die(mysqli_error());
$row43 = mysqli_fetch_assoc($result43);
$count =$row43['COUNT(pmrn)'];
$count1 = $count+1;

?>


<?php
/*
Author: Javed Ur Rehman
Website: https://www.allphptricks.com/
*/
 
require('db1.php');

if(isset($_POST['Submit']))
{

$dname =$_REQUEST['dname'];
$pname = $_REQUEST['pname'];
$pmrn = $_REQUEST['pmrn'];
//$pphone=$_REQUEST['pphone'];
//$diagnosis=$_REQUEST['diagnosis'];
//$cdetails=$_REQUEST['cdetails'];
$page=$data['age'];
$padd=$data['padd'];
$psex=$data['gender'];
$pphone=$data['pphone'];
//$adate=$_REQUEST['adate'];
$btype=$_REQUEST['btype1'];
//$padd=$_REQUEST['padd'];
$bno=$_REQUEST['bno'];
//$ptemp=$_REQUEST['ptemp'];
$adate= date('m-d-Y H:i:s');


$sel="SELECT * FROM inpatient WHERE `pmrn`='$pmrn' and `discharge`='';";
$result = mysqli_query($con,$sel);


if($res=mysqli_num_rows($result)>0)
{
 	
       echo '<script language="javascript">';
    echo 'alert("Unsuccessful !!Patient Already Admitted in the system"); ';
    echo '</script>';
    }
else{


$ins_query="insert into inpatient (`adoc`,`pname`,`pmrn`,`padd`,`gender`,`age`,`adate`,`room`,`room1`,`eid`,`pphone`) values ('$dname', '$pname','$pmrn','$padd','$psex','$page','$adate','$btype','$bno','$count1','$pphone')";


$ins_query1="insert into newbed (`dname`,`pname`,`pmrn`,`adate`,`type`,`bno`,`eid`) values ('$dname', '$pname','$pmrn','$adate','$btype','$bno','$eid')";
mysqli_query($con,$ins_query1) or die(mysql_error());


$update="update bed set status='Occupied', pname='$pname', pmrn='$pmrn', dname='$dname', adate='$adate' where `bno`='$bno'";
mysqli_query($con,$update) or die(mysql_error());

$update="update emergency set discharge='transfer' where `id`='$id'";
mysqli_query($con,$update) or die(mysql_error());


$ins_query99="insert into tinpatient (`adoc`,`pname`,`pmrn`,`padd`,`gender`,`age`,`adate`,`room`,`room1`,`eid`,`pphone`) values ('$dname', '$pname','$pmrn','$padd','$psex','$page','$adate','$btype','$bno','$count1','$pphone')";
mysqli_query($con,$ins_query99);  

}

}

//if ($con->query($ins_query) == TRUE) 
//{







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
  width: 90%;
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
    max-width: 700px;
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
<!-- Google Font -->
		<link href='jsnew/fonts' rel='stylesheet' type='text/css'>

<form action="" method="post">

<!-- Form Title -->
		<h1>PATIENT'S BED TRANSFER </h1>


        <fieldset>

			<legend></legend>
            <!-- Name Input -->
			<label for="name"><strong>Select Ward :</strong></label>
			<p>
			<select name="btype1" class="country">
<option selected="">--Select Ward--</option>
<?php
	$stmt = $DB_con->prepare("SELECT distinct type FROM bed");
	$stmt->execute();
	while($row=$stmt->fetch(PDO::FETCH_ASSOC))
	{
		?>
        <option value="<?php echo $row['type']; ?>"><?php echo $row['type']; ?></option>
        <?php
	} 
?>
</select>
		
		<!-- E-mail Input -->
		
		<label for="mail"><strong>Avaiable Bed :</strong></label>
									<p>
									
									
			
					<select name="bno" class="state">
<option selected="">--Select Bed--</option>
</select>

							 
		
									  
                                      <!-- Password Input -->
									  <!-- Age Dropdown -->
                                     
	    </p>

		<label for="age"><strong>Doctor's Name :</strong></label>
      <input list="browsers1" name="dname" size="66%" class="form-control">
	  <datalist id="browsers1">

						<option value=''>-Select Investigation</option>
				<?php 
			$sql = "select * from `doctor`";
			$res = mysqli_query($con, $sql);
			if(mysqli_num_rows($res) > 0) {
				while($row = mysqli_fetch_object($res)) {
					echo "<option value='".$row->dname."'>".$row->dname."</option>";
				}
			}
			?>  </datalist>								
	  
	  <label for="age"><strong>Patient's Name & MRN:</strong></label>
      <input name="pname" type="text" size="40" value="<?php echo $data["pname"]; ?>">
      <input name="pmrn" type="text" size="17" value="<?php echo $data["pmrn"]; ?>">
	        
  </fieldset>


		<button type="submit" name="Submit">Confirm</button>

</form>
 
  

</body>

</html>
