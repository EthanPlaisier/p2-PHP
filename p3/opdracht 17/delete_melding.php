<?php
// Auteur: Ethan
include_once "functions.php";

if(isset($_GET['id']) && !empty($_GET['id'])){

    $id = $_GET['id'];
    
    deleteMelding($id);
}

header("Location: Admin.php");
exit;

?>
