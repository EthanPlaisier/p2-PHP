<?php

class Product{
    // properties
    public $name;
    public $color;
    public $suiker;
    private $price;
    // methods
    public function showName(){
        echo "<br>De naam van het object: " . $this->name . "<br>";
        echo "<br>De kleur van het object: " . $this->color . "<br>";
        echo "<br>De suiker van het object: " . $this->suiker . "<br>";
        echo "<br>De prijs van het object: " . $this->price . "<br>";
    }
    public function setPrice($prijs) {
        $this->price = $prijs;
    }
    public function getPrice() {
        return $this->price;
    }
}
// aanmaak object Product
$cola = new Product();
$cola->name = "cola";
$cola->color = "Zwart";
$cola->suiker = "Veel";
$cola->setPrice(1.50);
//var_dump($cola);
$cola->showName();
// aanmaak 2de object Product
$fanta = new Product();
$fanta->name = "Fanta";
$fanta->color = "Geel";
$fanta->suiker = "Matig";
$fanta->setPrice(2);
//var_dump($fanta);
$fanta->showName();
// aanmaak 3de object Product
$cassis = new Product();
$cassis->name = "cassis";
$cassis->color = "Zwart";
$cassis->suiker = "Matig";
$cassis->setPrice(3);
//var_dump($cassis);
$cassis->showName();
// aanmaak 4de object Product
$sevenup = new Product();
$sevenup->name = "cassis";
$sevenup->color = "Zwart";
$sevenup->suiker = "Weinig";
$sevenup->setPrice(4);
//var_dump($sevenup);
$sevenup->showName();
?>