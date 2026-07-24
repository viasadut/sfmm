<?php
//db connection 
define ('DB_USER', 'root');
define ('DB_PASSWORD','Godiloveu16');
define ('DB_HOST','localhost');
define ('DB_NAME','sfmmkpjnew');
 //db connection check
$db=mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME) OR die
('Could not connect to MySQL :'.mysqli_connect_error());
$adate1new='0000-00-00 00:00:00';
     //patient & bed list
	 
	 
	 
     foreach(mysqli_query($db,"SELECT * FROM medi_stock WHERE add_qty>0 and status NOT IN ('Pending','Rejected')") AS $bed_val){
     //variabel
     $add_qty=$bed_val['add_qty'];
	    $id=$bed_val['id'];
     /*$bed_eid=$bed_val['eid'];
     $bed_dname=$bed_val['dname'];
     $bed_pmrn=$bed_val['pmrn'];
     $bed_pname=$bed_val['pname'];
     $bed_type=$bed_val['type'];
     $bed_no=$bed_val['bno'];
     $adate=date('d/m/Y H:i:s');
     $adate1=date('m/d/Y');
     $bed_ats=$bed_val['adatenew'];
     $bed_ate=date('Y-m-d H:i:s');
     $bed_c=$bed_val['b_charge'];
     //Calculate total stay time in hours also total charge
     $admit_time = strtotime($bed_ats);
     $end_time = strtotime($bed_ate);
     $timediff = $end_time - $admit_time ;
     $b_charge=$bed_c / 24;
     $final_total_charge= round($timediff/(60*60) * $b_charge);    
     $final_total_stay_hours= round($timediff/(60*60),2);*/
$count=1;
     echo "<b>MRN:</b>".$count.') '.$add_qty." <b>Name:</b><br>";

  mysqli_query($db,"UPDATE medi_stock SET given_qty='$add_qty' WHERE id='$id'");

 

       $count++;
     }
     //End patient & bed list

?>