<?php 
    session_start();
    require('db1.php');
	$role = $_SESSION['sess_userrole'];
	
$queryc = "SELECT COUNT(utype) FROM user where '$role' in ('staff','pharmacy')"; 
$resultc = mysqli_query($con, $queryc) or die(mysqli_error());
$rowc = mysqli_fetch_array($resultc);
$c1=$rowc['COUNT(utype)'];
	
    if(!isset($_SESSION['sess_username']) || $c1==0){
      header('Location: login2?err=2');
    }
?>

<?php

$db = mysqli_connect('localhost','root','Godiloveu16');
mysqli_select_db($db,'sfmmkpjnew');



/*
Author: Javed Ur Rehman
Website: https://www.allphptricks.com/
*/
//include("auth.php"); 
require('db1.php');
$appdate=date('Y-m-d');
$sno=$_REQUEST['sno'];
$user=$_SESSION["sess_username"];
//$user='322';


/*$query39 = "SELECT * FROM user where uname= '$user'"; 
	 
$result39 = mysqli_query($con, $query39) or die(mysqli_error());

// Print out result
$row39 = mysqli_fetch_array($result39);
$full = $row39['fullname'];





//include("auth.php");
$pmrn=$_REQUEST['pmrn'];
$eid=$_REQUEST['eid'];
$db = mysqli_connect('localhost','root','Godiloveu16');
mysqli_select_db($db,'sfmmkpjnew');
$query4 = mysqli_query($db,"select * from inpatient where pmrn='$pmrn' and eid='$eid'");
$data = mysqli_fetch_assoc($query4);
$adoc=$data['adoc'];
$emerid=$data['emerid'];

$query5 = mysqli_query($db,"select * from irefferal where pmrn='$pmrn' and eid='$eid' and infusion='$full' and cstatus='Active'");
$data5 = mysqli_fetch_assoc($query5);
$rtype=$data5['bed'];*/


$query39 = "SELECT * FROM phar_sale where sno= '$sno'"; 
	 
$result39 = mysqli_query($con, $query39) or die(mysqli_error());

// Print out result
$row39 = mysqli_fetch_array($result39);
$p_name = $row39['pname'];
$p_mrn = $row39['pmrn'];
$pmrn=$_REQUEST['pmrn'];

//$staff_dis=100;
//$pmrn=$data4['pmrn'];

$query_pa = mysqli_query($db,"select * from patient where pmrn='$pmrn'");
$data_pa = mysqli_fetch_assoc($query_pa);
$pa_type=$data_pa['type'];


$query_pa1 = mysqli_query($db,"select COUNT(ID) from patient where pmrn='$pmrn' and type in('Staff','Staff Childdren','Staff Spouse','Consultant')");
$data_pa1 = mysqli_fetch_assoc($query_pa1);
$staff_count=$data_pa1['COUNT(ID)'];


$query_pa2 = mysqli_query($db,"select COUNT(ID) from patient where pmrn='$pmrn' and type in('General','VIP','')");
$data_pa2 = mysqli_fetch_assoc($query_pa2);
$general_count=$data_pa2['COUNT(ID)'];

$query_pa3 = mysqli_query($db,"select COUNT(id),c_per from corporate where c_name='$pa_type'");
$data_pa3 = mysqli_fetch_assoc($query_pa3);
$cor_discount=$data_pa3['c_per'];
$cor_count=$data_pa3['COUNT(id)'];



 
?>


<?php
/*
Author: Javed Ur Rehman
Website: https://www.allphptricks.com/
*/
 
require('db1.php');

