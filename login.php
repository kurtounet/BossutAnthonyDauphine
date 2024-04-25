<?php
ini_set('display_errors', 1);
error_reporting(E_ALL);

include_once ("./block/header.php");
require_once ("utils/databaseManager.php");
$title = "Login";

$errors = [];
//session_destroy();//..
// est ce que j'ai validé le form
var_dump($_SERVER["REQUEST_METHOD"]);

//var_dump($_POST["username"], $_POST["password"]);
if (
    $_SERVER["REQUEST_METHOD"] === "POST" &&
    isset($_POST["username"], $_POST["password"])
) {
    //Validation des données

    //Verifier si les identifiants
    $pdo = connectDB();
    var_dump($pdo);
    // Recuperer User avec les memes identifiants
    $response = $pdo->prepare("SELECT username, password FROM utilisateur WHERE username = :username AND password = :password");
    $response->execute([
        ":username" => $_POST["username"],
        ":password" => $_POST["password"]
    ]);

    $user = $response->fetch();

    // fetch renvoie false si il n'y a pas de resultat ou erreur
    if ($user !== false) {
        //Connexion réussie 
        //session_start();
        $_SESSION["username"] = $_POST["username"];
        var_dump($_SESSION["username"]);
        header("Location: http://localhost/examphp/admin/index.php");

    } else {
        $errors["global"] = "Identifiants invalides";
    }

} else {
    $errors["global"] = "Identifiants manquants";
}


include_once ("block/header.php");
?>

<div class="container">

    <h1 class="text-center m-3"><?php echo ($title) ?></h1>

    <form method="POST" action="login.php">

        <label for="username">Username</label>
        <input type="text" name="username" id="username" value="jose">
        <label for="password">Password</label>
        <input type="text" name="password" id="password" value="bove123">

        <?php
        if (isset($errors["global"])) {
            echo ("<p class='text-danger'>" .
                $errors["global"] . "</p>");
        }
        ?>

        <input type="submit" value="Valider">
    </form>

</div>



<?php
include_once ("block/footer.php");
?>