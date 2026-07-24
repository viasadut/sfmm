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
$medi1=$_REQUEST['medi1'];
$pdos=$_REQUEST['pdos'];


//$pmrn=$data1["pmrn"];
//$pname=$data1["pname"];
$date1 = date('m/d/Y');
//$id=$row1["id"];

if (!is_numeric($medi1)) {
  



$db = mysqli_connect('localhost','root','Godiloveu16');
mysqli_select_db($db,'sfmmkpjnew');
$sel1=mysqli_query($db,"SELECT * FROM storenew WHERE `ename`='$medi1';");
$result1 = mysqli_fetch_assoc($sel1);
$dcode=$result1["eid"];
$price=$result1["price"];
$priceold=$result1["priceold"];


$sel14=mysqli_query($db,"SELECT * FROM storenew WHERE `eid`='$medi1';");
$result14 = mysqli_fetch_assoc($sel14);
$dcode4=$result14["eid"];
$price4=$result14["price"];
$priceold4=$result1["priceold4"];



$sel990="SELECT * FROM storenew WHERE `ename`='$medi1';";
$result990 = mysqli_query($con,$sel990);
//$result2 = mysqli_fetch_assoc($con,$sel990);
//$dcode=$result2['dcode'];

$query3 = "SELECT * FROM othoscharge where pmrn= '$pmrn' and eid='$id' and date='$date1' and medi='$medi1'"; 
	 
$result3 = mysqli_query($con, $query3);

// Print out result

$query4 = "SELECT * FROM othoscharge where pmrn= '$pmrn' and eid='$id' and date='$date1'and medi='$medi1'"; 
	 
$result4 = mysqli_query($con, $query4);

$row3 = mysqli_fetch_array($result4);
$pdos1=$row3['pdos'];
$pdos2=$row3['pdos']+$pdos;
$pp1=$pdos *$price;
$pp2=$pdos2*$price;

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
		
		
		$ins_query1="Update othoscharge set pdos='$pdos2',ins='$pp2' where eid='$id' and pmrn='$pmrn' and medi='$medi1'";
mysqli_query($con,$ins_query1) or die(mysql_error());
		
		
	}


  else if($res90=mysqli_num_rows($result3)>0 and $price<=0){
		
		
		$ins_query1="Update othoscharge set pdos='$pdos2',ins='$pp4' where eid='$id' and pmrn='$pmrn' and medi='$medi1'";
mysqli_query($con,$ins_query1) or die(mysql_error());
		
		
	}

		
  else if($res90=mysqli_num_rows($result3)<=0 and $price>0){
$ins_query1="insert into othoscharge (`pmrn`,`pname`,`medi`,`eid`,`date`,`pdos`,`code`,`ins`,`nuser`) values 
('$pmrn','$pname','$medi1','$id','$date1','$pdos','$dcode','$pp1','$user')";
mysqli_query($con,$ins_query1) or die(mysql_error());


}


else if($res90=mysqli_num_rows($result3)<=0 and $price<=0){
  $ins_query1="insert into othoscharge (`pmrn`,`pname`,`medi`,`eid`,`date`,`pdos`,`code`,`ins`,`nuser`) values 
  ('$pmrn','$pname','$medi1','$id','$date1','$pdos','$dcode','$pp3','$user')";
  mysqli_query($con,$ins_query1) or die(mysql_error());
  
  
  }

}



