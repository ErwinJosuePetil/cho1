-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 05, 2025 at 01:08 AM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `cho1_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `babies`
--

CREATE TABLE `babies` (
  `id` int(11) NOT NULL,
  `mother_id` int(11) DEFAULT NULL,
  `firstname` varchar(100) DEFAULT NULL,
  `lastname` varchar(100) NOT NULL,
  `birthdate` date NOT NULL,
  `sex` enum('male','female','other') NOT NULL,
  `birthweight` decimal(5,2) DEFAULT NULL,
  `birthlength` decimal(5,2) DEFAULT NULL,
  `feeding_method` enum('breastfeeding','formula','both') NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `medical_records`
--

CREATE TABLE `medical_records` (
  `id` int(11) NOT NULL,
  `mother_id` int(11) DEFAULT NULL,
  `staff_id` int(11) DEFAULT NULL,
  `record_date` date NOT NULL,
  `notes` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `medical_staff`
--

CREATE TABLE `medical_staff` (
  `id` int(11) NOT NULL,
  `firstname` varchar(100) NOT NULL,
  `lastname` varchar(100) NOT NULL,
  `role` varchar(100) DEFAULT NULL,
  `shift_start_time` time DEFAULT NULL,
  `shift_end_time` time DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `mothers`
--

CREATE TABLE `mothers` (
  `id` int(11) NOT NULL,
  `firstname` varchar(100) NOT NULL,
  `middlename` varchar(100) DEFAULT NULL,
  `lastname` varchar(100) NOT NULL,
  `birthdate` date DEFAULT NULL,
  `birthplace` varchar(255) DEFAULT NULL,
  `sex` varchar(255) NOT NULL DEFAULT 'Female',
  `gestational_age` int(255) DEFAULT NULL,
  `due_date` date DEFAULT NULL,
  `prenatal_visit` int(255) DEFAULT NULL,
  `last_menstrual_period` date DEFAULT NULL,
  `pregnancy_status` varchar(255) DEFAULT NULL,
  `barangay` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `admission_date` date DEFAULT NULL,
  `discharge_date` date DEFAULT NULL,
  `complications` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `mothers`
--

INSERT INTO `mothers` (`id`, `firstname`, `middlename`, `lastname`, `birthdate`, `birthplace`, `sex`, `gestational_age`, `due_date`, `prenatal_visit`, `last_menstrual_period`, `pregnancy_status`, `barangay`, `created_at`, `admission_date`, `discharge_date`, `complications`) VALUES
(7, 'wada', 'dad', 'awda', '2025-02-13', 'dwada', 'Female', NULL, NULL, NULL, NULL, NULL, '', '2025-02-09 02:40:39', '2025-02-09', '2025-02-09', '213123123awdaw'),
(8, 'anna ', 'josue', 'petil', '1996-10-26', 'salawag', 'Female', 2, '2025-03-02', 0, '2025-03-02', 'adaw', '', '2025-02-09 02:41:41', '2025-03-02', '2025-03-02', 'sample'),
(9, 'sample', 'sample', 'sample', '3122-12-31', 'samda', 'Female', NULL, NULL, NULL, NULL, NULL, '', '2025-02-10 23:32:53', '3123-12-31', '0000-00-00', 'salpe\r\n'),
(10, 'sample', 'sample ', 'sample', '2025-01-01', 'salawag', 'Female', NULL, NULL, NULL, NULL, NULL, '', '2025-02-18 02:25:07', '1231-02-13', '1231-02-13', 'daaassd'),
(11, 'erwin', 'dwamd;wd', 'dwad;', '2025-02-21', 'dwadadwqdwqd', 'Female', 2, '2025-03-02', 2025, '2025-03-02', 'dadaw', '', '2025-02-21 08:12:00', '0031-11-02', '0000-00-00', ''),
(12, 'levita', 'tang', 'casteneda', '1997-03-22', 'taguig city', 'Female', NULL, NULL, NULL, NULL, NULL, '', '2025-02-21 08:15:16', '2025-02-21', '0000-00-00', 'wala pa fifings'),
(13, 'rebecca ', 'josue', 'petil', '1967-10-26', 'salawag', 'Female', 1, '2025-03-02', 2025, '2025-03-02', '', '', '2025-03-02 15:02:01', '2025-03-02', '0000-00-00', 'ewan');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(255) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `password`) VALUES
(1, 'admin', 'admin');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `babies`
--
ALTER TABLE `babies`
  ADD PRIMARY KEY (`id`),
  ADD KEY `mother_id` (`mother_id`);

--
-- Indexes for table `medical_records`
--
ALTER TABLE `medical_records`
  ADD PRIMARY KEY (`id`),
  ADD KEY `mother_id` (`mother_id`),
  ADD KEY `staff_id` (`staff_id`);

--
-- Indexes for table `medical_staff`
--
ALTER TABLE `medical_staff`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `mothers`
--
ALTER TABLE `mothers`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `babies`
--
ALTER TABLE `babies`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `medical_records`
--
ALTER TABLE `medical_records`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `medical_staff`
--
ALTER TABLE `medical_staff`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `mothers`
--
ALTER TABLE `mothers`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `babies`
--
ALTER TABLE `babies`
  ADD CONSTRAINT `babies_ibfk_1` FOREIGN KEY (`mother_id`) REFERENCES `mothers` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `medical_records`
--
ALTER TABLE `medical_records`
  ADD CONSTRAINT `medical_records_ibfk_1` FOREIGN KEY (`mother_id`) REFERENCES `mothers` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `medical_records_ibfk_2` FOREIGN KEY (`staff_id`) REFERENCES `medical_staff` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
