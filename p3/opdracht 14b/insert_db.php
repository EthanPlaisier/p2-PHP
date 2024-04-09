<?php
session_start();

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
    $bericht = $_POST["bericht"];

    // Controleer of de gebruiker is ingelogd
    if (isset($_SESSION['gebruikersnaam'])) {
        $gebruikersnaam = $_SESSION['gebruikersnaam'];

        // Query om gebruiker ID op te halen op basis van gebruikersnaam
        $user_query = "SELECT ID FROM gebruikers WHERE gebruikersnaam = '$gebruikersnaam'";
        $result = $conn->query($user_query);

        if ($result->num_rows > 0) {
            $row = $result->fetch_assoc();
            $gebruiker_id = $row["ID"];

            // Voorbereiden van de SQL query om gegevens in te voegen
            $sql = "INSERT INTO berichten (gebruikers_id, bericht) VALUES ('$gebruiker_id', '$bericht')";

            // Voer de query uit
            if ($conn->query($sql) === TRUE) {
                echo "Gegevens succesvol opgeslagen.";
            } else {
                echo "Error: " . $sql . "<br>" . $conn->error;
            }
        } else {
            echo "Gebruiker niet gevonden.";
        }
    } else {
        echo "Je moet ingelogd zijn om een bericht toe te voegen.";
    }
}

// Sluit de databaseverbinding
$conn->close();
?>
