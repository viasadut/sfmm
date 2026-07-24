<?php 
    session_start();
    $role = $_SESSION['sess_userrole'];
    if(!isset($_SESSION['sess_username']) || $role!="msuite"){
      header('Location: login2.php?err=2');
    }
?>


<?php
/*
Author: Javed Ur Rehman
Website: https://www.allphptricks.com/
*/
$pmrn=$_REQUEST['pmrn'];
$id=$_REQUEST['id'];
$db = mysqli_connect('localhost','root','Godiloveu16');
mysqli_select_db($db,'sfmmkpjnew');
$query4 = mysqli_query($db,"select * from m_suite where id='$id'");
$data = mysqli_fetch_assoc($query4);


require('db1.php');
/*$query43 = "SELECT COUNT(pmrn) FROM m_suite where pmrn= '$pmrn' and eid!='0';"; 
$result43 = mysqli_query($con, $query43) or die(mysqli_error());
$row43 = mysqli_fetch_assoc($result43);
$count =$row43['COUNT(pmrn)'];
$count1 = $count+1;
*/

$url = "procedureup_ms" ;

 

//include("auth.php");
$user=$_SESSION["sess_userrole"];
$status = "";

if(isset($_POST['Submit'])==1)
{

//$name =$_REQUEST['name'];
//$pmrn =$_REQUEST['pmrn'];
//$padd =$_REQUEST['padd'];
//$did =$_REQUEST['did'];
//$dname =$_REQUEST['dname'];
//$date = $_REQUEST['date'];
//$date1 =$_REQUEST[ 'date1'];
//$slot = $_REQUEST['slot'];
//$doc1 = $_REQUEST['doc'];
//$pphone= $_REQUEST['pphone'];
$temp= $_REQUEST['temp'];
$bp= $_REQUEST['bp'];
//$pbmi= $_REQUEST['pbmi'];
$pulse= $_REQUEST['pulse'];
$pscore= $_REQUEST['pscore'];
$remarks= $_REQUEST['remarks'];

$query43 = "SELECT COUNT(pmrn) FROM m_suite where pmrn='$pmrn' and type='OPD' and ustatus!='Cancel';"; 
$result43 = mysqli_query($con, $query43) or die(mysqli_error());
$row43 = mysqli_fetch_assoc($result43);
$count =$row43['COUNT(pmrn)'];
$count1 = $count+1;




$update33="update m_suite set `temp`='$temp',`pulse`='$pulse',`temp`='$temp',`bp`='$bp',`remarks`='$remarks',`pscore`='$pscore',`ustatus`='Updated',`eid`='$count1' where `id`='$id'";

mysqli_query($con,$update33) or die(mysql_error());

//$update="update test set status='Booked' where `dname`='$dname' and `ddate`='$date1' and `dslot`='$slot'";
//mysqli_query($con,$update) or die(mysql_error());

header("Location:$url");
echo '<script language="javascript">';
    echo 'alert("Personal History Updated Successfully !!"); ';
    echo '</script>';}

	


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
  font-size: 12px;
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
  margin: 0 1px 1px 0;
}

select {
  padding: 6px;
  height: 32px;
  border-radius: 2px;
  width: 20%;
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
    max-width: 750px;
  }

}
label {
  background-color: lightblue;
  color: black;
  font-weight: bold;
  padding: 4px;
  text-transform: uppercase;
  
}
label1 {
  background-color: lightgreen;
  color: black;
  font-weight: bold;
  padding: 4px;
  text-transform: uppercase;
  
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
</head>

<body>
<div id='cssmenu'>
<ul>
   <li><a href='cviewsp1gp'><span>Home</span></a></li>
      <li class='active has-sub'><a href='#'><span>Appointment</span></a>
      <ul>
         <li class='has-sub'><a href='cggtttgp'><span>Set Doctor's Appointment</span></a>
            
         </li>
         <li class='has-sub'><a href='amigp'><span>Set Restrictions on Appointment Time</span></a>
            
         </li>
		 
		 		 <li class='has-sub'><a href='cviewsp11gp'><span>Doctor's Available Slot</span></a>
            
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

<!-- Form Title -->
		<h1>PATIENT'S PERSONAL HISTORY </h1>


        <fieldset>

			<legend></legend>
            <!-- Name Input -->
			<label for="name"><strong>Doctor's Name :</strong></label>
			<input name="dname" type="text" value="<?php echo $data["dname"]; ?> "readonly/>
		
		
		<label for="mail"><strong>Appointment Date :</strong></label>
									<p>
									  <input type="text" name="date"  size="15" value="<?php echo $data["pdate"]; ?>"readonly/>
									 
									  
                                      
	    </p>

									<label for="age"><strong>Appointment Time :</strong></label>
												  <input type="text" name="slot"  size="15" value="<?php echo $data["ptime"]; ?>"readonly/
<p>
	  
	  <label for="age"><strong>Patient's Name :</strong></label>
      <input name="name" type="text" size="65" value="<?php echo $data["pname"]; ?>"readonly/>
 	  

	  <label for="age"><strong>Patient's Details :</strong></label>
	  	
            <input name="psex" type="text" size="15" value="<?php echo $data["psex"]; ?>"readonly/>
            <input name="pmrn" type="text" size="10" value="<?php echo $data["pmrn"]; ?>"readonly/>
      <input name="pphone" type="text" size="10" value="<?php echo $data["pphone"]; ?>"readonly/>	  
	  <input name="page" type="text" size="5"value="<?php echo $data["page"]; ?>"readonly/>
	  	 
      
<label for="age"  size="20%"><strong>Patient's Particulars :</strong></label>

	        
	        <input name="pulse" type="text" size="20" placeholder="Pulse" value=""required/>
	        <input name="bp" type="text" size="20" placeholder="BP" value=""required/>
			<input name="temp" type="text" size="20" placeholder="Temp" value=""required/>
			<input name="pscore" type="text" size="20" placeholder="pscore" value=""required/>
			<input name="remarks" type="text" size="112" placeholder="remarks" value=""required/>
	        

</p>	        			
  </fieldset>

		<button type="submit" name="Submit">Confirm</button>

</form>
  
  

</body>

</html>
