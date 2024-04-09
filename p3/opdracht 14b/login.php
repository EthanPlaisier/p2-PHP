<?php
session_start();

if($_SERVER["REQUEST_METHOD"] == "POST") {
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

    $gebruikersnaam = $_POST['gebruikersnaam'];
    $wachtwoord = $_POST['wachtwoord'];

    $sql = "SELECT * FROM gebruikers WHERE gebruikersnaam='$gebruikersnaam'";
    $result = $conn->query($sql);

    if ($result->num_rows == 1) {
        // Gebruiker gevonden, controleer wachtwoord
        $row = $result->fetch_assoc();
        if (password_verify($wachtwoord, $row['wachtwoord'])) {
            // Wachtwoord is correct, start sessie
            $_SESSION['gebruikersnaam'] = $gebruikersnaam;
            header("location: formpage.php");
        } else {
            // Wachtwoord is onjuist
            echo "Inloggen mislukt. Controleer uw gebruikersnaam en wachtwoord.";
        }
    } else {
        // Gebruiker niet gevonden
        echo "Inloggen mislukt. Controleer uw gebruikersnaam en wachtwoord.";
    }

    $conn->close();
}
?>
