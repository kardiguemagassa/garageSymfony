
--
-- Database: `garagesymfony`
--
CREATE DATABASE `garagesymfony` DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci;


--
-- Table structure for table `garages`
--
CREATE TABLE IF NOT EXISTS `garages`(
  `id` INT(11) NOT NULL PRIMARY KEY AUTO_INCREMENT,
  `name` VARCHAR (255) NOT NULL,
  `email` VARCHAR (255) NOT NULL,
  `phone` INT (11) NOT NULL,
  `address` VARCHAR (255) NOT NULL
) ENGINE=INNODB DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci COMMENT="Table garages";

INSERT INTO `garages` (`id`, `name`, `email`, `phone`, `address`) VALUES
(1, 'Garage Vincent Parrot', 'contact@vparrot.fr', '0251999999', '99, Roving Street 23 456 NYC');



--
-- Table structure for table `car`
--
CREATE TABLE IF NOT EXISTS `cars`(
  `id` INT(11) NOT NULL PRIMARY KEY AUTO_INCREMENT,
  `garages_id` INT(11),
  KEY `FK_GARAGES` (`garages_id`),
  `models_id` INT (255) NOT NULL,
  KEY `FK_MODELS` (`models_id`),
  `bran_id` INT (255) NOT NULL,
  KEY `FK_BRAND` (`brand_id`),
  `energy` VARCHAR (255) NOT NULL,
  `description` text,
  `image` VARCHAR (255) NOT NULL,
  `kilometer` VARCHAR (255) NOT NULL,
  `price` VARCHAR (255) NOT NULL,
  `year` VARCHAR (255) NOT NULL,
  `is_best` boolean (255) NOT NULL
) ENGINE=INNODB DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci COMMENT="Table cars";

INSERT INTO `cars` (`id`, `garages_id`, `models_id`, `brand_id`, `energy`, `kilometers`, `year`) VALUES

(2, 9, '308 1.5 BLUEHDI 130CH S&S ACTIVE BUSINESS', 'PEUGEOT', 'DIESEL', '118000', 2019),
(4, 10, 'SERIE 1 (F21/F20) 116DA 116CH URBANCHIC 5P', 'BMW', 'DIESEL', '140684', 2016),
(5, 11, 'GIULIETTA 1.6 JTDM 105CH DISTINCTIVE BUSINESS STOP&START', 'ALFA ROMEO', 'DIESEL', '102422', 2016);



--
-- Table structure for table `brand`
--
CREATE TABLE IF NOT EXISTS `brand`(
  `id` INT(11) NOT NULL PRIMARY KEY AUTO_INCREMENT,
  `libelle` VARCHAR (255) NOT NULL,
  `cars_id`INT(11),
  KEY `FK_CARS` (`cars_id`)
) ENGINE=INNODB DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci COMMENT="Table brand";



--
-- Table structure for table `models`
--
CREATE TABLE IF NOT EXISTS `models`(
  `id` INT(11) NOT NULL PRIMARY KEY AUTO_INCREMENT,
  `libelle` VARCHAR (255) NOT NULL,
  `cars_id`INT(11),
  KEY `FK_CARS` (`cars_id`)
) ENGINE=INNODB DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci COMMENT="Table models";



--
-- Table structure for table `comments`
--
CREATE TABLE IF NOT EXISTS `testimonails` (
  `id` int(11) NOT NULL AUTO_INCREMENT PRIMARY KEY,
  `author` varchar(255) NOT NULL,
  `message` text NOT NULL,
  `note` text NOT NULL,
  `created_at` datetime NOT NULL,
  `garages_id` INT(11),
  KEY `FK_GARAGES` (`garages_id`)
) ENGINE=INNODB DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci COMMENT="Table testimonails";

INSERT INTO `testimonials` (`id`, `garage_id`, `author`, `message`, `note`, `validated`) VALUES
(1, 1, 'Marcus', 'Atelier Convivial  !', 5, 1),
(2, 1, 'Bernadette', 'Réparation correct, bon retours', 4, 1);


--
-- Table structure for table `users`
--
CREATE TABLE IF NOT EXISTS `users`(
  `id` INT(11) NOT NULL PRIMARY KEY AUTO_INCREMENT,
  `email` VARCHAR (255) NOT NULL,
  `password` VARCHAR (255) NOT NULL,
  `first_name` VARCHAR (255) NOT NULL,
  `last_name` VARCHAR (255) NOT NULL,
  `role` VARCHAR (255) NOT NULL,
  `garages_id` INT(11),
  KEY `FK_GARAGES` (`garages_id`)
) ENGINE=INNODB DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci COMMENT="Table users";

INSERT INTO `users` (`id`, `firstname`, `lastname`, `email`, `password`, `roles`, `garage_id`) VALUES
(1001, 'Vincent', 'Parrot', 'v.parrot@vparrot.fr', '$2y$13$le163ag.M3oi4LpO7Je5WO6xRuBmaeqC2ny7uTHzmuwIwl30i00fa', '[\"ROLE_ADMIN\"]', 1),
(1002, 'John', 'Doe', 'j.doe@vparrot.fr', '$2y$13$RTxGT0uYC9To21.AAsXXeef1J/Xzb2CT8PIvbvS.0jAT9laRkWXO.', '[]', 1);


--
-- Table structure for table `services`
--
CREATE TABLE IF NOT EXISTS `services`(
  `id` INT(11) NOT NULL PRIMARY KEY AUTO_INCREMENT,
  `title` VARCHAR (255) NOT NULL,
  `description` text,
  `price` float,
  `garages_id` INT(11),
  KEY `FK_GARAGES` (`garages_id`),
  `image` VARCHAR (255) NOT NULL,
  `slug` VARCHAR (255) NOT NULL,
  `is_best` boolean (255) NOT NULL
) ENGINE=INNODB DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci COMMENT="Table services";

INSERT INTO `services` (`id`, `garage_id`, `title`, `description`, `price`) VALUES
(1, 1, 'Révision et vidange', 'Changement des filtres-Mise a niveau des liquides-Pression des pneus-Diagnostique expert', 100),
(2, 1, 'Diagnostic freinage', 'Remplacement plaquettes-Diagnostic ABS ou ESP-Purge liquide de frein-Configuration ABS', 159),
(3, 1, 'Distribution', 'Remplacement courroie de distribution-Remplacement galets tendeur-Remplacement pompes a eau-Lecture des codes défauts', 325);




--
-- Table structure for table `horaire`
--
CREATE TABLE IF NOT EXISTS `schedules`(
  `id` INT(11) NOT NULL PRIMARY KEY AUTO_INCREMENT,
  `openedDay` VARCHAR,
  `hoursAM` VARCHAR,
  `hoursPM` VARCHAR,
  `garages_id` INT(11),
  KEY `FK_GARAGES` (`garages_id`),
) ENGINE=INNODB DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci COMMENT="Table schedules";
