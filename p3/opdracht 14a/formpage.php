<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body> 

    <div class="container">
        <form action="insert_db.php" method="post">
            <label for="naam">Naam</label>
            <input type="text" id="naam" name="naam" required>

            <label for="bericht">Bericht</label>
            <input type="text" id="bericht" name="bericht" required>

            <button type="submit">Opslaan</button>
        </form>
    </div>

    <div class="opgeslagen-berichten">
        <h2>Opgeslagen Berichten</h2>
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

        // Haal de opgeslagen berichten op uit de database
        $sql = "SELECT naam, bericht FROM berichten";
        $result = $conn->query($sql);

        // Controleer of er resultaten zijn
        if ($result->num_rows > 0) {
            // Output elk rij van data
            while($row = $result->fetch_assoc()) {
                echo "<p><strong>Naam:</strong> " . $row["naam"]. " - <strong>Bericht:</strong> " . $row["bericht"]. "</p>";
            }
        } else {
            echo "Geen opgeslagen berichten.";
        }

        // Sluit de databaseverbinding
        $conn->close();
        ?>
    </div>
    
</body>
</html>
