<?php 
   session_start();
    require('db1.php');
	$role = $_SESSION['sess_userrole'];
	
	$queryc = "SELECT COUNT(utype) FROM user where '$role' in ('billin','bill')"; 
$resultc = mysqli_query($con, $queryc) or die(mysqli_error());
$rowc = mysqli_fetch_array($resultc);
$c1=$rowc['COUNT(utype)'];
	
    if(!isset($_SESSION['sess_username']) || $c1==0){
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

$appdate=date('Y-m-d');
$db = mysqli_connect('localhost','root','Godiloveu16');
mysqli_select_db($db,'sfmmkpjnew');

$user=$_SESSION["sess_username"];
//$eid=$_REQUEST['eid'];
$date77=date('Y-m-d');
$pdate=date('Y-m-d'); 
$pdate1=date('Y-m-d H:i:s');  
//include("auth.php");
$pmrn=$_REQUEST['pmrn'];
$eid=$_REQUEST['eid'];
$id=$_REQUEST['id'];
$bill=$_REQUEST['bill'];

$db = mysqli_connect('localhost','root','Godiloveu16');
mysqli_select_db($db,'sfmmkpjnew');

$query4 = mysqli_query($db,"select * from inpatient where pmrn='$pmrn' and eid='$eid'");
$data = mysqli_fetch_assoc($query4);
//$ddd=$data['dname'];
$pname=$data['pname'];
$adoc=$data['adoc'];
$hos1_dis=$data['hos1_dis'];


$query45 = mysqli_query($db,"select * from doctor where dname='$adoc' and status='Active'");
$data5 = mysqli_fetch_assoc($query45);
//$ddd=$data['dname'];
$sid=$data5['sid'];
$dsign=$sid.'.jpg'

/*
$query5 = mysqli_query($db,"select * from patient where ID='$id'");
$data1 = mysqli_fetch_assoc($query5);
$bdate=$data1['bdate'];
$dd=date('d-m-Y',strtotime($data1['bdate']));
$dd2=date_create($dd);
*/




  
?>

<?php
$username = "root";
$password = "Godiloveu16";
$hostname = "localhost"; 

//connection to the database
$dbhandle = mysqli_connect($hostname, $username, $password) 
 or die("Unable to connect to MySQL");
//echo "Connected to MySQL<br>";

//select a database to work with
$selected = mysqli_select_db($dbhandle,"sfmmkpjnew") 
  or die("Could not select examples");

  
//echo $test1;


?>




<?php 
require('db1.php');
if(isset($_POST['Submit1'])){
$hits_id=$_REQUEST['item'];
$pdos=$_REQUEST['pdos'];
$price=$_REQUEST['price'];
$in_price=$_REQUEST['price']+$hos1_dis;

//$pmrn=$data1["pmrn"];
//$pname=$data1["pname"];
$date1 = date('m/d/Y');
$date2=date('Y-m-d');
//$id=$row1["id"];


$db = mysqli_connect('localhost','root','Godiloveu16');
mysqli_select_db($db,'sfmmkpjnew');
$sel1=mysqli_query($db,"SELECT * FROM hits_list WHERE `id`='$hits_id';");
$result1 = mysqli_fetch_assoc($sel1);
$medi1=$result1['item_name'];

$parts = explode('-', $medi1);
$only = trim(end($parts));

$dcode=$result1['code'];


$sel2=mysqli_query($db,"SELECT * FROM acct_master_new WHERE `item_code`='$dcode';");
$result2 = mysqli_fetch_assoc($sel2);
if($result2['tb_ip']==''){

  $tb_data=$result2['tb_op'];
}
else if($result2['tb_ip']!=''){

  $tb_data=$result2['tb_ip'];
}



//$sel9901="SELECT * FROM storenew WHERE `ename`='$medi1';";
//$result9901 = mysqli_query($con,$sel9901);
//$result2 = mysqli_fetch_assoc($con,$sel9901);
//$dcode=$result2['eid'];

$query3 = "SELECT * FROM hos_discount where pmrn= '$pmrn' and eid='$eid' and date='$date1' and medi='$medi1' and location='IPD' and delete_status='0'"; 
	 
$result3 = mysqli_query($con, $query3);

// Print out result

$query4 = "SELECT * FROM hos_discount where pmrn= '$pmrn' and eid='$eid' and date='$date1'and medi='$medi1' and location='IPD' and delete_status='0'"; 
	 
$result4 = mysqli_query($con, $query4);

$row3 = mysqli_fetch_array($result4);
$pdos1=$row3['pdos'];
$pdos2=$row3['pdos']+$price;
$p11=$price*$pdos;
$p12=$price*$pdos2;


/*$sel990="SELECT * FROM storenew WHERE `ename`='$medi1';";
$result990 = mysqli_query($con,$sel990);


if($res990=mysqli_num_rows($result990)==0)
{
 	
       echo '<script language="javascript">';
    echo 'alert("Unsuccessful !!! The Item Name is not in the Database List.. Please contact with IT Department"); ';
    echo '</script>';
    }



else if($res90=mysqli_num_rows($result3)>0){
	
		


$ins_query1="Update ipd_extra_charge set pdos='$pdos2',price='$p12',add_user='$user',add_time='$time' where eid='$eid' and pmrn='$pmrn' and medi='$medi1'";
mysqli_query($con,$ins_query1) or die(mysql_error());
		
		
	}

*/
		
if($user!='' and $medi1=='DD Fund'){

  $adate2= date('d/m/Y H:i:s');
  $drsend=date('Y-m-d');

  $queryd = "SELECT * FROM diap where pmrn= '$pmrn' and  eid='$eid' order by id DESC limit 1"; 
	 
$resultd = mysqli_query($con, $queryd) or die(mysqli_error());

// Print out result
$rowd = mysqli_fetch_array($resultd);
$inves=$rowd['inves'];




$ins_query1="insert into hos_discount (`pmrn`,`pname`,`medi`,`eid`,`date`,`pdos`,`code`,`price`,`date1`,`add_user`,`add_time`,`dname`,`location`,`medi1`) values 
('$pmrn','$pname','$medi1','$eid','$date1','$price','$dcode','$price','$date2','$user','$time','$adoc','IPD','$only')";
mysqli_query($con,$ins_query1) or die(mysql_error());


$ins_query2="update inpatient set hos1_dis='$in_price' where pmrn='$pmrn' and eid='$eid'";
mysqli_query($con,$ins_query2) or die(mysql_error());

$ins_query6="update preadm set dia1='$inves',cinfo='Improving',ddin='$adate2',ddrequest='Request',arequest='$price',aid='$sid',drsend='$drsend',dsign='$dsign' where pmrn='$pmrn' and eid='$eid'";
mysqli_query($con,$ins_query6) or die(mysql_error());




$date=date('Y-m-d');
$ins_query3="insert into pms_tb (`trans_id`,`trans_type`,`acct_code`,`date`,`amount`,`location`) 
  values ('$pmrn','DR','$tb_data','$date','$price','IPD DISCOUNT')";
  mysqli_query($con,$ins_query3) or die(mysql_error());


  $ins_query4="insert into pms_tb (`trans_id`,`trans_type`,`acct_code`,`date`,`amount`,`location`) 
  values ('$pmrn','CR','111999','$date','$price','IPD DISCOUNT')";
  mysqli_query($con,$ins_query4) or die(mysql_error());


}



else if($user!='' and $medi1!='DD Fund'){
  $ins_query1="insert into hos_discount (`pmrn`,`pname`,`medi`,`eid`,`date`,`pdos`,`code`,`price`,`date1`,`add_user`,`add_time`,`dname`,`location`,`medi1`) values 
  ('$pmrn','$pname','$medi1','$eid','$date1','$price','$dcode','$price','$date2','$user','$time','$adoc','IPD','$only')";
  mysqli_query($con,$ins_query1) or die(mysql_error());

  $ins_query2="update inpatient set hos1_dis='$in_price' where pmrn='$pmrn' and eid='$eid'";
  mysqli_query($con,$ins_query2) or die(mysql_error());


  $date=date('Y-m-d');
$ins_query3="insert into pms_tb (`trans_id`,`trans_type`,`acct_code`,`date`,`amount`,`location`) 
  values ('$pmrn','DR','$tb_data','$date','$price','IPD DISCOUNT')";
  mysqli_query($con,$ins_query3) or die(mysql_error());


  $ins_query4="insert into pms_tb (`trans_id`,`trans_type`,`acct_code`,`date`,`amount`,`location`) 
  values ('$pmrn','CR','111999','$date','$price','IPD DISCOUNT')";
  mysqli_query($con,$ins_query4) or die(mysql_error());


  }

else {
	
	echo"safs";
}
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
$query23 = "DELETE FROM  WHERE id=$id"; 
$result23 = mysqli_query($con,$query23) or die ( mysqli_error());
//header("Location: newtest2.php"); 
}
?>

<!DOCTYPE html>
<html lang="en" >

<head>

  <meta charset="UTF-8">
  <title>Sign Up Form</title>
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
}
</script>




  <style type="text/css">
