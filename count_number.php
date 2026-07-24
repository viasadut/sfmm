<?php

function count_digit($number) {
return strlen((string) $number);
}
$num = "012";
$number_of_digits = count_digit($num); //this is call :)
echo $number_of_digits;
?>