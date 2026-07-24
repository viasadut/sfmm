<?php 
    session_start();
    $role = $_SESSION['sess_userrole'];
    if(!isset($_SESSION['sess_username']) || $role!="lab"){
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

$url1=$_SERVER['REQUEST_URI'];
//header("Refresh: 10; URL=$url1");

$user=$_SESSION["sess_username"];
//$id=$_REQUEST['ID'];
$pmrn=$_REQUEST['pmrn'];
//$full=$_REQUEST['dname'];
//$eid=$_REQUEST['eid'];
//$dname=$_REQUEST['dname'];
$date77=date('Y-m-d');

$lis_date=date('Y-m-d H:i:s');
//include("auth.php");

$db = mysqli_connect('localhost','root','Godiloveu16');
mysqli_select_db($db,'sfmmkpjnew');
$query4 = mysqli_query($db,"select * from alltest where pmrn='$pmrn' and billstatus='Billed' and rstatus!='RECEIVED' order by id desc limit 1");
$data = mysqli_fetch_assoc($query4);

$two = substr($user, -2);

//echo $lastTwoNumbers = substr($pincode, -2);

$pdate=date('Y-m-d H:i:s');  
$pdate1=date('d/m/Y H:i:s');  


//echo $new_bar4=date('ymd').'000'.'4'+'12';

//$e='0'.''.'00'+'987';
//echo $new_bar1=date('ymd').''.+$e.'1';
?>

<?php
require('db1.php');
if(isset($_POST['btnDelete']))
	
	{

if(empty($_REQUEST['chkDel']))
{
	echo '<script language="javascript">';
    echo 'alert("Unsuccessful !!! No Row Selected!!"); ';
    echo '</script>';
	
}
else {
$objConnect = mysqli_connect("localhost","root","Godiloveu16") or die("Error Connect to Database");
$objDB = mysqli_select_db($objConnect,"sfmmkpjnew");

$cdate=date('Y-m-d');
			$strSQL1 = "select DISTINCT MAX(s_no) from alltest where rdate='$cdate'";
			$objQuery1 = mysqli_query($objConnect,$strSQL1);
			$obj = mysqli_fetch_array($objQuery1);
			$mno=$obj['MAX(s_no)']+1;
			$mno1=$obj['MAX(s_no)'];
			
			$result=$_REQUEST['result'][$i];
			
			
			
			function count_digit($number) {
return strlen((string) $number);
}
//$mno = "01";
$number_of_digits = count_digit($mno); //this is call :)
$number_of_digits;

//$one=			
			
			
			$result=$_REQUEST['result'][$i];
			/*$new_bar1=date('ymd').'000'.$mno+$user;
			//$new_bar1=date('ymd').'0'.$lastTwoNumbers.$mno;
			$new_bar2=date('ymd').'00'.$mno+$user;
			//$new_bar2=date('ymd').$lastTwoNumbers.$mno;
			$new_bar3=date('ymd').'0'.$mno+$user;
			//$new_bar3=date('ymd').'0'.$mno+$user;
			$new_bar4=date('ymd').$mno+$user;
			*/
			
			$new_bar1=$two.date('md').'000'.$mno;
			$new_bar2=$two.date('md').'00'.$mno;
			$new_bar3=$two.date('md').'0'.$mno;
			$new_bar4=$two.date('md').$mno;
			
			
			$a1=$two.date('sd').'000'.$mno;
			$a2=$two.date('sd').'00'.$mno;
			$a3=$two.date('sd').'0'.$mno;
			$a4=$two.date('sd').$mno;
			
			$b1=$a1+1;
			$b2=$a2+1;
			$b3=$a3+1;
			$b4=$a4+1;
			
			
			

if($mno>$mno1){
	for($i=0;$i<count($_POST["chkDel"]);$i++)
	{
		if($_POST["chkDel"][$i] != "" and $user !='')
		{
		if($number_of_digits==1){
				
				//echo '1';
			
				
		$objConnect = mysqli_connect("localhost","root","Godiloveu16") or die("Error Connect to Database");
			$objDB1 = mysqli_select_db($objConnect,"sfmmkpjnew");

			$qq = mysqli_query($db,"select * from alltest where id='".$_POST["chkDel"][$i]."'");
			$dd = mysqli_fetch_assoc($qq);
			$medi = $dd["medi"];
			$icode = $dd["code"];
			 if($icode==61010163)
				
				{
				
				
				
				$strSQL = "UPDATE alltest set rstatus='RECEIVED', status='RECEIVED', reby='$user', retime='$pdate' ,rdate='$cdate', barcode1='$new_bar1',s_no='$mno',barcode2='$a1',barcode3='$b1'";
			$strSQL .="WHERE id = '".$_POST["chkDel"][$i]."'";
			$objQuery = mysqli_query($objConnect,$strSQL);
				
				
		$query159 = mysqli_query($db,"select * from lis_inves_table where inves='$medi' and status='1'");

while($data159 = mysqli_fetch_assoc($query159)){
	
$ii=$data159["para"];	
$ii2=$data159["mcode"];	
	
	
/*$sel_lis="Select * from lis_inves_table where inves= '$medi' and status='1'";

$result_lis = mysqli_query($con,$sel_lis);
*/


//while($row_lis= mysqli_fetch_assoc($result_lis))

	
	$ins_lis1="insert into lab_machine_request (`MACHINE_CODE`,`INVOICE_NO_FK`,`LAB_CODE`,`TEST_NO_FK`,`MACHINE_ATTRIB`,`request_his_timestamp`,`set_machine_ind`,`set_machine_timestamp`,`get_machine_ind`,`get_machine_timestamp`) 
values ('$ii2', '66','$new_bar1','$icode','$ii','$lis_date','44','$lis_date','55','88')";
mysqli_query($con,$ins_lis1);

$ins_lis1_1="insert into lab_machine_request (`MACHINE_CODE`,`INVOICE_NO_FK`,`LAB_CODE`,`TEST_NO_FK`,`MACHINE_ATTRIB`,`request_his_timestamp`,`set_machine_ind`,`set_machine_timestamp`,`get_machine_ind`,`get_machine_timestamp`) 
values ('$ii2', '66','$a1','$icode','$ii','$lis_date','44','$lis_date','55','88')";
mysqli_query($con,$ins_lis1_1);

$ins_lis1_2="insert into lab_machine_request (`MACHINE_CODE`,`INVOICE_NO_FK`,`LAB_CODE`,`TEST_NO_FK`,`MACHINE_ATTRIB`,`request_his_timestamp`,`set_machine_ind`,`set_machine_timestamp`,`get_machine_ind`,`get_machine_timestamp`) 
values ('$ii2', '66','$b1','$icode','$ii','$lis_date','44','$lis_date','55','88')";
mysqli_query($con,$ins_lis1_2);
				
	
}
		
		
				
$url = "lab_sample_receive_bar_new_test21.php?barcode=$new_bar1&sno=$mno";
header("Location: $url"); 

				}
				
				else if($icode==61050317)
				
				{
				
				
				
				$strSQL = "UPDATE alltest set rstatus='RECEIVED', status='RECEIVED', reby='$user', retime='$pdate' ,rdate='$cdate', barcode1='$new_bar1',s_no='$mno',barcode2='$a1'";
			$strSQL .="WHERE id = '".$_POST["chkDel"][$i]."'";
			$objQuery = mysqli_query($objConnect,$strSQL);
				
				
		$query159 = mysqli_query($db,"select * from lis_inves_table where inves='$medi' and status='1'");

while($data159 = mysqli_fetch_assoc($query159)){
	
$ii=$data159["para"];	
$ii2=$data159["mcode"];	
	
	
/*$sel_lis="Select * from lis_inves_table where inves= '$medi' and status='1'";

$result_lis = mysqli_query($con,$sel_lis);
*/


//while($row_lis= mysqli_fetch_assoc($result_lis))

	
	$ins_lis1="insert into lab_machine_request (`MACHINE_CODE`,`INVOICE_NO_FK`,`LAB_CODE`,`TEST_NO_FK`,`MACHINE_ATTRIB`,`request_his_timestamp`,`set_machine_ind`,`set_machine_timestamp`,`get_machine_ind`,`get_machine_timestamp`) 
values ('$ii2', '66','$new_bar1','$icode','$ii','$lis_date','44','$lis_date','55','88')";
mysqli_query($con,$ins_lis1);

$ins_lis1_1="insert into lab_machine_request (`MACHINE_CODE`,`INVOICE_NO_FK`,`LAB_CODE`,`TEST_NO_FK`,`MACHINE_ATTRIB`,`request_his_timestamp`,`set_machine_ind`,`set_machine_timestamp`,`get_machine_ind`,`get_machine_timestamp`) 
values ('$ii2', '66','$a1','$icode','$ii','$lis_date','44','$lis_date','55','88')";
mysqli_query($con,$ins_lis1_1);

	
}
		
		
				
$url = "lab_sample_receive_bar_new_test21.php?barcode=$new_bar1&sno=$mno";
header("Location: $url"); 

				}
				
				
				
					 else if($icode!=61010163 || $icode!=61050317)
				
				{
				
				
				
					
				
				$strSQL = "UPDATE alltest set rstatus='RECEIVED', status='RECEIVED', reby='$user', retime='$pdate' ,rdate='$cdate', barcode1='$new_bar1',s_no='$mno'";
			$strSQL .="WHERE id = '".$_POST["chkDel"][$i]."'";
			$objQuery = mysqli_query($objConnect,$strSQL);
			
			
				
				
		$query159 = mysqli_query($db,"select * from lis_inves_table where inves='$medi' and status='1'");

while($data159 = mysqli_fetch_assoc($query159)){
	
$ii=$data159["para"];	
$ii2=$data159["mcode"];	
	
	
/*$sel_lis="Select * from lis_inves_table where inves= '$medi' and status='1'";

$result_lis = mysqli_query($con,$sel_lis);
*/


//while($row_lis= mysqli_fetch_assoc($result_lis))

	
	$ins_lis1="insert into lab_machine_request (`MACHINE_CODE`,`INVOICE_NO_FK`,`LAB_CODE`,`TEST_NO_FK`,`MACHINE_ATTRIB`,`request_his_timestamp`,`set_machine_ind`,`set_machine_timestamp`,`get_machine_ind`,`get_machine_timestamp`) 
values ('$ii2', '66','$new_bar1','$icode','$ii','$lis_date','44','$lis_date','55','88')";
mysqli_query($con,$ins_lis1);
	
}
		
				
				
$url = "lab_sample_receive_bar_new_test21.php?barcode=$new_bar1&sno=$mno";
header("Location: $url"); 

				}
			}
			
			else if($number_of_digits==2){
				
				//echo '2';
				
				$qq = mysqli_query($db,"select * from alltest where id='".$_POST["chkDel"][$i]."'");
			$dd = mysqli_fetch_assoc($qq);
			$medi = $dd["medi"];		
			$icode = $dd["code"];	
				
				
				if($icode==61010163)
				
				{
				
				
				
				$strSQL = "UPDATE alltest set rstatus='RECEIVED', status='RECEIVED', reby='$user', retime='$pdate' ,rdate='$cdate', barcode1='$new_bar2',s_no='$mno',barcode2='$a2',barcode3='$b2'";
			$strSQL .="WHERE id = '".$_POST["chkDel"][$i]."'";
			$objQuery = mysqli_query($objConnect,$strSQL);
			
			
			
				
				
				
				
				
		$query159 = mysqli_query($db,"select * from lis_inves_table where inves='$medi' and status='1'");

while($data159 = mysqli_fetch_assoc($query159)){
	
$ii=$data159["para"];	
$ii2=$data159["mcode"];		
	
/*$sel_lis="Select * from lis_inves_table where inves= '$medi' and status='1'";

$result_lis = mysqli_query($con,$sel_lis);
*/


//while($row_lis= mysqli_fetch_assoc($result_lis))

	
	$ins_lis1="insert into lab_machine_request (`MACHINE_CODE`,`INVOICE_NO_FK`,`LAB_CODE`,`TEST_NO_FK`,`MACHINE_ATTRIB`,`request_his_timestamp`,`set_machine_ind`,`set_machine_timestamp`,`get_machine_ind`,`get_machine_timestamp`) 
values ('$ii2', '66','$new_bar2','$icode','$ii','$lis_date','44','$lis_date','55','88')";
mysqli_query($con,$ins_lis1);


$ins_lis1_1="insert into lab_machine_request (`MACHINE_CODE`,`INVOICE_NO_FK`,`LAB_CODE`,`TEST_NO_FK`,`MACHINE_ATTRIB`,`request_his_timestamp`,`set_machine_ind`,`set_machine_timestamp`,`get_machine_ind`,`get_machine_timestamp`) 
values ('$ii2', '66','$a2','$icode','$ii','$lis_date','44','$lis_date','55','88')";
mysqli_query($con,$ins_lis1_1);

$ins_lis1_2="insert into lab_machine_request (`MACHINE_CODE`,`INVOICE_NO_FK`,`LAB_CODE`,`TEST_NO_FK`,`MACHINE_ATTRIB`,`request_his_timestamp`,`set_machine_ind`,`set_machine_timestamp`,`get_machine_ind`,`get_machine_timestamp`) 
values ('$ii2', '66','$b2','$icode','$ii','$lis_date','44','$lis_date','55','88')";
mysqli_query($con,$ins_lis1_2);

}


	
		
			
				$url = "lab_sample_receive_bar_new_test21.php?barcode=$new_bar2&sno=$mno";
header("Location: $url"); 
			}
			
			
			else if($icode==61050317)
				
				{
				
				
				
				$strSQL = "UPDATE alltest set rstatus='RECEIVED', status='RECEIVED', reby='$user', retime='$pdate' ,rdate='$cdate', barcode1='$new_bar2',s_no='$mno',barcode2='$a2'";
			$strSQL .="WHERE id = '".$_POST["chkDel"][$i]."'";
			$objQuery = mysqli_query($objConnect,$strSQL);
			
			
			
				
				
				
				
				
		$query159 = mysqli_query($db,"select * from lis_inves_table where inves='$medi' and status='1'");

while($data159 = mysqli_fetch_assoc($query159)){
	
$ii=$data159["para"];	
$ii2=$data159["mcode"];		
	
/*$sel_lis="Select * from lis_inves_table where inves= '$medi' and status='1'";

$result_lis = mysqli_query($con,$sel_lis);
*/


//while($row_lis= mysqli_fetch_assoc($result_lis))

	
	$ins_lis1="insert into lab_machine_request (`MACHINE_CODE`,`INVOICE_NO_FK`,`LAB_CODE`,`TEST_NO_FK`,`MACHINE_ATTRIB`,`request_his_timestamp`,`set_machine_ind`,`set_machine_timestamp`,`get_machine_ind`,`get_machine_timestamp`) 
values ('$ii2', '66','$new_bar2','$icode','$ii','$lis_date','44','$lis_date','55','88')";
mysqli_query($con,$ins_lis1);


$ins_lis1_1="insert into lab_machine_request (`MACHINE_CODE`,`INVOICE_NO_FK`,`LAB_CODE`,`TEST_NO_FK`,`MACHINE_ATTRIB`,`request_his_timestamp`,`set_machine_ind`,`set_machine_timestamp`,`get_machine_ind`,`get_machine_timestamp`) 
values ('$ii2', '66','$a2','$icode','$ii','$lis_date','44','$lis_date','55','88')";
mysqli_query($con,$ins_lis1_1);


}


	
		
			
				$url = "lab_sample_receive_bar_new_test21.php?barcode=$new_bar2&sno=$mno";
header("Location: $url"); 
			}
			
			
			else if($icode!=61010163 || $icode!=61050317)
				
				{
				
				
				
				$strSQL = "UPDATE alltest set rstatus='RECEIVED', status='RECEIVED', reby='$user', retime='$pdate' ,rdate='$cdate', barcode1='$new_bar2',s_no='$mno'";
			$strSQL .="WHERE id = '".$_POST["chkDel"][$i]."'";
			$objQuery = mysqli_query($objConnect,$strSQL);
			
			
			
				
				
				
				
				
				
		$query159 = mysqli_query($db,"select * from lis_inves_table where inves='$medi' and status='1'");

while($data159 = mysqli_fetch_assoc($query159)){
	
$ii=$data159["para"];	
$ii2=$data159["mcode"];		
	
/*$sel_lis="Select * from lis_inves_table where inves= '$medi' and status='1'";

$result_lis = mysqli_query($con,$sel_lis);
*/


//while($row_lis= mysqli_fetch_assoc($result_lis))

	
	$ins_lis1="insert into lab_machine_request (`MACHINE_CODE`,`INVOICE_NO_FK`,`LAB_CODE`,`TEST_NO_FK`,`MACHINE_ATTRIB`,`request_his_timestamp`,`set_machine_ind`,`set_machine_timestamp`,`get_machine_ind`,`get_machine_timestamp`) 
values ('$ii2', '66','$new_bar2','$icode','$ii','$lis_date','44','$lis_date','55','88')";
mysqli_query($con,$ins_lis1);

}



	

		
			
				$url = "lab_sample_receive_bar_new_test21.php?barcode=$new_bar2&sno=$mno";
header("Location: $url"); 
			}
				
			}	
			
			
			
			else if($number_of_digits==3){
				
				//echo '3';
				$qq = mysqli_query($db,"select * from alltest where id='".$_POST["chkDel"][$i]."'");
			$dd = mysqli_fetch_assoc($qq);
			$medi = $dd["medi"];		
			$icode = $dd["code"];	
				
				if($icode==61010163)
				
				{
							
			$strSQL = "UPDATE alltest set rstatus='RECEIVED', status='RECEIVED', reby='$user', retime='$pdate' ,rdate='$cdate', barcode1='$new_bar3',s_no='$mno',barcode2='$a3',barcode3='$b3'";
			$strSQL .="WHERE id = '".$_POST["chkDel"][$i]."'";
			$objQuery = mysqli_query($objConnect,$strSQL);
			
			
			
				
				
				
				
				
				
				
		$query159 = mysqli_query($db,"select * from lis_inves_table where inves='$medi' and status='1'");

while($data159 = mysqli_fetch_assoc($query159)){
	
$ii=$data159["para"];	
	$ii2=$data159["mcode"];	
	
/*$sel_lis="Select * from lis_inves_table where inves= '$medi' and status='1'";

$result_lis = mysqli_query($con,$sel_lis);
*/


//while($row_lis= mysqli_fetch_assoc($result_lis))

	
	$ins_lis1="insert into lab_machine_request (`MACHINE_CODE`,`INVOICE_NO_FK`,`LAB_CODE`,`TEST_NO_FK`,`MACHINE_ATTRIB`,`request_his_timestamp`,`set_machine_ind`,`set_machine_timestamp`,`get_machine_ind`,`get_machine_timestamp`) 
values ('$ii2', '66','$new_bar3','$icode','$ii','$lis_date','44','$lis_date','55','88')";
mysqli_query($con,$ins_lis1);
	
	
	$ins_lis1_1="insert into lab_machine_request (`MACHINE_CODE`,`INVOICE_NO_FK`,`LAB_CODE`,`TEST_NO_FK`,`MACHINE_ATTRIB`,`request_his_timestamp`,`set_machine_ind`,`set_machine_timestamp`,`get_machine_ind`,`get_machine_timestamp`) 
values ('$ii2', '66','$a3','$icode','$ii','$lis_date','44','$lis_date','55','88')";
mysqli_query($con,$ins_lis1_1);

$ins_lis1_2="insert into lab_machine_request (`MACHINE_CODE`,`INVOICE_NO_FK`,`LAB_CODE`,`TEST_NO_FK`,`MACHINE_ATTRIB`,`request_his_timestamp`,`set_machine_ind`,`set_machine_timestamp`,`get_machine_ind`,`get_machine_timestamp`) 
values ('$ii2', '66','$b3','$icode','$ii','$lis_date','44','$lis_date','55','88')";
mysqli_query($con,$ins_lis1_2);
		
}


			
				$url = "lab_sample_receive_bar_new_test21.php?barcode=$new_bar3&sno=$mno";
header("Location: $url"); 
				
			}
			
			else if($icode==61050317)
				
				{
							
			$strSQL = "UPDATE alltest set rstatus='RECEIVED', status='RECEIVED', reby='$user', retime='$pdate' ,rdate='$cdate', barcode1='$new_bar3',s_no='$mno',barcode2='$a3'";
			$strSQL .="WHERE id = '".$_POST["chkDel"][$i]."'";
			$objQuery = mysqli_query($objConnect,$strSQL);
			
			
			
				
				
				
				
				
				
				
		$query159 = mysqli_query($db,"select * from lis_inves_table where inves='$medi' and status='1'");

while($data159 = mysqli_fetch_assoc($query159)){
	
$ii=$data159["para"];	
	$ii2=$data159["mcode"];	
	
/*$sel_lis="Select * from lis_inves_table where inves= '$medi' and status='1'";

$result_lis = mysqli_query($con,$sel_lis);
*/


//while($row_lis= mysqli_fetch_assoc($result_lis))

	
	$ins_lis1="insert into lab_machine_request (`MACHINE_CODE`,`INVOICE_NO_FK`,`LAB_CODE`,`TEST_NO_FK`,`MACHINE_ATTRIB`,`request_his_timestamp`,`set_machine_ind`,`set_machine_timestamp`,`get_machine_ind`,`get_machine_timestamp`) 
values ('$ii2', '66','$new_bar3','$icode','$ii','$lis_date','44','$lis_date','55','88')";
mysqli_query($con,$ins_lis1);
	
	
	$ins_lis1_1="insert into lab_machine_request (`MACHINE_CODE`,`INVOICE_NO_FK`,`LAB_CODE`,`TEST_NO_FK`,`MACHINE_ATTRIB`,`request_his_timestamp`,`set_machine_ind`,`set_machine_timestamp`,`get_machine_ind`,`get_machine_timestamp`) 
values ('$ii2', '66','$a3','$icode','$ii','$lis_date','44','$lis_date','55','88')";
mysqli_query($con,$ins_lis1_1);


		
}


			
				$url = "lab_sample_receive_bar_new_test21.php?barcode=$new_bar3&sno=$mno";
header("Location: $url"); 
				
			}
			
			
						
				else if($icode!=61010163 || $icode!=61050317)
				
				{
							
			$strSQL = "UPDATE alltest set rstatus='RECEIVED', status='RECEIVED', reby='$user', retime='$pdate' ,rdate='$cdate', barcode1='$new_bar3',s_no='$mno'";
			$strSQL .="WHERE id = '".$_POST["chkDel"][$i]."'";
			$objQuery = mysqli_query($objConnect,$strSQL);
			
		
				
				
				
				
				
				
		$query159 = mysqli_query($db,"select * from lis_inves_table where inves='$medi' and status='1'");

while($data159 = mysqli_fetch_assoc($query159)){
	
$ii=$data159["para"];	
	$ii2=$data159["mcode"];	
	
/*$sel_lis="Select * from lis_inves_table where inves= '$medi' and status='1'";

$result_lis = mysqli_query($con,$sel_lis);
*/


//while($row_lis= mysqli_fetch_assoc($result_lis))

	
	$ins_lis1="insert into lab_machine_request (`MACHINE_CODE`,`INVOICE_NO_FK`,`LAB_CODE`,`TEST_NO_FK`,`MACHINE_ATTRIB`,`request_his_timestamp`,`set_machine_ind`,`set_machine_timestamp`,`get_machine_ind`,`get_machine_timestamp`) 
values ('$ii2', '66','$new_bar3','$icode','$ii','$lis_date','44','$lis_date','55','88')";
mysqli_query($con,$ins_lis1);
	
}
		
			
				$url = "lab_sample_receive_bar_new_test21.php?barcode=$new_bar3&sno=$mno";
header("Location: $url"); 
				
			}
			}
			
			
			else if($number_of_digits==4){
				
				//echo '4';
				
					
			$qq = mysqli_query($db,"select * from alltest where id='".$_POST["chkDel"][$i]."'");
			$dd = mysqli_fetch_assoc($qq);
			$medi = $dd["medi"];		
				$icode = $dd["code"];
				
				
				if($icode==61010163)
				
				{
			
			$strSQL = "UPDATE alltest set rstatus='RECEIVED', status='RECEIVED', reby='$user', retime='$pdate' ,rdate='$cdate', barcode1='$new_bar4',s_no='$mno',barcode2='$a4',barcode3='$b4'";
			$strSQL .="WHERE id = '".$_POST["chkDel"][$i]."'";
			$objQuery = mysqli_query($objConnect,$strSQL);
				
				
				
			
				
		$query159 = mysqli_query($db,"select * from lis_inves_table where inves='$medi' and status='1'");

while($data159 = mysqli_fetch_assoc($query159)){
	
$ii=$data159["para"];	
$ii2=$data159["mcode"];		
	
/*$sel_lis="Select * from lis_inves_table where inves= '$medi' and status='1'";

$result_lis = mysqli_query($con,$sel_lis);
*/


//while($row_lis= mysqli_fetch_assoc($result_lis))

	
	$ins_lis1="insert into lab_machine_request (`MACHINE_CODE`,`INVOICE_NO_FK`,`LAB_CODE`,`TEST_NO_FK`,`MACHINE_ATTRIB`,`request_his_timestamp`,`set_machine_ind`,`set_machine_timestamp`,`get_machine_ind`,`get_machine_timestamp`) 
values ('$ii2', '66','$new_bar4','$icode','$ii','$lis_date','44','$lis_date','55','88')";
mysqli_query($con,$ins_lis1);
	
}

$ins_lis1_1="insert into lab_machine_request (`MACHINE_CODE`,`INVOICE_NO_FK`,`LAB_CODE`,`TEST_NO_FK`,`MACHINE_ATTRIB`,`request_his_timestamp`,`set_machine_ind`,`set_machine_timestamp`,`get_machine_ind`,`get_machine_timestamp`) 
values ('$ii2', '66','$a4','$icode','$ii','$lis_date','44','$lis_date','55','88')";
mysqli_query($con,$ins_lis1_1);

$ins_lis1_2="insert into lab_machine_request (`MACHINE_CODE`,`INVOICE_NO_FK`,`LAB_CODE`,`TEST_NO_FK`,`MACHINE_ATTRIB`,`request_his_timestamp`,`set_machine_ind`,`set_machine_timestamp`,`get_machine_ind`,`get_machine_timestamp`) 
values ('$ii2', '66','$b4','$icode','$ii','$lis_date','44','$lis_date','55','88')";
mysqli_query($con,$ins_lis1_2);
		
				
				$url = "lab_sample_receive_bar_new_test21.php?barcode=$new_bar4&sno=$mno";
header("Location: $url"); 
			}
			
			
				else if($icode==61050317)
				
				{
			
			$strSQL = "UPDATE alltest set rstatus='RECEIVED', status='RECEIVED', reby='$user', retime='$pdate' ,rdate='$cdate', barcode1='$new_bar4',s_no='$mno',barcode2='$a4'";
			$strSQL .="WHERE id = '".$_POST["chkDel"][$i]."'";
			$objQuery = mysqli_query($objConnect,$strSQL);
				
				
				
			
				
		$query159 = mysqli_query($db,"select * from lis_inves_table where inves='$medi' and status='1'");

while($data159 = mysqli_fetch_assoc($query159)){
	
$ii=$data159["para"];	
$ii2=$data159["mcode"];		
	
/*$sel_lis="Select * from lis_inves_table where inves= '$medi' and status='1'";

$result_lis = mysqli_query($con,$sel_lis);
*/


//while($row_lis= mysqli_fetch_assoc($result_lis))

	
	$ins_lis1="insert into lab_machine_request (`MACHINE_CODE`,`INVOICE_NO_FK`,`LAB_CODE`,`TEST_NO_FK`,`MACHINE_ATTRIB`,`request_his_timestamp`,`set_machine_ind`,`set_machine_timestamp`,`get_machine_ind`,`get_machine_timestamp`) 
values ('$ii2', '66','$new_bar4','$icode','$ii','$lis_date','44','$lis_date','55','88')";
mysqli_query($con,$ins_lis1);
	
}

$ins_lis1_1="insert into lab_machine_request (`MACHINE_CODE`,`INVOICE_NO_FK`,`LAB_CODE`,`TEST_NO_FK`,`MACHINE_ATTRIB`,`request_his_timestamp`,`set_machine_ind`,`set_machine_timestamp`,`get_machine_ind`,`get_machine_timestamp`) 
values ('$ii2', '66','$a4','$icode','$ii','$lis_date','44','$lis_date','55','88')";
mysqli_query($con,$ins_lis1_1);

		
				
				$url = "lab_sample_receive_bar_new_test21.php?barcode=$new_bar4&sno=$mno";
header("Location: $url"); 
			}
			
			
				else if($icode!=61010163 || $icode!=61050317)
				
				{
			
			$strSQL = "UPDATE alltest set rstatus='RECEIVED', status='RECEIVED', reby='$user', retime='$pdate' ,rdate='$cdate', barcode1='$new_bar4',s_no='$mno'";
			$strSQL .="WHERE id = '".$_POST["chkDel"][$i]."'";
			$objQuery = mysqli_query($objConnect,$strSQL);
				
				
			
			
				
		$query159 = mysqli_query($db,"select * from lis_inves_table where inves='$medi' and status='1'");

while($data159 = mysqli_fetch_assoc($query159)){
	
$ii=$data159["para"];	
$ii2=$data159["mcode"];		
	
/*$sel_lis="Select * from lis_inves_table where inves= '$medi' and status='1'";

$result_lis = mysqli_query($con,$sel_lis);
*/


//while($row_lis= mysqli_fetch_assoc($result_lis))

	
	$ins_lis1="insert into lab_machine_request (`MACHINE_CODE`,`INVOICE_NO_FK`,`LAB_CODE`,`TEST_NO_FK`,`MACHINE_ATTRIB`,`request_his_timestamp`,`set_machine_ind`,`set_machine_timestamp`,`get_machine_ind`,`get_machine_timestamp`) 
values ('$ii2', '66','$new_bar4','$icode','$ii','$lis_date','44','$lis_date','55','88')";
mysqli_query($con,$ins_lis1);
	
}
		
				
				$url = "lab_sample_receive_bar_new_test21.php?barcode=$new_bar4&sno=$mno";
header("Location: $url"); 
			}
			
			}
			/*$strSQL = "UPDATE alltest set rstatus='RECEIVED', status='RECEIVED', reby='$user', retime='$pdate' ,rdate='$pdate', barcode1='$new_bar',s_no='$mno'";
			$strSQL .="WHERE id = '".$_POST["chkDel"][$i]."'";
			$objQuery = mysqli_query($objConnect,$strSQL);*/
		}
	}

	
	
	

}

	
mysqli_close($objConnect);
}

	}
?>







<!DOCTYPE html>
<html lang="en" >

<head>

  <meta charset="UTF-8">
  <title>SAMPLE RECEIVE PANEL</title>
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


h1 {
  text-align: left;
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
    <title>Lab Receive Panel</title>
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
		if(confirm('Do you want to Update the Status ?')==true)
		{
			return true;
		}
		else
		{
			return false;
		}
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


		
		
<form name="frmMain" action="" method="post" OnSubmit="return onDelete();">


<h1 align="left"style="background-color:lightgreen;">Patient Name:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<?php echo $data['pname'];?>
<br>MRN:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<?php echo $data['pmrn'];?>


<br>Date:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<?php echo $data['date'];?>

</h1>


<?php
$user=$_SESSION["sess_username"];
//$pmrn=$pmrn;
//$id=$_REQUEST["id"];
//$episode=$data59["eid"];
$dd=date('Y-m-d');
$test=date('Y-m-d', strtotime('-30 days') );
$count=1;


$objConnect = mysqli_connect("localhost","root","Godiloveu16") or die("Error Connect to Database");
$objDB = mysqli_select_db($objConnect,"sfmmkpjnew");
$strSQL = "Select * from alltest where pmrn= '$pmrn' and billstatus='Billed' and type='lab' and rstatus ='' and billdate between '$test' and '$dd'";
$objQuery = mysqli_query($objConnect,$strSQL) or die ("Error Query [".$strSQL."]");
//$data = mysqli_fetch_array($objQuery);
?>

<td align="left" colspan="20"><a target='_blank' href="lab_sample_receive_bar.php?pmrn=<?php echo $pmrn; ?>">bar_print</a></td>

<table align="center" class="table table-bordered" id="dynamic_field"> 
 
<tr>
      <td colspan="1" align="center"><h3><strong>S.No</strong></h3></td>
      
	  
	  
	  <td colspan="4" align="center"><h3><strong>Doctor Name</strong></h3></td>
	  <td colspan="4" align="center"><h3><strong>Investigation Name</strong></h3></td>
      <td colspan="3" align="center"><h3><strong>Instruction</strong></h3></td>  
	  <td colspan="2" align="center"><h3><strong>Price</strong></h3></td>  
	  <td colspan="4" align="center"><h3><strong>Barcode</strong></h3></td>  
      
	  

       

	   
    
    <th colspan="2"> <div align="center">
      <input name="CheckAll" type="checkbox" id="CheckAll" value="Y" onClick="ClickCheckAll(this);" style="height:22px; width:22px;">
    </div></th>
  </tr>
<?php
$i = 0;
while($row = mysqli_fetch_array($objQuery))
{
$i++;

?>

	  

  <tr>
  <td align="left" colspan="1"><h3><?php echo $count; ?></h3></td>


  
      
	  
	  <td align="left"colspan="4"><h3><?php echo $row["dname"]; ?></h3></td>
	        <td align="left"colspan="4"><h3><?php echo $row["medi"]; ?></h3></td>
			      <td align="left"colspan="3"><h3><?php echo $row["ins"]; ?></h3></td>

				  <td align="left"colspan="2"><h3><?php echo $row["price"]; ?></h3></td>

<?php
//$cc=$row['id'];
//$pp=$row['pmrn'];
//$dd=date('Yd');
//$bar=$dd.''.$cc;

?>

				  
    <td colspan="4" align="left"><h3><input type="text" name="result[]" id="result<?php echo $i;?>" required readonly value="<?php echo $pmrn.date('dis');?>" style="font-size:20px; color:red;font-weight:bold;"></h3></td></td>
    <td align="left" colspan="1"><input type="checkbox" name="chkDel[]" id="chkDel<?php echo $i;?>" value="<?php echo $row["id"];?>"style="height:22px; width:22px;"></td>
	
	
  
  </tr>
<?php
 $count++;}
?>
<tr><td colspan="25" align="right"><button type="submit" name="btnDelete">Receive Sample</button><input type="hidden" name="hdnCount" value="<?php echo $i;?>"></td>
</tr>
</table>
<?php
mysqli_close($objConnect);
?>




<?php
$user=$_SESSION["sess_username"];
//$pmrn=$pmrn;
//$id=$_REQUEST["id"];
//$episode=$data59["eid"];
$dd=date('Y-m-d');
$test=date('Y-m-d', strtotime('-30 days') );
$count=1;


$objConnect = mysqli_connect("localhost","root","Godiloveu16") or die("Error Connect to Database");
$objDB = mysqli_select_db($objConnect,"sfmmkpjnew");
$strSQL = "Select * from alltest where pmrn= '$pmrn' and billstatus='Billed' and type='lab' and rstatus ='RECEIVED' and billdate between '$test' and '$dd'";
$objQuery = mysqli_query($objConnect,$strSQL) or die ("Error Query [".$strSQL."]");
?>

<table align="center" class="table table-bordered" id="dynamic_field">  
<tr>
      <td colspan="1" align="center"><h3><strong>S.No</strong></h3></td>
      
	  
	  
	  <td colspan="4" align="center"><h3><strong>Doctor Name</strong></h3></td>
	  <td colspan="4" align="center"><h3><strong>Investigation Name</strong></h3></td>
      <td colspan="3" align="center"><h3><strong>Instruction</strong></h3></td>  
	  <td colspan="2" align="center"><h3><strong>Price</strong></h3></td>  
	  <td colspan="4" align="center"><h3><strong>Barcode</strong></h3></td>  
      
	  

       

	   
    
    <th colspan="2"> <div align="center">
      <input name="CheckAll" type="checkbox" id="CheckAll" value="Y" onClick="ClickCheckAll(this);" style="height:22px; width:22px;" checked hidden>
	  
    </div></th>
  </tr>
<?php
$i = 0;
while($row = mysqli_fetch_array($objQuery))
{
$i++;

?>

	  

  <tr>
  <td align="left" colspan="1"><h3><?php echo $count; ?></h3></td>


  
      
	  <td align="left"colspan="4"><h3><?php echo $row["dname"]; ?></h3></td>
	  
	        <td align="left"colspan="4"><h3><?php echo $row["medi"]; ?></h3></td>
			      <td align="left"colspan="3"><h3><?php echo $row["ins"]; ?></h3></td>

				  <td align="left"colspan="2"><h3><?php echo $row["price"]; ?></h3></td>

<?php
//$cc=$row['id'];
//$pp=$row['pmrn'];
//$dd=date('Yd');
//$bar=$dd.''.$cc;

?>

				  
    <td align="left" colspan="20"><a target='_blank' href="lab_indu_bar_test21.php?id=<?php echo $row['id']; ?>">bar_print</a></td>
    
	<td align="center" colspan="1"><input type='checkbox' name='update[]' value='<?= $id ?>' style="height:22px; width:22px;" hidden></td>			
	<td colspan="1"><a target='_blank' href="sample_receive_print_opd?pmrn=<?php echo $row['pmrn']; ?>&eid=<?php echo $row['eid']; ?>&id=<?php echo $row['id']; ?>"><img src="print.png" title="Print Report" width="50" height="50" /></a></td>
  
  </tr>
<?php
 $count++;}
?>

</table>
<?php
mysqli_close($objConnect);
?>
</form>
</body>

</html>

