-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: database:3306
-- Generation Time: Feb 02, 2021 at 10:20 PM
-- Server version: 5.7.33
-- PHP Version: 7.4.13

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `el-amana`
--

-- --------------------------------------------------------

--
-- Table structure for table `history`
--

CREATE TABLE `history` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `action` text NOT NULL,
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `invoices`
--

CREATE TABLE `invoices` (
  `id` int(11) NOT NULL,
  `left_eye` varchar(195) NOT NULL,
  `right_eye` varchar(195) NOT NULL,
  `amount_to_pay` int(11) NOT NULL,
  `paid_amount` int(11) NOT NULL,
  `remaining_amount` int(11) NOT NULL,
  `doctor_name` varchar(195) NOT NULL,
  `mount_price` int(11) NOT NULL,
  `left_eye_price` int(11) NOT NULL,
  `right_eye_price` int(11) NOT NULL,
  `client_name` varchar(195) NOT NULL,
  `prescription_id` int(11) DEFAULT NULL,
  `user_id` int(11) NOT NULL,
  `created_at` date NOT NULL,
  `updated_at` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `invoices`
--

INSERT INTO `invoices` (`id`, `left_eye`, `right_eye`, `amount_to_pay`, `paid_amount`, `remaining_amount`, `doctor_name`, `mount_price`, `left_eye_price`, `right_eye_price`, `client_name`, `prescription_id`, `user_id`, `created_at`, `updated_at`) VALUES
(1, '3', '2.5', 12000, 2000, 10000, 'Cheikh Oumar Ndiaye', 2000, 5000, 5000, 'Zahra Sidi Addelaziz', NULL, 1, '2021-01-28', NULL),
(2, '0.03', '-0.03', 30, 30, 0, 'test', 10, 10, 10, 'test', NULL, 1, '2021-02-01', NULL),
(3, '2.8', '-2.5', 1500, 1500, 0, '', 500, 500, 500, 'Mamadou Aly Sy', NULL, 2, '2021-02-01', NULL),
(5, '0.09', '-0.02', 1500, 1500, 0, 'Cheikh Oumar Ndiaye', 500, 500, 500, 'May sall', NULL, 2, '2021-02-02', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `prescriptions`
--

CREATE TABLE `prescriptions` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `client_name` varchar(255) NOT NULL,
  `content` text NOT NULL,
  `left_eye` varchar(255) NOT NULL,
  `right_eye` varchar(255) NOT NULL,
  `created_at` date NOT NULL,
  `modified_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `prescriptions`
--

INSERT INTO `prescriptions` (`id`, `user_id`, `client_name`, `content`, `left_eye`, `right_eye`, `created_at`, `modified_at`) VALUES
(1, 1, 'Zahra Sidi Abdoulaziz', '<p>Add + 1,50</p><p>Photoclique</p><p>Antirefle\r\n</p>', '+3', '+2,5', '2021-01-21', NULL),
(2, 1, 'May sall', '<p>antirefet</p>', '-9', '-8', '2021-01-28', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `first_name` varchar(255) NOT NULL,
  `last_name` varchar(255) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `role` int(11) NOT NULL DEFAULT '0',
  `last_time_see` varchar(255) NOT NULL,
  `created_at` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `first_name`, `last_name`, `username`, `password`, `role`, `last_time_see`, `created_at`) VALUES
(1, 'Mamadou', 'Aly Sy', 'admin', 'd033e22ae348aeb5660fc2140aec35850c4da997', 2, '02 / 02  / 2021 à 20:04:09', '2021-01-01'),
(2, 'Samba', 'Ndiaye', 'samba', '00fd4b4549a1094aae926ef62e9dbd3cdcc2e456', 0, '01 / 02  / 2021 à 13:18:33', '2021-02-01');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `history`
--
ALTER TABLE `history`
  ADD KEY `fk_history_user_id` (`user_id`);

--
-- Indexes for table `invoices`
--
ALTER TABLE `invoices`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_invoces_user_id` (`user_id`);

--
-- Indexes for table `prescriptions`
--
ALTER TABLE `prescriptions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_user_id` (`user_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `invoices`
--
ALTER TABLE `invoices`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `prescriptions`
--
ALTER TABLE `prescriptions`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `history`
--
ALTER TABLE `history`
  ADD CONSTRAINT `fk_history_user_id` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `invoices`
--
ALTER TABLE `invoices`
  ADD CONSTRAINT `fk_invoces_user_id` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `prescriptions`
--
ALTER TABLE `prescriptions`
  ADD CONSTRAINT `fk_user_id` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
