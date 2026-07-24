<?php 
   session_start();
    require('db1.php');
	$role = $_SESSION['sess_userrole'];
	
	$queryc = "SELECT COUNT(utype) FROM user where '$role' in ('mng','billin','bill','doctor','imo','nurse','ddf')"; 
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
$pmrn5=$_REQUEST['pmrn'];

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
$adoc=$data['adoc'];
$id=$data['id'];

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
$msuite_bill=$_REQUEST['msuite'];	
$receive_amount=$_REQUEST['receive_amount'];	
$gtotal=$_REQUEST['gtotal'];	
$service_charge=$_REQUEST['service_charge'];	
$outstanding=$payment-$receive_amount;
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
$rstatus='RECEIVED';
  
$dis_date= date('Y-m-d');
  
  $servername = "localhost";
$username1 = "root";
$password1 = "Godiloveu16";
$dbname1 = "sfmmkpjnew";

header("Location:new_bill/new_ipd_payment.php?id=$id&pmrn=$pmrn&dname=$dname&billno=$last_id&eid=$eid");  


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
<tr>
      <td colspan="1" align="center"><strong>S.No</strong></td>
      <td colspan="1" align="center"><strong>MRN</strong></td>
      <td colspan="2" align="center"><strong>Ward</strong></td>
      <td colspan="2" align="center"><strong>Bed No</strong></td>
      <td colspan="4" align="center"><strong>Admit Date</strong></td>
      <td colspan="4" align="center"><strong>Transfer Date</strong></td>   
      <td colspan="2" align="center"><strong>Bed Charge Per Day</strong></td>   
	  <td colspan="2" align="center"><strong>Days Staying</strong></td>   
	  <td colspan="2" align="center"><strong>Total Charge</strong></td>   

	   </tr>
 <?php
	
$user=$_SESSION["sess_username"];
$pmrn=$data["pmrn"];
//$id=$_REQUEST["id"];
$episode=$data["eid"];

$count=1;
$sel_query="Select * from newbed_new where pmrn= '$pmrn' and eid='$episode' order by `id` DESC;";

$result = mysqli_query($con,$sel_query);
$rows=mysqli_num_rows($result);


while($row = mysqli_fetch_assoc($result)) 
{ ?>    <tr>

      <td align="center" colspan="1"><?php echo $count; ?></td>
     <td align="center"colspan="1"><?php echo $row["pmrn"]; ?></td>
       <td align="center"colspan="2"><?php echo $row["type"]; ?></td>
	  <td align="center"colspan="2"><?php echo $row["bno"]; ?></td>  
	  <td align="center"colspan="4"><?php echo $row["adatenew"]; ?></td>
	        <td align="center"colspan="4"><?php echo $row["adatenew1"]; ?></td>
			
			
			
						<td align="center" colspan="2"style="font:Verdana, Arial, Helvetica, sans-serif large" style="font-weight:bold">
			<?php 
			
$bed=$row['bno'];
$query_bed = mysqli_query($db,"select * from bed where bno='$bed'");
$charge_bed = mysqli_fetch_assoc($query_bed);
$b_charge=$charge_bed['charge'];



echo $row['b_charge'];
?>  </td>

			
			
			<td align="center" colspan="2" style="font:Verdana, Arial, Helvetica, sans-serif large" style="font-weight:bold">
			<?php 
			
			$date_v= date('m/d/Y');
			$start_d=$row["adatenew1"];
			/*$date=date('Y-m-d',strtotime($start_d));
			//$date=date('m/d/Y',strtotime($start_d));
			
			$start=$row["adatenew"];
			//$start1=date('m/d/Y',strtotime($start));
			$start1=date('Y-m-d',strtotime($start));
			$date1=date_create("$start1");
			//echo $date_t=date('H:i:s',strtotime($start));
$date2=date_create("$date");
$date2_v=date_create("$date_v");
$diff=date_diff($date1,$date2);

$diff1=date_diff($date1,$date2_v);

$now = strtotime("$start_d");
$now2 = date('Y-m-d H:i:'); 
$now1 = strtotime($now2); 
$your_date = strtotime("$start");
$datediff = $now - $your_date;
$datediff1 = $now1 - $your_date;
if($datediff>=0)
{echo $fday= round($datediff/(60*60*24),2) ;
}

else
{echo "-" ;
}
*/
//echo $now = time();
//if ($rows==1 and $start_d=='') {echo '1';}else if ($rows>1 and $start_d=='') {echo $diff1->format("%a");} else {echo $diff->format("%a");}
$ttday=round($row["tdays"]/24,3);

?>  <?php echo round($row["tdays"]/24,3); ?></td>
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
	  $query198j_stay = "SELECT SUM(tdays)FROM newbed where pmrn= '$pmrn' and eid='$eid' "; 
	 
$result198j_stay = mysqli_query($dbhandle,$query198j_stay) or die(mysql_error());

// Print out result
$row198j_stay = mysqli_fetch_array($result198j_stay);

$total_day=	$row198j_stay['SUM(tdays)']/24;


			?>
      
	  
	  
	  <td align="center"colspan="2"><?php echo $row['charge'];?></td>
  
      </tr>
    <?php $count++; } ?>

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

	$query198j_bed = "SELECT SUM(charge) FROM newbed_new where pmrn= '$pmrn' and eid='$eid' "; 
	 
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
echo $bed_charge_new=	$row198j_stay['b_charge'];


	?>
	
	
	
	<td colspan="16" align="right"bgcolor="lightgreen"><font size="6" color="#FF0000"><strong>Total Room Charge is:<?php echo $test1c_bed; ?> (BDT)</strong></td>
	<td align="center"colspan="4"><a href="update_charge_room.php?pmrn=<?php echo $pmrn; ?>&eid=<?php echo $eid; ?>&charge=<?php echo $test1c_bed; ?>"></a></td>
	</tr>



	
	
<tr><td colspan="20" align="center"bgcolor="skyblue"><label><strong>Medicine Used</strong></label></td> </tr>
	
	
	<tr>
      <td colspan="1" align="center"><strong>S.No</strong></td>
      
	  <td colspan="1" align="center"><strong>Order By</strong></td>
	  <td colspan="1" align="center"><strong>Order Date</strong></td>
	  <td colspan="2" align="center"><strong>Order Time</strong></td>
        
      <td colspan="3" align="center"><strong>Medication</strong></td>   
	  <td colspan="2" align="center"><strong>Route</strong></td>
      <td colspan="2" align="center"><strong>Status</strong></td>
      <td colspan="2" align="center"><strong>User Done</strong></td>
	  <td colspan="2" align="center"><strong>QTY</strong></td>
	  <td colspan="4" align="center"><strong>Price</strong></td>
	  
       

	   </tr>
 <?php
	
$user=$_SESSION["sess_username"];
$pmrn=$pmrn;
//$id=$_REQUEST["id"];
$episode=$data["eid"];

$count=1;
$sel_query="Select * from imedi3 where pmrn= '$pmrn' and eid='$eid' and udone !='' group by infusion order by `ndate` asc;";

$result = mysqli_query($con,$sel_query);

while($row = mysqli_fetch_assoc($result)) 
{ ?>    <tr>

      <td align="center" colspan="1"><?php echo $count; ?></td>
      
      
	  <td align="center"colspan="1"><?php echo $row["orderby"]; ?></td>
	  <td align="center"colspan="1"><?php echo date('d/m/Y', strtotime($row["ndate"])); ?></td>
      <td align="center"colspan="2"><?php echo $row["time"]; ?></td>  
	  <td align="center"colspan="3"><a target='_blank' href="ipall_details_medi?pmrn=<?php echo $pmrn;?>&eid=<?php echo $eid;?>&medi=<?php echo $row['infusion'];?>"><?php echo $row["infusion"]; ?></a></td>
	  <td align="center"colspan="2"><?php echo $row["root"]; ?></td>
	  <td align="center"colspan="2"><?php echo $row["status"]; ?></td>
	  <td align="center"colspan="2"><?php echo $row["udone"]; ?></td>
	  
	  

	  
	  <?php
						
						
						$p_price=$row['uprice'];
						$pp_medi=$row['infusion'];
						
						$query4p = mysqli_query($db,"select COUNT(infusion) from imedi3 where pmrn='$pmrn' and eid='$eid' and infusion='$pp_medi' and udone !=''");
						$datap = mysqli_fetch_assoc($query4p);
						$t_qty=$datap['COUNT(infusion)'];

						
						$query4pc = mysqli_query($db,"select SUM(uprice) from imedi3 where pmrn='$pmrn' and eid='$eid' and infusion='$pp_medi' and udone !='' ");
						$datapc = mysqli_fetch_assoc($query4pc);
						$uomp=$datapc['SUM(uprice)'];
						
						//$n_uom=$u_price*$uomp;
						?>
	  
  	  <td align="center"colspan="2"><?php echo $t_qty; ?></td>
<td align="center"colspan="4"><?php echo $uomp; ?></td>

      </tr>
    <?php $count++; } ?>
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

	  $query198ad = "SELECT SUM(uprice) FROM imedi3 where pmrn= '$pmrn' and eid='$eid' and status1='implemented' and reuse=''"; 
	 
