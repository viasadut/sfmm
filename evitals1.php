
<?php
/**
 * filename: data.php
 * description: this will return the score of the teams.
 */

//setting header to json
header('Content-Type: application/json');

//database
define('DB_HOST', '127.0.0.1');
define('DB_USERNAME', 'root');
define('DB_PASSWORD', 'Godiloveu16');
define('DB_NAME', 'sfmmkpjnew');

//get connection
$mysqli = new mysqli(DB_HOST, DB_USERNAME, DB_PASSWORD, DB_NAME);

if(!$mysqli){
	die("Connection failed: " . $mysqli->error);
}

$pmrn=$_REQUEST['pmrn'];
$eid=$_REQUEST['eid'];
$odate1=$_REQUEST['odate1'];
//query to get data from the table
$query = sprintf("SELECT * FROM gcs1  WHERE `pmrn`='$pmrn' and `eid`='$eid' and `date2`='$odate1' ");

//execute query
$result = $mysqli->query($query);

//loop through the returned data
$data = array();
foreach ($result as $row) {
	$data[] = $row;
}

//free memory associated with result
$result->close();

//close connection
$mysqli->close();

//$url = "http" . (($_SERVER['SERVER_PORT'] == 443) ? "s" : "") . "://" . $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI']; 
//print $url;
//now print the data
print json_encode($data);

