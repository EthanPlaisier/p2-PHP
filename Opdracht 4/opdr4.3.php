<?php
// Define two variables
$number1 = 15;
$number2 = 30;

// Determine the largest number and perform calculations
if ($number1 > $number2) {
    $result = ($number1 * 2) + $number2;
} else {
    $result = ($number2 * 2) + $number1;
}

echo "Het resultaat is: " . $result;
?>
