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

$user=$_SESSION["sess_username"];

//include("auth.php");
$pmrn=$_REQUEST['pmrn'];
$eid=$_REQUEST['eid'];
$eid5=$_REQUEST['eid'];
$id=$_REQUEST['id'];

//$url="ipall_new_1?pmrn=$pmrn&id=$id&eid=$eid5";
$db = mysqli_connect('localhost','root','Godiloveu16');
mysqli_select_db($db,'sfmmkpjnew');
$query4 = mysqli_query($db,"select * from inpatient where pmrn='$pmrn' and eid='$eid'");
$data = mysqli_fetch_assoc($query4);
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
  width: 100%;
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
<h1 align="center"style="background-color:lightgreen;">PATIENT DETAILS TREATMENT SUMMARY </h1>
<!-- Form Title -->
        <table align="center" class="table table-bordered" id="dynamic_field">  
		<tr><td align="right" colspan="20"><a target='_blank' href="view3newtest?pmrn=<?php echo "$pmrn"; ?>&dname=<?php echo "$full"?>"><b>Record of Previous Visits<b></a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<a target='_blank' href="https://medex.com.bd"><b>medex.com.bd<b></a></td></tr>
<tr><td align="right" colspan="20"><a target='_blank' href="history11dochis?pmrn=<?php echo "$pmrn"; ?>"><b>Patient's Record<b></a>&nbsp;&nbsp;&nbsp;&nbsp;<a target='_blank' href="opdradreport?pmrn=<?php echo "$pmrn"; ?>"><b>Record of Radiology Report<b></a>&nbsp;&nbsp;<a target='_blank' href="endoreportin?pmrn=<?php echo "$pmrn"; ?>"><b>Record of Endoscopy Report<b></a>&nbsp;&nbsp<a target='_blank' href="http://192.168.100.254?pmrn=<?php echo "$pmrn"; ?>"><b>LAB REPORT<b></a>&nbsp;&nbsp;<a target='_blank' href="noteviewdoc?pmrn=<?php echo "$pmrn"; ?>"><b>SURGERY NOTE<b></a>&nbsp;&nbsp;<a target='_blank' href="cardiolink?pmrn=<?php echo "$pmrn"; ?>"><b>CARDIOLOGY REPORT<b></a>&nbsp;&nbsp;<a target='_blank' href="opdprocedurenote?pmrn=<?php echo "$pmrn"; ?>"><b>OPD PROCEDURE NOTE<b></a>&nbsp;&nbsp;<a target='_blank' href="historeportdoc?pmrn=<?php echo "$pmrn"; ?>"><b>HISTOPATHOLOGY REPORT<b></a></td></tr>		
				<tr><td colspan="20"><label><strong>Doctors's Name :</strong></label></td></tr>
				<tr>	  
				<td colspan="20"><?php echo $data["adoc"]; ?></td></tr>
				
						
						
				
					<input type="hidden" name="new" value="1" />

						</select></td></tr>
						
												<tr>
						
						
						<td colspan="7"><label><strong>Patient's MRN:</strong></label></td>
						<td colspan="3"><label><strong>Patient's Episode:</strong></label></td>
						<td colspan="10"><label><strong>Patient's Name:</strong></label></td>
						
						
						</tr>

<tr>				<td colspan="7"><?php echo $data["pmrn"]; ?> </td>
				<td colspan="3"><?php echo $data["eid"]; ?> </td>
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
$sel_query="Select * from newbed where pmrn= '$pmrn' and eid='$episode' order by `id` DESC;";

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
?>  <?php echo round($row["tdays"]/24,3); ?></td>
	  
			
      
	  
	  
	  <td align="center"colspan="2"><?php if($start_d=='NULL' || $start_d==''){echo 'Charge Not Finalized';} else if($start_d!=''){echo $row["charge"];} ?></td>
  
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

	$query198j_bed = "SELECT SUM(charge) FROM newbed where pmrn= '$pmrn' and eid='$eid' "; 
	 
$result198j_bed = mysqli_query($dbhandle,$query198j_bed) or die(mysql_error());

// Print out result
$row198j_bed = mysqli_fetch_array($result198j_bed);
$test1c_bed=	$row198j_bed['SUM(charge)'];
$test1c_bed4=	$row198j_bed['SUM(charge)']+$fday8;

