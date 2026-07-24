<?php
include_once 'dbconfig.php';
?>

<?php 
    session_start();
    require('db1.php');
	$role = $_SESSION['sess_userrole'];
	
$queryc = "SELECT COUNT(utype) FROM user where '$role' in ('staff','pharmacy','mng','doctor')"; 
$resultc = mysqli_query($con, $queryc) or die(mysqli_error());
$rowc = mysqli_fetch_array($resultc);
$c1=$rowc['COUNT(utype)'];
	
    if(!isset($_SESSION['sess_username']) || $c1==0){
      header('Location: login2?err=2');
    }
?>




<?php
$url1=$_SERVER['REQUEST_URI'];
//header("Refresh: 5; URL=$url1");
$user=$_SESSION['sess_username'];
$id=$_REQUEST['id'];
?>

<?php
/*
Author: Javed Ur Rehman
Website: https://www.allphptricks.com/
*/

require('db1.php');
//include("auth.php");

$queryd = "SELECT * from medicine where code='".$id."'"; 
$resultd = mysqli_query($con, $queryd) or die ( mysqli_error());
$rowd = mysqli_fetch_assoc($resultd);
$eid=$rowd['eid'];



	  $queryr = "SELECT SUM(req_qty) from medi_stock where code='".$eid."' and status='Pending'"; 
$resultr = mysqli_query($con, $queryr) or die ( mysqli_error());
$rowr = mysqli_fetch_assoc($resultr);
$cc=1;

$sum3=$rowr['SUM(req_qty)'];


?>

<!DOCTYPE html>
<html lang="en" >

<head>
  <meta charset="UTF-8">
  <title>Sign Up Form</title>
  
    

  
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
  
  height: 10px;
  margin: 0;
  outline: 0;
  padding: 15px;
  width: 100%;
  background-color: #e8eeef;
  color: red;
  font-weight: bold;
  box-shadow: 0 1px 0 rgba(0,0,0,0.03) inset;
  margin-bottom: 30px;
}


input[type="radio"],
input[type="checkbox"] {
  margin: 0 4px 8px 0;
}

select {
  padding: 6px;
  height: 10px;
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
  width: 20%;
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
    max-width: 2000px;
  }

}






* {
    box-sizing: border-box;
}
#data {
    overflow:hidden;
    padding:0;
	width:94vw;
	
}
select {
	padding:0;
	padding-left:1px;
	border:none;
	background-color:#eee;
	width:100vw;
	white-space: normal;
	height:200px;
}
option {
	height:40px;
	width:52px;
	border:1px solid #000;
	background-color:white;
	margin-left:-1px;
	display:inline-block;
}

img {
  border: 1px solid #ddd;
  border-radius: 4px;
  padding: 5px;
  width: 175px;
  height: 175px;
}

img:hover {
  box-shadow: 0 0 2px 1px rgba(0, 140, 186, 0.5);
}


.container {
            width:800px;
            height:990px;
            background-color:lightgreen;
            padding-top:20px;
            padding-left:15px;
            padding-right:15px;
        }
        #st-box {
            
			float:left;
            margin-left:0px;
			width:100%;
            height:260px;
			background-color:white;
			
            border:solid black;
			font-weight:bold;
			font-size:14px;
			color:#8B0000;
			margin-bottom:30px;
        }
		
		
		#st-box1 {
            
			float:left;
            margin-left:0px;
			width:630px;
            height:260px;
			background-color:white;
			
            border:solid black;
			font-weight:bold;
			font-size:14px;
			color:#FA8072;
			margin-bottom:30px;
        }
		
		#st-box2 {
            
			float:left;
            margin-left:0px;
			width:100%;
            height:260px;
			background-color:white;
			
            border:solid black;
			font-weight:bold;
			font-size:14px;
			color:red;
			margin-bottom:30px;
        }
        #nd-box {
            float:left;
            width:180px;
            height:160px;
            background-color:white;
            border:solid black;
            margin-left:20px;
        }
        #rd-box {
            float:left;
            margin-left:90px;
			width:380px;
            height:260px;
            background-color:white;
            border:solid black;
			font-weight:bold;
			font-size:20px;
			color:;
        }
        h1 {
            color:Green;
        }
      </style>

    
