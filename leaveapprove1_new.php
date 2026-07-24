
<?php 
    session_start();
    $role = $_SESSION['sess_userrole'];
    if(!isset($_SESSION['sess_username']) || $role!="staff"){
      header('Location: login2?err=2');
    }
?>


<?php
/*
Author: Javed Ur Rehman
Website: https://www.allphptricks.com/
*/

require('db1.php');
$uname=$_REQUEST['uname'];
$id=$_REQUEST['id'];
$type=$_REQUEST['type'];
$bal=$_REQUEST['bal'];
//$dname=$_REQUEST['dname'];
//$eid=$_REQUEST['eid'];
//$pmrn=$_REQUEST['pmrn'];
$user1='root';
$pass='Godiloveu16';
$db2= new PDO('mysql:host=localhost; dbname=sfmmkpjnew', $user1, $pass);
$db2->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);


$query3 = "SELECT * FROM staff3 where sid= '$uname'"; 
	 
$result3 = mysqli_query($con, $query3) or die(mysqli_error());

// Print out result
$row3 = mysqli_fetch_array($result3);
$ataken=$row3['ataken']+$bal;
$etaken=$row3['etaken']+$bal;
$staken=$row3['staken']+$bal;
$mataken=$row3['mataken']+$bal;
$pataken=$row3['pataken']+$bal;
$rltaken=$row3['rleave']+$bal;
$lwpltaken=$row3['lwl']+$bal;
$intaken=$row3['intaken']+$bal;
$comltaken=$row3['comltaken']+$bal;
$mrltaken=$row3['mrltaken']+$bal;
$martaken=$row3['martaken']+$bal;
$insleave=$row3['insleave']+$bal;

$email = $row3['email'];
$mname = $row3['sname'];



$queryl = "SELECT * FROM dleave where id= '$id'"; 
	 
$resultl = mysqli_query($con, $queryl) or die(mysqli_error());

// Print out result
$rowl = mysqli_fetch_array($resultl);
$approve=$rowl['hstatus'];

$confirm='Confirmed By TM';


