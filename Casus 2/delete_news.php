<?php
require 'config.php';
session_start();

if (!isset($_SESSION['is_admin']) || !$_SESSION['is_admin']) {
    header('Location: index.php');
    exit;
}

$id = $_GET['id'];

$stmt = $pdo->prepare('DELETE FROM news WHERE id = ?');
$stmt->execute([$id]);

header('Location: admin_dashboard.php');
?>