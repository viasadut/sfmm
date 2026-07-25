<?php
 
//require('db1.php');

if(isset($_POST['bsearch']))
{
echo $email =$_REQUEST['email'];
echo $uu=$_REQUEST['url'];

/*$mail_body = "
			
					
			
<p>Best Regards".$uu.",<br />TM Services,<br />Powered By KPJ_IT_DHAKA</p>			
			";
			require 'class/class.phpmailer.php';
			$mail = new PHPMailer;
			$mail->IsSMTP();								//Sets Mailer to send message using SMTP
			$mail->Host = 'sfmmkpjsh.com';		//Sets the SMTP hosts of your Email hosting, this for Godaddy
			$mail->Port = '465';								//Sets the default SMTP server port
			$mail->SMTPAuth = true;							//Sets SMTP authentication. Utilizes the Username and Password variables
			$mail->Username = 'test_email@sfmmkpjsh.com';					//Sets SMTP username
			$mail->Password = 'Godiloveu16Steven';					//Sets SMTP password
			$mail->SMTPSecure = 'ssl';							//Sets connection prefix. Options are "", "ssl" or "tls"
			$mail->From = 'test_email@sfmmkpjsh.com';			//Sets the From email address for the message
			$mail->FromName = 'SFMMKPJSH TM SERVICES';					//Sets the From name of the message
			$mail->AddAddress($email);		//Adds a "To" address			
			$mail->WordWrap = 50;							//Sets word wrapping on the body of the message to a given number of characters
			$mail->IsHTML(true);							//Sets message type to HTML				
			$mail->Subject = 'Leave Confirmmation';			//Sets the Subject of the message
			$mail->Body = $mail_body;							//An HTML or plain text message body
			if($mail->Send())								//Send an Email. Return true on success or false on error
			{
				$message = '<label class="text-success">Register Done, Please check your mail.</label>';
			}


*/

}
?>

<!DOCTYPE html>
<html lang="en" >

<head>
  <meta charset="UTF-8">
  <title>DID REPORT</title>
  
    <link rel="stylesheet" href="jsnew/normalize.min.css">

  
      <style>

html { box-sizing: border-box; }

*, *:before, *:after {
  -moz-box-sizing: border-box;
  -webkit-box-sizing: border-box;
  box-sizing: border-box;
}

body {
  font-family: 'Nunito',sans-serif;
  color: #384047;
  background: #A085C6;
}

form {
  max-width: 2000px;
  margin: 10px auto;
  padding: 10px 20px;
  background: #f4f7f8;
  border-radius: 8px;
  border: 1px solid #8265B0;
  box-shadow: 3px 3px 3px rgba(0,0,0,0.2)
}

h1 {
  margin: 0 0 30px 0;
  text-align: center;
}

input[type="text"],
input[type="password"],
input[type="date"],
input[type="datetime"],
input[type="email"],
input[type="number"],
input[type="search"],
input[type="tel"],
input[type="time"],
input[type="url"],
textarea,
select {
  background: rgba(255,255,255,0.1);
  border: none;
  font-size: 16px;
  height: auto;
  margin: 0;
  outline: 0;
  padding: 15px;
  width: 100%;
  background-color: #e8eeef;
  color: #8a97a0;
  box-shadow: 0 1px 0 rgba(0,0,0,0.03) inset;
  margin-bottom: 30px;
}


input[type="radio"],
input[type="checkbox"] {
  margin: 0 4px 8px 0;
}

select {
  padding: 6px;
  height: 32px;
  border-radius: 2px;
}

button {
  padding: 19px 39px 18px 39px;
  color: #FFF;
  background-color: #A085C6;
  /*#4bc970*/
  font-size: 18px;
  text-align: center;
  font-style: normal;
  border-radius: 5px;
  width: 100%;
  border: 1px solid #8265B0;
  /*#3ac162*/
  border-width: 1px 1px 3px;
  box-shadow: 0 -1px 0 rgba(255,255,255,0.1) inset;
  margin-bottom: 10px;
}

fieldset {
  margin-bottom: 30px;
  border: none;
}

legend {
  font-size: 1.4em;
  margin-bottom: 10px;
}

label {
  display: block;
  margin-bottom: 8px;
}

label.light {
  font-weight: 300;
  display: inline;
}

.number {
  background-color: #A085C6;
  /*#5fcf80*/
  color: #fff;
  height: 30px;
  width: 30px;
  display: inline-block;
  font-size: 0.8em;
  margin-right: 4px;
  line-height: 30px;
  text-align: center;
  text-shadow: 0 1px 0 rgba(255,255,255,0.2);
  border-radius: 100%;
}

abbr[title] {
	border-bottom-width: 0;
}


@media screen and (min-width: 480px) {

  form {
    max-width: 2000px;
  }

}
      </style>

    <script src="jsnew/pprefixfree.min.js"></script>



<link rel="stylesheet" href="jsnew/jquery-ui.css">
<script src="jsnew/jquery.min.js"></script>
<script src="jsnew/jquery-ui.min.js"></script>

  
  <script>
  $(document).ready(function() {
    $("#datepicker").datepicker();
  });
  </script>





  <style type="text/css">
<!--
.style1 {font-weight: bold}
-->
  </style>
  
  <head>
    <title>PHP - Dynamically Add or Remove input fields using JQuery</title>
    <link rel="stylesheet" href="jsnew/bootstrap.min.css" />  
    <script src="jsnew/jjquery.min.js"></script>
    <script src="jsnew/bootstrap.min.js"></script>

    <link href="jsnew/jquery-ui.css" rel="stylesheet" />
    <link href="./jquery.multiselect.css" rel="stylesheet" />
    <script src="jsnew/jquery-1.12.4.js"></script>
    <script src="jsnew/jquery-ui.js"></script>
    <script src="./jquery.multiselect.js"></script>


<link rel="stylesheet" href="styles.css">

   <script src="script.js"></script>
</head>

					 
					 
					 <?php 
/* 
| Developed by: Tauseef Ahmad
| Last Upate: 01-19-2021 08:45 PM
| Facebook: www.facebook.com/ahmadlogs
| Twitter: www.twitter.com/ahmadlogs
| YouTube: https://www.youtube.com/channel/UCOXYfOHgu-C-UfGyDcu5sYw/
| Blog: https://ahmadlogs.wordpress.com/
 */ 
 
 
include_once 'Zoom_Api.php';

$zoom_meeting = new Zoom_Api();

$data = array();
$data['topic'] 		= 'SFMMKPJSH Online Patient Consultation ';
$data['start_date'] = date("Y-m-d h:i:s", strtotime('tomorrow'));
$data['duration'] 	= 120;
$data['type'] 		= 2;
$data['password'] 	= "12345";


	$response = $zoom_meeting->createMeeting($data);
	
	//echo "<pre>";
	//print_r($response);
	//echo "<pre>";
	
	"Meeting ID: ". $response->id;
	"<br>";
	"Topic: "	. $response->topic;
	"<br>";
	"Join URL: ";
	"<br>";
	$response->join_url;
	"<br>";
	"<a target='_blank' href='". $response->join_url ."'>Open URL</a>";
	"<a target='_blank' href='index_test?url=". $response->join_url ."'>Open</a>";
	"<br>";
	"Meeting Password: ". $response->password;
	
	



?>
</form>