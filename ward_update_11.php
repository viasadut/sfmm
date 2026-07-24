<?php 
    session_start();
    require('db1.php');
	$role = $_SESSION['sess_userrole'];
	
$queryc = "SELECT COUNT(utype) FROM user where '$role' in ('bill','billin')"; 
$resultc = mysqli_query($con, $queryc) or die(mysqli_error());
$rowc = mysqli_fetch_array($resultc);
$c1=$rowc['COUNT(utype)'];
	
    if(!isset($_SESSION['sess_username']) || $c1==0){
      header('Location: login2?err=2');
    }
	
	$user=$_SESSION["sess_username"];
	$test=$_SESSION['user_session_id'];
    $entry_time=date('Y-m-d H:i:s');
?>

<?php

$ndate=date('Y-m-d');
	$t = strtotime("-2 days");
$ndate1= date("Y-m-d", $t);
$conn = new mysqli("localhost","root","Godiloveu16","sfmmkpjnew");
$sql2="select * from iinves where status='Data Updated' and type  in ('Lab','LAB','lab') and collect='0' and rstatus!='Cancelled'and ndate between '$ndate1' and '$ndate'";

$result=mysqli_query($conn, $sql2);
$count=mysqli_num_rows($result);

	

?>

<?php
	
	if(isset($_POST['but_update'])){
$dname=$_REQUEST['dname'];
$daten=date('Y-m-d');
//$pmrn=$_REQUEST['pmrn'];
//$eid=$_REQUEST['eid'];

if(empty($_REQUEST['update']))
{
	echo '<script language="javascript">';
    echo 'alert("Unsuccessful !!! No Row Selected!!"); ';
    echo '</script>';
	
}

else if($user=='')
{
	echo '<script language="javascript">';
    echo 'alert("Unsuccessful !!! Session Expired!!"); ';
    echo '</script>';
	
}

            else {
                foreach($_POST['update'] as $updateid){
			$updateid;
			
      $treat=explode(',',$updateid);

  $pmrn=$treat[0];
  //echo '<br />';
	$eid=$treat[1];
  //echo '<br />';
  $time=$treat[2];
  //echo '<br />';

  $charge=$treat[3];
  //echo '<br />';

  $ptype=$treat[4];
  //echo '<br />';

   $dname=$_REQUEST['dname']; 
     
  
   $db = mysqli_connect('localhost','root','Godiloveu16');
   mysqli_select_db($db,'sfmmkpjnew');


$queryd = mysqli_query($db,"select * from doctor where dname='$dname'");
$datad= mysqli_fetch_assoc($queryd);
$dcode=$datad['dcode'];
//echo $code=(int)$data5['code'];


$queryd1 = mysqli_query($db,"select * from doctor_code where dcode='$dcode' and dname like '%WARD REVIEW%'");
$datad1= mysqli_fetch_assoc($queryd1);


$code=$datad1['ccode'];
$dcode=$datad1['dcode'];
$ip=$datad1['ip'];
$op=$datad1['op'];
$app_con=$datad1['app_con'];
$ccentre=$datad1['ccentre'];


$modified_string = substr($code, 1);


$db = mysqli_connect('localhost','root','Godiloveu16');
mysqli_select_db($db,'sfmmkpjnew');

$tb_q = mysqli_query($db,"select * from acct_master_new where item_code='$code'");
		$tb_result = mysqli_fetch_assoc($tb_q);
		//$tb_data=$tb_result['tb_ip'];

    
if($tb_result['tb_op']!='')
{
  $tb_data=$tb_result['tb_op'];
}

else if($tb_result['tb_op']=='')
{
  $tb_data=$tb_result['tb_ip'];
}


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
  $odate=date('d/m/Y H:i:s');

$check_visit = "SELECT COUNT(id) FROM icnote where user='$dname' and pmrn='$pmrn' and eid='$eid' and daten='$daten' and ugroup='Doctor'"; 
$check_visit_result = mysqli_query($con, $check_visit) or die(mysqli_error());
$check_data = mysqli_fetch_array($check_visit_result);
$count=$check_data['COUNT(id)'];



  if($time=='Morning' and $ptype=='' and $count<=0){
  $sql = "insert into icnote (`pmrn`,`eid`,`pname`,`padd`,`page`,`padmission`,`pgender`,`pphone`,`odate`,`inves`,`infusion`,`pnote`,`user`,`status`,`ugroup`,`charge`,`vtype`,`daten`,`entry_time`,`dcode`,`ccode`,`ip`,`op`,`app_con`,`ccentre`,`user_e`) 
  values ( '$pmrn','$eid','$pname','$padd','$page','$adm','$psex','$pphone','$odate','$inves','$infu','$pnote','$dname','Data Updated','Doctor','$charge','$time','$daten','$entry_time','$dcode','$code','$ip','$op','$app_con','$ccentre','$user')";
  }

  else if($time=='Morning' and $ptype=='Continuous' and $count<=0){
    $sql = "insert into icnote (`pmrn`,`eid`,`pname`,`padd`,`page`,`padmission`,`pgender`,`pphone`,`inves`,`infusion`,`pnote`,`user`,`status`,`ugroup`,`charge`,`vtype`,`daten`,`entry_time`,`dcode`,`ccode`,`ip`,`op`,`app_con`,`ccentre`,`user_e`) 
    values ( '$pmrn','$eid','$pname','$padd','$page','$adm','$psex','$pphone','$inves','$infu','$pnote','$dname','Data Updated','Doctor','$charge','$time','$daten','$entry_time','$dcode','$code','$ip','$op','$app_con','$ccentre','$user')";
    }

    else if($time=='Morning' and $ptype!='' and $count<=0){
      $sql = "insert into icnote (`pmrn`,`eid`,`pname`,`padd`,`page`,`padmission`,`pgender`,`pphone`,`odate`,`inves`,`infusion`,`pnote`,`user`,`status`,`ugroup`,`charge`,`vtype`,`daten`,`entry_time`,`dcode`,`ccode`,`ip`,`op`,`app_con`,`ccentre`,`user_e`) 
      values ( '$pmrn','$eid','$pname','$padd','$page','$adm','$psex','$pphone','$odate','$inves','$infu','$pnote','$dname','Data Updated','Doctor','$charge','$time','$daten','$entry_time','$dcode','$code','$ip','$op','$app_con','$ccentre','$user')";
      }


      else if($time=='Evening' and $ptype=='' and $count=='1'){
        $sql = "insert into icnote (`pmrn`,`eid`,`pname`,`padd`,`page`,`padmission`,`pgender`,`pphone`,`odate`,`inves`,`infusion`,`pnote`,`user`,`status`,`ugroup`,`charge`,`vtype`,`daten`,`entry_time`,`dcode`,`ccode`,`ip`,`op`,`app_con`,`ccentre`,`user_e`) 
        values ( '$pmrn','$eid','$pname','$padd','$page','$adm','$psex','$pphone','$odate','$inves','$infu','$pnote','$dname','Data Updated','Doctor','$charge','$time','$daten','$entry_time','$dcode','$code','$ip','$op','$app_con','$ccentre','$user')";
        }
      
        else if($time=='Evening' and $ptype=='Continuous' and $count=='1'){
          $sql = "insert into icnote (`pmrn`,`eid`,`pname`,`padd`,`page`,`padmission`,`pgender`,`pphone`,`odate`,`inves`,`infusion`,`pnote`,`user`,`status`,`ugroup`,`charge`,`vtype`,`daten`,`entry_time`,`dcode`,`ccode`,`ip`,`op`,`app_con`,`ccentre`,`user_e`) 
          values ( '$pmrn','$eid','$pname','$padd','$page','$adm','$psex','$pphone','$odate','$inves','$infu','$pnote','$dname','Data Updated','Doctor','$charge','$time','$daten','$entry_time','$dcode','$code','$ip','$op','$app_con','$ccentre','$user')";
          }
      
          else if($time=='Evening' and $ptype!='' and $count=='1'){
            $sql = "insert into icnote (`pmrn`,`eid`,`pname`,`padd`,`page`,`padmission`,`pgender`,`pphone`,`odate`,`inves`,`infusion`,`pnote`,`user`,`status`,`ugroup`,`charge`,`vtype`,`daten`,`entry_time`,`dcode`,`ccode`,`ip`,`op`,`app_con`,`ccentre`,`user_e`) 
            values ( '$pmrn','$eid','$pname','$padd','$page','$adm','$psex','$pphone','$odate','$inves','$infu','$pnote','$dname','Data Updated','Doctor','$charge','$time','$daten','$entry_time','$dcode','$code','$ip','$op','$app_con','$ccentre','$user')";
            }


  else if($time=='Emergency' and $ptype=='' and $count=='1'){
    $sql = "insert into icnote (`pmrn`,`eid`,`pname`,`padd`,`page`,`padmission`,`pgender`,`pphone`,`odate`,`inves`,`infusion`,`pnote`,`user`,`status`,`ugroup`,`charge`,`vtype`,`daten`,`entry_time`,`dcode`,`ccode`,`ip`,`op`,`app_con`,`ccentre`,`user_e`) 
    values ( '$pmrn','$eid','$pname','$padd','$page','$adm','$psex','$pphone','$odate','$inves','$infu','$pnote','$dname','Data Updated','Doctor','900','$time','$daten','$entry_time','$dcode','$code','$ip','$op','$app_con','$ccentre','$user')";
    }

    else if($time=='Emergency' and $ptype=='Continuous' and $count=='1' ){
      $sql = "insert into icnote (`pmrn`,`eid`,`pname`,`padd`,`page`,`padmission`,`pgender`,`pphone`,`odate`,`inves`,`infusion`,`pnote`,`user`,`status`,`ugroup`,`charge`,`vtype`,`daten`,`entry_time`,`dcode`,`ccode`,`ip`,`op`,`app_con`,`ccentre`,`user_e`) 
      values ( '$pmrn','$eid','$pname','$padd','$page','$adm','$psex','$pphone','$odate','$inves','$infu','$pnote','$dname','Data Updated','Doctor','900','$time','$daten','$entry_time','$dcode','$code','$ip','$op','$app_con','$ccentre','$user')";
      }

      else if($time=='Emergency' and $ptype!='' and $count=='1' ){
        $sql = "insert into icnote (`pmrn`,`eid`,`pname`,`padd`,`page`,`padmission`,`pgender`,`pphone`,`odate`,`inves`,`infusion`,`pnote`,`user`,`status`,`ugroup`,`charge`,`vtype`,`daten`,`entry_time`,`dcode`,`ccode`,`ip`,`op`,`app_con`,`ccentre`,`user_e`) 
        values ( '$pmrn','$eid','$pname','$padd','$page','$adm','$psex','$pphone','$odate','$inves','$infu','$pnote','$dname','Data Updated','Doctor','900','$time','$daten','$entry_time','$dcode','$code','$ip','$op','$app_con','$ccentre','$user')";
        }


        else if($time=='Critical (Morning)' and $ptype=='' and $count=='0'){
          $sql = "insert into icnote (`pmrn`,`eid`,`pname`,`padd`,`page`,`padmission`,`pgender`,`pphone`,`odate`,`inves`,`infusion`,`pnote`,`user`,`status`,`ugroup`,`charge`,`vtype`,`daten`,`entry_time`,`dcode`,`ccode`,`ip`,`op`,`app_con`,`ccentre`,`user_e`) 
          values ( '$pmrn','$eid','$pname','$padd','$page','$adm','$psex','$pphone','$odate','$inves','$infu','$pnote','$dname','Data Updated','Doctor','900','$time','$daten','$entry_time','$dcode','$code','$ip','$op','$app_con','$ccentre','$user')";
          }
      
          else if($time=='Critical (Morning)' and $ptype=='Continuous' and $count=='0'){
            $sql = "insert into icnote (`pmrn`,`eid`,`pname`,`padd`,`page`,`padmission`,`pgender`,`pphone`,`odate`,`inves`,`infusion`,`pnote`,`user`,`status`,`ugroup`,`charge`,`vtype`,`daten`,`entry_time`,`dcode`,`ccode`,`ip`,`op`,`app_con`,`ccentre`,`user_e`) 
            values ( '$pmrn','$eid','$pname','$padd','$page','$adm','$psex','$pphone','$odate','$inves','$infu','$pnote','$dname','Data Updated','Doctor','900','$time','$daten','$entry_time','$dcode','$code','$ip','$op','$app_con','$ccentre','$user')";
            }
      
            else if($time=='Critical (Morning)' and $ptype!='' and $count=='0'){
              $sql = "insert into icnote (`pmrn`,`eid`,`pname`,`padd`,`page`,`padmission`,`pgender`,`pphone`,`odate`,`inves`,`infusion`,`pnote`,`user`,`status`,`ugroup`,`charge`,`vtype`,`daten`,`entry_time`,`dcode`,`ccode`,`ip`,`op`,`app_con`,`ccentre`,`user_e`) 
              values ( '$pmrn','$eid','$pname','$padd','$page','$adm','$psex','$pphone','$odate','$inves','$infu','$pnote','$dname','Data Updated','Doctor','900','$time','$daten','$entry_time','$dcode','$code','$ip','$op','$app_con','$ccentre','$user')";
              }
      


              else if($time=='Critical (Evening)' and $ptype=='' and $count=='1'){
                $sql = "insert into icnote (`pmrn`,`eid`,`pname`,`padd`,`page`,`padmission`,`pgender`,`pphone`,`odate`,`inves`,`infusion`,`pnote`,`user`,`status`,`ugroup`,`charge`,`vtype`,`daten`,`entry_time`,`dcode`,`ccode`,`ip`,`op`,`app_con`,`ccentre`,`user_e`) 
                values ( '$pmrn','$eid','$pname','$padd','$page','$adm','$psex','$pphone','$odate','$inves','$infu','$pnote','$dname','Data Updated','Doctor','900','$time','$daten','$entry_time','$dcode','$code','$ip','$op','$app_con','$ccentre','$user')";
                }
            
                else if($time=='Critical (Evening)' and $ptype=='Continuous' and $count=='1'){
                  $sql = "insert into icnote (`pmrn`,`eid`,`pname`,`padd`,`page`,`padmission`,`pgender`,`pphone`,`odate`,`inves`,`infusion`,`pnote`,`user`,`status`,`ugroup`,`charge`,`vtype`,`daten`,`entry_time`,`dcode`,`ccode`,`ip`,`op`,`app_con`,`ccentre`,`user_e`) 
                  values ( '$pmrn','$eid','$pname','$padd','$page','$adm','$psex','$pphone','$odate','$inves','$infu','$pnote','$dname','Data Updated','Doctor','900','$time','$daten','$entry_time','$dcode','$code','$ip','$op','$app_con','$ccentre','$user')";
                  }
            
                  else if($time=='Critical (Evening)' and $ptype!='' and $count=='1'){
                    $sql = "insert into icnote (`pmrn`,`eid`,`pname`,`padd`,`page`,`padmission`,`pgender`,`pphone`,`odate`,`inves`,`infusion`,`pnote`,`user`,`status`,`ugroup`,`charge`,`vtype`,`daten`,`entry_time`,`dcode`,`ccode`,`ip`,`op`,`app_con`,`ccentre`,`user_e`) 
                    values ( '$pmrn','$eid','$pname','$padd','$page','$adm','$psex','$pphone','$odate','$inves','$infu','$pnote','$dname','Data Updated','Doctor','900','$time','$daten','$entry_time','$dcode','$code','$ip','$op','$app_con','$ccentre','$user')";
                    }
    if ($conn->query($sql) === TRUE) {
    $last_id = $conn->insert_id;
  
    $date=date('Y-m-d');

    if($time=='Morning' || $time=='Evening'){
		$ins_query6="insert into pms_tb (`trans_id`,`trans_type`,`acct_code`,`date`,`amount`,`location`) 
		values ('$last_id','CR','$tb_data','$date','$charge','IPD_VISIT')";
		mysqli_query($con,$ins_query6) or die(mysql_error());

		$ins_query7="insert into pms_tb (`trans_id`,`trans_type`,`acct_code`,`date`,`amount`,`location`) 
		values ('$last_id','DR','111999','$date','$charge','IPD_VISIT')";
		mysqli_query($con,$ins_query7) or die(mysql_error());
    }


   else if($time=='Emergency' ){
      $ins_query6="insert into pms_tb (`trans_id`,`trans_type`,`acct_code`,`date`,`amount`,`location`) 
      values ('$last_id','CR','$tb_data','$date','900','IPD_VISIT')";
      mysqli_query($con,$ins_query6) or die(mysql_error());
  
      $ins_query7="insert into pms_tb (`trans_id`,`trans_type`,`acct_code`,`date`,`amount`,`location`) 
      values ('$last_id','DR','111999','$date','900','IPD_VISIT')";
      mysqli_query($con,$ins_query7) or die(mysql_error());
      }

      else if($time=='Critical (Morning)' || $time=='Critical (Evening)'){
        $ins_query6="insert into pms_tb (`trans_id`,`trans_type`,`acct_code`,`date`,`amount`,`location`) 
        values ('$last_id','CR','$tb_data','$date','900','IPD_VISIT')";
        mysqli_query($con,$ins_query6) or die(mysql_error());
    
        $ins_query7="insert into pms_tb (`trans_id`,`trans_type`,`acct_code`,`date`,`amount`,`location`) 
        values ('$last_id','DR','111999','$date','900','IPD_VISIT')";
        mysqli_query($con,$ins_query7) or die(mysql_error());
        }

    }
			}
			
			
			echo '<script language="javascript">';
    echo 'alert("'.$updateid.'"); ';
    echo '</script>';
	
			
	}
	}
	
	?>
