<?php  
 if(isset($_POST["employee_id"]))  
 {  
      $output = '';  
      $connect = mysqli_connect("localhost", "root", "Godiloveu16", "sfmmkpjnew");  
      $query = "SELECT * FROM otcount WHERE id = '".$_POST["employee_id"]."'";  
      $result = mysqli_query($connect, $query);  
	  //$row = mysqli_fetch_array($result);
	  
	  
	  
	  
	  
      $output .= '  
      <div class="table-responsive">  
           <table class="table table-bordered">';  
      while($row = mysqli_fetch_array($result))  
		  
      {  
           $output .= '  
                <tr>  
                     <td width="30%"><label>Name</label></td>  
                     <td width="70%" >'.$row["medi"].'</td>  
                </tr>  
                <tr>  
                     <td width="30%"><label>Address</label></td>  
                     <td width="70%">'.$row["pdos"].'</td>  
                </tr>  
                <tr>  
                     <td width="30%"><label>Gender</label></td>  
                     <td width="70%">'.$row["pmrn"].'</td>  
                </tr>  
                <tr>  
                     <td width="30%"><label>Designation</label></td>  
                     <td width="70%">'.$row["pname"].'</td>  
                </tr>  
                <tr>  
                     <td width="30%"><label>Age</label></td>  
					 
                     <td width="70%">'.$row["qty"].'</td>  
                </tr>  
				
           ';  
      }  
      $output .= '  
	  
	  
	  
           </table>  
      </div>  
      ';  
      echo $output;  
 }  
 
$mname=$row['medi'];
$query59 = mysqli_query($connect,"select * from medicine where mname='Paracetamol 500 mg Tablet'");
$data59 = mysqli_fetch_assoc($query59);


	  echo $data59['qty'];
	  //echo $row['medi'];
 ?>