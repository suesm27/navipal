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
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `guides`
--

LOCK TABLES `guides` WRITE;
/*!40000 ALTER TABLE `guides` DISABLE KEYS */;
INSERT INTO `guides` VALUES (1,'Sue Su','I don\'t really know what I\'m talking about most of the time.','1980 Zanker Rd, San Jose, CA','',100,'1997-11-28 00:00:00','4087020692','suesu@gmail.com','22843bcc1e4bf833879a6af91b78c014','2015-08-28 13:53:55','2015-08-31 19:57:17'),(2,'Sourabh Pal','Public restrooms are great places to meet strangers.','3708 Laguna Ave, Palo Alto','',1,'1988-05-23 00:00:00','6099370629','sourabh@gmail.com','a1ccf92f07ad5d86fa2d41e5fd1ad142','2015-08-28 14:51:13','2015-09-01 11:46:18'),(3,'Ray Oleaga','See the world and have a good time!','Providence, RI','',40.44,'1986-09-25 00:00:00','4013010680','ray@gmail.com','c7c7661ef885a3f37dd18bdca92a2d20','2015-08-28 14:51:27','2015-09-01 11:46:18'),(4,'Ron Sim','Come back to me.','Fremont, CA','',88.88,'1984-06-24 00:00:00',NULL,'ron@gmail.com','d03cc02a01c51b8cee222972393d707b','2015-08-28 14:51:41','2015-09-01 11:46:18'),(5,'Lan Nguyen','Bun Bo Hue','Redwood City, CA','',999.99,'1982-06-21 00:00:00','4084827159','lan@gmail.com','b26fa69b5fa46f560ee54e52c0b1e4ff','2015-08-28 14:51:55','2015-09-01 11:46:18'),(6,'Nick Leonard','If you pay enough I\'ll play around','Long Beach, CA','',77.89,'1983-07-27 00:00:00',NULL,'nick@gmail.com','907335cec18fc90a9fee95fd9d6a2ef6','2015-08-28 20:53:49','2015-09-01 11:46:18'),(8,'Timmy The Dog','Woof woof','Tampa, FL','',1000000,'2008-07-10 00:00:00','6099370629','timmy@gmail.com','89a1f7bd03f37fd4c86b7fbb4e417b3a','2015-09-01 14:05:19',NULL),(9,'Brooklyn Decker','I have boobs.','Brooklyn, NY',NULL,20,'1978-03-23 00:00:00','6099370629','brooklyn@gmail.com','5908738282bcd358a9ef299ed6f5930d','2015-09-01 14:31:55','2015-09-01 14:33:21'),(10,'Olivia Wilde','I like House','Hollywood, CA',NULL,700,'1985-08-25 00:00:00','1234567890','olivia@gmail.com','87a0e339fb7757039a79a375ae6ac906','2015-09-01 20:17:42','2015-09-01 20:18:40');
/*!40000 ALTER TABLE `guides` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `messages`
--

DROP TABLE IF EXISTS `messages`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `messages` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `guide_id` int(11) NOT NULL,
  `message` text,
  `created_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_messages_users_idx` (`user_id`),
  KEY `fk_messages_guides1_idx` (`guide_id`),
  CONSTRAINT `fk_messages_users` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_messages_guides1` FOREIGN KEY (`guide_id`) REFERENCES `guides` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=20 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `messages`
--

LOCK TABLES `messages` WRITE;
/*!40000 ALTER TABLE `messages` DISABLE KEYS */;
INSERT INTO `messages` VALUES (1,6,1,'hello','2015-09-01 09:36:57'),(2,7,1,'whats up','2015-09-02 09:36:57'),(3,8,1,'hey dude','2015-09-03 09:36:57'),(4,4,2,'sup man','2015-08-01 09:36:57'),(5,5,2,'harrooooo','2015-08-11 09:36:57'),(6,6,3,'hello','2015-07-11 09:36:57'),(7,2,3,'hiii','2015-09-01 09:36:57'),(8,1,4,'this is a message','2015-09-02 09:36:57'),(9,2,5,'i like writing messages','2015-08-15 09:36:57'),(10,3,5,'messages are cool','2015-08-16 09:36:57'),(11,16,1,'asdf','2015-09-01 10:45:13'),(12,16,1,'another message for sue!','2015-09-01 10:45:29'),(13,16,1,'Hello','2015-09-01 11:00:21'),(14,16,1,'Hello','2015-09-01 11:01:18'),(15,3,2,'You look Indian.','2015-09-01 11:06:41'),(16,16,2,'Stop eating curry','2015-09-01 11:08:19'),(17,3,5,'Hey Lan','2015-09-01 14:08:43'),(18,16,1,'oewpijagowejfwpef','2015-09-01 14:10:40'),(19,25,1,'testing','2015-09-01 21:09:57');
/*!40000 ALTER TABLE `messages` ENABLE KEYS */;
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
) ENGINE=InnoDB AUTO_INCREMENT=61 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `reservations`
--

