<?php
// acteur: ethan
// functie: wijzigen
    if (isset($_GET['ID'])) {

        echo "Mijn ID is: " . $_GET['ID'] . "<br>";

    }

    //data ophalen van id
    include "connect.php";

    $sql = "SELECT * FROM fietsen WHERE ID = :ID";

    $stmt = $conn->prepare($sql);

    $stmt->execute([':ID'=>$_GET['ID']]);

    $result = $stmt->fetch(PDO::FETCH_ASSOC);
    print_r($result);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Fiets wijzigen</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>

    <div class="container">
        <h1>Wijzig fiets</h1>
        <form action="edit_db.php" method="post">
            <input type="hidden" id="ID" name="ID" required value="<?php echo $result['ID']?>">
            <label for="merk">Merk:</label>
            <input type="text" id="merk" name="merk" required value="<?php echo $result['merk']?>">

            <label for="type">Type:</label>
            <input type="text" id="type" name="type" required value="<?php echo $result['type']?>">

            <label for="prijs">Prijs:</label>
            <input type="number" id="prijs" name="prijs" required value="<?php echo $result['prijs']?>">

            <button type="submit">wijzig Fiets Toe</button>
        </form>
    </div>

</body>
</html>
