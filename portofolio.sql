-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Aug 09, 2019 at 12:56 PM
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
-- Database: `portofolio`
--

-- --------------------------------------------------------

--
-- Table structure for table `admins`
--

DROP TABLE IF EXISTS `admins`;
CREATE TABLE IF NOT EXISTS `admins` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `first_name` varchar(30) DEFAULT NULL,
  `last_name` varchar(30) DEFAULT NULL,
  `email` varchar(50) DEFAULT NULL,
  `username` varchar(30) DEFAULT NULL,
  `hashed_password` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `index_username` (`username`)
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admins`
--

INSERT INTO `admins` (`id`, `first_name`, `last_name`, `email`, `username`, `hashed_password`) VALUES
(4, 'firstName', 'lastName', 'your@email.com', 'Admin', 'hasshedPassword$2y$10$zptBTxcuqCRcjAzFG8YQO.Tv0BtBuU.MI3Md951y');

-- --------------------------------------------------------

--
-- Table structure for table `pages`
--

DROP TABLE IF EXISTS `pages`;
CREATE TABLE IF NOT EXISTS `pages` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `subject_id` int(11) DEFAULT NULL,
  `menu_name` varchar(255) DEFAULT NULL,
  `icon` varchar(30) NOT NULL,
  `position` int(3) DEFAULT NULL,
  `visible` tinyint(1) DEFAULT NULL,
  `content` text,
  PRIMARY KEY (`id`),
  KEY `fk_subject_id` (`subject_id`)
) ENGINE=MyISAM AUTO_INCREMENT=37 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pages`
--

INSERT INTO `pages` (`id`, `subject_id`, `menu_name`, `icon`, `position`, `visible`, `content`) VALUES
(16, 11, 'PHP', 'fab fa-php', 1, 0, '<h1>The page is in development</1>'),
(19, 11, 'Html5', ' fab fa-html5', 1, 0, '<h1> This page is under development</h1>'),
(20, 11, 'CSS3', 'fab fa-css3-alt', 2, 1, '<h1> This page is under development. </h1>'),
(21, 11, 'git', 'git-alt -- fab fa-git-alt', 1, 1, '<h1> This page is under development. </h1>'),
(22, 11, 'JavaScript', 'fab fa-js-square', 1, 1, '<h1> This page is under development. </h1>'),
(23, 11, 'NPM', 'fab fa-npm', 1, 1, '<h1> This page is under development. </h1>'),
(24, 11, 'Nodejs', 'fab fa-node', 1, 1, '<h1> This page is under development. </h1>'),
(25, 11, 'React', 'fab fa-react', 1, 1, '<h1> This page is under development. </h1>'),
(26, 11, 'SASS', 'fab fa-sass', 1, 1, '<h1> This page is under development. </h1>'),
(27, 11, 'Wordpress', 'fab fa-wordpress-simple', 1, 1, '<h1> This page is under development. </h1>'),
(28, 11, 'Adobe', 'fab fa-adobe', 1, 1, '<h1> This page is under development. </h1>'),
(32, 12, 'Linkedin', 'fab fa-linkedin-in', 1, 1, '<h1> This page is under development. </h1>'),
(33, 12, 'Github', 'fab fa-github-square', 1, 1, '<h1> This page is under development. </h1>'),
(34, 14, 'Education', 'fas fa-graduation-cap', 1, 1, '<h1> This page is under development. </h1>'),
(35, 14, 'Hobby', 'fas fa-icons', 1, 1, '<h1> This page is under development. </h1>');

-- --------------------------------------------------------

--
-- Table structure for table `subjects`
--

DROP TABLE IF EXISTS `subjects`;
CREATE TABLE IF NOT EXISTS `subjects` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `icon` varchar(20) DEFAULT NULL,
  `menu_name` varchar(255) DEFAULT NULL,
  `position` int(3) DEFAULT NULL,
  `visible` tinyint(1) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=18 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `subjects`
--

INSERT INTO `subjects` (`id`, `icon`, `menu_name`, `position`, `visible`) VALUES
(11, 'fas fa-laptop-code', 'Skills', 3, 1),
(10, 'fas fa-home', 'Home', 1, 1),
(12, 'fas fa-address-book', 'Contact', 4, 1),
(14, 'fas fa-user', 'About', 2, 1),
(16, 'fas fa-file-alt', 'About alt', 2, 0);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
