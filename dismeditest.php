<?php 
    session_start();
    $role = $_SESSION['sess_userrole'];
    if(!isset($_SESSION['sess_username']) || $role!="imo"){
      header('Location: login2?err=2');
    }
?>


<?php  
$pmrn=$_REQUEST['pmrn'];
$eid=$_REQUEST['eid'];
//$dname=$_REQUEST['dname'];
 $connect = mysqli_connect("localhost", "root", "Godiloveu16", "sfmmkpjnew");  
 $query3 = "select * from inpatient where pmrn='$pmrn' and eid='$eid'";  
 $result3 = mysqli_query($connect, $query3);  

//$name=$_POST['data'];
//$query59 = mysqli_query($connect,"select * from medicine where mname='name'");
//$data59 = mysqli_fetch_assoc($query59);
 
$pmrn=$_REQUEST['pmrn'];
//$full=$_REQUEST['dname'];
//$eid=$_REQUEST['eid'];
//$eid1=$_REQUEST['eido']; 
 
 ?>  

<?php
/*
Author: Javed Ur Rehman
Website: https://www.allphptricks.com/
*/
//include("auth.php"); 
require('db1.php');

$user=$_SESSION["sess_username"];
//$id=$_REQUEST['ID'];
$pmrn=$_REQUEST['pmrn'];
//$full=$_REQUEST['dname'];
$eid=$_REQUEST['eid'];
//$eid1=$_REQUEST['eido'];

//include("auth.php");
$pmrn=$_REQUEST['pmrn'];
$db = mysqli_connect('localhost','root','Godiloveu16');
mysqli_select_db($db,'sfmmkpjnew');
$query4 = mysqli_query($db,"select * from alltest where pmrn='$pmrn' and eid='$eid1'");
$data = mysqli_fetch_assoc($query4);

$query5 = mysqli_query($db,"select * from pappnew where pmrn='$pmrn'");
$data1 = mysqli_fetch_assoc($query5);

$query59 = mysqli_query($db,"select * from inpatient where pmrn='$pmrn' and discharge=''");
$data59 = mysqli_fetch_assoc($query59);


  
?>


<?php
/*
Author: Javed Ur Rehman
Website: https://www.allphptricks.com/
*/
 
require('db1.php');

if(isset($_POST['Submit']))
{



$pname = $data['pname'];
$pmrn = $data['pmrn'];
$eid = $data['eid'];
$padd = $data['padd'];
$adm = $data['adate'];
$pphone=$data['pphone'];
$page=$data['age'];
$psex=$data['gender'];
$odate = date('m/d/Y H:i:s');
$infu = $_REQUEST['infu'];
$remarks = $_REQUEST['remarks'];

$ins_query="insert into iinves (`pmrn`,`eid`,`pname`,`padd`,`page`,`padmission`,`pgender`,`pphone`,`odate`,`infusion`,`user`,`room`) values ( '$pmrn','$eid','$pname','$padd','$page','$adm','$psex','$pphone','$odate','$infu','$user','$remarks')";
mysqli_query($con,$ins_query) or die(mysql_error());

}
?>

<?php 

if(isset($_POST['Submit1'])){
$medi1=$_REQUEST['medi1'];
$pdos=$_REQUEST['pdos'];
$pmrn=$data1["pmrn"];
$pname=$data1["pname"];
$date1 = date('m/d/Y');
$date2 = date('Y-m-d');

$sel9=mysqli_query($db,"SELECT * FROM medicine WHERE `mname`='$medi1'");
$result9 = mysqli_fetch_assoc($sel9);
$brand2=$result9["brand1"];

$sel990="SELECT * FROM medicine WHERE `mname`='$medi1';";
$result990 = mysqli_query($con,$sel990);




if($res990=mysqli_num_rows($result990)==0)
{
 	
       echo '<script language="javascript">';
    echo 'alert("Unsuccessful !!! The Medicine Name is not in the Database List.. Please contact with Pharmacy Department"); ';
    echo '</script>';
    }
else {

$ins_query1="insert into pmedi (`dname`,`pmrn`,`pname`,`medi`,`brand`,`pdos`,`eid`,`date`,`ndate`) values ('$full','$pmrn','$pname','$medi1','$brand2','$pdos','$eid','$date1','$date2')";
mysqli_query($con,$ins_query1) or die(mysql_error());}}

