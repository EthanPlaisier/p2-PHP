<?php
// acteur: ethan
// functie: wijzigen
    if (isset($_GET['productcode'])) {

        echo "Mijn productcode is: " . $_GET['productcode'] . "<br>";

    }

    //data ophalen van id
    include "connect.php";

    $sql = "SELECT * FROM product WHERE productcode = :productcode";

    $stmt = $conn->prepare($sql);

    $stmt->execute([':productcode'=>$_GET['productcode']]);

    $result = $stmt->fetch(PDO::FETCH_ASSOC);
    print_r($result);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Product wijzigen</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>

    <div class="container">
        <h1>Wijzig product</h1>
        <form action="edit_db.php" method="post">
            <input type="hidden" id="productcode" name="productcode" required value="<?php echo $result['productcode']?>">
            <label for="naam">Naam:</label>
            <input type="text" id="naam" name="naam" required value="<?php echo $result['naam']?>">

            <label for="merk">Merk:</label>
            <input type="text" id="merk" name="merk" required value="<?php echo $result['merk']?>">

            <label for="prijs">Prijs:</label>
            <input type="text" id="prijs" name="prijs" required value="<?php echo $result['prijs']?>">

            <button type="submit">wijzig product aan</button>
        </form>
    </div>

</body>
</html>
