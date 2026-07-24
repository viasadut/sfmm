<?php 
    session_start();
    $role = $_SESSION['sess_userrole'];
    if(!isset($_SESSION['sess_username']) || $role!="cath"){
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
//$ieid=$_REQUEST['ieid'];
$type=$_REQUEST['type'];


//include("auth.php");
$pmrn=$_REQUEST['pmrn'];
$db = mysqli_connect('localhost','root','Godiloveu16');
mysqli_select_db($db,'sfmmkpjnew');
$sel9=mysqli_query($db,"SELECT * FROM cath_receive WHERE `id`='$id'");
$result9 = mysqli_fetch_assoc($sel9);
$pname=$result9["pname"];
$ieid=$result9["ieid"];  

$ot_charge=$result9['charge_confirm'];  


$sel_all=mysqli_query($db,"SELECT SUM(qty) FROM cathhoscharge WHERE pmrn= '$pmrn' and ieid='$ieid' and eid='$eid'");
$result_all = mysqli_fetch_assoc($sel_all);
$tprice=$result_all['SUM(qty)'];

$url = "cathhoscharge?pmrn=$pmrn&eid=$eid&id=$id&type=$type&dname=$full";
//$url=$_SERVER['REQUEST_URI'];
header("Refresh: 900; URL=$url");
?>


<?php 
require('db1.php');
if(isset($_POST['Submit1'])){
$medi6=$_REQUEST['item'];
$pdos=$_REQUEST['pdos'];
$remarks=$_REQUEST['remarks'];


//$pmrn=$data1["pmrn"];
//$pname=$data1["pname"];
$date1 = date('m/d/Y');
//$id=$row1["id"];


/*$sel990=mysqli_query($db,"SELECT * FROM disposable WHERE `disname`='$medi1';");
$result990 = mysqli_fetch_assoc($sel990);
$code=$result990['dcode'];
$btype=$result990['type'];
$price=$result990['price']*$pdos;
*/

$sel990=mysqli_query($db,"SELECT * FROM hits_list WHERE `id`='$medi6';");
$result990 = mysqli_fetch_assoc($sel990);

//echo $medi1=$result990['item_name'];
$medi1 = str_replace("'", "''",$result990['item_name']);
$code=$result990['code'];
$btype=$result990['sub_type'];
$price=$result990['ipd_charge']*$pdos;



/*
$sel_p=mysqli_query($db,"SELECT COUNT(id) FROM disposable WHERE `disname`='$medi1';");
$result_p = mysqli_fetch_assoc($sel_p);
$dis_pack=$result_p['COUNT(id)'];

*/

$sel_p=mysqli_query($db,"SELECT COUNT(id) FROM set_package WHERE `iname`='$medi1';");
$result_p = mysqli_fetch_assoc($sel_p);
echo $dis_pack=$result_p['COUNT(id)'];


/*if($res990=mysqli_num_rows($result990)==0)
{
 	
       echo '<script language="javascript">';
    echo 'alert("Unsuccessful !!! The Medicine Name is not in the Database List.. Please contact with Pharmacy Department"); ';
    echo '</script>';
    }*/
//else {

  if($dis_pack<=0 and $ieid>0){
$ins_query1="insert into cathhoscharge (`dname`,`pmrn`,`pname`,`medi`,`eid`,`date`,`pdos`,`type`,`ieid`,`code`,`qty`,`ins`,`remarks`,`ctype`) values 
('$full','$pmrn','$pname','$medi1','$eid','$date1','$pdos','$type','$ieid','$code','$price','$btype','$remarks','Others')";
mysqli_query($con,$ins_query1) or die(mysql_error());

header("Refresh: 0; URL=$url");
}
  
  else if($ieid>0 and $dis_pack>0){

  //  echo "test";

    $db = mysqli_connect('localhost','root','Godiloveu16');
mysqli_select_db($db,'sfmmkpjnew');

    $query15 = mysqli_query($db,"select * from package_inves where package_name='$medi1' and status='Active'");
    while($data15 = mysqli_fetch_assoc($query15))
    //while($row = mysqli_fetch_assoc($result)) 
    {
    
      //$pack_name=$data15["package_name"];
    $ii=$data15["iname"];
    $p_price=$data15["p_price"];
    $pdos=$data15["qty"];
    $price=$data15["p_price"];
    $code=$data15["code"];
    $btype=$data15['type'];
    /*$query159 = mysqli_query($db,"select * from radio where iname='$ii'");
    $data159 = mysqli_fetch_assoc($query159);
    $type=$data159["type"];
    $price=$data159["price"];
    $code=$data15["code"];
    $subtype=$data159["subtype"];
    //echo $type;
    //echo $type;
    $url = "manual_bill1.php?pmrn=$pmrn&ID=$id"; 
    
    
    $link=$data159["link"];
    $linkv=$data159["linkv"];
    $report=$data159["report"];
    $reportv=$data159["reportv"];
    
    */
  
    
    
    //if($code!='' || $code=='')
    //{
    
    
    /*$ins_query="insert into alltest (`dname`,`pmrn`,`pname`,`eid`,`medi`,`ins`,`date`,`type`,`price`,`code`,`link`,`date1`,`linkv`,`report`,`reportv`,`location`,`page`,`pgender`,`subtype`,`billstatus`,`billby`,`billdate`,`pphone`,`barcode`,`barcode1`,`billtime`,`package`,`billno`) 
    values ('$dname', '$pmrn','$pname','$eid','$ii','$pins','$date','$type','$p_price','$code','$link','$date77','$linkv','$report','$reportv','OPD','$bdate','$psex','$subtype','Billed','$user','$pdate','$pphone','$bar','$bar','$pdate1','$medi','')";
    mysqli_query($con,$ins_query) or die(mysql_error());
*/

    $ins_query14="insert into cathhoscharge (`dname`,`pmrn`,`pname`,`medi`,`eid`,`date`,`pdos`,`type`,`ieid`,`code`,`qty`,`ins`,`ctype`) values 
('$full','$pmrn','$pname','$ii','$eid','$date1','$pdos','$type','$ieid','$code','$price','$btype','Package')";
mysqli_query($con,$ins_query14) or die(mysql_error());
    
    //}
  
  
    

  }
  	

header("Refresh: 0; URL=$url");
//header("Refresh: 0; url=your_page.php"); // Refresh after 5 seconds


}

else {

    echo "something went wrong";
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
   <script>
function goBack() {
    window.history.back();
}
</script>


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
<tr><td colspan="10" align="center"><label><strong>Select Used Items</strong></label></td> 
<td colspan="5" align="center"><label><strong>Select Used QTY</strong></label></td> 
<td colspan="5" align="center"><label><strong>Remarks</strong></label></td> 


</tr>
<tr>
<td colspan="10" align="center">




<select class="con_charge21"
                    name="item" id="con_charge1" onchange="GetDetail(this.value)" required width="500px;">

						<option value=''>---Select--</option>


						


            
				<?php 


/*$sql = "select * from `set_package` where status='Approved' and iname='CAG PACKAGE'";
$res = mysqli_query($con, $sql);
if(mysqli_num_rows($res) > 0) {
  while($row = mysqli_fetch_object($res)) {
    echo "<option value='".$row->iname."'>".$row->iname."</option>";
  }
}
*/

/*			$sql76 = "select * from `disposable`";
			$res76 = mysqli_query($con, $sql76);
			if(mysqli_num_rows($res76) > 0) {
				while($row76 = mysqli_fetch_object($res76)) {
					echo "<option value='".$row76->disname."'>".$row76->disname."</option>";
				}
			}

  */    
			?>  </select>


<script>
        $(document).ready(function(){

            $("#con_charge1").select2({
                ajax: {
                    url: "search_hits_data.php",
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
			
			<td  colspan="5"align="center"><input list="browsers11" name="pdos" class="form-control" required>
  <datalist id="browsers11">

						<option value=''>-Select Quantity-</option>
				 </datalist>
</td>

<td  colspan="5"align="center"><input type="text" name="remarks" class="form-control">
  

	
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
     
      <td colspan="2" align="center"><strong>PMRN</strong></td>
     	  <td colspan="9" align="center"><strong>Item</strong></td>
      	  <td colspan="3" align="center"><strong>QTY</strong></td>
          <td colspan="2" align="center"><strong>Price</strong></td>
		      <td colspan="1" align="center"><strong>Remarks</strong></td>  
          <td colspan="1" align="center"><strong>Type</strong></td>	  
          <td colspan="1" align="center"><strong>Delete</strong></td>
       

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
$sel_query="Select * from cathhoscharge where pmrn= '$pmrn' and ieid='$ieid' and eid='$eid' order by `id` DESC;";

$result = mysqli_query($con,$sel_query);

while($row = mysqli_fetch_assoc($result)) 
{ ?>    <tr>

      <td align="center" colspan="1"><?php echo $count; ?></td>

      <td align="center"colspan="2"><?php echo $row["pmrn"]; ?></td>
	        <td align="center"colspan="9"><?php echo $row["medi"]; ?></td>
				        
                <td align="center"colspan="3"><?php echo $row["pdos"]; ?></td>
                <td align="center"colspan="2"><?php echo $row["qty"]; ?></td>
                <td align="center"colspan="1"><?php echo $row["remarks"]; ?></td>
                <td align="center"colspan="1"><?php echo $row["ctype"]; ?></td>
				 

         <?php if($ot_charge=='')
{ echo'

			      
				 <td align="center" colspan="2"><a href="cathhosdelete1?id='.$id.'&pmrn='.$row['pmrn'].'&dname='.$dname.'&eid='.$eid.'&ieid='.$ieid.'&type='.$type.'&ID='.$id.'&rid='.$row['id'].'">DELETE</a></td>';
				 
}
				 
				 else {
				echo '<td align="center" colspan="2">Charge Already Confirmed</a></td>';	 
					 
				 }

  	  
	  
	  ?>
  	  

	  
      </tr>
    <?php $count++; } ?>
	<tr><td align="right" colspan="20"><span style="font-size:22px; color:red;font-weight:bold;">Total: <?php echo $tprice;?></span></td></tr>
</table>
</form>
</body>

</html>
