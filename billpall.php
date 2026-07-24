<?php

$useragent=$_SERVER['HTTP_USER_AGENT'];

if(preg_match('/(android|bb\d+|meego).+mobile|avantgo|bada\/|blackberry|blazer|compal|elaine|fennec|hiptop|iemobile|ip(hone|od)|iris|kindle|lge |maemo|midp|mmp|netfront|opera m(ob|in)i|palm( os)?|phone|p(ixi|re)\/|plucker|pocket|psp|series(4|6)0|symbian|treo|up\.(browser|link)|vodafone|wap|windows (ce|phone)|xda|xiino/i',$useragent)||preg_match('/1207|6310|6590|3gso|4thp|50[1-6]i|770s|802s|a wa|abac|ac(er|oo|s\-)|ai(ko|rn)|al(av|ca|co)|amoi|an(ex|ny|yw)|aptu|ar(ch|go)|as(te|us)|attw|au(di|\-m|r |s )|avan|be(ck|ll|nq)|bi(lb|rd)|bl(ac|az)|br(e|v)w|bumb|bw\-(n|u)|c55\/|capi|ccwa|cdm\-|cell|chtm|cldc|cmd\-|co(mp|nd)|craw|da(it|ll|ng)|dbte|dc\-s|devi|dica|dmob|do(c|p)o|ds(12|\-d)|el(49|ai)|em(l2|ul)|er(ic|k0)|esl8|ez([4-7]0|os|wa|ze)|fetc|fly(\-|_)|g1 u|g560|gene|gf\-5|g\-mo|go(\.w|od)|gr(ad|un)|haie|hcit|hd\-(m|p|t)|hei\-|hi(pt|ta)|hp( i|ip)|hs\-c|ht(c(\-| |_|a|g|p|s|t)|tp)|hu(aw|tc)|i\-(20|go|ma)|i230|iac( |\-|\/)|ibro|idea|ig01|ikom|im1k|inno|ipaq|iris|ja(t|v)a|jbro|jemu|jigs|kddi|keji|kgt( |\/)|klon|kpt |kwc\-|kyo(c|k)|le(no|xi)|lg( g|\/(k|l|u)|50|54|\-[a-w])|libw|lynx|m1\-w|m3ga|m50\/|ma(te|ui|xo)|mc(01|21|ca)|m\-cr|me(rc|ri)|mi(o8|oa|ts)|mmef|mo(01|02|bi|de|do|t(\-| |o|v)|zz)|mt(50|p1|v )|mwbp|mywa|n10[0-2]|n20[2-3]|n30(0|2)|n50(0|2|5)|n7(0(0|1)|10)|ne((c|m)\-|on|tf|wf|wg|wt)|nok(6|i)|nzph|o2im|op(ti|wv)|oran|owg1|p800|pan(a|d|t)|pdxg|pg(13|\-([1-8]|c))|phil|pire|pl(ay|uc)|pn\-2|po(ck|rt|se)|prox|psio|pt\-g|qa\-a|qc(07|12|21|32|60|\-[2-7]|i\-)|qtek|r380|r600|raks|rim9|ro(ve|zo)|s55\/|sa(ge|ma|mm|ms|ny|va)|sc(01|h\-|oo|p\-)|sdk\/|se(c(\-|0|1)|47|mc|nd|ri)|sgh\-|shar|sie(\-|m)|sk\-0|sl(45|id)|sm(al|ar|b3|it|t5)|so(ft|ny)|sp(01|h\-|v\-|v )|sy(01|mb)|t2(18|50)|t6(00|10|18)|ta(gt|lk)|tcl\-|tdg\-|tel(i|m)|tim\-|t\-mo|to(pl|sh)|ts(70|m\-|m3|m5)|tx\-9|up(\.b|g1|si)|utst|v400|v750|veri|vi(rg|te)|vk(40|5[0-3]|\-v)|vm40|voda|vulc|vx(52|53|60|61|70|80|81|83|85|98)|w3c(\-| )|webc|whit|wi(g |nc|nw)|wmlb|wonu|x700|yas\-|your|zeto|zte\-/i',substr($useragent,0,4)))

header('Location: login66');

$d=date('l');

?>

<?php 
   session_start();
    require('db1.php');
	$role = $_SESSION['sess_userrole'];
	
	$queryc = "SELECT COUNT(utype) FROM user where '$role' in ('billin','bill')"; 
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

//include("auth.php");
$pmrn=$_REQUEST['pmrn'];
$eid=$_REQUEST['eid'];
$db = mysqli_connect('localhost','root','Godiloveu16');
mysqli_select_db($db,'sfmmkpjnew');
$query4 = mysqli_query($db,"select * from emergency where pmrn='$pmrn' and eid='$eid'");
$data = mysqli_fetch_assoc($query4);

  
?>


<?php
/*
Author: Javed Ur Rehman
Website: https://www.allphptricks.com/
*/

$appdate=date('Y-m-d');
 
require('db1.php');

if(isset($_POST['Submit1']))

