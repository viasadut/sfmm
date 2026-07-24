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

$db = mysqli_connect('localhost','root','Godiloveu16');
mysqli_select_db($db,'sfmmkpjnew');

$query4 = mysqli_query($db,"select * from inpatient where pmrn='$pmrn' and eid='$eid' and discharge=''");
$data = mysqli_fetch_assoc($query4);
//$ddd=$data['dname'];
$pname=$data['pname'];


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
$medi6=$_REQUEST['item'];


$pdos=$_REQUEST['pdos'];
$price=$_REQUEST['price'];
$qty=$_REQUEST['qty'];

//$pmrn=$data1["pmrn"];
//$pname=$data1["pname"];
$date1 = date('m/d/Y');
$date2=date('Y-m-d');
//$id=$row1["id"];


$db = mysqli_connect('localhost','root','Godiloveu16');
mysqli_select_db($db,'sfmmkpjnew');
$sel1=mysqli_query($db,"SELECT * FROM hits_list WHERE `id`='$medi6';");
$result1 = mysqli_fetch_assoc($sel1);
$code=$result1["code"];
//$price=$result1["price"];

$medi1=$result1['item_name'];
$parts = explode('-', $medi1);
$only = trim(end($parts));

$pms_code=$result1['pms_code'];
$doc_code=$result1['doc_code'];

//$sel9901="SELECT * FROM storenew WHERE `ename`='$medi1';";
//$result9901 = mysqli_query($con,$sel9901);
//$result2 = mysqli_fetch_assoc($con,$sel9901);
//$dcode=$result2['eid'];

$query3 = "SELECT * FROM ipd_extra_charge where pmrn= '$pmrn' and eid='$eid' and date='$date1' and medi='$medi1'"; 
	 
$result3 = mysqli_query($con, $query3);

// Print out result

$query4 = "SELECT * FROM ipd_extra_charge where pmrn= '$pmrn' and eid='$eid' and date='$date1'and medi='$medi1'"; 
	 
$result4 = mysqli_query($con, $query4);

$row3 = mysqli_fetch_array($result4);
$pdos1=$row3['pdos'];
$pdos2=$row3['pdos']+$price;
$p11=$price*$pdos;
$p12=$price*$pdos2;

if($user!=''){



$date=date('Y-m-d');

//$tb_q=mysqli_query($db,"SELECT * FROM acct_master_new WHERE item_code='$code'");
//$tb_result = mysqli_fetch_assoc($tb_q);
//print_r($tb_q);

$tb_q = "SELECT * FROM acct_master_new WHERE item_code='$code'"; 
$tb_result = mysqli_query($con, $tb_q) or die(mysqli_error());
$tb_r_data = mysqli_fetch_assoc($tb_result);

//print_r($tb_r_data);

if($tb_r_data['tb_op']!='')
{
  echo $tb_data=$tb_r_data['tb_op'];
  echo 'OPD';
}

else if($tb_r_data['tb_op']=='')
{
  echo $tb_data=$tb_r_data['tb_ip'];
  echo 'IPD';
}



die();

}

else {
	
	echo"Failed";
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
<tr><td colspan="8" align="center"><label><strong>Investigation</strong></label></td> 
<td colspan="2" align="center"><label><strong>Qty</strong></label></td> 

<td colspan="10" align="center"><label><strong>Amount</strong></label></td> 
</tr>
<tr>
<td colspan="8" align="center">




<select class="con_charge21"
                    name="item" id="con_charge1" onchange="GetDetail(this.value)">

						<option value=''>---Select--</option>
				<?php 
			/*$sql = "select * from `hits_list` where status='0'";
			$res = mysqli_query($con, $sql);
			if(mysqli_num_rows($res) > 0) {
				while($row = mysqli_fetch_object($res)) {
					echo "<option value='".$row->id."'>".$row->item_name."</option>";
				}
			}*/
			?>
      			<option value='Service Charge'>Service Charge</option>
      </select>
			
	  <script>
        $(document).ready(function(){

            $("#con_charge1").select2({
                ajax: {
                    url: "search_hits_data_dis.php",
                    type: "post",
                    dataType: 'json',
                    delay: 250,
                    data: function (params) {
                        return {
                            searchTerm: params.term // search term
                        };
                    },
                    processResults: function (response) {
                        return {
                            results: response
                        };
                    },
                    cache: true
                }
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
    $('.con_charge1').select2();
});
</script>
			
			</td>

			
      <td colspan="2" align="center"><input type="number" name="qty" value="1" id="qty" required>			
<td colspan="10" align="center"><input type="number" name="price" value="" id="price" required>
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
$sel_query="Select * from ipd_extra_charge where pmrn= '$pmrn' and eid='$eid' and delete_status='0' order by `date` DESC;";

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
						
				
			      
				 <td align="center" colspan="2"><a href="other_charge_delete_ipd?id3=<?php echo $row["id"]; ?>&pmrn=<?php echo "$pmrn"; ?>&eid=<?php echo "$eid"; ?>&code=<?php echo $row['code']; ?>&price=<?php echo $row['pdos']; ?>">DELETE</a></td>

  	  

	  
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
				document.getElementById("sformat").value = "";

				document.getElementById("charge").value = "";
				document.getElementById("porder").value = "";
				
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
							("price").value = myObj[0];
						
						// Assign the value received to
						// last name input field
//						document.getElementById(
	//						"page").value = myObj[1];
							
							/*document.getElementById(
							"charge").value = myObj[1];
							
							document.getElementById(
							"porder").value = myObj[2];
							*/
							
					}
				};

				// xhttp.open("GET", "filename", true);
				xmlhttp.open("GET", "other_data.php?pmrn=" + str, true);
				
				// Sends the request to the server
				xmlhttp.send();
			}
		}
	</script>  