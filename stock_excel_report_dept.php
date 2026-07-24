<?php
    $conn = new mysqli('localhost', 'root', 'Godiloveu16');  
    mysqli_select_db($conn, 'sfmmkpjnew');  
    
	$start=$_REQUEST['location'];
	
	$sql = "Select code,g_name,b_name,add_qty,batch_no,exdate,location,u_price from medi_stock where location='$start' and status NOT IN ('Pending','Rejected') and add_qty>'0' ORDER BY g_name asc";
    $setRec = mysqli_query($conn, $sql);
    $columnHeader = '';
    $columnHeader = "Code " . "\t" . "Generic Name" . "\t". "Brand Name" . "\t". "Qty" . "\t". "Batch" . "\t". "Expire Date" . "\t". "Location" . "\t". "Unit Price" . "\t";
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
 