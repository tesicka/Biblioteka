-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 15, 2022 at 04:07 PM
-- Server version: 10.4.22-MariaDB
-- PHP Version: 7.4.26

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `biblioteka`
--

-- --------------------------------------------------------

--
-- Table structure for table `iznajmljivanje`
--

CREATE TABLE `iznajmljivanje` (
  `id_pozajmice` int(11) NOT NULL,
  `knjiga` varchar(50) NOT NULL,
  `autor` varchar(30) NOT NULL,
  `vrsta` varchar(30) NOT NULL,
  `id_korisnik` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `iznajmljivanje`
--

INSERT INTO `iznajmljivanje` (`id_pozajmice`, `knjiga`, `autor`, `vrsta`, `id_korisnik`) VALUES
(1, 'Dervis i smrt', 'Mesa Selimovic', 'roman', 2),
(2, 'Zov divljine', 'Jack London', 'roman', 3),
(3, 'Majstor i Margarita', 'Mihail Bulgakov', 'roman', 3),
(4, 'Sumnjivo lice', 'Branislav Nusic', 'komedija', 4),
(5, 'Gospodja Ministarka', 'Branislav Nusic', 'komedija', 1),
(6, 'Zlocin i kazna', 'Fjodor Dostojevski', 'roman', 4),
(7, 'Alhemicar', 'Paulo Koeljo', 'roman', 2),
(8, 'Ana Karenjina', 'Lav Tolstoj', 'roman', 3);

-- --------------------------------------------------------

--
-- Table structure for table `korisnik`
--

CREATE TABLE `korisnik` (
  `id_korisnik` int(11) NOT NULL,
  `username` varchar(30) NOT NULL,
  `password` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `korisnik`
--

INSERT INTO `korisnik` (`id_korisnik`, `username`, `password`) VALUES
(1, 'admin', 'admin'),
(2, 'user', 'user'),
(3, 'sara', 'sara'),
(4, 'saratesic', 'saratesic');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `iznajmljivanje`
--
ALTER TABLE `iznajmljivanje`
  ADD PRIMARY KEY (`id_pozajmice`),
  ADD KEY `relation` (`id_korisnik`);

--
-- Indexes for table `korisnik`
--
ALTER TABLE `korisnik`
  ADD PRIMARY KEY (`id_korisnik`),
  ADD UNIQUE KEY `username` (`username`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `iznajmljivanje`
--
ALTER TABLE `iznajmljivanje`
  MODIFY `id_pozajmice` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `korisnik`
--
ALTER TABLE `korisnik`
  MODIFY `id_korisnik` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `iznajmljivanje`
--
ALTER TABLE `iznajmljivanje`
  ADD CONSTRAINT `relation` FOREIGN KEY (`id_korisnik`) REFERENCES `korisnik` (`id_korisnik`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