$result198ad = mysqli_query($dbhandle, $query198ad) or die(mysql_error());

// Print out result
$row198ad = mysqli_fetch_array($result198ad);
$test1am2=	$row198ad['SUM(uprice)'];



$query198ad3 = "SELECT SUM(uprice) FROM imedi3 where pmrn= '$pmrn' and eid='$eid' and status1='implemented' and reuse='Reuse' and discard='New'"; 
	 
$result198ad3 = mysqli_query($dbhandle, $query198ad3) or die(mysql_error());

// Print out result
$row198ad3 = mysqli_fetch_array($result198ad3);
$test1am3=	$row198ad3['SUM(uprice)'];


$test1am=$test1am3+$test1am2;
?>	  
	
	<tr><td colspan="20" align="right"bgcolor="lightgreen"><font size="6" color="#FF0000"><strong>Total Medicine Charge is:<?php echo $test1am;?> (BDT)</strong></td></tr>
	
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
$pmrn=$data["pmrn"];
//$id=$_REQUEST["id"];
$episode=$data["eid"];

$count=1;
$sel_query="Select * from istret where pmrn= '$pmrn' and eid='$episode'order by `id` DESC;";

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
	
	
	
<tr><td colspan="20" align="center"bgcolor="lightgreen"><label><strong>Investigation Done (LAB)</strong></label></td> </tr>
<tr>
      <td colspan="1" align="center"><strong>S.No</strong></td>
      <td colspan="2" align="center"><strong>MRN</strong></td>
      <td colspan="2" align="center"><strong>Requested By</strong></td>
      <td colspan="2" align="center"><strong>Order Date </strong></td>
      <td colspan="5" align="center"><strong>Investigation</strong></td>
        
      <td colspan="2" align="center"><strong>Received Time</strong></td>
	  <td colspan="3" align="center"><strong>QTY</strong></td>
	  
      <td colspan="3" align="center"><strong>Price</strong></td>


	   </tr>
 <?php
	
$user=$_SESSION["sess_username"];
$pmrn=$data["pmrn"];
//$id=$_REQUEST["id"];
$episode=$data["eid"];

$count=1;
$sel_query="Select * from iinves where pmrn= '$pmrn' and eid='$eid' and type in('lab','Lab','LAB') and status='RECEIVED' group by infusion  order by `id` DESC;";

$result = mysqli_query($con,$sel_query);

while($row = mysqli_fetch_assoc($result)) 
{ ?>    <tr>

     <td align="center" colspan="1"><?php echo $count; ?></td>
     <td align="center"colspan="2"><?php echo $row["pmrn"]; ?></td>
       <td align="center"colspan="2"><?php echo $row["user"]; ?></td>
	  <td align="center"colspan="2"><?php echo $row["odate"]; ?></td>  
	  <td align="center"colspan="5"><a target='_blank' href="ipall_details_lab?pmrn=<?php echo $pmrn;?>&eid=<?php echo $eid;?>&medi=<?php echo $row['infusion'];?>&type=<?php echo $row['type'];?>"><?php echo $row["infusion"]; ?></a></td>
	        
       
	  <td align="center"colspan="2"><?php echo $row["rtime"]; ?></td>
	    	  
  <?php
						
						
						$p_price_lab=$row['price'];
						$pp_medi_lab=$row['infusion'];
						
						$query4p_lab = mysqli_query($db,"select COUNT(infusion) from iinves where pmrn='$pmrn' and eid='$eid' and infusion='$pp_medi_lab' and status='RECEIVED'");
						$datap_lab = mysqli_fetch_assoc($query4p_lab);
						$t_qty_lab=$datap_lab['COUNT(infusion)'];

						
						$query4pc_lab = mysqli_query($db,"select SUM(price) from iinves where pmrn='$pmrn' and eid='$eid' and infusion='$pp_medi_lab' and status='RECEIVED' ");
						$datapc_lab = mysqli_fetch_assoc($query4pc_lab);
						$uomp_lab=$datapc_lab['SUM(price)'];
						
						//$n_uom=$u_price*$uomp;
						?>
	  
  	  <td align="center"colspan="3"><?php echo $t_qty_lab; ?></td>
<td align="center"colspan="3"><?php echo $uomp_lab; ?></td>
  
  
      </tr>
    <?php $count++; } ?>	
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
<tr><td colspan="16" align="right"bgcolor="lightgreen"><font size="6" color="#FF0000"><strong>Total Lab Charge is:<?php echo $test1al;?> (BDT)</strong></td>


<td align="center"colspan="4"><a href="update_charge_lab.php?pmrn=<?php echo $pmrn; ?>&eid=<?php echo $eid; ?>&charge=<?php echo $new_inves; ?>"></a></td>

</tr>

<tr><td colspan="20" align="center"bgcolor="lightgreen"><label><strong>Investigation Done (Radiology)</strong></label></td> </tr>

<tr>
      <td colspan="1" align="center"><strong>S.No</strong></td>
      <td colspan="2" align="center"><strong>MRN</strong></td>
      <td colspan="2" align="center"><strong>Requested By</strong></td>
      <td colspan="2" align="center"><strong>Order Date </strong></td>
      <td colspan="5" align="center"><strong>Investigation</strong></td>
        
      <td colspan="2" align="center"><strong>Received Time</strong></td>
	  <td colspan="3" align="center"><strong>QTY</strong></td>
	  
      <td colspan="3" align="center"><strong>Price</strong></td>


	   </tr>
 <?php
	
$user=$_SESSION["sess_username"];
$pmrn=$data["pmrn"];
//$id=$_REQUEST["id"];
$episode=$data["eid"];

$count=1;
$sel_query="Select * from iinves where pmrn= '$pmrn' and eid='$eid' and type in('rad','Rad','RAD') and status in ('RECEIVED','SEEN','DONE') group by infusion  order by `id` DESC;";

$result = mysqli_query($con,$sel_query);

while($row = mysqli_fetch_assoc($result)) 
{ ?>    <tr>

     <td align="center" colspan="1"><?php echo $count; ?></td>
     <td align="center"colspan="2"><?php echo $row["pmrn"]; ?></td>
       <td align="center"colspan="2"><?php echo $row["user"]; ?></td>
	  <td align="center"colspan="2"><?php echo $row["odate"]; ?></td>  
	  <td align="center"colspan="5"><a target='_blank' href="ipall_details_lab?pmrn=<?php echo $pmrn;?>&eid=<?php echo $eid;?>&medi=<?php echo $row['infusion'];?>&type=<?php echo $row['type'];?>"><?php echo $row["infusion"]; ?></a></td>
	        
       
	  <td align="center"colspan="2"><?php echo $row["rtime"]; ?></td>
	    	  
    <?php
						
						
						$p_price_lab1=$row['price'];
						$pp_medi_lab1=$row['infusion'];
						
						$query4p_lab1 = mysqli_query($db,"select COUNT(infusion) from iinves where pmrn='$pmrn' and eid='$eid' and infusion='$pp_medi_lab1' and status in ('RECEIVED','SEEN','DONE')");
						$datap_lab1 = mysqli_fetch_assoc($query4p_lab1);
						$t_qty_lab1=$datap_lab1['COUNT(infusion)'];

						
						$query4pc_lab1 = mysqli_query($db,"select SUM(price) from iinves where pmrn='$pmrn' and eid='$eid' and infusion='$pp_medi_lab1' and status in ('RECEIVED','SEEN','DONE') ");
						$datapc_lab1 = mysqli_fetch_assoc($query4pc_lab1);
						$uomp_lab1=$datapc_lab1['SUM(price)'];
						
						//$n_uom=$u_price*$uomp;
						?>	  
  	  <td align="center"colspan="3"><?php echo $t_qty_lab1; ?></td>
<td align="center"colspan="3"><?php echo $uomp_lab1; ?></td>
  
  
      </tr>
    <?php $count++; } ?>	
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

	  $query198af = "SELECT SUM(price) FROM iinves where pmrn= '$pmrn' and eid='$eid' and status in ('RECEIVED','SEEN','DONE') and type in('rad','Rad','RAD')"; 
	 
