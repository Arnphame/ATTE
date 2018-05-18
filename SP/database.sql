-- phpMyAdmin SQL Dump
-- version 4.5.4.1deb2ubuntu2
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: 2018 m. Geg 18 d. 18:12
-- Server version: 5.7.22-0ubuntu0.16.04.1
-- PHP Version: 7.0.28-0ubuntu0.16.04.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `SP`
--

-- --------------------------------------------------------

--
-- Sukurta duomenų struktūra lentelei `car`
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
-- Sukurta duomenų kopija lentelei `car`
--

INSERT INTO `car` (`id`, `make`, `model`, `year`, `fuel_type`, `user_id`) VALUES
(1, 'AUDI', '80', '2013-01-01', 'dyzelinas', NULL),
(2, 'MINI', 'Cooper', '2016-03-18', 'benzinas', NULL),
(4, 'Toyota', 'Corolla', '2013-06-01', 'benzinas', 11),
(7, 'Volkswagen', 'Passat', '2013-01-07', 'dyzelinas', 11),
(10, 'Seat', 'Arona', '2018-02-05', 'benzinas', 5);

-- --------------------------------------------------------

--
-- Sukurta duomenų struktūra lentelei `migration_versions`
--

CREATE TABLE `migration_versions` (
  `version` varchar(255) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Sukurta duomenų kopija lentelei `migration_versions`
--

INSERT INTO `migration_versions` (`version`) VALUES
('20180510115717'),
('20180518125144');

-- --------------------------------------------------------

--
-- Sukurta duomenų struktūra lentelei `user`
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
-- Sukurta duomenų kopija lentelei `user`
--

INSERT INTO `user` (`id`, `username`, `email`, `password`, `role`, `is_active`, `token`, `address`, `phone_number`, `token_pass`) VALUES
(5, 'arnas', 'arnas@test.lt', '$2y$13$vA.a9EjYmu123gCYc2OdpOO2SCqvCjpjGiQPBfQz3eYkp4SFXPtCe', 1, 1, '', '', '', '9ec757ccfa24caf7373ee59bc10a7dec'),
(6, 'arnx', 'arnas.damasickis@ktu.edu', '$2y$13$XxgN2OEr8F9pz57PllXHMuIkcSohTSWjpuXYVBM0CeiFgXdjKWtIm', 0, 0, '', '', '', ''),
(7, 'arnas1', 'arnas@arnas.lt', '$2y$13$Zdl/8822x2Akg1hm24Ch3ePh16wcX8kIKK4sQ0gsGxX3QzBOQQk12', 0, 1, 'abc', 'a', 'b', ''),
(8, 'Testas', 'testas@testas.lt', '$2y$13$DlzsZRbUwWAZ8Iqj9a5HBu2KQN2VUFxZrxa5dPfvR1plhhhCtR1wu', 0, 1, 'abc', 'a', 'a', ''),
(9, 'testas2', 'testas2@testa2s.lt', '$2y$13$in58QwopOF2uv.QUa9FjtO18iEE9.8Kf2mks5xzUal1anuyACvy0i', 0, 1, 'abc', 'b', 'b', ''),
(10, 'testas3', 'testas3@testas.lt', '$2y$13$YZ0WjyumA6XV1F1Tpqj87.0UmrXoMbsyC5FNd42FncmGUxuA/WEaS', 0, 1, 'abc', 'a', 'b', ''),
(11, 'tad', 'tad@test.lt', '$2y$13$EbBBT8JscizQDzD/iQBldOJOVgveDa06.J.t3OrGdYiRapTXcO.MC', 0, 0, 'f8de640ab4e64969925a6e735f94cc6c', 'a', 'a', ''),
(12, 'arnas2', 'arnas2@test.lt', '$2y$13$ki5guLguEDH47c1XG6GPRud8xkNx0tVQreMId3CupbzLaPcw7RjKe', 1, 1, '0', '123', '123', '');

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
-- Indexes for table `migration_versions`
--
ALTER TABLE `migration_versions`
  ADD PRIMARY KEY (`version`);

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
--
-- Apribojimai eksportuotom lentelėm
--

--
-- Apribojimai lentelei `car`
--
ALTER TABLE `car`
  ADD CONSTRAINT `FK_773DE69DA76ED395` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
