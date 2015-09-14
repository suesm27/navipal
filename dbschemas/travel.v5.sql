CREATE DATABASE  IF NOT EXISTS `travel` /*!40100 DEFAULT CHARACTER SET latin1 */;
USE `travel`;
-- MySQL dump 10.13  Distrib 5.6.24, for osx10.8 (x86_64)
--
-- Host: 127.0.0.1    Database: travel
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
-- Table structure for table `availability`
--

DROP TABLE IF EXISTS `availability`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `availability` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `guide_id` int(11) NOT NULL,
  `date` datetime DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_availability_guides1_idx` (`guide_id`),
  CONSTRAINT `fk_availability_guides1` FOREIGN KEY (`guide_id`) REFERENCES `guides` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `availability`
--

LOCK TABLES `availability` WRITE;
/*!40000 ALTER TABLE `availability` DISABLE KEYS */;
INSERT INTO `availability` VALUES (1,1,'2015-09-01 08:52:53'),(2,1,'2015-09-05 08:50:47'),(3,1,'2015-09-08 08:50:47'),(4,2,'2015-09-01 08:52:53'),(5,2,'2015-09-10 08:50:47'),(6,3,'2015-09-01 08:52:53'),(7,3,'2015-10-01 08:50:47'),(8,3,'2015-11-01 08:50:47'),(9,4,'2015-09-01 08:52:53'),(10,4,'2015-09-03 08:50:47'),(11,5,'2015-09-09 08:50:47'),(12,6,'2015-09-12 08:50:47');
/*!40000 ALTER TABLE `availability` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `guides`
--

DROP TABLE IF EXISTS `guides`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `guides` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(45) DEFAULT NULL,
  `description` text,
  `rating` smallint(6) DEFAULT NULL,
  `location` varchar(45) DEFAULT NULL,
  `image` varchar(255) DEFAULT NULL,
  `price` float DEFAULT NULL,
  `dob` datetime DEFAULT NULL,
  `phone` varchar(45) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `guides`
--

LOCK TABLES `guides` WRITE;
/*!40000 ALTER TABLE `guides` DISABLE KEYS */;
INSERT INTO `guides` VALUES (1,'Sue Su','I don\'t really know what I\'m talking about most of the time.',5,'1980 Zanker Rd, San Jose, CA','sue.png',100,'1997-11-28 00:00:00','4087020692','suesu@gmail.com','22843bcc1e4bf833879a6af91b78c014','2015-08-28 13:53:55','2015-08-31 19:57:17'),(2,'Sourabh Pal','Public restrooms are great places to meet strangers.',1,'3708 Laguna Ave, Palo Alto','sourabh.png',1,'1988-05-23 00:00:00','6099370629','sourabh@gmail.com','a1ccf92f07ad5d86fa2d41e5fd1ad142','2015-08-28 14:51:13',NULL),(3,'Ray Oleaga','See the world and have a good time!',5,'Providence, RI','ray.png',40.44,'1986-09-25 00:00:00',NULL,'ray@gmail.com','c7c7661ef885a3f37dd18bdca92a2d20','2015-08-28 14:51:27',NULL),(4,'Ron Sim','Come back to me.',3,'Fremont, CA','ron.png',88.88,'1984-06-24 00:00:00',NULL,'ron@gmail.com','d03cc02a01c51b8cee222972393d707b','2015-08-28 14:51:41',NULL),(5,'Lan Nguyen','Bun Bo Hue',4,'Redwood City, CA','lan.png',999.99,'1982-06-21 00:00:00','4084827159','lan@gmail.com','b26fa69b5fa46f560ee54e52c0b1e4ff','2015-08-28 14:51:55',NULL),(6,'Nick Leonard','If you pay enough I\'ll play around',2,'Long Beach, CA','nick.png',77.89,'1983-07-27 00:00:00',NULL,'nick@gmail.com','907335cec18fc90a9fee95fd9d6a2ef6','2015-08-28 20:53:49',NULL);
/*!40000 ALTER TABLE `guides` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `reservations`
--

DROP TABLE IF EXISTS `reservations`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `reservations` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `guide_id` int(11) NOT NULL,
  `date` datetime DEFAULT NULL,
  `confirmation` int(11) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_reservations_users1_idx` (`user_id`),
  KEY `fk_reservations_guides1_idx` (`guide_id`),
  CONSTRAINT `fk_reservations_users1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_reservations_guides1` FOREIGN KEY (`guide_id`) REFERENCES `guides` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=41 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `reservations`
--