LOCK TABLES `reservations` WRITE;
/*!40000 ALTER TABLE `reservations` DISABLE KEYS */;
INSERT INTO `reservations` VALUES (37,3,5,'2015-08-31 00:00:00',203400,'2015-09-01 08:58:47','2015-09-01 08:58:47'),(38,8,5,'2015-09-10 00:00:00',822291,'2015-09-01 09:02:58','2015-09-01 09:02:58'),(39,23,1,'2015-09-09 00:00:00',163407,'2015-09-01 09:12:33','2015-09-01 09:12:33'),(40,24,1,'2015-09-10 00:00:00',169529,'2015-09-01 09:16:07','2015-09-01 09:16:07'),(41,1,3,'2015-09-15 00:00:00',787549,'2015-09-01 09:40:44','2015-09-01 09:40:44'),(42,2,8,'2015-10-23 00:00:00',232909,'2015-09-01 20:27:10','2015-09-01 20:27:18'),(43,22,9,'2015-11-22 00:00:00',432222,'2015-09-01 20:27:10','2015-09-01 20:27:18'),(44,23,8,'2015-11-12 00:00:00',439280,'2015-09-01 20:27:10','2015-09-01 20:27:18'),(45,24,6,'2015-09-12 00:00:00',652222,'2015-09-01 20:27:10','2015-09-01 20:27:18'),(46,25,8,'2015-09-25 00:00:00',239807,'2015-09-01 20:27:10','2015-09-01 20:27:18'),(47,26,5,'2015-12-12 00:00:00',532830,'2015-09-01 20:27:10','2015-09-01 20:27:18'),(48,27,8,'2015-12-30 00:00:00',401739,'2015-09-01 20:27:10','2015-09-01 20:27:18'),(49,28,9,'2015-09-25 00:00:00',449207,'2015-09-01 20:27:10','2015-09-01 20:27:18'),(50,29,10,'2015-10-11 00:00:00',728346,'2015-09-01 20:27:10','2015-09-01 20:27:18'),(51,30,8,'2015-10-12 00:00:00',349370,'2015-09-01 20:27:10','2015-09-01 20:27:18'),(53,32,8,'2015-09-28 00:00:00',123740,'2015-09-01 20:27:10','2015-09-01 20:27:18'),(54,33,5,'2015-09-30 00:00:00',999273,'2015-09-01 20:27:10','2015-09-01 20:27:18'),(55,42,4,'2015-09-12 00:00:00',329380,'2015-09-01 20:27:10','2015-09-01 20:27:18'),(56,41,4,'2015-09-19 00:00:00',232345,'2015-09-01 20:27:10','2015-09-01 20:27:18'),(57,40,1,'2015-11-27 00:00:00',573892,'2015-09-01 20:27:10','2015-09-01 20:27:18'),(58,39,1,'2015-11-28 00:00:00',382903,'2015-09-01 20:27:10','2015-09-01 20:27:18'),(59,38,1,'2015-09-19 00:00:00',346662,'2015-09-01 20:27:10','2015-09-01 20:27:18'),(60,36,1,'2015-10-15 00:00:00',392037,'2015-09-01 20:27:10','2015-09-01 20:27:18');
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
) ENGINE=InnoDB AUTO_INCREMENT=40 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `reviews`
--

