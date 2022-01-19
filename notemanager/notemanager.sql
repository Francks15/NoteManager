-- MySQL dump 10.13  Distrib 8.0.23, for Win64 (x86_64)
--
-- Host: localhost    Database: notemanager
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
-- Table structure for table `admins`
--
CREATE SCHEMA IF NOT EXISTS `notemanager` DEFAULT CHARACTER SET utf8 ;
USE `notemanager` ;

DROP TABLE IF EXISTS `admins`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `admins` (
  `id` int NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `added_by` varchar(200) NOT NULL,
  `created` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `admins`
--

LOCK TABLES `admins` WRITE;
/*!40000 ALTER TABLE `admins` DISABLE KEYS */;
INSERT INTO `admins` VALUES (1,'admin','admin@email.com','d033e22ae348aeb5660fc2140aec35850c4da997','admin',''),(2,'yuri','yuri@email.com','aaf6fd97230863eae371b8b6c4c40693d5d84b30','admin','2022-01-18 14:20:01');
/*!40000 ALTER TABLE `admins` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `comments`
--

DROP TABLE IF EXISTS `comments`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `comments` (
  `id` int NOT NULL AUTO_INCREMENT,
  `matricule` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `comment` text NOT NULL,
  `created` varchar(255) NOT NULL,
  `status` tinyint NOT NULL DEFAULT '0',
  `post_id` int NOT NULL,
  PRIMARY KEY (`id`),
  KEY `post_id` (`post_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `comments`
--

LOCK TABLES `comments` WRITE;
/*!40000 ALTER TABLE `comments` DISABLE KEYS */;
/*!40000 ALTER TABLE `comments` ENABLE KEYS */;
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
  `reference` varchar(20) DEFAULT 'etudiant',
  PRIMARY KEY (`matricule`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `etudiant`
--

LOCK TABLES `etudiant` WRITE;
/*!40000 ALTER TABLE `etudiant` DISABLE KEYS */;
INSERT INTO `etudiant` VALUES ('16Y2343','engiina vane core','F','etudiant'),('17T8739','MBANGA STEVE AUDREY','M','etudiant'),('18J2354','FOLDIO DOSMIE','F','etudiant'),('18T2380','JNDI MEACE JODEC','M','etudiant'),('18T2485','FMEND DOEN','M','etudiant'),('18T2499','AUIDISI ALIAN','M','etudiant'),('18T2586','ALLDIE JDOE','M','etudiant'),('18T2677','GEMDOPE DLIEO','F','etudiant'),('18T2768','STASME MLEXGRAN','M','etudiant'),('18T2770','LEOD JIENO','F','etudiant'),('18T2804','FADOZE HEMDE','M','etudiant'),('18T2897','FUDIUE MNDIZA','F','etudiant'),('18U2456','Toussi vane deode','M','etudiant'),('19M2117','TYNUI JEAN STEVE','M','etudiant'),('19M2171','DAVID NDOEFE SETEME','M','etudiant'),('19M2366','NDICDO ANDHEO','M','etudiant'),('19M2367','DINCD ODEQ','M','etudiant'),('19M2369','HIOLDI EISO','M','etudiant'),('19M2379','OWNDHO MSODIE','F','etudiant'),('19M2382','NDIOS JDLSE ','M','etudiant'),('19M2390','KALXDO OWAOD','M','etudiant'),('19M2399','FIDUHO HDOE','F','etudiant'),('19M2425','ARNOLD AMODE','M','etudiant'),('19M2439','JEAN ENSLE','M','etudiant'),('19M2441','MAODFO SMEJE','F','etudiant'),('19M2451','IHNES NEOSA','F','etudiant'),('19M2452','DOCNDL DOSNAL','M','etudiant'),('19M2466','FAKCID COEMSE','M','etudiant'),('19M2482','JIDOEN','F','etudiant'),('19M2483','ARMA MECLI DOSAOI','M','etudiant'),('19M2484','BIDMAI SOLEID','F','etudiant'),('19M2500','WNAOEN AUEYI','M','etudiant'),('19M2514','LDODLE NAMDIE','F','etudiant'),('19M2515','DAULD NDKINGA','M','etudiant'),('19M2527','HASENDE','M','etudiant'),('19M2529','AIEDY DILSI','M','etudiant'),('19M2540','INCEI CELDIE LSEIOA','F','etudiant'),('19M2603','NEDOE AMEIND JOSR','M','etudiant'),('19M2617','AZODE JODIE','F','etudiant'),('19M2627','KOEX MIDEO ','F','etudiant'),('19M2682','MCIED AUDEI','F','etudiant'),('19P2143','ALSOIU EODKO MATIDL','M','etudiant'),('19T2643','FCDEOD CHDOE','M','etudiant'),('19Y5611','doena melda m','F','etudiant'),('20H2345','angi yenda willie','F','etudiant'),('21Y3467','kamar dongo lagui','M','etudiant');
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
  `note_cc` float DEFAULT NULL,
  `note_tp` float DEFAULT NULL,
  `note_ee` float DEFAULT NULL,
  `module_filiere` varchar(20) NOT NULL,
  PRIMARY KEY (`etudiant_matricule`,`module_code`,`module_filiere`),
  KEY `fk_module_has_etudiant_etudiant1_idx` (`etudiant_matricule`),
  KEY `fk_module_has_etudiant_module1_idx` (`module_code`,`module_filiere`),
  CONSTRAINT `fk_module_has_etudiant_etudiant1` FOREIGN KEY (`etudiant_matricule`) REFERENCES `etudiant` (`matricule`),
  CONSTRAINT `fk_module_has_etudiant_module1` FOREIGN KEY (`module_code`, `module_filiere`) REFERENCES `module` (`codeu`, `filiere`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `evaluer`
--

LOCK TABLES `evaluer` WRITE;
/*!40000 ALTER TABLE `evaluer` DISABLE KEYS */;
INSERT INTO `evaluer` VALUES ('16Y2343','INF2013',12.67,0,15,'INFORMATIQUE'),('16Y2343','MAT2023',14.34,0,45.5,'INFORMATIQUE'),('17T8739','MAT1031',12.07,0,54.55,'MATHEMATIQUE'),('17T8739','PHY1021',23,0,67,'MATHEMATIQUE'),('18J2354','MAT2043',NULL,NULL,NULL,'PHYSIQUE'),('18J2354','PHY2013',NULL,NULL,NULL,'PHYSIQUE'),('18J2354','PHY2023',NULL,NULL,NULL,'PHYSIQUE'),('18T2380','MAT1031',NULL,NULL,NULL,'MATHEMATIQUE'),('18T2380','MAT1042',NULL,NULL,NULL,'MATHEMATIQUE'),('18T2380','PHY1021',NULL,NULL,NULL,'MATHEMATIQUE'),('18T2485','INF1011',NULL,NULL,NULL,'INFORMATIQUE'),('18T2485','INF1021',NULL,NULL,NULL,'INFORMATIQUE'),('18T2485','PHY1031',NULL,NULL,NULL,'INFORMATIQUE'),('18T2499','INF2013',NULL,NULL,NULL,'INFORMATIQUE'),('18T2499','INF2063',NULL,NULL,NULL,'INFORMATIQUE'),('18T2499','MAT2023',NULL,NULL,NULL,'INFORMATIQUE'),('18T2586','MAT1031',NULL,NULL,NULL,'MATHEMATIQUE'),('18T2586','MAT1042',NULL,NULL,NULL,'MATHEMATIQUE'),('18T2586','PHY1021',NULL,NULL,NULL,'MATHEMATIQUE'),('18T2677','MAT2043',NULL,NULL,NULL,'PHYSIQUE'),('18T2677','PHY2013',NULL,NULL,NULL,'PHYSIQUE'),('18T2677','PHY2023',NULL,NULL,NULL,'PHYSIQUE'),('18T2768','INF2013',NULL,NULL,NULL,'INFORMATIQUE'),('18T2768','INF2063',NULL,NULL,NULL,'INFORMATIQUE'),('18T2768','MAT2023',NULL,NULL,NULL,'INFORMATIQUE'),('18T2770','MAT1031',NULL,NULL,NULL,'MATHEMATIQUE'),('18T2770','MAT1042',NULL,NULL,NULL,'MATHEMATIQUE'),('18T2770','PHY1021',NULL,NULL,NULL,'MATHEMATIQUE'),('18T2804','MAT1031',NULL,NULL,NULL,'MATHEMATIQUE'),('18T2804','MAT1042',NULL,NULL,NULL,'MATHEMATIQUE'),('18T2804','PHY1021',NULL,NULL,NULL,'MATHEMATIQUE'),('18T2897','INF1011',NULL,NULL,NULL,'INFORMATIQUE'),('18T2897','INF1021',NULL,NULL,NULL,'INFORMATIQUE'),('18T2897','PHY1031',NULL,NULL,NULL,'INFORMATIQUE'),('19M2117','MAT1042',NULL,NULL,NULL,'MATHEMATIQUE'),('19M2117','PHY1021',NULL,NULL,NULL,'MATHEMATIQUE'),('19M2171','MAT1031',NULL,NULL,NULL,'MATHEMATIQUE'),('19M2171','MAT1042',NULL,NULL,NULL,'MATHEMATIQUE'),('19M2171','PHY1021',NULL,NULL,NULL,'MATHEMATIQUE'),('19M2366','MAT2043',NULL,NULL,NULL,'PHYSIQUE'),('19M2366','PHY2013',NULL,NULL,NULL,'PHYSIQUE'),('19M2366','PHY2023',NULL,NULL,NULL,'PHYSIQUE'),('19M2367','INF1011',NULL,NULL,NULL,'INFORMATIQUE'),('19M2367','INF1021',NULL,NULL,NULL,'INFORMATIQUE'),('19M2367','PHY1031',NULL,NULL,NULL,'INFORMATIQUE'),('19M2369','INF1011',NULL,NULL,NULL,'INFORMATIQUE'),('19M2369','INF1021',NULL,NULL,NULL,'INFORMATIQUE'),('19M2369','PHY1031',NULL,NULL,NULL,'INFORMATIQUE'),('19M2379','MAT2043',NULL,NULL,NULL,'PHYSIQUE'),('19M2379','PHY2013',NULL,NULL,NULL,'PHYSIQUE'),('19M2379','PHY2023',NULL,NULL,NULL,'PHYSIQUE'),('19M2382','INF1011',NULL,NULL,NULL,'INFORMATIQUE'),('19M2382','INF1021',NULL,NULL,NULL,'INFORMATIQUE'),('19M2382','PHY1031',NULL,NULL,NULL,'INFORMATIQUE'),('19M2390','MAT2043',NULL,NULL,NULL,'PHYSIQUE'),('19M2390','PHY2013',NULL,NULL,NULL,'PHYSIQUE'),('19M2390','PHY2023',NULL,NULL,NULL,'PHYSIQUE'),('19M2399','INF1011',NULL,NULL,NULL,'INFORMATIQUE'),('19M2399','INF1021',NULL,NULL,NULL,'INFORMATIQUE'),('19M2399','PHY1031',NULL,NULL,NULL,'INFORMATIQUE'),('19M2425','MAT2043',NULL,NULL,NULL,'PHYSIQUE'),('19M2425','PHY2013',NULL,NULL,NULL,'PHYSIQUE'),('19M2425','PHY2023',NULL,NULL,NULL,'PHYSIQUE'),('19M2439','MAT2043',NULL,NULL,NULL,'PHYSIQUE'),('19M2439','PHY2013',NULL,NULL,NULL,'PHYSIQUE'),('19M2439','PHY2023',NULL,NULL,NULL,'PHYSIQUE'),('19M2441','MAT2043',NULL,NULL,NULL,'PHYSIQUE'),('19M2441','PHY2013',NULL,NULL,NULL,'PHYSIQUE'),('19M2441','PHY2023',NULL,NULL,NULL,'PHYSIQUE'),('19M2451','INF1011',NULL,NULL,NULL,'INFORMATIQUE'),('19M2451','INF1021',NULL,NULL,NULL,'INFORMATIQUE'),('19M2451','PHY1031',NULL,NULL,NULL,'INFORMATIQUE'),('19M2452','MAT2043',NULL,NULL,NULL,'PHYSIQUE'),('19M2452','PHY2013',NULL,NULL,NULL,'PHYSIQUE'),('19M2452','PHY2023',NULL,NULL,NULL,'PHYSIQUE'),('19M2466','INF1011',NULL,NULL,NULL,'INFORMATIQUE'),('19M2466','INF1021',NULL,NULL,NULL,'INFORMATIQUE'),('19M2466','PHY1031',NULL,NULL,NULL,'INFORMATIQUE'),('19M2482','INF1011',NULL,NULL,NULL,'INFORMATIQUE'),('19M2482','INF1021',NULL,NULL,NULL,'INFORMATIQUE'),('19M2482','PHY1031',NULL,NULL,NULL,'INFORMATIQUE'),('19M2483','INF2013',NULL,NULL,NULL,'INFORMATIQUE'),('19M2483','INF2063',NULL,NULL,NULL,'INFORMATIQUE'),('19M2483','MAT2023',NULL,NULL,NULL,'INFORMATIQUE'),('19M2484','MAT1031',NULL,NULL,NULL,'MATHEMATIQUE'),('19M2484','MAT1042',NULL,NULL,NULL,'MATHEMATIQUE'),('19M2484','PHY1021',NULL,NULL,NULL,'MATHEMATIQUE'),('19M2500','INF2013',NULL,NULL,NULL,'INFORMATIQUE'),('19M2500','INF2063',NULL,NULL,NULL,'INFORMATIQUE'),('19M2500','MAT2023',12,NULL,NULL,'INFORMATIQUE'),('19M2514','MAT1031',NULL,NULL,NULL,'MATHEMATIQUE'),('19M2514','MAT1042',NULL,NULL,NULL,'MATHEMATIQUE'),('19M2514','PHY1021',NULL,NULL,NULL,'MATHEMATIQUE'),('19M2515','INF2013',17,NULL,NULL,'INFORMATIQUE'),('19M2515','INF2063',NULL,NULL,NULL,'INFORMATIQUE'),('19M2515','MAT2023',NULL,NULL,NULL,'INFORMATIQUE'),('19M2527','INF1011',NULL,NULL,NULL,'INFORMATIQUE'),('19M2527','INF1021',NULL,NULL,NULL,'INFORMATIQUE'),('19M2527','PHY1031',NULL,NULL,NULL,'INFORMATIQUE'),('19M2529','INF2013',18,1,NULL,'INFORMATIQUE'),('19M2529','INF2063',12,NULL,NULL,'INFORMATIQUE'),('19M2529','MAT2023',NULL,NULL,NULL,'INFORMATIQUE'),('19M2540','INF2013',NULL,NULL,NULL,'INFORMATIQUE'),('19M2540','INF2063',NULL,NULL,NULL,'INFORMATIQUE'),('19M2540','MAT2023',NULL,NULL,NULL,'INFORMATIQUE'),('19M2603','MAT1031',NULL,NULL,NULL,'MATHEMATIQUE'),('19M2603','MAT1042',NULL,NULL,NULL,'MATHEMATIQUE'),('19M2603','PHY1021',NULL,NULL,NULL,'MATHEMATIQUE'),('19M2617','INF2013',NULL,NULL,NULL,'INFORMATIQUE'),('19M2617','INF2063',NULL,NULL,NULL,'INFORMATIQUE'),('19M2617','MAT2023',NULL,NULL,NULL,'INFORMATIQUE'),('19M2627','MAT1031',12.5,NULL,NULL,'MATHEMATIQUE'),('19M2627','MAT1042',NULL,NULL,NULL,'MATHEMATIQUE'),('19M2627','PHY1021',NULL,NULL,NULL,'MATHEMATIQUE'),('19M2682','INF2013',NULL,NULL,NULL,'INFORMATIQUE'),('19M2682','INF2063',NULL,NULL,NULL,'INFORMATIQUE'),('19M2682','MAT2023',NULL,NULL,NULL,'INFORMATIQUE'),('19P2143','INF2013',1,NULL,NULL,'INFORMATIQUE'),('19P2143','INF2063',NULL,NULL,NULL,'INFORMATIQUE'),('19P2143','MAT2023',NULL,NULL,NULL,'INFORMATIQUE'),('19T2643','MAT2043',NULL,NULL,NULL,'PHYSIQUE'),('19T2643','PHY2013',NULL,NULL,NULL,'PHYSIQUE'),('19T2643','PHY2023',NULL,NULL,NULL,'PHYSIQUE'),('19Y5611','MAT1031',28,9,14.99,'MATHEMATIQUE'),('19Y5611','PHY1021',20.15,0,69.99,'MATHEMATIQUE'),('20H2345','MAT1031',14.88,1,45.14,'MATHEMATIQUE'),('20H2345','PHY1021',12,0,45,'MATHEMATIQUE'),('21Y3467','INF2013',15.04,NULL,4,'INFORMATIQUE'),('21Y3467','MAT2023',12,NULL,21,'INFORMATIQUE');
/*!40000 ALTER TABLE `evaluer` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `module`
--

DROP TABLE IF EXISTS `module`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `module` (
  `id` int DEFAULT '1',
  `name` varchar(45) NOT NULL,
  `level` varchar(2) NOT NULL,
  `codeu` varchar(7) NOT NULL,
  `added_by` varchar(255) DEFAULT NULL,
  `filiere` varchar(20) NOT NULL,
  `professeur_id` int DEFAULT NULL,
  `tp` tinyint(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`codeu`,`filiere`),
  KEY `fk_module_professeurs1_idx` (`professeur_id`),
  CONSTRAINT `fk_module_professeurs1` FOREIGN KEY (`professeur_id`) REFERENCES `professeurs` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `module`
--

LOCK TABLES `module` WRITE;
/*!40000 ALTER TABLE `module` DISABLE KEYS */;
INSERT INTO `module` VALUES (1,'Introduction genie logiciel','L1','INF1011','admin','INFORMATIQUE',7,0),(2,'Introduction Algorithme','L1','INF1021','admin','INFORMATIQUE',1,1),(5,'Systeme d\'Information','L2','INF2013','admin','INFORMATIQUE',1,1),(10,'genie logiciel','L2','INF2063','admin','INFORMATIQUE',7,1),(6,'Fonction','L1','MAT1031','admin','MATHEMATIQUE',2,0),(13,'Algèbre','L1','MAT1042','admin','MATHEMATIQUE',4,0),(12,'nombre reel','L2','MAT2023','admin','INFORMATIQUE',2,2),(4,'Nombre Réel','L2','MAT2043','admin','PHYSIQUE',2,0),(8,'Les Forces','L1','PHY1021','admin','MATHEMATIQUE',3,0),(3,'electronique numérique ','L1','PHY1031','admin','INFORMATIQUE',3,0),(11,'Introduction au Force','L2','PHY2013','admin','PHYSIQUE',3,1),(9,'Introduction Electronique','L2','PHY2023','admin','PHYSIQUE',5,1);
/*!40000 ALTER TABLE `module` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `professeurs`
--

DROP TABLE IF EXISTS `professeurs`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `professeurs` (
  `id` int NOT NULL AUTO_INCREMENT,
  `category_id` int DEFAULT NULL,
  `title` varchar(200) NOT NULL,
  `codep` varchar(200) NOT NULL,
  `body` varchar(45) DEFAULT NULL,
  `image` varchar(255) DEFAULT NULL,
  `cv` varchar(255) DEFAULT NULL,
  `author` varchar(200) DEFAULT 'admin',
  `created` varchar(255) DEFAULT NULL,
  `sexe` char(1) DEFAULT NULL,
  `email` varchar(45) NOT NULL,
  `reference` varchar(20) DEFAULT 'professeur',
  PRIMARY KEY (`id`),
  UNIQUE KEY `email_UNIQUE` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `professeurs`
--

LOCK TABLES `professeurs` WRITE;
/*!40000 ALTER TABLE `professeurs` DISABLE KEYS */;
INSERT INTO `professeurs` VALUES (1,5,'Merlin Fosto','merlin','Docteur, Cameroun','','','admin','2022-01-18 19:44:01','M','merlin@gmail.com','professeur'),(2,6,'Frank Teet','qwertyuiop','Docteur, camerounaise, female, ','','','admin','2022-01-12 11:22:01','F','tab@email.com','professeur'),(3,8,'Prof Huima Gile Gaston','jean','c\'est un professeur','','','admin','','M','ba@mail.com','professeur'),(4,9,'Pr Arthur Stephane','azerty','Professeur, Tchadiens','','','admin','2022-01-18 14:26:01','M','arthur@email.com',NULL),(5,10,'YAN JOAN','yan','Professeur, Gabonais','','','admin','2022-01-18 15:04:01','M','yan@gmail.com',NULL),(6,10,'justine Aureylienne','justine','Docteur, Camerounais','','','admin','2022-01-18 16:58:01','F','justine@gmail.com',NULL),(7,10,'jean Audrey','jean','Docteur, Canada','','','admin','2022-01-18 16:17:01','M','jean@yahoo.com',NULL),(8,NULL,'AEUMO DNAED','1',NULL,NULL,NULL,'admin',NULL,'M','a@gmail.com','professeur'),(9,NULL,'Dr AJDI JDIOE','1',NULL,NULL,NULL,'admin',NULL,'M','b@gmail.com','professeur'),(10,NULL,'Dr JEAN DINE','1',NULL,NULL,NULL,'admin',NULL,'F','c@gmail.com','professeur'),(11,NULL,'Dr JNDO RENIDEOT','1',NULL,NULL,NULL,'admin',NULL,'M','d@gmail.com','professeur'),(12,NULL,'Prof Mathieu Jean','1',NULL,NULL,NULL,'admin',NULL,'F','e@gmail.com','professeur');
/*!40000 ALTER TABLE `professeurs` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2022-01-19 20:24:19
