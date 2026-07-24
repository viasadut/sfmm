<?php
//database_connection.php

$connect = new PDO("mysql:host=localhost;dbname=sfmmkpjnew", "root", "Godiloveu16");

session_start();

$_SESSION["user_id"] = "1";

?>