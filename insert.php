

<?php
//insert.php;

if(isset($_POST["mname"]))
{
$connect = new PDO("mysql:host=localhost;dbname=sfmmkpj", "root", "Godiloveu16");
 $order_id = uniqid();
 for($count = 0; $count < count($_POST["item_name"]); $count++)
 {  
  $query = "INSERT INTO Medicine 
  (order_id, item_name, item_quantity, item_unit) 
  VALUES (:order_id, :item_name, :item_quantity, :item_unit)
  ";
  $statement = $connect->prepare($query);
  $statement->execute(
   array(
    ':order_id'   => $order_id,
    ':item_name'  => $_POST["item_name"][$count], 
    ':item_quantity' => $_POST["item_quantity"][$count], 
    ':item_unit'  => $_POST["item_unit"][$count]
   )
  );
 }
 $result = $statement->fetchAll();
 if(isset($result))
 {
  echo 'ok';
 }
}
?>
