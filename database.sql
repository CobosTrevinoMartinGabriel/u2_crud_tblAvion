-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 25, 2021 at 08:05 AM
-- Server version: 10.4.17-MariaDB
-- PHP Version: 8.0.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `Volaris`
--

-- --------------------------------------------------------

--
-- Table structure for table `Avion`
--

CREATE TABLE `avion` (
  `idAvion` int(50) NOT NULL,
  `idVuelo` int(50) NOT NULL,
  `CapacidadCombus` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `emisionCarbono` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nAsientos` int(50) NOT NULL,
  `AeropuertoActual` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `Velocidad` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `Pantallas` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `mahasiswa`
--

INSERT INTO `mahasiswa` (`id`, `nama`, `NIM`, `jenis_kelamin`, `jurusan`, `agama`, `IPK`) VALUES
(1, 'John Smith', '123', 'Laki-Laki', 'Ilmu Komputer', 'Hindu', 3.9);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `mahasiswa`
--
--
ALTER TABLE `avion`
  ADD PRIMARY KEY (`idAvion`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `avion`
--
ALTER TABLE `avion`
  MODIFY `idAvion` int(50) NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