<!--
.style1 {font-weight: bold}
-->
  </style>
  
  <head>
    <title>PHP - Dynamically Add or Remove input fields using JQuery</title>
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
 
<script type="text/javascript">
        window.history.forward();
        function noBack() {
            window.history.forward();
        }
    </script>

</head>
</head>

<body>

<div id='cssmenu'>
<ul>
   <li><a href='ipall_new_1_new_0_new1?pmrn=<?php echo $pmrn;?>&eid=<?php echo $eid;?>'><span>Home</span></a></li>
   
   
   <li class='last'><a href='logout'><span>LOGOUT</span></a></li>
</ul>
</div>




  <!-- Stephonce R. MOrris | 2014 -->

<!-- Google Font -->
		<link href='jsnew/fonts' rel='stylesheet' type='text/css'>

<form action="" method="post" name="rtr">
<!-- Form Title -->
        <table align="center" class="table table-bordered" id="dynamic_field">  
		
				<tr>
					<td colspan="6"><label><strong>Doctors's Name :</strong></label></td>
					<td colspan="6"><label><strong>Patient's Name :</strong></label></td>
					<td colspan="4"><label><strong>Patient's MRN:</strong></label></td>
					<td colspan="4"><label><strong>Patient's Episode:</strong></label></td>

										<input type="hidden" name="new" value="1" />	
				</tr>
				
				<tr>	  
				<td colspan="6">
  <select id="browsers10" name="dname">
			        
					<option value='<?php echo $data['adoc'];?>'selected><?php echo $data['adoc'];?></option>
			</select></td>
				<td colspan="6"><?php echo $data['pname']; ?></td>
				<td colspan="4"><?php echo $data['pmrn']; ?></td>
				<td colspan="4"><?php echo $data['eid']; ?> </td>	
												
						
				
