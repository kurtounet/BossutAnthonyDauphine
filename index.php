<?php
$title = "Dauphine";

include_once ("block/header.php");
include_once ("./utils/databaseManager.php");
$pdo = connectDB();
$annonces = findAllAnnonces($pdo);
//var_dump($annonces);
?>

<div class="container">
    <h1 class="text-center"><?php echo ($title ?? "Default Title") ?></h1>
    <div class="d-flex justify-content-evenly align-items-center flex-wrap gap-3">
        <?php
        foreach ($annonces as $annonce) {
            include ("./block/annonce.php");
        }
        ?>


    </div>

    <?php
    include_once ("block/footer.php");
    ?>