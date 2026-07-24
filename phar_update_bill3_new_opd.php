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
include "con_db.php";
$appdate=date('Y-m-d');
?>
<?php
/*
Author: Javed Ur Rehman
Website: https://www.allphptricks.com/
*/
//include("auth.php"); 
require('db1.php');
$db = mysqli_connect('localhost','root','Godiloveu16');
mysqli_select_db($db,'sfmmkpjnew');

$user=$_SESSION["sess_username"];
$pmrn=$_REQUEST['pmrn'];
$eid=$_REQUEST['eid'];
$dname=$_REQUEST['dname'];
$sno=$_REQUEST['sno'];
$stime = date('d/m/Y H:i:s');
//$pmrn=$_REQUEST['pmrn'];
//$full=$_REQUEST['dreffer'];
//$eid=$_REQUEST['eid'];
//$ieid=$_REQUEST['ieid'];
//$type=$_REQUEST['type'];

//include("auth.php");



$query_pa = mysqli_query($db,"select * from patient where pmrn='$pmrn'");
$data_pa = mysqli_fetch_assoc($query_pa);
$pa_type=$data_pa['type'];


$query_pa1 = mysqli_query($db,"select COUNT(ID) from patient where pmrn='$pmrn' and type in('Staff','Staff Children','Staff Spouse','Consultant')");
$data_pa1 = mysqli_fetch_assoc($query_pa1);
$staff_count=$data_pa1['COUNT(ID)'];




$queryc5 = "SELECT COUNT(id) FROM staff3 where mrn='$pmrn' and status='Active' and cstatus='Confirm'"; 
	$resultc5 = mysqli_query($con, $queryc5) or die(mysqli_error());
	$rowc5 = mysqli_fetch_array($resultc5);


	$queryc56 = "SELECT COUNT(id) FROM staff1 where mrn='$pmrn' and astatus='Active' and ugroup='Doctor'"; 
	$resultc56 = mysqli_query($con, $queryc56) or die(mysqli_error());
	$rowc56 = mysqli_fetch_array($resultc56);

	//echo $ddg=$rowc56['COUNT(id)'];

	$queryc55 = "SELECT COUNT(id) FROM dependency where d_mrn='$pmrn' and status='Active'"; 
	$resultc55 = mysqli_query($con, $queryc55) or die(mysqli_error());
	$rowc55 = mysqli_fetch_array($resultc55);



	$queryc555 = "SELECT * FROM dependency where d_mrn='$pmrn' and status='Active'"; 
	$resultc555 = mysqli_query($con, $queryc555) or die(mysqli_error());
	$rowc555 = mysqli_fetch_array($resultc555);

$s_mrn=$rowc555['s_mrn'];
$s_relation=$rowc555['s_relation'];

	$queryc58 = "SELECT COUNT(id) FROM staff3 where mrn='$s_mrn' and status='Active'"; 
	$resultc58 = mysqli_query($con, $queryc58) or die(mysqli_error());
	$rowc58 = mysqli_fetch_array($resultc58);



	$queryc59 = "SELECT COUNT(id) FROM staff1 where mrn='$s_mrn' and astatus='Active'"; 
	$resultc59 = mysqli_query($con, $queryc59) or die(mysqli_error());
	$rowc59 = mysqli_fetch_array($resultc59);


	if($rowc5['COUNT(id)']>0)
	{
	$staff_dis='20';
	}

	else if($rowc56['COUNT(id)']>0)
	{
	$staff_dis='20';
	}

	else if($rowc55['COUNT(id)']>0 and $rowc58['COUNT(id)']>0 and $s_relation=='Spouse')
	{
	$staff_dis='20';
	}

	else if($rowc55['COUNT(id)']>0 and $rowc58['COUNT(id)']>0 and $s_relation=='Children-01')
	{
	$staff_dis='20';
	}

	else if($rowc55['COUNT(id)']>0 and $rowc58['COUNT(id)']>0 and $s_relation=='Children-02')
	{
	$staff_dis='20';
	}

	/*else if($rowc55['COUNT(id)']>0 and $rowc58['COUNT(id)']>0 and $s_relation=='Children-03')
	{
	$staff_dis='20';
	}
	else if($rowc55['COUNT(id)']>0 and $rowc58['COUNT(id)']>0 and $s_relation=='Children-04')
	{
	$staff_dis='20';
	}

	else if($rowc55['COUNT(id)']>0 and $rowc58['COUNT(id)']>0 and $s_relation=='Parents')
	{
	$staff_dis='20';
	}
*/

	else if($rowc55['COUNT(id)']>0 and $rowc59['COUNT(id)']>0 and $s_relation=='Spouse')
	{
	$staff_dis='20';
	}


	else if($rowc55['COUNT(id)']>0 and $rowc59['COUNT(id)']>0 and $s_relation=='Children-01')
	{
	$staff_dis='20';
	}

	else if($rowc55['COUNT(id)']>0 and $rowc59['COUNT(id)']>0 and $s_relation=='Children-02')
	{
	$staff_dis='20';
	}

	/*else if($rowc55['COUNT(id)']>0 and $rowc59['COUNT(id)']>0 and $s_relation=='Children-03')
	{
	$staff_dis='20';
	}
	else if($rowc55['COUNT(id)']>0 and $rowc59['COUNT(id)']>0 and $s_relation=='Children-04')
	{
	$staff_dis='20';
	}

	else if($rowc55['COUNT(id)']>0 and $rowc59['COUNT(id)']>0 and $s_relation=='Parents')
	{
	$staff_dis='20';
	}
	*/
	else {

		$staff_dis='0';
	}