<link rel="stylesheet" href="jsnew/bootstrap.min.css" />  
    <script src="jsnew/jjquery.min.js"></script>
    <script src="jsnew/bootstrap.min.js"></script>
   <link href="jsnew/jquery-ui.css" rel="stylesheet" />
    
    <script src="jsnew/jquery-1.12.4.js"></script>
    <script src="jsnew/jquery-ui.js"></script>
  
  




  <style type="text/css">
<!--
.style1 {font-weight: bold}
-->
  </style>
  

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
return confirm("Are you Sure to Reveive this Sample ?");
}

</script>

<script type="text/javascript">
function confirm_click2()
{
return confirm("Are you Sure to Reject this Sample ?");
}

</script>
<script src="jsnew/pprefixfree.min.js"></script>



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
			minDate: new Date(currentYear, currentMonth, currentDate),
			maxDate: new Date(currentYear, currentMonth, currentDate+6)
		});
		
		$('#datepicker1').datepicker({
			minDate: new Date(currentYear, currentMonth, currentDate),
			maxDate: new Date(currentYear, currentMonth, currentDate+6)
		});
	});
</script>


  
          <head>  
           <title>Webslesson Tutorial | PHP Ajax Update MySQL Data Through Bootstrap Modal</title>  
           
		   <link rel="stylesheet" href="jsnew/bootstrap.min.css" />  
    <script src="jsnew/jjquery.min.js"></script>
    <script src="jsnew/bootstrap.min.js"></script>
   <link href="jsnew/jquery-ui.css" rel="stylesheet" />
    
    
    <script src="jsnew/jquery-ui.js"></script>
	
	
      </head>  







<body>
<script language="JavaScript">
	function ClickCheckAll(vol)
	{
	
		var i=1;
		for(i=1;i<=document.frmMain1.hdnCount.value;i++)
		{
			if(vol.checked == true)
			{
				eval("document.frmMain1.chkDel"+i+".checked=true");
			}
			else
			{
				eval("document.frmMain1.chkDel"+i+".checked=false");
			}
		}
	}

	function onDelete()
	{
		if(confirm('Do you want to Add the Medicine ?')==true)
		{
			return true;
			
		}
		else
		{
			return false;
			
		}
	}
	
	
	
</script>


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
   
   
   <li class='active has-sub'><a href='#'><span>Search</span></a>
      <ul>
         <li class='last'><a href='categoryphar'><span>Categorywise Medicine</span></a></li>
		 <li class='last'><a href='genericsearch'><span>Generic Name wise Medicine</span></a></li>
            
         
      </ul>
      <li class='last'><a href='imoinviewphar'><span>Inpatient</span></a></li>
	  
	  <li class='last'><a href='addmedicine'><span>Add Medicine</span></a></li>
	  <li class='last'><a href='pendingrequest'><span>Pending Request</span></a></li>
      <li class='last'><a href='logout'><span>LOGOUT</span></a></li>

</div>


<p align="center" class="style1">WelCome To Pharmacy Module </p> 


<div style="font-size:22px;color:red; height:180px; width:180px; position: relative;left:550px;bottom:0px;top:-7px;border: 3px solid #73AD21;"><img src="phar_pic/medicine_png.png" alt="Paris"></div>


<div class="container">

<div id="st-box2">
<table width="100%" height ="100px" border="1" align="center" bgcolor="#FFFF99" style="border-collapse:collapse;">
  
    <p style="color:green;font-size:22px; font-weight:bold;">
	
	Pending Stock Request
	&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
	&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
	&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
	&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
	&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
	&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
	&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
	&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
	&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
	
	
	
	<?php echo "Total Pedning Request- ". $sum3; ?>
	</p>


  <tr>
      <th ><strong>S.No</strong></th>
	  <th ><strong>Request Location</strong></th>
      <th ><strong>Code</strong></th>
	  <th ><strong>Brand</strong></th>
    
      <th ><strong>Request Qty</strong>
      
	  
	        

	   </tr>
  </thead>
  <tbody>
  
    <?php
	
$user=$_SESSION["sess_username"];
$date= date('m/d/Y');
//$id =$_GET['id'];
$gg=$rowd['eid'];
$count=1;
$sel_query="Select * from medi_stock where code='$id' and status='Pending' ORDER BY id desc;";

