<?php
// Define variables
$age = 18; // Example age
$hasVotingCard = true; // Example voting eligibility

// Check for scooter license
if ($age >= 16) {
    echo "Je mag een scooter rijbewijs halen.";
} else {
    echo "Je bent te jong voor een scooter rijbewijs.";
}

// Check for voting eligibility
if ($age >= 18 && $hasVotingCard) {
    echo "Je mag stemmen.";
} else {
    echo "Je mag niet stemmen.";
}
?>
