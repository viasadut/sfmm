<?php 
    session_start();
    require('db1.php');
	$role = $_SESSION['sess_userrole'];
	
$queryc = "SELECT COUNT(utype) FROM user where '$role' in ('staff','nurse','doctor','imo')"; 
$resultc = mysqli_query($con, $queryc) or die(mysqli_error());
$rowc = mysqli_fetch_array($resultc);
$c1=$rowc['COUNT(utype)'];
	
    if(!isset($_SESSION['sess_username']) || $c1==0){
      header('Location: login2?err=2');
    }
    $tt=$_SERVER['HTTP_HOST']	;
?>

<!DOCTYPE html>
<html>
<head>
<style>
table {
  width: 100%;
  border-collapse: collapse;
}

table, td, th {
  border: 1px solid black;
  padding: 5px;
}

th {text-align: left;}
</style>
</head>
<body>



<?php

$user=$_SESSION["sess_username"];
$q1 = $_GET['q'];
$pmrn = $_GET['pmrn'];
$eid = $_GET['eid'];
$q=date('Y-m-d', strtotime($q1));
//$con = mysqli_connect('localhost','root','Godiloveu16','sfmmkpjnew');
require('db1.php');

if (!$con) {
  die('Could not connect: ' . mysqli_error($con));
}

mysqli_select_db($con,"ajax_demo");
$sql="Select * from iinves where pmrn= '$pmrn' and eid='$eid' and rstatus IN ('RECEIVED','REJECTED') and ndate = '".$q."'  order by `id` DESC";
$result = mysqli_query($con,$sql);

$sql1="Select * from einves where pmrn= '$pmrn' and eid='$eid' and rstatus IN ('RECEIVED','REJECTED') and ndate = '".$q."'  order by `id` DESC";
$result1 = mysqli_query($con,$sql1);



echo '<table width="100%" height ="100%" border="1" align="center" bgcolor="#FFFF99" style="border-collapse:collapse;">
<tr><td colspan="22" align="center"bgcolor="lightblue"><label><strong>RECEIVED SAMPLE</strong></label></td> </tr>	

<tr>
      <td colspan="1" align="center"><strong>S.No</strong></td>
      
      <td colspan="1" align="center"><strong>Order Date </strong></td>
      <td colspan="4" align="center"><strong>Investigation</strong></td>
	  <td colspan="3" align="center"><strong>Result</strong></td>
		  <td colspan="2" align="center"><strong>Ref. Value</strong></td>
      <td colspan="2" align="center"><strong>Remarks</strong></td>   
      <td colspan="2" align="center"><strong>Done Date</strong></td>
	  <td colspan="1" align="center"><strong>Status</strong></td>
       	  <td colspan="2" align="center"><strong>Received Comments</strong></td>
		  <td colspan="1" align="center"><strong>Received By</strong></td>
		  <td colspan="1" align="center"><strong>Confirm By</strong></td>
		  
		  <td colspan="2" align="center"><strong>View</strong></td>
		  

	   </tr>';
