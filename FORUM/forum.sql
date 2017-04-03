-- phpMyAdmin SQL Dump
-- version 4.5.0.2
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Nov 23, 2015 at 06:14 PM
-- Server version: 10.0.17-MariaDB
-- PHP Version: 5.6.14

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `forum`
--

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `cate_id` int(3) UNSIGNED NOT NULL,
  `category_title` varchar(64) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`cate_id`, `category_title`) VALUES
(1, 'Computer Department'),
(2, 'IT Department'),
(3, 'E&TC Department');

-- --------------------------------------------------------

--
-- Table structure for table `replies`
--

CREATE TABLE `replies` (
  `reply_id` int(3) UNSIGNED NOT NULL,
  `category_id` int(3) UNSIGNED NOT NULL,
  `subcategory_id` int(3) UNSIGNED NOT NULL,
  `topic_id` int(3) UNSIGNED NOT NULL,
  `author` varchar(16) NOT NULL,
  `comment` text NOT NULL,
  `date_posted` date NOT NULL,
  `votes` int(3) UNSIGNED NOT NULL,
  `liker` varchar(20) NOT NULL,
  `liked` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `replies`
--

INSERT INTO `replies` (`reply_id`, `category_id`, `subcategory_id`, `topic_id`, `author`, `comment`, `date_posted`, `votes`, `liker`, `liked`) VALUES
(2, 1, 1, 4, 'Shiv B', 'learn logic well', '2015-10-24', 17, '', 0),
(5, 1, 1, 5, '', '', '2015-11-17', 5, '', 0),
(7, 1, 1, 2, 'Shiv B', 'money is the root of all evil...my friend', '2015-11-17', 0, '', 0);

-- --------------------------------------------------------

--
-- Table structure for table `subcategories`
--

CREATE TABLE `subcategories` (
  `subcat_id` int(3) UNSIGNED NOT NULL,
  `parent_id` int(3) UNSIGNED NOT NULL,
  `subcategory_title` varchar(120) NOT NULL,
  `subcategory_decs` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `subcategories`
--

INSERT INTO `subcategories` (`subcat_id`, `parent_id`, `subcategory_title`, `subcategory_decs`) VALUES
(1, 1, 'Problem Solving', 'Algorithms and Primes'),
(2, 1, 'Data Structures', 'Binary trees etc'),
(3, 1, 'Computer organization', 'Control Units'),
(4, 2, 'Programming languages', 'PHP mySQL etc'),
(5, 2, 'Web Development', 'Dreamweaver'),
(6, 3, 'Signals and SYStems', 'Fourier Series'),
(7, 3, 'Analog Communications', 'Amplitude Modulation');

-- --------------------------------------------------------

--
-- Table structure for table `topics`
--

CREATE TABLE `topics` (
  `topic_id` int(8) UNSIGNED NOT NULL,
  `category_id` int(3) UNSIGNED NOT NULL,
  `subcategor_id` int(3) UNSIGNED NOT NULL,
  `author` varchar(16) NOT NULL,
  `title` varchar(128) NOT NULL,
  `content` text NOT NULL,
  `date_posted` date NOT NULL,
  `views` int(5) UNSIGNED NOT NULL,
  `replies` int(3) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `topics`
--

INSERT INTO `topics` (`topic_id`, `category_id`, `subcategor_id`, `author`, `title`, `content`, `date_posted`, `views`, `replies`) VALUES
(1, 1, 1, 'Shiv B', 'Game theory', 'Some test content', '2015-10-23', 3, 0),
(2, 1, 1, 'Shiv B', 'Finding roots', 'Some more test content', '2015-10-23', 0, 0),
(3, 1, 1, 'Shiv B', 'Discrete Maths', 'permuttions and combinations is easy', '2015-10-23', 3, 0),
(4, 1, 1, 'Shiv B', 'How to do programming?', 'I have difficulty understanding C programming...plz help', '2015-10-23', 125, 0),
(5, 1, 1, 'Shiv B', 'Prime Numbers and Encryption', 'can anyone tell me how it all works???', '2015-11-17', 3, 0);

-- --------------------------------------------------------

--
-- Table structure for table `upvotelog`
--

CREATE TABLE `upvotelog` (
  `authorm` varchar(20) NOT NULL,
  `reply_idm` int(10) UNSIGNED NOT NULL,
  `flag` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `upvotelog`
--

INSERT INTO `upvotelog` (`authorm`, `reply_idm`, `flag`) VALUES
('', 4, 1),
('Shiv B', 4, 1),
('Shiv B', 3, 1),
('Shiv B', 6, 1),
('Shiv B', 2, 1),
('Shiv B', 9, 1);

-- --------------------------------------------------------

--
-- Table structure for table `userid`
--

CREATE TABLE `userid` (
  `Name` varchar(16) NOT NULL,
  `Password` varchar(16) NOT NULL,
  `user_id` int(8) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `userid`
--

INSERT INTO `userid` (`Name`, `Password`, `user_id`) VALUES
('Shiv B', '141828', 1),
('Shiv ', '438726', 2),
('skjfdksjlfjjklsf', 'dsfjllfdsjak', 8),
('', '', 20),
('', '', 21),
('', '', 22);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`cate_id`);

--
-- Indexes for table `replies`
--
ALTER TABLE `replies`
  ADD PRIMARY KEY (`reply_id`),
  ADD KEY `category_id` (`category_id`),
  ADD KEY `subcategory_id` (`subcategory_id`),
  ADD KEY `topic_id` (`topic_id`);

--
-- Indexes for table `subcategories`
--
ALTER TABLE `subcategories`
  ADD PRIMARY KEY (`subcat_id`),
  ADD KEY `parent_id` (`parent_id`);

--
-- Indexes for table `topics`
--
ALTER TABLE `topics`
  ADD PRIMARY KEY (`topic_id`),
  ADD KEY `category_id` (`category_id`),
  ADD KEY `subcategory_id` (`subcategor_id`);

--
-- Indexes for table `userid`
--
ALTER TABLE `userid`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `cate_id` int(3) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `replies`
--
ALTER TABLE `replies`
  MODIFY `reply_id` int(3) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
--
-- AUTO_INCREMENT for table `subcategories`
--
ALTER TABLE `subcategories`
  MODIFY `subcat_id` int(3) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `topics`
--
ALTER TABLE `topics`
  MODIFY `topic_id` int(8) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `userid`
--
ALTER TABLE `userid`
  MODIFY `user_id` int(8) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