$query_pa2 = mysqli_query($db,"select COUNT(ID) from patient where pmrn='$pmrn' and type in('General','VIP','')");
$data_pa2 = mysqli_fetch_assoc($query_pa2);
$general_count=$data_pa2['COUNT(ID)'];

$query_pa3 = mysqli_query($db,"select COUNT(id) from corporate where code='$pa_type' and code NOT IN ('General','Staff','')");
$data_pa3 = mysqli_fetch_assoc($query_pa3);

$query_pa4 = mysqli_query($db,"select * from corporate where code='$pa_type'");
$data_pa4 = mysqli_fetch_assoc($query_pa4);

$cor_discount=$data_pa4['c_per'];
$cor_count=$data_pa3['COUNT(id)'];
$corporate_name=$data_pa4['code'];
$corporate_name1=$data_pa4['c_name'];







$ldate=date('Y-m-d');

$query39 = "SELECT * FROM phar_sale where sno= '$sno' and billno!=''"; 
	 
$result39 = mysqli_query($con, $query39) or die(mysqli_error());

// Print out result
$row39 = mysqli_fetch_array($result39);

?>


<?php

if(isset($_POST['but_update'])){
	
	


if(empty($_REQUEST['update']))
{
	echo '<script language="javascript">';
    echo 'alert("Unsuccessful !!! No Row Selected!!"); ';
    echo '</script>';
	
}


            else if($user!=''){
$apptime=date('Y-m-d H:i:s');				

$vehicle1=$_REQUEST['vehicle1'];
$due_remarks=$_REQUEST['due_remarks'];
$taka=$_REQUEST['taka'];
$dis_taka=$_REQUEST['dis_taka'];
$percentage=$_REQUEST['percentage'];
$dis_percentage=$_REQUEST['dis_percentage'];
$discount_type=$_REQUEST['discount_type1'];
$gtotal=$_REQUEST['gtotal'];
$ftype=$_REQUEST['ftype'];
$discount_taka=$gtotal-$dis_taka;
$discount_percentage=$gtotal-$dis_percentage;
//$host=$_REQUEST['queue'];
$host=$_REQUEST['queue'];

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

$sale_date=date('Y-m-d');
  

	/*$qq1 = mysqli_query($db,"select COUNT(billno) from pms_bill where date='$sale_date'");
			$dd1 = mysqli_fetch_assoc($qq1);
			$queue1=$dd1['COUNT(billno)']+1;
			$queue=$user.$queue1;  
  */



if($discount_type==''){
$sql = "insert into pms_bill(pmrn,eid,location,amount,amount_receive,date,time,user,remarks,dname,s_no,p_mode,p_remarks,sno,queue,cor_name) VALUES
('$pmrn', '$eid', 'OPD_Medi', '$gtotal','$gtotal', '$appdate', '$apptime', '$user', '$ipd', 'OPD_Medi','$mno', '$vehicle1', '$due_remarks','$sno','$host','$ftype')";



}

else if($discount_type=='taka'){

  $sql = "insert into pms_bill(pmrn,eid,location,amount,amount_receive,date,time,user,remarks,dname,s_no,p_mode,p_remarks,sno,dis_amount,queue,cor_name) VALUES
('$pmrn', '$eid', 'OPD_Medi', '$gtotal','$gtotal', '$appdate', '$apptime', '$user', '$ipd', 'OPD_Medi','$mno', '$vehicle1', '$due_remarks','$sno','$discount_taka','$host','$ftype')";





}

else if($discount_type=='percentage'){

  $net_amount=$gtotal-$discount_percentage;

$sql = "insert into pms_bill(pmrn,eid,location,amount,amount_receive,date,time,user,remarks,dname,s_no,p_mode,p_remarks,sno,dis_amount,queue,cor_name) VALUES
('$pmrn', '$eid', 'OPD_Medi', '$gtotal','$gtotal', '$appdate', '$apptime', '$user', '$ipd', 'OPD_Medi','$mno', '$vehicle1', '$due_remarks','$sno',$discount_percentage,'$host','$ftype')";




}

if ($conn->query($sql) === TRUE) {
  $last_id = $conn->insert_id;	

if($discount_type==''){
  $date=date('Y-m-d');
	$ins_query="insert into pms_tb (`trans_id`,`trans_type`,`acct_code`,`date`,`amount`,`location`) 
	values ('$last_id','CR','112000','$date','$gtotal','OPD PHARMACY')";
	mysqli_query($con,$ins_query) or die(mysql_error());

	
$ins_query7="insert into pms_tb (`trans_id`,`trans_type`,`acct_code`,`date`,`amount`,`location`) 
values ('$last_id','DR','615100','$date','$gtotal','OPD PHARMACY')";
mysqli_query($con,$ins_query7) or die(mysql_error());


	if($vehicle1=='Cash')
	{
	$ins_query2="insert into pms_tb (`trans_id`,`trans_type`,`acct_code`,`date`,`amount`,`location`) 
	values ('$last_id','DR','619210','$date','$gtotal','OPD PHARMACY')";
	mysqli_query($con,$ins_query2) or die(mysql_error());

	$ins_query8="insert into pms_tb (`trans_id`,`trans_type`,`acct_code`,`date`,`amount`,`location`) 
values ('$last_id','CR','615100','$date','$gtotal','OPD PHARMACY')";
mysqli_query($con,$ins_query8) or die(mysql_error());

	}



else if($vehicle1=='Card')
	{
	$ins_query2="insert into pms_tb (`trans_id`,`trans_type`,`acct_code`,`date`,`amount`,`location`) 
	values ('$last_id','DR','619230','$date','$gtotal','OPD PHARMACY')";
	mysqli_query($con,$ins_query2) or die(mysql_error());

	$ins_query8="insert into pms_tb (`trans_id`,`trans_type`,`acct_code`,`date`,`amount`,`location`) 
values ('$last_id','CR','615100','$date','$gtotal','OPD PHARMACY')";
mysqli_query($con,$ins_query8) or die(mysql_error());

	}

	else if($vehicle1=='bkash')
	{
	$ins_query2="insert into pms_tb (`trans_id`,`trans_type`,`acct_code`,`date`,`amount`,`location`) 
	values ('$last_id','DR','619230','$date','$gtotal','OPD PHARMACY')";
	mysqli_query($con,$ins_query2) or die(mysql_error());

	$ins_query8="insert into pms_tb (`trans_id`,`trans_type`,`acct_code`,`date`,`amount`,`location`) 
values ('$last_id','CR','615100','$date','$gtotal','OPD PHARMACY')";
mysqli_query($con,$ins_query8) or die(mysql_error());

	}

}



else if($discount_type=='taka'){
  
  $net_amount=$gtotal-$discount_taka;
  $date=date('Y-m-d');
	$ins_query="insert into pms_tb (`trans_id`,`trans_type`,`acct_code`,`date`,`amount`,`location`) 
	values ('$last_id','CR','112000','$date','$net_amount','OPD PHARMACY')";
	mysqli_query($con,$ins_query) or die(mysql_error());

	
$ins_query7="insert into pms_tb (`trans_id`,`trans_type`,`acct_code`,`date`,`amount`,`location`) 
values ('$last_id','DR','615100','$date','$net_amount','OPD PHARMACY')";
mysqli_query($con,$ins_query7) or die(mysql_error());


	if($vehicle1=='Cash')
	{
	$ins_query2="insert into pms_tb (`trans_id`,`trans_type`,`acct_code`,`date`,`amount`,`location`) 
	values ('$last_id','DR','619210','$date','$net_amount','OPD PHARMACY')";
	mysqli_query($con,$ins_query2) or die(mysql_error());

	$ins_query8="insert into pms_tb (`trans_id`,`trans_type`,`acct_code`,`date`,`amount`,`location`) 
values ('$last_id','CR','615100','$date','$net_amount','OPD PHARMACY')";
mysqli_query($con,$ins_query8) or die(mysql_error());

	}



else if($vehicle1=='Card')
	{
	$ins_query2="insert into pms_tb (`trans_id`,`trans_type`,`acct_code`,`date`,`amount`,`location`) 
	values ('$last_id','DR','619230','$date','$net_amount','OPD PHARMACY')";
	mysqli_query($con,$ins_query2) or die(mysql_error());

	$ins_query8="insert into pms_tb (`trans_id`,`trans_type`,`acct_code`,`date`,`amount`,`location`) 
values ('$last_id','CR','615100','$date','$net_amount','OPD PHARMACY')";
mysqli_query($con,$ins_query8) or die(mysql_error());

	}

	else if($vehicle1=='bkash')
	{
	$ins_query2="insert into pms_tb (`trans_id`,`trans_type`,`acct_code`,`date`,`amount`,`location`) 
	values ('$last_id','DR','619230','$date','$net_amount','OPD PHARMACY')";
	mysqli_query($con,$ins_query2) or die(mysql_error());

	$ins_query8="insert into pms_tb (`trans_id`,`trans_type`,`acct_code`,`date`,`amount`,`location`) 
values ('$last_id','CR','615100','$date','$net_amount','OPD PHARMACY')";
mysqli_query($con,$ins_query8) or die(mysql_error());

	}


}




else if($discount_type=='percentage'){

  $net_amount=$gtotal-$discount_percentage;
  $date=date('Y-m-d');
	$ins_query="insert into pms_tb (`trans_id`,`trans_type`,`acct_code`,`date`,`amount`,`location`) 
	values ('$last_id','CR','112000','$date','$net_amount','OPD PHARMACY')";
	mysqli_query($con,$ins_query) or die(mysql_error());

	
$ins_query7="insert into pms_tb (`trans_id`,`trans_type`,`acct_code`,`date`,`amount`,`location`) 
values ('$last_id','DR','615100','$date','$net_amount','OPD PHARMACY')";
mysqli_query($con,$ins_query7) or die(mysql_error());


	if($vehicle1=='Cash')
	{
	$ins_query2="insert into pms_tb (`trans_id`,`trans_type`,`acct_code`,`date`,`amount`,`location`) 
	values ('$last_id','DR','619210','$date','$net_amount','OPD PHARMACY')";
	mysqli_query($con,$ins_query2) or die(mysql_error());

	$ins_query8="insert into pms_tb (`trans_id`,`trans_type`,`acct_code`,`date`,`amount`,`location`) 
values ('$last_id','CR','615100','$date','$net_amount','OPD PHARMACY')";
mysqli_query($con,$ins_query8) or die(mysql_error());

	}



else if($vehicle1=='Card')
	{
	$ins_query2="insert into pms_tb (`trans_id`,`trans_type`,`acct_code`,`date`,`amount`,`location`) 
	values ('$last_id','DR','619230','$date','$net_amount','OPD PHARMACY')";
	mysqli_query($con,$ins_query2) or die(mysql_error());

	$ins_query8="insert into pms_tb (`trans_id`,`trans_type`,`acct_code`,`date`,`amount`,`location`) 
values ('$last_id','CR','615100','$date','$net_amount','OPD PHARMACY')";
mysqli_query($con,$ins_query8) or die(mysql_error());

	}

	else if($vehicle1=='bkash')
	{
	$ins_query2="insert into pms_tb (`trans_id`,`trans_type`,`acct_code`,`date`,`amount`,`location`) 
	values ('$last_id','DR','619230','$date','$net_amount','OPD PHARMACY')";
	mysqli_query($con,$ins_query2) or die(mysql_error());

	$ins_query8="insert into pms_tb (`trans_id`,`trans_type`,`acct_code`,`date`,`amount`,`location`) 
values ('$last_id','CR','615100','$date','$net_amount','OPD PHARMACY')";
mysqli_query($con,$ins_query8) or die(mysql_error());

	}


}

				
                foreach($_POST['update'] as $updateid){
					
			
			$objConnect = mysqli_connect("localhost","root","Godiloveu16") or die("Error Connect to Database");
			$objDB1 = mysqli_select_db($objConnect,"sfmmkpjnew");

			$qq = mysqli_query($db,"select * from pmedi where id='".$updateid."'");
			$dd = mysqli_fetch_assoc($qq);
			$medi_1 = $dd["medi"];
			$code_1 = $dd["code"];
			$p_mrn = $dd["pmrn"];
			$p_name = $dd["pname"];
			
			$qq1 = mysqli_query($db,"select * from medicine where mname='".$medi_1."' and status='Active'");
			$dd1 = mysqli_fetch_assoc($qq1);
			$p_price=$dd1['uprice'];
			$brand=$dd1['brand1'];
			$lqty=$dd1['tqty'];
			$ins = $dd["pdos"].','.$dd["frelation"].','.$dd["duration"];
			
$eqty2 = $_POST['eqty1_'.$updateid];
$eqty5 = $_POST['eqty2_'.$updateid];
$u_qty=$eqty5-$eqty2;
$u_price=$eqty2*$p_price;

			$ortime = date('d/m/Y H:i:s');
			$adate = date('Y-m-d');
			
			
			
	$chk=mysqli_query($db,"SELECT * FROM phar_sale WHERE `sno`='$sno' and medi='$medi_1' and billno='$last_id'");
	$chk_row=mysqli_fetch_assoc($chk);
	$mqty=$chk_row['qty'];
	$r_id=$chk_row['id'];
	$fqty=$mqty+$eqty2;
	$charge_f=$fqty*$p_price;
		
			

$sel96="SELECT * FROM medi_stock WHERE `code`='$code_1' and add_qty>0 and location='Pharmacy_opd' order by exdate asc limit 1;";
$result96 = mysqli_query($con,$sel96);
$b_chk_m=mysqli_fetch_assoc($result96);
$mm_qty=$b_chk_m['add_qty'];
$m_qty1=$eqty2-$b_chk_m['add_qty'];
$m_qty1_t=$b_chk_m['add_qty']-$eqty2;
$rf=$b_chk_m['rfid'];
$mid=$b_chk_m['id'];




//if($eqty5 >= $eqty2 and $mqty=='' and $mm_qty>=$eqty2 and $eqty2>0)
//if($eqty5 >= $eqty2  and $eqty2>0)
if($eqty2>0)
	
	{
			
			
					
			$strSQL1 = "update pmedi set status='Served',qty='$eqty2',billno='$last_id' where id='".$updateid."'";
			$objQuery1 = mysqli_query($objConnect,$strSQL1);

			//$ins_query3="update medi_stock set `add_qty`='$m_qty1_t' where id='$mid' and location='Pharmacy'";
			//mysqli_query($con,$ins_query3) or die(mysql_error());
			
			//$ins_query3i="update medicine set `l_sale_date`='$ldate' where code='$code_1'";
			//mysqli_query($con,$ins_query3i) or die(mysql_error());

	
	$strSQL2 = "insert into phar_sale(`medi`,`qty`,`uprice`,`tprice`,`aby`,`adate`,`sno`,`brand`,`ins`,`location`,`code`,`pmrn`,`pname`,`rfid`,`billno`,`eid`) values
			('$medi_1','$eqty2','$p_price','$u_price','$user','$adate','$sno','$brand','$ins','OPD','$code_1','$p_mrn','$p_name','$rf','$last_id','$eid')";
			//$strSQL .="WHERE id = '".$_POST["chkDel"][$i]."' ";
			$objQuery2 = mysqli_query($objConnect,$strSQL2);
	}

	
	
			
			

//#1
				
			
			else if($eqty5 >= $eqty2 and $mqty=='' and $eqty2>'10000')
	{
			
			
					
			$strSQL1 = "update pmedi set status='Served',qty='$eqty2',billno='$last_id' where id='".$updateid."'";
			$objQuery1 = mysqli_query($objConnect,$strSQL1);

			//$ins_query3="update medi_stock set `add_qty`='0' where id='$mid' and location='Pharmacy'";
			//mysqli_query($con,$ins_query3) or die(mysql_error());
			
			$ins_query3i="update medicine set `l_sale_date`='$ldate' where code='$code_1'";
			mysqli_query($con,$ins_query3i) or die(mysql_error());

			$strSQL2 = "insert into phar_sale(`medi`,`qty`,`uprice`,`tprice`,`aby`,`adate`,`sno`,`brand`,`ins`,`location`,`code`,`pmrn`,`pname`,`rfid`,`billno`,`eid`) values
			('$medi_1','$eqty2','$p_price','$u_price','$user','$adate','$sno','$brand','$ins','OPD','$code_1','$p_mrn','$p_name','$rf','$last_id','$eid')";
			//$strSQL .="WHERE id = '".$_POST["chkDel"][$i]."' ";
			$objQuery2 = mysqli_query($objConnect,$strSQL2);
			
			
			$sel97="SELECT * FROM medi_stock WHERE `code`='$code_1' and add_qty>0 and location='Pharmacy_opd' order by exdate asc limit 1;";
			$result97 = mysqli_query($con,$sel97);
			$b_chk_7=mysqli_fetch_assoc($result97);
			$rfid1=$b_chk_7['rfid'];
			$mid1=$b_chk_7['id'];
			$second_qty=$b_chk_7['add_qty']-$m_qty1;
			$second_qty1=$m_qty1-$b_chk_7['add_qty'];

//#2
			
			if($b_chk_7['add_qty']>=$m_qty1)
	
			{
			//$ins_query4="update medi_stock set `add_qty`='$second_qty' where id='$mid1' and location='Pharmacy'";
			//mysqli_query($con,$ins_query4) or die(mysql_error());

			}
			
			else if($b_chk_7['add_qty']<$m_qty1)
		
			{
			
			//$ins_query4="update medi_stock set `add_qty`='0' where id='$mid1' and location='Pharmacy'";
			//mysqli_query($con,$ins_query4) or die(mysql_error());
				

$sel97b="SELECT * FROM medi_stock WHERE `code`='$code_1' and add_qty>0 and location='Pharmacy_opd' order by exdate asc limit 1;";
$result97b = mysqli_query($con,$sel97b);
$b_chk_7b=mysqli_fetch_assoc($result97b);
$rfid1b=$b_chk_7b['rfid'];
$midb=$b_chk_7b['id'];
$third_qtyb=$b_chk_7b['add_qty']-$second_qty1;
$third_qtyb1=$second_qty1-$b_chk_7b['add_qty'];

//#3

if($b_chk_7b['add_qty']>=$second_qty1)
{
//$ins_query4="update medi_stock set `add_qty`='$third_qtyb' where id='$midb' and location='Pharmacy'";
//mysqli_query($con,$ins_query4) or die(mysql_error());
}

else if($b_chk_7b['add_qty']<$second_qty1)
{
	
//$ins_query4="update medi_stock set `add_qty`='0' where id='$midb' and location='Pharmacy'";
//mysqli_query($con,$ins_query4) or die(mysql_error());
		

$sel97c="SELECT * FROM medi_stock WHERE `code`='$code_1' and add_qty>0 and location='Pharmacy_opd' order by exdate asc limit 1;";
$result97c = mysqli_query($con,$sel97c);
$b_chk_7c=mysqli_fetch_assoc($result97c);
$rfid1c=$b_chk_7c['rfid'];
$midc=$b_chk_7c['id'];
$forth_qtyc=$b_chk_7c['add_qty']-$third_qtyb1;
$forth_qtyc1=$third_qtyb1-$b_chk_7c['add_qty'];

//#4

if($b_chk_7c['add_qty']>=$third_qtyb1)
{
//$ins_query4="update medi_stock set `add_qty`='$forth_qtyc' where id='$midc' and location='Pharmacy'";
//mysqli_query($con,$ins_query4) or die(mysql_error());
}
else if($b_chk_7c['add_qty']<$third_qtyb1)
{
	
//$ins_query4="update medi_stock set `add_qty`='0' where id='$midc' and location='Pharmacy'";
//mysqli_query($con,$ins_query4) or die(mysql_error());
		

$sel97d="SELECT * FROM medi_stock WHERE `code`='$code_1' and add_qty>0 and location='Pharmacy_opd' order by exdate asc limit 1;";
$result97d = mysqli_query($con,$sel97d);
$b_chk_7d=mysqli_fetch_assoc($result97d);
$rfid1d=$b_chk_7d['rfid'];
$midd=$b_chk_7d['id'];
$fifth_qtyd=$b_chk_7d['add_qty']-$forth_qtyc1;
$fifth_qtyd1=$forth_qtyc1-$b_chk_7d['add_qty'];

//#5


if($b_chk_7d['add_qty']>=$forth_qtyc1)
{
//$ins_query4="update medi_stock set `add_qty`='$fifth_qtyd' where id='$midd' and location='Pharmacy'";
//mysqli_query($con,$ins_query4) or die(mysql_error());
}
else if($b_chk_7d['add_qty']<$forth_qtyc1)
{
	//$ins_query4="update medi_stock set `add_qty`='0' where id='$midd' and location='Pharmacy'";
//mysqli_query($con,$ins_query4) or die(mysql_error());

$sel97e="SELECT * FROM medi_stock WHERE `code`='$code_1' and add_qty>0 and location='Pharmacy_opd' order by exdate asc limit 1;";
$result97e = mysqli_query($con,$sel97e);
$b_chk_7e=mysqli_fetch_assoc($result97e);
$rfid1e=$b_chk_7e['rfid'];
$mide=$b_chk_7e['id'];
$sixth_qtyd=$b_chk_7e['add_qty']-$fifth_qtyd1;
$sixth_qtyd1=$fifth_qtyd1-$b_chk_7e['add_qty'];
	
	
	



//#6


if($b_chk_7e['add_qty']>=$fifth_qtyd1)
{
//$ins_query4="update medi_stock set `add_qty`='$sixth_qtyd' where id='$mide' and location='Pharmacy'";
//mysqli_query($con,$ins_query4) or die(mysql_error());
}
else if($b_chk_7e['add_qty']<$fifth_qtyd1)
{
	//$ins_query4="update medi_stock set `add_qty`='0' where id='$mide' and location='Pharmacy'";
//mysqli_query($con,$ins_query4) or die(mysql_error());

$sel97f="SELECT * FROM medi_stock WHERE `code`='$code_1' and add_qty>0 and location='Pharmacy_opd' order by exdate asc limit 1;";
$result97f = mysqli_query($con,$sel97f);
$b_chk_7f=mysqli_fetch_assoc($result97f);
$rfid1f=$b_chk_7f['rfid'];
$midf=$b_chk_7f['id'];
$seven_qtyd=$b_chk_7f['add_qty']-$sixth_qtyd1;
$seven_qtyd1=$sixth_qtyd1-$b_chk_7f['add_qty'];
	
	
	


//#7


if($b_chk_7f['add_qty']>=$sixth_qtyd1)
{
//$ins_query4="update medi_stock set `add_qty`='$seven_qtyd' where id='$midf' and location='Pharmacy'";
//mysqli_query($con,$ins_query4) or die(mysql_error());
}
else if($b_chk_7f['add_qty']<$sixth_qtyd1)
{
	//$ins_query4="update medi_stock set `add_qty`='0' where id='$midf' and location='Pharmacy'";
//mysqli_query($con,$ins_query4) or die(mysql_error());

$sel97g="SELECT * FROM medi_stock WHERE `code`='$code_1' and add_qty>0 and location='Pharmacy_opd' order by exdate asc limit 1;";
$result97g = mysqli_query($con,$sel97g);
$b_chk_7g=mysqli_fetch_assoc($result97g);
$rfid1g=$b_chk_7g['rfid'];
$midf=$b_chk_7g['id'];
$eight_qtyd=$b_chk_7g['add_qty']-$seven_qtyd1;
$eight_qtyd1=$seven_qtyd1-$b_chk_7g['add_qty'];
	
	
	


//#8


if($b_chk_7g['add_qty']>=$seven_qtyd1)
{
//$ins_query4="update medi_stock set `add_qty`='$eight_qtyd' where id='$midf' and location='Pharmacy'";
//mysqli_query($con,$ins_query4) or die(mysql_error());
}
else if($b_chk_7g['add_qty']<$seven_qtyd1)
{
	//$ins_query4="update medi_stock set `add_qty`='0' where id='$midf' and location='Pharmacy'";
//mysqli_query($con,$ins_query4) or die(mysql_error());

$sel97h="SELECT * FROM medi_stock WHERE `code`='$code_1' and add_qty>0 and location='Pharmacy_opd' order by exdate asc limit 1;";
$result97h = mysqli_query($con,$sel97h);
$b_chk_7h=mysqli_fetch_assoc($result97h);
$rfid1h=$b_chk_7h['rfid'];
$midh=$b_chk_7h['id'];
$nine_qtyd=$b_chk_7h['add_qty']-$eight_qtyd1;
$nine_qtyd1=$eight_qtyd1-$b_chk_7h['add_qty'];
	
	
	



//#9


if($b_chk_7h['add_qty']>=$eight_qtyd1)
{
//$ins_query4="update medi_stock set `add_qty`='$nine_qtyd' where id='$midh' and location='Pharmacy'";
//mysqli_query($con,$ins_query4) or die(mysql_error());
}
else if($b_chk_7h['add_qty']<$eight_qtyd1)
{
	//$ins_query4="update medi_stock set `add_qty`='0' where id='$midh' and location='Pharmacy'";
//mysqli_query($con,$ins_query4) or die(mysql_error());

$sel97i="SELECT * FROM medi_stock WHERE `code`='$code_1' and add_qty>0 and location='Pharmacy_opd' order by exdate asc limit 1;";
$result97i = mysqli_query($con,$sel97i);
$b_chk_7i=mysqli_fetch_assoc($result97i);
$rfid1i=$b_chk_7i['rfid'];
$midi=$b_chk_7i['id'];
$ten_qtyd=$b_chk_7i['add_qty']-$eight_qtyd1;
$ten_qtyd1=$eight_qtyd1-$b_chk_7i['add_qty'];



//#10


if($b_chk_7i['add_qty']>=$nine_qtyd1)
{
//$ins_query4="update medi_stock set `add_qty`='$ten_qtyd' where id='$midi' and location='Pharmacy'";
//mysqli_query($con,$ins_query4) or die(mysql_error());
}
else if($b_chk_7i['add_qty']<$nine_qtyd1)
{
	//$ins_query4="update medi_stock set `add_qty`='0' where id='$midi' and location='Pharmacy'";
//mysqli_query($con,$ins_query4) or die(mysql_error());

/*$sel97i="SELECT * FROM medi_stock WHERE `code`='$code_1' and add_qty>0 and location='Pharmacy' order by exdate asc limit 1;";
$result97i = mysqli_query($con,$sel97i);
$b_chk_7i=mysqli_fetch_assoc($result97i);
$rfid1i=$b_chk_7i['rfid'];
$ten_qtyd=$b_chk_7i['add_qty']-$eight_qtyd1;
$ten_qtyd1=$eight_qtyd1-$b_chk_7i['add_qty'];
	*/
	
}}}}	}
}
	
}

		}
	//$url = "srequest2" ;
//header("Location:$url");
			
	}
	}
	
	
	
	
				}


	
$qq = mysqli_query($db,"select SUM(tprice) from phar_sale where pmrn='$pmrn' and eid='$eid' and location='OPD' and billno='$last_id'");
			$dd = mysqli_fetch_assoc($qq);
			$payment=$dd['SUM(tprice)'];
			
			
			

  
  //$sql1 = "update pms_bill set amount='$payment' where billno='$last_id'";
//$conn->query($sql1);
header("Location: phar_update_bill3_new_opd.php?pmrn=$pmrn&dname=$dname&eid=$eid&sno=$sno");
//header("Location: opd_bill_pdf22_new_medi?pmrn=$pmrn&dname=$dname&billno=$last_id&eid=$eid");


}
else {
	
	$sql4 = "update pms_bill set eid='', error='Network Problem' where billno='$last_id'";
$conn->query($sql4);
  echo "Error: " . $sql . "<br>" . $conn->error;
}


$conn->close();


}
}
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



