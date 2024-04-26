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

function findAllAnnonce(PDO $pdo): array
{
    $reponse = $pdo->query('SELECT * FROM annonce ');
    return $reponse->fetchAll();
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
    echo "Modification d'une annonce";
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
