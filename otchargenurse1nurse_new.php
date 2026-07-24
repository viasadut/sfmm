<?php 
    session_start();
    require('db1.php');
	$role = $_SESSION['sess_userrole'];
	
$queryc = "SELECT COUNT(utype) FROM user where '$role' in ('billin','bill','mng','nurse')"; 
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




$today=date('Y-m-d');
$timestamp = strtotime($today); // Example timestamp for 30-JUL-2025
$formattedDate = date('d-M-Y', $timestamp);


$user=$_SESSION["sess_username"];

//include("auth.php");
$pmrn=$_REQUEST['pmrn'];
$pmrn_int=(int)$_REQUEST['pmrn'];
$eid=(int)$_REQUEST['eid'];


$db = mysqli_connect('localhost','root','Godiloveu16');
mysqli_select_db($db,'sfmmkpjnew');
$query4 = mysqli_query($db,"select * from inpatient where pmrn='$pmrn' and discharge='' and eid='$eid'");
$data = mysqli_fetch_assoc($query4);
$ward=$data['room'];
$bed1=$data['room1'];
$adoc=$data['adoc'];
$pname=$data['pname'];
$api_adminssion_no=(int)$data['OUT_ADMISSION_NO_PK'];

$discharge_ipd=$data['disstatus'];
?>



