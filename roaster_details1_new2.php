<?php 
    session_start();
    require('db1.php');
	$role = $_SESSION['sess_userrole'];
	
	$queryc = "SELECT COUNT(utype) FROM user where '$role' in ('doctor')"; 
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
$id=$_REQUEST['id'];
$id1=$_REQUEST['id1'];

$month=date('F', strtotime($id));
$year=date('Y', strtotime($id));
$id3=$id1.'31';

$gg='#FFFF99';
?>
<?php
require('db1.php');
 $fullname = $_SESSION['sess_username'];
$query39 = "SELECT * FROM user where uname= '$fullname'"; 
	 
$result39 = mysqli_query($con, $query39) or die(mysqli_error());

// Print out result
$row39 = mysqli_fetch_array($result39);

$full = $row39['fullname'];

$query3 = "SELECT * FROM staff1 where sid= '$fullname' and astatus='Active'"; 
	 
$result3 = mysqli_query($con, $query3) or die(mysqli_error());

// Print out result
$row7 = mysqli_fetch_array($result3);
//$dept=$row7['dept'];
$cat=$row7['cat'];
$subdept=$row7['subdept'];
$in_id=$row7['sid1'];
$in_id1=$row7['sid'];
$r_cor=$row7['r_cor'];
$c_location=$row7['r_loc'];


$query3g = "SELECT * FROM staff3 where sid= '$fullname'"; 
	 
$result3g = mysqli_query($con, $query3g) or die(mysqli_error());

// Print out result
$row7g = mysqli_fetch_array($result3g);
$dept=$row7g['dept'];


$query33 = "SELECT * FROM roaster_2 where date between '$id' and '$id3' order by id desc LIMIT 1"; 
	 
$result33 = mysqli_query($con, $query33) or die(mysqli_error());

// Print out result
$row77 = mysqli_fetch_array($result33);
$a_status=$row77['a_status'];
//echo $dept;
?>

<?php
/*
Author: Javed Ur Rehman
Website: https://www.allphptricks.com/
*/
//session_start();
require('db1.php');
//include("auth.php");

?>


<?php
if(isset($_POST['s_approval']))
{
$time=date('Y-m-d H:i:s');
               $url = "roaster_details1_new2?id=$id&id1=$id1";
            $ins_query="Update roaster_2 set a_status='approved',ap_by='$fullname',ap_time='$time' where location='$c_location' and date between '$id' and '$id3'";
            if (mysqli_query($con,$ins_query) == true) {
                $alert = 'success';
               header("Refresh: .1; URL=$url");  
            }
            else {
                $alert = 'error';
                echo "error";
				header("Refresh: .1; URL=$url");  
      }
         

    }
            


?>

<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<title>Detail Roster</title>



<style type="text/css">
<!--
.style1 {
	font-size: x-large;
	font-weight: bold;
	font-style: italic;
}
-->



* {
  box-sizing: border-box;
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


#myInput2 {
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
    overflow: auto;
}

#myTable th, #myTable td {
  text-align: left;
  padding: 5px;
  min-width: 50px;
    
  
}



#myTable tr {
  border-bottom: 1px solid #ddd;
}

#myTable tr.header, #myTable tr:hover {
  background-color: #f1f1f1;
}


img {
  border-radius: 50%;
  
}

div2 {
  height: 50px;
  width: 25%;
  border: 1px solid #4CAF50;
  float: right;
  
  
  div1 {
    height: 40px;
    width: 30%;
    background-color: powderblue;
}



}




</style>




<link rel="stylesheet" href="styles.css">

   <script src="script.js"></script>


 <link rel="stylesheet" href="jsnew/bootstrap.min.css" />  
    <script src="jsnew/jjquery.min.js"></script>
    <script src="jsnew/bootstrap.min.js"></script>

   

<link rel="stylesheet" href="styles.css">

   <script src="script.js"></script>
   <script src="./jquery.multiselect.js"></script>
<link href="./jquery.multiselect.css" rel="stylesheet" />
   
   <script src="jsnew/pprefixfree.min.js"></script>



