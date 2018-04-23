-- phpMyAdmin SQL Dump
-- version 4.5.4.1deb2ubuntu2
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: 2018 m. Bal 23 d. 23:20
-- Server version: 5.7.21-0ubuntu0.16.04.1
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
-- Sukurta duomenų struktūra lentelei `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `username` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `role` int(11) NOT NULL,
  `is_active` int(11) NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `address` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone_number` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Sukurta duomenų kopija lentelei `user`
--

INSERT INTO `user` (`id`, `username`, `email`, `password`, `role`, `is_active`, `token`, `address`, `phone_number`) VALUES
(5, 'arnas', 'arnas@test.lt', '$2y$13$vA.a9EjYmu123gCYc2OdpOO2SCqvCjpjGiQPBfQz3eYkp4SFXPtCe', 0, 0, '', '', ''),
(6, 'arnx', 'arnas.damasickis@ktu.edu', '$2y$13$XxgN2OEr8F9pz57PllXHMuIkcSohTSWjpuXYVBM0CeiFgXdjKWtIm', 0, 0, '', '', ''),
(7, 'arnas1', 'arnas@arnas.lt', '$2y$13$Zdl/8822x2Akg1hm24Ch3ePh16wcX8kIKK4sQ0gsGxX3QzBOQQk12', 0, 1, 'abc', 'a', 'b'),
(8, 'Testas', 'testas@testas.lt', '$2y$13$DlzsZRbUwWAZ8Iqj9a5HBu2KQN2VUFxZrxa5dPfvR1plhhhCtR1wu', 0, 1, 'abc', 'a', 'a'),
(9, 'testas2', 'testas2@testa2s.lt', '$2y$13$in58QwopOF2uv.QUa9FjtO18iEE9.8Kf2mks5xzUal1anuyACvy0i', 0, 1, 'abc', 'b', 'b'),
(10, 'testas3', 'testas3@testas.lt', '$2y$13$YZ0WjyumA6XV1F1Tpqj87.0UmrXoMbsyC5FNd42FncmGUxuA/WEaS', 0, 1, 'abc', 'a', 'b');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `UNIQ_8D93D649F85E0677` (`username`),
  ADD UNIQUE KEY `UNIQ_8D93D649E7927C74` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
