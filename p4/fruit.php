<?php


class Fruit{
    // properties
    public $name;
    public $color;
    private $price;
    // methods
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
$appel = new Fruit();
$appel->name = "Elstar";
$appel->color = "Geelrood";
$appel->setPrice(1.50);

// print
echo "De prijs is: " . $appel->getPrice();
//var_dump($appel);
$appel->showName();
// aanmaak 2de object Fruit
$banaan = new Fruit();
$banaan->name = "Banaan";
$banaan->color = "Geel";
$banaan->setPrice(2);
//var_dump($banaan);
$banaan->showName();

?>