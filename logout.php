<?php
//On deconnecte
session_start();
//On détruit les variables de session
unset($_SESSION["username"]);
unset($_SESSION["password"]);
//On détruit toute la session
session_destroy();
//On redirige vers l'accueil
header("Location: https://localhost/bossutanthonydauphine/index.php");
