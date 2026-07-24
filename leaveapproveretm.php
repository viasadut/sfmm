<?php
/*
Author: Javed Ur Rehman
Website: https://www.allphptricks.com/
*/

require('db1.php');
$user=$_REQUEST['user'];
$id=$_REQUEST['id'];
$uname=$_REQUEST['uname'];
//$eid=$_REQUEST['eid'];
//$pmrn=$_REQUEST['pmrn'];
$dtime= date('d/m/Y H:i:s');
//$id1=$_REQUEST['ID'];
$url = "leaveview";

$query3 = "SELECT * FROM staff3 where sid= '$uname'"; 
	 
$result3 = mysqli_query($con, $query3) or die(mysqli_error());

// Print out result
$row3 = mysqli_fetch_array($result3);


$email = $row3['email'];
$mname = $row3['sname'];





$query = "UPDATE dleave set hstatus='Rejected By TM',rejecttime='$dtime',rejectby='$user' where id='$id'"; 
$result = mysqli_query($con,$query) or die ( mysqli_error());

$mail_body = "
			<p>Hi ".$row3['sname'].",</p>
			<p>Please be informed that Your Inpatient Leave from  ".$rowl['sdate']." to ".$rowl['edate']." is Rejected BY TM Services.</p>
			
			<p>Best Regards,<br />TM Services,<br />Powered By KPJ_IT_DHAKA</p>
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
			$mail->AddAddress($email, $mname);		//Adds a "To" address			
			$mail->WordWrap = 50;							//Sets word wrapping on the body of the message to a given number of characters
			$mail->IsHTML(true);							//Sets message type to HTML				
			$mail->Subject = 'Leave Rejection Email';			//Sets the Subject of the message
			$mail->Body = $mail_body;							//An HTML or plain text message body
			if($mail->Send())								//Send an Email. Return true on success or false on error
			{
				$message = '<label class="text-success">Register Done, Please check your mail.</label>';
			}


header("Location: $url"); 
?>