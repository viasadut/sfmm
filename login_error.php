<?php
session_start();
	echo $test=$_SESSION['user_session_id'];  
//echo 'User IP Address - '.$_SERVER['REMOTE_ADDR'];  

   //Buffering the output
  /* ob_start();  
   
   //Getting configuration details 
   system('ipconfig /all');  
   
   //Storing output in a variable 
   $configdata=ob_get_contents();  
   
   // Clear the buffer  
   ob_clean();  
   
   //Extract only the physical address or Mac address from the output
   $mac = "Physical";  
   $pmac = strpos($configdata, $mac);
   
   // Get Physical Address  
   $macaddr=substr($configdata,($pmac+36),17);  
   
   //Display Mac Address  
  // echo $macaddr;  
   

   $mac=exec('getmac');
$mac=strtok($mac,' ');
//echo "MAC address of server is: $mac";


//echo $computerId = $_SERVER['HTTP_USER_AGENT'].$_SERVER['LOCAL_ADDR'].$_SERVER['LOCAL_PORT'].$_SERVER['REMOTE_ADDR'];



?>

<?php
//whether ip is from share internet
if (!empty($_SERVER['HTTP_CLIENT_IP']))   
  {
    $ip_address = $_SERVER['HTTP_CLIENT_IP'];
  }
//whether ip is from proxy
elseif (!empty($_SERVER['HTTP_X_FORWARDED_FOR']))  
  {
    $ip_address = $_SERVER['HTTP_X_FORWARDED_FOR'];
  }
//whether ip is from remote address
else
  {
    $ip_address = $_SERVER['REMOTE_ADDR'];
  }
//echo $ip_address;

*/
?>


<!DOCTYPE html>
<html>
<head>
	<title>SFMMKPJ</title>
	<link rel="stylesheet" href="style.css">
	
    <style type="text/css">
<!--
.style1 {font-weight: bold}
-->


    </style>
	
	<script language="javascript" type="text/javascript">
window.history.forward();
</script>
</head>
<body>
<div class="header" align="center"> <img src="rr1.png" height="85 width="210"></div>

<div class="ee" align="center" >
	<h2>WELCOME!!! TO "SFMMKPJSH" </h2>
</div>

<form method="post" action="auth11.php">

	<div class="input-group" style="color:red; font-weight:bold; font-size:35px;"><strong>
	  <label>One User Already Active Using Same Browser.. Kindly Logout First OR Close The browser</label>
	 
	 <br><a href="login2"><font size="4.5">Back To Login Page</a></br>
	</strong></div>
	
		
	<p>&nbsp;</p>
</form>

</body>
</html>