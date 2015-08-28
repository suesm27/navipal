-- MySQL dump 10.13  Distrib 5.6.24, for osx10.8 (x86_64)
--
-- Host: 127.0.0.1    Database: mydb
-- ------------------------------------------------------
-- Server version	5.5.42

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `friendships`
--

DROP TABLE IF EXISTS `friendships`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `friendships` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) DEFAULT NULL,
  `friend_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `user_id_idx` (`user_id`),
  KEY `friend_id_idx` (`friend_id`),
  CONSTRAINT `user_id` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `friend_id` FOREIGN KEY (`friend_id`) REFERENCES `users` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=43 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `friendships`
--

LOCK TABLES `friendships` WRITE;
/*!40000 ALTER TABLE `friendships` DISABLE KEYS */;
INSERT INTO `friendships` VALUES (3,2,1),(4,1,2),(7,1,2),(8,2,1),(9,1,4),(10,4,1),(11,1,5),(12,5,1),(23,3,1),(24,1,3),(25,3,4),(26,4,3),(27,3,5),(28,5,3),(29,3,8),(30,8,3),(35,18,2),(36,2,18),(37,18,17),(38,17,18),(39,18,4),(40,4,18),(41,18,3),(42,3,18);
/*!40000 ALTER TABLE `friendships` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(45) DEFAULT NULL,
  `alias` varchar(45) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `dob` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=19 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `users`
--

LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` VALUES (1,'Sourabh Pal','sourabhp','sourabh@pal-tech.co','265e7307f55128547875ceec2d415db1','2015-08-25 09:54:33','1991-05-05 00:00:00'),(2,'Raymon Oleaga','rayray','ray@designbuddy.com','664440b7e3cbb43132867ac382b81e9f','2015-08-25 10:04:14','1991-05-05 00:00:00'),(3,'Sue Su','suesu','suesu@gmail.com','a12dcaa57b2bc97b60fc2015e64cbec2','2015-08-25 10:23:50','1991-05-05 00:00:00'),(4,'Elton Malave','malave','malave@gmail.com','1a77eb1d1d0cbb1692e9e2610e6954e2','2015-08-25 17:15:02','1991-05-05 00:00:00'),(5,'Helena Custard','helena','helena@gmail.com','2876838571fae268c28e0de99839a89c','2015-08-25 17:26:54','1991-05-05 00:00:00'),(6,'Sabina Casady','sabina','sabina@gmail.com','5ee17fb9841f93b214c88734685309a7','2015-08-25 17:29:22','1991-05-05 00:00:00'),(7,'Francene Widell','francene','francene@gmail.com','bd420085dbd5fd23ab459ac902ea8715','2015-08-25 17:41:00','1991-05-05 00:00:00'),(8,'Chris Baker','chris','chris@gmail.com','6c6d9676f341c3d8240a90e09e8ba6e4','2015-08-26 09:02:07','1991-05-05 00:00:00'),(16,'Jessica Davidson','jessica','jessica@gmail.com','8a694c8394dc7ed50f4bec4eb259fc29','2015-08-26 10:07:06','2015-08-11 00:00:00'),(17,'Ivan Cometa','van','van@gmail.com','a74db3b169d723241f58b1d611100a0a','2015-08-26 10:39:58','1992-05-24 00:00:00'),(18,'Jimmy','jimmy','jimmy@gmail.com','b4cc28efc75478348b9f628acd7ef716','2015-08-26 12:48:36','1986-05-20 00:00:00');
/*!40000 ALTER TABLE `users` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2015-08-26 12:50:20