$result198af = mysqli_query($dbhandle,$query198af) or die(mysql_error());

// Print out result
$row198af = mysqli_fetch_array($result198af);
$test1al_rad=	$row198af['SUM(price)'];

?>	  

<?php

$new_inves=$test1al+ $test1al_rad;
$test1al_rad_dis=	($test1al+ $test1al_rad)*$data['lab_dis']/100;

?>
<tr><td colspan="16" align="right"bgcolor="lightgreen"><font size="6" color="#FF0000"><strong>Total Radiology Charge is:<?php echo $test1al_rad;?> (BDT)</strong></td>

<td align="center"colspan="4"><a href="update_charge_lab.php?pmrn=<?php echo $pmrn; ?>&eid=<?php echo $eid; ?>&charge=<?php echo $new_inves; ?>"></a></td>
</tr>



<tr><td colspan="20" align="center"bgcolor="lightgreen"><label><strong>Investigation Done (SPD)</strong></label></td> </tr>
<tr>
      <td colspan="1" align="center"><strong>S.No</strong></td>
      <td colspan="1" align="center"><strong>MRN</strong></td>
      <td colspan="4" align="center"><strong>Performed By</strong></td>
      <td colspan="1" align="center"><strong>Order Date </strong></td>
      <td colspan="3" align="center"><strong>Investigation</strong></td>
      <td colspan="2" align="center"><strong>Remarks</strong></td>   
      <td colspan="4" align="center"><strong>Status</strong></td>
	  <td colspan="2" align="center"><strong>Result</strong></td>
       	  <td colspan="2" align="center"><strong>Done By</strong></td>

	   </tr>
 <?php
	
$user=$_SESSION["sess_username"];
$pmrn=$data["pmrn"];
//$id=$_REQUEST["id"];
$episode=$data["eid"];

$count=1;
$sel_query="Select * from iinves where pmrn= '$pmrn' and eid='$episode' and type in('spd','spd1','ANJAN OPD ( ENT)','SPD') and status in ('RECEIVED','SEEN') order by `id`  DESC;";

$result = mysqli_query($con,$sel_query);

while($row = mysqli_fetch_assoc($result)) 
{ ?>    <tr>

      <td align="center" colspan="1"><?php echo $count; ?></td>
     <td align="center"colspan="1"><?php echo $row["pmrn"]; ?></td>
       <td align="center"colspan="4"><?php echo $row["per_doc"]; ?></td>
	  <td align="center"colspan="1"><?php echo $row["odate"]; ?></td>  
	  <td align="center"colspan="3"><?php echo $row["infusion"]; ?></td>
	  
	  
	  
	  <td align="center"colspan="2"><?php echo $row["room"]; ?></td>
	  <td align="center"colspan="4"><?php echo $row["status"]; ?></td> 
	  
      
    <td align="center"colspan="2"><?php echo $row["price"]+$row['doc_price']; ?></td>	  
	  <td align="center"colspan="2"><?php echo $row["otime"]; ?></td>
	  	  <td align="center"colspan="2"><?php echo $row["duser"]; ?></td>
  	  
  
      </tr>
    <?php $count++; } ?>	
	
	
	
	
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

	  $query198ah = "SELECT SUM(price), SUM(doc_price)  FROM iinves where pmrn= '$pmrn' and eid='$eid' and status in ('RECEIVED','SEEN') and type in ('spd','spd1','ANJAN OPD ( ENT)','SPD')"; 
	 
$result198ah = mysqli_query($dbhandle,$query198ah) or die(mysql_error());

// Print out result
$row198ah = mysqli_fetch_array($result198ah);
$test1as=	$row198ah['SUM(price)']+$row198ah['SUM(doc_price)'];

?>	  
	
	<tr><td colspan="20" align="right"bgcolor="lightgreen"><font size="6" color="#FF0000"><strong>Total SPD Charge is:<?php echo $test1as;?> (BDT)</strong></td></tr>
	
	<tr><td colspan="20" align="center"bgcolor="lightgreen"><label><strong>Hospital Charges</strong></label></td> </tr>

 <tr>
      <td colspan="1" align="center"><strong>S.No</strong></td>
     <td colspan="2" align="center"><strong>Date</strong></td>
      <td colspan="2" align="center"><strong>MRN</strong></td>
     	  <td colspan="10" align="center"><strong>ITEM</strong></td>
      	  <td colspan="2" align="center"><strong>QTY</strong></td>
		  <td colspan="3" align="center"><strong>Price</strong></td>
	
       

	   </tr>
 <?php
	
$user=$_SESSION["sess_username"];
$pmrn=$_REQUEST["pmrn"];
$eid=$_REQUEST["eid"];
//$dname=$_REQUEST["dname"];
//$id1=$_REQUEST["ID"];

//$id=$_REQUEST["id"];
//$episode=$data59["eid"];

$count=1;
$sel_query="Select * from inhoscharge where pmrn= '$pmrn' and eid='$eid' group by medi;";

$result = mysqli_query($con,$sel_query);

