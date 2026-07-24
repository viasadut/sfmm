<?php 
    session_start();
    require('db1.php');
	$role = $_SESSION['sess_userrole'];
	
$queryc = "SELECT COUNT(utype) FROM user where '$role' in ('mng','staff','store','doctor','ot','endo','emergency','mofficer','pharmacy','radio','lab','billing','ipd')"; 
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
$sno=$_REQUEST['id'];
$user=$_SESSION["sess_username"];

$query39 = "SELECT * FROM Purchase_stock3 where rfid= '$sno'"; 
	 
$result39 = mysqli_query($con, $query39) or die(mysqli_error());

// Print out result
$row39 = mysqli_fetch_array($result39);
$p_name = $row39['pname'];
$p_mrn = $row39['req_loc'];
$hod = $row39['hod'];
$incharge = $row39['incharge'];

$query = "SELECT * FROM staff3 where sid= '$user' and status='Active'"; 
	 
$result = mysqli_query($con, $query) or die(mysqli_error());

// Print out result
$row9 = mysqli_fetch_array($result);
$rq_name = $row9['fullname'];
$sid1 = $row9['sid1'];



$sel95w="SELECT * FROM purchase_stock3 WHERE `rfid`='$sno';";
$result95w = mysqli_query($con,$sel95w);
$data=mysqli_fetch_assoc($result95w);

$po_id=$data['id'];  
$fstatus=$data['fstatus'];  



?>


<?php
/*
Author: Javed Ur Rehman
Website: https://www.allphptricks.com/
*/
 
require('db1.php');