<html>
	<head>
		<meta charset="UTF-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<title>Lab Sample Receive Panel</title>
	<link rel="stylesheet" href="notification-demo-style.css" type="text/css">
	<script src="jsnew/jquery-2.1.1.min.js" type="text/javascript"></script>
	
	 <link rel="stylesheet" href="jsnew/bootstrap.min.css" />  
    <script src="jsnew/jjquery.min.js"></script>
    <script src="jsnew/bootstrap.min.js"></script>

	<script> 
$(document).ready(function(){
setInterval(function(){
      $("#here").load(window.location.href + " #here" );
}, 100000);
});
</script>
	<script type="text/javascript">

	function myFunction() {
		$.ajax({
			url: "view_notification_lab.php",
			type: "POST",
			processData:false,
			success: function(data){
				$("#notification-count").remove();					
				$("#notification-latest").show();$("#notification-latest").html(data);
			},
			error: function(){}           
		});
	 }
	 
	 $(document).ready(function() {
		$('body').click(function(e){
			if ( e.target.id != 'notification-icon'){
				$("#notification-latest").hide();
			}
		});
	});
		 
	</script>
	<style>
table {
  width: 90%;
  border-collapse: collapse;
}

table, td, th {
  border: 1px solid black;
  padding: 5px;
}

