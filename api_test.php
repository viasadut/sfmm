
<?php

$pmrn=$_REQUEST['pmrn'];
$url="http://192.168.100.252:8081/sfmm/test_all_report?pmrn=".$pmrn."";
$ch=curl_init();
curl_setopt($ch, CURLOPT_URL,$url);
curl_setopt($ch, CURLOPT_RETURNTRANSFER,true);
$result=curl_exec($ch);
curl_close($ch);
	
	$result = json_decode($result, true);
	
	if(isset($result['status'])){
		
		if($result['status']==true){
			?>
			<table>
			<tr><td>Name</td></tr>
			
			<?php foreach($result['data'] as $list){
				
				echo"<tr><td>".$list['medi']."</td></tr>";
		}?>
		</table>
		<?php
		}
		
		else{
			
			
		}
	}
	
	else {
		
		echo"API NOT WORKING";
	}
	//echo '<pre>';
	//print_r($result);


?>