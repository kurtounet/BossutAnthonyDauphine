<?php
/* 'http://localhost/SimoneauHugoDauphine/img/' . basename($_FILES['image']['name'])*/
$title = "Dauphine";

include_once("../block/header.php");
include_once("../utils/databaseManager.php");
$image = $_FILE["image"]["name"];
if (!isset($_GET["id"])) {
    $subtitle = "Nouvelle annonce";
    $para = "";
} else {
    $subtitle = "Modification de l'annonce";
    $para = "?id=" . $_GET["id"];
    $pdo = connectDB();
    $annonce = findAnnoncesById($pdo, $_GET["id"]);
    //var_dump($annonce);
}
//var_dump($_SERVER["REQUEST_METHOD"]);
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $pdo = connectDB();
    if (isset($_POST["imageUrl"], $_POST["contenu"], $_POST["titre"], $_POST["auteur"], $_POST["datePublication"])) {
        var_dump($_POST);
        if (!isset($_GET["id"])) {
            echo "Creation d'une nouvelle annonce";
            createAnnonce($pdo, $_POST["imageUrl"], $_POST["contenu"], $_POST["titre"], $_POST["auteur"], $_POST["datePublication"]);
        } else {
            echo "Modification d'une nouvelle annonce";
            updateAnnonce($pdo, $_GET["id"], $_POST["imageUrl"],  $_POST["contenu"], $_POST["titre"], $_POST["auteur"], $_POST["datePublication"]);
        }

        header("Location: index.php");
    }
}

// Etape 1 fichier present

?>

<div class="container col-6 ">



    <h1><?PHP echo ($subtitle ?? "Default Title") ?></h1>

    <form action="editeAnnonce.php<?PHP echo $para; ?>" method="post" class="mt-3">
        <div class="mb-3">
            <label for="titre" class="form-label">Titre:</label>
            <input type="text" class="form-control" id="titre" name="titre" value="<?PHP echo $annonce["titre"] ?? "" ?>" required>
        </div>

        <div class="mb-3">
            <div>
                <img src="<?PHP echo $annonce["imageUrl"] ?? "https://placehold.co/600x400" ?>" alt="" class="img-fluid">
            </div>
            <label for="imageUrl" class="form-label">Image URL:</label>
            <input type="text" class="form-control" id="imageUrl" name="imageUrl" value="<?PHP echo $annonce["imageUrl"] ?? "" ?>" required>
            <input type="file" name="image">
        </div>
        <div>

        </div>
        <div class="mb-3">
            <label for="contenu" class="form-label">Contenu:</label>
            <textarea class="form-control" id="contenu" name="contenu" rows="3" required><?PHP echo $annonce["contenu"] ?? "" ?></textarea>
        </div>

        <div class="mb-3">
            <label for="auteur" class="form-label">Auteur:</label>
            <input type="text" class="form-control" id="auteur" name="auteur" value="<?PHP echo $annonce["auteur"] ?? "" ?>" required>
        </div>

        <button type="submit" class="btn btn-primary">Submit</button>
    </form>

</div>