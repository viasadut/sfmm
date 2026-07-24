<?php  
 //fetch.php  
 $connect = mysqli_connect("localhost", "root", "Godiloveu16", "sfmmkpjnew");  
 if(isset($_POST["employee_id"]))  
 {  
      $query = "SELECT * FROM pmedi WHERE id = '".$_POST["employee_id"]."'";  
      $result = mysqli_query($connect, $query);  
	  
	  $row = mysqli_fetch_assoc($result);
      //$row = mysqli_fetch_array($result);  
      
	  
	  
	 $name = $row['medi'];   
	  
	  $query1 = "SELECT * FROM medicine WHERE mname ='$name'";  
      $result1 = mysqli_query($connect, $query1);  
      $row1 = mysqli_fetch_assoc($result1);  
      //echo json_encode($row1);  
	  echo json_encode($row, $row1);  
	  
	  
//$query59 = mysqli_query($connect,='medi'");
//$data59 = mysqli_fetch_assoc($query59);
//echo json_encode($data59);
//$mname=$data59['qty'];
	

  
 }  
 ?>