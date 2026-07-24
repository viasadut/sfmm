<html>
<?php


?>



</html>


<?php

if(isset($_POST['bsearch'])){

		/*$phone = '01711206048';
        $message = 'KPJ Dhaka Cafeteria Order id';
        $sms =  'https://api.mobireach.com.bd/SendTextMessage?Username=sfmc&Password=Dhaka@0088&From=SFMMKPJSH&To='.$phone.'&Message='.$message;
        $client = new \GuzzleHttp\Client(['allow_redirects' => ['track_redirects' => true]]);
        $response = $client->request('GET', $sms);*/

	$mm='test'.'%0a'.'KJK';	
	 header("location:https://api.whatsapp.com/send?phone=8801711198102&text='".$mm."'&source=&data=");
	 
/*<a href="https://api.whatsapp.com/send?phone=8801711198102&text=<?php echo $mm;?>&source=&data="> Click Here</a>		*/
}

?>
<html>
	<head>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" />
	</head>
	<body>
	<div class="container">
	<h1>PHP Send SMS</h1>
		<form method="post">
<input type="text" name="Username" value="sfmc"/>
<input type="text" name="Password" value="Dhaka@0088"/>
<input type="text" name="From" value="01810008062"/>
<input type="text" name="To" value="01711206048" />
<input type="text" name="Message" value="testmessage"/>
<input type="submit" value="Submit" name="bsearch" />
</form> 
	</div>	
	</body>
</html>
