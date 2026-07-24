<?php 
    session_start();
    $role = $_SESSION['sess_userrole'];
    if(!isset($_SESSION['sess_username']) || $role!="nurse"){
      header('Location: login2?err=2');
    }
?>


<?php
/*
Author: Javed Ur Rehman
Website: https://www.allphptricks.com/
*/
//include("auth.php"); 
require('db1.php');

$user=$_SESSION["sess_username"];

//include("auth.php");
$pmrn=$_REQUEST['pmrn'];
$eid=$_REQUEST['eid'];

$db = mysqli_connect('localhost','root','Godiloveu16');
mysqli_select_db($db,'sfmmkpjnew');
$query4 = mysqli_query($db,"select * from inpatient where pmrn='$pmrn' and discharge='' and eid='$eid'");
$data = mysqli_fetch_assoc($query4);
$ward=$data['room'];
$bed1=$data['room1'];
$adoc=$data['adoc'];
$pname=$data['pname'];


  
?>



<?php 
require('db1.php');
if(isset($_POST['Submit1'])){
$medi1=$_REQUEST['medi1'];
$pdos=$_REQUEST['pdos'];


//$pmrn=$data1["pmrn"];
//$pname=$data1["pname"];
$date1 = date('m/d/Y');
$date2=date('d/m/Y');
//$id=$row1["id"];


$db = mysqli_connect('localhost','root','Godiloveu16');
mysqli_select_db($db,'sfmmkpjnew');
$sel1=mysqli_query($db,"SELECT * FROM storenew WHERE `ename`='$medi1';");
$result1 = mysqli_fetch_assoc($sel1);
$dcode=$result1["eid"];
$price=$result1["price"];
$priceold=$result1["priceold"];



//$sel9901="SELECT * FROM storenew WHERE `ename`='$medi1';";
//$result9901 = mysqli_query($con,$sel9901);
//$result2 = mysqli_fetch_assoc($con,$sel9901);
//$dcode=$result2['eid'];

$query3 = "SELECT * FROM inhoscharge where pmrn= '$pmrn' and eid='$eid' and date='$date1' and medi='$medi1'"; 
	 
$result3 = mysqli_query($con, $query3);

// Print out result

$query4 = "SELECT * FROM inhoscharge where pmrn= '$pmrn' and eid='$eid' and date='$date1'and medi='$medi1'"; 
	 
$result4 = mysqli_query($con, $query4);

$row3 = mysqli_fetch_array($result4);
$pdos1=$row3['pdos'];
$pdos2=$row3['pdos']+$pdos;
$p11=$price*$pdos;
$p12=$price*$pdos2;


$pp3=$pdos *$priceold;
$pp4=$pdos2*$priceold;


$sel990="SELECT * FROM storenew WHERE `ename`='$medi1';";
$result990 = mysqli_query($con,$sel990);


if($res990=mysqli_num_rows($result990)==0)
{
 	
       echo '<script language="javascript">';
    echo 'alert("Unsuccessful !!! The Item Name is not in the Database List.. Please contact with IT Department"); ';
    echo '</script>';
    }



else if($res90=mysqli_num_rows($result3)>0 and $price>0){
		
		
		$ins_query1="Update inhoscharge set pdos='$pdos2',price='$p12' where eid='$eid' and pmrn='$pmrn' and medi='$medi1'";
mysqli_query($con,$ins_query1) or die(mysql_error());
		
		
	}

  else if($res90=mysqli_num_rows($result3)<=0 and $price>0){
		
//else {
$ins_query1="insert into inhoscharge (`pmrn`,`pname`,`medi`,`eid`,`date`,`pdos`,`code`,`price`,`date1`) values ('$pmrn','$pname','$medi1','$eid','$date1','$pdos','$dcode','$p11','$date2')";
mysqli_query($con,$ins_query1) or die(mysql_error());}


else if($res90=mysqli_num_rows($result3)>0 and $price<=0){
		
		
  $ins_query1="Update inhoscharge set pdos='$pdos2',price='$pp4' where eid='$eid' and pmrn='$pmrn' and medi='$medi1'";
mysqli_query($con,$ins_query1) or die(mysql_error());
  
  
}

else if($res90=mysqli_num_rows($result3)<=0 and $price<=0){
  
//else {
$ins_query1="insert into inhoscharge (`pmrn`,`pname`,`medi`,`eid`,`date`,`pdos`,`code`,`price`,`date1`) values 
('$pmrn','$pname','$medi1','$eid','$date1','$pdos','$dcode','$pp3','$date2')";
mysqli_query($con,$ins_query1) or die(mysql_error());}

}
?>
<?php
/*
Author: Javed Ur Rehman
Website: https://www.allphptricks.com/
*/
if(isset($_POST['DELETE']))
{
require('db1.php');
$id=$_REQUEST['id'];
$query23 = "DELETE FROM alltest WHERE id=$id"; 
$result23 = mysqli_query($con,$query23) or die ( mysqli_error());
//header("Location: newtest2.php"); 
}
?>

