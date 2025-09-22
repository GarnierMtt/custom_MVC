/*M!999999\- enable the sandbox mode */ 
-- MariaDB dump 10.19  Distrib 10.5.28-MariaDB, for debian-linux-gnu (x86_64)
--
-- Host: localhost    Database: matteo_geo
-- ------------------------------------------------------
-- Server version	10.5.28-MariaDB-0+deb11u1

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `categorie`
--

DROP TABLE IF EXISTS `categorie`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8mb4 */;
CREATE TABLE `categorie` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `categorie`
--

LOCK TABLES `categorie` WRITE;
/*!40000 ALTER TABLE `categorie` DISABLE KEYS */;
INSERT INTO `categorie` VALUES (1,'Gérer le patrimoine informatique'),(2,'Répondre aux incidents et aux demandes d’assistance et d’évolution'),(3,'Développer la présence en ligne de l’organisation'),(4,'Travailler en mode projet'),(5,'Mettre à disposition des utilisateurs un service informatique'),(6,'Organiser son développement professionnel');
/*!40000 ALTER TABLE `categorie` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `label`
--

DROP TABLE IF EXISTS `label`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8mb4 */;
CREATE TABLE `label` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `label`
--

LOCK TABLES `label` WRITE;
/*!40000 ALTER TABLE `label` DISABLE KEYS */;
INSERT INTO `label` VALUES (1,'Réalisation en cours de formation'),(2,'Réalisations en milieu professionnel en cours de première année'),(3,'Réalisations en milieu professionnel en cours de seconde année');
/*!40000 ALTER TABLE `label` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `realisation`
--

DROP TABLE IF EXISTS `realisation`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8mb4 */;
CREATE TABLE `realisation` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `intitulee` varchar(255) NOT NULL,
  `description` longtext DEFAULT NULL,
  `periodeStart` date NOT NULL,
  `periodeEnd` date DEFAULT NULL,
  `idLabel` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `fkLabel` (`idLabel`),
  CONSTRAINT `fkLabel` FOREIGN KEY (`idLabel`) REFERENCES `label` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `realisation`
--

LOCK TABLES `realisation` WRITE;
/*!40000 ALTER TABLE `realisation` DISABLE KEYS */;
INSERT INTO `realisation` VALUES (1,'test','un test','2025-06-18',NULL,2);
/*!40000 ALTER TABLE `realisation` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `relationCategorieRealisation`
--

DROP TABLE IF EXISTS `relationCategorieRealisation`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8mb4 */;
CREATE TABLE `relationCategorieRealisation` (
  `idCategorie` int(11) NOT NULL,
  `idRealisation` int(11) NOT NULL,
  PRIMARY KEY (`idRealisation`,`idCategorie`) USING BTREE,
  KEY `fkCategorie` (`idCategorie`),
  CONSTRAINT `fkCategorie` FOREIGN KEY (`idCategorie`) REFERENCES `categorie` (`id`),
  CONSTRAINT `fkRealisation` FOREIGN KEY (`idRealisation`) REFERENCES `realisation` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `relationCategorieRealisation`
--

LOCK TABLES `relationCategorieRealisation` WRITE;
/*!40000 ALTER TABLE `relationCategorieRealisation` DISABLE KEYS */;
/*!40000 ALTER TABLE `relationCategorieRealisation` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2025-09-22 14:23:14
