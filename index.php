<?php
$title = "Dauphine";
//On inclut le header
include_once ("block/header.php");
//On inclut le databaseManager
require_once ("utils/databaseManager.php");
//On se connecte a la base de donnée
$pdo = connectDB();
//On récupère toutes les annonces
$annonces = findAllAnnonces($pdo);

?>

<div class="container">
    <h1 class="text-center"><?php echo ($title ?? "Default Title") ?></h1>

    <div class="d-flex justify-content-evenly align-items-center flex-wrap gap-3">
        <?php
        //On affiche les annonces
        foreach ($annonces as $annonce) {
            include ("block/annonce.php");
        }
        ?>
    </div>
</div>

<?php
include_once ("block/footer.php");
?>