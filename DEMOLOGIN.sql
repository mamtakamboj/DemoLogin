-- phpMyAdmin SQL Dump
-- version 3.2.2
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Mar 09, 2013 at 11:14 AM
-- Server version: 5.1.36
-- PHP Version: 5.2.10

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `DEMOLOGIN`
--

-- --------------------------------------------------------

--
-- Table structure for table `language`
--

CREATE TABLE IF NOT EXISTS `language` (
  `LANG_ID` int(11) NOT NULL AUTO_INCREMENT,
  `LANG_LOG_ID` int(11) NOT NULL,
  `LANG_LANGUAGE` varchar(20) NOT NULL,
  PRIMARY KEY (`LANG_ID`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=8 ;

--
-- Dumping data for table `language`
--

INSERT INTO `language` (`LANG_ID`, `LANG_LOG_ID`, `LANG_LANGUAGE`) VALUES
(1, 1, 'English'),
(2, 1, 'Hindi'),
(3, 1, 'Punjabi'),
(6, 3, 'English'),
(7, 3, 'Hindi');

-- --------------------------------------------------------

--
-- Table structure for table `login`
--

CREATE TABLE IF NOT EXISTS `login` (
  `LOG_ID` int(11) NOT NULL AUTO_INCREMENT,
  `LOG_USER_NAME` varchar(50) NOT NULL,
  `LOG_PASSWORD` varchar(20) NOT NULL,
  `LOG_EMAIL` varchar(100) NOT NULL,
  `LOG_GENDER` char(2) NOT NULL,
  `LOG_ADDRESS` varchar(200) NOT NULL,
  `LOG_COUNTRY` varchar(50) NOT NULL,
  PRIMARY KEY (`LOG_ID`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `login`
--

INSERT INTO `login` (`LOG_ID`, `LOG_USER_NAME`, `LOG_PASSWORD`, `LOG_EMAIL`, `LOG_GENDER`, `LOG_ADDRESS`, `LOG_COUNTRY`) VALUES
(1, 'Mamta', '12345', 'mamta@gmail.com', 'F', 'Noida', 'India'),
(3, 'Annu', '12345', 'annu@gmail.com', 'F', 'Delhi', 'India');
