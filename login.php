<?php

$title = "Login";
require_once ("utils/databaseManager.php");
include_once ("block/header.php");
var_dump($_SESSION);


$errors = [];
//var_dump($_SERVER["REQUEST_METHOD"]);
//var_dump($_POST["username"], $_POST["password"]);
// est ce que j'ai validé le form
if (
    $_SERVER["REQUEST_METHOD"] === "POST" &&
    isset($_POST["username"], $_POST["password"])
) {
    $pdo = connectDB();
    $query = $pdo->prepare("SELECT username, password FROM utilisateur WHERE username = :username AND password = :password");
    $query->execute([
        ":username" => $_POST["username"],
        ":password" => $_POST["password"]
    ]); // on execute la requête
    $user = $query->fetch();
    var_dump($user);
    if ($user !== false) {
        //Verifier le mot de passe
        if ($_POST["password"] === $user["password"]) {

            $_SESSION["username"] = $_POST["username"];
            //Redirection
            header("Location: https://localhost/examphp/admin/index.php");
        } else {
            $errors["global"] = "Identifiants invalides";
        }
    } else {
        $errors["global"] = "Identifiants invalides";
    }
}


include_once ("./block/header.php");
include_once ("./block/navbar.php");
?>

<div class="container">
    <h1 class="text-center m-3"><?php echo ($title) ?></h1>

    <form method="POST" action="login.php">

        <label for="username">Username</label>
        <input type="text" name="username" id="username" value="jose">
        <label for="password">Password</label>
        <input type="text" name="password" id="password" value="jose123">

        <?php
        if (isset($errors["global"])) {
            echo ("<p class='text-danger'>" .
                $errors["global"] . "</p>");
        }
        ?>
        <input type="submit" value="Valider">
    </form>

    <?php
    if (!isset($_SESSION)) {
        session_start();
    }

    if (isset($_SESSION["username"])) {
        include_once ("logoutForm.php");
    }
    ?>
</div>


<?php
include_once ("./block/footer.php");
?>