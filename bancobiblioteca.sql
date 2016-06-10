-- phpMyAdmin SQL Dump
-- version 4.0.10deb1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Jun 10, 2016 at 02:06 AM
-- Server version: 5.5.49-0ubuntu0.14.04.1
-- PHP Version: 5.5.9-1ubuntu4.17

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `bancobiblioteca`
--

-- --------------------------------------------------------

--
-- Table structure for table `Book`
--

CREATE TABLE IF NOT EXISTS `Book` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(100) NOT NULL,
  `year` int(11) NOT NULL,
  `author` varchar(100) NOT NULL,
  `qut` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

--
-- Dumping data for table `Book`
--

INSERT INTO `Book` (`id`, `name`, `year`, `author`, `qut`) VALUES
(1, 'Harry Pootter', 2011, 'Marisa', 2323),
(2, 'LÃ­der 24 horas por dia', 2014, 'Maria de Lourdes', 1),
(3, 'A Vida do bebÃª', 2012, 'Rinaldo de Lamare', 1),
(4, 'Promat de MatemÃ¡tica', 1999, 'Maria Capucho', 1),
(5, 'MatemÃ¡tica', 1990, 'Ruanyto', 1);

-- --------------------------------------------------------

--
-- Table structure for table `User`
--

CREATE TABLE IF NOT EXISTS `User` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(15) DEFAULT NULL,
  `login` varchar(15) NOT NULL,
  `senha` varchar(8) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `login` (`login`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=42 ;

--
-- Dumping data for table `User`
--

INSERT INTO `User` (`id`, `name`, `login`, `senha`) VALUES
(24, 'Carol da Cris', 'carol', 'carol'),
(25, 'Manuel Duran', 'manolo', 'manolo'),
(26, 'Ana Cristina', 'ana', 'ana'),
(27, 'Herminio ', 'jorge', 'jorge'),
(28, 'Ana Maria', 'aninha', 'aninha'),
(29, 'Giovana Felix', 'giovana', 'giovana'),
(30, 'Luciano', 'lu', 'lu'),
(31, 'Valentina Perez', 'va', 'va'),
(32, 'xxx', 'bbb', '111'),
(33, 'Ramon', 'ramon', 'ramon'),
(34, 'Marcelo Mattos', 'marcelo', '2a2b'),
(35, 'Vitor Duarte', 'vitor', 'vitor'),
(36, 'Amanda', 'ama', '1c3d'),
(37, 'Richard Lopes', 'lopes', '1ghj'),
(38, 'Miguel ', 'mig', 'mig'),
(39, 'Batman', 'bat', 'bat'),
(40, 'Batata', 'Batata16', 'Batata'),
(41, 'joao', 'j', 'j');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
