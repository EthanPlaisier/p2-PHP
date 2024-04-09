<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
<?php
    //acteur: Ethan Plaisier
    //functie selecteer data
    try {
        $db = new PDO("mysql:host=localhost;dbname=bieren",
                        "root", "");
        $query = $db->prepare("SELECT * FROM brouwer");
        $query->execute();
        $result = $query->fetchAll (PDO::FETCH_ASSOC);
        echo "<table>";
            echo "<tr>
            <th>naam</th>
            <th>land</th>
            <th>brouwcode</th>
            <th>Wijzig</th>
            <th>Verwijderen</th></tr>";
            foreach($result as &$data) {
                echo "<tr>";
                    echo "<td>" . $data["naam"] . "</td>";
                    echo "<td>" . $data["land"] . "</td>";
                    echo "<td>" . $data["brouwcode"] . "</td>";
                    echo "<td><a href='edit.php?id=" . $data['brouwcode'] . "'>" . "Wijzig</a></td>";
                    echo "<td><a href='delete.php?id=" . $data['brouwcode'] . "'>" . "Verwijderen</a></td>";
                echo "</tr>";
        }
        echo "</table>";
    }   
    
        catch(PDOException $e) {
        die("Error!: " . $e->getMessage);
    }

?>
</body>
</html>