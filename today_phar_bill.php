<?php 
    session_start();
    require('db1.php');
	$role = $_SESSION['sess_userrole'];
	
$queryc = "SELECT COUNT(utype) FROM user where '$role' in ('staff','mng','bill','pharmacy')"; 
$resultc = mysqli_query($con, $queryc) or die(mysqli_error());
$rowc = mysqli_fetch_array($resultc);
$c1=$rowc['COUNT(utype)'];
	
    if(!isset($_SESSION['sess_username']) || $c1==0){
      header('Location: login2?err=2');
    }
?>
<?php
require('db1.php');
if(isset($_POST['bsearch'])){
$user=$_SESSION["sess_username"];
$start=date('Y-m-d',strtotime($_REQUEST["stdate"]));
$end=date('Y-m-d',strtotime($_REQUEST["endate"]));
$bt=$_REQUEST["bt"];

$query43 = "SELECT COUNT(amount) FROM pms_payment where user= '$bt'and date BETWEEN '$start' and '$end';"; 
	 
$result43 = mysqli_query($con, $query43) or die(mysqli_error());
$row43 = mysqli_fetch_assoc($result43);

$query44 = "SELECT COUNT(adoc) FROM inpatient where anew BETWEEN '$start' and '$end';"; 
	 
$result44 = mysqli_query($con, $query44) or die(mysqli_error());
$row44 = mysqli_fetch_assoc($result44);
}

?>



<?php
$url1=$_SERVER['REQUEST_URI'];
//header("Refresh: 5; URL=$url1");
$billuser=$_REQUEST['user'];
//$billdate=$_REQUEST['date'];
$billdate=date('Y-m-d');
?>




<?php
/*
Author: Javed Ur Rehman
Website: https://www.allphptricks.com/
*/

require('db1.php');
//include("auth.php");

/*$query = "SELECT * from pmedi where id='".$id."'"; 
$result = mysqli_query($con, $query) or die ( mysqli_error());
$row = mysqli_fetch_assoc($result);
*/




?>

<!DOCTYPE html>
<html>
<style type="text/css">
<!--
.style1 {
	font-size: x-large;
	font-weight: bold;
	font-style: italic;
}
-->

div1 {
    height: 40px;
    width: 30%;
    background-color: powderblue;
}
</style>


   <link rel="stylesheet" href="styles.css">

   <script src="script.js"></script>


 <link rel="stylesheet" href="jsnew/bootstrap.min.css" />  
    <script src="jsnew/jjquery.min.js"></script>
    <script src="jsnew/bootstrap.min.js"></script>

   

<link rel="stylesheet" href="styles.css">

   <script src="script.js"></script>
   <script src="./jquery.multiselect.js"></script>
<link href="./jquery.multiselect.css" rel="stylesheet" />
   
   <script src="jsnew/pprefixfree.min.js"></script>
   <script type="text/javascript">
function confirm_click()
{
return confirm("Are you Sure to Start The Blood?");
}

</script>

<link href="prescription/prescription/css/select2.min.css" rel="stylesheet" />
<script src="prescription/prescription/css/select2.min.js"></script>
</head>

<body>




<div id='cssmenu'>
<ul>
   <li><a href='homemng'><span>Home</span></a></li>
   <li class='active has-sub'><a href='#'><span>Patients</span></a>
      <ul>
         <li class='has-sub'><a href='viewnew'><span>OPD Patients</span></a>
            
         </li>
         <li class='has-sub'><a href='iview'><span>In-Patients</span></a>
            
         </li>
      </ul>
   </li>
   <li class='active has-sub'><a href='#'><span>Appointment</span></a>
      <ul>
         <li class='has-sub'><a href='cggtttt'><span>Set Doctor's Appointment</span></a>
            
         </li>
         <li class='has-sub'><a href='ami2'><span>Set Restrictions on Appointment Time</span></a>
            
         </li>
      </ul>
	  
   </li>

   <li class='last'><a href='ot'><span>OT BOOKING</span></a></li>
   <li class='active has-sub'><a href='#'><span>Reports</span></a>
      <ul>
         <li class='has-sub'><a href='view3new'><span>OPD Prescription</span></a>
            
         </li>
         <li class='has-sub'><a href='con1'><span>Outpatient Stats</span></a>
            
         </li>
		          <li class='has-sub'><a href='con2'><span>OT Stats</span></a>
            
         </li>
         <li class='has-sub'><a href='con3'><span>In-Patient Stats</span></a>
            
         </li>
		   <li class='has-sub'><a href='con11'><span>Medicine Stats</span></a>
            
         </li>

      </ul>
   </li>
   <li class='last'><a href='logout'><span>LOGOUT</span></a></li>
</ul>
</div>

<h1 align="center">Today's Bill</h1>

  <!-- Stephonce R. MOrris | 2014 -->

<!-- Google Font -->
		<link href='jsnew/fonts' rel='stylesheet' type='text/css'>

<form action="" method="POST">



<!-- Form Title -->
        
					 
		


<table width="100%" height ="100%" border="1" align="center" bgcolor="#FFFF99" style="border-collapse:collapse;">


    



    <tr>
      <th width="4%"><strong>S.No</strong></th>
      <th width="4%"><strong>BillNo</strong></th>
      <th width="17%"><strong>Cashier ID</strong></th>
      <th width="10%"><strong>Cashier Name</strong></th>
      <th width="10%"><strong>Patient MRN</strong></th>
      <th width="10%"><strong>Bill Type</strong></th>
      <th width="10%"><strong>Payment Mode</strong></th>
	  <th width="10%"><strong>Sale Amount</strong></th>
     <th width="10%"><strong>Collection Amount</strong></th>
     <th width="10%"><strong>Discount Amount</strong></th>
     <th width="10%"><strong>Due Amount</strong></th>
	  
      
	   </tr>
  </thead>
  <tbody>

  
     <?php
	
