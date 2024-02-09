<?php
//Acteur: Ethan
//functie: voeg fiets
    //knop
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        echo "Er is gepost<br>";
        print_r($POST);

        //connect
        include "connect.php";

        $sql = "INSERT INTO fietsen (merk, type, prijs, foto)
                VALUES (:merk, :type, :prijs, :foto);";
        $query = $conn->prepare($sql);
        $status = $query->execute(
            [
                ':merk'=>$_POST['merk'],
                ':type'=>$_POST['type'],
                ':prijs'=>$_POST['prijs'],
                ':foto'=>$_POST['foto']
            ]
            );

        if($status == true){
            echo "<script>alert('Fiets is toegevoegd')</script>";
            echo "<script> location.replace('webshop.php');</script>";
        } else {
            echo '<script>alert("Fiets is NIET toegevoegd")</script>';
        }
    }
?>