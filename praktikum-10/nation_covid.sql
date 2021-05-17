-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 17, 2021 at 03:47 PM
-- Server version: 10.1.29-MariaDB
-- PHP Version: 7.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `covidcase`
--

-- --------------------------------------------------------

--
-- Table structure for table `nation_covid`
--

CREATE TABLE `nation_covid` (
  `id` int(111) NOT NULL,
  `country` varchar(50) NOT NULL,
  `total_cases` int(255) NOT NULL,
  `new_cases` int(255) NOT NULL,
  `total_death` int(255) NOT NULL,
  `new_death` int(255) NOT NULL,
  `total_recovered` int(255) NOT NULL,
  `active_cases` int(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `nation_covid`
--

INSERT INTO `nation_covid` (`id`, `country`, `total_cases`, `new_cases`, `total_death`, `new_death`, `total_recovered`, `active_cases`) VALUES
(2, 'USA', 33715951, 0, 600147, 0, 27136020, 5979784),
(3, 'India', 24965463, 538, 274411, 0, 21174076, 3516976),
(4, 'Brazil', 15627475, 0, 435823, 0, 14097287, 1094365),
(5, 'France', 5877787, 0, 107616, 0, 5116705, 653466),
(6, 'Turkey', 5117374, 0, 44760, 0, 4947256, 125358),
(7, 'Russia', 4949673, 9328, 116211, 340, 4563254, 270108),
(8, 'UK', 4450777, 0, 116211, 340, 4563254, 270108),
(9, 'Italy', 4159122, 0, 124156, 0, 3706084, 328882),
(10, 'Spain', 3604799, 0, 79339, 0, 3297340, 228120),
(11, 'Germany', 3602939, 0, 86731, 0, 3300700, 215508);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `nation_covid`
--
ALTER TABLE `nation_covid`
  ADD PRIMARY KEY (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
