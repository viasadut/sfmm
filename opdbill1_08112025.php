<?php 
    session_start();
    require('db1.php');
	$role = $_SESSION['sess_userrole'];
	
	$queryc = "SELECT COUNT(utype) FROM user where '$role' in ('bill','mng','doctor')"; 
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

$user=$_SESSION["sess_username"];
$id=$_REQUEST['id'];
$pmrn=$_REQUEST['pmrn'];
$full=$_REQUEST['dname'];
$eid=$_REQUEST['eid'];


//include("auth.php");
$pmrn=$_REQUEST['pmrn'];
$db = mysqli_connect('localhost','root','Godiloveu16');
mysqli_select_db($db,'sfmmkpjnew');
$sel9=mysqli_query($db,"SELECT * FROM procedure1 WHERE `id`='$id'");
$result9 = mysqli_fetch_assoc($sel9);
$pname=$result9["pname"];
$procharge=$result9["procharge"];
$proname=$result9["proname"];
$billtime=date('d/m/Y h:i:s');  
?>


<?php 
require('db1.php');
if(isset($_POST['Submit1'])){
	
	$total_bill=$_REQUEST['total_bill'];
		$doc_charge=$_REQUEST['doc_charge'];
			$medi_charge=$_REQUEST['medi_charge'];
				$hos_charge=$_REQUEST['hos_charge'];
		$due_remarks=$_REQUEST['due_remarks'];
			$vehicle1=$_REQUEST['vehicle1'];
			
			$discount_type=$_REQUEST['discount_type'];
						$taka=$_REQUEST['taka'];
						$percentage=$_REQUEST['percentage'];
						
						$dis_taka=$_REQUEST['dis_taka'];
						$dis_percentage=$_REQUEST['dis_percentage'];
						
						$dis_percentage_amount=$total_bill-$dis_percentage;
						
						
			
			
	$appdate=date('Y-m-d');
	$apptime=date('Y-m-d H:i:s');
	
	$strSQL1 = "select DISTINCT MAX(s_no) from pms_bill where date='$appdate'";
			$objQuery1 = mysqli_query($con,$strSQL1);
			$obj = mysqli_fetch_array($objQuery1);
			$mno=$obj['MAX(s_no)']+1;
			$mno1=$obj['MAX(s_no)'];
			$billno=date('ymd').$mno;

	
	$servername = "localhost";
$username1 = "root";
$password1 = "Godiloveu16";
$dbname1 = "sfmmkpjnew";

// Create connection
$conn = new mysqli($servername, $username1, $password1, $dbname1);
// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

if($discount_type==''){

$sql = "insert into pms_bill(pmrn,eid,location,amount,date,time,user,remarks,dname,s_no,p_mode,`p_remarks`) VALUES
('$pmrn','$eid','OPD Procedure Room','$total_bill','$appdate','$apptime','$user','OPD Procedure Room','OPD_PRO','$mno','$vehicle1','$due_remarks')";

if ($conn->query($sql) === TRUE) {
  $last_id = $conn->insert_id;

//$ins_query1="update procedure1 set ustatus='Paid',billby='$user',billtime='$billtime', billno='$last_id', payment_status='PAID' where id='$id'";
//mysqli_query($con,$ins_query1) or die(mysql_error());}

  
  $sql1 = "update procedure1 set doc_charge='$doc_charge',hos_charge='$hos_charge', medi_charge='$medi_charge', total_bill='$total_bill',ustatus='Paid',billby='$user',billtime='$billtime', billno='$last_id', payment_status='PAID' where id='$id'";
$conn->query($sql1);
header("Location: opd_procedure_room_bill.php?adate1=$adate1&pmrn=$pmrn&dname=$dname&billno=$last_id&eid=$eid");


}
			
 else {
  echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();
}


else if($discount_type=='taka'){

$sql = "insert into pms_bill(pmrn,eid,location,amount,date,time,user,remarks,dname,s_no,p_mode,`p_remarks`,`dis_amount`) VALUES
('$pmrn','$eid','OPD Procedure Room','$total_bill','$appdate','$apptime','$user','OPD Procedure Room','OPD_PRO','$mno','$vehicle1','$due_remarks','$taka')";

if ($conn->query($sql) === TRUE) {
  $last_id = $conn->insert_id;

//$ins_query1="update procedure1 set ustatus='Paid',billby='$user',billtime='$billtime', billno='$last_id', payment_status='PAID' where id='$id'";
//mysqli_query($con,$ins_query1) or die(mysql_error());}

  
  $sql1 = "update procedure1 set doc_charge='$doc_charge',hos_charge='$hos_charge', medi_charge='$medi_charge', total_bill='$total_bill',ustatus='Paid',billby='$user',billtime='$billtime', billno='$last_id', payment_status='PAID',discount_type='$discount_type',dis_amount='$taka',dis_payment='$dis_taka' where id='$id'";
$conn->query($sql1);
header("Location: opd_procedure_room_bill.php?adate1=$adate1&pmrn=$pmrn&dname=$dname&billno=$last_id&eid=$eid");


}
			
 else {
  echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();
}

else if($discount_type=='percentage'){

$sql = "insert into pms_bill(pmrn,eid,location,amount,date,time,user,remarks,dname,s_no,p_mode,`p_remarks`,`dis_amount`) VALUES
('$pmrn','$eid','OPD Procedure Room','$total_bill','$appdate','$apptime','$user','OPD Procedure Room','OPD_PRO','$mno','$vehicle1','$due_remarks','$dis_percentage_amount')";

if ($conn->query($sql) === TRUE) {
  $last_id = $conn->insert_id;

//$ins_query1="update procedure1 set ustatus='Paid',billby='$user',billtime='$billtime', billno='$last_id', payment_status='PAID' where id='$id'";
//mysqli_query($con,$ins_query1) or die(mysql_error());}

  
  $sql1 = "update procedure1 set doc_charge='$doc_charge',hos_charge='$hos_charge', medi_charge='$medi_charge', total_bill='$total_bill',ustatus='Paid',billby='$user',billtime='$billtime', billno='$last_id', payment_status='PAID',discount_type='$discount_type',dis_amount='$percentage',dis_payment='$dis_percentage' where id='$id'";
$conn->query($sql1);
header("Location: opd_procedure_room_bill.php?adate1=$adate1&pmrn=$pmrn&dname=$dname&billno=$last_id&eid=$eid");


}
			
 else {
  echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();
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

		<tr><td colspan="20" align="left"bgcolor="lightgreen"><label><strong>Consultant Charge</strong></label></td> </tr>
		
		 <tr><td align="left"colspan="20"><?php echo "$procharge";?></td></tr>
		 
		 <tr><td colspan="20" align="Left"bgcolor="lightgreen"><label><strong>Procedure Name</strong></label></td> </tr>
		
		 <tr><td align="left"colspan="20"><?php echo "$proname";?></td></tr>
		
		
		<tr><td colspan="20" align="center"bgcolor="lightgreen"><label><strong>List Of Medicine Used</strong></label></td> </tr>

    <tr>
      <td colspan="1" align="center"><strong>S.No</strong></td>
     
      <td colspan="2" align="center"><strong>MRN</strong></td>
     	  <td colspan="10" align="center"><strong>Item</strong></td>
      	  <td colspan="5" align="center"><strong>QTY</strong></td>
          <td colspan="5" align="center"><strong>Price</strong></td>
       

	   </tr>
	


 <?php
	
$user=$_SESSION["sess_username"];
$pmrn=$_REQUEST["pmrn"];
$eid=$_REQUEST["eid"];
$dname=$_REQUEST["dname"];
//$id1=$_REQUEST["ID"];

//$id=$_REQUEST["id"];
//$episode=$data59["eid"];

$count=1;
$sel_query="Select * from promediused where pmrn= '$pmrn' and eid='$eid'order by `id` DESC;";

$result = mysqli_query($con,$sel_query);

while($row = mysqli_fetch_assoc($result)) 
{ ?>    <tr>

      <td align="center" colspan="1"><?php echo $count; ?></td>

      <td align="center"colspan="2"><?php echo $row["pmrn"]; ?></td>
	        <td align="center"colspan="10"><?php echo $row["medi"].' ('.$row["brand"].')'; ?></td>
			      <td align="center"colspan="5"><?php echo $row["pdos"]; ?></td>
            <td align="center"colspan="5"><?php echo $row["price"]; ?></td>
				  

  	  

	  
      </tr>
    <?php $count++; } ?>
	
	   
	   <br><br>

<tr><td colspan="20" align="center"bgcolor="lightgreen"><label><strong>List Of Disposible & Equipment Used</strong></label></td> </tr>
<tr>
      <td colspan="1" align="center"><strong>S.No</strong></td>
     
      <td colspan="2" align="center"><strong>MRN</strong></td>
     	  <td colspan="10" align="center"><strong>Item</strong></td>
         <td colspan="5" align="center"><strong>QTY</strong></td>  
        <td colspan="5" align="center"><strong>Price</strong></td>
		        	  
       

	   </tr>
	   <?php
	
$user=$_SESSION["sess_username"];
$pmrn=$_REQUEST["pmrn"];
$eid=$_REQUEST["eid"];
$dname=$_REQUEST["dname"];
//$id1=$_REQUEST["ID"];

//$id=$_REQUEST["id"];
//$episode=$data59["eid"];

$count=1;
$sel_query="Select * from prohoscharge where pmrn= '$pmrn' and eid='$eid'order by `id` DESC;";

$result = mysqli_query($con,$sel_query);

while($row = mysqli_fetch_assoc($result)) 
{ ?>    <tr>

      <td align="center" colspan="1"><?php echo $count; ?></td>

      <td align="center"colspan="2"><?php echo $row["pmrn"]; ?></td>
	        <td align="center"colspan="10"><?php echo $row["medi"]; ?></td>
			<td align="center"colspan="5"><?php echo $row["pdos"]; ?></td>
      <td align="center"colspan="5"><?php echo $row["price"]; ?></td>
			      
				 

  	  

	  
      </tr>
    <?php $count++; } ?>
	
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

	
	
$opd_procedure = "SELECT SUM(price) FROM prohoscharge where pmrn= '$pmrn' and eid='$eid' "; 
	 
$opd_procedure_res = mysqli_query($dbhandle,$opd_procedure) or die(mysql_error());

// Print out result
$opd_procedure_data = mysqli_fetch_array($opd_procedure_res);
$opd_procedure_sum=	$opd_procedure_data['SUM(price)'];

$opd_procedure_medi = "SELECT SUM(price) FROM promediused where pmrn= '$pmrn' and eid='$eid' "; 
	 
$opd_procedure_res_medi = mysqli_query($dbhandle,$opd_procedure_medi) or die(mysql_error());

// Print out result
$opd_procedure_data_medi = mysqli_fetch_array($opd_procedure_res_medi);
$opd_procedure_sum_medi=	$opd_procedure_data_medi['SUM(price)'];


$opd_procedure_doc = "SELECT SUM(procharge) FROM procedure1 where pmrn= '$pmrn' and eid='$eid' and ustatus!='Paid'"; 
	 
$opd_procedure_res_doc = mysqli_query($dbhandle,$opd_procedure_doc) or die(mysql_error());

// Print out result
$opd_procedure_data_doc = mysqli_fetch_array($opd_procedure_res_doc);
$opd_procedure_sum_doc=	$opd_procedure_data_doc['SUM(procharge)'];

$opd_pro_summary=$opd_procedure_sum+$opd_procedure_sum_medi+$opd_procedure_sum_doc;
?>
	
	<tr >
	
	<td colspan="10"align="right" style="font-weight: bold;font-size:35px;color:red">Grand Total</td>
	<td colspan="10"align="right"><input id='gtotal' name='gtotal' style="font-weight: bold;font-size:35px;color:red" value="<?php echo $opd_pro_summary;?>"readonly></td>
</tr>

	
	<tr>
<td colspan="5" align="left" style="color:red; font-weight:bold;font-size:18px"><label><strong>Type </strong></label>
<select name="discount_type" value="" class="style1" id="pmrn" onchange="GetDetail(this.value)" width="20px;">
			        
					 <option value=''>--Select--</option>
					 <option value='taka'>Discount In Taka</option>
					 <option value='percentage'>Discount In Percentage</option>
					 
									
										 
										 
				
			</select>
			
	
		
</td>	
	
	<td colspan="10">

<input name="taka" type="number" class="style1" id="sdate12" placeholder="Discount In Taka" max="100" hidden style="font-size:20px;color:red;font-weight:bold;">
<input type="number" name="percentage" id="sdate1" class="style1" placeholder="Discount In Percentage" max="10" hidden style="font-size:20px;color:red;font-weight:bold;">



</td>


		
		

		<td colspan="5"align="right">
		<input type="text" id="dis_taka" name="dis_taka" value="" hidden style="font-size:20px;color:red;font-weight:bold;" readonly> 
<input type="text" id="dis_percentage" name="dis_percentage" value="" hidden style="font-size:20px;color:red;font-weight:bold;" readonly> 
 <script>
  $("input").on("change", function() {
   // var ret = parseInt($("#field1").val()) - parseInt($("#field2").val())
	var ret1 = parseInt($("#gtotal").val()) 
	var ret2 = parseInt($("#sdate12").val())
	var ret3 = parseInt($("#sdate1").val())
	var ret4=ret1-ret2
	var ret5=ret3 / 100
	var ret6=ret1 * ret5
	var ret7=parseInt(ret1 - ret6)
	
    $("#dis_taka").val(ret4);
	$("#dis_percentage").val(ret7);
  })
</script>


	
	
	
	
	</tr>

	<tr><td colspan="20"align="left">
	<input type="radio" id="vehicle1" name="vehicle1" value="Cash"  id="chkPassport"onclick="EnableDisableTextBox(this)"  style="height:20px; width:20px; color:red;"checked><span style="font-size:20px;color:red;font-weight:bold;">Cash</span>				 
<input type="radio" id="vehicle1" name="vehicle1" value="Bikash"id="chkPassport1" onclick="EnableDisableTextBox1(this)" style="height:20px; width:20px; color:red;"><span style="font-size:20px;color:red;font-weight:bold;">Bikash</span>	
<input type="radio" id="vehicle1" name="vehicle1" value="Card"id="chkPassport2" onclick="EnableDisableTextBox2(this)" style="height:20px; width:20px; color:red;"><span style="font-size:20px;color:red;font-weight:bold;">Card</span>				 

      <input name="due_remarks" type="text" size="10" style="text-transform:uppercase" value="" id="sdate21" disabled="disabled" placeholder="Reference No">

	  </td></tr>
	  
	  

    <input name="total_bill" type="hidden" size="10" value="<?php echo $opd_pro_summary;?>">
	    <input name="hos_charge" type="hidden" size="10" value="<?php echo $opd_procedure_sum;?>">
		    <input name="medi_charge" type="hidden" size="10" value="<?php echo $opd_procedure_sum_medi;?>">
					    <input name="doc_charge" type="hidden" size="10" value="<?php echo $opd_procedure_sum_doc;?>">
	  <tr>
<td colspan="20"align="right"><button type="submit" name="Submit1">Confirm</button></td>

</tr>
</table>
</form>
</body>

</html>

<script type="text/javascript">
    function EnableDisableTextBox(chkPassport) {
   
        
        var txtPassportNumber4 = document.getElementById("sdate21");
        txtPassportNumber4.disabled = chkPassport.unchecked ? false : true;
        if (!txtPassportNumber4.disabled) {
            txtPassportNumber4.focus();
        }
		
		
    }
	
		function EnableDisableTextBox1(chkPassport1) {
   
        
        var txtPassportNumber6 = document.getElementById("sdate21");
        txtPassportNumber6.disabled = chkPassport1.checked ? false : true;
        if (!txtPassportNumber6.disabled) {
            txtPassportNumber6.focus();
        }
	}
	
	function EnableDisableTextBox2(chkPassport2) {
   
        
        var txtPassportNumber6 = document.getElementById("sdate21");
        txtPassportNumber6.disabled = chkPassport2.checked ? false : true;
        if (!txtPassportNumber6.disabled) {
            txtPassportNumber6.focus();
        }
	}
</script>



<script>

		// onkeyup event will occur when the user
		// release the key and calls the function
		// assigned to this event
		

		function GetDetail(str) {
			
				var rt = document.getElementById('pmrn').value;
				

								if(rt === ""){
    
	
	
	sdate1.hidden = true;
	sdate1.disabled = true;
	
	
	sdate12.hidden = true;
	sdate12.disabled = true;
	
	sdate12.hidden = true;
	sdate12.disabled = true;
	
	dis_taka.hidden = true;
	dis_taka.disabled = true;
	
	dis_percentage.hidden = true;
	dis_percentage.disabled = true;
  }	  
	

				
				
				else if(rt === "percentage"){
    
	
	
	sdate1.hidden = false;
	sdate1.disabled = false;
	
	
	sdate12.hidden = true;
	sdate12.disabled = true;
	
	dis_taka.hidden = true;
	dis_taka.disabled = true;
	
	dis_percentage.hidden = false;
	dis_percentage.disabled = false;
	
	
  }	  
  
	
else if(rt === "taka"){
    
	
	
	sdate1.hidden = true;
	sdate1.disabled = true;
	
	
	sdate12.hidden = false;
	sdate12.disabled = false;
	
	dis_taka.hidden = false;
	dis_taka.disabled = false;
	
	dis_percentage.hidden = true;
	dis_percentage.disabled = true;
  }	  
  
  
	
				
			}
		
	</script>  