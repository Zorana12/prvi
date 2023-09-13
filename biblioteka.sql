-- phpMyAdmin SQL Dump
-- version 4.7.7
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 16, 2018 at 06:16 PM
-- Server version: 10.1.30-MariaDB
-- PHP Version: 7.2.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
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
-- Table structure for table `autor`
--

CREATE TABLE `autor` (
  `id` int(11) NOT NULL,
  `ime` varchar(255) NOT NULL,
  `prezime` varchar(255) NOT NULL,
  `datum_rodjenja` date NOT NULL,
  `nacionalnost` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `autor`
--

INSERT INTO `autor` (`id`, `ime`, `prezime`, `datum_rodjenja`, `nacionalnost`) VALUES
(1, 'Vilijam', 'Sekspir', '1564-12-05', 'Englez'),
(2, 'Ivo', 'Andric', '1892-01-01', 'Srbin'),
(3, 'Lav', 'Tolstoj', '1935-08-08', 'Rus'),
(4, 'Fjodor', 'Dostojevski', '1987-10-10', 'Rus'),
(5, 'Ernest', 'Hemingvej', '1945-01-04', 'Amerikanac'),
(6, 'Maksim', 'Gorki', '1965-05-05', 'Rus'),
(7, 'Mark', 'Tven', '1955-06-06', 'Amerikanac'),
(8, 'Fridrih', 'Nice', '1946-03-03', 'Nemac'),
(9, 'Stevan', 'Sremac', '1988-01-04', 'Srbin'),
(10, 'Desanka', 'Maksimovic', '1905-12-12', 'Srpkinja'),
(11, 'Branko', 'Copic', '1925-11-11', 'Srbin'),
(12, 'Paulo', 'Koeljo', '1940-03-03', 'Brazilac');

-- --------------------------------------------------------

--
-- Table structure for table `knjiga`
--

CREATE TABLE `knjiga` (
  `id` int(11) NOT NULL,
  `naslov` varchar(255) NOT NULL,
  `zanr` varchar(255) NOT NULL,
  `godina_izdavanja` year(4) NOT NULL,
  `id_autor` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `knjiga`
--

INSERT INTO `knjiga` (`id`, `naslov`, `zanr`, `godina_izdavanja`, `id_autor`) VALUES
(1, 'testerwrerwewerre', 'test12', 1997, NULL),
(2, 'te', 'testsdfsdfsdfsdffdsdf', 1964, NULL),
(3, 'Romeo and Juliet', 'Drama', 1910, NULL),
(4, 'Na Drini cuprija 123', 'Roman', 1945, NULL),
(5, 'Na Drini cuprija test', 'Roman', 1932, 2),
(6, 'Romeo and Juliet', 'Darma ', 1967, 1),
(8, 'Ana Karenjina', 'Roman', 1949, 3),
(9, 'Tom Sojer', 'Roman', 1987, 7),
(10, 'Starac i more', 'Roman', 1974, 5),
(11, 'Rat i mir', 'Roman', 1988, 3),
(12, 'Zlocin i kazna', 'Roman', 1977, 4),
(13, 'Idiot', 'Roman', 1955, 4),
(14, 'Orlovi rano lete', 'Roman', 1960, 11),
(15, 'Pesme iz Norveske', 'Zbirka pesama', 1988, 10),
(16, 'Alhemičar', 'Roman', 1973, 12);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `autor`
--
ALTER TABLE `autor`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `knjiga`
--
ALTER TABLE `knjiga`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_id_autor` (`id_autor`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `autor`
--
ALTER TABLE `autor`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `knjiga`
--
ALTER TABLE `knjiga`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `knjiga`
--
ALTER TABLE `knjiga`
  ADD CONSTRAINT `fk_id_autor` FOREIGN KEY (`id_autor`) REFERENCES `autor` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
