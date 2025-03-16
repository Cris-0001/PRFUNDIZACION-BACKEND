-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 17, 2025 at 12:35 AM
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
-- Database: `tecnotec`
--

-- --------------------------------------------------------

--
-- Table structure for table `comentarios`
--

CREATE TABLE `comentarios` (
  `id` int(11) NOT NULL,
  `calificacion` text NOT NULL,
  `comentario` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `registro`
--

CREATE TABLE `registro` (
  `id` int(11) NOT NULL,
  `nombre` text NOT NULL,
  `apellidos` text NOT NULL,
  `correo` text NOT NULL,
  `contrasena` text NOT NULL,
  `fechaNacimiento` text NOT NULL,
  `telefono` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `registro`
--

INSERT INTO `registro` (`id`, `nombre`, `apellidos`, `correo`, `contrasena`, `fechaNacimiento`, `telefono`) VALUES
(1, 'Juan', 'murillo', 'juan@example.com', 'Ju@n#123', '04/11/1957', '3208467987'),
(2, 'cristhian', 'sepulveda', 'cristhian0001@hotmail.com', 'Cr1sth1@n123', '1990-11-04', '3208763449'),
(3, 'paola', 'murillo', 'dtb-pao@hotmail.com', 'Andrea', '1999-11-05', '456783654'),
(4, 'danny', 'sepulveda', 'dannysep0001@gmail.com', 'danny45789', '2025-10-17', '7894561236'),
(5, 'deyanira', 'montaño', 'deyanira@gmail.com', 'DEYANIRA', '2025-03-03', '45678946'),
(6, 'RICARDO', 'MONTAÑO', 'ricardo', 'RICARDO', '2025-03-07', '741938534'),
(7, 'edwardo', 'zapata', 'edw@gmail.com', '123456', '2025-03-04', '7894561325'),
(8, 'camilo', 'toro', 'camilo@gmail.com', '123', '2025-03-06', '3208529631');

-- --------------------------------------------------------

--
-- Table structure for table `tuopinion`
--

CREATE TABLE `tuopinion` (
  `id` int(11) NOT NULL,
  `nombre` text NOT NULL,
  `correo` text NOT NULL,
  `calificacion` text NOT NULL,
  `comentario` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `comentarios`
--
ALTER TABLE `comentarios`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `registro`
--
ALTER TABLE `registro`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tuopinion`
--
ALTER TABLE `tuopinion`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `comentarios`
--
ALTER TABLE `comentarios`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `registro`
--
ALTER TABLE `registro`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `tuopinion`
--
ALTER TABLE `tuopinion`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
