-- phpMyAdmin SQL Dump
-- version 3.3.9
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Nov 14, 2023 at 11:56 AM
-- Server version: 5.5.8
-- PHP Version: 5.3.5

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `bank`
--

-- --------------------------------------------------------

--
-- Table structure for table `trans`
--

CREATE TABLE IF NOT EXISTS `trans` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `uid` varchar(30) NOT NULL,
  `name` varchar(50) NOT NULL,
  `mail` varchar(50) NOT NULL,
  `acno` varchar(50) NOT NULL,
  `damt` varchar(50) NOT NULL,
  `tamt` varchar(50) NOT NULL,
  `dat` date NOT NULL,
  `typee` varchar(50) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=17 ;

--
-- Dumping data for table `trans`
--

INSERT INTO `trans` (`id`, `uid`, `name`, `mail`, `acno`, `damt`, `tamt`, `dat`, `typee`) VALUES
(7, '2', 'ravi', 'ravi@gmail.com', '2164646489684968', '500', '2000', '2023-11-14', 'Debited'),
(8, '1', 'viki', 'vignesh.vickyvvs96@gmail.com', '98745632123645', '500', '2000', '2023-11-14', 'Credited'),
(9, '1', 'viki', 'vignesh.vickyvvs96@gmail.com', '98745632123645', '200', '2200', '2023-11-14', 'Credited'),
(11, '1', 'viki', 'vignesh.vickyvvs96@gmail.com', '98745632123645', '100', '2300', '2023-11-14', 'Credited'),
(12, '1', 'viki', 'vignesh.vickyvvs96@gmail.com', '98745632123645', '200', '2500', '2023-11-14', 'Credited'),
(13, '1', 'viki', 'vignesh.vickyvvs96@gmail.com', '98745632123645', '500', '3000', '2023-11-14', 'Credited'),
(14, '1', 'viki', 'vignesh.vickyvvs96@gmail.com', '98745632123645', '300', '2700', '2023-11-14', 'Debited'),
(15, '1', 'viki', 'vignesh.vickyvvs96@gmail.com', '98745632123645', '200', '2500', '2023-11-14', 'Debited'),
(16, '1', 'viki', 'vignesh.vickyvvs96@gmail.com', '98745632123645', '300', '2200', '2023-11-14', 'Debited');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE IF NOT EXISTS `user` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `name` varchar(30) NOT NULL,
  `mail` varchar(50) NOT NULL,
  `dob` varchar(50) NOT NULL,
  `address` varchar(50) NOT NULL,
  `acno` varchar(50) NOT NULL,
  `branch` varchar(50) NOT NULL,
  `pwd` varchar(50) NOT NULL,
  `mobile` varchar(50) NOT NULL,
  `balance` varchar(50) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `name`, `mail`, `dob`, `address`, `acno`, `branch`, `pwd`, `mobile`, `balance`) VALUES
(1, 'viki', 'vignesh.vickyvvs96@gmail.com', '2000-07-13', 'cbe', '98745632123645', 'gandhipuram', '6547', '9876543210', '2200'),
(2, 'ravi', 'ravi@gmail.com', '1990-02-13', 'cbee', '2164646489684968', 'cbe', '8632', '1234567890', '2000');
