<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        table, td {
            border: 1px solid black;
            border-collapse: collapse;
        }
        td {
            padding: 8px;
            text-align: left;
        }
    </style>
</head>
<body>

<?php
try {
    $db = new PDO("mysql:host=localhost;dbname=cijfers", "root", "");
    $query = $db->prepare("SELECT leerling, cijfer FROM cijfers");
    $query->execute();
    $result = $query->fetchAll(PDO::FETCH_ASSOC);

    echo "<table>";

    echo "<tr><th>Leerling</th><th>Cijfer</th></tr>";

    foreach ($result as $data) {
        echo "<tr>";
        echo "<td>" . htmlspecialchars($data['leerling']) . "</td>";
        echo "<td>" . htmlspecialchars($data['cijfer']) . "</td>";
        echo "</tr>";
    }
    echo "</table>";
} catch(PDOException $e) {
    die("Error!: " . $e->getMessage());
}
?>
    
</body>
</html>