-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Oct 10, 2021 at 09:24 PM
-- Server version: 5.7.31
-- PHP Version: 7.3.21

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `nutportal`
--

-- --------------------------------------------------------

--
-- Table structure for table `due_payment`
--

DROP TABLE IF EXISTS `due_payment`;
CREATE TABLE IF NOT EXISTS `due_payment` (
  `dp_id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` varchar(1000) NOT NULL,
  `id_number` varchar(1000) NOT NULL,
  `paid_date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `expired_date` varchar(50) NOT NULL,
  `dstatus` varchar(50) NOT NULL,
  `dateuploaded` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`dp_id`)
) ENGINE=MyISAM AUTO_INCREMENT=11 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `due_payment`
--

INSERT INTO `due_payment` (`dp_id`, `user_id`, `id_number`, `paid_date`, `expired_date`, `dstatus`, `dateuploaded`) VALUES
(10, '11', '111258', '2021-10-10 00:00:00', '2022-10-10', 'valid', '2021-10-10 22:17:13'),
(8, '1', '4027', '2021-10-07 00:00:00', '2022-10-07', 'valid', '2021-10-08 23:32:12'),
(6, '5', '3029', '2021-10-08 21:07:50', '2022-10-08', 'valid', '2021-10-08 23:22:50');

-- --------------------------------------------------------

--
-- Table structure for table `staff`
--

DROP TABLE IF EXISTS `staff`;
CREATE TABLE IF NOT EXISTS `staff` (
  `staff_id` int(11) NOT NULL AUTO_INCREMENT,
  `firstname` varchar(50) NOT NULL,
  `lastname` varchar(50) NOT NULL,
  `email` varchar(500) NOT NULL,
  `phone` varchar(50) NOT NULL,
  `postheld` varchar(50) NOT NULL,
  `passport` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `status` varchar(50) NOT NULL,
  `regdate` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`staff_id`),
  UNIQUE KEY `email` (`email`)
) ENGINE=MyISAM AUTO_INCREMENT=11 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `staff`
--

INSERT INTO `staff` (`staff_id`, `firstname`, `lastname`, `email`, `phone`, `postheld`, `passport`, `password`, `status`, `regdate`) VALUES
(3, 'Matthew', 'Idepefo', 'admin@gmail.com', '08067382624', 'Admin', 'Mr dimdesmond@gmail.comIMG_20171126_174906_862.jpg', 'admin', 'active', '2021-10-06 17:45:10'),
(5, 'Silver', 'Daniel', 'officer@gmail.com', '0940494003', 'Officer', 'Silversilver@gmail.comFB_IMG_1482935316553.jpg', 'officer', 'active', '2021-10-09 07:45:16'),
(4, 'Dayo', 'Bello', 'seniorofficer@gmail.com', '09048846734', 'Senior Officer', 'Dayoad@ad.comObahiagbon-new1-300x190.jpg', 'seniorofficer', 'active', '2021-10-06 07:36:51'),
(10, 'Matt', 'Matt', 'matt@gmail.com', '0807758585', 'Admin', 'Mattmatt@gmail.comIMG_20200804_073602_430.jpg', 'M(88YG50', 'active', '2021-10-09 22:44:12');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

DROP TABLE IF EXISTS `user`;
CREATE TABLE IF NOT EXISTS `user` (
  `user_id` int(11) NOT NULL AUTO_INCREMENT,
  `id_number` varchar(50) NOT NULL,
  `phone` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `id_card` varchar(50) NOT NULL,
  `status` varchar(50) NOT NULL,
  `regdate` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`user_id`),
  UNIQUE KEY `id_number` (`id_number`),
  UNIQUE KEY `phone` (`phone`),
  UNIQUE KEY `email` (`email`)
) ENGINE=MyISAM AUTO_INCREMENT=12 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`user_id`, `id_number`, `phone`, `email`, `id_card`, `status`, `regdate`) VALUES
(1, '4027', '08067382624', 'dokiiworld.ik@gmail.com', 'dokiiworld.ik@gmail.comPhotoGrid_1550730450559.jpg', 'active', '2021-10-07 07:54:03'),
(11, '111258', '08067380000', 'k@k.com', 'k@k.comDokiiworld (2).jpg', 'active', '2021-10-10 21:23:33'),
(3, '1234', '0308484944', 'gabroski@yahoo.com', 'gabroski@yahoo.comIMG-20151025-WA0001.jpg', 'active', '2021-10-08 08:00:44'),
(4, '2020', '0806784', 'matt@gmail.com', 'matt@gmail.comIMG_20170117_132137.jpg', 'active', '2021-10-07 08:02:13'),
(5, '3029', '07074948', 'kiol@gmail.com', 'kiol@gmail.comObahiagbon-new1-300x190.jpg', 'active', '2021-10-07 08:04:47'),
(10, '1112', '0904777558', 'do@h.g', 'do@h.gPSX_20200915_225402.jpg', 'active', '2021-10-08 22:49:58'),
(9, '111', '09084848994', 'f@f.f', 'f@f.fIMG_20210328_113253_364.jpg', 'active', '2021-10-03 23:32:21');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
