<?php
// acteur: ethan
// functie: verwijderen

    if ($_SERVER['REQUEST_METHOD'] == "GET" &&
        isset($_GET['productcode'])) {

        // update database
        include "connect.php";

        $sql = "DELETE FROM product
                WHERE productcode = :productcode";
        $query = $conn->prepare($sql);
        $status = $query->execute(
            [
                ':productcode'=>$_GET['productcode']
            ]
            );

        if($status == true){
            echo "<script>alert('Product is verwijdered')</script>";
            echo "<script> location.replace('webshop.php');</script>";
        } else {
            echo '<script>alert("Product is NIET verwijdered")</script>';
        }
    }


?>