<?php
// Define products and prices
$product1 = 100;
$product2 = 200;
$product3 = 50;

// Check and adjust prices
if ($product1 > 150) {
    $product1 *= 1.19; // Increase by 19%
} elseif ($product1 < 55) {
    $product1 *= 1.11; // Increase by 11%
}

if ($product2 > 150) {
    $product2 *= 1.19; // Increase by 19%
} elseif ($product2 < 55) {
    $product2 *= 1.11; // Increase by 11%
}

if ($product3 > 150) {
    $product3 *= 1.19; // Increase by 19%
} elseif ($product3 < 55) {
    $product3 *= 1.11; // Increase by 11%
}

// Display the updated prices
echo "Product 1: €" . number_format($product1, 2) . "<br>";
echo "Product 2: €" . number_format($product2, 2) . "<br>";
echo "Product 3: €" . number_format($product3, 2) . "<br>";
?>
