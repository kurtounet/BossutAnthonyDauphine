<?php

session_start();
unset($_SESSION["username"]);
unset($_SESSION["password"]);
//On détruit toute la session
session_destroy();
header("Location: https://localhost/bossutanthonydauphine/index.php");
