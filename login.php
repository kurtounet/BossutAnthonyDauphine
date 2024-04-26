<?php
//session_start(); // Start session at the beginning

$title = "Login";
require_once("utils/databaseManager.php");
include_once("block/header.php");
//var_dump($_SESSION["username"], $_SESSION["password"]);
$errors = [];
/*
if (isset($_SESSION["username"])) {
    header("Location: https://localhost/Bossutanthonydauphine/admin/index.php");
}*/
if ($_SERVER["REQUEST_METHOD"] === "POST" && isset($_POST["username"], $_POST["password"])) {
    $pdo = connectDB();
    // var_dump($_POST["username"], $_POST["password"]);
    $query = $pdo->prepare("SELECT username, password FROM utilisateur WHERE username = :username");
    $query->execute([":username" => $_POST["username"]]);
    $user = $query->fetch();

    if ($user !== false && password_verify($_POST["password"], $user["password"])) {
        session_start();
        $_SESSION["username"] = $user["username"];
        header("Location: https://localhost/Bossutanthonydauphine/admin/index.php");
    } else {
        $errors["global"] = "Identifiants invalides";
    }
}

include_once("block/navbar.php");
?>

<div class="container">
    <h1 class="text-center m-3"><?php echo $title; ?></h1>

    <form method="POST" action="login.php">
        <label for="username">Username</label>
        <input type="text" name="username" id="username" value="jose">
        <label for="password">Password</label>
        <input type="password" name="password" id="password" value="jose123">

        <?php
        if (isset($errors["global"])) {
            echo ("<p class='text-danger'>" .
                $errors["global"] . "</p>");
        }
        ?>
        <input type="submit" value="Valider">
    </form>

    <?php
    if (isset($_SESSION["username"])) {
        include_once("logoutForm.php");
    }
    ?>
</div>

<?php
include_once("./block/footer.php");
?>