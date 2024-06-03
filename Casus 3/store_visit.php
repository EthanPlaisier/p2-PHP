<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "statistiekensysteem";

try {
    $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    // Controleer of de POST-variabelen bestaan
    $land = isset($_POST['land']) ? $_POST['land'] : null;
    $ip_adres = isset($_POST['ip_adres']) ? $_POST['ip_adres'] : null;
    $provider = isset($_POST['provider']) ? $_POST['provider'] : null;
    $browser = isset($_POST['browser']) ? $_POST['browser'] : null;
    $datum_tijd = isset($_POST['datum_tijd']) ? $_POST['datum_tijd'] : null;
    $referer = isset($_POST['referer']) ? $_POST['referer'] : null;

    if ($land && $ip_adres && $provider && $browser && $datum_tijd && $referer) {
        $stmt = $conn->prepare("INSERT INTO bezoekers (land, ip_adres, provider, browser, datum_tijd, referer) VALUES (?, ?, ?, ?, ?, ?)");
        $stmt->execute([$land, $ip_adres, $provider, $browser, $datum_tijd, $referer]);

        echo "Nieuw record succesvol gemaakt";
    } else {
        echo "Vul alle velden in.";
    }
} catch(PDOException $e) {
    echo "Fout: " . $e->getMessage();
}

$conn = null;
?>
