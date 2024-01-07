<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form method="post">
        <p>Bedrag exlcusief btw 
        <input type="text" name="bedrag" value=""></p>
        <input type="radio" name="BTW" value="negen">laag, 9 %
        <input type="radio" name="BTW" value="eenentwintig">hoog, 21 %
        <p><input type="submit" name="omzetten" value="Omzetten"></p>
    </form>

    <?php
    
    if (isset($_POST['omzetten'])){

            if (strlen($_POST['bedrag']) == 0) {
                echo "Error: bedrag niet ingevuld<br>";
            } elseif (filter_var($_POST['bedrag'], FILTER_VALIDATE_FLOAT) == false ) {
                echo "Error: bedrag " . $_POST['bedrag'] . " is niet goed<br>";
            } else {
                echo "Het gepost bedrag is: " . $_POST['bedrag'] . "<br>";
            }

    }
    
    
    
    
    ?>
</body>
</html>