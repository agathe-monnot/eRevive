-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Feb 18, 2022 at 11:24 AM
-- Server version: 5.7.24
-- PHP Version: 8.0.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `erevive`
--

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `prod_id` int(11) NOT NULL,
  `name` varchar(50) DEFAULT NULL,
  `brand` varchar(30) DEFAULT NULL,
  `prod_condition` varchar(50) DEFAULT NULL,
  `age` varchar(30) DEFAULT NULL,
  `description` varchar(1000) DEFAULT NULL,
  `image` varchar(80) DEFAULT NULL,
  `price` decimal(10,2) DEFAULT NULL,
  `user_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`prod_id`, `name`, `brand`, `prod_condition`, `age`, `description`, `image`, `price`, `user_id`) VALUES
(1, 'Professional mixing table', 'Pioneer', 'Like new', 'Less than 6 months', 'Compact and lightweight music table. Compatible with mobile phone or computer (PC and Mac). Supported by most mixing software. Used a couple times at family events. Will be delivered in its original box.', 'uploaded_img/product_01.jpg', '120.00', 1),
(2, 'Apple airpods', 'Apple', 'Good', 'Less than 1 year', 'Wireless Apple headphones. Coming with charging case (non pictured). Original price was £120.', 'uploaded_img/product_02.jpg', '60.00', 2),
(3, 'Wireless keyboard', 'Logitech', 'Usual wear', '2 years', 'Wireless Logitech keyboards. Usual wear on certain keys but letters are all readable. Will be delivered in original box with instruction leaflet.', 'uploaded_img/product_03.jpg', '35.00', 1),
(4, 'Canon DSLR camera', 'Canon', 'Usual wear', 'More than 2 years', 'Canon EOS T3i Rebel camera, comes  with a 50mm f1:2 lense. A few scratches on the body due to intensive use, but lense is in perfect condition.\r\nComes with a leather case, spare battery and charger. SD card not included.', 'uploaded_img/product_04.jpg', '150.00', 2),
(28, 'MacBook Pro', 'Apple', 'Good', 'More than 2 years', '13-inch MacBook Pro. Its 8‑core CPU rips through complex workflows and heavy workloads, with up to 2.8x faster processing performance than the previous generation. Used daily but completely cleaned. Will come with a soft computer case.', 'uploaded_img/product_05.jpg', '150.00', 2),
(29, 'Bose Bluetooth headphones ', 'Bose', 'Usual wear', 'Less than 1 year', 'Bose Noise Cancelling Headphones 700 UC. Wireless, connects with Bluetooth. Six mics work together to cancel the noise around you so you can hear the caller better, while four mics combine to improve the clarity of your voice so the caller can hear you better.', 'uploaded_img/product_27.jpg', '110.00', 2),
(30, 'Dell XPS 13 Laptop', 'Dell', 'Good', '2 years', 'Dell XPS 13 inch laptop, bought in 2020. Used to work from home, has not been transported around so looks like new. Processor : 11th Generation Intel® Core™ i5-1135G7 Processor / Graphics Card: Intel® Iris Xe Graphics / Display : 13.3\" FHD (1920 x 1080)/ Memory : 8GB 4267MHz LPDDR4x / Hard Drive : 256GB M.2 PCIe NVMe Solid State Drive. ', 'uploaded_img/product_07.jpg', '450.00', 1),
(31, 'iPad Pro 13\'\' tablet', 'Apple', 'Like new', 'Less than 1 year', 'iPad pro, 12.9-inch display. Screen protector on so screen has no scratch or mark.\r\nUsed less than a year. Apple pen NOT INCLUDED but will be delivered with protective case (black).', 'uploaded_img/product_10.jpg', '500.00', 2),
(32, 'Wired Dell keyboard', 'Dell', 'Poor', 'More than 2 years', 'Wired Dell keyboard. Used for about 7 years. Some keys are a bit erased and the original white is a bit yellow form use and from the sun light. Works perfectly otherwise.', 'uploaded_img/product_12.jpg', '15.00', 1),
(33, 'Sony TV 48\'\'', 'Sony', 'Good', 'Less than 1 year', 'Sony Bravia 48\'\' with HDR Dolby Vision / HDR10 / Hybrid Log-Gamma (HLG). Simple minimalist design. Smart TV (you can watch Netflix, Disney+, YouTube...) Very good condition. Selling because moving to another country. ', 'uploaded_img/product_15.jpg', '450.00', 2),
(34, 'PS3 vintage console', 'Sony', 'Poor', 'More than 2 years', 'PlayStation 3 bought in 2006. Vintage collection item. Works fine but quite dusty and has scratches/wear. Comes with 2 controllers. Games bundle available separately.', 'uploaded_img/product_18.jpg', '50.00', 1),
(35, 'iPhone X', 'Apple', 'Usual wear', 'More than 2 years', 'Silver iPhone X 64GB. 4G, nano sim card, resolution 2436 x 1125 pixels. Quite good condition, a few scratches on the body but none on either lenses (front and back). Colour is silver. Comes with original Apple charger. ', 'uploaded_img/product_22.jpg', '200.00', 1),
(36, 'Nikon D7500 DSLR', 'Nikon', 'Good', 'More than 2 years', 'Powerful and fully connected, the D7500 offers a level of performance that overcomes the most challenging conditions. Used professionally for a few years but kept in perfect condition. Comes with 18-140mm lense.', 'uploaded_img/product_20.jpg', '300.00', 2),
(37, 'iPhone 11', 'Apple', 'Poor', 'More than 2 years', 'iPhone 11, graphite colour. Screen is cracked and needs replaced. Functions correctly otherwise. Usual wear on the body. 4G / camera both work. Comes with non branded charger bought on Amazon.', 'uploaded_img/product_23.jpg', '90.00', 1),
(38, 'Nikon camera lens', 'Nikon', 'Good', '2 years', 'Nikon camera lense 18-55mm, f1:3,5-5.6. Good condition, no scratches on the lense. Perfect for packshot/still life shooting. Compatible with Nikon camera or others using and mount adaptator.', 'uploaded_img/product_26.jpg', '110.00', 2),
(39, 'iPad 7', 'Apple', 'Usual wear', 'More than 2 years', 'iPad 7, silver, bought in 2011. Not the fastest anymore but works fine for watching Netflix or browse the internet. Not compatible with Apple pen or Procreate. Kept in a case so the screen is in very good condition. Scratches on the back.', 'uploaded_img/product_24.jpg', '80.00', 1);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `user_id` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `email` varchar(80) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `username`, `email`, `password`) VALUES
(1, 'agathemonnot', 'agathe-monnot@hotmail.fr', '5389daf846c5499b45b205d62e49ac9c'),
(2, 'username', 'username@username.com', 'e4912b56d06c0e67857d8592ec938118'),
(12, 'try', 'agathe-monnot@hotmail.fr', '94d8a61a265f2da8235b67501df60494');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`prod_id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `prod_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=40;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `products`
--
ALTER TABLE `products`
  ADD CONSTRAINT `products_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`user_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
