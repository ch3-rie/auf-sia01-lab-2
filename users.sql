-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 13, 2026 at 07:25 PM
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
-- Database: `sia_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `email` varchar(100) NOT NULL,
  `username` varchar(50) NOT NULL,
  `passwd` varchar(255) NOT NULL,
  `fullname` varchar(50) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `email`, `username`, `passwd`, `fullname`, `created_at`) VALUES
(3, 'sgs@gmail.com', 'itsseansantos', '$2y$10$UssnwCk3fWMzqHXs1z4OP.RcI8MecwUhVgeaFVZSSGw1WyEL5G4IK', 'Sean Santos', '2026-01-13 17:01:33'),
(4, 'paladin.mike@gmail.com', 'paladin_mike', '$2y$10$5Ue1b6JRyQnKXMvzvzn2M.kn0GI8xtCM6cSzP8iyJVNOgFdHccuIG', 'Mike Wheeler', '2026-01-13 17:01:57'),
(5, 'eggo11@gmail.com', 'eggo11', '$2y$10$HYunINe4XlQRBHN.Z6.ah.oODIx2y/fThwrHokdZ9r11J8swRWQAG', 'Jane Hopper', '2026-01-13 17:02:24'),
(6, 'dusty.bun@gmail.com', 'dusty_bun', '$2y$10$mldV6E30cMDQNW.WJubNaOFoAYFBRJExPjLbu59ZgUJo5QvRNHFPq', 'Dustin Henderson', '2026-01-13 17:02:45'),
(8, 'wise.will@gmail.com', 'wise_will', '$2y$10$FSMq2i3SsB/by6H3YUNioOMkHGnvF92w4ueDePqkIfDjoPAO9Y3WW', 'Will Byers', '2026-01-13 17:03:38'),
(9, 'madmax_sk8@gmail.com', 'madmax.sk8', '$2y$10$9a6AQoZKPZ0grBu8qWfX.u1nhOkt7mKtjqf1u9F8MhPCSRfaQ.4N2', 'Max Mayfield', '2026-01-13 17:04:10'),
(10, 'scoops.robin@gmail.com', 'scoops_ahoy_r', '$2y$10$zQG3nioDgcmMmn6/NiFuHeOkgVxmyh/6snSdr4Q.uhHqoAGzzinRq', 'Robin Buckley', '2026-01-13 17:06:16'),
(12, 'nancy.investigates@gmail.com', 'nancy.notes', '$2y$10$rz27c8/pIIIK2YY0ZBZGxeqffk0NGAUeXQqX/pADcBaylgtqHymqi', 'Nancy Wheeler', '2026-01-13 17:07:08'),
(13, 'photo.jon@gmail.com', 'photo.jon', '$2y$10$p3QPpJdfSZ.6QYpTB9iiG.fq1H5JkKY49wVkPWSiRdBf37ldPHeRK', 'Jonathan Byers', '2026-01-13 17:07:38'),
(14, 'creel.henry@gmail.com', 'mrwhatsit', '$2y$10$PjKAPQdDj9ixwIb.j45Cw.pMbw7l3juGZjPazL8e.G5cl011gVVdm', 'Henry Creel', '2026-01-13 17:35:26');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`),
  ADD UNIQUE KEY `username` (`username`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