else if (is_numeric($medi1)) {
  



$db = mysqli_connect('localhost','root','Godiloveu16');
mysqli_select_db($db,'sfmmkpjnew');
$sel1=mysqli_query($db,"SELECT * FROM storenew WHERE `eid`='$medi1';");
$result1 = mysqli_fetch_assoc($sel1);
$dcode=$result1["eid"];
$price=$result1["price"];
$priceold=$result1["priceold"];

$d_name=$result1["ename"];





$sel990="SELECT * FROM storenew WHERE `eid`='$medi1';";
$result990 = mysqli_query($con,$sel990);
//$result2 = mysqli_fetch_assoc($con,$sel990);
//$dcode=$result2['dcode'];

$query3 = "SELECT * FROM othoscharge where pmrn= '$pmrn' and eid='$id' and date='$date1' and code='$medi1'"; 
	 
$result3 = mysqli_query($con, $query3);

// Print out result

$query4 = "SELECT * FROM othoscharge where pmrn= '$pmrn' and eid='$id' and date='$date1'and code='$medi1'"; 
	 
$result4 = mysqli_query($con, $query4);

$row3 = mysqli_fetch_array($result4);
$pdos1=$row3['pdos'];
$pdos2=$row3['pdos']+$pdos;
$pp1=$pdos *$price;
$pp2=$pdos2*$price;


$pp3=$pdos *$priceold;
$pp4=$pdos2*$priceold;


$sel990="SELECT * FROM storenew WHERE `eid`='$medi1';";
$result990 = mysqli_query($con,$sel990);


if($res990=mysqli_num_rows($result990)==0)
{
 	
       echo '<script language="javascript">';
    echo 'alert("Unsuccessful !!! The Item Name is not in the Database List.. Please contact with IT Department"); ';
    echo '</script>';
    }



else if($res90=mysqli_num_rows($result3)>0 and $price>0){
		
		
		$ins_query1="Update othoscharge set pdos='$pdos2',ins='$pp2' where eid='$id' and pmrn='$pmrn' and code='$medi1'";
mysqli_query($con,$ins_query1) or die(mysql_error());
		
		
	}

  else if($res90=mysqli_num_rows($result3)>0 and $price<=0){
		
		
		$ins_query1="Update othoscharge set pdos='$pdos2',ins='$pp4' where eid='$id' and pmrn='$pmrn' and code='$medi1'";
mysqli_query($con,$ins_query1) or die(mysql_error());
		
		
	}


		
  else if($res90=mysqli_num_rows($result3)<=0 and $price>0){
$ins_query1="insert into othoscharge (`pmrn`,`pname`,`medi`,`eid`,`date`,`pdos`,`code`,`ins`,`nuser`) values 
('$pmrn','$pname','$d_name','$id','$date1','$pdos','$medi1','$pp1','$user')";
mysqli_query($con,$ins_query1) or die(mysql_error());


}

else if($res90=mysqli_num_rows($result3)<=0 and $price<=0){
  $ins_query1="insert into othoscharge (`pmrn`,`pname`,`medi`,`eid`,`date`,`pdos`,`code`,`ins`,`nuser`) values 
  ('$pmrn','$pname','$d_name','$id','$date1','$pdos','$medi1','$pp3','$user')";
  mysqli_query($con,$ins_query1) or die(mysql_error());
  
  
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
  <title>storenew</title>
  
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
        <table align="center" class="table table-bordered" id="dynamic_field" width="100%"> 
<tr><td colspan="20" align="center"bgcolor="lightgreen"><label><strong>ADD HOSPITAL CHARGES</strong></label></td> </tr>
<tr>
<td colspan="2" align="center"><label><strong>Select Used Items</strong></label></td> 
<td colspan="12" align="center"><label><strong>Name</strong></label></td> 

<td colspan="2" align="center"><label><strong>A. QTY</strong></label></td> 
<td colspan="2" align="center"><label><strong>Used QTY</strong></label></td> 
<td colspan="2" align="center"><label><strong>Remarks</strong></label></td> 

</tr>
<tr>
<td colspan="2" align="center"><input type="text" id="pmrn" onkeyup="GetDetail(this.value)" class="form-control" list="browsers2" autocomplete="off" name='medi1' required style="font-weight: bold;font-size:22px;color:green">
  <datalist id="browsers2">

						<option value=''>-Select Items</option>
					<?php
            require('db1.php');
            $uname = '';
            //$query = "select * from `purchase_stock` where add_qty>0 and location='OT medicine store' and status='Served'";
            $query = "select * from `storenew` where estatus='Active'";
            $result = mysqli_query($con, $query);
            while($row = mysqli_fetch_array($result)) {
        ?>
            <option value="<?php echo $row['eid']; ?>"><?php echo $row['ename'].','.$row['eid']; ?></option>
        <?php } ?>  </datalist></td>

<td colspan="12"><input type="text" name="medi1" class="form-control" id="gname" required value="" readonly style="font-weight: bold;font-size:12px;color:green"></td>
<td colspan="2"><input type="text" name="tqty" class="form-control" id="tqty" required value="" readonly style="font-weight: bold;font-size:22px;color:green"></td>


		
			<td  colspan="2"align="center"><input type="number" name="pdos" class="form-control" required style="font-weight: bold;font-size:22px;color:green">
 
</td>





<td colspan="2"><input type="text" name="remarks" id=""  value=""  style="font-weight: bold;font-size:22px;color:green"></td>


</tr>			        


		
				<?php if($ot_charge=='')
{ echo'<tr>
<td colspan="20"align="right"><button type="submit" name="Submit1">ADD</button></td></tr>';}

else {
	
	echo '<tr><td colspan="20"align="right"><button type="submit" name="Submit1" disabled><font size="4.5" color="#FF000"><b>Charge Already Confirmed</button></td></tr>';
}
	  ?>

		
		
		
	  
</form>

</table>
 <table align="center" class="table table-bordered" id="dynamic_field"> 
<tr>
      <td colspan="1" align="center"><strong>S.No</strong></td>
     <td colspan="10" align="center"><strong>ITEM</strong></td>
      
     	  
      	  <td colspan="2" align="center"><strong>QTY In Hand</strong></td>
		  <td colspan="2" align="center"><strong>QTY</strong></td>
		        	  <td colspan="4" align="center"><strong>DELETE</strong></td>
       

	   </tr>
 <?php
	
$user=$_SESSION["sess_username"];
$pmrn=$_REQUEST["pmrn"];
$id=$_REQUEST["id"];
//$dname=$_REQUEST["dname"];
//$id1=$_REQUEST["ID"];

//$id=$_REQUEST["id"];
//$episode=$data59["eid"];

$count=1;
$sel_query="Select * from othoscharge where pmrn= '$pmrn' and eid='$id'order by `id` DESC;";

$result = mysqli_query($con,$sel_query);

while($row = mysqli_fetch_assoc($result)) 
{ ?>    <tr>

      <td align="center" colspan="1"><?php echo $count; ?></td>
<td align="center"colspan="10"><?php echo $row["medi"]; ?></td>
      
	        
				        <td align="center"colspan="2"><?php echo $row["aqty"]; ?></td>
						<td align="center"colspan="4"><?php echo $row["pdos"]; ?></td>
			      
				  
				  
				  		  				<?php if($ot_charge=='')
{ echo'

			      
				 <td align="center" colspan="2"><a href="othosdelete1_new1?id='.$row["id"].'&pmrn='.$pmrn.'&eid='.$id.'&rfid='.$row["rfid"].'&reuse='.$row["reuse"].'&pdos='.$row["pdos"].'">DELETE</a></td>';
				 
}
				 
				 else {
				echo '<td align="center" colspan="2">Charge Already Confirmed</a></td>';	 
					 
				 }

  	  
	  
	  ?>
				  
				 

  	  

	  
      </tr>
    <?php $count++; } ?>
	<tr><td align="right" colspan="20"><button onclick="self.close()">Close</button></td></tr>
</table>

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
							("gname").value = myObj[0];
						
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
				xmlhttp.open("GET", "purchase_stock_test2_new2.php?pmrn=" + str, true);
				
				// Sends the request to the server
				xmlhttp.send();
			}
		}
	</script>  