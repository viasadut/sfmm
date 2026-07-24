<?php
if(isset($_POST['submit'])){
$data = array(
        'username' => $_POST['username'],
        'password' => $_POST['password'],
        'sender'  => $_POST['sender'],
'recipient'  => $_POST['recipient'],
		'message'  => $_POST['message']
);

$sms =  'https://api.mobireach.com.bd/SendTextMessage?Username=sfmc&Password=Dhaka@0088&From=SFMMKPJSH&To='.$phone.'&Message='.$message;
    // Send the POST request with cURL
    $ch = curl_init($sms);
    curl_setopt($ch, CURLOPT_POST, true);

    curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
	
	
 curl_setopt ($ch, CURLOPT_FOLLOWLOCATION, 1);
  curl_setopt($ch, CURLOPT_RETURNTRANSFER,1);
    $result = curl_exec($ch); //This is the result from Textlocal


if(curl_exec($ch) === false) {
echo '<font color=red size=4><b>Message sending failed' . '</b></font><br />';
} else {
echo '<font color=orange size=4><b>Message sent successfully' . '</b></font><br />';
echo 'Total number of bytes downloaded: ' . curl_getinfo($ch,CURLINFO_SIZE_DOWNLOAD) . '<br />';
echo 'Total size of all headers received: ' . curl_getinfo($ch,CURLINFO_HEADER_SIZE) . '<br />';
}

curl_close($ch);

//var_dump($result);

print($result);
} else {




?>
 

                <form method="post"  style="margin: 5px; padding: 5px;">
                        <table width="100%" border="0" cellspacing="5px" cellpadding="3px">
     
     <tr>
                             
                                <td><input name="username" type="hidden" id="username" value="" size="50" style="width: 400px;" /></td>
                        </tr>
                        <tr>
                                
                                <td><input name="password" type="hidden" id="password" value="" size="50" style="width: 400px;" /></td>
                        </tr>                   
<tr>
                               
                                <td><input name="sender" type="hidden" id="sender" size="50" style="width: 400px;" value=""/></td>
                        </tr>      
<tr>
                                <td>Reciever</td>
                                <td>

<input name="recipient" type="text" id="recipient" size="50" style="width: 400px;" value=""/>


</td>
                        </tr>


                        <tr>
                                <td>Message</td>
                                <td><textarea name="message" rows="4" cols="90" id="message" style="width: 400px; height: 120px;"></textarea></td>
                        </tr>
                        
                        <tr>
                                <td> 

                                <td><input type="submit" name="submit" id="add_subcat" value="Send Now!" class="btn btn-info btn-small"></input> <input type="reset" name="Submit2" value="Reset" /></td>
                        </tr>
                </table>
                </form>
<?php
}
?>