?>


<?php

if(isset($_POST['btnDelete']))

	
	
if(empty($_REQUEST['chkDel']))
{
	echo '<script language="javascript">';
    echo 'alert("Unsuccessful !!! No Row Selected!!"); ';
    echo '</script>';
	
}
else {
$objConnect1 = mysql_connect("localhost","root","Godiloveu16") or die("Error Connect to Database");
$objDB1 = mysql_select_db("sfmmkpjnew");

	for($i=0;$i<count($_POST["chkDel"]);$i++)
	{
		if($_POST["chkDel"][$i] != "")
			
			
		{
			
			$qq = mysqli_query($db,"select * from pmedi where id='".$_POST["chkDel"][$i]."'");
			$dd = mysqli_fetch_assoc($qq);
			$dname=$dd['dname'];
			$pmrn=$dd['pmrn'];
			$medi=$dd['medi'];
			$brand=$dd['brand'];
			$pdos=$dd['pdos'];
			//$eid=$qq['eid'];
			//$date=$qq['date'];
			$date1 = date('m/d/Y');
			$date2 = date('Y-m-d');
			//$pdos=$_POST["test3"][$i];
			
			$strSQL = "insert into pmedi (`dname`,`pmrn`,`medi`,`brand`,`pdos`,`eid`,`date`,`ndate`) values ('$dname','$pmrn','$medi','$brand','$pdos','$eid','$date1','$date2')";
			//$strSQL .="WHERE id = '".$_POST["chkDel"][$i]."' ";
			$objQuery = mysql_query($strSQL);
		}
	}

	echo '<script language="javascript">';
    echo 'alert("Successfully Added !!"); ';

    echo '</script>';

	
	$url = "newtest5test?pmrn=$pmrn&eid=$eid&eido=$eid1&dname=$full";
header("Location: $url");

mysql_close($objConnect1);

}
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
    max-width: 1200px;
  }

}
      </style>

    

  
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
return confirm("Are you Sure to Reveive this Sample ?");
}

</script>

<script type="text/javascript">
function confirm_click2()
{
return confirm("Are you Sure to Reject this Sample ?");
}

</script>



  
          <head>  
           <title>Webslesson Tutorial | PHP Ajax Update MySQL Data Through Bootstrap Modal</title>  
           
		   <link rel="stylesheet" href="jsnew/bootstrap.min.css" />  
    <script src="jsnew/jjquery.min.js"></script>
    <script src="jsnew/bootstrap.min.js"></script>
      </head>  







