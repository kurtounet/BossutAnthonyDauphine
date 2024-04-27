<?php
session_start();
if (!isset($_SESSION["username"])) {
    header("Location: https://localhost/bossutanthonydauphine/login.php");
}
$title = "Admin";
require_once ("../utils/databaseManager.php");
include_once ("../block/header.php");
$pdo = connectDB();
$annonces = findAllAnnonces($pdo);
$nbannonces = count($annonces);
?>

<div class="container">

    <h1 class="text-center">Bienvenu <?php echo ($_SESSION["username"]) ?></h1>
    <a href="../logout.php" class="btn btn-danger">Se deconnecter</a>
    <h1 class="text-center"><?php echo ($title ?? "Default Title") ?></h1>
    <a href="editeAnnonce.php" class="btn btn-success m-3 ">Nouvelle annonce</a>
    <h3>Nombre d'annonces : <?php echo ($nbannonces) ?></h3>
    <div class="d-flex justify-content-evenly align-items-center flex-wrap gap-2">
        <?php
        foreach ($annonces as $annonce) {
            ?>
            <div class="row border border-primary border-2 rounded p-2 " style="height: 10%; width: 100%;">
                <img src="<?php echo ($annonce["imageUrl"]) ?>" class="img-fluid" style="width: 10%;height: 10%;">
                <div class="col  m-0">
                    <h3 class="m-0"><?php echo ($annonce["titre"]) ?></h3>
                    <p><?php echo ($annonce["contenu"]) ?></p>
                </div>
                <div class="row  m-0 p-0">
                    <p class="col">Auteur : <?php echo ($annonce["auteur"]) ?></p>
                    <p class="col">Date de publication : <?php echo ($annonce["datePublication"]) ?></p>
                    <div class="col" style="width: 20%;height: 10%;">
                        <a href="editeAnnonce.php?id=<?php echo ($annonce["id"]) ?>" class="btn btn-primary">Modifier</a>
                        <a href="deleteAnnonce.php?id=<?php echo ($annonce["id"]) ?>" class="btn btn-danger">Supprimer</a>
                    </div>
                </div>
            </div>
            <?php
        }
        ?>
    </div>
</div>
<?php
include_once ("../block/footer.php");
?>