th {text-align: left;}

#myInput {
  background-image: url('/css/searchicon.png');
  background-position: 10px 10px;
  background-repeat: no-repeat;
  width: 100%;
  font-size: 16px;
  padding: 12px 20px 12px 40px;
  border: 1px solid #ddd;
  margin-bottom: 13px;
}

#myInput1 {
  background-image: url('/css/searchicon.png');
  background-position: 10px 10px;
  background-repeat: no-repeat;
  width: 100%;
  font-size: 16px;
  padding: 12px 20px 12px 40px;
  border: 1px solid #ddd;
  margin-bottom: 13px;
}



#myTable {
  border-collapse: collapse;
  width: 100%;
  border: 1px solid #ddd;
  font-size: 18px;
}

#myTable th, #myTable td {
  text-align: left;
  padding: 13px;
}

#myTable tr {
  border-bottom: 1px solid #ddd;
}

#myTable tr.header, #myTable tr:hover {
  background-color: #f1f1f1;
}
</style>
<link rel="stylesheet" href="styles.css">
	</head>
	<body>
	
	<div id='cssmenu' style="position: relative;top:5px;">
<ul>
   <li><a href='own_work_list'><span>Home</span></a></li>
      
		  		  
      <li class='last'><a href='logout'><span>LOGOUT</span></a></li>
