<?php

if (isset($_FILES['avatar']) and $_FILES['avatar']['error'] == 0) {
    // Etape 2
    var_dump($_FILES['avatar']);
    if ($_FILES['avatar']['size'] <= 1000000) {
        //Etape 3
        $extension = $infosfichier['type'];
        $extensions_autorisees = array('.jpg', '.jpeg', '.gif', '.png');
        if (in_array($extension, $extensions_autorisees)) {
            //Etape 4
            $ok = move_uploaded_file($_FILES['avatar']['tmp_name'], 'assets/uploads/' . basename($_FILES['avatar']['name']));
            var_dump($ok);
            echo "L'envoi a bien été effectué !";
        } else {
            echo ('J\'accepte que les images ...');
        }
    } else {
        echo ('le fichier est trop lourd pour un petit serveur ... ');
    }
}

?>
<form method="post" enctype="multipart/form-data">
    <input type="file" name="avatar">
    <input type="submit">
</form>