while($row1 = mysqli_fetch_array($result1)) {

  $rdate3=date('d/m/Y', strtotime($row1["odate1"]));
  echo "<tr>";
  echo "<td colspan='1' style='background-color:lightbllue;font-size:18px;font-weight:bold'>" . $row1['id'] . "</td>";
  echo "<td colspan='1' style='background-color:lightbllue;font-size:18px;font-weight:bold'>" . $rdate3 . "</td>";



  echo "<td colspan='4' style='background-color:lightbllue;font-size:18px;font-weight:bold'>";  
		
  $type=$row1["type"];
  $pmrn=$row1["pmrn"];
  $eid2=$row1["eid"];
  $infu=$row1["infusion"];
  





  $url = "compareinvesimo?pmrn=$pmrn&eid=$eid2&infu=$infu"; 
  
   if($type=='lab')
{ 
echo "<a target='_blank' href='$url' style='color: red'><b>$infu<b></a>";
}

 else if($type=='LAB')
{ 
echo "<a target='_blank' href='$url' style='color: red'><b>$infu<b></a>";
}
else if($type=='rad' || $type=='RAD')
{ 
echo '<span style="color:red;text-align:center;"><b>'.$infu.'<b></span>';
}

    
echo "</td>";


echo "<td colspan='3' style='background-color:lightbllue;font-size:18px;font-weight:bold'>";  
$type=$row1["type"];
		$ac_no='E'.$row1["id"];
		$eid3=$row1["eid"];
		$id=$row1["id"];
		$link=$row1["report"];
	

$query23 = "SELECT COUNT(status) FROM radpapp where a_no='$ac_no' and status='SEEN'"; 
$result23 = mysqli_query($con, $query23) or die(mysqli_error());
$row23 = mysqli_fetch_array($result23);
$c1=$row23['COUNT(status)'];

	$url_spd = "ecg_pdf2?ac_no=$ac_no&pmrn=$pmrn&id=$id"; 
		$url = "inradreport?ac_no=$ac_no&dname=$full"; 
		$url_new = "rad_report_new2_1.php?pmrn=$pmrn&acno=$ac_no&dname=$dname5"; 
$date_d= date('2022-04-02');		

	
		$url = "inradreport?ac_no=$ac_no&dname=$full"; 
		 if($type=='lab')
	{ 
echo $row1["result"];
	}
	
	else if($type=='rad' && $c1>0 and $row1['ndate']>=$date_d)
	{ 
echo "<a target='_blank' href='$url_new'>REPORT</a>";
	}
	
	else if($type=='RAD' && $c1>0 and $row1['ndate']>=$date_d)
	{ 
echo "<a target='_blank' href='$url_new'>REPORT</a>";
	}
	
	
	else if($type=='rad' && $c1>0 and $row1['ndate']<$date_d)
	{ 
echo "<a target='_blank' href='$url'>REPORT</a>";
	}
	
	else if($type=='RAD' && $c1>0 and $row1['ndate']<$date_d)
	{ 
echo "<a target='_blank' href='$url'>REPORT</a>";
	}
	
	else if($type=='rad' && $c1==0)
	{ 
echo "REPORT PENDING";
	}
	
	else if($type=='RAD' && $c1==0)
	{ 
echo "REPORT PENDING";
	}
  echo "</td>";


  echo "<td colspan='2' style='background-color:lightbllue;font-size:18px;font-weight:bold'>";
  
  $icode=$row1["code"];  
		$rr=$row1["result"];  
		  $selq="Select * from radio where code='$icode';";

$resultq = mysqli_query($con,$selq);
$rowq = mysqli_fetch_assoc($resultq);
$ref1=$rowq['reference'];
$ref2=$rowq['remarks'];
$unit=$rowq['unit'];
$remarks=$rowq['remarks'];

	
		
		 if($type=='lab' and $rr !='')
	{ 
echo $remarks.' '.$unit ;
	}
	
	
	
	else if($type=='spd1' || $type=='spd' and $rstatus='RECEIVED' and $row['status']=='SEEN')
	{ 
echo "<a target='_blank' href='$url_spd'>REPORT</a>";

	}	
		 
else
	{ 
echo "";
	}	
  
  echo "</td>";
  echo "<td colspan='2' style='background-color:lightbllue;font-size:18px;font-weight:bold'>" . $row1['room'] . "</td>";
  echo "<td colspan='2' style='background-color:lightbllue;font-size:18px;font-weight:bold'>" . $row1['rtime'] . "</td>";
  if($row1['rstatus']== "REJECTED"){
  echo "<td colspan='1' style='background-color:RED;font-size:18px;font-weight:bold'>"
.$row1['rstatus'].
  "</td>";  
}
else {
  echo "<td colspan='1' style='background-color:lightblue;font-size:18px;font-weight:bold'>"
  .$row1['rstatus'].
    "</td>" ;

}
  
  echo "<td colspan='2' style='background-color:lightbllue;font-size:18px;font-weight:bold'>" . $row1['rcomments'] . "</td>";
  echo "<td colspan='1' style='background-color:lightbllue;font-size:18px;font-weight:bold'>" . $row1['rby'] . "</td>";
  echo "<td colspan='1' style='background-color:lightbllue;font-size:18px;font-weight:bold'>" . $row1['resultstatus'] . "</td>";
  echo "<td colspan='2' style='background-color:lightbllue;font-size:18px;font-weight:bold'>"; 
  

  $type=$row1["type"];
		$pmrn=$row1["pmrn"];
		$eid4=$row1["eid"];
		$id=$row1["id"];
		$link=$row1["report"];
		$record=$row1["result"];
		$ac_no='E'.$row1["id"];
		$url = "$link?pmrn=$pmrn&eid=$eid4&id=$id&sno=$ac_no"; 
	if($type=='lab' && $record !='')
	{ 
echo "<a target='_blank' href='$url'>REPORT</a>";
	}
	
	else if($type=='LAB' && $record !='')
	{ 
echo "<a target='_blank' href='$url'>REPORT</a>";
	}
	else if($type=='lab' && $record =='')
	{ 
echo "REPORT PENDING";
	}
	
	
else if
($type=='rad')
	{ 
	echo '<form target="_blank" action=http://192.168.100.202/Launch_Viewer.asp?" method="post" id="tt" >
<input type="hidden" name="AccessionNumber" value="'.$ac_no.'"</input>
<input type="hidden" name="Username" value="hisuser"></input>
<input type="hidden" name="Password" value="hisuser"></input>
<input type="submit" name="Submit90" value="PACS VIEW" align="right"></input>
	</form>';}
	

  echo "</td>";
  
  
  echo "</tr>";
  
}

while($row = mysqli_fetch_array($result)) {

  $rdate=date('d/m/Y', strtotime($row["ordate"]));
  echo "<tr>";
  echo "<td colspan='1' style='background-color:lightbllue;font-size:18px;font-weight:bold'>" . $row['id'] . "</td>";
  echo "<td colspan='1' style='background-color:lightbllue;font-size:18px;font-weight:bold'>" . $rdate . "</td>";



  echo "<td colspan='4' style='background-color:lightbllue;font-size:18px;font-weight:bold'>";  
		
  $type=$row["type"];
  $pmrn=$row["pmrn"];
  $eid=$row["eid"];
  $infu=$row["infusion"];

 $url = "compareinvesimo?pmrn=$pmrn&eid=$eid&infu=$infu"; 
if($type=='lab' || $type=='LAB' || $type=='spd' || $type=='spd1')
{ 
echo "<a target='_blank' href='$url'>$infu</a>";
}

else if($type=='rad' || $type=='RAD')
{ 
echo $infu;
}

    
echo "</td>";


echo "<td colspan='3' style='background-color:lightbllue;font-size:18px;font-weight:bold'>";  
$type=$row["type"];
		$ac_no='I'.$row["id"];
		$eid=$row["eid"];
		$id=$row["id"];
		$rstatus=["rstatus"];
		$link=$row["report"];
	

$query23 = "SELECT COUNT(status) FROM radpapp where a_no='$ac_no' and status='SEEN'"; 
$result23 = mysqli_query($con, $query23) or die(mysqli_error());
$row23 = mysqli_fetch_array($result23);
$c1=$row23['COUNT(status)'];



$sel_query_oae="Select * from oae_pic where sno='$ac_no' ORDER BY id Desc";
$result_oae = mysqli_query($con,$sel_query_oae);
$row_oae = mysqli_fetch_assoc($result_oae);
$oae_no=$row_oae['image'];


$url_oae="cam_test/oae_photo/$oae_no";

	
		$url = "inradreport?ac_no=$ac_no&dname=$full"; 
		$url_spd = "ecg_pdf2?ac_no=$ac_no&pmrn=$pmrn&id=$id"; 
		
$url_new = "rad_report_new2_1.php?pmrn=$pmrn&acno=$ac_no&dname=$dname5"; 
$date_d= date('2022-03-31');		
		 if($type=='lab')
	{ 
echo $row["result"];
	}
	
	else if($type=='rad' && $c1>0 && $row['ndate']>=$date_d)
	{ 
echo "<a target='_blank' href='$url_new'>REPORT</a>";
	}
	
	else if($type=='RAD' && $c1>0 && $row['ndate']>=$date_d)
	{ 
echo "<a target='_blank' href='$url_new'>REPORT</a>";
	}
	
	
	else if($type=='rad' && $c1>0 && $row['ndate']<$date_d)
	{ 
echo "<a target='_blank' href='$url'>REPORT</a>";
	}
	
	else if($type=='RAD' && $c1>0 && $row['ndate']<$date_d)
	{ 
echo "<a target='_blank' href='$url'>REPORT</a>";
	}
	
	else if($type=='rad' && $c1==0)
	{ 
echo "REPORT PENDING";
	}
		
else if($type=='RAD' && $c1==0)
	{ 
echo "REPORT PENDING";
	}		
	
	
	else if($type=='spd1' || $type=='spd' and $rstatus='RECEIVED' and $row['status']=='SEEN')
	{ 
echo "<a target='_blank' href='$url_spd'>REPORT</a>";

	}
	
	
	else if($row['infusion']=='OAE HEARING SCREENING TEST')
	{ 
echo "<a target='_blank' href='$url_oae'>REPORT</a>";
	}
  echo "</td>";


  echo "<td colspan='2' style='background-color:lightbllue;font-size:18px;font-weight:bold'>";
  
  $icode=$row["code"];  
		$rr=$row["result"];  
		  $selq="Select * from radio where code='$icode';";

$resultq = mysqli_query($con,$selq);
$rowq = mysqli_fetch_assoc($resultq);
$ref1=$rowq['reference'];
$ref2=$rowq['remarks'];
$unit=$rowq['unit'];

	
		
		 if($type=='lab' and $rr !='')
	{ 
echo $ref1.'-'.$ref2.' '.$unit ;
	}
	
	else
	{ 
echo "";
	}
	
  
  
  
  
  echo "</td>";
  echo "<td colspan='2' style='background-color:lightbllue;font-size:18px;font-weight:bold'>" . $row['room'] . "</td>";
  echo "<td colspan='2' style='background-color:lightbllue;font-size:18px;font-weight:bold'>" . $row['rtime'] . "</td>";
  if($row['rstatus']== "REJECTED"){
  echo "<td colspan='1' style='background-color:RED;font-size:18px;font-weight:bold'>"
.$row['rstatus'].
  "</td>";  
}
else {
  echo "<td colspan='1' style='background-color:lightblue;font-size:18px;font-weight:bold'>"
  .$row['rstatus'].
    "</td>" ;

}
  
  echo "<td colspan='2' style='background-color:lightbllue;font-size:18px;font-weight:bold'>" . $row['rcomments'] . "</td>";
  echo "<td colspan='1' style='background-color:lightbllue;font-size:18px;font-weight:bold'>" . $row['rby'] . "</td>";
  echo "<td colspan='1' style='background-color:lightbllue;font-size:18px;font-weight:bold'>" . $row['resultstatus'] . "</td>";
  echo "<td colspan='2' style='background-color:lightbllue;font-size:18px;font-weight:bold'>"; 
  

  $type=$row["type"];
		$pmrn=$row["pmrn"];
		$eid=$row["eid"];
		$id=$row["id"];
		$link=$row["report"];
		$record=$row["result"];
		$ac_no='I'.$row["id"];
		$url = "$link?pmrn=$pmrn&eid=$eid&id=$id&sno=$ac_no"; 
	if($type=='lab' && $record !='')
	{ 
echo "<a target='_blank' href='$url'>REPORT</a>";
	}
	
	else if($type=='LAB' && $record !='')
	{ 
echo "<a target='_blank' href='$url'>REPORT</a>";
	}
	
	
	else if($type=='lab' && $record =='')
	{ 
echo "REPORT PENDING";
	}
	
	

	
	
	
	
	else if
($type=='rad' || $type=='RAD' and $tt=='192.168.100.252:8081')
	{ 
	echo '<form target="_blank" action=http://192.168.100.202/Launch_Viewer.asp?" method="post" id="tt" >
<input type="hidden" name="AccessionNumber" value="'.$ac_no.'"</input>
<input type="hidden" name="Username" value="hisuser"></input>
<input type="hidden" name="Password" value="hisuser"></input>
<input type="submit" name="Submit90" value="PACS VIEW" align="right"></input>
	</form>';}


else if
($type=='rad' || $type=='RAD' and $tt!='192.168.100.252:8081')
	{ 
	echo'<form target="_blank" action="http://182.160.124.36/Launch_Viewer.asp?" method="post" id="tt" >
<input type="hidden" name="AccessionNumber" value="'.$ac_no.'"</input>
<input type="hidden" name="Username" value="hisuser"></input>
<input type="hidden" name="Password" value="hisuser"></input>
<input type="submit" name="Submit90" value="PACS VIEW" align="right"></input>
	</form>';}

  echo "</td>";
  
  
  echo "</tr>";
  
}
echo "</table>";
mysqli_close($con);
?>
</body>
</html>