<?php 
require('db1.php');
if(isset($_POST['Submit1'])){
  $medi6=$_REQUEST['medi6'];
$pdos=(int)$_REQUEST['pdos'];
$tqty=(int)$_REQUEST['tqty'];

//$pmrn=$data1["pmrn"];
//$pname=$data1["pname"];
$date1 = date('m/d/Y');
$date2=date('d/m/Y');
//$id=$row1["id"];


$db = mysqli_connect('localhost','root','Godiloveu16');
mysqli_select_db($db,'sfmmkpjnew');
$sel18=mysqli_query($db,"SELECT * FROM purchase_stock3 WHERE `sno`='$medi6';");
$result18 = mysqli_fetch_assoc($sel18);
$p_code=$result18['code'];
$new_qty=$result18['add_qty']-$pdos;


$sel1=mysqli_query($db,"SELECT * FROM hits_list WHERE `code`='$p_code';");
$result1 = mysqli_fetch_assoc($sel1);
//$medi1=$result1['item_name'];
$medi1 = str_replace("'", "''",$result1['item_name']);
$medi1_api=$medi1.'-IPD';
$dcode=$result1["code"];
$price=(int)$result1["ipd_charge"];
$sub_type=$result1["sub_type"];
$ip=$result1["ip"];
$op=$result1["op"];
$acode=$result1["acode"];
$ccentre=$result1["ccentre"];


$query3 = "SELECT * FROM inhoscharge where pmrn= '$pmrn' and eid='$eid' and date='$date1' and medi='$medi1'"; 
	 
$result3 = mysqli_query($con, $query3);

// Print out result

$query4 = "SELECT * FROM inhoscharge where pmrn= '$pmrn' and eid='$eid' and date='$date1'and medi='$medi1'"; 
	 
$result4 = mysqli_query($con, $query4);

$row3 = mysqli_fetch_array($result4);
$pdos1=(int)$row3['pdos'];
$pdos2=(int)$row3['pdos']+$pdos;
$p11=(int)$price*$pdos;
$p12=$price*$pdos2;
$p11_api=(int)$price;

$pp3=$pdos *$priceold;
$pp4=$pdos2*$priceold;

$sel_p=mysqli_query($db,"SELECT COUNT(id) FROM set_package WHERE `iname`='$medi1';");
$result_p = mysqli_fetch_assoc($sel_p);
$dis_pack=$result_p['COUNT(id)'];


$sel990="SELECT * FROM hits_list WHERE `code`='$p_code';";
$result990 = mysqli_query($con,$sel990);



$sel993="SELECT * FROM purchase_stock3 WHERE `sno`='$medi6';";
$result993 = mysqli_query($con,$sel993);

if($res993=mysqli_num_rows($result993)==0 and $res990=mysqli_num_rows($result990)==0)
{
 	
       echo '<script language="javascript">';
    echo 'alert("Unsuccessful !!! The Item Name is not in the Database List.. Please contact with IT Department"); ';
    echo '</script>';
    }


    else if($user=='')
{
 	
       echo '<script language="javascript">';
    echo 'alert("Unsuccessful !!! Session Expired"); ';
    echo '</script>';
    }



$servername = "localhost";
$username1  = "root";
$password1  = "Godiloveu16";
$dbname1    = "sfmmkpjnew";

$db = new mysqli($servername, $username1, $password1, $dbname1);
if ($db->connect_error) die("Connection failed: " . $db->connect_error);
$db->set_charset("utf8mb4");

if ($dis_pack <= 0 && $tqty >= $pdos && mysqli_num_rows($result993) > 0) {

    $db->begin_transaction(); // ✅ start transaction

    try {
        // 1) INSERT inhoscharge
        $sql = "INSERT INTO inhoscharge
            (`pmrn`,`pname`,`medi`,`eid`,`date`,`pdos`,`code`,`price`,`date1`,`type`,`ip`,`op`,`acct_code`,`ccentre`,`user`,`sno`,`e_point`)
            VALUES
            ('$pmrn','$pname','$medi1','$eid','$date1','$pdos','$dcode','$p11','$date2','$sub_type','$ip','$op','$acode','$ccentre','$user','$medi6','1')";

        if (!$db->query($sql)) throw new Exception("Insert failed: " . $db->error);

        $last_id = $db->insert_id;

        // 2) UPDATE stock
        $up_query1 = "UPDATE purchase_stock3 SET add_qty='$new_qty' WHERE sno='$medi6'";
        if (!$db->query($up_query1)) throw new Exception("Stock update failed: " . $db->error);

        if ($db->affected_rows <= 0) throw new Exception("Stock update affected 0 rows.");

        // 3) TB lookup
        $date = date('Y-m-d');
        $tb_q = $db->query("SELECT tb_op, tb_ip FROM acct_master_new WHERE item_code='$dcode' LIMIT 1");
        if (!$tb_q) throw new Exception("TB lookup query failed: " . $db->error);

        $tb_result = $tb_q->fetch_assoc();
        if (!$tb_result) throw new Exception("acct_master_new not found for item_code: $dcode");

        $tb_data = ($tb_result['tb_op'] != '') ? $tb_result['tb_op'] : $tb_result['tb_ip'];

        // 4) pms_tb CR
        $ins_query = "INSERT INTO pms_tb (`trans_id`,`trans_type`,`acct_code`,`date`,`amount`,`location`)
                      VALUES ('$last_id','CR','$tb_data','$date','$p11','IPD_HOS_CHARGE')";
        if (!$db->query($ins_query)) throw new Exception("TB CR insert failed: " . $db->error);

        // 5) pms_tb DR
        $ins_query2 = "INSERT INTO pms_tb (`trans_id`,`trans_type`,`acct_code`,`date`,`amount`,`location`)
                       VALUES ('$last_id','DR','111999','$date','$p11','IPD_HOS_CHARGE')";
        if (!$db->query($ins_query2)) throw new Exception("TB DR insert failed: " . $db->error);

        // ✅ everything ok
        $db->commit();
        echo "SUCCESS: All steps committed. ID: $last_id";

    } catch (Exception $e) {
        // ❌ rollback everything
        $db->rollback();
        die("FAILED (rolled back): " . $e->getMessage());
    }
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
<tr><td colspan="20" align="center"bgcolor="lightgreen"><label><strong>ADD HOSPITAL CHARGES</strong></label></td> </tr>
<tr><td colspan="15" align="center"><label><strong>Select Used Items</strong></label></td> 
<td colspan="5" align="center"><label><strong>Select Used QTY</strong></label></td> 


</tr>
<tr>
<td colspan="15" align="center"><input type="text" id="pmrn" onkeyup="GetDetail(this.value)" class="form-control" list="browsers2" autocomplete="off" name='medi6' required style="font-weight: bold;font-size:22px;color:green">
  <datalist id="browsers2">

						<option value=''>-Select Items</option>
					<?php
            require('db1.php');
            $uname = '';
            //$query = "select * from `purchase_stock` where add_qty>0 and location='OT medicine store' and status='Served'";
            $query = "select * from `purchase_stock3`";
            $result = mysqli_query($con, $query);
            while($row = mysqli_fetch_array($result)) {
        ?>
            <option value="<?php echo $row['sno']; ?>"><?php echo $row['sno']; ?></option>
        <?php } ?>  </datalist>
				
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
    $('.#pmrn').select2();
});
</script>

