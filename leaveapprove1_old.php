
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

require('db1.php');
$uname=$_REQUEST['uname'];
$id=$_REQUEST['id'];
$type=$_REQUEST['type'];
$bal=$_REQUEST['bal'];
//$dname=$_REQUEST['dname'];
//$eid=$_REQUEST['eid'];
//$pmrn=$_REQUEST['pmrn'];


$query3 = "SELECT * FROM staff3 where sid= '$uname'"; 
	 
$result3 = mysqli_query($con, $query3) or die(mysqli_error());

// Print out result
$row3 = mysqli_fetch_array($result3);
$ataken=$row3['ataken']+$bal;
$etaken=$row3['etaken']+$bal;
$staken=$row3['staken']+$bal;
$mataken=$row3['mataken']+$bal;
$pataken=$row3['pataken']+$bal;
$rltaken=$row3['rleave']+$bal;
$lwpltaken=$row3['lwl']+$bal;
$intaken=$row3['intaken']+$bal;
$comltaken=$row3['comltaken']+$bal;
$mrltaken=$row3['mrltaken']+$bal;
$martaken=$row3['martaken']+$bal;
$insleave=$row3['insleave']+$bal;

$email = $row3['email'];
$mname = $row3['sname'];



$queryl = "SELECT * FROM dleave where id= '$id'"; 
	 
$resultl = mysqli_query($con, $queryl) or die(mysqli_error());

// Print out result
$rowl = mysqli_fetch_array($resultl);




$dtime= date('d/m/Y H:i:s');
//$id1=$_REQUEST['ID'];
$url = "leaveviewtm";
if($type=='aleave'){
$query1 = "UPDATE staff3 set ataken='$ataken' where sid='$uname'"; 
$result1 = mysqli_query($con,$query1) or die ( mysqli_error());


$query = "UPDATE dleave set hstatus='Confirmed By TM',tatime='$dtime' where id='$id'"; 
$result = mysqli_query($con,$query) or die ( mysqli_error());

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
			$mail->FromName = 'SFMMKPJSH HRM SERVICES';					//Sets the From name of the message
			$mail->AddAddress($email, $mname);		//Adds a "To" address			
			$mail->WordWrap = 50;							//Sets word wrapping on the body of the message to a given number of characters
			$mail->IsHTML(true);							//Sets message type to HTML				
			$mail->Subject = 'Leave Confirmmation';			//Sets the Subject of the message
			$mail->Body = $mail_body;							//An HTML or plain text message body
			if($mail->Send())								//Send an Email. Return true on success or false on error
			{
				$message = '<label class="text-success">Register Done, Please check your mail.</label>';
			}






header("Location: $url"); }

else if($type=='sleave'){
$query1 = "UPDATE staff3 set sleave='$staken',staken='$staken' where sid='$uname'"; 
$result1 = mysqli_query($con,$query1) or die ( mysqli_error());


$query = "UPDATE dleave set hstatus='Confirmed By TM',tatime='$dtime' where id='$id'"; 
$result = mysqli_query($con,$query) or die ( mysqli_error());



$mail_body = "
			<p>Hi ".$row3['sname'].",</p>
			<p>Salam and Greetings. As referred to your leave application at PMS-</p>
			<p>Please be informed that Your Sick Leave from  ".$rowl['sdate']." to ".$rowl['edate']." is Approved.</p>
			
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
			$mail->FromName = 'SFMMKPJSH HRM SERVICES';					//Sets the From name of the message
			$mail->AddAddress($email, $mname);		//Adds a "To" address			
			$mail->WordWrap = 50;							//Sets word wrapping on the body of the message to a given number of characters
			$mail->IsHTML(true);							//Sets message type to HTML				
			$mail->Subject = 'Leave Confirmmation';			//Sets the Subject of the message
			$mail->Body = $mail_body;			
			if($mail->Send())								//Send an Email. Return true on success or false on error
			{
				$message = '<label class="text-success">Register Done, Please check your mail.</label>';
			}


header("Location: $url"); }