LOCK TABLES `reviews` WRITE;
/*!40000 ALTER TABLE `reviews` DISABLE KEYS */;
INSERT INTO `reviews` VALUES (1,5,1,'Sue is so cool','2015-09-21 09:45:30',5),(2,6,1,'The best','2015-09-01 09:45:42',5),(3,7,1,'Loved the tour','2015-08-11 09:45:42',5),(4,8,1,'Awesome!','2015-07-01 09:45:42',5),(5,1,2,'He sucks.','2015-09-01 09:45:30',1),(6,4,2,'I think he\'s Indian.','2015-09-01 09:45:42',1),(7,5,2,'Don\'t waste your dollar on him.','2015-07-23 09:45:42',1),(8,8,3,'Ray is great!','2015-09-01 09:45:30',5),(9,2,4,'She got lost a few times.','2015-09-01 09:58:09',1),(10,16,2,'Run as fast as you can!!','2015-09-02 00:00:00',1),(11,18,3,'Rayyyyyyyyy','2015-07-09 00:00:00',5),(12,22,4,'I enjoyed the vietnamese coffee shop a lot.','2015-07-13 13:58:55',5),(13,23,4,'Dave and Busterrrrssss','2015-08-11 13:58:55',5),(14,24,4,'Ronald sounds like an old white man\'s name.','2015-06-22 13:58:55',3),(15,5,5,'She\'s really nice','2015-09-01 13:58:55',5),(16,6,5,'Like super nice.','2015-02-01 13:58:55',5),(17,7,5,'Bun Bo Hue was okay.','2015-05-25 13:58:55',4),(18,8,5,'I love Lan','2015-04-26 13:58:55',5),(19,22,5,'Lan is Love, Lan is Life','2015-09-02 13:58:55',5),(20,24,5,'I\'m visiting her again next time!','2015-07-29 13:58:55',5),(21,30,6,'Some reviews blah blah','2015-09-01 20:32:35',2),(22,31,6,'Some junk data','2015-09-01 20:32:35',4),(23,32,6,'Can\'t believe I have to populate the database with crap','2015-09-01 20:32:35',3),(24,33,6,'Lalala','2015-09-01 20:32:35',4),(25,34,6,'Teehee','2015-09-01 20:32:35',2),(26,35,8,'I like to go to the bathroom','2015-09-01 20:32:35',5),(27,36,8,'Swimsuits are nice','2015-09-01 20:32:35',4),(28,37,8,'Okay','2015-09-01 20:32:35',3),(29,24,9,'I suck at coming up with random review comments.','2015-09-01 20:32:35',4),(30,33,9,'The water here doesn\'t have filters','2015-09-01 20:32:35',1),(31,39,9,'Lots of signs in the bathroom','2015-09-01 20:32:35',2),(32,40,9,'Popeye makes me feel dizzy.','2015-09-01 20:32:35',5),(33,36,10,'Wow','2015-09-01 20:32:35',5),(34,37,10,'Cool','2015-09-01 20:32:35',5),(35,38,10,'You look nice','2015-09-01 20:32:35',5),(36,39,10,'Do you want to go out sometimes?','2015-09-01 20:32:35',1),(37,40,10,'5 starsssss','2015-09-01 20:32:35',5),(38,41,10,'I like house too','2015-09-01 20:32:35',5),(39,42,1,'Let\'s go to SF together!','2015-09-01 20:32:35',5);
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
) ENGINE=InnoDB AUTO_INCREMENT=43 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `users`
--

LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` VALUES (1,'Sourabh Pal','sourabh@pal-tech.co','265e7307f55128547875ceec2d415db1','6099370629','1991-05-05 00:00:00','2015-08-25 09:54:33','2015-09-01 09:10:42'),(2,'Raymon Oleaga','ray@designbuddy.com','664440b7e3cbb43132867ac382b81e9f','4013010680','1991-05-05 00:00:00','2015-08-25 10:04:14','2015-09-01 09:10:42'),(3,'Sue Su','suesu@gmail.com','a12dcaa57b2bc97b60fc2015e64cbec2','4087020692','1991-05-05 00:00:00','2015-08-25 10:23:50','2015-09-01 09:10:42'),(4,'Elton Malave','malave@gmail.com','1a77eb1d1d0cbb1692e9e2610e6954e2','6099370629','1991-05-05 00:00:00','2015-08-25 17:15:02','2015-09-01 09:10:42'),(5,'Helena Custard','helena@gmail.com','2876838571fae268c28e0de99839a89c','6099370629','1991-05-05 00:00:00','2015-08-25 17:26:54','2015-09-01 09:10:42'),(6,'Sabina Casady','sabina@gmail.com','5ee17fb9841f93b214c88734685309a7','6099370629','1991-05-05 00:00:00','2015-08-25 17:29:22','2015-09-01 09:10:42'),(7,'Francene Widell','francene@gmail.com','bd420085dbd5fd23ab459ac902ea8715','6099370629','1991-05-05 00:00:00','2015-08-25 17:41:00','2015-09-01 09:10:42'),(8,'Chris Baker','chris@gmail.com','6c6d9676f341c3d8240a90e09e8ba6e4','6099370629','1991-05-05 00:00:00','2015-08-26 09:02:07','2015-09-01 09:10:42'),(16,'Jessica Davidson','jessica@gmail.com','8a694c8394dc7ed50f4bec4eb259fc29','6099370629','2015-08-11 00:00:00','2015-08-26 10:07:06','2015-09-01 09:10:42'),(18,'Jimmy Jun','jimmy@gmail.com','b4cc28efc75478348b9f628acd7ef716','6099370629','1986-05-20 00:00:00','2015-08-26 12:48:36','2015-09-01 09:10:42'),(22,'Isaac Lee','isaac@gmail.com','72026ce930053a12b3b40dd0ecdfa495','6099370629','1974-07-21 00:00:00','2015-08-31 13:19:14','2015-09-02 09:10:42'),(23,'Eduardo Baik','eduardo@gmail.com','c1c6ce8749065325ccf6d5a40b95e840','6099370629','1988-08-23 00:00:00','2015-09-01 09:11:29','2015-09-01 09:11:29'),(24,'Andrew Lee','andrew@gmail.com','dc44be344c496309f75530056f110000','6099370629','1977-06-22 00:00:00','2015-09-01 09:15:08','2015-09-01 09:15:08'),(25,'Alison Graves','alison@gmail.com','4365ab7e3e4ea22ffff9ce9a8f62a1dc','1112223333','1996-08-27 00:00:00','2015-09-01 20:08:43','2015-09-01 20:08:43'),(26,'Chelsea Schneider','chelsea@gmail.com','6b4e618a80271950c1a7be0b6fc07242','1231231234','1990-07-23 00:00:00','2015-09-01 20:09:05','2015-09-01 20:09:05'),(27,'Holly Castro','holly@gmail.com','94e220e82713b4e99383fa453faa2ccc','1212121212','1976-07-23 00:00:00','2015-09-01 20:09:32','2015-09-01 20:09:32'),(28,'Jermaine Patterson','jermaine@gmail.com','5b68051e1cba412509444da1d0b5e5f0','3332229999','1981-05-27 00:00:00','2015-09-01 20:09:53','2015-09-01 20:09:53'),(29,'Sonya Robbins','sonya@gmail.com','814e27376a70ba208483f664c99f9f8c','3332221111','1984-06-24 00:00:00','2015-09-01 20:10:12','2015-09-01 20:10:12'),(30,'Robin Newman','robin@gmail.com','5c9b3544df26167ee63bb1c6d2e2ac57','9998883333','1988-08-22 00:00:00','2015-09-01 20:10:30','2015-09-01 20:10:30'),(31,'Tricia Bell','tricia@gmail.com','d83c76d5d5208de16dc245e5a03292ed','8883229292','1997-07-23 00:00:00','2015-09-01 20:10:47','2015-09-01 20:10:47'),(32,'Bob Lopez','bob@gmail.com','a4c7f69e78245d1bb301cd6a975ca47a','2225559898','1984-05-23 00:00:00','2015-09-01 20:11:04','2015-09-01 20:11:04'),(33,'Debra Day','debra@gmail.com','9cb4d424e7bcf6c82ece7b934e754a1a','2223331010','1981-04-09 00:00:00','2015-09-01 20:11:43','2015-09-01 20:11:43'),(34,'Tanya Meyer','tanya@gmail.com','dde20973efc4b1d539acfe943c152aea','3322229494','1982-05-18 00:00:00','2015-09-01 20:12:06','2015-09-01 20:12:06'),(35,'Melissa Zimmerman','melissa@gmail.com','77e3c85b44f3cab39b6894cc2e828f8a','3339997676','1986-05-23 00:00:00','2015-09-01 20:12:39','2015-09-01 20:12:39'),(36,'Romona Kim','romona@gmail.com','ae5d72b59f8a3e0005512746791c92df','8882229392','1985-04-21 00:00:00','2015-09-01 20:12:58','2015-09-01 20:12:58'),(37,'Amy Peterson','amy@gmail.com','60547c915cb6763332ba9317cafa30f9','3876398282','1992-05-23 00:00:00','2015-09-01 20:13:15','2015-09-01 20:13:15'),(38,'Julia Nguyen','julia@gmail.com','aec2f47eb0b67efbb6978fa43f77c92f','9230803838','1991-04-22 00:00:00','2015-09-01 20:13:35','2015-09-01 20:13:35'),(39,'Danny Bridges','danny@gmail.com','1753899277d97eb341c3fdb64157a9c1','9382023838','1985-05-20 00:00:00','2015-09-01 20:13:53','2015-09-01 20:13:53'),(40,'Lucas Higgins','lucas@gmail.com','61e699ce5caaaa39d8a9c8a843eb1735','9832023838','1989-06-22 00:00:00','2015-09-01 20:14:24','2015-09-01 20:14:24'),(41,'Marshall Duncan','marshall@gmail.com','9719dfd3f3ae82018046868a91484587','9230803838','1983-07-23 00:00:00','2015-09-01 20:14:45','2015-09-01 20:14:45'),(42,'Jeffrey Moran','jeffrey@gmail.com','a8748a92f9bdbe0ecd58b20515577a9b','8320803838','1985-08-21 00:00:00','2015-09-01 20:15:09','2015-09-01 20:15:09');
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

-- Dump completed on 2015-09-01 21:12:33
