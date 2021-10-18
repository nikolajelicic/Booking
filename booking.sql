-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Oct 18, 2021 at 01:04 PM
-- Server version: 5.7.26
-- PHP Version: 7.2.18

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `booking`
--

-- --------------------------------------------------------

--
-- Table structure for table `houses`
--

DROP TABLE IF EXISTS `houses`;
CREATE TABLE IF NOT EXISTS `houses` (
  `idhouses` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(45) NOT NULL,
  `description` text NOT NULL,
  `images` text NOT NULL,
  `city` varchar(255) NOT NULL,
  `address` varchar(255) NOT NULL,
  `users_idusers` int(10) UNSIGNED NOT NULL,
  PRIMARY KEY (`idhouses`),
  UNIQUE KEY `idhouses_UNIQUE` (`idhouses`),
  KEY `fk_houses_users1_idx` (`users_idusers`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `houses`
--

INSERT INTO `houses` (`idhouses`, `name`, `description`, `images`, `city`, `address`, `users_idusers`) VALUES
(3, 'Kalman', 'Objekat Zlatibor Gold Kalman nudi smeštaj sa besplatnim WiFi internetom i besplatnim privatnim parkingom, a nalazi se na Zlatiboru, u regionu Centralne Srbije.\r\n\r\nSve smeštajne jedinice sadrže prostor za sedenje, kauč na razvlačenje, flat-screen TV i potpuno opremljenu kuhinju sa trpezarijom.\r\n\r\nGostima apartmana na raspolaganju je terasa.\r\n\r\nMokra Gora se nalazi na 40 km od objekta Zlatibor Gold Kalman, dok su Kaluđerske Bare udaljene 36 km.', '1617726307download.jpg', 'Zlatibor', 'Miladina Pecinara 33', 1),
(4, ' VIP Casa Club', 'Apartmani Vip Casa Club nalaze se na 450 metara od Glavne autobuske stanice na Zlatiboru. U ponudi su velnes sadržaji i bazen koji radi tokom cele godine. Gostima su na raspolaganju besplatan bežični internet i parking u okviru objekta.\r\n\r\nApartmani sadrže prostor za sedenje opremljen flat-screen TV-om sa kablovskim kanalima, trpezariju i potpuno opremljenu kuhinju. Pored toga imaju sopstveno kupatilo sa tušem, fenom za kosu i besplatnim toaletnim priborom. Peškiri i posteljina su obezbeđeni.\r\n\r\nZa goste se obezbeđen popust na korišćenje velnes sadržaja, uključujući bazen, hidromasažnu kadu, saunu i parno kupatilo. Objekat poseduje i bar.\r\n\r\nOkolina je pogodna za vožnju bicikla i skijanje. Gosti mogu takođe iznajmiti bicikle u okviru objekta. Ski centar Tornik je udaljen 12 km od apartmana Vip Casa Club.', '1617726414LUX_3511-HDR-394x394.jpg', 'Zlatibor', 'Predraga Vecerinca', 1),
(5, 'Apartmani Pekovic', 'Objekat Vila Peković, koji je okružen borovim drvećem, nalazi se na Zlatiboru i nudi smeštaj za samostalan boravak sa besplatnim WiFi internetom i besplatnim privatnim parkingom. Zlatiborsko jezero udaljeno je 650 metara.\r\n\r\nSvaka jedinica ima moderne pogodnosti, uključujući flat-screen TV sa satelitskim kanalima, prostor za sedenje i opremljenu kuhinju sa trpezarijom. Pojedini apartmani sadrže terasu sa baštenskim nameštajem. Sopstvena kupatila su opremljena tušem bez kabine i besplatnim toaletnim priborom.', '1617726534154629949.jpg', 'Zlatibor', 'Ive Andrica', 1),
(6, 'Hotel Izvor', 'Smešten u prelepom okruženju, gde priroda leči i okrepljuje čistim vazduhom i blagotvornim mineralnim vodama, hotel „Izvor“, udaljen od Beograda svega 75 km, nadaleko je prepoznatljiv po svojoj SPA & Wellness i kongresnoj ponudi. Dokaz za to su i brojne nagrade koje je ovaj hotel osvojio.', '1618331101download.jpg', 'Ivana Ivanovica 34', 'Arandjelovac', 1),
(7, 'Hotel Mona', 'Okružen predivnom borovom šumom, u samom centru Zlatibora - nalazi se hotel Zlatibor Mona. Zlatibor je planinski turistički centar i visinsko lečilište, nadmorske visine 700-1500m, u jugozapadnoj Srbiji, udaljen od Beograda i najbližeg aerodroma svega 235 km.', '1621334775274418927.jpg', 'Zlatibor', 'Dimitrija Tucovica', 1),
(8, 'Fruske Terme', 'Preko puta hotela na 150m, nalazi se garaža sa 350 parking mesta. Uz video nadzor našim gostima je obezbeđeno sigurno mesto za njihova vozila tokom boravka u hotelu. Hotel ne poseduje uslugu parkiranja vozila. Parking ispred hotela dostupan je isključivo samo prilikom prijave i odjave gostiju-30 min. Zbog ograničenog broja mesta ispred hotela, za sve naše goste koji koriste uslugu smeštaja ili dnevnog boravka u wellness & spa centru, obezbedili smo besplatno korišćenje garaže. Parkiranje ispred hotela se tretira kao dnevni parking i naplaćuje se po utvrđenom cenovniku.', '1621951208fruske-terme-2020-15-700x420.jpg', 'Fruska Gora', 'Staza Zdravlja 39', 1);

-- --------------------------------------------------------

--
-- Table structure for table `reservations`
--

DROP TABLE IF EXISTS `reservations`;
CREATE TABLE IF NOT EXISTS `reservations` (
  `idreservations` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `start_time` varchar(255) NOT NULL,
  `end_time` varchar(255) NOT NULL,
  `price` int(11) NOT NULL,
  `users_idusers` int(10) UNSIGNED NOT NULL,
  `rooms_idrooms` int(10) UNSIGNED NOT NULL,
  `num_of_persons` int(2) NOT NULL,
  PRIMARY KEY (`idreservations`),
  UNIQUE KEY `idrezervations_UNIQUE` (`idreservations`),
  KEY `fk_rezervations_users1_idx` (`users_idusers`),
  KEY `fk_rezervations_rooms1_idx` (`rooms_idrooms`)
) ENGINE=InnoDB AUTO_INCREMENT=23 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `reservations`
--

INSERT INTO `reservations` (`idreservations`, `start_time`, `end_time`, `price`, `users_idusers`, `rooms_idrooms`, `num_of_persons`) VALUES
(8, '06/17/2021', '06/19/2021', 8000, 9, 1, 2),
(20, '07/22/2021', '07/31/2021', 72000, 3, 1, 4),
(21, '10/15/2021', '10/17/2021', 8000, 3, 1, 2),
(22, '10/26/2021', '10/28/2021', 8000, 10, 1, 2);

-- --------------------------------------------------------

--
-- Table structure for table `role`
--

DROP TABLE IF EXISTS `role`;
CREATE TABLE IF NOT EXISTS `role` (
  `idrole` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `role_name` varchar(45) NOT NULL,
  PRIMARY KEY (`idrole`),
  UNIQUE KEY `role_name_UNIQUE` (`role_name`),
  UNIQUE KEY `idtable1_UNIQUE` (`idrole`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `role`
--

INSERT INTO `role` (`idrole`, `role_name`) VALUES
(1, 'Admin'),
(2, 'User');

-- --------------------------------------------------------

--
-- Table structure for table `rooms`
--

DROP TABLE IF EXISTS `rooms`;
CREATE TABLE IF NOT EXISTS `rooms` (
  `idrooms` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `room_name` varchar(255) NOT NULL,
  `description` varchar(2000) NOT NULL,
  `price_per_day` int(11) NOT NULL,
  `images` text NOT NULL,
  `contact` char(15) NOT NULL,
  `houses_idhouses` int(10) UNSIGNED NOT NULL,
  `num_of_beds` int(2) NOT NULL,
  `max_persons` int(2) NOT NULL,
  PRIMARY KEY (`idrooms`),
  UNIQUE KEY `idrooms_UNIQUE` (`idrooms`),
  UNIQUE KEY `room_name_UNIQUE` (`room_name`),
  KEY `fk_rooms_houses1_idx` (`houses_idhouses`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `rooms`
--

INSERT INTO `rooms` (`idrooms`, `room_name`, `description`, `price_per_day`, `images`, `contact`, `houses_idhouses`, `num_of_beds`, `max_persons`) VALUES
(1, 'Soba Kalman 33', 'Ovaj luksuzni apartman sa 4* se nalazi u potkrovlju objekta broj 4, u okviru kompleksa Kalman Zlatibor Centar. Moderno je dizajniran, ima odvojenu spavaću sobu sa bračnim krevetom (140 cm) i dnevnu sobu sa kaučem koji se razvlači u krevet na kome mogu spavati dve osobe. Klimatizovan. Kuhinja je potpuno opremljena (induktivna ploča, rerna, kuvalo za vodu, osnovni sudovi). Apartman ima dva televizora sa osnovnim kablovskim paketom i brzu WIFI konekciju u celom stanu. Iz apartmana L27 gosti mogu liftom direktno doći do spa centra i teretane. Mogućnost iznajmljivanja garažnog mesta tokom boravka.', 2000, '[\"1617890111246650056.jpg\",\"1617890111256136905.jpg\",\"1617890111256354830.jpg\",\"1617890111256356113.jpg\"]', '78578575', 3, 3, 6),
(2, 'Premium Apartman Kalman L28', 'Ovaj prostrani luksuzno opremljen apartman nalazi se u potkrovlju zgrade broj 4 u okviru Kalman kompleksa. U spavaćoj sobi je bračni krevet, a u dnevnoj kauč i fotelja na razvlačenje na kojima mogu spavati još dve osobe. Moderno dizajnirana kuhinja je potpuno opremljena (induktivna ploča, rerna, frižider, osnovni sudovi). Apartman je klimatizovan. Energija ovog stana ukrašće Vam srce na prvi pogled. Iz apartmana gosti mogu liftom direktno doći do spa centra i teretane koji se mogu koristiti uz doplatu. Mogućnost iznajmljivanja garažnog mesta.', 3000, '[\"1617898946208554080.jpg\",\"1617898946208554091.jpg\",\"1617898946208554096.jpg\",\"1617898946208554100.jpg\",\"1617898946208634857.jpg\",\"1617898946208634860.jpg\"]', '062352594', 3, 2, 4);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `idusers` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(45) NOT NULL,
  `surname` varchar(45) DEFAULT NULL,
  `email` varchar(45) NOT NULL,
  `password` varchar(255) NOT NULL,
  `role_idrole` int(10) UNSIGNED NOT NULL,
  PRIMARY KEY (`idusers`),
  UNIQUE KEY `idusers_UNIQUE` (`idusers`),
  UNIQUE KEY `email_UNIQUE` (`email`),
  KEY `fk_users_role_idx` (`role_idrole`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`idusers`, `name`, `surname`, `email`, `password`, `role_idrole`) VALUES
(1, 'Nikola', 'Jelicic', 'jelicicnikola99@gmail.com', '8C6976E5B5410415BDE908BD4DEE15DFB167A9C873FC4BB8A81F6F2AB448A918', 1),
(3, 'Marko', 'Markovic', 'marko@gmail.com', '8c5faf36ce0dae48351f5e09c5133fdaddcf52d9baf4369db027766a12c1742f', 2),
(4, 'Milica', 'Mirkovic', 'milica@gmail.com', 'f50ccb98908dd89ef400372d10750d4c506bebdc34c8141e11d2fb962ebb1b5d', 2),
(7, 'Uros', 'Jevtic', 'uros@gmail.com', 'd47119e45f5e18ce5c9031f68de36db31383e030c249e74e79bd5d384e4f9e83', 2),
(8, 'Zeljko', 'Jelicic', 'zeljko@gmail.com', 'e045e9530c8d81c3492dc8f065dbee6aa45148e7acc42e9342dd725c69d3fe4d', 2),
(9, 'Djordje', 'Kukolj', 'djordje@gmail.com', '8b392d8575e5d482197f24340aba5d1b14eba2cc1007890274ec0f283303cb03', 2),
(10, 'Jovana', 'Jelicic', 'jovana02@gmail.com', '98a24caa8d13dccb5a3efd45f4523968186a095bfb282fd02e7dd4b6ef566a4e', 2);

--
-- Constraints for dumped tables
--

--
-- Constraints for table `houses`
--
ALTER TABLE `houses`
  ADD CONSTRAINT `fk_houses_users1` FOREIGN KEY (`users_idusers`) REFERENCES `users` (`idusers`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `reservations`
--
ALTER TABLE `reservations`
  ADD CONSTRAINT `fk_rezervations_rooms1` FOREIGN KEY (`rooms_idrooms`) REFERENCES `rooms` (`idrooms`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_rezervations_users1` FOREIGN KEY (`users_idusers`) REFERENCES `users` (`idusers`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `rooms`
--
ALTER TABLE `rooms`
  ADD CONSTRAINT `fk_rooms_houses1` FOREIGN KEY (`houses_idhouses`) REFERENCES `houses` (`idhouses`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `fk_users_role` FOREIGN KEY (`role_idrole`) REFERENCES `role` (`idrole`) ON DELETE NO ACTION ON UPDATE NO ACTION;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
