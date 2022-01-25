-- phpMyAdmin SQL Dump
-- version 4.0.4
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Jan 25, 2022 at 11:56 AM
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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=44 ;

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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=52 ;

--
-- Dumping data for table `candidate`
--

INSERT INTO `candidate` (`id`, `User_id`, `Elections_id`, `Votes`) VALUES
(18, 85, 23, 1),
(19, 86, 23, 5),
(20, 92, 23, 4),
(21, 89, 23, 3),
(22, 84, 29, 4),
(23, 86, 29, 5),
(24, 89, 29, 2),
(25, 91, 29, 3),
(26, 92, 29, 4),
(27, 85, 30, 5),
(28, 92, 30, 5),
(29, 88, 30, 0),
(30, 90, 30, 0),
(35, 85, 40, 2),
(36, 86, 40, 4),
(37, 87, 40, 1),
(38, 91, 40, 7),
(39, 95, 41, 0),
(40, 96, 41, 0),
(41, 99, 41, 0),
(42, 100, 41, 0),
(46, 101, 45, 0),
(47, 97, 45, 0),
(48, 97, 46, 1),
(49, 96, 46, 4),
(50, 99, 46, 2),
(51, 101, 46, 3);

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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=47 ;

--
-- Dumping data for table `elections`
--

INSERT INTO `elections` (`id`, `Name`, `Department_id`, `Year_id`, `Election_status`, `Start_date`, `End_date`, `Start_time`, `End_time`, `Voters`) VALUES
(23, 'BCA Second', 1, 2, 2, '2021-12-05', '2021-12-05', '23:05:00', '23:10:00', 12),
(28, 'Meta Election', 1, 2, 2, '2022-01-24', '2022-01-24', '19:00:00', '19:07:00', 12),
(29, 'miide', 1, 2, 2, '2022-01-24', '2022-01-24', '20:01:00', '20:09:00', 12),
(30, 'mild', 1, 2, 2, '2022-01-24', '2022-01-24', '22:00:00', '22:33:00', 12),
(40, 'The Great', 1, 2, 2, '2022-01-25', '2022-01-25', '10:25:00', '10:30:00', 12),
(41, 'puthiyath', 1, 3, 2, '2022-01-25', '2022-01-25', '10:38:00', '10:39:00', 10),
(45, 'qwerqwer', 1, 3, 2, '2022-01-25', '2022-01-25', '10:49:00', '10:50:00', 10),
(46, 'Multiple', 1, 3, 2, '2022-01-25', '2022-01-25', '11:01:00', '11:06:00', 10);

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

--
-- Dumping data for table `result`
--

INSERT INTO `result` (`E_id`, `M_win_id`, `F_win_id`) VALUES
(46, 49, 51);

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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=107 ;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `Email`, `Phone_no`, `First_name`, `Last_name`, `Gender`, `Department_id`, `Year_id`) VALUES
(84, 'baburaj@gmail.com', 9852314789, 'Babu', 'Raj', 'Male', 1, 2),
(85, 'shinechaco@gmail.com', 6589745236, 'Shine', 'Chach', 'Male', 1, 2),
(86, 'rameshsuku@gmail.com', 7895632897, 'Ramesh', 'Suku', 'Male', 1, 2),
(87, 'bajajtata@gmail.com', 9856485623, 'Bajaj', 'Tata', 'Male', 1, 2),
(88, 'aliakbar@gmail.com', 7589623568, 'Ali', 'Akbar', 'Male', 1, 2),
(89, 'henababu@gmail.com', 9856742365, 'hena', 'Babu', 'Female', 1, 2),
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
(102, 'akhiljojo@gmail.com', 5421326599, 'Akhil', 'Joji', 'Male', 1, 3),
(103, 'haley@gmail.com', 2154986532, 'haley', 'george', 'Female', 1, 2),
(104, 'asifali@gmail.com', 5487548754, 'Asif', 'Ali', 'Male', 1, 2),
(105, 'rohit@gmail.com', 8523698745, 'rohit', 'kr', 'Male', 1, 2),
(106, 'newman@gmail.com', 9876543215, 'newman', 'corola', 'Male', 3, 1);

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
(102, 'asdf'),
(103, 'asdf'),
(104, 'asdf'),
(105, '12345'),
(106, 'asdf');

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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=502 ;

--
-- Dumping data for table `voters_list`
--

INSERT INTO `voters_list` (`id`, `User_id`, `Election_id`, `Vote_status`) VALUES
(238, 84, 23, 1),
(239, 85, 23, 1),
(240, 86, 23, 1),
(241, 87, 23, 1),
(242, 88, 23, 1),
(243, 89, 23, 1),
(244, 90, 23, 1),
(245, 91, 23, 1),
(246, 92, 23, 1),
(247, 103, 23, 0),
(248, 104, 23, 0),
(249, 105, 23, 0),
(286, 84, 28, 1),
(287, 85, 28, 1),
(288, 86, 28, 1),
(289, 87, 28, 1),
(290, 88, 28, 1),
(291, 89, 28, 1),
(292, 90, 28, 1),
(293, 91, 28, 1),
(294, 92, 28, 1),
(295, 103, 28, 0),
(296, 104, 28, 0),
(297, 105, 28, 0),
(298, 84, 29, 1),
(299, 85, 29, 1),
(300, 86, 29, 1),
(301, 87, 29, 1),
(302, 88, 29, 1),
(303, 89, 29, 1),
(304, 90, 29, 1),
(305, 91, 29, 1),
(306, 92, 29, 1),
(307, 103, 29, 0),
(308, 104, 29, 0),
(309, 105, 29, 0),
(310, 84, 30, 0),
(311, 85, 30, 1),
(312, 86, 30, 0),
(313, 87, 30, 1),
(314, 88, 30, 0),
(315, 89, 30, 0),
(316, 90, 30, 0),
(317, 91, 30, 0),
(318, 92, 30, 0),
(319, 103, 30, 0),
(320, 104, 30, 0),
(321, 105, 30, 0),
(430, 84, 40, 0),
(431, 85, 40, 1),
(432, 86, 40, 1),
(433, 87, 40, 1),
(434, 88, 40, 1),
(435, 89, 40, 1),
(436, 90, 40, 0),
(437, 91, 40, 1),
(438, 92, 40, 1),
(439, 103, 40, 0),
(440, 104, 40, 0),
(441, 105, 40, 0),
(442, 93, 41, 0),
(443, 94, 41, 0),
(444, 95, 41, 0),
(445, 96, 41, 0),
(446, 97, 41, 0),
(447, 98, 41, 0),
(448, 99, 41, 0),
(449, 100, 41, 0),
(450, 101, 41, 0),
(451, 102, 41, 0),
(482, 93, 45, 0),
(483, 94, 45, 0),
(484, 95, 45, 0),
(485, 96, 45, 0),
(486, 97, 45, 0),
(487, 98, 45, 0),
(488, 99, 45, 0),
(489, 100, 45, 0),
(490, 101, 45, 0),
(491, 102, 45, 0),
(492, 93, 46, 1),
(493, 94, 46, 0),
(494, 95, 46, 1),
(495, 96, 46, 0),
(496, 97, 46, 1),
(497, 98, 46, 0),
(498, 99, 46, 1),
(499, 100, 46, 1),
(500, 101, 46, 0),
(501, 102, 46, 0);

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
