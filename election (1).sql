-- phpMyAdmin SQL Dump
-- version 4.0.4
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Mar 23, 2022 at 02:24 PM
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
(1, 'nikhil@gmail.com', 'nikhil', 'gg'),
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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=10 ;

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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=81 ;

--
-- Dumping data for table `candidate`
--

INSERT INTO `candidate` (`id`, `User_id`, `Elections_id`, `Votes`) VALUES
(57, 85, 52, 4),
(58, 86, 52, 2),
(59, 89, 52, 3),
(60, 91, 52, 3),
(61, 114, 53, 3),
(62, 115, 53, 1),
(63, 116, 53, 3),
(64, 117, 53, 1),
(65, 109, 54, 2),
(66, 110, 54, 2),
(67, 111, 54, 3),
(68, 112, 54, 1),
(69, 119, 55, 2),
(70, 120, 55, 0),
(71, 121, 55, 2),
(72, 122, 55, 0),
(74, 124, 57, 3),
(75, 125, 57, 0),
(76, 126, 57, 3),
(78, 109, 61, 3),
(79, 111, 61, 2),
(80, 112, 61, 1);

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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=62 ;

--
-- Dumping data for table `elections`
--

INSERT INTO `elections` (`id`, `Name`, `Department_id`, `Year_id`, `Election_status`, `Start_date`, `End_date`, `Start_time`, `End_time`, `Voters`) VALUES
(52, 'Second BCA', 1, 2, 2, '2022-03-22', '2022-03-22', '20:37:00', '20:40:00', 12),
(53, 'First Bcom', 4, 1, 2, '2022-03-22', '2022-03-22', '20:53:00', '20:55:00', 6),
(54, 'First MCA', 3, 1, 2, '2022-03-22', '2022-03-22', '21:04:00', '21:06:00', 6),
(55, 'First Mcom', 6, 1, 2, '2022-03-22', '2022-03-22', '23:16:00', '23:18:00', 5),
(57, 'BCa frist', 1, 1, 2, '2022-03-23', '2022-03-23', '10:32:00', '10:36:00', 5),
(61, 'mca', 3, 1, 2, '2022-03-23', '2022-03-23', '11:27:00', '11:31:00', 8);

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
(52, 57, 59),
(53, 61, 63),
(54, 65, 67),
(55, 69, 71),
(57, 74, 76),
(61, 78, 79);

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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=134 ;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `Email`, `Phone_no`, `First_name`, `Last_name`, `Gender`, `Department_id`, `Year_id`) VALUES
(84, 'baburaj@gmail.com', 9852314789, 'Babu', 'Raj', 'Male', 1, 2),
(85, 'shinechaco@gmail.com', 6589745236, 'SoniaA', 'Chacho', 'Male', 1, 2),
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
(107, 'anand@gmail.com', 8765549887, 'Anand', 'Krishna', 'Male', 3, 1),
(108, 'Tuddy@gmail.com', 9865548765, 'Tuddy', 'Marcy', 'Male', 4, 1),
(109, 'maron@gmail.com', 6589748836, 'maron', 'Karino', 'Male', 3, 1),
(110, 'alex@gmail.com', 6589748333, 'Alex', 'Franky', 'Male', 3, 1),
(111, 'mishel@gmail.com', 6589748222, 'Mishel', 'Carno', 'Female', 3, 1),
(112, 'sonia@gmail.com', 6589748111, 'sonia', 'Marky', 'Female', 3, 1),
(113, 'emili@gmail.com', 6589748444, 'Emili', 'Franky', 'Male', 3, 1),
(114, 'james@gmail.com', 6585648836, 'James', 'Chako', 'Male', 4, 1),
(115, 'liam@gmail.com', 6589118836, 'Liam', 'Paull', 'Male', 4, 1),
(116, 'alysha@gmail.com', 6582248836, 'Alysha', 'Cargo', 'Female', 4, 1),
(117, 'mariaa@gmail.com', 6583348836, 'Maria', 'Anna', 'Female', 4, 1),
(118, 'olivia@gmail.com', 6584448836, 'Olivia', 'Alice', 'Female', 4, 1),
(119, 'davit@gmail.com', 6585118836, 'Davit', 'Narek', 'Male', 6, 1),
(120, 'yusif@gmail.com', 6589118836, 'Yusif', 'ali', 'Male', 6, 1),
(121, 'areema@gmail.com', 6589228836, 'Areema', 'khan', 'Female', 6, 1),
(122, 'amelia@gmail.com', 6589338836, 'Amelia', 'Victo', 'Female', 6, 1),
(123, 'sofy@gmail.com', 6589398836, 'Sofy', 'ali', 'Female', 6, 1),
(124, 'leo@gmail.com', 6585111136, 'Leo', 'Thrif', 'Male', 1, 1),
(125, 'oscar@gmail.com', 6589112236, 'Oscar', 'Mathew', 'Male', 1, 1),
(126, 'fatma@gmail.com', 6589223336, 'Fatma', 'khan', 'Female', 1, 1),
(127, 'nur@gmail.com', 6589334436, 'Nur', 'Victo', 'Female', 1, 1),
(128, 'Shristi@gmail.com', 6589395536, 'Shristi', 'Kiwi', 'Female', 1, 1),
(129, 'aruno@gmail.com', 9126419595, 'aruno', 'Kabir', 'Male', 3, 1),
(131, 'abil@gmail.com', 8652412593, 'abil', 'jose', 'Male', 3, 1),
(132, 'kiran@gmail.com', 9865215665, 'Kirran', 'Mathew', 'Male', 4, 1),
(133, 'asif@gmail.com', 9898765455, 'asif', 'm', 'Male', 1, 1);

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
(107, 'asdf'),
(108, ';lkj'),
(109, 'asdf'),
(110, 'asdf'),
(111, 'asdf'),
(112, 'asdf'),
(113, 'asdf'),
(114, 'asdf'),
(115, 'asdf'),
(116, 'asdf'),
(117, 'asdf'),
(118, 'asdf'),
(119, 'asdf'),
(120, 'asdf'),
(121, 'asdf'),
(122, 'asdf'),
(123, 'asdf'),
(124, 'asdf'),
(125, 'asdf'),
(126, 'asdf'),
(127, 'asdf'),
(128, 'asdf'),
(129, 'asdf'),
(131, 'asdf'),
(132, 'asdf'),
(133, 'asdf');

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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=593 ;