$result = mysqli_query($con,$sel_query);
while($row = mysqli_fetch_assoc($result)) { ?>
    <tr>

      <td align="center"><?php echo $count; ?></td>
	  
	  
	  <td align="center"><?php echo $row["req_loc"]; ?></td>
      <td align="center"><?php echo $row["code"]; ?></td>
	  
	  
	  	
	  
	  
	  

 
      <td align="center"><?php echo $row["b_name"]; ?></td>

      
	  <td align="center"><?php echo $row["req_qty"]; ?></td>
	  
	  
	  
	  


	  

      
    

	  
	 
      
	  <td align="center"colspan="1"><input type="button" name="edit" value="" id="<?php echo $row["id"]; ?>" class="btn btn-info btn-xs edit_data" /></td>  		  	  
	  
	  

 

	  

      </tr>
    <?php $count++; } ?>
	</table></div>








<div id="st-box">

<p style="color:green;font-size:22px; font-weight:bold;">
	
	Last 5 PO
	
	</p>
<table width="100%" height ="100px" border="1" align="center" bgcolor="#FFFF99" style="border-collapse:collapse;">
  
    


  <tr>
      <th ><strong>S.No</strong></th>
	  <th ><strong>Request Department</strong></th>
	  <th ><strong>PO Date</strong></th>
      <th ><strong>Code</strong></th>
	  <th ><strong>Brand</strong></th>
      <th ><strong>Stock During PO</strong></th>
      <th ><strong>Order Qty</strong>
      <th ><strong>Unit Price</strong>   
	  <th ><strong>Total Price</strong>   
	  <th ><strong>Vendor</strong></th>
	        

	   </tr>
  </thead>
  <tbody>
  
    <?php
	
$user=$_SESSION["sess_username"];
$date= date('m/d/Y');
//$id =$_GET['id'];
$gg=$rowd['ename'];
$count=1;
$sel_query="Select * from po_table1 where code='$id' ORDER BY id desc limit 5;";

$result = mysqli_query($con,$sel_query);
while($row = mysqli_fetch_assoc($result)) { ?>
    <tr>

      <td align="center"><?php echo $count; ?></td>
	  
	   <?php
	  $po_ono=$row['po_ono'];
	  
	  $queryr = "SELECT * from po_table where ono='".$po_ono."'"; 
$resultr = mysqli_query($con, $queryr) or die ( mysqli_error());
$rowr = mysqli_fetch_assoc($resultr);
$cc=1;

$creditor=$rowr['creditor_code'];
$issue_date=$rowr['issue_date'];
$r_dept=$rowr['req_department'];

	  
	  
	  ?>
	  <td align="center"><?php echo $r_dept; ?></td>
	  <td align="center"><?php echo $issue_date; ?></td>
      <td align="center"><?php echo $row["code"]; ?></td>
	  
	  
	  	
	  
	  
	  

 
      <td align="center"><?php echo $row["brand"]; ?></td>

      <td align="center"><?php echo $row["stock"]; ?></td>
	  <td align="center"><?php echo $row["o_qty"]; ?></td>
	  <td align="center"><?php echo $row["uprice"]; ?></td>
	  <td align="center"><?php echo $row["tprice"]; ?></td>
	  <td align="center"><?php echo $creditor; ?></td>
	  
	  


	  

      
    

	  
	 
      
	  <td align="center"colspan="1"><input type="button" name="edit" value="" id="<?php echo $row["id"]; ?>" class="btn btn-info btn-xs edit_data" /></td>  		  	  
	  
	  

 

	  

      </tr>
    <?php $count++; } ?>
	</table></div>
	
	
	
	
	
	
	<div id="st-box1">
	<p style="color:green;font-size:22px; font-weight:bold;">
	
	Product Details
	
	</p>
	
<table width="100%" height ="100px" border="1" align="center" bgcolor="#FFFF99" style="border-collapse:collapse;">
  
    


  <tr>
      <th ><strong>S.No</strong></th>
      <th ><strong>Generic Name</strong></th>
	  <th ><strong>Available Vendor</strong></th>
      <th ><strong>Brand Name</strong></th>
      <th ><strong>Company Name</strong>
      <th ><strong>Stock In Hand</strong>   
	  <th ><strong>Per Level</strong>   
	  
	        

	   </tr>
  </thead>
  <tbody>
  
    <?php
	
$user=$_SESSION["sess_username"];
$date= date('m/d/Y');
//$id =$_GET['id'];
$count=1;
$sel_query="Select * from medicine where code='$id' ORDER BY id desc;";

