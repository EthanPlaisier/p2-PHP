<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "statistiekensysteem";

try {
    $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    $maand = $_GET['maand'];
    $land = $_GET['land'];

    $stmt = $conn->prepare("SELECT * FROM bezoekers WHERE MONTH(datum_tijd) = ? AND land = ?");
    $stmt->execute([$maand, $land]);

    while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
        echo "ID: " . $row["id"]. " - Land: " . $row["land"]. " - IP Adres: " . $row["ip_adres"]. " - Provider: " . $row["provider"]. " - Browser: " . $row["browser"]. " - Datum/Tijd: " . $row["datum_tijd"]. " - Referer: " . $row["referer"]. "<br>";
    }
} catch(PDOException $e) {
    echo "Fout: " . $e->getMessage();
}

$conn = null;
?>
