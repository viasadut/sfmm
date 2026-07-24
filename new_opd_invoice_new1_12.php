<?php 
    session_start();
    $role = $_SESSION['sess_userrole'];
    if(!isset($_SESSION['sess_username']) || $role!="bill"){
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
$id=$_REQUEST['ID'];
$sno=$_REQUEST['sno'];
//$pmrn=$_REQUEST['pmrn'];
//$dname=$_REQUEST['dname'];
//$full=$_REQUEST['dname'];
//$eid=$_REQUEST['eid'];
$date77=date('Y-m-d');
$pdate=date('Y-m-d'); 
$pdate1=date('Y-m-d H:i:s');  
//include("auth.php");
//$pmrn=$_REQUEST['pmrn'];
$bdate=$_REQUEST['bdate'];
//$pphone=$_REQUEST['pphone'];
//$pname=$_REQUEST["pname"];
$psex=$_REQUEST["psex"];
//$eid=date('dmY');
$db = mysqli_connect('localhost','root','Godiloveu16');
mysqli_select_db($db,'sfmmkpjnew');

$query4 = mysqli_query($db,"select * from presnew where id='$id'");
$data = mysqli_fetch_assoc($query4);
$dname=$data['dname'];
$pmrn=$data['pmrn'];
$pname=$data['pname'];
$eid=$data['eid'];
/*
$query5 = mysqli_query($db,"select * from patient where ID='$id'");
$data1 = mysqli_fetch_assoc($query5);
$bdate=$data1['bdate'];
$dd=date('d-m-Y',strtotime($data1['bdate']));
$dd2=date_create($dd);
*/


$staff_dis=100;
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

$lab_count = "SELECT COUNT(medi) FROM alltest where pmrn='$pmrn'and eid='$eid' and billstatus NOT IN ('Billed') and sno in ('','$sno') and bill_check='0' and type in ('LAB','Lab','lab')"; 
	 
$result_lab = mysqli_query($dbhandle,$lab_count) or die(mysql_error());

// Print out result
$data_lab = mysqli_fetch_array($result_lab);
$count_lab=$data_lab['COUNT(medi)'];


  
$query198 = "SELECT SUM(price) FROM alltest where pmrn='$pmrn'and eid='$eid' and billstatus NOT IN ('Billed') and sno IN('$sno','')  and bill_check='0'"; 
	 
$result198 = mysqli_query($dbhandle,$query198) or die(mysql_error());

// Print out result
$row198 = mysqli_fetch_array($result198);
$test1_bill=	$row198['SUM(price)'];

$query198_dis = "SELECT SUM(o_dis) FROM alltest where pmrn='$pmrn'and eid='$eid' and billstatus NOT IN ('Billed') and sno in ('','$sno') and bill_check='0'"; 
	 
$result198_dis = mysqli_query($dbhandle,$query198_dis) or die(mysql_error());

// Print out result
$row198_dis = mysqli_fetch_array($result198_dis);
$test1_dis=	$row198_dis['SUM(o_dis)'];

if($count_lab>0)
{echo $test1=round($test1_bill-$test1_dis+100);}

else if($count_lab<=0)
{$test1=round($test1_bill-$test1_dis);}


//echo $test1;
$query198_s = "SELECT SUM(price) FROM alltest where pmrn='$pmrn'and eid='$eid' and type not in ('SPD','spd','Spd','spd1','SPD1','Spd1') and billstatus NOT IN ('Billed') and sno in ('','$sno') and bill_check='0'"; 
	 
$result198_s = mysqli_query($dbhandle,$query198_s) or die(mysql_error());

// Print out result
$row198_s = mysqli_fetch_array($result198_s);


$query198_ss = "SELECT SUM(price) FROM alltest where pmrn='$pmrn'and eid='$eid' and urgent='' and billstatus NOT IN ('Billed') and sno in ('','$sno') and bill_check='0' and type not in ('SPD','spd','Spd','spd1','SPD1','Spd1')"; 
	 
$result198_ss = mysqli_query($dbhandle,$query198_ss) or die(mysql_error());

// Print out result
$row198_ss = mysqli_fetch_array($result198_ss);


//$test1_s=	$row198_s['SUM(price)']+$row198_ss['SUM(price)'];
//$test1_s=	round($row198_s['SUM(price)']);

if($count_lab>0)
{echo $test1_s=	round($row198_s['SUM(price)'])+100;}

else if($count_lab<=0)
{$test1_s=	round($row198_s['SUM(price)']);}







?>

<input type="text" id="find_lab" value="<?php echo $data_lab['COUNT(medi)'];?>" name="find_lab" />

<?php
/*
Author: Javed Ur Rehman
Website: https://www.allphptricks.com/
*/
 
require('db1.php');

if(isset($_POST['Submit']))
{


$dname =$_REQUEST["dname"];
//$pname = $_REQUEST['pname'];
//$pmrn = $_REQUEST['pmrn'];
$date = date('m/d/Y');
$medi = $_REQUEST['medi'];
$pins = $_REQUEST['pins'];
$bar = $_REQUEST['bar'];
$urgent=$_REQUEST["choices"];
$cgtotal = $_REQUEST['cgtotal'];

//$dtime = $_REQUEST['dtime'];
$query159 = mysqli_query($db,"select * from radio where iname='$medi'");
$data159 = mysqli_fetch_assoc($query159);
$type=$data159["type"];
$price=$data159["price"];
$cgtotal_dis=$price-$cgtotal;
$code=$data159["code"];
$subtype=$data159["subtype"];
//echo $type;
//echo $type;
$url = "manual_bill1.php?pmrn=$pmrn&ID=$id"; 


$link=$data159["link"];
$linkv=$data159["linkv"];
$report=$data159["report"];
$reportv=$data159["reportv"];

$sel90="SELECT * FROM radio WHERE `iname`='$medi';";
$result90 = mysqli_query($con,$sel90);

$sel900="SELECT * FROM doctor WHERE `dname`='$dname' and status in ('Active','active1');";
$result900 = mysqli_query($con,$sel900);
if($medi==''){
	
	
       echo '<script language="javascript">';
    echo 'alert("Unsuccessful !!! Investigation name Require"); ';
    echo '</script>';
}

else if($res900=mysqli_num_rows($result900)==0)
{
 	
       echo '<script language="javascript">';
    echo 'alert("Unsuccessful !!! Consultant Name is not in the Database List.. Please contact with Concern Department"); ';
    echo '</script>';
    }



else if($res90=mysqli_num_rows($result90)==0)
{
 	
       echo '<script language="javascript">';
    echo 'alert("Unsuccessful !!! The Investigation Name is not in the Database List.. Please contact with Concern Department"); ';
    echo '</script>';
    }
	
	

else if($urgent==''){

$ins_query="insert into alltest (`dname`,`pmrn`,`pname`,`eid`,`medi`,`ins`,`date`,`type`,`price`,`code`,`link`,`date1`,`linkv`,`report`,`reportv`,`location`,`page`,`pgender`,`subtype`,`billstatus`,`billby`,`billdate`,`pphone`,`barcode`,`barcode1`,`billtime`,`urgent`,`dprice`,`o_dis`) 
values ('$dname', '$pmrn','$pname','$eid','$medi','$pins','$date','$type','$price','$code','$link','$date77','$linkv','$report','$reportv','OPD','$bdate','$psex','$subtype','Billed','$user','$pdate','$pphone','$bar','$bar','$pdate1','$urgent','$cgtotal','$cgtotal_dis')";
mysqli_query($con,$ins_query) or die(mysql_error());

//header("Refresh:0; URL=$url");
}

else if($urgent!=''){

$ins_query="insert into alltest (`dname`,`pmrn`,`pname`,`eid`,`medi`,`ins`,`date`,`type`,`price`,`code`,`link`,`date1`,`linkv`,`report`,`reportv`,`location`,`page`,`pgender`,`subtype`,`billstatus`,`billby`,`billdate`,`pphone`,`barcode`,`barcode1`,`billtime`,`urgent`,`dprice`) 
values ('$dname', '$pmrn','$pname','$eid','$medi','$pins','$date','$type','$cgtotal','$code','$link','$date77','$linkv','$report','$reportv','OPD','$bdate','$psex','$subtype','Billed','$user','$pdate','$pphone','$bar','$bar','$pdate1','$urgent','$cgtotal')";
mysqli_query($con,$ins_query) or die(mysql_error());

//header("Refresh:0; URL=$url");
}

}



if(isset($_POST['Submit1']))
{
	
	

$dname =$_REQUEST["dname"];
//$pname = $_REQUEST['pname'];
//$pmrn = $_REQUEST['pmrn'];
$date = date('m/d/Y');
$medi = $_REQUEST['medi'];
$pins = $_REQUEST['pins'];
$bar = $_REQUEST['bar'];
$grand_total = $_REQUEST['gtotal'];
//$eid=date('dmY');


	$qq = mysqli_query($db,"select SUM(price) from alltest where pmrn='$pmrn' and eid='$eid' and billstatus NOT IN ('Billed') and sno IN('$sno','')  and bill_check='0' and medi!='Sample Collection Charge'");
			$dd = mysqli_fetch_assoc($qq);
			$payment=$dd['SUM(price)'];
			
			$qq_urgent = mysqli_query($db,"select SUM(price) from alltest where pmrn='$pmrn' and eid='$eid' and billstatus NOT IN ('Billed') and sno in ('','$sno') and urgent!='' and bill_check='0' and medi!='Sample Collection Charge'");
			$dd_urgent = mysqli_fetch_assoc($qq_urgent);
			$payment_urgent=$dd_urgent['SUM(price)'];
			
	
$qq9 = mysqli_query($db,"select SUM(price) from alltest where pmrn='$pmrn' and eid='$eid' and billstatus NOT IN ('Billed') and bill_check='0' and sno in ('','$sno') and type IN ('SPD','spd','Spd','spd1','SPD1','Spd1')");
			$dd9 = mysqli_fetch_assoc($qq9);
			echo $payment9=$payment-$dd9['SUM(price)']-$payment_urgent;
			//echo $payment9=$grand_total;
	

	$qq_dis = mysqli_query($db,"select SUM(o_dis) from alltest where pmrn='$pmrn' and eid='$eid' and billstatus NOT IN ('Billed') and bill_check='0' and sno in ('','$sno')");
			$dd_dis = mysqli_fetch_assoc($qq_dis);
			$payment_dis=$dd_dis['SUM(o_dis)'];
	
	
			$dis1 = mysqli_query($db,"select COUNT(id) from alltest where pmrn='$pmrn' and eid='$eid' and billstatus NOT IN ('Billed') and bill_check='0' and sno in ('','$sno') and type NOT IN ('SPD','spd','Spd','spd1','SPD1','Spd1') and urgent=''");
			$dis_data1 = mysqli_fetch_assoc($dis1);
			$n_inves=$dis_data1['COUNT(id)'];

	

$vehicle1=$_REQUEST['vehicle1'];
$due_remarks=$_REQUEST['due_remarks'];
$taka=(int)$_REQUEST['taka'];
$dis_taka=(int)$_REQUEST['dis_taka'];
$percentage=(int)$_REQUEST['percentage'];
$dis_percentage=(int)$_REQUEST['dis_percentage'];
$discount_type=$_REQUEST['discount_type'];
$gtotal=$_REQUEST['gtotal'];
if($count_lab>0)
{$discount_taka=(int)$payment+100-$dis_taka;
$discount_percentage=(int)$payment+100-$dis_percentage;
}

else if($count_lab<=0)
{$discount_taka=(int)$payment-$dis_taka;
$discount_percentage=(int)$payment-$dis_percentage;
}



	


$discount_type=$_REQUEST['discount_type'];
//$taka=$_REQUEST['taka'];
//$percentage=$_REQUEST['percentage'];

$user1='root';
$pass='Godiloveu16';
$db1= new PDO('mysql:host=localhost; dbname=sfmmkpjnew', $user1, $pass);
$db1->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);


$db = mysqli_connect('localhost','root','Godiloveu16');
mysqli_select_db($db,'sfmmkpjnew');

			
$apptime=date('Y-m-d H:i:s');


			
			
$servername = "localhost";
$username = "root";
$password = "Godiloveu16";
$dbname = "sfmmkpjnew";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

if($discount_type==''){
$sql = "insert into pms_bill(pmrn,eid,location,amount,date,time,user,remarks,dname,s_no,p_mode,`p_remarks`,`dis_amount`) VALUES
('$pmrn','$eid','OPD_inves','$gtotal','$appdate','$apptime','$user','Investigation(OPD)','alltest','$mno','$vehicle1','$due_remarks','0')";
}

else if($discount_type=='taka'){
$sql = "insert into pms_bill(pmrn,eid,location,amount,date,time,user,remarks,dname,s_no,p_mode,`p_remarks`,`dis_amount`) VALUES
('$pmrn','$eid','OPD_inves','$gtotal','$appdate','$apptime','$user','Investigation(OPD)','alltest','$mno','$vehicle1','$due_remarks','$discount_taka')";
}

else if($discount_type=='percentage'){
$sql = "insert into pms_bill(pmrn,eid,location,amount,date,time,user,remarks,dname,s_no,p_mode,`p_remarks`,`dis_amount`) VALUES
('$pmrn','$eid','OPD_inves','$gtotal','$appdate','$apptime','$user','Investigation(OPD)','alltest','$mno','$vehicle1','$due_remarks','$discount_percentage')";
}


if ($conn->query($sql) === TRUE) {
  $last_id = $conn->insert_id;
  
 if($count_lab>0) {
	 
$ins_query="insert into alltest (`pmrn`,`pname`,`eid`,`medi`,`date`,`price`,`date1`,`dprice`,`billstatus`,`billno`) 
values ('$pmrn','$pname','$eid','Sample Collection Charge','$date','100','$date77','100','Billed','$last_id')";
mysqli_query($con,$ins_query) or die(mysql_error());
	 
 }
  
if(!empty($_REQUEST['update']) and $discount_type=='')	{
	
	
	 foreach($_POST['update'] as $updateid){

$cgtotal = $_POST['cgtotal_'.$updateid];
$urgent_request = $_POST['eqty_per_dis_'.$updateid];			

$dis = mysqli_query($db,"select * from alltest where id='$updateid'");
			$dis_data = mysqli_fetch_assoc($dis);
			$actual_price=$dis_data['price'];
			if($actual_price>$cgtotal){
				$discount=$actual_price-$cgtotal;
			
$sql1 = "update alltest set dprice='$cgtotal', o_dis='$discount', billno='$last_id', billstatus='Billed' where id=$updateid";
$conn->query($sql1);
			
			}
			
			else if($actual_price<$cgtotal){
				$urgent=$cgtotal-$actual_price;
			
$sql1 = "update alltest set dprice='$cgtotal', urgent='Urgent', o_dis='$urgent', billno='$last_id', billstatus='Billed' where id=$updateid";
$conn->query($sql1);
			
			}
			
			else if($actual_price==$cgtotal){
				$urgent=$cgtotal-$actual_price;
			
$sql1 = "update alltest set dprice='$cgtotal', billno='$last_id', billstatus='Billed' where id=$updateid";
$conn->query($sql1);
			
			}



//$sql1 = "update alltest set billno='$last_id', billstatus='Billed' where pmrn='$pmrn' and eid='$eid' and billstatus NOT IN('Billed','Cancel')";
//$conn->query($sql1);


	 }
	

header("Location: new_opd_payment_consultation1_new_inves.php?adate1=$adate1&pmrn=$pmrn&dname=$dname&billno=$last_id&eid=$eid ");
}	
else if(!empty($_REQUEST['update']) and $discount_type=='percentage'){
                foreach($_POST['update'] as $updateid){

$cgtotal = $_POST['cgtotal_'.$updateid];
$urgent_request = $_POST['eqty_per_dis_'.$updateid];			
	
			$dis = mysqli_query($db,"select * from alltest where id='$updateid'");
			$dis_data = mysqli_fetch_assoc($dis);
			$type_test=$dis_data['type'];
			$type_urgent=$dis_data['urgent'];
			$actual_price=$dis_data['price'];
			
			
			$dis_urgent = mysqli_query($db,"select * from alltest where id='$updateid' and urgent=''");
			$dis_data_urgent = mysqli_fetch_assoc($dis_urgent);
			$type_test_urgent=$dis_data_urgent['type'];
			$type_urgent_urgent=$dis_data_urgent['urgent'];
			
			
			//$a_code=[];
			$newValue = $dis_data_urgent['medi'];
			$processedValues[] = $newValue;	
			$array_count=count($processedValues);
			
		
$qty_r = [];
for ($i = 0; $i < $array_count; $i++) {
    $qty_r[] = 1;
}

$zero = [];
for ($i = 0; $i < $array_count; $i++) {
    $zero[] = 0;
}
$empty = [];
for ($i = 0; $i < $array_count; $i++) {
    $empty[] = "";
}

$date_a = [];
for ($i = 0; $i < $array_count; $i++) {
    $date_a[] = "30-JUL-2025";
}

$data_a = [];
for ($i = 0; $i < $array_count; $i++) {
    $data_a[] = "A";
}
			
			
			
			if($type_test=="SPD" || $type_test=="SPD1" || $type_test=="Spd" || $type_test=="Spd1" || $type_test=="spd" || $type_test=="spd" || $type_test=="spd1")
			{
			$a_price=$dis_data['price'];
			
			
			$percentage_price1=0;
			$percentage_price=$cgtotal;
			//$percentage_price=$a_price;
			}
			
			else if($actual_price<$cgtotal)
			{
			$a_price=$dis_data['price'];
			
			
			$percentage_price1=0;
			//$percentage_price=$a_price;
			$percentage_price=$cgtotal;
			}
			
			else if($actual_price>$cgtotal)
			{
			$a_price=$dis_data['price'];
			
			
			$percentage_price1=0;
			//$percentage_price=$a_price;
			$percentage_price=$cgtotal;
			}
			
			else
			{
			//$a_price=$dis_data['price'];
			$a_price=$cgtotal;
			$per_taka=$payment9*($percentage/100);
			//$percentage_price1=$a_price * ($percentage/100);
			
			
			
			
			$percentage_price1=($per_taka / $payment9)* $a_price;
			
			$percentage_price=$a_price - $percentage_price1;
			
			$taka_price=ROUND($taka_price_p, 2);
			}
			
			$payment_after_discount_in_taka=$payment-$taka;
			$payment_after_discount_in_percentage=$payment * ($percentage/100);			

echo $a_code[]=$percentage_price1;

$processedValues_price[]=(int)$dis_data['price'];
						 $processeDcode[]=(int)$dis_data['code'];
				
$refund_time=date('Y-m-d H:i:s');
$disco=$_POST['eqty1_'.$updateid] * $percentage;
$eqty2 = $_POST['eqty1_'.$updateid] - $disco;



$sql1 = "update alltest set billno='$last_id', billstatus='Billed', dprice='$percentage_price', o_dis='$percentage_price1' where id='$updateid'";
$conn->query($sql1);



				}


$sql1_c = "update alltest set bill_check='0' where pmrn='$pmrn' and eid='$eid' and bill_check='1'";
$conn->query($sql1_c);

				
header("Location: new_opd_payment_consultation1_new_inves.php?adate1=$adate1&pmrn=$pmrn&dname=$dname&billno=$last_id&eid=$eid ");
				
				
				
				
				//$url ='http://192.168.100.254:3038/api/billinvoice/';


//Data Sending To API using CURL Method

	$data = array(
  "in_invoice_date"=> "30-JUL-2025",
  "in_invoice_datetime"=> "30-JUL-2025",
  "in_module_no_fk"=> 12,
  "in_patient_no_fk"=> 24084,
  "in_patient_code"=> "24084",
  "in_admission_no_pk"=> null,
  "in_admission_code"=> null,
  "in_appointment_no_fk"=> null,
  "in_prescription_no_fk"=> null,
  "in_doc_person_no_fk"=> 5001,
  "in_first_ref_doc_person_no_fk"=> null,
  "in_second_ref_doc_person_no_fk"=> null,
  "in_report_delivary_date"=> "11-JUL-2025",
  "in_report_delivary_datetime"=> "11-JUL-2025",
  "in_counter_su_no_fk"=> 38732,
  "in_cor_client_no_fk"=> null,
  "in_cor_client_card_no_fk"=> null,
  "in_relation_lookup_no_fk"=> null,
  "in_ref_invoice_no_fk"=> "$last_id",
  "in_pat_type"=> "1",
  "in_dob"=> "11-JUL-1980",
  "in_age"=> "35Y",
  "in_age_dd"=> 0,
  "in_age_mm"=> 0,
  "in_age_yy"=> 35,
  "in_customer_addr"=> "Dhaka",
  "in_customer_name"=> "$p_name",
  "in_GENDER_TXT"=> "M",
  "in_MARITAL_STATUS_TXT"=> "Married",
  "in_BLOOD_GROUP"=> "O+",
  "in_PHONE_MOBILE"=> "017XXXXXXXX",
  "in_invoice_remarks"=> "",
  "in_urgent_fee_total"=> 0,
  "in_invoice_type"=> "SYS",
  "in_emergency_ind"=> 0,
  "in_daycare_ind"=> 0,
  "in_ot_ind"=> 0,
  "in_au_entry_by"=> 1,
  "in_au_entry_session"=> "SESSION123",
  "in_au_entry_hospital_pk_no"=> 141,
  "in_item_level_disc_ind"=> 0,
  "in_ledgertrn_no"=> null,
  "in_item_count"=>$array_count,
  "in_ITEM_NO_FK"=> $processeDcode,
  "IN_ITEM_BATCH_FK"=>$data_a,
  "IN_ITEM_EXPIRY_DT"=>$date_a,
  "in_ITEM_NAME"=> $processedValues,
  "in_ITEMTYPE_NO_FK"=> $zero,
  "in_ITEM_QTY"=> $qty_r,
  "in_ITEM_MU"=>$processedValues,
  //"in_ITEM_RATE"=> ["$integer_value", "$payment"],
  "in_ITEM_RATE"=> $processedValues_price,
  "in_item_disc_percent"=> $zero,
  "in_item_disc_amount"=> 0,
  "in_ITEM_VAT"=> $zero,
  "in_URGENT_FEE"=> $zero,
  "in_SERVICE_CHARGE"=> $zero,
  "in_REPORT_DELIVERY_DATE"=> $date_a,
  "in_REPORT_DELIVERY_TIME"=> $date_a,
  "in_DELIVERY_STATUS_LOOKUP_NO_FK"=> $zero,
  "in_PACKAGE_ITEM_IND"=> $zero,
  "in_item_level_remarks"=> $empty,
  "in_provider_no_fk"=> $zero
);

//initialize the CURL

$ch = curl_init($url);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true); // Return response as a string
curl_setopt($ch, CURLOPT_POST, true); // POST request
curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($data)); // Send JSON payload
curl_setopt($ch, CURLOPT_HTTPHEADER, array(
    'Content-Type: application/json',
    'Content-Length: ' . strlen(json_encode($data))
));

$response = curl_exec($ch);


if(curl_errno($ch)){
    echo 'Curl error: ' . curl_error($ch);
}

curl_close($ch);

//echo json_encode($data);




$decoded_response = json_decode($response, true); // Decode the JSON response

//Setting Other Logic after receving the decoded response 


 if($decoded_response['invoice_no']!='' and $decoded_response['invoice_id']!=''){
	 
	 
	 
	 
	// $url ='http://192.168.100.254:3038/api/billinvoicepayment/';


//Data Sending To API using CURL Method



$data = array(
  
  "in_payment_date"=> "15-JUL-2025",
  "in_payment_datetime"=> "15-JUL-2025",
  "in_invoice_no_fk"=> $decoded_response['invoice_no'],
  "in_module_no_fk"=> 12,
  "in_patient_no_fk"=> 24084,
  "in_admission_no_fk"=> null,
  "in_prescription_no_fk"=> null,
  "in_counter_su_no_fk"=> 20275,
  "in_ledger_amt_sales"=> 0,
  "in_ledger_amt_payment"=> $dis_percentage,
  "in_ledger_amt_discount"=> $discount_percentage,
  "in_urgent_fee"=> 0,
  "in_service_charge"=> 0,
  "in_cor_client_no_fk"=> null,
  "in_pay_mode"=> "CASH",
  "in_pay_cqcc_holder_name"=> "",
  "in_pay_cqcc_number"=> "",
  "in_pay_cqcc_deduct_percent"=> 0,
  "in_pay_bank_name"=> "",
  "in_pay_remarks"=> "Payment collected",
  "in_given_amt"=> $dis_percentage,
  "in_disc_type_lookup_no_fk"=> 0,
  "in_disc_remarks"=> "",
  "in_disc_amt_by_doc"=> 0,
  "in_disc_amt_by_doc_no_fk"=> 0,
  "in_disc_amt_by_hosp"=> 0,
  "in_disc_amt_by_hosp_auth_by"=> 0,
  "in_disc_amt_request_by_name"=> "",
  "in_au_entry_by"=> 1,
  "in_au_entry_session"=> "SESSION123",
  "in_au_entry_hospital_pk_no"=> 141,
  "in_item_count"=> $array_count,
  "in_item_level_disc_ind"=> 1,
  "in_ITEM_NO_FK"=> $processeDcode,
  "in_ITEM_NAME"=> $processedValues,
  "in_ITEMTYPE_NO_FK"=> $qty_r,
  "in_ITEM_QTY"=> $qty_r,
  "in_ITEM_RATE"=> $processedValues_price,
  "in_item_disc_percent"=> $zero,
  "in_item_disc_amount"=> $a_code,
  "in_ITEM_VAT"=> $zero,
  "in_ITEMURGENT_FEE"=> $zero,
  "in_ITEMSERVICE_CHARGE"=> $zero,
  "in_PACKAGE_ITEM_IND"=> $zero,
  "in_ledgertrn_no"=> null
);
//initialize the CURL

$ch = curl_init($url);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true); // Return response as a string
curl_setopt($ch, CURLOPT_POST, true); // POST request
curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($data)); // Send JSON payload
curl_setopt($ch, CURLOPT_HTTPHEADER, array(
    'Content-Type: application/json',
    'Content-Length: ' . strlen(json_encode($data))
));

