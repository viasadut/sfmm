<?php

$connect = new PDO("mysql:host=localhost;dbname=sfmmkpjnew", "root", "Godiloveu16");

if(isset($_POST["type"]))
{
 if($_POST["type"] == "category_data")
 {
  $query = "
  SELECT * FROM user 
  ORDER BY id ASC
  ";
  $statement = $connect->prepare($query);
  $statement->execute();
  $data = $statement->fetchAll();
  foreach($data as $row)
  {
   $output[] = array(
    'id'  => $row["id"],
    'name'  => $row["utype"]
   );
  }
  echo json_encode($output);
 }
 else
 {
  $query = "
  SELECT * FROM user 
  WHERE utype = '".$_POST["name"]."' 
  ORDER BY utype ASC
  ";
  $statement = $connect->prepare($query);
  $statement->execute();
  $data = $statement->fetchAll();
  foreach($data as $row)
  {
   $output[] = array(
    'id'  => $row["id"],
    'name'  => $row["uname"]
   );
  }
  echo json_encode($output);
 }
}

?>