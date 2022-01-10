-- MySQL dump 10.13  Distrib 8.0.27, for Win64 (x86_64)
--
-- Host: 127.0.0.1    Database: datamanager
-- ------------------------------------------------------
-- Server version	8.0.23

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!50503 SET NAMES utf8 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `administrateur`
--

DROP TABLE IF EXISTS `administrateur`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `administrateur` (
  `id` int NOT NULL AUTO_INCREMENT,
  `nom` varchar(45) NOT NULL,
  `sexe` char(1) NOT NULL,
  `reference` varchar(20) NOT NULL DEFAULT 'administrateur',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `administrateur`
--

LOCK TABLES `administrateur` WRITE;
/*!40000 ALTER TABLE `administrateur` DISABLE KEYS */;
INSERT INTO `administrateur` VALUES (1,'ATAGANG GLORE STEVIN','M','administrateur');
/*!40000 ALTER TABLE `administrateur` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `etudiant`
--

DROP TABLE IF EXISTS `etudiant`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `etudiant` (
  `matricule` varchar(7) NOT NULL,
  `nom` varchar(45) NOT NULL,
  `sexe` char(1) NOT NULL,
  `filiere` varchar(20) NOT NULL,
  `reference` varchar(45) NOT NULL DEFAULT 'etudiant',
  `administrateur_id` int NOT NULL,
  PRIMARY KEY (`matricule`),
  KEY `fk_etudiant_administrateur_idx` (`administrateur_id`),
  CONSTRAINT `fk_etudiant_administrateur` FOREIGN KEY (`administrateur_id`) REFERENCES `administrateur` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `etudiant`
--

LOCK TABLES `etudiant` WRITE;
/*!40000 ALTER TABLE `etudiant` DISABLE KEYS */;
INSERT INTO `etudiant` VALUES ('20H2345','angi yenda willie','F','MATHEMATIQUE','etudiant',1),('21Y3467','kamar dongo lagui','M','INFORMATIQUE','etudiant',1);
/*!40000 ALTER TABLE `etudiant` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `evaluer`
--

DROP TABLE IF EXISTS `evaluer`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `evaluer` (
  `etudiant_matricule` varchar(7) NOT NULL,
  `module_code` varchar(7) NOT NULL,
  `note` float DEFAULT NULL,
  PRIMARY KEY (`etudiant_matricule`,`module_code`),
  KEY `fk_etudiant_has_module_module1_idx` (`module_code`),
  KEY `fk_etudiant_has_module_etudiant1_idx` (`etudiant_matricule`),
  CONSTRAINT `fk_etudiant_has_module_etudiant1` FOREIGN KEY (`etudiant_matricule`) REFERENCES `etudiant` (`matricule`),
  CONSTRAINT `fk_etudiant_has_module_module1` FOREIGN KEY (`module_code`) REFERENCES `module` (`code`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `evaluer`
--

LOCK TABLES `evaluer` WRITE;
/*!40000 ALTER TABLE `evaluer` DISABLE KEYS */;
INSERT INTO `evaluer` VALUES ('20H2345','MAT1031',NULL),('20H2345','PHY1021',NULL),('21Y3467','INF2013',NULL),('21Y3467','MAT2023',NULL);
/*!40000 ALTER TABLE `evaluer` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `module`
--

DROP TABLE IF EXISTS `module`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `module` (
  `code` varchar(7) NOT NULL,
  `nom` varchar(45) DEFAULT NULL,
  `professeur_id` int NOT NULL,
  PRIMARY KEY (`code`),
  KEY `fk_module_professeur1_idx` (`professeur_id`),
  CONSTRAINT `fk_module_professeur1` FOREIGN KEY (`professeur_id`) REFERENCES `professeur` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `module`
--

LOCK TABLES `module` WRITE;
/*!40000 ALTER TABLE `module` DISABLE KEYS */;
INSERT INTO `module` VALUES ('INF2013','base de données',1),('MAT1031','fonction',2),('MAT2023','nombre reel',2),('PHY1021','les forces',3);
/*!40000 ALTER TABLE `module` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `professeur`
--

DROP TABLE IF EXISTS `professeur`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `professeur` (
  `id` int NOT NULL AUTO_INCREMENT,
  `nom` varchar(45) NOT NULL,
  `sexe` char(1) NOT NULL,
  `reference` varchar(45) NOT NULL DEFAULT 'professeur',
  `administrateur_id` int NOT NULL,
  `code` varchar(255) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_professeur_administrateur1_idx` (`administrateur_id`),
  CONSTRAINT `fk_professeur_administrateur1` FOREIGN KEY (`administrateur_id`) REFERENCES `administrateur` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `professeur`
--

LOCK TABLES `professeur` WRITE;
/*!40000 ALTER TABLE `professeur` DISABLE KEYS */;
INSERT INTO `professeur` VALUES (1,'Dr Macro Germain','M','professeur',1,'bonjour'),(2,'Prof EndMa Carlos','M','professeur',1,'bonjour'),(3,'Dr Mardon Evie','F','professeur',1,'bonjour');
/*!40000 ALTER TABLE `professeur` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2022-01-10  8:02:26