$total_bed_dis=	($test1c_bed4)*$data['room_dis']/100;

	?>
	
	
	
	<td colspan="16" align="right"bgcolor="lightgreen"><font size="6" color="#FF0000"><strong>Total Room Charge is:<?php echo $test1c_bed;?> (BDT)</strong></td>
	<td align="center"colspan="4"><a href="update_charge_room.php?pmrn=<?php echo $pmrn; ?>&eid=<?php echo $eid; ?>&charge=<?php echo $test1c_bed; ?>">Edit</a></td>
	</tr>



	
<tr><td colspan="20" align="center"bgcolor="lightgreen"><label><strong>Infusion Used</strong></label></td> </tr>
<tr>
      <td colspan="1" align="center"><strong>S.No</strong></td>
      <td colspan="3" align="center"><strong>Order By</strong></td>
      <td colspan="1" align="center"><strong>MRN</strong></td>
      <td colspan="2" align="center"><strong>Order Date </strong></td>
      
      <td colspan="3" align="center"><strong>Infusion</strong></td>
	  <td colspan="2" align="center"><strong>Done Date</strong></td>

	  	  <td colspan="2" align="center"><strong>Done By</strong></td>
		  	  	  <td colspan="4" align="center"><strong>Qty</strong></td>
<td colspan="4" align="center"><strong>Price</strong></td>
       

	   </tr>
 <?php
	
$user=$_SESSION["sess_username"];
$pmrn=$data["pmrn"];
//$id=$_REQUEST["id"];
$episode=$data["eid"];
$count=1;
$sel_query104="Select * from iinfusion where pmrn= '$pmrn'and eid='$episode' and status='implemented' group by infusion order by `ddate` DESC;";

$result104 = mysqli_query($con,$sel_query104);

