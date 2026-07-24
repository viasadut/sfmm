<?php 
    session_start();
    require('db1.php');
	$role = $_SESSION['sess_userrole'];
	
	$queryc = "SELECT COUNT(utype) FROM user where '$role' in ('store','staff','ot','nurse','imo','mofficer','emergency','mng')"; 
$resultc = mysqli_query($con, $queryc) or die(mysqli_error());
$rowc = mysqli_fetch_array($resultc);
$c1=$rowc['COUNT(utype)'];
	
    if(!isset($_SESSION['sess_username']) || $c1==0){
      header('Location: login2?err=2');
    }
?>
<?php
$url1=$_SERVER['REQUEST_URI'];
//header("Refresh: 20; URL=$url1");

?>



<?php
/*
Author: Javed Ur Rehman
Website: https://www.allphptricks.com/
*/
//session_start();
require('db1.php');
//include("auth.php");
$fullname = $_SESSION['sess_username'];
$query39 = "SELECT * FROM user where uname= '$fullname'"; 
	 
$result39 = mysqli_query($con, $query39) or die(mysqli_error());

// Print out result
$row39 = mysqli_fetch_array($result39);
$full = $row39['fullname'];

$query3 = "SELECT * FROM staff3 where sid= '$fullname'"; 
	 
$result3 = mysqli_query($con, $query3) or die(mysqli_error());

// Print out result
$row3 = mysqli_fetch_array($result3);
$dept=$row3['dept'];
$cat=$row3['cat'];
$dd=$row3['dept'];


if(isset($_POST['insert']))
{


$rfid = $_REQUEST['rfid'];
$employee_id = $_REQUEST['employee_id'];

$select="select * from rfid where use_for='Asset Tag' and status='0' and rfid='$rfid'";
$sel=mysqli_query($con,$select) or die(mysql_error());
$a_no=mysqli_fetch_assoc($sel);
$rr=$a_no['rfid'];

if($rr=='')
	
	{
		
		echo '<script language="javascript">';
    echo 'alert("RFID Not Matched"); ';

    echo '</script>';
		
	}

else {
	
	$ins_query1="update storenew set rfid='$rfid' where id ='$employee_id'";
$test=mysqli_query($con,$ins_query1) or die(mysql_error());

if(mysqli_query($con,$ins_query1)==true)

{
	
	echo '<script language="javascript">';
    echo 'alert("Successful !!"); ';

    echo '</script>';


	//header("Refresh: .1; URL=$url");
}
else if(mysqli_query($con,$ins_query1)==false)
{
echo '<script language="javascript">';
    echo 'alert("Something Went Wrong !!"); ';

    echo '</script>';
}
}
}
?>






<!DOCTYPE html>
<html lang="en" >

<head>
  <meta charset="UTF-8">
  <title>Sign Up Form</title>
  
    

  
      <style type="text/css">
<!--
.style1 {
	font-size: x-large;
	font-weight: bold;
	font-style: italic;
}
-->


div1 {
  height: 50px;
  width: 20%;
  border: 1px solid #4CAF50;
  float: right;
  
}
button {
  padding: 19px 39px 18px 39px;
  color: #FFF;
  background-color: #A085C6;
  /*#4bc970*/
  font-size: 18px;
  text-align: center;
  font-style: normal;
  border-radius: 5px;
  width: 100%;
  height: 5%
  border: 1px solid #8265B0;
  /*#3ac162*/
  border-width: 1px 1px 3px;
  box-shadow: 0 -1px 0 rgba(255,255,255,0.1) inset;
  margin-bottom: 10px;
}



#myInput {
  background-image: url('/css/searchicon.png');
  background-position: 10px 10px;
  background-repeat: no-repeat;
  width: 100%;
  font-size: 16px;
  padding: 12px 20px 12px 40px;
  border: 1px solid #ddd;
  margin-bottom: 12px;
}

#myInput1 {
  background-image: url('/css/searchicon.png');
  background-position: 10px 10px;
  background-repeat: no-repeat;
  width: 100%;
  font-size: 16px;
  padding: 12px 20px 12px 40px;
  border: 1px solid #ddd;
  margin-bottom: 12px;
}



#myTable {
  border-collapse: collapse;
  width: 100%;
  border: 1px solid #ddd;
  font-size: 18px;
}

#myTable th, #myTable td {
  text-align: left;
  padding: 12px;
}

#myTable tr {
  border-bottom: 1px solid #ddd;
}

#myTable tr.header, #myTable tr:hover {
  background-color: #f1f1f1;
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
 
