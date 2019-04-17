-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: 17-Abr-2019 às 19:32
-- Versão do servidor: 10.1.38-MariaDB
-- versão do PHP: 7.1.28

CREATE DATABASE `virtual_democracia`;


SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `virtual_democracia`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `questionario`
--

CREATE TABLE `questionario` (
  `id` int(11) NOT NULL,
  `qts_01` int(11) NOT NULL,
  `qts_02` int(11) NOT NULL,
  `qts_03` int(11) NOT NULL,
  `qts_04` int(11) NOT NULL,
  `qts_05` int(11) NOT NULL,
  `qts_06` int(11) NOT NULL,
  `qts_07` int(11) NOT NULL,
  `qts_08` int(11) NOT NULL,
  `qts_09` int(11) NOT NULL,
  `qts_10` int(11) NOT NULL,
  `qts_11` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `questionario`
--
ALTER TABLE `questionario`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `questionario`
--
ALTER TABLE `questionario`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=321;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