$response = curl_exec($ch);


if(curl_errno($ch)){
    echo 'Curl error: ' . curl_error($ch);
}

curl_close($ch);

echo json_encode($data);

$decoded_response = json_decode($response, true); // Decode the JSON response

if($decoded_response['out_ledger_no']!='' and $decoded_response['out_invoice_no']!=''){
	 
	 
	 //
	 
	 	//$url ='http://192.168.100.254:3038/api/billinvoicepaymentmode/';


//Data Sending To API using CURL Method

$data = array(
  "in_payment_date"=> "14-JUL-2025",
  "in_invoice_no_fk"=> $decoded_response['out_invoice_no'],
  "in_LEDGER_NO_FK"=> $decoded_response['out_ledger_no'],
  "in_paymood"=> ["CASH", "CARD"],
  "in_pay_mood_type"=> ["FULL", "PARTIAL"],
  "in_bank_name"=> ["", "Bank Asia"],
  "in_transaction_id"=> ["", ""],
  "in_bank_card_no"=> ["", ""],
  "in_acc_holder_name"=> ["", ""],
  "in_payment_amt"=> [$dis_percentage, 0],
  "in_paymood_count"=> 2,
  "in_au_entry_by"=> 1,
  "in_au_entry_session"=> "SESSION001",
  "in_au_entry_hospital_pk_no"=> 141
);

//initialize the CURL

$ch = curl_init($url);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true); // Return response as a string
curl_setopt($ch, CURLOPT_POST, true); // POST request
curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($data)); // Send JSON payload
curl_setopt($ch, CURLOPT_HTTPHEADER, array(
    'Content-Type: application/json',
    'Content-Length: ' . strlen(json_encode($data))
));