else if($type=='eleave'){
$query1 = "UPDATE staff3 set eleave='$etaken',etaken='$etaken' where sid='$uname'"; 
$result1 = mysqli_query($con,$query1) or die ( mysqli_error());


$query = "UPDATE dleave set hstatus='Confirmed By TM',tatime='$dtime' where id='$id'"; 
$result = mysqli_query($con,$query) or die ( mysqli_error());


$mail_body = "
			<p>Hi ".$row3['sname'].",</p>
			<p>Salam and Greetings. As referred to your leave application at PMS-</p>

			<p>Please be informed that Your Emergency Leave from  ".$rowl['sdate']." to ".$rowl['edate']." is Approved.</p>
			
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
			$mail->FromName = 'SFMMKPJSH HRM SERVICES';					//Sets the From name of the message
			$mail->AddAddress($email, $mname);		//Adds a "To" address			
			$mail->WordWrap = 50;							//Sets word wrapping on the body of the message to a given number of characters
			$mail->IsHTML(true);							//Sets message type to HTML				
			$mail->Subject = 'Leave Confirmmation';			//Sets the Subject of the message
			$mail->Body = $mail_body;			
			if($mail->Send())								//Send an Email. Return true on success or false on error
			{
				$message = '<label class="text-success">Register Done, Please check your mail.</label>';
			}

header("Location: $url"); }

else if($type=='maleave'){
$query1 = "UPDATE staff3 set maleave='$mataken', mataken='$mataken'where sid='$uname'"; 
$result1 = mysqli_query($con,$query1) or die ( mysqli_error());


$query = "UPDATE dleave set hstatus='Confirmed By TM',tatime='$dtime' where id='$id'"; 
$result = mysqli_query($con,$query) or die ( mysqli_error());


$mail_body = "
			<p>Hi ".$row3['sname'].",</p>
			<p>Salam and Greetings. As referred to your leave application at PMS-</p>
			
			<p>Please be informed that Your Maternity Leave from  ".$rowl['sdate']." to ".$rowl['edate']." is Approved.</p>
			
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
			$mail->FromName = 'SFMMKPJSH HRM SERVICES';					//Sets the From name of the message
			$mail->AddAddress($email, $mname);		//Adds a "To" address			
			$mail->WordWrap = 50;							//Sets word wrapping on the body of the message to a given number of characters
			$mail->IsHTML(true);							//Sets message type to HTML				
			$mail->Subject = 'Leave Confirmmation';			//Sets the Subject of the message
			$mail->Body = $mail_body;							//An HTML or plain text message body
			if($mail->Send())								//Send an Email. Return true on success or false on error
			{
				$message = '<label class="text-success">Register Done, Please check your mail.</label>';
			}


header("Location: $url"); }


else if($type=='paleave'){
$query1 = "UPDATE staff3 set paleave='$pataken',pataken='$pataken' where sid='$uname'"; 
$result1 = mysqli_query($con,$query1) or die ( mysqli_error());


$query = "UPDATE dleave set hstatus='Confirmed By TM',tatime='$dtime' where id='$id'"; 
$result = mysqli_query($con,$query) or die ( mysqli_error());


$mail_body = "
			<p>Hi ".$row3['sname'].",</p>
			<p>Salam and Greetings. As referred to your leave application at PMS-</p>
			<p>Please be informed that Your Paternity Leave from  ".$rowl['sdate']." to ".$rowl['edate']." is Approved.</p>
			
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
			$mail->FromName = 'SFMMKPJSH HRM SERVICES';					//Sets the From name of the message
			$mail->AddAddress($email, $mname);		//Adds a "To" address			
			$mail->WordWrap = 50;							//Sets word wrapping on the body of the message to a given number of characters
			$mail->IsHTML(true);							//Sets message type to HTML				
			$mail->Subject = 'Leave Confirmmation';			//Sets the Subject of the message
			$mail->Body = $mail_body;			
			if($mail->Send())								//Send an Email. Return true on success or false on error
			{
				$message = '<label class="text-success">Register Done, Please check your mail.</label>';
			}

header("Location: $url"); }

