<?php
// acteur: ethan
// functie: verwijderen

    if ($_SERVER['REQUEST_METHOD'] == "GET" &&
        isset($_GET['ID'])) {

        // update database
        include "connect.php";

        $sql = "DELETE FROM cijfers
                WHERE ID = :ID";
        $query = $conn->prepare($sql);
        $status = $query->execute(
            [
                ':ID'=>$_GET['ID']
            ]
            );

        if($status == true){
            echo "<script>alert('Leerling is verwijdered')</script>";
            echo "<script> location.replace('opdr13.php');</script>";
        } else {
            echo '<script>alert("Leerling is NIET verwijdered")</script>';
        }
    }


?>