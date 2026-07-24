<?php
/*
Author: Javed Ur Rehman
Website: https://www.allphptricks.com/
*/


$con2 = mysqli_connect("localhost","root","Godiloveu16","test");
// Check connection
if (mysqli_connect_errno())
  {
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
  }
?>