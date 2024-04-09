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
        $db = new PDO("mysql:host=localhost;dbname=webshop",
                        "root", "");
        $query = $db->prepare("SELECT * FROM product");
        $query->execute();
        $result = $query->fetchAll (PDO::FETCH_ASSOC);
        echo "<table>";
            echo "<tr>
            <th>naam</th>
            <th>merk</th>
            <th>prijs</th>
            <th>Wijzig</th>
            <th>Verwijderen</th></tr>";
            foreach($result as &$data) {
                echo "<tr>";
                    echo "<td>" . $data["naam"] . "</td>";
                    echo "<td>" . $data["merk"] . "</td>";
                    echo "<td>&euro; " . number_format($data["prijs"], 2, ",", ".") . "</td>";
                    echo "<td><a href='edit.php?productcode=" . $data['productcode'] . "'>" . "Wijzig</a></td>";
                    echo "<td><a href='delete.php?productcode=" . $data['productcode'] . "'>" . "Verwijderen</a></td>";
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