-- phpMyAdmin SQL Dump
-- version 4.0.10deb1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: May 30, 2015 at 03:46 PM
-- Server version: 5.5.41-0ubuntu0.14.04.1
-- PHP Version: 5.5.9-1ubuntu4.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `ci_multilevel_menu`
--

-- --------------------------------------------------------

--
-- Table structure for table `menus`
--

CREATE TABLE IF NOT EXISTS `menus` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `parent` int(11) DEFAULT NULL,
  `name` varchar(50) NOT NULL,
  `slug` varchar(50) NOT NULL,
  `number` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `parent` (`parent`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=18 ;

--
-- Dumping data for table `menus`
--

INSERT INTO `menus` (`id`, `parent`, `name`, `slug`, `number`) VALUES
(1, NULL, 'Item 0', 'Item-0', 1),
(2, NULL, 'Item 1', 'Item-1', 2),
(3, NULL, 'Item 2', 'Item-2', 3),
(4, NULL, 'Item 3', 'Item-3', 4),
(5, NULL, 'Item 4', 'Item-4', 5),
(6, NULL, 'Item 5', 'Item-5', 6),
(7, NULL, 'Item 6', 'Item-6', 7),
(8, 1, 'Item 0.1', 'item-0.1', 1),
(9, 1, 'Item 0.2', 'item-0-2', 2),
(10, 8, 'Item 0.1.1', 'item-0-1-1', 1),
(11, 8, 'Item 0.1.2', 'Item-0-1-2', 2),
(12, 10, 'Item 0.1.1.1', 'Item-0-1-1-1', 1),
(13, 10, 'Item 0.1.1.2', 'Item-0-1-1-2', 2),
(14, 2, 'Item 1.1', 'item-1-1', 1),
(15, 2, 'Item 1.2', 'item-1-2', 2),
(16, 3, 'Item 2.2', 'item-2-2', 2),
(17, 3, 'Item 2.1', 'item-2.1', 1);

--
-- Constraints for dumped tables
--

--
-- Constraints for table `menus`
--
ALTER TABLE `menus`
  ADD CONSTRAINT `menus_ibfk_1` FOREIGN KEY (`parent`) REFERENCES `menus` (`id`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
