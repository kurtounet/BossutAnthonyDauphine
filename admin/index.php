<?php
session_start();
if (isset($_SESSION["username"]) === false) {
    header("Location: https://localhost/bossutanthonydauphine/login.php");
}
$title = "Admin";

require_once ("../utils/databaseManager.php");
include_once ("../block/header.php");
$pdo = connectDB();
$annonces = findAllAnnonces($pdo);
/*
$action = $_GET['action'];
if ($action === 'create') {
    include_once("create.php");
} elseif ($action === 'edit') {
    include_once("edit.php");
}*/

/*
$passHash = password_hash("admin", PASSWORD_DEFAULT);
echo ($passHash);
var_dump(password_verify("admin", $passHash));
*/
?>

<div class="container">

    <h1 class="text-center">Bienvenu <?php echo ($_SESSION["username"]) ?></h1>
    <div>
        <a href="../logout.php" class="btn btn-primary">Se deconnecter</a>
    </div>
    <h1 class="text-center"><?php echo ($title ?? "Default Title") ?></h1>
    <div>
        <a href="editeAnnonce.php" class="btn btn-primary m-3 ">Nouvelle annonce</a>
    </div>
    <div class="d-flex justify-content-evenly align-items-center flex-wrap gap-3">
        <?php
        foreach ($annonces as $annonce) {
            ?>
            <div class="row border border-primary border-2 rounded p-2 " style="height: 10%; width: 100%;">
                <div class="row">
                    <p class="col">Auteur : <?php echo ($annonce["auteur"]) ?></p>
                    <p class="col">Date de publication : <?php echo ($annonce["datePublication"]) ?></p>
                    <div style="width: 20%;height: 10%;">
                        <a href="editeAnnonce.php?id=<?php echo ($annonce["id"]) ?>" class="btn btn-primary">Modifier</a>
                        <a href="deleteAnnonce.php?id=<?php echo ($annonce["id"]) ?>" class="btn btn-danger">Supprimer</a>
                    </div>
                </div>
                <img src="<?php echo ($annonce["imageUrl"]) ?>" class="img-fluid" style="width: 10%;height: 10%;">
                <div class="col">
                    <h3><?php echo ($annonce["titre"]) ?></h3>
                    <p><?php echo ($annonce["contenu"]) ?></p>
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