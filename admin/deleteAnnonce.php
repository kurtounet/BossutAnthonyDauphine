<?php
session_start();

if (isset($_SESSION["username"]) === false) {
    header("Location: https://localhost/bossutanthonydauphine/login.php");
}
require_once ("../utils/databaseManager.php");

if ($_SERVER["REQUEST_METHOD"] === "GET") {

    if (isset($_GET["id"])) {
        $pdo = connectDB();
        deleteAnnonce($pdo, $_GET["id"]);
        header("Location: index.php");
    } else {
        header("Location: index.php");
    }
}
//$annonces = findAllAnnonces($pdo);
//var_dump($annonces);
