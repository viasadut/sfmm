
<?php
include_once 'dbconfig.php';
?>

<?php 
    session_start();
    require('db1.php');
	$role = $_SESSION['sess_userrole'];
	
	$queryc = "SELECT COUNT(utype) FROM user where '$role' in ('staff','mng')"; 
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
$uo='Finance';
$add_time=date('Y-m-d H:i:s');


$query139 = "SELECT * FROM set_package where id= '$id'"; 
	 
$result139 = mysqli_query($con, $query139) or die(mysqli_error());

// Print out result
$row139 = mysqli_fetch_array($result139);
$p_status=$row139['status'];
$pack_price=$row139['pack_price'];
$package_name=$row139['iname'];


$username = "root";
$password = "Godiloveu16";
$hostname = "localhost"; 


$dbhandle = mysqli_connect($hostname, $username, $password) 
 or die("Unable to connect to MySQL");
//echo "Connected to MySQL<br>";

//select a database to work with
$selected = mysqli_select_db($dbhandle,"sfmmkpjnew") 
  or die("Could not select examples");



$query198 = "SELECT SUM(p_price) FROM package_inves where package_name='$package_name' and status='Active'"; 
	 
$result198 = mysqli_query($dbhandle,$query198) or die(mysql_error());

// Print out result
$row198 = mysqli_fetch_array($result198);
$test1=	$row198['SUM(p_price)'];



?>


<?php
/*
Author: Javed Ur Rehman
Website: https://www.allphptricks.com/
*/
 
require('db1.php');




if(isset($_POST['Submit1'])){
$inves=$_REQUEST['inves'];
$r_price=$_REQUEST['r_price'];
$p_price=$_REQUEST['p_price'];
//$pmrn=$data1["pmrn"];
//$pname=$data1["pname"];
//$duration=$_REQUEST["duration"];


//$id=$row1["id"];

$url='package_set_inves?iname=$package_name';
$sel990="SELECT * FROM radio WHERE `iname`='$inves';";
$result990 = mysqli_query($con,$sel990);




if($res990=mysqli_num_rows($result990)==0)
{
 	
       echo '<script language="javascript">';
    echo 'alert("Unsuccessful !!! The Investigation Name is not in the Database List.. Please contact with Pharmacy Department"); ';
    echo '</script>';
    }
else {
$ins_query1="insert into package_inves (`iname`,`r_price`,`p_price`,`add_by`,`add_time`,`package_name`,`status`) values 
('$inves','$r_price','$p_price','$user','$add_time','$package_name','Active')";
mysqli_query($con,$ins_query1) or die(mysql_error());

//header("URL=$url");

header("Location: package_set_inves.php?iname=$package_name");

}
}
?>
<?php
/*
Author: Javed Ur Rehman
Website: https://www.allphptricks.com/
*/
if(isset($_POST['DELETE']))
{
require('db1.php');
$id=$_REQUEST['id'];
$query23 = "DELETE FROM alltest WHERE id=$id"; 
$result23 = mysqli_query($con,$query23) or die ( mysqli_error());
//header("Location: newtest2.php"); 
}
?>


<?php
if(isset($_POST['Submit2']))
{



     $user1='root';
     $pass='Godiloveu16';
     $db1= new PDO('mysql:host=localhost; dbname=sfmmkpjnew', $user1, $pass);
     $db1->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
     

$apptime=date('Y-m-d H:i:s');
if($user!='' and $test1!=$pack_price){
     echo '<script language="javascript">';
     echo 'alert("Package Price is not macthed !!")';
     echo '</script>';


}
else if($user!='' and $test1==$pack_price){
try {
	
	
  $db1->beginTransaction();


  $r_s='Approved';
  $i_status='Active';
  
  
  $sh = $db1->prepare("UPDATE set_package SET status=?, approve_by=?, approve_time=? WHERE id=?");
  $sh->execute([$r_s, $user, $apptime, $id]);

  $sh = $db1->prepare("UPDATE radio SET status=? WHERE iname=?");
  $sh->execute([$i_status, $package_name]);

  $sh = $db1->prepare("UPDATE radio1 SET status=? WHERE iname=?");
  $sh->execute([$i_status, $package_name]);

  $sh = $db1->prepare("UPDATE radio2 SET status=? WHERE iname=?");
  $sh->execute([$i_status, $package_name]);

   
  
$db1->commit();

//header("Location: endo_bill_paper.php?adate1=$adate1&pmrn=$pmrn&dname=$dname&billno=$billno&eid=$eid");
echo '<script language="javascript">';
      echo 'alert("Successfully Send !!")';
      echo '</script>';

      header("Location: package_approval");
}
	

catch ( Exception $e ) {
  $db1->rollBack();

  echo '<script language="javascript">';
      echo 'alert("Falied !!"); ';
      echo '</script>';
}	

}

	

else {
	
			echo '<script language="javascript">';
    echo 'alert("Bill Alreday Confirmed !!"); ';
	//echo -e "\e[38;5;11m Test\e[m";


    echo '</script>';
}	
	


}

