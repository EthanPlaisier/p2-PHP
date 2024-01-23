<?php

function BepaalGemiddelde($getallenArray) {
    // Controleer eerst of de array leeg is om fouten te voorkomen
    if (empty($getallenArray)) {
        return 0; // Als de array leeg is, retourneer 0 als gemiddelde
    }

    $totaal = 0;
    $aantalGetallen = count($getallenArray);

    // Loop door de array en tel elk getal op
    foreach ($getallenArray as $getal) {
        $totaal += $getal;
    }

    // Bereken het gemiddelde
    $gemiddelde = $totaal / $aantalGetallen;

    return $gemiddelde;
}

// Voorbeeldgebruik:
$getallen = array(10, 20, 30, 40, 50);
$resultaat = BepaalGemiddelde($getallen);

echo "Het gemiddelde van de getallen is: " . $resultaat;
?>