<?php
    $conn = new mysqli('localhost', 'root', 'Godiloveu16');  
    mysqli_select_db($conn, 'sfmmkpjnew');  
    
	$start=$_REQUEST['date'];
	$end=$_REQUEST['date1'];
    $full=$_REQUEST['full'];
	
	$sql = "Select dname,pname,pmrn,age,gender,type,rdate from endoreport where rdate BETWEEN '$start' and '$end' and status='SEEN' and '$full' in (`dname`) order by id asc";
    $setRec = mysqli_query($conn, $sql);
    $columnHeader = '';
    $columnHeader = "Surgeon Name" . "\t" . "Patient Name" . "\t". "MRN" . "\t". "Age" . "\t". "Gender" . "\t". "Type" . "\t". "Date" . "\t";
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
 