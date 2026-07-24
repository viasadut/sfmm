<?php
require('db1.php');
//db connection 
define ('DB_USER', 'root');
define ('DB_PASSWORD','Godiloveu16');
define ('DB_HOST','localhost');
define ('DB_NAME','sfmmkpjnew');
 //db connection check
$db=mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME) OR die
('Could not connect to MySQL :'.mysqli_connect_error());
$adate1new='0000-00-00 00:00:00';
//$adm_date=date('Y-m-d');
     //patient & bed list
     $count=1;
     foreach(mysqli_query($db,"SELECT * FROM inpatient WHERE disstatus=''") AS $bed_val){
     //variabel
     $bed_id=$bed_val['id'];
     $bed_eid=$bed_val['eid'];
     $bed_dname=$bed_val['dname'];
     echo $count;
     echo "<br />";
     echo $bed_pmrn=$bed_val['pmrn'];
     echo "<br />";
     $bed_pname=$bed_val['pname'];
     //echo "<br />";
     //$bed_type=$bed_val['type'];
     //$bed_no=$bed_val['bno'];
     //$adate=date('d/m/Y H:i:s');
     $adate=$bed_val['adate'];
     $adate1=date('m/d/Y');
    echo $bed_ats=date('Y-m-d H:i:s', strtotime($bed_val['adate']));
    echo "<br />";
     $bed_ate=date('Y-m-d H:i:s');
     $adm_date=$bed_val['anew'];
     $current_date=date('Y-m-d');

     $queryc = "SELECT  MAX(b_charge)FROM newbed where pmrn='$bed_pmrn' and eid='$bed_eid' and status_new!='2'"; 
     $resultc = mysqli_query($con, $queryc) or die(mysqli_error());
     $rowc = mysqli_fetch_array($resultc);


     $querycv = "SELECT * FROM newbed_new where pmrn='$bed_pmrn' and eid='$bed_eid' order by id desc limit 1"; 
     $resultcv = mysqli_query($con, $querycv) or die(mysqli_error());
     $rowcv = mysqli_fetch_array($resultcv);
    
     $bed_ats2=$rowcv['adatenew'];


echo $bed_c=$rowc['MAX(b_charge)'];
echo "<br />";

$queryc5 = "SELECT * FROM newbed where pmrn='$bed_pmrn' and eid='$bed_eid' and status_new!='2' and b_charge='$bed_c'"; 
$resultc5 = mysqli_query($con, $queryc5) or die(mysqli_error());
$rowc5 = mysqli_fetch_array($resultc5);

$bed_type=$rowc5['type'];
     $bed_no=$rowc5['bno'];
     //$pmrn=$bed_val['pmrn'];
     //Calculate total stay time in hours also total charge
     $admit_time = strtotime($bed_ats);
     $end_time = strtotime($bed_ate);
     $timediff = $end_time - $admit_time ;
     $timediff2 = $end_time - $admit_time ;
     $jj=round($timediff/3600);


     $admit_time2 = strtotime($bed_ats2);
     $end_time2 = strtotime($bed_ate);
     $timediff2 = $end_time2 - $admit_time2 ;
     $timediff22 = $end_time2 - $admit_time2 ;
     $jj2=round($timediff2/3600);


     $b_charge=$bed_c / 24;

     $half_bed_charge=$bed_c/2;
     //$final_total_charge= round($timediff/(60*60) * $b_charge);    
     //$final_total_stay_hours= round($timediff/(60*60),2);

     //echo "<b>MRN:</b>".$count.') '.$bed_pmrn." <b>Name:</b>".$bed_pname." <b>Bed Type:</b>".$bed_type." <b>Bed NO:</b>".$bed_no." <b>Start Time:</b>".$bed_ats." <b>End Time:</b>".$bed_ate." <b>Bed Charge:</b>".$bed_c." <b>Total Time:</b>".$final_total_stay_hours." <b>Total Charge:</b>".$final_total_charge."<br>";

mysqli_query($db,"UPDATE newbed SET status_new='2' WHERE pmrn='$bed_pmrn' and eid='$bed_eid' and status_new='0'");

  if($adm_date==$current_date and $jj<=6){
  mysqli_query($db,"INSERT INTO newbed_new (dname,pname,pmrn,adate,type,bno,eid,adate1,adatenew,tby,b_charge,charge) VALUES 
  ('$bed_dname','$bed_pname','$bed_pmrn','$adate','$bed_type','$bed_no','$bed_eid','$adate1','$bed_ate','Cron','$bed_c','$half_bed_charge')");
  }

  else if($adm_date==$current_date and $jj>6){
    mysqli_query($db,"INSERT INTO newbed_new (dname,pname,pmrn,adate,type,bno,eid,adate1,adatenew,tby,b_charge,charge) VALUES 
    ('$bed_dname','$bed_pname','$bed_pmrn','$adate','$bed_type','$bed_no','$bed_eid','$adate1','$bed_ate','Cron','$bed_c','$bed_c')");
    }

    else if($adm_date<$current_date and $jj2<=6){
        mysqli_query($db,"INSERT INTO newbed_new (dname,pname,pmrn,adate,type,bno,eid,adate1,adatenew,tby,b_charge,charge) VALUES 
        ('$bed_dname','$bed_pname','$bed_pmrn','$adate','$bed_type','$bed_no','$bed_eid','$adate1','$bed_ate','Cron','$bed_c','$half_bed_charge')");
        }
      

  else if($adm_date<$current_date and $jj2>6){
    mysqli_query($db,"INSERT INTO newbed_new (dname,pname,pmrn,adate,type,bno,eid,adate1,adatenew,tby,b_charge,charge) VALUES 
    ('$bed_dname','$bed_pname','$bed_pmrn','$adate','$bed_type','$bed_no','$bed_eid','$adate1','$bed_ate','Cron','$bed_c','$bed_c')");
    }

       $count++;
     }

     //End patient & bed list

?>