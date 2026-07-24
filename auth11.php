<?php
require('db1.php');

// define database related variables
$database = 'sfmmkpjnew';
$host = 'localhost';
$user = 'root';
$pass = '';

// try to conncet to database
$dbh = new PDO("mysql:dbname={$database};host={$host}", $user, $pass);

if (!$dbh) {

   echo "unable to connect to database";
}




session_start();
$username4 = $_POST['username'];
$user_session_id = session_id();
$username = "";
$password = "";

if (isset($_POST['username'])) {
   $username = $_POST['username'];
}
if (isset($_POST['password'])) {
   $password = $_POST['password'];
}


$q = 'SELECT * FROM user WHERE uname=:username AND upass=:password';

$query = $dbh->prepare($q);

$query->execute(array(':username' => $username, ':password' => $password));






$qq = "SELECT * FROM user WHERE user_session_id='$user_session_id'";
$resultq = mysqli_query($con, $qq) or die(mysqli_error());
$rowq = mysqli_fetch_assoc($resultq);


$tr1 = $rowq['user_session_id'];
$tr2 = $rowq['uname'];



if ($query->rowCount() == 0) {
   header('Location: login2.php?err=1');
} else if ($tr1 == $user_session_id and $tr2 != $username4) {
   /*echo '<script language="javascript">';
   echo 'alert("One user already logged in using same browser"); ';
   echo '</script>';*/
   header('Location: login_error.php?err=1');
} else {




   $row = $query->fetch(PDO::FETCH_ASSOC);

   //session_regenerate_id();
   $tr = $row['user_session_id'];
   $_SESSION['sess_user_id'] = $row['id'];
   $_SESSION['user_id'] = $row['id'];
   $_SESSION['sess_username'] = $row['uname'];

   $_SESSION['sess_userrole'] = $row['utype'];
   $_SESSION['sess_fullname'] = $row['fullname'];



   echo $_SESSION['sess_userrole'];


   if ($tr1 == '') {


      $query3 = "update user set user_session_id='$user_session_id' where uname='$username4'";

      $result3 = mysqli_query($con, $query3) or die(mysqli_error());
   } else if ($tr1 == '$user_session_id') {

      $query33 = "update user set user_session_id='' where user_session_id='$user_session_id'";

      $result33 = mysqli_query($con, $query33) or die(mysqli_error());

      $query3 = "update user set user_session_id='$user_session_id' where uname='$username4'";

      $result3 = mysqli_query($con, $query3) or die(mysqli_error());
   } else if ($tr1 != '$user_session_id') {

      $query3 = "update user set user_session_id='$user_session_id' where uname='$username4'";

      $result3 = mysqli_query($con, $query3) or die(mysqli_error());
   }



   $_SESSION['user_session_id'] = $user_session_id;

   session_write_close();

   if ($_SESSION['sess_userrole'] == "admin") {
      header('Location: view');
   } else if ($_SESSION['sess_userrole'] == "doctor") {

      header('Location: viewnew11');
   } else if ($_SESSION['sess_userrole'] == "user") {
      header('Location: view1');
   } else if ($_SESSION['sess_userrole'] == "nurse") {
      header('Location: viewnewnurse');
   } else if ($_SESSION['sess_userrole'] == "mo") {
      header('Location: view1');
   } else if ($_SESSION['sess_userrole'] == "pharmacy") {
      header('Location: phar_home');
   } else if ($_SESSION['sess_userrole'] == "clinical") {
      header('Location: cviewsp1');
   } else if ($_SESSION['sess_userrole'] == "clinicalgp") {
      header('Location: cviewsp1gp');
   } else if ($_SESSION['sess_userrole'] == "lab") {
      header('Location: teslab');
   } else if ($_SESSION['sess_userrole'] == "rad") {
      header('Location: tesrad');
   } else if ($_SESSION['sess_userrole'] == "rad1") {
      header('Location: radview2');
   } else if ($_SESSION['sess_userrole'] == "call") {
      header('Location: ccview');
   } else if ($_SESSION['sess_userrole'] == "bill") {
      header('Location: bcview');
   } else if ($_SESSION['sess_userrole'] == "emergency") {
      header('Location: viewnewemergency');
   } else if ($_SESSION['sess_userrole'] == "mofficer") {
      header('Location: viewnewmo');
   } else if ($_SESSION['sess_userrole'] == "endo") {
      header('Location: endonursehome');
   } else if ($_SESSION['sess_userrole'] == "histo") {
      header('Location: histohome');
   } else if ($_SESSION['sess_userrole'] == "ot") {
      header('Location: otdash1');
   } else if ($_SESSION['sess_userrole'] == "billin") {
      header('Location: edischarge3');
   } else if ($_SESSION['sess_userrole'] == "clinicalmedi") {
      header('Location: cviewsp1medi');
   } else if ($_SESSION['sess_userrole'] == "clinicalcardio") {
      header('Location: cviewsp1cardio');
   } else if ($_SESSION['sess_userrole'] == "clinicalet") {
      header('Location: cviewsp1et');
   } else if ($_SESSION['sess_userrole'] == "imo") {
      header('Location: viewnewimo');
   } else if ($_SESSION['sess_userrole'] == "cath") {
      header('Location: tescath');
   } else if ($_SESSION['sess_userrole'] == "mng") {
      header('Location: homemng');
   } else if ($_SESSION['sess_userrole'] == "bbank") {
      header('Location: bbupdate2');
   } else if ($_SESSION['sess_userrole'] == "physio") {
      header('Location: homephysio');
   } else if ($_SESSION['sess_userrole'] == "diet") {
      header('Location: viewnew11diet');
   } else if ($_SESSION['sess_userrole'] == "cafe") {
      header('Location: inplabdietcafe');
   } else if ($_SESSION['sess_userrole'] == "mrd") {
      header('Location: homemrd');
   } else if ($_SESSION['sess_userrole'] == "staff") {
      header('Location: homestaff');
   } else if ($_SESSION['sess_userrole'] == "opdpro") {
      header('Location: opddash');
   } else if ($_SESSION['sess_userrole'] == "qc") {
      header('Location: qcview');
   } else if ($_SESSION['sess_userrole'] == "bio") {
      header('Location: biohome');
   } else if ($_SESSION['sess_userrole'] == "store") {
      header('Location: inventorystore');
   } else if ($_SESSION['sess_userrole'] == "admin1") {
      header('Location: leavemngprint');
   } else if ($_SESSION['sess_userrole'] == "vc") {
      header('Location: vc001');
   } else if ($_SESSION['sess_userrole'] == "dia") {
      header('Location: dialysisapp');
   } else if ($_SESSION['sess_userrole'] == "chemo") {
      header('Location: chemohome');
   } else if ($_SESSION['sess_userrole'] == "dialysis") {
      header('Location: dialysishome');
   } else if ($_SESSION['sess_userrole'] == "adminmng") {
      header('Location: homeadmin');
   } else if ($_SESSION['sess_userrole'] == "tele") {
      header('Location: telehome');
   } else if ($_SESSION['sess_userrole'] == "ddf") {
      header('Location: homemngtest');
   } else if ($_SESSION['sess_userrole'] == "staff1") {
      header('Location: homestaff1');
   } else if ($_SESSION['sess_userrole'] == "covid") {
      header('Location: covidhomeg');
   } else if ($_SESSION['sess_userrole'] == "covid1") {
      header('Location: allsamplelistcovidnew');
   } else if ($_SESSION['sess_userrole'] == "corona") {
      header('Location: staffdetailsmng1c');
   } else if ($_SESSION['sess_userrole'] == "rd") {
      header('Location: rdhome');
   } else if ($_SESSION['sess_userrole'] == "moopd") {
      header('Location: viewnew11');
   } else if ($_SESSION['sess_userrole'] == "ddf1") {
      header('Location: ddhometrust');
   } else if ($_SESSION['sess_userrole'] == "ev") {
      header('Location: event_view');
   } else if ($_SESSION['sess_userrole'] == "evv") {
      header('Location: even_view_ev');
   } else if ($_SESSION['sess_userrole'] == "bed") {
      header('Location: bed_mng_test5');
   } else if ($_SESSION['sess_userrole'] == "attn") {
      header('Location: tcmeview11tm');
   } else if ($_SESSION['sess_userrole'] == "outdoc") {
      header('Location: outside_doc');
   } else if ($_SESSION['sess_userrole'] == "techbio") {
      header('Location: project_bio/projectbio/add_sample_stroke');
   } else if ($_SESSION['sess_userrole'] == "oic") {
      header('Location: homeoic');
   } else if ($_SESSION['sess_userrole'] == "pharmacy02") {
      header('Location: phar_home_02');
   } else if ($_SESSION['sess_userrole'] == "gpopd") {
      header('Location: home_gpopd');
   } else if ($_SESSION['sess_userrole'] == "msuite") {
      header('Location: msuite_dash');
   } else {
      header('Location: login2');
   }
}
