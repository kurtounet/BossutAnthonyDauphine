<?php


$title = "Login";
//On inclut le header
include_once ("block/header.php");
//On inclut le databaseManager
require_once ("utils/databaseManager.php");
$errors = [];
//On verifie si le formulaire est envoyé et que les variables existent
if ($_SERVER["REQUEST_METHOD"] === "POST" && isset($_POST["username"], $_POST["password"])) {
    //On se connecte a la base de donnée
    $pdo = connectDB();
    //On prepare la requête
    $query = $pdo->prepare("SELECT username, password FROM utilisateur WHERE username = :username");
    //On execute la requête
    $query->execute([":username" => $_POST["username"]]);
    //On récupère la ligne qui correspond  username 
    $user = $query->fetch();
    //On vérifie que la ligne existe et on compare le mot de passe haché par
    // password_verify avec le mot de passe haché de la bdd ($user["password"])

    if ($user !== false && password_verify($_POST["password"], $user["password"])) {
        //On lance la session
        session_start();
        //On enregistre le username dans la session
        $_SESSION["username"] = $user["username"];
        //On redirige vers la page admin
        header("Location: https://localhost/Bossutanthonydauphine/admin/index.php");
    } else {
        //On affiche un message d'erreur
        $errors["global"] = "Identifiants invalides";
    }
}

include_once ("block/navbar.php");
?>

<div class="container col-6">
    <h1 class="text-center m-3"><?php echo $title; ?></h1>

    <form method="POST" action="login.php">
        <div class="mb-3">
            <label for="username" class="form-label">Username</label>
            <input type="text" name="username" id="username" class="form-control">
        </div>
        <div class="mb-3">
            <label for="password" class="form-label">Password</label>
            <input type="password" name="password" id="password" class="form-control"> <?php
            if (isset($errors["global"])) {
                echo ("<p class='text-danger'>" .
                    $errors["global"] . "</p>");
            }
            ?>
        </div>
        <input type="submit" class="btn btn-primary"></input>
    </form>

    <?php
    if (isset($_SESSION["username"])) {
        include_once ("logoutForm.php");
    }
    ?>
</div>

<?php
include_once ("./block/footer.php");
?>