<?php 
    session_start();
    $role = $_SESSION['sess_userrole'];
    if(!isset($_SESSION['sess_username']) || $role!="staff"){
      header('Location: login2?err=2');
    }
?>

<?php
/*
Author: Javed Ur Rehman
Website: https://www.allphptricks.com/
*/
//session_start();
require('db1.php');
//include("auth.php");
 $user = $_SESSION['sess_username'];

 
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
   <script src="jsnew/jquery-latest.min.js" type="text/javascript"></script>
   <script src="script.js"></script>




</head>
<head>  
           <title>Webslesson Tutorial | PHP Ajax Update MySQL Data Through Bootstrap Modal</title>  
           <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>  
           <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />  
           <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>  
      </head>  

<script type="text/javascript">
function confirm_click1()
{
return confirm("Are you Sure to Approve this CME ?");
}

</script>
<body>
<div id='cssmenu'>
<ul>
   <li><a href='endohome'><span>Home</span></a></li>
      
		  		  
      <li class='last'><a href='logout'><span>LOGOUT</span></a></li>
</ul>
</div>





	
	
<link href='jsnew/fonts' rel='stylesheet' type='text/css'>
<form action="" method="POST">

<h1 align="center"style="background-color:lightgreen;">TRANING AND EDUCATION TOPIC </h1>
<!-- Form Title -->
        <table align="center" class="table table-bordered" id="dynamic_field">  
		


	


<tr bgcolor="#F08080">
       <th width="4%"><strong>S.No</strong></th>
      <th width="17%"><strong>Topic</strong></th>
      <th width="10%"><strong>Speaker Name</strong></th>
      <th width="15%"><strong>Date</strong>
      <th width="14%"><strong>Time</strong>   
      <th width="14%"><strong>Venue</strong>
	  <th width="14%"><strong>Audience</strong>
	  <th width="14%"><strong>Approve</strong>
		  

	   </tr>  
    <?php
	
	if($user=='1678' or $user=='322'){	
	
	 $sel_query="Select * from cme where status= 'pending' order by `date` DESC;";

$count=1;	 
$result = mysqli_query($con,$sel_query);



while($row = mysqli_fetch_assoc($result)) 
{ ?>    <tr>

      <td align="center" colspan="1"><?php echo $count; ?></td>
     
      <td align="center"><?php echo $row["topic"]; ?></a></td>
      <td align="center"><?php echo $row["speaker"]; ?>
	  <td align="center"><?php echo date('d/m/Y',strtotime($row["date"])); ?>
      <td align="center"><?php echo $row["time"]; ?>
      <td align="center"><?php echo $row["venue"]; ?>  
	  <td align="center"><?php echo $row["audience"]; ?>  
		  
		  
<td align="center"colspan="2"><a  onclick="return confirm_click1();" href="cmeapprove?id=<?php echo $row["id"]; ?>&topic=<?php echo $row['topic'];?>">Approve</td>  		

	  
      </tr>

	<?php $count++;  }}
	
	else {
	
	echo '<script language="javascript">';
    echo 'alert("Only Designated User Can Access this portal... Thank You !!"); ';
    echo '</script>';
	
	$url = "cmeportal";
	//header("Location: $url");
	
	header("Refresh: .1; URL=$url");
}
?>

  
</table>

</form>

</body>

</html>
