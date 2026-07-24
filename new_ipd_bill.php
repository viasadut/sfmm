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
$user=$_SESSION["sess_username"];

//include("auth.php");
$pmrn=$_REQUEST['pmrn'];
$eid=$_REQUEST['eid'];
$eid5=$_REQUEST['eid'];
$id=$_REQUEST['id'];

$user1='root';
$pass='Godiloveu16';
$db1= new PDO('mysql:host=localhost; dbname=sfmmkpjnew', $user1, $pass);
$db1->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);


//$url="ipall_new_1?pmrn=$pmrn&id=$id&eid=$eid5";
$db = mysqli_connect('localhost','root','Godiloveu16');
mysqli_select_db($db,'sfmmkpjnew');
$query4 = mysqli_query($db,"select * from inpatient where pmrn='$pmrn' and eid='$eid'");
$data = mysqli_fetch_assoc($query4);
$emer_eid=$data['emerid'];


$query5 = mysqli_query($db,"select * from emergency where pmrn='$pmrn' and eid='$emer_eid'");
$data5 = mysqli_fetch_assoc($query5);
$emer_dis=$data5['disstatus'];

/*
$query5 = mysqli_query($db,"select * from ipres where pmrn='$pmrn' and discharge=''");
$data1 = mysqli_fetch_assoc($query5);

$query59 = mysqli_query($db,"select * from ot where pmrn='$pmrn' and eid='$eid'");
$data59 = mysqli_fetch_assoc($query59);
*/
  
?>


<?php
/*
Author: Javed Ur Rehman
Website: https://www.allphptricks.com/
*/
 
require('db1.php');





if(isset($_POST['insert7']))
{


$id_n = $_REQUEST['id_n'];
$ncharge = $_REQUEST['name'];

//$url = "bmi_search1?start=$start&end=$end";
$select="update icnote set ncharge='$ncharge' where id='$id_n'";
$sel=mysqli_query($con,$select) or die(mysql_error());


	header("Refresh: .1;");

}
?>



<?php
if(isset($_POST['Submit1']))
{
$payment=$_REQUEST['payment'];
$ot_payment=$_REQUEST['ot_payment'];
$in_payment=$_REQUEST['in_payment'];
$room_charge=$_REQUEST['room_charge'];
$inves_charge=$_REQUEST['inves_charge'];
$disposable_charge=$_REQUEST['disposable_charge'];
$doc_charge=$_REQUEST['doc_charge'];
$pharmacy_charge=$_REQUEST['pharmacy_charge'];
$ot_hos_charge=$_REQUEST['ot_hos_charge'];
$ot_doc_charge=$_REQUEST['ot_doc_charge'];
$ot_phar_charge=$_REQUEST['ot_phar_charge'];
$implant=$_REQUEST['implant'];
$extra=$_REQUEST['extra'];
$endo=$_REQUEST['endo'];
$opdpro=$_REQUEST['opdpro'];
$vehicle1=$_REQUEST['vehicle1'];
$due_remarks=$_REQUEST['due_remarks'];
$dis_medi=$_REQUEST['dis_medi'];
$emer_all_bill=$_REQUEST['emer_all_bill'];
$cath_bill=$_REQUEST['cath'];	
$msuite=$_REQUEST['msuite'];	
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
			

			$strSQL18 = "select COUNT(id) from inpatient where pmrn='$pmrn' and eid='$eid' and billno='$billno'";
			//$strSQL .="WHERE id = '".$_POST["chkDel"][$i]."' ";
			$objQuery18 = mysqli_query($objConnect,$strSQL18);
			$result18 = mysqli_fetch_array($objQuery18);

			
			$strSQL118 = "select COUNT(id) from inpatient where pmrn='$pmrn' and eid='$eid' and billno!=''";
			//$strSQL .="WHERE id = '".$_POST["chkDel"][$i]."' ";
			$objQuery118 = mysqli_query($objConnect,$strSQL118);
			$result118 = mysqli_fetch_array($objQuery118);
			
			
			$strSQL188 = "select COUNT(id) from pms_bill where pmrn='$pmrn' and eid='$eid' and dname='IPD'";
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
  $ipd='IPD';		
  $regi='100';
  $notseen='NOT SEEN';
  $ccgg1new_test1='ccgg1new_test1';
$payment_status='PAID';
$billinipd='';
  

  
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

$sql = "insert into pms_bill(pmrn,eid,location,amount,date,time,user,remarks,dname,s_no,p_mode,p_remarks) VALUES
('$pmrn', '$eid', '$ipd', '$payment', '$appdate', '$apptime', '$user', '$ipd', '$ipd','$mno', '$vehicle1','$due_remarks')";

if ($conn->query($sql) === TRUE and $user !='') {
  $last_id = $conn->insert_id;

  
  try {
	

$apptime=date('Y-m-d H:i:s');

$user1='root';
$pass='Godiloveu16';
$db1= new PDO('mysql:host=localhost; dbname=sfmmkpjnew', $user1, $pass);
$db1->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);




  

	
  $db1->beginTransaction();



$sh = $db1->prepare("UPDATE ot SET billno=?, payment=? WHERE pmrn=? and eid=?");
$sh->execute([$last_id, $ot_payment, $pmrn, $eid]);
	
$sh = $db1->prepare("UPDATE ipd_extra_charge SET billno=? WHERE pmrn=? and eid=?");
$sh->execute([$last_id, $pmrn, $eid]);

$sh = $db1->prepare("UPDATE endopapp SET billno=? WHERE pmrn=? and eid=?");
$sh->execute([$last_id, $pmrn, $eid]);

$sh = $db1->prepare("UPDATE procedure1 SET billno=? WHERE pmrn=? and eid=?");
$sh->execute([$last_id, $pmrn, $eid]);

$sh = $db1->prepare("UPDATE inpatient SET billno=?, payment=?, room_charge=?, inves_charge=?,
disposable_charge=?, doc_charge=?, pharmacy_charge=?, ot_hos_charge=?, ot_doc_charge=?, ot_phar_charge=?, 
implant=?, extra=?, endo=?, opdpro=?, payment_status=?, dis_medi=?, emer_bill=?, cath_bill=?, msuite_bill=? WHERE pmrn=? and eid=?");
$sh->execute([$last_id, $payment, $room_charge, $inves_charge, $disposable_charge, $doc_charge, $pharmacy_charge,
$ot_hos_charge, $ot_doc_charge, $ot_phar_charge, $implant, $extra, $endo, $opdpro, $payment_status, $dis_medi, $emer_bill, $cath_bill, $msuite, $pmrn, $eid]);



$db1->commit();

header("Location: ipd_bill_paper.php?adate1=$adate1&pmrn=$pmrn&dname=$dname&billno=$last_id&eid=$eid");  

$db1->commit();



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


  
  
}
			
 else {
  echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();
			

	

	

}


?>


<!DOCTYPE html>
<html lang="en" >

<head>
  <meta charset="UTF-8">
  <title>DETAIL IPD CHARGE</title>
  
      <style type="text/css">
<!--
.style1 {
	font-size: x-large;
	font-weight: bold;
	font-style: italic;
}
-->


div1 {
  height: 50px;
  width: 20%;
  border: 1px solid #4CAF50;
  float: right;
  
}

div2 {
  height: 20px;
  width: 150px;
  
  float: left;
  
}
button {
  padding: 19px 39px 18px 39px;
  color: green;
  background-color: #A085C6;
  /*#4bc970*/
  font-size: 8px;
  text-align: center;
  font-style: normal;
  border-radius: 5px;
  width: 10%;
  height: 5%
  border: 1px solid #8265B0;
  /*#3ac162*/
  border-width: 1px 1px 3px;
  box-shadow: 0 -1px 0 rgba(255,255,255,0.1) inset;
  margin-bottom: 10px;
}



#myInput {
  background-image: url('/css/searchicon.png');
  background-position: 10px 10px;
  background-repeat: no-repeat;
  width: 100%;
  font-size: 16px;
  padding: 12px 20px 12px 40px;
  border: 1px solid #ddd;
  margin-bottom: 12px;
}

#myInput1 {
  background-image: url('/css/searchicon.png');
  background-position: 10px 10px;
  background-repeat: no-repeat;
  width: 100%;
  font-size: 16px;
  padding: 12px 20px 12px 40px;
  border: 1px solid #ddd;
  margin-bottom: 12px;
}