$response = curl_exec($ch);


if(curl_errno($ch)){
    echo 'Curl error: ' . curl_error($ch);
}

curl_close($ch);

//echo json_encode($data);

$decoded_response = json_decode($response, true); // Decode the JSON response

	 
	 $api_query = "update pmedi set api_status='1' where id='".$updateid."'"; 
$api_result = mysqli_query($con, $api_query) or die(mysqli_error());
	 
	 
	 
 }

}
				}




else if(!empty($_REQUEST['update']) and $discount_type=='taka'){
	
	 foreach($_POST['update'] as $updateid){

$cgtotal = $_POST['cgtotal_'.$updateid];
$urgent_request = $_POST['eqty_per_dis_'.$updateid];			
	 
$dis = mysqli_query($db,"select * from alltest where id='$updateid'");
			$dis_data = mysqli_fetch_assoc($dis);
			
			$type_test=$dis_data['type'];
			$type_urgent=$dis_data['urgent'];
			$actual_price=$dis_data['price'];
			
			$dis_urgent = mysqli_query($db,"select * from alltest where id='$updateid' and urgent=''");
			$dis_data_urgent = mysqli_fetch_assoc($dis_urgent);
			
			$type_test_urgent=$dis_data_urgent['type'];
			$type_urgent_urgent=$dis_data_urgent['urgent'];
			//$a_code=[];
			$newValue = $dis_data_urgent['medi'];
			$processedValues[] = $newValue;	
			$array_count=count($processedValues);
			
		
$qty_r = [];
for ($i = 0; $i < $array_count; $i++) {
    $qty_r[] = 1;
}

$zero = [];
for ($i = 0; $i < $array_count; $i++) {
    $zero[] = 0;
}
$empty = [];
for ($i = 0; $i < $array_count; $i++) {
    $empty[] = "";
}

$date_a = [];
for ($i = 0; $i < $array_count; $i++) {
    $date_a[] = "30-JUL-2025";
}

$data_a = [];
for ($i = 0; $i < $array_count; $i++) {
    $data_a[] = "A";
}
			
			
			if($type_test=="SPD" || $type_test=="SPD1" || $type_test=="Spd" || $type_test=="Spd1" || $type_test=="spd" || $type_test=="spd1")
			{
			$a_price=$dis_data['price'];
			
			$taka_price=0;
			$taka_price_indu=$cgtotal;
			
			$percentage_price=($payment / $n_inves) *($percentage/100);
			$percentage_price1=$payment -($percentage/100);
			$percentage_price_indu=$a_price-$percentage_price;
			
			$payment_after_discount_in_taka=$payment-$taka;
			$payment_after_discount_in_percentage=$payment-$percentage_price1;			

			}
			
			
			else if($actual_price<$cgtotal)
			{
			$a_price=$dis_data['price'];
			
			$taka_price=0;
			$taka_price_indu=$cgtotal;
			
			$percentage_price=($payment / $n_inves) *($percentage/100);
			$percentage_price1=$payment -($percentage/100);
			$percentage_price_indu=$a_price-$percentage_price;
			
			$payment_after_discount_in_taka=$payment-$taka;
			$payment_after_discount_in_percentage=$payment-$percentage_price1;			

			}
			
						else if($actual_price>$cgtotal)
			{
			$a_price=$dis_data['price'];
			
			$taka_price=0;
			$taka_price_indu=$cgtotal;
			
			$percentage_price=($payment / $n_inves) *($percentage/100);
			$percentage_price1=$payment -($percentage/100);
			$percentage_price_indu=$a_price-$percentage_price;
			
			$payment_after_discount_in_taka=$payment-$taka;
			$payment_after_discount_in_percentage=$payment-$percentage_price1;			

			}
			
			
		else
			{
			
			$a_price=$dis_data['price'];
			//$taka_price=$taka / $n_inves;
			$taka_price_p=($taka / $payment9)* $a_price;
			
			$taka_price=ROUND($taka_price_p, 2);
			$taka_price_indu=$a_price-$taka_price;
			
			$percentage_price=($payment / $n_inves) *($percentage/100);
			$percentage_price1=$payment -($percentage/100);
			$percentage_price_indu=$a_price-$percentage_price;
			
			$payment_after_discount_in_taka=$payment-$taka;
			$payment_after_discount_in_percentage=$payment-$percentage_price1;			

			}
						 $a_code[]=$taka_price;
						  //$a_code[]=number_format($taka_price_p, 2, '.', '');
						 $processedValues_price[]=(int)$dis_data['price'];
						 $processeDcode[]=(int)$dis_data['code'];
						 //echo $a_code;
$refund_time=date('Y-m-d H:i:s');
$disco=$_POST['eqty1_'.$updateid] * $percentage;
$eqty2 = $_POST['eqty1_'.$updateid] - $disco;

  
  $sql1 = "update alltest set billno='$last_id' , billstatus='Billed', dprice='$taka_price_indu',o_dis='$taka_price' where id='$updateid'";
$conn->query($sql1);






	 }
	 
	 $sql1_c = "update alltest set bill_check='0' where pmrn='$pmrn' and eid='$eid' and bill_check='1'";
$conn->query($sql1_c);

header("Location: new_opd_payment_consultation1_new_inves.php?adate1=$adate1&pmrn=$pmrn&dname=$dname&billno=$last_id&eid=$eid");


			//$url ='http://192.168.100.254:3038/api/billinvoice/';


//Data Sending To API using CURL Method

	$data = array(
  "in_invoice_date"=> "30-JUL-2025",
  "in_invoice_datetime"=> "30-JUL-2025",
  "in_module_no_fk"=> 12,
  "in_patient_no_fk"=> 24084,
  "in_patient_code"=> "24084",
  "in_admission_no_pk"=> null,
  "in_admission_code"=> null,
  "in_appointment_no_fk"=> null,
  "in_prescription_no_fk"=> null,
  "in_doc_person_no_fk"=> 5001,
  "in_first_ref_doc_person_no_fk"=> null,
  "in_second_ref_doc_person_no_fk"=> null,
  "in_report_delivary_date"=> "11-JUL-2025",
  "in_report_delivary_datetime"=> "11-JUL-2025",
  "in_counter_su_no_fk"=> 38732,
  "in_cor_client_no_fk"=> null,
  "in_cor_client_card_no_fk"=> null,
  "in_relation_lookup_no_fk"=> null,
  "in_ref_invoice_no_fk"=> "$last_id",
  "in_pat_type"=> "1",
  "in_dob"=> "11-JUL-1980",
  "in_age"=> "35Y",
  "in_age_dd"=> 0,
  "in_age_mm"=> 0,
  "in_age_yy"=> 35,
  "in_customer_addr"=> "Dhaka",
  "in_customer_name"=> "$p_name",
  "in_GENDER_TXT"=> "M",
  "in_MARITAL_STATUS_TXT"=> "Married",
  "in_BLOOD_GROUP"=> "O+",
  "in_PHONE_MOBILE"=> "017XXXXXXXX",
  "in_invoice_remarks"=> "",
  "in_urgent_fee_total"=> 0,
  "in_invoice_type"=> "SYS",
  "in_emergency_ind"=> 0,
  "in_daycare_ind"=> 0,
  "in_ot_ind"=> 0,
  "in_au_entry_by"=> 1,
  "in_au_entry_session"=> "SESSION123",
  "in_au_entry_hospital_pk_no"=> 141,
  "in_item_level_disc_ind"=> 0,
  "in_ledgertrn_no"=> null,
  "in_item_count"=>$array_count,
  "in_ITEM_NO_FK"=> $processeDcode,
  "IN_ITEM_BATCH_FK"=>$data_a,
  "IN_ITEM_EXPIRY_DT"=>$date_a,
  "in_ITEM_NAME"=> $processedValues,
  "in_ITEMTYPE_NO_FK"=> $zero,
  "in_ITEM_QTY"=> $qty_r,
  "in_ITEM_MU"=>$processedValues,
  //"in_ITEM_RATE"=> ["$integer_value", "$payment"],
  "in_ITEM_RATE"=> $processedValues_price,
  "in_item_disc_percent"=> $zero,
  "in_item_disc_amount"=> 0,
  "in_ITEM_VAT"=> $zero,
  "in_URGENT_FEE"=> $zero,
  "in_SERVICE_CHARGE"=> $zero,
  "in_REPORT_DELIVERY_DATE"=> $date_a,
  "in_REPORT_DELIVERY_TIME"=> $date_a,
  "in_DELIVERY_STATUS_LOOKUP_NO_FK"=> $zero,
  "in_PACKAGE_ITEM_IND"=> $zero,
  "in_item_level_remarks"=> $empty,
  "in_provider_no_fk"=> $zero
);

//initialize the CURL

$ch = curl_init($url);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true); // Return response as a string
curl_setopt($ch, CURLOPT_POST, true); // POST request
curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($data)); // Send JSON payload
curl_setopt($ch, CURLOPT_HTTPHEADER, array(
    'Content-Type: application/json',
    'Content-Length: ' . strlen(json_encode($data))
));