<style>
    @media screen and (min-width: 1280px) {
        .modal-dialog {
          max-width: 1280px; /* New width for default modal */
        }
    }
</style>
   
 
</head>


<body>








<div id='cssmenu'>
<ul>
   <li><a href='roaster_home'><span>Roster Home</span></a></li>
   
   <?php
   
   
   $ur = "roaster_details_con?id=$id&id1=$id1"; 
   $ur1 = "roaster_details_all?id=$id&id1=$id1"; 
   
   if($fullname=='md' || $fullname=='ceo' || $fullname=='cfo' ||$fullname=='ruzita')
	   
   
   {echo"
   <li><a target='_blank' href='$ur'><span>View All Consultant</span></a></li>
   <li><a target='_blank' href='$ur1'><span>View All Staff</span></a></li>
   
   "
   
   ;}
 ?>
   
   <li class='last'><a href='logout'><span>LOGOUT</span></a></li>
</ul>
</div>




<p align="center" class="style1">KPJ ONLINE ROSTER (<?php echo $month.'-'.$year;?>)</p> 
<p align="right"><div2><input style="background-color: lightblue;" type="text" id="myInput" onkeyup="myFunction()" placeholder="Search By Staff Name.." title="Type in a Discipline" autocomplete="on">
</div2></p>


<p align="right"><div2><input style="background-color: lightgreen;" type="text" id="myInput1" onkeyup="myFunction1()" placeholder="Search By Department Name.." title="Type in a Discipline" autocomplete="on">
</div2></p>

<p align="right"><div2><input style="background-color: lightgrey;" type="text" id="myInput2" onkeyup="myFunction2()" placeholder="Search By Location Name.." title="Type in a Discipline" autocomplete="on">
</div2></p>

 

<form action="" method="POST">
<table border="1" align="center" bgcolor="#FFFF99" style="border-collapse:collapse;" id="myTable">

    <tr class="header">

      <th width="4%"><strong>S.No</strong></th>
      <th width="10%"><strong>Name</strong></th>
	   <?php 
	   
//$date = date('Y-m-01');
//$end = date('Y-m-' . date('t', strtotime($date))); //get end date of month

$date=$id;
$end=date($id1 . date('t', strtotime($date)));
	   
	   
	   while(strtotime($date) <= strtotime($end)) {
        $day_num = date('d', strtotime($date));
        $day_name = date('D', strtotime($date));
        $date = date("Y-m-d", strtotime("+1 day", strtotime($date)));
		$date_z = date("Y-m-d", strtotime("-1 day", strtotime($date)));
		$url = "roaster_55?date=$date_z&id=$id&id1=$id1"; 
		$url_d = "datewise_roster?date=$date_z&id=$id&id1=$id1"; 
		
        echo "<th align='center'><a href='$url_d'>$day_num</a> <br/> <a href='$url'>$day_name</a></th>";
    }
    ?>
	  
	  
	  
      
      
	  
      
	   </tr>
  </thead>
  <tbody>

  
  
  

    


<?php

	

	
	
$user=$_SESSION["sess_username"];
//$date= date('Y-m-d');

if($c_location!='')
{
$sel_query="Select * from staff3 where status ='Active' and c_location='$c_location' order by sname asc";



}

		
		//$Start-<br>=$row["aadate"];