<body>
<script language="JavaScript">
	function ClickCheckAll(vol)
	{
	
		var i=1;
		for(i=1;i<=document.frmMain.hdnCount.value;i++)
		{
			if(vol.checked == true)
			{
				eval("document.frmMain.chkDel"+i+".checked=true");
			}
			else
			{
				eval("document.frmMain.chkDel"+i+".checked=false");
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

<form name="frmMain1" action="" method="post" >


				

        <table align="center" class="table table-bordered" id="dynamic_field"> 
<tr><td colspan="20" align="center"bgcolor="lightgreen"><label><strong>Medication Form</strong></label></td> </tr>
<tr><td colspan="10" align="center"><label><strong>Medicine</strong></label></td> 

<td colspan="10" align="center"><label><strong>Dosage</strong></label></td> 
</tr>
<tr>
<td colspan="10" align="center"><input list="browsers111" name="medi1" size=60% class="form-control" autocomplete="off" required>
  <datalist id="browsers111">

						<option value=''>-Select Medicine</option>
				<?php 
			$sql = "select * from `medicine` where status='Active'";
			$res = mysqli_query($con, $sql);
			if(mysqli_num_rows($res) > 0) {
				while($row = mysqli_fetch_object($res)) {
					echo "<option value='".$row->mname."'>".$row->mname." - ".$row->brand1."</option>";
				}
			}
			?>  </datalist></td>

<td  colspan="10"align="center"><input list="browsers11" name="pdos" class="form-control">
  <datalist id="browsers11">

						<option value=''>-Select Dosage</option>
				<?php 
			$sql = "select * from `dosage`";
			$res = mysqli_query($con, $sql);
			if(mysqli_num_rows($res) > 0) {
				while($row = mysqli_fetch_object($res)) {
					echo "<option value='".$row->doname."'>".$row->doname."</option>";
				}
			}
			?>  </datalist>
</td>

</tr>			        

<tr>
		<td colspan="20"align="right"><button type="submit" name="Submit1">ADD</button></td>
	  
</tr>	
</form>

<form name="frmMain" action="" method="post" OnSubmit="return onDelete();">
<?php

$user=$_SESSION["sess_username"];
$pmrn=$_REQUEST["pmrn"];
$eid=$_REQUEST["eid"];
//$dname=$_REQUEST["dname"];
//$id1=$_REQUEST["ID"];
//$test=$_REQUEST["test"];
//$id=$_REQUEST["id"];
//$episode=$data59["eid"];

$count=1;
$dd=date('m/d/Y');

$objConnect = mysql_connect("localhost","root","Godiloveu16") or die("Error Connect to Database");
$objDB = mysql_select_db("sfmmkpjnew");
$strSQL = "Select distinct infusion from imedi2 where pmrn= '$pmrn' and eid='$eid' and status !='Cancel' and odate='$dd'order by `id` DESC;";
$objQuery = mysql_query($strSQL) or die ("Error Query [".$strSQL."]");
//$sel_query="Select * from pmedi where pmrn= '$pmrn' and eid='$eid1'order by `id` DESC;";

?>
<table align="center" class="table table-bordered" id="dynamic_field">  
<tr>
      <td colspan="1" align="center"><strong>S.No</strong></td>
     
      
     	  <td colspan="15" align="center"bgcolor="lightgreen"><strong>Old Medicine </strong></td>
      	  <td colspan="4" align="center"><strong>Dosage</strong></td>
		        	  
					  <th width="30"> <div align="center">
      <input name="CheckAll" type="checkbox" id="CheckAll" value="Y" onClick="ClickCheckAll(this);">
    </div></th>
       

	   </tr>
	<?php
$i = 0;
while($row = mysql_fetch_array($objQuery))
{
$i++;

?>
   


<tr>

      <td align="center" colspan="1"><?php echo $count; ?></td>

      
	  <td align="center"colspan="15"><input type="text" name="test2" id="test2" value="<?php echo $row["infusion"]; ?>" readonly></td>
	  <td align="center"colspan="4"><input type="text" name="test3" id="test3" value=""></td>
				  
				  




<td align="center"><input type="checkbox" name="chkDel[]" id="chkDel<?php echo $i;?>" value="<?php echo $row["id"];?>"></td>

	  
      </tr>
    <?php
 $count++;}
?>
<tr><td colspan="21" align="right"><button type="submit" id="btnDelete" name="btnDelete">ADD SELECTED</button><input type="hidden" name="hdnCount" value="<?php echo $i;?>"></td>
</tr>
</table>
<?php
mysql_close($objConnect);
?>

	        		  
	        <table align="center" class="table table-bordered" id="dynamic_field"> 	  

<tr><td colspan='20'align="center" font-size='16'bgcolor="lightblue"><b>NEW Medication<b></td></tr>
<tr>
      <td colspan="1" align="center"><strong>S.No</strong></td>
     
      <td colspan="2" align="center"><strong>MRN</strong></td>
     	  <td colspan="10" align="center"><strong>Medicine NAME</strong></td>
      	  <td colspan="5" align="center"><strong>Dosage</strong></td>
				  <td colspan="1" align="center"><strong>Details</strong></td>	
	<td colspan="1" align="center"><strong>DELETE</strong></td>
	
       

	   </tr>
 <?php
	
$user=$_SESSION["sess_username"];
$pmrn=$_REQUEST["pmrn"];
$eid=$_REQUEST["eid"];
//$dname=$_REQUEST["dname"];
//$id1=$_REQUEST["ID"];
//$test=$_REQUEST["test"];
//$id=$_REQUEST["id"];
//$episode=$data59["eid"];

$count=1;
$sel_query="Select * from pmedi where pmrn= '$pmrn' and eid='$eid'order by `id` DESC;";

$result = mysqli_query($con,$sel_query);

while($row = mysqli_fetch_assoc($result)) 
{ ?>    <tr>

      <td align="center" colspan="1"><?php echo $count; ?></td>

      <td align="center"colspan="2"><?php echo $row["pmrn"]; ?></td>
	        <td align="center"colspan="10"><?php echo $row["brand"].' ('.$row["infusion"].')'; ?></td>
			      <td align="center"colspan="5"><?php echo $row["pdos"]; ?></td>
				  
				  
	
				  
				  			  <td align="center"colspan="1"><input type="button" name="edit9" value="Details" id="<?php echo $row["medi"]; ?>" class="btn btn-info btn-xs edit_data1" /></td>  		
				  
				 <td align="center" colspan="1"><a href="delete1tt?id=<?php echo $row["id"]; ?>&pmrn=<?php echo "$pmrn"; ?>&dname=<?php echo "$dname"; ?>&eid=<?php echo "$eid"; ?>&eid1=<?php echo "$eid1"; ?>">DELETE</a></td>

  	  

	  
      </tr>
    <?php $count++; } ?>

	<tr><td align="right" colspan="20"><button onclick="self.close()">Close</button></td></tr>
</table>

</form>

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
                     <h4 class="modal-title">Dosage Edit Form</h4>  
                </div>  
                <div class="modal-body">  
                     <form method="post" id="insert_form" name="frmMain2">  
                          <label>Patient MRN</label>  
                          <input type="text" name="name" id="name" class="form-control" size="15" readonly/>  
                          
                          <label>Medicine</label>  
                          <input type="text" name="address" id="address" class="form-control"  size="15"readonly/>  
                          
                          <label>Dosage</label>  
                          <input type="text" name="result" id="result" class="form-control" />  
						  
						                          
                          <input type="hidden" name="dname" id="dname" />  
						  <input type="hidden" name="brand" id="brand" />  
						  <input type="hidden" name="pname" id="pname" />  
                          
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
</html>
<script>  
 $(document).ready(function(){  
      $('#add').click(function(){  
           $('#insert').val("Insert");  
           $('#insert_form')[0].reset();  
      });  
      $(document).on('click', '.edit_data', function(){  
           var employee_id = $(this).attr("id");  
           $.ajax({  
                url:"selectmodallabmedi.php",  
                method:"POST",  
                data:{employee_id:employee_id},  
				
                dataType:"json",  
                success:function(data){  
                     $('#name').val(data.pmrn);  
                     $('#address').val(data.medi);  
                     $('#result').val(data.pdos); 
					 $('#dname').val(data.dname); 
					 $('#pname').val(data.pname); 
					 $('#brand').val(data.brand); 
					 
					
					  
                     
					 
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
                     url:"previousmediadd.php",  
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
 
 
 <div id="dataModal7" class="modal fade">  
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
 <div id="add_data_Modal7" class="modal fade">  
      <div class="modal-dialog">  
           <div class="modal-content">  
                <div class="modal-header">  
                     <button type="button" class="close" data-dismiss="modal">&times;</button>  
                     <h4 class="modal-title">DETAILS OF THE MEDICINE</h4>  
                </div>  
                <div class="modal-body">  
                     <form method="post" id="insert_form7">  
                          <label>Medicine Name</label>  
                          <input type="text" name="mname1" id="mname1" class="form-control" readonly>  
                          
                          <label>Brand</label>  
                          <input type="text" name="brand9" id="brand9" class="form-control" readonly>  
                          
                          <label>Company</label>  
                          
                          <input type="text" name="company" id="company" class="form-control" readonly>  
                          
                          
						  <label>Standard Frequency</label>  
                          
                          <input type="text" name="frequency" id="frequency" class="form-control" readonly>  
                          
                          
						  <label>Food Relation</label>  
                          
                          <input type="text" name="frelation" id="frelation" class="form-control" readonly>  
                          
                          
						  
						  <label>Pregnency Catergory</label>  
                          
                          <input type="text" name="pcategory" id="pcategory" class="form-control" readonly>  
                          
                          
						  
						  <label>Contraindications</label>  
                          
                          
                          
                          <textarea class="form-control" name="contrain" id="contrain" rows="5" readonly></textarea>
						  
						  <label>Major Side Effect</label>  
                          
                          
                          <textarea class="form-control" name="meffect" id="meffect" rows="5" readonly></textarea>
                          
						  <label>Standard Duration</label>  
                          
                          <input type="text" name="duration" id="duration" class="form-control" readonly> 

							<label>Per PC / Dosage Price</label>  
                          
								<input type="text" name="uprice" id="uprice" class="form-control" readonly> 						  
                          
                                                    <input type="hidden" name="employee_id" id="employee_id" />  
													
													
                           
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
           $('#insert7').val("Insert");  
           $('#insert_form7')[0].reset();  
      });  
      $(document).on('click', '.edit_data1', function(){  
           var mname1 = $(this).attr("id");  
           $.ajax({  
                url:"yyyy.php",  
                method:"POST",  
                data:{mname1:mname1},  
				
                dataType:"json",  
                success:function(data){  
                     $('#mname1').val(data.mname);  
                     $('#brand9').val(data.brand1);  
                     $('#company').val(data.brand2);  
					 $('#frequency').val(data.frequency);  
					 $('#frelation').val(data.frelation);  
					 $('#pcategory').val(data.pcategory);  
					 $('#contrain').val(data.contrain);  
					 $('#meffect').val(data.meffect);  
					 $('#duration').val(data.duration);  
					 $('#uprice').val(data.uprice);  
					  
                     
					 
                     $('#mname1').val(data.mname);  
                     $('#insert7').val("Update");  
                     $('#add_data_Modal7').modal('show');  
                }  
				 
				 
				 
				
				
           });  
      });  
      $('#insert_form7').on("submit", function(event){  
           event.preventDefault();  
           if($('#name').val() == "")  
           {  
                alert("Name is required");  
           }  
           else if($('#address').val() == '')  
           {  
                alert("Address is required");  
           }  
           else if($('#designation').val() == '')  
           {  
                alert("Designation is required");  
           }  
           else if($('#age').val() == '')  
           {  
                alert("Age is required");  
           }  
           else  
           {  
                $.ajax({  
                     url:"labedittest.php",  
                     method:"POST",  
                     data:$('#insert_form7').serialize(),  
                     beforeSend:function(){  
                          $('#insert7').val("Inserting");  
                     },  
                     success:function(data){  
                          $('#insert_form7')[0].reset();  
                          $('#add_data_Modal7').modal('hide');  
                          $('#employee_table').html(data);  
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
                          $('#dataModal7').modal('show');  
                     }  
                });  
           }            
      });  
 });  
 </script>
 