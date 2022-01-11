CREATE DATABASE  IF NOT EXISTS `datamanager` /*!40100 DEFAULT CHARACTER SET utf8 */ /*!80016 DEFAULT ENCRYPTION='N' */;
USE `datamanager`;
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
INSERT INTO `etudiant` VALUES ('16Y2343','engiina vane core','F','etudiant',1),('17T8739','MBANGA STEVE AUDREY','M','etudiant',1),('18U2456','Toussi vane deode','M','etudiant',1),('19Y5611','doena melda m','F','etudiant',1),('20H2345','angi yenda willie','F','etudiant',1),('21Y3467','kamar dongo lagui','M','etudiant',1);
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
  `module_filiere` varchar(20) NOT NULL,
  PRIMARY KEY (`etudiant_matricule`,`module_code`,`module_filiere`),
  KEY `fk_etudiant_has_module_etudiant1_idx` (`etudiant_matricule`),
  KEY `fk_etudiant_has_module_module1_idx` (`module_code`,`module_filiere`),
  CONSTRAINT `fk_etudiant_has_module` FOREIGN KEY (`module_code`, `module_filiere`) REFERENCES `module` (`code`, `filiere`),
  CONSTRAINT `fk_etudiant_has_module_etudiant1` FOREIGN KEY (`etudiant_matricule`) REFERENCES `etudiant` (`matricule`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `evaluer`
--

LOCK TABLES `evaluer` WRITE;
/*!40000 ALTER TABLE `evaluer` DISABLE KEYS */;
INSERT INTO `evaluer` VALUES ('16Y2343','INF2013',67,'INFORMATIQUE'),('16Y2343','MAT2023',6,'INFORMATIQUE'),('17T8739','MAT1031',67,'MATHEMATIQUE'),('17T8739','PHY1021',NULL,'MATHEMATIQUE'),('19Y5611','MAT1031',89,'MATHEMATIQUE'),('19Y5611','PHY1021',-1,'MATHEMATIQUE'),('20H2345','MAT1031',-1,'MATHEMATIQUE'),('20H2345','PHY1021',56,'MATHEMATIQUE'),('21Y3467','INF2013',45.1,'INFORMATIQUE'),('21Y3467','MAT2023',0,'INFORMATIQUE');
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
  `filiere` varchar(20) NOT NULL,
  `nom` varchar(45) DEFAULT NULL,
  `professeur_id` int NOT NULL,
  `niveau` varchar(2) NOT NULL,
  PRIMARY KEY (`code`,`filiere`),
  KEY `fk_module_professeur1_idx` (`professeur_id`),
  CONSTRAINT `fk_module_professeur1` FOREIGN KEY (`professeur_id`) REFERENCES `professeur` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `module`
--

LOCK TABLES `module` WRITE;
/*!40000 ALTER TABLE `module` DISABLE KEYS */;
INSERT INTO `module` VALUES ('INF2013','INFORMATIQUE','base de données',1,'L2'),('MAT1031','MATHEMATIQUE','fonction',2,'L1'),('MAT2023','INFORMATIQUE','nombre reel',2,'L2'),('PHY1021','MATHEMATIQUE','les forces',3,'L1');
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
  `email` varchar(45) DEFAULT NULL,
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
INSERT INTO `professeur` VALUES (1,'Dr Macro Germain','M','professeur',1,'bonjour','tabuguiafrank@gmail.com'),(2,'Prof Endma Carlos','M','professeur',1,'bonjour',NULL),(3,'Dr Mardon Evie','F','professeur',1,'bonjour','tabuguiafrank@gmail.com');
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

-- Dump completed on 2022-01-11 22:20:02
