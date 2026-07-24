<?php
    $conn = new mysqli('localhost', 'root', 'Godiloveu16');  
    mysqli_select_db($conn, 'sfmmkpjnew');  
    
	$start=$_REQUEST['date'];
	$end=$_REQUEST['date1'];
    $full=$_REQUEST['full'];
	
	$sql = "Select dname,dname1,dname2,dname3,dname4,pname,pmrn,tanes,proce,typeo,date5 from ot where date5 BETWEEN '$start' and '$end' and status='Received' and '$full' in (`dname`,`dname1`,`dname2`,`dname3`,`dname4`) order by id asc";
    $setRec = mysqli_query($conn, $sql);
    $columnHeader = '';
    $columnHeader = "Surgeon Name" . "\t" . "2nd Surgeon Name" . "\t". "3rd Surgeon Name" . "\t". "4th Surgeon Name" . "\t". "5th Surgeon Name" . "\t". "Patient Name" . "\t". "MRN" . "\t". "Anaesthesia" . "\t".  "Procedure" . "\t".  "Type" . "\t".  "Date" . "\t";
    $setData = '';
    while ($rec = mysqli_fetch_row($setRec)) {
        $rowData = '';
        foreach ($rec as $value) {
            $value = '"' . $value . '"' . "\t";
            $rowData .= $value;
        }
        $setData .= trim($rowData) . "\n";
    }

    header("Content-type: application/octet-stream");
    header("Content-Disposition: attachment; filename=User_Detail.xls");
    header("Pragma: no-cache");
    header("Expires: 0");
    echo ucwords($columnHeader) . "\n" . $setData . "\n";  
 ?> 
 