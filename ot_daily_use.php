<?php 
    session_start();
    $role = $_SESSION['sess_userrole'];
    if(!isset($_SESSION['sess_username']) || $role!="ot"){
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
$id=$_REQUEST['id'];
$pmrn=$_REQUEST['pmrn'];
//$full=$_REQUEST['dreffer'];
//$eid=$_REQUEST['eid'];
//$ieid=$_REQUEST['ieid'];
//$type=$_REQUEST['type'];


//include("auth.php");
$pmrn=$_REQUEST['pmrn'];
$db = mysqli_connect('localhost','root','Godiloveu16');
mysqli_select_db($db,'sfmmkpjnew');
$sel9=mysqli_query($db,"SELECT * FROM ot WHERE `id`='$id'");
$result9 = mysqli_fetch_assoc($sel9);
$pname=$result9["pname"];
//$eid=$result9["eid"];
$ot_charge=$result9['ot_charge_status'];    
?>




<?php 
require('db1.php');
if(isset($_POST['Submit1'])){
$rfid=$_REQUEST['medi1'];
$pdos=$_REQUEST['pdos'];
$tqty=$_REQUEST['tqty'];

$route=$_REQUEST['route'];
$remarks=$_REQUEST['remarks'];
$location=$_REQUEST['location'];



/*$treat=explode(',',$medi12);
	
	$medi1=$treat[0];
	$rfid=$treat[1];

*/

//$pmrn=$data1["pmrn"];
//$pname=$data1["pname"];
$date1 = date('m/d/Y');
//$id=$row1["id"];

$sel96="SELECT * FROM medi_stock WHERE `sno`='$rfid';";
$result96 = mysqli_query($con,$sel96);
$b_chk_m=mysqli_fetch_assoc($result96);
$mm_qty=$b_chk_m['add_qty'];
$m_qty1=$b_chk_m['add_qty']-$pdos;
	 
$tfid=$b_chk_m['rfid'];
$g_name=$b_chk_m['g_name'];
$bb_name=$b_chk_m['b_name'];
$u_price=$b_chk_m['u_price'];
$adate= date('Y-m-d');
$code=$b_chk_m['code'];
$medi1=$b_chk_m['g_name'];	 



$sel9=mysqli_query($db,"SELECT * FROM othoscharge1 where pmrn= '$pmrn' and eid='$id' and code='$code' and rfid='$rfid' and ndate='$adate'");
$result9 = mysqli_fetch_assoc($sel9);
$pdos1=$result9['pdos'];
$pdos2=$result9['pdos']+$pdos;
$iid=$result9['id'];

$sel990="SELECT * FROM medi_stock WHERE `sno`='$rfid' and add_qty>0  and status='Served';";
$result990 = mysqli_query($con,$sel990);

$sel95 = "SELECT * from medicine where code='$code' and c_code=''"; 
$result95 = mysqli_query($con,$sel95);
$charge_code = mysqli_fetch_assoc($con,$result95);

//$c_code=$charge_code['c_code'];*/

$qq1 = mysqli_query($db,"select * from medicine where code='$code' and status='Active'");
			$dd1 = mysqli_fetch_assoc($qq1);
			$c_code=$dd1['c_code'];







if($res990=mysqli_num_rows($result990)==0)
{
 	
       echo '<script language="javascript">';
    echo 'alert("Unsuccessful !!! The Medicine Name is not in your department Stock.."); ';
    echo '</script>';
    }
else if($row95=mysqli_num_rows($result95)>0  and $tqty>=$pdos and $pdos1=='')

{
$ins_query1="insert into othoscharge1 (`pmrn`,`pname`,`medi`,`brand`,`pdos`,`eid`,`date`,`rfid`,`code`,`ndate`,`route`,`remarks`,`location`) values ('$pmrn','$pname','$medi1','$bb_name','$pdos','$id','$date1','$rfid','$code','$adate','$route','$remarks','$location')";
mysqli_query($con,$ins_query1) or die(mysql_error());


$query1="update medi_stock set `add_qty`='$m_qty1' where `sno`='$rfid'";

$result1 = mysqli_query($con,$query1) or die ( mysqli_error());


$strSQL2 = "insert into phar_sale(`medi`,`qty`,`uprice`,`tprice`,`aby`,`adate`,`brand`,`pmrn`,`eid`,`rfid`,`status`,`location`,`code`) values
			('$g_name','$pdos','$u_price','$u_price','$user','$adate','$bb_name','$pmrn','$id','$rfid','Sale','OT','$code')";
			//$strSQL .="WHERE id = '".$_POST["chkDel"][$i]."' ";
			$objQuery2 = mysqli_query($con,$strSQL2);

}


else if($row95=mysqli_num_rows($result95)>0  and $tqty>=$pdos and $pdos1!='')

{
$ins_query1="update othoscharge1 set pdos='$pdos2' where id='$iid'";
mysqli_query($con,$ins_query1) or die(mysql_error());


$query1="update medi_stock set `add_qty`='$m_qty1' where `sno`='$rfid'";

$result1 = mysqli_query($con,$query1) or die ( mysqli_error());


$ins_query21="update phar_sale set qty='$pdos2' where pmrn='$pmrn' and eid='$eid' and rfid='$rfid' and adate='$adate'";
mysqli_query($con,$ins_query21) or die(mysql_error());


}
else if($row95=mysqli_num_rows($result95)<=0 and $pdos1=='')

{
$ins_query1="insert into othoscharge1 (`pmrn`,`pname`,`medi`,`brand`,`pdos`,`eid`,`date`,`rfid`,`code`,`ndate`,`route`,`remarks`,`location`,`reuse`) values ('$pmrn','$pname','$medi1','$bb_name','$pdos','$id','$date1','$rfid','$c_code','$adate','$route','$remarks','$location','Yes')";
mysqli_query($con,$ins_query1) or die(mysql_error());




$strSQL2 = "insert into phar_sale(`medi`,`qty`,`uprice`,`tprice`,`aby`,`adate`,`brand`,`pmrn`,`eid`,`rfid`,`status`,`location`,`code`,`reuse`) values
			('$g_name','$pdos','$u_price','$u_price','$user','$adate','$bb_name','$pmrn','$id','$rfid','Sale','OT','$code','Yes')";
			//$strSQL .="WHERE id = '".$_POST["chkDel"][$i]."' ";
			$objQuery2 = mysqli_query($con,$strSQL2);

}



else if($row95=mysqli_num_rows($result95)<=0 and $pdos1!='')

{
$ins_query1="update othoscharge1 set pdos='$pdos2' where id='$iid'";
mysqli_query($con,$ins_query1) or die(mysql_error());


$ins_query21="update phar_sale set qty='$pdos2' where pmrn='$pmrn' and eid='$eid' and rfid='$rfid' and adate='$adate'";
mysqli_query($con,$ins_query21) or die(mysql_error());




}


else{
echo '<script language="javascript">';
    echo 'alert("Unsuccessful !!! Not Enough Quantity Available "); ';
    echo '</script>';
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

<tr>
      <td colspan="1" align="center"><strong>S.No</strong></td>
     
      <td colspan="2" align="center"><strong>Date</strong></td>
     	  <td colspan="10" align="center"><strong>Medicine Used</strong></td>
      	  <td colspan="5" align="center"><strong>QTY Used</strong></td>
		        	  
       

	   </tr>
 <?php
	
$user=$_SESSION["sess_username"];
$pmrn=$_REQUEST["pmrn"];
$id=$_REQUEST["id"];
//$dname=$_REQUEST["dname"];
//$id1=$_REQUEST["ID"];
$ndate=date('Y-m-d');
//$id=$_REQUEST["id"];
//$episode=$data59["eid"];

$count=1;
$sel_query="Select * from othoscharge1 where ndate= '$ndate' group by medi asc;";

$result = mysqli_query($con,$sel_query);

while($row = mysqli_fetch_assoc($result)) 
{ ?>    <tr>

      <td align="center" colspan="1"><?php echo $count; ?></td>

      <td align="center"colspan="2"><?php echo $row["ndate"]; ?></td>
	        <td align="center"colspan="10"><?php echo $row["medi"]; ?></td>
				        
			      
				  
				  
				  		  				<?php 
										$sum_medi=$row['medi'];
/*										$s = "SELECT SUM(pdos) from othoscharge1 where medi='$sum_medi' and ndate='$ndate'"; 
$r = mysqli_query($con,$s);
$charge_code = mysqli_fetch_assoc($con,$r);
$sum=$charge_code['SUM(pdos)'];
	*/  
	  
	  $sum = "SELECT SUM(pdos) FROM othoscharge1 where medi='$sum_medi' and ndate='$ndate'" ;
	 
$sum1 = mysqli_query($con, $sum) or die(mysqli_error());
$sumr = mysqli_fetch_assoc($sum1);
$new_qty=$sumr['SUM(pdos)'];
 
	  ?>
				  
				 
<td><?php echo $new_qty; ?></td>
  	  

	  
      </tr>
    <?php $count++; } ?>
	<tr><td align="right" colspan="20"><button onclick="self.close()">Close</button></td></tr>
</table>
</form>
</body>

</html>
