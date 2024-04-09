<?php
// acteur: ethan
// functie: verwijderen

    if ($_SERVER['REQUEST_METHOD'] == "GET" &&
        isset($_GET['brouwcode'])) {

        // update database
        include "connect.php";

        $sql = "DELETE FROM brouwer
                WHERE brouwcode = :brouwcode";
        $query = $conn->prepare($sql);
        $status = $query->execute(
            [
                ':brouwcode'=>$_GET['brouwcode']
            ]
            );

        if($status == true){
            echo "<script>alert('Brouwer is verwijdered')</script>";
            echo "<script> location.replace('webshop.php');</script>";
        } else {
            echo '<script>alert("Brouwer is NIET verwijdered")</script>';
        }
    }


?>