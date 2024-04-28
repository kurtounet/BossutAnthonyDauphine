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


-- Listage de la structure de la base pour dauphineexamor
CREATE DATABASE IF NOT EXISTS `dauphineexamor` /*!40100 DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci */ /*!80016 DEFAULT ENCRYPTION='N' */;
USE `dauphineexamor`;

-- Listage de la structure de table dauphineexamor. annonce
CREATE TABLE IF NOT EXISTS `annonce` (
  `id` int NOT NULL AUTO_INCREMENT,
  `imageUrl` varchar(250) DEFAULT NULL,
  `contenu` text NOT NULL,
  `titre` varchar(250) NOT NULL,
  `auteur` varchar(250) NOT NULL,
  `datePublication` datetime NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `annonce_id_uindex` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=61 DEFAULT CHARSET=latin1;

-- Listage des données de la table dauphineexamor.annonce : ~5 rows (environ)
INSERT INTO `annonce` (`id`, `imageUrl`, `contenu`, `titre`, `auteur`, `datePublication`) VALUES
	(54, 'https://localhost/bossutanthonydauphine/assets/uploads/lotus.png', 'Nouvelle annonce placeholder image', 'Nouvelle annonce placeholder image 9:25 -> Modifier à 9:39 ', 'placeholder', '2024-04-27 11:36:10'),
	(57, 'https://localhost/bossutanthonydauphine/assets/uploads/lotus.png', 'Nouvelle annonce -> Modification image + titre + contenu + auteur', 'Nouvelle annonce -> Modification image + titre + contenu + auteur 2', 'Lotus', '2024-04-27 09:32:53'),
	(58, 'https://localhost/bossutanthonydauphine/assets/uploads/oiseau.png', 'Nouvelle annonce lotus -> Modification image + titre + contenu + auteur ->oiseau', 'Nouvelle annonce lotus -> Modification image + titre + contenu + auteur ->oiseau', 'auteur ->oiseau', '2024-04-27 09:35:56'),
	(59, 'https://placehold.co/400', 'Nouvelle annonce : date  27/04/24 9:36', 'Nouvelle annonce : date 27/04/24 9:37 -> modifier à  9:37', 'Anthony', '2024-04-27 09:38:43'),
	(60, 'https://localhost/bossutanthonydauphine/assets/uploads/oiseau.png', 'Ma Nouvelle annonce placehold -> oiseau', 'Ma Nouvelle annonce placehold -> Modif tout ', 'Moi -> oiseau', '2024-04-27 12:36:09');

-- Listage de la structure de table dauphineexamor. utilisateur
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

-- Listage des données de la table dauphineexamor.utilisateur : ~0 rows (environ)
INSERT INTO `utilisateur` (`id`, `username`, `nom`, `prenom`, `password`) VALUES
	(1, 'jose', 'Bové', 'Jose', '$2y$10$049yMQkSO3Jo3W4mMPYV7.Nuv9PUYEhG7tRnRnJQM7qHDyYlEyafu');

/*!40103 SET TIME_ZONE=IFNULL(@OLD_TIME_ZONE, 'system') */;
/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IFNULL(@OLD_FOREIGN_KEY_CHECKS, 1) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40111 SET SQL_NOTES=IFNULL(@OLD_SQL_NOTES, 1) */;
