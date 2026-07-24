<?php
    require('db1.php');
    if(isset($_POST["action"])){
        $output = '';
        if($_POST["action"] == "infu"){
            $query = "SELECT * FROM privilege WHERE pname = '".$_POST["query"]."' GROUP BY pname";
            $result = mysqli_query($con, $query);
            $output .= '';
            while($row = mysqli_fetch_array($result)){
                $output .= $row["sformat"];
				$output .= $row["charge"];
            }
        }
        echo $output;
    }
?>