<!DOCTYPE html>
<html lang="en" >

<head>
  <meta charset="UTF-8">
  <title>Medicine</title>
  
    <link rel="stylesheet" href="jsnew/normalize.min.css">

  
      <style>
      /* NOTE: The styles were added inline because Prefixfree needs access to your styles and they must be inlined if they are on local disk! */
      /* Stephonce R. MOrris | 2014 */

html { box-sizing: border-box; }

*, *:before, *:after {
  -moz-box-sizing: border-box;
  -webkit-box-sizing: border-box;
  box-sizing: border-box;
}

body {
  font-family: 'Nunito',sans-serif;
  color: #384047;
  background: #A085C6;
}

form {
  max-width: 300px;
  margin: 10px auto;
  padding: 10px 20px;
  background: #f4f7f8;
  border-radius: 8px;
  border: 1px solid #8265B0;
  box-shadow: 3px 3px 3px rgba(0,0,0,0.2)
}

h1 {
  margin: 0 0 30px 0;
  text-align: center;
}

input[type="text"],
input[type="password"],
input[type="date"],
input[type="datetime"],
input[type="email"],
input[type="number"],
input[type="search"],
input[type="tel"],
input[type="time"],
input[type="url"],
textarea,
select {
  background: rgba(255,255,255,0.1);
  border: none;
  font-size: 16px;
  height: auto;
  margin: 0;
  outline: 0;
  padding: 15px;
  width: 100%;
  background-color: #e8eeef;
  color: #8a97a0;
  box-shadow: 0 1px 0 rgba(0,0,0,0.03) inset;
  margin-bottom: 30px;
}


input[type="radio"],
input[type="checkbox"] {
  margin: 0 4px 8px 0;
}

select {
  padding: 6px;
  height: 32px;
  border-radius: 2px;
}



fieldset {
  margin-bottom: 30px;
  border: none;
}

legend {
  font-size: 1.4em;
  margin-bottom: 10px;
}

label {
  display: block;
  margin-bottom: 8px;
}

label.light {
  font-weight: 300;
  display: inline;
}

.number {
  background-color: #A085C6;
  /*#5fcf80*/
  color: #fff;
  height: 30px;
  width: 30px;
  display: inline-block;
  font-size: 0.8em;
  margin-right: 4px;
  line-height: 30px;
  text-align: center;
  text-shadow: 0 1px 0 rgba(255,255,255,0.2);
  border-radius: 100%;
}

abbr[title] {
	border-bottom-width: 0;
}


@media screen and (min-width: 480px) {

  form {
    max-width: 1200px;
  }

}


      </style>

    <script src="jsnew/prefixfree.min.js"></script>



<link rel="stylesheet" href="jsnew/jquery-ui.css">
<script src="jsnew/jquery.min.js"></script>
<script src="jsnew/jquery-ui.min.js"></script>
  
 <script type="text/javascript">
	jQuery(function() {		
		var date = new Date();
		var currentMonth = date.getMonth();
		var currentDate = date.getDate();
		var currentYear = date.getFullYear();
		
		$('#datepicker').datepicker({
			minDate: new Date(currentMonth, currentDate,currentYear),
			maxDate: new Date(currentMonth, currentDate,currentYear)
		});
	});
</script>




  <style type="text/css">