</ul>
</div>

	
	
	
		<p align="center" class="style1" style="background-color:lightgreen;font-size:22px;font-weight:bold;"><?php echo $user; ?>'s In-Patient list



</p>

<div style="text-align:right">
<input style="background-color: lightblue; width:250px;" type="text" id="myInput" onkeyup="myFunction2()" placeholder="Search by Consultant" title="Search by Ward">

</div>
<?php

require('db1.php');



$user=$_SESSION["sess_username"];

//$con = mysqli_connect('localhost','root','Godiloveu16','sfmmkpjnew');




if (!$con) {
  die('Could not connect: ' . mysqli_error($con));
}
else{
//mysqli_select_db($con,"ajax_demo");


$ad3=date('d/m/Y H:i:s');

echo '





<table width="100%" height ="100%" border="1" align="center" background-color="lightgreen" style="border-collapse:collapse;" id="myTable">
 <tr>
      <th width="5%"><strong>S.No</strong></th>
      <th width="20%"><strong>Doctor Name</strong></th>
      <th width="75%"><strong>Patient Name</strong></th>

      

';

$date=date('Y-m-d');											
$today=date('Y-m-d');											
$date1=date('Y-m-d', strtotime ('-2 days'));

$sql="SELECT * FROM `doctor` WHERE status='Active' and tt=''";


$result = mysqli_query($con,$sql);
$count=1;
while($row = mysqli_fetch_assoc($result)) {
	
	$dname=$row['dname'];
    $desig=$row['desig'];
    $charge=$row['v1'];


    $doc_in="SELECT COUNT(id) FROM `inpatient` WHERE adoc='$dname' and discharge=''";
  $doc_result = mysqli_query($con,$doc_in);
  $doc_count=mysqli_fetch_assoc($doc_result);
  $in_count=$doc_count['COUNT(id)'];


  
  $doc_ir="SELECT COUNT(id) FROM `irefferal` WHERE infusion='$dname' and cstatus='Active' and status=''";
  $doc_result_ir = mysqli_query($con,$doc_ir);
  $doc_count_ir=mysqli_fetch_assoc($doc_result_ir);
  $ir_count=$doc_count_ir['COUNT(id)'];
  
  
	
  echo "<tr>";
  
  
  
  
  echo "<td style='background-color:#eed7a1;font-size:13px;font-weight:bold'>" . $count . "</td>";
   echo "<td style='background-color:#eed7a1;font-size:13px;font-weight:bold'>" . $dname . "</td>";
   
  
  
   echo "<td style='background-color:#eed7a1;font-size:13px;font-weight:bold'>"; 
  
$sql2="SELECT * FROM `inpatient` WHERE adoc='$dname' and discharge=''";


$result2 = mysqli_query($con,$sql2);
  

  while($row2 = mysqli_fetch_assoc($result2)) {
  $iidd=$row2['id'];
  $pp1=$row2['pmrn'];
  $ee1=$row2['eid'];

  
  $ee=$row2['eid'];
  $blank='';
  $morn_q="SELECT COUNT(id) FROM `icnote` WHERE pmrn='$pp1' and eid='$ee1' and user='$dname' and daten='$today'and ugroup='Doctor'";
  $result_mron = mysqli_query($con,$morn_q);
  $row_morn=mysqli_fetch_assoc($result_mron);
  
      
  
  
  
    echo"<form name='frmMain1' action='' method='post'>";
    echo$row2['pname'].' ('.$row2['pmrn'].' )';
    echo"<br>";
    
  
    if($row_morn['COUNT(id)']=='0'){
  
      echo"<input type='checkbox' name='update[]' value='$pp1,$ee1,Morning,$charge,$blank' style='height:22px; width:22px;'>&nbsp;&nbsp;";
      echo 'Morning';
      
      echo"<input type='checkbox' name='update[]' value='$pp1,$ee1,Evening,$charge,$blank' style='height:22px; width:22px;'>&nbsp;&nbsp;";
      echo 'Evening';
      
      echo"<input type='checkbox' name='update[]' value='$pp1,$ee1,Emergency,$charge,$blank' style='height:22px; width:22px;'>&nbsp;&nbsp;";
      echo 'Emergency';

      echo"<input type='checkbox' name='update[]' value='$pp1,$ee1,Critical (Morning),$charge,$blank' style='height:22px; width:22px;'>&nbsp;&nbsp;";
      echo 'Critical (Morning)';

      
      echo"<input type='checkbox' name='update[]' value='$pp1,$ee1,Critical (Evening),$charge,$blank' style='height:22px; width:22px;'>&nbsp;&nbsp;";
      echo 'Critical (Evening)';
      
  
      echo"<input type='hidden' name='dname' value='".$dname."' style='height:22px; width:22px;'>&nbsp;&nbsp;";
      echo"<input type='hidden' name='pmrn' value='".$pp1."' style='height:22px; width:22px;'>&nbsp;&nbsp;";
      echo"<input type='hidden' name='eid' value='".$ee1."' style='height:22px; width:22px;'>&nbsp;&nbsp;";
      
      
      echo"<br /><br />";
    }
  
    else if($row_morn['COUNT(id)']=='1'){
  
        
        
        echo"<input type='checkbox' name='update[]' value='$pp1,$ee1,Evening,$charge,$blank' style='height:22px; width:22px;'>&nbsp;&nbsp;";
        echo 'Evening';
        
        echo"<input type='checkbox' name='update[]' value='$pp1,$ee1,Emergency,$charge,$blank' style='height:22px; width:22px;'>&nbsp;&nbsp;";
        echo 'Emergency';
        
        
      echo"<input type='checkbox' name='update[]' value='$pp1,$ee1,Critical (Evening),$charge,$blank' style='height:22px; width:22px;'>&nbsp;&nbsp;";
      echo 'Critical (Evening)';
      
        echo"<input type='hidden' name='dname' value='".$dname."' style='height:22px; width:22px;'>&nbsp;&nbsp;";
        echo"<input type='hidden' name='pmrn' value='".$pp1."' style='height:22px; width:22px;'>&nbsp;&nbsp;";
        echo"<input type='hidden' name='eid' value='".$ee1."' style='height:22px; width:22px;'>&nbsp;&nbsp;";
        
      
      echo"<br /><br />";
    }
  
    else if($row_morn['COUNT(id)']=='2'){
  
      
        
        echo"<input type='checkbox' name='update[]' value='$pp1,$ee1,Emergency,$charge,$blank' style='height:22px; width:22px;'>&nbsp;&nbsp;";
        echo 'Emergency';
        
    
        echo"<input type='hidden' name='dname' value='".$dname."' style='height:22px; width:22px;'>&nbsp;&nbsp;";
        echo"<input type='hidden' name='pmrn' value='".$pp1."' style='height:22px; width:22px;'>&nbsp;&nbsp;";
        echo"<input type='hidden' name='eid' value='".$ee1."' style='height:22px; width:22px;'>&nbsp;&nbsp;";
       
        
      
      echo"<br /><br />";
    }
    
    
  

  //echo $pp=$row2['pmrn'];
  

  					
											
  

  //$count++;
  }


  $sql24="SELECT * FROM `irefferal` WHERE infusion='$dname' and cstatus='Active' and status=''";


$result24 = mysqli_query($con,$sql24);
  

  while($row24 = mysqli_fetch_assoc($result24)) {
  $iidd4=$row24['id'];
  $pp14=$row24['pmrn'];
  $ee14=$row24['eid'];
  $rtype=$row24['bed'];

  
  $ee4=$row24['eid'];
  
  $morn_q4="SELECT COUNT(id) FROM `icnote` WHERE pmrn='$pp14' and eid='$ee14' and user='$dname' and daten='$today' and ugroup='Doctor'";
  $result_mron4 = mysqli_query($con,$morn_q4);
  $row_morn4=mysqli_fetch_assoc($result_mron4);
  
      
  
  
  
    echo"<form name='frmMain1' action='' method='post'>";
    echo$row24['pname'].' ('.$row24['pmrn'].' )';
    echo"<br>";
    
  
    if($row_morn4['COUNT(id)']=='0'){
  
      echo"<input type='checkbox' name='update[]' value='$pp14,$ee14,Morning,$charge,$rtype' style='height:22px; width:22px;'>&nbsp;&nbsp;";
      echo 'Morning';
      
      echo"<input type='checkbox' name='update[]' value='$pp14,$ee14,Evening,$charge,$rtype' style='height:22px; width:22px;'>&nbsp;&nbsp;";
      echo 'Evening';
      
      echo"<input type='checkbox' name='update[]' value='$pp14,$ee14,Emergency,$charge,$rtype' style='height:22px; width:22px;'>&nbsp;&nbsp;";
      echo 'Emergency';

      echo"<input type='checkbox' name='update[]' value='$pp14,$ee14,Critical (Morning),$charge,$blank' style='height:22px; width:22px;'>&nbsp;&nbsp;";
      echo 'Critical (Morning)';

      
      echo"<input type='checkbox' name='update[]' value='$pp14,$ee14,Critical (Evening),$charge,$blank' style='height:22px; width:22px;'>&nbsp;&nbsp;";
      echo 'Critical (Evening)';
      
      
  
      echo"<input type='hidden' name='dname' value='".$dname."' style='height:22px; width:22px;'>&nbsp;&nbsp;";
      echo"<input type='hidden' name='pmrn' value='".$pp14."' style='height:22px; width:22px;'>&nbsp;&nbsp;";
      echo"<input type='hidden' name='eid' value='".$ee14."' style='height:22px; width:22px;'>&nbsp;&nbsp;";
      
      echo"<br /><br />";
    }
  
    else if($row_morn4['COUNT(id)']=='1'){
  
   
        
        echo"<input type='checkbox' name='update[]' value='$pp14,$ee14,Evening,$charge,$rtype' style='height:22px; width:22px;'>&nbsp;&nbsp;";
        echo 'Evening';
        
        echo"<input type='checkbox' name='update[]' value='$pp14,$ee14,Emergency,$charge,$rtype' style='height:22px; width:22px;'>&nbsp;&nbsp;";
        echo 'Emergency';

       

      
      echo"<input type='checkbox' name='update[]' value='$pp14,$ee14,Critical (Evening),$charge,$blank' style='height:22px; width:22px;'>&nbsp;&nbsp;";
      echo 'Critical (Evening)';
      
        
    
        echo"<input type='hidden' name='dname' value='".$dname."' style='height:22px; width:22px;'>&nbsp;&nbsp;";
        echo"<input type='hidden' name='pmrn' value='".$pp14."' style='height:22px; width:22px;'>&nbsp;&nbsp;";
        echo"<input type='hidden' name='eid' value='".$ee14."' style='height:22px; width:22px;'>&nbsp;&nbsp;";
        
      
      echo"<br /><br />";
    }
  
    else if($row_morn['COUNT(id)']=='2'){
  
      
        
        echo"<input type='checkbox' name='update[]' value='$pp14,$ee14,Emergency,$charge,$rtype' style='height:22px; width:22px;'>&nbsp;&nbsp;";
        echo 'Emergency';
        
    
        echo"<input type='hidden' name='dname' value='".$dname."' style='height:22px; width:22px;'>&nbsp;&nbsp;";
        echo"<input type='hidden' name='pmrn' value='".$pp14."' style='height:22px; width:22px;'>&nbsp;&nbsp;";
        echo"<input type='hidden' name='eid' value='".$ee14."' style='height:22px; width:22px;'>&nbsp;&nbsp;";
       

        
       
      echo"<br /><br />";
    }
    
    
  

  //echo $pp=$row2['pmrn'];
  

  					
											
  

  //$count++;
  }
if($in_count>0 || $ir_count>0){
  echo"
  <input type='submit' value='Confirm' name='but_update' class='btn btn-default' style='background-color:lightgreen'><i class='fas fa-times'></i>
  
  </form>";

 
  echo "</td></tr>";
}

$count++;
}
echo "<form></table>";

mysqli_close($con);

}

