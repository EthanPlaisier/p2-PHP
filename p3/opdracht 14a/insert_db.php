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

// Controleer of er gegevens zijn verzonden via het formulier
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Haal de gegevens op uit het formulier
    $naam = $_POST["naam"];
    $bericht = $_POST["bericht"];

    // Voorbereiden van de SQL query om gegevens in te voegen
    $sql = "INSERT INTO berichten (naam, bericht) VALUES ('$naam', '$bericht')";

    // Voer de query uit
    if ($conn->query($sql) === TRUE) {
        echo "Gegevens succesvol opgeslagen.";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}

// Sluit de databaseverbinding
$conn->close();
?>
