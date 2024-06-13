<?php


class Product {
    // properties
    public string $name;
    public string $currency;
    private float $price;
    public string $category;

    // constructor
    public function __construct(string $name, float $price, string $currency = "€") {
        $this->name = ucfirst($name);
        $this->price = $price;
        $this->currency = $currency;
    }

    // methods
    public function showName() {
        echo "<br>De naam van het object: " . $this->name . "<br>";
        echo "<br>De prijs van het object: " . $this->price . " " . $this->currency . "<br>";
    }

    public function setCategory($category) {
        $this->category = strtoupper($category);
    }

    public function getProduct() {
        return "Het product " . $this->name . " kost " . $this->currency . " " . $this->price;
    }
}

// Aanmaak objecten Product
$product1 = new Product(name: "Techo beats", price: 2.00, currency: "€");
echo $product1->getProduct() . "<br>";

$product2 = new Product(name: "Classic tunes", price: 3.50, currency: "€");
echo $product2->getProduct() . "<br>";

$product3 = new Product(name: "Jazz vibes", price: 4.00, currency: "€");
echo $product3->getProduct() . "<br>";

/**
 * Class Music
 * Represents a music item.
 */
class Music {
    public string $name;
    public string $genre;
    public int $listen;

    /**
     * Music constructor.
     * @param string $name The name of the music.
     * @param string $genre The genre of the music.
     * @param int $listen The number of listens.
     */
    public function __construct(string $name, string $genre, int $listen) {
        $this->name = $name;
        $this->genre = $genre;
        $this->listen = $listen;
    }

    /**
     * Get the name of the music.
     * @return string
     */
    public function getName(): string {
        return $this->name;
    }
}

// Aanmaak object Music
$music1 = new Music(name: 'Bach', genre: 'Klassiek', listen: 3);
echo $music1->getName() . "<br>";
var_dump($music1);

?>
