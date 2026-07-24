<?php 
    session_start();
    require('db1.php');
	$role = $_SESSION['sess_userrole'];
	
$queryc = "SELECT COUNT(utype) FROM user where '$role' in ('doctor','staff','mng','ot','endo','imo','mofficer','nurse','emergency','moopd','call','bill','billin','diet','physio','mrd','adminmng','lab','rad','gpopd')"; 
$resultc = mysqli_query($con, $queryc) or die(mysqli_error());
$rowc = mysqli_fetch_array($resultc);
$c1=$rowc['COUNT(utype)'];
	
    if(!isset($_SESSION['sess_username']) || $c1==0){
      header('Location: login2?err=2');
    }
?>


<?php

require('db1.php');

$user=$_SESSION['sess_username'];
$cyear=date('Y');


//$fullname = $_SESSION['sess_username'];
$query39 = "SELECT * FROM staff3 where sid= '$user' and status='Active'"; 
	 
$result39 = mysqli_query($con, $query39) or die(mysqli_error());

// Print out result
$row39 = mysqli_fetch_array($result39);
$idept=$row39['dept'];
$gender= $row39['gender'];
$doj= $row39['doj'];
$status1= $row39['cstatus'];
$pal1= $row39['paleave'];
$cdate=date('m/d/Y');
$apply_time=date('Y-m-d h:i:s');
//$status1;
//$id=$_REQUEST['ID'];
//$pmrn=$_REQUEST['pmrn'];
//echo $gender;
/*$query9 = "SELECT * FROM staff where sdept= '$idept' and sdesignation='HOS'"; 
$result9 = mysqli_query($con, $query9) or die(mysqli_error());
$row9 = mysqli_fetch_array($result9);

*/
$hos=$row39['hos'];
$incharge=$row39['incharge'];
$date4 = new DateTime($cdate);
$date3 = new DateTime($doj);

$diff2 = $date3->diff($date4, true);

$diff3= $diff2->format('%a')+1;

//echo time($cdate);


?>

<?php 

$el= $row39['etaken'];
$al= $row39['ataken'];
$sl= $row39['staken'];
$sl1= $row39['sleave'];

$ma= 112-(int)$row39['mataken']; 
$pa= $row39['pataken'];
$doj= $row39['doj'];  
$status= $row39['status']; 
//$pa= $row['padd'];
$cf= $row39['cfleave'];

$sl1s=14-(int)$sl;

$sl1s_p=5-(int)$sl;
 
/*$date2=date('01/01/2019');
$date1= date('m/d/Y');
$date3=date_create("$date2");
$date4=date_create("$date1");
$diff=date_diff($date4,$date3);
echo $diff->format("%d");*/
$now = time(); // or your date as well


$doj78=strtotime($doj);



$doj12=date('Y',strtotime($doj));


$datediff78 = $now - $doj78;

//echo $fday8= round($datediff78 / (60 * 60 * 24)*.0833) ;
$fday8= round($datediff78 / (60 * 60 * 24)*.0164,2) ;


$year=date('Y');
$rr=date('Y');
$your_date = strtotime("$rr-01-01");
$your_date1 = strtotime("$doj");
//$your_date = strtotime("2019-01-01");
$datediff = $now - $your_date;
$datediff_y = $now - $your_date1;
//echo $datediff;
//$test= round ($your_date / (60 * 60 * 24));
$fday= round($datediff / (60 * 60 * 24)*.0438,2) ;
$fday_y= round($datediff_y / (60 * 60 * 24)*.0438,2) ;
$fday1= round($datediff / (60 * 60 * 24)*.0274,2) ;
$fday1_y= round($datediff_y / (60 * 60 * 24)*.0274,2) ;

$fday9= round($datediff78 / (60 * 60 * 24)*.0274,2) ;

$fday3= round($datediff / (60 * 60 * 24)*.0164,2) ;
$fday3_y= round($datediff_y / (60 * 60 * 24)*.0164,2) ;
//$fday4= round($datediff / (60 * 60 * 24)*.0274) ;


//echo $fday;
$aday=$fday+$cf-$al;
$aday_y=$fday_y+$cf-$al;
$aday1=$fday1-$el;
$aday1_y=$fday1_y-$el;
$aday2=$fday3-$al+$cf;
$aday2_y=$fday3_y-$al+$cf;
//$aday2_y1=$fday3_y_1-$al;
//$aday2_y=3-$al;

  //echo $test;
//echo $aday;
//echo $aday2;

$username = "root";
$password = "Godiloveu16";
$hostname = "localhost"; 
$dbhandle = mysqli_connect($hostname, $username, $password) 
 or die("Unable to connect to MySQL");

$selected = mysqli_select_db($dbhandle,"sfmmkpjnew") 
  or die("Could not select examples");
$query198 = "SELECT SUM(total) FROM dleave  where hstatus in('Approval Pending','Forwarded to Incharge') and tleave in ('Annual Leave') and uname='$user' and cyear='$cyear'"; 
	 
$result198 = mysqli_query($dbhandle,$query198) or die(mysql_error());

$row198 = mysqli_fetch_array($result198);
// Print out result

$testl=$row198['SUM(total)'];




  ?>


<?php
 
