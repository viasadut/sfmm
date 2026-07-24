<?php 
    session_start();
    $role = $_SESSION['sess_userrole'];
    if(!isset($_SESSION['sess_username']) || $role!="pharmacy"){
      header('Location: login2?err=2');
    }
?>



<?php
$url1=$_SERVER['REQUEST_URI'];
//header("Refresh: 5; URL=$url1");
$pmrn=$_REQUEST['pmrn'];
$eid=$_REQUEST['eid'];
$dname=$_REQUEST['dname'];
?>

<?php
/*
Author: Javed Ur Rehman
Website: https://www.allphptricks.com/
*/

require('db1.php');
//include("auth.php");

/*$query = "SELECT * from pmedi where id='".$id."'"; 
$result = mysqli_query($con, $query) or die ( mysqli_error());
$row = mysqli_fetch_assoc($result);
*/
if(isset($_POST['GO'])){
//$rr =$_REQUEST['rr'];
$update="update pmedi set `status`='$rr' where `id`='".$id."'";
mysqli_query($con,$update) or die(mysql_error());
}


?>

<?php

if(isset($_POST['btnDelete']))

if(empty($_REQUEST['chkDel']))
{
	echo '<script language="javascript">';
    echo 'alert("Unsuccessful !!! No Row Selected!!"); ';
    echo '</script>';
	
}
else {
$objConnect = mysql_connect("localhost","root","Godiloveu16") or die("Error Connect to Database");
$objDB = mysql_select_db("sfmmkpjnew");

	for($i=0;$i<count($_POST["chkDel"]);$i++)
	{
		if($_POST["chkDel"][$i] != "")
		{
			$strSQL = "UPDATE imedi2 set pstatus='Served', puser='$user', pdate='$pdate' ";
			$strSQL .="WHERE id = '".$_POST["chkDel"][$i]."' ";
			$objQuery = mysql_query($strSQL);
		}
	}

	echo '<script language="javascript">';
    echo 'alert("Successfully Updated !!"); ';

    echo '</script>';

mysql_close($objConnect);
}
?>




<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<title>View Records</title>
<link rel="stylesheet" href="css/style2.css">

<meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
  
  
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
  font-size: 8px;
  text-align: center;
  font-style: normal;
  border-radius: 5px;
  width: 30%;
  border: 1px solid #8265B0;
  /*#3ac162*/
  border-width: 1px 1px 3px;
  box-shadow: 0 -1px 0 rgba(255,255,255,0.1) inset;
  margin-bottom: 10px;
}

</style>
   <link rel="stylesheet" href="styles.css">
   
   
   <script type="text/javascript">
function confirm_click1()
{
return confirm("Are you Sure to Add The Medicine for Tomorrow?");
}

</script>
</head>
<body>
<div id='cssmenu'>
<ul>
   <li><a href='tes'><span>Home</span></a></li>
   <li class='active has-sub'><a href='#'><span>Prescription</span></a>
      <ul>
         <li class='has-sub'><a href='tes'><span>OPD Prescription</span></a>
            
         </li>
         <li class='has-sub'><a href='pharinview'><span>IPD Prescription</span></a>
            
         </li>
      </ul>
   </li>
   
      <li class='active has-sub'><a href='#'><span>Reports</span></a>
      <ul>
         <li class='has-sub'><a href='preview'><span>Print Previous Prescription</span></a>
            
         </li>
		 <li class='has-sub'><a href='tes5'><span>Prescription Status Wise Report </span></a>
            
         </li>
         <li class='has-sub'><a href='tes6'><span>Consultant Wise Report</span></a>
            
         </li>
		 <li class='has-sub'><a href='tesaudit'><span>All Consultant Prescription Report</span></a>
            
         </li>
      </ul>
   </li>
      <li class='last'><a href='imoinviewphar'><span>Inpatient</span></a></li>
	  <li class='last'><a href='categoryphar'><span>Categorywise Medicine</span></a></li>
	  <li class='last'><a href='addmedicine'><span>Add Medicine</span></a></li>
      <li class='last'><a href='logout'><span>LOGOUT</span></a></li>