<script>
function confirmAction() {
  return confirm("Are you sure you want to proceed?");
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

<div class='container'>


<form name="frmMain1" action="" method="post" onsubmit="return confirmAction();"> 
<div id="txtHint1" name="serial"></div> 
<table id="itemTable" border="1" cellpadding="4" width="1100">
<tr>
      <td colspan="1" align="center"><strong>S.No</strong></td>
     
      <td colspan="8" align="center"><strong>Medicine Name</strong></td>
	  <td colspan="1" align="center"><strong>Code</strong></td>
	  <td colspan="5" align="center"><strong>Instruction</strong></td>
     	  <td colspan="1" align="center"><strong>Available QTY</strong></td>
		  <td colspan="1" align="center"><strong>Unit Price</strong></td>
      	  <td colspan="1" align="center"><strong>Issue_Qty</strong></td>
		  <td colspan="1" align="center"><strong>Total price</strong></td>
		  
		  
		
       

	   </tr>
	   


<?php


                    //$query = "select * from pmedi where pmrn='$pmrn' and dname='$dname' and eid='$eid' order by page_order asc";
					$query = "select * from pmedi where pmrn='$pmrn' and eid='$eid' order by page_order asc";
                    $result = mysqli_query($con,$query);
					$count=1;
                    while($i = mysqli_fetch_array($result) ){
                        $id = $i['id'];
                        $medi = $i['medi'];
						$pdos = $i['pdos'];
						$duration = $i['duration'];
						$frelation = $i['frelation'];
                       
$query1 = "select * from medicine where mname='$medi' and status='Active'";
                    $result1 = mysqli_query($con,$query1);
					   $row1 = mysqli_fetch_array($result1);
                       
$mcode = $row1['code'];
	  $sum = "SELECT SUM(add_qty) FROM medi_stock where code='$mcode' and location='Pharmacy_opd'" ;
	 
$sum1 = mysqli_query($con, $sum) or die(mysqli_error());
$sumr = mysqli_fetch_assoc($sum1);
$new_qty=$sumr['SUM(add_qty)'];
$id=$i['id'];
?>
<tr>
<td align="center" colspan="1" <?php if($new_qty>0){echo'style="font-weight: bold;font-size:22px;color:green"';} else{echo'style="font-weight: bold;font-size:22px;color:red"';}?>><?php echo $count; ?></td>
    <td align="center" colspan="8" <?php if($new_qty>0){echo'style="font-weight: bold;font-size:22px;color:green"';} else{echo'style="font-weight: bold;font-size:22px;color:red"';}?>><?= $i['medi'].' ('.$i['brand'].')'; ?></td>

    <td align="center"colspan="1" <?php if($new_qty>0){echo'style="font-weight: bold;font-size:22px;color:green"';} else{echo'style="font-weight: bold;font-size:22px;color:red"';}?>><?php echo $row1["code"]; ?></td>
    <td align="center"colspan="5" <?php if($new_qty>0){echo'style="font-weight: bold;font-size:22px;color:green"';} else{echo'style="font-weight: bold;font-size:22px;color:red"';}?>><?php echo $i["pdos"].'<br>'.$i["frelation"].'<br>'.$i["duration"]; ?></td>
    <td align="center" colspan="1" <?php if($new_qty>0){echo'style="font-weight: bold;font-size:22px;color:green"';} else{echo'style="font-weight: bold;font-size:22px;color:red"';}?>>
        <input name="eqty2_<?= $id ?>" type="number" class="avail" value="<?= $new_qty ?>" readonly <?php if($new_qty>0){echo'style="font-weight: bold;font-size:22px;color:green"';} else{echo'style="font-weight: bold;font-size:22px;color:red"';}?>>
    </td>

    
    <td>
        <input type="number" class="price" name="eqty3_<?= $id ?>" value="<?= $row1['uprice'] ?>" readonly <?php if($new_qty>0){echo'style="font-weight: bold;font-size:22px;color:green"';} else{echo'style="font-weight: bold;font-size:22px;color:red"';}?>>
    </td>
    <td>
        <input type="number" name="eqty1_<?= $id ?>" class="qty" min="0" value="0" <?php if($new_qty>0){echo'style="font-weight: bold;font-size:22px;color:green"';} else{echo'style="font-weight: bold;font-size:22px;color:red"';}?>>
    </td>

    <td>
        <input type="number" class="row_total" name="row_total[]" value="0" readonly <?php if($new_qty>0){echo'style="font-weight: bold;font-size:22px;color:green"';} else{echo'style="font-weight: bold;font-size:22px;color:red"';}?>>
    </td>
    <td align="center" colspan="1"><input type='checkbox' name='update[]' value='<?= $id ?>' checked hidden></td>						
</tr>
<?php $count++;} ?>
<tr>


	</tr>
	
</table>



<br>
<strong>Grand Total:</strong>
<input type="number" id="gtotal" name="gtotal" value="0" readonly style="font-weight: bold;font-size:22px;color:red">

<tr>

<td colspan="5" align="left" style="color:red; font-weight:bold;font-size:18px"><label><strong>payer </strong></label>

<select name="ftype" id="txtHint3" class="style1" placeholder="Patient Type"  style="background-color:lightgreen;font-size:18px;font-weight:bold;color:red;width:200px" onchange="GetDetail7(this.value)" required> 
		
		
		<option value="">--Select--</option>
			<option value="Self">Self</option>
			
			<?php if($cor_count>0){echo'
			<option value="Corporate">Corporate</option>';}
			else if($staff_count>0){echo'
			<option value="SFMM">Hospital Staff</option>';}?>
			
			
				
      </select>
	  
			</td>

<td colspan="5" align="left" style="color:red; font-weight:bold;font-size:18px"><label><strong>Type </strong></label>
<select name="discount_type1" value="" class="style1" id="pmrn" onchange="GetDetail(this.value)" width="20px;">
			        
					 <option value=''>--Select--</option>
					 <option value='taka'>Discount In Taka</option>
					 <option value='percentage'>Discount In Percentage</option>
					 
									
										 
										 
				
			</select>
			
      <input name="cr" type="text" id="cor_dis" placeholder=""value="<?php if($staff_count>0){echo $staff_dis;} else if($cor_count>0) {echo $cor_discount;}?>" readonly style="background-color:lightgreen;font-size:18px;font-weight:bold;color:red;width:120px" hidden>	  
		
</td>	
	
	<td colspan="10">
  

<input name="taka" type="number" class="style1" id="sdate12" placeholder="Discount In Taka" max="100" hidden style="font-size:20px;color:red;font-weight:bold;">
<input type="number" name="percentage" id="sdate1" class="style1" placeholder="Discount In Percentage" max="100" hidden style="font-size:20px;color:red;font-weight:bold;">



</td>


		
		

		<td colspan="5"align="right">
		<input type="text" id="dis_taka" name="dis_taka" value="" hidden style="font-size:20px;color:red;font-weight:bold;" readonly> 
<input type="text" id="dis_percentage" name="dis_percentage" value="" hidden style="font-size:20px;color:red;font-weight:bold;" readonly> 

<input type="text" readonly id="select_option" name="discount_type" value=""  style="font-size:20px;color:red;font-weight:bold;" hidden> 
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

	<td colspan="10"align="right"><a target="_blank" href="opd_bill_pdf22_new_medi_pos.php?pmrn='.$pmrn.'&dname='.$dname.'&billno='.$row39['billno'].'&eid='.$eid.'"><img src="phar_pic/print.png" title="Print Receipt" width="100" height="80" /></a>

&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<a target="_blank" href="opd_bill_pdf22_new_medi_otc_pos_1_opd?billno='.$row39['billno'].'"><img src="phar_pic/barcode.png" title="Print Instruction" width="100" height="80" /></a>


</td>';}?>

	
	

</td>
<script>
gt=0;
var iprice=document.getElementsByClassName('iprice');
var iquantity=document.getElementsByClassName('iquantity');
var itotal=document.getElementsByClassName('itotal');
var gtotal=document.getElementById('gtotal');


function subTotal()
{
gt=0
for(i=0;i<iprice.length;i++)
	
{
//itotal[i].innerText=(iprice[i].value)*(iquantity[i].value);
itotal[i].innerText=(iprice[i].value)*(iquantity[i].value);
gt=gt+(iprice[i].value)*(iquantity[i].value);

}
//gtotal.innerText=gt;
document.getElementById("gtotal").value=gt;
}
subTotal();
</script>

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


	<?php if($row39['billno']==''){echo'

<td colspan="10" align="right"><input type="submit" value="Confirm" name="but_update"><br><br></td>';}?>
	  

	</tr>
	
	
	 </table>
            </form>
        </div>








</body>

</html>
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

    document.getElementById("gtotal").value = total;
}
</script>
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

		// onkeyup event will occur when the user
		// release the key and calls the function
		// assigned to this event
		

		function GetDetail7(str) {
			
				var rt = document.getElementById('gtotal').value;
				var rt1 = document.getElementById('txtHint3').value;
				var rt2 = document.getElementById('cor_dis').value;


        
        var rt22 = document.getElementById('select_option').value;
        var rt222 = document.getElementById('pmrn').value;
        
var tt = parseInt(((rt) * rt2) / 100);
var tt_f = rt - tt;
//var tt_f = tt;
    // Set its value property
	
	
								if(rt1 === ""){
    
	
	
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
	
		cor_dis.hidden = true;



    cor_dis.hidden = true;
	dis_percentage.value ="";
	dis_taka.value ="";
	sdate1.value ="";
	sdate12.value ="";
	pmrn.value ="asd";
  select_option.value = pmrn.value;
	//discount_type.selectedIndex = 1;
  pmrn.disabled=false;
		
  }	  
	

				
				
	else if(rt1 === "Self"){
    
	
	
	sdate1.hidden = true;
	sdate1.disabled = false;
	
	
	sdate12.hidden = true;
	sdate12.disabled = true;
	
	dis_taka.hidden = true;
	dis_taka.disabled = true;
	
	dis_percentage.hidden = true;
	dis_percentage.disabled = false;
	//pmrn.disabled = false;
	
	cor_dis.hidden = true;
	dis_percentage.value ="";
	dis_taka.value ="";
	sdate1.value ="";
	sdate12.value ="";
	pmrn.value ="asd";
  select_option.value = pmrn.value;
	//discount_type.selectedIndex = 1;
  pmrn.disabled=false;
  }	  
  
	
else if(rt1 === "Corporate"){
    
	
	
	sdate1.hidden = true;
	//sdate1.disabled = true;
	
	
	sdate12.hidden = true;
	sdate12.disabled = true;
	
	dis_taka.hidden = true;
	dis_taka.disabled = true;
	
	dis_percentage.hidden = false;
	dis_percentage.disabled = false;
	

	cor_dis.hidden = false;
	
	dis_percentage.value = tt_f;

	sdate1.value = rt2;
  
	pmrn.value ="percentage";
  select_option.value = pmrn.value;
  pmrn.disabled=true;
  
  }	  
  
  
  else if(rt1 === "SFMM"){
    
	
	
	sdate1.hidden = true;
	//sdate1.disabled = true;
	
	sdate1.value = rt2;
	sdate12.hidden = true;
	sdate12.disabled = true;
	
	dis_taka.hidden = true;
	dis_taka.disabled = true;
	
	dis_percentage.hidden = false;
	dis_percentage.disabled = false;
	
	
	cor_dis.hidden = false;
	dis_percentage.value = tt_f;
	pmrn.value ="percentage";
  pmrn.disable=true;
  }	  
  


  
	
				
			}
		
	</script>  
	