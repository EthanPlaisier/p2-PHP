<?php
define("PI", 3.14);

function berekenCirkel($straal) {
    $omtrek = 2 * PI * $straal;
    $oppervlakte = PI * pow($straal, 2);
    
    echo "Omtrek van de cirkel: ".$omtrek."<br>";
    echo "Oppervlakte van de cirkel: ".$oppervlakte;
}

// Gebruik van de functie met straal 5
berekenCirkel(5);
?>
