<?php
// Databaseverbinding instellen
$mysqli = new mysqli('localhost', 'root', '', 'pollvraag');

// Controleren op connectiefout
if ($mysqli->connect_error) {
    die("Failed to connect to MySQL: " . $mysqli->connect_error);
}

// Controleren of er een optie is geselecteerd
if (isset($_POST['optie'])) {
    // Optie ID ophalen vanuit de POST-variabele
    $optie_id = $_POST['optie'];

    // Query om de stemmen voor de geselecteerde optie te verhogen
    $query = "UPDATE optie SET stemmen = stemmen + 1 WHERE id = $optie_id";

    // Uitvoeren van de query
    if ($mysqli->query($query) === TRUE) {
        echo "Bedankt voor het stemmen!";
    } else {
        echo "Er is een fout opgetreden tijdens het stemmen: " . $mysqli->error;
    }
} else {
    echo "Geen optie geselecteerd";
}

// Verbinding met de database sluiten
$mysqli->close();
?>
