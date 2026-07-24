<?php
    $database = 'sfmmkpjnew';
    $host = 'localhost';
    $user = 'root';
    $pass = 'Godiloveu16';
    $dbh = new PDO("mysql:dbname={$database};host={$host}", $user, $pass);

    if(!$dbh){
        echo "unable to connect to database";
    }
?>