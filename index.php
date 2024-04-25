<?php
require_once ("utils/databaseManager.php");
$title = "Dauphine";
include_once ("block/header.php");
var_dump($_SESSION);
session_destroy();

$pdo = connectDB();

$annonces = findAllAnnonce($pdo);
/*
$passHash = password_hash("admin", PASSWORD_DEFAULT);
echo ($passHash);
var_dump(password_verify("admin", $passHash));
*/
?>

<div class="container">
    <h1 class="text-center"><?php echo ($title ?? "Default Title") ?></h1>

    <div class="d-flex justify-content-evenly align-items-center flex-wrap gap-3">
        <?php
        foreach ($annonces as $annonce) {
            include ("block/annonce.php");
        }
        ?>
    </div>
</div>

<?php
include_once ("block/footer.php");
?>