#myTable {
  border-collapse: collapse;
  width: 100%;
  border: 1px solid #ddd;
  font-size: 18px;
}

#myTable th, #myTable td {
  text-align: left;
  padding: 12px;
}

#myTable tr {
  border-bottom: 1px solid #ddd;
}

#myTable tr.header, #myTable tr:hover {
  background-color: #f1f1f1;
}

</style>

    
<link rel="stylesheet" href="jsnew/bootstrap.min.css" />  
    <script src="jsnew/jjquery.min.js"></script>
    <script src="jsnew/bootstrap.min.js"></script>
   <link href="jsnew/jquery-ui.css" rel="stylesheet" />
    
    <script src="jsnew/jquery-1.12.4.js"></script>
    <script src="jsnew/jquery-ui.js"></script>
  
  




  <style type="text/css">
<!--
.style1 {font-weight: bold}
-->
  </style>
  

  <link rel="stylesheet" href="styles.css">

   <script src="script.js"></script>
 
<script src="jsnew/pprefixfree.min.js"></script>



<link rel="stylesheet" href="jsnew/jquery-ui.css">
<script src="jsnew/jquery.min.js"></script>
<script src="jsnew/jquery-ui.min.js"></script>




<script>
$(document).ready(function(){
    $("#add_data_Modal").on('shown.bs.modal', function(){
        $(this).find('input[type="number"]').focus();
    });
});
</script>

  
          <head>  
           <title>Webslesson Tutorial | PHP Ajax Update MySQL Data Through Bootstrap Modal</title>  
           
		   <link rel="stylesheet" href="jsnew/bootstrap.min.css" />  
    <script src="jsnew/jjquery.min.js"></script>
    <script src="jsnew/bootstrap.min.js"></script>
   <link href="jsnew/jquery-ui.css" rel="stylesheet" />
    
    
    <script src="jsnew/jquery-ui.js"></script>
	
      </head>  

<body>

