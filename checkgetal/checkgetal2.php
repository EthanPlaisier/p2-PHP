<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1>controleer getal</h1>
    <form action="" method="post">
        <input type="text" name="getal" placeholder="voer getal in">
        <input type="submit" value="Check" name="button" >
    </form>

    <?php
        // test of de check is gedrukt
        // print_r($_POST);
        if (isset($_POST['button'])) {
            echo "Getal ingevoerd" . $_POST['getal'];
         
        
            // controleer juist getal
            $check = filter_input(INPUT_POST, "getal", FILTER_VALIDATE_FLOAT);
            if ($check == true) {
                echo "juist getal<br>";
            }
        
        
        } else {
            echo "Niets ingevoerd";
        }
        echo "<br>";
    ?>

</body>
</html>