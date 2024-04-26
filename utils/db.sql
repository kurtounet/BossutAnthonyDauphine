-- --------------------------------------------------------
-- Hôte:                         127.0.0.1
-- Version du serveur:           8.0.30 - MySQL Community Server - GPL
-- SE du serveur:                Win64
-- HeidiSQL Version:             12.1.0.6537
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;


-- Listage de la structure de la base pour dauphineexam
CREATE DATABASE IF NOT EXISTS `dauphineexam` /*!40100 DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci */ /*!80016 DEFAULT ENCRYPTION='N' */;
USE `dauphineexam`;

-- Listage de la structure de table dauphineexam. annonce
CREATE TABLE IF NOT EXISTS `annonce` (
  `id` int NOT NULL AUTO_INCREMENT,
  `imageUrl` varchar(250) DEFAULT NULL,
  `contenu` text NOT NULL,
  `titre` varchar(250) NOT NULL,
  `auteur` varchar(250) NOT NULL,
  `datePublication` datetime NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `annonce_id_uindex` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=latin1;

-- Listage des données de la table dauphineexam.annonce : ~10 rows (environ)
INSERT INTO `annonce` (`id`, `imageUrl`, `contenu`, `titre`, `auteur`, `datePublication`) VALUES
	(1, 'https://placehold.co/400', 'Le dernier rapport sur le climat indique une augmentation alarmante des températures globales.', 'Urgence Climatique', 'Émilie Durand', '2024-04-25 08:00:00'),
	(2, 'https://placehold.co/400', 'Les autorités locales annoncent un nouveau plan pour améliorer les transports publics.', 'Nouveau Plan de Transport', 'Julien Martin', '2024-04-25 09:30:00'),
	(3, 'https://placehold.co/400', 'Une nouvelle étude montre les bienfaits de l\'alimentation bio sur la santé.', 'Bienfaits de l\'Alimentation Bio', 'Sophie Bernard', '2024-04-25 11:00:00'),
	(4, 'https://placehold.co/400', 'Le gouvernement propose un nouveau projet de loi pour la protection des données personnelles.', 'Protection des Données', 'Lucas Petit', '2024-04-25 13:00:00'),
	(5, 'https://placehold.co/400', 'Découverte scientifique majeure: des chercheurs ont identifié un possible traitement pour la maladie d\'Alzheimer.', 'Avancée dans le Traitement d\'Alzheimer', 'Clara Robert', '2024-04-25 14:30:00'),
	(6, 'https://placehold.co/400', 'Le festival de musique revient cette année avec des mesures de sécurité renforcées.', 'Retour du Festival de Musique', 'Thomas Richard', '2024-04-25 16:00:00'),
	(7, 'https://placehold.co/400', 'L\'équipe nationale se prépare pour les prochains championnats du monde de football.', 'Préparation pour le Mondial', 'Marie Dubois', '2024-04-26 08:00:00'),
	(8, 'https://placehold.co/400', 'Les marchés financiers en hausse suite à l\'annonce des nouvelles réformes économiques.', 'Réformes Économiques et Marchés', 'Alexandre Moreau', '2024-04-26 09:00:00'),
	(9, 'https://placehold.co/400', 'Un nouveau parc naturel est inauguré pour promouvoir la biodiversité et la conservation.', 'Inauguration d\'un Parc Naturel', 'Camille Lefebvre', '2024-04-26 10:30:00'),
	(10, 'https://placehold.co/400', 'Les écoles locales introduisent des programmes de soutien pour les élèves avec des besoins spéciaux.', 'Soutien aux Élèves Spéciaux', 'Louis Girard', '2024-04-26 12:00:00');

-- Listage de la structure de table dauphineexam. utilisateur
CREATE TABLE IF NOT EXISTS `utilisateur` (
  `id` int NOT NULL AUTO_INCREMENT,
  `username` varchar(250) NOT NULL,
  `nom` varchar(250) NOT NULL,
  `prenom` varchar(250) NOT NULL,
  `password` varchar(250) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `utilisateur_id_uindex` (`id`),
  UNIQUE KEY `utilisateur_login_uindex` (`username`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

-- Listage des données de la table dauphineexam.utilisateur : ~1 rows (environ)
INSERT INTO `utilisateur` (`id`, `username`, `nom`, `prenom`, `password`) VALUES
	(1, 'jose', 'Bové', 'Jose', '$2y$10$049yMQkSO3Jo3W4mMPYV7.Nuv9PUYEhG7tRnRnJQM7qHDyYlEyafu');

/*!40103 SET TIME_ZONE=IFNULL(@OLD_TIME_ZONE, 'system') */;
/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IFNULL(@OLD_FOREIGN_KEY_CHECKS, 1) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40111 SET SQL_NOTES=IFNULL(@OLD_SQL_NOTES, 1) */;
