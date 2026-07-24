<?php
//db connection 
define ('DB_USER', 'root');
define ('DB_PASSWORD','Godiloveu16');
define ('DB_HOST','localhost');
define ('DB_NAME','sfmmkpjnew');
$count=1;
 //db connection check
$db=mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME) OR die
('Could not connect to MySQL :'.mysqli_connect_error());

     //patient & bed list
     foreach(mysqli_query($db,"SELECT b.id,b.eid,b.dname,b.pmrn,b.pname,b.type,b.bno,b.adatenew,b.adatenew1,bc.charge FROM 
     bed bc,newbed b,inpatient i WHERE b.bno=bc.bno AND b.pmrn=i.pmrn AND b.eid=i.eid AND i.discharge='' AND b.charge='0' AND b.tdays IS NULL AND b.b_charge IS NULL ORDER BY i.adate") AS $bed_val){
     //variabel
     $bed_id=$bed_val['id'];
     $bed_eid=$bed_val['eid'];
     $bed_dname=$bed_val['dname'];
     $bed_pmrn=$bed_val['pmrn'];
     $bed_pname=$bed_val['pname'];
     $bed_type=$bed_val['type'];
     $bed_no=$bed_val['bno'];
     $adate=date('d/m/Y H:i:s');
     $adate1=date('m/d/Y');
     $bed_ats=$bed_val['adatenew'];
     $bed_ate=date('Y-m-d H:i:s');
     $bed_c=$bed_val['charge'];
     //Calculate total stay time in hours also total charge
     $admit_time = strtotime($bed_ats);
     $end_time = strtotime($bed_ate);
     $timediff = $end_time - $admit_time ;
     $b_charge=$bed_c / 24;
     $final_total_charge= round($timediff/(60*60) * $b_charge);    
     $final_total_stay_hours= round($timediff/(60*60),2);

     //echo "<b>MRN:</b>".$count.') '.$bed_pmrn." <b>Name:</b>".$bed_pname." <b>Bed Type:</b>".$bed_type." <b>Bed NO:</b>".$bed_no." <b>Start Time:</b>".$bed_ats." <b>End Time:</b>".$bed_ate." <b>Bed Charge:</b>".$bed_c." <b>Total Time:</b>".$final_total_stay_hours." <b>Total Charge:</b>".$final_total_charge."<br>";
     echo "<b>MRN:</b>".$count.') '.$bed_pmrn.', '.$bed_c." <br>";
  //mysqli_query($db,"UPDATE newbed SET adatenew1='$bed_ate',charge= '$final_total_charge', tdays='$final_total_stay_hours', b_charge='$bed_c' WHERE id='$bed_id'");

  //mysqli_query($db,"INSERT INTO newbed (dname,pname,pmrn,adate,type,bno,eid,adate1,adatenew,tby) VALUES ('$bed_dname','$bed_pname','$bed_pmrn','$adate','$bed_type','$bed_no','$bed_eid','$adate1','$bed_ate','Cron')");


  $count++;
     }

    // 
     //End patient & bed list

?>