if(isset($_POST['Submit']))
{

$runningTime = date('Ydims');

$code = $_REQUEST['code'];
$medi = $_REQUEST['medi'];
$uprice = $_REQUEST['uprice'];
$tprice = $_REQUEST['tprice'];
$tqty = $_REQUEST['tqty'];
$ins = $_REQUEST['ins'];
$p_name1 = $_REQUEST['p_name'];
$p_mrn1 = $_REQUEST['dept'];
$rfid5 = $_REQUEST['rfid5'];
//$charge=$_REQUEST['charge'];
$charge= $_REQUEST['charge'];
$lpdate= $_REQUEST['lpdate'];
$plevel= $_REQUEST['plevel'];
$balance= $_REQUEST['balance'];
$musage= $_REQUEST['musage'];
$adate1= date('d/m/Y H:i:s');
$adate= date('Y-m-d');

$sel95="SELECT * FROM storenew WHERE `eid`='$code' and estatus='Active';";
$result95 = mysqli_query($con,$sel95);
$b_chk=mysqli_fetch_assoc($result95);
$brand=$b_chk['brand1'];
$re_time=date('Y-m-d H:i:s');




if($res95=mysqli_num_rows($result95)==0)
{
 	
       echo '<script language="javascript">';
    echo 'alert("Unsuccessful !!! The Procedure Name is not in the Database List.. Please contact with IT Department"); ';
    echo '</script>';
    }


else if($user !=''){


			/*$strSQL2 = "insert into phar_sale(`medi`,`req_qty`,`uprice`,`tprice`,`aby`,`adate`,`sno`,`ins`,`brand`,`pname`,`pmrn`,`status`,`s_type`,`code`) values
			('$medi','$tprice','$uprice','$charge','$user','$adate','$sno','$ins','$brand','$p_name1','$p_mrn1','Pending','Transfer','$code')";
			//$strSQL .="WHERE id = '".$_POST["chkDel"][$i]."' ";
			$objQuery2 = mysqli_query($con,$strSQL2);
			*/
			
			$ins_query1="insert into purchase_stock (`code`,`g_name`,`b_name`,`add_qty`,`req_qty`,`req_loc`,`status`,`location`,`rfid`,`sno`,`u_price`,`t_price`,`re_by`,`re_time`,`remarks`,`lpdate`,`plevel`,`balance`,`musage`)
 values ('$code','$medi','$medi','','$tprice','$p_mrn1','Pending','$p_mrn1','$sno','$runningTime','$uprice','$charge','$user','$re_time','$ins','$lpdate','$plevel','$balance','$musage')";
mysqli_query($con,$ins_query1) or die(mysql_error());
			
			
$url = "purchase_transfer_ot?sno=$sno";
header("Location: $url"); 

}


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
  color: #-a97a0;
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

button {
  padding: 19px 39px 18px 39px;
  color: #FFF;
  background-color: lightgreen;
  /*#4bc970*/
  font-size: 18px;
  text-align: center;
  font-style: normal;
  border-radius: 5px;
  width: 10%;
  border: 1px solid #8265B0;
  /*#3ac162*/
  border-width: 1px 1px 3px;
  box-shadow: 0 -1px 0 rgba(255,255,255,0.1) inset;
  margin-bottom: 10px;
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
    max-width: 1800px;
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
    <title>PHP - Dynamically Add or Remove input fields using JQuery</title>
    <link rel="stylesheet" href="jsnew/bootstrap.min.css" />  
    <script src="jsnew/jquery.min.js"></script>
    <script src="jsnew/bootstrap.min.js"></script>

    <link href="jsnew/jquery-ui.css" rel="stylesheet" />
    <link href="jsnew/jquery.multiselect.css" rel="stylesheet" />
    <script src="jsnew/jquery-1.12.4.js"></script>
    <script src="jsnew/jquery-ui.js"></script>
    <script src="jsnew/jquery.multiselect.js"></script>


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

<script type="text/javascript">
function confirm_click()
{
return confirm("Are you Sure to Add Inpatient Visit ?");
}

</script>
<script type="text/javascript">
function confirm_click1()
{
return confirm("Are you Sure to Add ICU Visit ?");
}

</script>

<script type="text/javascript">
function confirm_click2()
{
return confirm("Are you Sure to Add Emergency Visit ?");
}

</script>


<script type="text/javascript">
function confirm_click3()
{
return confirm("Are you Sure to Add After Office Hour Visit ?");
}

</script>
</head>
</head>

<body>

<div id='cssmenu'>
<ul>
   <li><a href='idocdetails?pmrn=<?php echo "$pmrn"; ?>&eid=<?php echo "$eid"; ?>'><span>Home</span></a></li>
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
<?php 
  
  
  //if($fstatus==1 and $user=='cfo')
  if($fstatus==1 and $hod==$sid1){echo'<div style="position: relative;left: 1100px; top:95px;">
<a onclick="return confirm_click();" href="prf_forward_mng1?id='.$po_id.'&sno='.$sno.'&hod='.$hod.'&incharge='.$incharge.'"><strong><img src="approve.png" title="Forward PO" width="50" height="50" /></strong></a>

   </a>     
   <a target="_blank" href="prf_upload_new?sno='.$sno.'&id='.$po_id.'"><img src="view.png" title="View Quotation" width="50" height="50" />
</a>

<a target="_blank" href="po_request_comparison1?sno='.$sno.'&id='.$po_id.'"><img src="comparison.png" title="View Comparison" width="50" height="50" />
</a>

</div>
';}

else if($fstatus==1 and $incharge==$sid1){echo'<div style="position: relative;left: 1100px; top:95px;">
  <a onclick="return confirm_click();" href="prf_forward_mng1?id='.$po_id.'&sno='.$sno.'&hod='.$hod.'&incharge='.$incharge.'"><strong><img src="approve.png" title="Forward PO" width="50" height="50" /></strong></a>
  
     </a>     
     <a target="_blank" href="prf_upload_new?sno='.$sno.'&id='.$po_id.'"><img src="view.png" title="View Quotation" width="50" height="50" />
  </a>
  
  <a target="_blank" href="po_request_comparison1?sno='.$sno.'&id='.$po_id.'"><img src="comparison.png" title="View Comparison" width="50" height="50" />
  </a>
  
  </div>
  ';}


else if($fstatus==2 and $user=='1601'){echo'<div style="position: relative;left: 1100px; top:95px;">
<a onclick="return confirm_click();" href="prf_forward_mng1?id='.$po_id.'&sno='.$sno.'"><strong><img src="approve.png" title="Forward PO" width="50" height="50" /></strong></a>

   </a>     
   <a target="_blank" href="prf_upload_new?sno='.$sno.'&id='.$po_id.'"><img src="view.png" title="View Quotation" width="50" height="50" />
</a>

<a target="_blank" href="po_request_comparison1?sno='.$sno.'&id='.$po_id.'"><img src="comparison.png" title="View Comparison" width="50" height="50" />
</a>

</div>
';}


else if($fstatus==3 and $user=='md'){echo'<div style="position: relative;left: 1100px; top:95px;">
<a onclick="return confirm_click();" href="prf_forward_mng1?id='.$po_id.'&sno='.$sno.'"><strong><img src="approve.png" title="Forward PO" width="50" height="50" /></strong></a>

   </a>  
   <a target="_blank" href="prf_upload_new?sno='.$sno.'&id='.$po_id.'"><img src="view.png" title="View Quotation" width="50" height="50" />
</a>


<a target="_blank" href="po_request_comparison1?sno='.$sno.'&id='.$po_id.'"><img src="comparison.png" title="View Comparison" width="50" height="50" />
</a>

</div>
';}

else {echo'<div style="position: relative;
  left: 1065px;">
<strong><img src="white.png" title="CLOSED" width="50" height="50" /></div>
';}
?>
	

<form action="" method="post">

<!-- Form Title -->

        <table align="center" class="table table-bordered" id="dynamic_field">  

						
<tr><td colspan="20" align="center"bgcolor="lightgreen"><label><h1 style="color:red"><strong>Request No - <?php echo $sno;?></strong></h1></label></td> </tr>



<tr>
      <td colspan="1" align="center"><strong>S.No</strong></td>
      <td colspan="1" align="center"><strong>SNO</strong></td>
      <td colspan="3" align="center"><strong>Product</strong></td>
      <td colspan="2" align="center"><strong>L.D.OF Request</strong></td>
	  <td colspan="2" align="center"><strong>Per Level	</strong></td>
      
      <td colspan="1" align="center"><strong>Balance</strong></td>
	  <td colspan="1" align="center"><strong>Monthly Avg. Usage	</strong></td>
	  <td colspan="2" align="center"><strong>Unit Price	</strong></td>
	  <td colspan="2" align="center"><strong>Total Price</strong></td>
	  <td colspan="2" align="center"><strong>Request qty	</strong></td>
	  <td colspan="2" align="center"><strong>Remarks</strong></td>
	  
	   </tr>
 
	
	
	<?php
	
$user=$_SESSION["sess_username"];
$pmrn=$data["pmrn"];
//$id=$_REQUEST["id"];
$episode=$data["eid"];
$count=1;
//$count=1;
$sel_query="Select * from purchase_stock3 where rfid= '$sno' order by `id` DESC;";

$result = mysqli_query($con,$sel_query);

while($row = mysqli_fetch_assoc($result)) 
{ ?>    <tr>

      <td align="center" colspan="1"><?php echo $count; ?></td>
      <td align="center"colspan="1"><?php echo $row["sno"]; ?></td>
      <td align="center"colspan="3">
	  <a target='_blank' href="prf_history?id=<?php echo $row['code'];?>&req=<?php echo $row['req_loc']; ?>">
	  
	  
	  <?php echo $row["g_name"]; ?></a></td>
	  
      
	  <td align="center"colspan="2"><?php echo $row["lpdate"]; ?></td>
	  <td align="center"colspan="2" ><?php echo $row["plevel"]; ?></td>
	  <td align="center"colspan="1"><?php echo $row["balance"]; ?></td>  
	  <td align="center"colspan="1"><?php echo $row["musage"]; ?></td>  
	  <td align="center"colspan="2"><?php echo $row["u_price"]; ?></td>  
      <td align="center"colspan="2"><?php echo $row["t_price"]; ?></td>  
	  <td align="center"colspan="2"><?php echo $row["req_qty"]; ?></td>  
	  <td align="center"colspan="2"><?php echo $row["remarks"]; ?></td>  
	  
	  
      </tr>
    <?php $count++; } ?>
	
	<?php if($fstatus==2){echo'
		<td colspan="20" align="right">
					<a target="_blank" href="prf_request?sno='.$sno.'"><img src="phar_pic/print.png" title="Print Receipt" width="100" height="80" /></a>
		
		</td>';}
		else {
			
			echo'<td colspan="20" align="right">

			
			</td>
			';
		}?>

	
</table>
</form>

<script>

		// onkeyup event will occur when the user
		// release the key and calls the function
		// assigned to this event
		function GetDetail(str) {
			if (str.length == 0) {
				document.getElementById("tqty").value = "";

				document.getElementById("uprice").value = "";
				document.getElementById("code").value = "";
				document.getElementById("qty").value = "";
				document.getElementById("ins").value = "";
				document.getElementById("rfid5").value = "";
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
							("tqty").value = myObj[0];
						
						// Assign the value received to
						// last name input field
//						document.getElementById(
	//						"page").value = myObj[1];
							
							document.getElementById(
							"uprice").value = myObj[1];
							
							
							
							document.getElementById(
							"code").value = myObj[2];
							
							document.getElementById(
							"ins").value = myObj[3];
							
							
							document.getElementById(
							"rfid5").value = myObj[4];
							
							//document.getElementById(
							//"pp").value = myObj[3];
							
							//document.getElementById(
							//"qty").value = 0;
							if(myObj[0]>0){
							document.getElementById('tqty').style.color = "green";}
else {
							document.getElementById('tqty').style.color = "red";}							

					}
				};

				// xhttp.open("GET", "filename", true);
				xmlhttp.open("GET", "purchase_out1.php?pmrn=" + str, true);
				
				// Sends the request to the server
				xmlhttp.send();
			}
		}
	</script>  
	
</body>

</html>


