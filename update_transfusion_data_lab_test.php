<?php 
    session_start();
    $role = $_SESSION['sess_userrole'];
   // if(!isset($_SESSION['sess_username']) || $role!="doctor")
   //{
   // header('Location: login2?err=2');
    //}
	require('db1.php');

	$user=$_SESSION["sess_username"];
	$dtime= date('d/m/Y H:i:s');
$date1 = date('m/d/Y');	
$date2 = date('Y-m-d');	
$etime= date('Y-m-d H:i:s');	

?>

  <?php  
 $connect = mysqli_connect("localhost", "root", "Godiloveu16", "sfmmkpjnew");  
 if(!empty($_POST))  
 {  
      $output = '';  
      $message = '';  
      $vserum = mysqli_real_escape_string($connect, $_POST["vserum"]);  
	  $globulin_pre = mysqli_real_escape_string($connect, $_POST["globulin_pre"]);  
	  $globulin_post = mysqli_real_escape_string($connect, $_POST["globulin_post"]);  
	  $bac_con = mysqli_real_escape_string($connect, $_POST["bac_con"]);  
	  
      
	  $hemolysis = mysqli_real_escape_string($connect, $_POST["hemolysis"]);
      $antibody = mysqli_real_escape_string($connect, $_POST["antibody"]);
	  $medi = mysqli_real_escape_string($connect, $_POST["medi"]);
	  $anti_serum_re_pre = mysqli_real_escape_string($connect, $_POST["anti_serum_re_pre"]);
	  $anti_serum_kc_pre = mysqli_real_escape_string($connect, $_POST["anti_serum_kc_pre"]);
	  $anti_serum_bg_pre = mysqli_real_escape_string($connect, $_POST["anti_serum_bg_pre"]);
	  $anti_serum_re_post = mysqli_real_escape_string($connect, $_POST["anti_serum_re_post"]);




     $anti_serum_kc_post = mysqli_real_escape_string($connect, $_POST["anti_serum_kc_post"]);
     $anti_serum_bg_post = mysqli_real_escape_string($connect, $_POST["anti_serum_bg_post"]);
     $anti_serum_re_post_d = mysqli_real_escape_string($connect, $_POST["anti_serum_re_post_d"]);
     $anti_serum_kc_post_d = mysqli_real_escape_string($connect, $_POST["anti_serum_kc_post_d"]);
     $anti_serum_bg_post_d = mysqli_real_escape_string($connect, $_POST["anti_serum_bg_post_d"]);
     $cross_pre_room = mysqli_real_escape_string($connect, $_POST["cross_pre_room"]);
     $cross_pre_37 = mysqli_real_escape_string($connect, $_POST["cross_pre_37"]);
     $cross_pre_ahg = mysqli_real_escape_string($connect, $_POST["cross_pre_ahg"]);
     $cross_pre_com = mysqli_real_escape_string($connect, $_POST["cross_pre_com"]);
     $cross_post_room = mysqli_real_escape_string($connect, $_POST["cross_post_room"]);
     $cross_post_37 = mysqli_real_escape_string($connect, $_POST["cross_post_37"]);
     $cross_post_ahg = mysqli_real_escape_string($connect, $_POST["cross_post_ahg"]);
     $cross_post_com = mysqli_real_escape_string($connect, $_POST["cross_post_com"]);
     $remarks = mysqli_real_escape_string($connect, $_POST["remarks"]);





     $anti_serum_re_pre_a = mysqli_real_escape_string($connect, $_POST["anti_serum_re_pre_a"]);
     $anti_serum_re_pre_b = mysqli_real_escape_string($connect, $_POST["anti_serum_re_pre_b"]);
     $anti_serum_re_pre_ab = mysqli_real_escape_string($connect, $_POST["anti_serum_re_pre_ab"]);
     $anti_serum_re_pre_d = mysqli_real_escape_string($connect, $_POST["anti_serum_re_pre_d"]);
     $anti_serum_re_pre_k_a = mysqli_real_escape_string($connect, $_POST["anti_serum_re_pre_k_a"]);
     $anti_serum_re_pre_k_b = mysqli_real_escape_string($connect, $_POST["anti_serum_re_pre_k_b"]);
     $anti_serum_re_pre_bg = mysqli_real_escape_string($connect, $_POST["anti_serum_re_pre_bg"]);
     $anti_serum_re_pre_rh = mysqli_real_escape_string($connect, $_POST["anti_serum_re_pre_rh"]);


     
     $anti_serum_re_po_a = mysqli_real_escape_string($connect, $_POST["anti_serum_re_po_a"]);
     $anti_serum_re_po_b = mysqli_real_escape_string($connect, $_POST["anti_serum_re_po_b"]);
     $anti_serum_re_po_ab = mysqli_real_escape_string($connect, $_POST["anti_serum_re_po_ab"]);
     $anti_serum_re_po_d = mysqli_real_escape_string($connect, $_POST["anti_serum_re_po_d"]);
     $anti_serum_re_po_k_a = mysqli_real_escape_string($connect, $_POST["anti_serum_re_po_k_a"]);
     $anti_serum_re_po_k_b = mysqli_real_escape_string($connect, $_POST["anti_serum_re_po_k_b"]);
     $anti_serum_re_po_bg = mysqli_real_escape_string($connect, $_POST["anti_serum_re_po_bg"]);
     $anti_serum_re_po_rh = mysqli_real_escape_string($connect, $_POST["anti_serum_re_po_rh"]);
     
	
     

     $anti_serum_do_a = mysqli_real_escape_string($connect, $_POST["anti_serum_do_a"]);
     $anti_serum_do_b = mysqli_real_escape_string($connect, $_POST["anti_serum_do_b"]);
     $anti_serum_do_ab = mysqli_real_escape_string($connect, $_POST["anti_serum_do_ab"]);
     $anti_serum_do_d = mysqli_real_escape_string($connect, $_POST["anti_serum_do_d"]);
     $anti_serum_do_k_a = mysqli_real_escape_string($connect, $_POST["anti_serum_do_k_a"]);
     $anti_serum_do_k_b = mysqli_real_escape_string($connect, $_POST["anti_serum_do_k_b"]);
     $anti_serum_do_bg = mysqli_real_escape_string($connect, $_POST["anti_serum_do_bg"]);
     $anti_serum_do_rh = mysqli_real_escape_string($connect, $_POST["anti_serum_do_rh"]);
     
	  //$pbp1 = implode(",",$_POST["pbp1"]);
	//  	  $pbp2 = mysqli_real_escape_string($connect, implode (", ", $_POST["pbp1"]));
//		  $strh = ;
		$adate1 = date('m/d/Y', strtotime($_POST["adate"]));  
		$adate2 = date('d/m/Y', strtotime($_POST["adate"]));  
		  
//$pbp1= implode(",",$pbp2);
	 //$temp = mysqli_real_escape_string($connect, $_POST["temp"]);	  
	
      //$user = mysqli_real_escape_string($connect, "$user");  
      //$age = mysqli_real_escape_string($connect, $_POST["age"]);  


	  $id = mysqli_real_escape_string($connect, $_POST["employee_id3"]);
	  $db = mysqli_connect('localhost','root','Godiloveu16');
mysqli_select_db($db,'sfmmkpjnew');
$query4 = mysqli_query($db,"select * from iblood where id='$id'");
$data = mysqli_fetch_assoc($query4);
      if($_POST["employee_id4"] != '')  {


		     
      
          $ins_query="insert into lab_transfusion_reporting (`pmrn`,`eid`,`bid`,
          `anti_serum_re_pre_a`,
          `anti_serum_re_pre_b`,
          `anti_serum_re_pre_ab`,
          `anti_serum_re_pre_d`,
          `anti_serum_re_pre_k_a`,
          `anti_serum_re_pre_k_b`,
          `anti_serum_re_pre_bg`,
          `anti_serum_re_pre_rh`,
          `anti_serum_re_po_a`,
          `anti_serum_re_po_b`,
          `anti_serum_re_po_ab`,
          `anti_serum_re_po_d`,
          `anti_serum_re_po_k_a`,
          `anti_serum_re_po_k_b`,
          `anti_serum_re_po_bg`,
          `anti_serum_re_po_rh`,
          `anti_serum_do_a`,
          `anti_serum_do_b`,
          `anti_serum_do_ab`,
         `anti_serum_do_d`,
          `anti_serum_do_k_a`,
          `anti_serum_do_k_b`,
          `anti_serum_do_bg`,
          `anti_serum_do_rh`
          ) values
           ( '$pmrn','$eid','".$_POST["employee_id4"]."',
           '$anti_serum_re_pre_a',
           '$anti_serum_re_pre_b',
           '$anti_serum_re_pre_ab',
           '$anti_serum_re_pre_d',
           '$anti_serum_re_pre_k_a',
           '$anti_serum_re_pre_k_b',
           '$anti_serum_re_pre_bg',
           '$anti_serum_re_pre_rh',

           '$anti_serum_re_po_a',
           '$anti_serum_re_po_b',
           '$anti_serum_re_po_ab',
           '$anti_serum_re_po_d',
           '$anti_serum_re_po_k_a',
           '$anti_serum_re_po_k_b',
           '$anti_serum_re_po_bg',
           '$anti_serum_re_po_rh',

           
           '$anti_serum_do_a',
           '$anti_serum_do_b',
           '$anti_serum_do_ab',
           '$anti_serum_do_d',
           '$anti_serum_do_k_a',
           '$anti_serum_do_k_b',
           '$anti_serum_do_bg',
           '$anti_serum_do_rh'
           )";
          mysqli_query($con,$ins_query) or die(mysql_error());

          
          		   
		   $query1 = "update iblood set 
         
         vserum='$vserum',
         globulin_pre='$globulin_pre',
         globulin_post='$globulin_post',
         bac_con='$bac_con',
         hemolysis='$hemolysis',
         antibody='$antibody',
         medi='$medi',
         anti_serum_re_pre='$anti_serum_re_pre',
         anti_serum_kc_pre='$anti_serum_kc_pre',
         anti_serum_bg_pre='$anti_serum_bg_pre',
         anti_serum_re_post='$anti_serum_re_post',
         anti_serum_kc_post='$anti_serum_kc_post',
         anti_serum_bg_post='$anti_serum_bg_post',
         anti_serum_re_post_d='$anti_serum_re_post_d',
         anti_serum_kc_post_d='$anti_serum_kc_post_d',
         anti_serum_bg_post_d='$anti_serum_bg_post_d',
         cross_pre_room='$cross_pre_room',
         cross_pre_37='$cross_pre_37',
         cross_pre_ahg='$cross_pre_ahg',
         cross_pre_com='$cross_pre_com',
         cross_post_room='$cross_post_room',
         cross_post_37='$cross_post_37',
         cross_post_ahg='$cross_post_ahg',
         cross_post_com='$cross_post_com',
         remarks='$remarks'   
         
         WHERE id = '".$_POST["employee_id4"]."'";  
		   mysqli_query($connect,$query1) or die(mysql_error());
           $message = 'Data Updated';  
		   
		  
        

      }
 }
 ?>
 