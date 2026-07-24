<?php 
    session_start();
    require('db1.php');
	$role = $_SESSION['sess_userrole'];
	
	$queryc = "SELECT COUNT(utype) FROM user where '$role' in ('mng','billin','staff','imo')"; 
$resultc = mysqli_query($con, $queryc) or die(mysqli_error());
$rowc = mysqli_fetch_array($resultc);
$c1=$rowc['COUNT(utype)'];
	
    if(!isset($_SESSION['sess_username']) || $c1==0){
      header('Location: login2?err=2');
    }
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
//session_start();
require('db1.php');
//include("auth.php");
 
?>

<?php
$query87 = "SELECT COUNT(id) FROM bed where status='occupied'"; 
	 
$result87 = mysqli_query($con, $query87) or die(mysqli_error());

// Print out result
$row87 = mysqli_fetch_array($result87)
?>
<?php
$query88 = "SELECT COUNT(id) FROM bed where status='vacant'"; 
	 
$result88 = mysqli_query($con, $query88) or die(mysqli_error());

// Print out result
$row88 = mysqli_fetch_array($result88)
?>


<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<title>View Records</title>
<link rel="stylesheet" href="css/style2.css">
<style type="text/css">
<!--
.style1 {
	font-size: x-large;
	font-weight: bold;
	font-style: italic;
}
-->

div1 {
    height: 40px;
    width: 30%;
    background-color: powderblue;
}
</style>


   <link rel="stylesheet" href="styles.css">

   <script src="script.js"></script>




</head>


<body>





<div id='cssmenu'>
<ul>
   <li><a href='inviewnew1'><span>Home</span></a></li>
   <li class='active has-sub'><a href='#'><span>Patients</span></a>
      <ul>
         <li class='has-sub'><a href='psadmin'><span>Patient Search By MRN</span></a>
            
         </li>
         <li class='has-sub'><a href='gg3new'><span>Manual Admission</span></a>
            
         </li>
      </ul>
	  
   </li>
   
   <li class='active has-sub'><a href='#'><span>Discharge</span></a>
      <ul>
         <li class='has-sub'><a href='dcview'><span>Discharge Request By Cnsultants</span></a>
            
         </li>
         <li class='has-sub'><a href='mpsadmin'><span>Manual Discharge</span></a>
            
         </li>
		 <li class='has-sub'><a href='dischargeview'><span>Print Discharge Report</span></a>
            
         </li>
		 
      </ul>
	  
   </li>
   
   <li class='active has-sub'><a href='#'><span>Bed Management</span></a>
      <ul>
         <li class='has-sub'><a href='bedview'><span>All Bed Status</span></a>
            
         </li>
         <li class='has-sub'><a href='tes7'><span>Detail History</span></a>
            
         </li>
		          <li class='has-sub'><a href='tes77'><span>Detail History Episodewise</span></a>
            
         </li>

		 
      </ul>
	  
   </li>
   
   <li class='last'><a href='logout'><span>LOGOUT</span></a></li>
</ul>
</div>

<?php $number= $row87['COUNT(id)'] * 100 / $row88['COUNT(id)'] ;
$number1= round($number);
 ?>

<p align="center" class="style1">VIEW PANEL FOR INPATIENTS </p> 


   
   <!DOCTYPE html>
<html>
<head>
<style>
.grid-container {
  display: grid;
  grid-template-columns: auto auto auto auto auto auto;
  background-color: #2196F3;
  padding: 10px;
}
.grid-item {
  background-color: rgba(255, 255, 255, 0.8);
  border: 1px solid rgba(0, 0, 0, 0.8);
  padding: 20px;
  
  text-align: center;
}

.grid-item1 {
  background-color: red;
  border: 1px solid rgba(0, 0, 0, 0.8);
  padding: 20px;
  
  text-align: center;
}


.font1{
    font-family:serif;
	   font-size:30px;
}
.font2{
    font-family:sans-serif;
	   font-size:15px;
}
</style>
</head>
<body>


<form action="" method="post">
 
		
		
		<table>
											
						<tr>				
						
             		
					 
			    	 
					 <td colspan="3" align="right"><select name="bt">
        
												<option value=''>-Select Ward-</option>
												<option value='ALL'>ALL</option>
						<?php 
			$sql = "select distinct type from `bed` where status in('Occupied')";
			$res = mysqli_query($con, $sql);
			if(mysqli_num_rows($res) > 0) {
				while($row = mysqli_fetch_object($res)) {
					echo "<option value='".$row->type."'>".$row->type."</option>";
				}
			}
			?>
						
				
</select></td>  
					<td>	<button type="submit" name="bsearch" align="right">Search</button></td>
					<td>Select Cabin From Dropdown List&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>
					<td><a href="imoinview">    <strong>View All Patient</strong></a></td>
					 </tr>
</table>




 <?php
if(isset($_POST['bsearch'])){
$bt=$_REQUEST["bt"];
$user=$_SESSION["sess_username"];
$date= date('m/d/Y');

//$count=1;

	
//echo "<font color=blue font size=5> Patient View For Ward -";
//echo   $bt;

	
//$sel_query="Select * from bed where  status in ('occupied','Vacant') and type='$bt' order by status asc";	
	


//$result = mysqli_query($con,$sel_query);
//while($row = mysqli_fetch_assoc($result)) { ?>





<h1 style="background-color:powderblue;text-align:left;"><?php echo $bt;?></h1>  
<div class="grid-container">
  

  
<?php  

if($bt=='ALL'){
	
	echo "<font color=blue font size=5> ALL Patient List  -";


	
	
$sel_query="Select * from bed where status in ('occupied','Vacant') order by status asc";}

else{

$sel_query="Select * from bed where status in ('occupied','Vacant') and type='$bt'  order by status asc";}

$result = mysqli_query($con,$sel_query);
while($row = mysqli_fetch_assoc($result)) { ?>


<?php
$ss=$row['status'];
$id=$row['id'];
$url = "bededit_nurse?id=$id"; 
if($ss!='Vacant')
{
echo"
<div class='grid-item'>
<span class='font1'><a target='_blank' href='$url'>".$row["bno"]."</a></span><br><br>
<span class='font2'>".$row["pname"]."<br>
".$row["pmrn"]."<br>
".$row["dname"]."</span>
</div>";}
else
{
echo"
<div class='grid-item1'>
<span class='font1'><a target='_blank' href='$url'>".$row["bno"]."</a></span><br><br>
<span class='font2'>VACANT<br>
</span>
</div>";}

?>


<?php $count++; } }?>

</div>


</body>
</html>


</form>

</body>

</html>