while($row = mysqli_fetch_assoc($result)) 
{ ?>    <tr>

      <td align="center" colspan="1"><?php echo $count; ?></td>
<td align="center"colspan="2"><?php echo $row["date"]; ?></td>
      <td align="center"colspan="2"><?php echo $row["pmrn"]; ?></td>
	        <td align="center"colspan="10"><a target='_blank' href="ipall_details?pmrn=<?php echo $pmrn;?>&eid=<?php echo $eid;?>&medi=<?php echo $row['medi'];?>"><?php echo $row["medi"]; ?></a></td>
			
			<?php
						
						$rrt=$row['code'];
						$p_price=$row['price'];
						$pp_medi=$row['medi'];
						$query4p = mysqli_query($db,"select * from storenew where eid='$rrt'");
						$datap = mysqli_fetch_assoc($query4p);
						$uom=$datap['uom'];
						$u_price=$datap['price'];

						
						$query4pc = mysqli_query($db,"select SUM(pdos) from inhoscharge where pmrn='$pmrn' and eid='$eid' and medi='$pp_medi'");
						$datapc = mysqli_fetch_assoc($query4pc);
						$uomp=$datapc['SUM(pdos)'];

            $query4pcy = mysqli_query($db,"select SUM(price) from inhoscharge where pmrn='$pmrn' and eid='$eid' and medi='$pp_medi'");
						$datapcy = mysqli_fetch_assoc($query4pcy);
						$uompy=$datapcy['SUM(price)'];
						
						$n_uom=$u_price*$uomp;
						?>
			
			
			
				        <td align="center"colspan="2"><?php echo $uomp; ?></td>
						<td align="center"colspan="3"><?php echo $uompy; ?></td>
						
			      
	

  	  

	  
      </tr>
    <?php $count++; } ?>
	
    <?php
	
  $user=$_SESSION["sess_username"];
  $pmrn=$_REQUEST["pmrn"];
  $eid=$_REQUEST["eid"];
  //$dname=$_REQUEST["dname"];
  //$id1=$_REQUEST["ID"];
  
  //$id=$_REQUEST["id"];
  //$episode=$data59["eid"];
  
  $count=1;
  $sel_query_care="Select * from careshope1 where pmrn= '$pmrn' and eid='$eid' and status='Provided' group by infusion;";
  
  $result_care = mysqli_query($con,$sel_query_care);
  
  while($row_care = mysqli_fetch_assoc($result_care)) 
  { ?>    <tr>
  
        <td align="center" colspan="1"><?php echo $count; ?></td>
  <td align="center"colspan="2"><?php echo $row_care["date"]; ?></td>
        <td align="center"colspan="2"><?php echo $row_care["pmrn"]; ?></td>
            <td align="center"colspan="10"><a target='_blank' href="ipall_details?pmrn=<?php echo $pmrn;?>&eid=<?php echo $eid;?>&medi=<?php echo $row_care['infusion'];?>"><?php echo $row_care["infusion"]; ?></a></td>
        
        <?php
              
              $rrt_care=$row_care['code'];
              $p_price_care=$row_care['price'];
              $pp_medi_care=$row_care['infusion'];
              $query4p_care = mysqli_query($db,"select * from storenew where eid='$rrt_care'");
              $datap_care = mysqli_fetch_assoc($query4p_care);
              //$uom_care=$datap['uom'];
              $u_price_care=$datap_care['price'];
  
              
              $query4pc_care = mysqli_query($db,"select SUM(room) from careshope1 where pmrn='$pmrn' and eid='$eid' and infusion='$pp_medi_care'");
              $datapc_care = mysqli_fetch_assoc($query4pc_care);
              $uomp_care=$datapc_care['SUM(room)'];

              $query4pc_care4 = mysqli_query($db,"select SUM(price) from careshope1 where pmrn='$pmrn' and eid='$eid' and infusion='$pp_medi_care'");
              $datapc_care4 = mysqli_fetch_assoc($query4pc_care4);
              $uomp_care4=$datapc_care4['SUM(price)'];
              
              
              $n_uom_care=$u_price_care*$uomp_care;
              ?>
        
        
        
                  <td align="center"colspan="2"><?php echo $uomp_care; ?></td>
              <td align="center"colspan="3"><?php echo $uomp_care4; ?></td>
              
              
    
  
        
  
      
        </tr>
      <?php $count++; } ?>
    
  

	
	<tr>
	
	
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
  $row198 = mysqli_fetch_array($result198);
  
  
  $query198_care = "SELECT SUM(price) FROM careshope1 where pmrn= '$pmrn' and eid='$eid'"; 
     
  $result198_care = mysqli_query($dbhandle,$query198_care) or die(mysql_error());
  
  $row198_care = mysqli_fetch_array($result198_care);
  $care_price=$row198_care['SUM(price)'];
  // Print out result
  
  $test1=	$row198['SUM(price)']+$care_price;
  


	?>
	
	<td colspan="16" align="right"bgcolor="lightgreen"><font size="6" color="#FF0000"><strong>Total Hospital Charge is:<?php echo $test1;?> (BDT)</strong></td>
  <td align="center"colspan="4"><a href="update_charge_hos.php?pmrn=<?php echo $pmrn; ?>&eid=<?php echo $eid; ?>&charge=<?php echo $test1; ?>"></a></td>
  </tr>
	
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
$pmrn=$data["pmrn"];
//$id=$_REQUEST["id"];
$episode=$data["eid"];

$count=1;
$sel_query="Select * from irefferal where pmrn= '$pmrn' and eid='$episode'  order by `id` DESC;";

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
	<tr><td colspan="20" align="center"bgcolor="lightgreen"><label><strong>Visited Doctor List</strong></label></td> </tr>
<tr>
      <td colspan="1" align="center"><strong>S.No</strong></td>
      <td colspan="1" align="center"><strong>MRN</strong></td>
      <td colspan="4" align="center"><strong>Entry By</strong></td>
      <td colspan="4" align="center"><strong>Visited Date </strong></td>
      <td colspan="4" align="center"><strong>Visited By</strong></td>
      <td colspan="2" align="center"><strong>Charge</strong></td>   
      <td colspan="3" align="center"><strong>Visit Type</strong></td>   
	  <td colspan="1" align="center"><strong>Edit</strong></td>   

	   </tr>
 <?php
	
$user=$_SESSION["sess_username"];
$pmrn=$data["pmrn"];
//$id=$_REQUEST["id"];
$episode=$data["eid"];

$count=1;
$sel_query="Select * from icnote where pmrn= '$pmrn' and eid='$episode' and ugroup ='Doctor'  order by `user` ASC;";

$result = mysqli_query($con,$sel_query);

while($row = mysqli_fetch_assoc($result)) 
{ ?>    <tr>

      <td align="center" colspan="1"><?php echo $count; ?></td>
     <td align="center"colspan="1"><?php echo $row["pmrn"]; ?></td>
       <td align="center"colspan="4"><?php echo $row["user"]; ?></td>
	  <td align="center"colspan="4"><?php echo $row["odate"]; ?></td>  
	  <td align="center"colspan="4"><?php echo $row["infusion"]; ?></td>
	        <td align="center"colspan="2"><?php echo $row["charge"]; ?></td>
			<td align="center"colspan="3"><?php echo $row["vtype"]; ?></td>
			
 
      </td>
  			<td align="center"colspan="1"><a href="update_charge.php?id=<?php echo $row['id']; ?>&pmrn=<?php echo $row['pmrn']; ?>&eid=<?php echo $row['eid']; ?>"></a></td>
      </tr>
    <?php $count++; } ?>

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
	
	<td colspan="16" align="right"bgcolor="lightgreen"><font size="6" color="#FF0000"><strong>Total Doctor Charge is:<?php echo $test1c;?> (BDT)</strong>
  <td align="center"colspan="4"><a href="update_charge_doc.php?pmrn=<?php echo $pmrn; ?>&eid=<?php echo $eid; ?>&charge=<?php echo $test1c; ?>"></a></td>
  
  </td>
  </tr>

	
	<tr><td colspan="20" align="center"bgcolor="lightgreen"><label><strong>OPD Procedure Charge</strong></label></td> </tr>
 <tr>
      <th colspan="1"><strong>S.No</strong></th>
      <th colspan="5"><strong>Consultant Name</strong>
	  <th colspan="3"><strong>Patient's Name</strong></th>
      <th colspan="1"><strong>MRN</strong></th>
      <th colspan="1"><strong>OT Time </strong>
      <th colspan="1"><strong>Anaethetist Name</strong> 
      <th colspan="1"><strong>Duration</strong>
      <th colspan="3"><strong>Procedure</strong>  
      
	        <th colspan="1"><strong>Type</strong>
			
			<th colspan="3"><strong>OT Charge</strong>
			
			
	  



	   </tr>
  </thead>
  <tbody>
  
    
	<?php
	
$user=$_SESSION["sess_username"];
//$start=$_REQUEST["stdate"];
//$end=$_REQUEST["endate"];
//$bt=$_REQUEST["bt"];
	
	
	

//$user=$_SESSION["sess_username"];
$date= date('m/d/Y');
$count=1;

$sel_query="Select * from procedure1 where pmrn='$pmrn' and ieid='$eid' ORDER BY id DESC;";

$result = mysqli_query($con,$sel_query);
//echo   $bt;


while($row = mysqli_fetch_assoc($result)) { ?>
    <tr>
      <td align="center" colspan="1"><?php echo $count; ?></td>
	  <td align="center" colspan="5"style="font:Verdana, Arial, Helvetica, sans-serif large" style="font-weight:bold"><?php echo $row["dname"];?> </td> 
      <td align="center"colspan="3"><?php echo $row["pname"]; ?></td>
      <td align="center" colspan="1"><?php echo $row["pmrn"]; ?>
      <td align="center" colspan="1"><?php echo $row["duration"]; ?>
      <td align="center" colspan="1"><?php echo $row["nanes"]; ?>  
	  <td align="Left" colspan="1"><?php echo $row["otdate"]; ?>  
	  	  <td align="Left" colspan="3"><?php echo $row["proce"]; ?> 
      

	       <td align="center" colspan="1"style="font:Verdana, Arial, Helvetica, sans-serif large" style="font-weight:bold"><?php echo $row["ptype"];?></td>

	


		

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


	
<td align="right"bgcolor="lightgreen" colspan="3"><a target='_blank' href="proused.php?pmrn=<?php echo $row['pmrn']; ?>&id=<?php echo $row['id']; ?>&eid=<?php echo $row['eid']; ?>&dname=<?php echo $row['dname']; ?>"><font size="6" color="#FF0000"><strong><?php echo $opd_pro_summary;?></strong></a></td>		
	
<?php $count++; } ?>	


	<tr><td colspan="20" align="center"bgcolor="lightgreen"><label><strong>Cathlab Procedure Charge</strong></label></td> </tr>
 <tr>
      <th colspan="1"><strong>S.No</strong></th>
      <th colspan="5"><strong>Consultant Name</strong>
	  <th colspan="3"><strong>Patient's Name</strong></th>
      <th colspan="1"><strong>MRN</strong></th>
      <th colspan="1"><strong>OT Time </strong>
      <th colspan="1"><strong>Anaethetist Name</strong> 
      <th colspan="1"><strong>Duration</strong>
      <th colspan="3"><strong>Procedure</strong>  
      
	        <th colspan="1"><strong>Type</strong>
			
			<th colspan="3"><strong>OT Charge</strong>
			
			
	  



	   </tr>
  </thead>
  <tbody>
  
    
	<?php
	
