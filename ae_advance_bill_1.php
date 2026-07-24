<?php 
   session_start();
    require('db1.php');
	$role = $_SESSION['sess_userrole'];
	
	$queryc = "SELECT COUNT(utype) FROM user where '$role' in ('mng','billin','bill','doctor','imo','nurse')"; 
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

$appdate=date('Y-m-d');
$db = mysqli_connect('localhost','root','Godiloveu16');
mysqli_select_db($db,'sfmmkpjnew');

$user=$_SESSION["sess_username"];
//$eid=$_REQUEST['eid'];
$date77=date('Y-m-d');
$pdate=date('Y-m-d'); 
$pdate1=date('Y-m-d H:i:s');  
//include("auth.php");
$pmrn=$_REQUEST['pmrn'];
$eid=$_REQUEST['eid'];
$db = mysqli_connect('localhost','root','Godiloveu16');
mysqli_select_db($db,'sfmmkpjnew');

$query4 = mysqli_query($db,"select * from emergency where pmrn='$pmrn' and eid='$eid' and discharge=''");
$data = mysqli_fetch_assoc($query4);
//$ddd=$data['dname'];



/*
$query5 = mysqli_query($db,"select * from patient where ID='$id'");
$data1 = mysqli_fetch_assoc($query5);
$bdate=$data1['bdate'];
$dd=date('d-m-Y',strtotime($data1['bdate']));
$dd2=date_create($dd);
*/




  
?>

<?php
$username = "root";
$password = "Godiloveu16";
$hostname = "localhost"; 

//connection to the database
$dbhandle = mysqli_connect($hostname, $username, $password) 
 or die("Unable to connect to MySQL");
//echo "Connected to MySQL<br>";

//select a database to work with
$selected = mysqli_select_db($dbhandle,"sfmmkpjnew") 
  or die("Could not select examples");

  
$query198 = "SELECT SUM(amount) FROM advance_bill where pmrn='$pmrn'and eid='$eid' and billno='' and location='AE'"; 
	 
$result198 = mysqli_query($dbhandle,$query198) or die(mysql_error());

// Print out result
$row198 = mysqli_fetch_array($result198);
$test1=	$row198['SUM(amount)'];
//echo $test1;


?>


<?php
/*
Author: Javed Ur Rehman
Website: https://www.allphptricks.com/
*/
 
require('db1.php');

if(isset($_POST['Submit']))
{


$price1 =$_REQUEST["price"]+$data['advance'];
$price =$_REQUEST["price"];
//$vehicle1 = $_REQUEST['vehicle1'];
$item = $_REQUEST['item'];
$date = date('m/d/Y');


$user1='root';
$pass='Godiloveu16';
$db1= new PDO('mysql:host=localhost; dbname=sfmmkpjnew', $user1, $pass);
$db1->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

$apptime=date('Y-m-d H:i:s');

try {
	
	
  $db1->beginTransaction();


  $r_s='Confirmed By Consultant';
  $r_d=date('d/m/Y H:i:s');
  $nmrn='NEW MRN';
  $particulars='OPD Consultation';
  $status='Booked';
  $ipd='AE';
$ipd1='AE ADVANCE';  
  $regi='100';
  $notseen='NOT SEEN';
  $ccgg1new_test1='ccgg1new_test1';
$payment_status='PAID';
$billinipd='0';
  
  
  $db = mysqli_connect('localhost','root','Godiloveu16');
mysqli_select_db($db,'sfmmkpjnew');






	
	
	
$sh = $db1->prepare("insert into advance_bill(pmrn,eid,location,amount,date,time,user,remarks,dname) VALUES(?, ?, ?, ?, ?, ?, ?, ?, ?)");
$sh->execute([$pmrn, $eid, $ipd, $price, $appdate, $apptime, $user, $item, $ipd1]);
  
   
  
  
  
$db1->commit();

header("Location: ae_advance_bill_1.php?pmrn=$pmrn&eid=$eid");


}
	

catch ( Exception $e ) {
  $db1->rollBack();

  echo '<script language="javascript">';
      echo 'alert("Falied !!"); ';
      echo '</script>';
}	


}