</tr>
						

						
						
					


				

<tr><td colspan="20" align="center"bgcolor="lightgreen"><label><strong>Investigation Form</strong></label></td> </tr>
<tr><td colspan="10" align="center"><label><strong>Investigation</strong></label></td> 

<td colspan="10" align="center"><label><strong>Amount</strong></label></td> 
</tr>
<tr>
<td colspan="10" align="center">

<select name="item" class="con_charge21" id="con_charge1" onchange="GetDetail(this.value)">


  

						<option value=''>---Select--</option>
                        
            <option value='DD Fund'>DD Fund</option>
				<?php 
			$sql = "select * from `hits_list` where item_name LIKE '%discount%'";
			$res = mysqli_query($con, $sql);
			if(mysqli_num_rows($res) > 0) {
				while($row = mysqli_fetch_object($res)) {
					echo "<option value='".$row->id."'>".$row->item_name."</option>";
				}
			}
			?>
      			
      </select>
			
			
      <script>
        $(document).ready(function(){

            $("#con_charge1").select2({
                
            });
        });

        </script>
				
			<link rel="stylesheet"
			href=
"jsnew/chosen.min.css" />

		<!--These jQuery libraries for select2
			need to be included-->
		<script src=
"jsnew/select2.min.js">
	</script>
		<link rel="stylesheet"
			href=
"jsnew/select2.min.css" />			
			<script>
$(document).ready(function() {
    $('.con_charge1_test').select2();
});
</script>
					
			</td>

			
			
<td colspan="10" align="center"><input type="number" name="price" value="" id="remarks" required >
<input  name="bar"  id="bar" type="hidden" value="<?php echo date('dmYs');?>">



</td>


</tr>			        

		
		<td colspan="20"align="right"><button type="submit" name="Submit1">Confirm</button></td>
	  
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
$sel_query="Select * from hos_discount where pmrn= '$pmrn' and eid='$eid' and delete_status='0' order by `date` DESC;";

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
			
				        <td align="center"colspan="5"><?php echo $row["pdos"]; ?></td>
						
				
			      
				 <td align="center" colspan="2"><a href="discount_charge_delete_ipd?id3=<?php echo $row["id"]; ?>&pmrn=<?php echo "$pmrn"; ?>&eid=<?php echo "$eid"; ?>&price=<?php echo $row['price']; ?>">DELETE</a></td>
         

  	  

	  
      </tr>
    <?php $count++; } ?>
	<tr><td align="right" colspan="20"><button onclick="self.close()">Close</button></td></tr>
</table>
</form>
</body>

</html>
