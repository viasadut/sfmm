<?php 
    require('db1.php');
/*$sel7="Select COUNT(id) from noti where user in ('all','$user') and sa='0'";

$resu7 = mysqli_query($con,$sel7);
$rw7 = mysqli_fetch_assoc($resu7);
*/

/*$_SESSION['id'] = $rw7['COUNT(id)'];
echo $pid = $_SESSION['id'];

*/

    session_start();

	$role = $_SESSION['sess_userrole'];
	
$queryc = "SELECT COUNT(utype) FROM user where '$role' in ('lab','nurse','imo')"; 
$resultc = mysqli_query($con, $queryc) or die(mysqli_error());
$rowc = mysqli_fetch_array($resultc);
$c1=$rowc['COUNT(utype)'];
	
    if(!isset($_SESSION['sess_username']) || $c1==0){
      header('Location: login2?err=2');
    }

	
	
	
	?>
	
	<?php
	
	if(isset($_POST['but_update'])){


if(empty($_REQUEST['update']))
{
	echo '<script language="javascript">';
    echo 'alert("Unsuccessful !!! No Row Selected!!"); ';
    echo '</script>';
	
}


            else {
                foreach($_POST['update'] as $updateid){
					
			
			/*$objConnect = mysqli_connect("localhost","root","Godiloveu16") or die("Error Connect to Database");
			$objDB1 = mysqli_select_db($objConnect,"sfmmkpjnew");

			$qq = mysqli_query($db,"select * from pmedi where id='".$updateid."'");
			$dd = mysqli_fetch_assoc($qq);
			$medi_1 = $dd["medi"];
			$code_1 = $dd["code"];
			$p_mrn = $dd["pmrn"];
			$p_name = $dd["pname"];
			
			$qq1 = mysqli_query($db,"select * from medicine where mname='".$medi_1."' and status='Active'");
			$dd1 = mysqli_fetch_assoc($qq1);
			$p_price=$dd1['uprice'];
			$brand=$dd1['brand1'];
			$lqty=$dd1['tqty'];
			$ins = $dd["pdos"].','.$dd["frelation"].','.$dd["duration"];*/
			
			
			echo '<script language="javascript">';
    echo 'alert("TEST !!!"); ';
    echo '</script>';
				}
			}
	}
	
	?>

<!DOCTYPE html>
<html>
<head>
<link rel="stylesheet" href="notification-demo-style.css" type="text/css">
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
</head>
<body>




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


<form action="" method="GET">


<table width="100%" height ="100%" border="1" align="center" bgcolor="lightgreen" style="border-collapse:collapse;" id="myTable">
 <tr>
      <th width="4%"><strong>S.No</strong></th>
      <th width="17%"><strong>Patient Name</strong></th>
      <th width="10%"><strong>MRN</strong></th>
      <th width="15%"><strong>Consultant name </strong>
      <th width="14%"><strong>Ward</strong>   
	        <th width="14%"><strong>Bed</strong>   
			<th width="14%"><strong>Investigation</strong>   
      <th width="14%"><strong>Collect</strong>
      

';

$date=date('Y-m-d');											
$date1=date('Y-m-d', strtotime ('-2 days'));

$sql="SELECT * FROM `inpatient` WHERE discharge=''";


