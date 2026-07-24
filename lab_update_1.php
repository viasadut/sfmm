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
	
$queryc = "SELECT COUNT(utype) FROM user where '$role' in ('staff','nurse','imo')"; 
$resultc = mysqli_query($con, $queryc) or die(mysqli_error());
$rowc = mysqli_fetch_array($resultc);
$c1=$rowc['COUNT(utype)'];
	
    if(!isset($_SESSION['sess_username']) || $c1==0){
      header('Location: login2?err=2');
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

echo "


<form action='' method='GET'>


<table width='100%' height ='100%' border='1' align='center' bgcolor='#eed7a1' style='border-collapse:collapse;' id='myTable'>

";

$date=date('Y-m-d');											
$date1=date('Y-m-d', strtotime ('-2 days'));

$sql="SELECT id,pmrn,pname FROM `iinves` WHERE status='Data Updated' and ndate between '$date1' and '$date' GROUP BY pmrn";


$result = mysqli_query($con,$sql);
$count=1;
while($row = mysqli_fetch_assoc($result)) {
  echo "<tr>";
  
  
  
  
  echo "<td style='background-color:#eed7a1;font-size:13px;font-weight:bold'>" . $count . "</td>";
  
  
  echo "<td style='background-color:#eed7a1;font-size:13px;font-weight:bold'>" . $row['pmrn'] . "";
  
 
  echo "</td>";
  
  
 echo"<td align='center' style='background-color:#eed7a1;font-size:12px;'><button type='button' class='btn btn-primary btn-sm' data-toggle='modal' data-target='#modal-view".$row["id"]."'>
                                                View <i class='fa fa-clipboard' aria-hidden='true'></i>
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
													
													
													
													
$inqt = "SELECT * FROM iinves where pmrn= ".$row['pmrn']." and status='Data Updated' order by ndate desc"; 
	 
$inrt = mysqli_query($con, $inqt) or die(mysqli_error());

// Print out result

while($in_rowt = mysqli_fetch_assoc($inrt)) 
{ 


echo "<p>
<span style='color:green;font-size:22px;font-weight:bold'>".$in_rowt['dname']." ( ".$in_rowt['ndate'].")- </span>

<span style='color:red;font-size:18px;font-weight:bold'>".$in_rowt['infusion']."</span></p>";}													   		
														
													echo"	<div class='modal-footer justify-content-between'>
                                                            <button type='button' class='btn btn-default' data-dismiss='modal'>Close <i class='fas fa-times'></i></button>
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
echo "<form></table>";

mysqli_close($con);

}

//$cc=1;

?>




</body>


</html>