<script src="jsnew/pprefixfree.min.js"></script>



<link rel="stylesheet" href="jsnew/jquery-ui.css">
<script src="jsnew/jquery.min.js"></script>
<script src="jsnew/jquery-ui.min.js"></script>




<script>
$(document).ready(function(){
    $("#add_data_Modal").on('shown.bs.modal', function(){
        $(this).find('input[type="number"]').focus();
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

		
		
	<p align="center" class="style1">!! WELCOME !! <?php echo $fullname; ?>'s Dash Board </p> 

<p align="right"><div1><input style="background-color: lightblue;" type="text" id="myInput" onkeyup="myFunction()" placeholder="Search by Asset Name.." title="Type in a Discipline">
</div1></p>
<p><div1><input style="background-color: lightgreen;" type="text" id="myInput1" onkeyup="myFunction1()" placeholder="Search by Current Location.." title="Type in a Discipline">
</div1>

</p>

<form action="" method="post">

<!-- Form Title -->
       
	 
	
	 <?php



$user=$_SESSION["sess_username"];
$pmrn=$_REQUEST["pmrn"];
$eid=$_REQUEST["eid"];
//$dname=$_REQUEST["dname"];
//$id1=$_REQUEST["ID"];
//$test=$_REQUEST["test"];
//$id=$_REQUEST["id"];
//$episode=$data59["eid"];
$dd=date('m/d/Y');

$count=1;


$objConnect = mysqli_connect("localhost","root","Godiloveu16") or die("Error Connect to Database");
$objDB = mysqli_select_db($con,"sfmmkpjnew");
$strSQL = "Select * from storenew where etype='Asset' and estatus!='Deleted' ORDER BY id asc";
$objQuery = mysqli_query($con,$strSQL) or die ("Error Query [".$strSQL."]");
//$sel_query="Select * from pmedi where pmrn= '$pmrn' and eid='$eid1'order by `id` DESC;";

?>


<table width="100%" height ="100%" border="1" align="center" bgcolor="#FFFF99" style="border-collapse:collapse;" id="myTable"> 
<tr>
		
	   
</tr>

<tr>
         <th width="2%"><strong>S.No</strong></th>
      <th width="2%"><strong>MSNO</strong></th>
	  <th width="2%"><strong>ID</strong></th>
      <th width="8%"><strong>Equipment Name</strong></th>
	  <th width="1%"><strong>VA</strong></th>

      <th width="8%"><strong>Current Location</strong>
      <th width="8%"><strong>Vendor</strong> 
      <th width="8%"><strong>RFID</strong>
	  <th width="8%"><strong>Edit</strong>
      

	   </tr>
	<?php
$i = 0;
while($row = mysqli_fetch_array($objQuery))
{
$i++;

?>
   


<tr>

       <td align="center"><?php echo $count; ?></td>
	  <td align="center"><?php echo $row["msno"]; ?></td>
      <td align="center"><a target='_blank' href="materialhistory1.php?eid=<?php echo $row['id']; ?>"><?php echo $row["id"]; ?></a> </td>
      <td align="center"><a target='_blank' href="transfer_his.php?eid=<?php echo $row['id']; ?>"><?php echo $row["ename1"]; ?></a> </td>
	  <td align="center"><a target='_blank' href="all_asset_list_indu.php?ename1=<?php echo $row['ename1']; ?>"><img src="eye.png" title="Print Report" width="30" height="15" /></a></td>
	  
	   
      <td align="center"><?php echo $row["trans_to"]; ?>
      
	  <td align="center"><?php echo $row["supplier"]; ?>
	  
  	  <td align="center"><?php echo $row["rfid"]; ?>

<td align="center"colspan="1"><input type="button" name="edit" value="Edit" id="<?php echo $row["id"]; ?>" class="btn btn-info btn-xs edit_data" /></td>  		  	  	  






      </tr>
    <?php
 $count++;}
?>

</table>
<?php
mysqli_close($objConnect);
?>

</form>
<script>
function myFunction() {
  var input, filter, table, tr, td, i, txtValue;
  input = document.getElementById("myInput");
  filter = input.value.toUpperCase();
  table = document.getElementById("myTable");
  tr = table.getElementsByTagName("tr");
  for (i = 0; i < tr.length; i++) {
    
	td = tr[i].getElementsByTagName("td")[3];
    if (td) {
      txtValue = td.textContent || td.innerText;
      if (txtValue.toUpperCase().indexOf(filter) > -1) {
        tr[i].style.display = "";
      } else {
        tr[i].style.display = "none";
      }
    }       
  }
}
</script>


<script>
function myFunction1() {
  var input, filter, table, tr, td, i, txtValue;
  input = document.getElementById("myInput1");
  filter = input.value.toUpperCase();
  table = document.getElementById("myTable");
  tr = table.getElementsByTagName("tr");
  for (i = 0; i < tr.length; i++) {
    
	td = tr[i].getElementsByTagName("td")[5];
    if (td) {
      txtValue = td.textContent || td.innerText;
      if (txtValue.toUpperCase().indexOf(filter) > -1) {
        tr[i].style.display = "";
      } else {
        tr[i].style.display = "none";
      }
    }       
  }
}
</script>

</body>

</html>
<div id="dataModal" class=8"modal fade">  
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
                     <h4 class="modal-title">Update Equipment RFID</h4>  
                </div>  
                <div class="modal-body">  
                     <form method="post" id="insert_form" name="frmMain2">  
                          <label>Equipment ID </label>  
                          <input type="text1" name="name" id="name" class="form-control" size="15" readonly/>  
                          
						  <label>MSNO</label>  
                          <input type="text1" name="code" id="code" class="form-control"  size="15"readonly/>  
						  
						  
                          <label>Equipment Name</label>  
                          <input type="text1" name="address" id="address" class="form-control"  size="15"readonly style="font-size:22px;color:red;">  
                          
                          <label>Location</label>  
                          <input type="text1" name="result" id="result" class="form-control" readonly style="font-size:22px;color:red;">  
						  
						  <label>Vendor</label>  
                          <input type="text1" name="ins" id="ins1" class="form-control" readonly />  
						  
						  
						  <label>From</label>  
                          <input type="text1" name="ins" id="ins" class="form-control" readonly style="font-size:22px;color:red;">  
						  
						  <label>RFID</label>  
						  <input name="rfid" id="route" class="form-control" required  type='number'>  
						  
						  
					
                          
						                          
                          <input type="hidden" name="eid" id="eid" /> 
						  <input type="hidden" name="uprice" id="uprice" /> 
						  <input type="hidden" name="alert" id="alert" /> 
						  
						  
                          
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
 
 
 
 
 
 <div id="dataModal" class=8"modal fade">  
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
                     <h4 class="modal-title">Update Equipment RFID</h4>  
                </div>  
                <div class="modal-body">  
                     <form method="post" id="insert_form" name="frmMain2">  
                          <label>Equipment ID </label>  
                          <input type="text1" name="name" id="name" class="form-control" size="15" readonly/>  
                          
						  <label>MSNO</label>  
                          <input type="text1" name="code" id="code" class="form-control"  size="15"readonly/>  
						  
						  
                          <label>Equipment Name</label>  
                          <input type="text1" name="address" id="address" class="form-control"  size="15"readonly style="font-size:22px;color:red;">  
                          
                          <label>Location</label>  
                          <input type="text1" name="result" id="result" class="form-control" readonly style="font-size:22px;color:red;">  
						  
						  <label>Vendor</label>  
                          <input type="text1" name="ins" id="ins1" class="form-control" readonly />  
						  
						  
						  <label>From</label>  
                          <input type="text1" name="ins" id="ins" class="form-control" readonly style="font-size:22px;color:red;">  
						  
						  <label>RFID</label>  
						  <input name="rfid" id="route" class="form-control" required  type='number'>  
						  
						  
					
                          
						                          
                          <input type="hidden" name="eid" id="eid" /> 
						  <input type="hidden" name="uprice" id="uprice" /> 
						  <input type="hidden" name="alert" id="alert" /> 
						  
						  
                          
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
                url:"asset_bar.php",  
                method:"POST",  
                data:{employee_id:employee_id},  
				
                dataType:"json",  
                success:function(data){  
                     $('#name').val(data.id);  
                     $('#code').val(data.msno);  
                     $('#address').val(data.ename1); 
					 $('#result').val(data.trans_to); 
					 $('#ins1').val(data.supplier); 
					 $('#ins').val(data.p_by); 
					 $('#route').val(data.rfid); 
					 $('#eid').val(data.eid); 
					 
					 $('#alert').val(data.alert); 
					 $('#uprice').val(data.uprice); 
					 
					 
					
					  
                     
					 
                     $('#employee_id').val(data.id);  
                     $('#insert45').val("Update");  
                     $('#add_data_Modal').modal('show');  
                }  
				 
				 
				 
				
				
           });  
      });  
       
       
 });  
 
 
 </script>
 
 
 
 
 
 
