<div class="col-2 border border-primary border-2 rounded h-25">
    <h3><?php echo ($annonce["titre"]) ?></h3>
    <img src="<?php echo ($annonce["imageUrl"]) ?>" class="img-fluid">
    <P><?php echo ($annonce["contenu"]) ?></P>
    <p>Auteur :<?php echo ($annonce["auteur"]) ?></p>
    <p>Date de publication : <?php echo ($annonce["datePublication"]) ?></p>
</div>