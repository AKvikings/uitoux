-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 26, 2023 at 08:38 PM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 8.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `automobile`
--

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `name`) VALUES
(1, 'Headlights & Lighting'),
(2, 'Fuels system & filters'),
(3, 'Body parts & Mirrors'),
(4, 'Interior Accessories'),
(5, 'Tires & Wheels'),
(6, 'Engine & Drivetrain'),
(7, 'Oils & Lubricants'),
(8, 'Tools & Garage');

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `category_id` int(11) NOT NULL,
  `price` decimal(10,2) NOT NULL,
  `image` varchar(255) NOT NULL,
  `rating` varchar(2) NOT NULL,
  `hot` tinyint(1) NOT NULL,
  `createdAt` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `name`, `description`, `category_id`, `price`, `image`, `rating`, `hot`, `createdAt`) VALUES
(1, 'Glossy Gray19 Aluminium Wheel AR 19', '', 5, '589.00', './assets/uploads/product-1.jpeg', '4', 0, '2023-03-26 15:18:24'),
(2, 'Twin Exhaust Pipe From Brandix Z54', '', 2, '749.00', './assets/uploads/product-2.jpeg', '4', 0, '2023-03-26 15:19:14'),
(3, 'Motor Oil ', '', 7, '23.00', './assets/uploads/product-3.jpeg', '5', 0, '2023-03-26 15:19:48'),
(4, 'Brandix Engine Block z4', '', 6, '452.00', './assets/uploads/product-4.jpeg', '0', 1, '2023-03-26 15:20:21'),
(5, 'Brandix Clutch Discs Z175', '', 5, '345.00', './assets/uploads/product-13.jpeg', '3', 0, '2023-03-26 15:21:27'),
(6, 'Brandiz Manual Five Speed', '', 6, '879.00', './assets/uploads/product-9.jpeg', '4', 0, '2023-03-26 15:22:08'),
(7, 'Set of car Floor Mats Brandix Z4', '', 4, '78.00', './assets/uploads/product-10.jpeg', '4', 0, '2023-03-26 15:22:56'),
(8, 'Headlight of Brandix', '', 1, '349.00', './assets/uploads/product-8.jpeg', '3', 0, '2023-03-26 15:24:52'),
(9, 'Taillights Brandix Z54', '', 1, '60.00', './assets/uploads/product-11.jpeg', '1', 1, '2023-03-26 15:27:06'),
(10, 'Fantastic 12-Stroke Engine With A Power of 1991 hp', '', 6, '2579.00', './assets/uploads/product-6.jpeg', '3', 0, '2023-03-26 15:27:56'),
(11, 'Set of Four 19 Inch Spiked Tires', '', 5, '327.00', './assets/uploads/product-7.jpeg', '1', 1, '2023-03-26 15:30:39');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `password`) VALUES
(1, 'admin', 'admin@exampl.com', 'e6e061838856bf47e1de730719fb2609');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`),
  ADD KEY `category_id` (`category_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `products`
--
ALTER TABLE `products`
  ADD CONSTRAINT `products_ibfk_1` FOREIGN KEY (`category_id`) REFERENCES `categories` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
