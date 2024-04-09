<?php
$host = 'localhost';
$dbname = 'studentenlogin';
$username = 'root'; // Change to your database username
$password = ''; // Change to your database password

$pdo = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8", $username, $password);
?>
