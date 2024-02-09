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
        $db = new PDO("mysql:host=localhost;dbname=fietsenmaker",
                        "root", "");
        $query = $db->prepare("SELECT * FROM fietsen");
        $query->execute();
        $result = $query->fetchAll (PDO::FETCH_ASSOC);
        echo "<table>";
            echo "<tr>
            <th>merk</th>
            <th>type</th>
            <th>prijs</th>
            <th>foto</th>
            <th>Wijzig</th>
            <th>Verwijderen</th></tr>";
            foreach($result as &$data) {
                echo "<tr>";
                    echo "<td>" . $data["merk"] . "</td>";
                    echo "<td>" . $data["type"] . "</td>";
                    echo "<td>&euro; " . number_format($data["prijs"],2,",",".") . "</td>";
                    echo "<td>" . "<img src='img/" . $data["foto"] . "'>" . "</td>";
                    echo "<td><a href='edit.php?ID=" . $data['ID'] . "'>" . "Wijzig</a></td>";
                    echo "<td><a href='delete.php?ID=" . $data['ID'] . "'>" . "Verwijderen</a></td>";
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