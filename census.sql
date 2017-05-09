-- phpMyAdmin SQL Dump
-- version 4.6.5.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 09, 2017 at 02:25 AM
-- Server version: 10.1.21-MariaDB
-- PHP Version: 5.6.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `census`
--

-- --------------------------------------------------------

--
-- Table structure for table `area`
--

CREATE TABLE `area` (
  `region` varchar(255) DEFAULT NULL,
  `zone` varchar(255) DEFAULT NULL,
  `wereda` varchar(255) DEFAULT NULL,
  `town` varchar(255) DEFAULT NULL,
  `kebele` varchar(15) DEFAULT NULL,
  `subcity` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `area`
--

INSERT INTO `area` (`region`, `zone`, `wereda`, `town`, `kebele`, `subcity`) VALUES
('Tigray', 'Wolqayt', 'Duge', 'Mekele', '01', 'mekele'),
('SNNPR', 'Gamo Gofa', 'Arbaminch', 'Arbaminch', '01', 'Sikela');

-- --------------------------------------------------------

--
-- Table structure for table `census`
--

CREATE TABLE `census` (
  `id` int(11) NOT NULL,
  `date` varchar(255) DEFAULT NULL,
  `area` varchar(255) DEFAULT NULL,
  `no_enumerated` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `enumerator`
--

CREATE TABLE `enumerator` (
  `id` int(11) NOT NULL,
  `firstname` varchar(255) DEFAULT NULL,
  `lastname` varchar(255) DEFAULT NULL,
  `age` int(11) DEFAULT NULL,
  `sex` varchar(15) DEFAULT NULL,
  `username` varchar(255) DEFAULT NULL,
  `address` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `phone_no` varchar(255) DEFAULT NULL,
  `middlename` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `enumerator`
--

INSERT INTO `enumerator` (`id`, `firstname`, `lastname`, `age`, `sex`, `username`, `address`, `email`, `phone_no`, `middlename`) VALUES
(0, 'Abebe', 'Bekele', 22, 'male', 'abekebe', NULL, NULL, NULL, 'kebede');

-- --------------------------------------------------------

--
-- Table structure for table `house`
--

CREATE TABLE `house` (
  `house_number` varchar(25) NOT NULL,
  `type` varchar(255) DEFAULT NULL,
  `house_status` varchar(255) DEFAULT NULL,
  `water` varchar(255) DEFAULT NULL,
  `toilet` varchar(255) DEFAULT NULL,
  `sharing_toilet` varchar(255) DEFAULT NULL,
  `bathroom` varchar(255) DEFAULT NULL,
  `Kitchen` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `house`
--

INSERT INTO `house` (`house_number`, `type`, `house_status`, `water`, `toilet`, `sharing_toilet`, `bathroom`, `Kitchen`) VALUES
('10001', 'Hotel', NULL, NULL, NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `person`
--

CREATE TABLE `person` (
  `id` varchar(255) NOT NULL,
  `firstname` varchar(255) DEFAULT NULL,
  `middlename` varchar(255) DEFAULT NULL,
  `lastname` varchar(255) DEFAULT NULL,
  `age` int(11) DEFAULT NULL,
  `sex` varchar(255) DEFAULT NULL,
  `region` varchar(255) DEFAULT NULL,
  `zone` varchar(255) DEFAULT NULL,
  `town` varchar(255) DEFAULT NULL,
  `religion` varchar(255) DEFAULT NULL,
  `place_of_birth` varchar(255) DEFAULT NULL,
  `duration_of_residence` varchar(255) DEFAULT NULL,
  `martial_status` varchar(255) DEFAULT NULL,
  `orphan_hood` varchar(255) DEFAULT NULL,
  `previous_residence` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `person`
--

INSERT INTO `person` (`id`, `firstname`, `middlename`, `lastname`, `age`, `sex`, `region`, `zone`, `town`, `religion`, `place_of_birth`, `duration_of_residence`, `martial_status`, `orphan_hood`, `previous_residence`) VALUES
('p01', 'Abebe', 'Kebede', 'Bekele', 22, 'female', 'SNNPR', 'Gamo Gofa', 'Arbaminch', 'orthodox', 'Arbaminch', '5 years', 'Married', 'none', 'Chencha');

-- --------------------------------------------------------

--
-- Table structure for table `region`
--

CREATE TABLE `region` (
  `name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `region`
--

INSERT INTO `region` (`name`) VALUES
('Addis Ababa'),
('Afar'),
('Amhara'),
('Benshangul Gumz'),
('DireDewa'),
('Harari'),
('Oromia'),
('SNNPR'),
('Somale'),
('Tigray');

-- --------------------------------------------------------

--
-- Table structure for table `supervisor`
--

CREATE TABLE `supervisor` (
  `id` int(11) NOT NULL,
  `username` varchar(255) DEFAULT NULL,
  `firstname` varchar(255) DEFAULT NULL,
  `lastname` varchar(255) DEFAULT NULL,
  `middlename` varchar(255) DEFAULT NULL,
  `address` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `phone_no` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `supervisor`
--

INSERT INTO `supervisor` (`id`, `username`, `firstname`, `lastname`, `middlename`, `address`, `email`, `phone_no`) VALUES
(1000, 'admin', 'Abebe', 'Bekele', 'Dereje', 'Arbaminch', 'abebe@gmail.com', '0922345532');

-- --------------------------------------------------------

--
-- Table structure for table `town`
--

CREATE TABLE `town` (
  `town` varchar(255) DEFAULT NULL,
  `wereda` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `town`
--

INSERT INTO `town` (`town`, `wereda`) VALUES
('Arbaminch', 'Arbaminch'),
('Chencha', 'Arbaminch'),
('Gofa', 'Arbaminch'),
('Hawasa', 'Sidama');

-- --------------------------------------------------------

--
-- Table structure for table `towns`
--

CREATE TABLE `towns` (
  `town` varchar(255) DEFAULT NULL,
  `country` varchar(255) DEFAULT NULL,
  `region` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `towns`
--

INSERT INTO `towns` (`town`, `country`, `region`) VALUES
('Addis Ababa', 'Ethiopia', 'Addis Ababa'),
('Arbaminch', 'Ethiopia', 'SNNPR'),
('Hawasa', 'Ethiopia', 'SNNPR'),
('Wolayta', 'Ethiopia', 'SNNPR'),
('Bahirdar', 'Ethiopia', 'Amhara'),
('Gondar', 'Ethiopia', 'Amhara'),
('Mekele', 'Ethiopia', 'Tigray'),
('Adigrat', 'Ethiopia', 'Tigray'),
('Ambo', 'Ethiopia', 'Oromia'),
('Adama', 'Ethiopia', 'Oromia'),
('Haromaya', 'Ethiopia', 'Oromia'),
('Jimma', 'Ethiopia', 'Oromia');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` varchar(255) DEFAULT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) DEFAULT NULL,
  `type` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `password`, `type`) VALUES
('A03', 'abekebe', '$2y$10$MDcOdqZ30Lwtcvd2keu3B.0K7HtmRgCLp5KZV3JRCGMV4GR4q5VQG', 'enum'),
('1000', 'admin', '$2y$10$jq3tU0CyRiYh2BxyxG5BcOVenenSym/yMoSF3Yoi8qyKibxFjmeTC', 'supervisor');

-- --------------------------------------------------------

--
-- Table structure for table `wereda`
--

CREATE TABLE `wereda` (
  `wereda` varchar(255) DEFAULT NULL,
  `zone` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `wereda`
--

INSERT INTO `wereda` (`wereda`, `zone`) VALUES
('Arbaminch', 'Gamo Gofa'),
('Sidama', 'Hadiya');

-- --------------------------------------------------------

--
-- Table structure for table `zone`
--

CREATE TABLE `zone` (
  `zone` varchar(255) DEFAULT NULL,
  `region` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `zone`
--

INSERT INTO `zone` (`zone`, `region`) VALUES
('Gamo Gofa', 'SNNPR'),
('Wolayta', 'SNNPR'),
('Kambata', 'SNNPR'),
('Hadiya', 'SNNPR'),
('Addis Ababa', 'Addis Ababa');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `census`
--
ALTER TABLE `census`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `enumerator`
--
ALTER TABLE `enumerator`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `house`
--
ALTER TABLE `house`
  ADD PRIMARY KEY (`house_number`);

--
-- Indexes for table `person`
--
ALTER TABLE `person`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `region`
--
ALTER TABLE `region`
  ADD PRIMARY KEY (`name`);

--
-- Indexes for table `supervisor`
--
ALTER TABLE `supervisor`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`username`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
