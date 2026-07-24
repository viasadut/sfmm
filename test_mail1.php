<?php
$email='diasadman16@gmail.com';
$url = "https://script.google.com/macros/s/AKfycbxJH18rXZ8JQM9Wkwrv2Ri3kNBQmYBXy9c4osrRd4IBdsJK31QG_Z9bABZcu51ubW6W/exec";
            $ch = curl_init($url);
            curl_setopt_array($ch, [
               CURLOPT_RETURNTRANSFER => true,
               CURLOPT_FOLLOWLOCATION => true,
               CURLOPT_POSTFIELDS => http_build_query([
                  "recipient" => $email,
                  "subject"   => 'Relieve'.' '.$row39['sname'].' responsibility during his/her leave period',
                  "body"      => 'Hi '.$r_name.',We wish to inform that '.$row39['sname'].' will be taking his/her leave from '.$sdate.' to '.$edate.'.
Therefore, you are required to relieve his/her responsibility during the period.
Kindly comply to the above.
			
Best Regards,
HR Department,
Powered By KPJ_IT_DHAKA'
               ])
            ]);
            $result = curl_exec($ch);
           // echo $result;
			//header("Location:test_leave");
			curl_close($ch);




	echo '<script language="javascript">';
    echo 'alert("Successfully Submitted !!"); ';
    echo '</script>';
?>