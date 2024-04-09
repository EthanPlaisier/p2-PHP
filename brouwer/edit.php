<?php
// acteur: ethan
// functie: wijzigen
    if (isset($_GET['brouwcode'])) {

        echo "Mijn code is: " . $_GET['brouwcode'] . "<br>";

    }

    //data ophalen van id
    include "connect.php";

    $sql = "SELECT * FROM brouwer WHERE brouwcode = :brouwcode";

    $stmt = $conn->prepare($sql);

    $stmt->bindParam(':brouwcode', $_GET['brouwcode'], PDO::PARAM_INT);

    $stmt->execute();

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
            <input type="hidden" id="brouwcode" name="brouwcode" required value="<?php echo $result['brouwcode']?>">
            <label for="naam">naam:</label>
            <input type="text" id="naam" name="naam" required value="<?php echo $result['naam']?>">

            <label for="land">Land:</label>
            <input type="text" id="land" name="land" required value="<?php echo $result['land']?>">

            <button type="submit">wijzig Fiets Toe</button>
        </form>
    </div>

</body>
</html>
