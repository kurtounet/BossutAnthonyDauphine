<div class="card" style="width: 18rem;">
    <img src="<?php echo ($annonce["imageUrl"]) ?>" class="card-img-top" alt="<?php echo ($annonce["titre"]) ?>">
    <div class="card-body">
        <h5 class="card-title"><?php echo ($annonce["titre"]) ?></h5>
        <p class="card-text"><?php echo ($annonce["contenu"]) ?></p>
        <p class="card-text">Auteur :<?php echo ($annonce["auteur"]) ?></p>
        <p class="card-text">Date de publication : <?php echo ($annonce["datePublication"]) ?></p>
        <a href="#" class="btn btn-primary">Go somewhere</a>
    </div>
</div>