<div id='cssmenu'>
<ul>
   <li><a href='idocdetails?pmrn=<?php echo "$pmrn"; ?>&eid=<?php echo "$eid"; ?>'><span>Home</span></a></li>
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
<h1 align="center"style="background-color:lightgreen;">PATIENT'S FINAL BILL SUMMARY </h1>
<!-- Form Title -->
        <div style="font-size:22px; font-weight:bold;color:green; padding-left: 250px;">
		

			<label><strong style="color:red;">Doctors's Name :<?php echo $data["adoc"]; ?></strong></label><br>
			<label><strong style="color:green;">Patient's MRN:<?php echo $data["pmrn"]; ?></strong></label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
<label><strong style="color:green;">Patient's Name:<?php echo $data["pname"]; ?></strong></label>			
<br><label><strong style="color:green;">Patient's Age:<?php echo $data["age"]; ?></strong></label>	&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;		
<label><strong style="color:green;">Patient's Gender:<?php echo $data["gender"]; ?></strong></label>

<br><label><strong style="color:green;">Patient's Phone:<?php echo $data["pphone"]; ?></strong></label>	&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;		
<label><strong style="color:green;">Admission Date:<?php echo $data["adate"]; ?></strong></label>
<br><label><strong style="color:green;">Room:<?php echo $data["room"]; ?></strong></label>	&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;		
<label><strong style="color:green;">Bed:<?php echo $data["room1"]; ?></strong></label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
<label><strong style="color:green;">Payment Status:<?php if($data['payment_status']=='PAID'){echo '<span style="color:green;font-weight:bold">'.$data["payment_status"].'</span>';} else{echo '<span style="color:red;font-weight:bold">NOT PAID</span>';}?></strong></label>
<br><label><strong style="color:green;">Address:<?php echo $data["padd"]; ?></strong></label>	&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;								
						
				
</div>


						 <table align="center" class="table table-bordered" id="dynamic_field">  


<tr colspan="20"><td></td></tr>






<tr><td colspan="20" align="center"bgcolor="lightgreen"><label><strong>Room Charge</strong></label></td> </tr>


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

	$query198j_bed = "SELECT SUM(charge) FROM newbed where pmrn= '$pmrn' and eid='$eid' "; 
	 
$result198j_bed = mysqli_query($dbhandle,$query198j_bed) or die(mysql_error());

// Print out result
$row198j_bed = mysqli_fetch_array($result198j_bed);
$test1c_bed=	$row198j_bed['SUM(charge)'];
$test1c_bed4=	$row198j_bed['SUM(charge)']+$fday8;

$total_bed_dis=	($test1c_bed4)*$data['room_dis']/100;


	$query198j_stay = "SELECT SUM(tdays),b_charge FROM newbed where pmrn= '$pmrn' and eid='$eid' "; 
	 
$result198j_stay = mysqli_query($dbhandle,$query198j_stay) or die(mysql_error());

// Print out result
$row198j_stay = mysqli_fetch_array($result198j_stay);

$total_day=	$row198j_stay['SUM(tdays)']/24;
$bed_charge_new=	$row198j_stay['b_charge'];


	?>
	
	
	
	<td colspan="16" align="left"bgcolor="lightgreen"><font size="6" color="#FF0000"><strong>Total Room Charge is:</strong></td>
	<td align="center"colspan="4"><a href="update_charge_room.php?pmrn=<?php echo $pmrn; ?>&eid=<?php echo $eid; ?>&charge=<?php echo $test1c_bed; ?>"><font size="6" color="#FF0000"><strong><?php if($total_day<1){echo $bed_charge_new;} else {echo $test1c_bed;}?> (BDT)</font></strong>Edit</a></td>
	</tr>



	
	
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

	  $query198ad = "SELECT SUM(uprice) FROM imedi3 where pmrn= '$pmrn' and eid='$eid' and udone !='' and reuse=''"; 
	 
$result198ad = mysqli_query($dbhandle, $query198ad) or die(mysql_error());

// Print out result
$row198ad = mysqli_fetch_array($result198ad);
$test1am=	$row198ad['SUM(uprice)'];