if(isset($_POST['Submit']))
{



$code = $_REQUEST['code'];
$pcode = $_REQUEST['pcode'];
$medi = $_REQUEST['medi'];
$uprice = $_REQUEST['uprice'];
$tprice = $_REQUEST['tprice'];
$tqty = $_REQUEST['tqty'];
$ins = $_REQUEST['ins'];
//$charge=$_REQUEST['charge'];
$charge= $tprice * $uprice;
$adate1= date('d/m/Y H:i:s');
$adate= date('Y-m-d');
$p_name1 = $_REQUEST['p_name'];
$p_mrn1 = $_REQUEST['p_mrn'];


$sel95="SELECT * FROM medicine WHERE `code`='$pcode' and status='Active';";
$result95 = mysqli_query($con,$sel95);
$b_chk=mysqli_fetch_assoc($result95);
$brand=$b_chk['brand1'];
$m_qty=$b_chk['tqty']-$tprice;


$sel96="SELECT * FROM medi_stock WHERE `rfid`='$code';";
$result96 = mysqli_query($con,$sel96);
$b_chk_m=mysqli_fetch_assoc($result96);
$mm_qty=$b_chk_m['add_qty'];
$m_qty1=$b_chk_m['add_qty']-$tprice;




$chk="SELECT * FROM phar_sale WHERE `sno`='$sno' and medi='$medi';";
$chk_result = mysqli_query($con,$chk);
$chk_row=mysqli_fetch_assoc($chk_result);
$mqty=$chk_row['qty'];
$r_id=$chk_row['id'];
$fqty=$mqty+$tprice;
$charge_f=$fqty*$uprice;


if($res95=mysqli_num_rows($result95)==0)
{
 	
       echo '<script language="javascript">';
    echo 'alert("Unsuccessful !!! The Medicine Name is not in the Database List.. Please contact with IT Department"); ';
    echo '</script>';
    }


	else if($tqty<$tprice)
{
 	
       echo '<script language="javascript">';
    echo 'alert("Unsuccessful !!! Available Quantity is Not Sufficient"); ';
    echo '</script>';
    }

	
else if($res95=mysqli_num_rows($result95)>0 and $mqty=='' and $mm_qty<=$tprice and $tprice>0){


			$strSQL2 = "insert into phar_sale(`medi`,`qty`,`uprice`,`tprice`,`aby`,`adate`,`sno`,`ins`,`brand`,`pname`,`pmrn`,`rfid`,`code`,`location`) values
			('$medi','$tprice','$uprice','$charge','$user','$adate','$sno','$ins','$brand','$p_name1','$p_mrn1','$code','$pcode','OTC')";
			//$strSQL .="WHERE id = '".$_POST["chkDel"][$i]."' ";
			$objQuery2 = mysqli_query($con,$strSQL2);
			
			
			//$ins_query2="update medicine set `tqty`='$m_qty' where code='$pcode'";
//mysqli_query($con,$ins_query2) or die(mysql_error());

//$ins_query3="update medi_stock set `add_qty`='0' where rfid='$code'";
//mysqli_query($con,$ins_query3) or die(mysql_error());

/*$sel97="SELECT * FROM medi_stock WHERE `code`='$pcode' and add_qty!='0';";
$result97 = mysqli_query($con,$sel97);
$b_chk_7=mysqli_fetch_assoc($result97);
$rfid1=$b_chk_7['rfid'];
$second_qty=$b_chk_7['add_qty']+$m_qty1;
*/
//$ins_query4="update medi_stock set `add_qty`='$second_qty' where rfid='$rfid1'and add_qty!='0'";
//mysqli_query($con,$ins_query4) or die(mysql_error());

$url = "phar_out_new_bill1_test?sno=$sno";
header("Location: $url"); 

      
}


else if($res95=mysqli_num_rows($result95)>0 and $mqty=='' and $mm_qty>=$tprice and $tprice>0){


			$strSQL2 = "insert into phar_sale(`medi`,`qty`,`uprice`,`tprice`,`aby`,`adate`,`sno`,`ins`,`brand`,`pname`,`pmrn`,`rfid`,`code`,`location`) values
			('$medi','$tprice','$uprice','$charge','$user','$adate','$sno','$ins','$brand','$p_name1','$p_mrn1','$code','$pcode','OTC')";
			//$strSQL .="WHERE id = '".$_POST["chkDel"][$i]."' ";
			$objQuery2 = mysqli_query($con,$strSQL2);
			
			
			//$ins_query2="update medicine set `tqty`='$m_qty' where code='$pcode'";
//mysqli_query($con,$ins_query2) or die(mysql_error());

/*$ins_query3="update medi_stock set `add_qty`='$m_qty1' where rfid='$code'";
mysqli_query($con,$ins_query3) or die(mysql_error());
*/
$url = "phar_out_new_bill1_test?sno=$sno";
header("Location: $url"); 


}


else if($res95=mysqli_num_rows($result95)>0 and $mqty!='' and $mm_qty<$tprice and $tprice>0){


			$strSQL2 = "update phar_sale set `qty`='$fqty',`tprice`='$charge_f',`aby`='$user',`adate`='$adate',`ins`='$ins',`pname`='$p_name1',`pmrn`='$p_mrn1' where id='$r_id'";
			//$strSQL .="WHERE id = '".$_POST["chkDel"][$i]."' ";
			$objQuery2 = mysqli_query($con,$strSQL2);

		$ins_query2="update medicine set `tqty`='$m_qty' where code='$pcode'";
mysqli_query($con,$ins_query2) or die(mysql_error());

/*$ins_query3="update medi_stock set `add_qty`='0' where rfid='$code'";
mysqli_query($con,$ins_query3) or die(mysql_error());


$sel97="SELECT * FROM medi_stock WHERE `code`='$pcode' and add_qty!='0';";
$result97 = mysqli_query($con,$sel97);
$b_chk_7=mysqli_fetch_assoc($result97);
$rfid1=$b_chk_7['rfid'];
$second_qty=$b_chk_7['add_qty']+$m_qty1;

$ins_query4="update medi_stock set `add_qty`='$second_qty' where rfid='$rfid1'";
mysqli_query($con,$ins_query4) or die(mysql_error());
*/
$url = "phar_out_new_bill1_test?sno=$sno";
header("Location: $url"); 

			}

else if($res95=mysqli_num_rows($result95)>0 and $mqty!='' and $mm_qty>=$tprice and $tprice>0){


			$strSQL2 = "update phar_sale set `qty`='$fqty',`tprice`='$charge_f',`aby`='$user',`adate`='$adate',`ins`='$ins',`pname`='$p_name1',`pmrn`='$p_mrn1' where id='$r_id'";
			//$strSQL .="WHERE id = '".$_POST["chkDel"][$i]."' ";
			$objQuery2 = mysqli_query($con,$strSQL2);

		//$ins_query2="update medicine set `tqty`='$m_qty' where code='$pcode'";
//mysqli_query($con,$ins_query2) or die(mysql_error());

/*$ins_query3="update medi_stock set `add_qty`='$m_qty1' where rfid='$code'";
mysqli_query($con,$ins_query3) or die(mysql_error());


$sel97="SELECT * FROM medi_stock WHERE `code`='$pcode' and add_qty!='0';";
$result97 = mysqli_query($con,$sel97);
$b_chk_7=mysqli_fetch_assoc($result97);
$rfid1=$b_chk_7['rfid'];
$second_qty=$b_chk_7['add_qty']+$m_qty1;

$ins_query4="update medi_stock set `add_qty`='$second_qty' where rfid='$rfid1'";
mysqli_query($con,$ins_query4) or die(mysql_error());
*/
$url = "phar_out_new_bill1_test?sno=$sno";
header("Location: $url"); 

			}




else 
	
	{
		
		echo '<script language="javascript">';
    echo 'alert("Unsuccessful !!! Session is closed .. pls login again"); ';
    echo '</script>';
	}
}
?>

