<?php
$title = "Dauphine";

include_once ("../block/header.php");
include_once ("../utils/databaseManager.php");
//do = connectDB();
//$annonces = findAllAnnonces($pdo);
//var_dump($annonces);
?>
<h1>Nouvelle Annonce</h1>
<form action="handle_create_annonce.php" method="post" class="container mt-3">
    <div class="mb-3">
        <label for="imageUrl" class="form-label">Image URL:</label>
        <input type="text" class="form-control" id="imageUrl" name="imageUrl" required>
    </div>
    <div class="mb-3">
        <label for="contenu" class="form-label">Content:</label>
        <textarea class="form-control" id="contenu" name="contenu" rows="3" required></textarea>
    </div>
    <div class="mb-3">
        <label for="titre" class="form-label">Title:</label>
        <input type="text" class="form-control" id="titre" name="titre" required>
    </div>
    <div class="mb-3">
        <label for="auteur" class="form-label">Author:</label>
        <input type="text" class="form-control" id="auteur" name="auteur" required>
    </div>
    <div class="mb-3">
        <label for="datePublication" class="form-label">Publication Date:</label>
        <input type="datetime-local" class="form-control" id="datePublication" name="datePublication" required>
    </div>
    <button type="submit" class="btn btn-primary">Submit</button>
</form>