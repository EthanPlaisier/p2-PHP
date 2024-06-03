<?php
$servername = "localhost";
$username = "root";
$password = "your_password";
$dbname = "statistiekensysteem";

try {
    $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    $providers = ['Provider1', 'Provider2', 'Provider3'];
    $browsers = ['Chrome', 'Firefox', 'Safari', 'Edge'];
    $referers = ['https://example1.com', 'https://example2.com', 'https://example3.com'];
    $countries = ['Nederland', 'België'];

    $stmt = $conn->prepare("INSERT INTO bezoekers (land, ip_adres, provider, browser, datum_tijd, referer) VALUES (?, ?, ?, ?, ?, ?)");

    for ($i = 0; $i < 100; $i++) {
        $land = $countries[array_rand($countries)];
        $ip_adres = long2ip(rand(0, "4294967295")); // Genereer willekeurig IP-adres
        $provider = $providers[array_rand($providers)];
        $browser = $browsers[array_rand($browsers)];
        $datum_tijd = date("Y-m-d H:i:s", strtotime("-".rand(0, 365)." days"));
        $referer = $referers[array_rand($referers)];

        $stmt->execute([$land, $ip_adres, $provider, $browser, $datum_tijd, $referer]);
    }

    echo "100 records succesvol toegevoegd.";
} catch(PDOException $e) {
    echo "Fout: " . $e->getMessage();
}

$conn = null;
?>
