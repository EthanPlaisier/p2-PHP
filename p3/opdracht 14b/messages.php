<?php
// Verbinding maken met de database
$servername = "localhost"; // Vul hier de servernaam in (meestal localhost)
$username = "root"; // Vul hier je gebruikersnaam voor de database in
$password = ""; // Vul hier je wachtwoord voor de database in
$dbname = "gastenboek"; // Vul hier de naam van je database in

// Maak verbinding
$conn = new mysqli($servername, $username, $password, $dbname);

// Controleer de verbinding
if ($conn->connect_error) {
    die("Connectie mislukt: " . $conn->connect_error);
}

// Haal de opgeslagen berichten op uit de database inclusief de bijbehorende gebruikersnaam
$sql = "SELECT berichten.bericht, gebruikers.gebruikersnaam
        FROM berichten
        INNER JOIN gebruikers ON berichten.gebruikers_id = gebruikers.ID";
$result = $conn->query($sql);

// Controleer of er resultaten zijn
if ($result->num_rows > 0) {
    // Output elk rij van data
    while($row = $result->fetch_assoc()) {
        echo "<p><strong>Gebruikersnaam:</strong> " . $row["gebruikersnaam"]. "</p>";
        echo "<p><strong>Bericht:</strong> " . $row["bericht"]. "</p>";
    }
} else {
    echo "Geen opgeslagen berichten.";
}

// Sluit de databaseverbinding
$conn->close();
?>
