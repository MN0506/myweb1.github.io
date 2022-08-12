-- phpMyAdmin SQL Dump
-- version 4.8.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 27, 2019 at 08:37 AM
-- Server version: 10.1.34-MariaDB
-- PHP Version: 7.2.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `agri_business`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin_details`
--

CREATE TABLE `admin_details` (
  `ad_id` int(11) NOT NULL,
  `ad_name` varchar(100) NOT NULL,
  `ad_contact` bigint(20) NOT NULL,
  `ad_email_id` varchar(100) NOT NULL,
  `ad_address` text NOT NULL,
  `ad_username` varchar(100) NOT NULL,
  `ad_password` varchar(100) NOT NULL,
  `ad_date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin_details`
--

INSERT INTO `admin_details` (`ad_id`, `ad_name`, `ad_contact`, `ad_email_id`, `ad_address`, `ad_username`, `ad_password`, `ad_date`) VALUES
(7, 'anusha', 9620180073, 'anusha1996@gmail.com', 'ayyappa nagar', 'anusha', 'QW51czEyM3No', '2019-04-17'),
(8, 'anusha', 9620180073, 'anusha1996@gmail.com', 'ayyappa nagar', 'anusha', 'QW51c2hhU3VyZXNoMTk5Ng==', '2019-04-20');

-- --------------------------------------------------------

--
-- Table structure for table `customer_details`
--

CREATE TABLE `customer_details` (
  `cd_id` int(11) NOT NULL,
  `cd_name` varchar(100) NOT NULL,
  `cd_contact` bigint(20) NOT NULL,
  `cd_email_id` varchar(100) NOT NULL,
  `cd_address` text NOT NULL,
  `cd_username` varchar(100) NOT NULL,
  `cd_password` varchar(100) NOT NULL,
  `cd_date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `customer_details`
--

INSERT INTO `customer_details` (`cd_id`, `cd_name`, `cd_contact`, `cd_email_id`, `cd_address`, `cd_username`, `cd_password`, `cd_date`) VALUES
(2, 'lel', 9620180079, 'anusha@gmail.com', 'fsf', 'anu', 'ygluiy', '2019-04-13'),
(3, 'lel', 9620180079, 'anusha@gmail.com', 'fsf', 'anu', 'ygluiy', '2019-04-13'),
(4, 'vijay', 7412589632, 'vijay@gmail.com', 'ytdydj', 'dsffgvb', '', '0000-00-00'),
(5, 'anusha', 9632587412, 'anusha@gmail.com', 'ayyappa nagar', 'dsffgvb', '', '0000-00-00');

-- --------------------------------------------------------

--
-- Table structure for table `customer_invoice`
--

