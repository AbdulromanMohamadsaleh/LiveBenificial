-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3307
-- Generation Time: Nov 27, 2020 at 09:22 AM
-- Server version: 10.4.14-MariaDB
-- PHP Version: 7.4.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `youtubeclone`
--

-- --------------------------------------------------------

--
-- Table structure for table `categoris`
--

CREATE TABLE `categoris` (
  `id` int(11) NOT NULL,
  `name` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- RELATIONSHIPS FOR TABLE `categoris`:
--

--
-- Dumping data for table `categoris`
--

INSERT INTO `categoris` (`id`, `name`) VALUES
(1, 'Music'),
(2, 'Sports'),
(3, 'Education'),
(4, 'Gaming'),
(5, 'News');

-- --------------------------------------------------------

--
-- Table structure for table `comment`
--

CREATE TABLE `comment` (
  `id` int(10) NOT NULL,
  `commentby` varchar(250) NOT NULL,
  `vidoid` int(10) NOT NULL,
  `comments` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- RELATIONSHIPS FOR TABLE `comment`:
--

--
-- Dumping data for table `comment`
--

INSERT INTO `comment` (`id`, `commentby`, `vidoid`, `comments`) VALUES
(2, 'Boodyfatani', 201, 'g'),
(14, 'Boodyfatani', 201, 'ssss'),
(15, 'Boodyfatani', 201, 'ddd'),
(16, 'Boodyfatani', 201, 'zzz'),
(17, 'Boodyfatani', 201, 'zzz');

-- --------------------------------------------------------

--
-- Table structure for table `likes`
--

CREATE TABLE `likes` (
  `id` int(10) NOT NULL,
  `videoid` int(10) DEFAULT NULL,
  `username` varchar(255) NOT NULL,
  `status` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- RELATIONSHIPS FOR TABLE `likes`:
--

--
-- Dumping data for table `likes`
--

INSERT INTO `likes` (`id`, `videoid`, `username`, `status`) VALUES
(4, 202, 'Boody', 'like'),
(8, 202, 'Boodyfatani', 'dislike'),
(10, 205, 'Boodyfatani', 'dislike'),
(12, 206, 'BluEyedo', 'dislike');

-- --------------------------------------------------------

--
-- Table structure for table `likes_info`
--

CREATE TABLE `likes_info` (
  `id` int(11) NOT NULL,
  `postid` int(11) NOT NULL,
  `userid` int(11) NOT NULL,
  `status` varchar(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- RELATIONSHIPS FOR TABLE `likes_info`:
--

--
-- Dumping data for table `likes_info`
--

INSERT INTO `likes_info` (`id`, `postid`, `userid`, `status`) VALUES
(109, 2, 3, 'like'),
(112, 1, 3, 'like'),
(113, 3, 3, 'dislike'),
(116, 4, 3, 'dislike');

-- --------------------------------------------------------

--
-- Table structure for table `post`
--

CREATE TABLE `post` (
  `id` int(11) NOT NULL,
  `text` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- RELATIONSHIPS FOR TABLE `post`:
--

--
-- Dumping data for table `post`
--

INSERT INTO `post` (`id`, `text`) VALUES
(1, 'java'),
(2, 'paython'),
(3, 'c'),
(4, 'php');

-- --------------------------------------------------------

--
-- Table structure for table `userinfo`
--

CREATE TABLE `userinfo` (
  `username` varchar(255) NOT NULL,
  `email` varchar(255) DEFAULT NULL,
  `gender` varchar(5) DEFAULT NULL,
  `age` int(11) DEFAULT NULL,
  `picture` varchar(255) DEFAULT NULL,
  `pass` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- RELATIONSHIPS FOR TABLE `userinfo`:
--

--
-- Dumping data for table `userinfo`
--

INSERT INTO `userinfo` (`username`, `email`, `gender`, `age`, `picture`, `pass`) VALUES
('BluEyedo', 'yadoofatani@gmail.com', 'Male', NULL, NULL, '123123Yadoo'),
('Boody', NULL, NULL, NULL, NULL, 'Boody2070'),
('Boodyfatani', 'boodyfatani2070@gmail.com', 'Male', NULL, NULL, 'Boody2070'),
('Eyad', NULL, NULL, NULL, NULL, NULL),
('IbnBatuta', 'Aj.Anas@anas.ac', 'Male', NULL, NULL, '123123Yadoo');

-- --------------------------------------------------------

--
-- Table structure for table `video`
--

CREATE TABLE `video` (
  `id` int(11) NOT NULL,
  `uploadBy` varchar(50) NOT NULL,
  `title` varchar(70) NOT NULL,
  `description` varchar(250) NOT NULL,
  `privacy` int(11) NOT NULL,
  `path` varchar(250) NOT NULL,
  `category` int(11) NOT NULL,
  `updateDate` datetime NOT NULL DEFAULT current_timestamp(),
  `views` int(11) NOT NULL,
  `duration` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- RELATIONSHIPS FOR TABLE `video`:
--   `uploadBy`
--       `userinfo` -> `username`
--

--
-- Dumping data for table `video`
--

INSERT INTO `video` (`id`, `uploadBy`, `title`, `description`, `privacy`, `path`, `category`, `updateDate`, `views`, `duration`) VALUES
(201, 'BluEyedo', 'Dragon', 'eee', 0, '71004dragon ig.mp4', 0, '2020-10-31 11:40:15', 216, ''),
(202, 'Boodyfatani', 'creativ', '.mp4', 0, '20362creativ.mp4', 0, '2020-11-01 12:00:44', 419, ''),
(206, 'Boodyfatani', 'life', '', 0, '77237life.mp4', 0, '2020-11-27 15:19:03', 3, ''),
(207, 'BluEyedo', 'Nature Beautiful', '.mp4', 0, '76101Nature Beautiful.mp4', 0, '2020-11-27 15:20:29', 0, '');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `categoris`
--
ALTER TABLE `categoris`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `comment`
--
ALTER TABLE `comment`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `likes`
--
ALTER TABLE `likes`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `likes_info`
--
ALTER TABLE `likes_info`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `post`
--
ALTER TABLE `post`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `userinfo`
--
ALTER TABLE `userinfo`
  ADD PRIMARY KEY (`username`);

--
-- Indexes for table `video`
--
ALTER TABLE `video`
  ADD PRIMARY KEY (`id`),
  ADD KEY `uploadBy` (`uploadBy`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `categoris`
--
ALTER TABLE `categoris`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `comment`
--
ALTER TABLE `comment`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `likes`
--
ALTER TABLE `likes`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `likes_info`
--
ALTER TABLE `likes_info`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=117;

--
-- AUTO_INCREMENT for table `post`
--
ALTER TABLE `post`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `video`
--
ALTER TABLE `video`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=208;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `video`
--
ALTER TABLE `video`
  ADD CONSTRAINT `video_ibfk_1` FOREIGN KEY (`uploadBy`) REFERENCES `userinfo` (`username`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
