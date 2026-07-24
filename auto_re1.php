<?php
require('db1.php');
//$link=mysqli_connect("localhost","root","Godiloveu16");
//mysqli_select_db($link,"sfmmkpjnew");
$res=mysqli_query($con,"select * from user");
while($row=mysqli_fetch_assoc($res))
	

{

echo $row["uname"]." ".$row["upass"];
echo "<br>";

}

?>
