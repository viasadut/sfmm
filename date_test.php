<?php
$date = '2021-09-01';
$end = '2021-09-' . date('t', strtotime($date)); //get end date of month
?>
<table>
    <tr>
    <?php while(strtotime($date) <= strtotime($end)) {
        $day_num = date('d', strtotime($date));
        $day_name = date('D', strtotime($date));
        $date = date("Y-m-d", strtotime("+1 day", strtotime($date)));
        echo "<td>$day_num <br/> $day_name</td>";
    }
    ?>
    </tr>
</table>