</td>
			
<td colspan="12"><input type="text" name="medi1" class="form-control" id="gname" required value="" readonly style="font-weight: bold;font-size:12px;color:green"></td>
<td colspan="2"><input type="text" name="tqty" class="form-control" id="tqty" required value="" readonly style="font-weight: bold;font-size:22px;color:green"></td>


		
			<td  colspan="2"align="center"><input type="number" name="pdos" class="form-control" required style="font-weight: bold;font-size:22px;color:green">
 
</td>





<td colspan="2"><input type="text" name="remarks" id=""  value=""  style="font-weight: bold;font-size:22px;color:green"></td>




</tr>			        

<tr>
		<td colspan="20"align="right">
    
    
    <?php if($discharge_ipd!='Discharge Bill Confirmed'){
    echo '<button type="submit" name="Submit1">ADD</button></td>';
    }

    else if($discharge_ipd=='Discharge Bill Confirmed'){
      echo '<button type="button" disabled><span style="color:red;">Bill Already Confirmed</span></button></td>';
      }
	  ?>
    </td>
	  
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
						
				
			      
				 <td align="center" colspan="2">
         
         <a href="inhosdelete?id3=<?php echo $row["id"]; ?>&pmrn=<?php echo "$pmrn"; ?>&eid=<?php echo "$eid"; ?>&invoice_no=<?php echo $row['invoice_no']; ?>&admission_no=<?php echo $api_adminssion_no; ?>&code=<?php echo $rrt; ?>&pdos=<?php echo $row['pdos']; ?>&price=<?php echo $row['price']; ?>">DELETE</a>
         
         </td>

  	  

	  
      </tr>
    <?php $count++; } ?>
	<tr><td align="right" colspan="20"><button onclick="self.close()">Close</button></td></tr>
</table>
</form>
</body>

</html>


<script>

		// onkeyup event will occur when the user
		// release the key and calls the function
		// assigned to this event
		function GetDetail(str) {
			if (str.length == 0) {
				document.getElementById("tqty").value = "";

				document.getElementById("gname").value = "";
				document.getElementById("code").value = "";
				document.getElementById("tqty").value = "";
				document.getElementById("ins").value = "";
				document.getElementById("pcode").value = "";
				//document.getElementById("pp").value = "";
				
				return;
			}
			else {

				// Creates a new XMLHttpRequest object
				var xmlhttp = new XMLHttpRequest();
				xmlhttp.onreadystatechange = function () {

					// Defines a function to be called when
					// the readyState property changes
					if (this.readyState == 4 &&
							this.status == 200) {
						
						// Typical action to be performed
						// when the document is ready
						var myObj = JSON.parse(this.responseText);

						// Returns the response data as a
						// string and store this array in
						// a variable assign the value
						// received to first name input field
						
						document.getElementById
							("gname").value = myObj[0];
						
                            document.getElementById
							("tqty").value = myObj[1];
						
						// Assign the value received to
						// last name input field

							
							
							
							//document.getElementById(
							//"qty").value = 0;
							if(myObj[0]>0){
							document.getElementById('tqty').style.color = "green";}
else {
							document.getElementById('tqty').style.color = "red";}							

					}
					
					
					
					
				};

				// xhttp.open("GET", "filename", true);
				xmlhttp.open("GET", "fetch_api_data_inpatient.php?pmrn=" + str, true);
				
				// Sends the request to the server
				xmlhttp.send();
			}
		}
	</script>  