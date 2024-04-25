<?php
if (isset($_GET["id"]) === false) {
    header("Location: https://localhost/pokedex/index.php");
}

require_once("utils/databaseManager.php");

$pdo = connectDB();

$id = $_GET["id"];

$pokemon = findPokemonById($pdo, $id);

$title = $pokemon["nameFr"];
include_once("block/header.php");



?>

<div class="container">

    <h1 class="text-center"><?php echo ($title ?? "Default Title") ?></h1>

    <div class="d-flex">
        <img class="h-25" src="<?php echo ($pokemon["image"]) ?>">
        <div>
            <p>Numéro Pokedex: <?php echo ($pokemon["pokedex_id"]) ?></p>
            <p>Géneration : <?php echo ($pokemon["generation"]) ?></p>
            <p>Catégorie : <?php echo ($pokemon["category"]) ?></p>
            <p>Poids: <?php echo ($pokemon["weight"]) ?></p>
            <p>Taille : <?php echo ($pokemon["height"]) ?></p>
            <p>Taux de capture : <?php echo ($pokemon["catchRate"]) ?></p>
        </div>
    </div>


    <?php
    include_once("block/footer.php");

    var_dump($pokemon);

    ?>