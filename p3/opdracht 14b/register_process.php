<?php
$username = $_POST['username'];
$email = $_POST['email'];
$password = $_POST['password'];

// Verbinding maken met de database
$servername = "localhost"; // Vul hier de servernaam in (meestal localhost)
$username_db = "root"; // Vul hier je gebruikersnaam voor de database in
$password_db = ""; // Vul hier je wachtwoord voor de database in
$dbname = "gastenboek"; // Vul hier de naam van je database in

// Maak verbinding
$conn = new mysqli($servername, $username_db, $password_db, $dbname);

// Controleer de verbinding
if ($conn->connect_error) {
    die("Connectie mislukt: " . $conn->connect_error);
}

// Check of de gebruiker al bestaat
$sql = "SELECT * FROM gebruikers WHERE gebruikersnaam='$username'";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    echo "Gebruikersnaam is al in gebruik. Kies een andere gebruikersnaam.";
} else {
    // Gebruiker bestaat nog niet, voeg toe aan de database
    $hashed_password = password_hash($password, PASSWORD_DEFAULT);

    $sql = "INSERT INTO gebruikers (gebruikersnaam, email, wachtwoord) VALUES ('$username', '$email', '$hashed_password')";
    
    if ($conn->query($sql) === TRUE) {
        echo "Registratie succesvol. U kunt nu inloggen.";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}

$conn->close();
?>