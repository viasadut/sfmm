<?php 
    session_start();
    require('db1.php');
	$role = $_SESSION['sess_userrole'];
	
	$queryc = "SELECT COUNT(utype) FROM user where '$role' in ('doctor','rad','mng','outdoc')"; 
$resultc = mysqli_query($con, $queryc) or die(mysqli_error());
$rowc = mysqli_fetch_array($resultc);
$c1=$rowc['COUNT(utype)'];
	
    if(!isset($_SESSION['sess_username']) || $c1==0){
      header('Location: login2?err=2');
    }
?>
<?php
$url1=$_SERVER['REQUEST_URI'];
//header("Refresh: 30; URL=$url1");
 $test=date('Y-m-d', strtotime('-30 days') );
 $test1=date('Y-m-d');
 
 $tt=$_SERVER['HTTP_HOST']	;
?>



<?php
/*
Author: Javed Ur Rehman
Website: https://www.allphptricks.com/
*/
//session_start();
require('db1.php');
//include("auth.php");
$fullname = $_SESSION['sess_username'];
$query39 = "SELECT * FROM user where uname= '$fullname'"; 
	 
$result39 = mysqli_query($con, $query39) or die(mysqli_error());

// Print out result
$row39 = mysqli_fetch_array($result39);
$full = $row39['fullname'];
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
button {
  padding: 19px 39px 18px 39px;
  color: #FFF;
  background-color: #A085C6;
  /*#4bc970*/
  font-size: 18px;
  text-align: center;
  font-style: normal;
  border-radius: 5px;
  width: 100%;
  height: 5%
  border: 1px solid #8265B0;
  /*#3ac162*/
  border-width: 1px 1px 3px;
  box-shadow: 0 -1px 0 rgba(255,255,255,0.1) inset;
  margin-bottom: 10px;
}
</style>


   <link rel="stylesheet" href="styles.css">
   <script src="jsnew/jquery-latest.min.js" type="text/javascript"></script>
   <script src="script.js"></script>


<script type="text/javascript">
function confirm_click()
{
return confirm("Are you Sure to Confirm this Request ?");
}

</script>

</head>


<body>


<div id='cssmenu'>
<ul>
   <li><a href='outside_doc'><span>Home</span></a></li>
      
      <li class='last'><a href='logout'><span>LOGOUT</span></a></li>
</ul>
</div>







<p align="center" class="style1">!! WELCOME !! <?php echo $fullname; ?>'s Dash Board </p> 


								
					
<table width="100%" height ="100%" border="1" align="center" bgcolor="#FFFF99" style="border-collapse:collapse;">


    
    <tr>
      <th width="4%"><strong>S.No</strong></th>
      <th width="17%"><strong>Patient's Name</strong></th>
	        <th width="14%"><strong>Date</strong> 
      <th width="10%"><strong>MRN</strong></th>
	  <th width="10%"><strong>Investigation Name</strong></th>
	  <th width="10%"><strong>Instruction</strong></th>
	  

      <th width="14%"><strong>Reffered From</strong>
	  <th width="14%" style="color:red; font-weight:bold"><strong>Short History</strong>
      
      

	  <th width="14%" ><strong>PACS VIEW</strong>
	        <th width="14%"><strong>REPORT</strong>
	  



	   </tr>
  </thead>
  <tbody>
  
    
	<?php
	
$user=$_SESSION["sess_username"];
$date= date('Y-m-d');
//$id =$_GET['id'];
$count=1;
$sel_query="Select * from ecg_test where datenew between '$test' and '$date' and status1='Updated' and con_by='' and dname1='$full' and pstatus='' and ron='ECG' order by id desc;";

$result = mysqli_query($con,$sel_query);
while($row = mysqli_fetch_assoc($result)) { ?>
    <tr>

      <td align="center"><?php echo $count; ?></td>
      <td align="center"><?php echo $row["pname"]; ?></td>
      <td align="center"><?php echo $row["pmrn"]; ?></td>

      <td align="center"><?php echo $row["date1"]; ?></td>
	  <td align="center"><?php echo $row["ron"]; ?></td>
	  	  <td align="center"><?php echo $row["location"]; ?></td>
	  	   <td align="center"><a target='_blank' href="ecg_pdf1?id=<?php echo $row["id"]; ?>&pmrn=<?php echo $row["pmrn"]; ?>">Report</a></td>
		   
		   
		   <td align="center"align="center">
	  
	  <?php 
	  
	  if($row['status1']!='updated'){echo'
	  <a href="spd_report_edit_doc_new?id='.$row["id"].'&pmrn='.$row["pmrn"].'&loc='.$row["location"].'&lid='.$row["lid"].'">Edit/Confirm</a>';
	  }
	  else{echo "Report Already Confirmed ";}
	  ?>
	  
	  </td>
	  
	  <td align="center"><a target='_blank' class="thumbnail fancybox" rel="ligthbox" href="spdpic/<?php echo $row['upload'] ?>">
                        
                        <div class='text-center'>
                            <small class='text-muted'><?php echo $row['upload'] ?></small>
                        </div> <!-- text-center / end -->
                    </a></td>
 

 
   
	  

      </tr>
    <?php $count++; } ?>	
  </tbody>
</table>

<br><br>





</body>

</html>