$response = curl_exec($ch);


if(curl_errno($ch)){
    echo 'Curl error: ' . curl_error($ch);
}

curl_close($ch);

//echo json_encode($data);




$decoded_response = json_decode($response, true); // Decode the JSON response

//Setting Other Logic after receving the decoded response 


 if($decoded_response['invoice_no']!='' and $decoded_response['invoice_id']!=''){
	 
	 
	 
	 
	 //$url ='http://192.168.100.254:3038/api/billinvoicepayment/';


//Data Sending To API using CURL Method



$data = array(
  
  "in_payment_date"=> "15-JUL-2025",
  "in_payment_datetime"=> "15-JUL-2025",
  "in_invoice_no_fk"=> $decoded_response['invoice_no'],
  "in_module_no_fk"=> 12,
  "in_patient_no_fk"=> 24084,
  "in_admission_no_fk"=> null,
  "in_prescription_no_fk"=> null,
  "in_counter_su_no_fk"=> 20275,
  "in_ledger_amt_sales"=> 0,
  "in_ledger_amt_payment"=> $dis_taka,
  "in_ledger_amt_discount"=> $discount_taka,
  "in_urgent_fee"=> 0,
  "in_service_charge"=> 0,
  "in_cor_client_no_fk"=> null,
  "in_pay_mode"=> "CASH",
  "in_pay_cqcc_holder_name"=> "",
  "in_pay_cqcc_number"=> "",
  "in_pay_cqcc_deduct_percent"=> 0,
  "in_pay_bank_name"=> "",
  "in_pay_remarks"=> "Payment collected",
  "in_given_amt"=> $dis_taka,
  "in_disc_type_lookup_no_fk"=> 0,
  "in_disc_remarks"=> "",
  "in_disc_amt_by_doc"=> 0,
  "in_disc_amt_by_doc_no_fk"=> 0,
  "in_disc_amt_by_hosp"=> 0,
  "in_disc_amt_by_hosp_auth_by"=> 0,
  "in_disc_amt_request_by_name"=> "",
  "in_au_entry_by"=> 1,
  "in_au_entry_session"=> "SESSION123",
  "in_au_entry_hospital_pk_no"=> 141,
  "in_item_count"=> $array_count,
  "in_item_level_disc_ind"=> 1,
  "in_ITEM_NO_FK"=> $processeDcode,
  "in_ITEM_NAME"=> $processedValues,
  "in_ITEMTYPE_NO_FK"=> $qty_r,
  "in_ITEM_QTY"=> $qty_r,
  "in_ITEM_RATE"=> $processedValues_price,
  "in_item_disc_percent"=> $zero,
  "in_item_disc_amount"=> $a_code,
  "in_ITEM_VAT"=> $zero,
  "in_ITEMURGENT_FEE"=> $zero,
  "in_ITEMSERVICE_CHARGE"=> $zero,
  "in_PACKAGE_ITEM_IND"=> $zero,
  "in_ledgertrn_no"=> null
);
//initialize the CURL

$ch = curl_init($url);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true); // Return response as a string
curl_setopt($ch, CURLOPT_POST, true); // POST request
curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($data)); // Send JSON payload
curl_setopt($ch, CURLOPT_HTTPHEADER, array(
    'Content-Type: application/json',
    'Content-Length: ' . strlen(json_encode($data))
));