<?php
if(isset($_POST['Submit1']))
{


$apptime=date('Y-m-d H:i:s');				

$vehicle1=$_REQUEST['vehicle1'];
$due_remarks=$_REQUEST['due_remarks'];
$taka=$_REQUEST['taka'];
$dis_taka=$_REQUEST['dis_taka'];
$percentage=$_REQUEST['percentage'];
$dis_percentage=$_REQUEST['dis_percentage'];
$discount_type=$_REQUEST['discount_type'];
$gtotal=$_REQUEST['gtotal'];
$discount_taka=$gtotal-$dis_taka;
$discount_percentage=$gtotal-$dis_percentage;
$queue=$_REQUEST['queue'];
	
	$db = mysqli_connect('localhost','root','Godiloveu16');
mysqli_select_db($db,'sfmmkpjnew');





			
$objConnect = mysqli_connect("localhost","root","Godiloveu16") or die("Error Connect to Database");
			$objDB1 = mysqli_select_db($objConnect,"sfmmkpjnew");
			

			$strSQL18 = "select COUNT(id) from phar_sale where sno='$sno' and location='OTC'";
			//$strSQL .="WHERE id = '".$_POST["chkDel"][$i]."' ";
			$objQuery18 = mysqli_query($objConnect,$strSQL18);
			$result18 = mysqli_fetch_array($objQuery18);

if($result18['COUNT(id)']>0){


$apptime=date('Y-m-d H:i:s');
	

	$qq = mysqli_query($db,"select SUM(tprice) from phar_sale where sno='$sno' and location='OTC'");
			$dd = mysqli_fetch_assoc($qq);
			$payment=$dd['SUM(tprice)'];


  $sale_date=date('Y-m-d');
  

	/*$qq1 = mysqli_query($db,"select COUNT(billno) from pms_bill where date='$sale_date'");
			$dd1 = mysqli_fetch_assoc($qq1);
			$queue1=$dd1['COUNT(billno)']+1;
			$queue=$user.$queue1;  
  */
$servername = "localhost";
$username1 = "root";
$password1 = "Godiloveu16";
$dbname1 = "sfmmkpjnew";

// Create connection
$conn = new mysqli($servername, $username1, $password1, $dbname1);
// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}


if($discount_type==''){
$sql = "insert into pms_bill(pmrn,eid,location,amount,amount_receive,date,time,user,remarks,dname,s_no,p_mode,p_remarks,sno,queue) VALUES
('$p_mrn', '$eid', 'OTC_Sale', '$payment','$payment', '$appdate', '$apptime', '$user', '$ipd', 'Medicine(OTC)','$mno', '$vehicle1', '$due_remarks','$sno','$queue')";


}

else if($discount_type=='taka'){
$sql = "insert into pms_bill(pmrn,eid,location,amount,amount_receive,date,time,user,remarks,dname,s_no,p_mode,p_remarks,sno,dis_amount,queue) VALUES
('$p_mrn', '$eid', 'OTC_Sale', '$gtotal', '$gtotal','$appdate', '$apptime', '$user', '$ipd', 'Medicine(OTC)','$mno', '$vehicle1', '$due_remarks','$sno','$discount_taka','$queue')";
}

else if($discount_type=='percentage'){
$sql = "insert into pms_bill(pmrn,eid,location,amount,amount_receive,date,time,user,remarks,dname,s_no,p_mode,p_remarks,sno,dis_amount,queue) VALUES
('$p_mrn', '$eid', 'OTC_Sale', '$gtotal', '$gtotal','$appdate', '$apptime', '$user', '$ipd', 'Medicine(OTC)','$mno', '$vehicle1', '$due_remarks','$sno',$discount_percentage,'$queue')";
}
  

  if ($conn->query($sql) === TRUE) {
  $last_id = $conn->insert_id;	







  if($discount_type==''){
    $date=date('Y-m-d');
    $ins_query="insert into pms_tb (`trans_id`,`trans_type`,`acct_code`,`date`,`amount`,`location`) 
    values ('$last_id','CR','112000','$date','$gtotal','OTC PHARMACY')";
    mysqli_query($con,$ins_query) or die(mysql_error());
  
    
  $ins_query7="insert into pms_tb (`trans_id`,`trans_type`,`acct_code`,`date`,`amount`,`location`) 
  values ('$last_id','DR','615100','$date','$gtotal','OTC PHARMACY')";
  mysqli_query($con,$ins_query7) or die(mysql_error());
  
  
    if($vehicle1=='Cash')
    {
    $ins_query2="insert into pms_tb (`trans_id`,`trans_type`,`acct_code`,`date`,`amount`,`location`) 
    values ('$last_id','DR','619210','$date','$gtotal','OTC PHARMACY')";
    mysqli_query($con,$ins_query2) or die(mysql_error());
  
    $ins_query8="insert into pms_tb (`trans_id`,`trans_type`,`acct_code`,`date`,`amount`,`location`) 
  values ('$last_id','CR','615100','$date','$gtotal','OTC PHARMACY')";
  mysqli_query($con,$ins_query8) or die(mysql_error());
  
    }
  
  
  
  else if($vehicle1=='Card')
    {
    $ins_query2="insert into pms_tb (`trans_id`,`trans_type`,`acct_code`,`date`,`amount`,`location`) 
    values ('$last_id','DR','619230','$date','$gtotal','OTC PHARMACY')";
    mysqli_query($con,$ins_query2) or die(mysql_error());
  
    $ins_query8="insert into pms_tb (`trans_id`,`trans_type`,`acct_code`,`date`,`amount`,`location`) 
  values ('$last_id','CR','615100','$date','$gtotal','OTC PHARMACY')";
  mysqli_query($con,$ins_query8) or die(mysql_error());
  
    }
  
    else if($vehicle1=='Bkash')
    {
    $ins_query2="insert into pms_tb (`trans_id`,`trans_type`,`acct_code`,`date`,`amount`,`location`) 
    values ('$last_id','DR','619230','$date','$gtotal','OTC PHARMACY')";
    mysqli_query($con,$ins_query2) or die(mysql_error());
  
    $ins_query8="insert into pms_tb (`trans_id`,`trans_type`,`acct_code`,`date`,`amount`,`location`) 
  values ('$last_id','CR','615100','$date','$gtotal','OTC PHARMACY')";
  mysqli_query($con,$ins_query8) or die(mysql_error());
  
    }
  
  }
  
  
  
  else if($discount_type=='taka'){
    
    $net_amount=$gtotal-$discount_taka;
    $date=date('Y-m-d');
    $ins_query="insert into pms_tb (`trans_id`,`trans_type`,`acct_code`,`date`,`amount`,`location`) 
    values ('$last_id','CR','112000','$date','$net_amount','OTC PHARMACY')";
    mysqli_query($con,$ins_query) or die(mysql_error());
  
    
  $ins_query7="insert into pms_tb (`trans_id`,`trans_type`,`acct_code`,`date`,`amount`,`location`) 
  values ('$last_id','DR','615100','$date','$net_amount','OTC PHARMACY')";
  mysqli_query($con,$ins_query7) or die(mysql_error());
  
  
    if($vehicle1=='Cash')
    {
    $ins_query2="insert into pms_tb (`trans_id`,`trans_type`,`acct_code`,`date`,`amount`,`location`) 
    values ('$last_id','DR','619210','$date','$net_amount','OTC PHARMACY')";
    mysqli_query($con,$ins_query2) or die(mysql_error());
  
    $ins_query8="insert into pms_tb (`trans_id`,`trans_type`,`acct_code`,`date`,`amount`,`location`) 
  values ('$last_id','CR','615100','$date','$net_amount','OTC PHARMACY')";
  mysqli_query($con,$ins_query8) or die(mysql_error());
  
    }
  
  
  
  else if($vehicle1=='Card')
    {
    $ins_query2="insert into pms_tb (`trans_id`,`trans_type`,`acct_code`,`date`,`amount`,`location`) 
    values ('$last_id','DR','619230','$date','$net_amount','OTC PHARMACY')";
    mysqli_query($con,$ins_query2) or die(mysql_error());
  
    $ins_query8="insert into pms_tb (`trans_id`,`trans_type`,`acct_code`,`date`,`amount`,`location`) 
  values ('$last_id','CR','615100','$date','$net_amount','OTC PHARMACY')";
  mysqli_query($con,$ins_query8) or die(mysql_error());
  
    }
  
    else if($vehicle1=='Bkash')
    {
    $ins_query2="insert into pms_tb (`trans_id`,`trans_type`,`acct_code`,`date`,`amount`,`location`) 
    values ('$last_id','DR','619230','$date','$net_amount','OTC PHARMACY')";
    mysqli_query($con,$ins_query2) or die(mysql_error());
  
    $ins_query8="insert into pms_tb (`trans_id`,`trans_type`,`acct_code`,`date`,`amount`,`location`) 
  values ('$last_id','CR','615100','$date','$net_amount','OTC PHARMACY')";
  mysqli_query($con,$ins_query8) or die(mysql_error());
  
    }
  
  
  }
  
  
  
  
  else if($discount_type=='percentage'){
  
    $net_amount=$gtotal-$discount_percentage;
    $date=date('Y-m-d');
    $ins_query="insert into pms_tb (`trans_id`,`trans_type`,`acct_code`,`date`,`amount`,`location`) 
    values ('$last_id','CR','112000','$date','$net_amount','OTC PHARMACY')";
    mysqli_query($con,$ins_query) or die(mysql_error());
  
    
  $ins_query7="insert into pms_tb (`trans_id`,`trans_type`,`acct_code`,`date`,`amount`,`location`) 
  values ('$last_id','DR','615100','$date','$net_amount','OTC PHARMACY')";
  mysqli_query($con,$ins_query7) or die(mysql_error());
  
  
    if($vehicle1=='Cash')
    {
    $ins_query2="insert into pms_tb (`trans_id`,`trans_type`,`acct_code`,`date`,`amount`,`location`) 
    values ('$last_id','DR','619210','$date','$net_amount','OTC PHARMACY')";
    mysqli_query($con,$ins_query2) or die(mysql_error());
  
    $ins_query8="insert into pms_tb (`trans_id`,`trans_type`,`acct_code`,`date`,`amount`,`location`) 
  values ('$last_id','CR','615100','$date','$net_amount','OTC PHARMACY')";
  mysqli_query($con,$ins_query8) or die(mysql_error());
  
    }
  
  
  
  else if($vehicle1=='Card')
    {
    $ins_query2="insert into pms_tb (`trans_id`,`trans_type`,`acct_code`,`date`,`amount`,`location`) 
    values ('$last_id','DR','619230','$date','$net_amount','OTC PHARMACY')";
    mysqli_query($con,$ins_query2) or die(mysql_error());
  
    $ins_query8="insert into pms_tb (`trans_id`,`trans_type`,`acct_code`,`date`,`amount`,`location`) 
  values ('$last_id','CR','615100','$date','$net_amount','OTC PHARMACY')";
  mysqli_query($con,$ins_query8) or die(mysql_error());
  
    }
  
    else if($vehicle1=='Bkash')
    {
    $ins_query2="insert into pms_tb (`trans_id`,`trans_type`,`acct_code`,`date`,`amount`,`location`) 
    values ('$last_id','DR','619230','$date','$net_amount','OTC PHARMACY')";
    mysqli_query($con,$ins_query2) or die(mysql_error());
  
    $ins_query8="insert into pms_tb (`trans_id`,`trans_type`,`acct_code`,`date`,`amount`,`location`) 
  values ('$last_id','CR','615100','$date','$net_amount','OTC PHARMACY')";
  mysqli_query($con,$ins_query8) or die(mysql_error());
  
    }
  
  
  }
  

  /*$qq5 = mysqli_query($db,"select * from pms_bill where billno='$last_id'");
			$dd5 = mysqli_fetch_assoc($qq5);
			$phar_pay=$dd5['amount'];



  $sql2 = "insert into pms_payment(pmrn,eid,location,amount,date,time,user,remarks,dname,s_no,p_mode,`p_remarks`,`billno1`) VALUES
  ('$pmrn','$eid','OPD Procedure Room','$payment_amount','$appdate','$apptime','$user','Pharmacy BILL','alltest','$mno','$payment_mode','$due_remarks','$billno')";
  $conn->query($sql2);
  */
$sql1 = "update phar_sale set billno='$last_id' where sno='$sno' and location='OTC'";
$conn->query($sql1);
//header("Location: opd_bill_pdf22_new_medi_otc.php?adate1=$adate1&pmrn=$pmrn&dname=$dname&billno=$last_id&eid=$eid");
header("Location: phar_out_new_bill1_test?sno=$sno");

}
			
 else {
  echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();
	
			
			//$strSQL16 = "update pmedi set billno='$billno' where pmrn='$pmrn' and eid='$eid' and billno=''";
			//$strSQL .="WHERE id = '".$_POST["chkDel"][$i]."' ";
			//$objQuery16 = mysqli_query($objConnect,$strSQL16);

			
}
	

else {
	
			echo '<script language="javascript">';
    echo 'alert("Bill Alreday Confirmed !!
	"); ';
	//echo -e "\e[38;5;11m Test\e[m";


    echo '</script>';
}	
	
}



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

  
$query198 = "SELECT SUM(tprice) FROM phar_sale where sno='$sno'"; 
	 
$result198 = mysqli_query($dbhandle,$query198) or die(mysql_error());

// Print out result
$row198 = mysqli_fetch_array($result198);
$test1=	$row198['SUM(tprice)'];
//echo $test1;


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



<script>
function showUser() {
 
  var xmlhttp=new XMLHttpRequest();
  xmlhttp.onreadystatechange=function() {
    if (this.readyState==4 && this.status==200) {
      document.getElementById("txtHint1").innerHTML=this.responseText;
    }
  }
  xmlhttp.open("GET","phar_serial.php",true);
  xmlhttp.send();
}



showUser()
setInterval(function(){
showUser()

},10);
</script>

</head>

<body>

<div id='cssmenu'>
<ul>
   <li><a href='phar_home'><span>Home</span></a></li>
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

<div class='container'>


<form name="frmMain1" action="" method="post" > 

<div id="txtHint1" name="serial"></div> 
          <table align="center" class="table table-bordered" id="itemTable">  

						
<tr><td colspan="20" align="center"bgcolor="lightgreen"><label><h1 style="color:red"><strong>Bill No - <?php echo $sno;?></strong></h1></label></td> </tr>

<tr>
<td colspan="10" align="center"><label><strong>MRN</strong></label></td> 

<td colspan="10" align="center"><label><strong>Patient Name</strong></label></td> <tr>

<tr>
<td colspan="10" align="center"><input type="text" name="p_name" id="" required value="<?php echo $p_name;?>" style="font-weight: bold;font-size:22px;color:green"></td> 
<td colspan="10" align="center"><input type="text" name="p_mrn" id=""  value="<?php echo $p_mrn;?>" style="font-weight: bold;font-size:22px;color:green"></td>
</tr>

<tr>
<td colspan="2" align="center"><label><strong>Barcode/RFID</strong></label></td> 
<td colspan="2" align="center"><label><strong>Code</strong></label></td> 

<td colspan="6" align="center"><label><strong>Medicine Name</strong></label></td> 
<td colspan="2" align="center"><label><strong>Available Qty</strong></label></td> 
<td colspan="2" align="center"><label><strong>Unit Price</strong></label></td>

<td colspan="3" align="center"><label><strong>Issue qty</strong></label></td>
<td colspan="3" align="center"><label><strong>Total Price</strong></label></td></tr>
<tr>
<td colspan="2">

<input type="text"  onchange="two(this.value)" class="form-control action" list="categoryname" autocomplete="off" name='code'  style="font-weight: bold;font-size:22px;color:green">

    <datalist id="categoryname">
	<option value=''>-Select-</option>
				
				<?php
            require('db1.php');
            $uname = '';
            $query = "SELECT * FROM medicine WHERE status='Active'";
            $result = mysqli_query($con, $query);
            while($row = mysqli_fetch_array($result)) {
        ?>
            <option value="<?php echo $row['code']; ?>"><?php echo $row['mname'].'('.$row['brand1'].')'; ?></option>
        <?php } ?>
        
    </datalist>
	
	</td>
				<td colspan="2"><input type="text" name="pcode" id="pcode" required value="" readonly style="font-weight: bold;font-size:22px;color:green"></td>	

<td colspan="6" align="center"><textarea name="medi" id="code" class="form-control action" cols="30" rows="5"style="font-weight: bold;font-size:22px;color:green"readonly required>


</textarea>

</td>
	
	
						
						
						 
						
						
						<td colspan="2"><input type="text" name="tqty" id="tqty" required value="" readonly style="font-weight: bold;font-size:22px;color:green" class="avail" ></td>
						

<td colspan="2" ><input type="text" class="price" name="uprice" id="uprice" required value="" readonly style="font-weight: bold;font-size:22px;color:green"></td>
						
						
						<td colspan="3" ><input type="text" name="tprice" id="qty" value="" style="font-weight: bold;font-size:22px;color:green" class="qty"></td>
						
							
						
						
						<td colspan="3" ><input type="text" name="charge" id="tprice" readonly value="" style="font-weight: bold;font-size:22px;color:green"required class="row_total">
            <br />
            <?php if($row39['billno']==''){echo'
            <button type="submit" name="Submit">Add</button>';}?>
            </td>

						
						
						
						<script>
  $("input").on("change", function() {
   // var ret = parseInt($("#field1").val()) - parseInt($("#field2").val())
	var ret1 = parseInt($("#uprice").val()) 
	var ret2 = parseInt($("#qty").val())
	var ret3=ret2 * ret1
	//var ret4=ret3 * 100
	//var ret5=ret4 / ret1
	if(ret3>0){
    $("#tprice").val(ret3);
	
	//$("#tprice").style.color = "red";
	
	}
	else {
		$("#tprice").val();
		//$("#tprice").style.color = "green";6
	}
  })
</script>
</tr>
	<tr>
<td colspan="20" align="center"><textarea name="ins" id="ins" class="form-control action" cols="30" rows="2"style="font-weight: bold;font-size:22px;color:green"required>


</textarea>

</td>

</tr>

	<tr >
	
	<td colspan="10"align="right" style="font-weight: bold;font-size:35px;color:red">Grand Total</td>
	<td colspan="10"align="right"><input id='gtotal' name='gtotal' style="font-weight: bold;font-size:35px;color:red" readonly value="<?php echo $test1;?>"></td>
</tr>

<tr>
<td colspan="5" align="left" style="color:red; font-weight:bold;font-size:18px"><label><strong>Type </strong></label>
<select name="discount_type" value="" class="style1" id="pmrn" onchange="GetDetail(this.value)" width="20px;">
			        
					 <option value=''>--Select--</option>
					 <option value='taka'>Discount In Taka</option>
					 <option value='percentage'>Discount In Percentage</option>
					 
									
										 
										 
				
			</select>
			
	
		
</td>	
	
	<td colspan="10">

<input name="taka" type="number" class="style1" id="sdate12" placeholder="Discount In Taka" max="100" hidden style="font-size:20px;color:red;font-weight:bold;">
<input type="number" name="percentage" id="sdate1" class="style1" placeholder="Discount In Percentage" max="10" hidden style="font-size:20px;color:red;font-weight:bold;">



</td>


		
		

		<td colspan="5"align="right">
		<input type="text" id="dis_taka" name="dis_taka" value="" hidden style="font-size:20px;color:red;font-weight:bold;"> 
<input type="text" id="dis_percentage" name="dis_percentage" value="" hidden style="font-size:20px;color:red;font-weight:bold;"> 
 <script>
  $("input").on("change", function() {
   // var ret = parseInt($("#field1").val()) - parseInt($("#field2").val())
	var ret1 = parseInt($("#gtotal").val()) 
	var ret2 = parseInt($("#sdate12").val())
	var ret3 = parseInt($("#sdate1").val())
	var ret4=ret1-ret2
	var ret5=ret3 / 100
	var ret6=ret1 * ret5
	var ret7=parseInt(ret1 - ret6)
	
    $("#dis_taka").val(ret4);
	$("#dis_percentage").val(ret7);
  })
</script>


	
	
	
	
	</tr>
	
	
	
	<tr>
<td colspan="10"><input type="radio" id="vehicle1" name="vehicle1" value="Cash"  id="chkPassport"onclick="EnableDisableTextBox(this)"  style="height:20px; width:20px; color:red;"checked><span style="font-size:20px;color:red;font-weight:bold;">Cash</span>				 
<input type="radio" id="vehicle1" name="vehicle1" value="bkash"id="chkPassport1" onclick="EnableDisableTextBox1(this)" style="height:20px; width:20px; color:red;"><span style="font-size:20px;color:red;font-weight:bold;">Bikash</span>	
<input type="radio" id="vehicle1" name="vehicle1" value="Card"id="chkPassport2" onclick="EnableDisableTextBox2(this)" style="height:20px; width:20px; color:red;"><span style="font-size:20px;color:red;font-weight:bold;">Card</span>				 

      <input name="due_remarks" type="text" size="40" style="text-transform:uppercase" value="" id="sdate21" disabled="disabled" placeholder="Reference No">

</td>	  

<?php if($row39['billno']!=''){echo'

	<td colspan="10"align="right"><a target="_blank" href="opd_bill_pdf22_new_medi_otc_pos.php?pmrn='.$p_mrn.'&dname='.$dname.'&billno='.$row39['billno'].'&eid='.$eid.'"><img src="phar_pic/print.png" title="Print Receipt" width="100" height="80" /></a>

&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<a target="_blank" href="opd_bill_pdf22_new_medi_otc_pos_1??pmrn='.$p_mrn.'&dname='.$dname.'&billno='.$row39['billno'].'&eid='.$eid.'"><img src="phar_pic/barcode.png" title="Print Instruction" width="100" height="80" /></a>


</td>';}?>

<script src='a_j_q/jquery-3.3.1.min.js' type="text/javascript"></script>
        <script type="text/javascript">
            $(document).ready(function(){

                // Check/Uncheck ALl
                $('#checkAll').change(function(){
                    if($(this).is(':checked')){
                        $('input[name="update[]"]').prop('checked',true);
                    }else{
                        $('input[name="update[]"]').each(function(){
                            $(this).prop('checked',false);
                        }); 
                    }
                });

                // Checkbox click
                $('input[name="update[]"]').click(function(){
                    var total_checkboxes = $('input[name="update[]"]').length;
                    var total_checkboxes_checked = $('input[name="update[]"]:checked').length;

                    if(total_checkboxes_checked == total_checkboxes){
                        $('#checkAll').prop('checked',true);
                    }else{
                        $('#checkAll').prop('checked',false);
                    }
                });
            });
        </script>	


	
	<tr>
      <td colspan="1" align="center"><strong>S.No</strong></td>
      <td colspan="1" align="center"><strong>SNO</strong></td>
      <td colspan="8" align="center"><strong>Medi</strong></td>
      <td colspan="3" align="center"><strong>Qty </strong></td>
      
      <td colspan="3" align="center"><strong>Unit Price</strong></td>
	  <td colspan="3" align="center"><strong>Total Price</strong></td>
	  
<td colspan="1" align="center"><strong>Edit </strong></td>
	   </tr>
 
	
	
	<?php
	
$user=$_SESSION["sess_username"];
$pmrn=$data["pmrn"];
//$id=$_REQUEST["id"];
$episode=$data["eid"];
$count=1;
//$count=1;
$sel_query="Select * from phar_sale where sno= '$sno' order by `id` DESC;";

$result = mysqli_query($con,$sel_query);

while($row = mysqli_fetch_assoc($result)) 
{ ?>    <tr>

      <td align="center" colspan="1"><?php echo $count; ?></td>
      <td align="center"colspan="1"><?php echo $row["sno"]; ?></td>
      <td align="center"colspan="8"><?php echo $row["medi"]; ?></td>
	  <td align="center"colspan="3"><?php echo $row["qty"]; ?></td>  
      
	  <td align="center"colspan="3"><?php echo $row["uprice"]; ?></td>
	  <td align="center"colspan="3" ><?php echo $row["tprice"]; ?></td>
      
	  
	  <?php 
	  $id=$row["id"];
	  $user7=$row["user"];
	  $url7 = "idoccnoteedit?pmrn=$pmrn&eid=$eid&id=$id"; 
	  
	  if($user7==$full){echo"
	  <td colspan='1' align='center'><a href='$url7'>Edit</a></td>
	  ";} else{echo"<td colspan='1'></td>";}?>	
	  
  	  

	  
      </tr>
    <?php $count++; } ?>
	
	<tr>
		
	
<?php if($row39['billno']==''){echo'


<td colspan="20"align="right"><button type="submit" name="Submit1">Confirm</button></td>';}?>
	  

</tr>

	
	
	 </table>
            </form>
        </div>



<script>

		// onkeyup event will occur when the user
		// release the key and calls the function
		// assigned to this event
		function two(str) {
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
				xmlhttp.open("GET", "phar_out1_new_new.php?pmrn=" + str, true);
				
				// Sends the request to the server
				xmlhttp.send();
			}
		}
	</script>  




</body>

</html>
<script type="text/javascript">
    function EnableDisableTextBox(chkPassport) {
   
        
        var txtPassportNumber4 = document.getElementById("sdate21");
        txtPassportNumber4.disabled = chkPassport.unchecked ? false : true;
        if (!txtPassportNumber4.disabled) {
            txtPassportNumber4.focus();
        }
		
		
    }
	
		function EnableDisableTextBox1(chkPassport1) {
   
        
        var txtPassportNumber6 = document.getElementById("sdate21");
        txtPassportNumber6.disabled = chkPassport1.checked ? false : true;
        if (!txtPassportNumber6.disabled) {
            txtPassportNumber6.focus();
        }
	}
	
	function EnableDisableTextBox2(chkPassport2) {
   
        
        var txtPassportNumber6 = document.getElementById("sdate21");
        txtPassportNumber6.disabled = chkPassport2.checked ? false : true;
        if (!txtPassportNumber6.disabled) {
            txtPassportNumber6.focus();
        }
	}
</script>



<script>

		// onkeyup event will occur when the user
		// release the key and calls the function
		// assigned to this event
		

		function GetDetail(str) {
			
				var rt = document.getElementById('pmrn').value;
				

								if(rt === ""){
    
	
	
	sdate1.hidden = true;
	sdate1.disabled = true;
	
	
	sdate12.hidden = true;
	sdate12.disabled = true;
	
	sdate12.hidden = true;
	sdate12.disabled = true;
	
	dis_taka.hidden = true;
	dis_taka.disabled = true;
	
	dis_percentage.hidden = true;
	dis_percentage.disabled = true;
  }	  
	

				
				
				else if(rt === "percentage"){
    
	
	
	sdate1.hidden = false;
	sdate1.disabled = false;
	
	
	sdate12.hidden = true;
	sdate12.disabled = true;
	
	dis_taka.hidden = true;
	dis_taka.disabled = true;
	
	dis_percentage.hidden = false;
	dis_percentage.disabled = false;
	
	
  }	  
  
	
else if(rt === "taka"){
    
	
	
	sdate1.hidden = true;
	sdate1.disabled = true;
	
	
	sdate12.hidden = false;
	sdate12.disabled = false;
	
	dis_taka.hidden = false;
	dis_taka.disabled = false;
	
	dis_percentage.hidden = true;
	dis_percentage.disabled = true;
  }	  
  
  
	
				
			}
		
	</script>  
	

  <script>
document.addEventListener("input", function(e) {

    if (
        e.target.classList.contains("qty")
    ) {
        updateRowAndGrand(e.target);
    }

});

function updateRowAndGrand(qtyInput) {

    let row = qtyInput.closest("tr");

    let available = Number(row.querySelector(".avail").value);
    let qty       = Number(row.querySelector(".qty").value);
    let price     = Number(row.querySelector(".price").value);
    let rowTotal  = row.querySelector(".row_total");

    // 🔴 Prevent selling more than available
    if (qty > available) {
        alert("You cannot sell more than available stock!");
        qtyInput.value = available;
        qty = available;
    }

    // 🟢 Row Total = qty * price
    let total = qty * price;
    rowTotal.value = total;

    // 🟣 Now update grand total
    calculateGrandTotal();
}

function calculateGrandTotal() {
    let total = 0;
    document.querySelectorAll(".row_total").forEach(function(input){
        total += Number(input.value);
    });

    document.getElementById("gtotal4").value = total;
}
</script>