while($row104 = mysqli_fetch_assoc($result104)) 
{ ?>    <tr>

      <td align="center" colspan="1"><?php echo $count; ?></td>
      <td align="center"colspan="3"><?php echo $row104["user"]; ?></td>
      <td align="center"colspan="1"><?php echo $row104["pmrn"]; ?></td>
	  <td align="center"colspan="2"><?php echo $row104["odate"]; ?></td>  
      <td align="center"colspan="3"><a target='_blank' href="ipall_details_infu?pmrn=<?php echo $pmrn;?>&eid=<?php echo $eid;?>&medi=<?php echo $row104['infusion'];?>"><?php echo $row104["infusion"]; ?></a></td>
	  <td align="center"colspan="2"><?php echo $row104["ddate"]; ?></td>  

	  <td align="center"colspan="2"><?php echo $row104["duser"]; ?></td>
  	  
		

		
		
		  <?php
						
						
						$p_price_infu=$row104['uprice'];
						$pp_medi_infu=$row104['infusion'];
						
						$query4p_infu = mysqli_query($db,"select COUNT(infusion) from iinfusion where pmrn='$pmrn' and eid='$eid' and infusion='$pp_medi_infu' and status='implemented'");
						$datap_infu = mysqli_fetch_assoc($query4p_infu);
						$t_qty_infu=$datap_infu['COUNT(infusion)'];

						
						$query4pc_infu = mysqli_query($db,"select SUM(uprice) from iinfusion where pmrn='$pmrn' and eid='$eid' and infusion='$pp_medi_infu' and status='implemented' ");
						$datapc_infu = mysqli_fetch_assoc($query4pc_infu);
						$uomp_infu=$datapc_infu['SUM(uprice)'];
						
						//$n_uom=$u_price*$uomp;
						?>
	  
  	  <td align="center"colspan="4"><?php echo $t_qty_infu; ?></td>
<td align="center"colspan="4"><?php echo $uomp_infu; ?></td>
	  
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
$selected = mysqli_select_db($dbhandle, "sfmmkpjnew") 
  or die("Could not select examples");

	  $query198as = "SELECT SUM(uprice) FROM iinfusion where pmrn= '$pmrn' and eid='$eid' and status ='implemented' "; 
	 
$result198as = mysqli_query($dbhandle,$query198as) or die(mysqli_error());

// Print out result
$row198as = mysqli_fetch_array($result198as);
$test1ai=$row198as['SUM(uprice)'];

?>	  
	<tr><td colspan="20" align="right"bgcolor="lightgreen"><font size="6" color="#FF0000"><strong>Total Infusion Charge is:<?php echo $test1ai;?> (BDT)</strong></td></tr>
	
	<tr><td colspan="20" align="center" bgcolor="skyblue"><label><strong>Stat Medicine Used</strong></label></td> </tr>
	
	<tr>
      <td colspan="1" align="center"><strong>S.No</strong></td>
      <td colspan="4" align="center"><strong>Order By</strong></td>
      <td colspan="1" align="center"><strong>MRN</strong></td>
      <td colspan="3" align="center"><strong>Order Date </strong></td>
     <td colspan="4" align="center"><strong>Done Date</strong></td>
      <td colspan="2" align="center"><strong>Done Time</strong></td>
       <td colspan="5" align="center"><strong>Stat Medication</strong></td>

	   </tr>
 <?php
	
$user=$_SESSION["sess_username"];
$pmrn=$data["pmrn"];
//$id=$_REQUEST["id"];
$episode=$data["eid"];
$count=1;
$sel_query105="Select * from istat where pmrn= '$pmrn'and eid='$episode' order by `id` DESC;";

$result105 = mysqli_query($con,$sel_query105);

while($row105 = mysqli_fetch_assoc($result105)) 
{ ?>    
<tr>

      <td align="center" colspan="1"><?php echo $count; ?></td>
      <td align="center"colspan="4"><?php echo $row105["user"]; ?></td>
      <td align="center"colspan="1"><?php echo $row105["pmrn"]; ?></td>
	  <td align="center"colspan="3"><?php echo $row105["odate"]; ?></td>  
      <td align="center"colspan="4"><?php echo $row105["ddate"]; ?></td>  
	  <td align="center"colspan="2"><?php echo $row105["dtime"]; ?></td>
  	  <td align="center"colspan="5"><?php echo $row105["infusion"]; ?></td>
	  

	  
      </tr>
    <?php $count++; } ?>
	
	
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

	  $query198ad = "SELECT SUM(uprice) FROM imedi3 where pmrn= '$pmrn' and eid='$eid' and udone !='' and reuse=''"; 
	 
$result198ad = mysqli_query($dbhandle, $query198ad) or die(mysql_error());

// Print out result
$row198ad = mysqli_fetch_array($result198ad);
$test1am=	$row198ad['SUM(uprice)'];

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


<td align="center"colspan="4"><a href="update_charge_lab.php?pmrn=<?php echo $pmrn; ?>&eid=<?php echo $eid; ?>&charge=<?php echo $new_inves; ?>">Edit</a></td>

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
$sel_query="Select * from iinves where pmrn= '$pmrn' and eid='$eid' and type in('rad','Rad','RAD') and status='RECEIVED' group by infusion  order by `id` DESC;";

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
						
						$query4p_lab1 = mysqli_query($db,"select COUNT(infusion) from iinves where pmrn='$pmrn' and eid='$eid' and infusion='$pp_medi_lab1' and status='RECEIVED'");
						$datap_lab1 = mysqli_fetch_assoc($query4p_lab1);
						$t_qty_lab1=$datap_lab1['COUNT(infusion)'];

						
						$query4pc_lab1 = mysqli_query($db,"select SUM(price) from iinves where pmrn='$pmrn' and eid='$eid' and infusion='$pp_medi_lab1' and status='RECEIVED' ");
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

	  $query198af = "SELECT SUM(price) FROM iinves where pmrn= '$pmrn' and eid='$eid' and status='RECEIVED' and type in('rad','Rad','RAD')"; 
	 
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

<td align="center"colspan="4"><a href="update_charge_lab.php?pmrn=<?php echo $pmrn; ?>&eid=<?php echo $eid; ?>&charge=<?php echo $new_inves; ?>">Edit</a></td>
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
	  
      
<td align="center"colspan="2"><?php echo $row["price"]; ?></td>	  
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

	  $query198ah = "SELECT SUM(price) FROM iinves where pmrn= '$pmrn' and eid='$eid' and status in ('RECEIVED','SEEN') and type in ('spd','spd1','ANJAN OPD ( ENT)','SPD')"; 
	 
$result198ah = mysqli_query($dbhandle,$query198ah) or die(mysql_error());

// Print out result
$row198ah = mysqli_fetch_array($result198ah);
$test1as=	$row198ah['SUM(price)'];

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
						
						$n_uom=$u_price*$uomp;
						?>
			
			
			
				        <td align="center"colspan="2"><?php echo $uomp; ?></td>
						<td align="center"colspan="3"><?php echo $n_uom; ?></td>
						
			      
	

  	  

	  
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

// Print out result
$row198 = mysqli_fetch_array($result198);
$test1=	$row198['SUM(price)'];



	?>
	
	<td colspan="16" align="right"bgcolor="lightgreen"><font size="6" color="#FF0000"><strong>Total Hospital Charge is:<?php echo $test1;?> (BDT)</strong></td>
  <td align="center"colspan="4"><a href="update_charge_hos.php?pmrn=<?php echo $pmrn; ?>&eid=<?php echo $eid; ?>&charge=<?php echo $test1; ?>">Edit</a></td>
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
  			<td align="center"colspan="1"><a href="update_charge.php?id=<?php echo $row['id']; ?>&pmrn=<?php echo $row['pmrn']; ?>&eid=<?php echo $row['eid']; ?>">Edit</a></td>
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
  <td align="center"colspan="4"><a href="update_charge_doc.php?pmrn=<?php echo $pmrn; ?>&eid=<?php echo $eid; ?>&charge=<?php echo $test1c; ?>">Edit</a></td>
  
  </td>
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

$sel_query="Select * from ot where pmrn='$pmrn' and eid='$eid' ORDER BY id DESC;";

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
$pmrn=$row['pmrn'];
$id=$row['id'];
$eid=$row['eid'];
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





	?>


	
<td align="right"bgcolor="lightgreen" colspan="3"><a target='_blank' href="b_ot_dis_new.php?pmrn=<?php echo $row['pmrn']; ?>&id=<?php echo $row['id']; ?>"><font size="6" color="#FF0000"><strong><?php echo $test1c_doc+$test1c_dis+$test1c_medi+$test1c_amedi+$test1c_ainfu-$data['ot_hos_dis']-$data['ot_doc_dis'];?></strong></a></td>		
	
<?php $count++; } ?>	


