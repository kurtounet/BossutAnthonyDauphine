<?php
//On active la session
session_start();
//On vérifie si l'utilisateur est connecté, sinon on le redirige vers la page de login
if (!isset($_SESSION["username"])) {
    header("Location: https://localhost/bossutanthonydauphine/login.php");
}
//On inclut le databaseManager
require_once ("../utils/databaseManager.php");

if ($_SERVER["REQUEST_METHOD"] === "GET") {
    //Vérifier si l'id existe
    if (isset($_GET["id"])) {
        //On se connecte a la base de donnée
        $pdo = connectDB();
        //On supprime l'annonce
        deleteAnnonce($pdo, $_GET["id"]);
        //On redirige vers /admin/index.php
        header("Location: index.php");
    } else {
        header("Location: index.php");
    }
} else {
    header("Location: index.php");
}
