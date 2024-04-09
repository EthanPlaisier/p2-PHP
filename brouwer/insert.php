
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Fiets Toevoegen</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>

    <div class="container">
        <h1>Voeg een Fiets Toe</h1>
        <form action="insert_db.php" method="post">
            <label for="merk">Merk:</label>
            <input type="text" id="merk" name="merk" required>

            <label for="type">Type:</label>
            <input type="text" id="type" name="type" required>

            <label for="prijs">Prijs:</label>
            <input type="number" id="prijs" name="prijs" required>

            <label for="foto">Foto (URL):</label>
            <input type="text" id="foto" name="foto" required>

            <button type="submit">Voeg Fiets Toe</button>
        </form>
    </div>

</body>
</html>
