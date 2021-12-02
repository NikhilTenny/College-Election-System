-- phpMyAdmin SQL Dump
-- version 4.0.4
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Dec 01, 2021 at 08:06 AM
-- Server version: 5.6.12-log
-- PHP Version: 5.4.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `election`
--
CREATE DATABASE IF NOT EXISTS `election` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `election`;

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE IF NOT EXISTS `admin` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `Email` varchar(30) NOT NULL,
  `First_name` varchar(15) NOT NULL,
  `Last_name` varchar(15) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `Email`, `First_name`, `Last_name`) VALUES
(1, 'nikhil@gmail.com', 'Nikhil', 'Tenny'),
(2, 'jevin@gmail.com', 'Jevin', 'Thekekara'),
(3, 'asif@gmail.com', 'Asif', 'Muhammad');

-- --------------------------------------------------------

--
-- Table structure for table `admin_login`
--

CREATE TABLE IF NOT EXISTS `admin_login` (
  `id` int(10) DEFAULT NULL,
  `Password` varchar(30) DEFAULT NULL,
  KEY `id` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin_login`
--

INSERT INTO `admin_login` (`id`, `Password`) VALUES
(1, '1234'),
(2, '0987'),
(2, '0987');

-- --------------------------------------------------------

--
-- Table structure for table `applicant`
--

CREATE TABLE IF NOT EXISTS `applicant` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `Election_id` int(10) unsigned NOT NULL,
  `User_id` int(10) unsigned NOT NULL,
  `Attendance` int(11) NOT NULL,
  `Description` varchar(600) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `applicant_ibfk_1` (`Election_id`),
  KEY `applicant_ibfk_2` (`User_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `candidate`
--

CREATE TABLE IF NOT EXISTS `candidate` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `User_id` int(11) unsigned NOT NULL,
  `Elections_id` int(11) unsigned NOT NULL,
  `Votes` int(10) unsigned NOT NULL,
  PRIMARY KEY (`id`),
  KEY `candidate_user_id` (`User_id`),
  KEY `candidate_ele_id` (`Elections_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `department`
--

CREATE TABLE IF NOT EXISTS `department` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `Department_name` varchar(10) NOT NULL,
  `Yr_no` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=7 ;

--
-- Dumping data for table `department`
--

INSERT INTO `department` (`id`, `Department_name`, `Yr_no`) VALUES
(1, 'BCA', 0),
(3, 'MCA', 0),
(4, 'B.com', 0),
(6, 'M.com', 0);

-- --------------------------------------------------------

--
-- Table structure for table `elections`
--

CREATE TABLE IF NOT EXISTS `elections` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `Name` varchar(30) NOT NULL,
  `Department_id` int(11) unsigned NOT NULL,
  `Year_id` int(11) unsigned NOT NULL,
  `Election_status` tinyint(3) unsigned NOT NULL DEFAULT '0',
  `Start_date` date NOT NULL,
  `End_date` date NOT NULL,
  `Start_time` time NOT NULL,
  `End_time` time NOT NULL,
  `Voters` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `elections_dpt` (`Department_id`),
  KEY `elections_year` (`Year_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `result`
--

CREATE TABLE IF NOT EXISTS `result` (
  `E_id` int(10) unsigned NOT NULL,
  `M_win_id` int(11) NOT NULL,
  `F_win_id` int(11) NOT NULL,
  KEY `M_win_id` (`M_win_id`),
  KEY `F_win_id` (`F_win_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `Email` varchar(30) NOT NULL,
  `Phone_no` bigint(11) NOT NULL,
  `First_name` varchar(15) NOT NULL,
  `Last_name` varchar(15) NOT NULL,
  `Gender` varchar(10) NOT NULL,
  `Department_id` int(11) unsigned NOT NULL,
  `Year_id` int(10) unsigned NOT NULL,
  PRIMARY KEY (`id`),
  KEY `users_dpt` (`Department_id`),
  KEY `users_yr` (`Year_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=103 ;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `Email`, `Phone_no`, `First_name`, `Last_name`, `Gender`, `Department_id`, `Year_id`) VALUES
(84, 'baburaj@gmail.com', 9852314789, 'Babu', 'Raj', 'Male', 1, 2),
(85, 'shinechaco@gmail.com', 6589745236, 'Shine', 'Chacho', 'Male', 1, 2),
(86, 'rameshsuku@gmail.com', 7895632897, 'Ramesh', 'Suku', 'Male', 1, 2),
(87, 'bajajtata@gmail.com', 9856485623, 'Bajaj', 'Tata', 'Male', 1, 2),
(88, 'aliakbar@gmail.com', 7589623568, 'Ali', 'Akbar', 'Male', 1, 2),
(89, 'henababu@gmail.com', 9856742365, 'Hena', 'Babu', 'Female', 1, 2),
(90, 'shelvinbabs@gmail.com', 9856231589, 'Shelvin', 'Babs', 'Male', 1, 2),
(91, 'janetnair@gmail.com', 9856423658, 'janet', 'nair', 'Female', 1, 2),
(92, 'reethusnelson@gmail.com', 7568923658, 'Reethu', 'Nelson', 'Female', 1, 2),
(93, 'selvimarkoni@gmail.com', 9885647822, 'Selvi', 'Markoni', 'Male', 1, 3),
(94, 'somanp@gmail.com', 9856326987, 'Soman', 'P', 'Male', 1, 3),
(95, 'eliyasjohn@gmail.com', 7589623548, 'Eliyas', 'John', 'Male', 1, 3),
(96, 'jaisjibi@gmail.com', 8896457598, 'Jais', 'Gibi', 'Male', 1, 3),
(97, 'iwinjohnny@gmail.com', 9587623458, 'iwin', 'johnny', 'Male', 1, 3),
(98, 'gayathribaiju@gmail.com', 8567892145, 'Rayathri', 'baiju', 'Female', 1, 3),
(99, 'dharshanajohn@gmail.com', 7548692145, 'Dharshana', 'John', 'Female', 1, 3),
(100, 'abhiraminair@gmail.com', 9847456265, 'Abhirami', 'Niar', 'Female', 1, 3),
(101, 'janakithagachan@gmail.com', 8754863265, 'Janaki', 'Thagachan', 'Female', 1, 3),
(102, 'akhiljojo@gmail.com', 8754213265, 'Akhil', 'Jojo', 'Male', 1, 3);

-- --------------------------------------------------------

--
-- Table structure for table `user_login`
--

CREATE TABLE IF NOT EXISTS `user_login` (
  `id` int(10) unsigned DEFAULT NULL,
  `Password` varchar(30) DEFAULT NULL,
  KEY `user_login_ibfk_1` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user_login`
--

INSERT INTO `user_login` (`id`, `Password`) VALUES
(NULL, 'asdf'),
(NULL, 'asdf'),
(84, 'asdf'),
(85, 'asdf'),
(86, 'asdf'),
(87, 'asdf'),
(88, 'asdf'),
(89, 'asdf'),
(90, 'asdf'),
(91, 'asdf'),
(92, 'asdf'),
(93, 'asdf'),
(94, 'asdf'),
(95, 'asdf'),
(96, 'asdf'),
(97, 'asdf'),
(98, 'asdf'),
(99, 'asdf'),
(100, 'asdf'),
(101, 'asdf'),
(102, 'asdf');

-- --------------------------------------------------------

--
-- Table structure for table `voters_list`
--

CREATE TABLE IF NOT EXISTS `voters_list` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `User_id` int(11) unsigned NOT NULL,
  `Election_id` int(11) unsigned NOT NULL,
  `Vote_status` tinyint(3) unsigned NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`),
  KEY `voters_list_user_id` (`User_id`),
  KEY `voters_list_election_id` (`Election_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `year`
--

CREATE TABLE IF NOT EXISTS `year` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `Year_name` varchar(10) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `year`
--

INSERT INTO `year` (`id`, `Year_name`) VALUES
(1, 'First'),
(2, 'Second'),
(3, 'Third');

--
-- Constraints for dumped tables
--

--
-- Constraints for table `admin_login`
--
ALTER TABLE `admin_login`
  ADD CONSTRAINT `admin_login_ibfk_1` FOREIGN KEY (`id`) REFERENCES `admin` (`id`);

--
-- Constraints for table `applicant`
--
ALTER TABLE `applicant`
  ADD CONSTRAINT `applicant_ibfk_1` FOREIGN KEY (`Election_id`) REFERENCES `elections` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `applicant_ibfk_2` FOREIGN KEY (`User_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `candidate`
--
ALTER TABLE `candidate`
  ADD CONSTRAINT `candidate_ele_id` FOREIGN KEY (`Elections_id`) REFERENCES `elections` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `candidate_user_id` FOREIGN KEY (`User_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `elections`
--
ALTER TABLE `elections`
  ADD CONSTRAINT `elections_dpt` FOREIGN KEY (`Department_id`) REFERENCES `department` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `elections_year` FOREIGN KEY (`Year_id`) REFERENCES `year` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `result`
--
ALTER TABLE `result`
  ADD CONSTRAINT `result_ibfk_1` FOREIGN KEY (`M_win_id`) REFERENCES `candidate` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `result_ibfk_2` FOREIGN KEY (`F_win_id`) REFERENCES `candidate` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `users_dpt` FOREIGN KEY (`Department_id`) REFERENCES `department` (`id`),
  ADD CONSTRAINT `users_yr` FOREIGN KEY (`Year_id`) REFERENCES `year` (`id`);

--
-- Constraints for table `user_login`
--
ALTER TABLE `user_login`
  ADD CONSTRAINT `user_login_ibfk_1` FOREIGN KEY (`id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE NO ACTION;

--
-- Constraints for table `voters_list`
--
ALTER TABLE `voters_list`
  ADD CONSTRAINT `voters_list_election_id` FOREIGN KEY (`Election_id`) REFERENCES `elections` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `voters_list_user_id` FOREIGN KEY (`User_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