else if($type=='rleave'){
$query1 = "UPDATE staff3 set rleave='$rltaken' where sid='$uname'"; 
$result1 = mysqli_query($con,$query1) or die ( mysqli_error());


$query = "UPDATE dleave set hstatus='Confirmed By TM',tatime='$dtime' where id='$id'"; 
$result = mysqli_query($con,$query) or die ( mysqli_error());


$mail_body = "
			<p>Hi ".$row3['sname'].",</p>
			<p>Salam and Greetings. As referred to your leave application at PMS-</p>
			<p>Please be informed that Your Replacement Leave from  ".$rowl['sdate']." to ".$rowl['edate']." is Approved.</p>
			
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
			$mail->FromName = 'SFMMKPJSH HRM SERVICES';					//Sets the From name of the message
			$mail->AddAddress($email, $mname);		//Adds a "To" address			
			$mail->WordWrap = 50;							//Sets word wrapping on the body of the message to a given number of characters
			$mail->IsHTML(true);							//Sets message type to HTML				
			$mail->Subject = 'Leave Confirmmation';			//Sets the Subject of the message
			$mail->Body = $mail_body;							//An HTML or plain text message body
			if($mail->Send())								//Send an Email. Return true on success or false on error
			{
				$message = '<label class="text-success">Register Done, Please check your mail.</label>';
			}


header("Location: $url"); }

else if($type=='lWPleave'){
$query1 = "UPDATE staff3 set lwl='$lwpltaken' where sid='$uname'"; 
$result1 = mysqli_query($con,$query1) or die ( mysqli_error());


$query = "UPDATE dleave set hstatus='Confirmed By TM',tatime='$dtime' where id='$id'"; 
$result = mysqli_query($con,$query) or die ( mysqli_error());


$mail_body = "
			<p>Hi ".$row3['sname'].",</p>
			<p>Salam and Greetings. As referred to your leave application at PMS-</p>
			<p>Please be informed that Your Leave Without Pay Leave from  ".$rowl['sdate']." to ".$rowl['edate']." is Approved.</p>
			
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
			$mail->FromName = 'SFMMKPJSH HRM SERVICES';					//Sets the From name of the message
			$mail->AddAddress($email, $mname);		//Adds a "To" address			
			$mail->WordWrap = 50;							//Sets word wrapping on the body of the message to a given number of characters
			$mail->IsHTML(true);							//Sets message type to HTML				
			$mail->Subject = 'Leave Confirmmation';			//Sets the Subject of the message
			$mail->Body = $mail_body;			
			if($mail->Send())								//Send an Email. Return true on success or false on error
			{
				$message = '<label class="text-success">Register Done, Please check your mail.</label>';
			}

header("Location: $url"); }


/*else if($type=='mrleave'){
$query1 = "UPDATE staff3 set mrltaken='$mrltaken' where sid='$uname'"; 
$result1 = mysqli_query($con,$query1) or die ( mysqli_error());


$query = "UPDATE dleave set hstatus='Confirmed By TM',tatime='$dtime' where id='$id'"; 
$result = mysqli_query($con,$query) or die ( mysqli_error());



header("Location: $url"); }
*/

else if($type=='comleave'){
$query1 = "UPDATE staff3 set comltaken='$comltaken' where sid='$uname'"; 
$result1 = mysqli_query($con,$query1) or die ( mysqli_error());


$query = "UPDATE dleave set hstatus='Confirmed By TM',tatime='$dtime' where id='$id'"; 
$result = mysqli_query($con,$query) or die ( mysqli_error());

$mail_body = "
			<p>Hi ".$row3['sname'].",</p>
			<p>Salam and Greetings. As referred to your leave application at PMS-</p>
			<p>Please be informed that Your Compassionate Leave from  ".$rowl['sdate']." to ".$rowl['edate']." is Approved.</p>
			
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
			$mail->FromName = 'SFMMKPJSH HRM SERVICES';					//Sets the From name of the message
			$mail->AddAddress($email, $mname);		//Adds a "To" address			
			$mail->WordWrap = 50;							//Sets word wrapping on the body of the message to a given number of characters
			$mail->IsHTML(true);							//Sets message type to HTML				
			$mail->Subject = 'Leave Confirmmation';			//Sets the Subject of the message
			$mail->Body = $mail_body;			
			if($mail->Send())								//Send an Email. Return true on success or false on error
			{
				$message = '<label class="text-success">Register Done, Please check your mail.</label>';
			}


header("Location: $url"); }


