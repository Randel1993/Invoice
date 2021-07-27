-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 27, 2021 at 09:15 AM
-- Server version: 10.4.20-MariaDB
-- PHP Version: 8.0.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_crud`
--

-- --------------------------------------------------------

--
-- Table structure for table `customer`
--

CREATE TABLE `customer` (
  `customer_id` int(11) NOT NULL,
  `customer_name` varchar(100) NOT NULL DEFAULT 'Customer'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `customer`
--

INSERT INTO `customer` (`customer_id`, `customer_name`) VALUES
(1, 'Juan Dela Cruz'),
(2, 'Tom Villareal');

-- --------------------------------------------------------

--
-- Table structure for table `invoice`
--

CREATE TABLE `invoice` (
  `invoice_code` int(11) NOT NULL,
  `customer_id` int(11) NOT NULL,
  `date_created` date NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `order_detail`
--

CREATE TABLE `order_detail` (
  `invoice_code` int(11) NOT NULL,
  `product_code` varchar(15) NOT NULL,
  `quantity` int(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

CREATE TABLE `product` (
  `product_code` varchar(15) NOT NULL,
  `product_name` varchar(100) DEFAULT NULL,
  `product_price` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`product_code`, `product_name`, `product_price`) VALUES
('product1', '36-pack AA Battery', 750),
('product2', 'Energizer A27 1-pack 12V Alkaline Battery', 95),
('product3', 'Firefly 3-Pack 11W LED Light Bulb', 320),
('product4', 'Omni 6-Gang Extension Cord WED-360', 750),
('product5', 'Omni WS 2pcs. 1-Way Switch with White Plate', 150);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL COMMENT 'Primary Key',
  `first_name` varchar(100) NOT NULL COMMENT 'First Name',
  `last_name` varchar(100) NOT NULL COMMENT 'Last Name',
  `user_name` varchar(100) NOT NULL COMMENT 'Last Name',
  `email` varchar(255) NOT NULL COMMENT 'Email Address',
  `password` varchar(255) NOT NULL COMMENT 'Password',
  `address` text NOT NULL,
  `dob` varchar(15) NOT NULL COMMENT 'Date Of Birth',
  `contact_no` varchar(16) NOT NULL COMMENT 'Contact No',
  `url` int(255) DEFAULT NULL,
  `verification_code` varchar(255) NOT NULL COMMENT 'verification Code',
  `created_date` varchar(12) NOT NULL COMMENT 'created timestamp',
  `modified_date` varchar(12) NOT NULL COMMENT 'modified timestamp',
  `status` char(1) NOT NULL COMMENT '0=pending, 1=active, 2=delete'
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COMMENT='datatable demo table';

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `first_name`, `last_name`, `user_name`, `email`, `password`, `address`, `dob`, `contact_no`, `url`, `verification_code`, `created_date`, `modified_date`, `status`) VALUES
(3, 'Admin', 'Admin', 'adminadmin', 'admin@gmail.com', '$2y$10$o/zGAwxFFlbiCVayQnRunOy3tuPKt24xG4N8lYiO7ruQetX2ZM9FK', '1111', '01-02-1994', '0906457851', NULL, '1', '1627370067', '1627370067', '1'),
(4, 'user', 'user', 'useruser', 'user@gmail.com', '$2y$10$Gz8NynuVt6R5bOCsHbe9GOuT2IiR4h9CF5zlz926pBjQa9Sgc0fiy', '11', '01-02-1994', '0906457851', NULL, '1', '1627370094', '1627370094', '1');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `customer`
--
ALTER TABLE `customer`
  ADD PRIMARY KEY (`customer_id`);

--
-- Indexes for table `invoice`
--
ALTER TABLE `invoice`
  ADD PRIMARY KEY (`invoice_code`),
  ADD KEY `invoice_cust_fk` (`customer_id`);

--
-- Indexes for table `order_detail`
--
ALTER TABLE `order_detail`
  ADD KEY `detail_invoice_fk` (`invoice_code`),
  ADD KEY `detail_product_fk` (`product_code`);

--
-- Indexes for table `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`product_code`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `customer`
--
ALTER TABLE `customer`
  MODIFY `customer_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `invoice`
--
ALTER TABLE `invoice`
  MODIFY `invoice_code` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'Primary Key', AUTO_INCREMENT=5;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `invoice`
--
ALTER TABLE `invoice`
  ADD CONSTRAINT `invoice_cust_fk` FOREIGN KEY (`customer_id`) REFERENCES `customer` (`customer_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `order_detail`
--
ALTER TABLE `order_detail`
  ADD CONSTRAINT `detail_invoice_fk` FOREIGN KEY (`invoice_code`) REFERENCES `invoice` (`invoice_code`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `detail_product_fk` FOREIGN KEY (`product_code`) REFERENCES `product` (`product_code`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
