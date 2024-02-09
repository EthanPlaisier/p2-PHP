<?php
// acteur: ethan
// functie: data updaten

    if ($_SERVER['REQUEST_METHOD'] == "POST") {
        print_r($_POST);

        // update database
        include "connect.php";

        $sql = "UPDATE fietsen SET
                    merk = :merk,
                    type = :type,
                    prijs = :prijs
                WHERE ID = :ID";
        $query = $conn->prepare($sql);
        $status = $query->execute(
            [
                ':merk'=>$_POST['merk'],
                ':type'=>$_POST['type'],
                ':prijs'=>$_POST['prijs'],
                ':ID'=>$_POST['ID']
            ]
            );

        if($status == true){
            echo "<script>alert('Fiets is gewijzigd')</script>";
            echo "<script> location.replace('webshop.php');</script>";
        } else {
            echo '<script>alert("Fiets is NIET gewijzigd")</script>';
        }
    }


?>