?>


<?php
if(isset($_POST['Submit3']))
{



     $user1='root';
     $pass='Godiloveu16';
     $db1= new PDO('mysql:host=localhost; dbname=sfmmkpjnew', $user1, $pass);
     $db1->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
     

$apptime=date('Y-m-d H:i:s');
if($user!='' and $test1!=$pack_price){
     echo '<script language="javascript">';
     echo 'alert("Package Price is not macthed !!")';
     echo '</script>';


}
else if($user!='' and $test1==$pack_price){
try {
	
	
  $db1->beginTransaction();


  $r_s='Rejected';
  
  
  $sh = $db1->prepare("UPDATE set_package SET status=?, approve_by=?, approve_time=? WHERE id=?");
  $sh->execute([$r_s, $user, $apptime, $id]);

   
  
$db1->commit();

//header("Location: endo_bill_paper.php?adate1=$adate1&pmrn=$pmrn&dname=$dname&billno=$billno&eid=$eid");
echo '<script language="javascript">';
      echo 'alert("Successfully Send !!")';
      echo '</script>';

      header("Location: package_approval");
}
	

catch ( Exception $e ) {
  $db1->rollBack();

  echo '<script language="javascript">';
      echo 'alert("Falied !!"); ';
      echo '</script>';
}	

}

	

else {
	
			echo '<script language="javascript">';
    echo 'alert("Bill Alreday Confirmed !!"); ';
	//echo -e "\e[38;5;11m Test\e[m";


    echo '</script>';
}	
	


}

?>


<!DOCTYPE html>
<html lang="en" >

<head>
  <meta charset="UTF-8">
  <title>Medication Form</title>
  
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
  
  <script>
  $(document).ready(function() {
    $("#datepicker").datepicker();
  });
  </script>
  <script>
  $(document).ready(function() {
    $("#datepicker1").datepicker();
  });
  </script>
  
  
  
   <link rel="stylesheet" href="jsnew/bootstrap.min.css" />  
    <script src="jsnew/jjquery.min.js"></script>
    <script src="jsnew/bootstrap.min.js"></script>

    <link href="jsnew/jquery-ui.css" rel="stylesheet" />
    <link href="./jquery.multiselect.css" rel="stylesheet" />
    <script src="jsnew/jquery-1.12.4.js"></script>
    <script src="jsnew/jquery-ui.js"></script>
    <script src="./jquery.multiselect.js"></script>
  
  
  
  
  <link rel="stylesheet" href="styles.css">
  <script type="text/javascript" src="jquery-1.4.1.min.js"></script>
<script type="text/javascript">
$(document).ready(function()
{
	//$("#loding1").hide();
	//$("#loding2").hide();
	$(".country").change(function()
	{
		$("#loding1").show();
		var id=$(this).val();
		var dataString = 'id='+ id;
		$(".state").find('option').remove();
		//$(".city").find('option').remove();
		$.ajax
		({
			type: "POST",
			url: "get_state.php",
			data: dataString,
			cache: false,
			success: function(html)
			{
				//$("#loding1").hide();
				$(".state").html(html);
			} 
		});
	});
	
	
	$(".country").change(function()
	{
		//$("#loding1").show();
		var id=$(this).val();
		var dataString = 'id='+ id;
	//$(".state").find('option').remove();
		$(".city").find('option').remove();
		$.ajax
		({
			type: "POST",
			url: "get_state11.php",
			data: dataString,
			cache: false,
			success: function(html)
			{
			//	$("#loding1").hide();
				$(".city").html(html);
			} 
		});
	});
	
	
	$(".country").change(function()
	{
		//$("#loding1").show();
		var id=$(this).val();
		var dataString = 'id='+ id;
	//$(".state").find('option').remove();
		$(".city22").find('option').remove();
		$.ajax
		({
			type: "POST",
			url: "get_state12.php",
			data: dataString,
			cache: false,
			success: function(html)
			{
			//	$("#loding1").hide();
				$(".city22").html(html);
			} 
		});
	});
	
	
		
	
});
</script>


