-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 17, 2025 at 02:02 PM
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
-- Database: `art_gallery`
--

-- --------------------------------------------------------

--
-- Table structure for table `contact_submissions`
--

CREATE TABLE `contact_submissions` (
  `id` int(11) NOT NULL,
  `name` varchar(100) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `phone` varchar(20) DEFAULT NULL,
  `message` text DEFAULT NULL,
  `userId` int(11) DEFAULT NULL,
  `file` varchar(255) DEFAULT NULL,
  `submitted_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `contact_submissions`
--

INSERT INTO `contact_submissions` (`id`, `name`, `email`, `phone`, `message`, `userId`, `file`, `submitted_at`) VALUES
(5, 'kira', 'kira1@gmail.com', '999345768', 'erer', 13, 'No file uploaded', '2025-04-22 04:34:24'),
(6, 'PRERNA ANAND', 'prerna13anand@gmail.com', '08765136894', 'ddd', 15, '1745553998_680b0a4ee66153.96789340_Screenshot_2024-08-31_011234.png', '2025-04-25 04:06:38');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `password`) VALUES
(1, 'Harry', '$2y$10$HwHGchTnSFp3FZysf2nxyus0AtMN4WtdbpiMA2U.y3Dggq.RfURKe'),
(2, 'Prerna ', '$2y$10$nslqAFgrEjvRcBU3TxP71OJthl1PUHiWqimUgF0EO3/5OlkkyJVDm'),
(3, 'Prerna anand', '$2y$10$0K.UAFCDY0rcBIETqUNHEuVHJ3BtU4ccj59hwuzu3JcFvCZg8HiRC'),
(4, 'Garry', '$2y$10$2jSatOA2n2sp/Aliqn4ugO1VEkSyrcAdMTHOjOjCVN.2DVI044rQ2'),
(5, 'meow', '$2y$10$KExazfEZ7H1Vcn0WpbW2leMT6eQMtuqokBL2Tr2XOoPom2S/C4jOC'),
(6, 'riya', '$2y$10$5UmD/3uwaKuC3fGHzh1/KeAuTMECjvh2UXbSHl/Em9tiepbkBRwn6'),
(7, 'sam', '$2y$10$FLcN2yK8m5QEqpyXDfCUouc6PKC7pVLI.vwRT8SZBDbeSc9pr0cUu'),
(8, 'ram', '$2y$10$hgq0lDDuGD7j448kY88fAus6SYKDMqV8FK.R1OgJ84D0.PX0t6QT2'),
(9, 'lpu', '$2y$10$kVzTdzF6XhtRvRyXqTyabOLBpjabBxHw8.gD644Bi9fWKPjVW7jbG'),
(10, 'log ', '$2y$10$fMJl1I2nMTYZ7SEPvLMYHu2qi/HWNbA1OB9oa61EazIyTcXz6gKK2'),
(11, 'liza', '$2y$10$Iq6B/mTn16Z.HxKUEy7Bk.CsHmGn/KvUFtN..JPQhtGVlOsBUL4UG'),
(12, 'user', '$2y$10$lgA5Kd7aUHLc7ef7MsrD3e4.m/Wx35r3vY7NfxNRlocrHM2ePEI5y'),
(13, 'kira', '$2y$10$.pP1XpOJuRpKr0vhw.TP6O3otKc4qBi1A5uiu06VyWZMDCbPCqP/a'),
(14, 'catpreet', '$2y$10$3W0GSLEiTqdwC5xsVbEYkeXx.Kd7m3diRIyQm8zcONbi2ngjtfWIS'),
(15, 'sheetal', '$2y$10$.LwQ9Yh1VPiizGQ52zNUZu75bHNKpU7DXgN1kEwhKVSR/vD8HhNnu');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `contact_submissions`
--
ALTER TABLE `contact_submissions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_submission_user` (`userId`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `UNIQUE` (`username`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `contact_submissions`
--
ALTER TABLE `contact_submissions`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `contact_submissions`
--
ALTER TABLE `contact_submissions`
  ADD CONSTRAINT `fk_submission_user` FOREIGN KEY (`userId`) REFERENCES `users` (`id`) ON DELETE SET NULL ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