$response = curl_exec($ch);


if(curl_errno($ch)){
    echo 'Curl error: ' . curl_error($ch);
}

curl_close($ch);

echo json_encode($data);

$decoded_response = json_decode($response, true); // Decode the JSON response

if($decoded_response['out_ledger_no']!='' and $decoded_response['out_invoice_no']!=''){
	 
	 
	 //
	 
	 	//$url ='http://192.168.100.254:3038/api/billinvoicepaymentmode/';


//Data Sending To API using CURL Method

$data = array(
  "in_payment_date"=> "14-JUL-2025",
  "in_invoice_no_fk"=> $decoded_response['out_invoice_no'],
  "in_LEDGER_NO_FK"=> $decoded_response['out_ledger_no'],
  "in_paymood"=> ["CASH", "CARD"],
  "in_pay_mood_type"=> ["FULL", "PARTIAL"],
  "in_bank_name"=> ["", "Bank Asia"],
  "in_transaction_id"=> ["", ""],
  "in_bank_card_no"=> ["", ""],
  "in_acc_holder_name"=> ["", ""],
  "in_payment_amt"=> [$dis_taka, 0],
  "in_paymood_count"=> 2,
  "in_au_entry_by"=> 1,
  "in_au_entry_session"=> "SESSION001",
  "in_au_entry_hospital_pk_no"=> 141
);

//initialize the CURL

$ch = curl_init($url);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true); // Return response as a string
curl_setopt($ch, CURLOPT_POST, true); // POST request
curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($data)); // Send JSON payload
curl_setopt($ch, CURLOPT_HTTPHEADER, array(
    'Content-Type: application/json',
    'Content-Length: ' . strlen(json_encode($data))
));

