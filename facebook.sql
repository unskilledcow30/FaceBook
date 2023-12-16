-- MySQL dump 10.13  Distrib 8.0.30, for Win64 (x86_64)
--
-- Host: localhost    Database: facebook
-- ------------------------------------------------------
-- Server version	8.0.35

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!50503 SET NAMES utf8mb4 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `comment`
--

DROP TABLE IF EXISTS `comment`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `comment` (
  `Id_comment` int NOT NULL AUTO_INCREMENT,
  `Id_user` int DEFAULT NULL,
  `Id_post` int DEFAULT NULL,
  `content` varchar(500) DEFAULT NULL,
  PRIMARY KEY (`Id_comment`),
  KEY `Id_user` (`Id_user`),
  KEY `Id_post` (`Id_post`),
  CONSTRAINT `comment_ibfk_1` FOREIGN KEY (`Id_user`) REFERENCES `user` (`Id_user`),
  CONSTRAINT `comment_ibfk_2` FOREIGN KEY (`Id_post`) REFERENCES `post` (`Id_post`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `comment`
--

LOCK TABLES `comment` WRITE;
/*!40000 ALTER TABLE `comment` DISABLE KEYS */;
INSERT INTO `comment` VALUES (1,1,2,'Same to you'),(2,1,1,'Thanks'),(3,6,1,'Goodmorning'),(4,6,1,'Goodmorning'),(5,2,2,'Amen'),(6,5,2,'Thanks'),(7,4,1,'HI :)'),(8,3,2,'Same to you'),(9,3,1,'What a wonderful day'),(10,1,1,'Ohayo sekai goodmorning world');
/*!40000 ALTER TABLE `comment` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `comment_likes`
--

DROP TABLE IF EXISTS `comment_likes`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `comment_likes` (
  `Id_user` int NOT NULL,
  `Id_comment` int NOT NULL,
  `reaction` varchar(20) DEFAULT NULL,
  PRIMARY KEY (`Id_user`,`Id_comment`),
  KEY `Id_comment` (`Id_comment`),
  CONSTRAINT `comment_likes_ibfk_1` FOREIGN KEY (`Id_user`) REFERENCES `user` (`Id_user`),
  CONSTRAINT `comment_likes_ibfk_2` FOREIGN KEY (`Id_comment`) REFERENCES `comment` (`Id_comment`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `comment_likes`
--

LOCK TABLES `comment_likes` WRITE;
/*!40000 ALTER TABLE `comment_likes` DISABLE KEYS */;
/*!40000 ALTER TABLE `comment_likes` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `follower`
--

DROP TABLE IF EXISTS `follower`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `follower` (
  `Id_follower` int NOT NULL AUTO_INCREMENT,
  `Id_Followed` int DEFAULT NULL,
  `Id_Followee` int DEFAULT NULL,
  PRIMARY KEY (`Id_follower`),
  KEY `Id_Followed` (`Id_Followed`),
  KEY `Id_Followee` (`Id_Followee`),
  CONSTRAINT `follower_ibfk_1` FOREIGN KEY (`Id_Followed`) REFERENCES `user` (`Id_user`),
  CONSTRAINT `follower_ibfk_2` FOREIGN KEY (`Id_Followee`) REFERENCES `user` (`Id_user`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `follower`
--

LOCK TABLES `follower` WRITE;
/*!40000 ALTER TABLE `follower` DISABLE KEYS */;
/*!40000 ALTER TABLE `follower` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `images`
--

DROP TABLE IF EXISTS `images`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `images` (
  `id_images` int NOT NULL AUTO_INCREMENT,
  `Id_post` int DEFAULT NULL,
  `Name` varchar(20) NOT NULL,
  `path` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`id_images`),
  KEY `Id_post` (`Id_post`),
  CONSTRAINT `images_ibfk_1` FOREIGN KEY (`Id_post`) REFERENCES `post` (`Id_post`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `images`
--

LOCK TABLES `images` WRITE;
/*!40000 ALTER TABLE `images` DISABLE KEYS */;
/*!40000 ALTER TABLE `images` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `post`
--

DROP TABLE IF EXISTS `post`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `post` (
  `Id_post` int NOT NULL AUTO_INCREMENT,
  `content` varchar(20) NOT NULL,
  `created_at` datetime DEFAULT NULL,
  `Id_user` int DEFAULT NULL,
  PRIMARY KEY (`Id_post`),
  KEY `Id_user` (`Id_user`),
  CONSTRAINT `post_ibfk_1` FOREIGN KEY (`Id_user`) REFERENCES `user` (`Id_user`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `post`
--

LOCK TABLES `post` WRITE;
/*!40000 ALTER TABLE `post` DISABLE KEYS */;
INSERT INTO `post` VALUES (1,'hello world','2023-11-27 00:00:00',2),(2,'have a blessed day','2023-11-28 00:00:00',4),(3,'Let the day rise ...','2023-12-01 08:25:00',12),(4,'I have a dream ~~','2023-07-14 10:25:00',9),(5,'Megan','2023-12-01 08:25:00',2),(6,'Anne','2023-12-01 08:25:00',8);
/*!40000 ALTER TABLE `post` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `post_likes`
--

DROP TABLE IF EXISTS `post_likes`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `post_likes` (
  `Id_user` int NOT NULL,
  `Id_post` int NOT NULL,
  `reaction` varchar(100) NOT NULL,
  PRIMARY KEY (`Id_user`,`Id_post`),
  KEY `Id_post` (`Id_post`),
  CONSTRAINT `post_likes_ibfk_1` FOREIGN KEY (`Id_user`) REFERENCES `user` (`Id_user`),
  CONSTRAINT `post_likes_ibfk_2` FOREIGN KEY (`Id_post`) REFERENCES `post` (`Id_post`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `post_likes`
--

LOCK TABLES `post_likes` WRITE;
/*!40000 ALTER TABLE `post_likes` DISABLE KEYS */;
/*!40000 ALTER TABLE `post_likes` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `user`
--

DROP TABLE IF EXISTS `user`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `user` (
  `Id_user` int NOT NULL AUTO_INCREMENT,
  `name` varchar(20) NOT NULL,
  `email` varchar(60) NOT NULL,
  `pwd` varchar(30) NOT NULL,
  `phone` varchar(20) DEFAULT NULL,
  `age` int DEFAULT NULL,
  PRIMARY KEY (`Id_user`),
  UNIQUE KEY `email` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=25 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `user`
--

LOCK TABLES `user` WRITE;
/*!40000 ALTER TABLE `user` DISABLE KEYS */;
INSERT INTO `user` VALUES (1,'Megan','meg@gmail.com','meg12',NULL,NULL),(2,'Nolan','nol@gmail.com','nol12',NULL,NULL),(3,'Joyce','joy@gmail.com','joy12',NULL,NULL),(4,'Eloise','Eloise@gmail.com','elo12',NULL,NULL),(5,'Jesky','Jesky@gmail.com','jes12',NULL,NULL),(6,'Rufus','Rufus@gmail.com','Ruf12',NULL,NULL),(7,'Jordan','jor@gmail.com','125',NULL,NULL),(8,'Claude','clau@gmail.com','175',NULL,NULL),(9,'Silvian','sil@gmail.com','875',NULL,NULL),(10,'Grace','gra@gmail.com','925',NULL,NULL),(11,'Jule','jul@gmail.com','834',NULL,NULL),(12,'Ange','an@gmail.com','404',NULL,NULL),(13,'Anne','ann@gmail.com','4a6',NULL,NULL),(14,'','nolan@gmail.coom','',NULL,NULL),(17,'ADA','noln@gmail.coom','',NULL,NULL),(18,'John','john@gmail.coom','124','0457126458',42),(24,'caleb','cals@gmail.com','cal123','678',21);
/*!40000 ALTER TABLE `user` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2023-12-14 17:58:28
