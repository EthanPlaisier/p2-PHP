<?php
//Acteur: Ethan
//functie: voeg fiets
    //knop
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        echo "Er is gepost<br>";
        print_r($_POST);

        //connect
        include "connect.php";

        $sql = "INSERT INTO product (naam, merk, prijs)
                VALUES (:naam, :merk, :prijs);";
        $query = $conn->prepare($sql);
        $status = $query->execute(
            [
                ':naam'=>$_POST['naam'],
                ':merk'=>$_POST['merk'],
                ':prijs'=>$_POST['prijs'],
            ]
            );

        if($status == true){
            echo "<script>alert('Product is toegevoegd')</script>";
            echo "<script> location.replace('webshop.php');</script>";
        } else {
            echo '<script>alert("Product is NIET toegevoegd")</script>';
        }
    }
?>