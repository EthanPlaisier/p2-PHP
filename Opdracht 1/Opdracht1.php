<?php
// acteur: Ethan
    date_default_timezone_set("Europe/Amsterdam");
    echo "<h1>PHP Opdracht 1</h1>";

// main
    $today = date("j F Y");
    echo "Het is vandaag: $today";
    echo "<br>";
    
    $dagvanjaar = date("z");
    echo "Vandaag is het de $dagvanjaar e van het jaar";
    echo "<br>";
    
    $dagvanweek = date("w");
    $dag = date("l");
    echo "$dag is het $dagvanweek e dag van het week";
    echo "<br>";
    
    $maand = date("F");
    $maanddagen = date("t");
    echo "De maand $maand heeft in totaal $maanddagen dagen";
    echo "<br>";
    
    $schrikkeljaar = date("L");
    $var1 = 1;
    $var2 = $schrikkeljaar;


    $jaar = date("Y");
    echo "Het jaar $jaar is $schrikkeljaar";
    if($var2 < $var1) {
        echo " niet een schrikkeljaar";
    } else {
        echo " wel een schrikkeljaar";
    }


?>