//$cc=1;

?>
	</body>
	
	
	
<script>
function myFunction2() {
  var input, filter, table, tr, td, i, txtValue;
  input = document.getElementById("myInput");
  filter = input.value.toUpperCase();
  table = document.getElementById("myTable");
  tr = table.getElementsByTagName("tr");
  for (i = 0; i < tr.length; i++) {
    
	td = tr[i].getElementsByTagName("td")[1];
    if (td) {
      txtValue = td.textContent || td.innerText;
      if (txtValue.toUpperCase().indexOf(filter) > -1) {
        tr[i].style.display = "";
      } else {
        tr[i].style.display = "none";
      }
    }       
  }
}
</script>


<script>
function myFunction1() {
  var input, filter, table, tr, td, i, txtValue;
  input = document.getElementById("myInput1");
  filter = input.value.toUpperCase();
  table = document.getElementById("myTable");
  tr = table.getElementsByTagName("tr");
  for (i = 0; i < tr.length; i++) {
    
	td = tr[i].getElementsByTagName("td")[2];
    if (td) {
      txtValue = td.textContent || td.innerText;
      if (txtValue.toUpperCase().indexOf(filter) > -1) {
        tr[i].style.display = "";
      } else {
        tr[i].style.display = "none";
      }
    }       
  }
}
</script>
</html><script>
/*
function check_session_id()
{
    var session_id = "<?php echo $test; ?>";

    fetch('check_login.php').then(function(response){

        return response.json();

    }).then(function(responseData){

        if(responseData.output == 'logout')
        {
            window.location.href = 'logout_new.php';
        }

    });
}

setInterval(function(){

    check_session_id();
    
}, 10000);
*/
</script>