$result = mysqli_query($con,$sel_query);
while($row = mysqli_fetch_assoc($result)) { ?>
    <tr>

      <td align="center"><?php echo $count; ?></td>
      <td align="center"><?php echo $row["code"]; ?></td>
	  
	  
	  	 <?php
	  $cid=$row['id'];
	  
	  $queryr = "SELECT * from add_com_product where mid='".$cid."' and location='Purchase'"; 
$resultr = mysqli_query($con, $queryr) or die ( mysqli_error());
//$rowr = mysqli_fetch_assoc($resultr);
$cc=1;

$ccode=$row['code'];


	  
	  $queryrv = "SELECT SUM(add_qty) from medi_stock where code='".$ccode."' and location='store' and add_qty>0"; 
$resultrv = mysqli_query($con, $queryrv) or die ( mysqli_error());
$rowrv = mysqli_fetch_assoc($resultrv);
$sum=$rowrv['SUM(add_qty)'];
	  ?>
	  
	  
	  <td align="left"><?php while($rowr = mysqli_fetch_assoc($resultr)) { ?>
	  
	  <?php 
	  if($rowr['status']=='Active'){echo "
	  
	  <span style='color:green;font-weight:bold'>
	  <a  target='_blank' href='vendor_price_product.php?id=".$id."'>
	  
	  ".$cc.".".$rowr['company']."</a></span><br>";}
	  
	  else {echo "
	  
	  <span style='color:red;font-weight:bold'>
	  <a  target='_blank' href='vendor_price_product.php?id=".$id."'>
	  
	  ".$cc.".".$rowr['company']."</a></span><br>";}?>
	  
	  <?php $cc++;} ?>

 
      <td align="center"><?php echo $row["brand1"]; ?></td>

      <td align="center"><?php echo $row["brand2"]; ?></td>
	  <td align="center"><?php echo $sum; ?></td>
	  <td align="center"><?php echo $row["per_qty"]; ?></td>
	  


	  

      
    

	  
	 
      
	  <td align="center"colspan="1"><input type="button" name="edit" value="" id="<?php echo $row["id"]; ?>" class="btn btn-info btn-xs edit_data" /></td>  		  	  
	  
	  

 

	  

      </tr>
    <?php $count++; } ?>
	</table><br></div>
	
	
	<div id="rd-box">
	<p style="color:green;font-size:22px; font-weight:bold;">
	
	Available Vendor(s) and Price
	
	</p>
	<table width="100%" height ="100px" border="1" align="center" bgcolor="#FFFF99" style="border-collapse:collapse;">
	  <tr>
	  
      <th ><strong>S.No</strong></th>
      
	  <th ><strong>Available Vendor</strong></th>
      <th ><strong>Price</strong></th>
	  <th ><strong>Brand</strong></th>
      
            

	   </tr>
  </thead>
  <tbody>
  
     <?php
	
$user=$_SESSION["sess_username"];
$date= date('m/d/Y');
//$id =$_GET['id'];
$count=1;
$sel_query="Select * from add_com_product where mid='$id' and location='Purchase' ORDER BY status asc;";

$result = mysqli_query($con,$sel_query);
while($row = mysqli_fetch_assoc($result)) { ?>
    <tr>

      <td align="center"><?php echo $count; ?></td>
      <td align="center"><a  target='_blank' href='vendor_price_product.php?id=<?php echo $id;?>'><?php echo $row["company"]; ?></a></td>
	  <td align="center"><?php echo $row["price"]; ?></td>
	  <td align="center"><?php if($row["status"]=='Active'){echo '<span style="color:green;font-size:20px;font-weight:bold">'.$row["status"].'</span>';}else if($row["status"]!='Active'){echo '<span style="color:red;font-size:20px;font-weight:bold">'.$row["status"].'</span>';} ?></td>
	  
      
    

	  
	 
      
	  
	  <td align="center"colspan="1"><input type="button" name="edit" value="Update" id="<?php echo $row['id']; ?>" class="btn btn-info btn-xs edit_data1" /></td>  		  	  
	  

 

	  

      </tr>
    <?php $count++; } ?>
	
	
  </tbody>
</table>
</div>

</div>
</body>
<div id="dataModal" class="modal fade">  
      <div class="modal-dialog">  
           <div class="modal-content">  
                <div class="modal-header">  
                     <button type="button" class="close" data-dismiss="modal">&times;</button>  
                     <h4 class="modal-title"></h4>  
                </div>  
                <div class="modal-body" id="employee_detail">  
                </div>  
                <div class="modal-footer">  
                     <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>  
                </div>  
           </div>  
      </div>  
 </div>  
 <div id="add_data_Modal" class="modal fade">  
      <div class="modal-dialog">  
           <div class="modal-content">  
                <div class="modal-header">  
                     <button type="button" class="close" data-dismiss="modal">&times;</button>  
                     <h4 class="modal-title">Add Product List Form</h4>  
                </div>  
                <div class="modal-body">  
                     <form method="post" id="insert_form" name="frmMain2">  
                          
                          
						  <input type="text" name="address" id="address" /> 
<script type="text/javascript">
		
			var name = $("#address").val();
		
		
	</script>						      
<?php 
//echo $name=var name = $("#address").val();
?>
							  
                          <input type="hidden" name="id" id="id" /> 
						  <input type="hidden" name="uprice" id="uprice" /> 
						  <input type="hidden" name="alert" id="alert" /> 
						   <input type="hidden" name="pre" id="pre" /> 
						  
						  <select class="country"
					multiple="true"
					style="width: 500px; height: 20px;" name="coun[]">
				
				<?php
				
				/* $cid=$row['id'];
	$stmt5 = $DB_con->prepare("select * from `add_com_product` where cid='$cid'");
	$stmt5->execute();
	while($row5=$stmt5->fetch(PDO::FETCH_ASSOC))
	{
		?>
        <option value="<?php echo $row5['product']; ?>"selected><?php echo $row5['product']; ?></option>
        <?php
	} */
?>
				
				
				
				
				<?php
	$stmt = $DB_con->prepare("select * from `medicine` where status='Active'");
	$stmt->execute();
	while($row=$stmt->fetch(PDO::FETCH_ASSOC))
	{
		?>
        <option value="<?php echo $row['mname']; ?>"><?php echo $row['mname']; ?></option>
        <?php
	} 
?>

			</select>
			
            
       
                          <input type="hidden" name="employee_id" id="employee_id" />  
                          <input type="submit" name="insert" id="insert45" value="Insert" class="btn btn-success" />  
                     </form>  
                </div>  
                <div class="modal-footer">  
                     <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>  
                </div>  
           </div>  
      </div>  
 </div>  
<script>  
 $(document).ready(function(){  
      $('#add').click(function(){  
           $('#insert').val("Insert");  
           $('#insert_form')[0].reset();  
      });  
      $(document).on('click', '.edit_data', function(){  
           var employee_id = $(this).attr("id");  
           $.ajax({  
                url:"add_vendor_medi_ppp.php",  
                method:"POST",  
                data:{employee_id:employee_id},  
				
                dataType:"json",  
                success:function(data){  
                    
                     $('#address').val(data.ename); 

					 		
                     $('#result').val(data.brand1); 
					 
					$('#id').val(data.id);					 
					 
					
					  
                     
					 
                     $('#employee_id').val(data.id);  
                     $('#insert45').val("ADD");  
                     $('#add_data_Modal').modal('show');  
                }  
				 
				 
				 
				
				
           });  
      });  
      $('#insert_form').on("submit", function(event){  
           event.preventDefault();  
           if($('#name').val() == "")  
           {  
                alert("MRN is required");  
           }  
           else if($('#address').val() == '')  
           {  
                alert("Medicine is required");  
           }  
           else if($('#designation').val() == '')  
           {  
                alert("Dosage is required");  
           }  
           else if($('#age').val() == '')  
           {  
                alert("Age is required");  
           }  
           else  
           {  
                $.ajax({  
                     url:"new_product_add22.php",  
                     method:"POST",  
                     data:$('#insert_form').serialize(),  
                     beforeSend:function(){  
                          $('#insert').val("Inserting");  
                     },  
                     success:function(data){  
                          $('#insert_form')[0].reset();  
                          $('#add_data_Modal').modal('hide');  
                          $('#employee_table').html(data);  
						  
						  
						  
						  parent.location.reload();
                     }  
                });  
           }  
      });  
      $(document).on('click', '.view_data', function(){  
           var employee_id = $(this).attr("id");  
           if(employee_id != '')  
           {  
                $.ajax({  
                     url:"selectmodallab.php",  
                     method:"POST",  
                     data:{employee_id:employee_id},  
                     success:function(data){  
                          $('#employee_detail').html(data);  
                          $('#dataModal').modal('show');  
                     }  
                });  
           }            
      });  
 });  
 
  
 </script>
 
 <script>
			$(document).ready(function () {
				//Select2
				$(".country").select2({
					maximumSelectionLength: 50,
				});
				//Chosen
				/*$(".country1").chosen({
					max_selected_options: 20,
				});*/
			});
		</script>
		



		<!--These jQuery libraries for
		chosen need to be included-->
		
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
	
	
	
	
	
	<div id="dataModal" class="modal fade">  
      <div class="modal-dialog">  
           <div class="modal-content">  
                <div class="modal-header">  
                     <button type="button" class="close" data-dismiss="modal">&times;</button>  
                     <h4 class="modal-title"></h4>  
                </div>  
                <div class="modal-body" id="employee_detail1">  
                </div>  
                <div class="modal-footer">  
                     <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>  
                </div>  
           </div>  
      </div>  
 </div>  
 <div id="add_data_Modal1" class="modal fade">  
      <div class="modal-dialog">  
           <div class="modal-content">  
                <div class="modal-header">  
                     <button type="button" class="close" data-dismiss="modal">&times;</button>  
                     <h4 class="modal-title">Add List Form</h4>  
                </div>  
                <div class="modal-body">  
                     <form method="post" id="insert_form1" name="frmMain21">  
                          
                          
						  <input type="text" name="address1" id="address1" /> 
						  <input type="text" name="price" id="price" /> 
							  
                          <input type="hidden" name="id1" id="id1" /> 
						  <input type="hidden" name="uprice1" id="uprice1" /> 
						  <input type="hidden" name="mid" id="mid" /> 
						  <input type="hidden" name="alert1" id="alert1" /> 
						   <input type="hidden" name="pre1" id="pre1" /> 
						  
						  <select style="width: 500px; height: 20px;" name="coun1" id="coun1">
						  <option value=""selected></option>
						  <option value="Active">Active</option>
						  <option value="Inactive">Inactive</option>
						  </select>
				
				
				
				
			
        
        

			
			
            
       
                          <input type="hidden" name="employee_id1" id="employee_id1" />  
                          <input type="submit" name="insert" id="insert451" value="Insert" class="btn btn-success" />  
                     </form>  
                </div>  
                <div class="modal-footer">  
                     <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>  
                </div>  
           </div>  
      </div>  
 </div>  
<script>  
 $(document).ready(function(){  
      $('#add').click(function(){  
           $('#insert').val("Insert");  
           $('#insert_form1')[0].reset();  
      });  
      $(document).on('click', '.edit_data1', function(){  
           var employee_id1 = $(this).attr("id");  
           $.ajax({  
                url:"add_vendor_medi_pp1_1_p.php",  
                method:"POST",  
                data:{employee_id1:employee_id1},  
				
                dataType:"json",  
                success:function(data){  
                    
                     $('#address1').val(data.product); 

					 		
                     $('#price').val(data.price); 
					 $('#coun1').val(data.status); 
					 $('#mid').val(data.mid); 
					 
					$('#id1').val(data.id);					 
					 
					
					  
                     
					 
                     $('#employee_id1').val(data.id);  
                     $('#insert451').val("ADD");  
                     $('#add_data_Modal1').modal('show');  
                }  
				 
				 
				 
				
				
           });  
      });  
      $('#insert_form1').on("submit", function(event){  
           event.preventDefault();  
           if($('#address1').val() == "")  
           {  
                alert("MRN is required");  
           }  
           else if($('#price').val() == '')  
           {  
                alert("Medicine is required");  
           }  
           
           else  
           {  
                $.ajax({  
                     url:"new_product_add22_2.php",  
                     method:"POST",  
                     data:$('#insert_form1').serialize(),  
                     beforeSend:function(){  
                          $('#insert').val("Inserting");  
                     },  
                     success:function(data){  
                          $('#insert_form1')[0].reset();  
                          $('#add_data_Modal1').modal('hide');  
                          $('#employee_table').html(data);  
						  
						  
						  
						  parent.location.reload();
                     }  
                });  
           }  
      });  
      $(document).on('click', '.view_data', function(){  
           var employee_id1 = $(this).attr("id");  
           if(employee_id1 != '')  
           {  
                $.ajax({  
                     url:"selectmodallab.php",  
                     method:"POST",  
                     data:{employee_id1:employee_id1},  
                     success:function(data){  
                          $('#employee_detail').html(data);  
                          $('#dataModal1').modal('show');  
                     }  
                });  
           }            
      });  
 });  
 
  
 </script>
 
 
</html>

	
	
	
	