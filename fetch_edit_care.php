<?php
//fetch.php
if(isset($_POST["id"]))
{
 $connect = mysqli_connect("localhost", "root", "Godiloveu16", "sfmmkpjnew");
 $output = '';
 $query = "SELECT * FROM storenew WHERE id = '".$_POST["id"]."'";
 $result = mysqli_query($connect, $query);
 while($row = mysqli_fetch_array($result))
 {
	 
	 $wid=$row['id'];
		 
		 		$tt = "hoschargeedit1store_care?id=$wid"; 
  $output .= '
  <p><label>Product Type: '.$row["etype"].'</p>
  <p><label>Product Name: '.$row["ename"].'</p>
  
  <p><label>Product Price: '.$row["price"].'</p>
  <p><label>Status: '.$row["estatus"].'</label></p>
  
  
  <a target="_blank" href='.$tt.'>Edit</a>
  ';
  $query_1 = "SELECT id FROM storenew WHERE etype='".$row['etype']."' and id < '".$_POST['id']."' ORDER BY id DESC LIMIT 1";
  $result_1 = mysqli_query($connect, $query_1);
  $data_1 = mysqli_fetch_assoc($result_1);
  $query_2 = "SELECT id FROM storenew WHERE etype='".$row['etype']."' and id > '".$_POST['id']."' ORDER BY id ASC LIMIT 1";
  $result_2 = mysqli_query($connect, $query_2);
  $data_2 = mysqli_fetch_assoc($result_2);
  $if_previous_disable = '';
  $if_next_disable = '';
  if($data_1["id"] == "")
  {
   $if_previous_disable = 'disabled';
  }
  if($data_2["id"] == "")
  {
   $if_next_disable = 'disabled';
  }
  $output .= '
  <br /><br />
  <div align="center">
   <button type="button" name="previous" class="btn btn-warning btn-sm previous" id="'.$data_1["id"].'" '.$if_previous_disable.'>Previous</button>
   <button type="button" name="next" class="btn btn-warning btn-sm next" id="'.$data_2["id"].'" '.$if_next_disable.'>Next</button>
  </div>
  <br /><br />
  ';
 }
 echo $output;
}

?>