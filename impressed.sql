-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3308
-- Generation Time: Apr 14, 2020 at 10:30 AM
-- Server version: 5.7.24
-- PHP Version: 7.2.14

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `impressed`
--

-- --------------------------------------------------------

--
-- Table structure for table `comanda`
--

CREATE TABLE `comanda` (
  `id_comanda` int(11) NOT NULL,
  `id_utilizator` int(11) NOT NULL,
  `status_comanda` varchar(100) DEFAULT NULL,
  `data_plasare` date DEFAULT NULL,
  `tip_livrare` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `context`
--

CREATE TABLE `context` (
  `id_context` int(11) NOT NULL,
  `id_produs` int(11) NOT NULL,
  `nume` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `plata`
--

CREATE TABLE `plata` (
  `id_plata` int(20) NOT NULL,
  `id_comanda` int(11) NOT NULL,
  `metoda_plata` varchar(100) DEFAULT NULL,
  `nume_card` varchar(100) DEFAULT NULL,
  `luna_expirare` int(11) DEFAULT NULL,
  `an_expirare` int(11) DEFAULT NULL,
  `cvv` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `produse`
--

CREATE TABLE `produse` (
  `id_produs` int(11) NOT NULL,
  `nume` varchar(100) DEFAULT NULL,
  `pret` int(11) DEFAULT NULL,
  `material` varchar(100) DEFAULT NULL,
  `croiala` varchar(100) DEFAULT NULL,
  `marime` varchar(100) DEFAULT NULL,
  `imagine` varchar(100) DEFAULT NULL,
  `descriere` varchar(100) DEFAULT NULL,
  `gen` varchar(100) DEFAULT NULL,
  `tip` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `produse_comanda`
--

CREATE TABLE `produse_comanda` (
  `id_produse_comanda` int(11) NOT NULL,
  `id_comanda` int(11) NOT NULL,
  `id_produs` int(11) NOT NULL,
  `cantitate` int(11) DEFAULT NULL,
  `pret` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `utilizatori`
--

CREATE TABLE `utilizatori` (
  `id_utilizator` int(11) NOT NULL,
  `nume` varchar(100) NOT NULL,
  `prenume` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `telefon` varchar(100) NOT NULL,
  `adresa` varchar(100) NOT NULL,
  `parola` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `utilizatori`
--

INSERT INTO `utilizatori` (`id_utilizator`, `nume`, `prenume`, `email`, `telefon`, `adresa`, `parola`) VALUES
(1, 'Stan', 'Laura', 'laurastan1999@gmail.com', '0762596178', 'Str Stefan cel Mare nr.200', '123456'),
(2, '', '', '', '', '', ''),
(3, 'Stan999', 'Laura', 'laurastan1999@gmail.com', '0762596178', 'Str Stefan cel Mare nr.200', '123456'),
(4, 'Stan999', 'Laura', 'laurastan1999@gmail.com', '0762596178', 'Str Stefan cel Mare nr.200', '123456'),
(5, 'sssss', 'Laura', 'laurastan1999@gmail.com', '0762596178', 'Str Stefan cel Mare nr.200', 'pppppppppp');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `comanda`
--
ALTER TABLE `comanda`
  ADD PRIMARY KEY (`id_comanda`),
  ADD KEY `cheie_straina` (`id_utilizator`);

--
-- Indexes for table `context`
--
ALTER TABLE `context`
  ADD PRIMARY KEY (`id_context`),
  ADD KEY `cheie4` (`id_produs`);

--
-- Indexes for table `plata`
--
ALTER TABLE `plata`
  ADD PRIMARY KEY (`id_plata`),
  ADD KEY `cheie1` (`id_comanda`);

--
-- Indexes for table `produse`
--
ALTER TABLE `produse`
  ADD PRIMARY KEY (`id_produs`);

--
-- Indexes for table `produse_comanda`
--
ALTER TABLE `produse_comanda`
  ADD PRIMARY KEY (`id_produse_comanda`),
  ADD KEY `cheie2` (`id_comanda`),
  ADD KEY `cheie3` (`id_produs`);

--
-- Indexes for table `utilizatori`
--
ALTER TABLE `utilizatori`
  ADD PRIMARY KEY (`id_utilizator`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `comanda`
--
ALTER TABLE `comanda`
  MODIFY `id_comanda` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `context`
--
ALTER TABLE `context`
  MODIFY `id_context` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `plata`
--
ALTER TABLE `plata`
  MODIFY `id_plata` int(20) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `produse`
--
ALTER TABLE `produse`
  MODIFY `id_produs` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `produse_comanda`
--
ALTER TABLE `produse_comanda`
  MODIFY `id_produse_comanda` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `utilizatori`
--
ALTER TABLE `utilizatori`
  MODIFY `id_utilizator` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `comanda`
--
ALTER TABLE `comanda`
  ADD CONSTRAINT `cheie_straina` FOREIGN KEY (`id_utilizator`) REFERENCES `utilizatori` (`id_utilizator`);

--
-- Constraints for table `context`
--
ALTER TABLE `context`
  ADD CONSTRAINT `cheie4` FOREIGN KEY (`id_produs`) REFERENCES `produse` (`id_produs`);

--
-- Constraints for table `plata`
--
ALTER TABLE `plata`
  ADD CONSTRAINT `cheie1` FOREIGN KEY (`id_comanda`) REFERENCES `comanda` (`id_comanda`);

--
-- Constraints for table `produse_comanda`
--
ALTER TABLE `produse_comanda`
  ADD CONSTRAINT `cheie2` FOREIGN KEY (`id_comanda`) REFERENCES `comanda` (`id_comanda`),
  ADD CONSTRAINT `cheie3` FOREIGN KEY (`id_produs`) REFERENCES `produse` (`id_produs`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
