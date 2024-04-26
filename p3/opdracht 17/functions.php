<?php
// Auteur: Ethan
include_once "config.php";

function connectDb(){
    $servername = SERVERNAME;
    $username = USERNAME;
    $password = PASSWORD;
    $dbname = DATABASE;
   
    try {
        $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
        // set the PDO error mode to exception
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $conn->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
        //echo "Connected successfully";
        return $conn;
    } 
    catch(PDOException $e) {
        echo "Connection failed: " . $e->getMessage();
    }

 }
// haal de data
function getData($table){
    $conn = connectDb();

    $sql = "SELECT * FROM $table";
    $query = $conn->prepare($sql);
    $query->execute();
    $result = $query->fetchAll();

    return $result;
 }
// CRUD voor admins
function crudmeldingen_Admin(){

    $txt_Admin = "<h1>Admin Pagina</h1>
    <nav>
        <button>
		    <a href='Add_melding.php'>Toevoeg melding</a>
        </button>
    </nav><br>";
    echo $txt_Admin;
 
    $result = getData(CRUD_TABLE);

    printtabel_Admin($result);
    
 }
 //CRUD voor leerlingen
  function crudmeldingen_Leerling(){
    $txt_Leerlingen = "<h1>Student Pagina</h1>";
    echo $txt_Leerlingen;

        $result = getData(CRUD_TABLE);

        printtabel_Leerlingen($result);
 }
 // tabel voor admins
 function printtabel_Admin($result){

    $table = "<table>";

    $headers = array_keys($result[0]);
    $table .= "<tr>";
    foreach($headers as $header){
        $table .= "<th>" . $header . "</th>";   
    }

    $table .= "<th colspan=2>Actie</th>";
    $table .= "</th>";

    foreach ($result as $row) {
        
        $table .= "<tr>";

        foreach ($row as $cell) {
            $table .= "<td>" . $cell . "</td>";  
        }
        $table .= "<td>
            <form method='post' action='Delete_Melding.php?id=$row[id]' >       
                <button>verwijder</button>	 
            </form></td>";

        $table .= "</tr>";
    }
    $table.= "</table>";

    echo $table;
}



// tabel voor leerlingen
 Function printtabel_Leerlingen($result){
    $table = "<table>";

    $headers = array_keys($result[0]);
    $table .= "<tr>";
    foreach($headers as $header){
        $table .= "<th>" . $header . "</th>";   
    }
    foreach ($result as $row) {
        
        $table .= "<tr>";
    
        foreach ($row as $cell) {
            $table .= "<td>" . $cell . "</td>";  
        }
    }
    $table.= "</table>";

    echo $table;
 }
 // verwijder melding
function deleteMelding($id){
    $conn = connectDb();
    try {
        $stmt = $conn->prepare("DELETE FROM meldingen WHERE id = :id");
        $stmt->bindParam(':id', $id);
        $stmt->execute();
        echo "Melding verwijderd";
    } catch(PDOException $e) {
        echo "Error: " . $e->getMessage();
    }
}
// nieuw melding toevoegen
function addMelding($Naam, $Datum){
    $conn = connectDb();
    try {
        $stmt = $conn->prepare("INSERT INTO meldingen (Naam, Datum) VALUES (:Naam, :Datum)");
        $stmt->bindParam(':Naam', $Naam);
        $stmt->bindParam('Datum', $Datum);
        $stmt->execute();
        echo "New record created successfully";
    } catch(PDOException $e) {
        echo "Error: " . $e->getMessage();
    }
}

?>