{
$total_payable=$_REQUEST['total_payable'];
$total_charge=$_REQUEST['total_charge']+$_REQUEST['total_extra'];
$total_dis=$_REQUEST['total_dis'];
$total_ad=$_REQUEST['total_advance'];
$total_extra=$_REQUEST['total_extra'];
$total_payable=$_REQUEST['total_payable'];
$doc_charge=$_REQUEST['doc_charge'];
$room_charge=$_REQUEST['room_charge'];
$disposable_charge=$_REQUEST['disposable_charge'];
$nurse_procedure_charge=$_REQUEST['nurse_procedure_charge'];
$inves_charge=$_REQUEST['inves_charge'];
$medicine_charge=$_REQUEST['medicine_charge'];
$vehicle1=$_REQUEST['vehicle1'];
$due_remarks=$_REQUEST['due_remarks'];

$doc_dis=$_REQUEST['doc_dis'];
$receive_amount=$_REQUEST['receive_amount'];
$outstanding=$total_payable-$receive_amount;
	
$db = mysqli_connect('localhost','root','Godiloveu16');
mysqli_select_db($db,'sfmmkpjnew');




$strSQL1 = "select DISTINCT MAX(s_no) from pms_bill where date='$appdate'";
			$objQuery1 = mysqli_query($con,$strSQL1);
			$obj = mysqli_fetch_array($objQuery1);
			$mno=$obj['MAX(s_no)']+1;
			$mno1=$obj['MAX(s_no)'];
			$billno=date('ymd').$mno;

			
$objConnect = mysqli_connect("localhost","root","Godiloveu16") or die("Error Connect to Database");
			$objDB1 = mysqli_select_db($objConnect,"sfmmkpjnew");
			

			/*$strSQL18 = "select COUNT(id) from emergency where pmrn='$pmrn' and eid='$eid''";
			//$strSQL .="WHERE id = '".$_POST["chkDel"][$i]."' ";
			$objQuery18 = mysqli_query($objConnect,$strSQL18);
			$result18 = mysqli_fetch_array($objQuery18);
*/
			
			$strSQL118 = "select COUNT(id) from emergency where pmrn='$pmrn' and eid='$eid' and billno!=''";
			//$strSQL .="WHERE id = '".$_POST["chkDel"][$i]."' ";
			$objQuery118 = mysqli_query($objConnect,$strSQL118);
			$result118 = mysqli_fetch_array($objQuery118);
			
			
			$strSQL188 = "select COUNT(id) from pms_bill where pmrn='$pmrn' and eid='$eid' and dname='AE'";
			//$strSQL .="WHERE id = '".$_POST["chkDel"][$i]."' ";
			$objQuery188 = mysqli_query($objConnect,$strSQL188);
			$result188 = mysqli_fetch_array($objQuery188);


if($result118['COUNT(id)']==0 and $result188['COUNT(id)']==0){


$apptime=date('Y-m-d H:i:s');


	
	



  $r_s='Confirmed By Consultant';
  $r_d=date('d/m/Y H:i:s');
  $nmrn='NEW MRN';
  $particulars='OPD Consultation';
  $status='Booked';
  $ipd='AE';		
  $regi='100';
  $notseen='NOT SEEN';
  $ccgg1new_test1='ccgg1new_test1';
$payment_status='PAID';
$billinipd='0';
  

  
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

$sql = "insert into pms_bill(pmrn,eid,location,amount,dis_amount,date,time,user,remarks,dname,s_no,p_mode,p_remarks,receive_amount, outstanding) VALUES
('$pmrn', '$eid', '$ipd', '$total_payable', '$total_dis', '$appdate', '$apptime', '$user', '$ipd', '$ipd','$mno', '$vehicle1','$due_remarks','$receive_amount','$outstanding')";

if ($conn->query($sql) === TRUE) {
  $last_id = $conn->insert_id;


  

//$sql2 = "UPDATE ipd_extra_charge SET billno='$last_id' WHERE pmrn='$pmrn' and eid='$eid'";
//$conn->query($sql2);

$sql5 = "UPDATE emergency SET billno='$last_id',
doc_charge='$doc_charge', 
room_charge='$room_charge', 
inves_charge='$inves_charge', 
disposable_charge='$disposable_charge', 
medicine_charge='$medicine_charge', 
doc_dis='$doc_dis', 
receive_amount='$receive_amount', 
payment='$total_payable', 
payment_status='$payment_status',
nurse_procedure_charge='$nurse_procedure_charge',
extra='$total_extra',
advance='$total_ad'
WHERE pmrn='$pmrn' and eid='$eid'";
$conn->query($sql5);
  
header("Location: new_bill/new_ae_payment.php?adate1=$adate1&pmrn=$pmrn&dname=$dname&billno=$last_id&eid=$eid");  
  
}
			
 else {
  echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();
			

	

	

}
}?>



<!DOCTYPE html>
<html lang="en" >

<head>
  <meta charset="UTF-8">
  <title>Emergency Details</title>
  
    

  
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
 

<script src="script.js"></script>
<script>
function goBack() {
    window.history.back();
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
		<link href='https://fonts.googleapis.com/css?family=Nunito:400,300' rel='stylesheet' type='text/css'>

<form action="" method="post">
<h1 align="center"style="background-color:lightgreen;">PATIENT DETAILS TREATMENT SUMMARY 
<input type="button" name="edit" value="Edit" id="<?php echo $pmrn;?>" class="btn btn-info btn-xs edit_data">
</h1>
<!-- Form Title -->
        <table align="center" class="table table-bordered" id="dynamic_field">  
		<tr><td colspan="20" align="right"><button onclick="goBack()">Back</button></td></tr>
				<tr><td colspan="20"><label><strong>Doctors's Name :</strong></label></td></tr>
				<tr>	  
				<td colspan="20"><?php echo $data["dname"]; ?></td></tr>
				
						
						
				
					<input type="hidden" name="new" value="1" />

						</select></td></tr>
						
												<tr>
						
						
						<td colspan="7"><label><strong>Patient's MRN:</strong></label></td>
						<td colspan="3"><label><strong>Patient's Episode:</strong></label></td>
						<td colspan="10"><label><strong>Patient's Name:</strong></label></td>
						
						
						</tr>

<tr>				<td colspan="7"><?php echo $data["pmrn"]; ?> </td>
				<td colspan="3"><?php echo $data59["eid"]; ?> </td>
					 <td colspan="10"><?php echo $data["pname"]; ?></td>

					 
</tr>

						
						
<tr><td colspan="20"><label><strong>Patient's Address :</strong></label></td></tr>
<tr><td colspan="20"><?php echo $data["padd"]; ?></td></tr>


		<tr>
						
						<td colspan="5"><label><strong>Age:</strong></label></td>
						<td colspan="5"><label><strong>Admission Date:</strong></label></td>
						<td colspan="2"><label><strong>Gender:</strong></label></td>
						<td colspan="4"><label><strong>Phone NO:</strong></label></td>
						<td colspan="2"><label><strong>Room Type:</strong></label></td>
						<td colspan="2"><label><strong>Bed No:</strong></label></td>		
						</tr>
						
						<tr>				
						<td colspan="5"><?php echo $data["age"]; ?> </td>  
             		<td colspan="5"><?php echo $data["adate"]; ?></td>					 	
					 <td colspan="2"><?php echo $data["gender"]; ?></td>
					 <td colspan="4"><?php echo $data["pphone"]; ?></td>  

			    	 <td colspan="2"><?php echo $data["room"]; ?></td>  
					 <td colspan="2"><?php echo $data["room1"]; ?></td>  
					 </tr>

						

<tr><td colspan="20" align="center"bgcolor="lightgreen"><label><strong>Patient's Details Treatment Summary</strong></label></td> </tr>

<tr><td colspan="20" align="right"bgcolor="lightgreen"><font size="6" color="#FF0000"><strong>Bed Charge is:<?php

echo '0';?> (BDT)</strong></td></tr>	

<tr colspan="20"><td></td></tr>
<tr><td colspan="20" align="center"bgcolor="lightgreen"><label><strong>Nurses NOTE</strong></label></td> </tr>

<tr>
      <td colspan="1" align="center"><strong>S.No</strong></td>
      <td colspan="4" align="center"><strong>Patient's Name</strong></td>
      <td colspan="1" align="center"><strong>MRN</strong></td>
      <td colspan="1" align="center"><strong>Date </strong></td>
      <td colspan="3" align="center"><strong>Pain Score</strong></td>
	  <td colspan="8" align="center"><strong>Nurses Note</strong></td>
      <td colspan="2" align="center"><strong>Done By</strong></td>   
	   </tr>
 <?php
	
$user=$_SESSION["sess_username"];
$pmrn=$data["pmrn"];
//$id=$_REQUEST["id"];
$eid=$data["eid"];

$count=1;
$sel_query="Select * from ennote where pmrn= '$pmrn' and eid='$eid'order by `id` DESC;";

$result = mysqli_query($con,$sel_query);

while($row = mysqli_fetch_assoc($result)) 
{ ?>    <tr>

      <td align="center" colspan="1"><?php echo $count; ?></td>
      <td align="center"colspan="4"><?php echo $row["pname"]; ?></td>
      <td align="center"colspan="1"><?php echo $row["pmrn"]; ?></td>
	  <td align="center"colspan="1"><?php echo $row["odate"]; ?></td>  
	  <td align="center"colspan="3"><?php echo $row["infusion"]; ?></td>
      <td align="center"colspan="8"><?php echo $row["inves"]; ?></td>  
      <td align="center"colspan="2"><?php echo $row["user"]; ?></td>	  
  	  

	  
      </tr>
    <?php $count++; } ?>
	
	


	
<tr><td colspan="20" align="center"bgcolor="lightgreen"><label><strong>Nurse's Procedure Notes</strong></label></td> </tr>
<tr>
      <td colspan="1" align="center"><strong>S.No</strong></td>
      <td colspan="10" align="center"><strong>Procedure Name</strong></td>
      <td colspan="1" align="center"><strong>MRN</strong></td>
      <td colspan="4" align="center"><strong>Date & Time </strong></td>
      
      <td colspan="2" align="center"><strong>Done By</strong></td>
	  <td colspan="2" align="center"><strong>Price</strong></td>
	  

       

	   </tr>
 <?php
	
$user=$_SESSION["sess_username"];
//$pmrn=$data["pmrn"];
//$id=$_REQUEST["id"];
//$episode=$data["eid"];
$count=1;
$sel_query="Select * from enprocedure where pmrn= '$pmrn'and eid='$eid' order by `id` DESC;";

$result = mysqli_query($con,$sel_query);

while($row = mysqli_fetch_assoc($result)) 
{ ?>    <tr>

      <td align="center" colspan="1"><?php echo $count; ?></td>
      <td align="center"colspan="10"><?php echo $row["infusion"]; ?></td>
      <td align="center"colspan="1"><?php echo $row["pmrn"]; ?></td>
	  <td align="center"colspan="4"><?php echo $row["odate"]; ?></td>  
      <td align="center"colspan="2"><?php echo $row["user"]; ?></td>
	  <td align="center"colspan="2"><?php echo $row["price"]; ?></td>
	  
  	  

	  
      </tr>
    <?php $count++; } ?>
	
		<?php
	$username = "root";
$password = "Godiloveu16";
$hostname = "localhost"; 
//$pmrn=$row['pmrn'];
//$id=$row['id'];
//$eid=$row['eid'];
//connection to the database
$dbhandle = mysqli_connect($hostname, $username, $password) 
 or die("Unable to connect to MySQL");
//echo "Connected to MySQL<br>";

//select a database to work with
$selected = mysqli_select_db($dbhandle,"sfmmkpjnew") 
  or die("Could not select examples");

	
	
$nurse_procedure = "SELECT SUM(price) FROM enprocedure where pmrn='$pmrn' and eid='$eid'"; 
	 
$nurse_procedure1 = mysqli_query($dbhandle,$nurse_procedure) or die(mysql_error());

// Print out result
$nurse_procedure2 = mysqli_fetch_array($nurse_procedure1);
$nurse_procedure_price=	$nurse_procedure2['SUM(price)'];



	?>

	<tr><td colspan="20" align="right"bgcolor="lightgreen"><font size="6" color="#FF0000"><strong>Procedural Charge is:<?php

echo $nurse_procedure_price;?> (BDT)</strong></td></tr>	


	<tr><td colspan="20" align="center"bgcolor="lightgreen"><label><strong>Doctor's Procedure Notes</strong></label></td> </tr>
<tr>
      <td colspan="1" align="center"><strong>S.No</strong></td>
      <td colspan="10" align="center"><strong>Procedure Name</strong></td>
      <td colspan="1" align="center"><strong>MRN</strong></td>
      <td colspan="4" align="center"><strong>Date & Time </strong></td>
      
      <td colspan="4" align="center"><strong>Done By</strong></td>
	  

       

	   </tr>
 <?php
	
$user=$_SESSION["sess_username"];
//$pmrn=$data["pmrn"];
//$id=$_REQUEST["id"];
$episode=$data["eid"];
$count=1;
$sel_query="Select * from edprocedure where pmrn= '$pmrn'and eid='$eid' order by `id` DESC;";

$result = mysqli_query($con,$sel_query);

while($row = mysqli_fetch_assoc($result)) 
{ ?>    <tr>

      <td align="center" colspan="1"><?php echo $count; ?></td>
      <td align="center"colspan="10"><?php echo $row["infusion"]; ?></td>
      <td align="center"colspan="1"><?php echo $row["pmrn"]; ?></td>
	  <td align="center"colspan="4"><?php echo $row["odate"]; ?></td>  
      <td align="center"colspan="4"><?php echo $row["user"]; ?></td>
	  
  	  

	  
      </tr>
    <?php $count++; } ?>

	<tr><td colspan="20" align="center" bgcolor="skyblue"><label><strong>Stat Medicine Used</strong></label></td> </tr>
	
	<tr>
      <td colspan="1" align="center"><strong>S.No</strong></td>
      <td colspan="4" align="center"><strong>Order By</strong></td>
      <td colspan="1" align="center"><strong>MRN</strong></td>
      <td colspan="3" align="center"><strong>Order Date </strong></td>
     <td colspan="4" align="center"><strong>Done Date</strong></td>
      <td colspan="2" align="center"><strong>Done Time</strong></td>
       <td colspan="3" align="center"><strong>Stat Medication</strong></td>
	   <td colspan="2" align="center"><strong>Price</strong></td>

	   </tr>
 <?php
	
$user=$_SESSION["sess_username"];
//$pmrn=$data59["pmrn"];
//$id=$_REQUEST["id"];
$episode=$data59["eid"];

$count=1;
$sel_query="Select * from estat where pmrn= '$pmrn' and eid='$eid' and status in ('SEEN','Rupdated') order by `id` DESC;";

$result = mysqli_query($con,$sel_query);

while($row = mysqli_fetch_assoc($result)) 
{ ?>    <tr>

      <td align="center" colspan="1"><?php echo $count; ?></td>
      <td align="center"colspan="4"><?php echo $row["user"]; ?></td>
      <td align="center"colspan="1"><?php echo $row["pmrn"]; ?></td>
	  <td align="center"colspan="3"><?php echo $row["odate"]; ?></td>  
      <td align="center"colspan="4"><?php echo $row["ddate"]; ?></td>  
	  <td align="center"colspan="2"><?php echo $row["dtime"]; ?></td>
  	  <td align="center"colspan="3"><?php echo $row["infusion"]; ?></td>
	  <td align="center"colspan="2"><?php echo $row["uprice"]; ?></td>

	  
      </tr>
    <?php $count++; } ?>
	
<?php
	$username = "root";
$password = "Godiloveu16";
$hostname = "localhost"; 
//$pmrn=$row['pmrn'];
//$id=$row['id'];
//$eid=$row['eid'];
//connection to the database
$dbhandle = mysqli_connect($hostname, $username, $password) 
 or die("Unable to connect to MySQL");
//echo "Connected to MySQL<br>";

//select a database to work with
$selected = mysqli_select_db($dbhandle,"sfmmkpjnew") 
  or die("Could not select examples");

	
	
$medicine = "SELECT SUM(uprice) FROM estat where pmrn='$pmrn' and eid='$eid' and status in ('SEEN','Rupdated')"; 
	 
$medicine1 = mysqli_query($dbhandle,$medicine) or die(mysql_error());

// Print out result
$medicine2 = mysqli_fetch_array($medicine1);
$medicine_price=	$medicine2['SUM(uprice)'];



	?>

	<tr><td colspan="20" align="right"bgcolor="lightgreen"><font size="6" color="#FF0000"><strong>Medicine Charge is:<?php

echo $medicine_price;?> (BDT)</strong></td></tr>	
	
	
	<tr><td colspan="20" align="center"bgcolor="skyblue"><label><strong>Special Treatment</strong></label></td> </tr>
	
	<tr>
      <td colspan="1" align="center"><strong>S.No</strong></td>
      <td colspan="4" align="center"><strong>Order By</strong></td>
      <td colspan="1" align="center"><strong>MRN</strong></td>
      <td colspan="3" align="center"><strong>Order Date </strong></td>
 
      <td colspan="4" align="center"><strong>Done Date</strong></td>
      <td colspan="3" align="center"><strong>Special Treatment</strong></td>
	  <td colspan="2" align="center"><strong>Done By</strong></td>
       

	   </tr>
 <?php
	
$user=$_SESSION["sess_username"];
//$pmrn=$data59["pmrn"];
//$id=$_REQUEST["id"];
$episode=$data59["eid"];

$count=1;
$sel_query="Select * from estret where pmrn= '$pmrn' and eid='$eid'order by `id` DESC;";

$result = mysqli_query($con,$sel_query);

while($row = mysqli_fetch_assoc($result)) 
{ ?>    <tr>

      <td align="center" colspan="1"><?php echo $count; ?></td>
      <td align="center"colspan="4"><?php echo $row["user"]; ?></td>
      <td align="center"colspan="1"><?php echo $row["pmrn"]; ?></td>
	  <td align="center"colspan="3"><?php echo $row["odate"]; ?></td>  
      <td align="center"colspan="4"><?php echo $row["ddate"]; ?></td>  
	  <td align="center"colspan="3"><?php echo $row["infusion"]; ?></td>
	  <td align="center"colspan="2"><?php echo $row["duser"]; ?></td>
  	  

	  
      </tr>
    <?php $count++; } ?>
	
	
<tr><td colspan="20" align="center"bgcolor="lightgreen"><label><strong>Investigation Done</strong></label></td> </tr>
<tr>
      <td colspan="1" align="center"><strong>S.No</strong></td>
      <td colspan="1" align="center"><strong>MRN</strong></td>
      <td colspan="4" align="center"><strong>Requested By</strong></td>
      <td colspan="1" align="center"><strong>Order Date </strong></td>
      <td colspan="3" align="center"><strong>Investigation</strong></td>
      <td colspan="2" align="center"><strong>Remarks</strong></td>   
      <td colspan="2" align="center"><strong>Done Date</strong></td>
	  <td colspan="2" align="center"><strong>Result</strong></td>
       	  <td colspan="2" align="center"><strong>Done By</strong></td>
		  <td colspan="2" align="center"><strong>Price</strong></td>

	   </tr>
 <?php
	
$user=$_SESSION["sess_username"];
//$pmrn=$data["pmrn"];
//$id=$_REQUEST["id"];
$episode=$data["eid"];

$count=1;
$sel_query="Select * from einves where pmrn= '$pmrn' and eid='$eid' and rstatus in ('RECEIVED','SEEN') order by `id` DESC;";

$result = mysqli_query($con,$sel_query);

while($row = mysqli_fetch_assoc($result)) 
{ ?>    <tr>

      <td align="center" colspan="1"><?php echo $count; ?></td>
     <td align="center"colspan="1"><?php echo $row["pmrn"]; ?></td>
       <td align="center"colspan="4"><?php echo $row["user"]; ?></td>
	  <td align="center"colspan="1"><?php echo $row["odate"]; ?></td>  
	  <td align="center"colspan="3"><?php echo $row["infusion"]; ?></td>
	        <td align="center"colspan="2"><?php echo $row["room"]; ?></td>
      <td align="center"colspan="2"><?php echo $row["ddate"]; ?></td>  
	  <td align="center"colspan="2"><?php echo $row["otime"]; ?></td>
	  	  <td align="center"colspan="2"><?php echo $row["duser"]; ?></td>
		  <td align="center"colspan="2"><?php echo $row["price"]; ?></td>
  	  
  
      </tr>
    <?php $count++; } ?>	
	
<?php
	$username = "root";
$password = "Godiloveu16";
$hostname = "localhost"; 
//$pmrn=$row['pmrn'];
//$id=$row['id'];
//$eid=$row['eid'];
//connection to the database
$dbhandle = mysqli_connect($hostname, $username, $password) 
 or die("Unable to connect to MySQL");
//echo "Connected to MySQL<br>";

//select a database to work with
$selected = mysqli_select_db($dbhandle,"sfmmkpjnew") 
  or die("Could not select examples");

	
	
$inves = "SELECT SUM(price) FROM einves where pmrn='$pmrn' and eid='$eid' and rstatus in ('RECEIVED','SEEN')"; 
	 
$inves1 = mysqli_query($dbhandle,$inves) or die(mysql_error());

// Print out result
$inves2 = mysqli_fetch_array($inves1);
$inves_price=$inves2['SUM(price)'];



	?>

	<tr><td colspan="20" align="right"bgcolor="lightgreen"><font size="6" color="#FF0000"><strong>Investigation Charge is:<?php

echo $inves_price;?> (BDT)</strong></td></tr>	
	
	
	<tr><td colspan="20" align="center"bgcolor="lightgreen"><label><strong>Blood Requestded</strong></label></td> </tr>
<tr>
      <td colspan="1" align="center"><strong>S.No</strong></td>
      <td colspan="1" align="center"><strong>MRN</strong></td>
      <td colspan="4" align="center"><strong>Requested By</strong></td>
      <td colspan="1" align="center"><strong>Order Date </strong></td>
      <td colspan="3" align="center"><strong>Investigation</strong></td>
      <td colspan="2" align="center"><strong>Remarks</strong></td>   
      <td colspan="4" align="center"><strong>Done Date</strong></td>
	  <td colspan="2" align="center"><strong>Result</strong></td>
       	  <td colspan="2" align="center"><strong>Done By</strong></td>

	   </tr>
 <?php
	
$user=$_SESSION["sess_username"];
$pmrn=$data["pmrn"];
//$id=$_REQUEST["id"];
//$episode=$data["eid"];

$count=1;
$sel_query="Select * from eblood where pmrn= '$pmrn' and eid='$eid'  order by `id` DESC;";

$result = mysqli_query($con,$sel_query);

while($row = mysqli_fetch_assoc($result)) 
{ ?>    <tr>

      <td align="center" colspan="1"><?php echo $count; ?></td>
      <td align="center"colspan="1"><?php echo $row["pmrn"]; ?></td>
      <td align="center"colspan="4"><?php echo $row["user"]; ?></td>
	  <td align="center"colspan="1"><?php echo $row["odate"]; ?></td>  
	  <td align="center"colspan="3"><?php echo $row["infusion"]; ?></td>
	  <td align="center"colspan="2"><?php echo $row["room"]; ?></td>
      <td align="center"colspan="4"><?php echo $row["ddate"]; ?></td>  
	  <td align="center"colspan="2"><?php echo $row["otime"]; ?></td>
  	  <td align="center"colspan="2"><?php echo $row["duser"]; ?></td>
  	  
  
      </tr>
    <?php $count++; } ?>
	
	<tr><td colspan="20" align="center"bgcolor="lightgreen"><label><strong>Disposible Item Used</strong></label></td> </tr>
<tr>
      <td colspan="1" align="center"><strong>S.No</strong></td>
      <td colspan="1" align="center"><strong>MRN</strong></td>
	  <td colspan="8" align="center"><strong>Disposible Itme Name</strong></td>
      <td colspan="2" align="center"><strong>Quantity</strong></td>
      <td colspan="4" align="center"><strong>Date & Time </strong></td>
      
      <td colspan="2" align="center"><strong>Done By</strong></td>
	        <td colspan="2" align="center"><strong>Price</strong></td>
	  

       

	   </tr>
 <?php
	
$user=$_SESSION["sess_username"];
//$pmrn=$data["pmrn"];
//$id=$_REQUEST["id"];
//$episode=$data["eid"];
$count=1;
$sel_query="Select * from edisposible where pmrn= '$pmrn'and eid='$eid' order by `id` DESC;";

$result = mysqli_query($con,$sel_query);

while($row = mysqli_fetch_assoc($result)) 
{ ?>    <tr>

      <td align="center" colspan="1"><?php echo $count; ?></td>
      <td align="center"colspan="1"><?php echo $row["pmrn"]; ?></td>
	  <td align="center"colspan="8"><?php echo $row["infusion"]; ?></td>
      <td align="center"colspan="2"><?php echo $row["room"]; ?></td>
	  <td align="center"colspan="4"><?php echo $row["odate"]; ?></td>  
      <td align="center"colspan="2"><?php echo $row["user"]; ?></td>
	  <td align="center"colspan="2"><?php echo $row["price"]; ?></td>
	  
	  
  	  

	  
      </tr>
    <?php $count++; } ?>
	<?php
	$username = "root";
$password = "Godiloveu16";
$hostname = "localhost"; 
//$pmrn=$row['pmrn'];
//$id=$row['id'];
//$eid=$row['eid'];
//connection to the database
$dbhandle = mysqli_connect($hostname, $username, $password) 
 or die("Unable to connect to MySQL");
//echo "Connected to MySQL<br>";

//select a database to work with
$selected = mysqli_select_db($dbhandle,"sfmmkpjnew") 
  or die("Could not select examples");

	
	
$disposable = "SELECT SUM(price) FROM edisposible where pmrn='$pmrn' and eid='$eid'"; 
	 
$disposable1 = mysqli_query($dbhandle,$disposable) or die(mysql_error());

// Print out result
$disposable2 = mysqli_fetch_array($disposable1);
$disposable_price=	$disposable2['SUM(price)'];



	?>

	<tr><td colspan="20" align="right"bgcolor="lightgreen"><font size="6" color="#FF0000"><strong>Disposable Charge is:<?php

echo $disposable_price;?> (BDT)</strong></td></tr>	
	
	
	<tr><td colspan="20" align="center"bgcolor="lightgreen"><label><strong>Referral Doctor List</strong></label></td> </tr>
<tr>
      <td colspan="1" align="center"><strong>S.No</strong></td>
      <td colspan="1" align="center"><strong>MRN</strong></td>
      <td colspan="8" align="center"><strong>Referred By</strong></td>
      <td colspan="3" align="center"><strong>Referral Date  </strong></td>
      <td colspan="3" align="center"><strong>Referred To</strong></td>
      <td colspan="2" align="center"><strong>Referral Mode</strong></td>  
	  <td colspan="2" align="center"><strong>Referral Type</strong></td>   
      

	   </tr>
 <?php
	
$user=$_SESSION["sess_username"];
//$pmrn=$data["pmrn"];
//$id=$_REQUEST["id"];
$episode=$data["eid"];

$count=1;
$sel_query="Select * from erefferal where pmrn= '$pmrn' and eid='$eid'  order by `id` DESC;";

$result = mysqli_query($con,$sel_query);

while($row = mysqli_fetch_assoc($result)) 
{ ?>    <tr>

      <td align="center" colspan="1"><?php echo $count; ?></td>
     <td align="center"colspan="1"><?php echo $row["pmrn"]; ?></td>
       <td align="center"colspan="8"><?php echo $row["user"]; ?></td>
	  <td align="center"colspan="3"><?php echo $row["odate"]; ?></td>  
	  <td align="center"colspan="3"><?php echo $row["infusion"]; ?></td>
<td align="center"colspan="2"><?php echo $row["bed"]; ?></td>	  
      <td align="center"colspan="2"><?php echo $row["room"]; ?></td>
      
  
      </tr>
    <?php $count++; } ?>

<tr><td colspan="20" align="center"bgcolor="skyblue"><label><strong>Doctor's Note</strong></label></td> </tr>
<tr>
      <td colspan="1" align="center"><strong>S.No</strong></td>
      <td colspan="1" align="center"><strong>MRN</strong></td>
      <td colspan="4" align="center"><strong>Note By</strong></td>
      <td colspan="1" align="center"><strong>Date </strong></td>
      <td colspan="1" align="center"><strong>Time</strong></td>   
      <td colspan="1" align="center"><strong>Pain Score</strong></td>
	  <td colspan="3" align="center"><strong>Progress Note</strong></td>
	  <td colspan="6" align="center"><strong>Investigation/Treatment Plan</strong></td>
	  <td colspan="2" align="center"><strong>Charge</strong></td>

	   </tr>
 <?php
	
$user=$_SESSION["sess_username"];
//$pmrn=$data["pmrn"];
//$id=$_REQUEST["id"];
//$episode=$data["eid"];

$count=1;
$sel_query="Select * from ecnote where pmrn= '$pmrn' and eid='$eid'order by `id` DESC;";

$result = mysqli_query($con,$sel_query);

while($row = mysqli_fetch_assoc($result)) 
{ ?>    <tr>

      <td align="center" colspan="1"><?php echo $count; ?></td>
      <td align="center"colspan="1"><?php echo $row["pmrn"]; ?></td>
      <td align="center"colspan="4"><?php echo $row["user"]; ?></td>
	  <td align="center"colspan="1"><?php echo $row["odate"]; ?></td>  
      <td align="center"colspan="1"><?php echo $row["otime"]; ?></td>
	  <td align="center"colspan="1"><?php echo $row["infusion"]; ?></td>
	  <td align="center"colspan="3"><?php echo $row["pnote"]; ?></td>
      <td align="center"colspan="6"><?php echo $row["inves"]; ?></td>  
	  <td align="center"colspan="2"><?php echo $row["visit"]; ?></td>  
	  
  	  

	  
      </tr>
    <?php $count++; } ?>
	
	
	<?php
	$username = "root";
$password = "Godiloveu16";
$hostname = "localhost"; 
//$pmrn=$row['pmrn'];
//$id=$row['id'];
//$eid=$row['eid'];
//connection to the database
$dbhandle = mysqli_connect($hostname, $username, $password) 
 or die("Unable to connect to MySQL");
//echo "Connected to MySQL<br>";

//select a database to work with
$selected = mysqli_select_db($dbhandle,"sfmmkpjnew") 
  or die("Could not select examples");

	
	
	$query198j_doc = "SELECT SUM(visit) FROM ecnote where pmrn='$pmrn' and eid='$eid' and type='doctor'"; 
	 
$result198j_doc = mysqli_query($dbhandle,$query198j_doc) or die(mysql_error());

// Print out result
$row198j_doc = mysqli_fetch_array($result198j_doc);
$doc_visit=	$row198j_doc['SUM(visit)'];



	?>

	<tr><td colspan="20" align="right"bgcolor="lightgreen"><font size="6" color="#FF0000"><strong>Consultant Charge is:<?php

echo $doc_visit;?> (BDT)</strong></td></tr>		

<tr>



<?php


$queryae_ad = "SELECT SUM(amount) FROM advance_bill where pmrn='$pmrn'and eid='$eid' and location='AE' and dname='AE ADVANCE'"; 
	 
$resultae_ad = mysqli_query($dbhandle,$queryae_ad) or die(mysql_error());

// Print out result
$rowae_ad = mysqli_fetch_array($resultae_ad);



$queryae_adr = "SELECT SUM(amount) FROM advance_bill where pmrn='$pmrn'and eid='$eid' and location='AE' and dname='Refund'"; 
	 
$resultae_adr = mysqli_query($dbhandle,$queryae_adr) or die(mysql_error());

// Print out result
$rowae_adr = mysqli_fetch_array($resultae_adr);


$total_ad=	$rowae_ad['SUM(amount)']-$rowae_adr['SUM(amount)'];



$queryae_extra = "SELECT SUM(price) FROM ae_extra_charge where pmrn='$pmrn'and eid='$eid' and delete_status='0'"; 
	 
$resultae_extra = mysqli_query($dbhandle,$queryae_extra) or die(mysql_error());

// Print out result
$rowae_extra = mysqli_fetch_array($resultae_extra);
$total_extra=	$rowae_extra['SUM(price)'];

$room_price='0';
$total_charge=$doc_visit+$medicine_price+$disposable_price+$inves_price+$nurse_procedure_price;
$hos_charge=$disposable_price+$inves_price+$nurse_procedure_price+$room_price;
$total_dis=$data['hos1_dis']+$data['lab_dis']+$data['rad_dis'];
$total_payable=$total_charge+$total_extra-$total_dis-$total_ad-$data['doc_dis'];
$doc_dis=$data['doc_dis'];

//$dis_new=$total_dis+$total_ad;
$dis_new=$total_dis;



?>
<input type="hidden" name="doc_charge" value="<?php echo $doc_visit;?>">
<input type="hidden" name="medicine_charge" value="<?php echo $medicine_price;?>">
<input type="hidden" name="disposable_charge" value="<?php echo $disposable_price;?>">
<input type="hidden" name="inves_charge" value="<?php echo $inves_price;?>">
<input type="hidden" name="nurse_procedure_charge" value="<?php echo $nurse_procedure_price;?>">
<input type="hidden" name="room_charge" value="<?php echo '0';?>">
<input type="hidden" name="total_charge" value="<?php echo $total_charge;?>">
<input type="hidden" name="total_dis" value="<?php echo $dis_new;?>">
<input type="hidden" name="total_advance" value="<?php echo $total_ad;?>">
<input type="hidden" name="total_extra" value="<?php echo $total_extra;?>">
<input type="hidden" name="doc_dis" value="<?php echo $doc_dis;?>">

<input type="hidden"  name="total_payable" value="<?php echo $total_payable;?>">



<tr><td colspan="20" align="right"bgcolor="lightgreen"><font size="6" color="#FF0000"><strong>Total Charge is:<?php echo $total_charge;?>

</td></tr>

<tr><td colspan="20" align="right"bgcolor="lightgreen"><font size="6" color="#FF0000"><strong>
<a href="emergency_discount.php?pmrn=<?php echo $pmrn; ?>&eid=<?php echo $eid; ?>&inves=<?php echo $hos_charge; ?>&bed=<?php echo $room_price; ?>">Discount</a>

:<?php echo $total_dis;?>


</td></tr>
<tr><td colspan="20" align="right"bgcolor="lightgreen"><font size="6" color="#FF0000"><strong>
<a href=".php?pmrn=<?php echo $pmrn; ?>&eid=<?php echo $eid; ?>&inves=<?php echo $hos_charge; ?>&bed=<?php echo $room_price; ?>">Advance/Deposit</a>

:<?php echo $total_ad;?>


</td></tr>


<tr><td colspan="20" align="right"bgcolor="lightgreen"><font size="6" color="#FF0000"><strong>
<a href=".php?pmrn=<?php echo $pmrn; ?>&eid=<?php echo $eid; ?>&inves=<?php echo $hos_charge; ?>&bed=<?php echo $room_price; ?>">Other Charges</a>

:<?php echo $total_extra;?>


</td></tr>

<tr><td colspan="20" align="right"bgcolor="lightgreen"><font size="6" color="#FF0000"><strong>
Consultant Discount

:<?php echo $data['doc_dis'];?>


</td></tr>



<tr><td colspan="20" align="right"bgcolor="lightgreen"><font size="6" color="#FF0000"><strong>Total Payable is:<?php echo $total_payable;?>

</td></tr>

<tr>

<td colspan="20" align="right"bgcolor="lightgreen"><font size="6" color="#FF0000"><strong>Receive Amount

<input name="receive_amount" type="number" size="20" style="text-transform:uppercase;text-align:right;font-size:30px;width:200px;color:green" value="<?php echo $total_payable;?>">

</td>
</tr>


<tr>
<td colspan="20" hidden>
<input type="radio" id="vehicle1" name="vehicle1" value="Cash"  id="chkPassport"onclick="EnableDisableTextBox(this)"  style="height:20px; width:20px; color:red;"checked><span style="font-size:20px;color:red;font-weight:bold;">Cash</span>				 
<input type="radio" id="vehicle1" name="vehicle1" value="Bikash"id="chkPassport1" onclick="EnableDisableTextBox1(this)" style="height:20px; width:20px; color:red;"><span style="font-size:20px;color:red;font-weight:bold;">Bikash</span>	
<input type="radio" id="vehicle1" name="vehicle1" value="Card"id="chkPassport2" onclick="EnableDisableTextBox2(this)" style="height:20px; width:20px; color:red;"><span style="font-size:20px;color:red;font-weight:bold;">Card</span>				 
<input type="radio" id="vehicle1" name="vehicle1" value="Cheque"id="chkPassport3" onclick="EnableDisableTextBox3(this)" style="height:20px; width:20px; color:red;"><span style="font-size:20px;color:red;font-weight:bold;">Cheque</span>				 

      <input name="due_remarks" type="text" size="40" style="text-transform:uppercase" value="" id="sdate21" disabled="disabled" placeholder="Reference No">

</td>
</tr>

<tr>




<?php if($data['payment_status']!='PAID'){echo"
<td colspan='20'align='right'><button type='submit' name='Submit1' width='200px;'>Confirm</button>";
}
?>
</td>

</tr>
</table>


</form>

<form action="emergency_discount"method="post" name="dis_hos">
<input type="hidden"  name="pmrn" value="<?php echo $pmrn;?>">
<input type="hidden" name="eid" value="<?php echo $eid;?>">
<input type="hidden" name="hos_charge" value="<?php echo $hos_charge;?>">



</form>


<form action="emergency_discount_lab"method="post" name="dis_lab">
<input type="hidden"  name="pmrn" value="<?php echo $pmrn;?>">
<input type="hidden" name="eid" value="<?php echo $eid;?>">
<input type="hidden" name="hos_charge" value="<?php echo $hos_charge;?>">

<input type="submit" value="Discount Investigation">

</form>


<form action="ae_discount_lab_new"method="post" name="dis_doc">
<input type="hidden"  name="pmrn" value="<?php echo $pmrn;?>">
<input type="hidden" name="eid" value="<?php echo $eid;?>">
<input type="hidden" name="hos_charge" value="<?php echo $hos_charge;?>">

<input type="submit" value="Discount Consultant Charge">

</form>






<tr><td colspan="10" align="right"bgcolor="lightgreen"><font size="6" color="#FF0000"><strong><a href="ae_advance_bill.php?id=<?php echo $id; ?>&pmrn=<?php echo $pmrn; ?>&eid=<?php echo $eid; ?>">Deposit</a></strong></td>
<td colspan="10" align="right"bgcolor="lightgreen"><font size="6" color="#FF0000"><strong><a href="ae_extra_charge1.php?id=<?php echo $id; ?>&pmrn=<?php echo $pmrn; ?>&eid=<?php echo $eid; ?>">Other Charge</a></strong></td>
<td colspan="10" align="right"bgcolor="lightgreen"><font size="6" color="#FF0000"><strong><a href="hos_discount_new_ae.php?id=<?php echo $id;?>&pmrn=<?php echo $pmrn;?>&eid=<?php echo $eid;?>&bill=<?php echo $hos_bill_new;?>">HOS Discount</a></td>

</tr>	

</body>

</html>
 <script type="text/javascript">
    function EnableDisableTextBox(chkPassport) {
   
        
        var txtPassportNumber4 = document.getElementById("sdate21");
        txtPassportNumber4.disabled = chkPassport.unchecked ? false : true;
        if (!txtPassportNumber4.disabled) {
            txtPassportNumber4.focus();
        }
		
		
    }
	
		function EnableDisableTextBox1(chkPassport1) {
   
        
        var txtPassportNumber6 = document.getElementById("sdate21");
        txtPassportNumber6.disabled = chkPassport1.checked ? false : true;
        if (!txtPassportNumber6.disabled) {
            txtPassportNumber6.focus();
        }
	}
	
	function EnableDisableTextBox2(chkPassport2) {
   
        
        var txtPassportNumber6 = document.getElementById("sdate21");
        txtPassportNumber6.disabled = chkPassport2.checked ? false : true;
        if (!txtPassportNumber6.disabled) {
            txtPassportNumber6.focus();
        }
	}

  function EnableDisableTextBox3(chkPassport3) {
   
        
   var txtPassportNumber7 = document.getElementById("sdate21");
   txtPassportNumber7.disabled = chkPassport3.checked ? false : true;
   if (!txtPassportNumber7.disabled) {
       txtPassportNumber7.focus();
   }
}
</script>