<!--
.style1 {font-weight: bold}
-->
  </style>
  
  <head>
    <title>Investigation</title>
    <link rel="stylesheet" href="jsnew/bootstrap.min.css" />  
    <script src="jsnew/jjquery.min.js"></script>
    <script src="jsnew/bootstrap.min.js"></script>

    <link href="jsnew/jquery-ui.css" rel="stylesheet" />
    <link href="./jquery.multiselect.css" rel="stylesheet" />
    <script src="jsnew/jquery-1.12.4.js"></script>
    <script src="jsnew/jquery-ui.js"></script>
    <script src="./jquery.multiselect.js"></script>


 <script>
  $(document).ready(function() {
    $("#datepicker").datepicker();
  });
  </script>



  <link rel="stylesheet" href="styles.css">

   <script src="script.js"></script>
   <script>
function goBack() {
    window.history.back();
}
</script>


</head>
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
         <li class='has-sub'><a href='discharge'><span>Manual Discharge</span></a>
            
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




  <!-- Stephonce R. MOrris | 2014 -->

<!-- Google Font -->
		<link href='jsnew/fonts' rel='stylesheet' type='text/css'>


<form action="" method="post">
        <table align="center" class="table table-bordered" id="dynamic_field"> 
<tr><td colspan="20" align="center"bgcolor="lightgreen"><label><strong>ADD HOSPITAL CHARGES</strong></label></td> </tr>
<tr><td colspan="15" align="center"><label><strong>Select Used Items</strong></label></td> 
<td colspan="5" align="center"><label><strong>Select Used QTY</strong></label></td> 


</tr>
<tr>
<td colspan="15" align="center"><input list="browsers2" name="medi1" size=60%  class="form-control" autocomplete="off" required/>
  <datalist id="browsers2">

						<option value=''>-Select Items</option>
				<?php 
			$sql76 = "select * from `storenew`";
			$res76 = mysqli_query($con, $sql76);
			if(mysqli_num_rows($res76) > 0) {
				while($row76 = mysqli_fetch_object($res76)) {
					echo "<option value='".$row76->ename."'>".$row76->ename." - ".$row76->uom."</option>";
					
				}
			}
			?>  </datalist></td>
			
			<td  colspan="5"align="center"><input list="browsers11" name="pdos" class="form-control">
  <datalist id="browsers11">

						<option value=''>-Select Quantity-</option>
				 </datalist>
</td>



</tr>			        

<tr>
		<td colspan="20"align="right"><button type="submit" name="Submit1">ADD</button></td>
	  
</tr>
<tr>
      <td colspan="1" align="center"><strong>S.No</strong></td>
     
      <td colspan="2" align="center"><strong>MRN</strong></td>
     	  <td colspan="5" align="center"><strong>ITEM</strong></td>
		  <td colspan="5" align="center"><strong>date</strong></td>
      	  <td colspan="5" align="center"><strong>QTY</strong></td>
		        	  <td colspan="2" align="center"><strong>DELETE</strong></td>
       

	   </tr>
 <?php
	
$user=$_SESSION["sess_username"];
$pmrn=$_REQUEST["pmrn"];
$eid=$_REQUEST["eid"];
//$dname=$_REQUEST["dname"];
//$id1=$_REQUEST["ID"];

//$id=$_REQUEST["id"];
//$episode=$data59["eid"];

$count=1;
$sel_query="Select * from inhoscharge where pmrn= '$pmrn' and eid='$eid' order by `date` DESC;";

$result = mysqli_query($con,$sel_query);

while($row = mysqli_fetch_assoc($result)) 
{ ?>    <tr>

      <td align="center" colspan="1"><?php echo $count; ?></td>

      <td align="center"colspan="2"><?php echo $row["pmrn"]; ?></td>
	        <td align="center"colspan="5"><?php echo $row["medi"]; ?></td>
			<td align="center"colspan="5"><?php echo $row["date"]; ?></td>
					<?php
						
						$rrt=$row['code'];
						$query4p = mysqli_query($db,"select * from storenew where eid='$rrt'");
						$datap = mysqli_fetch_assoc($query4p);
						$uom=$datap['uom'];

						
						?>
			
				        <td align="center"colspan="5"><?php echo $row["pdos"].' ('.$uom.')'; ?></td>
						
				
			      
				 <td align="center" colspan="2"><a href="inhosdelete?id3=<?php echo $row["id"]; ?>&pmrn=<?php echo "$pmrn"; ?>&eid=<?php echo "$eid"; ?>">DELETE</a></td>

  	  

	  
      </tr>
    <?php $count++; } ?>
	<tr><td align="right" colspan="20"><button onclick="self.close()">Close</button></td></tr>
</table>
</form>
</body>

</html>