require('db1.php');
$stime=date("h:i:sa");
if(isset($_POST['Submit']))
{
$tleave=$_REQUEST['tleave'];
$maleave=$_REQUEST['maleave'];
$aleave90=$_REQUEST['aleave90'];

$sdate1=$_REQUEST['sdate'];
$edate1=$_REQUEST['edate'];
$reason=$_REQUEST['reason'];
$eleave=$_REQUEST['eleave'];
$replacement=$_REQUEST['replacement'];


$pal=$_REQUEST['paleave'];
$sdate=date('Y-m-d',strtotime($sdate1));
$edate=date('Y-m-d',strtotime($edate1));
//$date1=date_create("$sdate");
//$date2=date_create("$edate");
//$diff=$date1+$date2;

//$diff=date_diff($date1,$date2);
//$diff1=$diff->format("%d")+1;

$st_date=date('Y',strtotime($sdate));
$en_date=date('Y',strtotime($edate));

$c_y=date('Y');

$date1 = new DateTime($sdate);
$date2 = new DateTime($edate);

$diff = $date1->diff($date2, true);

$diff1= $diff->format('%a')+1;

//$diff1;




$hl=0.5;

$al1s=$al-$diff1;
$el1s=$el-$diff1;
//$sl1s=$sl-$sl1;
$ma1s=$ma-$diff1;
$pa1s=$pa-$diff1;



$q39 = "SELECT * FROM staff3 where sid= '$replacement' and status='Active'"; 
	 
$r39 = mysqli_query($con, $q39) or die(mysqli_error());

// Print out result
$r39 = mysqli_fetch_array($r39);
$r_name=$r39['sname'];
$email = $r39['email'];
//$email = 'diasadman16@gmail.com';
$q9b = "SELECT SUM(total) from dleave where hstatus IN('Approval Pending','Forwarded to Incharge') and uname='$user' and tleave='Annual Leave'"; 
$re9b = mysqli_query($con, $q9b) or die ( mysqli_error());
$r9b = mysqli_fetch_assoc($re9b);



$q9 = "SELECT * from dleave where hstatus in('Approval Pending','Forwarded to Incharge','Confirmed By TM') and uname='$user' and '$sdate' between sdate and edate"; 
$re9 = mysqli_query($con, $q9) or die ( mysqli_error());
$r9 = mysqli_fetch_assoc($re9);

$q99 = "SELECT * from dleave where hstatus in('Approval Pending','Forwarded to Incharge','Confirmed By TM') and uname='$user' and '$edate' between sdate and edate"; 
$re99 = mysqli_query($con, $q99) or die ( mysqli_error());
$r99 = mysqli_fetch_assoc($re99);

if($r9b['SUM(total)'] >= $aleave90)
{
	
	echo '<script language="javascript">';
    echo 'alert("The SUM of your Pending Request is more than your leave Balance"); ';

    echo '</script>';
	
}




else if($st_date!=$c_y && $tleave=='Annual Leave')
{
	
	echo '<script language="javascript">';
    echo 'alert("You Cannot Apply Leave For Next Year..!!"); ';

    echo '</script>';
	
}


else if($en_date!=$c_y && $tleave=='Annual Leave')
{
	
	echo '<script language="javascript">';
    echo 'alert("You Cannot Apply Leave For Next Year..!!"); ';

    echo '</script>';
	
}

else if($testl>=$aleave90 && $tleave=='Annual Leave')
{
echo '<script language="javascript">';
    echo 'alert("The Sum of your pending Leave request is more than your balance...!!"); ';

    echo '</script>';
	
	//header("Refresh: .1; URL=$url");
}

else if($diff1>$aleave90 && $tleave=='Annual Leave' )
{
echo '<script language="javascript">';
    echo 'alert("You Dont Have Enough Annual Leave Balance...!!"); ';

    echo '</script>';
	
	//header("Refresh: .1; URL=$url");
}


else if($r9=mysqli_num_rows($re9)>0)
{
echo '<script language="javascript">';
    echo 'alert("You Have Already Applied Leave Between The Selected Date Range  !!"); ';

    echo '</script>';
	
	//header("Refresh: .1; URL=$url");
}


else if($r99=mysqli_num_rows($re99)>0)
{
echo '<script language="javascript">';
    echo 'alert("You Have Already Applied Leave Between The Selected Date Range  !!"); ';

    echo '</script>';
	
	//header("Refresh: .1; URL=$url");
}







//echo $diff1;
//echo $diff->format("%d")+1;

else if($tleave=='Annual Leave' && $diff1<=$aleave90 && $status1=='Confirm' && $incharge=="" && $r_name!=''){
	
	
$ins_query1="insert into dleave (`sdate`,`edate`,`uname`,`tleave`,`total`,`reason`,`HOS`,`dept`,`hstatus`,`type`,`bal`,`cyear`,`apply_time`,`r_name`) values ('$sdate','$edate','$user','$tleave','$diff1','$reason','$hos','$idept','Approval Pending','aleave','$diff1','$cyear','$apply_time','$r_name')";
//mysqli_query($con,$ins_query1) or die(mysql_error());


if(mysqli_query($con,$ins_query1)==true){

$mail_body = "
			<p>Hi ".$r_name.",</p>
			<p>
			
			We wish to inform that ".$row39['sname']." will be taking his/her leave from ".$sdate." to ".$edate.".
Therefore, you are required to relieve his/her responsibility during the period.
Kindly comply to the above.
			
			
			</p>
			
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
			$mail->Subject = 'Relieve '.$row39['sname'].' responsibility during his/her leave period';			//Sets the Subject of the message
			$mail->Body = $mail_body;							//An HTML or plain text message body
			if($mail->Send())								//Send an Email. Return true on success or false on error
			{
				$message = '<label class="text-success">Register Done, Please check your mail.</label>';
			}


//$ins_query2="update mleave set al1='$al1' where uname='$user'";
//mysqli_query($con,$ins_query2) or die(mysql_error());


	echo '<script language="javascript">';
    echo 'alert("Successfully Submitted !!"); ';
    echo '</script>';
}
}


else if($tleave=='Annual Leave' && $diff1<=$aleave90 && $status1=='Confirm' && $incharge!="" && $r_name!=''){
	
	
$ins_query1="insert into dleave (`sdate`,`edate`,`uname`,`tleave`,`total`,`reason`,`HOS`,`dept`,`hstatus`,`type`,`bal`,`incharge`,`cyear`,`apply_time`,`r_name`) values ('$sdate','$edate','$user','$tleave','$diff1','$reason','$hos','$idept','Forwarded to Incharge','aleave','$diff1','$incharge','$cyear','$apply_time','$r_name')";
//mysqli_query($con,$ins_query1) or die(mysql_error());
if(mysqli_query($con,$ins_query1)==true){

$mail_body = "
			<p>Hi ".$r_name.",</p>
			<p>
			
			We wish to inform that ".$row39['sname']." will be taking his/her leave from ".$sdate." to ".$edate.".
Therefore, you are required to relieve his/her responsibility during the period.
Kindly comply to the above.
			
			
			</p>
			
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
			$mail->Subject = 'Relieve '.$row39['sname'].' responsibility during his/her leave period';			//Sets the Subject of the message
			$mail->Body = $mail_body;							//An HTML or plain text message body
			if($mail->Send())								//Send an Email. Return true on success or false on error
			{
				$message = '<label class="text-success">Register Done, Please check your mail.</label>';
			}


//$ins_query2="update mleave set al1='$al1' where uname='$user'";
//mysqli_query($con,$ins_query2) or die(mysql_error());


	echo '<script language="javascript">';
    echo 'alert("Successfully Submitted !!"); ';
    echo '</script>';
}
}


else if($tleave=='Half Day Leave' && $aleave90>=.5 && $status1=='Confirm' && $incharge=="" && $r_name!=''){
	
	
$ins_query1="insert into dleave (`sdate`,`edate`,`uname`,`tleave`,`total`,`reason`,`HOS`,`dept`,`hstatus`,`type`,`bal`,`cyear`,`apply_time`,`r_name`) values ('$sdate','$edate','$user','$tleave','$hl','$reason','$hos','$idept','Approval Pending','aleave','$diff1','$cyear','$apply_time','$r_name')";
//mysqli_query($con,$ins_query1) or die(mysql_error());

if(mysqli_query($con,$ins_query1)==true){

$mail_body = "
			<p>Hi ".$r_name.",</p>
			<p>
			
			We wish to inform that ".$row39['sname']." will be taking his/her leave from ".$sdate." to ".$edate.".
Therefore, you are required to relieve his/her responsibility during the period.
Kindly comply to the above.
			
			
			</p>
			
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
			$mail->Subject = 'Relieve '.$row39['sname'].' responsibility during his/her leave period';			//Sets the Subject of the message
			$mail->Body = $mail_body;							//An HTML or plain text message body
			if($mail->Send())								//Send an Email. Return true on success or false on error
			{
				$message = '<label class="text-success">Register Done, Please check your mail.</label>';
			}


//$ins_query2="update mleave set al1='$al1' where uname='$user'";
//mysqli_query($con,$ins_query2) or die(mysql_error());


	echo '<script language="javascript">';
    echo 'alert("Successfully Submitted !!"); ';
    echo '</script>';
}
}



else if($tleave=='Half Day Leave' && $aleave90>=.5 && $status1=='Confirm' && $incharge!="" && $r_name!=''){
	
	
$ins_query1="insert into dleave (`sdate`,`edate`,`uname`,`tleave`,`total`,`reason`,`HOS`,`dept`,`hstatus`,`type`,`bal`,`incharge`,`cyear`,`apply_time`,`r_name`) values ('$sdate','$edate','$user','$tleave','$hl','$reason','$hos','$idept','Forwarded to Incharge','aleave','$diff1','$incharge','$cyear','$apply_time','$r_name')";
//mysqli_query($con,$ins_query1) or die(mysql_error());

if(mysqli_query($con,$ins_query1)==true){

$mail_body = "
			<p>Hi ".$r_name.",</p>
			<p>
			
			We wish to inform that ".$row39['sname']." will be taking his/her leave from ".$sdate." to ".$edate.".
Therefore, you are required to relieve his/her responsibility during the period.
Kindly comply to the above.
			
			
			</p>
			
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
			$mail->Subject = 'Relieve '.$row39['sname'].' responsibility during his/her leave period';			//Sets the Subject of the message
			$mail->Body = $mail_body;							//An HTML or plain text message body
			if($mail->Send())								//Send an Email. Return true on success or false on error
			{
				$message = '<label class="text-success">Register Done, Please check your mail.</label>';
			}


//$ins_query2="update mleave set al1='$al1' where uname='$user'";
//mysqli_query($con,$ins_query2) or die(mysql_error());


	echo '<script language="javascript">';
    echo 'alert("Successfully Submitted !!"); ';
    echo '</script>';
}
}


else if($tleave=='Annual Leave' && $diff1<=$aleave90 && $status1=='nonconfirm' && $incharge=="" && $r_name!=''){
	
	
	$ins_query1="insert into dleave (`sdate`,`edate`,`uname`,`tleave`,`total`,`reason`,`HOS`,`dept`,`hstatus`,`type`,`bal`,`cyear`,`apply_time`,`r_name`) values ('$sdate','$edate','$user','$tleave','$diff1','$reason','$hos','$idept','Approval Pending','aleave','$diff1','$cyear','$apply_time','$r_name')";
//mysqli_query($con,$ins_query1) or die(mysql_error());

if(mysqli_query($con,$ins_query1)==true){

$mail_body = "
			<p>Hi ".$r_name.",</p>
			<p>
			
			We wish to inform that ".$row39['sname']." will be taking his/her leave from ".$sdate." to ".$edate.".
Therefore, you are required to relieve his/her responsibility during the period.
Kindly comply to the above.
			
			
			</p>
			
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
			$mail->Subject = 'Relieve '.$row39['sname'].' responsibility during his/her leave period';			//Sets the Subject of the message
			$mail->Body = $mail_body;							//An HTML or plain text message body
			if($mail->Send())								//Send an Email. Return true on success or false on error
			{
				$message = '<label class="text-success">Register Done, Please check your mail.</label>';
			}


//$ins_query2="update mleave set al1='$al1' where uname='$user'";
//mysqli_query($con,$ins_query2) or die(mysql_error());


	echo '<script language="javascript">';
    echo 'alert("Successfully Submitted !!"); ';
    echo '</script>';
}
}


else if($tleave=='Annual Leave' && $diff1<=$aleave90 && $status1=='nonconfirm' && $incharge!="" && $r_name!=''){
	
	
	$ins_query1="insert into dleave (`sdate`,`edate`,`uname`,`tleave`,`total`,`reason`,`HOS`,`dept`,`hstatus`,`type`,`bal`,`incharge`,`cyear`,`apply_time`,`r_name`) values ('$sdate','$edate','$user','$tleave','$diff1','$reason','$hos','$idept','Forwarded to Incharge','aleave','$diff1','$incharge','$cyear','$apply_time','$r_name')";
//mysqli_query($con,$ins_query1) or die(mysql_error());

if(mysqli_query($con,$ins_query1)==true){

$mail_body = "
			<p>Hi ".$r_name.",</p>
			<p>
			
			We wish to inform that ".$row39['sname']." will be taking his/her leave from ".$sdate." to ".$edate.".
Therefore, you are required to relieve his/her responsibility during the period.
Kindly comply to the above.
			
			
			</p>
			
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
			$mail->Subject = 'Relieve '.$row39['sname'].' responsibility during his/her leave period';			//Sets the Subject of the message
			$mail->Body = $mail_body;							//An HTML or plain text message body
			if($mail->Send())								//Send an Email. Return true on success or false on error
			{
				$message = '<label class="text-success">Register Done, Please check your mail.</label>';
			}


//$ins_query2="update mleave set al1='$al1' where uname='$user'";
//mysqli_query($con,$ins_query2) or die(mysql_error());


	echo '<script language="javascript">';
    echo 'alert("Successfully Submitted !!"); ';
    echo '</script>';
}
}






else if($tleave=='Half Day Leave' && $aleave90>=.5 && $status1=='nonconfirm' && $incharge=="" && $r_name!=''){
	
	
	$ins_query1="insert into dleave (`sdate`,`edate`,`uname`,`tleave`,`total`,`reason`,`HOS`,`dept`,`hstatus`,`type`,`bal`,`cyear`,`apply_time`,`r_name`) values ('$sdate','$edate','$user','$tleave','$hl','$reason','$hos','$idept','Approval Pending','aleave','$diff1','$cyear','$apply_time','$r_name')";
//mysqli_query($con,$ins_query1) or die(mysql_error());

if(mysqli_query($con,$ins_query1)==true){

$mail_body = "
			<p>Hi ".$r_name.",</p>
			<p>
			
			We wish to inform that ".$row39['sname']." will be taking his/her leave from ".$sdate." to ".$edate.".
Therefore, you are required to relieve his/her responsibility during the period.
Kindly comply to the above.
			
			
			</p>
			
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
			$mail->Subject = 'Relieve '.$row39['sname'].' responsibility during his/her leave period';			//Sets the Subject of the message
			$mail->Body = $mail_body;							//An HTML or plain text message body
			if($mail->Send())								//Send an Email. Return true on success or false on error
			{
				$message = '<label class="text-success">Register Done, Please check your mail.</label>';
			}


//$ins_query2="update mleave set al1='$al1' where uname='$user'";
//mysqli_query($con,$ins_query2) or die(mysql_error());


	echo '<script language="javascript">';
    echo 'alert("Successfully Submitted !!"); ';
    echo '</script>';
}
}


else if($tleave=='Half Day Leave' && $aleave90>=.5 && $status1=='nonconfirm' && $incharge!="" && $r_name!=''){
	
	
	$ins_query1="insert into dleave (`sdate`,`edate`,`uname`,`tleave`,`total`,`reason`,`HOS`,`dept`,`hstatus`,`type`,`bal`,`incharge`,`cyear`,`apply_time`,`r_name`) values ('$sdate','$edate','$user','$tleave','$hl','$reason','$hos','$idept','Forwarded to Incharge','aleave','$diff1','$incharge','$cyear','$apply_time','$r_name')";
//mysqli_query($con,$ins_query1) or die(mysql_error());

if(mysqli_query($con,$ins_query1)==true){

$mail_body = "
			<p>Hi ".$r_name.",</p>
			<p>
			
			We wish to inform that ".$row39['sname']." will be taking his/her leave from ".$sdate." to ".$edate.".
Therefore, you are required to relieve his/her responsibility during the period.
Kindly comply to the above.
			
			
			</p>
			
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
			$mail->Subject = 'Relieve '.$row39['sname'].' responsibility during his/her leave period';			//Sets the Subject of the message
			$mail->Body = $mail_body;							//An HTML or plain text message body
			if($mail->Send())								//Send an Email. Return true on success or false on error
			{
				$message = '<label class="text-success">Register Done, Please check your mail.</label>';
			}


//$ins_query2="update mleave set al1='$al1' where uname='$user'";
//mysqli_query($con,$ins_query2) or die(mysql_error());


	echo '<script language="javascript">';
    echo 'alert("Successfully Submitted !!"); ';
    echo '</script>';
}
}




















else if($tleave=='Emergency Leave' && $diff1<=$eleave && $status1=='Confirm' && $incharge=="" && $r_name!=''){
	
	$ins_query1="insert into dleave (`sdate`,`edate`,`uname`,`tleave`,`total`,`reason`,`HOS`,`dept`,`hstatus`,`type`,`bal`,`cyear`,`apply_time`,`r_name`) values ('$sdate','$edate','$user','$tleave','$diff1','$reason','$hos','$idept','Approval Pending','eleave','$diff1','$cyear','$apply_time','$r_name')";
//mysqli_query($con,$ins_query1) or die(mysql_error('error there'));

if(mysqli_query($con,$ins_query1)==true){

$mail_body = "
			<p>Hi ".$r_name.",</p>
			<p>
			
			We wish to inform that ".$row39['sname']." will be taking his/her leave from ".$sdate." to ".$edate.".
Therefore, you are required to relieve his/her responsibility during the period.
Kindly comply to the above.
			
			
			</p>
			
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
			$mail->Subject = 'Relieve '.$row39['sname'].' responsibility during his/her leave period';			//Sets the Subject of the message
			$mail->Body = $mail_body;							//An HTML or plain text message body
			if($mail->Send())								//Send an Email. Return true on success or false on error
			{
				$message = '<label class="text-success">Register Done, Please check your mail.</label>';
			}


//$ins_query2="update mleave set al1='$al1' where uname='$user'";
//mysqli_query($con,$ins_query2) or die(mysql_error());


	echo '<script language="javascript">';
    echo 'alert("Successfully Submitted !!"); ';
    echo '</script>';
}}


else if($tleave=='Emergency Leave' && $diff1<=$eleave && $status1=='Confirm' && $incharge!="" && $r_name!=''){
	
	$ins_query1="insert into dleave (`sdate`,`edate`,`uname`,`tleave`,`total`,`reason`,`HOS`,`dept`,`hstatus`,`type`,`bal`,`incharge`,`cyear`,`apply_time`,`r_name`) values ('$sdate','$edate','$user','$tleave','$diff1','$reason','$hos','$idept','Forwarded to Incharge','eleave','$diff1','$incharge','$cyear','$apply_time','$r_name')";
//mysqli_query($con,$ins_query1) or die(mysql_error('error here'));

if(mysqli_query($con,$ins_query1)==true){

$mail_body = "
			<p>Hi ".$r_name.",</p>
			<p>
			
			We wish to inform that ".$row39['sname']." will be taking his/her leave from ".$sdate." to ".$edate.".
Therefore, you are required to relieve his/her responsibility during the period.
Kindly comply to the above.
			
			
			</p>
			
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
			$mail->Subject = 'Relieve '.$row39['sname'].' responsibility during his/her leave period';			//Sets the Subject of the message
			$mail->Body = $mail_body;							//An HTML or plain text message body
			if($mail->Send())								//Send an Email. Return true on success or false on error
			{
				$message = '<label class="text-success">Register Done, Please check your mail.</label>';
			}


//$ins_query2="update mleave set al1='$al1' where uname='$user'";
//mysqli_query($con,$ins_query2) or die(mysql_error());


	echo '<script language="javascript">';
    echo 'alert("Successfully Submitted !!"); ';
    echo '</script>';
}
}




else if($tleave=='Emergency Leave' && $diff1<=$eleave && $status1=='nonconfirm' && $incharge=="" && $r_name!=''){
	
	$ins_query1="insert into dleave (`sdate`,`edate`,`uname`,`tleave`,`total`,`reason`,`HOS`,`dept`,`hstatus`,`type`,`bal`,`cyear`,`apply_time`,`r_name`) values ('$sdate','$edate','$user','$tleave','$diff1','$reason','$hos','$idept','Approval Pending','eleave','$diff1','$cyear','$apply_time','$r_name')";
//mysqli_query($con,$ins_query1) or die(mysql_error('error there'));

if(mysqli_query($con,$ins_query1)==true){

$mail_body = "
			<p>Hi ".$r_name.",</p>
			<p>
			
			We wish to inform that ".$row39['sname']." will be taking his/her leave from ".$sdate." to ".$edate.".
Therefore, you are required to relieve his/her responsibility during the period.
Kindly comply to the above.
			
			
			</p>
			
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
			$mail->Subject = 'Relieve '.$row39['sname'].' responsibility during his/her leave period';			//Sets the Subject of the message
			$mail->Body = $mail_body;							//An HTML or plain text message body
			if($mail->Send())								//Send an Email. Return true on success or false on error
			{
				$message = '<label class="text-success">Register Done, Please check your mail.</label>';
			}


//$ins_query2="update mleave set al1='$al1' where uname='$user'";
//mysqli_query($con,$ins_query2) or die(mysql_error());


	echo '<script language="javascript">';
    echo 'alert("Successfully Submitted !!"); ';
    echo '</script>';
}
}


else if($tleave=='Emergency Leave' && $diff1<=$eleave && $status1=='nonconfirm' && $incharge!="" && $r_name!=''){
	
	$ins_query1="insert into dleave (`sdate`,`edate`,`uname`,`tleave`,`total`,`reason`,`HOS`,`dept`,`hstatus`,`type`,`bal`,`incharge`,`cyear`,`apply_time`,`r_name`) values ('$sdate','$edate','$user','$tleave','$diff1','$reason','$hos','$idept','Forwarded to Incharge','eleave','$diff1','$incharge','$cyear','$apply_time','$r_name')";
//mysqli_query8($con,$ins_query1) or die(mysql_error('error here'));

if(mysqli_query($con,$ins_query1)==true){

$mail_body = "
			<p>Hi ".$r_name.",</p>
			<p>
			
			We wish to inform that ".$row39['sname']." will be taking his/her leave from ".$sdate." to ".$edate.".
Therefore, you are required to relieve his/her responsibility during the period.
Kindly comply to the above.
			
			
			</p>
			
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
			$mail->Subject = 'Relieve '.$row39['sname'].' responsibility during his/her leave period';			//Sets the Subject of the message
			$mail->Body = $mail_body;							//An HTML or plain text message body
			if($mail->Send())								//Send an Email. Return true on success or false on error
			{
				$message = '<label class="text-success">Register Done, Please check your mail.</label>';
			}


//$ins_query2="update mleave set al1='$al1' where uname='$user'";
//mysqli_query($con,$ins_query2) or die(mysql_error());


	echo '<script language="javascript">';
    echo 'alert("Successfully Submitted !!"); ';
    echo '</script>';
}}




else if($tleave=='Sick Leave' && $diff1<=$sl1s && $status1=='Confirm' && $incharge=="" && $r_name!=''){
	
	$ins_query1="insert into dleave (`sdate`,`edate`,`uname`,`tleave`,`total`,`reason`,`HOS`,`dept`,`hstatus`,`type`,`bal`,`cyear`,`apply_time`,`r_name`) values ('$sdate','$edate','$user','$tleave','$diff1','$reason','$hos','$idept','Approval Pending','sleave','$sl1','$cyear','$apply_time','$r_name')";
//mysqli_query($con,$ins_query1) or die(mysql_error());

if(mysqli_query($con,$ins_query1)==true){

$mail_body = "
			<p>Hi ".$r_name.",</p>
			<p>
			
			We wish to inform that ".$row39['sname']." will be taking his/her leave from ".$sdate." to ".$edate.".
Therefore, you are required to relieve his/her responsibility during the period.
Kindly comply to the above.
			
			
			</p>
			
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
			$mail->Subject = 'Relieve '.$row39['sname'].' responsibility during his/her leave period';			//Sets the Subject of the message
			$mail->Body = $mail_body;							//An HTML or plain text message body
			if($mail->Send())								//Send an Email. Return true on success or false on error
			{
				$message = '<label class="text-success">Register Done, Please check your mail.</label>';
			}


//$ins_query2="update mleave set al1='$al1' where uname='$user'";
//mysqli_query($con,$ins_query2) or die(mysql_error());


	echo '<script language="javascript">';
    echo 'alert("Successfully Submitted !!"); ';
    echo '</script>';
}
}



else if($tleave=='Sick Leave' && $diff1<=$sl1s && $status1=='Confirm' && $incharge!="" && $r_name!=''){
	
	$ins_query1="insert into dleave (`sdate`,`edate`,`uname`,`tleave`,`total`,`reason`,`HOS`,`dept`,`hstatus`,`type`,`bal`,`incharge`,`cyear`,`apply_time`,`r_name`) values ('$sdate','$edate','$user','$tleave','$diff1','$reason','$hos','$idept','Forwarded to Incharge','sleave','$sl1','$incharge','$cyear','$apply_time','$r_name')";
//mysqli_query($con,$ins_query1) or die(mysql_error());

if(mysqli_query($con,$ins_query1)==true){

$mail_body = "
			<p>Hi ".$r_name.",</p>
			<p>
			
			We wish to inform that ".$row39['sname']." will be taking his/her leave from ".$sdate." to ".$edate.".
Therefore, you are required to relieve his/her responsibility during the period.
Kindly comply to the above.
			
			
			</p>
			
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
			$mail->Subject = 'Relieve '.$row39['sname'].' responsibility during his/her leave period';			//Sets the Subject of the message
			$mail->Body = $mail_body;							//An HTML or plain text message body
			if($mail->Send())								//Send an Email. Return true on success or false on error
			{
				$message = '<label class="text-success">Register Done, Please check your mail.</label>';
			}


//$ins_query2="update mleave set al1='$al1' where uname='$user'";
//mysqli_query($con,$ins_query2) or die(mysql_error());


	echo '<script language="javascript">';
    echo 'alert("Successfully Submitted !!"); ';
    echo '</script>';
}
}



else if($tleave=='Sick Leave' && $diff1<=$sl1s_p && $status1=='nonconfirm' && $incharge=="" && $r_name!=''){
	
	$ins_query1="insert into dleave (`sdate`,`edate`,`uname`,`tleave`,`total`,`reason`,`HOS`,`dept`,`hstatus`,`type`,`bal`,`cyear`,`apply_time`,`r_name`) values ('$sdate','$edate','$user','$tleave','$diff1','$reason','$hos','$idept','Approval Pending','sleave','$sl1','$cyear','$apply_time','$r_name')";
//mysqli_query($con,$ins_query1) or die(mysql_error());

if(mysqli_query($con,$ins_query1)==true){

$mail_body = "
			<p>Hi ".$r_name.",</p>
			<p>
			
			We wish to inform that ".$row39['sname']." will be taking his/her leave from ".$sdate." to ".$edate.".
Therefore, you are required to relieve his/her responsibility during the period.
Kindly comply to the above.
			
			
			</p>
			
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
			$mail->Subject = 'Relieve '.$row39['sname'].' responsibility during his/her leave period';			//Sets the Subject of the message
			$mail->Body = $mail_body;							//An HTML or plain text message body
			if($mail->Send())								//Send an Email. Return true on success or false on error
			{
				$message = '<label class="text-success">Register Done, Please check your mail.</label>';
			}


//$ins_query2="update mleave set al1='$al1' where uname='$user'";
//mysqli_query($con,$ins_query2) or die(mysql_error());


	echo '<script language="javascript">';
    echo 'alert("Successfully Submitted !!"); ';
    echo '</script>';
}
}



else if($tleave=='Sick Leave' && $diff1<=$sl1s_p && $status1=='nonconfirm' && $incharge!="" && $r_name!=''){
	
	$ins_query1="insert into dleave (`sdate`,`edate`,`uname`,`tleave`,`total`,`reason`,`HOS`,`dept`,`hstatus`,`type`,`bal`,`incharge`,`cyear`,`apply_time`,`r_name`) values ('$sdate','$edate','$user','$tleave','$diff1','$reason','$hos','$idept','Forwarded to Incharge','sleave','$sl1','$incharge','$cyear','$apply_time','$r_name')";
//mysqli_query($con,$ins_query1) or die(mysql_error());

if(mysqli_query($con,$ins_query1)==true){

$mail_body = "
			<p>Hi ".$r_name.",</p>
			<p>
			
			We wish to inform that ".$row39['sname']." will be taking his/her leave from ".$sdate." to ".$edate.".
Therefore, you are required to relieve his/her responsibility during the period.
Kindly comply to the above.
			
			
			</p>
			
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
			$mail->Subject = 'Relieve '.$row39['sname'].' responsibility during his/her leave period';			//Sets the Subject of the message
			$mail->Body = $mail_body;							//An HTML or plain text message body
			if($mail->Send())								//Send an Email. Return true on success or false on error
			{
				$message = '<label class="text-success">Register Done, Please check your mail.</label>';
			}


//$ins_query2="update mleave set al1='$al1' where uname='$user'";
//mysqli_query($con,$ins_query2) or die(mysql_error());


	echo '<script language="javascript">';
    echo 'alert("Successfully Submitted !!"); ';
    echo '</script>';
}}




else if($tleave=='Maternity Leave' && $diff1<=$ma && $gender=='F' && $status1=='Confirm' && $incharge=="" && $r_name!=''){
	
	
	
	$ins_query1="insert into dleave (`sdate`,`edate`,`uname`,`tleave`,`total`,`reason`,`HOS`,`dept`,`hstatus`,`type`,`bal`,`cyear`,`apply_time`,`r_name`) values ('$sdate','$edate','$user','$tleave','$diff1','$reason','$hos','$idept','Approval Pending','maleave','$ma','$cyear','$apply_time','$r_name')";
//mysqli_query($con,$ins_query1) or die(mysql_error());

if(mysqli_query($con,$ins_query1)==true){

$mail_body = "
			<p>Hi ".$r_name.",</p>
			<p>
			
			We wish to inform that ".$row39['sname']." will be taking his/her leave from ".$sdate." to ".$edate.".
Therefore, you are required to relieve his/her responsibility during the period.
Kindly comply to the above.
			
			
			</p>
			
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
			$mail->Subject = 'Relieve '.$row39['sname'].' responsibility during his/her leave period';			//Sets the Subject of the message
			$mail->Body = $mail_body;							//An HTML or plain text message body
			if($mail->Send())								//Send an Email. Return true on success or false on error
			{
				$message = '<label class="text-success">Register Done, Please check your mail.</label>';
			}


//$ins_query2="update mleave set al1='$al1' where uname='$user'";
//mysqli_query($con,$ins_query2) or die(mysql_error());


	echo '<script language="javascript">';
    echo 'alert("Successfully Submitted !!"); ';
    echo '</script>';
}	
}


else if($tleave=='Maternity Leave' && $diff1<=$ma && $gender=='F' && $status1=='Confirm' && $incharge!="" && $r_name!=''){
	
	
	
	$ins_query1="insert into dleave (`sdate`,`edate`,`uname`,`tleave`,`total`,`reason`,`HOS`,`dept`,`hstatus`,`type`,`bal`,`incharge`,`cyear`,`apply_time`,`r_name`) values ('$sdate','$edate','$user','$tleave','$diff1','$reason','$hos','$idept','Forwarded to Incharge','maleave','$ma','$incharge','$cyear','$apply_time','$r_name')";
//mysqli_query($con,$ins_query1) or die(mysql_error());

if(mysqli_query($con,$ins_query1)==true){

$mail_body = "
			<p>Hi ".$r_name.",</p>
			<p>
			
			We wish to inform that ".$row39['sname']." will be taking his/her leave from ".$sdate." to ".$edate.".
Therefore, you are required to relieve his/her responsibility during the period.
Kindly comply to the above.
			
			
			</p>
			
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
			$mail->Subject = 'Relieve '.$row39['sname'].' responsibility during his/her leave period';			//Sets the Subject of the message
			$mail->Body = $mail_body;							//An HTML or plain text message body
			if($mail->Send())								//Send an Email. Return true on success or false on error
			{
				$message = '<label class="text-success">Register Done, Please check your mail.</label>';
			}


//$ins_query2="update mleave set al1='$al1' where uname='$user'";
//mysqli_query($con,$ins_query2) or die(mysql_error());


	echo '<script language="javascript">';
    echo 'alert("Successfully Submitted !!"); ';
    echo '</script>';
}	
}



else if($tleave=='Paternity Leave' && $gender=='M' && $status1=='Confirm' && $incharge=="" && $r_name!=''){
	
	$ins_query1="insert into dleave (`sdate`,`edate`,`uname`,`tleave`,`total`,`reason`,`HOS`,`dept`,`hstatus`,`type`,`bal`,`cyear`,`apply_time`,`r_name`) values ('$sdate','$edate','$user','$tleave','$diff1','$reason','$hos','$idept','Approval Pending','paleave','','$cyear','$apply_time','$r_name')";
//mysqli_query($con,$ins_query1) or die(mysql_error());

if(mysqli_query($con,$ins_query1)==true){

$mail_body = "
			<p>Hi ".$r_name.",</p>
			<p>
			
			We wish to inform that ".$row39['sname']." will be taking his/her leave from ".$sdate." to ".$edate.".
Therefore, you are required to relieve his/her responsibility during the period.
Kindly comply to the above.
			
			
			</p>
			
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
			$mail->Subject = 'Relieve '.$row39['sname'].' responsibility during his/her leave period';			//Sets the Subject of the message
			$mail->Body = $mail_body;							//An HTML or plain text message body
			if($mail->Send())								//Send an Email. Return true on success or false on error
			{
				$message = '<label class="text-success">Register Done, Please check your mail.</label>';
			}


//$ins_query2="update mleave set al1='$al1' where uname='$user'";
//mysqli_query($con,$ins_query2) or die(mysql_error());


	echo '<script language="javascript">';
    echo 'alert("Successfully Submitted !!"); ';
    echo '</script>';
}
}




else if($tleave=='Paternity Leave' && $gender=='M' && $status1=='Confirm' && $incharge!="" && $r_name!=''){
	
	$ins_query1="insert into dleave (`sdate`,`edate`,`uname`,`tleave`,`total`,`reason`,`HOS`,`dept`,`hstatus`,`type`,`bal`,`incharge`,`cyear`,`apply_time`,r_name`) values ('$sdate','$edate','$user','$tleave','$diff1','$reason','$hos','$idept','Forwarded to Incharge','paleave','','$incharge','$cyear','$apply_time','$r_name')";
//mysqli_query($con,$ins_query1) or die(mysql_error());

if(mysqli_query($con,$ins_query1)==true){

$mail_body = "
			<p>Hi ".$r_name.",</p>
			<p>
			
			We wish to inform that ".$row39['sname']." will be taking his/her leave from ".$sdate." to ".$edate.".
Therefore, you are required to relieve his/her responsibility during the period.
Kindly comply to the above.
			
			
			</p>
			
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
			$mail->Subject = 'Relieve '.$row39['sname'].' responsibility during his/her leave period';			//Sets the Subject of the message
			$mail->Body = $mail_body;							//An HTML or plain text message body
			if($mail->Send())								//Send an Email. Return true on success or false on error
			{
				$message = '<label class="text-success">Register Done, Please check your mail.</label>';
			}


//$ins_query2="update mleave set al1='$al1' where uname='$user'";
//mysqli_query($con,$ins_query2) or die(mysql_error());


	echo '<script language="javascript">';
    echo 'alert("Successfully Submitted !!"); ';
    echo '</script>';
}}

else if($tleave=='Replacement Leave' && $incharge=="" && $r_name!=''){
	
	$ins_query1="insert into dleave (`sdate`,`edate`,`uname`,`tleave`,`total`,`reason`,`HOS`,`dept`,`hstatus`,`type`,`bal`,`cyear`,`apply_time`,`r_name`) values ('$sdate','$edate','$user','$tleave','$diff1','$reason','$hos','$idept','Approval Pending','rleave','','$cyear','$apply_time','$r_name')";
//mysqli_query($con,$ins_query1) or die(mysql_error());

if(mysqli_query($con,$ins_query1)==true){

$mail_body = "
			<p>Hi ".$r_name.",</p>
			<p>
			
			We wish to inform that ".$row39['sname']." will be taking his/her leave from ".$sdate." to ".$edate.".
Therefore, you are required to relieve his/her responsibility during the period.
Kindly comply to the above.
			
			
			</p>
			
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
			$mail->Subject = 'Relieve '.$row39['sname'].' responsibility during his/her leave period';			//Sets the Subject of the message
			$mail->Body = $mail_body;							//An HTML or plain text message body
			if($mail->Send())								//Send an Email. Return true on success or false on error
			{
				$message = '<label class="text-success">Register Done, Please check your mail.</label>';
			}


//$ins_query2="update mleave set al1='$al1' where uname='$user'";
//mysqli_query($con,$ins_query2) or die(mysql_error());


	echo '<script language="javascript">';
    echo 'alert("Successfully Submitted !!"); ';
    echo '</script>';
}
}




else if($tleave=='Replacement Leave' && $incharge!="" && $r_name!=''){
	
	$ins_query1="insert into dleave (`sdate`,`edate`,`uname`,`tleave`,`total`,`reason`,`HOS`,`dept`,`hstatus`,`type`,`bal`,`incharge`,`cyear`,`apply_time`,`r_name`) values ('$sdate','$edate','$user','$tleave','$diff1','$reason','$hos','$idept','Forwarded to Incharge','rleave','','$incharge','$cyear','$apply_time','$r_name')";
//mysqli_query($con,$ins_8query1) or die(mysql_error());

if(mysqli_query($con,$ins_query1)==true){

$mail_body = "
			<p>Hi ".$r_name.",</p>
			<p>
			
			We wish to inform that ".$row39['sname']." will be taking his/her leave from ".$sdate." to ".$edate.".
Therefore, you are required to relieve his/her responsibility during the period.
Kindly comply to the above.
			
			
			</p>
			
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
			$mail->Subject = 'Relieve '.$row39['sname'].' responsibility during his/her leave period';			//Sets the Subject of the message
			$mail->Body = $mail_body;							//An HTML or plain text message body
			if($mail->Send())								//Send an Email. Return true on success or false on error
			{
				$message = '<label class="text-success">Register Done, Please check your mail.</label>';
			}


//$ins_query2="update mleave set al1='$al1' where uname='$user'";
//mysqli_query($con,$ins_query2) or die(mysql_error());


	echo '<script language="javascript">';
    echo 'alert("Successfully Submitted !!"); ';
    echo '</script>';
}}


else if($tleave=='Leave Without Pay' && $incharge=="" && $r_name!=''){
	
	$ins_query1="insert into dleave (`sdate`,`edate`,`uname`,`tleave`,`total`,`reason`,`HOS`,`dept`,`hstatus`,`type`,`bal`,`cyear`,`apply_time`,`r_name`) values ('$sdate','$edate','$user','$tleave','$diff1','$reason','$hos','$idept','Approval Pending','lWPleave','','$cyear','$apply_time','$r_name')";
//mysqli_query($con,$ins_query1) or die(mysql_error());

if(mysqli_query($con,$ins_query1)==true){

$mail_body = "
			<p>Hi ".$r_name.",</p>
			<p>
			
			We wish to inform that ".$row39['sname']." will be taking his/her leave from ".$sdate." to ".$edate.".
Therefore, you are required to relieve his/her responsibility during the period.
Kindly comply to the above.
			
			
			</p>
			
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
			$mail->Subject = 'Relieve '.$row39['sname'].' responsibility during his/her leave period';			//Sets the Subject of the message
			$mail->Body = $mail_body;							//An HTML or plain text message body
			if($mail->Send())								//Send an Email. Return true on success or false on error
			{
				$message = '<label class="text-success">Register Done, Please check your mail.</label>';
			}


//$ins_query2="update mleave set al1='$al1' where uname='$user'";
//mysqli_query($con,$ins_query2) or die(mysql_error());


	echo '<script language="javascript">';
    echo 'alert("Successfully Submitted !!"); ';
    echo '</script>';
}}




else if($tleave=='Leave Without Pay' && $incharge!="" && $r_name!=''){
	
	$ins_query1="insert into dleave (`sdate`,`edate`,`uname`,`tleave`,`total`,`reason`,`HOS`,`dept`,`hstatus`,`type`,`bal`,`incharge`,`cyear`,`apply_time`,`r_name`) values ('$sdate','$edate','$user','$tleave','$diff1','$reason','$hos','$idept','Forwarded to Incharge','lWPleave','','$incharge','$cyear','$apply_time','$r_name')";
//mysqli_query($con,$ins_query1) or die(mysql_error());

if(mysqli_query($con,$ins_query1)==true){

$mail_body = "
			<p>Hi ".$r_name.",</p>
			<p>
			
			We wish to inform that ".$row39['sname']." will be taking his/her leave from ".$sdate." to ".$edate.".
Therefore, you are required to relieve his/her responsibility during the period.
Kindly comply to the above.
			
			
			</p>
			
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
			$mail->Subject = 'Relieve '.$row39['sname'].' responsibility during his/her leave period';			//Sets the Subject of the message
			$mail->Body = $mail_body;							//An HTML or plain text message body
			if($mail->Send())								//Send an Email. Return true on success or false on error
			{
				$message = '<label class="text-success">Register Done, Please check your mail.</label>';
			}


//$ins_query2="update mleave set al1='$al1' where uname='$user'";
//mysqli_query($con,$ins_query2) or die(mysql_error());


	echo '<script language="javascript">';
    echo 'alert("Successfully Submitted !!"); ';
    echo '</script>';
}}


else if($tleave=='Compassionate Leave' && $incharge=="" && $r_name!=''){
	
	$ins_query1="insert into dleave (`sdate`,`edate`,`uname`,`tleave`,`total`,`reason`,`HOS`,`dept`,`hstatus`,`type`,`bal`,`cyear`,`apply_time`,`r_name`) values ('$sdate','$edate','$user','$tleave','$diff1','$reason','$hos','$idept','Approval Pending','comleave','','$cyear','$apply_time','$r_name')";
//mysqli_query($con,$ins_query1) or die(mysql_error());

if(mysqli_query($con,$ins_query1)==true){

$mail_body = "
			<p>Hi ".$r_name.",</p>
			<p>
			
			We wish to inform that ".$row39['sname']." will be taking his/her leave from ".$sdate." to ".$edate.".
Therefore, you are required to relieve his/her responsibility during the period.
Kindly comply to the above.
			
			
			</p>
			
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
			$mail->Subject = 'Relieve '.$row39['sname'].' responsibility during his/her leave period';			//Sets the Subject of the message
			$mail->Body = $mail_body;							//An HTML or plain text message body
			if($mail->Send())								//Send an Email. Return true on success or false on error
			{
				$message = '<label class="text-success">Register Done, Please check your mail.</label>';
			}


//$ins_query2="update mleave set al1='$al1' where uname='$user'";
//mysqli_query($con,$ins_query2) or die(mysql_error());


	echo '<script language="javascript">';
    echo 'alert("Successfully Submitted !!"); ';
    echo '</script>';
}
}




else if($tleave=='Compassionate Leave' && $incharge!="" && $r_name!=''){
	
	$ins_query1="insert into dleave (`sdate`,`edate`,`uname`,`tleave`,`total`,`reason`,`HOS`,`dept`,`hstatus`,`type`,`bal`,`incharge`,`cyear`,`apply_time`,`r_name`) values 
	('$sdate','$edate','$user','$tleave','$diff1','$reason','$hos','$idept','Forwarded to Incharge','comleave','','$incharge','$cyear','$apply_time','$r_name')";
//mysqli_query($con,$ins_query1) or die(mysql_error());

if(mysqli_query($con,$ins_query1)==true){

$mail_body = "
			<p>Hi ".$r_name.",</p>
			<p>
			
			We wish to inform that ".$row39['sname']." will be taking his/her leave from ".$sdate." to ".$edate.".
Therefore, you are required to relieve his/her responsibility during the period.
Kindly comply to the above.
			
			
			</p>
			
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
			$mail->Subject = 'Relieve '.$row39['sname'].' responsibility during his/her leave period';			//Sets the Subject of the message
			$mail->Body = $mail_body;							//An HTML or plain text message body
			if($mail->Send())								//Send an Email. Return true on success or false on error
			{
				$message = '<label class="text-success">Register Done, Please check your mail.</label>';
			}


//$ins_query2="update mleave set al1='$al1' where uname='$user'";
//mysqli_query($con,$ins_query2) or die(mysql_error());


	echo '<script language="javascript">';
    echo 'alert("Successfully Submitted !!"); ';
    echo '</script>';
}}





else if($tleave=='Marriage Leave' && $incharge=="" && $r_name!=''){
	
	$ins_query1="insert into dleave (`sdate`,`edate`,`uname`,`tleave`,`total`,`reason`,`HOS`,`dept`,`hstatus`,`type`,`bal`,`cyear`,`apply_time`,`r_name`) values ('$sdate','$edate','$user','$tleave','$diff1','$reason','$hos','$idept','Approval Pending','marleave','','$cyear','$apply_time','$r_name')";
//mysqli_query($con,$ins_query1) or die(mysql_error());

if(mysqli_query($con,$ins_query1)==true){

$mail_body = "
			<p>Hi ".$r_name.",</p>
			<p>
			
			We wish to inform that ".$row39['sname']." will be taking his/her leave from ".$sdate." to ".$edate.".
Therefore, you are required to relieve his/her responsibility during the period.
Kindly comply to the above.
			
			
			</p>
			
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
			$mail->Subject = 'Relieve '.$row39['sname'].' responsibility during his/her leave period';			//Sets the Subject of the message
			$mail->Body = $mail_body;							//An HTML or plain text message body
			if($mail->Send())								//Send an Email. Return true on success or false on error
			{
				$message = '<label class="text-success">Register Done, Please check your mail.</label>';
			}


//$ins_query2="update mleave set al1='$al1' where uname='$user'";
//mysqli_query($con,$ins_query2) or die(mysql_error());


	echo '<script language="javascript">';
    echo 'alert("Successfully Submitted !!"); ';
    echo '</script>';
}
}




else if($tleave=='Marriage Leave' && $incharge!="" && $r_name!=''){
	
	$ins_query1="insert into dleave (`sdate`,`edate`,`uname`,`tleave`,`total`,`reason`,`HOS`,`dept`,`hstatus`,`type`,`bal`,`incharge`,`cyear`,`apply_time`,`r_name`) values ('$sdate','$edate','$user','$tleave','$diff1','$reason','$hos','$idept','Forwarded to Incharge','marleave','','$incharge','$cyear','$apply_time','$r_name')";
//mysqli_query($con,$ins_query1) or die(mysql_error());

if(mysqli_query($con,$ins_query1)==true){

$mail_body = "
			<p>Hi ".$r_name.",</p>
			<p>
			
			We wish to inform that ".$row39['sname']." will be taking his/her leave from ".$sdate." to ".$edate.".
Therefore, you are required to relieve his/her responsibility during the period.
Kindly comply to the above.
			
			
			</p>
			
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
			$mail->Subject = 'Relieve '.$row39['sname'].' responsibility during his/her leave period';			//Sets the Subject of the message
			$mail->Body = $mail_body;							//An HTML or plain text message body
			if($mail->Send())								//Send an Email. Return true on success or false on error
			{
				$message = '<label class="text-success">Register Done, Please check your mail.</label>';
			}


//$ins_query2="update mleave set al1='$al1' where uname='$user'";
//mysqli_query($con,$ins_query2) or die(mysql_error());


	echo '<script language="javascript">';
    echo 'alert("Successfully Submitted !!"); ';
    echo '</script>';
}
}


else if($tleave=='Sick Leave Inpatient' && $status1=='Confirm' && $incharge=="" && $r_name!=''){
	
	$ins_query1="insert into dleave (`sdate`,`edate`,`uname`,`tleave`,`total`,`reason`,`HOS`,`dept`,`hstatus`,`type`,`bal`,`cyear`,`apply_time`,`r_name`) values ('$sdate','$edate','$user','$tleave','$diff1','$reason','$hos','$idept','Approval Pending','insleave','','$cyear','$apply_time','$r_name')";
//mysqli_query($con,$ins_query1) or die(mysql_error());

if(mysqli_query($con,$ins_query1)==true){

$mail_body = "
			<p>Hi ".$r_name.",</p>
			<p>
			
			We wish to inform that ".$row39['sname']." will be taking his/her leave from ".$sdate." to ".$edate.".
Therefore, you are required to relieve his/her responsibility during the period.
Kindly comply to the above.
			
			
			</p>
			
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
			$mail->Subject = 'Relieve '.$row39['sname'].' responsibility during his/her leave period';			//Sets the Subject of the message
			$mail->Body = $mail_body;							//An HTML or plain text message body
			if($mail->Send())								//Send an Email. Return true on success or false on error
			{
				$message = '<label class="text-success">Register Done, Please check your mail.</label>';
			}


//$ins_query2="update mleave set al1='$al1' where uname='$user'";
//mysqli_query($con,$ins_query2) or die(mysql_error());


	echo '<script language="javascript">';
    echo 'alert("Successfully Submitted !!"); ';
    echo '</script>';
}
}




else if($tleave=='Sick Leave Inpatient'  && $status1=='Confirm' && $incharge!="" && $r_name!=''){
	
	$ins_query1="insert into dleave (`sdate`,`edate`,`uname`,`tleave`,`total`,`reason`,`HOS`,`dept`,`hstatus`,`type`,`bal`,`incharge`,`cyear`,`apply_time`,`r_name`) values ('$sdate','$edate','$user','$tleave','$diff1','$reason','$hos','$idept','Forwarded to Incharge','insleave','','$incharge','$cyear','$apply_time','$r_name')";
//mysqli_query($con,$ins_query1) or die(mysql_error());

if(mysqli_query($con,$ins_query1)==true){

$mail_body = "
			<p>Hi ".$r_name.",</p>
			<p>
			
			We wish to inform that ".$row39['sname']." will be taking his/her leave from ".$sdate." to ".$edate.".
Therefore, you are required to relieve his/her responsibility during the period.
Kindly comply to the above.
			
			
			</p>
			
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
			$mail->Subject = 'Relieve '.$row39['sname'].' responsibility during his/her leave period';			//Sets the Subject of the message
			$mail->Body = $mail_body;							//An HTML or plain text message body
			if($mail->Send())								//Send an Email. Return true on success or false on error
			{
				$message = '<label class="text-success">Register Done, Please check your mail.</label>';
			}


//$ins_query2="update mleave set al1='$al1' where uname='$user'";
//mysqli_query($con,$ins_query2) or die(mysql_error());


	echo '<script language="javascript">';
    echo 'alert("Successfully Submitted !!"); ';
    echo '</script>';
}}




else{
	
	echo '<script language="javascript">';
    echo 'alert("You Dont Have Sufficient Leave Balance OR Replacement Name is Wrong!!"); ';
    echo '</script>';
}
}