else if($type=='inleave'){
$query1 = "UPDATE staff3 set intaken='$intaken' where sid='$uname'"; 
$result1 = mysqli_query($con,$query1) or die ( mysqli_error());


$query = "UPDATE dleave set hstatus='Confirmed By TM',tatime='$dtime' where id='$id'"; 
$result = mysqli_query($con,$query) or die ( mysqli_error());


$mail_body = "
			<p>Hi ".$row3['sname'].",</p>
			<p>Salam and Greetings. As referred to your leave application at PMS-</p>
			<p>Please be informed that Your Inpatient Leave from  ".$rowl['sdate']." to ".$rowl['edate']." is Approved.</p>
			
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
			$mail->FromName = 'SFMMKPJSH HRM SERVICES';					//Sets the From name of the message
			$mail->AddAddress($email, $mname);		//Adds a "To" address			
			$mail->WordWrap = 50;							//Sets word wrapping on the body of the message to a given number of characters
			$mail->IsHTML(true);							//Sets message type to HTML				
			$mail->Subject = 'Leave Confirmmation';			//Sets the Subject of the message
			$mail->Body = $mail_body;			
			if($mail->Send())								//Send an Email. Return true on success or false on error
			{
				$message = '<label class="text-success">Register Done, Please check your mail.</label>';
			}

header("Location: $url"); }



else if($type=='marleave'){
$query1 = "UPDATE staff3 set martaken='$martaken' where sid='$uname'"; 
$result1 = mysqli_query($con,$query1) or die ( mysqli_error());


$query = "UPDATE dleave set hstatus='Confirmed By TM',tatime='$dtime' where id='$id'"; 
$result = mysqli_query($con,$query) or die ( mysqli_error());


$mail_body = "
			<p>Hi ".$row3['sname'].",</p>
			<p>Salam and Greetings. As referred to your leave application at PMS-</p>
			<p>Please be informed that Your Marriage Leave from  ".$rowl['sdate']." to ".$rowl['edate']." is Approved.</p>
			
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
			$mail->FromName = 'SFMMKPJSH HRM SERVICES';					//Sets the From name of the message
			$mail->AddAddress($email, $mname);		//Adds a "To" address			
			$mail->WordWrap = 50;							//Sets word wrapping on the body of the message to a given number of characters
			$mail->IsHTML(true);							//Sets message type to HTML				
			$mail->Subject = 'Leave Confirmmation';			//Sets the Subject of the message
			$mail->Body = $mail_body;			
			if($mail->Send())								//Send an Email. Return true on success or false on error
			{
				$message = '<label class="text-success">Register Done, Please check your mail.</label>';
			}

header("Location: $url"); }



else if($type=='insleave'){
$query1 = "UPDATE staff3 set insleave='$insleave' where sid='$uname'"; 
$result1 = mysqli_query($con,$query1) or die ( mysqli_error());


$query = "UPDATE dleave set hstatus='Confirmed By TM',tatime='$dtime' where id='$id'"; 
$result = mysqli_query($con,$query) or die ( mysqli_error());


$mail_body = "
			<p>Hi ".$row3['sname'].",</p>
			<p>Salam and Greetings. As referred to your leave application at PMS-</p>
			<p>Please be informed that Your Inpatient Leave from  ".$rowl['sdate']." to ".$rowl['edate']." is Approved.</p>
			
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
			$mail->FromName = 'SFMMKPJSH HRM SERVICES';					//Sets the From name of the message
			$mail->AddAddress($email, $mname);		//Adds a "To" address			
			$mail->WordWrap = 50;							//Sets word wrapping on the body of the message to a given number of characters
			$mail->IsHTML(true);							//Sets message type to HTML				
			$mail->Subject = 'Leave Confirmmation';			//Sets the Subject of the message
			$mail->Body = $mail_body;			
			if($mail->Send())								//Send an Email. Return true on success or false on error
			{
				$message = '<label class="text-success">Register Done, Please check your mail.</label>';
			}

header("Location: $url"); }




?>