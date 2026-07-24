<?php
    $conn = new mysqli('localhost', 'root', 'Godiloveu16');  
    mysqli_select_db($conn, 'sfmmkpjnew');  
    
	$start=$_REQUEST['date'];
	$end=$_REQUEST['date1'];
    $full=$_REQUEST['full'];
	
	$sql = "select distinct(code),g_name,SUM(add_qty) from medi_stock where code!='0' and add_qty>0 and location='Pharmacy_opd'  group by code asc";
    $setRec = mysqli_query($conn, $sql);
    $columnHeader = '';
    $columnHeader = "Code " . "\t" . "Medicine Name" . "\t". "Qty" . "\t";
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
 