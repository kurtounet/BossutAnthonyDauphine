<?php
//session_start();
// Ce if permet de verifier la connexion, d'un utilisateur

if (!isset($_SESSION["username"])) {
    header("Location: https://localhost/examphp/login.php");
}

require_once ("../utils/databaseManager.php");
$title = "Admin";

include_once ("../block/header.php");

$pdo = connectDB();

?>

<div class="container">

    <h1 class="text-center"><?php echo ($title ?? "Default Title") ?></h1>

</div>

<?php
var_dump($_SESSION);
include_once ("../block/footer.php");
?>