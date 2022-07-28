-- phpMyAdmin SQL Dump
-- version 5.1.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 01, 2022 at 10:26 PM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 7.4.29

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `oconnect`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(11) NOT NULL,
  `Fullname` varchar(255) NOT NULL,
  `Email` varchar(255) NOT NULL,
  `Phone` varchar(255) NOT NULL,
  `Pwd` varchar(255) NOT NULL,
  `Admin_status` varchar(255) NOT NULL,
  `DateCreated` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `Fullname`, `Email`, `Phone`, `Pwd`, `Admin_status`, `DateCreated`) VALUES
(22, 'Gospel Jonathan', 'sirelite11@gmail.com', '07030548630', '1234', 'main', '2022-06-01 12:35:42'),
(25, 'Gos Jonathan', 'gospyjo@gmail.com', '09010707383', '1234', 'Sub-Admin', '2022-06-01 20:22:37'),
(26, 'Jojo Vocals', 'jojovocals@gmail.com', '07030548630', '12345', 'Sub-Admin', '2022-06-01 15:00:59'),
(27, 'Pogba Apakhade', 'Nyorekeys@gmail.com', '0912340982', '1234', 'Sub-Admin', '2022-06-01 19:07:14'),
(28, 'Nyore Usia', 'Jeffsoul@gmail.com', '0918234512', '1234', 'Sub-Admin', '2022-06-01 19:08:18'),
(29, 'Sarah Jonathan', 'sayjay@gmail.com', '07039539371', '1234', 'Sub-Admin', '2022-06-01 19:09:52');

-- --------------------------------------------------------

--
-- Table structure for table `track`
--

CREATE TABLE `track` (
  `id` int(11) NOT NULL,
  `firstname` varchar(255) NOT NULL,
  `lastname` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `phone` int(255) NOT NULL,
  `location` varchar(255) NOT NULL,
  `cpanel_username` varchar(255) NOT NULL,
  `cpanel_password` varchar(255) NOT NULL,
  `project_name` varchar(255) NOT NULL,
  `project_link` varchar(255) NOT NULL,
  `hosting_date` varchar(255) NOT NULL,
  `expiry_date` varchar(255) NOT NULL,
  `hosting_company` varchar(255) NOT NULL,
  `hosting_email` varchar(255) NOT NULL,
  `hosting_email_password` varchar(255) NOT NULL,
  `domain_company` varchar(255) NOT NULL,
  `domain_email` varchar(255) NOT NULL,
  `domain_email_password` varchar(255) NOT NULL,
  `server_link` varchar(255) NOT NULL,
  `stats` varchar(255) NOT NULL,
  `added_by` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `track`
--

INSERT INTO `track` (`id`, `firstname`, `lastname`, `email`, `phone`, `location`, `cpanel_username`, `cpanel_password`, `project_name`, `project_link`, `hosting_date`, `expiry_date`, `hosting_company`, `hosting_email`, `hosting_email_password`, `domain_company`, `domain_email`, `domain_email_password`, `server_link`, `stats`, `added_by`) VALUES
(1, 'Gospel', 'Jonathan', 'sirelite11@gmail.com', 2147483647, 'Abuja', 'admin', 'admin', 'Poem', 'poem.com', '2022-04-09', '2022-05-30', 'Namecheap', 'admin', 'admin', 'Namecheap', 'admin', 'admin', 'Name.com', 'yes', 'Gospel Jonathan'),
(2, 'Gospel', 'Jonathan', 'sirelite11@gmail.com', 2147483647, 'Abuja', 'admin', 'admin', 'Zux', 'poem.com', '2022-04-09', '2023-04-09', 'Namecheap', 'admin', 'admin', 'Namecheap', 'admin', 'admin', 'Name.com', 'yes', 'Gospel Jonathan'),
(3, 'Gospel', 'Jonathan', 'sirelite11@gmail.com', 2147483647, 'Abuja', 'admin', 'admin', 'Edupus', 'poem.com', '2022-04-09', '2023-04-09', 'Namecheap', 'admin', 'admin', 'Namecheap', 'admin', 'admin', 'Name.com', 'yes', 'Gospel Jonathan'),
(5, 'Pogba', 'Shallom', 'pogbashallom@gmail.com', 2147483647, 'Dubai', 'wordsLink', '1234', 'Wordslinked', 'wordslinked.com', '2022-05-05', '2023-05-05', 'Cpanel', 'cpanel@gmail.com', '1234', 'Namecheap', 'elite', '1234', 'server.com', 'yes', 'Gospel Jonathan'),
(6, 'Charlie', 'Chuwks', 'charlieChukwas@gmail.com', 2147483647, 'Delta', 'CharlieWings', 'CharlieWings', 'CharlieWings', 'CharlieWings.com', '2022-05-04', '2023-05-04', 'CharlieWings', 'CharlieWings@gmail.com', 'CharlieWings', 'Namecheap', 'elite.com', 'CharlieWings', 'Name.com', 'yes', 'Gospel Jonathan'),
(8, 'Godsent', 'Ijie', 'GodsentIjie@gmail.com', 2147483647, 'Kaduna', 'bengpee', '1234', 'Amplified', 'Amplified.com', '2022-06-02', '2023-01-01', 'Namecheap', 'Namecheap.com', '1234', 'Namecheap', 'elite.com', '1234', 'Name.com', 'no', 'Jojo Vocals'),
(9, 'Godsent', 'Ijie', 'GodsentIjie@gmail.com', 2147483647, 'Kaduna', 'bengpee', '1234', 'Driven', 'Amplified.com', '2022-06-02', '2023-01-01', 'Namecheap', 'Namecheap.com', '1234', 'Namecheap', 'elite.com', '1234', 'Name.com', 'yes', 'Jojo Vocals'),
(10, 'Godsent', 'Ijie', 'GodsentIjie@gmail.com', 2147483647, 'Kaduna', 'bengpee', '1234', 'Kodova', 'Amplified.com', '2022-06-02', '2023-01-01', 'Namecheap', 'Namecheap.com', '1234', 'Namecheap', 'elite.com', '1234', 'Name.com', 'yes', 'Jojo Vocals');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `track`
--
ALTER TABLE `track`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT for table `track`
--
ALTER TABLE `track`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
