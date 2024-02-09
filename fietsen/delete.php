<?php
// acteur: ethan
// functie: verwijderen

    if ($_SERVER['REQUEST_METHOD'] == "GET" &&
        isset($_GET['ID'])) {

        // update database
        include "connect.php";

        $sql = "DELETE FROM fietsen
                WHERE ID = :ID";
        $query = $conn->prepare($sql);
        $status = $query->execute(
            [
                ':ID'=>$_GET['ID']
            ]
            );

        if($status == true){
            echo "<script>alert('Fiets is verwijdered')</script>";
            echo "<script> location.replace('webshop.php');</script>";
        } else {
            echo '<script>alert("Fiets is NIET verwijdered")</script>';
        }
    }


?>