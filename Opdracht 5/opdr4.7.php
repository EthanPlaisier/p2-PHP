<?php
// Define variables
$spareMoney = 800; // Example amount of available money
$phoneCost = 1000;

// Calculate the difference
$shortage = $phoneCost - $spareMoney;

// Check affordability and give feedback
if ($spareMoney < $phoneCost) {
    if ($shortage > 250) {
        echo "Je hebt een tekort van €" . $shortage . ". Het is beter om een baantje te zoeken.";
    } else {
        echo "Je bent er bijna! Nog een tekort van €" . $shortage . ".";
    }
} else {
    $remaining = $spareMoney - $phoneCost;
    echo "Je kunt de telefoon kopen! Je hebt nog €" . $remaining . " over voor een hoesje.";
}
?>
