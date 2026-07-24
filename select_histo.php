<?php
    require('db1.php');
    if(isset($_POST["action"])){
        $output = '';
        if($_POST["action"] == "infu"){
            $query = "SELECT * FROM radio1 WHERE iname = '".$_POST["query"]."' GROUP BY iname";
            $result = mysqli_query($con, $query);
            $output .= '';
            while($row = mysqli_fetch_array($result)){
                $output .= $row["ins_new"];
            }
        }
        echo $output;
    }
?>
