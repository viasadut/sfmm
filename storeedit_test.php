<?php 
    session_start();
    $role = $_SESSION['sess_userrole'];
    if(!isset($_SESSION['sess_username']) || $role!="store"){
      header('Location: login2.php?err=2');
    }
?>

<?php
require('db1.php');

?>



<?php
$url1=$_SERVER['REQUEST_URI'];
//header("Refresh: 5; URL=$url1");

?>




<?php
/*
Author: Javed Ur Rehman
Website: https://www.allphptricks.com/
*/

require('db1.php');
if(isset($_POST['bsearch'])){
$user=$_SESSION["sess_username"];
//$start=$_REQUEST["stdate"];
//$end=$_REQUEST["endate"];
$bt=$_REQUEST["bt"];

$query43 = "SELECT COUNT(eid) FROM storenew where etype= '$bt';"; 
	 
$result43 = mysqli_query($con, $query43) or die(mysqli_error());
$row43 = mysqli_fetch_assoc($result43);



$query44 = "SELECT COUNT(eid) FROM storenew;"; 
	 
$result44 = mysqli_query($con, $query44) or die(mysqli_error());
$row44 = mysqli_fetch_assoc($result44);

}




?>



<?php 

$connect = mysqli_connect("localhost", "root", "Godiloveu16", "sfmmkpjnew");
$query = "SELECT * FROM storenew ORDER BY id ASC";
$result = mysqli_query($connect, $query);


?>
<!DOCTYPE html>
<html>
 <head>
  <title>Webslesson Tutorial | Modal with Dynamic Previous & Next Data Button by Ajax PHP</title>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  
 </head>
 <body>
 
 <table align="center" class="table table-bordered" id="dynamic_field">  
				
					
							<td colspan="3"><label><strong> Select Category</strong></label></td> 
			 				<td>	<label><strong>Search:</strong></label></td>
						</tr>
						
						<tr>				
						
             		
					 
			    	 
					 <td colspan="3"><select name="bt">
        
						<option value=''>-Select-</option>
						<option value='all'>All</option>
						<?php 
			$sql = "Select DISTINCT etype  from storenew;";
			$res = mysqli_query($con, $sql);
			if(mysqli_num_rows($res) > 0) {
				while($row = mysqli_fetch_object($res)) {
					echo "<option value='".$row->etype."'>".$row->etype."</option>";
				}
			}
			?>
						
				
</select></td>  
					<td>	<button type="submit" name="bsearch">Search</button></td>
					 </tr>
  <br /><br />
  <div class="container">
   <h2 align="center">Modal with Dynamic Previous & Next Data Button by Ajax PHP</h2>
   <br />
   <div class="table-responsive">
    <table class="table table-striped table-bordered">
     <tr>
      <th>Post</th>
      <th>Post Title</th>
      <th>Author</th>
      <th>View</th>
     </tr>
     <?php
     while($row = mysqli_fetch_array($result))
     {
		 $wid=$row['id'];
		 
		 		$tt = "hoschargeedit1store?id=$wid"; 
				//$url = "$link?pmrn=$pmrn&eid=$eid&id=$id&sno=$ac_no"; 
      echo '
      <tr>
       <td>'.$row["id"].'</td>
       <td>'.$row["ename"].'</td>
       <td>'.$row["estatus"].'</td>
	   <td align="center" ><a href='.$tt.'>Edit</a></td>
	   
	   
       <td><button type="button" name="view" class="btn btn-info view" id="'.$row["id"].'" >View</button></td>
	   
      </tr>
      ';
     }
     ?>
    </table>
   </div>
   
  </div>
 </body>
</html>

<div id="post_modal" class="modal fade">
 <div class="modal-dialog">
  <div class="modal-content"> 
   <div class="modal-header">
    <button type="button" class="close" data-dismiss="modal">&times;</button>
    <h4 class="modal-title">Post Details</h4>
   </div>
   <div class="modal-body" id="post_detail">
   

   </div>
   
   
   
   
   <div class="modal-footer">
    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
	
	
	
   </div>
  </div>
 </div>
</div>


<script>
$(document).ready(function(){
 
 function fetch_post_data(id)
 {
  $.ajax({
   url:"fetch_edit.php",
   method:"POST",
   data:{id:id},
   success:function(data)
   {
    $('#post_modal').modal('show');
    $('#post_detail').html(data);
   }
  });
 }

 $(document).on('click', '.view', function(){
  var id = $(this).attr("id");
  fetch_post_data(id);
 });

 $(document).on('click', '.previous', function(){
  var id = $(this).attr("id");
  fetch_post_data(id);
 });

 $(document).on('click', '.next', function(){
  var id = $(this).attr("id");
  fetch_post_data(id);
 });
 
});
</script>