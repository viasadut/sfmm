<?php 
    session_start();
    require('db1.php');
	$role = $_SESSION['sess_userrole'];
	
	$queryc = "SELECT COUNT(utype) FROM user where '$role' in ('mng','doctor','qc','mrd','covid','call','imo','mofficer','nurse','emergency','staff','ot','endo','bill','billin','lab')"; 
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
$id=$_REQUEST['id'];
//include("auth.php");
//$pmrn=$_REQUEST['pmrn'];
$db = mysqli_connect('localhost','root','Godiloveu16');
mysqli_select_db($db,'sfmmkpjnew');
$query4 = mysqli_query($db,"select * from new_phone where id='$id'");
$data = mysqli_fetch_assoc($query4);

  

?>


<?php
/*
Author: Javed Ur Rehman
Website: https://www.allphptricks.com/
*/
 
require('db1.php');

if(isset($_POST['Submit']))
{



$pdes=$_REQUEST['pdes'];
$dept=$_REQUEST['dept'];
$phone=$_REQUEST['phone'];
$cost=$_REQUEST['cost'];
$type=$_REQUEST['type'];
$pset=$_REQUEST['pset'];
$p_res=$_REQUEST['p_res'];
$imei=$_REQUEST['imei'];
$adate= date('Y-m-d H:i:s');
//$id1=$_REQUEST['ID'];
$url = "new_phone";



//echo $datac['COUNT(id)'];
$query = "update new_phone set `dept`='$dept',`type`='$type',`phone`='$phone',`pset`='$pset',`cost`='$cost',`pdes`='$pdes',`eby`='$user',`edate`='$adate',p_res='$p_res',imei='$imei' where id='$id'"; 
$result = mysqli_query($con,$query) or die ( mysqli_error());

header("Location: $url"); 




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
  background-color: lightgreen;
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

    <script src="jsnew/pprefixfree.min.js"></script>



<link rel="stylesheet" href="jsnew/jquery-ui.css">
<script src="jsnew/jquery.min.js"></script>
<script src="jsnew/jquery-ui.min.js"></script>

  
 <script type="text/javascript">
	jQuery(function() {		
		var date = new Date();
		var currentMonth = date.getMonth();
		var currentDate = date.getDate();
		var currentYear = date.getFullYear();
		
		$('#datepicker').datepicker({
			minDate: new Date(currentMonth, currentDate,currentYear),
			maxDate: new Date(currentMonth, currentDate,currentYear)
		});
	});
</script>




  <style type="text/css">
<!--
.style1 {font-weight: bold}
-->
  </style>
  
  <head>
    <title>PHP - Dynamically Add or Remove input fields using JQuery</title>
    <link rel="stylesheet" href="jsnew/bootstrap.min.css" />  
    <script src="jsnew/jjquery.min.js"></script>
    <script src="jsnew/bootstrap.min.js"></script>

    <link href="jsnew/jquery-ui.css" rel="stylesheet" />
    <link href="./jquery.multiselect.css" rel="stylesheet" />
    <script src="jsnew/jquery-1.12.4.js"></script>
    <script src="jsnew/jquery-ui.js"></script>
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


<script>
$(document).ready(function(){
  $('#dropdown').change(function() {
    if( $(this).val() == 'NO') {
        $('#gasize').prop( "disabled", false );
		$('#gasize').hide();
		
    } else {       
        
		//$('#gasize').hide();
		$('#gasize').show();
		
		
    }
});


});
</script>

</head>
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
		<link href='jsnew/fonts' rel='stylesheet' type='text/css'>

<form action="" method="post">
<h1 align="center"style="background-color:lightgreen;">Contact Information Edit Panel</h1>

<!-- Form Title -->
        <table align="center" class="table table-bordered" id="dynamic_field">  
		<tr><td colspan="20" align="left"><label><strong>Responsible Person</strong></label></td> </tr>
						
<tr><td colspan="20">

<input list="browsers111" name="p_res"  size="157" value="<?php echo $data['p_res']?>" required>
  <datalist id="browsers111">
        
						<option value='<?php echo $data['s_res']?>'><?php echo $data['p_res']?></option>
								
						<?php 
			$sql = "Select DISTINCT sname  from staff3 where status='Active';";
			$res = mysqli_query($con, $sql);
			if(mysqli_num_rows($res) > 0) {
				while($row = mysqli_fetch_object($res)) {
					echo "<option value='".$row->sname."'>".$row->sname."</option>";
				}
			}
			?>

</datalist>
</td></tr>
				
						
											

		
						


<tr>
<td colspan="5" align="center"><label><strong>Department</strong></label></td> 



<td colspan="5" align="center"><label><strong>Phone No</strong></label></td> 

<td colspan="5" align="center"><label><strong>Type</strong></label></td>
<td colspan="5" align="center"><label><strong>Owner</strong></label></td> 


</tr>

<tr>

<td colspan="5"><select name="dept" required>
        
						<option value='<?php echo $data['dept']?>'><?php echo $data['dept']?></option>
								
						<?php 
			$sql = "Select DISTINCT dept  from staff3;";
			$res = mysqli_query($con, $sql);
			if(mysqli_num_rows($res) > 0) {
				while($row = mysqli_fetch_object($res)) {
					echo "<option value='".$row->dept."'>".$row->dept."</option>";
				}
			}
			?>
			
			<?php 
			$sql = "Select DISTINCT subdept  from staff3;";
			$res = mysqli_query($con, $sql);
			if(mysqli_num_rows($res) > 0) {
				while($row = mysqli_fetch_object($res)) {
					echo "<option value='".$row->subdept."'>".$row->subdept."</option>";
				}
			}
			?>
						
				
</select></td>  


<td colspan="5" align="center"><input type="text"  name="phone" required value="<?php echo $data["phone"];?>" required></td>

<td colspan="5"><select name="type" required>
        <option value=' <?php echo $data['type']?>'selected> <?php echo $data['type']?></option>
						<option value='PABX'>PABX</option>
						<option value='Corporate'>Corporate</option>
						<option value='Mobile'>Mobile</option>
						
								
						
				
</select></td>  









<td colspan="5"><select name="cost" required>
        <option value=' <?php echo $data['cost']?>'> <?php echo $data['cost']?></option>
						<option value='Personal'>Personal</option>
						<option value='Hospital'>Hospital</option>
						
						
								
						
				
</select></td>  

</tr> 

<tr><td colspan="5"><label><strong>Phone Set</strong></label></td>
<td colspan="15"><label><strong>Description</strong></label></td>
</tr>	
<tr><td colspan="5"><select id='dropdown' name='pset' value="" required>
  
  <option value=" <?php echo $data['pset']?>" selected> <?php echo $data['pset']?></option>
 
  
  <option value="YES">YES</option>
  <option value="NO" >NO</option>
  
</select></td>
<td colspan="15"><textarea id="gasize"  name="pdes"><?php echo $data['pdes']?></textarea></td>

<tr>

<tr><td colspan="5"><label><strong>Phone Set's IMEI NUMBER</strong></label></td>
<td colspan="15"><input type="text"  name="imei" required value="<?php echo $data["imei"];?>" ></td>
</tr>	

<tr>
		<td colspan="20"align="right"><button type="submit" name="Submit">Update</button></td>
	  
</tr>
		

		

</table>
</form>

</body>

</html>
