-- phpMyAdmin SQL Dump
-- version 5.2.2
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Nov 04, 2025 at 01:51 AM
-- Server version: 10.6.23-MariaDB-cll-lve
-- PHP Version: 8.3.25

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `michelleylee_example`
--

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` int(11) NOT NULL,
  `name` varchar(64) NOT NULL,
  `price` decimal(65,0) NOT NULL,
  `category` varchar(32) NOT NULL,
  `date_create` datetime NOT NULL,
  `date_modify` datetime NOT NULL,
  `description` text NOT NULL,
  `images` varchar(256) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `name`, `price`, `category`, `date_create`, `date_modify`, `description`, `images`) VALUES
(1, 'Pearl Earrings #1', 100, 'earrings', '2025-11-04 00:48:02', '0000-00-00 00:00:00', 'These elegant pearl earrings feature a soft, classic shine. Perfect for adding a timeless touch to your everyday or formal look.', 'earring1.jpg'),
(2, 'Pearl Earrings #2', 120, 'earrings', '2025-11-04 00:48:49', '0000-00-00 00:00:00', 'Polished white pearls meet a sleek, modern setting. A versatile accessory that pairs beautifully with any outfit.', 'earring2.jpg'),
(3, 'Pink Pearl Earrings', 135, 'earrings', '2025-11-04 00:49:38', '0000-00-00 00:00:00', 'Soft pink pearls radiate warmth and femininity. They bring a subtle pop of color and refined charm to your style.', 'earring3.jpg'),
(4, 'Black Pearl Earrings', 150, 'earrings', '2025-11-04 00:49:47', '0000-00-00 00:00:00', 'Bold black pearls create a striking and modern statement. Perfect for elegant evenings or confident daytime looks.v', 'earring4.jpg'),
(5, 'Pearl Ring #1', 75, 'ring', '2025-11-04 00:49:51', '0000-00-00 00:00:00', 'A classic pearl rests on a polished silver band. Simple, sophisticated, and endlessly wearable.', 'ring1.jpg'),
(6, 'Pearl Ring #2', 150, 'ring', '2025-11-04 00:49:55', '0000-00-00 00:00:00', 'A single radiant pearl rests atop a golden band. Simple yet striking, it embodies modern elegance and classic grace.', 'ring2.jpg'),
(7, 'Pink Pearl Ring', 175, 'ring', '2025-11-04 00:49:58', '0000-00-00 00:00:00', 'A blush-toned pearl adds romantic elegance to this gold ring. Ideal for those who love soft, graceful tones.', 'ring3.jpg'),
(8, 'Black Pearl Ring', 200, 'ring', '2025-11-04 00:50:01', '0000-00-00 00:00:00', 'This stunning ring features a lustrous black pearl on a sleek band. A bold design made for statement moments.', 'ring4.jpg'),
(9, 'Pearl Necklace #1', 120, 'necklace', '2025-11-04 00:50:04', '0000-00-00 00:00:00', 'A single radiant pearl rests atop a golden band. Simple yet striking, it embodies modern elegance and classic grace.', 'necklace1.jpg'),
(10, 'Pearl Necklace #2', 250, 'necklace', '2025-11-04 00:50:07', '0000-00-00 00:00:00', 'Layers of luminous pearls create depth and luxury. A true heirloom piece for moments that matter most.', 'necklace2.jpg'),
(11, 'Pink Pearl Necklace', 125, 'necklace', '2025-11-04 00:50:10', '0000-00-00 00:00:00', 'Delicate pink pearls bring a gentle glow to any look. A graceful statement of femininity and charm.', 'necklace3.jpg'),
(12, 'Black Pearl Necklace', 175, 'necklace', '2025-11-04 00:50:12', '0000-00-00 00:00:00', 'Dark, glossy pearls capture light with mystery and allure. The perfect blend of strength and sophistication.', 'necklace4.jpg');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
