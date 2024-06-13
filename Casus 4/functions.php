<?php
// functions.php

function add($a, $b) {
    return $a + $b;
}

function subtract($a, $b) {
    return $a - $b;
}

function multiply($a, $b) {
    return $a * $b;
}

function divide($a, $b) {
    if ($b == 0) {
        throw new Exception("Division by zero");
    }
    return $a / $b;
}

function power($a, $b) {
    return pow($a, $b);
}

function modulo($a, $b) {
    return $a % $b;
}

function sqrt_custom($a) {
    if ($a < 0) {
        throw new Exception("Square root of negative number");
    }
    return sqrt($a);
}

function round_custom($a, $precision) {
    return round($a, $precision);
}

function evaluate_expression($expression) {
    // Veiligheidscontroles en parsing van de expressie
    // LET OP: eval() gebruiken is potentieel gevaarlijk. In een echte applicatie moet je een veilige parser gebruiken.
    $expression = str_replace(['^', 'sqrt'], ['**', 'sqrt_custom'], $expression);
    $result = eval("return $expression;");
    return $result;
}

function save_calculation($pdo, $expression, $result) {
    $stmt = $pdo->prepare('INSERT INTO calculations (expression, result) VALUES (?, ?)');
    $stmt->execute([$expression, $result]);
}

function get_calculations($pdo) {
    $stmt = $pdo->query('SELECT * FROM calculations ORDER BY timestamp DESC');
    return $stmt->fetchAll();
}
?>