--
-- Dumping data for table `voters_list`
--

INSERT INTO `voters_list` (`id`, `User_id`, `Election_id`, `Vote_status`) VALUES
(528, 84, 52, 0),
(529, 85, 52, 1),
(530, 86, 52, 1),
(531, 87, 52, 1),
(532, 88, 52, 0),
(533, 89, 52, 0),
(534, 90, 52, 1),
(535, 91, 52, 1),
(536, 92, 52, 1),
(537, 103, 52, 0),
(538, 104, 52, 0),
(539, 105, 52, 0),
(540, 108, 53, 0),
(541, 114, 53, 1),
(542, 115, 53, 0),
(543, 116, 53, 1),
(544, 117, 53, 1),
(545, 118, 53, 1),
(546, 107, 54, 0),
(547, 109, 54, 1),
(548, 110, 54, 1),
(549, 111, 54, 1),
(550, 112, 54, 1),
(551, 113, 54, 0),
(552, 119, 55, 0),
(553, 120, 55, 0),
(554, 121, 55, 1),
(555, 122, 55, 1),
(556, 123, 55, 0),
(562, 124, 57, 1),
(563, 125, 57, 1),
(564, 126, 57, 0),
(565, 127, 57, 1),
(566, 128, 57, 0),
(585, 107, 61, 0),
(586, 109, 61, 1),
(587, 110, 61, 0),
(588, 111, 61, 0),
(589, 112, 61, 1),
(590, 113, 61, 1),
(591, 129, 61, 0),
(592, 131, 61, 0);

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
