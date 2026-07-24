
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <meta name="description" content="">
    <meta name="author" content="">
    

    <title>Tickting</title>

    <link href="assets/css/bootstrap.min.css" rel="stylesheet">
    <link href="assets/css/ie10-viewport-bug-workaround.css" rel="stylesheet">

    <link href="navbar-fixed-top.css" rel="stylesheet">
    <script src="assets/js/ie-emulation-modes-warning.js"></script>
    <style>
    body {
  min-height: 200px;
  padding-top: 70px;
}
    </style>
  </head>

  <body>
<?php
session_start();
$role = $_SESSION['sess_userrole'];
$user = $_SESSION['sess_username'];



if( $role=="staff"){
    include 'nav.php';
}
else if ($role=="it") {
    include 'nav_it.php';
}
else if ($role=="mng") {
    include 'nav_m.php';
}

else if ($role=="lab") {
    include 'nav_m.php';
}
?>