<!DOCTYPE html>
<html>
<head>
    <title>Bezoeker Gegevens Opslaan</title>
</head>
<body>
    <a href="admin.php">filter</a>
    <h2>Bezoeker Gegevens Invoeren</h2>
    <form action="store_visit.php" method="post">
        <label for="land">Land:</label>
        <input type="text" id="land" name="land"><br><br>
        <label for="ip_adres">IP Adres:</label>
        <input type="text" id="ip_adres" name="ip_adres"><br><br>
        <label for="provider">Provider:</label>
        <input type="text" id="provider" name="provider"><br><br>
        <label for="browser">Browser:</label>
        <input type="text" id="browser" name="browser"><br><br>
        <label for="datum_tijd">Datum/Tijd:</label>
        <input type="datetime-local" id="datum_tijd" name="datum_tijd"><br><br>
        <label for="referer">Referer:</label>
        <input type="text" id="referer" name="referer"><br><br>
        <input type="submit" value="Opslaan">
    </form>
</body>
</html>
