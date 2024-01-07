<?php
// Simulate input data
$currentHour = date("H");
$temperature = 22;
$humidity = 80;

// Check conditions for the air conditioner
if ($currentHour >= 17 || ($temperature < 20 && $humidity < 85)) {
    echo "De airco staat uit.";
} else {
    echo "De airco staat aan.";
}
?>