$count=1;
$rown = mysqli_query($con,$sel_query);
while($row = mysqli_fetch_assoc($rown)) { ?>
      <td align="center"><?php echo $count; ?></td>
      <td align="center"><a href="roaster_details1_new?sid=<?php echo $row['sid']; ?>&id=<?php echo $id; ?>&id1=<?php echo $id1; ?>"><?php echo $row["sname"]; ?></a></td>
	  <td align="center"style="display:none;"><?php echo $row["subdept"]; ?></a></td>
	  <td align="center"style="display:none;"><?php echo $row["c_location"]; ?></a>
	  
	  </td>
	  
	    <?php 
$uuid=$row['sid'];	
$uuid_0=$row['sid1'];	   
//$date = date('Y-m-01');
//$end = date('Y-m-' . date('t', strtotime($date))); //get end date of month


$date1=$id;
$end1=date($id1 . date('t', strtotime($date1)));

 
	   while(strtotime($date1) <= strtotime($end1)) {
        $day_num = date('d', strtotime($date1));
        $day_name = date('D', strtotime($date1));
        //$date = date("Y-m-d", strtotime("+1 day", strtotime($date)));
		//$date1 = date("Y-m-d", strtotime("-1 day", strtotime($date)));
        //echo "<td>$date1</td>";
		
		$date1 = date("Y-m-d", strtotime("+1 day", strtotime($date1)));
		
		$date_z = date("Y-m-d", strtotime("-1 day", strtotime($date1)));
		
		$dd=date("$id1$day_num");
		//echo "<td>$dd</td>";
		//echo "<td>$date1</td>";
		
		
$s2="Select COUNT(distinct(mor)),emor,id,location from roaster_2 where date='$dd' and mor='$uuid' and emor!='Delete'";
$r2 = mysqli_query($con, $s2) or die(mysqli_error());
$row2 = mysqli_fetch_array($r2);
$n2=$row2['COUNT(distinct(mor))'];


$slv="Select * from dleave where '$dd' between `sdate` and `edate` and hstatus='Confirmed By TM' and uname='$uuid'";
$rlv = mysqli_query($con, $slv) or die(mysqli_error());
$slv1=mysqli_fetch_row($rlv);

		
  	 $s1="Select * from roaster_2 where date='$dd' and mor='$uuid' and emor!='Delete'";
$r1 = mysqli_query($con, $s1) or die(mysqli_error());




$attn_q="Select * from tm3 where date1='$dd' and uid='$uuid_0'";
$attn_r = mysqli_query($con, $attn_q) or die(mysqli_error());
$attn_fetch_r=mysqli_fetch_array($attn_r);
$ss_id11=$attn_fetch_r['date'];
$ss_id1=date("H:i:s", strtotime($attn_fetch_r['date']));

$ss_id22=$attn_fetch_r['otime'];

$ss_id2=date("H:i:s", strtotime($attn_fetch_r['otime']));
$estatus=$attn_fetch_r['status'];


echo "<td>"; 
while(
$row1 = mysqli_fetch_array($r1))
{?>
	
	

<?php 
$ra=$row1['emor'];
$edit=$row1['e_status'];
$sa="Select * from roster_duty_schedule where schedule_name='$ra'";
$ra1 = mysqli_query($con, $sa) or die(mysqli_error());
$row_ra = mysqli_fetch_array($ra1);
$r_color=$row_ra['color'];

if($n2>0 and $estatus=='' and $edit=='Pending') 
{
echo '<s style="color:red">'.$row1['emor'].'-'.$row1['location'].'</s><br>
<input type="button" style="background-color:'.$r_color.';color:white;" name="edit" value="'.$row1['e_emor'].'-'.$row1['location'].'" id="'.$row1['id'].'" class="btn btn-info btn-xs edit_data">


';
}

else if($n2>0 and $estatus=='' and $edit=='Approved') 
{
echo '<input type="button" style="background-color:'.$r_color.';color:white;" name="edit" value="'.$row1['emor'].'-'.$row1['location'].'" id="'.$row1['id'].'" class="btn btn-info btn-xs edit_data">


';
}

else if($n2>0 and $estatus=='' and $edit=='') 
{
echo '<input type="button" style="background-color:'.$r_color.';color:white;" name="edit" value="'.$row1['emor'].'-'.$row1['location'].'" id="'.$row1['id'].'" class="btn btn-info btn-xs edit_data">


';
}


else if($n2>0 and $estatus=='A' and $edit=='Pending') 
{
echo '<s style="color:red">'.$row1['emor'].'-'.$row1['location'].'</s><br>
<input type="button" style="background-color:'.$r_color.';color:white;" name="edit" value="'.$row1['e_emor'].'-'.$row1['location'].'" id="'.$row1['id'].'" class="btn btn-info btn-xs edit_data">


';
}

else if($n2>0 and $estatus=='A' and $edit=='Approved') 
{
echo '<input type="button" style="background-color:'.$r_color.';color:white;" name="edit" value="'.$row1['emor'].'-'.$row1['location'].'" id="'.$row1['id'].'" class="btn btn-info btn-xs edit_data">


';
}

else if($n2>0 and $estatus=='A' and $edit=='') 
{
echo '<input type="button" style="background-color:'.$r_color.';color:white;" name="edit" value="'.$row1['emor'].'-'.$row1['location'].'" id="'.$row1['id'].'" class="btn btn-info btn-xs edit_data">


';
}

else if($n2>0 and $estatus!='A' and $edit=='Pending') 
{
echo '<s style="color:red">'.$row1['emor'].'-'.$row1['location'].'</s><br>
<input type="button" style="background-color:'.$r_color.';color:white;" name="edit" value="'.$row1['e_emor'].'-'.$row1['location'].'" id="'.$row1['id'].'" class="btn btn-info btn-xs edit_data">


<br><span style="color:green;font-weight:bold">Start-</span><br>'.$ss_id1.'<br>
<span style="color:red;font-weight:bold">End-</span><br>'.$ss_id2.'
';
}


else if($n2>0 and $estatus!='A' and $edit=='Approved') 
{
echo '<input type="button" style="background-color:'.$r_color.';color:white;" name="edit" value="'.$row1['emor'].'-'.$row1['location'].'" id="'.$row1['id'].'" class="btn btn-info btn-xs edit_data">


<br><span style="color:green;font-weight:bold">Start-</span><br>'.$ss_id1.'<br>
<span style="color:red;font-weight:bold">End-</span><br>'.$ss_id2.'
';
}

else if($n2>0 and $estatus!='A' and $edit=='') 
{
echo '<input type="button" style="background-color:'.$r_color.';color:white;" name="edit" value="'.$row1['emor'].'-'.$row1['location'].'" id="'.$row1['id'].'" class="btn btn-info btn-xs edit_data">


<br><span style="color:green;font-weight:bold">Start-</span><br>'.$ss_id1.'<br>
<span style="color:red;font-weight:bold">End-</span><br>'.$ss_id2.'
';
}
 
?>

<?php }?>
	
<?php

if($slv1>0 and $estatus=='' and $edit=='')
	
	{
		
		echo '<input type="button" style="background-color:red;color:white;" value="Leave" class="btn btn-info btn-xs edit_data1">
		
';
	}

	
else if($slv1>0 and $estatus=='' and $edit=='Pending')
	
	{
		
		echo '<s style="color:red">'.$row1['emor'].'-'.$row1['location'].'</s><br>
		<input type="button" style="background-color:red;color:white;" value="Leave" class="btn btn-info btn-xs edit_data1">
		
';
	}
	
	else if($slv1>0 and $estatus=='' and $edit=='Approved')
	
	{
		
		echo '<input type="button" style="background-color:red;color:white;" value="Leave" class="btn btn-info btn-xs edit_data1">
		
';
	}


else if($slv1>0 and $ss_id11=='0000-00-00 00:00:00' and $edit=='')
	
	{
		
		echo '<input type="button" style="background-color:red;color:white;" value="Leave" class="btn btn-info btn-xs edit_data1">
		
';
	}
	
	else if($slv1>0 and $ss_id11=='0000-00-00 00:00:00' and $edit=='pending')
	
	{
		
		echo '
		<s style="color:red">'.$row1['emor'].'-'.$row1['location'].'</s><br>
		<input type="button" style="background-color:red;color:white;" value="Leave" class="btn btn-info btn-xs edit_data1">
		
';
	}
	
	else if($slv1>0 and $ss_id11=='0000-00-00 00:00:00' and $edit=='Approved')
	
	{
		
		echo '<input type="button" style="background-color:red;color:white;" value="Leave" class="btn btn-info btn-xs edit_data1">
		
';
	}
	
	
else if($slv1>0 and $ss_id11!='0000-00-00 00:00:00' and $edit=='')
	
	{
		
		echo '<input type="button" style="background-color:red;color:white;" value="Leave" class="btn btn-info btn-xs edit_data1">
		
<br><span style="color:green;font-weight:bold">Start-</span><br>-'.$ss_id1.'<br>
<span style="color:red;font-weight:bold">End-</span><br>'.$ss_id2.'
';
	}

	
	else if($slv1>0 and $ss_id11!='0000-00-00 00:00:00' and $edit=='Pending')
	
	{
		
		echo '
		<s style="color:red">'.$row1['emor'].'-'.$row1['location'].'</s><br>
		<input type="button" style="background-color:red;color:white;" value="Leave" class="btn btn-info btn-xs edit_data1">
		
<br><span style="color:green;font-weight:bold">Start-</span><br>-'.$ss_id1.'<br>
<span style="color:red;font-weight:bold">End-</span><br>'.$ss_id2.'
';
	}

	else if($slv1>0 and $ss_id11!='0000-00-00 00:00:00' and $edit=='Approved')
	
	{
		
		echo '<input type="button" style="background-color:red;color:white;" value="Leave" class="btn btn-info btn-xs edit_data1">
		
<br><span style="color:green;font-weight:bold">Start-</span><br>-'.$ss_id1.'<br>
<span style="color:red;font-weight:bold">End-</span><br>'.$ss_id2.'
';
	}


	
else if($n2==0)
	
	{
		
		echo '<input type="button" name="'.$dd.'"  value="A" id="'.$row['sid'].'" class="btn btn-info btn-xs edit_data1">
		
		
		';
	}


else if($n2==0 and $estatus=='' and $edit=='Approved')
	
	{
		
		echo '<input type="button" name="'.$dd.'"  value="A" id="'.$row['sid'].'" class="btn btn-info btn-xs edit_data1">
		
		
		';
	}
	
	else if($n2==0 and $estatus=='' and $edit=='pending')
	
	{
		
		echo '
		
		<s style="color:red">'.$row1['emor'].'-'.$row1['location'].'</s><br>
		<input type="button" name="'.$dd.'"  value="A" id="'.$row['sid'].'" class="btn btn-info btn-xs edit_data1">
		
		
		';
	}

	
	
else if($n2==0 and $estatus!='A' and $edit=='')
	
	{
		
		echo '<input type="button" name="'.$dd.'"  value="A" id="'.$row['sid'].'" class="btn btn-info btn-xs edit_data1">
		<br><span style="color:green;font-weight:bold">Start-</span><br>'.$ss_id1.'<br>
<span style="color:red;font-weight:bold">End-</span><br>'.$ss_id2.'
		
		';
	}
	
	else if($n2==0 and $estatus!='A' and $edit=='Approved')
	
	{
		
		echo '<input type="button" name="'.$dd.'"  value="A" id="'.$row['sid'].'" class="btn btn-info btn-xs edit_data1">
		<br><span style="color:green;font-weight:bold">Start-</span><br>'.$ss_id1.'<br>
<span style="color:red;font-weight:bold">End-</span><br>'.$ss_id2.'
		
		';
	}
	
	else if($n2==0 and $estatus!='A' and $edit=='Pending')
	
	{
		
		echo '<s style="color:red">'.$row1['emor'].'-'.$row1['location'].'</s><br>
		<input type="button" name="'.$dd.'"  value="A" id="'.$row['sid'].'" class="btn btn-info btn-xs edit_data1">
		<br><span style="color:green;font-weight:bold">Start-</span><br>'.$ss_id1.'<br>
<span style="color:red;font-weight:bold">End-</span><br>'.$ss_id2.'
		
		';
	}


	else if($n2==0 and $estatus=='A' and $edit=='')
	
	{
		
		echo '<input type="button" name="'.$dd.'"  value="A" id="'.$row['sid'].'" class="btn btn-info btn-xs edit_data1">
		
		
		';
	}
	
	else if($n2==0 and $estatus=='A' and $edit=='Approved')
	
	{
		
		echo '<input type="button" name="'.$dd.'"  value="A" id="'.$row['sid'].'" class="btn btn-info btn-xs edit_data1">
		
		
		';
	}
	
	else if($n2==0 and $estatus=='A' and $edit=='Pending')
	
	{
		
		echo '<s style="color:red">'.$row1['emor'].'-'.$row1['location'].'</s><br>
		<input type="button" name="'.$dd.'"  value="A" id="'.$row['sid'].'" class="btn btn-info btn-xs edit_data1">
		
		
		';
	}

	
	
	?>

	

<?php echo "</td>";?>	
	  
<?php }?>
<?php echo "</tr>";?>
<?php $count++;}?>
 
	<tr>
	<td></td>
	
	<td>
