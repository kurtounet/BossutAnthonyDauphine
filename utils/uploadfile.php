<?php
function uploadFile()
{
    if (isset($_FILES['avatar']) and $_FILES['avatar']['error'] == 0) {
        // Etape 2
        var_dump($_FILES['avatar']);
        if ($_FILES['avatar']['size'] <= 1000000) {
            //Etape 3

            $extension = $_FILES['avatar']['type'];
            var_dump($extension);
            $extensions_autorisees = array('image/jpg', 'image/jpeg', 'image/gif', 'image/png');
            if (in_array($extension, $extensions_autorisees)) {
                //Etape 4
                move_uploaded_file($_FILES['avatar']['tmp_name'], '../assets/uploads/' . basename($_FILES['avatar']['name']));
                echo "L'envoi a bien été effectué !";
                return 'https://localhost/bossutanthonydauphine/assets/uploads/' . basename($_FILES['avatar']['name']);
            } else {
                echo ('J\'accepte que les images ...');
            }
        } else {
            echo ('le fichier est trop lourd pour un petit serveur ... ');
        }
    }
}

?>