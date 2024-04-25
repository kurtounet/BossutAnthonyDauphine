<?php
$title = "Dauphine";

include_once ("block/header.php");
include_once ("./utils/databaseManager.php");
$pdo = connectDB();
$annonces = findAllAnnonces($pdo);
//var_dump($annonces);
?>
<form action="utilisateur.php?id=<?php echo $_GET['id'] ?>" method="post" class="container mt-3">
    <input type="hidden" id="id" name="id">
    <div class="mb-3">
        <label for="username" class="form-label">Username:</label>
        <input type="text" class="form-control" id="username" name="username" required>
    </div>
    <div class="mb-3">
        <label for="nom" class="form-label">Last Name:</label>
        <input type="text" class="form-control" id="nom" name="nom" required>
    </div>
    <div class="mb-3">
        <label for="prenom" class="form-label">First Name:</label>
        <input type="text" class="form-control" id="prenom" name="prenom" required>
    </div>
    <div class="mb-3">
        <label for="password" class="form-label">Password:</label>
        <input type="password" class="form-control" id="password" name="password" required>
    </div>
    <button type="submit" class="btn btn-success">Update</button>
</form>