CREATE TABLE `customer_invoice` (
  `ci_id` int(11) NOT NULL,
  `cd_id` int(11) NOT NULL,
  `ci_order_no` int(11) NOT NULL,
  `ci_shipping_address` text NOT NULL,
  `ci_landmark` text NOT NULL,
  `ci_delivery_charges` float NOT NULL,
  `ci_contact_no` bigint(20) NOT NULL,
  `ci_date` date NOT NULL,
  `ci_payment_mode` text NOT NULL,
  `ci_transaction_no` int(11) NOT NULL,
  `ci_total_price` float NOT NULL,
  `ci_cgst_percent` float NOT NULL,
  `ci_cgst` float NOT NULL,
  `ci_sgst_percent` float NOT NULL,
  `ci_sgst` float NOT NULL,
  `ci_sub_total` float NOT NULL,
  `ci_status` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `dealers_details`
--

CREATE TABLE `dealers_details` (
  `dd_id` int(11) NOT NULL,
  `dd_name` varchar(100) NOT NULL,
  `dd_contact` bigint(20) NOT NULL,
  `dd_address` text NOT NULL,
  `dd_date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `dealers_details`
--

INSERT INTO `dealers_details` (`dd_id`, `dd_name`, `dd_contact`, `dd_address`, `dd_date`) VALUES
(2, '', 0, '', '0000-00-00'),
(3, 'suma', 7896541232, 'jgdyt', '0000-00-00'),
(4, 'anusha', 9632587412, 'gfe5yeygf', '0000-00-00'),
(5, 'anusha', 9620180079, 'gugd656d', '2019-04-13');

-- --------------------------------------------------------

--
-- Table structure for table `dealers_purchase_details`
--

CREATE TABLE `dealers_purchase_details` (
  `dpd_id` int(11) NOT NULL,
  `dd_id` int(11) NOT NULL,
  `pc_id` int(11) NOT NULL,
  `dpd_name` varchar(100) NOT NULL,
  `dpd_quantity` int(11) NOT NULL,
  `dpd_amount_paid` float NOT NULL,
  `dpd_date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `dealers_purchase_details`
--

INSERT INTO `dealers_purchase_details` (`dpd_id`, `dd_id`, `pc_id`, `dpd_name`, `dpd_quantity`, `dpd_amount_paid`, `dpd_date`) VALUES
(2, 4, 3, 'dfvsv', 22, 58, '2019-04-10');

-- --------------------------------------------------------

--
-- Table structure for table `extra_charges`
--

CREATE TABLE `extra_charges` (
  `ec_id` int(11) NOT NULL,
  `ec_cgst` float NOT NULL,
  `ec_sgst` float NOT NULL,
  `ec_minimum_amount` float NOT NULL,
  `ec_delivery_charges` float NOT NULL,
  `ec_min_stock_qty` int(11) NOT NULL,
  `ec_max_stock_qty` int(11) NOT NULL,
  `ec_date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `extra_charges`
--

INSERT INTO `extra_charges` (`ec_id`, `ec_cgst`, `ec_sgst`, `ec_minimum_amount`, `ec_delivery_charges`, `ec_min_stock_qty`, `ec_max_stock_qty`, `ec_date`) VALUES
(2, 96, 78, 5435, 23, 52, 56, '2019-04-14');

-- --------------------------------------------------------

--
-- Table structure for table `product_cart_details`
--

CREATE TABLE `product_cart_details` (
  `pcd_id` int(11) NOT NULL,
  `cd_id` int(11) NOT NULL,
  `pd_id` int(11) NOT NULL,
  `pcd_name` varchar(100) NOT NULL,
  `pcd_quantity` int(11) NOT NULL,
  `pcd_unitprice` float NOT NULL,
  `pcd_total` float NOT NULL,
  `pcd_order_no` int(11) NOT NULL,
  `pcd_order_date` date NOT NULL,
  `pcd_status` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `product_category`
--

CREATE TABLE `product_category` (
  `pc_id` int(11) NOT NULL,
  `pc_name` varchar(100) NOT NULL,
  `pc_date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `product_category`
--

INSERT INTO `product_category` (`pc_id`, `pc_name`, `pc_date`) VALUES
(2, 'crop', '2019-04-13'),
(3, 'anusha', '2019-04-13'),
(4, 'goods', '2019-04-15'),
(5, 'sds', '2019-04-15');

-- --------------------------------------------------------

--
-- Table structure for table `product_details`
--

CREATE TABLE `product_details` (
  `pd_id` int(11) NOT NULL,
  `pc_id` int(11) NOT NULL,
  `dd_id` int(11) NOT NULL,
  `pd_name` varchar(100) NOT NULL,
  `pd_image1` varchar(100) NOT NULL,
  `pd_image2` varchar(100) NOT NULL,
  `pd_description` text NOT NULL,
  `pd_date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `product_details`
--

INSERT INTO `product_details` (`pd_id`, `pc_id`, `dd_id`, `pd_name`, `pd_image1`, `pd_image2`, `pd_description`, `pd_date`) VALUES
(10, 3, 3, 'hgiy', 'IMG_750713827.png', 'IMG_1426440102.jpg', 'dxd', '2019-04-16');

-- --------------------------------------------------------

--
-- Table structure for table `stock_details`
--

CREATE TABLE `stock_details` (
  `sd_id` int(11) NOT NULL,
  `pd_id` int(11) NOT NULL,
  `sd_quantity` int(11) NOT NULL,
  `sd_unitprice` float NOT NULL,
  `sd_discount` float NOT NULL,
  `sd_date` date NOT NULL,
  `sd_status` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `stock_details`
--

INSERT INTO `stock_details` (`sd_id`, `pd_id`, `sd_quantity`, `sd_unitprice`, `sd_discount`, `sd_date`, `sd_status`) VALUES
(1, 5, 45, 45, 24, '2019-04-12', 'ij'),
(2, 1, 48, 45, 4534, '2019-04-13', 'ksjfo'),
(3, 10, 48, 45, 24, '2019-04-17', 'ij');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin_details`
--
ALTER TABLE `admin_details`
  ADD PRIMARY KEY (`ad_id`);

--
-- Indexes for table `customer_details`
--
ALTER TABLE `customer_details`
  ADD PRIMARY KEY (`cd_id`);

--
-- Indexes for table `customer_invoice`
--
ALTER TABLE `customer_invoice`
  ADD PRIMARY KEY (`ci_id`);

--
-- Indexes for table `dealers_details`
--
ALTER TABLE `dealers_details`
  ADD PRIMARY KEY (`dd_id`);

--
-- Indexes for table `dealers_purchase_details`
--
ALTER TABLE `dealers_purchase_details`
  ADD PRIMARY KEY (`dpd_id`);

--
-- Indexes for table `extra_charges`
--
ALTER TABLE `extra_charges`
  ADD PRIMARY KEY (`ec_id`);

--
-- Indexes for table `product_cart_details`
--
ALTER TABLE `product_cart_details`
  ADD PRIMARY KEY (`pcd_id`);

--
-- Indexes for table `product_category`
--
ALTER TABLE `product_category`
  ADD PRIMARY KEY (`pc_id`);

--
-- Indexes for table `product_details`
--
ALTER TABLE `product_details`
  ADD PRIMARY KEY (`pd_id`);

--
-- Indexes for table `stock_details`
--
ALTER TABLE `stock_details`
  ADD PRIMARY KEY (`sd_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin_details`
--
ALTER TABLE `admin_details`
  MODIFY `ad_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `customer_details`
--
ALTER TABLE `customer_details`
  MODIFY `cd_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `customer_invoice`
--
ALTER TABLE `customer_invoice`
  MODIFY `ci_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `dealers_details`
--
ALTER TABLE `dealers_details`
  MODIFY `dd_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `dealers_purchase_details`
--
ALTER TABLE `dealers_purchase_details`
  MODIFY `dpd_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `extra_charges`
--
ALTER TABLE `extra_charges`
  MODIFY `ec_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `product_cart_details`
--
ALTER TABLE `product_cart_details`
  MODIFY `pcd_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `product_category`
--
ALTER TABLE `product_category`
  MODIFY `pc_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `product_details`
--
ALTER TABLE `product_details`
  MODIFY `pd_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `stock_details`
--
ALTER TABLE `stock_details`
  MODIFY `sd_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