</ul>
</div>


<p align="center" class="style1">WelCome To Pharmacy Module </p> 
<form action="" method="GET">

  
    <?php
	
$user=$_SESSION["sess_username"];
$date= date('m/d/Y');
//$id =$_GET['id'];
$count=1;

$objConnect = mysql_connect("localhost","root","Godiloveu16") or die("Error Connect to Database");
$objDB = mysql_select_db("sfmmkpjnew");
$strSQL = "select * from pmedi where pmrn='$pmrn' and dname='$dname' and eid='$eid'";
$objQuery = mysql_query($strSQL) or die ("Error Query [".$strSQL."]");
?>
<table width="100%" height ="100%" border="1" align="center" bgcolor="#FFFF99" style="border-collapse:collapse;">
  
    



    <tr>
      <th width="4%"><strong>S.No</strong></th>
      <th width="17%"><strong>Patient's Name</strong></th>
      <th width="10%"><strong>MRN</strong></th>
      <th width="15%"><strong>Appointment Date </strong>
      <th width="14%"><strong>Doctor's Name</strong>   
	        <th width="14%"><strong>ID</strong>   
      <th width="14%"><strong>UPDATE</strong>
      <th width="14%"><strong>PRINT</strong>

	   </tr>
  </thead>
  <tbody>
<?php
$i = 0;
while($row = mysql_fetch_array($objQuery))
{
$i++;

?>


    <tr>

      <td align="center"><?php echo $count; ?></td>
      <td align="center"><?php echo $row["pname"]; ?></td>
      <td align="center"><?php echo $row["pmrn"]; ?></td>

      <td align="center"><?php echo $row["medi"]; ?></td>
	  <td align="center"><?php echo $row["id"]; ?></td>
	   
	  <td align="center"><a onclick="return confirm_click1();" href="phsttest2?mname=<?php echo $row["medi"]; ?>&pmrn=<?php echo $row["pmrn"]; ?>&eid=<?php echo $row["eid"]; ?>&pmrn=<?php echo $row["pmrn"]; ?>">UPDATE</a></td>

<td align="center"colspan="5"><input type="text" name="sell[]" id="sell<?php echo $i;?>" value="<?php echo $row["id"];?>";></td> 
<td align="center" colspan="2"><a data-target="#myModal" data-toggle="modal" class="MainNavText" id="MainNavHelp" href="#myModal?pmrn=<?php echo $row["pmrn"]; ?>&dname=<?php echo $row["dname"]; ?>&eid=<?php echo $row["eid"]; ?>&pname=<?php echo $row["pname"]; ?>&medi=<?php echo $row["medi"]; ?>&test=<?php echo $row["id"]; ?>">ADD</a>


<div class="container">
  

  <!-- Modal -->
  <div class="modal fade" id="myModal" role="dialog">
    <div class="modal-dialog">
    
      <!-- Modal content-->
      <div class="modal-content">
    <?php

if(isset($_POST['ADD'])){
	$id=$_REQUEST['id']; 

	$db = mysqli_connect('localhost','root','Godiloveu16');
mysqli_select_db($db,'sfmmkpjnew');
$query4 = mysqli_query($db,"select * from pmedi where id='$id'");
$data = mysqli_fetch_assoc($query4);
$medi=$data['medi'];
echo $id;}?>

        <div class="modal-body">
          <input type="text" name="se" id="" value=""> 
		  <input type="text" name="sellhghj" id="" value="<?php echo $id;?>"> 
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        </div>
      </div>
      
    </div>
  </div>
  
</div>


</td>











<td><button type="button" class="btn btn-info btn-lg" data-toggle="modal" data-target="#myModal">Open Modal</button>




</td>

<?php 
$medi=$row['medi'];

$query4=mysqli_query($con,"select qty from medicine where mname='$medi'");
$data = mysqli_fetch_assoc($query4);
$qty=$data['qty'];
?>	
	  
<td align="center"><?php echo $qty; ?></td>


      </tr>
	  
    <?php $count++; } ?>

  </tbody>
</table>

<?php echo $qty;?>
</form>
</body>
</html>
