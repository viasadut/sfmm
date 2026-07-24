<?php 
    session_start();
    require('db1.php');
	$role = $_SESSION['sess_userrole'];
	
	$queryc = "SELECT COUNT(utype) FROM user where '$role' in ('doctor','moopd')"; 
$resultc = mysqli_query($con, $queryc) or die(mysqli_error());
$rowc = mysqli_fetch_array($resultc);
$c1=$rowc['COUNT(utype)'];
	
    if(!isset($_SESSION['sess_username']) || $c1==0){
      header('Location: login2?err=2');
    }
?>

<?php

//load.php
$fullname = $_SESSION['sess_username'];

$connect = new PDO('mysql:host=localhost;dbname=sfmmkpjnew', 'root', 'Godiloveu16');
$t=$_GET['t1'];
$data = array();


$query = "SELECT * FROM con_work where dcode='$fullname' ORDER BY id";

$statement = $connect->prepare($query);

$statement->execute();

$result = $statement->fetchAll();

foreach($result as $row)
{
 $data[] = array(
  'id'   => $row["id"],
  'title'   => $row["pro_name"].'- Patient Name:'.$row['pname'].'- Patient MRN:'.$row['pmrn'],
  'start'   => $row["date"],
  'end'   => $row["date"]
  
 );
}

echo json_encode($data);

?>
