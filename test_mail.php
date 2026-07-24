
<?php 
    session_start();
    $role = $_SESSION['sess_userrole'];
    if(!isset($_SESSION['sess_username']) || $role!="staff"){
      header('Location: login2?err=2');
    }
?>


<?php
/*
Author: Javed Ur Rehman
Website: https://www.allphptricks.com/
*/
$email='diasadman16@gmail.com';
$mname='Steven';

$mail_body = "
			<p>Hi ".$row3['sname'].",</p>
			<p>Salam and Greetings. As referred to your leave application at PMS-</p>
			<p>Please be informed that Your Annual Leave from  ".$rowl['sdate']." to ".$rowl['edate']." is Approved.</p>
			
			<p>We request you to complete all your pending or important work if there is any so that the Hospital & Nursing College does not face any problems during your Leave.</p>
			<p>We much appreciate your thoughtfulness in advance.</p>

			
			<p>Best Regards,<br />Human Resources Management,<br />Powered By KPJ_IT_DHAKA</p>
			";
			require 'class/class.phpmailer.php';
			$mail = new PHPMailer;
			$mail->IsSMTP();								//Sets Mailer to send message using SMTP
			$mail->Host = 'mail.sfmmkpjsh.com';		//Sets the SMTP hosts of your Email hosting, this for Godaddy
			$mail->Port = '465';								//Sets the default SMTP server port
			$mail->SMTPAuth = true;							//Sets SMTP authentication. Utilizes the Username and Password variables
			$mail->Username = 'sfmm_leave@sfmmkpjsh.com';					//Sets SMTP username
			$mail->Password = 'Con@leave$sfmm';					//Sets SMTP password
			$mail->SMTPSecure = 'ssl';							//Sets connection prefix. Options are "", "ssl" or "tls"
			$mail->From = 'sfmm_leave@sfmmkpjsh.com';			//Sets the From email address for the message
			$mail->FromName = 'SFMMKPJSH TM SERVICES';					//Sets the From name of the message
			$mail->AddAddress($email, $mname);		//Adds a "To" address			
			$mail->WordWrap = 50;							//Sets word wrapping on the body of the message to a given number of characters
			$mail->IsHTML(true);							//Sets message type to HTML				
			$mail->Subject = 'Leave Confirmmation';			//Sets the Subject of the message
			$mail->Body = $mail_body;							//An HTML or plain text message body
			if($mail->Send())								//Send an Email. Return true on success or false on error
			{
				$message = '<label class="text-success">Register Done, Please check your mail.</label>';
			}






header("Location: $url"); 


?>