$user=$_SESSION["sess_username"];
//$start=$_REQUEST["stdate"];
//$end=$_REQUEST["endate"];
//$bt=$_REQUEST["bt"];
	
	
	

//$user=$_SESSION["sess_username"];
$date= date('m/d/Y');
$count=1;

$sel_query="Select * from cath_receive where pmrn='$pmrn' and ieid='$eid' ORDER BY id DESC;";

$result = mysqli_query($con,$sel_query);
//echo   $bt;


while($row = mysqli_fetch_assoc($result)) { ?>
    <tr>
      <td align="center" colspan="1"><?php echo $count; ?></td>
	  <td align="center" colspan="5"style="font:Verdana, Arial, Helvetica, sans-serif large" style="font-weight:bold"><?php echo $row["dname"];?> </td> 
      <td align="center"colspan="3"><?php echo $row["pname"]; ?></td>
      <td align="center" colspan="1"><?php echo $row["pmrn"]; ?>
      <td align="center" colspan="1"><?php echo $row["duration"]; ?>
      <td align="center" colspan="1"><?php echo $row["nanes"]; ?>  
	  <td align="Left" colspan="1"><?php echo $row["otdate"]; ?>  
	  	  <td align="Left" colspan="3"><?php echo $row["proce"]; ?> 
      

	       <td align="center" colspan="1"style="font:Verdana, Arial, Helvetica, sans-serif large" style="font-weight:bold"><?php echo $row["ptype"];?></td>

         <?php $count++; } ?>		
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

	
	
$opd_cath = "SELECT SUM(qty) FROM cathhoscharge where pmrn= '$pmrn' and ieid='$eid' "; 
	 
$opd_cath_res = mysqli_query($dbhandle,$opd_cath) or die(mysql_error());

// Print out result
$opd_cath_data = mysqli_fetch_array($opd_cath_res);
$opd_cath_sum=	$opd_cath_data['SUM(qty)'];

$opd_cath_medi = "SELECT SUM(price) FROM cathmediused where pmrn= '$pmrn' and ieid='$eid' "; 
	 
$opd_cath_res_medi = mysqli_query($dbhandle,$opd_cath_medi) or die(mysql_error());

// Print out result
$opd_cath_data_medi = mysqli_fetch_array($opd_cath_res_medi);
$opd_cath_sum_medi=	$opd_cath_data_medi['SUM(price)'];


$opd_cath_doc = "SELECT SUM(charge) FROM cath_charge where pmrn= '$pmrn' and ieid='$eid' and c_status=''"; 
	 
$opd_cath_res_doc = mysqli_query($dbhandle,$opd_cath_doc) or die(mysql_error());

// Print out result
$opd_cath_data_doc = mysqli_fetch_array($opd_cath_res_doc);
$opd_cath_sum_doc=	$opd_cath_data_doc['SUM(charge)'];

$opd_cath_summary=$opd_cath_sum+$opd_cath_sum_medi+$opd_cath_sum_doc;



$opd_cath_p = "SELECT * FROM cath_receive where pmrn= '$pmrn' and ieid='$eid' "; 
	 
