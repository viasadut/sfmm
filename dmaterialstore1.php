<?php
include_once 'dbconfig.php';
?>

<?php 
    session_start();
    require('db1.php');
	$role = $_SESSION['sess_userrole'];
	
$queryc = "SELECT COUNT(utype) FROM user where '$role' in ('store','staff','ot','nurse','imo','mofficer','emergency','mng')"; 
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

$user=$_SESSION['sess_username'];

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


$ename = $_REQUEST['ename'];
$eid = $_REQUEST['eid'];
$elocation = $_REQUEST['elocation'];
$etype = $_REQUEST['etype'];
$eqty = $_REQUEST['eqty'];
//$estatus = $_REQUEST['estatus'];
$remarks = $_REQUEST['remarks'];
//$bname = $_REQUEST['bname'];
//$cname=$_REQUEST['cname'];
//$form=$_REQUEST['form'];
//$cat=$_REQUEST['cat'];
$uprice=$_REQUEST['uprice'];
$uprice1=$_REQUEST['uprice1'];
$cprice=$_REQUEST['cprice'];
//$reuse=$_REQUEST['reuse'];
$description=$_REQUEST['description'];
$uom=$_REQUEST['uom'];
//$padd=$_REQUEST['padd'];

$adate= date('d/m/Y H:i:s');

$adate1= date('Y-m-d');

$vendor=$_REQUEST['vendor'];



$p_by=$_REQUEST['p_by'];

$charge=$_REQUEST['charge'];




$sel90="SELECT * FROM storenew WHERE `eid`='$eid';";
$result90 = mysqli_query($con,$sel90);
if($res90=mysqli_num_rows($result90)>0)
{
echo '<script language="javascript">';
    echo 'alert("This Item is Already Added in The Database !!"); ';

    echo '</script>';
	
	//header("Refresh: .1; URL=$url");
}


	
	$ins_query1="insert into storenew (`ename`,`eid`,`elocation`,`etype`,`eqty`,`estatus`,`remarks`,`adate`,`adate1`,`aby`,`supplier`,`cfo`,`ceo`,`finance`,`price`,`cprice`,`uom`,`md`,`it`,`ittime1`,`p_by`,`charge`,`description`,`uprice`) values 
('$ename','$eid','$elocation','$etype','$eqty','WAITING FOR Finance Forwarding','$remarks','$adate','$adate1','$user','$vendor','cfo','ceo','338','$uprice','$cprice','$uom','md','322','$adate1','$p_by','$charge','$description','$uprice1')";
mysqli_query($con,$ins_query1) or die(mysql_error());

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
  width: 100%;
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
    max-width: 900px;
  }

}
      </style>

    <script src="jsnew/pprefixfree.min.js"></script>



<link rel="stylesheet" href="jsnew/jquery-ui.css">
<script src="jsnew/jquery.min.js"></script>
<script src="jsnew/jquery-ui.min.js"></script>
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
		<h1>Add Disposable</h1>


        <fieldset>

			<legend></legend>
            <!-- Name Input -->
			
	  
	  <label for="age"><strong>Charge Code:</strong></label>
	  <input  name="eid" type="text" size="70" value=""required  />
	  
	  
	   <label for="age"><strong>Asset Name :</strong></label>
      
	  
	  <input list="browsers3" name="ename1" size="80"  class="form-control" autocomplete="off" required>
  <datalist id="browsers3">
	  <?php 
			$sql76 = "select distinct ename from `storenew` where etype='Asset'";
			$res76 = mysqli_query($con, $sql76);
			if(mysqli_num_rows($res76) > 0) {
				while($row76 = mysqli_fetch_object($res76)) {
					echo "<option value='".$row76->ename."'>".$row76->ename." - ".$row76->uom."</option>";
					
				}
			}
			?>
	  
	  </datalist>
	  
	  
	  <br><br>
	  
	  
	  
	  <label for="age"><strong>Chargeable Name :</strong></label>
      
	  
	  
	  
	  
	  <input list="browsers2" name="ename" size="80"  class="form-control" autocomplete="off" required>
  <datalist id="browsers2">
	  <?php 
			$sql76 = "select * from `storenew`";
			$res76 = mysqli_query($con, $sql76);
			if(mysqli_num_rows($res76) > 0) {
				while($row76 = mysqli_fetch_object($res76)) {
					echo "<option value='".$row76->ename."'>".$row76->ename." - ".$row76->uom."</option>";
					
				}
			}
			?>
	  
	  </datalist>
	  
	  <br><br>
	   <label for="age"><strong>Material Description :</strong></label>
      
	  
	  <input  name="description" type="text" size="80" value=""  />
	  
  <datalist id="browsers111">

						<option value=''>-Select Material</option>
						
						
						
				  </datalist>
	  
	  	 <br><br>
	  <label for="age"><strong>Material Type :</strong></label>
	 <select name="etype" value="" class="style1"  required>
			        <option value=''>-Select Type-</option>
					
					
					<?php 
			$sql = "Select DISTINCT etype  from storenew;";
			$res = mysqli_query($con, $sql);
			if(mysqli_num_rows($res) > 0) {
				while($row2 = mysqli_fetch_object($res)) {
					echo "<option value='".$row2->etype."'>".$row2->etype."</option>";
				}
			}
			?>
				
			</select>
			
			
			
		<br><br>	
			<label for="age"><strong>Material Location :</strong></label>
	 <select name="elocation" value="" class="style1"required>
			        
					    <option value='Store'>Store</option>
						    <option value='Care Shoppe'>Care Shoppe</option>
						
				
			</select>
			
			
			
			
		<br><br>	
			<label for="age"><strong>Material Quantity :</strong></label>
			<input  name="eqty" type="text" size="70" value="" required />
		

			
			
			<br><br>	
			<label for="age"><strong>Vendor :</strong></label>
			<input  name="vendor" type="text" size="70" value=""  />
			
			
			<label for="age"><strong>Cost Price:</strong></label>
			<input  name="cprice" type="text" size="70" value=""required  />
			
			
						<br><br>	
			<label for="age"><strong>Chargeable:</strong></label>
	 <select name="charge" value="" class="style1"required>
			        <option value=''>-Select-</option>
					    <option value='Yes'>Yes</option>
						<option value='No'>No</option>
						
						
						
						
						
				
			</select>

			
			
			
			
			<label for="age"><strong>Unit Price(IPD):</strong></label>
			<input  name="uprice" type="text" size="70" value=""required  />
			
			
			<label for="age"><strong>Unit Price(OPD):</strong></label>
			<input  name="uprice1" type="text" size="70" value=""required  />
			
			<label for="age"><strong>Unit Of Measurement:</strong></label><br><br>	
			<input  name="uom" type="text" size="70" value=""required  />
			
			
			
			<br><br>	
			<label for="age"><strong>Received From:</strong></label>
	 <select name="p_by" value="" class="style1"required>
			        
					    <option value='SFMMKPJSH'>SFMMKPJSH</option>
						<option value='CMSD'>CMSD</option>
						<option value='CME'>CME</option>
						<option value='DONATION'>DONATION</option>
						
						
						
						
				
			</select>


			
  </fieldset>

 <label for="age"><strong>Remarks (If Any):</strong></label> 
<td colspan="15" align="center"> <textarea rows="5" name="remarks" ></textarea></td>


<table><tr><td colspan="15">		<button type="submit" name="Submit">Add Equipment</button></td>
</table>

</form>
  


</body>

</html>