$response = curl_exec($ch);


if(curl_errno($ch)){
    echo 'Curl error: ' . curl_error($ch);
}

curl_close($ch);

//echo json_encode($data);

$decoded_response = json_decode($response, true); // Decode the JSON response

	 
	 $api_query = "update pmedi set api_status='1' where id='".$updateid."'"; 
$api_result = mysqli_query($con, $api_query) or die(mysqli_error());
	 
	 
	 
 }

}

}


/*else {
  
$sql1 = "update alltest set billno='$last_id' where pmrn='$pmrn' and eid='$eid' and billstatus='Billed'";
$conn->query($sql1);
header("Location: new_opd_payment_consultation1_new_inves.php?adate1=$adate1&pmrn=$pmrn&dname=$dname&billno=$last_id&eid=$eid ");
}
*/

} else {
  echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();

}

			
			
			
			



?>


<?php
if(isset($_POST['Submit5']))
{
	
	
	
$servername = "localhost";
$username = "root";
$password = "Godiloveu16";
$dbname = "sfmmkpjnew";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

if ($conn->query($sql) === TRUE) {
  $last_id = $conn->insert_id;

  $sql1 = "update alltest set billno='$last_id' where id='1180233' ";
$conn->query($sql1);

} else {
  echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();

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


@media screen and (min-width: 600px) {

  form {
    max-width: 2000px;
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

</head>
</head>

<body>

<div id='cssmenu'>
<ul>
   <li><a href='manual_bill.php'><span>Home</span></a></li>
   
   
   <li class='last'><a href='logout'><span>LOGOUT</span></a></li>
</ul>
</div>




  <!-- Stephonce R. MOrris | 2014 -->

<!-- Google Font -->
		<link href='jsnew/fonts' rel='stylesheet' type='text/css'>

<form action="" method="post" name="invoice" id="invoice">
<!-- Form Title -->
        <table align="center" class="table table-bordered" id="dynamic_field">  
		
				<tr>
					<td colspan="10"><label><strong>Doctors's Name :</strong></label></td>
					<td colspan="10"><label><strong>Patient's Name :</strong></label></td>
					<td colspan="10"><label><strong>Patient's MRN:</strong></label></td>
					

										
				</tr>
				
				<tr>	  
				<td colspan="10"><input list="browsers10" name="dname" size=60% class="form-control" autocomplete="off" value='<?php echo $dname;?>'required readonly>
  </td>
				<td colspan="10"><?php echo $pname; ?></td>
				<td colspan="10"><?php echo $pmrn; ?></td>
				
</tr>
						

						
						
					


				

<tr>
      <td colspan="1" align="center"><strong>S.No</strong></td>
     
      <td colspan="5" align="center"><strong>Investigation Name</strong></td>
     	  
      	  <td colspan="3" align="center"><strong>Dis(tk)</strong></td>
		  <td colspan="3" align="center"><strong>Dis(%)</strong></td>
		  <td colspan="3" align="center"><strong>Urgent(%)</strong></td>
		  <td colspan="3" align="center"><strong>Item Price</strong></td>
		  <td colspan="3" align="center"><strong>Net Price</strong></td>
		        	  <td colspan="3" align="center"><strong>DELETE</strong></td>
					  <td colspan="1" align="center"><input type='checkbox' id='checkAll' ></td>
        

	   </tr>
 <?php
	
$user=$_SESSION["sess_username"];
//$pmrn=$_REQUEST["pmrn"];
//$eid=date('dmY');
//$dname=$_REQUEST["dname"];
//$id1=$_REQUEST["ID"];

//$id=$_REQUEST["id"];
//$episode=$data59["eid"];

$count=1;
$sel_query="Select * from alltest where pmrn= '$pmrn' and eid='$eid' and billstatus NOT IN ('Billed') and sno IN('$sno','')  and bill_check='0' order by `id` DESC;";
// and billstatus!='Cancel'
$result = mysqli_query($con,$sel_query);

while($row = mysqli_fetch_assoc($result)) 
{ ?>    <tr>

     
   
     <td align="center" colspan="1" <?php if($new_qty>0){echo'style="font-weight: bold;font-size:22px;color:green"';} else{echo'style="font-weight: bold;font-size:22px;color:red"';}?>><?php echo $count; ?></td>


                            
                   <?php 
				   $id = $row['id'];
				   ?>
                  
	 
      <td align="center"colspan="5" <?php if($new_qty>0){echo'style="font-weight: bold;font-size:22px;color:green"';} else{echo'style="font-weight: bold;font-size:22px;color:red"';}?>><?php echo $row["medi"].' ('.$row1["brand1"].')'; ?></td>
	  
		
		
<td align="center"colspan="2" hidden
<?php if($new_qty>0){echo'style="font-weight: bold;font-size:22px;color:green"';} else{echo'style="font-weight: bold;font-size:22px;color:red"';}?>><?php echo $row['price'];?>

<input class="iprice" name="eqty3_<?= $id ?>" id="eqty2" type="hidden" value="<?php echo $row['price'];?>" readonly <?php if($new_qty>0){echo'style="font-weight: bold;font-size:22px;color:green"';} else{echo'style="font-weight: bold;font-size:22px;color:red"';}?>>


</td>			

<td align="center"colspan="2" class="" hidden>



<input class="iquantity" name="eqty1_<?= $id ?>" onchange='subTotal()' id="eqty1" type="text" value="1" required readonly<?php if($new_qty>0){echo'style="font-weight: bold;font-size:22px;color:green"';} else{echo'style="font-weight: bold;font-size:22px;color:red"';}?>>


</td>


<td align="center"colspan="3" class="">





<input class="iquantity555"placeholder="taka" id="discount_item" name="eqty_taka_dis<?= $id ?>" onchange='subTotal66()'  type="text" value="0"  <?php if($new_qty>0){echo'style="font-weight: bold;font-size:22px;color:green"';} else{echo'style="font-weight: bold;font-size:22px;color:red"';}?>>

</td>

<td align="center"colspan="3" class="">




<input class="iquantity666" placeholder="percentage"id="discount_item1" name="eqty_per_dis<?= $id ?>" onchange='subTotal77()'  type="text" value="0"  <?php if($new_qty>0){echo'style="font-weight: bold;font-size:22px;color:green"';} else{echo'style="font-weight: bold;font-size:22px;color:red"';}?>>


</td>

<td align="center"colspan="3" class="">


<input class="urgent" placeholder="urgent" id="urgent_item" name="eqty_per_dis_<?= $id ?>" onchange='subTotal88()'  type="text" value="0"  <?php if($new_qty>0){echo'style="font-weight: bold;font-size:22px;color:green"';} else{echo'style="font-weight: bold;font-size:22px;color:red"';}?>>

</td>




<td colspan="3" class='itotal' value="<?php echo $row['price'];?>"<?php if($new_qty>0){echo'style="font-weight: bold;font-size:22px;color:green"';} else{echo'style="font-weight: bold;font-size:22px;color:red"';}?>></td>


							  
                  <td colspan="3"align="right"><input class='itotal4' name='cgtotal_<?= $id ?>' style="font-weight: bold;font-size:35px;color:red" readonly />
<input type="checkbox" name="choices" value="Urgent" class="chkbox1"id="chkbox" onclick="EnablecheckBox(this)">
</td>
						
	 <td align="center" colspan="1"><input type='checkbox' name='update[]' value='<?= $id ?>' checked hidden></td>						
			      			  
				  
				  
				  <?php
		$rstatus=$row['rstatus'];
		$id1=$row['id'];
		
		
		$url = "deletelab_bill_opd_new?pmrn=$pmrn&id=$id1&pid=$id&sno=$sno"; 
		   
		   
		
	if($rstatus!='RECEIVED')
	{ 
echo "<td align='center' colspan='2' style='background-color:lightblue;'><a href='$url'><b>DELETE</b></a></td>";
	}
	
	else if($rstatus=='RECEIVED')
	{ 
echo "<td align='center'  colspan='2'style='background-color:lightgreen;'><b>Already Received in LAB</b></td>";
	}
	
	?>
	<?php
$id3 = $row['id'];
?>	  

  	  
						
			      

  	   <td align="center"colspan="1"><input type='checkbox' name='update[]' checked value='<?= $id3 ?>' checked></td>						

	  
      </tr>
	  
    <?php $count++; } ?>
	<tr >
	
	<td colspan="15"align="right" style="font-weight: bold;font-size:35px;color:red">Grand Total</td>
	<td colspan="15"align="right"><input id='gtotal' name='gtotal' style="font-weight: bold;font-size:35px;color:red" readonly></td>
</tr>
		


</table>


<tr>
<td colspan="5">	  
			
<input type="radio" id="vehicle1" hidden name="vehicle1" value="Cash"  id="chkPassport"onclick="EnableDisableTextBox(this)"  style="height:20px; width:20px; color:red;"checked>

<input name="due_remarks" hidden type="text" style="text-transform:uppercase" value="" id="sdate21" disabled="disabled" placeholder="Reference No">
</td>


		
		<td colspan="5" align="left" style="color:red; font-weight:bold;font-size:18px"><label><strong>Type </strong></label>
	
<select name="discount_type" value="" class="style1" id="pmrn9" onchange="GetDetail9(this.value)" width="20px;">
			        
					 <option value=''>--Select--</option>
					 <option value='taka'>Discount In Taka</option>
					 <option value='percentage'>Discount In Percentage</option>
					 
									
										 
										 
				
			</select>
			


<select name="ftype" id="txtHint3" class="style1" placeholder="Patient Type"  style="background-color:lightgreen;font-size:18px;font-weight:bold;color:red;width:200px" onchange="GetDetail7(this.value)"> 
		
		
		<option value="">--Select--</option>
			<option value="Self">Self</option>
			
			<?php if($cor_count>0){echo'
			<option value="Corporate">Corporate</option>';}
			else if($staff_count>0){echo'
			<option value="SFMM">Hospital Staff</option>';}?>
			
			
				
      </select>
	  
	  

<input name="cr" type="text" id="cor_dis" placeholder=""value="<?php if($staff_count>0){echo $staff_dis;} else if($cor_count>0) {echo $cor_discount;}?>" readonly style="background-color:lightgreen;font-size:18px;font-weight:bold;color:red;width:120px" hidden>	  
			
</td>

<td colspan="5">
<input type="hidden" id="sum_price" name="sum_price" value="<?php echo $test1;?>"> 
<input type="hidden" id="sum_price_s" name="sum_price_s" value="<?php echo $test1_s;?>"> 
<input name="taka" type="number" class="style1" id="sdate12" placeholder="Discount In Taka" max="1000" hidden style="font-size:20px;color:red;font-weight:bold;">
<input type="number" name="percentage" id="sdate1" class="style1" placeholder="Discount In Percentage" max="10" hidden style="font-size:20px;color:red;font-weight:bold;">



</td>


		
		

		<td colspan="5"align="right">
		<input type="text" id="dis_taka" name="dis_taka" value="" hidden style="font-size:20px;color:red;font-weight:bold;" readonly> 
<input type="text" id="dis_percentage" name="dis_percentage" value="" hidden style="font-size:20px;color:red;font-weight:bold;" readonly> 




<tr>
		<td colspan="30" align="right"bgcolor="lightgreen"><button type="submit" name="Submit1">Confirm</button>
		
		
		</td>
	  
</tr>




  <script>
  $("input").on("change", function() {
   // var ret = parseInt($("#field1").val()) - parseInt($("#field2").val())
	var ret1 = parseInt($("#sum_price_s").val()) 
	var ret11 = parseInt($("#sum_price").val()) 
	var ret2 = parseInt($("#sdate12").val())
	var ret3 = parseInt($("#sdate1").val())
	var ret4=ret11-ret2
	var ret5=ret3 / 100
	var ret6=ret1 * ret5
	var ret7=parseInt(ret11 - ret6)
	
    $("#dis_taka").val(ret4);
	$("#dis_percentage").val(ret7);
  })
</script>

<tr>
		
	  
</tr>
</form>

</body>

</html>
<script>
gt=0;
var iprice=document.getElementsByClassName('iprice');
var iquantity=document.getElementsByClassName('iquantity');
var itotal=document.getElementsByClassName('itotal');
var gtotal=document.getElementById('gtotal');
var itotal4=document.getElementsByClassName('itotal4');
var find_lab=document.getElementById('find_lab');

function subTotal()
{
gt=0
for(i=0;i<iprice.length;i++)
	
{
//itotal[i].innerText=(iprice[i].value)*(iquantity[i].value);
rt=itotal[i].innerText=(iprice[i].value)*(iquantity[i].value);
rt1=itotal4[i].innerText=(iprice[i].value)*(iquantity[i].value);
gt=gt+(iprice[i].value)*(iquantity[i].value);
document.getElementsByClassName("itotal4").value=rt1;
//document.getElementsByClassName("itotal4").value = i; 
}
//gtotal.innerText=gt;

//document.getElementById("gtotal").value=gt;

if(find_lab.value>0){
document.getElementById("gtotal").value=gt+100;
}
else if(find_lab.value<=0){
document.getElementById("gtotal").value=gt;
}
document.getElementById("sum_price_s").value=gt;
//document.getElementsByClassName("itotal4").value=rt1;


}
subTotal();
</script>






<script>
gt=0;
var iprice=document.getElementsByClassName('iprice');
var iquantity=document.getElementsByClassName('iquantity');
var itotal=document.getElementsByClassName('itotal');
var gtotal=document.getElementById('gtotal');
var iquantity555=document.getElementsByClassName('iquantity555');
//var discount_item1=document.getElementById('discount_item1');
var iquantity666=document.getElementsByClassName('iquantity666');
var itotal4=document.getElementsByClassName('itotal4');
var urgent=document.getElementsByClassName('urgent');
var find_lab=document.getElementById('find_lab');

function subTotal66()
{
gt=0
for(i=0;i<iprice.length;i++)
	
{
//itotal[i].innerText=(iprice[i].value)*(iquantity[i].value);
rt=itotal[i].innerText=(iprice[i].value)*(iquantity[i].value)-(iquantity555[i].value);
rt1=itotal4[i].innerText=(iprice[i].value)*(iquantity[i].value)-(iquantity555[i].value);
gt=gt+(iprice[i].value)*(iquantity[i].value)-(iquantity555[i].value);;

//document.getElementsByClassName("itotal4").value=rt1;
//document.getElementsByClassName("itotal4").value = i; 
iquantity666[i].value='';
urgent[i].value='';
itotal4[i].value=rt1;

//clr=discount_item1[i].innerText=0;
}
//gtotal.innerText=gt;
//document.getElementById("gtotal").value=gt;

if(find_lab.value>0){
document.getElementById("gtotal").value=gt+100;
}
else if(find_lab.value<=0){
document.getElementById("gtotal").value=gt;
}
document.getElementById("sum_price_s").value=gt;
//document.getElementsByClassName("itotal4").value=rt1;
//discount_item1.value =clr;

}
subTotal66();
</script>


<script>
gt=0;
var iprice=document.getElementsByClassName('iprice');
var iquantity=document.getElementsByClassName('iquantity');
var itotal=document.getElementsByClassName('itotal');
var gtotal=document.getElementById('gtotal');
var iquantity666=document.getElementsByClassName('iquantity666');
var iquantity555=document.getElementsByClassName('iquantity555');
var itotal4=document.getElementsByClassName('itotal4');
var urgent=document.getElementsByClassName('urgent');
var find_lab=document.getElementById('find_lab');
function subTotal77()
{
gt=0
for(i=0;i<iprice.length;i++)
	
{
//itotal[i].innerText=(iprice[i].value)*(iquantity[i].value);
rt=itotal[i].innerText=(iprice[i].value)*(iquantity[i].value)-(iprice[i].value)*(iquantity[i].value)* (iquantity666[i].value)/100;
rt1=itotal4[i].innerText=(iprice[i].value)*(iquantity[i].value)-(iprice[i].value)*(iquantity[i].value)* (iquantity666[i].value)/100;
gt=gt+(iprice[i].value)*(iquantity[i].value)-(iprice[i].value)*(iquantity[i].value)* (iquantity666[i].value)/100;
//document.getElementsByClassName("iquantity555").value=rt1;
//document.getElementsByClassName("itotal4").value = i; 
iquantity555[i].value='';
urgent[i].value='';
itotal4[i].value=rt1;
}
//gtotal.innerText=gt;
//document.getElementById("gtotal").value=gt;
document.getElementById("sum_price_s").value=gt;
//document.getElementsByClassName("itotal4").value=rt1;
//discount_item.value ="";
if(find_lab.value>0){
document.getElementById("gtotal").value=gt+100;
}
else if(find_lab.value<=0){
document.getElementById("gtotal").value=gt;
}
}
subTotal77();
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


	  

    <script>
					         document.getElementById('submitButton').addEventListener('click', function() {
        this.style.display = 'none'; // Hides the button
        // Optional: Add a message indicating submission is in progress
        // document.getElementById('myForm').innerHTML += '<p>Processing, please wait...</p>';
    });
					 </script>
					 
					 
					 <script>
					         document.getElementById('submitButton1').addEventListener('click', function() {
        this.style.display = 'none'; // Hides the button
        // Optional: Add a message indicating submission is in progress
        // document.getElementById('myForm').innerHTML += '<p>Processing, please wait...</p>';
    });
					 </script>
	</tr>
	
	
	 </table>
            </form>
        </div>








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
		

		function GetDetail9(str) {
			
				var rt = document.getElementById('pmrn9').value;
				var rt1 = document.getElementById('txtHint3').value;

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
var tt = parseInt((rt * rt2) / 100);
var tt_f = rt - tt;
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
	pmrn.hidden = false;
		cor_dis.hidden = true;
		pmrn.value ="";
  }	  
	

				
				
				else if(rt1 === "Self"){
    
	
	
	sdate1.hidden = false;
	sdate1.disabled = false;
	
	
	sdate12.hidden = true;
	sdate12.disabled = true;
	
	dis_taka.hidden = true;
	dis_taka.disabled = true;
	
	dis_percentage.hidden = false;
	dis_percentage.disabled = false;
	//pmrn.disabled = false;
	pmrn.hidden = false;
	cor_dis.hidden = true;
	dis_percentage.value ="";
	dis_taka.value ="";
	sdate1.value ="";
	sdate12.value ="";
	pmrn.value ="percentage";
	//discount_type.selectedIndex = 1;
  }	  
  
	
else if(rt1 === "Corporate"){
    
	
	
	sdate1.hidden = true;
	sdate1.disabled = true;
	
	
	sdate12.hidden = true;
	sdate12.disabled = true;
	
	dis_taka.hidden = true;
	dis_taka.disabled = true;
	
	dis_percentage.hidden = false;
	dis_percentage.disabled = false;
	
	pmrn.hidden = true;
	cor_dis.hidden = false;
	
	dis_percentage.value = tt_f;
	pmrn.value ="percentage";
  }	  
  
  
  else if(rt1 === "SFMM"){
    
	
	
	sdate1.hidden = true;
	sdate1.disabled = true;
	
	
	sdate12.hidden = true;
	sdate12.disabled = true;
	
	dis_taka.hidden = true;
	dis_taka.disabled = true;
	
	dis_percentage.hidden = false;
	dis_percentage.disabled = false;
	
	pmrn.hidden = true;
	cor_dis.hidden = false;
	dis_percentage.value = tt_f;
	pmrn.value ="percentage";
  }	  
  


  
	
				
			}
		
	</script>  
	
	




	<script type="text/javascript">
	gt=0;
    function EnablecheckBox(chkbox1) {
   var iprice=document.getElementsByClassName('iprice').value;
   var iquantity=document.getElementsByClassName('iquantity');
   var discount_item=document.getElementsByClassName('discount_item');
   var discount_item1=document.getElementsByClassName('discount_item1');
   var chkbox1=document.getElementsByClassName('chkbox1');
   var gtotal=document.getElementById('gtotal');
   //var iprice_n=Number(iprice);
   //var uprice=iprice_n+(iprice_n*10/100);     
var itotal=document.getElementsByClassName('itotal');   
var iquantity666=document.getElementsByClassName('iquantity666');
var iquantity555=document.getElementsByClassName('iquantity555');
var itotal4=document.getElementsByClassName('itotal4');
   
        //var txtPassportNumber4 = document.getElementById("sdate21");
        if (chkbox1.checked) {
			gt=0
			for(i=0;i<iprice.length;i++)
   
   
{
rt1=itotal4[i].innerText=(iprice[i].value)*(iquantity[i].value)-(iprice[i].value)*(10/100);
gt=gt+(iprice[i].value)*(iquantity[i].value)-(iprice[i].value)*(10/100);
}
  //console.log("Checkbox is checked!");
  // Perform actions when the checkbox is checked
  
  
  //urgent =iprice_n + uprice;
  //parseInt((rt * rt2) / 100);
  document.getElementById("gtotal").value=gt;
  //document.getElementById("discount_item1").disabled;
  //document.getElementById("discount_item").disabled;
  
  discount_item.value ="";
  discount_item1.value ="";
  discount_item.disabled = true;
  discount_item1.disabled = true;
} 

else{
  //console.log("Checkbox is checked!");
  // Perform actions when the checkbox is checked
  
  
  //urgent =iprice_n + uprice;
  //parseInt((rt * rt2) / 100);
  //document.getElementById("gtotal").value=iprice_n;
  //document.getElementById("discount_item1").value=0;
  //document.getElementById("discount_item").value=0;
  
  discount_item.value ="";
  discount_item1.value ="";
  
  discount_item.disabled = false;
  discount_item1.disabled = false;
  
} 
    }


</script>



<script>
gt=0;
var iprice=document.getElementsByClassName('iprice');
var iquantity=document.getElementsByClassName('iquantity');
var itotal=document.getElementsByClassName('itotal');
var gtotal=document.getElementById('gtotal');
var iquantity555=document.getElementsByClassName('iquantity555');
//var discount_item1=document.getElementById('discount_item1');
var iquantity666=document.getElementsByClassName('iquantity666');
var urgent=document.getElementsByClassName('urgent');
var itotal4=document.getElementsByClassName('itotal4');
var find_lab=document.getElementById('find_lab');
//urgent.addEventListener('input", subTotal88);

function subTotal88()
{
gt=0
for(i=0;i<iprice.length;i++)
	
{
//itotal[i].innerText=(iprice[i].value)*(iquantity[i].value);
//rt=itotal[i].innerText=(iprice[i].value)*(iquantity[i].value)-(iprice[i].value)*(10/100);
rt=itotal[i].innerText=(iprice[i].value)*(iquantity[i].value)+(iprice[i].value)*(urgent[i].value)/100;
rt1=itotal4[i].innerText=(iprice[i].value)*(iquantity[i].value)+(iprice[i].value)*(urgent[i].value)/100;
gt=gt+(iprice[i].value)*(iquantity[i].value)+(iprice[i].value)*(urgent[i].value)/100;

//document.getElementsByClassName("itotal4").value=rt1;
//document.getElementsByClassName("itotal4").value = i; 
iquantity666[i].value='';
iquantity555[i].value='';
itotal4[i].value=rt1;

//clr=discount_item1[i].innerText=0;
}
//gtotal.innerText=gt;
//document.getElementById("gtotal").value=gt;
document.getElementById("sum_price_s").value=gt;
//document.getElementsByClassName("itotal4").value=rt1;
//discount_item1.value =clr;

if(find_lab.value>0){
document.getElementById("gtotal").value=gt+100;
}
else if(find_lab.value<=0){
document.getElementById("gtotal").value=gt;
}
}
subTotal88();
</script>
