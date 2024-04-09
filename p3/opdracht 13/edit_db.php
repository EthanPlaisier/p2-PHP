<?php
// acteur: ethan
// functie: data updaten

    if ($_SERVER['REQUEST_METHOD'] == "POST") {
        print_r($_POST);

        // update database
        include "connect.php";

        $sql = "UPDATE cijfers SET
                    leerling = :leerling,
                    vak = :vak,
                    docent = :docent,
                    cijfer = :cijfer
                WHERE ID = :ID";
        $query = $conn->prepare($sql);
        $status = $query->execute(
            [
                ':leerling'=>$_POST['leerling'],
                ':vak'=>$_POST['vak'],
                ':docent'=>$_POST['docent'],
                ':cijfer'=>$_POST['cijfer'],
                ':ID'=>$_POST['ID']
            ]
            );

        if($status == true){
            echo "<script>alert('Leerling is gewijzigd')</script>";
            echo "<script> location.replace('opdr13.php');</script>";
        } else {
            echo '<script>alert("Leerling is NIET gewijzigd")</script>';
        }
    }


?>