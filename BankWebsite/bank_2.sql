-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: יולי 12, 2021 בזמן 02:19 PM
-- גרסת שרת: 10.4.18-MariaDB
-- PHP Version: 8.0.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `bank 2`
--

-- --------------------------------------------------------

--
-- מבנה טבלה עבור טבלה `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(10) NOT NULL,
  `password` varchar(10) NOT NULL,
  `Email` varchar(15) DEFAULT NULL,
  `Phone_number` int(10) NOT NULL,
  `Bank_account_number` int(15) NOT NULL,
  `Amount_in_account` int(255) NOT NULL,
  `City` varchar(10) NOT NULL,
  `Address` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- הוצאת מידע עבור טבלה `users`
--

INSERT INTO `users` (`id`, `username`, `password`, `Email`, `Phone_number`, `Bank_account_number`, `Amount_in_account`, `City`, `Address`) VALUES
(8, 'test7', 'test7', 'test7@gmail.com', 547271489, 1662283, 30000, 'Ganot-Hada', 'Hzivoni 15'),
(9, 'test', '5', 'test7@gmail.com', 541326856, 1662284, 5000, '5', '5'),
(10, 'asdd', 'a1234', 'asd@gmail.com', 521475256, 1662288, 200000, 'hifa', 'asdddd'),
(11, 'oriadivi', '12345', 'ori@walla.com', 2147483647, 1662287, 2000, 'hifa', 'dfds'),
(13, 'gilad123', '1234a', 'gilad@gmail.com', 547271466, 1662285, 30000, 'hadera', 'ibn gilboa'),
(15, 'asd', '12345', 'aaa@gmail.com', 521475285, 123456, 2147483647, 'netanya', 'herzel 15      ');

--
-- Indexes for dumped tables
--

--
-- אינדקסים לטבלה `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
