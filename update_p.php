<?php  
 //fetch.php  
 $connect = mysqli_connect("localhost", "root", "Godiloveu16", "sfmmkpjnew");  
 if(isset($_POST["employee_idp"]))  
 {  
      $query = "SELECT * FROM vitalspulse WHERE id = '".$_POST["employee_idp"]."'";  
      $result = mysqli_query($connect, $query);  
      $row = mysqli_fetch_array($result);  
      echo json_encode($row);  
	  
	  //$sel_query="Select * from iinves where pmrn= '$pmrn' and eid='$eid' and type='lab' and rstatus IN ('RECEIVED','REJECTED') and status IN ('RECEIVED','REJECTED')   order by `id` DESC;";
	  //$name = $row['medi'];   
	  
	  
	  //"Select * from pmedi where pmrn= '$pmrn' and eid='$eid1'order by `id` DESC;";
	  
	  
//$query59 = mysqli_query($connect,='medi'");
//$data59 = mysqli_fetch_assoc($query59);
//echo json_encode($data59);
//$mname=$data59['qty'];
	

  
 }  
 ?>