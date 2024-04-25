<?php
require_once ("../utils/databaseManager.php");
$title = "Pokedex";
include_once ("../block/header.php");

if (isset($_SESSION["username"]) === false) {
    header("Location: https://localhost/pokedex-gaetan/login.php");
}

$pdo = connectDB();
$pokemons = findAllAnnonce($pdo);
$action = $_GET['action'];
if ($action === 'create') {
    include_once ("create.php");
} elseif ($action === 'edit') {
    include_once ("edit.php");
}

/*
$passHash = password_hash("admin", PASSWORD_DEFAULT);
echo ($passHash);
var_dump(password_verify("admin", $passHash));
*/
?>

<div class="container">

    <h1 class="text-center">Bienvenu <?php echo ($_SESSION["username"]) ?></h1>
    <h1 class="text-center"><?php echo ($title ?? "Default Title") ?></h1>
    <div>
        <a href="index.php?action=create" class="btn btn-primary">Nouveau Pokemon</a>
    </div>
    <div class="d-flex justify-content-evenly align-items-center flex-wrap gap-3">
        <?php
        foreach ($pokemons as $pokemon) {
            ?>
            <div class="col-3 border border-primary border-2 rounded h-25">
                <img src="<?php echo ($pokemon["image"]) ?>" class="img-fluid">
                <p><?php echo ($pokemon["nameFr"]) ?></p>
                <p><?php echo ($pokemon["pokedex_id"]) ?></p>
                <div d-flex justify-content-evenly text-danger>

                    <a href="index.php?action=detail&id=<?php echo ($pokemon["id"]) ?>">Détail</a>
                    <a href="crud.php?action=edit&id=<?php echo ($pokemon["id"]) ?>">Modifier</a>
                    <a href="crud.php?action=delete&id=<?php echo ($pokemon["id"]) ?>">Supprimer</a>
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