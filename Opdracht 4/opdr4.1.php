<?php
// Get the current hour
$currentHour = date("H");

// Determine the time of day
if ($currentHour < 6) {
    echo "Goedenacht!";
} elseif ($currentHour < 12) {
    echo "Goedemorgen!";
} elseif ($currentHour < 18) {
    echo "Goedemiddag!";
} else {
    echo "Goedenavond!";
}
?>
