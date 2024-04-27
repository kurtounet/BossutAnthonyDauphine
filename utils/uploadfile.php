<?php
function uploadFile()
{
    //On vérifie que le fichier est bien envoyé
    if (isset($_FILES['avatar']) and $_FILES['avatar']['error'] == 0) {

        // Etape 2 : on vérifie que la taille du fichier n'est pas sup a 1Mo
        if ($_FILES['avatar']['size'] <= 1000000) {

            //Etape 3 : on vérifie que l'extension est autorisée
            $extension = $_FILES['avatar']['type'];
            $extensions_autorisees = array('image/jpg', 'image/jpeg', 'image/gif', 'image/png');

            //Si l'extension est dans le tableau des extension autorisée            
            if (in_array($extension, $extensions_autorisees)) {
                //on upload le fichier dans le dossier assets/uploads 
                move_uploaded_file($_FILES['avatar']['tmp_name'], '../assets/uploads/' . basename($_FILES['avatar']['name']));
                echo "L'envoi a bien été effectué !";
                //et on retourne l'url
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