<?php

class Product {
    // properties
    public $name;
    public $color;
    public $suiker;
    private $price;
    public $category;
    public $currency;

    // constructor
    public function __construct($name, $price, $currency = "€") {
        $this->name = ucfirst($name);
        $this->price = $price;
        $this->currency = $currency;
    }

    // methods
    public function showName() {
        echo "<br>De naam van het object: " . $this->name . "<br>";
        echo "<br>De kleur van het object: " . $this->color . "<br>";
        echo "<br>De suiker van het object: " . $this->suiker . "<br>";
        echo "<br>De prijs van het object: " . $this->price . " " . $this->currency . "<br>";
        echo "<br>De categorie van het object: " . $this->category . "<br>";
    }

    public function setCategory($category) {
        $this->category = strtoupper($category);
    }
}

// aanmaak object Product
$cola = new Product("cola", 1.50, "$");
$cola->color = "Zwart";
$cola->suiker = "Veel";
$cola->setCategory("drank");
$cola->showName();

// aanmaak 2de object Product (uitgeschakeld met commentaarregels)

$fanta = new Product("fanta", 2.00, "$");
$fanta->color = "Geel";
$fanta->suiker = "Matig";
$fanta->setCategory("drank");
$fanta->showName();


?>
