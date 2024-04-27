<?php
//On active la session
session_start();
//On vérifie si l'utilisateur est connecté, sinon on le redirige vers la page de login
if (!isset($_SESSION["username"])) {
    header("Location: https://localhost/bossutanthonydauphine/login.php");
}
$title = "Dauphine";
//On inclut le header
include_once ("../block/header.php");
//On inclut le databaseManager
include_once ("../utils/databaseManager.php");
//On inclut le uploadfile
include_once ("../utils/uploadfile.php");

// vérifier si l'id existe
if (!isset($_GET["id"])) {
    $subtitle = "Nouvelle annonce";
    $para = "";
} else {
    $subtitle = "Modification de l'annonce";
    $para = "?id=" . $_GET["id"];
    //On se connecte a la base de donnée
    $pdo = connectDB();
    //On recupere l'annonce
    $annonce = findAnnoncesById($pdo, $_GET["id"]);
}

//On verifie si le formulaire est envoyé
if ($_SERVER["REQUEST_METHOD"] === "POST") {

    //On verifie si $_FILES["avatar"]["name"] existe (fichier sélectionné) et 
    //si la variable name n'est pas vide
    if (isset($_FILES["avatar"]["name"]) && !empty($_FILES["avatar"]["name"])) {
        //Si c'est le cas, on appel la fonction uploadFile, qui télécharge le fichier et 
        // returne l'url de l'image, puis on affecte cette url a $_POST["imageUrl"]
        $_POST["imageUrl"] = uploadFile();

    }
    //On se connecte à la base de donnée
    $pdo = connectDB();
    //On verifie si les variables existent 
    if (isset($_POST["imageUrl"], $_POST["contenu"], $_POST["titre"], $_POST["auteur"])) {
        //Si $_GET["id"] existe, on appel la fonction updateAnnonce pour modifier l'annonce, 
        //sinon on appel la fonction createAnnonce, qui permet d'ajouter une nouvelle annonce
        if (!isset($_GET["id"])) {
            createAnnonce($pdo, $_POST["imageUrl"], $_POST["contenu"], $_POST["titre"], $_POST["auteur"]);
        } else {
            updateAnnonce($pdo, $_GET["id"], $_POST["imageUrl"], $_POST["contenu"], $_POST["titre"], $_POST["auteur"]);
        }
        header("Location: https://localhost/bossutanthonydauphine/admin/index.php");
    } else {
        //En cas d'erreur, on redirige vers /admin/index.php
        header("Location: https://localhost/bossutanthonydauphine/admin/index.php");
    }
}

?>
<div class="container col-6 ">
    <h1><?PHP echo ($subtitle ?? "Default Title") ?></h1>

    <form action="editeAnnonce.php<?PHP echo $para ?? "" ?>" method="POST" enctype="multipart/form-data" class=" mt-3">

        <div class="mb-3">
            <label for="titre" class="form-label">Titre:</label>
            <input type="text" class="form-control" id="titre" name="titre"
                value="<?PHP echo $annonce["titre"] ?? "" ?>" required>
        </div>

        <div class="mb-3">
            <div>
                <img src="<?PHP echo $annonce["imageUrl"] ?? "https://placehold.co/400" ?>" alt="" class="img-fluid">
            </div>
            <label for="imageUrl" class="form-label">Image URL:</label>
            <input type="text" class="form-control" id="imageUrl" name="imageUrl"
                value="<?PHP echo $annonce["imageUrl"] ?? "https://placehold.co/400" ?>" required>
            <input type="file" name="avatar">
        </div>

        <div class="mb-3">
            <label for="contenu" class="form-label">Contenu:</label>
            <textarea class="form-control" id="contenu" name="contenu" rows="3"
                required><?PHP echo $annonce["contenu"] ?? "" ?></textarea>
        </div>

        <div class="mb-3">
            <label for="auteur" class="form-label">Auteur:</label>
            <input type="text" class="form-control" id="auteur" name="auteur"
                value="<?PHP echo $annonce["auteur"] ?? "" ?>" required>
        </div>

        <input type="submit" class="btn btn-primary"></input>
    </form>
</div>