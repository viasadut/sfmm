<?php
include 'bar3.php';
echo '<center><div style="height: 30%; width: 50%;">';
echo '<p>'.bar128(stripcslashes($_POST['generate'])).'</p>';
echo '</div></center>';
?>