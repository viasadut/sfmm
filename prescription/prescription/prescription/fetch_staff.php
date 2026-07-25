<?php

//fetch.php

include('../../database_connection.php');

if(isset($_POST["id"]))
{
 $query = "SELECT * FROM staff3 WHERE id = '".$_POST["id"]."'";

 $statement = $connect->prepare($query);

 $statement->execute();

 $result = $statement->fetchAll();

 $output = '';

 foreach($result as $row)
 {
  $output .= '
  <img src="../../staff_pic/'.$row["pic"].'" class="img-thumbnail" />
  <h4>Name - '.$row["sname"].'</h4>
  <h4>Staff ID. - '.$row["sid1"].'</h4>
  <h4>Designation. - '.$row["desig"].'</h4>
  <h4>Department. - '.$row["dept"].'</h4>
  ';
 }
 echo $output;
}

?>
