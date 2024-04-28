<div class="card w-25">
    <img src="<?php echo ($annonce["imageUrl"]) ?>" class="card-img-top" alt="<?php echo ($annonce["titre"]) ?>">
    <div class="card-body">
        <h5 class="card-title text-primary"><?php echo ($annonce["titre"]) ?></h5>
        <p class=" card-text"><?php echo ($annonce["contenu"]) ?></p>
        <p class="card-text">Auteur :<?php echo ($annonce["auteur"]) ?></p>
        <p class="card-text">Date de publication : </p>
        <p class="card-text"><?php echo ($annonce["datePublication"]) ?></p>

    </div>
</div>