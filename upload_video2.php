<?php
include("db1.php");
if(isset($_GET['id']))
{
$id=$_GET['id'];
$query= mysqli_query($con,"select * from videos where id='$id'");
while($row=mysqli_fetch_assoc($query))

{
$name=$row['name'];
$url=$row['vdo_address'];
}
echo"jkshdfkd".$name."<br />";
echo "<embed src='$url' width='450' height='315'></>";

}

else {

echo "ERROR"
};
?>