<tr><td colspan="20" align="right"bgcolor="lightgreen"><font size="6" color="#FF0000"><strong>Total Inpatient Charge is:<?php echo $test1c+$test1+$test1as+$test1a1+$test1al+$test1al_rad+$test1ai+$test1am+$test1c_bed-$test1al_rad_dis-$total_bed_dis;?> (BDT)</strong></td></tr>	

<tr><td colspan="20" align="right"bgcolor="lightgreen"><font size="6" color="#FF0000"><strong>Grand Total is:<?php echo $test1c+$test1+$test1as+$test1a1+$test1al+$test1al_rad+$test1ai+$test1am+$test1c_bed+$test1c_doc+$test1c_dis+$test1c_medi+$test1c_amedi+$test1c_ainfu?> (BDT)</strong></td></tr>	

<tr><td colspan="20" align="right"bgcolor="lightgreen"><font size="6" color="#FF0000"><strong><a href="update_ot_hos_charge.php?id=<?php echo $id; ?>&pmrn=<?php echo $pmrn; ?>&tdis=<?php echo $total_dis; ?>">Hospital Discount:</a><?php echo $data['hos1_dis'];?> (BDT)</strong></td></tr>	
<tr><td colspan="20" align="right"bgcolor="lightgreen"><font size="6" color="#FF0000"><strong><a href="update_ot_hos_charge.php?id=<?php echo $id; ?>&pmrn=<?php echo $pmrn; ?>&tdis=<?php echo $total_dis; ?>">Consultant Discount:</a><?php echo $data['hos_doc_dis'];?> (BDT)</strong></td></tr>	

<tr><td colspan="20" align="right"bgcolor="lightgreen"><font size="6" color="#FF0000"><strong>Payable Amount is:<?php echo $test1c+$test1+$test1as+$test1a1+$test1al+$test1al_rad+$test1ai+$test1am+$test1c_bed+$test1c_doc+$test1c_dis+$test1c_medi+$test1c_amedi+$test1c_ainfu-$test1al_rad_dis-$total_bed_dis-$data['hos1_dis']-$data['hos_doc_dis'];?> (BDT)</strong></td></tr>	







</table>
</form>


</body>

</html>

 