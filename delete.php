<?php 
    require_once('./pdo.php');

    $pdo = new Database();

    $db = $pdo->connect();

    if(isset($_GET['id'])){
        $id = $_GET['id'];
        $query = "DELETE FROM listedesetudiants WHERE id='$id'";
        $db -> exec($query);
    }
    header("Location: listeEtudiants.php");


?>