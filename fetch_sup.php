<?php

//fetch.php

include('database_connection.php');

if(isset($_POST["id"]))
{
 $query = "SELECT * FROM suppliers_master WHERE supplier_code = '".$_POST["id"]."'";

 $statement = $connect->prepare($query);

 $statement->execute();

 $result = $statement->fetchAll();

 $output = '';

 foreach($result as $row)
 {
  $output .= '
  <img src="staff_pic/'.$row["pic"].'" class="img-thumbnail" />
  <h4>Name - '.$row["supplier_code"].'</h4>
  <h4>Staff ID. - '.$row["supplier_name"].'</h4>
  <h4>Designation. - '.$row["supplier_type"].'</h4>
  <h4>Department. - '.$row["address"].'</h4>
  ';
 }
 echo $output;
}

?>
