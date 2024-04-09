<?php
// acteur: ethan
// functie: data updaten

    if ($_SERVER['REQUEST_METHOD'] == "POST") {
        print_r($_POST);

        // update database
        include "connect.php";

        $sql = "UPDATE product SET
                    naam = :naam,
                    merk = :merk,
                    prijs = :prijs
                WHERE productcode = :productcode";
        $query = $conn->prepare($sql);
        $status = $query->execute(
            [
                ':naam'=>$_POST['naam'],
                ':merk'=>$_POST['merk'],
                ':prijs'=>$_POST['prijs'],
                ':productcode'=>$_POST['productcode']
            ]
            );

        if($status == true){
            echo "<script>alert('Product is gewijzigd')</script>";
            echo "<script> location.replace('webshop.php');</script>";
        } else {
            echo '<script>alert("Product is NIET gewijzigd")</script>';
        }
    }


?>