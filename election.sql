-- phpMyAdmin SQL Dump
-- version 4.0.4
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Oct 06, 2021 at 06:04 PM
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
(1, 'nikhil@gmail.com', 'dsafsdfsd', 'Tenny'),
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
(2, '7861');

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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=35 ;

--
-- Dumping data for table `elections`
--

INSERT INTO `elections` (`id`, `Name`, `Department_id`, `Year_id`, `Election_status`, `Start_date`, `End_date`, `Start_time`, `End_time`, `Voters`) VALUES
(10, 'testing', 1, 2, 0, '2021-10-07', '2021-10-15', '17:59:00', '18:59:00', 5),
(11, 'ddfdf', 1, 2, 0, '2021-10-07', '2021-10-07', '17:01:00', '18:01:00', 0),
(25, 'jij', 3, 2, 0, '2021-10-21', '2021-10-14', '11:19:00', '14:19:00', 0),
(28, 'sdfdf', 3, 3, 0, '2021-10-08', '2021-10-15', '19:29:00', '16:32:00', 1),
(29, 'beta', 3, 2, 2, '2021-10-07', '2021-10-09', '17:43:00', '18:43:00', 0),
(31, 'mabaga', 3, 1, 2, '2021-10-04', '2021-10-06', '18:56:00', '19:57:00', 1),
(32, 'tttttt', 1, 2, 2, '2021-10-06', '2021-10-21', '18:07:00', '20:07:00', 5),
(33, 'ddfdfasdf', 3, 1, 0, '2021-10-05', '2021-10-07', '19:15:00', '17:19:00', 1),
(34, 'testing', 3, 1, 0, '2021-10-06', '2021-10-06', '18:15:00', '23:15:00', 1);

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
  `First_name` varchar(15) NOT NULL,
  `Last_name` varchar(15) NOT NULL,
  `Gender` varchar(10) NOT NULL,
  `Department_id` int(11) unsigned NOT NULL,
  `Year_id` int(10) unsigned NOT NULL,
  PRIMARY KEY (`id`),
  KEY `users_dpt` (`Department_id`),
  KEY `users_yr` (`Year_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=52 ;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `Email`, `First_name`, `Last_name`, `Gender`, `Department_id`, `Year_id`) VALUES
(35, 'Vena@gmail.com', 'Vena ', 'clawson', 'Female', 1, 2),
(37, 'mila@gmail.com', 'Mila', 'Tsao', 'Female', 1, 1),
(38, 'Joy@gmail.com', 'Joya', 'Knotts', 'Female', 1, 2),
(39, 'martin@gmail.com', 'Martin', 'Luther', 'Male', 3, 2),
(40, 'lepord@gmail.com', 'lepord', 'king', 'Female', 1, 3),
(41, 'ali@gmail.com', 'ali', 'hussain', 'Male', 3, 2),
(42, 'fugitura@gmail.com', 'fugitura', 'admiral', 'Male', 3, 3),
(43, 'nami@gmail.com', 'Nami', 'Nav', 'Female', 1, 2),
(44, 'robin@gmail.com', 'Robin', 'ohora', 'Female', 1, 2),
(45, 'ussop@gmail.com', 'Ussop', 'snipper', 'Male', 1, 1),
(46, 'javin@gmail.com', 'javin', 'mathew', 'Male', 3, 2),
(47, 'anandhukrishna007@gmail.com', 'anandhu', 'krishna', 'Male', 3, 1),
(48, 'nikhildfdf@gmail.com', 'dsafsdfsd', 'df', 'Male', 1, 2),
(49, 'jaja@gmail.com', 'jaja', 'jijij', 'Male', 3, 2),
(50, 'nikhifgfgl@gmail.com', 'gygyg', 'hjhj', 'Male', 3, 2),
(51, 'jijdifj@gmail.com', 'manag', 'ogger', 'Male', 3, 2);

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
(35, '123'),
(37, 'asdfasdf'),
(38, 'AAAA'),
(39, 'rfde'),
(40, 'jiji'),
(41, 'pass'),
(42, 'sword'),
(43, 'jeje'),
(44, 'hand'),
(45, 'soge'),
(46, '2222'),
(47, 'anandhu123'),
(48, '1234'),
(49, 'jiji'),
(50, '1212'),
(51, 'asdf');

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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=64 ;

--
-- Dumping data for table `voters_list`
--

INSERT INTO `voters_list` (`id`, `User_id`, `Election_id`, `Vote_status`) VALUES
(33, 35, 10, 0),
(34, 38, 10, 0),
(35, 43, 10, 0),
(36, 44, 10, 0),
(37, 48, 10, 0),
(38, 35, 11, 0),
(39, 38, 11, 0),
(40, 43, 11, 0),
(41, 44, 11, 0),
(42, 48, 11, 0),
(43, 39, 25, 0),
(44, 41, 25, 0),
(45, 46, 25, 0),
(46, 49, 25, 0),
(47, 50, 25, 0),
(48, 51, 25, 0),
(49, 42, 28, 0),
(50, 39, 29, 0),
(51, 41, 29, 0),
(52, 46, 29, 0),
(53, 49, 29, 0),
(54, 50, 29, 0),
(55, 51, 29, 0),
(56, 47, 31, 0),
(57, 35, 32, 0),
(58, 38, 32, 0),
(59, 43, 32, 0),
(60, 44, 32, 0),
(61, 48, 32, 0),
(62, 47, 33, 0),
(63, 47, 34, 0);

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
  ADD CONSTRAINT `candidate_ele_id` FOREIGN KEY (`Elections_id`) REFERENCES `elections` (`id`),
  ADD CONSTRAINT `candidate_user_id` FOREIGN KEY (`User_id`) REFERENCES `users` (`id`);

--
-- Constraints for table `elections`
--
ALTER TABLE `elections`
  ADD CONSTRAINT `elections_dpt` FOREIGN KEY (`Department_id`) REFERENCES `department` (`id`),
  ADD CONSTRAINT `elections_year` FOREIGN KEY (`Year_id`) REFERENCES `year` (`id`);

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
