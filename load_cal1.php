<?php

//load.php

$connect = new PDO('mysql:host=localhost;dbname=sfmmkpjnew', 'root', 'Godiloveu16');
$t=$_GET['t1'];

$treat=explode(',',$t);
	
	$t1=$treat[0];
	$t2=$treat[1];
$data = array();


$query = "SELECT * FROM con_work where dcode='$t2' ORDER BY id";

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
