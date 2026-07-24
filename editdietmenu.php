<?php 
    session_start();
    $role = $_SESSION['sess_userrole'];
    if(!isset($_SESSION['sess_username']) || $role!="diet"){
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
$query4 = mysqli_query($db,"select * from dietchart where id='$id'");
$data = mysqli_fetch_assoc($query4);
$d11=$data['d1'];
$d12=$data['d2'];
$d13=$data['d3'];
$d14=$data['d4'];
$d15=$data['d5'];
$d16=$data['d6'];
$kcal=$data['kcal'];

  $lmenu='Morning Menu- :'.$d11."<br />".'Mid Morning Menu:'.$d12."<br />".'Lunch Menu:'.$d13."<br />".'Evening Menu:'.$d14."<br />".'Dinner Menu:'.$d15."<br />".'Supper Menu:'.$d16."<br />".'KCAL:'.$kcal;

//$eid=$_REQUEST['eid'];


?>


<?php
/*
Author: Javed Ur Rehman
Website: https://www.allphptricks.com/
*/
 
require('db1.php');

if(isset($_POST['Submit']))
{



//$user=$_REQUEST['user'];
$id=$_REQUEST['id'];
//$dname=$_REQUEST['dname'];
$d1=$_REQUEST['d1'];
$d2=$_REQUEST['d2'];
$d3=$_REQUEST['d3'];
$d4=$_REQUEST['d4'];
$d5=$_REQUEST['d5'];
$d6=$_REQUEST['d6'];
$kcal=$_REQUEST['kcal'];
$dtype=$_REQUEST['dtype'];


$tcustomer=$_REQUEST['tcustomer'];
$cserving=$_REQUEST['cserving'];
$cost=$_REQUEST['cost'];
$pcost=$_REQUEST['pcost'];
$remarks=$_REQUEST['remarks'];
$recipe=$_REQUEST['recipe'];
$sdate=date('Y-m-d H:i:s');




$dtime= date('d/m/Y H:i:s');
//$id1=$_REQUEST['ID'];
$url = "menudetailsdiet";
$query = "UPDATE dietchart set d1='$d1',d2='$d2',d3='$d3',d4='$d4',d5='$d5',d6='$d6', etime='$dtime', eby='$user', lmenu='$lmenu',kcal='$kcal',
tcustomer='$tcustomer',cserving='$cserving',cost='$cost',pcost='$pcost',remarks='$remarks',recipe='$recipe',etime='$sdate',status='Edited',dtype='$dtype',type='$type' where id='$id'"; 
$result = mysqli_query($con,$query) or die ( mysqli_error());



header("Location: $url"); 



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
<script src="ckeditor_new/ckeditor.js"></script>
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
		<link href='https://fonts.googleapis.com/css?family=Nunito:400,300' rel='stylesheet' type='text/css'>

<form action="" method="post">
<h1 align="center"style="background-color:lightgreen;"><?php echo $data["dtype"]; ?></h1>

<!-- Form Title -->
        <table align="center" class="table table-bordered" id="dynamic_field">  
		<tr><td colspan="20" align="right"><button onClick="goBack()">Back</button></td></tr>
				
												<tr>
						
						
						<td colspan="5"><label><strong>Diet Type:</strong></label></td>
						
						
						
						</tr>



					<tr>				<td colspan="5">


				
						<select name="dtype" value='' required>
						<option value='<?php echo $data["dtype"]; ?>'><?php echo $data["dtype"]; ?></option>	
						<?php 
			$sql = "select DISTINCT dtype from `dietchart`";
			$res = mysqli_query($con, $sql);
			if(mysqli_num_rows($res) > 0) {
				while($row = mysqli_fetch_object($res)) {
					echo "<option value='".$row->dtype."'>".$row->dtype."</option>";
				}
			}
			?>
						
														
						</select>



</td>
				
					 
</tr>
	

<tr>
						
						
						<td colspan="5"><label><strong>Target Customer:</strong></label></td>
						
						
						
						</tr>

<tr>				<td colspan="5">


				
						<select name="tcustomer" value='' required>
						<option value='<?php echo $data["tcustomer"]; ?>'><?php echo $data["tcustomer"]; ?></option>	
						<option value='Patient'>Patient</option>	
						<option value='All'>All</option>	
						
						
														
						</select>



</td>
				
					 
</tr>


<tr>
						
						
						<td colspan="5"><label><strong>Type:</strong></label></td>
						
						
						
						</tr>

<tr>				<td colspan="5">


				
						<select name="type" value='' required>
						<option value='<?php echo $data["type"]; ?>'><?php echo $data["type"]; ?></option>	
						<option value='Set'>Set</option>	
						<option value='add'>Additional</option>	
						
						
														
						</select>



</td>
				
					 
</tr>

					
<tr><td colspan="20" align="center"bgcolor="lightgreen"><label><strong>Recipe</strong></label></td> </tr>

<tr>

<td>
 <div>
                                           <textarea name="recipe" class="form-control" placeholder="Details"rows="40"cols="25">
										   
										   <?php echo $data["recipe"]; ?>
										   </textarea>
                                               
										 
                                    </div>
                                </div>
								
								
  
  <script>
 CKEDITOR.replace( 'recipe', {
  height: 200,
  
  
  extraPlugins : 'filebrowser',
    filebrowserBrowseUrl:'browser.php?type=Images',
    filebrowserUploadMethod:"form",
    filebrowserUploadUrl: "upload_proposal.php"
 });
</script>

</td>


</tr>					




										<tr>
						
						
						<td colspan="5"><label><strong>Content Of Serving:</strong></label></td>
						
						
						
						</tr>

<tr><td colspan="2" align="center"><input type="text"  name="cserving"  value="<?php echo $data["cserving"]; ?>" ></td></tr> 




										<tr>
						
						
						<td colspan="5"><label><strong>Cost Of Preparation:</strong></label></td>
						
						
						
						</tr>

<tr><td colspan="2" align="center"><input type="text"  name="cost"  value="<?php echo $data["cost"]; ?>" ></td></tr> 



						

										<tr>
						
						
						<td colspan="5"><label><strong>Proposed Sale Cost:</strong></label></td>
						
						
						
						</tr>

<tr><td colspan="2" align="center"><input type="text"  name="pcost"  value="<?php echo $data["pcost"]; ?>" ></td></tr> 			



										<tr>
						
						
						<td colspan="5"><label><strong>Remarks:</strong></label></td>
						
						
						
						</tr>

<tr><td colspan="2" align="center"><input type="text"  name="remarks"  value="<?php echo $data["remarks"]; ?>" ></td></tr> 			

						

						

<tr><td colspan="20" align="center"bgcolor="lightgreen"><label><strong>Morning Menu</strong></label></td> </tr>


<tr><td colspan="2" align="center"><input type="text"  name="d1"  value="<?php echo $data["d1"]; ?>" ></td>



<tr><td colspan="20" align="center"bgcolor="lightgreen"><label><strong>Mid Morning Menu</strong></label></td> </tr>


<tr><td colspan="2" align="center"><input type="text"  name="d2"  value="<?php echo $data["d2"]; ?>" ></td></tr> 





<tr><td colspan="20" align="center"bgcolor="lightgreen"><label><strong>Lunch Menu</strong></label></td> </tr>


<tr><td colspan="2" align="center"><input type="text"  name="d3"  value="<?php echo $data["d3"]; ?>" ></td></tr> 

<tr><td colspan="20" align="center"bgcolor="lightgreen"><label><strong>Evening Menu</strong></label></td> </tr>


<tr><td colspan="2" align="center"><input type="text"  name="d4"  value="<?php echo $data["d4"]; ?>" ></td></tr> 


<tr><td colspan="20" align="center"bgcolor="lightgreen"><label><strong>Dinner Menu</strong></label></td> </tr>


<tr><td colspan="2" align="center"><input type="text"  name="d5"  value="<?php echo $data["d5"]; ?>" ></td></tr> 

<tr><td colspan="20" align="center"bgcolor="lightgreen"><label><strong>Supper Menu</strong></label></td> </tr>


<tr><td colspan="2" align="center"><input type="text"  name="d6"  value="<?php echo $data["d6"]; ?>" ></td></tr> 

<tr><td colspan="20" align="center"bgcolor="lightgreen"><label><strong>KCAL</strong></label></td> </tr>


<tr><td colspan="2" align="center"><input type="text"  name="kcal"  value="<?php echo $data["kcal"]; ?>" >


<tr>
		<td colspan="20"align="right"><button type="submit" name="Submit">Update</button></td>
	  
</tr>
</table>
</form>
</body>

</html>