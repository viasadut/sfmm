<?php
require('db1.php');

	
$pmrn=$_REQUEST['pmrn'];
//$sel_query="Select medi from alltest where pmrn='24084' order by rand() limit 2;";
$sel_query="Select * from alltest where pmrn='$pmrn' order by rand() limit 2;";
$result = mysqli_query($con,$sel_query);
$count = mysqli_num_rows($result);
header('Content-Type:application/json');

//$json_array=array();
if($count>0){
while($row = mysqli_fetch_assoc($result)) 
{ 

   $arr[]=$row; 
  // echo $data['medi'].'<br>';
} 
echo json_encode(['status'=>true,'data'=>$arr,'Result'=>'Found']);
}
else {json_encode(['status'=>true,'data'=>'No Data Found','Result'=>'Not']);}
/*echo '<pre>';
print_r($json_array);
echo '</pre>';*/
?>
 