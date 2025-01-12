-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 11, 2025 at 04:24 PM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `assignments1`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

DROP TABLE IF EXISTS `admin`;
CREATE TABLE `admin` (
  `id` int(10) NOT NULL,
  `username` varchar(20) NOT NULL,
  `password` varchar(20) NOT NULL,
  `adminname` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `username`, `password`, `adminname`) VALUES
(1, 'Ali', 'Ali', 'abc'),
(2, 'admin', 'admin', ''),
(3, 'sdf', 'adf', 'sf'),
(4, 'asdfa', 'adf', 'sdf');

-- --------------------------------------------------------

--
-- Table structure for table `comments`
--

DROP TABLE IF EXISTS `comments`;
CREATE TABLE `comments` (
  `commentid` int(11) NOT NULL,
  `videoid` int(11) NOT NULL,
  `entrydate` date NOT NULL,
  `userid` int(11) NOT NULL,
  `comment` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `comments`
--

INSERT INTO `comments` (`commentid`, `videoid`, `entrydate`, `userid`, `comment`) VALUES
(1, 1, '2025-01-09', 1, 'First Comments'),
(2, 2, '0000-00-00', 1, 'asfasdf'),
(3, 2, '0000-00-00', 1, 'hello\n'),
(4, 2, '0000-00-00', 1, 'new comment');

-- --------------------------------------------------------

--
-- Table structure for table `menu`
--

DROP TABLE IF EXISTS `menu`;
CREATE TABLE `menu` (
  `id` int(11) NOT NULL,
  `icon` varchar(50) NOT NULL,
  `cmd` varchar(50) NOT NULL,
  `title` varchar(50) NOT NULL,
  `grp` int(11) NOT NULL,
  `template` varchar(40) NOT NULL,
  `type` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `menu`
--

INSERT INTO `menu` (`id`, `icon`, `cmd`, `title`, `grp`, `template`, `type`) VALUES
(1, '', 'home', 'Home', 1, '', 1),
(2, '', 'creators', 'Creators', 0, 'adminlist.php', 1),
(3, '', 'users', 'Consumer User List', 0, 'userlist.php', 1),
(4, '', 'videos', 'Videos', 0, 'videos.php', 1),
(100, '', 'logout', 'Log Out', 0, 'log_out.php', 1);

-- --------------------------------------------------------

--
-- Stand-in structure for view `qrycomments`
-- (See below for the actual view)
--
DROP VIEW IF EXISTS `qrycomments`;
CREATE TABLE `qrycomments` (
`Unm` varchar(30)
,`commentid` int(11)
,`videoid` int(11)
,`entrydate` date
,`userid` int(11)
,`comment` text
);

-- --------------------------------------------------------

--
-- Table structure for table `register`
--

DROP TABLE IF EXISTS `register`;
CREATE TABLE `register` (
  `id` int(5) NOT NULL,
  `Email` varchar(30) NOT NULL,
  `Unm` varchar(30) NOT NULL,
  `Pwd` varchar(10) NOT NULL,
  `Contact_no` bigint(20) NOT NULL,
  `Pro_status` int(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `register`
--

INSERT INTO `register` (`id`, `Email`, `Unm`, `Pwd`, `Contact_no`, `Pro_status`) VALUES
(1, 'azizimran72@gmail.com', 'Muhammad Naeem', '123', 3217748892, 0),
(2, 'naeem@assersoft.com', 'Kashif Ali', '12345', 317445555, 0),
(3, 'fads@gmail.com', 'dsfasd', '123', 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `videos`
--

DROP TABLE IF EXISTS `videos`;
CREATE TABLE `videos` (
  `id` int(11) NOT NULL,
  `Title` varchar(1012) NOT NULL,
  `Tags` text NOT NULL,
  `Src` varchar(1012) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `videos`
--

INSERT INTO `videos` (`id`, `Title`, `Tags`, `Src`) VALUES
(1, 'Second Title', '#Second', 'videoplayback (3).mp4'),
(2, 'Third Title', '#Third,#Value3', 'videoplayback (2).mp4'),
(3, 'FourthTitle', '#Fourth,#FourthValue', 'videoplayback (1).mp4'),
(4, 'First Title', '#First,#1st,#Value1', 'videoplayback (4).mp4'),
(5, 'Latest Video', '#lates', 'videoplayback (2).mp4');

-- --------------------------------------------------------

--
-- Structure for view `qrycomments`
--
DROP TABLE IF EXISTS `qrycomments`;

DROP VIEW IF EXISTS `qrycomments`;
CREATE   VIEW `qrycomments`  AS SELECT `register`.`Unm` AS `Unm`, `comments`.`commentid` AS `commentid`, `comments`.`videoid` AS `videoid`, `comments`.`entrydate` AS `entrydate`, `comments`.`userid` AS `userid`, `comments`.`comment` AS `comment` FROM (`register` join `comments` on(`register`.`id` = `comments`.`userid`)) ;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`commentid`);

--
-- Indexes for table `menu`
--
ALTER TABLE `menu`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `register`
--
ALTER TABLE `register`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `videos`
--
ALTER TABLE `videos`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `comments`
--
ALTER TABLE `comments`
  MODIFY `commentid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `register`
--
ALTER TABLE `register`
  MODIFY `id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `videos`
--
ALTER TABLE `videos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
