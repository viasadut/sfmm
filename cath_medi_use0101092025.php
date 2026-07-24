<?php 
    session_start();
    $role = $_SESSION['sess_userrole'];
    if(!isset($_SESSION['sess_username']) || $role!="cath"){
      header('Location: login2?err=2');
    }
?>


<?php
//$url=$_SERVER['REQUEST_URI'];
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
//$ieid=$_REQUEST['ieid'];
$type=$_REQUEST['type'];
$cath_time=date('Y-m-d H:i:s');

//include("auth.php");
$pmrn=$_REQUEST['pmrn'];
$db = mysqli_connect('localhost','root','Godiloveu16');
mysqli_select_db($db,'sfmmkpjnew');
$sel9=mysqli_query($db,"SELECT * FROM cath_receive WHERE `id`='$id'");
$result9 = mysqli_fetch_assoc($sel9);
$pname=$result9["pname"];
$ieid=$result9["ieid"];  

$ot_charge=$result9['charge_confirm'];  

$url = "cath_medi_use?pmrn=$pmrn&eid=$eid&id=$id&type=$type&dname=$full&ieid=$ieid";
header("Refresh: 900; URL=$url");
?>


<?php 
require('db1.php');
if(isset($_POST['Submit1'])){
$medi12=$_REQUEST['medi1'];
$pdos=$_REQUEST['pdos'];
$tqty=$_REQUEST['tqty'];



$treat=explode(',',$medi12);
	
	$medi1=$treat[0];
	$rfid=$treat[1];



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
$t_price=$b_chk_m['u_price']*$pdos;


$sel9=mysqli_query($db,"SELECT * FROM cathmediused where pmrn= '$pmrn' and eid='$eid' and code='$code' and rfid='$rfid' and adate='$adate'");
$result9 = mysqli_fetch_assoc($sel9);
$pdos1=$result9['pdos'];
$pdos2=$result9['pdos']+$pdos;
$iid=$result9['id'];

$sel990="SELECT * FROM medi_stock WHERE `sno`='$rfid' and add_qty>0 and status in ('Served','Partially Served') and location='Cathlab';";
$result990 = mysqli_query($con,$sel990);

$sel95 = "SELECT * from medicine where code='$code' and c_code=''"; 
$result95 = mysqli_query($con,$sel95);
$charge_code = mysqli_fetch_assoc($con,$result95);

//$c_code=$charge_code['c_code'];*/




      $qq1 = mysqli_query($db,"select * from medicine where code='$code' and c_code!=''");
			$dd1 = mysqli_fetch_assoc($qq1);
			$c_code=$dd1['c_code'];
			$new_u_price=$dd1['uprice']*$pdos;
			$new_price=$dd1['uprice'];
      $charge_price=$dd1['charge_price'];
      $c_name=$dd1['charge_name'];
$new_charge_price=$charge_price*$pdos;
$new_charge_price1=$charge_price*$pdos2;

$t_price3=$pdos2*$new_price;






if($res990=mysqli_num_rows($result990)==0)
{
 	
       echo '<script language="javascript">';
    echo 'alert("Unsuccessful !!! The Medicine Name is not in your department Stock.."); ';
    echo '</script>';
    }
else if($row95=mysqli_num_rows($result95)>0  and $tqty>=$pdos)

{
$ins_query1="insert into cathmediused (`dname`,`pmrn`,`pname`,`medi`,`brand`,`pdos`,`eid`,`date`,`type`,`ieid`,`rfid`,`code`,`adate`,`price`,`cath_time`,`cath_user`) values 
('$full','$pmrn','$pname','$medi1','$bb_name','$pdos','$eid','$date1','$type','$ieid','$rfid','$code','$adate','$t_price','$cath_time','$user')";
mysqli_query($con,$ins_query1) or die(mysql_error());


$query1="update medi_stock set `add_qty`='$m_qty1' where `sno`='$rfid'";

$result1 = mysqli_query($con,$query1) or die ( mysqli_error());


$strSQL2 = "insert into phar_sale(`medi`,`qty`,`uprice`,`tprice`,`aby`,`adate`,`brand`,`pmrn`,`eid`,`rfid`,`status`,`location`,`code`) values
			('$g_name','$pdos','$u_price','$t_price','$user','$adate','$bb_name','$pmrn','$eid','$rfid','Sale','Cathlab','$code')";
			//$strSQL .="WHERE id = '".$_POST["chkDel"][$i]."' ";
			$objQuery2 = mysqli_query($con,$strSQL2);
      header("Refresh: 0; URL=$url");

    }


/*else if($row95=mysqli_num_rows($result95)>0  and $tqty>=$pdos and $pdos1!='')

{
$ins_query1="update cathmediused set pdos='$pdos2' where id='$iid'";
mysqli_query($con,$ins_query1) or die(mysql_error());


$query1="update medi_stock set `add_qty`='$m_qty1' where `sno`='$rfid'";

$result1 = mysqli_query($con,$query1) or die ( mysqli_error());


$ins_query21="update phar_sale set qty='$pdos2' where pmrn='$pmrn' and eid='$eid' and rfid='$rfid' and adate='$adate'";
mysqli_query($con,$ins_query21) or die(mysql_error());


$strSQL2 = "insert into phar_sale(`medi`,`qty`,`uprice`,`tprice`,`aby`,`adate`,`brand`,`pmrn`,`eid`,`rfid`,`status`,`location`,`code`) values
			('$g_name','1','$u_price','$u_price','$user','$adate','$bb_name','$pmrn','$eid','$rfid','Sale','Procedure Room','$code')";
			//$strSQL .="WHERE id = '".$_POST["chkDel"][$i]."' ";
			$objQuery2 = mysqli_query($con,$strSQL2);

}*/
else if($row95=mysqli_num_rows($result95)<=0)

{
$ins_query1="insert into cathmediused (`dname`,`pmrn`,`pname`,`medi`,`brand`,`pdos`,`eid`,`date`,`type`,`ieid`,`rfid`,`reuse`,`adate`,`code`,`price`,`cath_time`,`cath_user`) values 
('$full','$pmrn','$pname','$c_name','$bb_name','$pdos','$eid','$date1','$type','$ieid','$rfid','Yes','$adate','$c_code','$new_charge_price','$cath_time','$user')";
mysqli_query($con,$ins_query1) or die(mysql_error());




$strSQL2 = "insert into phar_sale(`medi`,`qty`,`uprice`,`tprice`,`aby`,`adate`,`brand`,`pmrn`,`eid`,`rfid`,`status`,`location`,`code`,`reuse`) values
			('$c_name','$pdos','$new_charge','$new_charge_price','$user','$adate','$bb_name','$pmrn','$eid','$rfid','Sale','Cathlab','$c_code','Yes')";
			//$strSQL .="WHERE id = '".$_POST["chkDel"][$i]."' ";
			$objQuery2 = mysqli_query($con,$strSQL2);

      header("Refresh: 0; URL=$url");
}



/*else if($row95=mysqli_num_rows($result95)<=0 and $pdos1!='')

{
$ins_query1="update cathmediused set pdos='$pdos2' where id='$iid'";
mysqli_query($con,$ins_query1) or die(mysql_error());


$ins_query21="update phar_sale set qty='$pdos2' where pmrn='$pmrn' and eid='$eid' and rfid='$rfid' and adate='$adate'";
mysqli_query($con,$ins_query21) or die(mysql_error());


$strSQL2 = "insert into phar_sale(`medi`,`qty`,`uprice`,`tprice`,`aby`,`adate`,`brand`,`pmrn`,`eid`,`rfid`,`status`,`location`,`code`) values
			('$g_name','$pdos','$u_price','$u_price','$user','$adate','$bb_name','$pmrn','$eid','$rfid','Sale','Procedure Room','$code')";
			//$strSQL .="WHERE id = '".$_POST["chkDel"][$i]."' ";
			$objQuery2 = mysqli_query($con,$strSQL2);

}*/


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
<tr><td colspan="20" align="center"bgcolor="lightgreen"><label><strong>Medication Form</strong></label></td> </tr>
<tr><td colspan="10" align="center"><label><strong>Medication Used</strong></label></td> 

<td colspan="5" align="center"><label><strong>Available Qty</strong></label></td> 
<td colspan="5" align="center"><label><strong>Qty</strong></label></td> 
</tr>
<tr>
<td colspan="10" align="center"><input type="text" id="pmrn" onkeyup="GetDetail(this.value)" class="form-control action" list="categoryname" autocomplete="off" name='medi1' required style="font-weight: bold;font-size:22px;color:green">

    <datalist id="categoryname">
	<option value=''>-Select-</option>
				
				<?php
            require('db1.php');
            $uname = '';
            $query = "select * from `medi_stock` where add_qty>0 and location in('Cathlab')  and status in ('Served','Partially Served')";
            $result = mysqli_query($con, $query);
            while($row = mysqli_fetch_array($result)) {
        ?>
            <option value="<?php echo $row['g_name'].','.$row['sno']; ?>"><?php echo $row['g_name'].','.$row['sno']; ?></option>
        <?php } ?>
        
    </datalist>
			
			
			</td>
			
			<td colspan="5"><input type="text" name="tqty" id="tqty" required value="" readonly style="font-weight: bold;font-size:22px;color:green"></td>

<td  colspan="5"align="center">

<input type="number" name="pdos" class="form-control" required>
  
</td>

</tr>			        


		
	  
    <?php if($ot_charge=='')
{ echo'<tr>
<td colspan="20"align="right"><button type="submit" name="Submit1">ADD</button></td></tr>';}

else {
	
	echo '<tr><td colspan="20"align="right"><button type="submit" name="Submit1" disabled><font size="4.5" color="#FF000"><b>Charge Already Confirmed</button></td></tr>';
}
	  ?>
	  

<tr>
      <td colspan="1" align="center"><strong>S.No</strong></td>
     
      <td colspan="2" align="center"><strong>MRN</strong></td>
     	  <td colspan="10" align="center"><strong>Medication Used</strong></td>
      	  <td colspan="5" align="center"><strong>Qty</strong></td>
		        	  <td colspan="2" align="center"><strong>DELETE</strong></td>
       

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
$sel_query="Select * from cathmediused where pmrn= '$pmrn' and ieid='$ieid' and eid='$eid' order by `id` DESC;";

$result = mysqli_query($con,$sel_query);

while($row = mysqli_fetch_assoc($result)) 
{ ?>    <tr>

      <td align="center" colspan="1"><?php echo $count; ?></td>

      <td align="center"colspan="2"><?php echo $row["pmrn"]; ?></td>
	        <td align="center"colspan="10"><?php echo $row["medi"].' ('.$row["brand"].')'; ?></td>
			      <td align="center"colspan="5"><?php echo $row["pdos"]; ?></td>


  	  
          <?php if($ot_charge=='')
{ echo'

			      
				 <td align="center" colspan="2"><a href="cathhosdelete1_medi?id='.$row["id"].'&pmrn='.$row['pmrn'].'&dname='.$dname.'&eid='.$eid.'&ieid='.$ieid.'&type='.$type.'&id1='.$id.'&rfid='.$row['rfid'].'&pdos='.$row['pdos'].'&resue='.$row['reuse'].'&adate='.$row['adate'].'">DELETE</a></td>';
				 
}
				 
				 else {
				echo '<td align="center" colspan="2">Charge Already Confirmed</a></td>';	 
					 
				 }

  	  
	  
	  ?>
	  
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

				document.getElementById("uprice").value = "";
				document.getElementById("code").value = "";
				document.getElementById("qty").value = "";
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
							"pcode").value = myObj[4];
							
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
				xmlhttp.open("GET", "procedure_stock.php?pmrn=" + str, true);
				
				// Sends the request to the server
				xmlhttp.send();
			}
		}
	</script>  