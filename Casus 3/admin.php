<!DOCTYPE html>
<html>
<head>
    <title>Bezoekers Filteren</title>
</head>
<body>
    <h2>Filter Bezoekers</h2>
    <form action="admin.php" method="get">
        <label for="maand">Maand:</label>
        <select id="maand" name="maand">
            <option value="1">Januari</option>
            <option value="2">Februari</option>
            <option value="3">Maart</option>
            <option value="4">April</option>
            <option value="5">Mei</option>
            <option value="6">Juni</option>
            <option value="7">Juli</option>
            <option value="8">Augustus</option>
            <option value="9">September</option>
            <option value="10">Oktober</option>
            <option value="11">November</option>
            <option value="12">December</option>
        </select><br><br>

        <label for="land">Land:</label>
        <input type="text" id="land" name="land"><br><br>

        <input type="submit" value="Filter">
    </form>

    <h2>Resultaten</h2>
    <?php
    if ($_SERVER["REQUEST_METHOD"] == "GET" && isset($_GET['maand']) && isset($_GET['land'])) {
        $servername = "localhost";
        $username = "root";
        $password = "";
        $dbname = "statistiekensysteem";

        try {
            $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
            $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

            $maand = $_GET['maand'];
            $land = $_GET['land'];

            $stmt = $conn->prepare("SELECT * FROM bezoekers WHERE MONTH(datum_tijd) = ? AND land = ?");
            $stmt->execute([$maand, $land]);

            while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
                echo "ID: " . $row["id"]. " - Land: " . $row["land"]. " - IP Adres: " . $row["ip_adres"]. " - Provider: " . $row["provider"]. " - Browser: " . $row["browser"]. " - Datum/Tijd: " . $row["datum_tijd"]. " - Referer: " . $row["referer"]. "<br>";
            }
        } catch(PDOException $e) {
            echo "Fout: " . $e->getMessage();
        }

        $conn = null;
    }
    ?>
</body>
</html>
s