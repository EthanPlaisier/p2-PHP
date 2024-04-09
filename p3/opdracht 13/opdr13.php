<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cijfers</title>
    <style>
        table, th, td {
            border: 1px solid black;
            border-collapse: collapse;
        }
        th, td {
            padding: 8px;
            text-align: left;
        }
        th {
            cursor: pointer;
        }
    </style>
</head>
<body>

<?php
try {
    $db = new PDO("mysql:host=localhost;dbname=cijfers", "root", "");

    // Nieuwe kolommen voor vakken en docenten toevoegen
    $query = $db->prepare("SELECT ID, leerling, vak, docent, cijfer FROM cijfers");
    $query->execute();
    $result = $query->fetchAll(PDO::FETCH_ASSOC);

    echo "<table>";
    echo "<tr><th onclick='sortTable(0)'>Leerling</th><th onclick='sortTable(1)'>Vak</th><th onclick='sortTable(2)'>Docent</th><th onclick='sortTable(3)'>Cijfer</th><th>Wijzig</th><th>Verwijderen</th></tr>";

    foreach ($result as $data) {
        echo "<tr>";
        echo "<td>" . htmlspecialchars($data['leerling']) . "</td>";
        echo "<td>" . htmlspecialchars($data['vak']) . "</td>";
        echo "<td>" . htmlspecialchars($data['docent']) . "</td>";
        echo "<td>" . htmlspecialchars($data['cijfer']) . "</td>";
        echo "<td><a href='edit.php?ID=" . $data['ID'] . "'>" . "Verander cijfer</a></td>";
        echo "<td><a href='delete.php?ID=" . $data['ID'] . "'>" . "Verwijder cijfer</a></td>";
        echo "</tr>";
    }
    echo "</table>";

    // Zoekveld toevoegen voor het zoeken naar een specifieke leerling op naam
    echo "<form method='post'>";
    echo "<input type='text' name='search' placeholder='Zoek leerling'>";
    echo "<input type='submit' value='Zoeken'>";
    echo "</form>";

    if ($_SERVER['REQUEST_METHOD'] == "POST") {
        $search = $_POST['search'];
        $query = $db->prepare("SELECT leerling, vak, docent, cijfer FROM cijfers WHERE leerling LIKE ?");
        $query->execute(["%$search%"]);
        $result = $query->fetchAll(PDO::FETCH_ASSOC);

        echo "<table>";
        echo "<tr><th>Leerling</th><th>Vak</th><th>Docent</th><th>Cijfer</th></tr>";

        foreach ($result as $data) {
            echo "<tr>";
            echo "<td>" . htmlspecialchars($data['leerling']) . "</td>";
            echo "<td>" . htmlspecialchars($data['vak']) . "</td>";
            echo "<td>" . htmlspecialchars($data['docent']) . "</td>";
            echo "<td>" . htmlspecialchars($data['cijfer']) . "</td>";
            echo "</tr>";
        }
        echo "</table>";
    }

} catch(PDOException $e) {
    die("Error!: " . $e->getMessage());
}
?>

<script>
    function sortTable(column) {
        let table, rows, switching, i, x, y, shouldSwitch;
        table = document.querySelector("table");
        switching = true;
        while (switching) {
            switching = false;
            rows = table.rows;
            for (i = 1; i < (rows.length - 1); i++) {
                shouldSwitch = false;
                x = rows[i].getElementsByTagName("td")[column];
                y = rows[i + 1].getElementsByTagName("td")[column];
                if (x.innerHTML.toLowerCase() > y.innerHTML.toLowerCase()) {
                    shouldSwitch = true;
                    break;
                }
            }
            if (shouldSwitch) {
                rows[i].parentNode.insertBefore(rows[i + 1], rows[i]);
                switching = true;
            }
        }
    }
</script>

</body>
</html>
