<?php 
    // Include Connection File 
    //require('dbconfig1.php');
    require('db1.php');
    $position = $_POST['position'];

    $i=1;

    // Update Orting Data 
    foreach($position as $k=>$v){

        
		
		$sql = "Update alltest SET page_order=".$i." WHERE id=".$v;

$result = mysqli_query($con,$sql);
		
		//$sql = "Update pmedi SET page_order=".$i." WHERE id=".$v;

        //$mysqli->query($sql);

        $i++;
    }
?>