<?php if($a_status=='Pending'){echo'
<input type="submit" name="s_approval" id="s_approval" value="Waiting For Approval" class="btn btn-danger" />';}

else if($a_status=='')
	{echo '<input type="submit" name="s_approval" id="s_approval" value="Not Prepared Yet" class="btn btn-warning" disabled/>';}

else if($a_status=='approved') {echo '<input type="submit" name="s_approval" id="s_approval" value="Already Approved" class="btn btn-success" disabled/>';}

?>  

  </td></tr>

  </tbody>
  
  
  
</table>
</form>

</body>

</html>


<div id="dataModal" class="modal fade">  
      <div class="modal-dialog" style="max-width: 80%;" role="document">  
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
                     <h4 class="modal-title"align='center'>Update Roster Duty</h4>  
                </div>  
                <div class="modal-body">  
                     <form method="post" id="insert_form" name="frmMain2">  
                          <label>Staff ID</label>  
                          <input type="text" name="pmrn" id="pmrn" class="form-control" size="15" readonly>  
						  
						   
						  
                          
						  
						  
		  
		   <label>Duty Location</label>  
						  <input type="text" name="pbp1" id="pbp1" class="form-control" readonly>
						
                          
			
			
		  </select>
		  
		  
		  <label>Duty Shift</label>  
						  <select type="text" name="pbp3" id="pbp3" class="form-control" required>
						<?php 
			$sql = "Select * from roster_duty_schedule order by schedule_name asc;";
			$res = mysqli_query($con, $sql);
			if(mysqli_num_rows($res) > 0) {
				while($row = mysqli_fetch_object($res)) {
					echo "<option value='".$row->schedule_name."'>".$row->schedule_name."</option>";
				}
			}
			?>
			<option value='Delete'>Delete</option>			
			
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
                url:"roaster_2_2.php",  
                method:"POST",  
                data:{employee_id:employee_id},  
				
                dataType:"json",  
                success:function(data){  
                     $('#pmrn').val(data.mor);  
                     
					 $('#pbp1').val(data.location); 
					 $('#pbp3').val(data.e_emor); 
					                  
					 
                     $('#employee_id').val(data.id);  
                     $('#insert45').val("Update");  
                     $('#add_data_Modal').modal('show');  
                }  
				 
				 
				 
				
				
           });  
      });  
      $('#insert_form').on("submit", function(event){  
           event.preventDefault();  
           if($('#pmrn').val() == "")  
           {  
                alert("MRN is required");  
           }  
          
           
           else  
           {  
                $.ajax({  
                     url:"roaster_3_3_doc.php",  
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
      
 });  
 
  
 </script>

 
 
 <div id="add_data_Modal1" class="modal fade">  
      <div class="modal-dialog">  
           <div class="modal-content">  
                <div class="modal-header">  
                     <button type="button" class="close" data-dismiss="modal">&times;</button>  
                     <h4 class="modal-title"align='center'>Add Roster Duty</h4>  
                </div>  
                <div class="modal-body">  
                     <form method="post" id="insert_form2" name="frmMain22">  
                          <label>Staff ID</label>  
                          <input type="text" name="pmrn1" id="pmrn1" class="form-control" size="15" readonly>  
						   
						   
						   <label>Date</label>  
						  
                          <input type="text" class="form-control" name="date" id="date" readonly></td>
						  
						  
		  <?php 
		  /*$gg=$_REQUEST['pmrn1'];
		  
		  $queryi = "SELECT * FROM staff3 where sid= '$gg'"; 
	 
$resulti = mysqli_query($con, $queryi) or die(mysqli_error());

// Print out result
$rowi = mysqli_fetch_array($resulti);

$fu = $rowi['sname'];

		  */
		  ?>
		   <label>Duty Location</label>  
						  <select type="text" name="pbp11" id="pbp11" class="form-control" required>
						
                         <option value='<?php echo $c_location;?>' selected><?php echo $c_location;?></option> 
			<?php 
			$sql = "Select * from roaster_location where dept='$dept' ;";
			$res = mysqli_query($con, $sql);
			if(mysqli_num_rows($res) > 0) {
				while($row = mysqli_fetch_object($res)) {
					echo "<option value='".$row->loc."'>".$row->loc."</option>";
				}
			}
			?>
			
			<option value='Off'>Off</option>    
		  </select>
		  
		  
		  <label>Duty Shift</label>  
						  <select type="text" name="pbp31" id="pbp31" class="form-control" required>
			
			<?php 
			$sql = "Select * from roster_duty_schedule order by schedule_name asc;";
			$res = mysqli_query($con, $sql);
			if(mysqli_num_rows($res) > 0) {
				while($row = mysqli_fetch_object($res)) {
					echo "<option value='".$row->schedule_name."'>".$row->schedule_name."</option>";
				}
			}
			?>
			
			
			
		  </select>
		  
		  
		  
					 
						  
						  
                          
                          
                          <input type="hidden" name="employee_id2" id="employee_id2" />  
						  
						       
							   <input type="submit" name="insert" id="insert4" value="Insert" class="btn btn-success" />  

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
           $('#insert_form2')[0].reset();  
      });  
      $(document).on('click', '.edit_data1', function(){  
           var employee_id2 = $(this).attr("id");  
		   var employee_id3 = $(this).attr("name");  
		   
		   
           $.ajax({  
                url:"roaster_2_21.php",  
                method:"POST",  
                data:{employee_id2:employee_id2},  
				
                dataType:"json",  
                success:function(data){  
                     $('#pmrn1').val(data.sid);  
                     
					 $('#pbp11').val(data.c_location); 
					 $('#pbp31').val(data.emor); 
					 $('#date').val(employee_id3); 
					 
					 
					  
                     
					 
                     $('#employee_id2').val(data.id);  
                     $('#insert4').val("Add");  
                     $('#add_data_Modal1').modal('show');  
                }  
				 
				 
				 
				
				
           });  
      });  
      $('#insert_form2').on("submit", function(event){  
           event.preventDefault();  
           if($('#pmrn1').val() == "")  
           {  
                alert("MRN is required");  
           }  
          
           
           else  
           {  
                $.ajax({  
                     url:"roaster3_31.php",  
                     method:"POST",  
                     data:$('#insert_form2').serialize(),  
                     beforeSend:function(){  
                          $('#insert').val("Inserting");  
                     },  
                     success:function(data){  
                          $('#insert_form2')[0].reset();  
                          $('#add_data_Modal1').modal('hide');  
                          $('#employee_table').html(data);  
						  
						  
						  
						  parent.location.reload();
                     }  
                });  
           }  
      });  
      
 });  
 
  
 </script>
 
 
 
<script>
function myFunction() {
  var input, filter, table, tr, td, i, txtValue;
  input = document.getElementById("myInput");
  filter = input.value.toUpperCase();
  table = document.getElementById("myTable");
  tr = table.getElementsByTagName("tr");
  for (i = 0; i < tr.length; i++) {
    
	td = tr[i].getElementsByTagName("td")[1];
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
function myFunction2() {
  var input, filter, table, tr, td, i, txtValue;
  input = document.getElementById("myInput2");
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
    
	td = tr[i].getElementsByTagName("td")[2];
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