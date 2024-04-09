
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Product Toevoegen</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>

    <div class="container">
        <h1>Voeg een Product Toe</h1>
        <form action="insert_db.php" method="post">
            <label for="naam">Naam:</label>
            <input type="text" id="naam" name="naam" required>

            <label for="merk">Merk:</label>
            <input type="text" id="merk" name="merk" required>

            <label for="prijs">Prijs:</label>
            <input type="text" id="prijs" name="prijs" required>

            <button type="submit">Voeg product toe</button>
        </form>
    </div>

</body>
</html>
