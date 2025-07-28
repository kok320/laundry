-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 28, 2025 at 08:44 AM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.0.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_laundry`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(11) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `id_laundry` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL,
  `email` varchar(100) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `nama`, `id_laundry`, `password`, `email`, `created_at`, `updated_at`) VALUES
(1, 'Admin Utama', 'LDRY001', '$2y$10$ATBwSFGhgTLd6GXCQS9DI.Y1wfIdcBsuV.r7zBK9fE1EkzhP2E9XG', 'admin@laundry.com', '2025-07-24 12:37:24', '2025-07-28 04:46:31');

-- --------------------------------------------------------

--
-- Table structure for table `staff`
--

CREATE TABLE `staff` (
  `id` int(11) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `id_laundry` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL,
  `email` varchar(100) NOT NULL,
  `no_hp` varchar(20) DEFAULT NULL,
  `level` enum('Admin','Pengunjung') NOT NULL DEFAULT 'Pengunjung',
  `alamat` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `staff`
--

INSERT INTO `staff` (`id`, `nama`, `id_laundry`, `password`, `email`, `no_hp`, `level`, `alamat`) VALUES
(1, 'Rina Setiawan', 'LDRY002', '$2y$10$.rBw.gJpaOYKHSNtFg/EkeyllSP3WKX.63ZGildGX/ZczPMvGNsXS', 'rina@laundry.com', '081234567890', 'Pengunjung', 'Jl. Melati No. 12, Bandung'),
(2, 'Budi Hartono', 'LDRY003', '$2y$10$ZThdOuw.VgPVxDLAKLMO5eh561v6SE1QBRMAPGBw/bB738GDUI8Yi', 'budi@laundry.com', '082233445566', 'Pengunjung', 'Jl. Anggrek No. 7, Bandung'),
(4, 'faiz', 'ST001', '$2y$10$RlruseWb/1ZlX/KRezvBWu0XgNSf/3rnGEglRqVWD5MC7oQIlSkl2', 'faizsakri101@gmail.com', '08123456782345', 'Pengunjung', 'jln.utr6e5wrtrdtrdyttreeseserewq'),
(5, 'koko', 'ST002', '$2y$10$TY6fWSUR2bayiHNhqLw.AelwllxZti/zXb7RMB/QB5bUym3YELOw6', 'koko@gmail.com', '08134567876', 'Pengunjung', 'jln.rertsreutftrdxy');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `id_laundry` (`id_laundry`);

--
-- Indexes for table `staff`
--
ALTER TABLE `staff`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `staff`
--
ALTER TABLE `staff`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
