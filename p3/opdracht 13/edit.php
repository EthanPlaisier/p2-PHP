<?php
// acteur: ethan
// functie: wijzigen
    if (isset($_GET['ID'])) {

        echo "Mijn ID is: " . $_GET['ID'] . "<br>";

    }

    //data ophalen van id
    include "connect.php";

    $sql = "SELECT * FROM cijfers WHERE ID = :ID";

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
            <label for="leerling">leerling:</label>
            <input type="text" id="leerling" name="leerling" required value="<?php echo $result['leerling']?>">

            <label for="vak">Vak:</label>
            <input type="text" id="vak" name="vak" required value="<?php echo $result['vak']?>">

            <label for="docent">Docent:</label>
            <input type="text" id="docent" name="docent" required value="<?php echo $result['docent']?>">

            <label for="cijfer">Cijfer:</label>
            <input type="number" id="cijfer" name="cijfer" required value="<?php echo $result['cijfer']?>">

            <button type="submit">wijzig leerling toe</button>
        </form>
    </div>

</body>
</html>
