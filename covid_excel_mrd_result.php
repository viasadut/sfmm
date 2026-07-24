<?php
    $conn = new mysqli('localhost', 'root', 'Godiloveu16');  
    mysqli_select_db($conn, 'sfmmkpjnew');  
    
	$start=$_REQUEST['date'];
	$end=$_REQUEST['date1'];
	
	$sql = "Select sid,lid,name,ssent,phone,padd,ward,district,sam,tp,tresult from covidopd where rdate BETWEEN '$start' and '$end' and status='Collected' and sentto='SFMMKPJSH' and dconfirm!='' order by lid asc";
    $setRec = mysqli_query($conn, $sql);
    $columnHeader = '';
    $columnHeader = "SNO" . "\t" . "LAB ID" . "\t". "Name" . "\t". "Collection Date" . "\t". "Phone" . "\t". "Address" . "\t". "Ward" . "\t". "District" . "\t". "Sample Type" . "\t". "Patient Type" . "\t". "Result" . "\t";
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
 