$user=$_SESSION["sess_username"];
//$id=$_REQUEST["id"];

	
	 $sel_query="Select * from pms_bill where date='$billdate' order by billno desc";
 
$count=1;
//$sel_query="Select * from inpatient where adoc='$bt' and aadate BETWEEN '$start' and '$end'";


$result = mysqli_query($con,$sel_query);

while($row = mysqli_fetch_assoc($result)) 
{ ?>    <tr>


<?php
$bill_user=$row['user'];
$bill_date=$row['date'];

$user_name_q = "SELECT * FROM user where uname= '$bill_user';"; 
	 
$user_name_r = mysqli_query($con, $user_name_q) or die(mysqli_error());
$user_name_d = mysqli_fetch_assoc($user_name_r);


      ?>
      <td align="center"><?php echo $count; ?></td>
      <td align="center"><?php echo $row["billno"]; ?></td>
      <td align="center"><?php echo $row["user"]; ?></td>
      <td align="center"><?php echo $user_name_d['fullname']; ?></td>
      <td align="center"><?php echo $row['pmrn']; ?></td>
      <td align="center"><?php echo $row['remarks']; ?></td>
      <td align="center"><?php echo $row['p_mode']; ?></td>
      <td align="center"><?php echo $row['amount']; ?></td>
      <td align="center"><?php 
      if($row['dname']=='IPD ADVANCE')
      {
      echo $row['amount']; 
      
      }

      else if($row['dname']!='IPD ADVANCE')
      {
      echo $row['amount_receive']; 
      
      }
      
      ?>
      
   </td>
      <td align="center"><?php echo $row['dis_amount']; ?></td>
      <td align="center"><?php 
      
      $due_amount_opd=$row['amount']-($row['amount_receive']+$row['dis_amount']);
      
      if($row['dname']!='IPD ADVANCE' || $row['location']!='OPD_Medi'){
      echo $due_amount_opd;
      } ?></td>
      <td align="center">

      <?php
      if($row['location']=='OPD_inves')
      {echo '<a href="new_bill/opd_inves_bill_pdf_new3?billno='.$row['billno'].'&pmrn='.$row['pmrn'].'&eid='.$row['eid'].'">Print</a>';}
      
      else if($row['location']=='OPD')
      {echo '<a href="new_bill/opd_consultation_refund_pdf?billno='.$row['billno'].'&pmrn='.$row['pmrn'].'&eid='.$row['eid'].'">Print</a>';}
      

      else if($row['location']=='IPD' and $row['dname']!='IPD ADVANCE' )
      {echo '<a href="new_bill/ipd_bill_pdf?billno='.$row['billno'].'&pmrn='.$row['pmrn'].'&eid='.$row['eid'].'">Print</a>';}
      

      else if($row['location']=='OPD Procedure Room')
      {echo '<a href="opd_procedure_room_bill?billno='.$row['billno'].'&pmrn='.$row['pmrn'].'&eid='.$row['eid'].'">Print</a>';}
      
      else if($row['location']=='Endoscopy')
      {echo '<a href="endoscopy_bill?billno='.$row['billno'].'&pmrn='.$row['pmrn'].'&eid='.$row['eid'].'">Print</a>';}
      
      else if($row['location']=='OPD_extra')
      {echo '<a href="new_bill/opd_inves_bill_pdf_new3_extra?billno='.$row['billno'].'&pmrn='.$row['pmrn'].'&eid='.$row['eid'].'">Print</a>';}
     
      else if($row['location']=='IPD' and $row['dname']=='IPD ADVANCE')
      {echo '<a href="ipd_bill_paper_advance?billno='.$row['billno'].'&pmrn='.$row['pmrn'].'&eid='.$row['eid'].'">Print</a>';}
      
      else if($row['location']=='OPD_Medi' || $row['location']=='OPD_DIS' || $row['location']=='OTC' || $row['location']=='OTC_Sale')
      {echo '<a href="opd_bill_pdf22_new_medi_pos?billno='.$row['billno'].'&pmrn='.$row['pmrn'].'&eid='.$row['eid'].'">Print</a>';}

      else if($row['location']=='OPD_DIS')
      {echo '<a href="opd_bill_pdf22_new_medi_pos?billno='.$row['billno'].'&pmrn='.$row['pmrn'].'&eid='.$row['eid'].'">Print</a>';}
      
      else if($row['location']=='Maternity Suite')
      {echo '<a href="opd_ms_room_bill?billno='.$row['billno'].'&pmrn='.$row['pmrn'].'&eid='.$row['eid'].'">Print</a>';}

      else if($row['location']=='Endoscopy')
      {echo '<a href="endoscopy_bill?billno='.$row['billno'].'&pmrn='.$row['pmrn'].'&eid='.$row['eid'].'">Print</a>';}
      
      else if($row['location']=='OPD Procedure Room')
      {echo '<a href="opd_procedure_room_bill?billno='.$row['billno'].'&pmrn='.$row['pmrn'].'&eid='.$row['eid'].'">Print</a>';}
      
      else if($row['location']=='OPD_extra')
      {echo '<a href="opd_consultation_refund_pdf_extra?billno='.$row['billno'].'&pmrn='.$row['pmrn'].'&eid='.$row['eid'].'">Print</a>';}

?>
      </td>

      
           
      </tr>
	  
    <?php $count++; } ?>


      
  </tbody>
</table>


</form>
</body>
</html>

