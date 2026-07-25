<?php
mysqli_report(MYSQLI_REPORT_OFF);
$con = mysqli_connect("localhost", "root", "", "sfmmkpjnew");
if (mysqli_connect_errno()) {
    die("Failed to connect to MySQL: " . mysqli_connect_error());
}