?>

<!DOCTYPE html>
<html lang="en" >

<head>
  <meta charset="UTF-8">
  <title>Out Patient Record</title>
  
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
  font-size: 12px;
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

input[type="text1"] {
  background: rgba(255,255,255,0.1);
  border: none;
  font-size: 20px;
  font-weight:bold;
  font-color: Blue;
  height: auto;
  margin: 0;
  outline: 0;
  padding: 15px;
  width: 100%;
  background-color: yellow;
  color: Black;
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

    <script src="jsnew/prefixfree.min.js"></script>



<link rel="stylesheet" href="jsnew/jquery-ui.css">
<script src="jsnew/jquery.min.js"></script>
<script src="jsnew/jquery-ui.min.js"></script>
  
  <script>
  $(document).ready(function() {
    $("#datepicker").datepicker();
  });
  </script>
  
   <script>
  $(document).ready(function() {
    $("#datepicker1").datepicker();
  });
  </script>





  <style type="text/css">
<!--
.style1 {font-weight: bold}
-->
  </style>
  
  <head>
    <title>Prescription</title>
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
   <script src="ckeditor_new/ckeditor.js"></script>
</head>

<body>

<div id='cssmenu'>
<ul>
   <li><a href='viewnew1'><span>Home</span></a></li>
   <li class='active has-sub'><a href='#'><span>Patients</span></a>
      <ul>
         <li class='has-sub'><a href='viewnew'><span>OPD Patients</span></a>
            
         </li>
         <li class='has-sub'><a href='iview'><span>In-Patients</span></a>
            
         </li>
      </ul>
   </li>
   <li class='active has-sub'><a href='#'><span>Appointment</span></a>
      <ul>
         <li class='has-sub'><a href='cggtttt'><span>Set Doctor's Appointment</span></a>
            
         </li>
         <li class='has-sub'><a href='ami2'><span>Set Restrictions on Appointment Time</span></a>
            
         </li>
      </ul>
	  
   </li>

   <li class='last'><a href='ot'><span>OT BOOKING</span></a></li>
   <li class='active has-sub'><a href='#'><span>Reports</span></a>
      <ul>
         <li class='has-sub'><a href='view3new'><span>OPD Prescription</span></a>
            
         </li>
         <li class='has-sub'><a href='con1'><span>Outpatient Stats</span></a>
            
         </li>
		          <li class='has-sub'><a href='con2'><span>OT Stats</span></a>
            
         </li>
         <li class='has-sub'><a href='con3'><span>In-Patient Stats</span></a>
            
         </li>
		   <li class='has-sub'><a href='con11'><span>Medicine Stats</span></a>
            
         </li>

      </ul>
   </li>
   <li class='last'><a href='logout'><span>LOGOUT</span></a></li>
</ul>
</div>

<h1 align="center">Leave Apply Panel </h1>

  <!-- Stephonce R. MOrris | 2014 -->

<!-- Google Font -->
		<link href='jsnew/fonts' rel='stylesheet' type='text/css'>

<form action="" method="post" onsubmit='return confirm("Do You Want To Proceed??");' />


<!-- Form Title -->
        <table align="center" class="table table-bordered" id="dynamic_field">  
		
		
				<tr>
						
						
						<td colspan="4"><label><strong>Annual Leave</strong></label></td>
						<td colspan="4"><label><strong>Emergency Leave</strong></label></td>				
						<td colspan="4"><label><strong>Sick Leave</strong></label></td>
						<td colspan="4"><label><strong>Maternity Leave</strong></label></td>
						<td colspan="4"><label><strong>Paternity Leave</strong></label></td>
						
						
						
						</tr>

<tr>				 
					<td colspan="4"><input type="text1" name="aleave90"  required value="<?php if($status1=='Confirm'and $cyear!=$doj12){echo $aday;} else if($status1=='Confirm'and $cyear==$doj12){echo $aday_y;}else if($status1=='nonconfirm' and $cyear==$doj12){echo $aday2_y;}else if($status1=='nonconfirm' and $cyear!=$doj12){echo $aday2;}?>" readonly></td>
					<td colspan="4"><input type="text1" name="eleave"  required value="<?php if($status1=='Confirm' and $cyear!=$doj12){echo $aday1;}else if($status1=='Confirm' and $cyear==$doj12){echo $aday1_y;} else if($status1=='nonconfirm'){echo '0';}?>" readonly></td>
					<td colspan="4"><input type="text1" name="sleave" required value="<?php if($status1=='Confirm'){echo $sl1s;} else if($status1=='nonconfirm'){echo $sl1s_p;}?>" readonly></td>
<td colspan="4"><input type="text1" name="maleave" required value="<?php if($gender=='F'){echo '112';} else {echo '0';}?>" readonly/></td>
<td colspan="4"><input type="text1" name="paleave" required value="<?php if($gender=='M'){echo '2';} else {echo '0';}?>" readonly/></td>					
					  

					 
</tr>

<tr>
						
						
						<td colspan="7"><label><strong>Type Of Leave</strong></label></td>
						<td colspan="7"><label><strong>From Date</strong></label></td>				
						<td colspan="6"><label><strong>End Date</strong></label></td>
						
						
						
						</tr>
				
<tr>

<td colspan="7"><select name="tleave" value="" class="style1" required>
			        <option value=''>-Select Type-</option>
					 <option value='Annual Leave'>Annual Leave</option>
					 <option value='Emergency Leave'>Emergency Leave</option>
					 <option value='Sick Leave'>Sick Leave</option>
					 <option value='Sick Leave Inpatient'>Sick Leave Inpatient</option>
					 					 <option value='Maternity Leave'>Maternity Leave</option>
										 <option value='Paternity Leave'>Paternity Leave</option>
										 <option value='Replacement Leave'>Replacement Leave</option>
										 <option value='Leave Without Pay'>Leave Without Pay</option>
										 
<option value='Half Day Leave'>Half Day Leave</option>
<option value='Compassionate Leave'>Compassionate Leave</option>
<option value='Marriage Leave'>Marriage Leave</option>										 
									
										 
										 
				
			</select></td>
<td colspan="7"><input type="date" class="style1" name="sdate"  placeholder="Select Date" size="15" required></td>
<td colspan="6"><input type="date" class="style1" name="edate" placeholder="Select Date" size="15" required></td>

</tr>

<tr><td colspan="20"><label><strong>Reason For Leave</strong></label></td></tr>
<tr><td colspan="20">




	
                                    <div>
                                           <textarea name="reason" class="form-control" placeholder="Details"rows="25"cols="25" required></textarea>
                                               
										 
                                    </div>
                                
 <script>
 CKEDITOR.replace( 'reason', {
  height: 100,
  
  
  extraPlugins : 'filebrowser',
    filebrowserBrowseUrl:'browser.php?type=Images',
    filebrowserUploadMethod:"form",
    filebrowserUploadUrl: "upload_topic.php"
 });
</script>
											



</td></tr>




<tr><td colspan="20"><label><strong>Responsible Person During Leave</strong></label></td></tr>
<tr><td colspan="20">



  <select class="js-example-basic-single" name="replacement">

						<option value=''>-Select Replacement Staff-</option>
				<?php 
			$sql76 = "select * from `staff3` where status='Active' and dept='$idept' and cat='staff' and sid !='$user'";
			$res76 = mysqli_query($con, $sql76);
			if(mysqli_num_rows($res76) > 0) {
				while($row76 = mysqli_fetch_object($res76)) {
					echo "<option value='".$row76->sid."'>".$row76->sname.'-'.$row76->sid."</option>";
				}
			}
			?>  </select>
</td></tr>

<script>
$(document).ready(function() {
    $('.js-example-basic-single').select2();
});
</script>

	<link rel="stylesheet"
			href=
"jsnew/chosen.min.css" />

		<!--These jQuery libraries for select2
			need to be included-->
		<script src=
"jsnew/select2.min.js">
	</script>
		<link rel="stylesheet"
			href=
"jsnew/select2.min.css" />
<tr>
		<td colspan="10"><button type="submit" name="Submit">Confirm</button></td>
	
	  				
</tr>

</body>

</html>