$opd_cath_res_p = mysqli_query($dbhandle,$opd_cath_p) or die(mysql_error());
$opd_cath_data_p = mysqli_fetch_array($opd_cath_res_p);
?>


	<?php if ($opd_cath_summary>0){echo'
<td align="right"bgcolor="lightgreen" colspan="3"><a target="_blank" href="cath_used.php?pmrn='.$pmrn.'&id='.$opd_cath_data_p['id'].'&eid='.$eid.'&dname='.$adoc.'"><font size="6" color="#FF0000"><strong>'.$opd_cath_summary.'</strong></a></td>
';}

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


$opd_msuite_doc = "SELECT SUM(procharge) FROM m_suite where pmrn= '$pmrn' and ieid='$eid' "; 
	 
$opd_msuite_res_doc = mysqli_query($dbhandle,$opd_msuite_doc) or die(mysql_error());

// Print out result
$opd_msuite_data_doc = mysqli_fetch_array($opd_msuite_res_doc);
$opd_msuite_sum_doc=	$opd_msuite_data_doc['SUM(procharge)'];

$opd_msuite_summary=$opd_msuite_sum+$opd_msuite_sum_medi+$opd_msuite_sum_doc;

	?>


	
<?php if($opd_msuite_summary>0)
{echo'	<tr><td align="right"bgcolor="lightgreen" colspan="20"><a target="_blank href="proused.php?pmrn='.$row['pmrn'].'&id='.$row['id'].'&eid='.$row['eid'].'&dname='.$row['dname'].'"><font size="6" color="#FF0000"><strong>Maternity Suite Procedure Charge is: '.$opd_msuite_summary.'</strong></a></td></tr>
';}?>		

	
	
	<tr><td colspan="20" align="center"bgcolor="lightgreen"><label><strong>Endoscopy Charge</strong></label></td> </tr>
 <tr>
      <th colspan="1"><strong>S.No</strong></th>
      <th colspan="5"><strong>Consultant Name</strong>
	  <th colspan="3"><strong>Patient's Name</strong></th>
      <th colspan="1"><strong>MRN</strong></th>
      <th colspan="1"><strong>OT Time </strong>
      <th colspan="1"><strong>Anaethetist Name</strong> 
      <th colspan="1"><strong>Duration</strong>
      <th colspan="3"><strong>Procedure</strong>  
      
	        <th colspan="1"><strong>Type</strong>
			
			<th colspan="3"><strong>OT Charge</strong>
			
			
	  



	   </tr>
  </thead>
  <tbody>
  
    
	<?php
	
$user=$_SESSION["sess_username"];
//$start=$_REQUEST["stdate"];
//$end=$_REQUEST["endate"];
//$bt=$_REQUEST["bt"];
	
	
	

//$user=$_SESSION["sess_username"];
$date= date('m/d/Y');
$count=1;

$sel_query="Select * from endopapp where pmrn='$pmrn' and ieid='$eid' and status in ('Received','SEEN') ORDER BY id DESC;";

$result = mysqli_query($con,$sel_query);
//echo   $bt;


while($row = mysqli_fetch_assoc($result)) { ?>
    <tr>
      <td align="center" colspan="1"><?php echo $count; ?></td>
	  <td align="center" colspan="5"style="font:Verdana, Arial, Helvetica, sans-serif large" style="font-weight:bold"><?php echo $row["dname"];?> </td> 
      <td align="center"colspan="3"><?php echo $row["pname"]; ?></td>
      <td align="center" colspan="1"><?php echo $row["pmrn"]; ?>
      <td align="center" colspan="1"><?php echo $row["duration"]; ?>
      <td align="center" colspan="1"><?php echo $row["nanes"]; ?>  
	  <td align="Left" colspan="1"><?php echo $row["otdate"]; ?>  
	  	  <td align="Left" colspan="3"><?php echo $row["proce"]; ?> 
      

	       <td align="center" colspan="1"style="font:Verdana, Arial, Helvetica, sans-serif large" style="font-weight:bold"><?php echo $row["ptype"];?></td>

</tr>	


		

	
<?php $count++; } ?>	


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
echo $endo_doc_sum=	$endo_doc_data['SUM(room)'];

$endo_hos = "SELECT SUM(price) FROM endohoscharge1 where pmrn= '$pmrn' and ieid='$eid' "; 
	 
$endo_hos_q = mysqli_query($dbhandle,$endo_hos) or die(mysql_error());

// Print out result
$endo_hos_data = mysqli_fetch_array($endo_hos_q);
echo $endo_hos_sum=	$endo_hos_data['SUM(price)'];


$endo_medi = "SELECT SUM(price) FROM endohoscharge where pmrn= '$pmrn' and ieid='$eid' "; 
	 
$endo_medi_q = mysqli_query($dbhandle,$endo_medi) or die(mysql_error());

// Print out result
$endo_medi_data = mysqli_fetch_array($endo_medi_q);
echo $endo_medi_sum=	$endo_medi_data['SUM(price)'];

$endo_summary=$endo_doc_sum+$endo_hos_sum+$endo_medi_sum;

	?>


<tr>




<?php
if($endo_summary>0)	{echo'
<td align="right"bgcolor="lightgreen" colspan="3"><a target="_blank" href="endouse_ipd.php?pmrn='.$pmrn.'&eid='.$eid.'&full='.$row['dreffer'].'"><font size="6" color="#FF0000"><strong>'.$endo_summary.'</strong></a></td>
';}?>		
	

	<tr><td colspan="20" align="center"bgcolor="lightgreen"><label><strong>Discharge Medicine Charge</strong></label></td> </tr>

 <tr>
      <td colspan="1" align="center"><strong>S.No</strong></td>
     <td colspan="2" align="center"><strong>Date</strong></td>
      <td colspan="2" align="center"><strong>MRN</strong></td>
     	  <td colspan="10" align="center"><strong>ITEM</strong></td>
      	  <td colspan="2" align="center"><strong>QTY</strong></td>
		  <td colspan="3" align="center"><strong>Price</strong></td>
	
       

	   </tr>
 <?php
	
$user=$_SESSION["sess_username"];
$pmrn=$_REQUEST["pmrn"];
$eid=$_REQUEST["eid"];
//$dname=$_REQUEST["dname"];
//$id1=$_REQUEST["ID"];

//$id=$_REQUEST["id"];
//$episode=$data59["eid"];

$count=1;
$sel_query="Select * from phar_sale where pmrn= '$pmrn' and eid='$eid' and location='Discharge';";

$result = mysqli_query($con,$sel_query);

while($row = mysqli_fetch_assoc($result)) 
{ ?>    <tr>

      <td align="center" colspan="1"><?php echo $count; ?></td>
<td align="center"colspan="2"><?php echo $row["date"]; ?></td>
      <td align="center"colspan="2"><?php echo $row["pmrn"]; ?></td>
	        <td align="center"colspan="10"><a target='_blank' href="ipall_details?pmrn=<?php echo $pmrn;?>&eid=<?php echo $eid;?>&medi=<?php echo $row['medi'];?>"><?php echo $row["medi"]; ?></a></td>
			
			<?php
						
	/*					$rrt=$row['code'];
						$p_price=$row['price'];
						$pp_medi=$row['medi'];
						$query4p = mysqli_query($db,"select * from storenew where eid='$rrt'");
						$datap = mysqli_fetch_assoc($query4p);
						$uom=$datap['uom'];
						$u_price=$datap['price'];
*/
						
						//$query4_dis = mysqli_query($db,"select SUM(tprice) from phar_sale where pmrn='$pmrn' and eid='$eid' and location='Discharge'");
						//$data_dis = mysqli_fetch_assoc($query4_dis);
						//$uomp=$datapc['SUM(tprice)'];
						
						//$n_uom=$u_price*$uomp;
						?>
			
			
			
				        <td align="center"colspan="2"><?php echo $row['qty']; ?></td>
						<td align="center"colspan="3"><?php echo $row['tprice']; ?></td>
						
			      
	

  	  

	  
      </tr>
    <?php $count++; } ?>
	
	
	
	<tr>
	
	
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

	$query198_dis = "SELECT SUM(tprice) FROM phar_sale where pmrn= '$pmrn' and eid='$eid' and location='Discharge'"; 
	 
$result198_dis = mysqli_query($dbhandle,$query198_dis) or die(mysql_error());

// Print out result
$row198_dis = mysqli_fetch_array($result198_dis);
$test1_dis=	$row198_dis['SUM(tprice)'];



	?>
	
	<td colspan="16" align="right"bgcolor="lightgreen"><font size="6" color="#FF0000"><strong>Total Discharge Medicine Charge is:<?php echo $test1_dis;?> (BDT)</strong></td>
  <td align="center"colspan="4"><a href="update_charge_hos.php?pmrn=<?php echo $pmrn; ?>&eid=<?php echo $eid; ?>&charge=<?php echo $test1_dis; ?>"></a></td>
  </tr>


<?php if($emer_dis=='SEEN'){echo '
	<tr><td colspan="20" align="center"bgcolor="lightgreen"><label><strong>Emergency</strong></label></td> </tr>

 <tr>
      <td colspan="1" align="center"><strong>S.No</strong></td>
     <td colspan="2" align="center"><strong>Date</strong></td>
      <td colspan="2" align="center"><strong>MRN</strong></td>
     	  <td colspan="10" align="center"><strong>ITEM</strong></td>
      	  <td colspan="2" align="center"><strong>QTY</strong></td>
		  <td colspan="3" align="center"><strong>Price</strong></td>
	
       

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

  
  
$emer_medi = "SELECT SUM(uprice) FROM estat where pmrn= '$pmrn' and eid='$emer_eid' and status='Rupdated'"; 

	 
$emer_medi_1 = mysqli_query($dbhandle, $emer_medi) or die(mysql_error());

// Print out result
$emer_medi_res = mysqli_fetch_array($emer_medi_1);
$emer_medi_bill=	$emer_medi_res['SUM(uprice)'];


$emer_inves = "SELECT SUM(price) FROM einves where pmrn= '$pmrn' and eid='$emer_eid' and status in ('RECEIVED','SEEN','DONE')"; 

	 
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


$emer_all_bill=$emer_evisit_bill+$emer_dispo_bill+$emer_inves_bill+$emer_medi_bill+$nurse_procedure_price+0;
?>	  


	<td colspan="16" align="right"bgcolor="lightgreen"><font size="6" color="#FF0000"><strong>Total Emergency Charge is:<a target="_blank" href="billpall_ae_ipd.php?pmrn=<?php echo $pmrn;?>&eid=<?php echo $emer_eid;?>"><font size="6" color="#FF0000"><strong><?php echo $emer_all_bill;?> (BDT)</strong></a></td>
  
  </tr>
  
	
	
	<tr><td colspan="20" align="center"bgcolor="lightgreen"><label><strong>OT Charge</strong></label></td> </tr>
 <tr>
      <th colspan="1"><strong>S.No</strong></th>
      <th colspan="5"><strong>Consultant Name</strong>
	  <th colspan="3"><strong>Patient's Name</strong></th>
      <th colspan="1"><strong>MRN</strong></th>
      <th colspan="1"><strong>OT Time </strong>
      <th colspan="1"><strong>Anaethetist Name</strong> 
      <th colspan="1"><strong>Duration</strong>
      <th colspan="3"><strong>Procedure</strong>  
      
	        <th colspan="1"><strong>Type</strong>
			
			<th colspan="3"><strong>OT Charge</strong>
			
			
	  



	   </tr>
  </thead>
  <tbody>
  
    
	<?php
	
$user=$_SESSION["sess_username"];
//$start=$_REQUEST["stdate"];
//$end=$_REQUEST["endate"];
//$bt=$_REQUEST["bt"];
	
	
	

//$user=$_SESSION["sess_username"];
$date= date('m/d/Y');
$count=1;

$sel_query="Select * from ot where pmrn='$pmrn' and ieid='$eid' ORDER BY id DESC;";

$result = mysqli_query($con,$sel_query);
//echo   $bt;


while($row = mysqli_fetch_assoc($result)) { ?>
    <tr>
      <td align="center" colspan="1"><?php echo $count; ?></td>
	  <td align="center" colspan="5"style="font:Verdana, Arial, Helvetica, sans-serif large" style="font-weight:bold"><?php echo $row["dname"];?> </td> 
      <td align="center"colspan="3"><?php echo $row["pname"]; ?></td>
      <td align="center" colspan="1"><?php echo $row["pmrn"]; ?>
      <td align="center" colspan="1"><?php echo $row["duration"]; ?>
      <td align="center" colspan="1"><?php echo $row["nanes"]; ?>  
	  <td align="Left" colspan="1"><?php echo $row["otdate"]; ?>  
	  	  <td align="Left" colspan="3"><?php echo $row["proce"]; ?> 
      

	       <td align="center" colspan="1"style="font:Verdana, Arial, Helvetica, sans-serif large" style="font-weight:bold"><?php echo $row["ptype"];?></td>

	
         

		

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


  $query198j_doc_ot = "SELECT * FROM ot where pmrn= '$pmrn' and ieid='$eid' ORDER BY id DESC"; 
	 
  $result198j_doc_ot = mysqli_query($dbhandle,$query198j_doc_ot) or die(mysql_error());
  $row198j_doc_ot = mysqli_fetch_array($result198j_doc_ot);
  echo $test1c_doc_ot=	$row198j_doc_ot['id'];
      

	
$query198j_doc = "SELECT SUM(room) FROM otivisitendo where pmrn= '$pmrn' and ieid='$eid' "; 
	 
$result198j_doc = mysqli_query($dbhandle,$query198j_doc) or die(mysql_error());

// Print out result
$row198j_doc = mysqli_fetch_array($result198j_doc);
$test1c_doc=	$row198j_doc['SUM(room)'];


$query198j_dis = "SELECT SUM(ins) FROM othoscharge where pmrn= '$pmrn' and ieid='$eid' "; 
	 
$result198j_dis = mysqli_query($dbhandle,$query198j_dis) or die(mysqli_error());

// Print out result
$row198j_dis = mysqli_fetch_array($result198j_dis);
$test1c_dis=	$row198j_dis['SUM(ins)'];

$query198j_medi = "SELECT SUM(ins) FROM othoscharge1 where pmrn= '$pmrn' and ieid='$eid' "; 
	 
$result198j_medi = mysqli_query($dbhandle,$query198j_medi) or die(mysqli_error());

// Print out result
$row198j_medi = mysqli_fetch_array($result198j_medi);
$test1c_medi=	$row198j_medi['SUM(ins)'];


$query198j_amedi = "SELECT SUM(price) FROM otanaesmedi where pmrn= '$pmrn' and eid='$test1c_doc_ot' "; 
	 
$result198j_amedi = mysqli_query($dbhandle,$query198j_amedi) or die(mysqli_error());

// Print out result
$row198j_amedi = mysqli_fetch_array($result198j_amedi);
$test1c_amedi=	$row198j_amedi['SUM(price)'];

$query198j_ainfu = "SELECT SUM(price) FROM otanaesinfusion where pmrn= '$pmrn' and eid='$test1c_doc_ot' "; 
	 
$result198j_ainfu = mysqli_query($dbhandle,$query198j_ainfu) or die(mysqli_error());

// Print out result
$row198j_ainfu = mysqli_fetch_array($result198j_ainfu);
$test1c_ainfu=	$row198j_ainfu['SUM(price)'];




$payment=$test1c+$test1+$test1as+$test1a1+$test1al+$test1al_rad+$test1ai+$test1am+$test1c_bed+$test1c_doc+$test1c_dis+$test1c_medi+$test1c_amedi+$test1c_ainfu+$implant+$extra+$test1_dis-$test1al_rad_dis-$total_bed_dis;

$ot_payment=$test1c_doc+$test1c_dis+$test1c_medi+$test1c_amedi+$test1c_ainfu-$data['ot_hos_dis']-$data['ot_doc_dis'];
$in_payment=$test1c+$test1+$test1as+$test1a1+$test1al+$test1al_rad+$test1ai+$test1am+$test1c_bed-$test1al_rad_dis-$total_bed_dis;
$payable=$test1c+$test1+$test1as+$test1a1+$test1al+$test1al_rad+$test1ai+$test1am+$test1c_bed+$test1c_doc+$test1c_dis+$test1c_medi+$test1c_amedi+$test1c_ainfu+$implant+$extra+$endo_summary+$opd_pro_summary+$test1_dis+$emer_all_bill-$test1al_rad_dis-$total_bed_dis-$data['hos1_dis']-$data['hos_doc_dis']-$data['advance'];




	?>

  <?php if($ot_payment>0){echo'
	
<td align="right"bgcolor="lightgreen" colspan="3"><a target="_blank" href="b_ot_dis_new.php?pmrn='.$pmrn.'&id='.$eid.'"><font size="6" color="#FF0000"><strong>'.$ot_payment.'</strong></a></td>
  ';}

?>		
	



<?php


$query198j_implant = "SELECT SUM(price) FROM ipd_extra_charge where pmrn= '$pmrn' and eid='$eid' and medi LIKE '%IMPLANT%' and delete_status='0'"; 
	 
$result198j_implant = mysqli_query($dbhandle,$query198j_implant) or die(mysqli_error());

// Print out result
$row198j_implant = mysqli_fetch_array($result198j_implant);
$implant=	$row198j_implant['SUM(price)'];

$query198j_extra = "SELECT SUM(price) FROM ipd_extra_charge where pmrn= '$pmrn' and eid='$eid' and medi NOT LIKE '%IMPLANT%' and medi NOT LIKE '%SERVICE CHARGE%' and delete_status='0'"; 
	 
$result198j_extra = mysqli_query($dbhandle,$query198j_extra) or die(mysqli_error());

// Print out result
$row198j_extra = mysqli_fetch_array($result198j_extra);
$extra=	$row198j_extra['SUM(price)'];

$query198j_extra_service = "SELECT SUM(price) FROM ipd_extra_charge where pmrn= '$pmrn' and eid='$eid' and medi IN ('SERVICE CHARGE') and delete_status='0'"; 
	 
$result198j_extra_service = mysqli_query($dbhandle,$query198j_extra_service) or die(mysqli_error());

// Print out result
$row198j_extra_service = mysqli_fetch_array($result198j_extra_service);
$service_charge=	$row198j_extra_service['SUM(price)'];

$new_hos_dis=$data['hos1_dis']+$data['lab_dis']+$data['rad_dis']+$data['room_dis'];

$in_new_charge1=$test1c+$test1+$test1as+$test1a1+$test1al+$test1al_rad+$test1ai+$test1am+$test1c_bed+$implant+$extra+$ot_payment+$emer_all_bill+$test1_dis+$opd_pro_summary+$endo_summary+$opd_cath_summary+$service_charge;
$in_new_charge2=$test1c+$test1+$test1as+$test1a1+$test1al+$test1al_rad+$test1ai+$test1am+$bed_charge_new+$implant+$extra+$ot_payment+$emer_all_bill+$test1_dis+$opd_pro_summary+$endo_summary+$opd_cath_summary+$service_charge;
$new_payable1=round($in_new_charge1-$data['hos_doc_dis']-$data['advance']-$new_hos_dis);
$new_payable2=round($in_new_charge2-$data['hos_doc_dis']-$data['advance']-$new_hos_dis);

$in_ipd_charge1=$test1c+$test1+$test1as+$test1a1+$test1al+$test1al_rad+$test1ai+$test1am+$test1c_bed+$implant+$extra+$endo_summary+$opd_pro_summary+$opd_cath_summary;
$in_ipd_charge2=$test1c+$test1+$test1as+$test1a1+$test1al+$test1al_rad+$test1ai+$test1am+$bed_charge_new+$implant+$extra+$endo_summary+$opd_pro_summary+$opd_cath_summary;




?>



<tr><td colspan="20" align="right"bgcolor="lightgreen"><font size="6" color="#FF0000"><strong>Total Inpatient Charge is:<?php

if($total_day<1){echo $in_ipd_charge2;} else {echo $in_ipd_charge1;} ?> (BDT)</strong></td></tr>	
<tr><td colspan="20" align="right"bgcolor="lightgreen"><font size="6" color="#FF0000"><strong>Discharge Medicine Charge is:<?php echo $test1_dis;?> (BDT)</strong></td></tr>	

<tr><td colspan="20" align="right"bgcolor="lightgreen"><font size="6" color="#FF0000"><strong>Service Charge:<?php echo $service_charge; ?> (BDT)</strong></td></tr>	
<tr><td colspan="20" align="right"bgcolor="lightgreen"><font size="6" color="#FF0000"><strong>Grand Total is:<?php if($total_day<1){echo $in_new_charge2;} else {echo $in_new_charge1;};?> (BDT)</strong></td></tr>	

<tr><td colspan="20" align="right"bgcolor="lightgreen"><font size="6" color="#FF0000"><strong>Advance / Deposit Amount:<?php echo $data['advance'];?> (BDT)</strong></td></tr>	

<tr><td colspan="20" align="right"bgcolor="lightgreen"><font size="6" color="#FF0000"><strong>Hospital Discount:<?php echo $new_hos_dis;?> (BDT)</strong></td></tr>	
<tr><td colspan="20" align="right"bgcolor="lightgreen"><font size="6" color="#FF0000"><strong>Consultant Discount:<?php echo $data['hos_doc_dis']+$data['hos_doc_dis_ot'];?> (BDT)</strong></td></tr>	

<tr><td colspan="20" align="right"bgcolor="lightgreen"><font size="6" color="#FF0000"><strong>Payable Amount is:
<?php if($total_day<1){echo $new_payable2;} else {echo $new_payable1;};?> (BDT)</strong></td></tr>	


<tr>

<td colspan="20" align="right"bgcolor="lightgreen"><font size="6" color="#FF0000"><strong>Receive Amount

<input name="receive_amount" type="number" size="40" style="text-transform:uppercase;text-align:right;" value="<?php if($total_day<1){echo $new_payable2;} else {echo $new_payable1;};?>" required max="<?php if($total_day<1){echo $new_payable2;} else {echo $new_payable1;};?>">

</td>
</tr>




<input type="hidden" name="room_charge" value="<?php if($total_day<1){echo $bed_charge_new;} else {echo $test1c_bed;}?>">
<input type="hidden" name="inves_charge" value="<?php echo $test1al + $test1al_rad + $test1as;?>">
<input type="hidden" name="disposable_charge" value="<?php echo $test1;?>">
<input type="hidden" name="doc_charge" value="<?php echo $test1c;?>">
<input type="hidden" name="pharmacy_charge" value="<?php echo $test1am;?>">
<input type="hidden" name="ot_hos_charge" value="<?php echo $test1c_dis;?>">

<input type="hidden" name="ot_doc_charge" value="<?php echo $test1c_doc;?>">
<input type="hidden" name="ot_phar_charge" value="<?php echo $test1c_medi+$test1c_amedi+$test1c_ainfu;?>">
<input type="hidden" name="implant" value="<?php echo $implant;?>">
<input type="hidden" name="extra" value="<?php echo $extra;?>">
<input type="hidden" name="endo" value="<?php echo $endo_summary;?>">
<input type="hidden" name="opdpro" value="<?php echo $opd_pro_summary;?>">
<input type="hidden" name="cath" value="<?php echo $opd_cath_summary;?>">



<input type="hidden" name="payment" value="<?php if($total_day<1){echo $new_payable2;} else {echo $new_payable1;}?>">
<input type="hidden" name="ot_payment" value="<?php echo $ot_payment;?>">
<input type="hidden" name="in_payment" value="<?php echo $in_payment;?>">
<input type="hidden" name="dis_medi" value="<?php echo $test1_dis;?>">
<input type="hidden" name="emer_all_bill" value="<?php echo $emer_all_bill;?>">
<input type="hidden" name="cath" value="<?php echo $opd_cath_summary;?>">
<input type="hidden" name="msuite" value="<?php echo $opd_msuite_summary;?>">
<input type="hidden" name="service_charge" value="<?php echo $service_charge;?>">

<tr>
<td colspan="20" style="text-align:right; font-size:18px; font-weight:bold;">
<input type="radio" id="vehicle1" name="vehicle1" value="Cash"  id="chkPassport"onclick="EnableDisableTextBox(this)"  style="height:20px; width:20px; color:red;"checked><span style="font-size:40px;color:red;font-weight:bold;">Cash</span>				 
<input type="radio" id="vehicle1" name="vehicle1" value="bKash"id="chkPassport1" onclick="EnableDisableTextBox1(this)" style="height:20px; width:20px; color:red;"><span style="font-size:40px;color:red;font-weight:bold;">Bkash</span>	
<input type="radio" id="vehicle1" name="vehicle1" value="Card"id="chkPassport2" onclick="EnableDisableTextBox2(this)" style="height:20px; width:20px; color:red;"><span style="font-size:40px;color:red;font-weight:bold;">Card</span>				 
<input type="radio" id="vehicle1" name="vehicle1" value="Cheque"id="chkPassport3" onclick="EnableDisableTextBox2(this)" style="height:20px; width:20px; color:red;"><span style="font-size:40px;color:red;font-weight:bold;">Cheque</span>				 

<input name="due_remarks" type="text" size="40" style="text-transform:uppercase" value="" id="sdate21" disabled="disabled" placeholder="Reference No">

</td>

</tr>

<tr>



<?php if($data['payment_status']!='PAID'){echo"

<td colspan='20'align='right'><button type='submit' name='Submit1' width='200px;'>Confirm</button></td>";
}
?>


</tr>
</table>

</form>

<tbale>
<tr>
<td>
<form action="ipd_discount_lab"method="post" name="dis_lab">
<input type="hidden" name="pmrn" value="<?php echo $pmrn5;?>">
<input type="hidden" name="eid" value="<?php echo $eid5;?>">


<input type="submit" value="Discount Investigation">

</form>

<form action="ipd_discount_lab_new"method="post" name="dis_lab">
<input type="hidden" name="pmrn" value="<?php echo $pmrn5;?>">
<input type="hidden" name="eid" value="<?php echo $eid5;?>">


<input type="submit" value="Discount Consultant Visit">

</form>


<form action="ipd_discount_ot"method="post" name="dis_lab">
<input type="hidden" name="pmrn" value="<?php echo $pmrn5;?>">
<input type="hidden" name="eid" value="<?php echo $eid5;?>">


<input type="submit" value="Discount Consultant OT Charge">

</form>

<form action="ipd_discount_cath"method="post" name="dis_cath">
<input type="hidden" name="pmrn" value="<?php echo $pmrn5;?>">
<input type="hidden" name="eid" value="<?php echo $eid5;?>">


<input type="submit" value="Discount Consultant Cathlab Charge">

</form>
</td>
</tr>
</table>
<tr><td colspan="10" align="right"bgcolor="lightgreen"><font size="6" color="#FF0000"><strong><a href="ipd_advance_bill.php?id=<?php echo $id; ?>&pmrn=<?php echo $pmrn; ?>&eid=<?php echo $eid; ?>">Deposit</a></strong></td>
<td colspan="10" align="right"bgcolor="lightgreen"><font size="6" color="#FF0000"><strong><a href="ipd_extra_charge1_new.php?id=<?php echo $id; ?>&pmrn=<?php echo $pmrn; ?>&eid=<?php echo $eid; ?>">Other Charge</a></strong></td>

<?php

//room charge
 //if($total_day<1){echo $bed_charge_new;} else {echo $test1c_bed;}
 //hoscharhe
 //$test1;
//cathlab
//$opd_cath_sum;
//opd procedure

//$opd_procedure_sum;

//endoscopy

//$endo_hos_sum;

//ot

//$test1c_dis;

//emergency
//$emer_dispo_bill;


$hos_bill_new=$bed_charge_new+$test1+$opd_cath_sum+$opd_procedure_sum+$endo_hos_sum+$test1c_dis+$emer_dispo_bill;
$hos_bill_new1=$test1c_bed+$test1+$opd_cath_sum+$opd_procedure_sum+$endo_hos_sum+$test1c_dis+$emer_dispo_bill;


?>

<td colspan="10" align="right"bgcolor="lightgreen"><font size="6" color="#FF0000"><strong>
<?php if($total_day<1){echo'
<a href="hos_discount_new.php?id='.$id.'&pmrn='.$pmrn.'&eid='.$eid.'&bill='.$hos_bill_new.'">HOS Discount</a>';}
else {

  echo '<a href="hos_discount_new.php?id='.$id.'&pmrn='.$pmrn.'&eid='.$eid.'&bill='.$hos_bill_new1.'">HOS Discount</a>';}
?>

</strong></td></tr>	
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
   txtPassportNumber7.disabled = chkPassport7.checked ? false : true;
   if (!txtPassportNumber7.disabled) {
       txtPassportNumber7.focus();
   }
}
</script>