$result = mysqli_query($con,$sql);
$count=1;
while($row = mysqli_fetch_assoc($result)) {
	
	$pp=$row['pmrn'];
	$ee=$row['eid'];
  
$sql1="SELECT * FROM `iinves` WHERE pmrn='$pp' and eid='$ee' and status='Data Updated' and type in ('Lab','LAB','lab')";


$result1 = mysqli_query($con,$sql1);
  
  $row1 = mysqli_fetch_assoc($result1);
  
  if(mysqli_fetch_assoc($result1)==true){
  echo "<tr>";
  
  
  
  
  echo "<td style='background-color:#eed7a1;font-size:13px;font-weight:bold'>" . $count . "</td>";
   echo "<td style='background-color:#eed7a1;font-size:13px;font-weight:bold'>" . $row['pname'] . "</td>";
   
  
  
  echo "<td style='background-color:#eed7a1;font-size:13px;font-weight:bold'>" . $row['pmrn'] . "";
  
 
  echo "</td>";
  echo "<td style='background-color:#eed7a1;font-size:13px;font-weight:bold'>" . $row['adoc'] . "</td>";
  echo "<td style='background-color:#eed7a1;font-size:13px;font-weight:bold'>" . $row['room'] . "</td>";
  echo "<td style='background-color:#eed7a1;font-size:13px;font-weight:bold'>" . $row['room1'] . "</td>";
  
 
  
  echo "<td style='background-color:#eed7a1;font-size:13px;font-weight:bold'>";
  
   $sql2="SELECT * FROM `iinves` WHERE pmrn='$pp' and eid='$ee' and status='Data Updated' and type in ('Lab','LAB','lab')";


$result2 = mysqli_query($con,$sql2);
  
  
  while($row2 = mysqli_fetch_assoc($result2)) {
  
  echo $row2['infusion'];
  echo"<br>";
  }
  
  echo"</td>";
  
 echo"<td align='center' style='background-color:#eed7a1;font-size:12px;'><button type='button' class='btn btn-primary btn-sm' data-toggle='modal' data-target='#modal-view".$row["id"]."'>
                                                Collect <i class='fa fa-clipboard' aria-hidden='true'></i>
                                            </button>
										<div class='modal fade bd-example-modal-lg' id='modal-view".$row["id"]."' tabindex='-1' role='dialog' aria-labelledby='myLargeModalLabel' aria-hidden='true'>
                                                <div class='modal-dialog modal-lg'>
                                                    <div class='modal-content'>
                                                        <div class='modal-header'>
                                                            <h1 class='modal-title'>".$row['pname']."(".$row['pmrn'].")</h1>
                                                            <button type='button' class='close' data-dismiss='modal' aria-label='Close'>
                                                                <span aria-hidden='true'>&times;</span>
                                                            </button>
                                                        </div>
                                                        <div class='modal-body'>";
													
													
								echo'<p style="font-size:30px;color:green;text-align:right;font-weight:bold"><a style="color:green"target="_blank" href="labinp?pmrn='.$row["pmrn"].'&eid='.$row["eid"].'">Receive</a></p>';			
													
$inqt = "SELECT * FROM iinves where pmrn= ".$row['pmrn']." and eid=".$row['eid']." and status='Data Updated' and type in ('Lab','LAB','lab') order by ndate desc"; 
	 
$inrt = mysqli_query($con, $inqt) or die(mysqli_error());

// Print out result

while($in_rowt = mysqli_fetch_assoc($inrt)) 
{ 
$i=$in_rowt['id'];

echo "<p>
<span style='color:green;font-size:22px;font-weight:bold'>".$in_rowt['dname']." ( ".$in_rowt['ndate'].")- </span>

<span style='color:red;font-size:18px;font-weight:bold'>".$in_rowt['infusion']."</span>
<span>
<input type='checkbox' name='update[]' value='".$id."' style='height:22px; width:22px;'>

</span>
</p>";}													   		
														
													echo"	<div class='modal-footer justify-content-between'>
                                                            <button type='button' class='btn btn-default' data-dismiss='modal'>Close <i class='fas fa-times'></i></button>
															<input type='submit' value='Confirm' name='but_update' class='btn btn-default'><i class='fas fa-times'></i>
                                                        </div>
                                                                    </div>
                                                                </div>
                                                            
                                                        </div>
                                                        
                                                    </div>
                                                </div>
                                            </div></td>
														
														";
											



  
  
  echo "</tr>";

  $count++;
  }
}
echo "<form></table>";

mysqli_close($con);

}

//$cc=1;

?>




</body>


</html>