if(isset($_POST['Submit1']))
{
	
$price1 =$test1+$data['advance'];
$price =$_REQUEST["price"];
$vehicle1 =$_REQUEST["vehicle1"];
$p_remarks =$_REQUEST["p_remarks"];


$objConnect = mysqli_connect("localhost","root","Godiloveu16") or die("Error Connect to Database");
			$objDB1 = mysqli_select_db($objConnect,"sfmmkpjnew");


			
$query44 = mysqli_query($db,"select COUNT(id) from advance_bill where pmrn='$pmrn' and eid='$eid' and billno='' and location='AE'");
$data4 = mysqli_fetch_assoc($query44);


			
$apptime=date('Y-m-d H:i:s');

$user1='root';
$pass='Godiloveu16';
$db1= new PDO('mysql:host=localhost; dbname=sfmmkpjnew', $user1, $pass);
$db1->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

			

$apptime=date('Y-m-d H:i:s');

$servername = "localhost";
$username1 = "root";
$password1 = "Godiloveu16";
$dbname1 = "sfmmkpjnew";

// Create connection
$conn = new mysqli($servername, $username1, $password1, $dbname1);
// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}


if($user !='' and $data4['COUNT(id)']>0){
	
	$r_s='Confirmed By Consultant';
  $r_d=date('d/m/Y H:i:s');
  $nmrn='NEW MRN';
  $particulars='OPD Consultation';
  $status='Booked';
  $ipd='AE';
$ipd1='AE ADVANCE';  
  $regi='100';
  $notseen='NOT SEEN';
  $ccgg1new_test1='ccgg1new_test1';
$payment_status='PAID';
$billinipd='';
  
	
	$sql1 = "insert into pms_bill (pmrn,eid,location,amount,date,time,user,remarks,dname,s_no,p_mode) values
		('$pmrn', '$eid', '$ipd', '$test1', '$appdate', '$apptime', '$user', '$ipd', '$ipd1', '$mno', '$vehicle1')";



if ($conn->query($sql1) === TRUE) {
  $last_id = $conn->insert_id;


try {
	
	
  $db1->beginTransaction();

if($vehicle1=='Cash'){				

$sh = $db1->prepare("UPDATE advance_bill SET billno=? WHERE pmrn=? and eid=? and billno=?");
$sh->execute([$last_id, $pmrn, $eid, $billinipd]);
	
$sh = $db1->prepare("UPDATE emergency SET advance=? WHERE pmrn=? and eid=?");
$sh->execute([$price1, $pmrn, $eid]);

$db1->commit();

header("Location: ipd_bill_paper_advance.php?adate1=$adate1&pmrn=$pmrn&dname=$dname&billno=$last_id&eid=$eid");
}


else if($vehicle1!='Cash'){				

$sh = $db1->prepare("UPDATE advance_bill SET billno=? WHERE pmrn=? and eid=? and billno=?");
$sh->execute([$last_id, $pmrn, $eid, $billinipd]);
	

$sh = $db1->prepare("UPDATE inpatient SET advance=? WHERE pmrn=? and eid=?");
$sh->execute([$price1, $pmrn, $eid]);

$db1->commit();

header("Location: ae_bill_paper_advance.php?adate1=$adate1&pmrn=$pmrn&dname=$dname&billno=$last_id&eid=$eid");
}


}
	

catch ( Exception $e ) {
  $db1->rollBack();

	$sql3 = "update pms_bill set eid='', error='Network Problem' where billno='$last_id'";
  $conn->query($sql3);
  
  echo '<script language="javascript">';
      echo 'alert("Falied !!"); ';
      echo '</script>';
}	


}

else {
  echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();

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
/*
Author: Javed Ur Rehman
Website: https://www.allphptricks.com/
*/
if(isset($_POST['DELETE']))
{
require('db1.php');
$id=$_REQUEST['id'];
$query23 = "DELETE FROM  WHERE id=$id"; 
$result23 = mysqli_query($con,$query23) or die ( mysqli_error());
//header("Location: newtest2.php"); 
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

    <script src="jsnew/prefixfree.min.js"></script>



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
}
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


</head>
</head>

<body>

<div id='cssmenu'>
<ul>
   <li><a href='manual_bill.php'><span>Home</span></a></li>
   
   
   <li class='last'><a href='logout'><span>LOGOUT</span></a></li>
</ul>
</div>




  <!-- Stephonce R. MOrris | 2014 -->

<!-- Google Font -->
		<link href='jsnew/fonts' rel='stylesheet' type='text/css'>

<form action="" method="post" name="rtr">
<!-- Form Title -->
        <table align="center" class="table table-bordered" id="dynamic_field">  
		
				<tr>
					<td colspan="6"><label><strong>Doctors's Name :</strong></label></td>
					<td colspan="6"><label><strong>Patient's Name :</strong></label></td>
					<td colspan="4"><label><strong>Patient's MRN:</strong></label></td>
					<td colspan="4"><label><strong>Patient's Episode:</strong></label></td>

										<input type="hidden" name="new" value="1" />	
				</tr>
				
				<tr>	  
				<td colspan="6">
  <select id="browsers10" name="dname">
			        
					<option value='<?php echo $data['adoc'];?>'selected><?php echo $data['adoc'];?></option>
			</select></td>
				<td colspan="6"><?php echo $data['pname']; ?></td>
				<td colspan="4"><?php echo $data['pmrn']; ?></td>
				<td colspan="4"><?php echo $data['eid']; ?> </td>	
												
						
				
</tr>
						

						
						
					


				

<tr><td colspan="20" align="center"bgcolor="lightgreen"><label><strong>Investigation Form</strong></label></td> </tr>
<tr><td colspan="10" align="center"><label><strong>Investigation</strong></label></td> 

<td colspan="10" align="center"><label><strong>Instructions</strong></label></td> 
</tr>
<tr>
<td colspan="10" align="center"><select name="item" class="con_charge" id="pmrn" onchange="GetDetail(this.value)">
  

						<option value=''>-Select Investigation</option>
				<?php 
			$sql = "select * from `radio` where status='Active'";
			$res = mysqli_query($con, $sql);
			if(mysqli_num_rows($res) > 0) {
				while($row = mysqli_fetch_object($res)) {
					echo "<option value='".$row->iname."'>".$row->iname."</option>";
				}
			}
			?>  </select>
			
			
			
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
			<script>
$(document).ready(function() {
    $('.con_charge').select2();
});
</script>
			
			</td>

			
			
<td colspan="10" align="center"><input type="text" name="price" value="" id="remarks">
<input  name="bar"  id="bar" type="hidden" value="<?php echo date('dmYs');?>">



</td>


</tr>			        

</form>		
<tr>
		<td colspan="20"align="right"><button type="submit" name="Submit">ADD</button></td>
</tr>
		
		<form name="asd" method="post">
		<tr>
<td colspan="20"><input type="radio" id="vehicle1" name="vehicle1" value="Cash"  id="chkPassport1"onclick="EnableDisableTextBox1(this)"  style="height:20px; width:20px; color:red;"checked><span style="font-size:20px;color:red;font-weight:bold;">Cash</span>				 
<input type="radio" id="vehicle1" name="vehicle1" value="Card"id="chkPassport" onclick="EnableDisableTextBox(this)" style="height:20px; width:20px; color:red;"><span style="font-size:20px;color:red;font-weight:bold;">Cheque / Bikash</span>				 

<br><strong>Remarks:</strong>
      <input name="p_remarks" type="text" size="80" style="text-transform:uppercase" value="" id="sdate21" disabled="disabled">

</td>

</tr>
		<td colspan="20"align="right"><button type="submit" name="Submit1">Confirm</button></td>
	  
</tr>
</form>
<form>
<tr>
      <td colspan="1" align="center"><strong>S.No</strong></td>
     
      <td colspan="2" align="center"><strong>MRN</strong></td>
     	  <td colspan="10" align="center"><strong>TEST NAME</strong></td>
      	  <td colspan="3" align="center"><strong>Instruction</strong></td>
		  <td colspan="3" align="center"><strong>Price</strong></td>
		        	  <td colspan="2" align="center"><strong>DELETE</strong></td>
       

	   </tr>
 <?php
	
$user=$_SESSION["sess_username"];
//$pmrn=$_REQUEST["pmrn"];
//$eid=date('dmY');
//$dname=$_REQUEST["dname"];
//$id1=$_REQUEST["ID"];

//$id=$_REQUEST["id"];
//$episode=$data59["eid"];

$count=1;
$sel_query="Select * from advance_bill where pmrn= '$pmrn' and eid='$eid'order by `id` DESC;";

$result = mysqli_query($con,$sel_query);

while($row = mysqli_fetch_assoc($result)) 
{ ?>    <tr>

      <td align="center" colspan="1"><?php echo $count; ?></td>

      <td align="center"colspan="2"><?php echo $row["pmrn"]; ?></td>
	        <td align="center"colspan="10"><?php echo $row["amount"]; ?></td>
			      <td align="center"colspan="3"><?php echo $row["ins"]; ?></td>
				  <td align="center"colspan="2"><?php echo $row["price"]; ?></td>
				  
				  
				  
				  
				  <?php
		$rstatus=$row['rstatus'];
		$id1=$row['id'];
		
		
		$url = "deletelab_bill?pmrn=$pmrn&id=$id1&ID=$id&dname=$dname"; 
		   
		   
		
	if($rstatus!='RECEIVED')
	{ 
echo "<td align='center' colspan='2' style='background-color:lightblue;'><a href='$url'><b>DELETE</b></a></td>";
	}
	
	else if($rstatus=='RECEIVED')
	{ 
echo "<td align='center'  colspan='2'style='background-color:lightgreen;'><b>Already Received in LAB</b></td>";
	}
	
	?>

  	  

	  
      </tr>
    <?php $count++; } ?>
<tr><td align="right" colspan="20"><button onclick="self.close()">Close</button></td></tr>

<tr><td colspan="20" align="right"bgcolor="lightgreen"><font size="6" color="#FF0000"><strong>Total Cost For The Selected Investigation Will Be:<?php echo $test1;?> (BDT)</strong></td></tr>
</table>

</form>


</body>

</html>
 <script type="text/javascript">
    function EnableDisableTextBox(chkPassport) {
   
        
        var txtPassportNumber4 = document.getElementById("sdate21");
        txtPassportNumber4.disabled = chkPassport.checked ? false : true;
        if (!txtPassportNumber4.disabled) {
            txtPassportNumber4.focus();
        }
		
		
    }
	
	function EnableDisableTextBox1(chkPassport1) {
   
        
        var txtPassportNumber5 = document.getElementById("sdate21");
        txtPassportNumber5.disabled = chkPassport1.unchecked ? false : true;
        if (!txtPassportNumber5.disabled) {
            txtPassportNumber5.focus();
        }
		
		
    }
</script>


<script>

		// onkeyup event will occur when the user
		// release the key and calls the function
		// assigned to this event
		function GetDetail(str) {
			if (str.length == 0) {
				//document.getElementById("sformat").value = "";

				document.getElementById("remarks").value = "";
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
							"remarks").value = myObj[0];
							
							//document.getElementById(
							//"porder").value = myObj[2];
							
							
					}
				};

				// xhttp.open("GET", "filename", true);
				xmlhttp.open("GET", "ipd_advance_price.php?pmrn=" + str, true);
				
				// Sends the request to the server
				xmlhttp.send();
			}
		}
	</script> 