$dtime= date('d/m/Y H:i:s');
//$id1=$_REQUEST['ID'];
$url = "leaveviewtm";
if($type=='aleave' and $approve!='Confirmed By TM'){

    try {
        $db2->beginTransaction();


        $sh = $db2->prepare("UPDATE staff3 SET ataken=? WHERE sid=? ");
  $sh->execute([$ataken, $uname]);

  $sh = $db2->prepare("UPDATE dleave SET hstatus=?, tatime=? WHERE id=? ");
  $sh->execute([$confirm, $dtime, $id]);

  if($db2->commit()){

$url = "https://script.google.com/macros/s/AKfycbx5mJa9dddnl1DSutImnF91Lq5_bXBhenK0MLfbVMRsMj1-inVJdsswjkfSQ_o4AfM/exec";
            $ch = curl_init($url);
            curl_setopt_array($ch, [
               CURLOPT_RETURNTRANSFER => true,
               CURLOPT_FOLLOWLOCATION => true,
               CURLOPT_POSTFIELDS => http_build_query([
                  "recipient" => $email,
                  "subject"   => 'Leave Confirmmation'.'-'.$dtime,
                  "body"      => 'Hi '.$row3['sname'].', Salam and Greetings. As referred to your leave application at PMS-

Please be informed that Your '.$rowl['tleave'].' from  '.$rowl['sdate'].' to '.$rowl['edate'].' is Approved.

We request you to complete all your pending or important work if there is any so that the Hospital & Nursing College does not face any problems during your Leave.

We much appreciate your thoughtfulness in advance.

Best Regards,
Human Resources Management,
Powered By KPJ_IT_DHAKA'
               ])
            ]);
            $result = curl_exec($ch);
            echo $result;
			header("Location:leaveviewtm");
			curl_close($ch);  }

        }

else if($type=='sleave' and $approve!='Confirmed By TM'){
    try {
    $db2->beginTransaction();


    $sh = $db2->prepare("UPDATE staff3 SET sleave=?, staken=? WHERE sid=? ");
$sh->execute([$staken, $staken, $uname]);

$sh = $db2->prepare("UPDATE dleave SET hstatus=?, tatime=? WHERE id=? ");
$sh->execute([$confirm, $dtime, $id]);



if($db2->commit()){

    $url = "https://script.google.com/macros/s/AKfycbx5mJa9dddnl1DSutImnF91Lq5_bXBhenK0MLfbVMRsMj1-inVJdsswjkfSQ_o4AfM/exec";
                $ch = curl_init($url);
                curl_setopt_array($ch, [
                   CURLOPT_RETURNTRANSFER => true,
                   CURLOPT_FOLLOWLOCATION => true,
                   CURLOPT_POSTFIELDS => http_build_query([
                      "recipient" => $email,
                      "subject"   => 'Leave Confirmmation'.'-'.$dtime,
                      "body"      => 'Hi '.$row3['sname'].', Salam and Greetings. As referred to your leave application at PMS-
    
    Please be informed that Your '.$rowl['tleave'].' from  '.$rowl['sdate'].' to '.$rowl['edate'].' is Approved.
    
    We request you to complete all your pending or important work if there is any so that the Hospital & Nursing College does not face any problems during your Leave.
    
    We much appreciate your thoughtfulness in advance.
    
    Best Regards,
    Human Resources Management,
    Powered By KPJ_IT_DHAKA'
                   ])
                ]);
                $result = curl_exec($ch);
                echo $result;
                header("Location:leaveviewtm");
                curl_close($ch);  }
            }
    
        }


else if($type=='eleave' and $approve!='Confirmed By TM'){
    
    try {
    $db2->beginTransaction();


    $sh = $db2->prepare("UPDATE staff3 SET eleave=?, etaken=? WHERE sid=? ");
$sh->execute([$etaken, $etaken, $uname]);

$sh = $db2->prepare("UPDATE dleave SET hstatus=?, tatime=? WHERE id=? ");
$sh->execute([$confirm, $dtime, $id]);


if($db2->commit()){

    $url = "https://script.google.com/macros/s/AKfycbx5mJa9dddnl1DSutImnF91Lq5_bXBhenK0MLfbVMRsMj1-inVJdsswjkfSQ_o4AfM/exec";
                $ch = curl_init($url);
                curl_setopt_array($ch, [
                   CURLOPT_RETURNTRANSFER => true,
                   CURLOPT_FOLLOWLOCATION => true,
                   CURLOPT_POSTFIELDS => http_build_query([
                      "recipient" => $email,
                      "subject"   => 'Leave Confirmmation'.'-'.$dtime,
                      "body"      => 'Hi '.$row3['sname'].', Salam and Greetings. As referred to your leave application at PMS-
    
    Please be informed that Your '.$rowl['tleave'].' from  '.$rowl['sdate'].' to '.$rowl['edate'].' is Approved.
    
    We request you to complete all your pending or important work if there is any so that the Hospital & Nursing College does not face any problems during your Leave.
    
    We much appreciate your thoughtfulness in advance.
    
    Best Regards,
    Human Resources Management,
    Powered By KPJ_IT_DHAKA'
                   ])
                ]);
                $result = curl_exec($ch);
                echo $result;
                header("Location:leaveviewtm");
                curl_close($ch);  }
        
            }
  }

else if($type=='maleave' and $approve!='Confirmed By TM'){
 
    try {
    $db2->beginTransaction();


    $sh = $db2->prepare("UPDATE staff3 SET maleave=?, mataken=? WHERE sid=? ");
$sh->execute([$mataken, $mataken, $uname]);

$sh = $db2->prepare("UPDATE dleave SET hstatus=?, tatime=? WHERE id=? ");
$sh->execute([$confirm, $dtime, $id]);


if($db2->commit()){

    $url = "https://script.google.com/macros/s/AKfycbx5mJa9dddnl1DSutImnF91Lq5_bXBhenK0MLfbVMRsMj1-inVJdsswjkfSQ_o4AfM/exec";
                $ch = curl_init($url);
                curl_setopt_array($ch, [
                   CURLOPT_RETURNTRANSFER => true,
                   CURLOPT_FOLLOWLOCATION => true,
                   CURLOPT_POSTFIELDS => http_build_query([
                      "recipient" => $email,
                      "subject"   => 'Leave Confirmmation'.'-'.$dtime,
                      "body"      => 'Hi '.$row3['sname'].', Salam and Greetings. As referred to your leave application at PMS-
    
    Please be informed that Your '.$rowl['tleave'].' from  '.$rowl['sdate'].' to '.$rowl['edate'].' is Approved.
    
    We request you to complete all your pending or important work if there is any so that the Hospital & Nursing College does not face any problems during your Leave.
    
    We much appreciate your thoughtfulness in advance.
    
    Best Regards,
    Human Resources Management,
    Powered By KPJ_IT_DHAKA'
                   ])
                ]);
                $result = curl_exec($ch);
                echo $result;
                header("Location:leaveviewtm");
                curl_close($ch);  }
      }
    }

else if($type=='paleave' and $approve!='Confirmed By TM'){

    try {
    $db2->beginTransaction();


    $sh = $db2->prepare("UPDATE staff3 SET paleave=?, pataken=? WHERE sid=? ");
$sh->execute([$pataken, $pataken, $uname]);

$sh = $db2->prepare("UPDATE dleave SET hstatus=?, tatime=? WHERE id=? ");
$sh->execute([$confirm, $dtime, $id]);


if($db2->commit()){

    $url = "https://script.google.com/macros/s/AKfycbx5mJa9dddnl1DSutImnF91Lq5_bXBhenK0MLfbVMRsMj1-inVJdsswjkfSQ_o4AfM/exec";
                $ch = curl_init($url);
                curl_setopt_array($ch, [
                   CURLOPT_RETURNTRANSFER => true,
                   CURLOPT_FOLLOWLOCATION => true,
                   CURLOPT_POSTFIELDS => http_build_query([
                      "recipient" => $email,
                      "subject"   => 'Leave Confirmmation'.'-'.$dtime,
                      "body"      => 'Hi '.$row3['sname'].', Salam and Greetings. As referred to your leave application at PMS-
    
    Please be informed that Your '.$rowl['tleave'].' from  '.$rowl['sdate'].' to '.$rowl['edate'].' is Approved.
    
    We request you to complete all your pending or important work if there is any so that the Hospital & Nursing College does not face any problems during your Leave.
    
    We much appreciate your thoughtfulness in advance.
    
    Best Regards,
    Human Resources Management,
    Powered By KPJ_IT_DHAKA'
                   ])
                ]);
                $result = curl_exec($ch);
                echo $result;
                header("Location:leaveviewtm");
                curl_close($ch);  }
      }
    }

else if($type=='rleave' and $approve!='Confirmed By TM'){
    try {

    $db2->beginTransaction();


    $sh = $db2->prepare("UPDATE staff3 SET rleave=? WHERE sid=? ");
$sh->execute([$rltaken, $uname]);

$sh = $db2->prepare("UPDATE dleave SET hstatus=?, tatime=? WHERE id=? ");
$sh->execute([$confirm, $dtime, $id]);



if($db2->commit()){

    $url = "https://script.google.com/macros/s/AKfycbx5mJa9dddnl1DSutImnF91Lq5_bXBhenK0MLfbVMRsMj1-inVJdsswjkfSQ_o4AfM/exec";
                $ch = curl_init($url);
                curl_setopt_array($ch, [
                   CURLOPT_RETURNTRANSFER => true,
                   CURLOPT_FOLLOWLOCATION => true,
                   CURLOPT_POSTFIELDS => http_build_query([
                      "recipient" => $email,
                      "subject"   => 'Leave Confirmmation'.'-'.$dtime,
                      "body"      => 'Hi '.$row3['sname'].', Salam and Greetings. As referred to your leave application at PMS-
    
    Please be informed that Your '.$rowl['tleave'].' from  '.$rowl['sdate'].' to '.$rowl['edate'].' is Approved.
    
    We request you to complete all your pending or important work if there is any so that the Hospital & Nursing College does not face any problems during your Leave.
    
    We much appreciate your thoughtfulness in advance.
    
    Best Regards,
    Human Resources Management,
    Powered By KPJ_IT_DHAKA'
                   ])
                ]);
                $result = curl_exec($ch);
                echo $result;
                header("Location:leaveviewtm");
                curl_close($ch);  }
            }

            catch ( Exception $e ) {
                $db2->rollBack();
              
                echo '<script language="javascript">';
                    echo 'alert("Something Went wrong !!"); ';
                    echo '</script>';
              }	
        }

else if($type=='lWPleave' and $approve!='Confirmed By TM'){

    try {
    $db2->beginTransaction();


    $sh = $db2->prepare("UPDATE staff3 SET lwl=? WHERE sid=? ");
$sh->execute([$lwpltaken, $uname]);

$sh = $db2->prepare("UPDATE dleave SET hstatus=?, tatime=? WHERE id=? ");
$sh->execute([$confirm, $dtime, $id]);


if($db2->commit()){

    $url = "https://script.google.com/macros/s/AKfycbx5mJa9dddnl1DSutImnF91Lq5_bXBhenK0MLfbVMRsMj1-inVJdsswjkfSQ_o4AfM/exec";
                $ch = curl_init($url);
                curl_setopt_array($ch, [
                   CURLOPT_RETURNTRANSFER => true,
                   CURLOPT_FOLLOWLOCATION => true,
                   CURLOPT_POSTFIELDS => http_build_query([
                      "recipient" => $email,
                      "subject"   => 'Leave Confirmmation'.'-'.$dtime,
                      "body"      => 'Hi '.$row3['sname'].', Salam and Greetings. As referred to your leave application at PMS-
    
    Please be informed that Your '.$rowl['tleave'].' from  '.$rowl['sdate'].' to '.$rowl['edate'].' is Approved.
    
    We request you to complete all your pending or important work if there is any so that the Hospital & Nursing College does not face any problems during your Leave.
    
    We much appreciate your thoughtfulness in advance.
    
    Best Regards,
    Human Resources Management,
    Powered By KPJ_IT_DHAKA'
                   ])
                ]);
                $result = curl_exec($ch);
                echo $result;
                header("Location:leaveviewtm");
                curl_close($ch);  }
      }


    }

/*else if($type=='mrleave'){
$query1 = "UPDATE staff3 set mrltaken='$mrltaken' where sid='$uname'"; 
$result1 = mysqli_query($con,$query1) or die ( mysqli_error());


$query = "UPDATE dleave set hstatus='Confirmed By TM',tatime='$dtime' where id='$id'"; 
$result = mysqli_query($con,$query) or die ( mysqli_error());



header("Location: $url"); }
*/

else if($type=='comleave' and $approve!='Confirmed By TM'){
    try {
    $db2->beginTransaction();


    $sh = $db2->prepare("UPDATE staff3 SET comltaken=? WHERE sid=? ");
$sh->execute([$comltaken, $uname]);

$sh = $db2->prepare("UPDATE dleave SET hstatus=?, tatime=? WHERE id=? ");
$sh->execute([$confirm, $dtime, $id]);


    

if($db2->commit()){

    $url = "https://script.google.com/macros/s/AKfycbx5mJa9dddnl1DSutImnF91Lq5_bXBhenK0MLfbVMRsMj1-inVJdsswjkfSQ_o4AfM/exec";
                $ch = curl_init($url);
                curl_setopt_array($ch, [
                   CURLOPT_RETURNTRANSFER => true,
                   CURLOPT_FOLLOWLOCATION => true,
                   CURLOPT_POSTFIELDS => http_build_query([
                      "recipient" => $email,
                      "subject"   => 'Leave Confirmmation'.'-'.$dtime,
                      "body"      => 'Hi '.$row3['sname'].', Salam and Greetings. As referred to your leave application at PMS-
    
    Please be informed that Your '.$rowl['tleave'].' from  '.$rowl['sdate'].' to '.$rowl['edate'].' is Approved.
    
    We request you to complete all your pending or important work if there is any so that the Hospital & Nursing College does not face any problems during your Leave.
    
    We much appreciate your thoughtfulness in advance.
    
    Best Regards,
    Human Resources Management,
    Powered By KPJ_IT_DHAKA'
                   ])
                ]);
                $result = curl_exec($ch);
                echo $result;
                header("Location:leaveviewtm");
                curl_close($ch);  }
      }
    }

else if($type=='inleave' and $approve!='Confirmed By TM'){
    try {
    $db2->beginTransaction();


    $sh = $db2->prepare("UPDATE staff3 SET intaken=? WHERE sid=? ");
$sh->execute([$intaken, $uname]);

$sh = $db2->prepare("UPDATE dleave SET hstatus=?, tatime=? WHERE id=? ");
$sh->execute([$confirm, $dtime, $id]);




if($db2->commit()){

    $url = "https://script.google.com/macros/s/AKfycbx5mJa9dddnl1DSutImnF91Lq5_bXBhenK0MLfbVMRsMj1-inVJdsswjkfSQ_o4AfM/exec";
                $ch = curl_init($url);
                curl_setopt_array($ch, [
                   CURLOPT_RETURNTRANSFER => true,
                   CURLOPT_FOLLOWLOCATION => true,
                   CURLOPT_POSTFIELDS => http_build_query([
                      "recipient" => $email,
                      "subject"   => 'Leave Confirmmation'.'-'.$dtime,
                      "body"      => 'Hi '.$row3['sname'].', Salam and Greetings. As referred to your leave application at PMS-
    
    Please be informed that Your '.$rowl['tleave'].' from  '.$rowl['sdate'].' to '.$rowl['edate'].' is Approved.
    
    We request you to complete all your pending or important work if there is any so that the Hospital & Nursing College does not face any problems during your Leave.
    
    We much appreciate your thoughtfulness in advance.
    
    Best Regards,
    Human Resources Management,
    Powered By KPJ_IT_DHAKA'
                   ])
                ]);
                $result = curl_exec($ch);
                echo $result;
                header("Location:leaveviewtm");
                curl_close($ch);  }
      }


    }
else if($type=='marleave' and $approve!='Confirmed By TM'){
    
    try {
    $db2->beginTransaction();


    $sh = $db2->prepare("UPDATE staff3 SET martaken=? WHERE sid=? ");
$sh->execute([$martaken, $uname]);

$sh = $db2->prepare("UPDATE dleave SET hstatus=?, tatime=? WHERE id=? ");
$sh->execute([$confirm, $dtime, $id]);

if($db2->commit()){

    $url = "https://script.google.com/macros/s/AKfycbx5mJa9dddnl1DSutImnF91Lq5_bXBhenK0MLfbVMRsMj1-inVJdsswjkfSQ_o4AfM/exec";
                $ch = curl_init($url);
                curl_setopt_array($ch, [
                   CURLOPT_RETURNTRANSFER => true,
                   CURLOPT_FOLLOWLOCATION => true,
                   CURLOPT_POSTFIELDS => http_build_query([
                      "recipient" => $email,
                      "subject"   => 'Leave Confirmmation'.'-'.$dtime,
                      "body"      => 'Hi '.$row3['sname'].', Salam and Greetings. As referred to your leave application at PMS-
    
    Please be informed that Your '.$rowl['tleave'].' from  '.$rowl['sdate'].' to '.$rowl['edate'].' is Approved.
    
    We request you to complete all your pending or important work if there is any so that the Hospital & Nursing College does not face any problems during your Leave.
    
    We much appreciate your thoughtfulness in advance.
    
    Best Regards,
    Human Resources Management,
    Powered By KPJ_IT_DHAKA'
                   ])
                ]);
                $result = curl_exec($ch);
                echo $result;
                header("Location:leaveviewtm");
                curl_close($ch);  }
      }

    }

else if($type=='insleave' and $approve!='Confirmed By TM'){

    try {
    $db2->beginTransaction();


    $sh = $db2->prepare("UPDATE staff3 SET insleave=? WHERE sid=? ");
$sh->execute([$insleave, $uname]);

$sh = $db2->prepare("UPDATE dleave SET hstatus=?, tatime=? WHERE id=? ");
$sh->execute([$confirm, $dtime, $id]);


if($db2->commit()){

    $url = "https://script.google.com/macros/s/AKfycbx5mJa9dddnl1DSutImnF91Lq5_bXBhenK0MLfbVMRsMj1-inVJdsswjkfSQ_o4AfM/exec";
                $ch = curl_init($url);
                curl_setopt_array($ch, [
                   CURLOPT_RETURNTRANSFER => true,
                   CURLOPT_FOLLOWLOCATION => true,
                   CURLOPT_POSTFIELDS => http_build_query([
                      "recipient" => $email,
                      "subject"   => 'Leave Confirmmation'.'-'.$dtime,
                      "body"      => 'Hi '.$row3['sname'].', Salam and Greetings. As referred to your leave application at PMS-
    
    Please be informed that Your '.$rowl['tleave'].' from  '.$rowl['sdate'].' to '.$rowl['edate'].' is Approved.
    
    We request you to complete all your pending or important work if there is any so that the Hospital & Nursing College does not face any problems during your Leave.
    
    We much appreciate your thoughtfulness in advance.
    
    Best Regards,
    Human Resources Management,
    Powered By KPJ_IT_DHAKA'
                   ])
                ]);
                $result = curl_exec($ch);
                echo $result;
                header("Location:leaveviewtm");
                curl_close($ch);  }
      }

    }


?>