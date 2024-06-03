<?php


class Fruit{
    // properties
    public $name;
    public $color;
    private $price;
    public $expiryDate;
    // methods
    public function __construct($naam, $kleur){
        echo "Nieuwe object Fruit aangemaakt<br>";
        $this->name = $naam;
        $this->color = $kleur;
    }
    public function isExpired(){
        // wat is de expirydate
        echo $this->expiryDate;

        // bepaal huidige datum
        $currentDate = date("Y F J");

        // als huidige datum na expirydate is dan expired
        if($currentDate > $this->expiryDate){
            return true;
        } else {
            return false;
        }
    }
    public function showName(){
        echo "<br>De naam van het object: " . $this->name . "<br>";
        echo "<br>De kleur van het object: " . $this->color . "<br>";
        echo "<br>De prijs van het object: " . $this->price . "<br>";
    }
    public function setPrice($prijs) {
        $this->price = $prijs;
    }
    public function getPrice() {
        return $this->price;
    }
}

// aanmaak object Fruit
$appel = new Fruit("Elstar", "roodgeel");
//$appel->name = "Elstar";
//$appel->color = "Geelrood";
$appel->setPrice(1.50);
$appel->expiryDate = "2024-06-01";

//test of bedorven
if ($appel->isExpired() == true) {
    echo "Verlopen<br>";
} else {
    echo "Vers<br>";
}
// print
echo "De prijs is: " . $appel->getPrice();
//var_dump($appel);
$appel->showName();
// aanmaak 2de object Fruit
$banaan = new Fruit("Banaan", "geel");
//$banaan->name = "Banaan";
//$banaan->color = "Geel";
$banaan->setPrice(2);
//var_dump($banaan);
$banaan->showName();

?>