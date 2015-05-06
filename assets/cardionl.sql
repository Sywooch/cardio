-- phpMyAdmin SQL Dump
-- version 4.1.14
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: May 06, 2015 at 09:57 PM
-- Server version: 5.6.17
-- PHP Version: 5.5.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `cardionl`
--

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE IF NOT EXISTS `products` (
  `ProductId` int(50) NOT NULL AUTO_INCREMENT,
  `ProductTitle` varchar(255) NOT NULL,
  `ProductUrl` varchar(255) NOT NULL,
  PRIMARY KEY (`ProductId`),
  UNIQUE KEY `ProductUrl` (`ProductUrl`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=3 ;

-- --------------------------------------------------------

--
-- Table structure for table `smartphones`
--

CREATE TABLE IF NOT EXISTS `smartphones` (
  `ProductId` int(50) NOT NULL AUTO_INCREMENT,
  `ProductTitle` varchar(255) NOT NULL,
  `ProductUrl` varchar(255) NOT NULL,
  `ProductSKU` varchar(255) NOT NULL,
  `ProductStatus` tinyint(1) NOT NULL,
  `ProductTags` text NOT NULL,
  `ProductPrice` decimal(8,2) NOT NULL,
  `ProductSalePrice` decimal(8,2) DEFAULT NULL,
  `ProductSaleStartDate` datetime DEFAULT NULL,
  `ProductSaleEndDate` datetime DEFAULT NULL,
  `ProductStockLevel` int(8) NOT NULL,
  `ProductStockStatus` tinyint(1) NOT NULL,
  `ProductGallery` text NOT NULL,
  PRIMARY KEY (`ProductId`),
  UNIQUE KEY `ProductUrl` (`ProductUrl`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `smartphones`
--

INSERT INTO `smartphones` (`ProductId`, `ProductTitle`, `ProductUrl`, `ProductSKU`, `ProductStatus`, `ProductTags`, `ProductPrice`, `ProductSalePrice`, `ProductSaleStartDate`, `ProductSaleEndDate`, `ProductStockLevel`, `ProductStockStatus`, `ProductGallery`) VALUES
(2, 'Samsung Galaxy S6 Black', 'samsung-galaxy-s6-black', 'SAM-GX-S6-B', 1, '', '745.99', '699.99', '2015-04-10 00:00:00', '2015-04-17 00:00:00', 10, 2, 'a:6:{i:0;a:3:{s:4:"code";s:32:"bduhc-roipjnww4p5wa3zuq043vlrlsa";s:9:"extension";s:3:"jpg";s:12:"originalName";s:32:"samsung_galaxy_s6_black_back.jpg";}i:1;a:3:{s:4:"code";s:32:"vnd-y3ccrsp5zyh1jjewxmytohs0z6m9";s:9:"extension";s:3:"jpg";s:12:"originalName";s:33:"samsung_galaxy_s6_black_front.jpg";}i:2;a:3:{s:4:"code";s:32:"lcpz15n7mvwibqedyjbp4jxupzzghter";s:9:"extension";s:3:"jpg";s:12:"originalName";s:38:"samsung_galaxy_s6_black_horizontal.jpg";}i:3;a:3:{s:4:"code";s:32:"rxd0xxechnnrt_zcwnpoclqkaeqvqujw";s:9:"extension";s:3:"jpg";s:12:"originalName";s:32:"samsung_galaxy_s6_black_left.jpg";}i:4;a:3:{s:4:"code";s:32:"8fzf_aavbuauen1voliwq5vlajptghta";s:9:"extension";s:3:"jpg";s:12:"originalName";s:33:"samsung_galaxy_s6_black_right.jpg";}i:5;a:3:{s:4:"code";s:32:"agqbzy2dlu18ydujconwmfag2ahnsv0-";s:9:"extension";s:3:"jpg";s:12:"originalName";s:38:"samsung_galaxy_s6_black_right_back.jpg";}}');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `UserId` int(50) NOT NULL AUTO_INCREMENT,
  `UserEmail` varchar(50) NOT NULL,
  `UserPasswordHash` varchar(255) NOT NULL,
  `UserPasswordResetToken` varchar(255) DEFAULT NULL,
  `UserAuthKey` int(255) NOT NULL,
  `UserRole` int(50) NOT NULL,
  `UserStatus` int(50) NOT NULL,
  `UserDateCreated` datetime NOT NULL,
  PRIMARY KEY (`UserId`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`UserId`, `UserEmail`, `UserPasswordHash`, `UserPasswordResetToken`, `UserAuthKey`, `UserRole`, `UserStatus`, `UserDateCreated`) VALUES
(1, 'olegkalyuga@gmail.com', '$2y$13$Y2IMTjpv8pWblPCZsNI8puBMWC4vvxYrQApV2p/Id/sMq.KQDaG3C', NULL, 0, 1, 1, '0000-00-00 00:00:00');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
