-- phpMyAdmin SQL Dump
-- version 4.8.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 23, 2018 at 05:58 PM
-- Server version: 10.1.31-MariaDB
-- PHP Version: 7.1.16

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `sp`
--

-- --------------------------------------------------------

--
-- Table structure for table `car`
--

CREATE TABLE `car` (
  `id` int(11) NOT NULL,
  `make` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `model` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `year` date NOT NULL,
  `fuel_type` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `car`
--

INSERT INTO `car` (`id`, `make`, `model`, `year`, `fuel_type`, `user_id`) VALUES
(1, 'AUDI', '80', '2013-01-01', 'dyzelinas', NULL),
(2, 'MINI', 'Cooper', '2016-03-18', 'benzinas', NULL),
(4, 'Toyota', 'Corolla', '2013-06-01', 'benzinas', 11),
(7, 'Volkswagen', 'Passat', '2013-01-07', 'dyzelinas', 11);

-- --------------------------------------------------------

--
-- Table structure for table `change_password`
--

CREATE TABLE `change_password` (
  `id` int(11) NOT NULL,
  `password` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `forgot_password`
--

CREATE TABLE `forgot_password` (
  `id` int(11) NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `migration_versions`
--

CREATE TABLE `migration_versions` (
  `version` varchar(255) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `migration_versions`
--

INSERT INTO `migration_versions` (`version`) VALUES
('20180510115717'),
('20180518125144'),
('20180523043346');

-- --------------------------------------------------------

--
-- Table structure for table `service`
--

CREATE TABLE `service` (
  `id` int(11) NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `price` double NOT NULL,
  `duration` double NOT NULL,
  `discount` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `username` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `role` int(11) NOT NULL,
  `is_active` int(11) NOT NULL,
  `token` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `address` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone_number` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token_pass` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `username`, `email`, `password`, `role`, `is_active`, `token`, `address`, `phone_number`, `token_pass`) VALUES
(5, 'arnas', 'arnas@test.lt', '$2y$13$vA.a9EjYmu123gCYc2OdpOO2SCqvCjpjGiQPBfQz3eYkp4SFXPtCe', 0, 0, '', '', '', ''),
(6, 'arnx', 'arnas.damasickis@ktu.edu', '$2y$13$XxgN2OEr8F9pz57PllXHMuIkcSohTSWjpuXYVBM0CeiFgXdjKWtIm', 0, 0, '', '', '', ''),
(7, 'arnas1', 'arnas@arnas.lt', '$2y$13$Zdl/8822x2Akg1hm24Ch3ePh16wcX8kIKK4sQ0gsGxX3QzBOQQk12', 0, 1, 'abc', 'a', 'b', ''),
(8, 'Testas', 'testas@testas.lt', '$2y$13$DlzsZRbUwWAZ8Iqj9a5HBu2KQN2VUFxZrxa5dPfvR1plhhhCtR1wu', 0, 1, 'abc', 'a', 'a', ''),
(9, 'testas2', 'testas2@testa2s.lt', '$2y$13$in58QwopOF2uv.QUa9FjtO18iEE9.8Kf2mks5xzUal1anuyACvy0i', 0, 1, 'abc', 'b', 'b', ''),
(10, 'testas3', 'testas3@testas.lt', '$2y$13$YZ0WjyumA6XV1F1Tpqj87.0UmrXoMbsyC5FNd42FncmGUxuA/WEaS', 0, 1, 'abc', 'a', 'b', ''),
(11, 'tad', 'tad@test.lt', '$2y$13$EbBBT8JscizQDzD/iQBldOJOVgveDa06.J.t3OrGdYiRapTXcO.MC', 0, 0, 'f8de640ab4e64969925a6e735f94cc6c', 'a', 'a', ''),
(12, 'tadas', 'tadusie@gmail.com', '$2y$13$7V0PYVqncGqWtKqrrChnEuGvKhKvHE464cu9.LJNVDLwfGb3mg/DW', 1, 0, 'f1b5f9e32cbec8db042062bdd869f167', 'tadas land', '444555', '0'),
(13, 'naujas', 'naujas@new.lt', '$2y$13$kq/X66RVCQqVh2FnTSSio.9EGkn2r4GyuBjBSyEKf.AaEaxm6w4mC', 2, 1, 'd5e4aabd7eecb7c5d6ebdc16a4d7d8a1', 'naujokai', '865555', '0');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `car`
--
ALTER TABLE `car`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `UNIQ_773DE69D1ACC766E` (`make`),
  ADD UNIQUE KEY `UNIQ_773DE69DD79572D9` (`model`),
  ADD UNIQUE KEY `UNIQ_773DE69DBB827337` (`year`),
  ADD KEY `IDX_773DE69DA76ED395` (`user_id`);

--
-- Indexes for table `change_password`
--
ALTER TABLE `change_password`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `forgot_password`
--
ALTER TABLE `forgot_password`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `UNIQ_2AB9B566E7927C74` (`email`);

--
-- Indexes for table `migration_versions`
--
ALTER TABLE `migration_versions`
  ADD PRIMARY KEY (`version`);

--
-- Indexes for table `service`
--
ALTER TABLE `service`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `UNIQ_E19D9AD25E237E06` (`name`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `UNIQ_8D93D649E7927C74` (`email`),
  ADD UNIQUE KEY `UNIQ_8D93D649F85E0677` (`username`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `car`
--
ALTER TABLE `car`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `change_password`
--
ALTER TABLE `change_password`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `forgot_password`
--
ALTER TABLE `forgot_password`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `service`
--
ALTER TABLE `service`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `car`
--
ALTER TABLE `car`
  ADD CONSTRAINT `FK_773DE69DA76ED395` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
