<?php
    $conn = new mysqli('localhost', 'root', 'Godiloveu16');  
    mysqli_select_db($conn, 'sfmmkpjnew');  
    
	$start=$_REQUEST['date'];
	$end=$_REQUEST['date1'];
	$dname=$_REQUEST['dname'];
	
	$sql = "Select pname,pmrn,r1date,pphone,dname,dreffer,type,code,price from radreport where rdate BETWEEN '$start' and '$end' and dname='$dname' order by id asc";
    $setRec = mysqli_query($conn, $sql);
    $columnHeader = '';
    $columnHeader = "Patient Name" . "\t" . "PMRN" . "\t". "Date" . "\t". "Phone No" . "\t". "Report Done By" . "\t". "Referred By" . "\t". "Investigation" ."\t". "Code" . "\t". "\t". "Price" . "\t";
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
 