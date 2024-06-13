<?php
// calculate.php
require 'database.php';
require 'functions.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $expression = $_POST['expression'];
    try {
        $result = evaluate_expression($expression);
        save_calculation($pdo, $expression, $result);
        echo $result;
    } catch (Exception $e) {
        echo "Error: " . $e->getMessage();
    }
}
?>