<link rel="stylesheet" href="styles.css">

   <script src="script.js"></script>
   
   
   
   
              <script src="jsnew/jquery.min1.js"></script>  
           <link rel="stylesheet" href="jsnew/bootstrap.min1.css" />  
           <script src="jsnew/bootstrap.min1.js"></script>  


           <script type="text/javascript">
function confirm_click2()
{
return confirm("Are you Sure to Approve?");
}

</script>

<script type="text/javascript">
function confirm_click3()
{
return confirm("Are you Sure to Reject?");
}

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




  <!-- Stephonce R. MOrris | 2014 -->

<!-- Google Font -->
		<link href='jsnew/fonts' rel='stylesheet' type='text/css'>


<form action="" method="post" name="form">
        <table align="center" class="table table-bordered" id="dynamic_field"> 


<tr><td colspan="10" align="right"bgcolor="lightgreen"><font size="6" color="#FF0000"><strong>Package Name:<?php echo $package_name;?></strong></td>
<td colspan="10" align="right"bgcolor="lightgreen"><font size="6" color="#FF0000"><strong>Package Price:<?php echo $test1;?> (BDT)</strong></td></tr>

<tr>
      <td colspan="1" align="center"><strong>S.No</strong></td>
     
      <td colspan="3" align="center"><strong>Set Investigation Name</strong></td>
     	  <td colspan="8" align="center"><strong>Package Price</strong></td>
      	  <td colspan="6" align="center"><strong>Regular price</strong></td>
		        	  
					  
       

	   </tr>
 <?php
	
$user=$_SESSION["sess_username"];
$pmrn=$_REQUEST["pmrn"];
$eid=$_REQUEST["eid"];
$dname=$_REQUEST["dname"];
//$id1=$_REQUEST["ID"];

//$id=$_REQUEST["id"];
//$episode=$data59["eid"];

$count=1;
$sel_query="Select * from package_inves where package_name= '$package_name'order by `id` DESC;";

$result = mysqli_query($con,$sel_query);

while($row = mysqli_fetch_assoc($result)) 
{ ?>    <tr>

      <td align="center" colspan="1"><?php echo $count; ?></td>
	  <td align="center" colspan="3">

    <?php 
    
    if($row['type']=='Consultation'){echo $row['iname'].' -Consultation Charge'; }
    
    else {echo $row['iname'];}?>

    </td>

      
	        <td align="center"colspan="8"><?php echo $row["p_price"]; ?></td>
			      <td align="center"colspan="6"><?php echo $row["r_price"]; ?></td>
				  
				  

  	  

	  
      </tr>
    <?php $count++; } ?>
	
    
</form>

<form method="post">
<?php if($p_status=='Send For Approval'){echo"
<td colspan='20'align='right'><button type='submit' name='Submit2' width='200px;' onclick='return confirm_click2();'>Approve</button>
<button type='submit' name='Submit3' width='200px;' onclick='return confirm_click3();'>Reject</button>";
}
?>
</form>

</table>
</body>

</html>
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
							("price").value = myObj[0];
						
						// Assign the value received to
						// last name input field
//						document.getElementById(
	//						"page").value = myObj[1];
							
							/*document.getElementById(
							"charge").value = myObj[1];
							
							document.getElementById(
							"porder").value = myObj[2];
							*/
							
					}
				};

				// xhttp.open("GET", "filename", true);
				xmlhttp.open("GET", "package_data.php?pmrn=" + str, true);
				
				// Sends the request to the server
				xmlhttp.send();
			}
		}
	</script>  