LOCK TABLES `reservations` WRITE;
/*!40000 ALTER TABLE `reservations` DISABLE KEYS */;
INSERT INTO `reservations` VALUES (36,16,1,'2015-08-31 00:00:00',563835,'2015-09-01 08:56:37','2015-09-01 08:56:37'),(37,3,5,'2015-08-31 00:00:00',203400,'2015-09-01 08:58:47','2015-09-01 08:58:47'),(38,8,5,'2015-09-10 00:00:00',822291,'2015-09-01 09:02:58','2015-09-01 09:02:58'),(39,23,1,'2015-09-10 00:00:00',163407,'2015-09-01 09:12:33','2015-09-01 09:12:33'),(40,24,1,'2015-09-10 00:00:00',169529,'2015-09-01 09:16:07','2015-09-01 09:16:07');
/*!40000 ALTER TABLE `reservations` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `reviews`
--

DROP TABLE IF EXISTS `reviews`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `reviews` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `guide_id` int(11) NOT NULL,
  `review` text,
  `created_at` datetime DEFAULT NULL,
  `star` smallint(6) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_reviews_users1_idx` (`user_id`),
  KEY `fk_reviews_guides1_idx` (`guide_id`),
  CONSTRAINT `fk_reviews_users1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_reviews_guides1` FOREIGN KEY (`guide_id`) REFERENCES `guides` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `reviews`
--

LOCK TABLES `reviews` WRITE;
/*!40000 ALTER TABLE `reviews` DISABLE KEYS */;
/*!40000 ALTER TABLE `reviews` ENABLE KEYS */;
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
  `email` varchar(255) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `phone` varchar(45) DEFAULT NULL,
  `dob` datetime DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=25 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `users`
--

LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` VALUES (1,'Sourabh Pal','sourabh@pal-tech.co','265e7307f55128547875ceec2d415db1','6099370629','1991-05-05 00:00:00','2015-08-25 09:54:33','2015-09-01 09:10:42'),(2,'Raymon Oleaga','ray@designbuddy.com','664440b7e3cbb43132867ac382b81e9f','4013010680','1991-05-05 00:00:00','2015-08-25 10:04:14','2015-09-01 09:10:42'),(3,'Sue Su','suesu@gmail.com','a12dcaa57b2bc97b60fc2015e64cbec2','4087020692','1991-05-05 00:00:00','2015-08-25 10:23:50','2015-09-01 09:10:42'),(4,'Elton Malave','malave@gmail.com','1a77eb1d1d0cbb1692e9e2610e6954e2','6099370629','1991-05-05 00:00:00','2015-08-25 17:15:02','2015-09-01 09:10:42'),(5,'Helena Custard','helena@gmail.com','2876838571fae268c28e0de99839a89c','6099370629','1991-05-05 00:00:00','2015-08-25 17:26:54','2015-09-01 09:10:42'),(6,'Sabina Casady','sabina@gmail.com','5ee17fb9841f93b214c88734685309a7','6099370629','1991-05-05 00:00:00','2015-08-25 17:29:22','2015-09-01 09:10:42'),(7,'Francene Widell','francene@gmail.com','bd420085dbd5fd23ab459ac902ea8715','6099370629','1991-05-05 00:00:00','2015-08-25 17:41:00','2015-09-01 09:10:42'),(8,'Chris Baker','chris@gmail.com','6c6d9676f341c3d8240a90e09e8ba6e4','6099370629','1991-05-05 00:00:00','2015-08-26 09:02:07','2015-09-01 09:10:42'),(16,'Jessica Davidson','jessica@gmail.com','8a694c8394dc7ed50f4bec4eb259fc29','6099370629','2015-08-11 00:00:00','2015-08-26 10:07:06','2015-09-01 09:10:42'),(17,'Ivan Cometa','van@gmail.com','a74db3b169d723241f58b1d611100a0a','6099370629','1992-05-24 00:00:00','2015-08-26 10:39:58','2015-09-01 09:10:42'),(18,'Jimmy Jun','jimmy@gmail.com','b4cc28efc75478348b9f628acd7ef716','6099370629','1986-05-20 00:00:00','2015-08-26 12:48:36','2015-09-01 09:10:42'),(22,'Isaac Lee','isaac@gmail.com','72026ce930053a12b3b40dd0ecdfa495','6099370629','1974-07-21 00:00:00','2015-08-31 13:19:14','2015-09-02 09:10:42'),(23,'Eduardo Baik','eduardo@gmail.com','c1c6ce8749065325ccf6d5a40b95e840','6099370629','1988-08-23 00:00:00','2015-09-01 09:11:29','2015-09-01 09:11:29'),(24,'Andrew Lee','andrew@gmail.com','dc44be344c496309f75530056f110000','6099370629','1977-06-22 00:00:00','2015-09-01 09:15:08','2015-09-01 09:15:08');
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

-- Dump completed on 2015-09-01  9:19:31
