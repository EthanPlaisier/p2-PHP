<?php
// history.php
require 'database.php';

$calculations = get_calculations($pdo);
echo json_encode($calculations);

function get_calculations($pdo) {
    $stmt = $pdo->query('SELECT * FROM calculations ORDER BY timestamp DESC');
    return $stmt->fetchAll();
}
?>