?>	  
<?php if($test1am>0){echo'	
<tr><td colspan="20" align="center"bgcolor="skyblue"><label><strong>Medicine Used</strong></label></td> </tr>
	
	<tr><td colspan="20" align="right"bgcolor="lightgreen"><font size="6" color="#FF0000"><strong>Total Medicine Charge is:'.$test1am.'(BDT)</strong></td></tr>
	
';}?>
	
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

	  $query198af = "SELECT SUM(price) FROM iinves where pmrn= '$pmrn' and eid='$eid' and status='RECEIVED' and type in('lab','Lab','LAB')"; 
	 
$result198af = mysqli_query($dbhandle,$query198af) or die(mysql_error());

// Print out result
$row198af = mysqli_fetch_array($result198af);
$test1al=	$row198af['SUM(price)'];

?>	  


	
<?php if($test1al>0){echo'	<tr><td colspan="16" align="right"bgcolor="lightgreen"><font size="6" color="#FF0000"><strong>Total Lab Charge is:'.$test1al.'(BDT)</strong></td>


</tr>';}?>


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

	  $query198af = "SELECT SUM(price) FROM iinves where pmrn= '$pmrn' and eid='$eid' and status='RECEIVED' and type in('rad','Rad','RAD')"; 
	 
$result198af = mysqli_query($dbhandle,$query198af) or die(mysql_error());

// Print out result
$row198af = mysqli_fetch_array($result198af);
$test1al_rad=	$row198af['SUM(price)'];

?>	  

<?php if($test1al_rad>0){echo'	<tr><td colspan="16" align="right"bgcolor="lightgreen"><font size="6" color="#FF0000"><strong>Total Lab Charge is:'.$test1al_rad.'(BDT)</strong></td>
';}?>



	
	
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

	  $query198ah = "SELECT SUM(price) FROM iinves where pmrn= '$pmrn' and eid='$eid' and status in ('RECEIVED','SEEN') and type in ('spd','spd1','ANJAN OPD ( ENT)','SPD')"; 
	 
$result198ah = mysqli_query($dbhandle,$query198ah) or die(mysql_error());

// Print out result
$row198ah = mysqli_fetch_array($result198ah);
$test1as=	$row198ah['SUM(price)'];

?>	  
	
	<?php if($test1as>0){echo'	<tr><td colspan="20" align="right"bgcolor="lightgreen"><font size="6" color="#FF0000"><strong>Total SPD Charge is:<?php echo $test1as;?> (BDT)</strong></td></tr>';}?>
	
	

	
	
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

	$query198 = "SELECT SUM(price) FROM inhoscharge where pmrn= '$pmrn' and eid='$eid'"; 
	 
$result198 = mysqli_query($dbhandle,$query198) or die(mysql_error());

// Print out result
$row198 = mysqli_fetch_array($result198);
$test1=	$row198['SUM(price)'];



	?>
	<?php if($test1>0){echo'	<tr>
	<td colspan="16" align="right"bgcolor="lightgreen"><font size="6" color="#FF0000"><strong>Total Hospital Charge is:'.$test1.'(BDT)</strong></td>
  
	</tr>';}?>
	
	
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

	$query198j = "SELECT SUM(charge) FROM icnote where pmrn= '$pmrn' and eid='$eid'"; 
	 
$result198j = mysqli_query($dbhandle,$query198j) or die(mysql_error());

// Print out result
$row198j = mysqli_fetch_array($result198j);
$test1c=	$row198j['SUM(charge)'];



	?>
	
	<?php if($test1c>0){echo'	<tr><td colspan="16" align="right"bgcolor="lightgreen"><font size="6" color="#FF0000"><strong>Total Doctor Charge is:'.$test1c.' (BDT)</strong>
  
  
  </td>
	</tr>';}?>

	
	


		

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

	
	
	$opd_procedure = "SELECT SUM(price) FROM prohoscharge where pmrn= '$pmrn' and ieid='$eid' "; 
	 
$opd_procedure_res = mysqli_query($dbhandle,$opd_procedure) or die(mysql_error());

// Print out result
$opd_procedure_data = mysqli_fetch_array($opd_procedure_res);
$opd_procedure_sum=	$opd_procedure_data['SUM(price)'];

$opd_procedure_medi = "SELECT SUM(price) FROM promediused where pmrn= '$pmrn' and ieid='$eid' "; 
	 
$opd_procedure_res_medi = mysqli_query($dbhandle,$opd_procedure_medi) or die(mysql_error());

// Print out result
$opd_procedure_data_medi = mysqli_fetch_array($opd_procedure_res_medi);
$opd_procedure_sum_medi=	$opd_procedure_data_medi['SUM(price)'];


$opd_procedure_doc = "SELECT SUM(procharge) FROM procedure1 where pmrn= '$pmrn' and ieid='$eid' "; 
	 
$opd_procedure_res_doc = mysqli_query($dbhandle,$opd_procedure_doc) or die(mysql_error());

// Print out result
$opd_procedure_data_doc = mysqli_fetch_array($opd_procedure_res_doc);
$opd_procedure_sum_doc=	$opd_procedure_data_doc['SUM(procharge)'];

$opd_pro_summary=$opd_procedure_sum+$opd_procedure_sum_medi+$opd_procedure_sum_doc;

	?>
	
<?php if($opd_pro_summary>0){echo'	<tr><td align="right"bgcolor="lightgreen" colspan="20"><a target="_blank href="proused.php?pmrn='.$row['pmrn'].'&id='.$row['id'].'&eid='.$row['eid'].'&dname='.$row['dname'].'"><font size="6" color="#FF0000"><strong>OPD Procedure Charge is: '.$opd_pro_summary.'</strong></a></td></tr>
';}?>		
	


	
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

	
	
$opd_msuite = "SELECT SUM(price) FROM prohoscharge_ms where pmrn= '$pmrn' and ieid='$eid' "; 
	 
$opd_msuite_res = mysqli_query($dbhandle,$opd_msuite) or die(mysql_error());

// Print out result
$opd_msuite_data = mysqli_fetch_array($opd_msuite_res);
$opd_msuite_sum=	$opd_msuite_data['SUM(price)'];

$opd_msuite_medi = "SELECT SUM(price) FROM promediused_ms where pmrn= '$pmrn' and ieid='$eid' "; 
	 
$opd_msuite_res_medi = mysqli_query($dbhandle,$opd_msuite_medi) or die(mysql_error());

// Print out result
$opd_msuite_data_medi = mysqli_fetch_array($opd_msuite_res_medi);
$opd_msuite_sum_medi=	$opd_msuite_data_medi['SUM(price)'];


$opd_msuite_doc = "SELECT SUM(procharge_ms) FROM m_suite where pmrn= '$pmrn' and ieid='$eid' "; 
	 
$opd_msuite_res_doc = mysqli_query($dbhandle,$opd_msuite_doc) or die(mysql_error());

// Print out result
$opd_msuite_data_doc = mysqli_fetch_array($opd_msuite_res_doc);
$opd_msuite_sum_doc=	$opd_msuite_data_doc['SUM(procharge)'];

$opd_msuite_summary=$opd_msuite_sum+$opd_msuite_sum_medi+$opd_msuite_sum_doc;

	?>


	
<?php if($opd_msuite_summary>0){echo'	<tr><td align="right"bgcolor="lightgreen" colspan="20"><a target="_blank href="proused.php?pmrn='.$row['pmrn'].'&id='.$row['id'].'&eid='.$row['eid'].'&dname='.$row['dname'].'"><font size="6" color="#FF0000"><strong>Maternity Suite Procedure Charge is: '.$opd_msuite_summary.'</strong></a></td></tr>
';}?>		
	



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

	
	
	$opd_cath = "SELECT SUM(price) FROM cathhoscharge where pmrn= '$pmrn' and ieid='$eid' "; 
	 
$opd_cath_res = mysqli_query($dbhandle,$opd_cath) or die(mysql_error());

// Print out result
$opd_cath_data = mysqli_fetch_array($opd_cath_res);
$opd_cath_sum=	$opd_cath_data['SUM(price)'];

$opd_cath_medi = "SELECT SUM(price) FROM cathmediused where pmrn= '$pmrn' and ieid='$eid' "; 
	 
$opd_cath_res_medi = mysqli_query($dbhandle,$opd_cath_medi) or die(mysql_error());

// Print out result
$opd_cath_data_medi = mysqli_fetch_array($opd_cath_res_medi);
$opd_cath_sum_medi=	$opd_cath_data_medi['SUM(price)'];


$opd_cath_doc = "SELECT SUM(procharge) FROM cath_receive where pmrn= '$pmrn' and ieid='$eid' "; 
	 
$opd_cath_res_doc = mysqli_query($dbhandle,$opd_cath_doc) or die(mysql_error());

// Print out result
$opd_cath_data_doc = mysqli_fetch_array($opd_cath_res_doc);
$opd_cath_sum_doc=	$opd_cath_data_doc['SUM(procharge)'];

$opd_cath_summary=$opd_cath_sum+$opd_cath_sum_medi+$opd_cath_sum_doc;

	?>


<?php if($opd_cath_summary>0){echo'	<tr>	
<td align="right"bgcolor="lightgreen" colspan="20"><a target="_blank" href="cath_used.php?pmrn='.$row['pmrn'].'&id='.$row['id'].'&eid='.$row['eid'].'&dname='.$row['dname'].'"><font size="6" color="#FF0000"><strong>Cathlab Charge is: '.$opd_cath_summary.'</strong></a></td>
</tr>';}?>		
	

	
	
	
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

	
	
	$endo_doc = "SELECT SUM(room) FROM ivisitendo where pmrn= '$pmrn' and ieid='$eid' "; 
	 
$endo_doc_res = mysqli_query($dbhandle,$endo_doc) or die(mysql_error());

// Print out result
$endo_doc_data = mysqli_fetch_array($endo_doc_res);
$endo_doc_sum=	$endo_doc_data['SUM(room)'];

$endo_hos = "SELECT SUM(price) FROM endohoscharge1 where pmrn= '$pmrn' and ieid='$eid' "; 
	 
$endo_hos_q = mysqli_query($dbhandle,$endo_hos) or die(mysql_error());

// Print out result
$endo_hos_data = mysqli_fetch_array($endo_hos_q);
$endo_hos_sum=	$endo_hos_data['SUM(price)'];


$endo_medi = "SELECT SUM(price) FROM endohoscharge where pmrn= '$pmrn' and ieid='$eid' "; 
	 
$endo_medi_q = mysqli_query($dbhandle,$endo_medi) or die(mysql_error());

// Print out result
$endo_medi_data = mysqli_fetch_array($endo_medi_q);
$endo_medi_sum=	$endo_medi_data['SUM(price)'];

$endo_summary=$endo_doc_sum+$endo_hos_sum+$endo_medi_sum;

	?>


<?php if($endo_summary>0){echo'	<tr>		
<td align="right"bgcolor="lightgreen" colspan="20"><a target="_blank" href="endouse.php?pmrn='.$row['pmrn'].'&eid='.$row['eid'].'&full='.$row['dreffer'].'"><font size="6" color="#FF0000"><strong>Endoscopy Suite Charge is: '.$endo_summary.'</strong></a></td></tr>
';}?>
	

	
	

	
	
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

	$query198_dis = "SELECT SUM(tprice) FROM idismedi where pmrn= '$pmrn' and eid='$eid' and status='Served'"; 
	 
$result198_dis = mysqli_query($dbhandle,$query198_dis) or die(mysql_error());

// Print out result
$row198_dis = mysqli_fetch_array($result198_dis);
$test1_dis=	$row198_dis['SUM(tprice)'];



	?>
	
	<?php if($endo_summary>0){echo'	<tr><td colspan="20" align="right"bgcolor="lightgreen"><font size="6" color="#FF0000"><strong>Total Discharge Medicine Charge is:'.$test1_dis.' (BDT)</strong></td>
  
	</tr>';}?>




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

  
  
$emer_medi = "SELECT SUM(uprice) FROM estat where pmrn= '$pmrn' and eid='$emer_eid' and pstatus='Served'"; 

	 
$emer_medi_1 = mysqli_query($dbhandle, $emer_medi) or die(mysql_error());

// Print out result
$emer_medi_res = mysqli_fetch_array($emer_medi_1);
$emer_medi_bill=	$emer_medi_res['SUM(uprice)'];


$emer_inves = "SELECT SUM(price) FROM einves where pmrn= '$pmrn' and eid='$emer_eid' and status in ('RECEIVED','SEEN')"; 
	 
$emer_inves_1 = mysqli_query($dbhandle, $emer_inves) or die(mysql_error());

// Print out result
$emer_inves_res = mysqli_fetch_array($emer_inves_1);
$emer_inves_bill=	$emer_inves_res['SUM(price)'];

$emer_dispo = "SELECT SUM(price) FROM edisposible where pmrn= '$pmrn' and eid='$emer_eid'"; 
	 
$emer_dispo_1 = mysqli_query($dbhandle, $emer_dispo) or die(mysql_error());

// Print out result
$emer_dispo_res = mysqli_fetch_array($emer_dispo_1);
$emer_dispo_bill=	$emer_dispo_res['SUM(price)'];


$emer_evisit = "SELECT SUM(visit) FROM ecnote where pmrn= '$pmrn' and eid='$emer_eid'"; 
	 
$emer_evisit_1 = mysqli_query($dbhandle, $emer_evisit) or die(mysql_error());

// Print out result
$emer_evisit_res = mysqli_fetch_array($emer_evisit_1);
$emer_evisit_bill=	$emer_evisit_res['SUM(visit)'];

$nurse_procedure = "SELECT SUM(price) FROM enprocedure where pmrn='$pmrn' and eid='$emer_eid'"; 
	 
$nurse_procedure1 = mysqli_query($dbhandle,$nurse_procedure) or die(mysql_error());

// Print out result
$nurse_procedure2 = mysqli_fetch_array($nurse_procedure1);
$nurse_procedure_price=	$nurse_procedure2['SUM(price)'];


$emer_all_bill=$emer_evisit_bill+$emer_dispo_bill+$emer_inves_bill+$emer_medi_bill+$nurse_procedure_price+3000;
?>	  

<?php if($emer_all_bill>0){echo '<tr>	<td colspan="20" align="right"bgcolor="lightgreen"><font size="6" color="#FF0000"><strong>Total Emergency Charge is:'.$emer_all_bill.' (BDT)</strong></td>
  
  </tr>

	';}?>

  
	
	
	
<?php
	$username = "root";
$password = "Godiloveu16";
$hostname = "localhost"; 
$pmrn=$row['pmrn'];
$id=$row['id'];
//$eid=$row['eid'];
//connection to the database
$dbhandle = mysqli_connect($hostname, $username, $password) 
 or die("Unable to connect to MySQL");
//echo "Connected to MySQL<br>";

//select a database to work with
$selected = mysqli_select_db($dbhandle,"sfmmkpjnew") 
  or die("Could not select examples");

	
	
	$query198j_doc = "SELECT SUM(room) FROM otivisitendo where pmrn= '$pmrn' and eid='$id' "; 
	 
$result198j_doc = mysqli_query($dbhandle,$query198j_doc) or die(mysql_error());

// Print out result
$row198j_doc = mysqli_fetch_array($result198j_doc);
$test1c_doc=	$row198j_doc['SUM(room)'];


$query198j_dis = "SELECT SUM(ins) FROM othoscharge where pmrn= '$pmrn' and eid='$id' "; 
	 
$result198j_dis = mysqli_query($dbhandle,$query198j_dis) or die(mysqli_error());

// Print out result
$row198j_dis = mysqli_fetch_array($result198j_dis);
$test1c_dis=	$row198j_dis['SUM(ins)'];

$query198j_medi = "SELECT SUM(ins) FROM othoscharge1 where pmrn= '$pmrn' and eid='$id' "; 
	 
$result198j_medi = mysqli_query($dbhandle,$query198j_medi) or die(mysqli_error());

// Print out result
$row198j_medi = mysqli_fetch_array($result198j_medi);
$test1c_medi=	$row198j_medi['SUM(ins)'];


$query198j_amedi = "SELECT SUM(price) FROM otanaesmedi where pmrn= '$pmrn' and eid='$id' "; 
	 
$result198j_amedi = mysqli_query($dbhandle,$query198j_amedi) or die(mysqli_error());

// Print out result
$row198j_amedi = mysqli_fetch_array($result198j_amedi);
$test1c_amedi=	$row198j_amedi['SUM(price)'];

$query198j_ainfu = "SELECT SUM(price) FROM otanaesinfusion where pmrn= '$pmrn' and eid='$id' "; 
	 
$result198j_ainfu = mysqli_query($dbhandle,$query198j_ainfu) or die(mysqli_error());

// Print out result
$row198j_ainfu = mysqli_fetch_array($result198j_ainfu);
$test1c_ainfu=	$row198j_ainfu['SUM(price)'];




$payment=$test1c+$test1+$test1as+$test1a1+$test1al+$test1al_rad+$test1ai+$test1am+$test1c_bed+$test1c_doc+$test1c_dis+$test1c_medi+$test1c_amedi+$test1c_ainfu+$implant+$extra+$test1_dis-$test1al_rad_dis-$total_bed_dis;

$ot_payment=$test1c_doc+$test1c_dis+$test1c_medi+$test1c_amedi+$test1c_ainfu-$data['ot_hos_dis']-$data['ot_doc_dis'];
$in_payment=$test1c+$test1+$test1as+$test1a1+$test1al+$test1al_rad+$test1ai+$test1am+$test1c_bed-$test1al_rad_dis-$total_bed_dis;
$payable=$test1c+$test1+$test1as+$test1a1+$test1al+$test1al_rad+$test1ai+$test1am+$test1c_bed+$test1c_doc+$test1c_dis+$test1c_medi+$test1c_amedi+$test1c_ainfu+$implant+$extra+$endo_summary+$opd_pro_summary+$test1_dis+$emer_all_bill-$test1al_rad_dis-$total_bed_dis-$data['hos1_dis']-$data['hos_doc_dis']-$data['advance'];




	?>


<?php if($ot_payment>0){echo '<tr>	
<td align="right"bgcolor="lightgreen" colspan="20"><font size="6" color="#FF0000"><strong>OT Charge is: '.$ot_payment.' BDT</strong></td>		
</tr>';}?>	



<?php

	$username = "root";
$password = "Godiloveu16";
$hostname = "localhost"; 
$pmrn=$_REQUEST['pmrn'];
$eid=$_REQUEST['eid'];
//connection to the database
$dbhandle = mysqli_connect($hostname, $username, $password) 
 or die("Unable to connect to MySQL");
//echo "Connected to MySQL<br>";

//select a database to work with
$selected = mysqli_select_db($dbhandle,"sfmmkpjnew") 
  or die("Could not select examples");


$query198j_implant = "SELECT SUM(price) FROM ipd_extra_charge where pmrn='$pmrn' and eid='$eid' and medi LIKE '%IMPLANT%' "; 
	 
$result198j_implant = mysqli_query($dbhandle,$query198j_implant) or die(mysqli_error());

// Print out result
$row198j_implant = mysqli_fetch_array($result198j_implant);
$implant=	$row198j_implant['SUM(price)'];

$query198j_extra = "SELECT SUM(price) FROM ipd_extra_charge where pmrn='$pmrn' and eid='$eid' and medi NOT LIKE '%IMPLANT%'"; 
	 
$result198j_extra = mysqli_query($dbhandle,$query198j_extra) or die(mysqli_error());

// Print out result
$row198j_extra = mysqli_fetch_array($result198j_extra);
$extra=	$row198j_extra['SUM(price)'];

$new_hos_dis=$data['hos1_dis']+$data['lab_dis']+$data['rad_dis']+$data['room_dis'];

$in_new_charge1=$test1c+$test1+$test1as+$test1a1+$test1al+$test1al_rad+$test1ai+$test1am+$test1c_bed+$implant+$extra+$ot_payment+$emer_all_bill+$test1_dis+$opd_pro_summary+$endo_summary+$opd_cath_summary+$opd_msuite_summary;
$in_new_charge2=$test1c+$test1+$test1as+$test1a1+$test1al+$test1al_rad+$test1ai+$test1am+$bed_charge_new+$implant+$extra+$ot_payment+$emer_all_bill+$test1_dis+$opd_pro_summary+$endo_summary+$opd_cath_summary+$opd_msuite_summary;
$new_payable1=round($in_new_charge1-$data['hos_doc_dis']-$data['advance']-$new_hos_dis);
$new_payable2=round($in_new_charge2-$data['hos_doc_dis']-$data['advance']-$new_hos_dis);

$in_ipd_charge1=$test1c+$test1+$test1as+$test1a1+$test1al+$test1al_rad+$test1ai+$test1am+$test1c_bed+$implant+$extra+$endo_summary+$opd_pro_summary+$opd_cath_summary+$opd_msuite_summary;
$in_ipd_charge2=$test1c+$test1+$test1as+$test1a1+$test1al+$test1al_rad+$test1ai+$test1am+$bed_charge_new+$implant+$extra+$endo_summary+$opd_pro_summary+$opd_cath_summary+$opd_msuite_summary;




?>



<tr><td colspan="20" align="right"bgcolor="lightgreen"><font size="6" color="#FF0000"><strong>Total Inpatient Charge is:<?php

if($total_day<1){echo $in_ipd_charge2;} else {echo $in_ipd_charge1;} ?> (BDT)</strong></td></tr>	
<tr><td colspan="20" align="right"bgcolor="lightgreen"><font size="6" color="#FF0000"><strong>Discharge Medicine Charge is:<?php echo $test1_dis;?> (BDT)</strong></td></tr>	

<tr><td colspan="20" align="right"bgcolor="lightgreen"><font size="6" color="#FF0000"><strong>Grand Total is:<?php if($total_day<1){echo $in_new_charge2;} else {echo $in_new_charge1;};?> (BDT)</strong></td></tr>	

<tr><td colspan="20" align="right"bgcolor="lightgreen"><font size="6" color="#FF0000"><strong>Advance / Deposit Amount:<?php echo $data['advance'];?> (BDT)</strong></td></tr>	

<tr><td colspan="20" align="right"bgcolor="lightgreen"><font size="6" color="#FF0000"><strong><a href="update_ot_hos_charge.php?id=<?php echo $id; ?>&pmrn=<?php echo $pmrn; ?>&tdis=<?php echo $total_dis; ?>">Hospital Discount:</a><?php echo $new_hos_dis;?> (BDT)</strong></td></tr>	
<tr><td colspan="20" align="right"bgcolor="lightgreen"><font size="6" color="#FF0000"><strong><a href="update_ot_hos_charge.php?id=<?php echo $id; ?>&pmrn=<?php echo $pmrn; ?>&tdis=<?php echo $total_dis; ?>">Consultant Discount:</a><?php echo $data['hos_doc_dis'];?> (BDT)</strong></td></tr>	

<tr><td colspan="20" align="right"bgcolor="lightgreen"><font size="6" color="#FF0000"><strong>Payable Amount is:
<?php if($total_day<1){echo $new_payable2;} else {echo $new_payable1;};?> (BDT)</strong></td></tr>	


</table>

<input type="hidden" name="room_charge" value="<?php if($total_day<1){echo $bed_charge_new;} else {echo $test1c_bed;}?>">
<input type="hidden" name="inves_charge" value="<?php echo $test1al + $test1al_rad + $test1as;?>">
<input type="hidden" name="disposable_charge" value="<?php echo $test1;?>">
<input type="hidden" name="doc_charge" value="<?php echo $test1c;?>">
<input type="hidden" name="pharmacy_charge" value="<?php echo $test1am;?>">
<input type="hidden" name="ot_hos_charge" value="<?php echo $test1c_dis;?>">

<input type="hidden" name="ot_doc_charge" value="<?php echo $test1c_doc;?>">
<input type="hidden" name="ot_phar_charge" value="<?php echo $test1c_medi+$test1c_amedi+$test1c_ainfu;?>">
<input type="text" name="implant" value="<?php echo $implant;?>">
<input type="text" name="extra" value="<?php echo $extra;?>">
<input type="hidden" name="endo" value="<?php echo $endo_summary;?>">
<input type="hidden" name="opdpro" value="<?php echo $opd_pro_summary;?>">
<input type="text" name="cath" value="<?php echo $opd_cath_summary;?>">
<input type="text" name="msuite" value="<?php echo $opd_msuite_summary;?>">



<input type="text" name="payment" value="<?php if($total_day<1){echo $new_payable2;} else {echo $new_payable1;}?>">
<input type="hidden" name="ot_payment" value="<?php echo $ot_payment;?>">
<input type="hidden" name="in_payment" value="<?php echo $in_payment;?>">
<input type="hidden" name="dis_medi" value="<?php echo $test1_dis;?>">
<input type="hidden" name="emer_all_bill" value="<?php echo $emer_all_bill;?>">

<input type="radio" id="vehicle1" name="vehicle1" value="Cash"  id="chkPassport"onclick="EnableDisableTextBox(this)"  style="height:20px; width:20px; color:red;"checked><span style="font-size:20px;color:red;font-weight:bold;">Cash</span>				 
<input type="radio" id="vehicle1" name="vehicle1" value="Bikash"id="chkPassport1" onclick="EnableDisableTextBox1(this)" style="height:20px; width:20px; color:red;"><span style="font-size:20px;color:red;font-weight:bold;">Bikash</span>	
<input type="radio" id="vehicle1" name="vehicle1" value="Card"id="chkPassport2" onclick="EnableDisableTextBox2(this)" style="height:20px; width:20px; color:red;"><span style="font-size:20px;color:red;font-weight:bold;">Card</span>				 

<input name="due_remarks" type="text" size="40" style="text-transform:uppercase" value="" id="sdate21" disabled="disabled" placeholder="Reference No">

</td>




<?php if($data['payment_status']!='PAID'){echo"

<td colspan='20'align='right'><button type='submit' name='Submit1' width='200px;'>Confirm</button>";
}
?>
</td>
</form>

<form action="ipd_discount_lab"method="post" name="dis_lab">
<input type="hidden"  name="pmrn" value="<?php echo $pmrn;?>">
<input type="hidden" name="eid" value="<?php echo $eid;?>">
<input type="hidden" name="hos_charge" value="<?php echo $hos_charge;?>">

<input type="submit" value="discount_lab">

</form>

<tr><td colspan="10" align="right"bgcolor="lightgreen"><font size="6" color="#FF0000"><strong><a href="ipd_advance_bill.php?id=<?php echo $id; ?>&pmrn=<?php echo $pmrn; ?>&eid=<?php echo $eid; ?>">Deposit</a></strong></td>
<td colspan="10" align="right"bgcolor="lightgreen"><font size="6" color="#FF0000"><strong><a href="ipd_extra_charge1.php?id=<?php echo $id; ?>&pmrn=<?php echo $pmrn; ?>&eid=<?php echo $eid; ?>">Other Charge</a></strong></td></tr>	
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
</script>

