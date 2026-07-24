<?php 
    session_start();
    require('db1.php');
	$role = $_SESSION['sess_userrole'];
	
	$queryc = "SELECT COUNT(utype) FROM user where '$role' in ('store','staff','ot','nurse','imo','mofficer','emergency','mng')"; 
$resultc = mysqli_query($con, $queryc) or die(mysqli_error());
$rowc = mysqli_fetch_array($resultc);
$c1=$rowc['COUNT(utype)'];
	
    if(!isset($_SESSION['sess_username']) || $c1==0){
      header('Location: login2?err=2');
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

if(isset($_POST['bsearch'])){
$user=$_SESSION["sess_username"];
//$start=$_REQUEST["stdate"];
//$end=$_REQUEST["endate"];
$bt=$_REQUEST["bt"];
//$id=$_REQUEST["id"];




$connect = mysqli_connect("localhost", "root", "Godiloveu16", "sfmmkpjnew");
$query = "SELECT * FROM storenew where etype='$bt' ORDER BY id ASC";
$result = mysqli_query($connect, $query);

$query1 = "SELECT * FROM storenew ORDER BY id ASC";
$result1 = mysqli_query($connect, $query1);


}

?>
<!DOCTYPE html>
<html>
 <head>
  
 
  
  
  
  
  <link rel="stylesheet" href="jsnew/bootstrap.min.css" />  
    <script src="jsnew/jjquery.min.js"></script>
    <script src="jsnew/bootstrap.min.js"></script>

   

<link rel="stylesheet" href="styles.css">

   <script src="script.js"></script>
 </head>
 <body>
 
 <div id='cssmenu'>
<ul>
   <li><a href='viewnew11'><span>Home</span></a></li>
   <li class='active has-sub'><a href='#'><span>Patients</span></a>
      <ul>
         <li class='has-sub'><a href='viewnew'><span>OPD Patients</span></a>
            
         </li>
         <li class='has-sub'><a href='iview'><span>In-Patients</span></a>
            
         </li>
      </ul>
   </li>
   <li class='active has-sub'><a href='#'><span>Appointment</span></a>
      <ul>
         <li class='has-sub'><a href='cggtttt'><span>Set Doctor's Appointment</span></a>
            
         </li>
         <li class='has-sub'><a href='ami2'><span>Set Restrictions on Appointment Time</span></a>
            
         </li>
      </ul>
	  
   </li>

   <li class='last'><a href='ot'><span>OT BOOKING</span></a></li>
   <li class='active has-sub'><a href='#'><span>Reports</span></a>
      <ul>
         <li class='has-sub'><a href='view3new'><span>OPD Prescription</span></a>
            
         </li>
         <li class='has-sub'><a href='con1'><span>Outpatient Stats</span></a>
            
         </li>
		          <li class='has-sub'><a href='con2'><span>OT Stats</span></a>
            
         </li>
         <li class='has-sub'><a href='con3'><span>In-Patient Stats</span></a>
            
         </li>
		   <li class='has-sub'><a href='con11'><span>Medicine Stats</span></a>
            
         </li>

      </ul>
   </li>
   <li class='last'><a href='logout'><span>LOGOUT</span></a></li>
</ul>
</div>
 
 <form action="" method="POST">
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
				while($row2 = mysqli_fetch_object($res)) {
					echo "<option value='".$row2->etype."'>".$row2->etype."</option>";
				}
			}
			?>
						
				
</select></td>  
					<td>	<button type="submit" name="bsearch">Search</button></td>
					 </tr>
  <br /><br />
  <div class="container">
   <h2 align="center">Edit Product Panel</h2>
   <br />
   <div class="table-responsive">
    <table class="table table-striped table-bordered">
     <tr>
      <th>S/NO</th>
      <th>Product Name</th>
      <th>Status</th>
      <th>View</th>
     </tr>
     <?php
	if(isset($_POST['bsearch'])){
$user=$_SESSION["sess_username"];
//$start=$_REQUEST["stdate"];
//$end=$_REQUEST["endate"];
echo "<font color=blue font size=5> Category  -";
echo $bt=$_REQUEST["bt"];
echo '<br>';
echo "<font color=blue font size=5> Total Record found in the search  -";
echo   $row43['COUNT(eid)'];

//$id=$_REQUEST["id"];

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
	   
	   
	   
       <td><button type="button" name="view" class="btn btn-info view" id="'.$row["id"].'" >View</button></td>
	   
      </tr>
      ';
	}}
     ?>
	 
	 
	  <?php
	if(isset($_POST['bsearch'])){
	$bt=$_REQUEST["bt"];
if($bt=='all'){	
$count=1;		
$user=$_SESSION["sess_username"];
//$start=$_REQUEST["stdate"];
//$end=$_REQUEST["endate"];
echo "<font color=blue font size=5> Category  -";
echo $bt=$_REQUEST["bt"];
echo '<br>';
echo "<font color=blue font size=5> Total Record found in the search  -";
echo   $row43['COUNT(eid)'];

//$id=$_REQUEST["id"];

     while($row1 = mysqli_fetch_array($result1))
     {
		 $wid1=$row1['id'];
		 
		 		$tt = "hoschargeedit1store?id=$wid1"; 
				//$url = "$link?pmrn=$pmrn&eid=$eid&id=$id&sno=$ac_no"; 
      echo '
      <tr>
       <td>'.$row1["id"].'</td>
       <td>'.$row1["ename"].'</td>
       <td>'.$row1["estatus"].'</td>
	   
	   
	   
       <td><button type="button" name="view" class="btn btn-info view" id="'.$row1["id"].'" >View</button></td>
	  
      </tr>
      ';
	}}}
     ?>
    </table>
   </div>
   
  </div>
  </form>
 </body>
</html>

<div id="post_modal" class="modal fade">
 <div class="modal-dialog">
  <div class="modal-content"> 
   <div class="modal-header">
    <button type="button" class="close" data-dismiss="modal">&times;</button>
    <h4 class="modal-title">Product Details</h4>
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