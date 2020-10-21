-- phpMyAdmin SQL Dump
-- version 4.9.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 08, 2020 at 06:01 AM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.4.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `cbi_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `brands`
--

CREATE TABLE `brands` (
  `id_brand` int(11) NOT NULL,
  `brand_name` varchar(255) NOT NULL,
  `address` varchar(255) DEFAULT NULL,
  `logo` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `brands`
--

INSERT INTO `brands` (`id_brand`, `brand_name`, `address`, `logo`) VALUES
(1, '', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `category_id` varchar(20) NOT NULL,
  `category_name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `customers`
--

CREATE TABLE `customers` (
  `id_customer` varchar(20) NOT NULL,
  `customer_name` varchar(255) NOT NULL,
  `company` varchar(255) DEFAULT NULL,
  `address` text NOT NULL,
  `email` varchar(255) DEFAULT NULL,
  `phone` varchar(20) NOT NULL,
  `whatsapp` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `employees`
--

CREATE TABLE `employees` (
  `id_employee` varchar(20) NOT NULL,
  `employee_name` varchar(255) NOT NULL,
  `nik` varchar(16) DEFAULT NULL,
  `alamat` text DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `phone` varchar(20) DEFAULT NULL,
  `whatsapp` varchar(20) DEFAULT NULL,
  `position` varchar(20) NOT NULL,
  `photo` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `employees`
--

INSERT INTO `employees` (`id_employee`, `employee_name`, `nik`, `alamat`, `email`, `phone`, `whatsapp`, `position`, `photo`) VALUES
('001', 'aghniya', '0000', 'Majalengka', 'aghniyan@gmail.com', '082214327471', '082214327471', 'programmer', 'aghniya.jpg'),
('002', 'user', NULL, NULL, NULL, NULL, NULL, '', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id_product` varchar(20) NOT NULL,
  `product_name` varchar(255) NOT NULL,
  `category_id` varchar(20) DEFAULT NULL,
  `brand_id` int(11) DEFAULT NULL,
  `type` varchar(255) DEFAULT NULL,
  `purchase_price` int(11) NOT NULL,
  `selling_price` int(11) NOT NULL,
  `info` varchar(255) DEFAULT NULL,
  `spec` text DEFAULT NULL,
  `user_id` int(11) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `product_images`
--

CREATE TABLE `product_images` (
  `id` int(11) NOT NULL,
  `product_id` varchar(20) NOT NULL,
  `file` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `product_quotations`
--

CREATE TABLE `product_quotations` (
  `no_quotation` varchar(20) NOT NULL,
  `product_id` varchar(20) NOT NULL,
  `discount` int(11) NOT NULL DEFAULT 0,
  `price` bigint(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `product_quotation_history`
--

CREATE TABLE `product_quotation_history` (
  `id_quotation_history` int(11) NOT NULL,
  `product_id` varchar(20) NOT NULL,
  `discount` int(11) NOT NULL DEFAULT 0,
  `price` bigint(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `quotations`
--

CREATE TABLE `quotations` (
  `no_quotation` varchar(20) NOT NULL,
  `customer_id` varchar(20) NOT NULL,
  `date` date NOT NULL,
  `leadtime` int(11) DEFAULT NULL,
  `referensi` varchar(255) DEFAULT NULL,
  `payment` varchar(255) DEFAULT NULL,
  `currency` varchar(255) DEFAULT NULL,
  `down_payment` bigint(20) DEFAULT NULL,
  `ppn` int(11) DEFAULT NULL,
  `payment_total` bigint(20) DEFAULT NULL,
  `payment_status` varchar(255) DEFAULT NULL,
  `status_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `quotation_history`
--

CREATE TABLE `quotation_history` (
  `id_quotation_hitory` int(11) NOT NULL,
  `no_quotation` varchar(20) DEFAULT NULL,
  `customer_id` varchar(20) DEFAULT NULL,
  `date` date DEFAULT NULL,
  `leadtime` int(11) DEFAULT NULL,
  `referensi` varchar(255) DEFAULT NULL,
  `payment` varchar(255) DEFAULT NULL,
  `currency` varchar(255) DEFAULT NULL,
  `down_payment` bigint(20) DEFAULT NULL,
  `ppn` int(11) DEFAULT NULL,
  `payment_status` varchar(255) DEFAULT NULL,
  `payment_total` bigint(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `status`
--

CREATE TABLE `status` (
  `id_status` int(11) NOT NULL,
  `status_name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `status_history`
--

CREATE TABLE `status_history` (
  `id_history_status` int(11) NOT NULL,
  `no_quotation` varchar(20) NOT NULL,
  `status_id` int(11) NOT NULL,
  `photos` varchar(255) NOT NULL,
  `info` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id_users` int(11) NOT NULL,
  `employee_id` varchar(20) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `level` varchar(20) NOT NULL,
  `status` varchar(1) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id_users`, `employee_id`, `username`, `password`, `level`, `status`) VALUES
(1, '001', 'aghniyan', 'd033e22ae348aeb5660fc2140aec35850c4da997', 'admin', '1'),
(2, '002', 'user', '12dea96fec20593566ab75692c9949596833adc9', 'user', '0');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `brands`
--
ALTER TABLE `brands`
  ADD PRIMARY KEY (`id_brand`);

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`category_id`);

--
-- Indexes for table `customers`
--
ALTER TABLE `customers`
  ADD PRIMARY KEY (`id_customer`);

--
-- Indexes for table `employees`
--
ALTER TABLE `employees`
  ADD PRIMARY KEY (`id_employee`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id_product`),
  ADD KEY `category_id` (`category_id`),
  ADD KEY `brand_id` (`brand_id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `product_images`
--
ALTER TABLE `product_images`
  ADD PRIMARY KEY (`id`),
  ADD KEY `product_id` (`product_id`);

--
-- Indexes for table `product_quotations`
--
ALTER TABLE `product_quotations`
  ADD KEY `no_quotation` (`no_quotation`),
  ADD KEY `product_id` (`product_id`);

--
-- Indexes for table `product_quotation_history`
--
ALTER TABLE `product_quotation_history`
  ADD KEY `id_quotation_history` (`id_quotation_history`),
  ADD KEY `product_id` (`product_id`);

--
-- Indexes for table `quotations`
--
ALTER TABLE `quotations`
  ADD PRIMARY KEY (`no_quotation`),
  ADD KEY `customer_id` (`customer_id`),
  ADD KEY `status_id` (`status_id`);

--
-- Indexes for table `quotation_history`
--
ALTER TABLE `quotation_history`
  ADD PRIMARY KEY (`id_quotation_hitory`),
  ADD KEY `no_quotation` (`no_quotation`),
  ADD KEY `customer_id` (`customer_id`);

--
-- Indexes for table `status`
--
ALTER TABLE `status`
  ADD PRIMARY KEY (`id_status`);

--
-- Indexes for table `status_history`
--
ALTER TABLE `status_history`
  ADD PRIMARY KEY (`id_history_status`),
  ADD KEY `no_quotation` (`no_quotation`),
  ADD KEY `status_id` (`status_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id_users`),
  ADD KEY `employee_id` (`employee_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `brands`
--
ALTER TABLE `brands`
  MODIFY `id_brand` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `product_images`
--
ALTER TABLE `product_images`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `quotation_history`
--
ALTER TABLE `quotation_history`
  MODIFY `id_quotation_hitory` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `status`
--
ALTER TABLE `status`
  MODIFY `id_status` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `status_history`
--
ALTER TABLE `status_history`
  MODIFY `id_history_status` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id_users` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `products`
--
ALTER TABLE `products`
  ADD CONSTRAINT `products_ibfk_1` FOREIGN KEY (`category_id`) REFERENCES `category` (`category_id`),
  ADD CONSTRAINT `products_ibfk_2` FOREIGN KEY (`brand_id`) REFERENCES `brands` (`id_brand`),
  ADD CONSTRAINT `products_ibfk_3` FOREIGN KEY (`user_id`) REFERENCES `users` (`id_users`);

--
-- Constraints for table `product_images`
--
ALTER TABLE `product_images`
  ADD CONSTRAINT `product_images_ibfk_1` FOREIGN KEY (`product_id`) REFERENCES `products` (`id_product`);

--
-- Constraints for table `product_quotations`
--
ALTER TABLE `product_quotations`
  ADD CONSTRAINT `product_quotations_ibfk_1` FOREIGN KEY (`no_quotation`) REFERENCES `quotations` (`no_quotation`),
  ADD CONSTRAINT `product_quotations_ibfk_2` FOREIGN KEY (`product_id`) REFERENCES `products` (`id_product`);

--
-- Constraints for table `product_quotation_history`
--
ALTER TABLE `product_quotation_history`
  ADD CONSTRAINT `product_quotation_history_ibfk_1` FOREIGN KEY (`id_quotation_history`) REFERENCES `quotation_history` (`id_quotation_hitory`),
  ADD CONSTRAINT `product_quotation_history_ibfk_2` FOREIGN KEY (`product_id`) REFERENCES `products` (`id_product`);

--
-- Constraints for table `quotations`
--
ALTER TABLE `quotations`
  ADD CONSTRAINT `quotations_ibfk_1` FOREIGN KEY (`customer_id`) REFERENCES `customers` (`id_customer`),
  ADD CONSTRAINT `quotations_ibfk_2` FOREIGN KEY (`status_id`) REFERENCES `status` (`id_status`);

--
-- Constraints for table `quotation_history`
--
ALTER TABLE `quotation_history`
  ADD CONSTRAINT `quotation_history_ibfk_1` FOREIGN KEY (`no_quotation`) REFERENCES `quotations` (`no_quotation`),
  ADD CONSTRAINT `quotation_history_ibfk_2` FOREIGN KEY (`customer_id`) REFERENCES `customers` (`id_customer`);

--
-- Constraints for table `status_history`
--
ALTER TABLE `status_history`
  ADD CONSTRAINT `status_history_ibfk_1` FOREIGN KEY (`no_quotation`) REFERENCES `quotations` (`no_quotation`),
  ADD CONSTRAINT `status_history_ibfk_2` FOREIGN KEY (`status_id`) REFERENCES `status` (`id_status`);

--
-- Constraints for table `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `users_ibfk_1` FOREIGN KEY (`employee_id`) REFERENCES `employees` (`id_employee`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
