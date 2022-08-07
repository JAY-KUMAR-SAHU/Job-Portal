-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Oct 25, 2021 at 06:50 PM
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
-- Database: `jobs`
--

-- --------------------------------------------------------

--
-- Table structure for table `candidates`
--

DROP TABLE IF EXISTS `candidates`;
CREATE TABLE IF NOT EXISTS `candidates` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `Name` varchar(40) NOT NULL,
  `Applied_for` varchar(40) NOT NULL,
  `qualification` varchar(100) NOT NULL,
  `year_passout` date NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=hp8;

--
-- Dumping data for table `candidates`
--

INSERT INTO `candidates` (`id`, `Name`, `Applied_for`, `qualification`, `year_passout`) VALUES
(1, 'vijay', 'Hungama', 'uvh', '2021-10-05'),
(2, 'panda', 'kjbvhjkl', 'kjhv', '2021-10-01'),
(3, 'viuyc', 'scas', 'wdeqfegfg', '2021-10-23');

-- --------------------------------------------------------

--
-- Table structure for table `contactus`
--

DROP TABLE IF EXISTS `contactus`;
CREATE TABLE IF NOT EXISTS `contactus` (
  `Sr. No.` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(30) NOT NULL,
  `email` varchar(30) NOT NULL,
  `concern` text NOT NULL,
  `dt` timestamp NOT NULL,
  PRIMARY KEY (`Sr. No.`)
) ENGINE=MyISAM AUTO_INCREMENT=6 DEFAULT CHARSET=hp8;

--
-- Dumping data for table `contactus`
--

INSERT INTO `contactus` (`Sr. No.`, `name`, `email`, `concern`, `dt`) VALUES
(1, 'JAY KUMAR SAHU', 'jay20_ug@cse.nits.ac.in', 'A t time 16: 34 , wegewsgef qwk qikunw hoi hriqwwqh fwa fhuf qow ifjqwoifqifeqfqwuifwiu fiuefwfqpiweoe8yt984wer uw98rfwr q9weq wih owr9w3r94t45 t458444  4 4 33 wpirwo8 3ryw87yrh. Thankyou\r\nsedef\r\nBye !', '2021-10-06 11:05:03'),
(2, 'JAY KUMAR SAHU', 'jay20_ug@cse.nits.ac.in', 'A t time 16: 34 , wegewsgef qwk qikunw hoi hriqwwqh fwa fhuf qow ifjqwoifqifeqfqwuifwiu fiuefwfqpiweoe8yt984wer uw98rfwr q9weq wih owr9w3r94t45 t458444  4 4 33 wpirwo8 3ryw87yrh. Thankyou\r\nsedef\r\nBye !', '2021-10-06 11:39:49'),
(3, 'qwfqw', 'jks17092002@gmail.com', 'wqdqdq', '2021-10-06 11:40:04'),
(4, 'k', 'wdwd@wd.com', 'lkj', '2021-10-25 18:27:26'),
(5, 'sf', 'ascsc@sc.cvd', 'wa', '2021-10-25 18:30:34');

-- --------------------------------------------------------

--
-- Table structure for table `jobs`
--

DROP TABLE IF EXISTS `jobs`;
CREATE TABLE IF NOT EXISTS `jobs` (
  `cname` varchar(50) NOT NULL,
  `position` varchar(30) NOT NULL,
  `Jdesc` varchar(400) NOT NULL,
  `CTC` varchar(15) NOT NULL,
  `skills` varchar(200) NOT NULL,
  `sno` int(11) NOT NULL AUTO_INCREMENT,
  PRIMARY KEY (`sno`)
) ENGINE=MyISAM AUTO_INCREMENT=10 DEFAULT CHARSET=hp8;

--
-- Dumping data for table `jobs`
--

INSERT INTO `jobs` (`cname`, `position`, `Jdesc`, `CTC`, `skills`, `sno`) VALUES
('road traffic', 'traffic police', 'csbkajcnsklanclksncl ciacnsocn coic askc c kc ak clks ldsk clknn ldk vkd vlkd vlk dslk dls. ncascnoc ERv  uui     Uhu IU  iohisclc .', '85296', 'decasdcs, wcwqc, wcawcwsc', 1),
('L&T', 'CEO', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Provident rerum nemo laboriosam reprehenderit voluptatibus, fugit veniam velit animi nam ad nostrum asperiores,', '205000', 'Managerial, Administrative, Engineering', 2),
('Powerhouse', 'Chief Engineer', 'Electrical engineers work in a very wide range of industries and the skills required are likewise variable. These range from circuit theory to the management skills of a project manager.', '70000', 'Circuit design, Data collection and analysis, Electronic equipment maintenance', 3),
('A to Z Websites', 'PHP Developer', 'kvjc jbinik 10:45 22-10-2021', '14 LPA', 'PHP, HTML, CSS, JAVASCRIPT, MYSQL', 4),
('ascasca', 'scsc', 'sefwsfe', '58491', 'saxsx', 8);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `Name` varchar(40) NOT NULL,
  `email` varchar(40) NOT NULL,
  `password` varchar(255) NOT NULL,
  `phone_no` varchar(12) NOT NULL,
  `date+time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=hp8;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `Name`, `email`, `password`, `phone_no`, `date+time`) VALUES
(1, 'pandu', 'pandu@gmail.com', '$2y$10$hGmo3WBxaEQV/7AY6HHA8.cdpKSjqdToyEqyiPeOvGLmeD0rV8.YG', '7848578485', '2021-10-21 14:36:55'),
(2, 'panda', 'panda@gmail.com', '$2y$10$jC/yKyWzDOBCzMJMNB5Wz.9MJQX6RZlCwf6/mlxDN/Efj4awU.O0S', '9844985475', '2021-10-22 05:42:32');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
