-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Oct 03, 2025 at 11:13 AM
-- Server version: 8.0.19
-- PHP Version: 8.0.1

SET FOREIGN_KEY_CHECKS=0;
SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `library`
--
CREATE DATABASE IF NOT EXISTS `library` DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci;
USE `library`;

-- --------------------------------------------------------

--
-- Table structure for table `author`
--

DROP TABLE IF EXISTS `author`;
CREATE TABLE IF NOT EXISTS `author` (
  `id` int NOT NULL AUTO_INCREMENT,
  `first_name` varchar(100) NOT NULL,
  `last_name` varchar(100) NOT NULL,
  `nationality` varchar(100) NOT NULL,
  `birth_date` date NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `author`
--

INSERT INTO `author` (`id`, `first_name`, `last_name`, `nationality`, `birth_date`) VALUES
(1, 'Ibrahim', 'Gulyamov', 'Uzbek', '1992-11-12'),
(2, 'Lao', 'She', 'Chinese', '1981-11-09'),
(3, 'Deyl ', 'Karnegi', 'English', '1886-07-18'),
(4, 'Abdulla', 'Qahhor', 'Uzbek', '1960-09-30'),
(5, 'O\'tkir', 'Xoshimov', 'Uzbek', '1973-07-24'),
(6, 'Allan', 'Dib', 'Usa', '1980-10-26');

-- --------------------------------------------------------

--
-- Table structure for table `book`
--

DROP TABLE IF EXISTS `book`;
CREATE TABLE IF NOT EXISTS `book` (
  `id` int NOT NULL AUTO_INCREMENT,
  `title` varchar(100) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `author_id` int NOT NULL,
  `isbn` varchar(100) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `genre` varchar(100) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `publisher` varchar(100) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `pub_date` date DEFAULT NULL,
  `copies_available` varchar(100) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `quantity` int NOT NULL,
  PRIMARY KEY (`id`),
  KEY `author_id` (`author_id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `book`
--

INSERT INTO `book` (`id`, `title`, `author_id`, `isbn`, `genre`, `publisher`, `pub_date`, `copies_available`, `quantity`) VALUES
(1, 'Biznessdagi 99 xato va ularga yechimlar', 1, '978-9910-9940-2-9', 'Business', 'Oltin qalam nashriyoti', '2023-07-23', 'No', 38),
(2, 'Bir varoqli Marketing Reja', 6, '978-9943-23-197-9', 'Marketing', 'Asaxiy Books', '2019-12-11', 'No', 20),
(4, 'Mushuklar Shahri Xotiralari', 2, '978-9943-43-167-7', 'Badiiy', 'G\'ofur G\'ulom', '2009-09-09', 'Yes', 1000);

-- --------------------------------------------------------

--
-- Table structure for table `member`
--

DROP TABLE IF EXISTS `member`;
CREATE TABLE IF NOT EXISTS `member` (
  `id` int NOT NULL AUTO_INCREMENT,
  `first_name` varchar(100) NOT NULL,
  `last_name` varchar(100) NOT NULL,
  `address` varchar(100) NOT NULL,
  `phone` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `start_date` date NOT NULL,
  `expiry_date` date NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `member`
--

INSERT INTO `member` (`id`, `first_name`, `last_name`, `address`, `phone`, `email`, `start_date`, `expiry_date`) VALUES
(1, 'Nasimjon', 'Oxunjonov', 'Ferghana', '905605678', 'nasimjon12@gmail.com', '2023-11-05', '2024-11-05'),
(3, 'Nurmuhammad', 'Boratov', 'Ташкент, Яшнободский район, махалля Асалобод', '998930655783', 'boratovnurmuhammad0930@gmail.com', '2022-08-25', '2024-12-03');

-- --------------------------------------------------------

--
-- Table structure for table `register`
--

DROP TABLE IF EXISTS `register`;
CREATE TABLE IF NOT EXISTS `register` (
  `id` int NOT NULL AUTO_INCREMENT,
  `name` varchar(100) NOT NULL,
  `surname` varchar(100) NOT NULL,
  `age` int NOT NULL,
  `gender` varchar(10) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=19 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `register`
--

INSERT INTO `register` (`id`, `name`, `surname`, `age`, `gender`) VALUES
(1, 'MuhammadYusuf', 'Akramov', 20, 'Male'),
(13, 'Abdulmajit', 'Murodov', 21, 'Male'),
(15, 'Sanobar', 'Bahtiyorova', 23, 'Female'),
(18, 'Hayitboyev', 'Imron', 25, 'Male');

-- --------------------------------------------------------

--
-- Table structure for table `staff`
--

DROP TABLE IF EXISTS `staff`;
CREATE TABLE IF NOT EXISTS `staff` (
  `id` int NOT NULL AUTO_INCREMENT,
  `first_name` varchar(100) NOT NULL,
  `last_name` varchar(100) NOT NULL,
  `position` varchar(100) NOT NULL,
  `phone` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `hiredate` date NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `staff`
--

INSERT INTO `staff` (`id`, `first_name`, `last_name`, `position`, `phone`, `email`, `hiredate`) VALUES
(1, 'Samuel', 'Edvardo', 'Manager', '998902355678', 'samed123@gmail.com', '2023-03-08'),
(2, 'Jahongir', 'Sultonov', 'Seller', '998911458697', 'jaha8697@gmail.com', '2022-06-25'),
(3, 'Mirjahon', 'Shomurodov', 'Seller', '998969897989', 'salimjonaka@gmail.com', '2021-06-30');

-- --------------------------------------------------------

--
-- Table structure for table `transaction`
--

DROP TABLE IF EXISTS `transaction`;
CREATE TABLE IF NOT EXISTS `transaction` (
  `id` int NOT NULL AUTO_INCREMENT,
  `book_id` int NOT NULL,
  `member_id` int NOT NULL,
  `staff_id` int NOT NULL,
  `borrow_date` date NOT NULL,
  `return_date` date NOT NULL,
  PRIMARY KEY (`id`),
  KEY `book_id` (`book_id`,`member_id`,`staff_id`),
  KEY `member_id` (`member_id`),
  KEY `staff_id` (`staff_id`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `transaction`
--

INSERT INTO `transaction` (`id`, `book_id`, `member_id`, `staff_id`, `borrow_date`, `return_date`) VALUES
(1, 1, 1, 2, '2024-01-01', '2024-11-01'),
(7, 2, 1, 1, '2024-06-12', '2024-10-30');

--
-- Constraints for dumped tables
--

--
-- Constraints for table `book`
--
ALTER TABLE `book`
  ADD CONSTRAINT `book_ibfk_1` FOREIGN KEY (`author_id`) REFERENCES `author` (`id`);

--
-- Constraints for table `transaction`
--
ALTER TABLE `transaction`
  ADD CONSTRAINT `transaction_ibfk_1` FOREIGN KEY (`book_id`) REFERENCES `book` (`id`),
  ADD CONSTRAINT `transaction_ibfk_2` FOREIGN KEY (`member_id`) REFERENCES `member` (`id`),
  ADD CONSTRAINT `transaction_ibfk_3` FOREIGN KEY (`staff_id`) REFERENCES `staff` (`id`);
SET FOREIGN_KEY_CHECKS=1;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
