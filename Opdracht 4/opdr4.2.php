<?php
// Get the current hour
$currentHour = date("H");

// Determine the time of day using a switch statement
switch (true) {
    case ($currentHour < 6):
        echo "Goedenacht!";
        break;
    case ($currentHour < 12):
        echo "Goedemorgen!";
        break;
    case ($currentHour < 18):
        echo "Goedemiddag!";
        break;
    default:
        echo "Goedenavond!";
}
?>
