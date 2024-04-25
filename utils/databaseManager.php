<?php

function connectDB(): PDO
{

    try {

        $host = "localhost";
        $databaseName = "dauphineexam";
        $user = "root";
        $password = "";

        $pdo = new PDO("mysql:host=" . $host . ";port=3306;dbname=" . $databaseName . ";charset=utf8", $user, $password);

        configPdo($pdo);

        return $pdo;
    } catch (Exception $e) {

        //Lancer l'erreur
        //throw $e;

        echo ("Erreur à la connexion: " . $e->getMessage());

        exit();
    }
}

function configPdo(PDO $pdo): void
{
    // Recevoir les erreurs PDO ( coté SQL )
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    // Choisir les indices dans les fetchs
    $pdo->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
}

function findAllAnnonces(PDO $pdo): array
{

    $reponse = $pdo->query("SELECT * FROM annonce ORDER BY datePublication DESC");
    return $reponse->fetchAll();
}
function findAnnoncesById(PDO $pdo, $id): array
{

    $params = [':id' => $id];
    $reponse = $pdo->prepare("SELECT * FROM annonce WHERE id = :id");
    $reponse->execute($params);
    return $reponse->fetch();
}
function createAnnonce($pdo, $imageUrl, $contenu, $titre, $auteur, $datePublication)
{
    $params = [
        ':imageUrl' => $imageUrl,
        ':contenu' => $contenu,
        ':titre' => $titre,
        ':auteur' => $auteur,
        ':datePublication' => $datePublication
    ];
    $stmt = $pdo->prepare("INSERT INTO annonce (imageUrl, contenu, titre, auteur, datePublication) VALUES (:imageUrl, :contenu, :titre, :auteur, :datePublication)");
    $stmt->execute($params);
}




function updateAnnonce($pdo, $id, $imageUrl, $contenu, $titre, $auteur, $datePublication)
{
    $params = [
        ':id' => $id,
        ':imageUrl' => $imageUrl,
        ':contenu' => $contenu,
        ':titre' => $titre,
        ':auteur' => $auteur,
        ':datePublication' => $datePublication
    ];
    $stmt = $pdo->prepare("UPDATE annonce SET imageUrl = :imageUrl, contenu = :contenu, titre = :titre, auteur = :auteur, datePublication = :datePublication WHERE id = :id");
    $stmt->execute($params);
}

function deleteAnnonce($pdo, $id)
{
    $params = [':id' => $id];
    $stmt = $pdo->prepare("DELETE FROM annonce WHERE id = :id");
    $stmt->execute($params);
}

### PHP Functions for `utilisateur` Table

function createUser($pdo, $username, $nom, $prenom, $password)
{
    $params = [
        ':username' => $username,
        ':nom' => $nom,
        ':prenom' => $prenom,
        ':password' => password_hash($password, PASSWORD_DEFAULT) // Hash the password
    ];
    $stmt = $pdo->prepare("INSERT INTO utilisateur (username, nom, prenom, password) VALUES (:username, :nom, :prenom, :password)");
    $stmt->execute($params);
}

function readUser($pdo, $id)
{
    $params = [':id' => $id];
    $stmt = $pdo->prepare("SELECT * FROM utilisateur WHERE id = :id");
    $stmt->execute($params);
    return $stmt->fetch(PDO::FETCH_ASSOC);
}

function updateUser($pdo, $id, $username, $nom, $prenom, $password)
{
    $params = [
        ':id' => $id,
        ':username' => $username,
        ':nom' => $nom,
        ':prenom' => $prenom,
        ':password' => password_hash($password, PASSWORD_DEFAULT)
    ];
    $stmt = $pdo->prepare("UPDATE utilisateur SET username = :username, nom = :nom, prenom = :prenom, password = :password WHERE id = :id");
    $stmt->execute($params);
}

function deleteUser($pdo, $id)
{
    $params = [':id' => $id];
    $stmt = $pdo->prepare("DELETE FROM utilisateur WHERE id = :id");
    $stmt->execute($params);
}
