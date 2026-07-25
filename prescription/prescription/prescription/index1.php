<?php 
/* 
| Developed by: Tauseef Ahmad
| Last Upate: 01-19-2021 08:45 PM
| Facebook: www.facebook.com/ahmadlogs
| Twitter: www.twitter.com/ahmadlogs
| YouTube: https://www.youtube.com/channel/UCOXYfOHgu-C-UfGyDcu5sYw/
| Blog: https://ahmadlogs.wordpress.com/
 */ 
 
 
include_once 'Zoom_Api1.php';

$zoom_meeting = new Zoom_Api();

$data = array();
$data['topic'] 		= 'SFMMKPJSH Online Patient Consultation ';
$data['start_date'] = date("Y-m-d h:i:s", strtotime('tomorrow'));
$data['duration'] 	= 120;
$data['type'] 		= 2;
$data['password'] 	= "12345";

try {
	$response = $zoom_meeting->createMeeting($data);
	
	//echo "<pre>";
	//print_r($response);
	//echo "<pre>";
	
	echo "Meeting ID: ". $response->id;
	echo "<br>";
	echo "Topic: "	. $response->topic;
	echo "<br>";
	echo "Join URL: ";
	echo "<br>";
	echo $response->join_url;
	echo "<br>";
	echo "<a target='_blank' href='". $response->join_url ."'>Open URL</a>";
	echo "<br>";
	echo "Meeting Password: ". $response->password;
    
	
} catch (Exception $ex) {
    echo $ex;
}


?>