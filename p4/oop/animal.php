<?php

// Definieer de class Animal
class Animal {
    // Properties
    public $Naam;
    
    // Constructor om de naam in te stellen bij het maken van een nieuw object
    public function __construct($naam) {
        $this->Naam = $naam;
    }
    
    // Methode Info() om informatie over het dier af te drukken
    public function Info() {
        echo "Naam van het dier: " . $this->Naam . "<br>";
    }
    
    // Methode Eat() om het dier te laten eten
    public function Eat() {
        echo $this->Naam . " eet.<br>";
    }
    
    // Methode Sleep() om het dier te laten slapen
    public function Sleep() {
        echo $this->Naam . " slaapt.<br>";
    }
}

// Maak een nieuw Animal object aan met de naam "Hond"
$dier = new Animal("Hond");

// Roep de methodes aan
$dier->Info(); // Afdrukken van informatie over het dier
$dier->Eat(); // Laat het dier eten
$dier->Sleep(); // Laat het dier slapen

?>
