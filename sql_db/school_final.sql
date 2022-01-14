-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 14, 2022 at 10:04 AM
-- Server version: 10.4.18-MariaDB
-- PHP Version: 8.0.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `school`
--

-- --------------------------------------------------------

--
-- Table structure for table `admins`
--

CREATE TABLE `admins` (
  `id` int(250) NOT NULL,
  `name` varchar(250) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(250) NOT NULL,
  `image` varchar(250) NOT NULL,
  `phone` varchar(50) NOT NULL,
  `gender` varchar(200) NOT NULL,
  `address` varchar(255) NOT NULL,
  `flatno` varchar(250) NOT NULL,
  `age` varchar(202) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admins`
--

INSERT INTO `admins` (`id`, `name`, `email`, `password`, `image`, `phone`, `gender`, `address`, `flatno`, `age`) VALUES
(6, 'susaanta mandal 23', 'susantamandal095@gmail.com', '101010', 'raju barik2.jpg', '6295376114', 'Male', 'HAREKRISHNA PUR\r\n', '24i', '22');

-- --------------------------------------------------------

--
-- Table structure for table `contacts`
--

CREATE TABLE `contacts` (
  `id` int(250) NOT NULL,
  `name` varchar(250) NOT NULL,
  `email` varchar(255) NOT NULL,
  `message` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `contacts`
--

INSERT INTO `contacts` (`id`, `name`, `email`, `message`) VALUES
(5, 'SUSANTA MANDAL', 'susantamandal095@gmail.com', 'fgf'),
(6, 'hi sussanta ', 'susanta@gmail.com', 'asas'),
(7, 'ss', 'sss@gmail.com', 'sss@gmail.com'),
(8, 'jjk', 'sss@gmail.com', 'sss@gmail.com'),
(9, 'sss@gmail.com', 'sss@gmail.com', 'sss@gmail.com'),
(10, 'popop', 'sss@gmail.com', 'sss@gmail.com'),
(11, 'uyyt', 'sss@gmail.com', 'sss@gmail.com'),
(12, 'jhjg', 'sss@gmail.com', 'tytytysss@gmail.com'),
(13, 'dsssdf', 'sss@gmail.com', 'ghgg'),
(14, 'ghgdgfd', 'sss@gmail.com', 'sss@gmail.comsss@gmail.comsss@gmail.com'),
(15, '78uy', 'sss@gmail.com', 'jghsss@gmail.com'),
(16, 'fgfd', 'sss@gmail.com', 'dfcvcfcvsss@gmail.com');

-- --------------------------------------------------------

--
-- Table structure for table `digital`
--

CREATE TABLE `digital` (
  `id` int(250) NOT NULL,
  `link` varchar(220) NOT NULL,
  `size` varchar(200) NOT NULL,
  `downloads` varchar(250) NOT NULL,
  `name` varchar(250) NOT NULL,
  `date` date NOT NULL,
  `class` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `digital`
--

INSERT INTO `digital` (`id`, `link`, `size`, `downloads`, `name`, `date`, `class`) VALUES
(1, 'www.facebook.com', '223455', '2', 'CTS (3) (4).pdf', '2021-02-21', 'X'),
(2, 'asd.com', '202844', '0', 'saturday offs.pdf', '2022-01-08', 'IX');

-- --------------------------------------------------------

--
-- Table structure for table `new_admission`
--

CREATE TABLE `new_admission` (
  `id` int(10) NOT NULL,
  `name` varchar(150) NOT NULL,
  `class` varchar(150) NOT NULL,
  `gender` varchar(150) NOT NULL,
  `dob` varchar(150) NOT NULL,
  `image` varchar(150) NOT NULL,
  `email` varchar(150) NOT NULL,
  `category` varchar(150) NOT NULL,
  `adhaarnumber` varchar(150) NOT NULL,
  `mothername` varchar(150) NOT NULL,
  `fathername` varchar(150) NOT NULL,
  `phone` varchar(150) NOT NULL,
  `country` varchar(150) NOT NULL,
  `state` varchar(150) NOT NULL,
  `address` varchar(150) NOT NULL,
  `pincode` varchar(150) NOT NULL,
  `city` varchar(150) NOT NULL,
  `gargensname` text NOT NULL,
  `gargensoccupation` text NOT NULL,
  `gargensphone` varchar(15) NOT NULL,
  `famallyincome` varchar(110) NOT NULL,
  `gargensaddress` varchar(250) NOT NULL,
  `password` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `new_admission`
--

INSERT INTO `new_admission` (`id`, `name`, `class`, `gender`, `dob`, `image`, `email`, `category`, `adhaarnumber`, `mothername`, `fathername`, `phone`, `country`, `state`, `address`, `pincode`, `city`, `gargensname`, `gargensoccupation`, `gargensphone`, `famallyincome`, `gargensaddress`, `password`) VALUES
(6, 'SUSANTA MANDAL', 'V', 'Male', '2007-02-04', 'aaaaaa susanta.jpg', 'susantamandal095@gmail.com', 'OBC-A', '896598569856', 'chhabi mandal', 'rabindranath mandal', '9679337134', 'INDIA', 'Andhra Pradesh', 'HAREKRISHNA PURROHINI', '721143', 'jhargram', 'chhabi mandal', 'ouloul', '9679337134', '60000', 'HAREKRISHNA PUR, ROHINI', 'user#pass');

-- --------------------------------------------------------

--
-- Table structure for table `notices`
--

CREATE TABLE `notices` (
  `class` varchar(250) NOT NULL,
  `noticebody` varchar(250) NOT NULL,
  `size` varchar(250) NOT NULL,
  `downloads` varchar(250) NOT NULL,
  `id` int(250) NOT NULL,
  `date` date NOT NULL,
  `name` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `notices`
--

INSERT INTO `notices` (`class`, `noticebody`, `size`, `downloads`, `id`, `date`, `name`) VALUES
('', 'mandal susanta', '247927', '6', 2, '2021-02-21', 'new (1) (3) (1) (2) (1).pdf'),
('', 'hi susanta for test', '202844', '1', 3, '2022-01-08', 'saturday offs.pdf');

-- --------------------------------------------------------

--
-- Table structure for table `results`
--

CREATE TABLE `results` (
  `id` int(11) NOT NULL,
  `name` varchar(200) NOT NULL,
  `class` varchar(250) NOT NULL,
  `size` varchar(200) NOT NULL,
  `downloads` varchar(250) NOT NULL,
  `date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `results`
--

INSERT INTO `results` (`id`, `name`, `class`, `size`, `downloads`, `date`) VALUES
(1, 'new (1) (3) (1) (2) (2).pdf', 'V', '247927', '3', '2021-02-21'),
(2, 'Location.pdf', 'X', '30038', '0', '2022-01-08');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admins`
--
ALTER TABLE `admins`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `contacts`
--
ALTER TABLE `contacts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `digital`
--
ALTER TABLE `digital`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `new_admission`
--
ALTER TABLE `new_admission`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `notices`
--
ALTER TABLE `notices`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `results`
--
ALTER TABLE `results`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admins`
--
ALTER TABLE `admins`
  MODIFY `id` int(250) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `contacts`
--
ALTER TABLE `contacts`
  MODIFY `id` int(250) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `digital`
--
ALTER TABLE `digital`
  MODIFY `id` int(250) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `new_admission`
--
ALTER TABLE `new_admission`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `notices`
--
ALTER TABLE `notices`
  MODIFY `id` int(250) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `results`
--
ALTER TABLE `results`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
