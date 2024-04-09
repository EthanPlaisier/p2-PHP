<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php
    // Databaseverbinding instellen
    $mysqli = new mysqli('localhost', 'root', '', 'pollvraag');
    
    // Controleren op connectiefout
    if ($mysqli->connect_error) {
        echo "Failed to connect to MySQL: " . $mysqli->connect_error;
        exit();
    }
    
    // Query om tekst uit de 'poll' tabel op te halen
    $query = "SELECT vraag FROM poll";
    
    // Uitvoeren van de query
    $result = $mysqli->query($query);
    
    // Controleren of er resultaten zijn
    if ($result->num_rows > 0) {
        // Output gegevens van elke rij
        while($row = $result->fetch_assoc()) {
            echo "De stelling van dit maand: " . $row["vraag"]. "<br>";
        }
    } else {
        echo "Geen resultaten gevonden";
    }
    
    
    // Verbinding met de database sluiten
    $mysqli->close();
    ?>
    <form action="submit.php" method="post">
        <label for="optie1">Inderdaad, php is het helemaal</label>
        <input type="radio" id="optie1" name="optie" value="1"><br>

        <label for="optie2">php is leuk, maar niet het leukste</label>
        <input type="radio" id="optie2" name="optie" value="2"><br>

        <label for="optie3">php is saai</label>
        <input type="radio" id="optie3" name="optie" value="3"><br>

        <label for="optie4">geen mening</label>
        <input type="radio" id="optie4" name="optie" value="4"><br>

        <input type="submit">
    </form>

</body>
</html>