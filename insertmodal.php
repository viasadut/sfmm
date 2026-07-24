<?php  
 $connect = mysqli_connect("localhost", "root", "Godiloveu16", "sfmmkpjnew");  
 if(!empty($_POST))  
 {  
      $output = '';  
      $message = '';  
      $name = mysqli_real_escape_string($connect, $_POST["name"]);  
      $address = mysqli_real_escape_string($connect, $_POST["address"]);  
      $gender = mysqli_real_escape_string($connect, $_POST["gender"]);  
      $designation = mysqli_real_escape_string($connect, $_POST["designation"]);  
      $age = mysqli_real_escape_string($connect, $_POST["age"]);  
	        $age1 = mysqli_real_escape_string($connect, $_POST["age1"]); 



//$medi=$row['medi'];
if($age1>$gender)
	{
	echo '<script language="javascript">';
    echo 'alert("You have issued same vistor card twice"); ';
    echo '</script>';
	
}


else{

			
           $query = "  
           INSERT INTO psale(pname, pmrn, medi, pdos, qty,code)  
           VALUES('$name', '$address', '$gender', '$designation', '$age','$age1');  
           ";  
           
		   
		   $new=$gender-$age1;
		   
		   $update = " UPDATE medicine SET qty='$new' WHERE mname='".$name."'";  
		   mysqli_query($connect,$update) or die(mysql_error());
		   $message = $name.$new;  
      }  
      if(mysqli_query($connect, $query))  
      {  
           $output .= '<label class="text-success">' . $message . '</label>';  
           $select_query = "SELECT * FROM medicine ORDER BY id DESC";  
           $result = mysqli_query($connect, $select_query);  
           $output .= '  
                <table class="table table-bordered">  
                     <tr>  
                          <th width="70%">Employee Name</th>  
                          <th width="15%">Edit</th>  
                          <th width="15%">View</th>  
                     </tr>  
           ';  
           while($row = mysqli_fetch_array($result))  
           {  
                $output .= '  
                     <tr>  
                          <td>' . $row["mname"] . '</td>  
                          <td><input type="button" name="edit" value="Edit" id="'.$row["id"] .'" class="btn btn-info btn-xs edit_data" /></td>  
                          <td><input type="button" name="view" value="view" id="' . $row["id"] . '" class="btn btn-info btn-xs view_data" /></td>  
                     </tr>  
                ';  
           }  
           $output .= '</table>';  
	  }
      echo $output;  
 }  
 ?>